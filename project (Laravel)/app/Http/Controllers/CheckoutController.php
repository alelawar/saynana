<?php

namespace App\Http\Controllers;

use App\Mail\PaymentSuccessMail;
use App\Models\City;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Voucher;
use App\Models\Province;
use App\Models\DataOrder;
use App\Models\OrdersItem;
use App\Models\UserVoucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        $validated = $request->validate([
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.qty' => 'required|integer|min:1|max:100', // maksimal 100 qty per item
            'items.*.price' => 'required|numeric|min:0|max:10000000', // maksimal harga 10 juta
            'voucher_code' => 'nullable|string|exists:vouchers,code',
        ]);


        $totalPrice = collect($validated['items'])->sum(fn($item) => $item['qty'] * $item['price']);
        $discountAmount = 0;

        // Hanya hitung diskon di checkout (tanpa simpan voucher_id dulu)
        if (!empty($validated['voucher_code'])) {
            $voucherCode = $validated['voucher_code'];

            $publicVoucher = Voucher::where('code', $voucherCode)->where('is_public', true)->first();

            if ($publicVoucher) {
                $usageCount = Order::where('voucher_id', $publicVoucher->id)
                    ->where('status', 'paid') // hitung yang sudah bayar saja
                    ->count();

                if ($publicVoucher->max_uses && $usageCount >= $publicVoucher->max_uses) {
                    return back()->with('error', 'Voucher publik sudah mencapai batas penggunaan.');
                }

                $discountAmount = ($totalPrice * $publicVoucher->percentage) / 100;
            } else if (Auth::check()) {
                $userVoucher = UserVoucher::where('user_id', Auth::id())
                    ->whereHas('voucher', fn($q) => $q->where('code', $voucherCode))
                    ->where('is_used', false)
                    ->first();

                if (!$userVoucher) {
                    return back()->with('error', 'Voucher personal tidak valid atau sudah terpakai.');
                }

                $discountAmount = ($totalPrice * $userVoucher->voucher->percentage) / 100;
            }
        }

        $finalPrice = max(0, $totalPrice - $discountAmount);

        // Simpan order tanpa voucher_id dulu
        $order = Order::create([
            'user_id' => Auth::id(),
            'code' => rand(100000, 999999),
            'total_price' => $finalPrice,
            'voucher_id' => null
        ]);

        foreach ($validated['items'] as $item) {
            OrdersItem::create([
                'order_id' => $order->id,
                'product_id' => $item['product_id'],
                'qty' => $item['qty'],
                'price' => $item['price'],
            ]);
        }

        session()->forget('cart');

        // dd("discount Amount = ", $discountAmount);

        session([
            'voucher_code' => $validated['voucher_code'] ?? null,
            'discountAmount' => $discountAmount == 0 ? null : $discountAmount
        ]);

        return redirect()->route('getData', ['code' => $order->code]);
    }

    public function getData($code)
    {
        $order = Order::where('code', $code)
            ->where('status', 'pending') // kondisi tambahan
            ->with('items.product')
            ->firstOrFail();
        $code_session = session('voucher_code'); // ambil dari session biasa
        $voucher_code = Voucher::where('code', $code_session)->first();

        $provinces = Province::with('cities')->get();

        $discountAmount = session('discountAmount');
        $voucherCode = session('voucher_code');
        $finalPrice = session('finalPrice');

        return view('checkout.index', compact('order', 'voucher_code', 'provinces', 'discountAmount', 'voucherCode', 'finalPrice'));
    }

    public function payment(Request $request)
    {
        // dd($request);
        $validator = Validator::make($request->all(), [
            'order_id' => 'required|exists:orders,id',
            'cityId' => 'required|exists:cities,id',
            'user_id' => 'nullable|exists:users,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:500',
            'final_price' => 'required|numeric|min:1|max:100000000', // maksimal 100 juta
            'voucher_code' => 'nullable|string|exists:vouchers,code'
        ]);


        if ($validator->fails()) {
            // Ambil pesan error pertama
            $firstError = $validator->errors()->first();
            return back()->with('error', $firstError);
        }

        // Kalau lolos validasi
        $validated = $validator->validated();

        $order = Order::where('id', $validated['order_id'])
            ->where('status', 'pending')
            ->firstOrFail();

        if ($request->has('items')) {
            foreach ($request->items as $item) {
                $product = Product::find($item['product_id']);
                if ($product) {
                    if ($product->stock < $item['qty']) {
                        return back()->with('error', "Stok untuk {$product->name} tidak mencukupi!");
                    }

                    $product->stock -= $item["qty"];
                    $product->save();
                }
            }
        }


        // Kalau ada voucher_code di payment, baru simpan voucher_id
        if (!empty($validated['voucher_code'])) {
            $voucher = Voucher::where('code', $validated['voucher_code'])->first();

            if ($voucher) {
                $order->voucher_id = $voucher->id;

                // Kalau voucher personal → mark as used
                if (!$voucher->is_public && Auth::check()) {
                    UserVoucher::where('user_id', Auth::id())
                        ->where('voucher_id', $voucher->id)
                        ->where('is_used', false)
                        ->update(['is_used' => true]);
                }
            }
        }

        $order->status = 'paid';
        $order->total_price = $validated['final_price'];
        $order->save();

        $dataOrder = DataOrder::create([
            'order_id' => $order->id,
            'city_id' => $validated['cityId'],
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'phone'    => $validated['phone'],
            'address_line'  => $validated['address'],
        ]);

        if (!empty($validated['user_id'])) {
            $user = User::findOrFail($validated['user_id']);

            $user->update([
                'address' => $dataOrder->address_line,
                'phone' => $dataOrder->phone,
            ]);
        }

        if (!empty(config('mail.mailers.smtp.password'))) {
            Mail::to($dataOrder->email)->send(new PaymentSuccessMail($order, $dataOrder));
        }

        // Hapus voucher_code dari session
        session()->forget('voucher_code');
        // return redirect()->route('home')->with('success', 'Pembelian berhasil!');
        return redirect()->route('getDetailCheckout', ['code' => $order->code])
            ->with('success', 'Pembelian berhasil! Email konfirmasi sudah dikirim.');
    }

    public function detailOrder($code)
    {
        $order = Order::where('code', $code)
            ->with([
                'shipping',
                'items.product',
                'dataOrder.city.province'
            ])
            ->firstOrFail();

        $items     = $order->items;
        $dataOrder = $order->dataOrder;
        $city      = $dataOrder?->city;

        // dd($city);


        // dd($order, $dataOrder, $city, $items);
        return view('checkout.detail', compact('order', 'items', 'city', 'dataOrder'));
    }
}
