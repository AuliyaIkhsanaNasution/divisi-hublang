<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckLogin
{
    public function handle(Request $request, Closure $next)
    {
        // Pastikan session 'pegawai' ada
        if (Session::has('pegawai')) {
            // Bagikan session 'pegawai' ke semua view jika ada
            view()->share('pegawai', Session::get('pegawai'));
        }

        // Jika session 'pegawai' tidak ada, arahkan ke halaman login
        if (!Session::has('pegawai')) {
            return redirect()->route('login')->withErrors(['auth' => 'Silakan login terlebih dahulu']);
        }

        return $next($request);
    }
}
