<header id="header" class="{{ request()->is('/') ? 'header-transparent' : 'header-solid' }}">
    <div class="container d-flex justify-content-between align-items-center">
        <!-- Logo -->
        <a href="{{ request()->is('/') ? '#hero' : url('/') }}" class="header-logo d-flex align-items-center text-decoration-none">
            <span class="header-logo-badge d-inline-flex align-items-center">
                <img src="{{ asset('user/assets/img/logo-white.png') }}" height="42" alt="Victory English School" class="header-logo-img logo-white" style="object-fit: contain;">
                <img src="{{ asset('user/assets/img/logo mini.png') }}" height="42" alt="Victory English School" class="header-logo-img logo-color" style="object-fit: contain;">
            </span>
        </a>

        <!-- Navbar -->
        <div class="d-flex align-items-center gap-3">
            <nav id="navmenu" class="navmenu d-flex align-items-center">
                <ul class="d-flex mb-0" style="list-style: none;">
                    <li><a href="{{ request()->is('/') ? '#hero' : url('/#hero') }}" class="{{ request()->is('/') ? 'active' : '' }}">Beranda</a></li>
                    <li><a href="{{ request()->is('/') ? '#profil' : url('/#profil') }}">Profil</a></li>
                    <li><a href="{{ request()->is('/') ? '#program' : url('/#program') }}">Program</a></li>
                    <li><a href="{{ request()->is('/') ? '#fasilitas' : url('/#fasilitas') }}">Fasilitas</a></li>
                    <li><a href="{{ request()->is('/') ? '#informasi' : url('/#informasi') }}">Informasi</a></li>
                    <li><a href="{{ request()->is('/') ? '#contact' : url('/#contact') }}">Kontak</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list ms-3 fs-3" role="button" aria-label="Toggle navigation"></i>
            </nav>
            <a href="{{ route('daftar') }}" class="btn-header-cta d-none d-sm-inline-flex">Daftar</a>
        </div>
    </div>
</header>

<!-- Mobile Nav Sidebar (Right Drawer Offcanvas) -->
<div id="mobileNavSidebar" class="mobile-sidebar d-xl-none" aria-hidden="true">
    <div class="mobile-sidebar-backdrop"></div>
    <div class="mobile-sidebar-panel">
        <!-- Sidebar Header -->
        <div class="mobile-sidebar-header">
            <div class="d-flex align-items-center gap-2">
                <img src="{{ asset('user/assets/img/logo mini.png') }}" height="36" alt="Victory English School" style="object-fit: contain;">
                <div class="d-flex flex-column">
                    <span class="fw-bold text-dark lh-1" style="font-size: 0.95rem; letter-spacing: -0.2px;">VICTORY</span>
                    <span class="fw-bold" style="font-size: 0.72rem; letter-spacing: 0.5px; color: var(--purple-primary);">ENGLISH SCHOOL</span>
                </div>
            </div>
            <button type="button" class="mobile-sidebar-close" aria-label="Tutup Menu">
                <i class="bi bi-x-lg"></i>
            </button>
        </div>

        <!-- Sidebar Navigation List -->
        <div class="mobile-sidebar-body">
            <div class="small fw-bold text-uppercase mb-2 px-2" style="font-size: 0.72rem; letter-spacing: 0.8px; color: var(--purple-primary);">Menu Navigasi</div>
            <nav class="mobile-sidebar-nav">
                <a href="{{ request()->is('/') ? '#hero' : url('/#hero') }}" class="mobile-nav-item {{ request()->is('/') ? 'active' : '' }}">
                    <i class="bi bi-house-door-fill"></i>
                    <span>Beranda</span>
                </a>
                <a href="{{ request()->is('/') ? '#profil' : url('/#profil') }}" class="mobile-nav-item">
                    <i class="bi bi-info-circle-fill"></i>
                    <span>Profil</span>
                </a>
                <a href="{{ request()->is('/') ? '#program' : url('/#program') }}" class="mobile-nav-item">
                    <i class="bi bi-mortarboard-fill"></i>
                    <span>Program</span>
                </a>
                <a href="{{ request()->is('/') ? '#fasilitas' : url('/#fasilitas') }}" class="mobile-nav-item">
                    <i class="bi bi-building-fill"></i>
                    <span>Fasilitas</span>
                </a>
                <a href="{{ request()->is('/') ? '#informasi' : url('/#informasi') }}" class="mobile-nav-item">
                    <i class="bi bi-newspaper"></i>
                    <span>Informasi</span>
                </a>
                <a href="{{ request()->is('/') ? '#contact' : url('/#contact') }}" class="mobile-nav-item">
                    <i class="bi bi-envelope-fill"></i>
                    <span>Kontak</span>
                </a>
            </nav>
        </div>

        <!-- Sidebar Footer -->
        <div class="mobile-sidebar-footer">
            <a href="{{ route('daftar') }}" class="btn-purple-primary w-100 py-3 d-flex align-items-center justify-content-center gap-2 fw-bold" style="font-size: 0.95rem; border-radius: 12px;">
                <i class="bi bi-pencil-square"></i>
                <span>Daftar Sekarang</span>
            </a>
            <div class="mt-3 text-center text-muted" style="font-size: 0.8rem;">
                <i class="bi bi-whatsapp text-success me-1"></i> +62 852-9494-0965
            </div>
        </div>
    </div>
