@extends('layouts.admin.template')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tabel /</span> Tabel pendaftaran</h4>
    <div class="card">
        <h5 class="card-header d-flex justify-content-between align-items-center">
            <span>Table pendaftaran</span>
            <a href="{{ route('pendaftaran.create') }}" class="btn btn-sm btn-primary">+ Tambah</a>
        </h5>
        <div class="card-body">
            <table id="pendaftaranTable" class="table table-hover display nowrap w-100">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Jenis Kelamin</th>
                        <th>No Telepon</th>
                        <th width="25%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pendaftaran as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->email }}</td>
                        <td>{{ $data->jenis_kelamin }}</td>
                        <td>{{ $data->no_telepon }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#detailModal{{ $data->id }}">
                                    <i class="bx bx-show me-1"></i> Detail
                                </button>
                                <a href="https://wa.me/62{{ $data->no_telepon }}?text=Haloo Kita Dari Tim Victory, Apakah Anda Yakin Ingin Bergabung?"
                                    class="btn btn-sm btn-info">
                                    <i class="bi bi-whatsapp me-1"></i> WhatsApp
                                </a>
                                <a href="{{ route('pendaftaran.destroy', $data->id) }}" class="btn btn-sm btn-danger"
                                    data-confirm-delete="true">
                                    <i class="bx bx-trash-alt me-1"></i> Delete
                                </a>
                            </div>
                        </td>
                    </tr>
                    <div class="modal fade" id="detailModal{{ $data->id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Detail Pendaftaran</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row mb-3">
                                        <div class="col-md-4 fw-bold">Nama Lengkap</div>
                                        <div class="col-md-8">: {{ $data->nama }}</div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4 fw-bold">Email</div>
                                        <div class="col-md-8">: {{ $data->email }}</div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4 fw-bold">Jenis Kelamin</div>
                                        <div class="col-md-8">: {{ $data->jenis_kelamin }}</div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4 fw-bold">Tempat Lahir</div>
                                        <div class="col-md-8">: {{ $data->tempat_lahir }}</div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4 fw-bold">Tanggal Lahir</div>
                                        <div class="col-md-8">: {{
                                            \Carbon\Carbon::parse($data->tanggal_lahir)->format('d F Y') }}</div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4 fw-bold">No. Telepon</div>
                                        <div class="col-md-8">: {{ $data->no_telepon }}</div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4 fw-bold">Alamat</div>
                                        <div class="col-md-8">: {{ $data->alamat }}</div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4 fw-bold">Tanggal Daftar</div>
                                        <div class="col-md-8">: {{
                                            \Carbon\Carbon::parse($data->tanggal_pendaftaran)->format('d F Y') }}</div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="https://wa.me/62{{ $data->no_telepon }}?text=Haloo Kita Dari Tim Victory, Apakah Anda Yakin Ingin Bergabung?"
                                        class="btn btn-primary">
                                        <i class="bi bi-whatsapp me-1"></i> Hubungi WhatsApp
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

@push('scripts')
<script>
    $(document).ready(function() {
        $('#pendaftaranTable').DataTable({
            responsive: true,
            scrollX: false,
            autoWidth: false,
            language: {
                search: "Cari:",
                lengthMenu: "Tampilkan _MENU_ data per halaman",
                zeroRecords: "Data tidak ditemukan",
                info: "Menampilkan halaman _PAGE_ dari _PAGES_",
                infoEmpty: "Tidak ada data yang tersedia",
                infoFiltered: "(difilter dari _MAX_ total data)",
                paginate: {
                    first: "Pertama",
                    last: "Terakhir",
                    next: "Selanjutnya",
                    previous: "Sebelumnya"
                }
            },
            dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>' +
                '<"row"<"col-sm-12"tr>>' +
                '<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
            columnDefs: [
                { responsivePriority: 1, targets: 0 },
                { responsivePriority: 2, targets: 1 },
                { responsivePriority: 3, targets: -1 }
            ]
        });
    });
</script>
@endpush
@endsection