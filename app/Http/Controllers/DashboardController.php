<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dashboard;
use App\Models\Pegawai;
use App\Models\Cabang;

class DashboardController extends Controller
{
    public function index()
    {
        // Mengambil data dari model Dashboard
        $dashboardList = Dashboard::getAll();  // Ambil semua data dashboard

        // Menghitung jumlah pegawai dan cabang dengan query builder
        $totalPegawai = Pegawai::countPegawai();  // Hitung jumlah pegawai
        $totalCabang = Cabang::countCabang();     // Hitung jumlah cabang

        // Mengirim data ke view
        return view('dashboard', [
            'dashboardList' => $dashboardList,
            'totalPegawai' => $totalPegawai,
            'totalCabang' => $totalCabang
        ]);
    }
}
