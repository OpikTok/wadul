<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AkunController; 

// --- AKSES PUBLIK ---
Route::get('/', function () { return view('home'); })->name('awal');
Route::get('/home', function () { return view('home'); })->name('home');
Route::get('/tentang', function () { return view('tentang'); })->name('tentang');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.post');
Route::get('/daftar', [RegisterController::class, 'index'])->name('register');
Route::post('/daftar', [RegisterController::class, 'store'])->name('register.store');

// --- AKSES TERPROTEKSI (Wajib Login) ---
Route::middleware(['auth'])->group(function () {
    
    // 1. Pengaduan & Riwayat User
    Route::get('/pengaduan', [PengaduanController::class, 'index'])->name('pengaduan.index');
    Route::post('/pengaduan', [PengaduanController::class, 'store'])->name('pengaduan.store');
    Route::get('/riwayat', [PengaduanController::class, 'riwayat'])->name('pengaduan.riwayat');

    // 2. Akses Admin (Hanya satu group prefix admin saja)
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
        Route::get('/pengaduan', [AdminController::class, 'pengaduan'])->name('pengaduan');
        Route::get('/akun', [AdminController::class, 'akun'])->name('akun');
        
        // Pengaduan detail & tanggapan
        Route::get('/pengaduan/{id}', [AdminController::class, 'show'])->name('pengaduan.show');
        Route::post('/pengaduan/{id}/tanggapi', [AdminController::class, 'tanggapi'])->name('tanggapi');

        // Manajemen Akun (Hapus, Edit, Update)
        // Gunakan controller yang sama jika memungkinkan, di sini saya pakai AdminController agar seragam
        Route::delete('/akun/{id}', [AdminController::class, 'destroy'])->name('akun.destroy');
        Route::get('/akun/{id}/edit', [AkunController::class, 'edit'])->name('akun.edit');
        Route::put('/akun/{id}', [AkunController::class, 'update'])->name('akun.update');
    });

    // 3. Logout
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});