</div>

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
        const mobileLinks = document.querySelectorAll('.mobile-nav-item');

        function handleScrollSpy() {
            const scrollPos = window.pageYOffset;
            const headerHeight = header ? header.offsetHeight + 15 : 85;

            if (scrollPos < 200) {
                navLinks.forEach(l => l.classList.remove('active'));
                mobileLinks.forEach(l => l.classList.remove('active'));
                const firstLink = document.querySelector('#navmenu a[href$="#hero"]') || navLinks[0];
                if (firstLink) firstLink.classList.add('active');
                const firstMobileLink = document.querySelector('.mobile-nav-item[href$="#hero"]') || mobileLinks[0];
                if (firstMobileLink) firstMobileLink.classList.add('active');
                return;
            }

            sections.forEach(sec => {
                const secTop = sec.offsetTop - headerHeight;
                const secHeight = sec.offsetHeight;
                const secId = sec.getAttribute('id');

                if (scrollPos >= secTop && scrollPos < secTop + secHeight) {
                    navLinks.forEach(l => l.classList.remove('active'));
                    mobileLinks.forEach(l => l.classList.remove('active'));
                    const match = document.querySelector(`#navmenu a[href$="#${secId}"]`);
                    if (match) match.classList.add('active');
                    const matchMobile = document.querySelector(`.mobile-nav-item[href$="#${secId}"]`);
                    if (matchMobile) matchMobile.classList.add('active');
                }
            });
        }

        if (window.location.pathname === '/' || window.location.pathname === '') {
            window.addEventListener('scroll', handleScrollSpy, { passive: true });
            handleScrollSpy();
        }

        // Mobile Nav Sidebar (Offcanvas Right Drawer)
        const mobileSidebar = document.querySelector("#mobileNavSidebar");
        const sidebarCloseBtn = document.querySelector(".mobile-sidebar-close");
        const sidebarBackdrop = document.querySelector(".mobile-sidebar-backdrop");

        function openMobileSidebar() {
            if (mobileSidebar) {
                mobileSidebar.classList.add("open");
                mobileSidebar.setAttribute("aria-hidden", "false");
            }
            document.body.classList.add("mobile-nav-active");
            document.body.style.overflow = "hidden";
            if (toggleBtn) {
                toggleBtn.classList.remove("bi-list");
                toggleBtn.classList.add("bi-x-lg");
            }
        }

        function closeMobileSidebar() {
            if (mobileSidebar) {
                mobileSidebar.classList.remove("open");
                mobileSidebar.setAttribute("aria-hidden", "true");
            }
            document.body.classList.remove("mobile-nav-active");
            document.body.style.overflow = "";
            if (toggleBtn) {
                toggleBtn.classList.remove("bi-x", "bi-x-lg");
                toggleBtn.classList.add("bi-list");
            }
        }

        if (toggleBtn) {
            toggleBtn.addEventListener("click", function(e) {
                e.preventDefault();
                e.stopPropagation();
                if (mobileSidebar && mobileSidebar.classList.contains("open")) {
                    closeMobileSidebar();
                } else {
                    openMobileSidebar();
                }
            });
        }

        if (sidebarCloseBtn) sidebarCloseBtn.addEventListener("click", closeMobileSidebar);
        if (sidebarBackdrop) sidebarBackdrop.addEventListener("click", closeMobileSidebar);

        // Smooth in-page navigation from mobile sidebar links
        if (mobileLinks.length > 0) {
            mobileLinks.forEach(link => {
                link.addEventListener("click", function(e) {
                    const rawHref = this.getAttribute("href");
                    const hashIndex = rawHref.indexOf("#");
                    closeMobileSidebar();

                    if (hashIndex !== -1 && (window.location.pathname === "/" || window.location.pathname === "")) {
                        const hash = rawHref.substring(hashIndex);
                        e.preventDefault();

                        mobileLinks.forEach(l => l.classList.remove("active"));
                        this.classList.add("active");

                        setTimeout(() => {
                            if (hash === "#hero" || hash === "#") {
                                window.scrollTo({ top: 0, behavior: "smooth" });
                            } else {
                                const targetEl = document.querySelector(hash);
                                if (targetEl) {
                                    const headerHeight = header ? header.offsetHeight : 72;
                                    const targetTop = targetEl.getBoundingClientRect().top + window.pageYOffset - headerHeight;
                                    window.scrollTo({ top: targetTop, behavior: "smooth" });
                                }
                            }
                        }, 120);
                    }
                });
            });
        }
    });
</script>
@endpush
