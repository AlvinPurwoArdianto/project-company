@extends('layouts.user.template')

@section('title', 'Pendaftaran Siswa Baru - Victory English School')

@section('content')
<div class="pendaftaran-page">
    <div class="container" data-aos="fade-up">

        <!-- Navigasi Balik -->
        <div class="mb-4">
            <a href="{{ url('/') }}" class="text-decoration-none fw-semibold small d-inline-flex align-items-center gap-2 px-3 py-2 rounded-pill bg-white border shadow-sm" style="color: var(--purple-primary);">
                <i class="bi bi-arrow-left"></i> Kembali ke Beranda
            </a>
        </div>

        <!-- Header Card Pendaftaran -->
        <div class="pendaftaran-header-card" data-aos="fade-up" data-aos-delay="50">
            <div class="row align-items-center">
                <div class="col-12 col-md-9">
                    <span class="hero-badge mb-2">Pendaftaran Online &bull; Victory English School</span>
                    <h1 class="fw-bold text-white mb-2" style="font-size: clamp(1.8rem, 3.5vw, 2.5rem);">
                        Formulir Pendaftaran Siswa Baru
                    </h1>
                    <p class="mb-0 text-white" style="opacity: 0.9; font-size: 0.95rem; line-height: 1.6;">
                        Lengkapi formulir di bawah ini untuk memulai langkah belajar bahasa Inggris Anda. Tim kami akan segera menghubungi Anda untuk konfirmasi jadwal <em>Placement Test</em> gratis.
                    </p>
                </div>
            </div>
        </div>

        <div class="row gy-4">
            <!-- Form Utama -->
            <div class="col-12 col-lg-8" data-aos="fade-up" data-aos-delay="100">
                <div class="pendaftaran-form-card">
                    <form action="{{ route('front.store') }}" method="POST" class="registration-form" id="formPendaftaran">
                        @csrf
                        <input type="hidden" name="source" value="user">

                        <!-- SECTION 1: DATA CALON SISWA -->
                        <div class="form-section-title">
                            <span class="form-section-badge">1</span>
                            Data Diri Calon Siswa
                        </div>

                        <div class="row g-3 mb-4">
                            <!-- Nama Lengkap -->
                            <div class="col-12">
                                <label for="nama" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                                <input type="text" name="nama" id="nama" class="form-control"
                                    placeholder="Contoh: Ahmad Rizki Pratama" required>
                            </div>

                            <!-- Jenis Kelamin (Modern Pill Radios) -->
                            <div class="col-12">
                                <label class="form-label d-block">Jenis Kelamin <span class="text-danger">*</span></label>
                                <div class="gender-selector">
                                    <label class="gender-card">
                                        <input type="radio" name="jenis_kelamin" id="laki_laki" value="Laki-Laki" required>
                                        <div class="gender-box">
                                            <i class="bi bi-gender-male fs-5"></i> Laki-Laki
                                        </div>
                                    </label>
                                    <label class="gender-card">
                                        <input type="radio" name="jenis_kelamin" id="perempuan" value="Perempuan" required>
                                        <div class="gender-box">
                                            <i class="bi bi-gender-female fs-5"></i> Perempuan
                                        </div>
                                    </label>
                                </div>
                            </div>

                            <!-- Tempat Lahir -->
                            <div class="col-12 col-md-6">
                                <label for="tempat_lahir" class="form-label">Tempat Lahir <span class="text-danger">*</span></label>
                                <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control"
                                    placeholder="Contoh: Bandung" required>
                            </div>

                            <!-- Tanggal Lahir -->
                            <div class="col-12 col-md-6">
                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir <span class="text-danger">*</span></label>
                                <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" required>
                            </div>

                            <!-- Email -->
                            <div class="col-12 col-md-6">
                                <label for="email" class="form-label">Email Aktif <span class="text-danger">*</span></label>
                                <input type="email" name="email" id="email" class="form-control"
                                    placeholder="nama@email.com" required>
                            </div>

                            <!-- Nomor Telepon / WhatsApp -->
                            <div class="col-12 col-md-6">
                                <label for="no_telepon" class="form-label">Nomor WhatsApp / HP <span class="text-danger">*</span></label>
                                <input type="tel" name="no_telepon" id="no_telepon" class="form-control"
                                    placeholder="08xxxxxxxxxx" required>
                            </div>

                            <!-- Tanggal Pendaftaran (Hidden input, handled cleanly) -->
                            <input type="hidden" name="tanggal_pendaftaran" id="tanggal_pendaftaran" value="{{ date('Y-m-d') }}">

                            <!-- Alamat Lengkap -->
                            <div class="col-12">
                                <label for="alamat" class="form-label">Alamat Lengkap <span class="text-danger">*</span></label>
                                <textarea name="alamat" id="alamat" class="form-control" rows="3"
                                    placeholder="Tuliskan alamat domisili lengkap beserta kota" required></textarea>
                            </div>
                        </div>

                        <!-- SECTION 2: DATA ORANG TUA / WALI (Dinamis jika usia < 21) -->
                        <div id="form-wali">
                            <div class="form-section-title mt-4">
                                <span class="form-section-badge">2</span>
                                Data Orang Tua / Wali Siswa
                            </div>

                            <div class="info-alert-wali">
                                <i class="bi bi-info-circle-fill me-1"></i>
                                Calon siswa berusia di bawah 21 tahun, mohon lengkapi data orang tua atau wali untuk kelancaran administrasi dan laporan perkembangan belajar.
                            </div>

                            <div class="row g-3 mb-4">
                                <div class="col-12 col-md-6">
                                    <label for="nama_orang_tua" class="form-label">Nama Orang Tua / Wali</label>
                                    <input type="text" name="nama_orang_tua" id="nama_orang_tua"
                                        class="form-control" placeholder="Nama ayah / ibu / wali">
                                </div>

                                <div class="col-12 col-md-6">
                                    <label for="no_telepon_orang_tua" class="form-label">Nomor WhatsApp Wali</label>
                                    <input type="tel" name="no_telepon_orang_tua" id="no_telepon_orang_tua"
                                        class="form-control" placeholder="08xxxxxxxxxx">
                                </div>

                                <div class="col-12">
                                    <label for="alamat_orang_tua" class="form-label">Alamat Orang Tua / Wali</label>
                                    <textarea name="alamat_orang_tua" id="alamat_orang_tua" class="form-control" rows="2"
                                        placeholder="Alamat orang tua / wali"></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="mt-4 pt-3 border-top">
                            <button type="button" id="btn-daftar" class="btn-purple-primary w-100 py-3 fw-bold fs-6 d-flex align-items-center justify-content-center gap-2">
                                <i class="bi bi-check-circle-fill"></i> Kirim Pendaftaran Sekarang
                            </button>
                            <p class="text-center text-muted small mt-2 mb-0">
                                Data Anda aman dan hanya digunakan untuk keperluan pendaftaran Victory English School.
                            </p>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Sidebar Informasi & Keunggulan -->
            <div class="col-12 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="benefit-card-sidebar sticky-top" style="top: 100px;">
                    <h5 class="fw-bold text-dark mb-4 pb-2 border-bottom">Kenapa Memilih Kami?</h5>

                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="bi bi-award-fill"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1 text-dark" style="font-size: 0.95rem;">Pengalaman Sejak 1998</h6>
                            <p class="text-muted small mb-0">Lebih dari 25 tahun mencetak generasi fasih berbahasa Inggris.</p>
                        </div>
                    </div>

                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="bi bi-bullseye"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1 text-dark" style="font-size: 0.95rem;">Gratis Placement Test</h6>
                            <p class="text-muted small mb-0">Uji kemampuan awal tanpa biaya untuk penempatan kelas yang tepat.</p>
                        </div>
                    </div>

                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="bi bi-chat-heart-fill"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1 text-dark" style="font-size: 0.95rem;">Metode Aktif & Interaktif</h6>
                            <p class="text-muted small mb-0">Fokus pada percakapan langsung (*speaking*) yang menyenangkan.</p>
                        </div>
                    </div>

                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1 text-dark" style="font-size: 0.95rem;">Konfirmasi Cepat</h6>
                            <p class="text-muted small mb-0">Tim konsultan kami akan menghubungi Anda dalam 1x24 jam kerja.</p>
                        </div>
                    </div>

                    <div class="mt-4 p-3 rounded-3" style="background-color: var(--purple-soft); border: 1px solid var(--purple-border);">
                        <div class="small fw-bold mb-1" style="color: var(--purple-primary);"><i class="bi bi-headset me-1"></i> Butuh Bantuan?</div>
                        <p class="text-muted small mb-0">
                            Hubungi admin kami di <strong>(022) 123-4567</strong> atau chat langsung melalui WhatsApp untuk konsultasi gratis.
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

