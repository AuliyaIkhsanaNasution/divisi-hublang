<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('login');
})->name('login');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/form', function () {
    return view('form');
})->name('form');

Route::get('/pegawai', function () {
    // Mengambil data dari tabel 'pegawai'
    $pegawaiList = DB::table('pegawai')->get();
    // Mengirimkan data ke view 'pegawai'
    return view('pegawai', ['pegawaiList' => $pegawaiList]);
})->name('pegawai');

Route::get('/cabang', function () {
    // Mengambil data dari tabel 'pegawai'
    $cabangList = DB::table('cabang')->get();
    return view('cabang', ['cabangList' => $cabangList]);
})->name('cabang');
