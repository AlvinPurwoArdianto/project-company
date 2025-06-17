@extends('layouts.user2.template')

@section('content')
    <section id="pendaftaran" class="registration section" style="background-color: #E6F0FF; padding: 80px 0;">
        <div class="container" data-aos="fade-up">
            <div class="text-center mb-5">
                <span class="text-muted">Pendaftaran</span>
                <h2 class="fw-bold">Form Pendaftaran</h2>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-10"> {{-- Form diperlebar --}}
                    <div class="p-5 bg-white rounded-4 shadow-sm" data-aos="fade-up" data-aos-delay="100">
                        <form action="{{ route('pendaftaran.store') }}" method="POST" class="registration-form">
                            @csrf
                            <div class="row gy-4">
                                {{-- Data Pendaftar --}}
                                <div class="col-md-12">
                                    <h5 class="mt-4 fw-bold">Data Pendaftar</h5>
                                    <hr>
                                </div>
                                {{-- Data Pribadi --}}
                                <div class="col-md-6">
                                    <label for="nama" class="form-label">Nama Lengkap</label>
                                    <input type="text" name="nama" id="nama" class="form-control"
                                        placeholder="Masukkan nama lengkap" required>
                                </div>

                                <div class="col-md-6">
                                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-select" required>
                                        <option value="" selected disabled>Pilih jenis kelamin</option>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label for="tanggal_lahir" class="form-label">Tempat & Tanggal Lahir</label>
                                    <div class="input-group">
                                        <input type="text" name="tempat_lahir" class="form-control"
                                            placeholder="Tempat Lahir" required>
                                        <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir"
                                            required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="tanggal_pendaftaran" class="form-label">Tanggal Daftar</label>
                                    <input type="date" name="tanggal_pendaftaran" id="tanggal_pendaftaran"
                                        class="form-control" value="{{ date('Y-m-d') }}" required disabled>
                                </div>

                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" id="email" class="form-control"
                                        placeholder="Masukkan email aktif" required>
                                </div>

                                <div class="col-md-6">
                                    <label for="no_telepon" class="form-label">Nomor Telepon</label>
                                    <input type="tel" name="no_telepon" id="no_telepon" class="form-control"
                                        placeholder="08xxxxxxxxxx" required>
                                </div>

                                <div class="col-md-12">
                                    <label for="alamat" class="form-label">Alamat Lengkap</label>
                                    <textarea name="alamat" id="alamat" class="form-control" rows="3" placeholder="Masukkan alamat lengkap"
                                        required></textarea>
                                </div>

                                <div id="form-wali">
                                    {{-- Data Orangtua/Wali --}}
                                    <div class="col-md-12">
                                        <h5 class="mt-4 fw-bold">Data Orangtua/Wali</h5>
                                        <hr>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="nama_wali" class="form-label">Nama Orangtua/Wali</label>
                                            <input type="text" name="nama_wali" id="nama_wali" class="form-control"
                                                placeholder="Masukkan nama wali" required>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="telepon_wali" class="form-label">Nomor Telepon Wali</label>
                                            <input type="tel" name="telepon_wali" id="telepon_wali" class="form-control"
                                                placeholder="08xxxxxxxxxx" required>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="alamat_wali" class="form-label">Alamat Orangtua/Wali</label>
                                        <textarea name="alamat_wali" id="alamat_wali" class="form-control" rows="3"
                                            placeholder="Masukkan alamat wali" required></textarea>
                                    </div>
                                </div>

                                {{-- Nomor Rekening --}}
                                <div class="col-md-12">
                                    <label for="no_rekening" class="form-label">Nomor Rekening</label>
                                    <input type="text" name="no_rekening" id="no_rekening" class="form-control"
                                        placeholder="Masukkan nomor rekening" required>
                                </div>

                                {{-- Submit --}}
                                <div class="col-md-12 text-center mt-4">
                                    <button type="submit" class="btn btn-primary px-5 py-2"
                                        style="background-color: #0D6EFD; border: none; border-radius: 8px; transition: 0.3s;">
                                        Daftar Sekarang
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tanggalLahirInput = document.getElementById('tanggal_lahir');
            const formWali = document.getElementById('form-wali');

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

                    // Kosongkan isinya agar tidak terkirim
                    document.getElementById('nama_wali').value = '';
                    document.getElementById('telepon_wali').value = '';
                    document.getElementById('alamat_wali').value = '';
                } else {
                    formWali.style.display = 'block';
                }
            }

            tanggalLahirInput.addEventListener('change', periksaUsia);
            periksaUsia(); // panggil sekali saat load halaman
        });
    </script>
@endsection
