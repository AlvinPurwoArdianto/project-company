@extends('layouts.admin.template')
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h4 class="fw-bold mb-1">Testimoni Pengguna</h4>
            <small class="text-muted">Manajemen data testimoni dari pengguna</small>
        </div>
    </div>

    <!-- Tab Filter -->
    @php $activeTab = request('tab', 'all'); @endphp
    <ul class="nav nav-pills mb-3">
        <li class="nav-item">
            <a class="nav-link {{ $activeTab == 'all' ? 'active' : '' }}" href="{{ route('testimoni.index', ['tab' => 'all']) }}">
                Semua
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $activeTab == 'approved' ? 'active' : '' }}" href="{{ route('testimoni.index', ['tab' => 'approved']) }}">
                Dipublish
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $activeTab == 'archived' ? 'active' : '' }}" href="{{ route('testimoni.index', ['tab' => 'archived']) }}">
                Diarsipkan
            </a>
        </li>
    </ul>

    <!-- Card Table Wrapper -->
    <div class="card shadow-sm">
        <div class="card-header bg-light d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Daftar Testimoni</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="testimoniTable" class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th width="5%">No</th>
                            <th>Nama</th>
                            <th>Testimoni</th>
                            <th>Rating</th>
                            <th>Status</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($testimoni as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->nama }}</td>
                            <td>{!! Str::limit($data->testimoni, 50) !!}</td>
                            <td>
                                @for($i=1; $i<=$data->rating; $i++)
                                    <span class="text-warning">&#9733;</span>
                                @endfor
                            </td>
                            <td>
                                <span class="badge
                                    @if($data->status == 'approved') bg-success
                                    @elseif($data->status == 'pending') bg-info text-white
                                    @elseif($data->status == 'archived') bg-secondary text-white
                                    @else bg-danger
                                    @endif
                                ">
                                    {{ ucfirst($data->status) }}
                                </span>
                            </td>
                            <td>
                                <div class="d-flex gap-2">
                                    {{-- Tombol Approve --}}
                                    @if($data->status === 'approved')
                                        <button type="button" class="btn btn-sm btn-primary" title="Sudah Disetujui" disabled>
                                            <i class="bx bx-check-double"></i>
                                        </button>
                                    @elseif($data->status === 'archived')
                                        <button type="button" class="btn btn-sm btn-outline-primary" title="Tidak dapat disetujui (sudah diarsipkan)" disabled>
                                            <i class="bx bx-check"></i>
                                        </button>
                                    @else
                                        <form action="{{ route('testimoni.update', $data->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="status" value="approved">
                                            <button type="submit" class="btn btn-sm btn-success" title="Setujui">
                                                <i class="bx bx-check"></i>
                                            </button>
                                        </form>
                                    @endif

                                    {{-- Tombol Archive --}}
                                    @if($data->status === 'archived')
                                        <button type="button" class="btn btn-sm btn-secondary" title="Sudah Diarsipkan" disabled>
                                            <i class="bx bx-archive"></i>
                                        </button>
                                    @elseif($data->status === 'approved')
                                        <form action="{{ route('testimoni.update', $data->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="status" value="archived">
                                            <button type="submit" class="btn btn-sm btn-secondary" title="Arsipkan" disabled>
                                                <i class="bx bx-archive"></i>
                                            </button>
                                        </form>
                                    @else
                                        <form action="{{ route('testimoni.update', $data->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="status" value="archived">
                                            <button type="submit" class="btn btn-sm btn-secondary" title="Arsipkan">
                                                <i class="bx bx-archive"></i>
                                            </button>
                                        </form>
                                    @endif
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

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        $('#testimoniTable').DataTable({
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
                { orderable: false, targets: [3, 5] } // Disable sorting for image and action columns
            ]
        });
    });

    $(document).ready(function () {
        $('.btn-delete').on('click', function (e) {
            e.preventDefault();
            let form = $(this).closest('form');
            Swal.fire({
                title: 'Hapus testimoni?',
                text: "Data tidak dapat dikembalikan!",
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
