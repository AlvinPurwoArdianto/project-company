<!-- Testimonials Section -->
<section id="testimonials" class="py-5 section-bg-purple-soft">
    <div class="container py-4">
        <!-- Section Header -->
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="purple-kicker">Pengalaman Siswa & Orang Tua</span>
            <h2 class="purple-heading">Pengalaman Siswa dan Orang Tua</h2>
            <p class="purple-subtitle">
                Kisah nyata dan pengalaman belajar dari para peserta didik serta para orang tua siswa Victory English School.
            </p>
        </div>

        @if ($testimoni->count() > 0)
            <div class="position-relative px-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper init-swiper">
                    <script type="application/json" class="swiper-config">
                        {
                            "loop": true,
                            "speed": 600,
                            "autoplay": {
                                "delay": 5000,
                                "disableOnInteraction": false
                            },
                            "navigation": {
                                "nextEl": ".swiper-button-next",
                                "prevEl": ".swiper-button-prev"
                            },
                            "pagination": {
                                "el": ".swiper-pagination",
                                "type": "bullets",
                                "clickable": true
                            },
                            "breakpoints": {
                                "320": {
                                    "slidesPerView": 1,
                                    "spaceBetween": 24
                                },
                                "768": {
                                    "slidesPerView": 2,
                                    "spaceBetween": 24
                                },
                                "1200": {
                                    "slidesPerView": 3,
                                    "spaceBetween": 24
                                }
                            }
                        }
                    </script>
                    <div class="swiper-wrapper pb-5">
                        @foreach ($testimoni as $item)
                            <div class="swiper-slide">
                                <div class="purple-card d-flex flex-column justify-content-between h-100" style="min-height: 240px;">
                                    <div class="mb-4">
                                        <div class="mb-3">
                                            @for ($i = 1; $i <= $item->rating; $i++)
                                                <span style="color: #F59E0B; font-size: 1.15rem;">&#9733;</span>
                                            @endfor
                                            @for ($i = $item->rating + 1; $i <= 5; $i++)
                                                <span style="color: #DDD6FE; font-size: 1.15rem;">&#9733;</span>
                                            @endfor
                                        </div>
                                        <p class="text-muted mb-0" style="font-size: 0.95rem; line-height: 1.7;">
                                            "{{ \Illuminate\Support\Str::limit($item->testimoni, 260) }}"
                                        </p>
                                    </div>
                                    <div class="pt-3 border-top">
                                        <div class="fw-bold text-dark" style="font-size: 1rem;">
                                            {{ \Illuminate\Support\Str::limit($item->nama, 35) }}
                                        </div>
                                        <div class="small" style="color: var(--purple-primary); font-weight: 500;">Peserta Didik / Orang Tua / Alumni</div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>

                <!-- Tombol Navigasi Panah Previous dan Next -->
                <div class="swiper-button-prev swiper-btn-custom d-none d-md-flex"></div>
                <div class="swiper-button-next swiper-btn-custom d-none d-md-flex"></div>
            </div>
        @else
            <div class="col-12 text-center py-5">
                <div class="purple-card d-inline-block text-center" style="max-width: 460px;">
                    <h5 class="fw-bold text-dark mb-2">Belum Ada Testimoni</h5>
                    <p class="text-muted small mb-0">Ulasan dari peserta didik akan segera tampil setelah proses verifikasi.</p>
                </div>
            </div>
        @endif
    </div>
</section>
<!-- /Testimonials Section -->
