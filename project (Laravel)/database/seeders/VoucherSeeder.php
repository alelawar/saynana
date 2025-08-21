<?php

namespace Database\Seeders;

use App\Models\Voucher;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VoucherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Voucher::create([
            'code' => 'DISKON10',
            'percentage' => 10,
        ]);

        Voucher::create([
            'code' => 'DISKON20',
            'percentage' => 20,
        ]);
    }
}
