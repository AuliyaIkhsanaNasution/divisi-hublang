<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Pegawai
{
    public static function getAll()
    {
        // Mengambil semua data dari tabel 'pegawai'
        return DB::table('pegawai')->get();
    }
}
