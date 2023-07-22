@extends('layout.main', ['title' => 'Tambah Data Siswa - Bendahara', 'active' => 'data-siswa'])

@section('content')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <!-- Basic Layout & Basic with Icons -->
            <div class="row">
                <!-- Basic Layout -->
                <div class="col-xxl">
                    <div class="card mb-4">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h4 class="mb-4">Tambah Data Siswa</h4> <br>
                            <p>Semua data wajib diisi kecuali foto</p>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('bendahara.store.siswa') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">NIS <span style="color: #fa6801">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" maxlength="4"
                                            class="form-control
                    @error('nis')
                      is-invalid
                    @enderror"
                                            id="nis" name="nis" value="{{ old('nis') }}"
                                            placeholder="Masukkan NIS..." autocomplete="off" />
                                        @error('nis')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Nama Lengkap <span
                                            style="color: #fa6801">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text"
                                            class="form-control
                    @error('nama_lengkap')
                      is-invalid
                    @enderror"
                                            id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap') }}"
                                            placeholder="Masukan nama lengkap siswa..." autocomplete="off" />
                                        @error('nama_lengkap')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Nama Wali <span
                                            style="color: #fa6801">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text"
                                            class="form-control
                    @error('nama_wali')
                      is-invalid
                    @enderror"
                                            id="nama_wali" name="nama_wali" value="{{ old('nama_wali') }}"
                                            placeholder="Masukan nama wali/orang tua siswa..." autocomplete="off" />
                                        @error('nama_wali')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                {{-- <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">agama</label>
                                    <div class="col-sm-10">
                                        <input type="text"
                                            class="form-control
                                            @error('agama')
                                            is-invalid
                                            @enderror"
                                            id="agama" name="agama" placeholder="Islam" autocomplete="off" />
                                        @error('agama')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div> --}}
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">no hp <span
                                            style="color: #fa6801">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text"
                                            class="form-control
                    @error('no_hp')
                      is-invalid
                    @enderror"
                                            id="no_hp" name="no_hp" value="{{ old('no_hp') }}"
                                            placeholder="Masukan nomor telepon..." autocomplete="off" />
                                        @error('no_hp')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">tempat lahir <span
                                            style="color: #fa6801">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text"
                                            class="form-control
                    @error('tempat_lahir')
                      is-invalid
                    @enderror"
                                            id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}"
                                            placeholder="Masukan tempat lahir..." autocomplete="off" />
                                        @error('tempat_lahir')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">tanggal lahir <span
                                            style="color: #fa6801">*</span></label>
                                    <div class="col-sm-3">
                                        <input type="date"
                                            class="form-control
                    @error('tgl_lahir')
                      is-invalid
                    @enderror"
                                            id="tgl_lahir" name="tgl_lahir" value="{{ old('tgl_lahir') }}"
                                            placeholder="Masukkan tanggal lahir..." />
                                        @error('tgl_lahir')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">jenis kelamin <span
                                            style="color: #fa6801">*</span></label>
                                    <div class="col-md-10">
                                        <div class="form-check form-check-inline">
                                            <input name="jk"
                                                class="form-check-input
                                                    @error('jk')
                                                    is-invalid
                                                    @enderror"
                                                type="radio" value="Laki-laki"
                                                {{ old('jk') == 'Laki-laki' ? 'checked=' . '"' . 'checked' . '"' : '' }}>
                                            <label class="form-check-label">Laki - laki</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input name="jk"
                                                class="form-check-input
                      @error('jk')
                        is-invalid
                      @enderror"
                                                type="radio" value="Perempuan"
                                                {{ old('jk') == 'Perempuan' ? 'checked=' . '"' . 'checked' . '"' : '' }}>
                                            <label class="form-check-label">Perempuan</label>
                                        </div>
                                    </div>
                                    @error('jk')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">alamat</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" rows="3"
                                            placeholder="Masukkan alamat siswa di sini..." autocomplete="off"></textarea>
                                        @error('alamat')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">tahun masuk</label>
                                    <div class="col-md-10">
                                        <select class="form-control select2" name="thn_masuk" id="thn_masuk">
                                            <option value="" selected disabled>-- Pilih Tahun --</option>
                                            @foreach ($tapel as $t)
                                                <option value="{{ $t->tahun . '-' . $t->semester }}">{{ $t->tahun }}
                                                    - {{ $t->semester }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Pilih Kelas</label>
                                    <div class="col-md-10">
                                        <select class="form-control" name="kelas" id="kelas">
                                            <option value="" selected disabled>-- Pilih Kelas --</option>
                                            @foreach ($kelas as $k)
                                                <option value="{{ $k->tingkat }}">{{ $k->tingkat }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                {{-- <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Status</label>
                                    <div class="col-md-10">
                                        <div class="form-check form-check-inline">
                                            <input name="status"
                                                class="form-check-input
                                                    @error('status')
                                                        is-invalid
                                                    @enderror"
                                                type="radio" value="aktif"
                                                {{ old('status') == 'aktif' ? 'checked=' . '"' . 'checked' . '"' : '' }}>
                                            <label class="form-check-label">Aktif</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input name="status"
                                                class="form-check-input
                                                    @error('status')
                                                        is-invalid
                                                    @enderror"
                                                type="radio" value="non-aktif"
                                                {{ old('status') == 'non-aktif' ? 'checked=' . '"' . 'checked' . '"' : '' }}>
                                            <label class="form-check-label">Non-Aktif</label>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Foto</label>
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

                                <div class="mt-5 row">
                                    <p><span style="color: #fa6801">*</span> Kata Sandi : absdmulia05</p>
                                </div>

                                <div class="d-flex flex-wrap justify-content-end">
                                    <a href="{{ route('bendahara.pendaftaran.siswa') }}"
                                        class="btn btn-danger m-1">Batal</a>
                                    <button class="btn btn-purple m-1" type="submit" name="submit">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
