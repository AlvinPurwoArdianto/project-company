<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Admin - Victory</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('admin/assets/img/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/css/core.css') }}"
        class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/css/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/apex-charts/apex-charts.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Add in the head section -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">

    <!-- Helpers -->
    <script src="{{ asset('admin/assets/vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('admin/assets/js/config.js') }}"></script>

    <!-- Add this in the head section, before closing </head> tag -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <style>
        .swal2-container {
            z-index: 9999 !important;
        }

        /* Notification Styles */
        .toastify {
            position: fixed;
            min-width: 300px;
            cursor: pointer;
            font-family: inherit;
            transition: all 0.2s ease;
        }

        .toastify:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
        }

        .dataTables_wrapper .dataTables_scroll {
            margin-bottom: 1rem;
        }

        .dataTables_wrapper .dataTables_length select {
            width: auto;
            display: inline-block;
        }

        .dataTables_wrapper .dataTables_filter input {
            margin-left: 0.5em;
            display: inline-block;
            width: auto;
        }

        .dataTables_wrapper .dataTables_info {
            padding-top: 0.85em;
        }

        .dataTables_wrapper .dataTables_paginate {
            padding-top: 0.5em;
        }

        .table td {
            white-space: nowrap;
        }

        .table .btn-group,
        .table .btn-group-vertical {
            position: relative;
            display: inline-flex;
            vertical-align: middle;
        }

        .table .dropdown-menu {
            position: absolute;
            z-index: 1000;
        }

        .admin-toast {
            background: #f8fafc !important;
            /* Soft grey/white */
            color: #1e293b !important;
            /* Dark slate */
            border-left: 4px solid #3b82f6 !important;
            /* Blue accent */
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.15) !important;
            padding: 10px 15px !important;
            font-size: 14px !important;
            border-radius: 8px !important;
        }

        /* Title style */
        .admin-toast .swal2-title {
            font-size: 15px !important;
            font-weight: 600 !important;
            margin-bottom: 4px !important;
            color: #0f172a !important;
        }

        /* Progress bar */
        .swal2-timer-progress-bar {
            background: #3b82f6 !important;
        }

        /* Hover effect */
        .admin-toast:hover {
            cursor: pointer;
            border-left-color: #2563eb !important;
            /* Slightly darker blue */
            box-shadow: 0 6px 22px rgba(0, 0, 0, 0.25) !important;
        }

        .toast-icon {
            color: #3b82f6 !important;
            font-size: 18px !important;
        }
    </style>

    @yield('css')
    @yield('styles')
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            @include('include.admin.sidebar')
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                @include('include.admin.header')
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    @yield('content')
                    <!-- / Content -->
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('admin/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('admin/assets/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('admin/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('admin/assets/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('admin/assets/js/dashboards-analytics.js') }}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>


    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- Datatable --}}
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    <!-- Notification Checking Script -->
    <script>
        let lastShownId = localStorage.getItem('lastShownId') ?? null;

        function checkNewPendaftaran() {
            $.ajax({
                url: "{{ route('checkNewPendaftaran') }}",
                type: "GET",
                success: function(res) {
                    if (res.data.length > 0) {
                        let latestId = res.data[0].id;

                        if (lastShownId === null || latestId > lastShownId) {

                            if (res.data.length === 1) {
                                let p = res.data[0];
                                Swal.fire({
                                    title: "Pendaftaran Baru",
                                    html: `<b>${p.nama}</b> telah mendaftar.<br>Email: ${p.email}`,
                                    icon: 'info',
                                    toast: true,
                                    position: "top-end",
                                    timer: 6000,
                                    timerProgressBar: true,
                                    showConfirmButton: false,
                                    iconHtml: '<i class="fa fa-user-plus"></i>',
                                    customClass: {
                                        icon: 'toast-icon'
                                    },
                                    didOpen: (toast) => {
                                        toast.addEventListener('mouseenter', Swal.stopTimer);
                                        toast.addEventListener('mouseleave', Swal.resumeTimer);
                                        toast.addEventListener('click', () => {
                                            window.location.href =
                                                "{{ route('laporan.pendaftaran') }}";
                                        });
                                    }
                                });

                            } else {
                                Swal.fire({
                                    title: "Pendaftaran Baru",
                                    text: `Ada ${res.data.length} pendaftaran baru yang belum dibaca.`,
                                    icon: 'info',
                                    toast: true,
                                    position: "top-end",
                                    timer: 6000,
                                    timerProgressBar: true,
                                    showConfirmButton: false,
                                    iconHtml: '<i class="fa fa-user-plus"></i>',
                                    customClass: {
                                        icon: 'toast-icon'
                                    },
                                    didOpen: (toast) => {
                                        toast.addEventListener('mouseenter', Swal.stopTimer);
                                        toast.addEventListener('mouseleave', Swal.resumeTimer);
                                        toast.addEventListener('click', () => {
                                            window.location.href =
                                                "{{ route('laporan.pendaftaran') }}";
                                        });
                                    }
                                });
                            }


                            lastShownId = latestId;
                            localStorage.setItem('lastShownId', latestId);
                        }
                    }
                },
                error: function() {
                    console.warn("Gagal polling data pendaftaran...");
                }
            });
        }

        // Jalankan polling tiap 5 detik
        setInterval(checkNewPendaftaran, 5000);
        checkNewPendaftaran();
    </script>


    <script>
        AOS.init();
    </script>

    <style>
        .toastify {
            position: fixed;
            top: 15px;
            right: 15px;
            padding: 12px 20px;
            color: white;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
            cursor: pointer;
            z-index: 9999;
        }

        .toastify:hover {
            transform: translateY(-3px);
            transition: transform 0.2s ease;
        }
    </style>


    <!-- Include Notifications Component -->
    @yield('js')
    @yield('script')
    @stack('scripts')

    @include('sweetalert::alert')
</body>

</html>
