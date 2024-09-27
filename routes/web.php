<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\ProgramController;
use App\Models\Artikel;
use App\Models\Fasilitas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $artikel = Artikel::all();
    $fasilitas = Fasilitas::all();
    return view('coba', compact('artikel', 'fasilitas'));
});

Auth::routes(
    ['register' => false],
);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/pendaftaran', [App\Http\Controllers\HomeController::class, 'daftar'])->name('pendaftaran');
Route::post('/', [FrontController::class, 'store'])->name('pendaftaran.store');

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::resource('program', ProgramController::class);
    Route::resource('fasilitas', FasilitasController::class);
    Route::resource('artikel', ArtikelController::class);
    Route::resource('pendaftaran', PendaftaranController::class);
});
