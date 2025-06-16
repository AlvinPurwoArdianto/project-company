@extends('layouts.admin.template')

@push('style')
<style>
    /* Card Styling */
    .card {
        box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        border-radius: 1rem;
        overflow: hidden;
        border: none;
        margin-bottom: 2rem;
        transition: all 0.3s ease;
    }

    .card:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 40px rgba(0,0,0,0.12);
    }

    /* Header Styling */
    .card-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: #fff;
        padding: 1.75rem 2rem;
        border-bottom: none;
        position: relative;
        overflow: hidden;
    }

    .card-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="75" cy="75" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="50" cy="10" r="1" fill="rgba(255,255,255,0.05)"/><circle cx="10" cy="60" r="1" fill="rgba(255,255,255,0.05)"/></pattern></defs><rect width="100%" height="100%" fill="url(%23grain)"/></svg>');
        opacity: 0.3;
    }

    .card-header-content {
        display: flex;
        justify-content: space-between;
        align-items: center;
        position: relative;
        z-index: 1;
        width: 100%;
    }

    .card-title {
        font-size: 1.5rem;
        font-weight: 700;
        margin: 0;
        text-shadow: 0 2px 4px rgba(0,0,0,0.1);
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .card-title i {
        font-size: 1.75rem;
        opacity: 0.9;
    }

    /* Export Buttons */
    .export-buttons {
        display: flex;
        gap: 0.75rem;
        margin-left: auto;
        flex-shrink: 0;
    }

    .export-btn {
        background: rgba(255,255,255,0.15);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255,255,255,0.2);
        color: #fff;
        padding: 0.625rem 1.25rem;
        font-size: 0.9rem;
        font-weight: 600;
        border-radius: 0.5rem;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
        text-decoration: none;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    .export-btn:hover {
        background: rgba(255,255,255,0.25);
        transform: translateY(-2px) scale(1.05);
        color: #fff;
        text-decoration: none;
        box-shadow: 0 4px 16px rgba(0,0,0,0.2);
    }

    .export-btn i {
        font-size: 1.1rem;
    }

    /* Card Body */
    .card-body {
        padding: 2rem;
        background: #fff;
    }

    /* Table Improvements */
    .table-container {
        background: #fff;
        border-radius: 0.75rem;
        overflow: hidden;
        box-shadow: 0 2px 12px rgba(0,0,0,0.04);
    }

    .table {
        margin-bottom: 0;
        font-size: 0.9rem;
    }

    .table th {
        background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        font-weight: 700;
        font-size: 0.8rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        color: #475569;
        border-bottom: 2px solid #e2e8f0;
        padding: 1rem 0.75rem;
        white-space: nowrap;
    }

    .table td {
        padding: 1rem 0.75rem;
        vertical-align: middle;
        border-bottom: 1px solid #f1f5f9;
    }

    .table tbody tr {
        transition: all 0.2s ease;
    }

    .table tbody tr:hover {
        background-color: #f8fafc;
        transform: scale(1.01);
    }

    /* Badge Improvements */
    .badge {
        padding: 0.5em 0.875em;
        font-size: 0.75em;
        font-weight: 600;
        border-radius: 0.375rem;
        text-transform: uppercase;
        letter-spacing: 0.025em;
    }

    .badge.bg-success {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%) !important;
        box-shadow: 0 2px 8px rgba(16, 185, 129, 0.3);
    }

    .badge.bg-secondary {
        background: linear-gradient(135deg, #6b7280 0%, #4b5563 100%) !important;
        box-shadow: 0 2px 8px rgba(107, 114, 128, 0.3);
    }

    /* Button Improvements */
    .btn-primary {
        background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
        border: none;
        font-weight: 600;
        border-radius: 0.5rem;
        transition: all 0.3s ease;
        box-shadow: 0 2px 8px rgba(59, 130, 246, 0.3);
    }

    .btn-primary:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 16px rgba(59, 130, 246, 0.4);
    }

    /* Modal Improvements */
    .modal-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border-bottom: none;
        padding: 1.5rem 2rem;
    }

    .modal-title {
        font-weight: 700;
        font-size: 1.25rem;
    }

    .modal-body {
        padding: 2rem;
    }

    .modal-content {
        border-radius: 1rem;
        border: none;
        box-shadow: 0 20px 60px rgba(0,0,0,0.15);
    }

    /* Breadcrumb */
    .breadcrumb-container {
        background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        padding: 1.5rem 2rem;
        border-radius: 1rem;
        margin-bottom: 2rem;
        box-shadow: 0 2px 12px rgba(0,0,0,0.04);
    }

    .page-title {
        font-size: 2rem;
        font-weight: 800;
        color: #1e293b;
        margin: 0;
        text-shadow: 0 2px 4px rgba(0,0,0,0.05);
    }

    .breadcrumb-text {
        color: #64748b;
        font-weight: 500;
        font-size: 1.1rem;
    }

    /* DataTable Customization */
    .dataTables_wrapper .dataTables_length,
    .dataTables_wrapper .dataTables_filter,
    .dataTables_wrapper .dataTables_info,
    .dataTables_wrapper .dataTables_paginate {
        margin: 1rem 0;
    }

    .dataTables_wrapper .dataTables_filter input {
        border-radius: 0.5rem;
        border: 1px solid #e2e8f0;
        padding: 0.5rem 1rem;
        margin-left: 0.5rem;
    }

    .dataTables_wrapper .dataTables_length select {
        border-radius: 0.5rem;
        border: 1px solid #e2e8f0;
        padding: 0.25rem 2rem 0.25rem 0.5rem;
        margin: 0 0.5rem;
    }

    /* Info Section in Modal */
    .info-section {
        background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        border-radius: 0.75rem;
        padding: 1.5rem;
        margin-bottom: 1.5rem;
    }

    .info-section h6 {
        color: #3730a3;
        font-weight: 700;
        margin-bottom: 1rem;
        font-size: 1.1rem;
        border-left: 4px solid #667eea;
        padding-left: 0.75rem;
    }

    .info-row {
        display: flex;
        padding: 0.5rem 0;
        border-bottom: 1px solid rgba(226, 232, 240, 0.5);
    }

    .info-row:last-child {
        border-bottom: none;
    }

    .info-label {
        font-weight: 600;
        color: #475569;
        min-width: 140px;
        flex-shrink: 0;
    }

    .info-value {
        color: #1e293b;
        font-weight: 500;
    }

    /* Responsive improvements */
    @media (max-width: 768px) {
        .card-header {
            padding: 1.25rem 1rem;
        }

        .card-header-content {
            flex-direction: column;
            gap: 1rem;
            align-items: flex-end;
        }

        .export-buttons {
            width: 100%;
            justify-content: center;
            margin-left: 0;
        }

        .card-title {
            font-size: 1.25rem;
            text-align: center;
        }

        .card-body {
            padding: 1.5rem 1rem;
        }
    }
