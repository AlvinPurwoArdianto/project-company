<!-- Artikel / Informasi Section -->
<section id="informasi" class="py-5 section-bg-purple-light">
    <div class="container py-4">
        <!-- Section Header -->
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="purple-kicker">Publikasi & Artikel</span>
            <h2 class="purple-heading">Informasi dan Kabar Terbaru</h2>
            <p class="purple-subtitle">
                Tips belajar bahasa Inggris, panduan kursus, serta berita seputar Victory English School.
            </p>
        </div>

        <div class="row gy-4">
            @forelse ($informasi as $data)
                <div class="col-12 col-md-6 col-lg-3 d-flex" data-aos="fade-up" data-aos-delay="100">
                    <div class="purple-card p-0 overflow-hidden d-flex flex-column w-100">
                        <div class="position-relative bg-light" style="height: 180px;">
                            <img src="{{ asset('/images/informasi/' . $data->gambar) }}"
                                class="w-100 h-100" style="object-fit: cover;" alt="{{ $data->nama_informasi }}"
                                onerror="this.src='{{ asset('user/assets/img/logo mini.png') }}'">
                            <div class="position-absolute top-0 end-0 m-3 badge text-white shadow-sm small py-1 px-2 fw-semibold" style="background-color: var(--purple-primary);">
                                {{ \Carbon\Carbon::parse($data->created_at)->locale('id')->translatedFormat('d M Y') }}
                            </div>
                        </div>
                        <div class="p-3 d-flex flex-column flex-grow-1">
                            <h5 class="fw-bold mb-2 text-dark" style="font-size: 1.05rem; line-height: 1.4;">
                                <a href="{{ route('informasi_detail', $data->slug) }}" class="text-dark text-decoration-none">
                                    {{ Str::limit($data->nama_informasi, 50) }}
                                </a>
                            </h5>
                            <p class="text-muted small mb-3 flex-grow-1" style="line-height: 1.6;">
                                {!! Str::limit(strip_tags($data->deskripsi), 70) !!}
                            </p>
                            <div class="pt-2 border-top mt-auto">
                                <a href="{{ route('informasi_detail', $data->slug) }}" class="text-decoration-none fw-semibold small" style="color: var(--purple-primary);">
                                    Baca Selengkapnya &rarr;
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <div class="purple-card d-inline-block text-center" style="max-width: 460px;">
                        <h5 class="fw-bold text-dark mb-2">Belum Ada Informasi</h5>
                        <p class="text-muted small mb-0">Artikel edukasi dan pengumuman terbaru akan segera ditampilkan.</p>
                    </div>
                </div>
            @endforelse
        </div>

        @if ($informasi->count() >= 4)
            <div class="text-center mt-5">
                <a href="{{ route('informasi') }}" class="btn-purple-outline">
                    Lihat Semua Informasi
                </a>
            </div>
        @endif
    </div>
</section>
<!-- /Artikel / Informasi Section -->
