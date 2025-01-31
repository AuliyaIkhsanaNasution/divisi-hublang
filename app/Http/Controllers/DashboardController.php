<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dashboard;
use App\Models\Pegawai;
use App\Models\Cabang;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Ambil pegawai_id dari session
        $pegawaiId = Session::get('pegawai.id');

        // Ambil data dashboard sesuai pegawai_id
        $dashboardList = Dashboard::getAll($pegawaiId);

        $totalPegawai = Pegawai::countPegawai();  // Hitung jumlah pegawai
        $totalCabang = Cabang::countCabang();
        $totalData = Dashboard::countData();

        // Kirim data ke view
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
        return redirect()->route('dashboard')->with('success', 'Data Berhasil Dihapus');
    }
}
