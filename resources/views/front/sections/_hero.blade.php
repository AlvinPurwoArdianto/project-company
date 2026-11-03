<!-- Hero Section -->
<section id="hero" class="hero-purple">
    <div class="container">
        <div class="row gy-5 align-items-center">
            <!-- Teks Hero -->
            <div class="col-12 col-lg-7 text-start d-flex flex-column justify-content-center" data-aos="fade-up">
                <div>
                    <span class="hero-badge">Victory English School &bull; Sejak 1998</span>
                </div>
                <h1 class="hero-title-white">
                    Kuasai Bahasa Inggris Lebih Cepat, Tepat, dan Percaya Diri
                </h1>
                <p class="hero-subtitle-white">
                    Metode belajar interaktif, kurikulum aplikatif, dan dibimbing langsung oleh instruktur berpengalaman. Kami membantu siswa dari seluruh jenjang meraih kemampuan berbahasa Inggris terbaik.
                </p>

                <div class="d-flex flex-wrap gap-3 mb-5">
                    <a href="{{ route('daftar') }}" class="btn-hero-white">
                        Daftar Sekarang
                    </a>
                    <a href="{{ url('/#program') }}" class="btn-hero-outline">
                        Pelajari Program
                    </a>
                </div>

                <!-- Highlight Metrics (Glass Style on Purple) -->
                <div class="row g-3" style="max-width: 540px;">
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

            <!-- Navista-style Floating 3D Showcase -->
            <div class="col-12 col-lg-5 text-center" data-aos="zoom-in" data-aos-delay="100">
                <div class="hero-stage">
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
        </div>
    </div>
</section>
<!-- /Hero Section -->
