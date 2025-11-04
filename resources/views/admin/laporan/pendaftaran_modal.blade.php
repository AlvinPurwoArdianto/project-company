<div class="modal fade" id="detailModal{{ $data->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content rounded-4 shadow">
            {{-- Header modal --}}
            <div class="modal-header py-3 px-4 border-0"
                 style="background:linear-gradient(135deg,#667eea 0%,#764ba2 100%);color:#fff;">
                <h5 class="modal-title d-flex align-items-center gap-2 text-white">
                    <i class="bx bx-user-detail"></i>
                    Detail Pendaftaran – {{ $data->nama }}
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            {{-- Body modal --}}
            <div class="modal-body p-4">
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="bg-light p-3 border rounded h-100">
                            <h6 class="text-primary fw-bold mb-3">
                                <i class="bx bx-user"></i> Informasi Pribadi
                            </h6>
                            <hr>
                            <table class="table table-sm table-borderless align-middle mb-0">
                                <tr>
                                    <td class="fw-semibold w-40">Nama</td><td class="text-center w-1">:</td><td>{{ $data->nama }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-semibold">Email</td><td class="text-center">:</td><td>{{ $data->email }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-semibold">Jenis Kelamin</td><td class="text-center">:</td><td>{{ $data->jenis_kelamin }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-semibold">Tempat Lahir</td><td class="text-center">:</td><td>{{ $data->tempat_lahir ?: '-' }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-semibold">Tanggal Lahir</td><td class="text-center">:</td>
                                    <td>{{ \Carbon\Carbon::parse($data->tanggal_lahir)->translatedFormat('d F Y') }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-semibold">No. Telepon</td><td class="text-center">:</td><td>{{ $data->no_telepon }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-semibold">Alamat</td><td class="text-center">:</td><td>{{ $data->alamat }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="bg-light p-3 border rounded mb-4">
                            <h6 class="text-primary fw-bold mb-3">
                                <i class="bx bx-user-voice"></i> Informasi Orang Tua / Wali
                            </h6>
                            <hr>
                            <table class="table table-sm table-borderless align-middle mb-0">
                                <tr>
                                    <td class="fw-semibold w-40">Nama Orang Tua</td><td class="text-center w-1">:</td><td>{{ $data->nama_orang_tua }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-semibold">No. Telp Orang Tua</td><td class="text-center">:</td><td>{{ $data->no_telepon_orang_tua }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-semibold">Alamat Orang Tua</td><td class="text-center">:</td><td>{{ $data->alamat_orang_tua }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-semibold">Tanggal Daftar</td><td class="text-center">:</td>
                                    <td>{{ \Carbon\Carbon::parse($data->tanggal_pendaftaran)->translatedFormat('d F Y') }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    @if($data->keterangan)
                    <div class="col-12">
                        <div class="bg-white p-3 border rounded">
                            <h6 class="text-primary fw-bold mb-2"><i class="bx bx-note"></i> Keterangan</h6>
                            <p class="mb-0">{{ $data->keterangan }}</p>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            {{-- Footer modal --}}
            <div class="modal-footer border-0 px-4 py-3 bg-light">
                <button class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="bx bx-x me-1"></i> Tutup
                </button>
                <a href="https://wa.me/62{{ ltrim($data->no_telepon, '0') }}?text=Halo%20Kami%20dari%20Tim%20Victory%2C%20Apakah%20Anda%20masih%20tertarik%20bergabung%3F"
                   class="btn btn-success" target="_blank">
                    <i class="bx bxl-whatsapp me-1"></i> WhatsApp
                </a>
            </div>
        </div>
    </div>
</div>