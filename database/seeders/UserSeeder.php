<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::create([
            'name' => 'Seller User',
            'email' => 'seller@email.com',
            'password' => Hash::make('password'),
            'role' => 'seller'
        ]);

        User::factory(10)->create(); // buyer random
    }
}
    