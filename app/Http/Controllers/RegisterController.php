<?php

namespace App\Http\Controllers;

use App\Models\User; // Penting untuk menyimpan data ke database
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Penting untuk enkripsi password

class RegisterController extends Controller
{
    public function index() {
        return view('daftar');
    }

  public function store(Request $request) {
    $request->validate([
        'name'     => 'required',
        'nik'      => 'required|unique:users',
        'no_telp'  => 'required',
        'password' => 'required|min:5',
    ]);

    // Menyimpan data masyarakat ke database
    User::create([
        'name'     => $request->name,
        'nik'      => $request->nik,
        'no_telp'  => $request->no_telp,
        'rt_rw'    => $request->rt_rw,
        'password' => Hash::make($request->password),
        'role'     => 'user', // Otomatis menjadi masyarakat biasa
    ]);

    // SETELAH DAFTAR, ARAHKAN KE LOGIN
    return redirect()->route('login')->with('success', 'Pendaftaran berhasil! Silakan masuk.');
}
}