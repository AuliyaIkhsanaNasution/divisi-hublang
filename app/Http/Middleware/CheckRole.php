<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        $pegawai = Session::get('pegawai');

        // Jika user tidak memiliki role yang sesuai, redirect ke dashboard
        if (!$pegawai || $pegawai['role'] !== $role) {
            return redirect('/dashboard')->withErrors(['access' => 'Anda tidak memiliki akses ke halaman ini']);
        }

        return $next($request);
    }
}
