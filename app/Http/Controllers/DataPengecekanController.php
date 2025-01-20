<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataPengecekan;
use App\Models\Cabang;
use Illuminate\Support\Facades\Session;

class DataPengecekanController extends Controller
{
    /**
     * Menampilkan form input data.
     */
    public function create()
    {
        // Ambil data pegawai dari session
        $pegawai = Session::get('pegawai');

        if (!$pegawai) {
            return redirect()->route('login')->with('error', 'Session pegawai tidak ditemukan. Silakan login kembali.');
        }

        // Ambil semua data cabang
        $cabang = Cabang::getAll();

        return view('form', compact('cabang', 'pegawai'));
    }

    /**
     * Menyimpan data dari form ke database.
     */
    public function store(Request $data)
    {
        // Validasi input
        $data->validate([
            'npa' => 'required|string',
            'tanggal_input' => 'required|date',
            'nama_pelanggan' => 'required|string',
            'alamat' => 'required|string',
            'stand_meter' => 'required|string',
            'tarif' => 'required|string',
            'hasil_temuan' => 'required|string',
            'arahan_tindak_lanjut' => 'required|string',
            'cabang_id' => 'required|integer',
            'tanggal_cek_ulang' => 'required|date',
            'tanggal_cetak' => 'required|date'

        ]);


        // Ambil data pegawai dari session
        $pegawai = Session::get('pegawai');

        // Simpan data ke dalam database
        $data = [
            'npa' => $data->npa,
            'pegawai_id' => $pegawai['id'], // ID pegawai dari session
            'tanggal_input' => $data->tanggal_input,
            'nama_pelanggan' => $data->nama_pelanggan,
            'alamat' => $data->alamat,
            'stand_meter' => $data->stand_meter,
            'tarif' => $data->tarif,
            'hasil_temuan' => $data->hasil_temuan,
            'arahan_tindak_lanjut' => $data->arahan_tindak_lanjut,
            'cabang_id' => $data->cabang_id,
            'tanggal_cek_ulang' => $data->tanggal_cek_ulang,
            'tanggal_cetak' => $data->tanggal_cetak,
        ];

        // Gunakan Query Builder untuk menyimpan data
        DataPengecekan::create($data);

        // Redirect ke form dengan pesan sukses
        return redirect()->route('dashboard')->with('success', 'Data berhasil disimpan.');
    }
}
