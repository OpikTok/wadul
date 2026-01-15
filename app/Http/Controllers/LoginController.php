<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
{
    // Dari view('user.login') menjadi:
    return view('login');
}

   public function authenticate(Request $request)
{
    $credentials = $request->validate([
        'name' => 'required',
        'password' => 'required'
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        // Mengambil data user yang sedang login
        $user = Auth::user();

        // Pastikan 'admin' di sini sesuai dengan tulisan di database Anda (case-sensitive)
       // Pastikan pengecekan ini menggunakan huruf kecil sesuai isi database
if (Auth::user()->role === 'admin') {
    return redirect()->intended('/admin/dashboard');
}

        // Jika bukan admin (masyarakat), arahkan ke pengaduan
        return redirect()->intended('/pengaduan'); 
    }

    return back()->with('loginError', 'Login gagal! Periksa kembali nama dan password.');
}
    public function logout(Request $request)
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/login'); // Ini akan membawa admin kembali ke halaman login
}
}