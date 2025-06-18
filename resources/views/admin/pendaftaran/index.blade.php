@extends('layouts.admin.template')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h4 class="fw-bold mb-1">Daftar Data Pengguna</h4>
            <small class="text-muted">Manajemen data pengguna yang telah mendaftar</small>
        </div>
    </div>

    <!-- Card Table Wrapper -->
    <div class="card shadow-sm">
        <div class="card-header bg-light d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Data Pengguna</h5>
        </div>
        <div class="card-body">
            <table id="dataTable" class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Jenis Kelamin</th>
                        <th>No Telepon</th>
                        <th>Tanggal Daftar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pendaftaran as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->email }}</td>
                        <td>
                            <span class="badge {{ $data->jenis_kelamin == 'Laki-laki' ? 'bg-info' : 'bg-warning' }}">
                                {{ $data->jenis_kelamin }}
                            </span>
                        </td>
                        <td>{{ $data->no_telepon }}</td>
                        <td>{{ \Carbon\Carbon::parse($data->tanggal_pendaftaran)->format('d F Y') }}</td>
                        <td>
                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                data-bs-target="#detailModal{{ $data->id }}">
                                <i class="bx bx-show me-1"></i> Detail
                            </button>
                        </td>
                    </tr>

                    <!-- Modal Detail -->
                    <div class="modal fade" id="detailModal{{ $data->id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content rounded-4 shadow border-0">
                                {{-- HEADER --}}
                                <div class="modal-header py-3 px-4 border-0"
                                    style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: #fff;">
                                    <div>
                                        <h5 class="modal-title mb-1 text-white">
                                            <i class="bx bx-user-circle me-2"></i> Detail Pendaftaran
                                        </h5>
                                    </div>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                </div>

                                {{-- BODY --}}
                                <div class="modal-body p-4">
                                    {{-- Data Diri --}}
                                    <h6 class="mb-3 text-primary border-bottom pb-1">Data Diri</h6>
                                    <div class="row g-4 mb-4">
                                        <div class="col-md-6">
                                            <div>
                                                <strong class="text-dark">Nama Lengkap</strong>
                                                <div class="text-muted">{{ $data->nama }}</div>
                                            </div>
                                            <div class="mt-3">
                                                <strong class="text-dark">Jenis Kelamin</strong>
                                                <div>
                                                    <span class="badge {{ $data->jenis_kelamin == 'Laki-laki' ? 'bg-info' : 'bg-warning' }}">
                                                        {{ $data->jenis_kelamin }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="mt-3">
                                                <strong class="text-dark">Tempat & Tanggal Lahir</strong>
                                                <div class="text-muted">
                                                    {{ $data->tempat_lahir ?? '-' }}, {{ \Carbon\Carbon::parse($data->tanggal_lahir)->translatedFormat('d F Y') }}
                                                </div>
                                            </div>
                                            <div class="mt-3">
                                                <strong class="text-dark">Email</strong>
                                                <div class="text-muted">{{ $data->email }}</div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div>
                                                <strong class="text-dark">Tanggal Pendaftaran</strong>
                                                <div class="text-muted">
                                                    <i class="bx bx-calendar me-1"></i>
                                                    {{ \Carbon\Carbon::parse($data->tanggal_pendaftaran)->translatedFormat('d F Y') }}
                                                </div>
                                            </div>
                                            <div class="mt-3">
                                                <strong class="text-dark">No Telepon</strong>
                                                <div class="text-muted">{{ $data->no_telepon }}</div>
                                            </div>
                                            <div class="mt-3">
                                                <strong class="text-dark">Alamat</strong>
                                                <div class="text-muted">{{ $data->alamat }}</div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Data Orang Tua --}}
                                    <h6 class="mb-3 text-primary border-bottom pb-1">Data Orang Tua / Wali</h6>
                                    <div class="row g-4">
                                        <div class="col-md-6">
                                            <div>
                                                <strong class="text-dark">Nama Orang Tua</strong>
                                                <div class="text-muted">{{ $data->nama_orang_tua }}</div>
                                            </div>
                                            <div class="mt-3">
                                                <strong class="text-dark">No Telepon Orang Tua</strong>
                                                <div class="text-muted">{{ $data->no_telepon_orang_tua }}</div>
                                            </div>
                                            <div class="mt-3">
                                                <strong class="text-dark">Alamat Orang Tua</strong>
                                                <div class="text-muted">{{ $data->alamat_orang_tua }}</div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div>
                                                <strong class="text-dark">No Rekening</strong>
                                                <div class="text-muted">{{ $data->no_rekening }}</div>
                                            </div>
                                            <div class="mt-3">
                                                <strong class="text-dark">Bank</strong>
                                                <div class="text-muted">{{ $data->bank }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- FOOTER --}}
                                <div class="modal-footer bg-light border-0 px-4 py-3">
                                    <button class="btn btn-secondary" data-bs-dismiss="modal">
                                        <i class="bx bx-x me-1"></i> Tutup
                                    </button>
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
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        $('#dataTable').DataTable({
            responsive: true,
            scrollX: false,
            language: {
                search: "Cari:",
                lengthMenu: "Tampilkan _MENU_ data",
                zeroRecords: "Data tidak ditemukan",
                info: "Menampilkan _PAGE_ dari _PAGES_",
                infoEmpty: "Tidak ada data",
                infoFiltered: "(difilter dari _MAX_ data)",
                paginate: {
                    first: "Pertama",
                    last: "Terakhir",
                    next: "›",
                    previous: "‹"
                }
            },
            columnDefs: [
                { responsivePriority: 1, targets: 0 },
                { responsivePriority: 2, targets: 1 },
                { responsivePriority: 3, targets: -1 },
                { orderable: false, targets: [-1] }
            ]
        });
    });
</script>
@endpush