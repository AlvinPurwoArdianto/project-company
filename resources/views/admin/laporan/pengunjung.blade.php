@extends('layouts.admin.template')

@push('style')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css"/>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css"/>
@endpush

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-0">
                <i class="bx bx-bar-chart-alt-2 me-2"></i> Rekap Data Pengunjung
            </h4>
            <small class="text-muted">Laporan pengunjung pertama kali yang masuk ke halaman utama</small>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('laporan.pengunjung.excel') }}" class="btn btn-outline-success btn-sm">
                <i class="bx bx-file"></i> Excel
            </a>
            <a href="{{ route('laporan.pengunjung.pdf') }}" class="btn btn-outline-danger btn-sm">
                <i class="bx bx-download"></i> PDF
            </a>
        </div>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table id="visitorTable" class="table table-bordered table-hover table-striped align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>IP Address</th>
                            <th>Browser</th>
                            <th>URL</th>
                            <th>Waktu Kunjungan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($visitor as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->ip_address }}</td>
                            <td>{{ Str::limit($data->user_agent, 40) }}</td>
                            <td>{{ $data->url }}</td>
                            <td>{{ \Carbon\Carbon::parse($data->visited_at)->translatedFormat('d F Y H:i') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

<!-- Export dependencies -->
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>

<script>
    $(document).ready(function () {
        const table = $('#visitorTable').DataTable({
            responsive: true,
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
            }
        });

        // Geser tombol export ke luar tabel
        table.buttons().container().appendTo('#exportButtons');
    });
</script>
@endpush
