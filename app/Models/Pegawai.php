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

    public static function countPegawai()
    {
        // Menghitung jumlah pegawai
        return DB::table('pegawai')->count();
    }

    public static function findByUsername($username)
    {
        return DB::table('pegawai')->where('username', $username)->first();
    }
}
