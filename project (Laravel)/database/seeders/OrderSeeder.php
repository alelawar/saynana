<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Shipping;
use App\Models\DataOrder;
use App\Models\OrdersItem;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $buyers = User::where('role', 'buyer')->get();
        $products = Product::all();
        $cities = \App\Models\City::all();

        $messages = [
            'pending'   => 'Pesanan Anda sedang menunggu konfirmasi.',
            'paid' => 'Pesanan Anda sudah dikonfirmasi, tunggu untuk proses packing.',
            'packing'   => 'Pesanan Anda sudah kami packing, mohon tunggu untuk pesanan dikirim.',
            'shipping'  => 'Pesanan Anda sudah dikirim, mohon tunggu kurir untuk sampai ke alamat anda.',
            'success'   => 'Pesanan Anda sudah selesai, terimakasih!',
            'canceled'  => 'Pesanan Anda dibatalkan.',
        ];

        for ($i = 0; $i < 30; $i++) {
            $date = now()->subDays(rand(0, 30));
            $user = $buyers->random();

            $order = Order::create([
                'user_id' => $user->id,
                'code' => rand(100000, 999999),
                'voucher_id' => null,
                'total_price' => 0, // nanti update
                'status' => collect(['paid', 'packing', 'shipping', 'success'])->random(),
                'created_at' => $date,
                'updated_at' => $date,
            ]);

            $total = 0;
            $randomProducts = $products->random(rand(1, 3));

            foreach ($randomProducts as $product) {
                $qty = rand(1, 3);
                $subtotal = $product->price * $qty;

                OrdersItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'qty' => $qty,
                    'price' => $product->price,
                ]);

                $total += $subtotal;
            }

            $order->update(['total_price' => $total]);

            // Data Order (alamat pengiriman)
            $city = $cities->random();
            DataOrder::create([
                'order_id' => $order->id,
                'city_id' => $city->id,
                'name' => $user->name,
                'email' => $user->email,
                'address_line' => 'Jalan Contoh No. ' . rand(1, 100),
                'phone' => '08' . rand(111111111, 999999999),
                'message'      => $messages[$order->status] ?? 'Pesanan sedang diproses.',
                'created_at' => $date,
                'updated_at' => $date,
            ]);

            // Shipping
            Shipping::create([
                'order_id' => $order->id,
                'shipping_provider' => collect(['JNE', 'TIKI', 'SiCepat', 'J&T'])->random(),
                'resi' => strtoupper(Str::random(10)),
                'created_at' => $date,
                'updated_at' => $date,
            ]);
        }
    }
}