{{-- Script: Tampilkan form wali jika usia < 21 & SweetAlert Konfirmasi --}}
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tanggalLahirInput = document.getElementById('tanggal_lahir');
        const formWali = document.getElementById('form-wali');
        const btnDaftar = document.getElementById('btn-daftar');
        const form = document.getElementById('formPendaftaran');

        function hitungUsia(tanggal) {
            const birthDate = new Date(tanggal);
            const today = new Date();
            let usia = today.getFullYear() - birthDate.getFullYear();
            const m = today.getMonth() - birthDate.getMonth();
            if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                usia--;
            }
            return usia;
        }

        function periksaUsia() {
            const tanggalLahir = tanggalLahirInput.value;
            if (!tanggalLahir) return;

            const usia = hitungUsia(tanggalLahir);

            if (usia >= 21) {
                formWali.style.display = 'none';
                document.getElementById('nama_orang_tua').value = '-';
                document.getElementById('no_telepon_orang_tua').value = '-';
                document.getElementById('alamat_orang_tua').value = '-';
            } else {
                formWali.style.display = 'block';
                if (document.getElementById('nama_orang_tua').value === '-') {
                    document.getElementById('nama_orang_tua').value = '';
                    document.getElementById('no_telepon_orang_tua').value = '';
                    document.getElementById('alamat_orang_tua').value = '';
                }
            }
        }

        tanggalLahirInput.addEventListener('change', periksaUsia);
        periksaUsia();

        // Validasi HTML5 dan SweetAlert
        btnDaftar.addEventListener('click', function(e) {
            if (!form.checkValidity()) {
                form.reportValidity();
                return;
            }

            Swal.fire({
                title: 'Konfirmasi Pendaftaran',
                text: 'Pastikan data yang Anda masukkan sudah benar sebelum dikirimkan.',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Ya, Kirim Sekarang',
                cancelButtonText: 'Periksa Kembali',
                confirmButtonColor: '#7030D6',
                cancelButtonColor: '#94A3B8',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    btnDaftar.disabled = true;
                    btnDaftar.innerHTML = '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>Mengirimkan Data...';
                    form.submit();
                }
            });
        });
    });
</script>
@endpush
@endsection
