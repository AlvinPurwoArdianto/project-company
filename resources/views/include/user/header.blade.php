<header id="header" class="sticky-top shadow perubahan-pertama"
    style="background: linear-gradient(to left, #9a43e6, #fbf7ff); z-index: 999;">
    <div class="container-fluid container-xl d-flex justify-content-between align-items-center py-3">
        <!-- Logo -->
        <a href="{{ url('/') }}" class="header-logo d-flex align-items-center">
            <img src="{{ asset('user/assets/img/logo mini.png') }}" height="50" width="150" alt="logo-img"
                style="object-fit: contain;">
        </a>

        <!-- Navbar -->
        <nav id="navmenu" class="navmenu d-flex align-items-center">
            <ul class="d-flex gap-4 mb-0" style="font-family: 'Bona Nova SC', serif; list-style: none;">
                <li><a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}">Beranda</a></li>
                <li><a href="#profil">Profil</a></li>
                <li><a href="#program">Program</a></li>
                <li><a href="#fasilitas">Fasilitas</a></li>
                <li><a href="{{ url('#informasi') }}"
                        class="{{ request()->is('informasi*') || request()->is('informasi_selengkapnya*') ? 'active' : '' }}">
                        Informasi</a></li>
                <li><a href="#testimonials">Testimoni</a></li>
                <li><a href="#contact">Kontak</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list ms-3 fs-3"></i>
        </nav>
    </div>
</header>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const toggleBtn = document.querySelector(".mobile-nav-toggle");
        const navMenu = document.querySelector(".navmenu");
        const navLinks = document.querySelectorAll(".navmenu a");

        // Toggle menu saat hamburger diklik
        toggleBtn.addEventListener("click", function() {
            navMenu.classList.toggle("menu-open");
        });

        // Tutup menu saat link diklik
        navLinks.forEach(link => {
            link.addEventListener("click", function() {
                navMenu.classList.remove("menu-open");
            });
        });
    });
</script>
