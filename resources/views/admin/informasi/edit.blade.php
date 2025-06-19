@extends('layouts.admin.template')

@push('style')
<style>
    .ck.ck-editor {
        width: 100%;
    }

    .ck-editor__editable {
        min-height: 300px !important;
        max-height: 500px;
        padding: 1rem !important;
        border-radius: 8px;
        background-color: #fff;
    }

    .ck-content {
        font-size: 1rem;
        line-height: 1.6;
    }

    .invalid-feedback {
        display: block;
    }

    .img-preview {
        max-height: 200px;
        margin-top: 1rem;
        display: block;
    }
</style>
@endpush

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h4 class="fw-bold mb-1">Edit Informasi</h4>
            <small class="text-muted">Perbarui data informasi yang telah dibuat</small>
        </div>
        <a href="{{ route('informasi.index') }}" class="btn btn-sm btn-secondary">
            <i class="bx bx-arrow-back me-1"></i> Kembali
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('informasi.update', $informasi->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nama_informasi" class="form-label">Judul</label>
                    <input type="text"
                        class="form-control @error('nama_informasi') is-invalid @enderror"
                        id="nama_informasi"
                        name="nama_informasi"
                        placeholder="Masukkan judul informasi"
                        value="{{ old('nama_informasi', $informasi->nama_informasi) }}">
                    @error('nama_informasi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="editor" class="form-label">Deskripsi</label>
                    <textarea class="form-control @error('deskripsi') is-invalid @enderror"
                        id="editor"
                        name="deskripsi">{{ old('deskripsi', $informasi->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar</label>
                    <div class="mb-2">
                        <img src="{{ asset('images/informasi/' . $informasi->gambar) }}"
                            alt="Current Gambar"
                            class="img-thumbnail"
                            style="max-height: 200px;">
                    </div>
                    <input type="file"
                        class="form-control @error('gambar') is-invalid @enderror"
                        id="gambar"
                        name="gambar"
                        accept="image/*">
                    @error('gambar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="form-text">Format: PNG, JPG, JPEG. Maksimal 2MB</div>

                    <!-- Preview gambar baru -->
                    <img id="gambar-preview" class="img-preview img-thumbnail d-none" />
                </div>

                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date"
                        class="form-control @error('tanggal') is-invalid @enderror"
                        id="tanggal"
                        name="tanggal"
                        value="{{ old('tanggal', $informasi->tanggal ?? date('Y-m-d')) }}">
                    @error('tanggal')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
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
<!-- CKEditor -->
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        ClassicEditor
            .create(document.querySelector('#editor'), {
                toolbar: [
                    'heading', '|',
                    'bold', 'italic', 'link', '|',
                    'bulletedList', 'numberedList', '|',
                    'blockQuote', 'insertTable', '|',
                    'undo', 'redo'
                ],
                heading: {
                    options: [
                        { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                        { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                        { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                        { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' }
                    ]
                },
                language: 'id'
            })
            .then(editor => console.log('CKEditor initialized'))
            .catch(error => console.error('CKEditor error:', error));
    });

    // Preview gambar baru sebelum submit
    document.getElementById('gambar').addEventListener('change', function (e) {
        const preview = document.getElementById('gambar-preview');
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (event) {
                preview.src = event.target.result;
                preview.classList.remove('d-none');
            };
            reader.readAsDataURL(file);
        }
    });
</script>
@endpush
