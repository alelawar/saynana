<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          DB::table('products')->insert([
            [
                'name' => 'Product A',
                'description' => 'Description for Product A',
                'price' => 100000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Product B',
                'description' => 'Description for Product B',
                'price' => 200000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Product C',
                'description' => 'Description for Product C',
                'price' => 300000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
