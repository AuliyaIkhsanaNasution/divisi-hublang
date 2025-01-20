<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\CabangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataPengecekanController;

// Route untuk Login Form (GET)
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');

// Route untuk POST Login (Memproses form login)
Route::post('/', [AuthController::class, 'login'])->name('login.post');

// Route untuk Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Grup Route dengan Middleware 'checkLogin' untuk route yang memerlukan login
Route::middleware(\App\Http\Middleware\CheckLogin::class)->group(function () {
    // Route Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Route Pegawai
    Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai');

    // Route Cabang
    Route::get('/cabang', [CabangController::class, 'index'])->name('cabang');

    // Route Form Input Data
    Route::get('/form', [DataPengecekanController::class, 'create'])->name('form'); // Menampilkan form
    Route::post('/form', [DataPengecekanController::class, 'store'])->name('form.store'); // Menyimpan data

    Route::delete('/dashboard/{id}', [DashboardController::class, 'destroy'])->name('dashboard.destroy');
});
