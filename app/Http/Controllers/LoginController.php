<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
{
   
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

        
        $user = Auth::user();

       
if (Auth::user()->role === 'admin') {
    return redirect()->intended('/admin/dashboard');
}

       
        return redirect()->intended('/pengaduan'); 
    }

    return back()->with('loginError', 'Login gagal! Periksa kembali nama dan password.');
}
    public function logout(Request $request)
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/login'); }
}