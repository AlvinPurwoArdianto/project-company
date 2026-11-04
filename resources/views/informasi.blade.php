@extends('layouts.user.template')

@section('title', 'Informasi & Artikel - Victory English School')

@section('content')
<div class="pendaftaran-page" style="padding-top: 120px; min-height: 85vh;">
    <div class="container" data-aos="fade-up">

        <!-- Navigasi Balik -->
        <div class="mb-4">
            <a href="{{ url('/') }}" class="text-decoration-none fw-semibold small d-inline-flex align-items-center gap-2 px-3 py-2 rounded-pill bg-white border shadow-sm" style="color: var(--purple-primary);">
                <i class="bi bi-arrow-left"></i> Kembali ke Beranda
            </a>
        </div>

        <!-- Header Card Informasi -->
        <div class="pendaftaran-header-card mb-4" data-aos="fade-up" data-aos-delay="50">
            <div class="row align-items-center">
                <div class="col-12 col-md-9">
                    <span class="hero-badge mb-2">Publikasi & Artikel &bull; Victory English School</span>
                    <h1 class="fw-bold text-white mb-2" style="font-size: clamp(1.8rem, 3.5vw, 2.5rem);">
                        Informasi dan Kabar Terbaru
                    </h1>
                    <p class="mb-0 text-white" style="opacity: 0.9; font-size: 0.95rem; line-height: 1.6;">
                        Temukan tips belajar bahasa Inggris, panduan kursus, persiapan ujian, serta pengumuman seputar kegiatan di Victory English School.
                    </p>
                </div>
            </div>
        </div>

        <!-- Form Pencarian Modern -->
        <div class="row justify-content-center mb-5" data-aos="fade-up" data-aos-delay="100">
            <div class="col-12 col-md-7 col-lg-6">
                <form action="{{ route('informasi') }}" method="GET">
                    <div class="input-group shadow-sm rounded-pill overflow-hidden bg-white p-1 border" style="border-color: var(--purple-border) !important;">
                        <input type="text" class="form-control border-0 ps-4 shadow-none"
                            placeholder="Cari artikel atau pengumuman..." name="search"
                            value="{{ request('search') }}" style="font-size: 0.95rem;">
                        <button class="btn-purple-primary px-4 py-2 rounded-pill d-flex align-items-center gap-2" type="submit">
                            <i class="bi bi-search"></i> Cari
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Article Cards Grid -->
        <div class="row g-4">
            @forelse ($informasi as $data)
                <div class="col-12 col-md-6 col-lg-4 col-xl-3 d-flex" data-aos="fade-up" data-aos-delay="100">
                    <div class="purple-card p-0 overflow-hidden d-flex flex-column w-100">
                        <div class="position-relative bg-light" style="height: 180px;">
                            <img src="{{ $data->gambar_url }}" class="w-100 h-100" style="object-fit: cover;"
                                alt="{{ $data->nama_informasi }}"
                                onerror="this.src='{{ asset('user/assets/img/logo mini.png') }}'">
                            <div class="position-absolute top-0 end-0 m-3 badge text-white shadow-sm small py-1 px-2 fw-semibold" style="background-color: var(--purple-primary);">
                                {{ \Carbon\Carbon::parse($data->created_at)->locale('id')->translatedFormat('d M Y') }}
                            </div>
                        </div>
                        <div class="p-3 d-flex flex-column flex-grow-1">
                            <h5 class="fw-bold mb-2 text-dark" style="font-size: 1.05rem; line-height: 1.4;">
                                <a href="{{ route('informasi_detail', $data->slug) }}" class="text-dark text-decoration-none">
                                    {{ Str::limit($data->nama_informasi, 50) }}
                                </a>
                            </h5>
                            <p class="text-muted small mb-3 flex-grow-1" style="line-height: 1.6;">
                                {!! Str::limit(strip_tags($data->deskripsi), 75) !!}
                            </p>
                            <div class="pt-2 border-top mt-auto">
                                <a href="{{ route('informasi_detail', $data->slug) }}" class="text-decoration-none fw-semibold small" style="color: var(--purple-primary);">
                                    Baca Selengkapnya &rarr;
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <div class="purple-card d-inline-block text-center" style="max-width: 480px;">
                        @if (request()->has('search') && request('search') !== '')
                            <i class="bi bi-search fs-1 mb-2 d-block" style="color: var(--purple-primary);"></i>
                            <h5 class="fw-bold text-dark mb-2">Tidak Ditemukan</h5>
                            <p class="text-muted small mb-3">Tidak ada artikel yang cocok dengan kata kunci: <strong>"{{ request('search') }}"</strong></p>
                            <a href="{{ route('informasi') }}" class="btn-purple-outline py-2 px-3 small">Tampilkan Semua</a>
                        @else
                            <i class="bi bi-newspaper fs-1 mb-2 d-block" style="color: var(--purple-primary);"></i>
                            <h5 class="fw-bold text-dark mb-2">Belum Ada Informasi</h5>
                            <p class="text-muted small mb-0">Artikel edukasi dan pengumuman terbaru akan segera ditampilkan.</p>
                        @endif
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if ($informasi->hasPages())
            <div class="mt-5 d-flex justify-content-center">
                <nav>
                    {{ $informasi->onEachSide(1)->links('vendor.pagination.bootstrap-5') }}
                </nav>
            </div>
        @endif

    </div>
</div>
@endsection
