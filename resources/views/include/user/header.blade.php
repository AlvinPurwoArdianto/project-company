<header id="header-sticky" class="header-1 header-2">
    <div class="container">
        <div class="mega-menu-wrapper white-bg">
            <div class="header-main style-2">
                <div class="header-left">
                    <div class="logo">
                        <a href="index.html" class="header-logo">
                            <img src="{{ asset('user/assets/img/logo/logo copy.png') }}" height="50px" width="150px"
                                alt="logo-img">
                        </a>
                    </div>
                </div>
                <div class="header-right d-flex justify-content-end align-items-center">
                    <div class="mean__menu-wrapper">
                        <div class="main-menu">
                            <nav id="mobile-menu">
                                <ul>
                                    <li class="has-dropdown active menu-thumb">
                                        <a href="#scrollUp" style="text-decoration: none">
                                            Beranda
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#about" style="text-decoration: none">Profil</a>
                                    </li>
                                    <li>
                                        <a href="#kegiatan"style="text-decoration: none">
                                            Artikel
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#blog"style="text-decoration: none">
                                            Fasilitas
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#contact"style="text-decoration: none">Tentang Kami</a>
                                    </li>
                                    <li>
                                        {{-- <a href="/pendaftaran"style="text-decoration: none">Pendaftaran</a> --}}
                                        <button data-bs-toggle="modal" data-bs-target="#daftar"
                                            style="text-decoration: none; border: none;"><b>Pendaftaran</b></button>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>

                {{-- MODAL --}}


            </div>
        </div>
    </div>
</header>
