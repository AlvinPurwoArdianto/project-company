<?php
namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function artikel()
    {
        $artikel = Artikel::all();
        // confirmDelete('Hapus Artikel!', 'Apakah Anda Yakin?');
        return view('home', compact('artikel'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'no_telepon' => 'required|min:10',
            'tanggal_pendaftaran' => 'required',
        ]);

        $pendaftaran = new Pendaftaran();

        $pendaftaran->nama = $request->nama;
        $pendaftaran->jenis_kelamin = $request->jenis_kelamin;
        $pendaftaran->tempat_lahir = $request->tempat_lahir;
        $pendaftaran->tanggal_lahir = $request->tanggal_lahir;
        $pendaftaran->alamat = $request->alamat;
        $pendaftaran->email = $request->email;
        $pendaftaran->no_telepon = $request->no_telepon;
        $pendaftaran->tanggal_pendaftaran = $request->tanggal_pendaftaran;

        $pendaftaran->save();

        toast('Data Berhasil Ditambahkan!', 'success')->position('top-end')->autoClose(1000);
        return redirect()->route('front.form');

    }

    public function form()
    {
        return view('pendaftaran.register');
    }
}
