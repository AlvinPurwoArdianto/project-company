<?php
namespace App\Http\Controllers;

use App\Models\Fasilitas;
use App\Models\Informasi;
use App\Models\Komentar;
use App\Models\Pendaftaran;
use App\Models\Program;
use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    public function index()
    {
        $program   = Program::all();
        $informasi = collect(DB::select('SELECT * FROM informasis ORDER BY id DESC LIMIT 4'));
        $fasilitas = Fasilitas::all();
        $testimoni = Testimoni::where('status', 'approved')->orderByDesc('id')->take(5)->get();

        return view('index', compact('informasi', 'fasilitas', 'testimoni', 'program'));
    }

    // app/Http/Controllers/YourControllerName.php (misalnya InformasiController.php)

    public function detail_informasi($slug)
    {
        $informasi = Informasi::where('slug', $slug)->firstOrFail();
        $komentar  = Komentar::where('informasi_id', $informasi->id)->get();

        // --- LOGIKA UNTUK MENYIMPAN REFERER ---
        $previousUrl = url()->previous();

        if ($previousUrl !== url()->current() && ! str_contains($previousUrl, route('komentar.store', [], false))) {
            session(['last_visited_from_detail' => $previousUrl]);
        } else {
            if (! session()->has('last_visited_from_detail')) {
                session(['last_visited_from_detail' => url('index')]); // Ganti ke route beranda jika perlu
            }
        }
        // --- AKHIR LOGIKA PENYIMPANAN REFERER ---

        return view('detail_informasi', compact('informasi', 'komentar'));
    }

    // pendaftaran
    public function pendaftaran()
    {
        $program = Program::all();
        return view('pendaftaran', compact('program'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'                => 'required',
            'jenis_kelamin'       => 'required',
            'tempat_lahir'        => 'required',
            'tanggal_lahir'       => 'required',
            'alamat'              => 'required',
            'email'               => 'required',
            'no_telepon'          => 'required|min:10',
            'tanggal_pendaftaran' => 'required',
            // 'nama_orang_tua'       => 'required',
            // 'no_telepon_orang_tua' => 'min:10',
            // 'alamat_orang_tua'     => 'required',
            // 'no_rekening'         => 'required',
            // 'bank'                => 'required|in:BCA,BNI,BRI,Mandiri,BSI,CIMB,Permata,BTN',
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
        // $pendaftaran->no_rekening          = $request->no_rekening;
        // $pendaftaran->bank                 = $request->bank;

        $pendaftaran->save();
        // Alert::success('Success', 'Data Berhasil Ditambahkan')->autoClose(1000);
        return redirect('/')->with('success', 'Pendaftaran berhasil! Silakan cek whatsapp untuk informasi selanjutnya.');
    }
    // penutup pendaftaran

    // komentar
    public function komentar()
    {
        $informasi = Informasi::all();
        $komentar  = Komentar::all();

        return view('detail_informasi', compact('informasi', 'komentar'));
    }

    public function store_komentar(Request $request)
    {
        $request->validate([
            'nama'         => 'required',
            'email'        => 'required|email',
            'komentar'     => 'required',
            'informasi_id' => 'required|exists:informasis,id',
        ]);

        Komentar::create($request->all());

        // Ambil slug dari informasi
        $informasi = Informasi::findOrFail($request->informasi_id);

        // Redirect ke halaman detail berdasarkan slug
        return redirect()->route('informasi_detail', ['slug' => $informasi->slug]);
    }
    // penutup komentar

    // testimoni
    public function store_testimoni(Request $request)
    {
        $request->validate([
            'nama'      => 'required',
            'testimoni' => 'required',
            'rating'    => 'required|numeric|min:1|max:5',
            'status'    => 'required|in:approved,pending,rejected',
        ]);
        Testimoni::create($request->all());
        return redirect('/')->with('success', 'Terima Kasih telah memberikan testimoni anda!');
    }
    // penutup testimoni

    public function form()
    {
        return view('pendaftaran.register');
    }
}
