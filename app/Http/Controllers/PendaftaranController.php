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
        // Update all unread records to read
        Pendaftaran::where('is_read', 'unread')->update(['is_read' => 'read']);

        // Get all pendaftaran records
        $pendaftaran = Pendaftaran::orderBy('created_at', 'desc')->get();

        return view('admin.laporan.pendaftaran', compact('pendaftaran'));
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
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function checkNewPendaftaran()
    {
        $data = Pendaftaran::where('is_read', 'unread')
            ->orderBy('id', 'desc')
            ->limit(10)
            ->get();

        return response()->json(['data' => $data]);
    }

}
