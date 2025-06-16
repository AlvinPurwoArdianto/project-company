@extends('layouts.admin.template')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tabel /</span> Tabel Testimoni</h4>
    <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Edit Testimoni</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('testimoni.update', $testimoni->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="nama">Nama</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                id="nama" placeholder="Masukan Nama Anda" name="nama"
                                value="{{ old('nama', $testimoni->nama) }}" />
                        </div>
                        @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="testimoni">Testimoni</label>
                    <div class="col-sm-10">
                        <textarea class="form-control @error('testimoni') is-invalid @enderror" id="testimoni"
                            name="testimoni" placeholder="Tulis testimoni Anda">{{ old('testimoni', $testimoni->testimoni) }}</textarea>
                        @error('testimoni')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="rating">Rating</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <input type="number" min="1" max="5" class="form-control @error('rating') is-invalid @enderror"
                                id="rating" placeholder="Masukan rating 1-5" name="rating"
                                value="{{ old('rating', $testimoni->rating) }}" />
                        </div>
                        @error('rating')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="status">Status</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <select name="status" class="form-control @error('status') is-invalid @enderror" id="status">
                                <option value="" disabled>Pilih Status</option>
                                <option value="pending" {{ old('status', $testimoni->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="approved" {{ old('status', $testimoni->status) == 'approved' ? 'selected' : '' }}>Approved</option>
                                <option value="rejected" {{ old('status', $testimoni->status) == 'rejected' ? 'selected' : '' }}>Rejected</option>
                            </select>
                        </div>
                        @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row justify-content-end">
                    <div class="col-sm-10">
                        <a href="{{ route('testimoni.index') }}" class="btn btn-danger">Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection