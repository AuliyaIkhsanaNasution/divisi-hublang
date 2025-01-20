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

    public static function destroyData($id)
    {
        // Delete the record from the 'form_inputan' table where the id matches
        return DB::table('form_inputan')->where('id', $id)->delete();
    }
}
