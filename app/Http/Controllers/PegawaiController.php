<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;

class PegawaiController extends Controller
{
    public function index()
    {
        // Mengambil data dari model Pegawai
        $pegawaiList = Pegawai::getAll();

        // Mengirim data ke view
        return view('pegawai', ['pegawaiList' => $pegawaiList]);
    }
}
