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
    
    // 1. Rute Form Pengaduan
    Route::get('/pengaduan', [PengaduanController::class, 'index'])->name('pengaduan.index');
    Route::post('/pengaduan', [PengaduanController::class, 'store'])->name('pengaduan.store');
    
    // 2. Rute Riwayat (Pindahkan ke sini agar wajib login)
    Route::get('/riwayat', [PengaduanController::class, 'riwayat'])->name('pengaduan.riwayat');

    // 3. Grouping rute Admin
    Route::prefix('admin')->group(function () {
        // ... rute admin lainnya ...
    });

    // 4. Rute Logout
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // Grouping rute Admin
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::get('/pengaduan', [AdminController::class, 'pengaduan'])->name('admin.pengaduan');
        Route::get('/akun', [AdminController::class, 'akun'])->name('admin.akun');
        
        // Perbaikan: Gunakan admin.akun.destroy agar konsisten
        Route::delete('/akun/{id}', [AdminController::class, 'destroy'])->name('akun.destroy');
        
        Route::get('/pengaduan/{id}', [AdminController::class, 'show'])->name('admin.pengaduan.show');
        
        // Rute Edit & Update Akun
        Route::get('/akun/{id}/edit', [AkunController::class, 'edit'])->name('akun.edit');
        Route::put('/akun/{id}', [AkunController::class, 'update'])->name('akun.update');
        
        // PERBAIKAN: Hapus kata '/admin' di dalam URL karena sudah ada di prefix
        // Dari: /admin/pengaduan/{id}/tanggapi -> Menjadi: /pengaduan/{id}/tanggapi
        Route::post('/pengaduan/{id}/tanggapi', [AdminController::class, 'tanggapi'])->name('admin.tanggapi');
    });

    // Rute Logout
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});