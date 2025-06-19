@extends('layouts.admin.template')

@push('style')
<style>
    .form-section {
        background-color: #f9f9f9;
        padding: 2rem;
        border-radius: 0.75rem;
        box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    }

    .form-label {
        font-weight: 600;
        color: #333;
    }

    .form-textarea {
        min-height: 150px;
    }

    .invalid-feedback {
        display: block;
    }
</style>
@endpush

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold">Tambah Komentar</h4>
            <p class="text-muted mb-0">Isi form berikut untuk menambahkan komentar</p>
        </div>
        <a href="{{ route('komentar.index') }}" class="btn btn-sm btn-secondary">
            <i class="bx bx-arrow-back me-1"></i> Kembali
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body form-section">
            <form action="{{ route('komentar.store') }}" method="POST">
                @csrf

                {{-- Nama --}}
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror"
                        id="nama" name="nama" placeholder="Masukkan nama Anda" value="{{ old('nama') }}">
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Email --}}
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                        id="email" name="email" placeholder="Masukkan email Anda" value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Komentar --}}
                <div class="mb-3">
                    <label class="form-label">Komentar</label>
                    <textarea class="form-control form-textarea @error('komentar') is-invalid @enderror"
                        name="komentar">{{ old('komentar') }}</textarea>
                    @error('komentar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Pilih Informasi --}}
                <div class="mb-4">
                    <label for="informasi_id" class="form-label">Pilih Informasi</label>
                    <select class="form-select @error('informasi_id') is-invalid @enderror" name="informasi_id" id="informasi_id">
                        <option value="" disabled selected>Pilih Informasi</option>
                        @foreach ($informasi as $data)
                            <option value="{{ $data->id }}" {{ old('informasi_id') == $data->id ? 'selected' : '' }}>
                                {{ $data->nama_informasi }}
                            </option>
                        @endforeach
                    </select>
                    @error('informasi_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Button --}}
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">
                        <i class="bx bx-send me-1"></i> Simpan Komentar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection


