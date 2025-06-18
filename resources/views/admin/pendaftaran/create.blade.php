@extends('layouts.admin.template')

@push('style')
<style>
    .form-section {
        background-color: #f9f9f9;
        padding: 2rem;
        border-radius: 0.75rem;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        margin-bottom: 2rem;
    }

    .form-label {
        font-weight: 600;
        color: #333;
    }

    .form-textarea {
        min-height: 120px;
    }

    .invalid-feedback {
        display: block;
    }

    .section-title {
        font-size: 1.25rem;
        font-weight: bold;
        color: #333;
        margin-bottom: 1.25rem;
        border-bottom: 2px solid #e0e0e0;
        padding-bottom: .5rem;
    }
</style>
@endpush

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold">Formulir Pendaftaran</h4>
            <p class="text-muted mb-0">Isi data diri dan data orang tua secara lengkap</p>
        </div>
        <a href="{{ route('pendaftaran.index') }}" class="btn btn-sm btn-secondary">
            <i class="bx bx-arrow-back me-1"></i> Kembali
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body form-section">
            <form action="{{ route('pendaftaran.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- DATA DIRI --}}
                <div class="form-section">
                    <h5 class="section-title"><strong>Data Diri</strong></h5>

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                            name="nama" value="{{ old('nama') }}" placeholder="Masukkan nama lengkap">
                        @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-select @error('jenis_kelamin') is-invalid @enderror">
                            <option value="" disabled selected>Pilih Jenis Kelamin</option>
                            <option value="Laki-Laki" {{ old('jenis_kelamin')=='Laki-Laki' ? 'selected' : '' }}>
                                Laki-Laki</option>
                            <option value="Perempuan" {{ old('jenis_kelamin')=='Perempuan' ? 'selected' : '' }}>
                                Perempuan</option>
                        </select>
                        @error('jenis_kelamin') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir"
                                class="form-control @error('tempat_lahir') is-invalid @enderror"
                                value="{{ old('tempat_lahir') }}" placeholder="Masukkan tempat lahir">
                            @error('tempat_lahir') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir"
                                class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                value="{{ old('tanggal_lahir') }}">
                            @error('tanggal_lahir') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <textarea name="alamat"
                            class="form-control form-textarea @error('alamat') is-invalid @enderror">{{ old('alamat') }}</textarea>
                        @error('alamat') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email') }}" placeholder="Masukkan email">
                        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">No Telepon</label>
                        <input type="tel" name="no_telepon"
                            class="form-control @error('no_telepon') is-invalid @enderror"
                            value="{{ old('no_telepon') }}" placeholder="Contoh: 08XX-XXXX-XXXX" pattern="[0-9+]+"
                            maxlength="20">
                        @error('no_telepon') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Tanggal Pendaftaran</label>
                        <input type="date" name="tanggal_pendaftaran"
                            class="form-control @error('tanggal_pendaftaran') is-invalid @enderror"
                            value="{{ old('tanggal_pendaftaran') }}">
                        @error('tanggal_pendaftaran') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <hr>

                {{-- DATA ORANG TUA / WALI --}}
                <div class="form-section">
                    <h5 class="section-title"><strong>Data Orang Tua / Wali</strong></h5>

                    <div class="mb-3">
                        <label class="form-label">Nama Orang Tua</label>
                        <input type="text" name="nama_orang_tua"
                            class="form-control @error('nama_orang_tua') is-invalid @enderror"
                            value="{{ old('nama_orang_tua') }}" placeholder="Masukkan nama orang tua">
                        @error('nama_orang_tua') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nomor Telepon Orang Tua</label>
                        <input type="tel" name="no_telepon_orang_tua"
                            class="form-control @error('no_telepon_orang_tua') is-invalid @enderror"
                            value="{{ old('no_telepon_orang_tua') }}" placeholder="Contoh: 08XX-XXXX-XXXX"
                            pattern="[0-9+]+" maxlength="20">
                        @error('no_telepon_orang_tua') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Alamat Orang Tua</label>
                        <textarea name="alamat_orang_tua"
                            class="form-control form-textarea @error('alamat_orang_tua') is-invalid @enderror">{{ old('alamat_orang_tua') }}</textarea>
                        @error('alamat_orang_tua') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <hr>

                    <h5 class="section-title"><strong>Informasi Rekening</strong></h5>

                    <div class="mb-3">
                        <label class="form-label">Nomor Rekening</label>
                        <input type="text" name="no_rekening"
                            class="form-control @error('no_rekening') is-invalid @enderror"
                            value="{{ old('no_rekening') }}" placeholder="Masukkan nomor rekening" pattern="[0-9]+"
                            maxlength="30">
                        @error('no_rekening') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Bank</label>
                        <select name="bank" class="form-select @error('bank') is-invalid @enderror">
                            <option value="" selected disabled>Pilih Bank</option>
                            @foreach(['BCA', 'BNI', 'BRI', 'Mandiri', 'BSI', 'CIMB', 'Permata', 'BTN'] as $bank)
                            <option value="{{ $bank }}" {{ old('bank')==$bank ? 'selected' : '' }}>{{ $bank }}</option>
                            @endforeach
                        </select>
                        @error('bank') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                {{-- SUBMIT --}}
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">
                        <i class="bx bx-send me-1"></i> Simpan Pendaftaran
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection