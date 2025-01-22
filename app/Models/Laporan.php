<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Laporan
{
    public static function getAllLaporan()
    {
        // Menggunakan query builder untuk mengambil data dengan join
        return DB::select("SELECT 
    form_inputan.npa,
    form_inputan.pegawai_id,
    pegawai.nama_pegawai AS nama_pegawai,
    form_inputan.nama_pelanggan,
    form_inputan.alamat,
    form_inputan.stand_meter,
    form_inputan.tarif,
    form_inputan.hasil_temuan,
    form_inputan.arahan_tindak_lanjut,
    form_inputan.cabang_id,
    cabang.nama_cabang AS nama_cabang, 
    form_inputan.tanggal_input,
    form_inputan.tanggal_cek_ulang
FROM form_inputan
LEFT JOIN pegawai ON form_inputan.pegawai_id = pegawai.id_pegawai
LEFT JOIN cabang ON form_inputan.cabang_id = cabang.id_cabang
");
    }

    public static function getFilteredLaporan($startDate, $endDate, $pegawaiId, $standMeter, $hasilTemuan)
    {
        $query = DB::table('form_inputan')
            ->leftJoin('pegawai', 'form_inputan.pegawai_id', '=', 'pegawai.id_pegawai')
            ->leftJoin('cabang', 'form_inputan.cabang_id', '=', 'cabang.id_cabang')
            ->select(
                'form_inputan.npa',
                'form_inputan.pegawai_id',
                'pegawai.nama_pegawai',
                'form_inputan.nama_pelanggan',
                'form_inputan.alamat',
                'form_inputan.stand_meter',
                'form_inputan.tarif',
                'form_inputan.hasil_temuan',
                'form_inputan.arahan_tindak_lanjut',
                'form_inputan.cabang_id',
                'cabang.nama_cabang',
                'form_inputan.tanggal_input',
                'form_inputan.tanggal_cek_ulang'
            );

        // Terapkan filter jika ada
        if ($startDate && $endDate) {
            $query->whereBetween('form_inputan.tanggal_input', [$startDate, $endDate]);
        }
        if ($pegawaiId) {
            $query->where('form_inputan.pegawai_id', $pegawaiId);
        }
        if ($standMeter) {
            $query->where('form_inputan.stand_meter', $standMeter);
        }
        if ($hasilTemuan) {
            $query->where('form_inputan.hasil_temuan', 'like', "%$hasilTemuan%");
        }

        return $query->get();
    }
}
