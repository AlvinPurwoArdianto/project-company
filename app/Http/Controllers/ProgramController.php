<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $program = Program::latest()->get();
        confirmDelete('Hapus Program!', 'Apakah Anda yakin ingin menghapus program ini?');
        return view('admin.program.index', compact('program'));
    }

    public function create()
    {
        return view('admin.program.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_program' => 'required|string|min:3|max:150|unique:programs,nama_program',
            'deskripsi'    => 'required|string|max:1000',
        ]);

        Program::create([
            'nama_program' => $validated['nama_program'],
            'deskripsi'    => $validated['deskripsi'],
        ]);

        toast('Program Berhasil Ditambahkan!', 'success')->position('top-end')->autoClose(1500);
        return redirect()->route('program.index');
    }

    public function show($id)
    {
        return redirect()->route('program.index');
    }

    public function edit($id)
    {
        $program = Program::findOrFail($id);
        return view('admin.program.edit', compact('program'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_program' => 'required|string|min:3|max:150|unique:programs,nama_program,' . $id,
            'deskripsi'    => 'required|string|max:1000',
        ]);

        $program = Program::findOrFail($id);
        $program->update([
            'nama_program' => $validated['nama_program'],
            'deskripsi'    => $validated['deskripsi'],
        ]);

        toast('Program Berhasil Diperbarui!', 'success')->position('top-end')->autoClose(1500);
        return redirect()->route('program.index');
    }

    public function destroy($id)
    {
        $program = Program::findOrFail($id);
        $program->delete();

        toast('Program Berhasil Dihapus!', 'success')->position('top-end')->autoClose(1500);
        return redirect()->route('program.index');
    }
}
