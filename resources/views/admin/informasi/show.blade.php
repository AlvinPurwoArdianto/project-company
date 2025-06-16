@extends('layouts.admin.template')

@push('style')
<style>
    .content-preview {
        border: 1px solid #ddd;
        border-radius: 0.375rem;
        padding: 1rem;
        background-color: #fff;
        min-height: 100px;
    }
    .img-preview {
        max-width: 100%;
        height: auto;
        border-radius: 0.375rem;
    }
    .form-label {
        font-weight: 500;
        margin-bottom: 0.5rem;
    }
</style>
@endpush

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Lihat /</span> Detail Informasi</h4>
    <div class="card mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Judul</label>
                        <input type="text"
                            class="form-control"
                            value="{{ $informasi->nama_informasi }}"
                            readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <div class="content-preview">
                            {!! $informasi->deskripsi !!}
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tanggal</label>
                        <input type="text"
                            class="form-control"
                            value="{{ \Carbon\Carbon::parse($informasi->tanggal)->format('d F Y') }}"
                            readonly>
                    </div>

                    <a href="{{ route('informasi.index') }}"
                        class="btn btn-secondary">
                        <i class="bx bx-arrow-back me-1"></i> Kembali
                    </a>
                </div>

                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Gambar</label>
                        <div class="position-relative">
                            <img src="{{ asset('images/informasi/' . $informasi->gambar) }}"
                                alt="{{ $informasi->nama_informasi }}"
                                class="img-preview">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection