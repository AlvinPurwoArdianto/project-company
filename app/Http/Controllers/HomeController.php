<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Fasilitas;
use App\Models\Pendaftaran;
use App\Models\Program;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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

        $program = Program::count('id');
        $fasilitas = Fasilitas::count('id');
        $artikel = Artikel::count('id');
        $pendaftaran = Pendaftaran::count('id');

        return view('home', compact('program', 'fasilitas', 'artikel', 'pendaftaran'));
    }

    public function daftar()
    {
        return view('daftar');
    }
}
