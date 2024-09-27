<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <link rel="icon" href="{{ asset('user2/images/fevicon.png') }}" type="image/gif" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Victory - English</title>


    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('user2/css/bootstrap.css') }}" />

    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet" />

    <!-- font awesome style -->
    <link href="{{ asset('user2/css/font-awesome.min.css') }}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{ asset('user2/css/style.css') }}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{ asset('user2/css/responsive.css') }}" rel="stylesheet" />

    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> --}}

</head>

<body>

    <div class="hero_area">
        <!-- header section strats -->
        @include('include.user2.header')
        <!-- end header section -->
        <!-- slider section -->
        <section class="slider_section long_section">
            <div id="customCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="container ">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="detail-box">
                                        <h1>
                                            VICTORY <br>
                                            ENGLISH SCHOOL <br>
                                        </h1>
                                        <h2><b>MUCH BETTER THAN OTHERS</b></h2>
                                        {{-- <p>
                                            sejak tahun 1998, <b>VICTORY ENGLISH SCHOOL</b> telah melayani masyarakat
                                            Bandung dan
                                            sekitarnya
                                            dengan program-program bahasa Inggris yang efektif dan ekonomis. <b>VICTORY
                                                ENGLISH
                                                SCHOOL</b>
                                            memberikan dukungan komprehensif agar siswa dapat mengambil manfaat praktis
                                            secara
                                            maksimal
                                            dari belajar bahasa Inggris.
                                        </p> --}}
                                        <div class="btn-box">
                                            <a href="" class="btn1">
                                                Contact Us
                                            </a>
                                            <a href="" class="btn2">
                                                About Us
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="img-box">
                                        <img src="{{ asset('user2/images/slider-img.png') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end slider section -->
    </div>


    @yield('content')


    <!-- footer section -->
    @include('include.user2.footer')
    <!-- footer section -->


    <!-- jQery -->
    <script src="{{ asset('user2/js/jquery-3.4.1.min.js') }}"></script>
    <!-- bootstrap js -->
    <script src="{{ asset('user2/js/bootstrap.js') }}"></script>
    <!-- custom js -->
    <script src="{{ asset('user2/js/custom.js') }}"></script>
    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
    </script>
    <!-- End Google Map -->


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>

</body>

</html>
