<footer id="footer" class="footer royal-purple-footer py-5">
    <div class="container py-3">
        <div class="row gy-4">
            <!-- Footer Brand & Kontak -->
            <div class="col-lg-4 col-md-6">
                <a href="{{ url('/') }}" class="d-flex align-items-center mb-3 text-decoration-none">
                    <span class="fs-4 fw-bold text-white">Victory English School</span>
                </a>
                <div class="footer-contact">
                    <p class="mb-2">Komp. Bumi Asri Mekarrahayu Blok 1 D 39 No. 104</p>
                    <p class="mb-2">Kab. Bandung, Jawa Barat, Indonesia</p>
                    <p class="mt-3 mb-1"><strong>Telepon / WA:</strong> <span class="text-white">+62 852-9494-0965</span></p>
                    <p class="mb-0"><strong>Email:</strong> <span class="text-white">victory@gmail.com</span></p>
                </div>
            </div>

            <!-- Footer Links -->
            <div class="col-lg-4 col-md-6">
                <h5 class="fw-bold">Navigasi Halaman</h5>
                <div class="row mt-3">
                    <div class="col-6">
                        <ul class="list-unstyled d-flex flex-column gap-2 mb-0">
                            <li><a href="{{ url('/') }}">Beranda</a></li>
                            <li><a href="{{ url('/#profil') }}">Profil Lembaga</a></li>
                            <li><a href="{{ url('/#program') }}">Program Kursus</a></li>
                            <li><a href="{{ url('/#fasilitas') }}">Fasilitas Belajar</a></li>
                        </ul>
                    </div>
                    <div class="col-6">
                        <ul class="list-unstyled d-flex flex-column gap-2 mb-0">
                            <li><a href="{{ url('/#informasi') }}">Artikel & Berita</a></li>
                            <li><a href="{{ url('/#testimonials') }}">Testimoni Siswa</a></li>
                            <li><a href="{{ url('/#contact') }}">Kontak Lembaga</a></li>
                            <li><a href="{{ route('daftar') }}">Pendaftaran Baru</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Footer Info -->
            <div class="col-lg-4 col-md-12">
                <h5 class="fw-bold">Tentang Kami</h5>
                <p class="mt-2" style="line-height: 1.7;">
                    Lembaga kursus bahasa Inggris terpercaya sejak 1998 di Bandung. Berkomitmen menghadirkan metode belajar interaktif dan praktis untuk semua jenjang usia.
                </p>
                <div class="mt-4 pt-3 border-top small" style="opacity: 0.85;">
                    &copy; {{ date('Y') }} Victory English School. All Rights Reserved.
                </div>
            </div>
        </div>
    </div>
</footer>
