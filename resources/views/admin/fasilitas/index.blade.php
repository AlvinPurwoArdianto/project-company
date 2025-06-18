@extends('layouts.admin.template')
@section('content')

@push('style')
<style>
    .image-preview {
        cursor: pointer;
        transition: transform 0.2s ease;
        border-radius: 0.5rem;
    }

    .image-preview:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    }

    .modal-body img {
        max-height: 80vh;
        object-fit: contain;
    }
</style>
@endpush

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h4 class="fw-bold mb-1">Tabel Fasilitas</h4>
            <small class="text-muted">Kelola daftar fasilitas yang tersedia</small>
        </div>
        <a href="{{ route('fasilitas.create') }}" class="btn btn-primary">
            <i class="bx bx-plus me-1"></i> Tambah Fasilitas
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table id="fasilitasTable" class="table table-hover table-striped align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama Fasilitas</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fasilitas as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="fw-semibold text-dark">{{ $data->nama_fasilitas }}</td>
                            <td>
                                <img src="{{ asset('/images/fasilitas/' . $data->cover) }}" class="img-thumbnail image-preview" width="80" alt="fasilitas" data-bs-toggle="modal" data-bs-target="#imageModal{{ $data->id }}">

                                <!-- Modal Gambar -->
                                <div class="modal fade" id="imageModal{{ $data->id }}" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">{{ $data->nama_fasilitas }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <img src="{{ asset('/images/fasilitas/' . $data->cover) }}" class="img-fluid rounded shadow" alt="{{ $data->nama_fasilitas }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                        Aksi
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="{{ route('fasilitas.edit', $data->id) }}">
                                                <i class="bx bx-edit-alt me-1"></i> Edit
                                            </a>
                                        </li>
                                        <li>
                                            <form action="{{ route('fasilitas.destroy', $data->id) }}" method="POST" class="delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="dropdown-item text-danger btn-delete">
                                                    <i class="bx bx-trash me-1"></i> Hapus
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function () {
        $('#fasilitasTable').DataTable({
            responsive: true,
            scrollX: false,
            autoWidth: false,
            language: {
                search: "Cari:",
                lengthMenu: "Tampilkan _MENU_ data per halaman",
                zeroRecords: "Data tidak ditemukan",
                info: "Menampilkan halaman _PAGE_ dari _PAGES_",
                infoEmpty: "Tidak ada data",
                infoFiltered: "(difilter dari _MAX_ total data)",
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
                { orderable: false, targets: [2, 3] }
            ]
        });

        $('.btn-delete').on('click', function(e) {
            e.preventDefault();
            let form = $(this).closest('form');
            Swal.fire({
                title: 'Hapus fasilitas?',
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>
@endpush
@endsection
