@extends('layouts.admin.template')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h4 class="fw-bold mb-1">Tambah Fasilitas</h4>
            <small class="text-muted">Masukkan data fasilitas baru ke sistem</small>
        </div>
        <a href="{{ route('fasilitas.index') }}" class="btn btn-sm btn-secondary">
            <i class="bx bx-arrow-back me-1"></i> Kembali
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('fasilitas.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="nama_fasilitas" class="form-label">Nama Fasilitas</label>
                    <input type="text"
                        class="form-control @error('nama_fasilitas') is-invalid @enderror"
                        id="nama_fasilitas"
                        name="nama_fasilitas"
                        placeholder="Masukkan nama fasilitas"
                        value="{{ old('nama_fasilitas') }}">
                    @error('nama_fasilitas')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="cover" class="form-label">Cover</label>
                    <input type="file"
                        class="form-control @error('cover') is-invalid @enderror"
                        id="cover"
                        name="cover"
                        accept="image/*">
                    <div class="form-text">Format: PNG, JPG, JPEG. Maks: 2MB</div>
                    @error('cover')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
