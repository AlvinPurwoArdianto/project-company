@extends('layouts.user.template')
@section('content')
    <!-- Hero Section Start -->
    <section class="bannerv2-section position-relative fix" id="scrollUp">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-9">
                    <div class="herov2-content position-relative">
                        <h1 class="mb-lg-4 mb-3 wow fadeInUp text-danger" data-wow-delay=".3s"
                            style="font-family: Bona Nova SC;font-weight: 700;
  font-style: normal;">
                            <b>VICTORY</b>
                        </h1>
                        <h2 class="mb-lg-4 mb-3 wow fadeInUp text-primary"><b>ENGLISH SCHOOL</b>
                        </h2>
                        <h3 class="mb-40 pra wow fadeInUp text-warning" data-wow-delay=".5s">
                            MUCH BETTER THAN OTHERS
                        </h3>
                        <div class="heros-btn">
                            <a href="{{ route('pendaftaran') }}" class="theme-btn round100 p2-bg">
                                <span class="white fw-medium">
                                    Daftar <i class="bi bi-arrow-right-circle-fill"></i>
                                </span>
                            </a>
                        </div>
                        <!-- Element -->
                        <img src="{{ asset('user/assets/img/abanner/reg.png') }}" alt="img" class="small-aregtengle">
                    </div>
                </div>
            </div>
        </div>
        <!-- Element -->
        <img src="{{ asset('user/assets/img/abanner/kyte.png') }}" alt="img" class="banner-kyte">
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
                            <span class="sub-title wow fadeInUp p2-clr">
                                Profile
                            </span>
                            <h3 class="m-title mb-3 wow fadeInUp black" data-wow-delay=".3s">
                                Invest in education invest <br> in the future
                            </h3>
                            <p class="mb-3 pra wow fadeInUp" data-wow-delay=".4s">
                                Lorem ipsum dolor sit amet consectetur. Amet lectus mi ultricies dictum facilisis sem.
                                Imperdiet massa turpis sit proin
                                metus volutpat loren ipsum Lorem ipsum dolor sit amet consectetur. Amet lectus mi
                                ultricies dictum
                            </p>
                            <p class="pra wow fadeInUp" data-wow-delay=".5s">
                                Lorem ipsum dolor sit amet cons Amet lectus mi ultricies dictum facilisis sem Lorem
                                ipsum dolor sit amet consectetur.
                                Amet lectus mi ultricies
                            </p>
                            <div class="d-flex align-items-center gap-xl-3 gap-2 mt-40 wow fadeInUp" data-wow-delay=".6s">
                                <a href="about.html" class="theme-btn round100 p2-bg">
                                    <span class="white fw-medium">
                                        Read More
                                    </span>
                                </a>
                                <a href="contact.html" class="theme-btn cart-btn round100">
                                    <span class="black fw-semibold">
                                        Contact Us
                                    </span>
                                </a>
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
                        <span class="sub-title wow fadeInUp p2-clr">
                            Artikel
                        </span>
                        <h3 class="m-title wow fadeInUp black" data-wow-delay=".3s">
                            Building a strong foundation <br> through education
                        </h3>
                    </div>
                </div>
            </div>
            <div class="row g-lg-4 g-4">
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".4s">
                    <div class="news-card-items extra-class-item">
                        <div class="news-image mb-xxl-4 mb-4">
                            <img src="{{ asset('user/assets/img/ablog/class1.png') }}" alt="img">
                            <div class="news-layer-wrapper">
                                <div class="news-layer-image" style="background-image: url('assets/img/ablog/class1.png');">
                                </div>
                                <div class="news-layer-image" style="background-image: url('assets/img/ablog/class1.png');">
                                </div>
                                <div class="news-layer-image" style="background-image: url('assets/img/ablog/class1.png');">
                                </div>
                                <div class="news-layer-image" style="background-image: url('assets/img/ablog/class1.png');">
                                </div>
                            </div>
                        </div>
                        <div class="news-content">
                            <h4 class="mb-3">
                                <a href="service-details.html" class="black">
                                    Tutoring Services
                                </a>
                            </h4>
                            <p class="pra mb-3">
                                Lorem ipsum dolor sit amet consectetur. Amet lectus mi ultricies dictum facilisi
                                Imperdiet massa turpis sit proin loren
                                ipsum
                            </p>
                            <div class="d-flex align-items-center justify-content-between gap-xxl-2">
                                <a href="service-details.html" class="theme-btn-2 fw-medium black">learn more <i
                                        class="fas fa-long-arrow-right p3-clr"></i></a>
                                <img src="{{ asset('user/assets/img/ablog/class-icon1.png') }}" alt="img">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".6s">
                    <div class="news-card-items extra-class-item">
                        <div class="news-image mb-xxl-4 mb-4">
                            <img src="{{ asset('user/assets/img/ablog/class2.png') }}" alt="img">
                            <div class="news-layer-wrapper">
                                <div class="news-layer-image"
                                    style="background-image: url('assets/img/ablog/class2.png');">
                                </div>
                                <div class="news-layer-image"
                                    style="background-image: url('assets/img/ablog/class2.png');">
                                </div>
                                <div class="news-layer-image"
                                    style="background-image: url('assets/img/ablog/class2.png');">
                                </div>
                                <div class="news-layer-image"
                                    style="background-image: url('assets/img/ablog/class2.png');">
                                </div>
                            </div>
                        </div>
                        <div class="news-content">
                            <h4 class="mb-3">
                                <a href="service-details.html" class="black">
                                    Language Lessons
                                </a>
                            </h4>
                            <p class="pra mb-3">
                                Lorem ipsum dolor sit amet consectetur. Amet lectus mi ultricies dictum facilisi
                                Imperdiet massa turpis sit proin
                                loren
                                ipsum
                            </p>
                            <div class="d-flex align-items-center justify-content-between gap-xxl-2">
                                <a href="service-details.html" class="theme-btn-2 fw-medium black">learn more <i
                                        class="fas fa-long-arrow-right p3-clr"></i></a>
                                <img src="{{ asset('user/assets/img/ablog/class-icon2.png') }}" alt="img">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".7s">
                    <div class="news-card-items extra-class-item">
                        <div class="news-image mb-xxl-4 mb-4">
                            <img src="{{ asset('user/assets/img/ablog/class3.png') }}" alt="img">
                            <div class="news-layer-wrapper">
                                <div class="news-layer-image"
                                    style="background-image: url('assets/img/ablog/class3.png');">
                                </div>
                                <div class="news-layer-image"
                                    style="background-image: url('assets/img/ablog/class3.png');">
                                </div>
                                <div class="news-layer-image"
                                    style="background-image: url('assets/img/ablog/class3.png');">
                                </div>
                                <div class="news-layer-image"
                                    style="background-image: url('assets/img/ablog/class3.png');">
                                </div>
                            </div>
                        </div>
                        <div class="news-content">
                            <h4 class="mb-3">
                                <a href="service-details.html" class="black">
                                    Study Skills Coaching
                                </a>
                            </h4>
                            <p class="pra mb-3">
                                Lorem ipsum dolor sit amet consectetur. Amet lectus mi ultricies dictum facilisi
                                Imperdiet massa turpis sit proin
                                loren
                                ipsum
                            </p>
                            <div class="d-flex align-items-center justify-content-between gap-xxl-2">
                                <a href="service-details.html" class="theme-btn-2 fw-medium black">learn more <i
                                        class="fas fa-long-arrow-right p3-clr"></i></a>
                                <img src="{{ asset('user/assets/img/ablog/class-icon3.png') }}" alt="img">
                            </div>
                        </div>
                    </div>
                </div>
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
                        <span class="sub-title wow fadeInUp p5-clr">
                            Fasilitas
                        </span>
                        <h3 class="m-title wow fadeInUp black" data-wow-delay=".3s">
                            Discover Your Passion Pursue <br>Your Dreams
                        </h3>
                    </div>
                </div>
            </div>
            <div class="row g-lg-4 g-4">
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".3s">
                    <div class="news-card-items">
                        <div class="news-image mb-xxl-4 mb-4">
                            <img src="{{ asset('user/assets/img/ablog/blogv2-a.png') }}" alt="img">
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
                            <div class="post-date d-center p5-bg">
                                <span>
                                    <span class="d-block">
                                        22
                                    </span>
                                    <span>
                                        Jan
                                    </span>
                                </span>
                            </div>
                        </div>
                        <div class="news-content">
                            <h4 class="mb-3">
                                <a href="blog-details.html" class="black">
                                    Lifelong Learning Endless <br>
                                    Possibilities
                                </a>
                            </h4>
                            <p class="pra mb-4">
                                Lorem ipsum dolor sit amet consectetur. Amet lectus mi ultricies dictum facilisis sem.
                                Imperdiet massa turpis sit proin
                                metus volutpat loren ipsum
                            </p>
                            <a href="blog-details.html" class="theme-btn-2 fw-medium black">Read More <i
                                    class="fas fa-long-arrow-right p2-clr"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".3s">
                    <div class="news-card-items">
                        <div class="news-image mb-xxl-4 mb-4">
                            <img src="{{ asset('user/assets/img/ablog/blogv2-b.png') }}" alt="img">
                            <div class="news-layer-wrapper">
                                <div class="news-layer-image"
                                    style="background-image: url('assets/img/ablog/blogv2-b.png');">
                                </div>
                                <div class="news-layer-image"
                                    style="background-image: url('assets/img/ablog/blogv2-b.png');">
                                </div>
                                <div class="news-layer-image"
                                    style="background-image: url('assets/img/ablog/blogv2-b.png');">
                                </div>
                                <div class="news-layer-image"
                                    style="background-image: url('assets/img/ablog/blogv2-b.png');">
                                </div>
                            </div>
                            <div class="post-date d-center p5-bg">
                                <span>
                                    <span class="d-block">
                                        22
                                    </span>
                                    <span>
                                        Jan
                                    </span>
                                </span>
                            </div>
                        </div>
                        <div class="news-content">
                            <h4 class="mb-3">
                                <a href="blog-details.html" class="black">
                                    Be Curious Be Inspired Be <br>
                                    Educated
                                </a>
                            </h4>
                            <p class="pra mb-4">
                                Lorem ipsum dolor sit amet consectetur. Amet lectus mi ultricies dictum facilisis sem.
                                Imperdiet massa
                                turpis sit proin
                                metus volutpat loren ipsum
                            </p>
                            <a href="blog-details.html" class="theme-btn-2 fw-medium black">Read More <i
                                    class="fas fa-long-arrow-right p2-clr"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".3s">
                    <div class="news-card-items">
                        <div class="news-image mb-xxl-4 mb-4">
                            <img src="{{ asset('user/assets/img/ablog/blogv2-c.png') }}" alt="img">
                            <div class="news-layer-wrapper">
                                <div class="news-layer-image"
                                    style="background-image: url('assets/img/ablog/blogv2-c.png');">
                                </div>
                                <div class="news-layer-image"
                                    style="background-image: url('assets/img/ablog/blogv2-c.png');">
                                </div>
                                <div class="news-layer-image"
                                    style="background-image: url('assets/img/ablog/blogv2-c.png');">
                                </div>
                                <div class="news-layer-image"
                                    style="background-image: url('assets/img/ablog/blogv2-c.png');">
                                </div>
                            </div>
                            <div class="post-date d-center p5-bg">
                                <span>
                                    <span class="d-block">
                                        22
                                    </span>
                                    <span>
                                        Jan
                                    </span>
                                </span>
                            </div>
                        </div>
                        <div class="news-content">
                            <h4 class="mb-3">
                                <a href="blog-details.html" class="black">
                                    Empowering Students Transform
                                    <br>
                                    Lives Matter
                                </a>
                            </h4>
                            <p class="pra mb-4">
                                Lorem ipsum dolor sit amet consectetur. Amet lectus mi ultricies dictum facilisis sem.
                                Imperdiet massa
                                turpis sit proin
                                metus volutpat loren ipsum
                            </p>
                            <a href="blog-details.html" class="theme-btn-2 fw-medium black">Read More <i
                                    class="fas fa-long-arrow-right p2-clr"></i></a>
                        </div>
                    </div>
                </div>
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
