@extends('layouts.admin.template')

@push('style')
<style>
    .ck.ck-editor {
        width: 100%;
    }

    .ck-editor__editable {
        min-height: 500px !important;
        max-height: 800px;
    }

    .ck-editor__editable_inline {
        padding: 2rem !important;
    }

    .ck-content {
        font-size: 1.1rem;
        line-height: 1.6;
    }

    .invalid-feedback {
        display: block;
    }

    .img-preview {
        max-width: 200px;
        margin-bottom: 1rem;
    }
</style>
@endpush

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tabel /</span> Tabel Informasi</h4>
    <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Edit Informasi</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('informasi.update', $informasi->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="nama_informasi">Judul</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <input type="text" class="form-control @error('nama_informasi') is-invalid @enderror"
                                id="nama_informasi" placeholder="Judul" name="nama_informasi"
                                value="{{ old('nama_informasi', $informasi->nama_informasi) }}" />
                        </div>
                        @error('nama_informasi')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="editor">Deskripsi</label>
                    <div class="col-sm-10">
                        <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="editor"
                            name="deskripsi">{{ old('deskripsi', $informasi->deskripsi) }}</textarea>
                        @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="gambar">Gambar</label>
                    <div class="col-sm-10">
                        @if($informasi->gambar)
                        <img src="{{ asset('images/informasi/' . $informasi->gambar) }}" alt="Current Picture"
                            class="img-preview img-thumbnail mb-3">
                        @endif
                        <div class="input-group">
                            <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar"
                                name="gambar" accept="image/*" />
                        </div>
                        @error('gambar')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Format: PNG, JPG, JPEG. Maksimal 2MB</div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="tanggal">Tanggal</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal"
                                name="tanggal" value="{{ old('tanggal', $informasi->tanggal) }}" />
                        </div>
                        @error('tanggal')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row justify-content-end">
                    <div class="col-sm-10">
                        <a href="{{ route('informasi.index') }}" class="btn btn-danger">Kembali</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        ClassicEditor
            .create(document.querySelector('#editor'), {
                toolbar: ['heading', '|',
                    'bold', 'italic', 'link', '|',
                    'bulletedList', 'numberedList', '|',
                    'blockQuote', 'insertTable', 'mediaEmbed', '|',
                    'undo', 'redo', '|',
                    'alignment', 'fontColor', 'fontBackgroundColor'
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
            .catch(error => {
                console.error('CKEditor error:', error);
            });
    });
</script>
@endpush