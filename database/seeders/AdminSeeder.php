<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "name" => "admin",
            "email" => "admin@gmail.com",
            "role" => 'admin',
            "password" => Hash::make("12345678")
        ]);
        User::create([
            "name" => "editor",
            "email" => "editor@gmail.com",
            "role" => 'editor',
            "password" => Hash::make("12345678")
        ]);
        Customer::create([
            'name' => 'customer',
            'email' => 'customer@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
    }
}
