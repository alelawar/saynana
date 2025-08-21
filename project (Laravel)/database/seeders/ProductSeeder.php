<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            ['name' => 'Sale Pisang Original', 'description' => 'Sale Wenak', 'price' => 13000, 'stock' => 50, 'img_url' => 'img/product/sale-pisang-original.png'],

            ['name' => 'Sale Pisang Chocolate', 'description' => 'Sale Wenak', 'price' => 15000, 'stock' => 50, 'img_url' => 'img/product/sale-pisang-chocolate.png'],

            ['name' => 'Sale Pisang Strawberry', 'description' => 'Sale Wenak', 'price' => 15000, 'stock' => 50, 'img_url' => 'img/product/sale-pisang-strawberry.png'],

            ['name' => 'Sale Pisang Milk', 'description' => 'Sale Wenak', 'price' => 15000, 'stock' => 50, 'img_url' => 'img/product/sale-pisang-milk.png'],

        ];

        foreach ($products as $p) {
            Product::create($p);
        }
    }
}
