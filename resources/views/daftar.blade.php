@extends('layouts.user.template')

@section('content')
    <section id="pendaftaran" class="registration section" style="background-color: #E6F0FF; padding: 80px 0;">
        <div class="container" data-aos="fade-up">
            <div class="text-center mb-5">
                <span class="text-muted">Pendaftaran</span>
                <h2 class="fw-bold">Form Pendaftaran</h2>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="p-5 bg-white rounded-4 shadow-sm" data-aos="fade-up" data-aos-delay="100">
                        <form action="{{ route('pendaftaran.store') }}" method="POST" class="registration-form">
                            @csrf
                            <div class="row gy-4">
                                {{-- Data Pendaftar --}}
                                <div class="col-md-12">
                                    <a href="{{ url('/') }}"
                                        class="btn btn-outline-purple btn-sm rounded-pill float-end">
                                        <i class="bi bi-house-door-fill"></i> Beranda
                                    </a>
                                    <h5 class="mt-2 fw-bold">Data Pendaftar</h5>
                                    <hr>
                                </div>

                                <div class="col-md-6">
                                    <label for="nama" class="form-label">Nama Lengkap</label>
                                    <input type="text" name="nama" id="nama" class="form-control"
                                        placeholder="Masukkan nama lengkap" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label d-block">Jenis Kelamin</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki_laki"
                                            value="Laki-Laki" required>
                                        <label class="form-check-label" for="laki_laki">Laki-Laki</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan"
                                            value="Perempuan" required>
                                        <label class="form-check-label" for="perempuan">Perempuan</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="tanggal_lahir" class="form-label">Tempat & Tanggal Lahir</label>
                                    <div class="input-group">
                                        <input type="text" name="tempat_lahir" class="form-control"
                                            placeholder="Tempat Lahir" required>
                                        <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control"
                                            required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="tanggal_pendaftaran" class="form-label">Tanggal Daftar</label>
                                    <input type="date" name="tanggal_pendaftaran" id="tanggal_pendaftaran"
                                        class="form-control" value="{{ date('Y-m-d') }}" required readonly>
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
                                            <label for="nama_orang_tua" class="form-label">Nama Orangtua/Wali</label>
                                            <input type="text" name="nama_orang_tua" id="nama_orang_tua"
                                                class="form-control" placeholder="Masukkan nama wali">
                                        </div>

                                        <div class="col-md-6">
                                            <label for="no_telepon_orang_tua" class="form-label">Nomor Telepon
                                                Wali</label>
                                            <input type="tel" name="no_telepon_orang_tua" id="no_telepon_orang_tua"
                                                class="form-control" placeholder="08xxxxxxxxxx">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="alamat_orang_tua" class="form-label">Alamat Orangtua/Wali</label>
                                        <textarea name="alamat_orang_tua" id="alamat_orang_tua" class="form-control" rows="3"
                                            placeholder="Masukkan alamat wali"></textarea>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="no_rekening" class="form-label">Nomor Rekening</label>
                                    <input type="text" name="no_rekening" id="no_rekening" class="form-control"
                                        placeholder="Masukkan nomor rekening" required>
                                </div>

                                <div class="col-md-6">
                                    <label for="bank" class="form-label">Bank</label>
                                    <select name="bank" id="bank" class="form-select" required>
                                        <option value="" selected disabled>Pilih bank</option>
                                        <option value="BCA">BCA</option>
                                        <option value="BNI">BNI</option>
                                        <option value="BRI">BRI</option>
                                        <option value="Mandiri">Mandiri</option>
                                        <option value="BSI">BSI</option>
                                        <option value="CIMB">CIMB</option>
                                        <option value="Permata">Permata</option>
                                        <option value="BTN">BTN</option>
                                    </select>
                                </div>

                                <input type="hidden" name="source" value="user">

                                {{-- Submit --}}
                                <div class="col-md-12 text-center mt-4">
                                    <button type="button" id="btn-daftar" class="btn btn-primary px-5 py-2"
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

    {{-- Script: Tampilkan form wali jika usia < 21 --}}
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
                    document.getElementById('nama_orang_tua').value = '';
                    document.getElementById('no_telepon_orang_tua').value = '';
                    document.getElementById('alamat_orang_tua').value = '';
                } else {
                    formWali.style.display = 'block';
                }
            }

            tanggalLahirInput.addEventListener('change', periksaUsia);
            periksaUsia();
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const btnDaftar = document.getElementById('btn-daftar');
            const form = document.querySelector('.registration-form');

            btnDaftar.addEventListener('click', function(e) {
                Swal.fire({
                    title: 'Apakah Anda yakin ingin mendaftar?',
                    text: "Pastikan semua data sudah benar. Periksa kembali sebelum melanjutkan.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Daftar!',
                    cancelButtonText: 'Cek Kembali',
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if (session('success'))
                Swal.fire({
                    title: 'Berhasil!',
                    text: '{{ session('success') }}',
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                });
            @endif
        });
    </script>
@endsection
