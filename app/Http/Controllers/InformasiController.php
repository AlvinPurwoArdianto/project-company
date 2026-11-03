<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class InformasiController extends Controller
{
    public function index()
    {
        $informasi = Informasi::latest()->get();
        confirmDelete('Hapus Informasi!', 'Apakah Anda yakin ingin menghapus data ini?');
        return view('admin.informasi.index', compact('informasi'));
    }

    public function create()
    {
        return view('admin.informasi.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_informasi' => 'required|string|max:200|unique:informasis,nama_informasi',
            'deskripsi'      => 'required|string',
            'tanggal'        => 'required|date',
            'gambar'         => 'required|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        $informasi                 = new Informasi();
        $informasi->nama_informasi = $validated['nama_informasi'];
        $informasi->deskripsi      = $validated['deskripsi'];
        $informasi->slug           = Str::slug($validated['nama_informasi']);
        $informasi->tanggal        = $validated['tanggal'];

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();

            try {
                // Upload to Cloudflare R2 CDN
                $path = Storage::disk('r2')->putFileAs('informasi', $file, $filename);
                $informasi->gambar = $path;
            } catch (\Throwable $e) {
                Log::error('R2 upload failed for informasi, fallback to local: ' . $e->getMessage());
                $file->move(public_path('images/informasi'), $filename);
                $informasi->gambar = $filename;
            }
        }

        $informasi->save();

        toast('Informasi Berhasil Ditambahkan!', 'success')->position('top-end')->autoClose(1500);
        return redirect()->route('informasi.index');
    }

    public function show($id)
    {
        $informasi = Informasi::with('komentar')->findOrFail($id);

        if (request()->is('admin/*')) {
            return view('admin.informasi.show', compact('informasi'));
        }

        return view('informasi', compact('informasi'));
    }

    public function edit($id)
    {
        $informasi = Informasi::findOrFail($id);
        return view('admin.informasi.edit', compact('informasi'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_informasi' => 'required|string|max:200|unique:informasis,nama_informasi,' . $id,
            'deskripsi'      => 'required|string',
            'tanggal'        => 'required|date',
            'gambar'         => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        $informasi                 = Informasi::findOrFail($id);
        $informasi->nama_informasi = $validated['nama_informasi'];
        $informasi->slug           = Str::slug($validated['nama_informasi']);
        $informasi->deskripsi      = $validated['deskripsi'];
        $informasi->tanggal        = $validated['tanggal'];

        if ($request->hasFile('gambar')) {
            $informasi->deleteImage();

            $file = $request->file('gambar');
            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();

            try {
                // Upload to Cloudflare R2 CDN
                $path = Storage::disk('r2')->putFileAs('informasi', $file, $filename);
                $informasi->gambar = $path;
            } catch (\Throwable $e) {
                Log::error('R2 upload failed for informasi, fallback to local: ' . $e->getMessage());
                $file->move(public_path('images/informasi'), $filename);
                $informasi->gambar = $filename;
            }
        }

        $informasi->save();

        toast('Informasi Berhasil Diperbarui!', 'success')->position('top-end')->autoClose(1500);
        return redirect()->route('informasi.index');
    }

    public function destroy($id)
    {
        $informasi = Informasi::findOrFail($id);
        $informasi->deleteImage();
        $informasi->delete();

        toast('Informasi Berhasil Dihapus!', 'success')->position('top-end')->autoClose(1500);
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
            $query->where('nama_informasi', 'ilike', '%' . $request->search . '%');
        }

        $informasi = $query->latest()->paginate(8);

        return view('informasi', compact('informasi'));
    }
}
