@extends('layouts.user.template')
@section('content')
    <main class="main perubahan-pertama">
        <!-- Hero Section -->
        <section id="hero" class="hero section position-relative overflow-hidden">
            <!-- Gambar kecil di pojok kanan atas -->
            <div class="hero-corner-img">
                <img src="{{ asset('user/assets/img/logo mini.png') }}" alt="Logo Mini" class="img-fluid">
            </div>

            <div class="container">
                <div class="row gy-4 align-items-center">
                    <!-- Teks -->
                    <div class="col-12 col-md-6 text-start d-flex flex-column justify-content-center" data-aos="fade-up">
                        <h2 class="hero-title">Bersiap Jadi Fasih Berbahasa Inggris!</h1>
                            <h3 class="hero-subtitle">
                                Bersama <span class="highlighted">Victory English School</span>
                            </h3>
                            <p class="hero-description">
                                Metode belajar interaktif, menyenangkan, dan terbukti efektif sejak 1998. Belajar lebih
                                mudah
                                bersama guru yang peduli dan berpengalaman. <br>
                                Daftar sekarang untuk mendapatkan pengalaman belajar terbaik dari pengajar profesional!
                            </p>
                            <a href="{{ route('daftar') }}" class="btn-daftar">Daftar Sekarang</a>
                    </div>

                    <!-- Gambar anak besar -->
                    <div class="col-lg-6 order-1 order-lg-2 hero-img text-center" data-aos="zoom-out" data-aos-delay="100">
                        <img src="{{ asset('user/assets/img/anak3.png') }}" class="img-fluid hero-main-img"
                            alt="Ilustrasi Anak">
                    </div>
                </div>
            </div>
        </section>

        <!-- /Hero Section -->

        <!-- About Section -->
        <section id="profil" class="profil section">
            <div class="background-decor">
                <div class="rotating-arrow"></div>
                <div class="bubble bubble-1"></div>
                <div class="bubble bubble-2"></div>
                <div class="bubble bubble-3"></div>
            </div>
            <!-- Section Title -->
            <div class="container section-title text-center" data-aos="fade-up">
                <h2 class="stylish-title">Profil</h2>
                <div class="underline-decor"></div>
            </div>

            <div class="container">
                <div class="row gy-4 align-items-center">
                    <div class="col-12 col-lg-6 order-1 order-lg-1 text-center" data-aos="fade-up" data-aos-delay="100">
                        <div class="photo-frame">
                            <img src="{{ asset('user/assets/img/logo mini.png') }}" class="img-fluid"
                                alt="Victory English School">
                        </div>
                    </div>
                    <!-- Teks -->
                    <div class="col-12 col-lg-6 order-2 order-lg-2 content" data-aos="fade-up" data-aos-delay="200"
                        style="font-size: 1rem; line-height: 1.8; text-align: justify;">
                        <p class="mb-4">
                            Sejak tahun 1998, <b class="victory">VICTORY</b> <b class="english">ENGLISH SCHOOL</b> telah
                            melayani masyarakat Bandung dan sekitarnya
                            dengan program-program bahasa Inggris yang efektif dan ekonomis. <b class="victory">VICTORY</b>
                            <b class="english">ENGLISH SCHOOL</b> memberikan dukungan komprehensif agar siswa dapat
                            mengambil manfaat praktis secara maksimal dari belajar bahasa Inggris.
                        </p>

                        <p>
                            <b class="victory">VICTORY</b> <b class="english">ENGLISH SCHOOL</b> memiliki metode pengajaran
                            yang sangat berbeda
                            dengan lembaga-lembaga bahasa Inggris lainnya, sehingga semua siswa — baik dewasa, remaja, atau
                            anak-anak (TK, SD, SMP, SMA/SMK, Mahasiswa, Karyawan, atau Guru) — dapat belajar bahasa Inggris
                            lisan dan tulisan dengan baik. <b class="victory">VICTORY</b> <b class="english">ENGLISH
                                SCHOOL</b> memiliki tenaga pengajar
                            yang profesional dan
                            berpengalaman dalam mengajar bahasa Inggris serta memahami dan memperhatikan kebutuhan belajar
                            setiap siswa.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- /About Section -->

        <!-- Featured Services Section -->
        <section id="program" class="featured-services section"
            style="background: #e6cfff; position: relative; overflow: hidden;">
            <!-- Elemen dekoratif putih -->
            <div
                style="position: absolute; top: -50px; left: -50px; width: 150px; height: 150px; background: #ffffff; border-radius: 50%; opacity: 0.3;">
            </div>
            <div
                style="position: absolute; bottom: -60px; right: -60px; width: 200px; height: 200px; background: #ffffff; border-radius: 50%; opacity: 0.2;">
            </div>
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                {{-- <span style="color: #0E1F5223">Program<br></span> --}}
                <h2 class="stylish-title">Program</h2>
                <div class="underline-decor"></div>
            </div><!-- End Section Title -->

            <div class="container">
                <div class="row gy-4">
                    @foreach ($program as $data)
                        <div class="col-12 col-md-6 col-lg-3 d-flex" data-aos="zoom-in" data-aos-delay="100">
                            <div class="service-item position-relative w-100">
                                <h4 class="text-center">{{ $data->nama_program }}</h4>
                                <p>{!! $data->deskripsi !!}</p>
                            </div>
                        </div><!-- End Service Item -->
                    @endforeach
                </div>
            </div>
        </section>
        <!-- /Featured Services Section -->

        <!-- Services Section -->
        <section id="fasilitas" class="fasilitas section py-5">
            <div class="container section-title text-center mb-5" data-aos="fade-up">
                {{-- <span style="color: #0E1F52; opacity: 0.2;">Fasilitas</span> --}}
                <h2 class="stylish-title">Fasilitas</h2>
                <div class="underline-decor"></div>
            </div>

            <div class="container">
                <div class="row justify-content-center g-4">
                    @foreach ($fasilitas->take(6) as $data)
                        <div class="col-6 col-sm-4 col-md-3 col-lg-2" data-aos="fade-up" data-aos-delay="100">
                            <div class="facility-card h-100 rounded-4 shadow-sm hover-lift"
                                style="background: white; transition: all 0.3s ease;">
                                <div class="facility-img-wrapper p-2">
                                    <img src="{{ asset('/images/fasilitas/' . $data->cover) }}"
                                        alt="{{ $data->nama_fasilitas }}" class="img-fluid rounded-3"
                                        style="height: 120px; width: 100%; object-fit: cover;">
                                </div>
                                <div class="facility-content px-2 pb-3 text-center">
                                    <h5 class="fw-semibold mb-0" style="font-size: 0.9rem; color: #1a1a1a;">
                                        {{ $data->nama_fasilitas }}
                                    </h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                @if ($fasilitas->count() >= 6)
                    <div class="text-center mt-4">
                        <button type="button" class="btn-daftar" style="border: none" data-bs-toggle="modal"
                            data-bs-target="#fasilitasModal">
                            Lihat Semua Fasilitas <i class="bi bi-arrow-right"></i>
                        </button>
                    </div>
                @endif
            </div>

            <!-- SVG Wave Ornamen Layered Tinggi -->
            <div class="wave-bottom position-absolute w-100" style="bottom: 0; left: 0; z-index: -1;">
                <svg viewBox="0 0 1440 400" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none"
                    style="display: block;">
                    <defs>
                        <linearGradient id="gradUngu" x1="0%" y1="0%" x2="0%" y2="100%">
                            <stop offset="0%" style="stop-color:#D2B3F3; stop-opacity:1" />
                            <stop offset="100%" style="stop-color:#ffffff; stop-opacity:0" />
                        </linearGradient>
                    </defs>

                    <!-- Wave Layer 1 - Ungu Solid -->
                    <path fill="#D2B3F3" fill-opacity="1"
                        d="M0,320L48,298.7C96,277,192,235,288,218.7C384,203,480,213,576,218.7C672,224,768,224,864,234.7C960,245,1056,267,1152,277.3C1248,288,1344,288,1392,282.7L1440,277L1440,400L1392,400C1344,400,1248,400,1152,400C1056,400,960,400,864,400C768,400,672,400,576,400C480,400,384,400,288,400C192,400,96,400,48,400L0,400Z">
                    </path>

                    <!-- Wave Layer 2 - Gradasi -->
                    <path fill="url(#gradUngu)" fill-opacity="1"
                        d="M0,240L48,229.3C96,219,192,197,288,186.7C384,176,480,176,576,165.3C672,155,768,133,864,128C960,123,1056,133,1152,138.7C1248,144,1344,144,1392,144L1440,144L1440,400L1392,400C1344,400,1248,400,1152,400C1056,400,960,400,864,400C768,400,672,400,576,400C480,400,384,400,288,400C192,400,96,400,48,400L0,400Z">
                    </path>
                </svg>
            </div>
        </section>

        <!-- Modal -->
        <div class="modal fade" id="fasilitasModal" tabindex="-1" aria-labelledby="fasilitasModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="fasilitasModalLabel">Semua Fasilitas</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-4">
                            @foreach ($fasilitas as $data)
                                <div class="col-6 col-sm-4 col-md-3 col-lg-3">
                                    <div class="facility-card h-100 rounded-4 shadow-sm" style="background: white;">
                                        <div class="facility-img-wrapper p-2">
                                            <img src="{{ asset('/images/fasilitas/' . $data->cover) }}"
                                                alt="{{ $data->nama_fasilitas }}" class="img-fluid rounded-3"
                                                style="height: 160px; width: 100%; object-fit: cover;">
                                        </div>
                                        <div class="facility-content px-2 pb-3 text-center">
                                            <h5 class="fw-semibold mb-0" style="font-size: 1rem; color: #1a1a1a;">
                                                {{ $data->nama_fasilitas }}
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn-daftar" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Artikel Section -->
        <section id="informasi" class="informasi section py-5 position-relative overflow-hidden">
            <!-- Gambar background dengan efek blur -->
            <div class="artikel-bg-blur"></div>

            <!-- Konten utama -->
            <div class="container text-center mb-5 position-relative" style="z-index: 2;" data-aos="fade-up">
                <span class="text-purple fw-semibold">Informasi Terbaru</span>
                <h2 class="stylish-title">Informasi Menarik untuk Anda</h2>
                <div class="underline-decor"></div>
            </div>

            <div class="container position-relative" style="z-index: 2;">
                <div class="row gy-4">
                    @foreach ($informasi as $data)
                        <div class="col-lg-3 col-md-6 col-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="card shadow-sm border-0 w-100 artikel-item h-100">
                                <div class="position-relative">
                                    <img src="{{ asset('/images/informasi/' . $data->gambar) }}"
                                        class="card-img-top img-fluid responsive-img" alt="Article Image">
                                    <a href="{{ route('informasi_detail', $data->slug) }}" class="stretched-link"></a>
                                    <div class="position-absolute top-0 end-0 m-2 badge text-white small"
                                        style="background-color: #b036f7">
                                        {{ \Carbon\Carbon::parse($data->created_at)->locale('id')->translatedFormat('d F Y') }}
                                    </div>
                                </div>
                                <div class="card-body d-flex flex-column p-3 p-md-3 p-sm-2">
                                    <h5 class="card-title text-dark fs-6 fs-sm-6 fs-md-5">
                                        <b>
                                            {{ Str::limit($data->nama_informasi, 65) }}
                                        </b>
                                    </h5>
                                    <p class="card-text text-muted small">
                                        {!! Str::limit(strip_tags($data->deskripsi), 58) !!}
                                    </p>
                                    <a href="{{ route('informasi_detail', $data->slug) }}" class="btn-daftar mt-auto"
                                        style="text-align: center; border: 2px solid #b036f7">
                                        Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                @if ($informasi->count() >= 4)
                    <div class="text-center mt-4">
                        <a href="{{ route('informasi') }}" class="btn-daftar" style="border: 2px solid #b036f7">
                            Lihat Semua Informasi <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                @endif
            </div>
        </section>

        <!-- Testimonials Section -->
        <section id="testimonials" class="testimonials section py-5">
            <!-- Elemen bintang dekoratif -->
            <div class="star-decor star-top-left"></div>
            <div class="star-decor star-top-right"></div>
            <div class="star-decor star-bottom-left"></div>
            <div class="star-decor star-bottom-right"></div>
            <div class="star-decor star-middle-left"></div>
            <div class="star-decor star-middle-right"></div>
            <div class="container section-title text-center mb-2" data-aos="fade-up">
                {{-- <span class="fw-semibold" style="color: #0E1F5223">Testimoni</span> --}}
                <h2 class="stylish-title">Testimoni</h2>
                {{-- <p class="text-muted mb-3">
                    Cerita mereka yang sudah merasakan pengalaman luar biasa selama belajar di
                    <b>Victory English School!!!</b>
                </p> --}}
                <div class="underline-decor"></div>
            </div>

            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper init-swiper">
                    <script type="application/json" class="swiper-config">
                {
                    "loop": true,
                    "speed": 600,
                    "autoplay": {
                        "delay": 5000
                    },
                    "pagination": {
                        "el": ".swiper-pagination",
                        "type": "bullets",
                        "clickable": true
                    },
                    "breakpoints": {
                        "320": {
                            "slidesPerView": 1,
                            "spaceBetween": 20
                        },
                        "768": {
                            "slidesPerView": 2,
                            "spaceBetween": 20
                        },
                        "1200": {
                            "slidesPerView": 3,
                            "spaceBetween": 20
                        }
                    }
                }
            </script>
                    <div class="swiper-wrapper">
                        @foreach ($testimoni as $item)
                            <div class="swiper-slide">
                                <div class="testimonial-item border rounded-4 p-4 h-100 shadow-sm bg-white d-flex flex-column justify-content-between"
                                    style="min-height: 200px; max-height: 200px;">
                                    <div class="flex-grow-1">
                                        <div class="mb-2 text-muted" style="text-align: justify; font-size: 0.95rem;">
                                            "{{ \Illuminate\Support\Str::limit($item->testimoni, 250) }}"
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <h5 class="fw-bold mb-1">{{ \Illuminate\Support\Str::limit($item->nama, 30) }}
                                        </h5>
                                        <div>
                                            @for ($i = 1; $i <= $item->rating; $i++)
                                                <span class="text-warning">&#9733;</span>
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination mt-3"></div>
                </div>
            </div>
        </section>
        <!-- /Testimonials Section -->

        <section id="contact" class="contact section py-5">
            <div class="curve-layer curve-layer-1"></div>
            <div class="curve-layer curve-layer-2"></div>
            <div class="curve-layer curve-layer-3"></div>
            <div class="curve-layer curve-layer-4"></div>
            <div class="curve-layer curve-layer-5"></div>
            <div class="curve-layer curve-layer-6"></div>
            <div class="curve-layer curve-layer-7"></div>
            <div class="curve-layer curve-layer-8"></div>
            <div class="container">
                <div class="row gy-4">

                    <!-- Kolom Kontak -->
                    <div class="col-lg-5" data-aos="fade-up" data-aos-delay="100">
                        <div class="section-title mb-4">
                            {{-- <span style="color: #0e1f5218">Kontak</span> --}}
                            <h2 class="stylish-title">Kontak</h2>
                            <div class="underline-decor"></div>
                        </div>

                        <div class="info-wrap">
                            <div class="info-item d-flex mb-3">
                                <i class="bi bi-geo-alt flex-shrink-0 me-3"></i>
                                <div>
                                    <h3>Alamat</h3>
                                    <p>Komp. Bumi Asri Mekarrahayu Blok 1 D 39 No. 104</p>
                                </div>
                            </div>

                            <div class="info-item d-flex mb-3">
                                <i class="bi bi-telephone flex-shrink-0 me-3"></i>
                                <div>
                                    <h3>No. Telepon</h3>
                                    <p>+62 852-9494-0965</p>
                                </div>
                            </div>

                            <div class="info-item d-flex mb-3">
                                <i class="bi bi-envelope flex-shrink-0 me-3"></i>
                                <div>
                                    <h3>Email</h3>
                                    <p>victory@gmail.com</p>
                                </div>
                            </div>

                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.2996492266175!2d107.54942231018717!3d-6.973930192997666!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68ef5b98950b6d%3A0x17575cdfbd8b8a73!2sVICTORY%20ENGLISH%20SCHOOL!5e0!3m2!1sid!2sid!4v1749649902485!5m2!1sid!2sid"
                                frameborder="0" style="border:0; width: 100%; height: 230px;" allowfullscreen=""
                                loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>

                    <!-- Kolom Testimoni -->
                    <div class="col-lg-7" data-aos="fade-up" data-aos-delay="200">
                        <div class="section-title mb-4">
                            {{-- <span style="color: #0e1f5218">Testimoni</span> --}}
                            <h2 class="stylish-title">Testimoni</h2>
                            <div class="underline-decor"></div>
                        </div>

                        <form action="{{ route('front.store_testimoni') }}" method="POST" class="testimoni"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row gy-0">

                                <div class="col-md-6">
                                    <label for="nama" class="pb-2">Nama Anda</label>
                                    <input type="text" name="nama" id="nama"
                                        class="form-control @error('nama') is-invalid @enderror"
                                        value="{{ old('nama') }}" placeholder="Masukkan nama Anda" required>
                                    @error('nama')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="rating" class="pb-2 d-block">Rating</label>
                                    <div class="rating">
                                        @for ($i = 5; $i >= 1; $i--)
                                            <input type="radio" name="rating" id="star{{ $i }}"
                                                value="{{ $i }}" {{ old('rating') == $i ? 'checked' : '' }}>
                                            <label for="star{{ $i }}">&#9733;</label>
                                        @endfor
                                    </div>
                                    @error('rating')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <label for="testimoni" class="pb-2">Pesan Testimoni</label>
                                    <textarea name="testimoni" id="testimoni" rows="6"
                                        class="form-control @error('testimoni') is-invalid @enderror" placeholder="Tulis testimoni Anda!!" required>{{ old('testimoni') }}</textarea>
                                    @error('testimoni')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <input type="hidden" name="status" value="pending">
                                </div>

                                <div class="col-md-12 text-center mt-3">
                                    <div class="loading">Loading</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">Testimoni Anda berhasil dikirim. Terima kasih!</div>
                                    <button type="submit" style="background-color: #b036f7">Kirim Testimoni</button>
                                </div>
                            </div>
                        </form>
                        @if (session('success'))
                            <script>
                                document.addEventListener("DOMContentLoaded", function() {
                                    Swal.fire({
                                        title: 'Berhasil!',
                                        text: '{{ session('success') }}',
                                        icon: 'success',
                                        confirmButtonColor: '#7030D6FF',
                                        confirmButtonText: 'Oke'
                                    });
                                });
                            </script>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
