<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dashboard;

class DashboardController extends Controller
{
    public function index()
    {
        // Mengambil data dari model Pegawai
        $dashboardList = Dashboard::getAll();

        // Mengirim data ke view
        return view('dashboard', ['dashboardList' => $dashboardList]);
    }
}
