<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use Illuminate\Http\Request;

class FasilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fasilitas = Fasilitas::latest()->get();
        confirmDelete('Hapus Fasilitas!', 'Apakah Anda Yakin?');
        return view('admin.fasilitas.index', compact('fasilitas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fasilitas = Fasilitas::all();
        return view('admin.fasilitas.create', compact('fasilitas'));
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
            'nama_fasilitas' => 'required',
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:3084',
        ]);

        $fasilitas = new Fasilitas();
        $fasilitas->nama_fasilitas = $request->nama_fasilitas;

        if ($request->hasFile('cover')) {
            $img = $request->file('cover');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/fasilitas', $name);
            $fasilitas->cover = $name;
        }

        $fasilitas->save();
        toast('Data Berhasil Ditambahkan!', 'success')->position('top-end')->autoClose(1000);
        return redirect()->route('fasilitas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fasilitas = Fasilitas::findOrFail($id);
        return view('admin.fasilitas.edit', compact('fasilitas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_fasilitas' => 'required',
        ]);

        $fasilitas = Fasilitas::findOrFail($id);
        $fasilitas->nama_fasilitas = $request->nama_fasilitas;

        if ($request->hasFile('cover')) {
            $fasilitas->deleteImage();
            $img = $request->file('cover');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/fasilitas', $name);
            $fasilitas->cover = $name;
        }

        $fasilitas->save();
        toast('Data Berhasil Diubah!', 'success')->position('top-end')->autoClose(1000);
        return redirect()->route('fasilitas.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fasilitas = Fasilitas::findOrFail($id);
        $fasilitas->deleteImage();
        $fasilitas->delete();
        toast('Data Berhasil Dihapus!', 'success')->position('top-end')->autoClose(1000);
        return redirect()->route('fasilitas.index');
    }
}
