@extends('layouts.admin.template')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tabel /</span> Tabel Fasilitas</h4>
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Edit Fasilitas</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('fasilitas.update', $fasilitas->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="nama_fasilitas">Nama Fasilitas</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text"
                                    class="form-control @error('nama_fasilitas') is-invalid @enderror"
                                    id="nama_fasilitas"
                                    placeholder="Nama fasilitas"
                                    name="nama_fasilitas"
                                    value="{{ old('nama_fasilitas', $fasilitas->nama_fasilitas) }}" />
                            </div>
                            @error('nama_fasilitas')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="cover">Cover</label>
                        <div class="col-sm-10">
                            <div class="mb-3">
                                <img src="{{ asset('images/fasilitas/' . $fasilitas->cover) }}"
                                    alt="Current Cover"
                                    class="img-thumbnail"
                                    id="coverPreview"
                                    style="max-height: 200px;">
                            </div>
                            <div class="input-group input-group-merge">
                                <input type="file"
                                    class="form-control @error('cover') is-invalid @enderror"
                                    id="cover"
                                    name="cover"
                                    accept="image/*"
                                    onchange="previewImage(this)"/>
                            </div>
                            @error('cover')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                            <div class="form-text">Format yang diperbolehkan: PNG, JPG, JPEG. Maksimal 2MB</div>
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <a href="{{ route('fasilitas.index') }}" class="btn btn-danger">Kembali</a>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        function previewImage(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('coverPreview').src = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    @endpush
@endsection