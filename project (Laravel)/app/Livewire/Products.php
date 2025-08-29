<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Products extends Component
{
    public $cartItems = [];

    public function mount()
    {
        $this->cartItems = session()->get('cart', []);
    }

    public function addToCart($productId)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['qty']++;
        } else {
            $product = Product::findOrFail($productId);
            $cart[$productId] = [
                'name' => $product->name,
                'price' => $product->price,
                'qty' => 1
            ];
        }

        session()->put('cart', $cart);
        $this->cartItems[] = $cart;

        // Triggered buat ke komponen cart
        $this->dispatch('cartUpdated');
        $this->dispatch('updateTotalQty');
    }

    public function getAvailableStocks($productId, $realStock)
    {
        $cart = session()->get('cart', []);
        $reserved = isset($cart[$productId]) ? $cart[$productId]['qty'] : 0;

        return max($realStock - $reserved, 0);
    }

    public function render()
    {
        $products = Product::orderBy('name')->get();
        // dd($products);
        return view('livewire.products', [
            'products' => $products
        ]);
    }
}
