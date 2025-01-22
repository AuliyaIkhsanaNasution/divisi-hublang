<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        // Ambil parameter filter dari request
        $startDate = $request->start_date;
        $endDate = $request->end_date;
        $pegawaiId = $request->pegawai_id;
        $standMeter = $request->stand_meter;
        $hasilTemuan = $request->hasil_temuan;

        // Query data dengan filter
        $laporanList = Laporan::getFilteredLaporan($startDate, $endDate, $pegawaiId, $standMeter, $hasilTemuan);

        // Mengirim data pegawai untuk dropdown
        $pegawaiList = DB::table('pegawai')->select('id_pegawai', 'nama_pegawai')->get();

        // Kirim data ke view
        return view('laporan', [
            'laporanList' => $laporanList,
            'pegawaiList' => $pegawaiList
        ]);
    }

    public function exportPdf(Request $request)
    {
        // Ambil parameter filter dari request
        $startDate = $request->start_date;
        $endDate = $request->end_date;
        $pegawaiId = $request->pegawai_id;
        $standMeter = $request->stand_meter;
        $hasilTemuan = $request->hasil_temuan;

        // Query data dengan filter
        $laporanList = Laporan::getFilteredLaporan($startDate, $endDate, $pegawaiId, $standMeter, $hasilTemuan);

        // Format periode untuk ditampilkan
        $periode = $this->formatPeriode($startDate, $endDate);

        // Data untuk PDF
        $data = [
            'title' => 'Rekapitulasi Laporan Inputan Pengecekan Ulang Meter Pelanggan',
            'laporanList' => $laporanList,
            'periode' => $periode,
            'date' => now()->format('d F Y'),
        ];

        // Generate PDF menggunakan Dompdf
        $dompdf = new Dompdf();
        $html = view('pdf', $data)->render();

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        return response($dompdf->output(), 200)
            ->header('Content-Type', 'application/pdf');
    }

    private function formatPeriode($startDate, $endDate)
    {
        if ($startDate && $endDate) {
            return "Periode: " . date('d-m-Y', strtotime($startDate)) . " s/d " . date('d-m-Y', strtotime($endDate));
        } elseif ($startDate) {
            return "Periode Mulai: " . date('d-m-Y', strtotime($startDate));
        } elseif ($endDate) {
            return "Periode Sampai: " . date('d-m-Y', strtotime($endDate));
        } else {
            return "Periode: Semua Waktu";
        }
    }
}
