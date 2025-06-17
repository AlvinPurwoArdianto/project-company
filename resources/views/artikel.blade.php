@extends('layouts.user2.template')

@section('title', $artikel->judul_artikel)

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="mb-4">
                <a href="{{ url('/') }}" class="btn btn-outline-purple">
                    <i class="bi bi-arrow-left"></i> Kembali ke Beranda
                </a>
            </div>

            <div class="row align-items-start">
                {{-- Konten Kiri --}}
                <div class="col-md-6">
                    <p class="text-muted mb-4">
                        <i class="bi bi-calendar-event"></i>
                        {{ \Carbon\Carbon::parse($artikel->created_at)->format('d F Y') }}
                    </p>
                    <h1 class="mb-3 fw-bold">{{ $artikel->judul_artikel }}</h1>

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

            {{-- Comment Section --}}
            <div class="row mt-5">
                <div class="col-lg-8">
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Berikan Komentar</h4>
                            <form action="" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="comment" class="form-label">Komentar</label>
                                    <textarea class="form-control" id="comment" name="comment" rows="4" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-send"></i> Kirim Komentar
                                </button>
                            </form>
                        </div>
                    </div>

                    {{-- Display Comments --}}
                    {{-- <div class="mt-4">
                        <h4 class="mb-3">Komentar </h4>
                        @forelse
                            <div class="card mb-3 border-0 shadow-sm">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="card-subtitle mb-2 fw-bold"></h6>
                                        <small class="text-muted"></small>
                                    </div>
                                    <p class="card-text"></p>
                                </div>
                            </div>
                        @empty
                            <p class="text-muted">Belum ada komentar. Jadilah yang pertama berkomentar!</p>
                        @endforelse
                    </div> --}}
                </div>
            </div>
        </div>
    </section>
@endsection