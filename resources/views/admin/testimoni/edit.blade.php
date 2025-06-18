@extends('layouts.admin.template')

@push('style')
<style>
    .star-rating label:hover,
    .star-rating label:hover ~ label,
    .star-rating input:checked ~ label {
        color: #ffc107 !important;
    }

    .star-rating label {
        transition: color 0.2s;
        font-size: 2rem;
        user-select: none;
    }

    .invalid-feedback {
        display: block;
    }
</style>
@endpush

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold">Edit Testimoni</h4>
            <p class="text-muted mb-0">Perbarui testimoni dan rating pengguna</p>
        </div>
        <a href="{{ route('testimoni.index') }}" class="btn btn-sm btn-secondary">
            <i class="bx bx-arrow-back me-1"></i> Kembali
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body p-4">
            <form action="{{ route('testimoni.update', $testimoni->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Nama --}}
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="nama" id="nama"
                        class="form-control @error('nama') is-invalid @enderror"
                        value="{{ old('nama', $testimoni->nama) }}" placeholder="Masukkan Nama Anda">
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Testimoni --}}
                <div class="mb-3">
                    <label for="testimoni" class="form-label">Testimoni</label>
                    <textarea name="testimoni" id="testimoni" rows="3"
                        class="form-control @error('testimoni') is-invalid @enderror"
                        placeholder="Tulis testimoni Anda">{{ old('testimoni', $testimoni->testimoni) }}</textarea>
                    @error('testimoni')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Rating --}}
                <div class="mb-4">
                    <label class="form-label">Rating</label>
                    <div class="star-rating d-flex align-items-center gap-1" style="font-size: 1.8rem;">
                        @for ($i = 1; $i <= 5; $i++)
                            <input type="radio" name="rating" id="rating{{ $i }}" value="{{ $i }}" class="d-none"
                                {{ old('rating', $testimoni->rating) == $i ? 'checked' : '' }}>
                            <label for="rating{{ $i }}" style="cursor:pointer; color:{{ old('rating', $testimoni->rating) >= $i ? '#ffc107' : '#e4e5e9' }}; margin-bottom:0;">
                                &#9733;
                            </label>
                        @endfor
                    </div>
                    @error('rating')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Tombol --}}
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">
                        <i class="bx bx-save me-1"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    const labels = document.querySelectorAll('.star-rating label');
    labels.forEach((label, idx, arr) => {
        label.addEventListener('mouseenter', () => {
            for (let i = 0; i <= idx; i++) arr[i].style.color = '#ffc107';
            for (let i = idx + 1; i < arr.length; i++) arr[i].style.color = '#e4e5e9';
        });
        label.addEventListener('mouseleave', () => {
            const checked = document.querySelector('.star-rating input:checked');
            const val = checked ? checked.value : 0;
            arr.forEach((l, i) => l.style.color = (i < val) ? '#ffc107' : '#e4e5e9');
        });
        label.addEventListener('click', () => {
            arr.forEach((l, i) => l.style.color = (i <= idx) ? '#ffc107' : '#e4e5e9');
        });
    });

    window.addEventListener('DOMContentLoaded', () => {
        const checked = document.querySelector('.star-rating input:checked');
        const arr = document.querySelectorAll('.star-rating label');
        const val = checked ? checked.value : 0;
        arr.forEach((l, i) => l.style.color = (i < val) ? '#ffc107' : '#e4e5e9');
    });
</script>
@endpush
