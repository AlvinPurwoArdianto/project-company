<header id="header" class="{{ request()->is('/') ? 'header-transparent' : 'header-solid' }}">
    <div class="container d-flex justify-content-between align-items-center">
        <!-- Logo -->
        <a href="{{ request()->is('/') ? '#hero' : url('/') }}" class="header-logo d-flex align-items-center text-decoration-none">
            <span class="header-logo-badge d-inline-flex align-items-center">
                <img src="{{ asset('user/assets/img/logo mini.png') }}" height="42" alt="Victory English School" style="object-fit: contain;">
            </span>
        </a>

        <!-- Navbar -->
        <div class="d-flex align-items-center gap-3">
            <nav id="navmenu" class="navmenu d-flex align-items-center">
                <ul class="d-flex mb-0" style="list-style: none;">
                    <li><a href="{{ request()->is('/') ? '#hero' : url('/#hero') }}" class="active">Beranda</a></li>
                    <li><a href="{{ request()->is('/') ? '#profil' : url('/#profil') }}">Profil</a></li>
                    <li><a href="{{ request()->is('/') ? '#program' : url('/#program') }}">Program</a></li>
                    <li><a href="{{ request()->is('/') ? '#fasilitas' : url('/#fasilitas') }}">Fasilitas</a></li>
                    <li><a href="{{ request()->is('/') ? '#informasi' : url('/#informasi') }}">Informasi</a></li>
                    <li><a href="{{ request()->is('/') ? '#testimonials' : url('/#testimonials') }}">Testimoni</a></li>
                    <li><a href="{{ request()->is('/') ? '#faq' : url('/#faq') }}">FAQ</a></li>
                    <li><a href="{{ request()->is('/') ? '#contact' : url('/#contact') }}">Kontak</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list ms-3 fs-3" role="button" aria-label="Toggle navigation"></i>
            </nav>
            <a href="{{ route('daftar') }}" class="btn-header-cta d-none d-sm-inline-flex">Daftar</a>
        </div>
    </div>
</header>
@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const header = document.querySelector("#header");
        const toggleBtn = document.querySelector(".mobile-nav-toggle");
        const navMenu = document.querySelector(".navmenu");
        const navLinks = document.querySelectorAll(".navmenu a");

        // Smooth navbar transparency toggle on scroll
        function checkHeaderScroll() {
            if (!header) return;
            if (window.scrollY > 30) {
                header.classList.add("header-scrolled");
            } else {
                header.classList.remove("header-scrolled");
            }
        }

        window.addEventListener("scroll", checkHeaderScroll, { passive: true });
        checkHeaderScroll();

        // Smooth in-page navigation without full page reload
        document.querySelectorAll('#navmenu a[href*="#"], a.header-logo[href*="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const rawHref = this.getAttribute('href');
                const hashIndex = rawHref.indexOf('#');
                if (hashIndex === -1) return;

                const hash = rawHref.substring(hashIndex);
                if (!hash) return;

                // If on the homepage, scroll smoothly without reload
                if (window.location.pathname === '/' || window.location.pathname === '') {
                    e.preventDefault();

                    // Immediate active visual feedback
                    navLinks.forEach(l => l.classList.remove('active'));
                    this.classList.add('active');

                    if (hash === '#hero' || hash === '#') {
                        window.scrollTo({ top: 0, behavior: 'smooth' });
                        if (window.history.pushState) {
                            window.history.pushState(null, null, window.location.pathname);
                        }
                        return;
                    }
                    const targetEl = document.querySelector(hash);
                    if (targetEl) {
                        const headerHeight = header ? header.offsetHeight : 72;
                        const targetTop = targetEl.getBoundingClientRect().top + window.pageYOffset - headerHeight;

                        window.scrollTo({
                            top: targetTop,
                            behavior: 'smooth'
                        });
                        if (window.history.pushState) {
                            window.history.pushState(null, null, hash);
                        }
                    }
                }
            });
        });

        // ScrollSpy to dynamically highlight active nav link on scroll
        const sections = document.querySelectorAll('section[id]');
        function handleScrollSpy() {
            const scrollPos = window.pageYOffset;
            const headerHeight = header ? header.offsetHeight + 15 : 85;

            if (scrollPos < 200) {
                navLinks.forEach(l => l.classList.remove('active'));
                const firstLink = document.querySelector('#navmenu a[href$="#hero"]') || navLinks[0];
                if (firstLink) firstLink.classList.add('active');
                return;
            }

            sections.forEach(sec => {
                const secTop = sec.offsetTop - headerHeight;
                const secHeight = sec.offsetHeight;
                const secId = sec.getAttribute('id');

                if (scrollPos >= secTop && scrollPos < secTop + secHeight) {
                    navLinks.forEach(l => l.classList.remove('active'));
                    const match = document.querySelector(`#navmenu a[href$="#${secId}"]`);
                    if (match) match.classList.add('active');
                }
            });
        }

        window.addEventListener('scroll', handleScrollSpy, { passive: true });
        handleScrollSpy();

        // Mobile menu toggle
        if (toggleBtn && navMenu) {
            toggleBtn.addEventListener("click", function() {
                navMenu.classList.toggle("menu-open");
            });

            navLinks.forEach(link => {
                link.addEventListener("click", function() {
                    navMenu.classList.remove("menu-open");
                });
            });
        }
    });
</script>
@endpush
