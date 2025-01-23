<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Pegawai;

class AuthController extends Controller
{

    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Cari user berdasarkan username
        $pegawai = Pegawai::findByUsername($request->username);

        if ($pegawai) {
            // Cek password tanpa hash (bandingkan langsung dengan password yang disimpan)
            if ($request->password === $pegawai->password) {
                // Set session jika login berhasil
                Session::put('pegawai', [
                    'id' => $pegawai->id_pegawai,
                    'username' => $pegawai->username,
                    'nama' => $pegawai->nama_pegawai,
                    'role' => $pegawai->role
                ]);

                return redirect()->route('dashboard')->with('success', 'Berhasil login!');
            }
        }

        // Jika login gagal
        return back()->withErrors(['login' => 'Username atau password salah']);
    }

    public function logout()
    {
        Session::forget('pegawai');
        return redirect()->route('login')->with('success', 'Berhasil logout!');
    }
}
