@extends('layouts.admin.template')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h4 class="fw-bold mb-1">Edit Fasilitas</h4>
            <small class="text-muted">Perbarui data fasilitas yang ada</small>
        </div>
        <a href="{{ route('fasilitas.index') }}" class="btn btn-sm btn-secondary">
            <i class="bx bx-arrow-back me-1"></i> Kembali
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('fasilitas.update', $fasilitas->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nama_fasilitas" class="form-label">Nama Fasilitas</label>
                    <input type="text"
                        class="form-control @error('nama_fasilitas') is-invalid @enderror"
                        id="nama_fasilitas"
                        name="nama_fasilitas"
                        value="{{ old('nama_fasilitas', $fasilitas->nama_fasilitas) }}"
                        placeholder="Masukkan nama fasilitas">
                    @error('nama_fasilitas')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="cover" class="form-label">Cover Fasilitas</label>
                    <div class="mb-3">
                        <img src="{{ asset('images/fasilitas/' . $fasilitas->cover) }}"
                            alt="Current Cover"
                            class="img-thumbnail"
                            id="coverPreview"
                            style="max-height: 200px;">
                    </div>
                    <input type="file"
                        class="form-control @error('cover') is-invalid @enderror"
                        id="cover"
                        name="cover"
                        accept="image/*"
                        onchange="previewImage(this)">
                    @error('cover')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="form-text">Format yang diperbolehkan: PNG, JPG, JPEG. Maksimal 2MB</div>
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

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
