<?php
namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\Request;

class TestimoniController extends Controller
{
    public function index(Request $request)
    {
        $tab = $request->input('tab', 'all');

        $query = Testimoni::query();

        if ($tab === 'approved') {
            $query->where('status', 'approved');
        } elseif ($tab === 'archived') {
            $query->where('status', 'archived');
        }

        $testimoni = $query->get();

        return view('admin.testimoni.index', compact('testimoni', 'tab'));
    }

    public function create()
    {
        return view('admin.testimoni.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'      => 'required',
            'testimoni' => 'required',
            'rating'    => 'required|numeric|min:1|max:5',
            'status'    => 'required|in:approved,pending,rejected',
        ]);
        Testimoni::create($request->all());
        return redirect()->route('testimoni.index')->with('success', 'Testimoni berhasil disimpan!');
    }

    public function edit($id)
    {
        $testimoni = Testimoni::findOrFail($id);
        return view('admin.testimoni.edit', compact('testimoni'));
    }

    public function update(Request $request, $id)
    {
        $testimoni = Testimoni::findOrFail($id);

        // Jika hanya update status
        if ($request->has('status')) {
            $testimoni->status = $request->status;
            $testimoni->save();
            return redirect()->route('testimoni.index')->with('success', 'Status testimoni berhasil diubah!');
        }

        // Jika update data lengkap
        $request->validate([
            'nama'      => 'required',
            'testimoni' => 'required',
            'rating'    => 'required|numeric|min:1|max:5',
            'status'    => 'required|in:approved,pending,rejected',
        ]);
        $testimoni->update($request->all());

        toast('Komentar Berhasil Diubah!', 'success')->position('top-end')->autoClose(1000);
        return redirect()->route('testimoni.index')->with('success', 'Testimoni berhasil diupdate!');
    }

    public function destroy($id)
    {
        $testimoni = Testimoni::findOrFail($id);
        $testimoni->delete();
        return redirect()->route('testimoni.index')->with('success', 'Testimoni berhasil dihapus!');
    }

    public function showTestimoni()
    {
        $testimoni = Testimoni::where('status', 'approved')->latest()->get();
        return view('coba', compact('testimoni'));
    }
}
