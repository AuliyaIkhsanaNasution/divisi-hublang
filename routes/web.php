<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\CabangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;

// Route untuk Login Form (GET)
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');

// Route untuk POST Login (Memproses form login)
Route::post('/', [AuthController::class, 'login'])->name('login.post');

// Route untuk Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route untuk Form (Contoh jika ada form tambahan)
Route::get('/form', function () {
    return view('form');
})->name('form');

// Grup Route dengan Middleware 'checkLogin' untuk route yang memerlukan login
Route::middleware(\App\Http\Middleware\CheckLogin::class)->group(function () {
    // Route Dashboard (Dilindungi dengan middleware CheckLogin)
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    // Route Pegawai (Dilindungi dengan middleware CheckLogin)
    Route::get('/pegawai', [PegawaiController::class, 'index'])
        ->name('pegawai');

    // Route Cabang (Dilindungi dengan middleware CheckLogin)
    Route::get('/cabang', [CabangController::class, 'index'])
        ->name('cabang');
});
