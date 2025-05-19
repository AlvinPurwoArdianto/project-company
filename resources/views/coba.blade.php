@extends('layouts.user2.template')
@section('content')

<main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">

        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center"
                    data-aos="fade-up">
                    <h1>VICTORY <br>
                        ENGLISH SCHOOL</h1>
                    <p>MUCH BETTER THAN OTHERS</p>
                    <div class="d-flex">
                        <a href="{{ route('daftar') }}" class="btn-get-started">Daftar Disini</a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="100">
                    <img src="{{ asset('user2/assets/img/hero-img.png') }}" class="img-fluid animated" alt="">
                </div>
            </div>
        </div>

    </section><!-- /Hero Section -->

    <!-- Featured Services Section -->
    <section id="featured-services" class="featured-services section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <span>Program<br></span>
            <h2>Program</h2>
            {{-- <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p> --}}
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row gy-4">
                @foreach ($program as $data)

                <div class="col-lg-4 d-flex" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-item position-relative">
                        {{-- <div class="icon"><i class="bi bi-activity icon"></i></div> --}}
                        <h4>{{ $data->nama_program }}</h4>
                        <p>{{ $data->deskripsi }}</p>
                    </div>
                </div><!-- End Service Item -->

                @endforeach
            </div>

        </div>

    </section><!-- /Featured Services Section -->

    <!-- About Section -->
    <section id="profil" class="about section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <span>Profil<br></span>
            <h2>Profil</h2>
            {{-- <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p> --}}
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row gy-4">
                <div class="col-lg-6 position-relative align-self-start" data-aos="fade-up" data-aos-delay="100">
                    <img src="{{ asset('user2/assets/img/victory logo.png')}}" width="380px" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="200">
                    {{-- <h3>Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.</h3> --}}
                    <p class="fst-italic">
                        sejak tahun 1998, <b>VICTORY ENGLISH SCHOOL</b> telah melayani masyarakat Bandung dan
                        sekitarnya
                        dengan program-program bahasa Inggris yang efektif dan ekonomis. <b>VICTORY ENGLISH
                            SCHOOL</b>
                        memberikan dukungan komprehensif agar siswa dapat mengambil manfaat praktis secara
                        maksimal
                        dari belajar bahasa Inggris.
                    </p>
                    <p>
                        <b>VICTORY ENGLISH SCHOOL</b> memiliki metoda pengajaran yang sangat
                        berbeda dengan lembaga-lembaga bahasa Inggris lainnya, sehingga
                        semua siswa baik dewasa, remaja atau anak-anak (TK, SD, SMP,
                        SMA/SMK, Mahasiswa, Karyawan atau Guru) dapat belajar bahasa
                        Ingrris
                        lisan dan tulisan dengan baik. <b>VICTORY ENGLISH SCHOOL</b> memiliki
                        tenaga pengajar yang profesional dan berpengalaman dalam
                        mengajar
                        bahasa Inggris.
                        <b>VICTORY ENGLISH SCHOOL</b> memahami dan memperhatikan kebutuhan
                        belajar
                        setiap siswa.
                    </p>
                </div>
            </div>

        </div>

    </section><!-- /About Section -->

    <!-- Stats Section -->
    <section id="stats" class="stats section">

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

    </section><!-- /Stats Section -->

    <!-- Services Section -->
    <section id="services" class="services section light-background">
        <div class="container section-title" data-aos="fade-up">
            <span>Fasilitas</span>
            <h2>Fasilitas</h2>
        </div>

        <div class="container">
            <div class="row gy-4">
                @foreach ($fasilitas as $data)
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-item position-relative">
                        <div class="facility-image">
                            <img src="{{ asset('/images/fasilitas/' . $data->cover) }}" alt="Facility Image">
                            <div class="facility-overlay">
                                <h3>{{ $data->nama_fasilitas }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section><!-- /Services Section -->

    <!-- Artikel Section -->
    <section id="artikel" class="artikel section">
        <div class="container section-title" data-aos="fade-up">
            <span>Artikel</span>
            <h2>Artikel</h2>
        </div>

        <div class="container">
            <div class="row gy-4">
                @foreach ($artikel as $data)
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="artikel-item">
                        <div class="artikel-img">
                            <img src="{{ asset('/images/artikel/' . $data->cover) }}" alt="Article Image">
                            <div class="artikel-overlay">
                                <a href="{{ route('artikel.show', $data->id) }}" class="artikel-link">
                                    <i class="bi bi-link-45deg"></i>
                                </a>
                            </div>
                        </div>
                        <div class="artikel-content">
                            <div class="artikel-date">
                                <i class="bi bi-calendar-event"></i>
                                {{ \Carbon\Carbon::parse($data->created_at)->format('d M Y') }}
                            </div>
                            <h3>{{ $data->judul_artikel }}</h3>
                            <p>{!! Str::limit($data->deskripsi, 50) !!}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section light-background">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <span>Testimonials</span>
            <h2>Testimonials</h2>
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
                <div class="swiper-wrapper">

                    <div class="swiper-slide">
                        <div class="testimonial-item" "="">
        <p>
          <i class=" bi bi-quote quote-icon-left"></i>
                            <span>Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit
                                rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam,
                                risus at semper.</span>
                            <i class="bi bi-quote quote-icon-right"></i>
                            </p>
                            <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                            <h3>Saul Goodman</h3>
                            <h4>Ceo &amp; Founder</h4>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <p>
                                <i class="bi bi-quote quote-icon-left"></i>
                                <span>Export tempor illum tamen malis malis eram quae irure esse labore quem cillum
                                    quid malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet
                                    legam anim culpa.</span>
                                <i class="bi bi-quote quote-icon-right"></i>
                            </p>
                            <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                            <h3>Sara Wilsson</h3>
                            <h4>Designer</h4>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <p>
                                <i class="bi bi-quote quote-icon-left"></i>
                                <span>Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla
                                    quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore
                                    quis sint minim.</span>
                                <i class="bi bi-quote quote-icon-right"></i>
                            </p>
                            <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                            <h3>Jena Karlis</h3>
                            <h4>Store Owner</h4>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <p>
                                <i class="bi bi-quote quote-icon-left"></i>
                                <span>Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim
                                    fugiat dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore
                                    illum veniam.</span>
                                <i class="bi bi-quote quote-icon-right"></i>
                            </p>
                            <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                            <h3>Matt Brandon</h3>
                            <h4>Freelancer</h4>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <p>
                                <i class="bi bi-quote quote-icon-left"></i>
                                <span>Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor
                                    noster veniam sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore
                                    nisi cillum quid.</span>
                                <i class="bi bi-quote quote-icon-right"></i>
                            </p>
                            <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                            <h3>John Larson</h3>
                            <h4>Entrepreneur</h4>
                        </div>
                    </div><!-- End testimonial item -->

                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>

    </section><!-- /Testimonials Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <span>Contact</span>
            <h2>Contact</h2>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">

                <div class="col-lg-5">

                    <div class="info-wrap">
                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                            <i class="bi bi-geo-alt flex-shrink-0"></i>
                            <div>
                                <h3>Address</h3>
                                <p>A108 Adam Street, New York, NY 535022</p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                            <i class="bi bi-telephone flex-shrink-0"></i>
                            <div>
                                <h3>Call Us</h3>
                                <p>+1 5589 55488 55</p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                            <i class="bi bi-envelope flex-shrink-0"></i>
                            <div>
                                <h3>Email Us</h3>
                                <p>info@example.com</p>
                            </div>
                        </div><!-- End Info Item -->

                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d48389.78314118045!2d-74.006138!3d40.710059!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a22a3bda30d%3A0xb89d1fe6bc499443!2sDowntown%20Conference%20Center!5e0!3m2!1sen!2sus!4v1676961268712!5m2!1sen!2sus"
                            frameborder="0" style="border:0; width: 100%; height: 270px;" allowfullscreen=""
                            loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>

                <div class="col-lg-7">
                    <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up"
                        data-aos-delay="200">
                        <div class="row gy-4">

                            <div class="col-md-6">
                                <label for="name-field" class="pb-2">Your Name</label>
                                <input type="text" name="name" id="name-field" class="form-control" required="">
                            </div>

                            <div class="col-md-6">
                                <label for="email-field" class="pb-2">Your Email</label>
                                <input type="email" class="form-control" name="email" id="email-field" required="">
                            </div>

                            <div class="col-md-12">
                                <label for="subject-field" class="pb-2">Subject</label>
                                <input type="text" class="form-control" name="subject" id="subject-field"
                                    required="">
                            </div>

                            <div class="col-md-12">
                                <label for="message-field" class="pb-2">Message</label>
                                <textarea class="form-control" name="message" rows="10" id="message-field"
                                    required=""></textarea>
                            </div>

                            <div class="col-md-12 text-center">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>

                                <button type="submit">Send Message</button>
                            </div>

                        </div>
                    </form>
                </div><!-- End Contact Form -->

            </div>

        </div>

    </section><!-- /Contact Section -->

</main>
@endsection
