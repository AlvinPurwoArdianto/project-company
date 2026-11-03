<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\Request;

class TestimoniController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $tab = $request->input('tab', 'all');

        $query = Testimoni::query()->latest();

        if ($tab === 'approved') {
            $query->where('status', Testimoni::STATUS_APPROVED);
        } elseif ($tab === 'pending') {
            $query->where('status', Testimoni::STATUS_PENDING);
        } elseif ($tab === 'archived') {
            $query->where('status', Testimoni::STATUS_ARCHIVED);
        }

        $testimoni = $query->get();
        confirmDelete('Hapus Testimoni!', 'Apakah Anda yakin ingin menghapus testimoni ini?');

        return view('admin.testimoni.index', compact('testimoni', 'tab'));
    }

    public function create()
    {
        return view('admin.testimoni.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'      => 'required|string|max:100',
            'testimoni' => 'required|string|max:1000',
            'rating'    => 'required|integer|min:1|max:5',
            'status'    => 'required|in:approved,pending,archived',
        ]);

        Testimoni::create([
            'nama'      => $validated['nama'],
            'testimoni' => $validated['testimoni'],
            'rating'    => $validated['rating'],
            'status'    => $validated['status'],
        ]);

        toast('Testimoni Berhasil Disimpan!', 'success')->position('top-end')->autoClose(1500);
        return redirect()->route('testimoni.index');
    }

    public function edit($id)
    {
        $testimoni = Testimoni::findOrFail($id);
        return view('admin.testimoni.edit', compact('testimoni'));
    }

    public function update(Request $request, $id)
    {
        $testimoni = Testimoni::findOrFail($id);

        // Jika hanya update status (misal dari quick action)
        if ($request->has('status') && !$request->has('nama')) {
            $validated = $request->validate([
                'status' => 'required|in:approved,pending,archived',
            ]);

            $testimoni->update(['status' => $validated['status']]);

            toast('Status Testimoni Berhasil Diubah!', 'success')->position('top-end')->autoClose(1500);
            return redirect()->route('testimoni.index');
        }

        // Update data lengkap
        $validated = $request->validate([
            'nama'      => 'required|string|max:100',
            'testimoni' => 'required|string|max:1000',
            'rating'    => 'required|integer|min:1|max:5',
            'status'    => 'required|in:approved,pending,archived',
        ]);

        $testimoni->update([
            'nama'      => $validated['nama'],
            'testimoni' => $validated['testimoni'],
            'rating'    => $validated['rating'],
            'status'    => $validated['status'],
        ]);

        toast('Testimoni Berhasil Diperbarui!', 'success')->position('top-end')->autoClose(1500);
        return redirect()->route('testimoni.index');
    }

    public function destroy($id)
    {
        $testimoni = Testimoni::findOrFail($id);
        $testimoni->delete();

        toast('Testimoni Berhasil Dihapus!', 'success')->position('top-end')->autoClose(1500);
        return redirect()->route('testimoni.index');
    }
}
