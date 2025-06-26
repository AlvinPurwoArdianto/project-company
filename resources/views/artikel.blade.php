@extends('layouts.user2.template')

@section('title', $informasi->nama_informasi)

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="mb-4">
                <a href="{{ url('/') }}" class="btn btn-outline-purple" title="Kembali ke Beranda">
                    <i class="bi bi-arrow-left"></i>
                </a>
            </div>

            <div class="card border-0 shadow-sm overflow-hidden">
                <div class="row g-0">
                    {{-- Gambar Kiri --}}
                    <div class="col-lg-5 position-relative">
                        <img src="{{ asset('/images/informasi/' . $informasi->gambar) }}" alt="Cover informasi"
                            class="w-100 h-100 object-fit-cover" style="min-height: 500px;">
                        <div class="position-absolute bottom-0 start-0 w-100 p-3"
                            style="background: linear-gradient(0deg, rgba(0,0,0,0.7) 0%, rgba(0,0,0,0) 100%);">
                            <p class="text-white mb-0">
                                <i class="bi bi-calendar-event me-2"></i>
                                {{ \Carbon\Carbon::parse($informasi->created_at)->format('d F Y') }}
                            </p>
                        </div>
                    </div>

                    {{-- Konten Kanan --}}
                    <div class="col-lg-7">
                        <div class="p-4 p-lg-5">
                            <h1 class="display-6 fw-bold mb-4">{{ $informasi->nama_informasi }}</h1>
                            <div class="content-article" style="line-height: 1.8; text-align: justify;">
                                {!! $informasi->deskripsi !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Comment Section --}}
            <div class="row mt-5">
                {{-- Kolom Form Komentar --}}
                <div class="col-lg-7">
                    <div class="card shadow-sm border-0">
                        <div class="card-body p-4">
                            <h4 class="card-title mb-4">Berikan Komentar</h4>
                            <form action="{{ route('front.store_komentar', $informasi->id) }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" name="nama" id="nama"
                                        class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}"
                                        placeholder="Masukkan nama Anda">
                                    @error('nama')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" id="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email') }}" placeholder="Masukkan email Anda">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="komentar" class="form-label">Komentar</label>
                                    <textarea name="komentar" id="komentar" rows="4" class="form-control @error('komentar') is-invalid @enderror"
                                        placeholder="Tulis komentar Anda...">{{ old('komentar') }}</textarea>
                                    @error('komentar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Hidden Informasi ID --}}
                                <input type="hidden" name="informasi_id" value="{{ $informasi->id }}">

                                <button type="submit" class="btn btn-primary px-4">
                                    <i class="bi bi-send me-2"></i> Kirim Komentar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- Kolom Komentar Terbaru --}}
                <div class="col-lg-5">
                    <h4 class="mb-3">Komentar Terbaru</h4>

                    <div class="border rounded shadow-sm" style="max-height: 425px; overflow-y: auto;">
                        @forelse($komentar as $comment)
                            @php
                                $colors = [
                                    '#0d6efd',
                                    '#198754',
                                    '#dc3545',
                                    '#fd7e14',
                                    '#6f42c1',
                                    '#20c997',
                                    '#ffc107',
                                    '#6610f2',
                                    '#e83e8c',
                                    '#6c757d',
                                ];
                                $index = crc32($comment->nama ?? '') % count($colors);
                                $color = $colors[$index];
                            @endphp
                            <div class="card mb-3 border-0 shadow-sm">
                                <div class="card-body p-4">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="me-3">
                                            <div class="rounded-circle text-white d-flex align-items-center justify-content-center"
                                                style="width: 40px; height: 40px; background-color: {{ $color }};">
                                                {{ strtoupper(substr($comment->nama ?? '', 0, 1)) }}
                                            </div>
                                        </div>
                                        <div>
                                            <h6 class="fw-bold mb-1">{{ $comment->nama }}</h6>
                                            <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                                        </div>
                                    </div>
                                    <p class="mb-0 text-justify" style="text-align: justify;">{{ $comment->komentar }}</p>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-4">
                                <i class="bi bi-chat-dots display-4 text-muted mb-3"></i>
                                <p class="text-muted">Belum ada komentar. Jadilah yang pertama berkomentar!</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
