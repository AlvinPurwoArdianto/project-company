@extends('layouts.admin.template')

@push('style')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css"/>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css"/>
@endpush

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-0">
                <i class="bx bx-list-check me-2"></i> Laporan Pendaftaran
            </h4>
            <small class="text-muted">Data peserta yang telah melakukan pendaftaran</small>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('laporan.pendaftaran.excel') }}" class="btn btn-outline-success btn-sm">
                <i class="bx bx-file"></i> Excel
            </a>
            <a href="{{ route('laporan.pendaftaran.pdf') }}" class="btn btn-outline-danger btn-sm">
                <i class="bx bx-download"></i> PDF
            </a>
        </div>
    </div>

    {{-- Tabel --}}
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table id="pendaftaranTable" class="table table-bordered table-striped w-100">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Jenis Kelamin</th>
                            <th>No Telepon</th>
                            <th>Tanggal Daftar</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pendaftaran as $data)
                        <tr>
                            <td>#{{ $loop->iteration }}</td>
                            <td>{{ $data->nama }}</td>
                            <td>{{ $data->email }}</td>
                            <td>
                                <span class="badge {{ $data->jenis_kelamin == 'Laki-laki' ? 'bg-info' : 'bg-warning' }}">
                                    {{ $data->jenis_kelamin }}
                                </span>
                            </td>
                            <td>{{ $data->no_telepon }}</td>
                            <td>{{ \Carbon\Carbon::parse($data->tanggal_pendaftaran)->translatedFormat('d F Y') }}</td>
                            <td>
                                @if($data->keterangan)
                                    <span class="badge bg-success">{{ Str::limit($data->keterangan, 20) }}</span>
                                @else
                                    <span class="badge bg-secondary">Tidak ada</span>
                                @endif
                            </td>
                            <td>
                                <button class="btn btn-sm btn-primary"
                                        data-bs-toggle="modal"
                                        data-bs-target="#detailModal{{ $data->id }}">
                                    <i class="bx bx-show"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Semua modal detail (LOOP KE‑2, di luar tabel) --}}
            @foreach ($pendaftaran as $data)
            <div class="modal fade" id="detailModal{{ $data->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content rounded-4 shadow">
                        {{-- Header modal --}}
                        <div class="modal-header py-3 px-4 border-0"
                             style="background:linear-gradient(135deg,#667eea 0%,#764ba2 100%);color:#fff;">
                            <h5 class="modal-title d-flex align-items-center gap-2 text-white">
                                <i class="bx bx-user-detail"></i>
                                Detail Pendaftaran – {{ $data->nama }}
                            </h5>
                            {{-- <button type="button" class="b9tn-close btn-close-white" data-bs-dismiss="modal"></button> --}}
                        </div>

                        {{-- Body modal --}}
                        <div class="modal-body p-4">
                            <div class="row g-4">

                                <div class="col-md-6">
                                    <div class="bg-light p-3 border rounded h-100">
                                        <h6 class="text-primary fw-bold mb-3">
                                            <i class="bx bx-user"></i> Informasi Pribadi
                                        </h6>
                                        <hr>
                                        <table class="table table-sm table-borderless align-middle mb-0">
                                            <tr>
                                                <td class="fw-semibold w-40">Nama</td><td class="text-center w-1">:</td><td>{{ $data->nama }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-semibold">Email</td><td class="text-center">:</td><td>{{ $data->email }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-semibold">Jenis Kelamin</td><td class="text-center">:</td><td>{{ $data->jenis_kelamin }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-semibold">Tempat Lahir</td><td class="text-center">:</td><td>{{ $data->tempat_lahir ?: '-' }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-semibold">Tanggal Lahir</td><td class="text-center">:</td>
                                                <td>{{ \Carbon\Carbon::parse($data->tanggal_lahir)->translatedFormat('d F Y') }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-semibold">No. Telepon</td><td class="text-center">:</td><td>{{ $data->no_telepon }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-semibold">Alamat</td><td class="text-center">:</td><td>{{ $data->alamat }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="bg-light p-3 border rounded mb-4">
                                        <h6 class="text-primary fw-bold mb-3">
                                            <i class="bx bx-user-voice"></i> Informasi Orang Tua / Wali
                                        </h6>
                                        <hr>
                                        <table class="table table-sm table-borderless align-middle mb-0">
                                            <tr>
                                                <td class="fw-semibold w-40">Nama Orang Tua</td><td class="text-center w-1">:</td><td>{{ $data->nama_orang_tua }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-semibold">No. Telp Orang Tua</td><td class="text-center">:</td><td>{{ $data->no_telepon_orang_tua }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-semibold">Alamat Orang Tua</td><td class="text-center">:</td><td>{{ $data->alamat_orang_tua }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-semibold">Tanggal Daftar</td><td class="text-center">:</td>
                                                <td>{{ \Carbon\Carbon::parse($data->tanggal_pendaftaran)->translatedFormat('d F Y') }}</td>
                                            </tr>
                                        </table>
                                    </div>

                                    {{-- Informasi Bank --}}
                                    {{-- <div class="bg-light p-3 border rounded">
                                        <h6 class="text-primary fw-bold mb-3">
                                            <i class="bx bx-credit-card"></i> Informasi Bank
                                        </h6>
                                        <hr>
                                        <table class="table table-sm table-borderless align-middle mb-0">
                                            <tr>
                                                <td class="fw-semibold w-40">Bank</td><td class="text-center w-1">:</td><td>{{ $data->bank }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-semibold">No. Rekening</td><td class="text-center">:</td><td>{{ $data->no_rekening }}</td>
                                            </tr>
                                        </table>
                                    </div> --}}
                                </div>

                                @if($data->keterangan)
                                <div class="col-12">
                                    <div class="bg-white p-3 border rounded">
                                        <h6 class="text-primary fw-bold mb-2"><i class="bx bx-note"></i> Keterangan</h6>
                                        <p class="mb-0">{{ $data->keterangan }}</p>
                                    </div>
                                </div>
                                @endif
                            </div>


                            {{-- Keterangan tambahan --}}
                            @if($data->keterangan)
                            <div class="bg-white mt-4 p-3 border rounded">
                                <h6 class="text-primary fw-bold">
                                    <i class="bx bx-note"></i> Keterangan
                                </h6>
                                <p class="mb-0">{{ $data->keterangan }}</p>
                            </div>
                            @endif
                        </div>

                        {{-- Footer modal --}}
                        <div class="modal-footer border-0 px-4 py-3 bg-light">
                            <button class="btn btn-secondary" data-bs-dismiss="modal">
                                <i class="bx bx-x me-1"></i> Tutup
                            </button>
                            <a href="https://wa.me/62{{ ltrim($data->no_telepon, '0') }}?text=Halo%20Kami%20dari%20Tim%20Victory%2C%20Apakah%20Anda%20masih%20tertarik%20bergabung%3F"
                               class="btn btn-success" target="_blank">
                                <i class="bx bxl-whatsapp me-1"></i> WhatsApp
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            {{-- /end loop modal --}}
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function () {
        $('#pendaftaranTable').DataTable({
            responsive: true,
            autoWidth: false,
            language: {
                search: "Cari:",
                lengthMenu: "Tampilkan _MENU_ entri",
                zeroRecords: "Data tidak ditemukan",
                info: "Menampilkan _PAGE_ dari _PAGES_",
                infoEmpty: "Data tidak tersedia",
                infoFiltered: "(disaring dari _MAX_ total entri)",
                paginate: {
                    first: "Pertama",
                    last: "Terakhir",
                    next: "Berikutnya",
                    previous: "Sebelumnya"
                }
            }
        });
    });
</script>
@endpush
