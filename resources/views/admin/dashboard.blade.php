@extends('layouts.admin.template')
@push('style')
    .avatar {
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    }

    .bg-light-primary {
    background-color: rgba(105, 108, 2 <h2 class="fw-bold mt-2 d-flex align-items-center">
        <span id="readCount">{{ $pendaftaran }}</span>
        <span id="unreadBadge" class="ms-2 badge bg-danger fs-4"
            style="{{ isset($unreadCount) && $unreadCount > 0 ? '' : 'display: none;' }}">
            +{{ $unreadCount ?? 0 }}
        </span>
    </h2>16) !important;
    }

    .bg-light-info {
    background-color: rgba(3, 195, 236, 0.16) !important;
    }

    .bg-light-success {
    background-color: rgba(113, 221, 55, 0.16) !important;
    }

    .bg-light-warning {
    background-color: rgba(255, 171, 0, 0.16) !important;
    }

    .text-primary {
    color: #696cff !important;
    }

    .text-info {
    color: #03c3ec !important;
    }

    .text-success {
    color: #71dd37 !important;
    }

    .text-warning {
    color: #ffab00 !important;
    }

    .badge {
    padding: 0.35em 0.65em;
    font-weight: 600;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: 0.25rem;
    }

    .badge.bg-danger {
    background-color: #ff3e1d !important;
    color: #fff;
    }

    .fs-4 {
    font-size: 1.5rem !important;
    }

    .align-text-top {
    vertical-align: text-top !important;
    }

    .position-relative {
    position: relative !important;
    }

    .rounded-pill {
    border-radius: 50rem !important;
    }

    .ms-2 {
    margin-left: 0.5rem !important;
    }

    /* Notification styles */
    .badge-notification {
    position: absolute;
    top: -10px;
    right: -10px;
    min-width: 20px;
    height: 20px;
    padding: 0 6px;
    font-size: 12px;
    line-height: 20px;
    text-align: center;
    background-color: #ff3e1d;
    color: white;
    border: 2px solid #fff;
    box-shadow: 0 0 0 1px #ff3e1d;
    }
@endpush

