@extends('layouts.user2.template')
@section('content')
    <main class="main">
        <!-- Hero Section -->
        <section id="hero" class="hero section" style="padding: 80px 0;">
            <div class="container">
                <div class="row gy-4 align-items-center">
                    <!-- Teks -->
                    <div class="col-lg-6 text-start d-flex flex-column justify-content-center" data-aos="fade-up">

                        <h1
                            style="font-family: 'Bona Nova SC', serif; color: #8B0000; font-weight: 700; font-size: 5rem; margin-bottom: 0.3rem;">
                            VICTORY
                        </h1>

                        <h2
                            style="font-family: Arial Black, sans-serif; color: #0033CC; font-weight: 700; font-size: 2.2rem; margin-bottom: 0.4rem;">
                            ENGLISH SCHOOL
                        </h2>

                        <p style="color: #8B0000; font-weight: 700; font-size: 1.6rem; margin-bottom: 0.8rem;">
                            MUCH BETTER THAN OTHERS
                        </p>

                        <a href="{{ route('daftar') }}" class="btn-get-started align-self-start"
                            style="background-color: #0033CC; color: white; padding: 12px 130px; border-radius: 50px; font-weight: 500; text-decoration: none; transition: 0.3s;">
                            Daftar Disini
                        </a>

                    </div>
                    <!-- Gambar -->
                    <div class="col-lg-6 order-1 order-lg-2 hero-img text-center" data-aos="zoom-out" data-aos-delay="100">
                        <img src="{{ asset('user2/assets/img/hero-img.png') }}" class="img-fluid animated" alt="Ilustrasi"
                            style="max-height: 400px;">
                    </div>
                </div>
            </div>
        </section>
        <!-- /Hero Section -->

        <!-- About Section -->
        <section id="profil" class="about section mb-5" style="background-color: #E6F0FF;">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <span>Profil<br></span>
                <h2>Profil</h2>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-4">
                    <div class="col-lg-6 position-relative align-self-start" data-aos="fade-up" data-aos-delay="100">
                        <img src="{{ asset('user2/assets/img/victory2.png') }}" width="500px" class="img-fluid"
                            style="margin-top: 16%" alt="">
                    </div>
                    <div class="col-lg-6 content text-justify" data-aos="fade-up" data-aos-delay="200"
                        style="font-size: 1rem; line-height: 1.8; text-align: justify;">
                        <p class="mb-4">
                            Sejak tahun 1998, <b style="color: #8B0000; font-family: 'Bona Nova SC', serif;">VICTORY </b> <b
                                style="color: #0033CC;">ENGLISH SCHOOL</b> telah melayani
                            masyarakat Bandung dan sekitarnya dengan program-program bahasa Inggris yang efektif dan
                            ekonomis.
                            <b style="color: #8B0000; font-family: 'Bona Nova SC', serif;">VICTORY </b> <b
                                style="color: #0033CC;">ENGLISH SCHOOL</b> memberikan dukungan komprehensif agar
                            siswa dapat mengambil manfaat praktis secara maksimal dari belajar bahasa Inggris.
                        </p>

                        <p>
                            <b style="color: #8B0000; font-family: 'Bona Nova SC', serif;">VICTORY </b> <b
                                style="color: #0033CC;">ENGLISH SCHOOL</b> memiliki metode pengajaran yang sangat
                            berbeda dengan lembaga-lembaga bahasa Inggris lainnya, sehingga semua siswa — baik dewasa,
                            remaja atau anak-anak (TK, SD, SMP, SMA/SMK, Mahasiswa, Karyawan, atau Guru) — dapat belajar
                            bahasa Inggris lisan dan tulisan dengan baik.
                            <b style="color: #8B0000; font-family: 'Bona Nova SC', serif;">VICTORY </b> <b
                                style="color: #0033CC;">ENGLISH SCHOOL</b> memiliki tenaga pengajar yang profesional
                            dan berpengalaman dalam mengajar bahasa Inggris.
                            <b style="color: #8B0000; font-family: 'Bona Nova SC', serif;">VICTORY </b> <b
                                style="color: #0033CC;">ENGLISH SCHOOL</b> memahami dan memperhatikan kebutuhan
                            belajar setiap siswa.
                        </p>
                    </div>
                </div>

            </div>

        </section>
        <!-- /About Section -->

        <!-- Featured Services Section -->
        <section id="program" class="featured-services section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <span>Program<br></span>
                <h2>Program</h2>
            </div><!-- End Section Title -->

            <div class="container">
                <div class="row gy-4">
                    @foreach ($program as $data)
                        <div class="col-lg-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
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

        <!-- Stats Section -->
        {{-- <section id="stats" class="stats section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Clients</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Projects</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="1453" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Hours Of Support</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="32" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Workers</p>
                        </div>
                    </div><!-- End Stats Item -->

                </div>

            </div>

        </section><!-- /Stats Section --> --}}

        <!-- Services Section -->
        <section id="fasilitas" class="services section py-5"
            style="background: linear-gradient(135deg, #E6F0FF 0%, #ffffff 100%);">
            <div class="container section-title" data-aos="fade-up">
                <span>Fasilitas</span>
                <h2>Fasilitas</h2>
                <div class="title-underline mx-auto mt-3" style="width: 80px; height: 4px; background: #638afd;"></div>
            </div>

            <div class="container">
                <div class="row justify-content-center g-4">
                    @foreach ($fasilitas->take(6) as $data)
                        <div class="col-lg-2 col-md-3 col-sm-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="facility-card h-100 rounded-4 shadow-sm hover-lift"
                                style="background: white; transition: all 0.3s ease;">
                                <div class="facility-img-wrapper p-3">
                                    <img src="{{ asset('/images/fasilitas/' . $data->cover) }}"
                                        alt="{{ $data->nama_fasilitas }}" class="img-fluid rounded-3"
                                        style="height: 120px; width: 100%; object-fit: cover;">
                                </div>
                                <div class="facility-content p-3">
                                    <h5 class="facility-title fw-semibold text-center mb-0"
                                        style="font-size: 0.9rem; color: #1a1a1a;">
                                        {{ $data->nama_fasilitas }}
                                    </h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                @if ($fasilitas->count() > 6)
                    <div class="text-center mt-4">
                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                            data-bs-target="#fasilitasModal">
                            Lihat Semua Fasilitas <i class="bi bi-arrow-right"></i>
                        </button>
                    </div>
                @endif
            </div>
        </section>

        <!-- Modal -->
        <div class="modal fade" id="fasilitasModal" tabindex="-1" aria-labelledby="fasilitasModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="fasilitasModalLabel">Semua Fasilitas</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-4">
                            @foreach ($fasilitas as $data)
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="facility-card h-100 rounded-4 shadow-sm" style="background: white;">
                                        <div class="facility-img-wrapper p-3">
                                            <img src="{{ asset('/images/fasilitas/' . $data->cover) }}"
                                                alt="{{ $data->nama_fasilitas }}" class="img-fluid rounded-3"
                                                style="height: 160px; width: 100%; object-fit: cover;">
                                        </div>
                                        <div class="facility-content p-3">
                                            <h5 class="facility-title fw-semibold text-center mb-0"
                                                style="font-size: 1rem; color: #1a1a1a;">
                                                {{ $data->nama_fasilitas }}
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
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
                <span class="text-primary fw-semibold">Informasi Terbaru</span>
                <h2 class="fw-bold">Informasi Menarik untuk Anda</h2>
                <p class="text-muted">Jelajahi informasi terkini seputar Victory English School</p>
            </div>

            <div class="container position-relative" style="z-index: 2;">
                <div class="row gy-4">
                    @foreach ($informasi as $data)
                        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="card shadow-sm border-0 h-100 artikel-item">
                                <div class="position-relative">
                                    <img src="{{ asset('/images/informasi/' . $data->gambar) }}" class="card-img-top"
                                        alt="Article Image" style="height: 200px; object-fit: cover;">
                                    <a href="{{ route('informasi_detail', $data->id) }}" class="stretched-link"></a>
                                    <div class="position-absolute top-0 end-0 m-2 badge bg-purple text-white">
                                        {{ \Carbon\Carbon::parse($data->created_at)->format('d M Y') }}
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title text-dark">{{ $data->nama_informasi }}</h5>
                                    <p class="card-text text-muted">{!! Str::limit(strip_tags($data->deskripsi), 80) !!}</p>
                                    <a href="{{ route('informasi_detail', $data->id) }}"
                                        class="btn btn-sm btn-outline-purple mt-2">Baca Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                @if ($informasi->count() > 4)
                    <div class="text-center mt-4">
                        <a href="{{ route('informasi') }}" class="btn btn-outline-purple">
                            Lihat Semua Informasi <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                @endif
            </div>
        </section>

        <!-- Testimonials Section -->
        <section id="testimonials" class="testimonials section py-5 bg-light">
            <div class="container section-title text-center mb-5" data-aos="fade-up">
                <span class="fw-semibold" style="color: #0E1F5223">Apa Kata Mereka</span>
                <h2 class="fw-bold">Testimoni</h2>
                <p class="text-muted">Cerita mereka yang sudah merasakan pengalaman luar biasa selama belajar di Victory English School!!!</p>
            </div>

            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper init-swiper" data-speed="600" data-delay="5000"
                    data-breakpoints='{"320": {"slidesPerView": 1, "spaceBetween": 20}, "1200": {"slidesPerView": 3, "spaceBetween": 20}}'>
                    <script type="application/json" class="swiper-config">
                        {
                            "loop": true,
                            "speed": 600,
                            "autoplay": {
                                "delay": 5000
                            },
                            "slidesPerView": "auto",
                            "pagination": {
                                "el": ".swiper-pagination",
                                "type": "bullets",
                                "clickable": true
                            },
                            "breakpoints": {
                                "320": {
                                "slidesPerView": 1,
                                "spaceBetween": 40
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
                                        style="min-height: 200px; max-height: 200px; overflow: hidden;">
                                        <div class="flex-grow-1">
                                            <div class="mb-2 text-muted" style="text-align: justify;">
                                                "{{ \Illuminate\Support\Str::limit($item->testimoni, 230) }}"
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <h5 class="fw-bold mb-1">{{ $item->nama }}</h5>
                                            <div>
                                                @for ($i = 1; $i <= $item->rating; $i++)
                                                    <span class="text-warning">&#9733;</span>
                                                @endfor
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>

                    <div class="swiper-pagination mt-3"></div>
                </div>
            </div>
        </section>
        <!-- /Testimonials Section -->

        <section id="contact" class="contact section py-5">
            <div class="container">
                <div class="row gy-4">

                    <!-- Kolom Kontak -->
                    <div class="col-lg-5" data-aos="fade-up" data-aos-delay="100">
                        <div class="section-title mb-4">
                            <span>Kontak</span>
                            <h2>Kontak</h2>
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
                            <span>Testimoni</span>
                            <h2>Kirim Testimoni Anda</h2>
                        </div>

                        <form action="{{ route('front.store_testimoni') }}" method="POST" class="testimoni"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row gy-4">

                                <div class="col-md-6">
                                    <label for="nama" class="pb-2">Nama Anda</label>
                                    <input type="text" name="nama" id="nama"
                                        class="form-control @error('nama') is-invalid @enderror"
                                        value="{{ old('nama') }}" required>
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
                                        class="form-control @error('testimoni') is-invalid @enderror" required>{{ old('testimoni') }}</textarea>
                                    @error('testimoni')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <input type="hidden" name="status" value="pending">
                                </div>

                                <div class="col-md-12 text-center">
                                    <div class="loading">Loading</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">Testimoni Anda berhasil dikirim. Terima kasih!</div>
                                    <button type="submit" style="background-color: #1c6ce4">Kirim Testimoni</button>
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
                                        confirmButtonColor: '#3085d6',
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
