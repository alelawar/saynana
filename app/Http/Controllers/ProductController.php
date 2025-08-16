<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    public function index() {
        $products = Product::orderBy("name")->get();
        // dd($products);
        return view("products.index", [
            'products' => $products,
        ]);
    }
}
