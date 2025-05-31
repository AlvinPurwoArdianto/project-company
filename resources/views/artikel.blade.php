@extends('layouts.user2.template')

@section('title', $artikel->judul_artikel)

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="mb-4">
                <a href="{{ url('/') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali ke Beranda
                </a>
            </div>

            <div class="row align-items-start">
                {{-- Konten Kiri --}}
                <div class="col-md-6">
                    <h1 class="mb-3 fw-bold">{{ $artikel->judul_artikel }}</h1>
                    <p class="text-muted mb-4">
                        <i class="bi bi-calendar-event"></i>
                        {{ \Carbon\Carbon::parse($artikel->created_at)->format('d F Y') }}
                    </p>

                    <div class="content-article" style="line-height: 1.8;">
                        {!! $artikel->deskripsi !!}
                    </div>
                </div>

                {{-- Gambar Kanan --}}
                <div class="col-md-6 text-center">
                    <img src="{{ asset('/images/artikel/' . $artikel->cover) }}" alt="Cover Artikel"
                        class="img-fluid rounded shadow-sm" style="max-height: 400px; object-fit: cover;">
                </div>
            </div>
        </div>
    </section>
@endsection
