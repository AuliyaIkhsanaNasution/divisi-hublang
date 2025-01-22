<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\CabangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataPengecekanController;
use App\Http\Controllers\LaporanController;

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
    Route::get('/dashboard/{npa}/edit', [DashboardController::class, 'edit'])->name('dashboard.edit');
    Route::put('/dashboard/{npa}', [DashboardController::class, 'update'])->name('dashboard.update');
    Route::delete('/dashboard/{id}', [DashboardController::class, 'destroy'])->name('dashboard.destroy');

    // Route Pegawai
    Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai');
    Route::delete('/pegawai/{id}', [PegawaiController::class, 'destroy'])->name('pegawai.destroy');
    Route::post('/pegawai', [PegawaiController::class, 'store'])->name('pegawai.store');
    Route::get('/pegawai/edit/{id}', [PegawaiController::class, 'edit'])->name('pegawai.edit');
    Route::put('/pegawai/{id}', [PegawaiController::class, 'update'])->name('pegawai.update');

    // Route Cabang
    Route::get('/cabang', [CabangController::class, 'index'])->name('cabang');
    Route::post('/cabang', [CabangController::class, 'store'])->name('cabang.store');
    Route::get('/cabang/edit/{id}', [CabangController::class, 'edit'])->name('cabang.edit');
    Route::put('/cabang/{id}', [CabangController::class, 'update'])->name('cabang.update');
    Route::delete('/cabang/{id}', [CabangController::class, 'destroy'])->name('cabang.destroy');

    // Route Form Input Data
    Route::get('/form', [DataPengecekanController::class, 'create'])->name('form'); // Menampilkan form
    Route::post('/form', [DataPengecekanController::class, 'store'])->name('form.store'); // Menyimpan data

    // Route Laporan
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan');
    Route::get('/pdf', [LaporanController::class, 'exportPdf'])->name('pdf');
});
