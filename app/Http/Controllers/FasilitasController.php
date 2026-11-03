<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FasilitasController extends Controller
{
    public function index()
    {
        $fasilitas = Fasilitas::latest()->get();
        return view('admin.fasilitas.index', compact('fasilitas'));
    }

    public function create()
    {
        return view('admin.fasilitas.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_fasilitas' => 'required|string|max:150',
            'cover'          => 'required|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        $fasilitas = new Fasilitas();
        $fasilitas->nama_fasilitas = $validated['nama_fasilitas'];

        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();

            try {
                // Upload to Cloudflare R2 CDN
                $path = Storage::disk('r2')->putFileAs('fasilitas', $file, $filename);
                $fasilitas->cover = $path;
            } catch (\Throwable $e) {
                Log::error('R2 upload failed for fasilitas, fallback to local: ' . $e->getMessage());
                // Fallback to local
                $file->move(public_path('images/fasilitas'), $filename);
                $fasilitas->cover = $filename;
            }
        }

        $fasilitas->save();

        toast('Data Fasilitas Berhasil Ditambahkan!', 'success')->position('top-end')->autoClose(1500);
        return redirect()->route('fasilitas.index');
    }

    public function show($id)
    {
        return redirect()->route('fasilitas.index');
    }

    public function edit($id)
    {
        $fasilitas = Fasilitas::findOrFail($id);
        return view('admin.fasilitas.edit', compact('fasilitas'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_fasilitas' => 'required|string|max:150',
            'cover'          => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        $fasilitas = Fasilitas::findOrFail($id);
        $fasilitas->nama_fasilitas = $validated['nama_fasilitas'];

        if ($request->hasFile('cover')) {
            $fasilitas->deleteImage();

            $file = $request->file('cover');
            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();

            try {
                // Upload to Cloudflare R2 CDN
                $path = Storage::disk('r2')->putFileAs('fasilitas', $file, $filename);
                $fasilitas->cover = $path;
            } catch (\Throwable $e) {
                Log::error('R2 upload failed for fasilitas, fallback to local: ' . $e->getMessage());
                $file->move(public_path('images/fasilitas'), $filename);
                $fasilitas->cover = $filename;
            }
        }

        $fasilitas->save();

        toast('Data Fasilitas Berhasil Diperbarui!', 'success')->position('top-end')->autoClose(1500);
        return redirect()->route('fasilitas.index');
    }

    public function destroy($id)
    {
        $fasilitas = Fasilitas::findOrFail($id);
        $fasilitas->deleteImage();
        $fasilitas->delete();

        toast('Data Fasilitas Berhasil Dihapus!', 'success')->position('top-end')->autoClose(1500);
        return redirect()->route('fasilitas.index');
    }
}
