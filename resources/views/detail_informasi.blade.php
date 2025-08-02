@extends('layouts.user.template')

@section('title', $informasi->nama_informasi)

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="mb-4">
                @php
                    // Ambil URL yang disimpan, default ke Beranda jika tidak ada
                    $returnUrl = session('last_visited_from_detail', url('index'));

                    // Jika returnUrl ternyata sama dengan URL halaman detail saat ini,
                    // maka kemungkinan user langsung mengakses halaman detail atau me-refresh.
                    // Dalam kasus ini, kita paksa kembali ke Beranda sebagai default "kembali".
                    if (request()->url() == $returnUrl) {
                        $returnUrl = url('index');
                    }
                @endphp

                <a href="{{ $returnUrl }}" class="btn-daftar" style="border: 2px solid #a03bff;" title="Kembali"
                    onclick="window.location.replace('{{ $returnUrl }}'); return false;">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>

            <div class="card border-0 shadow-sm overflow-hidden rounded-3">
                <div class="row g-0 align-items-stretch">
                    {{-- Gambar Kiri --}}
                    <div class="col-md-4 position-relative d-flex">
                        <div class="flex-fill w-100"
                            style="min-height: 220px; max-height: 300px; overflow: hidden; border-radius: 10px 0 0 10px;">
                            <img src="{{ asset('/images/informasi/' . $informasi->gambar) }}" alt="Cover informasi"
                                class="w-100 h-100" style="object-fit: cover; display: block;">
                        </div>

                        {{-- Tanggal di Atas Gambar (Kiri Atas) --}}
                        <div
                            class="position-absolute top-0 start-0 px-3 py-1 mt-2 ms-2 rounded-pill bg-opacity-75 text-white small shadow-sm" style="background-color: #b036f7">
                            <i class="bi bi-calendar-event me-1"></i>
                            {{ \Carbon\Carbon::parse($informasi->created_at)->locale('id')->translatedFormat('d F Y') }}
                        </div>
                    </div>

                    {{-- Konten Kanan --}}
                    <div class="col-md-8">
                        <div class="p-4">
                            <h3 class="fw-bold mb-3" style="color: #675875;">{{ $informasi->nama_informasi }}</h3>
                            <div class="content-article" style="line-height: 1.7; text-align: justify;">
                                {!! $informasi->deskripsi !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Comment Section --}}
            <div class="row mt-5 gy-4">
                {{-- Kolom Form Komentar --}}
                <div class="col-lg-7">
                    <div class="card shadow-sm border-1">
                        <div class="card-body p-4">
                            <h4 class="card-title mb-4">Berikan Komentar</h4>
                            <form action="{{ route('front.store_komentar', $informasi->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="nama" value="Anonymous">
                                <input type="hidden" name="email" value="anonymous@example.com">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" name="nama" id="nama"
                                        class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}"
                                        placeholder="Masukkan nama Anda">
                                    @error('nama')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" id="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email') }}" placeholder="Masukkan email Anda">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="komentar" class="form-label">Komentar</label>
                                    <textarea name="komentar" id="komentar" rows="6" class="form-control @error('komentar') is-invalid @enderror"
                                        placeholder="Tulis komentar Anda...">{{ old('komentar') }}</textarea>
                                    @error('komentar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Hidden Informasi ID --}}
                                <input type="hidden" name="informasi_id" value="{{ $informasi->id }}">

                                <button type="submit" class="btn btn-purple px-4">
                                    <i class="bi bi-send me-2"></i> Kirim Komentar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- Kolom Komentar Terbaru --}}
                <div class="col-lg-5">
                    <div class="border rounded shadow-sm" style="max-height: 537px; overflow-y: auto;">
                        @forelse($komentar->sortByDesc('created_at') as $comment)
                            @php
                                $colors = [
                                    '#0d6efd',
                                    '#198754',
                                    '#dc3545',
                                    '#fd7e14',
                                    '#6f42c1',
                                    '#20c997',
                                    '#ffc107',
                                    '#6610f2',
                                    '#e83e8c',
                                    '#6c757d',
                                ];
                                // Kombinasi nama dan id agar lebih unik
                                $hashSource = ($comment->nama ?? '') . $comment->id;
                                $index = crc32($hashSource) % count($colors);
                                $color = $colors[$index];
                            @endphp
                            <div class="card mb-0 shadow-sm hr">
                                <div class="card-body p-4">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="me-3">
                                            <div class="rounded-circle text-white d-flex align-items-center justify-content-center"
                                                style="width: 40px; height: 40px; background-color: {{ $color }};">
                                                {{ strtoupper(substr($comment->nama ?? '', 0, 1)) }}
                                            </div>
                                        </div>
                                        <div>
                                            <h6 class="fw-bold mb-1">{{ $comment->nama }}</h6>
                                            <small
                                                class="text-muted">{{ \Carbon\Carbon::parse($comment->created_at)->locale('id')->diffForHumans() }}</small>
                                        </div>
                                    </div>
                                    @php
                                        $words = str_word_count(strip_tags($comment->komentar), 1);
                                        $wordCount = count($words);
                                        $shortText = implode(' ', array_slice($words, 0, 25));
                                    @endphp

                                    <p class="mb-0 text-justify" style="text-align: justify;">
                                        @if ($wordCount > 25)
                                            <span class="komentar-short">{{ $shortText }}...</span>
                                            <span class="komentar-full d-none">{{ $comment->komentar }}</span>
                                            <a href="javascript:void(0);" class="text-primary selengkapnya-toggle"
                                                style="font-size: 0.875rem;">Selengkapnya</a>
                                        @else
                                            {{ $comment->komentar }}
                                        @endif
                                    </p>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-4">
                                <i class="bi bi-chat-dots display-4 text-muted mb-3"></i>
                                <p class="text-muted">Belum ada komentar. Jadilah yang pertama berkomentar!</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
{{-- @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('komentarForm');

            form.addEventListener('submit', function(e) {
                e.preventDefault(); // Hindari reload

                const formData = new FormData(form);
                const url = form.getAttribute('action');

                fetch(url, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json'
                        },
                        body: formData
                    })
                    .then(response => {
                        if (!response.ok) {
                            return response.json().then(err => {
                                throw err;
                            });
                        }
                        return response.json();
                    })
                    .then(data => {
                        // ✅ Komentar berhasil disimpan
                        alert('Komentar berhasil dikirim!');
                        form.reset(); // kosongkan form

                        // Optional: reload komentar atau tambahkan komentar baru ke DOM
                        // location.reload(); // atau: muat ulang komentar via AJAX
                    })
                    .catch(error => {
                        console.error('Gagal mengirim komentar:', error);
                        alert('Terjadi kesalahan. Coba lagi nanti.');

                        // Optional: tampilkan error validasi
                        if (error.errors) {
                            if (error.errors.komentar) {
                                alert(error.errors.komentar[0]);
                            }
                        }
                    });
            });
        });
    </script>
@endpush --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.selengkapnya-toggle').forEach(function(btn) {
            btn.addEventListener('click', function() {
                const parent = btn.closest('p');
                const shortText = parent.querySelector('.komentar-short');
                const fullText = parent.querySelector('.komentar-full');

                if (shortText.classList.contains('d-none')) {
                    shortText.classList.remove('d-none');
                    fullText.classList.add('d-none');
                    btn.textContent = 'Selengkapnya';
                } else {
                    shortText.classList.add('d-none');
                    fullText.classList.remove('d-none');
                    btn.textContent = 'Tampilkan lebih sedikit';
                }
            });
        });
    });
</script>
