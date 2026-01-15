<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

// Anda WAJIB menambahkan "extends Seeder" agar dikenali Laravel
class DatabaseSeeder extends Seeder 
{
    public function run()
    {
       User::create([
    'name' => 'Admin Wadul',
    'email' => 'admin@gmail.com', // Tambahkan ini
    'password' => Hash::make('admin123'),
    'role' => 'admin',
]);
    }
}