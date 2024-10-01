<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artikel = Artikel::all();
        confirmDelete('Hapus Artikel!', 'Apakah Anda Yakin?');
        return view('admin.artikel.index', compact('artikel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $artikel = Artikel::all();
        return view('admin.artikel.create', compact('artikel'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul_artikel' => 'required|unique:artikels',
            'deskripsi' => 'required',
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:3084',
        ]);

        $artikel = new Artikel();
        $artikel->judul_artikel = $request->judul_artikel;
        $artikel->deskripsi = $request->deskripsi;

        if ($request->hasFile('cover')) {
            $img = $request->file('cover');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/artikel', $name);
            $artikel->cover = $name;
        }

        $artikel->tanggal = $request->tanggal;

        $artikel->save();

        toast('Data Berhasil Ditambahkan!', 'success')->position('top-end')->autoClose(1000);
        return redirect()->route('artikel.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $artikel = Artikel::findOrFail($id);
        return view('admin.artikel.show', compact('artikel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $artikel = Artikel::findOrFail($id);
        return view('admin.artikel.edit', compact('artikel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul_artikel' => 'required',
            'deskripsi' => 'required',
            'cover' => 'image|mimes:jpeg,png,jpg,gif,svg|max:3084',
        ]);

        $artikel = Artikel::findOrFail($id);
        $artikel->judul_artikel = $request->judul_artikel;
        $artikel->deskripsi = $request->deskripsi;
        $artikel->tanggal = $request->tanggal;

        if ($request->hasFile('cover')) {
            $artikel->deleteImage();
            $img = $request->file('cover');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/artikel', $name);
            $artikel->cover = $name;
        }

        $artikel->update();

        toast('Data Berhasil Diubah!', 'success')->position('top-end')->autoClose(1000);
        return redirect()->route('artikel.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artikel = Artikel::findOrFail($id);
        $artikel->deleteImage();
        $artikel->delete();

        toast('Data Berhasil Dihapus!', 'success')->position('top-end')->autoClose(1000);
        return redirect()->route('artikel.index');
    }
}
