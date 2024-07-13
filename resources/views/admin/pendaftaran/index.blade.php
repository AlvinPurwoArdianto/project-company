@extends('layouts.admin.template')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tabel /</span> Tabel pendaftaran</h4>
        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">Table pendaftaran <a href="{{ route('pendaftaran.create') }}"
                    class="btn btn-sm btn-primary" style="float: right">Tambah</a></h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>Email</th>
                            <th>No Telepon</th>
                            <th>Tanggal Daftar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($pendaftaran as $data)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td> <strong> {{ $data->nama }} </strong></td>
                                <td> <strong> {{ $data->jenis_kelamin }} </strong></td>
                                <td> <strong> {{ $data->tanggal_lahir }} </strong></td>
                                <td> <strong> {{ $data->alamat }} </strong></td>
                                <td> <strong> {{ $data->email }} </strong></td>
                                <td> <strong> {{ $data->no_telepon }} </strong></td>
                                <td> <strong> {{ $data->tanggal_pendaftaran }} </strong></td>
                                <td>
                                    <form action="{{ route('pendaftaran.destroy', $data->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('pendaftaran.destroy', $data->id) }}"
                                            class="btn btn-sm btn-danger" data-confirm-delete="true"><i
                                                class="bx bx-trash-alt me-1"></i>
                                            Delete</a>
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
