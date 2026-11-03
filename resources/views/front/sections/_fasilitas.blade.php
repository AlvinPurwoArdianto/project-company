<!-- Fasilitas Section -->
<section id="fasilitas" class="py-5 section-bg-white">
    <div class="container py-4">
        <!-- Section Header -->
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="purple-kicker">Sarana & Prasarana</span>
            <h2 class="purple-heading">Fasilitas Belajar Kami</h2>
            <p class="purple-subtitle">
                Ruang belajar yang nyaman, kondusif, dan didukung perlengkapan multimedia.
            </p>
        </div>

        <div class="row justify-content-center g-4">
            @forelse ($fasilitas->take(6) as $data)
                <div class="col-6 col-md-4 col-lg-3 d-flex" data-aos="fade-up" data-aos-delay="100">
                    <div class="purple-card p-0 overflow-hidden w-100 d-flex flex-column text-center">
                        <div class="overflow-hidden bg-light" style="height: 170px;">
                            <img src="{{ asset('/images/fasilitas/' . $data->cover) }}"
                                alt="{{ $data->nama_fasilitas }}" class="w-100 h-100"
                                style="object-fit: cover;"
                                onerror="this.src='{{ asset('user/assets/img/logo mini.png') }}'">
                        </div>
                        <div class="p-3">
                            <h6 class="fw-semibold mb-0 text-dark" style="font-size: 0.95rem;">
                                {{ $data->nama_fasilitas }}
                            </h6>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <div class="purple-card d-inline-block text-center" style="max-width: 460px;">
                        <h5 class="fw-bold text-dark mb-2">Fasilitas Belum Ditambahkan</h5>
                        <p class="text-muted small mb-0">Informasi sarana dan prasarana akan segera diperbarui.</p>
                    </div>
                </div>
            @endforelse
        </div>

        @if ($fasilitas->count() > 6)
            <div class="text-center mt-5">
                <button type="button" class="btn-purple-outline" data-bs-toggle="modal" data-bs-target="#fasilitasModal">
                    Lihat Semua Fasilitas
                </button>
            </div>
        @endif
    </div>
</section>

<!-- Modal Semua Fasilitas -->
<div class="modal fade" id="fasilitasModal" tabindex="-1" aria-labelledby="fasilitasModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content rounded-4 border">
            <div class="modal-header border-bottom py-3 px-4" style="background-color: var(--purple-soft);">
                <h5 class="modal-title fw-bold" style="color: var(--purple-primary);" id="fasilitasModalLabel">Daftar Lengkap Fasilitas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body p-4 bg-light">
                <div class="row g-4">
                    @forelse ($fasilitas as $data)
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="purple-card p-0 overflow-hidden text-center h-100">
                                <div class="overflow-hidden bg-light" style="height: 160px;">
                                    <img src="{{ asset('/images/fasilitas/' . $data->cover) }}"
                                        alt="{{ $data->nama_fasilitas }}" class="w-100 h-100" style="object-fit: cover;"
                                        onerror="this.src='{{ asset('user/assets/img/logo mini.png') }}'">
                                </div>
                                <div class="p-3">
                                    <h6 class="fw-semibold text-dark mb-0" style="font-size: 0.95rem;">
                                        {{ $data->nama_fasilitas }}
                                    </h6>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center py-4">
                            <p class="text-muted mb-0">Belum ada fasilitas yang ditambahkan.</p>
                        </div>
                    @endforelse
                </div>
            </div>
            <div class="modal-footer border-top py-2 px-4">
                <button type="button" class="btn-purple-outline py-2 px-4 small" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
