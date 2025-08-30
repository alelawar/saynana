<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        // $products = Product::orderBy("name")->get();
        // dd($products);
        return view("products.index", [
            // 'products' => $products,
        ]);
    }

    public function search(Request $request)
    {
        $validated = $request->validate([
            'q' => 'nullable|string|min:3',
            'status' => 'nullable|string'
        ]);

        $q = $validated['q'] ?? null;
        $status = $validated['status'] ?? null;

        $query = Order::query();

        // Filter berdasarkan pencarian (nama atau code)
        if ($q) {
            $query->where(function ($subQuery) use ($q) {
                $subQuery->where('code', 'like', "%{$q}%")
                    ->orWhereHas('dataOrder', function ($dataOrderQuery) use ($q) {
                        $dataOrderQuery->where('name', 'like', "%{$q}%");
                    });
            });
        }

        // Filter berdasarkan status
        if ($status) {
            $query->where('status', $status);
        }

        // Hanya jalankan query jika ada filter yang diterapkan
        if ($q || $status) {
            $orders = $query->with('dataOrder')->paginate(10);
        } else {
            $orders = collect(); // Collection kosong jika tidak ada filter
        }

        return view('products.search', compact('orders', 'q', 'status'));
    }
}
