@extends('layout.main', ['title' => 'Data Sekolah - Bendahara', 'active' => 'data-sekolah'])

@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-xxl">
                    <div class="card mb-4">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h4 class="mb-3">Data Sekolah</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('bendahara.update.profil.sekolah') }}" method="post">
                                @csrf
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="nama_sekolah">Nama Sekolah</label>
                                    <div class="col-sm-10">
                                        <input type="text"
                                            class="form-control @error('nama_sekolah') is-invalid @enderror"
                                            id="nama_sekolah" name="nama_sekolah" autocomplete="off"
                                            value="{{ $data->nama_sekolah }}" required />
                                        @error('nama_sekolah')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="informasi_sekolah">Informasi Sekolah</label>
                                    <div class="col-sm-10">
                                        <textarea name="informasi_sekolah" id="informasi_sekolah"
                                            class="form-control 
                                            @error('informasi_sekolah') 
                                                is-invalid 
                                            @enderror"
                                            id="informasi_sekolah" rows="4" required>{{ $data->informasi_sekolah }}
                                        </textarea>
                                        @error('informasi_sekolah')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="alamat_sekolah">Alamat Sekolah</label>
                                    <div class="col-sm-10">
                                        <textarea name="alamat_sekolah" id="alamat_sekolah" class="form-control @error('alamat_sekolah') is-invalid @enderror"
                                            id="alamat_sekolah" rows="2" required>{{ $data->alamat_sekolah }}</textarea>
                                        @error('alamat_sekolah')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="email_sekolah">Email Sekolah</label>
                                    <div class="col-sm-10">
                                        <input type="email"
                                            class="form-control @error('email_sekolah') is-invalid @enderror"
                                            id="email_sekolah" name="email_sekolah" autocomplete="off"
                                            value="{{ $data->email_sekolah }}" required />
                                        @error('email_sekolah')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="telepon_sekolah">Telp Sekolah</label>
                                    <div class="col-sm-10">
                                        <input type="text"
                                            class="form-control @error('telepon_sekolah') is-invalid @enderror"
                                            id="telepon_sekolah" name="telepon_sekolah" autocomplete="off"
                                            value="{{ $data->telepon_sekolah }}" required />
                                        @error('telepon_sekolah')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="facebook_sekolah">Facebook Sekolah</label>
                                    <div class="col-sm-10">
                                        <input type="text"
                                            class="form-control @error('facebook_sekolah') is-invalid @enderror"
                                            id="facebook_sekolah" name="facebook_sekolah" autocomplete="off"
                                            value="{{ $data->facebook_sekolah }}" required />
                                        @error('facebook_sekolah')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="instagram_sekolah">Instagram Sekolah</label>
                                    <div class="col-sm-10">
                                        <input type="text"
                                            class="form-control @error('instagram_sekolah') is-invalid @enderror"
                                            id="instagram_sekolah" name="instagram_sekolah" autocomplete="off"
                                            value="{{ $data->instagram_sekolah }}" required />
                                        @error('instagram_sekolah')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="jam_kerja_sekolah">Jam Kerja</label>
                                    <div class="col-sm-10">
                                        <input type="text"
                                            class="form-control @error('jam_kerja_sekolah') is-invalid @enderror"
                                            id="jam_kerja_sekolah" name="jam_kerja_sekolah" autocomplete="off"
                                            value="{{ $data->jam_kerja_sekolah }}" required />
                                        @error('jam_kerja_sekolah')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Foto Sekolah</label>
                                    <div class="col-md-10">
                                        <input
                                            class="form-control  
                                                @error('image')
                                                is-invalid
                                                @enderror"
                                            type="file" id="image" name="image" placeholder="image">
                                        @error('image')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Yakin Untuk
                                        Ubah?</label>
                                    <div class="col-sm-10">
                                        <input type="checkbox" id="" class="form-check-input" required>
                                    </div>
                                </div>
                                <div class="d-flex flex-wrap justify-content-end">
                                    <button class="btn btn-purple m-1" type="submit" name="submit">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
