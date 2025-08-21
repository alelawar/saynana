<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\DataOrder;
use App\Models\OrdersItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DashboardProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // produk
        $total_product = Product::sum('stock');
        $product_out_stock = Product::where('stock', 0)->count();
        $product_low_stock = Product::where('stock', 5)->count();
        $product_selled = OrdersItem::whereHas('order', function ($q) {
            $q->whereNotIn('status', ['pending', 'canceled']);
        })
            ->sum('qty');

        $produkTerjual = Product::withSum(['orderItems as total_terjual' => function ($q) {
            $q->whereHas('order', function ($q) {
                $q->whereNotIn('status', ['pending', 'canceled']);
            });
        }], 'qty')
            ->orderByDesc('total_terjual')
            ->take(5)
            ->get();

        // $pendapatanProduk = Product::withSum(['orderItems as total_pendapatan' => function ($q) {
        //     $q->whereHas('order', function ($q) {
        //         $q->whereNotIn('status', ['pending', 'canceled']);
        //     });
        // }], DB::raw('price * qty'))
        //     ->orderByDesc('total_pendapatan')
        //     ->take(5) // top 5 produk dengan pendapatan tertinggi
        //     ->get();

        // dd($pendapatanProduk->toArray());

        $labels = $produkTerjual->pluck('name');
        $data   = $produkTerjual->pluck('total_terjual');

        $products = Product::orderBy('name')->get();


        return view("dashboard.products.product", compact("total_product", 'product_out_stock', 'product_low_stock', 'product_selled', 'labels', 'data', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $data = $request->validate([
            'name' => 'required|string|max:225',
            'stock' => 'required|integer',
            'price' => 'required',
            'description' => 'required',
            'image' => 'file|image|max:5024'
        ]);

        if ($request->hasFile('image')) {
            $data['img_url'] = $request->file('image')->store('db/img');
            unset($data['image']);
        }

        $data['price'] = preg_replace('/[^0-9]/', '', $request->price);

        Product::create($data);

        return redirect('/dashboard/products')->with('success', 'Berhasil Mendambahkan Data');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        // dd($product);
        return view('dashboard.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => 'required|string|max:225',
            'stock' => 'required|integer',
            'price' => 'required',
            'description' => 'required',
            'img_url' => 'nullable|image|max:5024'
        ]);

        $data['price'] = preg_replace('/[^0-9]/', '', $request->price);

        // kalau ada file baru
        if ($request->hasFile('img_url')) {
            // hapus file lama (opsional)
            if ($product->img_url && Storage::exists($product->img_url)) {
                Storage::delete($product->img_url);
            }

            // simpan file baru ke storage/app/public/image
            $data['img_url'] = $request->file('img_url')->store('db/img');
        }

        $product->update($data);

        return back()->with('success', 'Produk Berhasil Diperbarui!');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if ($product->img_url && Storage::disk('public')->exists($product->img_url)) {
            Storage::disk('public')->delete($product->img_url);
        }

        $product->delete();

        return redirect('/dashboard/products')->with('success', 'Berhasil Menghapus Data');
    }
}
