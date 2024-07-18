<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\ProgramController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(
    ['register' => false],
);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/pendaftaran', [App\Http\Controllers\HomeController::class, 'daftar'])->name('pendaftaran');

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::resource('program', ProgramController::class);
    Route::resource('fasilitas', FasilitasController::class);
    Route::resource('artikel', ArtikelController::class);
    Route::resource('pendaftaran', PendaftaranController::class);
});
