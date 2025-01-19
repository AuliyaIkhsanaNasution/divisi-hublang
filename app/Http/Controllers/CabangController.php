<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cabang;


class CabangController extends Controller
{
    public function index()
    {
        // Mengambil data dari model
        $cabangList = Cabang::getAll();

        // Mengirim data ke view
        return view('cabang', ['cabangList' => $cabangList]);
    }
}
