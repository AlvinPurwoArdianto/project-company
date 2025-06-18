@extends('layouts.admin.template')

@push('style')
<style>
    .content-preview {
        border-radius: 0.5rem;
        padding: 1rem;
        background-color: #f9f9f9;
        min-height: 100px;
        border: 1px solid #e0e0e0;
    }

    .img-preview {
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        object-fit: cover;
    }

    .form-label {
        font-weight: 600;
        margin-bottom: 0.5rem;
    }

    .komentar-item {
        background: linear-gradient(90deg, #e3f0fc 0%, #f4f6f9 100%);
        border-radius: 0.5rem;
        padding: 1.25rem 1rem 1rem 1rem;
        margin-bottom: 1.2rem;
        border-left: 5px solid #2563eb;
        box-shadow: 0 2px 8px rgba(37,99,235,0.06);
        transition: box-shadow 0.2s;
    }

    .komentar-item:hover {
        box-shadow: 0 4px 16px rgba(37,99,235,0.13);
    }

    .komentar-meta {
        font-size: 0.92rem;
        color: #4b5563;
        margin-bottom: 0.2rem;
    }

    .komentar-nama {
        font-weight: 600;
        color: #2563eb;
        font-size: 1.08rem;
        letter-spacing: 0.5px;
    }

    .komentar-email {
        color: #64748b;
        font-size: 0.93rem;
        margin-left: 0.4rem;
    }

    .komentar-isi {
        margin-top: 0.5rem;
        font-size: 1.07rem;
        color: #222;
        line-height: 1.6;
    }

    .komentar-waktu {
        font-size: 0.92rem;
        color: #64748b;
        background: #e0e7ef;
        border-radius: 0.4rem;
        padding: 0.25rem 0.7rem;
        margin-top: 0.3rem;
        display: inline-block;
    }

    .komentar-icon {
        color: #2563eb;
        font-size: 1.1rem;
        margin-right: 4px;
        vertical-align: middle;
    }
</style>
@endpush

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold">Detail Informasi</h4>
            <small class="text-muted">Lihat informasi beserta deskripsi dan komentar</small>
        </div>
        <a href="{{ route('informasi.index') }}" class="btn btn-sm btn-secondary">
            <i class="bx bx-arrow-back me-1"></i> Kembali
        </a>
    </div>

    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="mb-3">
                        <label class="form-label">Judul</label>
                        <input type="text" class="form-control" value="{{ $informasi->nama_informasi }}" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <div class="content-preview">{!! $informasi->deskripsi !!}</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tanggal</label>
                        <input type="text" class="form-control"
                            value="{{ \Carbon\Carbon::parse($informasi->tanggal)->translatedFormat('d F Y') }}" readonly>
                    </div>
                </div>

                <div class="col-lg-6">
                    <label class="form-label">Gambar</label>
                    <img src="{{ asset('images/informasi/' . $informasi->gambar) }}"
                        alt="{{ $informasi->nama_informasi }}" width="100%" height="auto" class="img-preview">
                </div>
            </div>
        </div>
    </div>

    {{-- Komentar Section --}}
    <div class="card shadow-sm">
        <div class="card-header bg-info">
            <h6 class="mb-0 text-white"><i class="bx bx-comment-detail me-2"></i>Komentar</h6>
        </div>
        <div class="card-body">
            @if($informasi->komentar->count())
                <div class="row">
                    @foreach($informasi->komentar as $komentar)
                        <div class="col-12 mb-3 mt-2">
                            <div class="komentar-item">
                                <div class="d-flex justify-content-between align-items-start flex-wrap">
                                    <div>
                                        <span class="komentar-nama">
                                            <i class="bx bx-user komentar-icon"></i>{{ $komentar->nama }}
                                        </span>
                                        <span class="komentar-email">
                                            <i class="bx bx-envelope komentar-icon"></i>{{ $komentar->email }}
                                        </span>
                                        <div class="komentar-isi">
                                            {!! $komentar->komentar !!}
                                        </div>
                                    </div>
                                    <div class="text-end komentar-waktu">
                                        <i class="bx bx-time komentar-icon"></i>
                                        {{ $komentar->created_at->translatedFormat('d M Y H:i') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                </div>
            @else
                <p class="text-muted mb-0">Belum ada komentar untuk informasi ini.</p>
            @endif
        </div>
    </div>
</div>
@endsection
