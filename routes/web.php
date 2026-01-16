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

// Auth Guest
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login.post');
    Route::get('/daftar', [RegisterController::class, 'index'])->name('register');
    Route::post('/daftar', [RegisterController::class, 'store'])->name('register.store');
});

// Auth Registered User
Route::middleware(['auth'])->group(function () {
    
    // Fitur Masyarakat
    Route::get('/pengaduan', [PengaduanController::class, 'index'])->name('pengaduan.index');
    Route::post('/pengaduan', [PengaduanController::class, 'store'])->name('pengaduan.store');
    Route::get('/riwayat', [PengaduanController::class, 'riwayat'])->name('pengaduan.riwayat');

    // Fitur Admin
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::get('/pengaduan', [AdminController::class, 'pengaduan'])->name('admin.pengaduan');
        Route::get('/akun', [AdminController::class, 'akun'])->name('admin.akun');
        
        Route::delete('/akun/{id}', [AdminController::class, 'destroy'])->name('akun.destroy');
        Route::get('/pengaduan/{id}', [AdminController::class, 'show'])->name('admin.pengaduan.show');
        
        // Pastikan AkunController ini ada di folder Controller Anda
        Route::get('/akun/{id}/edit', [AkunController::class, 'edit'])->name('akun.edit');
        Route::put('/akun/{id}', [AkunController::class, 'update'])->name('akun.update');
        
        Route::post('/pengaduan/{id}/tanggapi', [AdminController::class, 'tanggapi'])->name('admin.tanggapi');
    });

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});