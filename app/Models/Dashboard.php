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

    public static function countData()
    {
        // Menghitung jumlah cabang
        return DB::table('form_inputan')->count();
    }

    public static function destroyData($npa)
    {
        // Delete the record from the 'form_inputan' table where the npa matches
        return DB::table('form_inputan')->where('npa', $npa)->delete();
    }
}
