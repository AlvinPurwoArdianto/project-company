<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\Request;

class TestimoniController extends Controller
{
    public function index()
    {
        $testimoni = Testimoni::all();
        return view('admin.testimoni.index', compact('testimoni'));
    }

    public function create()
    {
        return view('admin.testimoni.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'testimoni' => 'required',
            'rating' => 'required|numeric|min:1|max:5',
            'status' => 'required|in:approved,pending,rejected'
        ]);
        Testimoni::create($request->all());
        return redirect()->route('testimoni.index')->with('success', 'Testimoni berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $testimoni = Testimoni::findOrFail($id);
        return view('admin.testimoni.edit', compact('testimoni'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'testimoni' => 'required',
            'rating' => 'required|numeric|min:1|max:5',
            'status' => 'required|in:approved,pending,rejected'
        ]);
        $testimoni = Testimoni::findOrFail($id);
        $testimoni->update($request->all());
        return redirect()->route('testimoni.index')->with('success', 'Testimoni berhasil diupdate!');
    }

    public function destroy($id)
    {
        $testimoni = Testimoni::findOrFail($id);
        $testimoni->delete();
        return redirect()->route('testimoni.index')->with('success', 'Testimoni berhasil dihapus!');
    }
}
