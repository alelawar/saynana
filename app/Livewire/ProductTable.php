<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class ProductTable extends Component
{
    public function render()
    {
        $products = Product::select('products.*', DB::raw('COALESCE(SUM(orders_items.qty), 0) as sold_qty'))
            ->leftJoin('orders_items', 'products.id', '=', 'orders_items.product_id')
            ->leftJoin('orders', 'orders_items.order_id', '=', 'orders.id')
            ->where(function ($q) {
                $q->where('orders.status', '!=', 'pending')
                    ->orWhereNull('orders.status'); // biar produk tanpa order tetep ikut
            })
            ->groupBy('products.id')
            ->orderBy('products.name')
            ->get();


        return view('livewire.product-table', compact('products'));
    }
}