</style>
@endpush

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Laporan /</span> Laporan pendaftaran</h4>

    <div class="card">
    <!-- Main Card -->
        <div class="card-header d-flex flex-wrap justify-content-between align-items-center">
            <div class="card-header-content d-flex align-items-center gap-2">
                <h4 class="card-title mb-0">
                    Laporan Pendaftaran
                </h4>
            </div>
            <div class="export-buttons d-flex gap-2 ms-auto">
                <a href="{{ route('laporan.pendaftaran.pdf') }}" class="export-btn">
                    <i class="bx bx-download"></i>
                    Export PDF
                </a>
                <a href="{{ route('laporan.pendaftaran.excel') }}" class="export-btn">
                    <i class="bx bx-file"></i>
                    Export Excel
                </a>
            </div>
        </div>

        <div class="card-body">
            <div class="table-container">
                <table id="pendaftaranTable" class="table table-hover display nowrap w-100">
                    <thead>
                        <tr>
                            <th><i class="bx bx-hash me-1"></i>No</th>
                            <th><i class="bx bx-user me-1"></i>Nama</th>
                            <th><i class="bx bx-envelope me-1"></i>Email</th>
                            <th><i class="bx bx-male-female me-1"></i>Jenis Kelamin</th>
                            <th><i class="bx bx-phone me-1"></i>No Telepon</th>
                            <th><i class="bx bx-calendar me-1"></i>Tanggal Daftar</th>
                            <th><i class="bx bx-note me-1"></i>Keterangan</th>
                            <th><i class="bx bx-cog me-1"></i>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pendaftaran as $data)
                        <tr>
                            <td><span class="fw-bold text-primary">#{{ $loop->iteration }}</span></td>
                            <td>
                                <div class="d-flex align-items-center text-center">
                                    <span class="fw-semibold">{{ $data->nama }}</span>
                                </div>
                            </td>
                            <td>
                                <span class="text-muted">
                                    <i class="bx bx-envelope me-1"></i>
                                    {{ $data->email }}
                                </span>
                            </td>
                            <td>
                                <span class="badge {{ $data->jenis_kelamin == 'Laki-laki' ? 'bg-info' : 'bg-warning' }}">
                                    {{ $data->jenis_kelamin }}
                                </span>
                            </td>
                            <td>
                                <span class="text-muted">
                                    <i class="bx bx-phone me-1"></i>
                                    {{ $data->no_telepon }}
                                </span>
                            </td>
                            <td>
                                <span class="fw-medium">
                                    {{ \Carbon\Carbon::parse($data->tanggal_pendaftaran)->format('d F Y') }}
                                </span>
                            </td>
                            <td>
                                @if($data->keterangan)
                                    <span class="badge bg-success">{{ Str::limit($data->keterangan, 20) }}</span>
                                @else
                                    <span class="badge bg-secondary">Tidak ada</span>
                                @endif
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#detailModal{{ $data->id }}">
                                    <i class="bx bx-show me-1"></i>
                                    Detail
                                </button>
                            </td>
                        </tr>

                        {{-- Modal Detail --}}
                        <div class="modal fade" id="detailModal{{ $data->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-xl">
                                <div class="modal-content rounded-4 shadow">
                                    <div class="modal-header py-3 px-4 border-0" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: #fff;">
                                        <h5 class="modal-title d-flex align-items-center text-white gap-2">
                                            <i class="bx bx-user-detail"></i>
                                            Detail Pendaftaran - <span class="fw-bold">{{ $data->nama }}</span>
                                        </h5>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body p-4">
                                        <div class="row g-4">
                                            <div class="col-md-6">
                                                <div class="info-section mb-4 p-3 rounded-3 bg-light border">
                                                    <h6 class="mb-3 text-primary fw-bold"><i class="bx bx-user me-2"></i>Informasi Pribadi</h6>
                                                    <dl class="row mb-0">
                                                        <dt class="col-5 text-muted">Nama Lengkap</dt>
                                                        <dd class="col-7">{{ $data->nama ?: '-' }}</dd>
                                                        <dt class="col-5 text-muted">Email</dt>
                                                        <dd class="col-7">{{ $data->email ?: '-' }}</dd>
                                                        <dt class="col-5 text-muted">Jenis Kelamin</dt>
                                                        <dd class="col-7">{{ $data->jenis_kelamin ?: '-' }}</dd>
                                                        <dt class="col-5 text-muted">Tempat Lahir</dt>
                                                        <dd class="col-7">{{ $data->tempat_lahir ?: '-' }}</dd>
                                                        <dt class="col-5 text-muted">Tanggal Lahir</dt>
                                                        <dd class="col-7">{{ \Carbon\Carbon::parse($data->tanggal_lahir)->translatedFormat('d F Y') }}</dd>
                                                        <dt class="col-5 text-muted">No. Telepon</dt>
                                                        <dd class="col-7">{{ $data->no_telepon ?: '-' }}</dd>
                                                        <dt class="col-5 text-muted">Alamat</dt>
                                                        <dd class="col-7">{{ $data->alamat ?: '-' }}</dd>
                                                    </dl>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="info-section mb-4 p-3 rounded-3 bg-light border">
                                                    <h6 class="mb-3 text-primary fw-bold"><i class="bx bx-file-blank me-2"></i>Informasi Pendaftaran</h6>
                                                    <dl class="row mb-0">
                                                        <dt class="col-5 text-muted">Nama Bank</dt>
                                                        <dd class="col-7">{{ $data->bank ?: '-' }}</dd>
                                                        <dt class="col-5 text-muted">No. Rekening</dt>
                                                        <dd class="col-7">{{ $data->no_rekening ?: '-' }}</dd>
                                                        <dt class="col-5 text-muted">Nama Orang Tua</dt>
                                                        <dd class="col-7">{{ $data->nama_orang_tua ?: '-' }}</dd>
                                                        <dt class="col-5 text-muted">Alamat Orang Tua</dt>
                                                        <dd class="col-7">{{ $data->alamat_orang_tua ?: '-' }}</dd>
                                                        <dt class="col-5 text-muted">Tanggal Daftar</dt>
                                                        <dd class="col-7">{{ \Carbon\Carbon::parse($data->tanggal_pendaftaran)->translatedFormat('d F Y') }}</dd>
                                                    </dl>
                                                </div>
                                            </div>
                                        </div>
                                        @if($data->keterangan)
                                        <div class="info-section mt-3 p-3 rounded-3 bg-white border border-primary">
                                            <h6 class="mb-2 text-primary fw-bold"><i class="bx bx-note me-2"></i>Keterangan</h6>
                                            <div class="ps-2">{{ $data->keterangan }}</div>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="modal-footer bg-light border-0 rounded-bottom-4 px-4 py-3">
                                        <button class="btn btn-secondary" data-bs-dismiss="modal">
                                            <i class="bx bx-x me-1"></i>
                                            Tutup
                                        </button>
                                        <a href="https://wa.me/62{{ ltrim($data->no_telepon, '0') }}?text=Haloo Kita Dari Tim Victory, Apakah Anda Yakin Ingin Bergabung?" class="btn btn-success" target="_blank">
                                            <i class="bx bxl-whatsapp me-1"></i>
                                            Hubungi WhatsApp
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#pendaftaranTable').DataTable({
            responsive: true,
            autoWidth: false,
            pageLength: 25,
            language: {
                search: '<i class="bx bx-search"></i>',
                searchPlaceholder: "Cari data pendaftaran...",
                lengthMenu: 'Tampilkan _MENU_ data per halaman',
                info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                infoEmpty: "Menampilkan 0 sampai 0 dari 0 data",
                infoFiltered: "(difilter dari _MAX_ total data)",
                zeroRecords: "Tidak ada data yang ditemukan",
                emptyTable: "Tidak ada data tersedia dalam tabel",
                paginate: {
                    first: '<i class="bx bx-chevrons-left"></i>',
                    last: '<i class="bx bx-chevrons-right"></i>',
                    next: '<i class="bx bx-chevron-right"></i>',
                    previous: '<i class="bx bx-chevron-left"></i>'
                }
            },
            dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>rtip',
            columnDefs: [
                { targets: [0], width: '5%' },
                { targets: [1], width: '15%' },
                { targets: [2], width: '20%' },
                { targets: [3], width: '10%' },
                { targets: [4], width: '15%' },
                { targets: [5], width: '12%' },
                { targets: [6], width: '15%' },
                { targets: [7], width: '8%', orderable: false }
            ]
        });
    });
</script>
@endpush