@extends('layouts.admin.template')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tabel /</span> Tabel Program</h4>
    <div class="card">
        <h5 class="card-header d-flex justify-content-between align-items-center">
            <span>Table Program</span>
            <a href="{{ route('program.create') }}" class="btn btn-sm btn-primary">+ Tambah</a>
        </h5>
        <div class="card-body">
            <table id="programTable" class="table table-hover display nowrap w-100">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Nama Program</th>
                        <th>Deskripsi</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($program as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><strong>{{ $data->nama_program }}</strong></td>
                        <td>{{ Str::limit($data->deskripsi, 100, '...') }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('program.edit', $data->id) }}" class="btn btn-sm btn-warning">
                                    <i class="bx bx-edit-alt me-1"></i> Edit
                                </a>
                                <a href="{{ route('program.destroy', $data->id) }}" class="btn btn-sm btn-danger"
                                    data-confirm-delete="true">
                                    <i class="bx bx-trash-alt me-1"></i> Delete
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function() {
        $('#programTable').DataTable({
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
                { responsivePriority: 3, targets: -1 },
                { orderable: false, targets: -1 } // Disable sorting for action column
            ]
        });
    });
</script>


<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
    });

    @if(session('success'))
        Toast.fire({
            icon: 'success',
            title: "{{ session('success') }}"
        });
    @endif

    @if(session('error'))
        Toast.fire({
            icon: 'error',
            title: "{{ session('error') }}"
        });
    @endif
</script>
@endpush
@endsection