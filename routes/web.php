<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\CabangController;
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('login');
})->name('login');

Route::get('/dashboard', function () {
    $pelangganList = DB::table('form_inputan')->get();
    return view('dashboard', ['pelangganList' => $pelangganList]);
})->name('dashboard');

Route::get('/form', function () {
    return view('form');
})->name('form');

Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai');
Route::get('/cabang', [CabangController::class, 'index'])->name('cabang');
