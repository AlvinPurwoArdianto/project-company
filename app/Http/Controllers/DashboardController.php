<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use App\Models\Informasi;
use App\Models\Pendaftaran;
use App\Models\Program;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function checkNewRegistrations()
    {
        $readCount   = Pendaftaran::where('is_read', 'read')->count();
        $unreadCount = Pendaftaran::where('is_read', 'unread')->count();

        return response()->json([
            'readCount'   => $readCount,
            'unreadCount' => $unreadCount,
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $program     = Program::count();
        $informasi   = Informasi::count();
        $fasilitas   = Fasilitas::count();
        $pendaftaran = Pendaftaran::where('is_read', 'read')->count();
        $unreadCount = Pendaftaran::where('is_read', 'unread')->count();

        // Single optimized aggregation query for 7-day registration trend
        $startDate = Carbon::now()->subDays(6)->startOfDay();
        $countsByDate = Pendaftaran::where('created_at', '>=', $startDate)
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))
            ->groupBy(DB::raw('DATE(created_at)'))
            ->pluck('count', 'date');

        $chart_data  = [];
        $chart_dates = [];

        for ($i = 6; $i >= 0; $i--) {
            $date    = Carbon::now()->subDays($i);
            $dateKey = $date->format('Y-m-d');

            $chart_data[]  = (int) ($countsByDate[$dateKey] ?? 0);
            $chart_dates[] = $date->format('d M');
        }

        return view('admin.dashboard', compact(
            'program',
            'informasi',
            'fasilitas',
            'pendaftaran',
            'unreadCount',
            'chart_data',
            'chart_dates'
        ));
    }
}
