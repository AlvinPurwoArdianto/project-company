<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('dashboard') }}" class="app-brand-link">
            <img src="{{ asset('admin/assets/img/avatars/logo.png') }}" alt="logo" width="100%" height="100%">
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item mt-2 {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Tabel</span>
        </li>

        <li class="menu-item mt-2 {{ Route::currentRouteName() == 'program.index' ? 'active' : '' }}">
            <a href="{{ route('program.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-book-content"></i>
                <div data-i18n="Tables">Program</div>
            </a>
        </li>

        <li class="menu-item mt-2 {{ Route::currentRouteName() == 'fasilitas.index' ? 'active' : '' }}">
            <a href="{{ route('fasilitas.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-building-house"></i>
                <div data-i18n="Tables">Fasilitas</div>
            </a>
        </li>

        <li class="menu-item mt-2 {{ Route::currentRouteName() == 'artikel.index' ? 'active' : '' }}">
            <a href="{{ route('artikel.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-news"></i>
                <div data-i18n="Tables">Artikel</div>
            </a>
        </li>

        <li class="menu-item mt-2 {{ Route::currentRouteName() == 'pendaftaran.index' ? 'active' : '' }}">
            <a href="{{ route('pendaftaran.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user-plus"></i>
                <div data-i18n="Tables">Pendaftaran</div>
            </a>
        </li>
    </ul>
</aside>
@push('style')
<style>
    /* Custom Purple Theme Colors */
    .bg-menu-theme {
        background-color: #696cff !important;
    }

    .menu-vertical .menu-item.active > .menu-link {
        background-color: rgba(255, 255, 255, 0.16) !important;
        color: #ffffff !important;
    }

    .menu-vertical .menu-item .menu-link:hover {
        background-color: rgba(255, 255, 255, 0.16) !important;
        color: #ffffff !important;
    }

    .menu-vertical .menu-icon {
        color: #ffffff !important;
    }

    .menu-header-text {
        color: #ffffff !important;
    }

    .menu-inner .menu-link {
        color: #ffffff;
    }

    .menu-inner .menu-link:hover .menu-icon,
    .menu-inner .menu-item.active .menu-icon {
        color: #ffffff !important;
    }

    .layout-menu-toggle {
        background-color: rgba(255, 255, 255, 0.1) !important;
        color: white !important;
    }

    /* Additional styles for better contrast */
    .menu-inner .menu-item:not(.active) .menu-link {
        opacity: 0.85;
    }

    .menu-inner .menu-item:not(.active) .menu-link:hover {
        opacity: 1;
    }

    .app-brand-text {
        color: #ffffff !important;
    }

    .menu-inner-shadow {
        background: linear-gradient(#696cff 0%, rgba(105, 108, 255, 0.7) 100%);
    }
</style>
@endpush