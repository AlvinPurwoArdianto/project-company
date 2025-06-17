@extends('layouts.user2.template')

@section('title', 'Informasi - Victory English School')

@section('content')
    <section class="py-5 bg-light">
        <div class="container">

            <!-- Header -->
            <div class="text-center mb-5" data-aos="fade-up">
                <h1 class="fw-bold mb-3">Informasi Terkini</h1>
                <p class="text-muted">Dapatkan informasi terbaru seputar Victory English School</p>
                <div class="title-underline mx-auto mt-3" style="width: 80px; height: 4px; background: #1c6ce4;"></div>
            </div>

            <!-- Search -->
            <div class="row justify-content-center mb-5">
                <div class="col-md-6">
                    <form action="{{ route('informasi') }}" method="GET">
                        <div class="input-group" data-aos="fade-up" data-aos-delay="100">
                            <input type="text" class="form-control" placeholder="Cari informasi..." name="search"
                                value="{{ request('search') }}">
                            <button class="btn btn-purple" type="submit">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Article Cards -->
            <div class="row g-4">
                @forelse ($artikels as $artikel)
                    <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <a href="{{ route('artikel', $artikel->id) }}" class="text-decoration-none text-dark">
                            <div class="card border-0 shadow-sm h-100 rounded-4 hover-shadow">
                                <div class="position-relative rounded-top-4 overflow-hidden">
                                    <img src="{{ asset('/images/artikel/' . $artikel->cover) }}" class="card-img-top"
                                        alt="{{ $artikel->judul_artikel }}" style="height: 180px; object-fit: cover;">
                                    <span class="position-absolute top-0 end-0 m-2 badge bg-purple text-white small">
                                        {{ \Carbon\Carbon::parse($artikel->created_at)->format('d M Y') }}
                                    </span>
                                </div>
                                <div class="card-body p-3">
                                    <h6 class="fw-bold mb-2">{{ Str::limit($artikel->judul_artikel, 60) }}</h6>
                                    <p class="text-muted small mb-0"
                                        style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                        {!! strip_tags($artikel->deskripsi) !!}
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <div class="alert alert-info">
                            <i class="bi bi-info-circle me-2"></i>
                            Belum ada informasi yang tersedia.
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if ($artikels->total() > 8)
                <div class="mt-5 d-flex justify-content-center">
                    <nav>
                        {{ $artikels->onEachSide(1)->links('vendor.pagination.bootstrap-5') }}
                    </nav>
                </div>
            @endif
        </div>
    </section>
@endsection
