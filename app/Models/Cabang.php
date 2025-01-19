<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Cabang
{
    public static function getAll()
    {
        // Mengambil semua data dari tabel 'cabang'
        return DB::table('cabang')->get();
    }
}
