<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Province;
use App\Models\City;

class DataAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Province: Jawa Barat
        $jabar = Province::create([
            'province' => 'Jawa Barat'
        ]);

        // Province: DKI Jakarta
        $jakarta = Province::create([
            'province' => 'DKI Jakarta'
        ]);

        // Cities Jawa Barat (contoh data umum)
        $jabarCities = [
            ['name' => 'Bandung', 'shipping_cost' => 0],
            ['name' => 'Bekasi', 'shipping_cost' => 0],
            ['name' => 'Bogor', 'shipping_cost' => 0],
        ];

        foreach ($jabarCities as $city) {
            City::create([
                'province_id' => $jabar->id,
                'name' => $city['name'],
                'shipping_cost' => $city['shipping_cost'],
            ]);
        }

        // Cities DKI Jakarta (contoh data umum)
        $jakartaCities = [
            ['name' => 'Jakarta Pusat', 'shipping_cost' => 8000],
            ['name' => 'Jakarta Utara', 'shipping_cost' => 8000],
            ['name' => 'Jakarta Selatan', 'shipping_cost' => 8000],
            ['name' => 'Jakarta Timur', 'shipping_cost' => 8000],
            ['name' => 'Jakarta Barat', 'shipping_cost' => 8000],
        ];

        foreach ($jakartaCities as $city) {
            City::create([
                'province_id' => $jakarta->id,
                'name' => $city['name'],
                'shipping_cost' => $city['shipping_cost'],
            ]);
        }
    }
}
