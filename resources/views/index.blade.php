@extends('layouts.user.template')

@section('title', 'Victory English School - Kursus Bahasa Inggris Terpercaya di Bandung')

@section('content')
    <main class="main">
        @include('front.sections._hero')
        @include('front.sections._profil')
        @include('front.sections._program')
        @include('front.sections._fasilitas')
        @include('front.sections._informasi')
        @include('front.sections._testimoni')
        @include('front.sections._kontak')
    </main>
@endsection

@push('scripts')
@if (session('success'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                title: 'Berhasil!',
                text: @json(session('success')),
                icon: 'success',
                confirmButtonColor: '#7030D6FF',
                confirmButtonText: 'Oke'
            });
        });
    </script>
@endif
@endpush
