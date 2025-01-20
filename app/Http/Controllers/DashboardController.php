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
        $totalCabang = Cabang::countCabang();
        $totalData = Dashboard::countData();

        // Mengirim data ke view
        return view('dashboard', [
            'dashboardList' => $dashboardList,
            'totalPegawai' => $totalPegawai,
            'totalCabang' => $totalCabang,
            'totalData' => $totalData
        ]);
    }

    public function destroy($npa)
    {
        // Call the delete method in the Dashboard model
        Dashboard::destroyData($npa);

        // Redirect back with a success message
        return redirect()->route('dashboard')->with('success', 'Data successfully deleted');
    }
}
