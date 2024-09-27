@extends('layouts.user.template')
@section('content')
    {{-- MODAL --}}
    <div class="modal fade" id="daftar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">PENDAFTARAN</h1>
                </div>
                <div class="modal-body">
                    <p>
                        {{-- <form action="{{ route('pendaftaran.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Nama Lengkap</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <input type="text" class="form-control" id="basic-icon-default-fullname"
                                        placeholder="Nama Lengkap" name="nama" />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Jenis Kelamin</label>
                            <div class="col-sm-10">
                                <select name="jenis_kelamin" id="" class="form-control">
                                    <option selected disabled>Pilih Jenis Kelamin</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Tempat & Tanggal
                                Lahir</label>
                            <div class="col-sm-5">
                                <div class="input-group input-group-merge">
                                    <input type="text" class="form-control" id="basic-icon-default-fullname"
                                        placeholder="Tempat Lahir" name="tempat_lahir" />
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="input-group input-group-merge">
                                    <input type="date" class="form-control" id="basic-icon-default-fullname"
                                        placeholder="Tanggal Lahir" name="tanggal_lahir" />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Alamat</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <textarea type="text" class="form-control" id="basic-icon-default-fullname" placeholder="Masukan Alamat Anda"
                                        name="alamat"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Email</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <input type="email" class="form-control" id="basic-icon-default-fullname"
                                        placeholder="Masukan Email Anda" name="email" />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">No Telepon</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <input type="tel" pattern="[0-9]{12}" class="form-control" id="phone"
                                        placeholder="Contoh 08xxxxxx" name="no_telepon" />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Tanggal Daftar</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <input type="date" class="form-control" id="basic-icon-default-fullname"
                                        placeholder="Tanggal Pendaftaran" name="tanggal_pendaftaran" />
                                </div>
                            </div>
                        </div>
                        </p>
                </div>
                <div class="modal-footer">
                    <a href="/" class="btn btn-primary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                </form> --}}
                    <form action="{{ route('pendaftaran.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Nama Lengkap</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <input type="text" class="form-control" id="basic-icon-default-fullname"
                                        placeholder="Nama Lengkap" name="nama" />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Jenis Kelamin</label>
                            <div class="col-sm-10">
                                <select name="jenis_kelamin" id="" class="form-control">
                                    <option value="" selected disabled>Pilih Jenis Kelamin</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Tempat & Tanggal
                                Lahir</label>
                            <div class="col-sm-5">
                                <div class="input-group input-group-merge">
                                    <input type="text" class="form-control" id="basic-icon-default-fullname"
                                        placeholder="Tempat Lahir" name="tempat_lahir" />
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="input-group input-group-merge">
                                    <input type="date" class="form-control" id="basic-icon-default-fullname"
                                        placeholder="Tanggal Lahir" name="tanggal_lahir" />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Alamat</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <textarea type="text" class="form-control" id="basic-icon-default-fullname" placeholder="Masukan Alamat Anda"
                                        name="alamat"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Email</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <input type="email" class="form-control" id="basic-icon-default-fullname"
                                        placeholder="Masukan Email Anda" name="email" />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">No Telepon</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <input type="tel" pattern="[0-9]{12}" class="form-control" id="phone"
                                        placeholder="Contoh 08xxxxxx" name="no_telepon" />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Tanggal Daftar</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <input type="date" class="form-control" id="basic-icon-default-fullname"
                                        placeholder="Tanggal Pendaftaran" name="tanggal_pendaftaran" />
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <a href="{{ route('pendaftaran.index') }} " class="btn btn-primary">Kembali</a>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


    <!-- Hero Section Start -->
    <section class="bannerv2-section position-relative fix" id="scrollUp">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-9">
                    <div class="herov2-content position-relative">
                        <h1 class="mb-lg-4 mb-3 wow fadeInUp text-danger" data-wow-delay=".3s"
                            style="font-family: Bona Nova SC;font-weight: 700; font-style: normal;">
                            <b>VICTORY</b>
                        </h1>
                        <h2 class="mb-lg-4 mb-3 wow fadeInUp text-primary"><b>ENGLISH SCHOOL</b>
                        </h2>
                        <h3 class="mb-40 pra wow fadeInUp text-warning" data-wow-delay=".5s">
                            MUCH BETTER THAN OTHERS
                        </h3>
                        <div class="heros-btn">
                            <a href="{{ route('pendaftaran') }}" class="theme-btn round100 p2-bg"
                                style="text-decoration: none">
                                <span class="white fw-medium">
                                    Daftar <i class="bi bi-arrow-right-circle-fill"></i>
                                </span>
                            </a>
                        </div>
                        <!-- Element -->
                        <img src="{{ asset('user/assets/img/abanner/reg.png') }}" alt="img"
                            class="small-aregtengle">
                    </div>
                </div>
            </div>
        </div>
        <!-- Element -->
        <img src="{{ asset('user/assets/img/abanner/kyte.png') }}" alt="img" class="banner-kyte">

        {{-- FOTO SATUU --}}
        <img src="{{ asset('user/assets/img/abanner/banner-v2-thumb.png') }}" alt="img"
            class="banner-shape wow fadeInLeft" data-wow-delay=".3s">

        <img src="{{ asset('user/assets/img/abanner/banner-shadow.png') }}" alt="img" class="banner-shadow">
    </section>

    <!-- About Section Start -->
    <section class="about-sectionv02 space-top position-relative overflow-hidden" id="about">
        <div class="container mt-5">
            <div class="row g-4">
                <div class="col-lg-6 col-md-9">
                    <div class="about-contentv02">
                        <div class="section-title">
                            <span class="sub-title wow fadeInUp p2-clr" style="font-size: 40px">
                                Profile
                            </span>
                            <h3 class="m-title mb-3 wow fadeInUp black" data-wow-delay=".3s">
                                Victory English School
                            </h3>
                            <p class="mb-3 pra wow fadeInUp" data-wow-delay=".4s">
                                Sejak tahun 1998, <b>VICTORY ENGLISH SCHOOL</b> telah melayani masyarakat Bandung dan
                                sekitarnya
                                dengan program-program bahasa Inggris yang efektif dan ekonomis. <b>VICTORY ENGLISH
                                    SCHOOL</b>
                                memberikan dukungan komprehensif agar siswa dapat mengambil manfaat praktis secara
                                maksimal
                                dari belajar bahasa Inggris.
                            </p>
                            <div class="d-flex align-items-center gap-xl-3 gap-2 mt-40 wow fadeInUp" data-wow-delay=".6s">
                                <button class="theme-btn round100 p2-bg" style="text-decoration: none"
                                    data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                    <span class="white fw-medium">
                                        Read More
                                    </span>
                                </button>

                                {{-- MODAL --}}
                                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="staticBackdropLabel"></h1>
                                                </div>
                                                <div class="modal-body">
                                                    <center>
                                                        <img src="{{ asset('user/assets/img/logo/logo copy.png') }}"
                                                            width="80%" height="60%" alt="logo-victory">
                                                    </center>
                                                    <p style="font-size: 15px; text-align: justify">
                                                        Sejak tahun 1998, <b>VICTORY ENGLISH SCHOOL</b> telah melayani
                                                        masyarakat
                                                        Bandung dan sekitarnya
                                                        dengan program-program bahasa Inggris yang efektif dan ekonomis.
                                                        <b>VICTORY
                                                            ENGLISH
                                                            SCHOOL</b>
                                                        memberikan dukungan komprehensif agar siswa dapat mengambil
                                                        manfaat
                                                        praktis
                                                        secara maksimal
                                                        dari belajar bahasa Inggris.
                                                    </p>

                                                    <p style="font-size: 15px; text-align: justify">
                                                        VICTORY ENGLISH SCHOOL memiliki metoda pengajaran yang sangat
                                                        berbeda dengan lembaga-lembaga bahasa Inggris lainnya, sehingga
                                                        semua siswa baik dewasa, remaja atau anak-anak (TK, SD, SMP,
                                                        SMA/SMK, Mahasiswa, Karyawan atau Guru) dapat belajar bahasa
                                                        Ingrris
                                                        lisan dan tulisan dengan baik. VICTORY ENGLISH SCHOOL memiliki
                                                        tenaga pengajar yang profesional dan berpengalaman dalam
                                                        mengajar
                                                        bahasa Inggris.
                                                        VICTORY ENGLISH SCHOOL memahami dan memperhatikan kebutuhan
                                                        belajar
                                                        setiap siswa.

                                                    </p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-thumb-innerv2">
                        <div class="thumb-left-cont">
                            <div class="thumb-cont wow fadeInLeft" data-wow-delay="0.3s">
                                <img src="{{ asset('user/assets/img/about/about-icon.png') }}" alt="img"
                                    class="aicon">
                                <div class="contents">
                                    <h4>
                                        <span class="countss">1230</span>+
                                    </h4>
                                    <span class="pra">
                                        Students
                                    </span>
                                </div>
                            </div>
                            <div class="thumb wow fadeInUp" data-wow-delay=".4s">
                                <img src="{{ asset('user/assets/img/about/aboutv2-1.png') }}" alt="img">
                            </div>
                        </div>
                        <div class="right-thumb d-sm-block d-none wow fadeInDown" data-wow-delay=".5s">
                            <img src="{{ asset('user/assets/img/about/aboutv2-2.png') }}" alt="img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- News Section Start -->
    <section class="extra-sectionv position-relative fix section-padding" id="kegiatan">
        <div class="container mt-5">
            <div class="row justify-content-center mb-60">
                <div class="col-lg-6">
                    <div class="section-title text-center">
                        <span class="sub-title wow fadeInUp p2-clr" style="font-size: 40px">
                            Artikel
                        </span>
                        <h3 class="m-title wow fadeInUp black" data-wow-delay=".3s">
                            Building a strong foundation <br> through education
                        </h3>
                    </div>
                </div>
            </div>
            <div class="row g-lg-4 g-4">
                @foreach ($artikel as $data)
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".4s">
                        <div class="news-card-items extra-class-item">
                            <div class="news-image mb-xxl-4 mb-4">
                                <img src="{{ asset('/images/artikel/' . $data->cover) }}" width="100">
                                <div class="news-layer-wrapper">
                                    <div class="news-layer-image"
                                        style="background-image: url('assets/img/ablog/class1.png');">
                                    </div>
                                    <div class="news-layer-image"
                                        style="background-image: url('assets/img/ablog/class1.png');">
                                    </div>
                                    <div class="news-layer-image"
                                        style="background-image: url('assets/img/ablog/class1.png');">
                                    </div>
                                    <div class="news-layer-image"
                                        style="background-image: url('assets/img/ablog/class1.png');">
                                    </div>
                                </div>
                            </div>
                            <div class="news-content">
                                <h4 class="mb-3">
                                    <a href="service-details.html" class="black" style="text-decoration: none">
                                        {{ $data->judul_artikel }}
                                    </a>
                                </h4>
                                <p class="pra mb-3">
                                    {{ $data->deskripsi }}
                                </p>
                                <div class="d-flex align-items-center justify-content-between gap-xxl-2">
                                    <a href="{{ url('artikel/' . $data->id) }}" class="theme-btn-2 fw-medium black"
                                        style="text-decoration: none">learn
                                        more <i class="fas fa-long-arrow-right p3-clr"></i></a>
                                    <img src="{{ asset('user/assets/img/ablog/class-icon1.png') }}" alt="img">
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- Element -->
        <img src="{{ asset('user/assets/img/ablog/class-j.png') }}" alt="img"
            class="jerap-element d-lg-block d-none">
    </section>

    <!-- News Section Start -->
    <section class="blog-sectionv2 position-relative fix section-padding" id="blog">
        <div class="container mt-5">
            <div class="row justify-content-center mb-60">
                <div class="col-lg-6">
                    <div class="section-title text-center">
                        <span class="sub-title wow fadeInUp p5-clr" style="font-size: 40px">
                            Fasilitas
                        </span>
                        <h3 class="m-title wow fadeInUp black" data-wow-delay=".3s">
                            Discover Your Passion Pursue <br>Your Dreams
                        </h3>
                    </div>
                </div>
            </div>
            <div class="row g-lg-4 g-4">
                @foreach ($fasilitas as $data)
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".3s">
                        <div class="news-card-items">
                            <div class="news-image mb-xxl-4 mb-4">
                                <img src="{{ asset('/images/fasilitas/' . $data->cover) }}" width="100">
                                <div class="news-layer-wrapper">
                                    <div class="news-layer-image"
                                        style="background-image: url('assets/img/ablog/blogv2-a.png');">
                                    </div>
                                    <div class="news-layer-image"
                                        style="background-image: url('assets/img/ablog/blogv2-a.png');">
                                    </div>
                                    <div class="news-layer-image"
                                        style="background-image: url('assets/img/ablog/blogv2-a.png');">
                                    </div>
                                    <div class="news-layer-image"
                                        style="background-image: url('assets/img/ablog/blogv2-a.png');">
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="news-content">
                                <h4 class="mb-3">
                                    <a href="blog-details.html" class="black">
                                    </a>
                                </h4>
                                <p class="pra mb-4">
                                    Lorem ipsum dolor sit amet consectetur. Amet lectus mi ultricies dictum facilisis sem.
                                    Imperdiet massa turpis sit proin
                                    metus volutpat loren ipsum
                                </p>
                                <a href="blog-details.html" class="theme-btn-2 fw-medium black">Read More <i
                                        class="fas fa-long-arrow-right p2-clr"></i></a>
                            </div> --}}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- Element -->
        <img src="{{ asset('user/assets/img/ablog/car-element.png') }}" alt="img" class="car-element">
    </section>

    <!-- Student Counting Section Start -->
    <section class="student-counting space-top mb-xxl-5 mb-lg-4">
        <div class="container">
            <div class="row justify-content-center mb-60">
                <div class="col-lg-6">
                    <div class="section-title text-center">
                        <span class="sub-title wow fadeInUp p5-clr">
                            Testimoni
                        </span>
                        <h3 class="m-title wow fadeInUp black" data-wow-delay=".3s">
                            Discover Your Passion Pursue <br>Your Dreams
                        </h3>
                    </div>
                </div>
            </div>
            <div class="row g-xxl-4 g-3">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="student-count-item">
                        <div class="icon">
                            <img src="{{ asset('user/assets/img/aicon/team-count1.png') }}" alt="img">
                        </div>
                        <div class="content">
                            <h1>
                                <span class="count">1230</span>+
                            </h1>
                            <p>Team member</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="student-count-item">
                        <div class="icon">
                            <img src="{{ asset('user/assets/img/aicon/team-count2.png') }}" alt="img">
                        </div>
                        <div class="content">
                            <h1>
                                <span class="count">210</span>+
                            </h1>
                            <p>Client review</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="student-count-item">
                        <div class="icon">
                            <img src="{{ asset('user/assets/img/aicon/team-count3.png') }}" alt="img">
                        </div>
                        <div class="content">
                            <h1>
                                <span class="count">1200</span>+
                            </h1>
                            <p>Winning award</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="student-count-item">
                        <div class="icon">
                            <img src="{{ asset('user/assets/img/aicon/team-count4.png') }}" alt="img">
                        </div>
                        <div class="content">
                            <h1>
                                <span class="count">230</span>+
                            </h1>
                            <p>Complete project</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
