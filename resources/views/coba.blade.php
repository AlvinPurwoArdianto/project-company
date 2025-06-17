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
        <section id="artikel" class="artikel section py-5 position-relative overflow-hidden">
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
                    @foreach ($artikel->sortByDesc('created_at')->take(4) as $data)
                        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="card shadow-sm border-0 h-100 artikel-item hover-lift">
                                <div class="position-relative overflow-hidden">
                                    <img src="{{ asset('/images/artikel/' . $data->cover) }}" class="card-img-top"
                                        alt="Article Image"
                                        style="height: 200px; object-fit: cover; transition: transform 0.3s ease;">
                                    <a href="{{ route('artikel', $data->id) }}" class="stretched-link"></a>
                                    <div class="position-absolute top-0 end-0 m-2 badge bg-purple text-white">
                                        {{ \Carbon\Carbon::parse($data->created_at)->format('d M Y') }}
                                    </div>
                                </div>
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title text-dark fw-bold mb-2">{{ $data->judul_artikel }}</h5>
                                    <p class="card-text text-muted flex-grow-1">{!! Str::limit(strip_tags($data->deskripsi), 80) !!}</p>
                                    <a href="{{ route('artikel', $data->id) }}"
                                        class="btn btn-sm btn-outline-purple mt-2 align-self-start">
                                        Baca Selengkapnya <i class="bi bi-arrow-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                @if ($artikel->count() > 4)
                    <div class="text-center mt-4">
                        <a href="{{ route('informasi') }}" class="btn btn-outline-purple">
                            Lihat Semua Informasi <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                @endif
            </div>
        </section>

        <!-- Testimonials Section -->
        <section id="testimonials" class="testimonials section light-background">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <span>Testimoni</span>
                <h2>Testimoni</h2>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="swiper init-swiper" data-speed="600" data-delay="5000"
                    data-breakpoints="{ &quot;320&quot;: { &quot;slidesPerView&quot;: 1, &quot;spaceBetween&quot;: 40 }, &quot;1200&quot;: { &quot;slidesPerView&quot;: 3, &quot;spaceBetween&quot;: 40 } }">
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
                    <div class="swiper-wrapper" style="text-align: justify;">
                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <p>
                                    <span>Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit
                                        rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam,
                                        risus at semper.</span>
                                </p>
                                <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img"
                                    alt="">
                                <h3>Saul Goodman</h3>
                                <h4>Ceo &amp; Founder</h4>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <p>

                                    <span>Export tempor illum tamen malis malis eram quae irure esse labore quem cillum
                                        quid malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet
                                        legam anim culpa.</span>

                                </p>
                                <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img"
                                    alt="">
                                <h3>Sara Wilsson</h3>
                                <h4>Designer</h4>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <p>
                                    <span>Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla
                                        quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore
                                        quis sint minim.</span>
                                </p>
                                <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img"
                                    alt="">
                                <h3>Jena Karlis</h3>
                                <h4>Store Owner</h4>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <p>

                                    <span>Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim
                                        fugiat dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore
                                        illum veniam.</span>

                                </p>
                                <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img"
                                    alt="">
                                <h3>Matt Brandon</h3>
                                <h4>Freelancer</h4>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <p>

                                    <span>Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor
                                        noster veniam sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore
                                        nisi cillum quid.</span>

                                </p>
                                <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img"
                                    alt="">
                                <h3>John Larson</h3>
                                <h4>Entrepreneur</h4>
                            </div>
                        </div><!-- End testimonial item -->
                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>

        </section><!-- /Testimonials Section -->

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

                        <form action="forms/contact.php" method="post" class="php-email-form">
                            <div class="row gy-4">

                                <div class="col-md-6">
                                    <label for="name-field" class="pb-2">Nama Anda</label>
                                    <input type="text" name="name" id="name-field" class="form-control" required>
                                </div>

                                <div class="col-md-6">
                                    <label for="email-field" class="pb-2">Email Anda</label>
                                    <input type="email" class="form-control" name="email" id="email-field" required>
                                </div>

                                <div class="col-md-12">
                                    <label for="subject-field" class="pb-2">Judul</label>
                                    <input type="text" class="form-control" name="subject" id="subject-field"
                                        required>
                                </div>

                                <div class="col-md-12">
                                    <label for="message-field" class="pb-2">Pesan</label>
                                    <textarea class="form-control" name="message" rows="8" id="message-field" required></textarea>
                                </div>

                                <div class="col-md-12 text-center">
                                    <div class="loading">Loading</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">Testimoni Anda berhasil dikirim. Terima kasih!</div>

                                    <button type="submit" style="background-color: #1c6ce4">Kirim Testimoni</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </section>


    </main>
@endsection
