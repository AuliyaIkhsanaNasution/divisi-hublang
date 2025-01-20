<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\CabangController;
use App\Http\Controllers\DashboardController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('login');
})->name('login');

Route::get('/form', function () {
    return view('form');
})->name('form');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai');
Route::get('/cabang', [CabangController::class, 'index'])->name('cabang');
