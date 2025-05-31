@extends('layouts.admin.template')
@section('content')
@push('style')
<style>
    .image-preview {
        cursor: pointer;
        transition: transform 0.2s ease;
    }

    .image-preview:hover {
        transform: scale(1.1);
    }

    .modal-dialog {
        max-width: 800px;
    }

    .modal-body img {
        max-height: 80vh;
        object-fit: contain;
    }
</style>
@endpush
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tabel /</span> Tabel fasilitas</h4>
    <div class="card">
        <h5 class="card-header d-flex justify-content-between align-items-center">
            <span>Table fasilitas</span>
            <a href="{{ route('fasilitas.create') }}" class="btn btn-sm btn-primary">+ Tambah</a>
        </h5>
        <div class="card-body">
            <table id="fasilitasTable" class="table table-hover display nowrap w-100">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Nama Fasilitas</th>
                        <th>Gambar</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($fasilitas as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->nama_fasilitas }}</td>
                        <td>
                            <img src="{{ asset('/images/fasilitas/' . $data->cover) }}" width="80"
                                class="img-thumbnail image-preview" data-bs-toggle="modal"
                                data-bs-target="#imageModal{{ $data->id }}">

                            <!-- Modal -->
                            <div class="modal fade" id="imageModal{{ $data->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">{{ $data->nama_fasilitas }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-center">
                                            <img src="{{ asset('/images/fasilitas/' . $data->cover) }}"
                                                class="img-fluid" alt="{{ $data->nama_fasilitas }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('fasilitas.edit', $data->id) }}" class="btn btn-sm btn-warning">
                                    <i class="bx bx-edit-alt me-1"></i> Edit
                                </a>
                                <a href="{{ route('fasilitas.destroy', $data->id) }}" class="btn btn-sm btn-danger"
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
        $('#fasilitasTable').DataTable({
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
                { orderable: false, targets: [2, 3] } // Disable sorting for image and action columns
            ]
        });
    });
</script>

<script>
    // Add hover effect for image preview
    $(document).ready(function() {
        $('.image-preview').hover(
            function() {
                $(this).css('box-shadow', '0 0 10px rgba(0,0,0,0.2)');
            },
            function() {
                $(this).css('box-shadow', 'none');
            }
        );
    });
</script>
@endpush
@endsection