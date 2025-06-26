<nav id="navmenu" class="navmenu">
    <ul style="font-family: 'Bona Nova SC', serif;">
        <li>
            <a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}">Beranda</a>
        </li>
        <li><a href="#profil">Profil</a></li>
        <li><a href="#program">Program</a></li>
        <li><a href="#fasilitas">Fasilitas</a></li>
        <li>
            <a href="{{ url('/informasi_selengkapnya#informasi') }}"
                class="{{ request()->is('informasi*') || request()->is('informasi_selengkapnya*') ? 'active' : '' }}">
                Informasi
            </a>
        </li>
        <li><a href="#testimonials">Testimoni</a></li>
        <li><a href="#contact">Kontak</a></li>
    </ul>
    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
</nav>
