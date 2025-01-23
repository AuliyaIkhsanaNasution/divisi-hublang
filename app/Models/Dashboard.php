<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Dashboard
{
    public static function getAll($pegawaiId)
    {
        return DB::table('form_inputan')
            ->join('cabang', 'form_inputan.cabang_id', '=', 'cabang.id_cabang') // Gabungkan dengan tabel cabang
            ->select(
                'form_inputan.npa',
                'form_inputan.pegawai_id',
                'form_inputan.nama_pelanggan',
                'form_inputan.alamat',
                'form_inputan.stand_meter',
                'form_inputan.tarif',
                'form_inputan.hasil_temuan',
                'form_inputan.arahan_tindak_lanjut',
                'form_inputan.cabang_id',
                'cabang.nama_cabang as nama_cabang', // Ambil nama cabang
                'form_inputan.tanggal_input',
                'form_inputan.tanggal_cek_ulang'
            )
            ->where('form_inputan.pegawai_id', $pegawaiId) // Filter berdasarkan ID pengirim form
            ->get();
    }



    public static function countData()
    {
        // Menghitung jumlah cabang
        return DB::table('form_inputan')->count();
    }

    public static function destroyData($id)
    {
        // Delete the record from the 'form_inputan' table where the id matches
        return DB::table('form_inputan')->where('npa', $id)->delete();
    }

    public static function getByNpa($npa)
    {
        return DB::table('form_inputan')->where('npa', $npa)->first();
    }

    public static function updateData($npa, $data)
    {
        return DB::table('form_inputan')
            ->where('npa', $npa)
            ->update($data);
    }
}
