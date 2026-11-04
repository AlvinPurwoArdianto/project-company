<!-- Hero Section -->
<section id="hero" class="hero-purple">
    <div class="container">
        <div class="row gy-4 gy-lg-5 align-items-center">
            <!-- Teks Hero -->
            <div class="col-12 col-lg-7 text-start d-flex flex-column justify-content-center" data-aos="fade-up">
                <div class="mb-2">
                    <span class="hero-badge">Victory English School &bull; Sejak 1998</span>
                </div>
                <h1 class="hero-title-white">
                    Kuasai Bahasa Inggris Lebih Cepat, Tepat, dan Percaya Diri
                </h1>
                <p class="hero-subtitle-white">
                    Metode belajar interaktif, kurikulum aplikatif, dan dibimbing langsung oleh instruktur berpengalaman. Kami membantu siswa dari seluruh jenjang meraih kemampuan berbahasa Inggris terbaik.
                </p>

                <!-- CTA Buttons: Desktop Only (In Column 1) -->
                <div class="hero-btn-group d-none d-lg-flex gap-3 mb-5" style="max-width: 460px;">
                    <a href="{{ route('daftar') }}" class="btn-hero-white">
                        Daftar Sekarang
                    </a>
                    <a href="{{ url('/#program') }}" class="btn-hero-outline">
                        Pelajari Program
                    </a>
                </div>

                <!-- Highlight Metrics: Desktop Only (In Column 1, under buttons) -->
                <div class="row g-3 d-none d-lg-flex" style="max-width: 540px;">
                    <div class="col-4">
                        <div class="hero-metric-pill text-center">
                            <div class="metric-val">25+</div>
                            <div class="metric-lbl">Tahun Berdiri</div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="hero-metric-pill text-center">
                            <div class="metric-val">100%</div>
                            <div class="metric-lbl">Fokus Praktik</div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="hero-metric-pill text-center">
                            <div class="metric-val">Semua Usia</div>
                            <div class="metric-lbl">Anak & Dewasa</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 3D Showcase (Desktop & Mobile) -->
            <div class="col-12 col-lg-5 text-center my-2 my-lg-0" data-aos="zoom-in" data-aos-delay="100">
                <div class="hero-stage mx-auto">
                    <!-- Ambient Glow Aura -->
                    <div class="hero-glow-aura"></div>

                    <!-- Main Enhanced 3D Asset -->
                    <img src="{{ asset('user/assets/img/hero-characters.png') }}"
                        class="img-fluid hero-3d-main"
                        alt="Victory English School Belajar Bahasa Inggris Interaktif">

                    <!-- Floating Glass Card 1 (Top Left) -->
                    <div class="hero-glass-card hero-card-1">
                        <div class="hero-card-title">Metode Praktik</div>
                        <div class="hero-card-sub">Speaking & Conversation</div>
                    </div>

                    <!-- Floating Glass Card 2 (Top Right) -->
                    <div class="hero-glass-card hero-card-2">
                        <div class="hero-card-title">Semua Jenjang Usia</div>
                        <div class="hero-card-sub">TK, SD, SMP, SMA & Dewasa</div>
                    </div>

                    <!-- Floating Glass Card 3 (Bottom Left) -->
                    <div class="hero-glass-card hero-card-3">
                        <div class="hero-card-title">Pengajar Profesional</div>
                        <div class="hero-card-sub">Bimbingan Ramah & Sabar</div>
                    </div>
                </div>
            </div>

            <!-- CTA Buttons & Trust Proof Bar: Mobile Only (Placed right under the 3D Visual!) -->
            <div class="col-12 d-block d-lg-none mt-2" data-aos="fade-up" data-aos-delay="150">
                <!-- Mobile CTA Buttons (Side-by-side compact) -->
                <div class="d-flex gap-2 mb-3 mx-auto justify-content-center" style="max-width: 360px;">
                    <a href="{{ route('daftar') }}" class="btn-hero-white flex-grow-1 text-center py-2 px-3 small">
                        <span>Daftar Sekarang</span>
                        <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                    <a href="{{ url('/#program') }}" class="btn-hero-outline flex-grow-1 text-center py-2 px-3 small">
                        Pelajari Program
                    </a>
                </div>
                <!-- Mobile Trust Proof Bar (Frosted Glass Card) -->
                <div class="hero-trust-bar mx-auto">
                    <div class="row g-2 align-items-center justify-content-center text-center">
                        <div class="col-4 hero-trust-col">
                            <div class="hero-trust-val">25+</div>
                            <div class="hero-trust-lbl">Tahun Berdiri</div>
                        </div>
                        <div class="col-4 hero-trust-col">
                            <div class="hero-trust-val">100%</div>
                            <div class="hero-trust-lbl">Fokus Praktik</div>
                        </div>
                        <div class="col-4 hero-trust-col">
                            <div class="hero-trust-val">Semua Usia</div>
                            <div class="hero-trust-lbl">Anak & Dewasa</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<!-- /Hero Section -->
