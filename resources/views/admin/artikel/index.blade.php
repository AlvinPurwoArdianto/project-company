@extends('layouts.admin.template')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tabel /</span> Tabel artikel</h4>
        <div class="card">
            <h5 class="card-header">Table artikel <a href="{{ route('artikel.create') }}" class="btn btn-sm btn-primary"
                    style="float: right">Tambah</a></h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Artikel</th>
                            <th>Deskripsi</th>
                            <th>Gambar</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($artikel as $data)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td> <strong> {{ $data->judul_artikel }} </strong></td>
                                <td> <strong>
                                        <a class="" href="{{ route('artikel.show', $data->id) }}"><i
                                                class="bx bx-search-alt me-1"></i>Lihat</a>
                                    </strong></td>
                                <td>
                                    <img src="{{ asset('/images/artikel/' . $data->cover) }}" width="100">
                                </td>
                                <td> <strong> {{ $data->tanggal }} </strong></td>
                                <td>
                                    <form action="{{ route('artikel.destroy', $data->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ route('artikel.edit', $data->id) }}"><i
                                                        class="bx bx-edit-alt me-1"></i> Edit</a>
                                                <a href="{{ route('artikel.destroy', $data->id) }}" class="dropdown-item"
                                                    data-confirm-delete="true"><i class="bx bx-trash-alt me-1"></i>
                                                    Delete</a>
                                            </div>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
