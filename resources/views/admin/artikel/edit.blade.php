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
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tabel /</span> Tabel Artikel</h4>
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Edit Artikel</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('artikel.update', $artikel->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="judul_artikel">Judul Artikel</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text"
                                    class="form-control @error('judul_artikel') is-invalid @enderror"
                                    id="judul_artikel"
                                    placeholder="Judul Artikel"
                                    name="judul_artikel"
                                    value="{{ old('judul_artikel', $artikel->judul_artikel) }}" />
                            </div>
                            @error('judul_artikel')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="editor">Deskripsi</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <textarea
                                    class="form-control @error('deskripsi') is-invalid @enderror"
                                    id="editor"
                                    name="deskripsi"
                                >{{ old('deskripsi', $artikel->deskripsi) }}</textarea>
                            </div>
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="cover">Cover</label>
                        <div class="col-sm-10">
                            @if($artikel->cover)
                                <img src="{{ asset('images/artikel/' . $artikel->cover) }}"
                                    alt="Current Cover"
                                    class="img-preview img-thumbnail mb-3">
                            @endif
                            <div class="input-group">
                                <input type="file"
                                    class="form-control @error('cover') is-invalid @enderror"
                                    id="cover"
                                    name="cover"
                                    accept="image/*" />
                            </div>
                            @error('cover')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">Format: PNG, JPG, JPEG. Maksimal 2MB</div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="tanggal">Tanggal</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="date"
                                    class="form-control @error('tanggal') is-invalid @enderror"
                                    id="tanggal"
                                    name="tanggal"
                                    value="{{ old('tanggal', $artikel->tanggal) }}" />
                            </div>
                            @error('tanggal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <a href="{{ route('artikel.index') }}" class="btn btn-danger">Kembali</a>
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