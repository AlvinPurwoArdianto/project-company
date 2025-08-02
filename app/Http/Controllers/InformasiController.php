<?php
namespace App\Http\Controllers;

use App\Models\Informasi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class InformasiController extends Controller
{
    public function index()
    {
        $informasi = Informasi::all();
        confirmDelete('Hapus Informasi!', 'Apakah Anda Yakin?');
        return view('admin.informasi.index', compact('informasi'));
    }

    public function create()
    {
        $informasi = Informasi::all();
        return view('admin.informasi.create', compact('informasi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_informasi' => 'required|unique:informasis',
            'deskripsi'      => 'required',
            'gambar'         => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:3084',
        ]);

        $informasi                 = new Informasi();
        $informasi->nama_informasi = $request->nama_informasi;
        $informasi->deskripsi      = $request->deskripsi;
        $informasi->slug           = Str::slug($request->nama_informasi);

        if ($request->hasFile('gambar')) {
            $img  = $request->file('gambar');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/informasi', $name);
            $informasi->gambar = $name;
        }

        $informasi->tanggal = $request->tanggal;

        $informasi->save();

        toast('Data Berhasil Ditambahkan!', 'success')->position('top-end')->autoClose(1000);
        return redirect()->route('informasi.index');

    }

    public function show($id)
    {
        $informasi = Informasi::with('komentar')->findOrFail($id);

        // Cek jika route saat ini route admin
        if (request()->is('admin/*')) {
            return view('admin.informasi.show', compact('informasi'));
        }

        // Jika bukan admin (frontend)
        return view('informasi', compact('informasi'));
    }

    public function edit($id)
    {
        $informasi = Informasi::findOrFail($id);
        return view('admin.informasi.edit', compact('informasi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_informasi' => 'required',
            'deskripsi'      => 'required',
            'gambar'         => 'image|mimes:jpeg,png,jpg,gif,svg|max:3084',
        ]);

        $informasi                 = Informasi::findOrFail($id);
        $informasi->nama_informasi = $request->nama_informasi;
        $informasi->deskripsi      = $request->deskripsi;
        $informasi->tanggal        = $request->tanggal;

        if ($request->hasFile('gambar')) {
            $informasi->deleteImage();
            $img  = $request->file('gambar');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/informasi', $name);
            $informasi->gambar = $name;
        }

        $informasi->update();

        toast('Data Berhasil Diubah!', 'success')->position('top-end')->autoClose(1000);
        return redirect()->route('informasi.index');
    }

    public function destroy($id)
    {
        $informasi = Informasi::findOrFail($id);
        $informasi->deleteImage();
        $informasi->delete();

        toast('Data Berhasil Dihapus!', 'success')->position('top-end')->autoClose(1000);
        return redirect()->route('informasi.index');
    }

    public function informasi_detail($id)
    {
        $informasi = Informasi::findOrFail($id);
        return view('artikel', compact('informasi'));
    }

    public function informasi(Request $request)
    {
        $request->validate([
            'search' => 'nullable|string|max:100',
        ]);

        $query = Informasi::query();

        if ($request->filled('search')) {
            $query->where('nama_informasi', 'like', '%' . $request->search . '%');
        }

        $informasi = $query->latest()->paginate(8);

        return view('informasi', compact('informasi'));
    }
}
