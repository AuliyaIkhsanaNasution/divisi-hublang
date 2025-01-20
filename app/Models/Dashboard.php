<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Dashboard
{
    public static function getAll()
    {
        // Mengambil semua data dari tabel 'cabang'
        return DB::table('form_inputan')->get();
    }
}
