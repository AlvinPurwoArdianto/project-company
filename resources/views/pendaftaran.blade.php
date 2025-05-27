@extends('layouts.user2.template')
@section('content')
<!-- Registration Section -->
<section id="pendaftaran" class="registration section light-background">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <span>Pendaftaran</span>
        <h2>Form Pendaftaran</h2>
    </div>

    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <form action="{{ route('pendaftaran.store') }}" method="POST" class="registration-form" data-aos="fade-up" data-aos-delay="200">
                    @csrf
                    <div class="row gy-4">
                        <div class="col-md-6">
                            <label for="nama" class="pb-2">Nama Lengkap</label>
                            <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan Nama Lengkap" required>
                        </div>
                        <div class="col-md-6">
                            <label for="jenis_kelamin" class="pb-2">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control" id="">
                                <option value="" selected disabled>Pilih Jenis Kelamin</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="tanggal lahir" class="pb-2">Tempat Tanggal Lahir</label>
                            <div class="input-group">
                                <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" required>
                                <input type="date" name="tanggal_lahir" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="tanggal_pendaftaran" class="pb-2">Tanggal Daftar</label>
                            <input type="date" name="tanggal_pendaftaran" id="tanggal_pendaftaran" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="pb-2">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Masukan Email" required>
                        </div>
                        <div class="col-md-6">
                            <label for="no_telepon" class="pb-2">Nomor Telepon</label>
                            <input type="number" name="no_telepon" id="no_telepon" class="form-control" placeholder="Masukan Nomor Telepon" required>
                        </div>
                        <div class="col-md-12">
                            <label for="alamat" class="pb-2">Alamat</label>
                            <textarea name="alamat" id="alamat" class="form-control" cols="20px" required></textarea>
                        </div>

                        <div class="col-md-12 text-center">
                            <button type="submit" class="registration primay-btn">Daftar Sekarang</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