@push('scripts')
    <script>
        $(document).ready(function() {
            let previousUnreadCount = {{ $unreadCount ?? 0 }};

            function updateRegistrationCounts() {
                $.ajax({
                    url: '{{ route('check.registrations') }}',
                    method: 'GET',
                    dataType: 'json',
                    cache: false,
                    success: function(response) {
                        console.log('Previous unread:', previousUnreadCount);
                        console.log('New response:', response);

                        // Update only if counts have changed
                        if (response.readCount !== parseInt($('#pendaftarCount').text()) ||
                            response.unreadCount !== previousUnreadCount) {

                            // Update the read count with animation
                            $('#pendaftarCount').fadeOut(200, function() {
                                $(this).text(response.readCount).fadeIn(200);
                            });

                            // Update unread badge
                            if (response.unreadCount > 0) {
                                $('#unreadCount').text(response.unreadCount);
                                $('#buttonUnreadCount').text(response.unreadCount);

                                $('#pendaftarBadge, #buttonBadge').fadeIn(300);

                                // Add pulse animation if count increased
                                if (response.unreadCount > previousUnreadCount) {
                                    $('#pendaftarBadge').addClass('pulse-animation');
                                    setTimeout(function() {
                                        $('#pendaftarBadge').removeClass('pulse-animation');
                                    }, 1000);
                                }
                            } else {
                                $('#pendaftarBadge, #buttonBadge').fadeOut(300);
                            }

                            previousUnreadCount = response.unreadCount;
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error checking registrations:', error);
                    },
                    complete: function() {
                        setTimeout(updateRegistrationCounts, 3000); // Check every 3 seconds
                    }
                });
            }

            // Add CSS for pulse animation
            $('<style>')
                .text(`
            @keyframes pulse-animation {
                0% { transform: scale(1); }
                50% { transform: scale(1.2); }
                100% { transform: scale(1); }
            }
            .pulse-animation {
                animation: pulse-animation 1s ease-in-out;
            }
        `)
                .appendTo('head');

            // Start checking for updates
            updateRegistrationCounts();
        });
    </script>
@endpush
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Welcome Card -->
        <div class="row">
            <div class="col-12">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h3 class="card-title text-white mb-1">Selamat Datang, {{ Auth::user()->name }}! 👋</h3>
                                <p class="mb-0">Selamat datang di dashboard admin Victory</p>
                            </div>
                            <div class="avatar avatar-lg">
                                <i class='bx bxs-crown fs-1'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="row">
            <div class="col-sm-3 col-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h5 class="card-title mb-0">Program</h5>
                                <h2 class="fw-bold mt-2">{{ $program }}</h2>
                                <p class="mb-0">Total Program</p>
                            </div>
                            <div class="avatar bg-light-primary p-3">
                                <i class='bx bx-book-content text-primary fs-3'></i>
                            </div>
                        </div>
                        <a href="{{ route('program.index') }}" class="btn btn-primary btn-sm mt-3 w-100">Lihat Detail</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-3 col-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h5 class="card-title mb-0">Informasi</h5>
                                <h2 class="fw-bold mt-2">{{ $informasi }}</h2>
                                <p class="mb-0">Total Informasi</p>
                            </div>
                            <div class="avatar bg-light-info p-3">
                                <i class='bx bx-news text-info fs-3'></i>
                            </div>
                        </div>
                        <a href="{{ route('informasi.index') }}" class="btn btn-info btn-sm mt-3 w-100">Lihat Detail</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-3 col-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h5 class="card-title mb-0">Fasilitas</h5>
                                <h2 class="fw-bold mt-2">{{ $fasilitas }}</h2>
                                <p class="mb-0">Total Fasilitas</p>
                            </div>
                            <div class="avatar bg-light-success p-3">
                                <i class='bx bx-building-house text-success fs-3'></i>
                            </div>
                        </div>
                        <a href="{{ route('fasilitas.index') }}" class="btn btn-success btn-sm mt-3 w-100">Lihat Detail</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-3 col-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h5 class="card-title mb-0">Pendaftar</h5>
                                <h2 class="fw-bold mt-2">
                                    <span id="pendaftarCount">{{ $pendaftaran }}</span>
                                    <span id="pendaftarBadge" class="ms-2 badge bg-danger fs-6 align-text-top"
                                        style="display: {{ isset($unreadCount) && $unreadCount > 0 ? 'inline-block' : 'none' }}">
                                        +<span id="unreadCount">{{ $unreadCount ?? 0 }}</span>
                                    </span>
                                </h2>
                                <p class="mb-0">Total Pendaftar</p>
                            </div>
                            <div class="avatar bg-light-warning p-3">
                                <i class='bx bx-user-plus text-warning fs-3'></i>
                            </div>
                        </div>
                        <a href="{{ route('laporan.pendaftaran') }}"
                            class="btn btn-warning btn-sm mt-3 w-100 position-relative">
                            Lihat Detail
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Chart -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Statistik Pendaftar</h5>
                    </div>
                    <div class="card-body">
                        <div id="registrationChart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @push('scripts')
        <script>
            var options = {
                series: [{
                    name: 'Jumlah Pendaftar',
                    data: {!! json_encode($chart_data) !!}
                }],
                chart: {
                    height: 350,
                    type: 'area',
                    toolbar: {
                        show: false
                    }
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'smooth',
                    width: 3
                },
                colors: ['#696cff'],
                xaxis: {
                    categories: {!! json_encode($chart_dates) !!},
                    axisBorder: {
                        show: false
                    }
                },
                yaxis: {
                    labels: {
                        formatter: function(val) {
                            return Math.floor(val);
                        }
                    }
                },
                grid: {
                    padding: {
                        top: -20
                    }
                },
                tooltip: {
                    y: {
                        formatter: function(val) {
                            return val + " Pendaftar"
                        }
                    }
                },
                fill: {
                    type: 'gradient',
                    gradient: {
                        shadeIntensity: 1,
                        opacityFrom: 0.7,
                        opacityTo: 0.3,
                    }
                }
            };

            var chart = new ApexCharts(document.querySelector("#registrationChart"), options);
            chart.render();
        </script>
    @endpush
@endsection
