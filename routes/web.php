<?php

use Illuminate\Support\Facades\Route;

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
    return view('pegawai');
})->name('pegawai');
