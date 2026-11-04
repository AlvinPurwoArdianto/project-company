<!-- Program Belajar Section -->
<section id="program" class="py-5 section-bg-purple-soft">
    <div class="container py-4">
        <!-- Section Header -->
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="purple-kicker">Program & Biaya Belajar</span>
            <h2 class="purple-heading">Pilihan Program Kursus</h2>
            <p class="purple-subtitle">
                Program pembelajaran efektif dan ekonomis dari Victory English School dengan jadwal fleksibel yang dapat disesuaikan.
            </p>
        </div>

        <div class="row gy-4">
            @forelse ($program as $data)
                <div class="col-12 col-md-6 col-lg-3 d-flex" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 75 }}">
                    <div class="purple-card purple-card-accent d-flex flex-column w-100">
                        <div class="mb-3">
                            @if (str_contains(strtolower($data->nama_program), 'kelompok'))
                                <span class="badge border small fw-semibold px-2 py-1" style="background-color: #EDE9FE; color: var(--purple-primary); border-color: var(--purple-border) !important;">
                                    Kelas Kelompok (SD, SMP, SMA, Umum)
                                </span>
                            @elseif (str_contains(strtolower($data->nama_program), 'individu') || str_contains(strtolower($data->nama_program), 'semi'))
                                <span class="badge border small fw-semibold px-2 py-1" style="background-color: #FEF3C7; color: #B45309; border-color: #FCD34D !important;">
                                    Semi Private &bull; Maks. 4 Orang
                                </span>
                            @elseif (str_contains(strtolower($data->nama_program), 'victory'))
                                <span class="badge border small fw-semibold px-2 py-1" style="background-color: #E0E7FF; color: #4338CA; border-color: #C7D2FE !important;">
                                    Private di Victory &bull; Maks. 3 Orang
                                </span>
                            @else
                                <span class="badge border small fw-semibold px-2 py-1" style="background-color: #DCFCE7; color: #15803D; border-color: #BBF7D0 !important;">
                                    Private Home/Office &bull; Maks. 3 Orang
                                </span>
                            @endif
                        </div>
                        <h4 class="fw-bold mb-3 text-dark" style="font-size: 1.15rem; line-height: 1.35;">
                            {{ $data->nama_program }}
                        </h4>
                        <div class="text-muted small flex-grow-1 mb-4" style="line-height: 1.7;">
                            {!! $data->deskripsi !!}
                        </div>
                        <div class="pt-3 border-top mt-auto">
                            <a href="{{ route('daftar') }}" class="btn-purple-primary w-100 py-2 small">
                                Daftar Program Ini
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <div class="purple-card d-inline-block text-center" style="max-width: 460px;">
                        <h5 class="fw-bold text-dark mb-2">Program Belum Tersedia</h5>
                        <p class="text-muted small mb-0">Informasi program pembelajaran akan segera diperbarui.</p>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Highlight Ketentuan Proposal -->
        <div class="mt-5 p-3 p-md-4 rounded-4 bg-white border shadow-sm program-features-card" data-aos="fade-up">
            <div class="row align-items-center g-0">
                <div class="col-12 col-md-4 program-feature-col">
                    <div class="d-flex align-items-center gap-3 text-start px-2 px-md-3">
                        <div class="program-feature-icon rounded-circle d-flex align-items-center justify-content-center flex-shrink-0">
                            <i class="bi bi-clock-history fs-4"></i>
                        </div>
                        <div>
                            <div class="fw-bold text-dark program-feature-title">Jadwal Sangat Fleksibel</div>
                            <div class="text-muted program-feature-sub">Dapat diatur sesuai kondisi siswa</div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 program-feature-col">
                    <div class="d-flex align-items-center gap-3 text-start px-2 px-md-3">
                        <div class="program-feature-icon rounded-circle d-flex align-items-center justify-content-center flex-shrink-0">
                            <i class="bi bi-mortarboard-fill fs-4"></i>
                        </div>
                        <div>
                            <div class="fw-bold text-dark program-feature-title">Jenjang Terstruktur</div>
                            <div class="text-muted program-feature-sub">Pre Elementary s/d Advance (&plusmn; 4 bln/level)</div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 program-feature-col">
                    <div class="d-flex align-items-center gap-3 text-start px-2 px-md-3">
                        <div class="program-feature-icon rounded-circle d-flex align-items-center justify-content-center flex-shrink-0">
                            <i class="bi bi-patch-check-fill fs-4"></i>
                        </div>
                        <div>
                            <div class="fw-bold text-dark program-feature-title">Ijazah & Sertifikat Resmi</div>
                            <div class="text-muted program-feature-sub">Termasuk dalam ujian kenaikan tingkat</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- /Program Belajar Section -->
