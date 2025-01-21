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

    public static function countCabang()
    {
        // Menghitung jumlah cabang
        return DB::table('cabang')->count();
    }

    // Menambahkan data cabang
    public static function store($data)
    {
        DB::insert('INSERT INTO cabang (nama_cabang) VALUES (?)', [$data['nama_cabang']]);
    }

    public static function destroyData($id)
    {
        // Delete the record from the 'cabang' table where the id matches
        return DB::table('cabang')->where('id_cabang', $id)->delete();
    }

    public static function findCabangById($id)
    {
        return DB::table('cabang')->where('id_cabang', $id)->first();
    }

    public static function updateCabang($id, $data)
    {
        return DB::table('cabang')->where('id_cabang', $id)->update($data);
    }
}
