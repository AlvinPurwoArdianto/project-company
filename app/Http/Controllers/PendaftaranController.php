<?php
namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pendaftaran = Pendaftaran::all();
        confirmDelete('Hapus Pendaftaran!', 'Apakah Anda Yakin?');
        return view('admin.pendaftaran.index', compact('pendaftaran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pendaftaran = Pendaftaran::all();
        return view('admin.pendaftaran.create', compact('pendaftaran'));
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
            'nama'                 => 'required',
            'jenis_kelamin'        => 'required',
            'tempat_lahir'         => 'required',
            'tanggal_lahir'        => 'required',
            'alamat'               => 'required',
            'email'                => 'required',
            'no_telepon'           => 'required|min:10',
            'tanggal_pendaftaran'  => 'required',
            'nama_orang_tua'       => 'required',
            'no_telepon_orang_tua' => 'required|min:10',
            'alamat_orang_tua'     => 'required',
            'no_rekening'          => 'required',
            'bank'                 => 'required|in:BCA,BNI,BRI,Mandiri,BSI,CIMB,Permata,BTN',
        ], [
            'bank.required'              => 'Bank wajib dipilih',
            'bank.in'                    => 'Bank yang dipilih tidak valid',
            'no_rekening.required'       => 'Nomor rekening wajib diisi',
            'no_rekening.numeric'        => 'Nomor rekening harus berupa angka',
            'no_rekening.digits_between' => 'Nomor rekening harus antara 10-30 digit',
        ]);

        $pendaftaran = new Pendaftaran();

        $pendaftaran->nama                 = $request->nama;
        $pendaftaran->jenis_kelamin        = $request->jenis_kelamin;
        $pendaftaran->tempat_lahir         = $request->tempat_lahir;
        $pendaftaran->tanggal_lahir        = $request->tanggal_lahir;
        $pendaftaran->alamat               = $request->alamat;
        $pendaftaran->email                = $request->email;
        $pendaftaran->no_telepon           = $request->no_telepon;
        $pendaftaran->tanggal_pendaftaran  = $request->tanggal_pendaftaran;
        $pendaftaran->nama_orang_tua       = $request->nama_orang_tua;
        $pendaftaran->no_telepon_orang_tua = $request->no_telepon_orang_tua;
        $pendaftaran->alamat_orang_tua     = $request->alamat_orang_tua;
        $pendaftaran->no_rekening          = $request->no_rekening;
        $pendaftaran->bank                 = $request->bank;

        $pendaftaran->save();
        Alert::success('Success', 'Data Berhasil Ditambahkan')->autoClose(1000);

        // Cek asal form dan redirect sesuai
        if ($request->source === 'admin') {
            return redirect()->route('pendaftaran.index');
        } else {
            return redirect('/'); // atau redirect()->route('home') jika ada
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        $pendaftaran->delete();
        Alert::success('Success', 'Data Berhasil Dihapus')->autoClose(1000);
        return redirect()->route('pendaftaran.index');
    }
}
