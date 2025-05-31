@extends('layouts.user2.template')

@section('content')
<section id="pendaftaran" class="registration section" style="background-color: #E6F0FF; padding: 60px 0;">
    <div class="container" data-aos="fade-up">
        <div class="text-center mb-5">
            <span class="text-muted">Pendaftaran</span>
            <h2 class="fw-bold">Form Pendaftaran</h2>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="p-5 bg-white rounded-4 shadow-sm" data-aos="fade-up" data-aos-delay="100">
                    <form action="{{ route('pendaftaran.store') }}" method="POST" class="registration-form">
                        @csrf
                        <div class="row gy-4">
                            <div class="col-md-6">
                                <label for="nama" class="form-label">Nama Lengkap</label>
                                <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan nama lengkap" required>
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
                                    <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" required>
                                    <input type="date" name="tanggal_lahir" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="tanggal_pendaftaran" class="form-label">Tanggal Daftar</label>
                                <input type="date" name="tanggal_pendaftaran" id="tanggal_pendaftaran" class="form-control" required>
                            </div>

                            <div class="col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan email aktif" required>
                            </div>

                            <div class="col-md-6">
                                <label for="no_telepon" class="form-label">Nomor Telepon</label>
                                <input type="tel" name="no_telepon" id="no_telepon" class="form-control" placeholder="08xxxxxxxxxx" required>
                            </div>

                            <div class="col-md-12">
                                <label for="alamat" class="form-label">Alamat Lengkap</label>
                                <textarea name="alamat" id="alamat" class="form-control" rows="3" placeholder="Masukkan alamat lengkap" required></textarea>
                            </div>

                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary px-5 py-2" style="background-color: #673AB7; border: none; border-radius: 8px; transition: 0.3s;">
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
@endsection
