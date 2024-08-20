<?php

namespace App\Http\Controllers;

use App\Models\Artikel;

class FrontController extends Controller
{
    public function artikel()
    {
        $artikel = Artikel::all();
        // confirmDelete('Hapus Artikel!', 'Apakah Anda Yakin?');
        return view('home', compact('artikel'));
    }
}
