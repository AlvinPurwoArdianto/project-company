<?php

use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\ProgramController;
use App\Models\Fasilitas;
use App\Models\Program;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Exports\PendaftaranExport;
use App\Exports\PengunjungExport;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\VisitorController;
use App\Models\Informasi;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Middleware\LogVisitor;


Route::get('/', function () {
    $program = Program::all();
    $informasi = Informasi::all();
    $fasilitas = Fasilitas::all();
    return view('coba', compact('informasi', 'fasilitas', 'program'));
})->middleware(LogVisitor::class);

Route::get('/informasi/{id}', [Informasi::class, 'show'])->name('informasi');

Route::get('/daftar', function () {
    $program = Program::all();
    return view('pendaftaran',compact('program'));
})->name('daftar');

Auth::routes(
    ['register' => false],
);

Route::get('/pendaftaran', [FrontController::class, 'form'])->name('front.form');
Route::post('/pendaftaran', [FrontController::class, 'store'])->name('front.store');

// Route::get('/pendaftaran', [App\Http\Controllers\HomeController::class, 'daftar'])->name('pendaftaran');
// Route::post('/', [FrontController::class, 'store'])->name('pendaftaran.store');

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    Route::resource('program', ProgramController::class);
    Route::resource('fasilitas', FasilitasController::class);
    Route::resource('informasi', InformasiController::class);
    Route::resource('komentar', KomentarController::class);
    Route::resource('testimoni', TestimoniController::class);


    Route::group(['prefix' => 'laporan'], function () {
        Route::get('/pendaftaran', [LaporanController::class, 'pendaftaran'])->name('laporan.pendaftaran');
        Route::get('/pendaftaran/export', [LaporanController::class, 'pendaftaranPdf'])->name('laporan.pendaftaran.pdf');
        Route::get('/pendaftaran/excel', function() {
            return Excel::download(new PendaftaranExport, 'pendaftaran.xlsx');
        })->name('laporan.pendaftaran.excel');
        Route::get('/pengunjung', [LaporanController::class, 'visitor'])->name('laporan.pengunjung');
        Route::get('/pengunjung/export', [LaporanController::class, 'visitorPdf'])->name('laporan.pengunjung.pdf');
        Route::get('/pengunjung/excel', function() {
            return Excel::download(new PengunjungExport, 'pengunjung.xlsx');
        })->name('laporan.pengunjung.excel');
    });
});
