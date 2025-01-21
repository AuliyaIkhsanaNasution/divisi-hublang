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

    public static function destroyData($id)
    {
        // Delete the record from the 'pegawai' table where the id matches
        return DB::table('pegawai')->where('id_pegawai', $id)->delete();
    }

    // Menambahkan data pegawai
    public static function store($data)
    {
        DB::insert('INSERT INTO pegawai (nama_pegawai) VALUES (?)', [$data['nama_pegawai']]);
    }

    public static function findPegawaiById($id)
    {
        return DB::table('pegawai')->where('id_pegawai', $id)->first();
    }

    public static function updatePegawai($id, $data)
    {
        return DB::table('pegawai')->where('id_pegawai', $id)->update($data);
    }
}
