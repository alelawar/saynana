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
        $vouchers = [];

        for ($i = 1; $i <= 5; $i++) {
            $vouchers[] = [
                'code'       => strtoupper(Str::random(8)), // kode unik random
                'percentage' => rand(5, 50), // diskon random antara 5% - 50%
                'max_uses'   => 5,
                'is_public'  => true,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        Voucher::insert($vouchers);
    }
}
