<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB; // Tambahkan ini untuk menggunakan DB
use App\Http\Controllers\Controller;

class PegawaiController extends Controller
{
    public function index()
    {
        // Mengambil semua data pegawai
        $pegawaiList = DB::table('pegawai')->get();

        // Mengirimkan data ke view
        return view('pegawai.index', ['pegawaiList' => $pegawaiList]);
    }
}
