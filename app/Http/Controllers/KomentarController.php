<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use App\Models\Komentar;
use Illuminate\Http\Request;

class KomentarController extends Controller
{
    public function index()
    {
        $informasi = Informasi::all();
        $komentar  = Komentar::with('informasi')->get();

        return view('admin.komentar.index', compact('komentar', 'informasi'));
    }

    // public function edit($id)
    // {
    //     $komentar = Komentar::findOrFail($id);
    //     $informasi = Informasi::all();

    //     return view('admin.komentar.edit', compact('komentar', 'informasi'));
    // }

    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'nama' => 'required',
    //         'email' => 'required|email',
    //         'komentar' => 'required',
    //         'informasi_id' => 'required|exists:informasis,id',
    //     ]);

    //     $komentar = Komentar::findOrFail($id);
    //     $komentar->update($request->all());

    //     toast('Komentar Berhasil Diupdate!', 'success')->position('top-end')->autoClose(1000);
    //     return redirect()->route('komentar.index');
    // }
    public function destroy($id)
    {
        $komentar = Komentar::findOrFail($id);
        $komentar->delete();

        toast('Komentar Berhasil Dihapus!', 'success')->position('top-end')->autoClose(1000);
        return redirect()->route('komentar.index');
    }
}
