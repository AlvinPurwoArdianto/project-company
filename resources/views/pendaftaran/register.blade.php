@extends('layouts.admin.template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Pendaftaran Siswa') }}</div>

                <div class="card-body">
                    <form action="{{ route('front.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Nama
                                Lengkap</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <input type="text" class="form-control" id="basic-icon-default-fullname"
                                        placeholder="Nama Lengkap" name="nama" />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Jenis
                                Kelamin</label>
                            <div class="col-sm-10">
                                <select name="jenis_kelamin" id="" class="form-control">
                                    <option value="" selected disabled>Pilih Jenis Kelamin</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Tempat & Tanggal
                                Lahir</label>
                            <div class="col-sm-5">
                                <div class="input-group input-group-merge">
                                    <input type="text" class="form-control" id="basic-icon-default-fullname"
                                        placeholder="Tempat Lahir" name="tempat_lahir" />
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="input-group input-group-merge">
                                    <input type="date" class="form-control" id="basic-icon-default-fullname"
                                        placeholder="Tanggal Lahir" name="tanggal_lahir" />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Alamat</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <textarea type="text" class="form-control" id="basic-icon-default-fullname"
                                        placeholder="Masukan Alamat Anda" name="alamat"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Email</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <input type="email" class="form-control" id="basic-icon-default-fullname"
                                        placeholder="Masukan Email Anda" name="email" />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">No Telepon</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <input type="tel" pattern="[0-9]{12}" class="form-control" id="phone"
                                        placeholder="Contoh 08xxxxxx" name="no_telepon" />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Tanggal
                                Daftar</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <input type="date" class="form-control" id="basic-icon-default-fullname"
                                        placeholder="Tanggal Pendaftaran" name="tanggal_pendaftaran" />
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <a href="{{ route('pendaftaran.index') }} " class="btn btn-primary">Kembali</a>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection