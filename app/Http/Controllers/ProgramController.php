<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $program = Program::all();
        confirmDelete('Hapus Program!', 'Apakah Anda Yakin?');
        return view('admin.program.index', compact('program'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $program = Program::all();
        return view('admin.program.create', compact('program'));

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
            'nama_program' => 'required|min:3|unique:programs',
            'deskripsi' => 'required', 'max:255',
        ]);

        $program = new Program();
        $program->nama_program = $request->nama_program;
        $program->deskripsi = $request->deskripsi;
        $program->save();

        return redirect()->route('program.index')->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $program = Program::findOrFail($id);
        return view('admin.program.edit', compact('program'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_program' => 'required|min:3',
            'deskripsi' => 'required', 'max:255',
        ]);

        $program = Program::findOrFail($id);
        $program->nama_program = $request->nama_program;
        $program->deskripsi = $request->deskripsi;
        $program->save();

        return redirect()->route('program.index')->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $program = Program::findOrFail($id);
        $program->delete();

        Alert::success('Success', 'Data Berhasil Dihapus')->autoClose(1000);
        return redirect()->route('program.index');
    }
}
