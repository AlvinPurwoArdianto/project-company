<?php
namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Fasilitas;
use App\Models\Informasi;
use App\Models\Pendaftaran;
use App\Models\Program;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $program     = Program::count();
        $informasi     = Informasi::count();
        $fasilitas   = Fasilitas::count();
        $pendaftaran = Pendaftaran::count();

        // Get registration data for the last 7 days
        $chart_data  = [];
        $chart_dates = [];

        for ($i = 6; $i >= 0; $i--) {
            $date  = Carbon::now()->subDays($i);
            $count = Pendaftaran::whereDate('created_at', $date)->count();

            $chart_data[]  = (int) $count; // Ensure integer values
            $chart_dates[] = $date->format('d M');
        }

        return view('admin.dashboard', compact(
            'program',
            'informasi',
            'fasilitas',
            'pendaftaran',
            'chart_data',
            'chart_dates'
        ));
    }

    public function daftar()
    {
        return view('daftar');
    }
}
