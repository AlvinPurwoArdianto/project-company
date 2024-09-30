@extends('layouts.user2.template')
@section('content')
    {{-- BAGIAN PROGRAM --}}
    <div class="container layput_padding" style="margin-top: 3rem; margin-bottom: 3rem">
        <div class="heading_container">
            <h2>
                PROGRAM
            </h2>
        </div>
        <div class="row" style="margin-top: 2rem; margin-bottom: 5rem">
            <div class="col mx-auto" style="display: flex; gap: 20px">
                <div class="card">
                    <div class="card-body">
                        <h2>Program 1</h2>
                        <p class="card-text">
                            Some quick example text to build on the card title and make up the bulk of the card's content.
                        </p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h2>Program 2</h2>
                        <p class="card-text">
                            Some quick example text to build on the card title and make up the bulk of the card's content.
                        </p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h2>Program 3</h2>
                        <p class="card-text">
                            Some quick example text to build on the card title and make up the bulk of the card's content.
                        </p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h2>Program 4</h2>
                        <p class="card-text">
                            Some quick example text to build on the card title and make up the bulk of the card's content.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- BAGIAN AKHIR PROGRAM --}}

    <!-- about section -->
    <section class="about_section layout_padding long_section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="img-box">
                        <img src="{{ asset('user2/images/about-img.png') }}" alt="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="detail-box">
                        <div class="heading_container">
                            <h2>
                                PROFIL VICTORY
                            </h2>
                        </div>
                        <p>
                            sejak tahun 1998, <b>VICTORY ENGLISH SCHOOL</b> telah melayani masyarakat Bandung dan
                            sekitarnya
                            dengan program-program bahasa Inggris yang efektif dan ekonomis. <b>VICTORY ENGLISH
                                SCHOOL</b>
                            memberikan dukungan komprehensif agar siswa dapat mengambil manfaat praktis secara
                            maksimal
                            dari belajar bahasa Inggris.
                        </p>
                        <a href="" class="btn2" data-bs-target="#PROFIL" data-bs-toggle="modal">
                            Read More
                        </a>

                        {{-- MODAL PFOFIL --}}
                        <div class="modal fade" id="PROFIL" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" style="">
                            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel"></h1>
                                        </div>
                                        <div class="modal-body">
                                            <center>
                                                <img src="{{ asset('user/assets/img/logo/logo copy.png') }}" width="80%"
                                                    height="60%" alt="logo-victory">
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
                                                <b>VICTORY ENGLISH SCHOOL</b> memiliki metoda pengajaran yang sangat
                                                berbeda dengan lembaga-lembaga bahasa Inggris lainnya, sehingga
                                                semua siswa baik dewasa, remaja atau anak-anak (TK, SD, SMP,
                                                SMA/SMK, Mahasiswa, Karyawan atau Guru) dapat belajar bahasa
                                                Ingrris
                                                lisan dan tulisan dengan baik. <b>VICTORY ENGLISH SCHOOL</b> memiliki
                                                tenaga pengajar yang profesional dan berpengalaman dalam
                                                mengajar
                                                bahasa Inggris.
                                                <b>VICTORY ENGLISH SCHOOL</b> memahami dan memperhatikan kebutuhan
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
    </section>

    <!-- end about section -->

    <!-- blog section -->

    <section class="blog_section layout_padding">
        <div class="container">
            <div class="heading_container">
                <h2>
                    ARTIKEL
                </h2>
            </div>
            <div class="row">
                @foreach ($artikel as $data)
                    <div class="col-md-6 col-lg-4 mx-auto">
                        <div class="box">
                            <div class="img-box">
                                <img src="{{ asset('user2/images/b1.jpg') }}" alt="">
                            </div>
                            <div class="detail-box">
                                <h5>
                                    Look even slightly believable. If you are
                                </h5>
                                <p>
                                    alteration in some form, by injected humour, or randomised words which don't look even
                                    slightly believable.
                                </p>
                                <a href="">
                                    Read More
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- end blog section -->

    <!-- Fasilitas section -->

    <section class="furniture_section layout_padding">
        <div class="container">
            <div class="heading_container">
                <h2>
                    FASILITAS
                </h2>
            </div>
            <div class="row">
                @foreach ($fasilitas as $data)
                    <div class="col-md-6 col-lg-4">
                        <div class="box">
                            <div class="img-box">
                                <img src="{{ asset('/images/fasilitas/' . $data->cover) }}">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- end furniture section -->



    <!-- client section -->

    <section class="client_section layout_padding-bottom">
        <div class="container">
            <div class="heading_container">
                <h2>
                    Testimonial
                </h2>
            </div>
            <div id="carouselExample2Controls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-md-11 col-lg-10 mx-auto">
                                <div class="box">
                                    <div class="img-box">
                                        <img src="{{ asset('user2/images/client.jpg') }}" alt="" />
                                    </div>
                                    <div class="detail-box">
                                        <div class="name">
                                            <i class="fa fa-quote-left" aria-hidden="true"></i>
                                            <h6>
                                                Siaalya
                                            </h6>
                                        </div>
                                        <p>
                                            It is a long established fact that a reader will be
                                            distracted by the readable cIt is a long established fact
                                            that a reader will be distracted by the readable c
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-md-11 col-lg-10 mx-auto">
                                <div class="box">
                                    <div class="img-box">
                                        <img src="{{ asset('user2/images/client.jpg') }}" alt="" />
                                    </div>
                                    <div class="detail-box">
                                        <div class="name">
                                            <i class="fa fa-quote-left" aria-hidden="true"></i>
                                            <h6>
                                                Siaalya
                                            </h6>
                                        </div>
                                        <p>
                                            It is a long established fact that a reader will be
                                            distracted by the readable cIt is a long established fact
                                            that a reader will be distracted by the readable c
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-md-11 col-lg-10 mx-auto">
                                <div class="box">
                                    <div class="img-box">
                                        <img src="{{ asset('user2/images/client.jpg') }}" alt="" />
                                    </div>
                                    <div class="detail-box">
                                        <div class="name">
                                            <i class="fa fa-quote-left" aria-hidden="true"></i>
                                            <h6>
                                                Siaalya
                                            </h6>
                                        </div>
                                        <p>
                                            It is a long established fact that a reader will be
                                            distracted by the readable cIt is a long established fact
                                            that a reader will be distracted by the readable c
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel_btn-container">
                    <a class="carousel-control-prev" href="#carouselExample2Controls" role="button" data-slide="prev">
                        <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExample2Controls" role="button" data-slide="next">
                        <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- end client section -->

    <!-- contact section -->
    <section class="contact_section  long_section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="form_container">
                        <div class="heading_container">
                            <h2>
                                Contact Us
                            </h2>
                        </div>
                        <form action="">
                            <div>
                                <input type="text" placeholder="Your Name" />
                            </div>
                            <div>
                                <input type="text" placeholder="Phone Number" />
                            </div>
                            <div>
                                <input type="email" placeholder="Email" />
                            </div>
                            <div>
                                <input type="text" class="message-box" placeholder="Message" />
                            </div>
                            <div class="btn_box">
                                <button>
                                    SEND
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="map_container">
                        <div class="map">
                            <div id="googleMap"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end contact section -->

    <!-- info section -->
    <section class="info_section long_section">

        <div class="container">
            <div class="contact_nav">
                <a href="">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                    <span>
                        Call : +01 123455678990
                    </span>
                </a>
                <a href="">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                    <span>
                        Email : demo@gmail.com
                    </span>
                </a>
                <a href="">
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                    <span>
                        Location
                    </span>
                </a>
            </div>

            <div class="info_top ">
                <div class="row ">
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="info_links">
                            <h4>
                                QUICK LINKS
                            </h4>
                            <div class="info_links_menu">
                                <a class="" href="index.html">Home <span class="sr-only">(current)</span></a>
                                <a class="" href="about.html"> About</a>
                                <a class="" href="furniture.html">Furniture</a>
                                <a class="" href="blog.html">Blog</a>
                                <a class="" href="contact.html">Contact Us</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3 mx-auto">
                        <div class="info_post">
                            <h5>
                                INSTAGRAM FEEDS
                            </h5>
                            <div class="post_box">
                                <div class="img-box">
                                    <img src="{{ asset('user2/images/f1.png') }}" alt="">
                                </div>
                                <div class="img-box">
                                    <img src="{{ asset('user2/images/f2.png') }}" alt="">
                                </div>
                                <div class="img-box">
                                    <img src="{{ asset('user2/images/f3.png') }}" alt="">
                                </div>
                                <div class="img-box">
                                    <img src="{{ asset('user2/images/f4.png') }}" alt="">
                                </div>
                                <div class="img-box">
                                    <img src="{{ asset('user2/images/f5.png') }}" alt="">
                                </div>
                                <div class="img-box">
                                    <img src="{{ asset('user2/images/f6.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info_form">
                            <h4>
                                SIGN UP TO OUR NEWSLETTER
                            </h4>
                            <form action="">
                                <input type="text" placeholder="Enter Your Email" />
                                <button type="submit">
                                    Subscribe
                                </button>
                            </form>
                            <div class="social_box">
                                <a href="">
                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                </a>
                                <a href="">
                                    <i class="fa fa-twitter" aria-hidden="true"></i>
                                </a>
                                <a href="">
                                    <i class="fa fa-linkedin" aria-hidden="true"></i>
                                </a>
                                <a href="">
                                    <i class="fa fa-instagram" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end info_section -->
@endsection
