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

// --- AKSES TERPROTEKSI ---
Route::middleware(['auth'])->group(function () {
    
    // Fitur User
    Route::get('/pengaduan', [PengaduanController::class, 'index'])->name('pengaduan.index');
    Route::post('/pengaduan', [PengaduanController::class, 'store'])->name('pengaduan.store');
    Route::get('/riwayat', [PengaduanController::class, 'riwayat'])->name('pengaduan.riwayat');

    // Fitur Admin (Hanya satu grup agar tidak Error 500)
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::get('/pengaduan', [AdminController::class, 'pengaduan'])->name('admin.pengaduan');
        Route::get('/akun', [AdminController::class, 'akun'])->name('admin.akun');
        
        // --- INI PERBAIKAN TOMBOL EDIT & HAPUS ANDA ---
        Route::delete('/akun/{id}', [AdminController::class, 'destroy'])->name('admin.akun.destroy');
        Route::get('/akun/{id}/editakun', [AkunController::class, 'editakun'])->name('admin.akun.editakun');
        Route::put('/akun/{id}', [AkunController::class, 'update'])->name('admin.akun.update');
        
        Route::get('/pengaduan/{id}', [AdminController::class, 'show'])->name('admin.pengaduan.show');
        Route::post('/pengaduan/{id}/tanggapi', [AdminController::class, 'tanggapi'])->name('admin.tanggapi');
    });

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});