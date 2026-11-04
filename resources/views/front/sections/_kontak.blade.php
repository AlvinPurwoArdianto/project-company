<!-- Contact & Testimoni Section -->
<section id="contact" class="py-5 section-bg-white">
    <div class="container py-4">
        <!-- Section Header -->
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="purple-kicker">Hubungi Kami</span>
            <h2 class="purple-heading">Kontak & Beri Ulasan</h2>
            <p class="purple-subtitle">
                Kunjungi lembaga kami di Bandung atau kirimkan pengalaman belajar Anda.
            </p>
        </div>

        <div class="row gy-4">
            <!-- Kolom Informasi Kontak -->
            <div class="col-12 col-lg-5" data-aos="fade-up" data-aos-delay="100">
                <div class="purple-card h-100 d-flex flex-column">
                    <h4 class="fw-bold mb-4 text-dark" style="font-size: 1.25rem;">Informasi Lembaga</h4>

                    <div class="d-flex flex-column gap-3 mb-4">
                        <div class="p-3 rounded-3 border" style="background-color: var(--purple-light); border-color: var(--purple-border) !important;">
                            <div class="small fw-bold text-uppercase mb-1" style="color: var(--purple-primary);">Alamat Lembaga</div>
                            <div class="text-dark fw-medium" style="font-size: 0.95rem;">
                                Komp. Bumi Asri Mekarrahayu Blok 1 D 39 No. 104, Kab. Bandung, Jawa Barat
                            </div>
                        </div>

                        <div class="p-3 rounded-3 border" style="background-color: var(--purple-light); border-color: var(--purple-border) !important;">
                            <div class="small fw-bold text-uppercase mb-1" style="color: var(--purple-primary);">Telepon / WhatsApp</div>
                            <div class="text-dark fw-medium" style="font-size: 0.95rem;">
                                +62 852-9494-0965
                            </div>
                        </div>

                        <div class="p-3 rounded-3 border" style="background-color: var(--purple-light); border-color: var(--purple-border) !important;">
                            <div class="small fw-bold text-uppercase mb-1" style="color: var(--purple-primary);">Email Resmi</div>
                            <div class="text-dark fw-medium" style="font-size: 0.95rem;">
                                victory@gmail.com
                            </div>
                        </div>
                    </div>

                    <div class="rounded-3 overflow-hidden border mt-auto" style="height: 220px; border-color: var(--purple-border) !important;">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.2996492266175!2d107.54942231018717!3d-6.973930192997666!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68ef5b98950b6d%3A0x17575cdfbd8b8a73!2sVICTORY%20ENGLISH%20SCHOOL!5e0!3m2!1sid!2sid!4v1749649902485!5m2!1sid!2sid"
                            width="100%" height="100%" style="border:0;" allowfullscreen=""
                            loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                            title="Peta Lokasi Victory English School"></iframe>
                    </div>
                </div>
            </div>

            <!-- Kolom Form Testimoni -->
            <div class="col-12 col-lg-7 d-flex" data-aos="fade-up" data-aos-delay="200">
                <div class="purple-card w-100 d-flex flex-column justify-content-between">
                    <div>
                        <h4 class="fw-bold mb-2 text-dark" style="font-size: 1.25rem;">Beri Testimoni Anda</h4>
                        <p class="text-muted small mb-4">Bagikan kesan dan pengalaman belajar Anda bersama Victory English School.</p>

                        <form action="{{ route('front.store_testimoni') }}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-12">
                                    <label for="nama" class="form-label text-dark fw-semibold small">Nama Lengkap & Profesi / Status</label>
                                    <input type="text" name="nama" id="nama"
                                        class="form-control purple-input @error('nama') is-invalid @enderror"
                                        value="{{ old('nama') }}" placeholder="Contoh: Budi Santoso (Orang Tua Siswa / Alumni)" required maxlength="100">
                                    @error('nama')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label class="form-label text-dark fw-semibold small d-block mb-1">Penilaian (Rating)</label>
                                    <div class="rating-left-container">
                                        <div class="rating-left">
                                            @for ($i = 5; $i >= 1; $i--)
                                                <input type="radio" name="rating" id="star{{ $i }}"
                                                    value="{{ $i }}" {{ old('rating', '5') == $i ? 'checked' : '' }}>
                                                <label for="star{{ $i }}" title="{{ $i }} Bintang">&#9733;</label>
                                            @endfor
                                        </div>
                                        <span class="ms-2 text-muted small fw-medium" style="font-size: 0.85rem;">(Bintang 1 &ndash; 5)</span>
                                    </div>
                                    @error('rating')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label for="testimoni" class="form-label text-dark fw-semibold small">Pesan Pengalaman & Ulasan</label>
                                    <textarea name="testimoni" id="testimoni" rows="4"
                                        class="form-control purple-input @error('testimoni') is-invalid @enderror"
                                        placeholder="Tuliskan pengalaman belajar, metode tutor, atau perkembangan kemampuan bahasa Inggris Anda..." required maxlength="1000">{{ old('testimoni') }}</textarea>
                                    @error('testimoni')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12 mt-3">
                                    <button type="submit" class="btn-purple-primary w-100 py-3 fw-bold">
                                        <i class="bi bi-send-fill me-1"></i> Kirimkan Testimoni
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /Contact & Testimoni Section -->
