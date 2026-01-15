<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Membuat Akun Admin
        User::create([
    'name' => 'Admin Wadul',
    'nik' => '1234567890123456', // Tambahkan nomor NIK bebas (16 digit)
    'password' => Hash::make('admin123'),
    'role' => 'admin',
    'no_telp' => '08123456789',
]);
      
        
    }
}