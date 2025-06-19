<nav id="navmenu" class="navmenu">
    <ul style="font-family: 'Bona Nova SC', serif;">
        <li><a href="{{ url('/') }}" class="active">Beranda</a></li>
        <li><a href="#profil">Profil</a></li>
        <li><a href="#program">Program</a></li>
        <li><a href="#fasilitas">Fasilitas</a></li>
        <li>
            <a href="{{ url('/#artikel') }}"
               class="{{ request()->is('/') || request()->is('artikel') || request()->is('/artikel/id') ? 'active' : '' }}">
                Informasi
            </a>
        </li>        
        <li><a href="#contact">Kontak</a></li>
    </ul>
    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
</nav>
