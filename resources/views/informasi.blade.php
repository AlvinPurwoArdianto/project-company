@extends('layouts.user.template')

@section('title', 'Informasi - Victory English School')

@section('content')<section class="py-5 perubahan-pertama"
        style="background: linear-gradient(135deg, #f3e8ff, #fdfcff);">
        <div class="bg-bubble">
            <span style="width: 150px; height: 150px; top: 20%; left: 5%;"></span>
            <span style="width: 150px; height: 150px; top: 60%; left: 10%;"></span>
            <span style="width: 150px; height: 150px; top: 40%; left: 85%;"></span>
            <span style="width: 150px; height: 150px; top: 10%; left: 75%;"></span>
            <span style="width: 150px; height: 150px; top: 70%; left: 60%;"></span>
            <span style="width: 150px; height: 150px; top: 90%; left: 40%;"></span>
            <span style="width: 150px; height: 150px; top: 75%; left: 80%;"></span>
            <span style="width: 150px; height: 150px; top: 100%; left: 90%;"></span>
            <span style="width: 150px; height: 150px; top: 110%; left: 50%;"></span>
            <span style="width: 150px; height: 150px; top: 150%; left: 20%;"></span>
            <span style="width: 150px; height: 150px; top: 120%; left: 5%;"></span>
            <span style="width: 150px; height: 150px; top: 130%; left: 70%;"></span>
            <span style="width: 150px; height: 150px; top: 150%; left: 90%;"></span>
        </div>
        <div class="container">
            <!-- Header -->
            <div class="text-center mb-5" data-aos="fade-up">
                <a href="{{ url('/') }}" class="btn-daftar btn-sm rounded-pill" style="border: 2px solid #a03bff;">
                    <i class="bi bi-house-door-fill"></i> Beranda
                </a>
                <h1 class="fw-bold mb-2" style="color: #675875;">Informasi Terkini</h1>
                <p class="text-muted">Dapatkan informasi terbaru seputar Victory English School</p>
                <div class="title-underline mx-auto mt-3" style="width: 100px; height: 4px; background: #a03bff;"></div>
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
                @forelse ($informasi as $data)
                    <div class="col-xl-3 col-lg-4 col-6" data-aos="fade-up" data-aos-delay="100">
                        <a href="{{ route('informasi_detail', $data->slug) }}" class="text-decoration-none text-dark">
                            <div class="card border-0 shadow-sm h-100 rounded-4 hover-shadow">
                                <div class="position-relative rounded-top-4 overflow-hidden">
                                    <img src="{{ asset('/images/informasi/' . $data->gambar) }}" class="card-img-top"
                                        alt="{{ $data->nama_informasi }}" style="height: 180px; object-fit: cover;">
                                    <span class="position-absolute top-0 end-0 m-2 badge text-white small"
                                        style="background-color: #b036f7">
                                        {{ \Carbon\Carbon::parse($data->created_at)->locale('id')->translatedFormat('d F Y') }}
                                    </span>
                                </div>
                                <div class="card-body p-3">
                                    <h6 class="fw-bold mb-2">{{ Str::limit($data->nama_informasi, 55) }}</h6>
                                    <p class="text-muted small mb-0"
                                        style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                        {!! strip_tags($data->deskripsi) !!}
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        @if (request()->has('search') && request('search') !== '')
                            <div class="alert alert-warning">
                                <i class="bi bi-exclamation-circle me-2"></i>
                                Tidak ada hasil untuk pencarian: <strong>"{{ request('search') }}"</strong>
                            </div>
                        @else
                            <div class="alert alert-info">
                                <i class="bi bi-info-circle me-2"></i>
                                Belum ada informasi yang tersedia.
                            </div>
                        @endif
                    </div>
                @endempty
        </div>
    </div>
    <!-- Pagination -->
    @if ($informasi->total() > 8)
        <div class="mt-5 d-flex justify-content-center">
            <nav>
                {{ $informasi->onEachSide(1)->links('vendor.pagination.bootstrap-5') }}
            </nav>
        </div>
    @endif
    </div>
</section>
@endsection
