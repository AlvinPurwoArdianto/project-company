@extends('layouts.admin.template')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Lihat /</span> Tabel artikel</h4>
        <div class="card mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <form role="form" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label class="mt-2">Judul Artikel</label>
                                                <input type="text" class="form-control mt-2" name="judul_artikel"
                                                    value="{{ $artikel->judul_artikel }}" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label class="mt-2">Deskripsi</label>
                                                <textarea type="text" class="form-control mt-2" name="deskripsi" disabled> {{ $artikel->deskripsi }} </textarea>
                                            </div>
                                            <div class="form-group">
                                                <label class="mt-2">Tanggal</label>
                                                <input type="text" class="form-control mt-2" name="tanggal"
                                                    value="{{ $artikel->tanggal }}" disabled>
                                            </div>
                                            <a href="{{ route('artikel.index') }}"
                                                class="btn btn-sm btn-primary mt-3">Kembali</a>
                                        </form>
                                    </div>
                                    <div class="col-lg-6 my-2">
                                        <form role="form" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <img src="{{ asset('/images/artikel/' . $artikel->cover) }}" width="100%"
                                                    height="100%" class="mt-4">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
