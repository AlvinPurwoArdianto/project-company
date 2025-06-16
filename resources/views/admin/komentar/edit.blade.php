@extends('layouts.admin.template')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tabel /</span> Tabel Komentar</h4>
    <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Edit Komentar</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('komentar.update', $komentar->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="nama">Nama</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                id="nama" placeholder="Masukan Nama Anda" name="nama"
                                value="{{ old('nama', $komentar->nama) }}" />
                        </div>
                        @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="email">Email</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                id="email" placeholder="Masukan Email Anda" name="email"
                                value="{{ old('email', $komentar->email) }}" />
                        </div>
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="editor">Komentar</label>
                    <div class="col-sm-10">
                        <textarea class="form-control @error('komentar') is-invalid @enderror" id="editor"
                            name="komentar">{{ old('komentar', $komentar->komentar) }}</textarea>
                        @error('komentar')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="informasi_id">Pilih Informasi</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <select name="informasi_id" class="form-control" id="informasi_id">
                                <option value="" disabled {{ !$komentar->informasi_id ? 'selected' : '' }}>-- Pilih Informasi --</option>
                                @foreach ($informasi as $data)
                                    <option value="{{ $data->id }}"
                                        {{ (old('informasi_id', $komentar->informasi_id) == $data->id) ? 'selected' : '' }}>
                                        {{ $data->nama_informasi }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        @error('informasi_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row justify-content-end">
                    <div class="col-sm-10">
                        <a href="{{ route('informasi.index') }}" class="btn btn-danger">Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection