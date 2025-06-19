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
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pendaftaran /</span> Tambah pendaftaran</h4>
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-2">Data Diri</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('pendaftaran.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="source" value="admin">
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="nama">Nama Lengkap</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    id="nama" placeholder="Nama Lengkap" name="nama" value="{{ old('nama') }}" />
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
                                <option value="Laki-Laki" {{ old('jenis_kelamin') == 'Laki-Laki' ? 'selected' : '' }}>
                                    Laki-Laki</option>
                                <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>
                                    Perempuan</option>
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
                                <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror"
                                    placeholder="Tempat Lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}" />
                            </div>
                            @error('tempat_lahir')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-sm-5">
                            <div class="input-group input-group-merge">
                                <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                    name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" />
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
                                <textarea class="form-control @error('alamat') is-invalid @enderror" placeholder="Masukan Alamat Anda" name="alamat">{{ old('alamat') }}</textarea>
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
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    placeholder="Masukan Email Anda" name="email" value="{{ old('email') }}" />
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
                                <input type="tel" class="form-control @error('no_telepon') is-invalid @enderror"
                                    placeholder="Contoh 08XX-XXXX-XXXX" name="no_telepon" value="{{ old('no_telepon') }}"
                                    pattern="[0-9+]+" maxlength="20" />
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
                                    name="tanggal_pendaftaran" value="{{ old('tanggal_pendaftaran') }}" />
                            </div>
                            @error('tanggal_pendaftaran')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <hr>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="nama_orang_tua">Nama Orang Tua</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control @error('nama_orang_tua') is-invalid @enderror"
                                    id="nama_orang_tua" placeholder="Nama Orang Tua" name="nama_orang_tua"
                                    value="{{ old('nama_orang_tua') }}" />
                            </div>
                            @error('nama_orang_tua')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="no_telepon_orang_tua">Nomor Telepon Orang Tua</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="tel"
                                    class="form-control @error('no_telepon_orang_tua') is-invalid @enderror"
                                    id="no_telepon_orang_tua" placeholder="Contoh 08XX-XXXX-XXXX"
                                    name="no_telepon_orang_tua" value="{{ old('no_telepon_orang_tua') }}"
                                    pattern="[0-9+]+" maxlength="20" />
                            </div>
                            @error('no_telepon_orang_tua')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Alamat Orang Tua</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <textarea class="form-control @error('alamat_orang_tua') is-invalid @enderror" placeholder="Masukan Alamat Orang Tua"
                                    name="alamat_orang_tua">{{ old('alamat_orang_tua') }}</textarea>
                            </div>
                            @error('alamat_orang_tua')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="no_rekening">Nomor Rekening</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control @error('no_rekening') is-invalid @enderror"
                                    id="no_rekening" placeholder="Masukan Nomor Rekening" name="no_rekening"
                                    value="{{ old('no_rekening') }}" maxlength="30" pattern="[0-9]+"
                                    inputmode="numeric" />
                            </div>
                            @error('no_rekening')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="bank">Bank</label>
                        <div class="col-sm-10">
                            <select name="bank" class="form-control @error('bank') is-invalid @enderror"
                                id="bank">
                                <option value="" selected disabled>Pilih Bank</option>
                                <option value="BCA" {{ old('bank') == 'BCA' ? 'selected' : '' }}>Bank Central Asia
                                    (BCA)</option>
                                <option value="BNI" {{ old('bank') == 'BNI' ? 'selected' : '' }}>Bank Negara Indonesia
                                    (BNI)</option>
                                <option value="BRI" {{ old('bank') == 'BRI' ? 'selected' : '' }}>Bank Rakyat Indonesia
                                    (BRI)</option>
                                <option value="Mandiri" {{ old('bank') == 'Mandiri' ? 'selected' : '' }}>Bank Mandiri
                                </option>
                                <option value="BSI" {{ old('bank') == 'BSI' ? 'selected' : '' }}>Bank Syariah Indonesia
                                    (BSI)</option>
                                <option value="CIMB" {{ old('bank') == 'CIMB' ? 'selected' : '' }}>CIMB Niaga</option>
                                <option value="Permata" {{ old('bank') == 'Permata' ? 'selected' : '' }}>Bank Permata
                                </option>
                                <option value="BTN" {{ old('bank') == 'BTN' ? 'selected' : '' }}>Bank Tabungan Negara
                                    (BTN)</option>
                            </select>
                            @error('bank')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
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
@endsection
