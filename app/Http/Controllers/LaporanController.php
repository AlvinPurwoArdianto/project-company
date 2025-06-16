<?php

namespace App\Http\Controllers;
use App\Models\Pendaftaran;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function pendaftaran()
    {
        $pendaftaran = Pendaftaran::all();
        return view('admin.laporan.pendaftaran', compact('pendaftaran'));
    }

    public function pendaftaranPdf(Request $request)
    {
        $pendaftaran = Pendaftaran::all();
        $data = [
            'pendaftaran' => $pendaftaran,
            'tanggal_cetak' => Carbon::now()->translatedFormat('d F Y'),
            'periode' => $request->start_date && $request->end_date ?
                'Periode ' . Carbon::parse($request->start_date)->translatedFormat('d F Y') .
                ' - ' . Carbon::parse($request->end_date)->translatedFormat('d F Y') :
                'Semua Periode'
        ];

        $pdf = PDF::loadView('admin.laporan.pendaftaran_pdf', $data);
        $pdf->setPaper('A4', 'potrait');

        return $pdf->download('laporan_pendaftaran_' . Carbon::now()->format('d-m-Y') . '.pdf');
    }
}
