<!-- Program Belajar Section -->
<section id="program" class="py-5 section-bg-purple-soft">
    <div class="container py-4">
        <!-- Section Header -->
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="purple-kicker">Program Kursus</span>
            <h2 class="purple-heading">Pilihan Program Belajar</h2>
            <p class="purple-subtitle">
                Kurikulum terpadu yang disesuaikan dengan kebutuhan dan tujuan pembelajaran Anda.
            </p>
        </div>

        <div class="row gy-4">
            @forelse ($program as $data)
                <div class="col-12 col-md-6 col-lg-3 d-flex" data-aos="fade-up" data-aos-delay="100">
                    <div class="purple-card purple-card-accent d-flex flex-column w-100">
                        <div class="mb-3">
                            <span class="badge border small fw-semibold px-2 py-1" style="background-color: var(--purple-soft); color: var(--purple-primary); border-color: var(--purple-border) !important;">
                                Reguler & Intensif
                            </span>
                        </div>
                        <h4 class="fw-bold mb-3 text-dark" style="font-size: 1.25rem;">
                            {{ $data->nama_program }}
                        </h4>
                        <div class="text-muted small flex-grow-1 mb-4" style="line-height: 1.7;">
                            {!! $data->deskripsi !!}
                        </div>
                        <div class="pt-3 border-top mt-auto">
                            <a href="{{ route('daftar') }}" class="btn-purple-primary w-100 py-2 small">
                                Daftar Program
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
    </div>
</section>
<!-- /Program Belajar Section -->
