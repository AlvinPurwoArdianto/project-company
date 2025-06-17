@extends('layouts.admin.template')

@push('style')
<style>
    .ck.ck-editor {
        width: 100%;
    }
    .ck-editor__editable {
        min-height: 300px !important;
        max-height: 500px;
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
</style>
@endpush

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tabel /</span> Tabel Program</h4>
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Edit Program</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('program.update', $program->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Nama Program</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control" id="basic-icon-default-fullname"
                                    placeholder="Nama Program" name="nama_program" value="{{ $program->nama_program }}" />
                            </div>
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
                                    rows="5"
                                >{{ old('deskripsi', $program->deskripsi ?? '') }}</textarea>
                            </div>
                            @error('deskripsi')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <a href="{{ route('program.index') }} " class="btn btn-danger">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
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
                toolbar: {
                    items: [
                        'undo', 'redo',
                        '|', 'heading',
                        '|', 'bold', 'italic', 'strikethrough', 'underline',
                        '|', 'bulletedList', 'numberedList',
                        '|', 'alignment',
                        '|', 'fontColor', 'fontBackgroundColor',
                        '|', 'link', 'blockQuote', 'insertTable'
                    ],
                    shouldNotGroupWhenFull: true
                },
                table: {
                    contentToolbar: [
                        'tableColumn',
                        'tableRow',
                        'mergeTableCells',
                        'tableCellProperties',
                        'tableProperties'
                    ]
                },
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
