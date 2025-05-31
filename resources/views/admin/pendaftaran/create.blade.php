@extends('layouts.admin.template')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tabel /</span> Tabel pendaftaran</h4>
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Tambah pendaftaran</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('pendaftaran.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="nama">Nama Lengkap</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text"
                                    class="form-control @error('nama') is-invalid @enderror"
                                    id="nama"
                                    placeholder="Nama Lengkap"
                                    name="nama"
                                    value="{{ old('nama') }}" />
                            </div>
                            @error('nama')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                            <select name="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror">
                                <option value="" selected disabled>Pilih Jenis Kelamin</option>
                                <option value="Laki-Laki" {{ old('jenis_kelamin') == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                                <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                            @error('jenis_kelamin')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Tempat & Tanggal Lahir</label>
                        <div class="col-sm-5">
                            <div class="input-group input-group-merge">
                                <input type="text"
                                    class="form-control @error('tempat_lahir') is-invalid @enderror"
                                    placeholder="Tempat Lahir"
                                    name="tempat_lahir"
                                    value="{{ old('tempat_lahir') }}" />
                            </div>
                            @error('tempat_lahir')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-sm-5">
                            <div class="input-group input-group-merge">
                                <input type="date"
                                    class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                    name="tanggal_lahir"
                                    value="{{ old('tanggal_lahir') }}" />
                            </div>
                            @error('tanggal_lahir')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <textarea class="form-control @error('alamat') is-invalid @enderror"
                                    placeholder="Masukan Alamat Anda"
                                    name="alamat">{{ old('alamat') }}</textarea>
                            </div>
                            @error('alamat')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    placeholder="Masukan Email Anda"
                                    name="email"
                                    value="{{ old('email') }}" />
                            </div>
                            @error('email')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">No Telepon</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="tel"
                                    class="form-control @error('no_telepon') is-invalid @enderror"
                                    placeholder="Contoh 08xxxxxx"
                                    name="no_telepon"
                                    value="{{ old('no_telepon') }}" />
                            </div>
                            @error('no_telepon')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Tanggal Daftar</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="date"
                                    class="form-control @error('tanggal_pendaftaran') is-invalid @enderror"
                                    name="tanggal_pendaftaran"
                                    value="{{ old('tanggal_pendaftaran') }}" />
                            </div>
                            @error('tanggal_pendaftaran')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <a href="{{ route('pendaftaran.index') }}" class="btn btn-danger">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection