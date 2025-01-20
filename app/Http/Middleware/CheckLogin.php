<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;

class CheckLogin
{
    public function handle($request, Closure $next)
    {
        if (!Session::has('pegawai')) {
            return redirect()->route('login')->withErrors(['auth' => 'Silakan login terlebih dahulu']);
        }

        return $next($request);
    }
}
