@extends('layout.main', ['title' => 'Edit Data Siswa - Bendahara', 'active' => 'data-siswa'])
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
                            <h4 class="mb-3">Edit Data Siswa</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('bendahara.update.data.siswa', $siswa->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">NIS</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control @error('nis') is-invalid @enderror"
                                            id="nis" name="nis" autocomplete="off" value="{{ $siswa->NIS }}" />
                                        @error('nis')
                                            <div class="invalid-feedbackk">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                                    <div class="col-sm-10">
                                        <input type="text"
                                            class="form-control @error('nama_lengkap') is-invalid @enderror"
                                            id="nama_lengkap" name="nama_lengkap" placeholder="Amanda Salva Balesta"
                                            value="{{ $siswa->nama_lengkap }}" autocomplete="off" />
                                        @error('nama_lengkap')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Nama Wali</label>
                                    <div class="col-sm-10">
                                        <input type="text"
                                            class="form-control
                    @error('nama_wali')
                      is-invalid
                    @enderror"
                                            id="nama_wali" name="nama_wali" placeholder="Amanda Salva Balesta"
                                            autocomplete="off" value="{{ $siswa->nama_wali }}" />
                                        @error('nama_wali')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">agama</label>
                                    <div class="col-sm-10">
                                        <input type="text"
                                            class="form-control
                    @error('agama')
                      is-invalid
                    @enderror"
                                            id="agama" name="agama" placeholder="Islam" autocomplete="off"
                                            value="{{ $siswa->agama }}" />
                                        @error('agama')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">no hp</label>
                                    <div class="col-sm-10">
                                        <input type="text" value="{{ $siswa->no_hp }}"
                                            class="form-control 
                    @error('no_hp')
                      is-invalid
                    @enderror"
                                            id="no_hp" name="no_hp" placeholder="0812345678234" autocomplete="off" />
                                        @error('no_hp')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">tempat lahir</label>
                                    <div class="col-sm-10">
                                        <input type="text" value="{{ $siswa->tempat_lahir }}"
                                            class="form-control
                    @error('tempat_lahir')
                      is-invalid
                    @enderror"
                                            id="tempat_lahir" name="tempat_lahir" placeholder="Cilacap"
                                            autocomplete="off" />
                                        @error('tempat_lahir')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">tanggal lahir</label>
                                    <div class="col-sm-10">
                                        <input type="date" value="{{ $siswa->tgl_lahir }}"
                                            class="form-control
                    @error('tgl_lahir')
                      is-invalid
                    @enderror"
                                            id="tgl_lahir" name="tgl_lahir" placeholder="22/01/2003" />
                                        @error('tgl_lahir')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">jenis kelamin</label>
                                    <div class="col-md-10">
                                        <div class="form-check form-check-inline">
                                            <input name="jk"
                                                class="form-check-input
                        @error('jk')
                          is-invalid
                        @enderror"
                                                type="radio" value="Laki-laki"
                                                @if ($siswa->jk == 'Laki-laki') checked @endif>
                                            <label class="form-check-label">Laki - laki</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input name="jk"
                                                class="form-check-input
                      @error('jk')
                        is-invalid
                      @enderror"
                                                type="radio" value="Perempuan"
                                                @if ($siswa->jk == 'Perempuan') checked @endif>
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
                                        <input type="text" value="{{ $siswa->alamat }}"
                                            class="form-control
                    @error('alamat')
                      is-invalid
                    @enderror"
                                            id="alamat" name="alamat" placeholder="Jalan Darusman"
                                            autocomplete="off" />
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
                                        <select class="form-control" name="thn_masuk" id="thn_masuk">
                                            @foreach ($tapel as $t)
                                                <option value="{{ $t->tahun . '-' . $t->semester }}"
                                                    @if ($siswa->thn_masuk == $t->tahun . '-' . $t->semester) selected @endif> {{ $t->tahun }}

                                                    - {{ $t->semester }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label"> Pilih Kelas</label>
                                    <div class="col-md-10">
                                        <select class="form-control" name="kelas" id="kelas">
                                            <option value="" selected disabled>-- Pilih Kelas --</option>
                                            @foreach ($kelas as $k)
                                                <option value="{{ $k->tingkat }}"
                                                    @if ($siswa->kelas == $k->tingkat) selected @endif>{{ $k->tingkat }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Status</label>
                                    <div class="col-md-10">
                                        <div class="form-check form-check-inline">
                                            <input name="status"
                                                class="form-check-input
                      @error('status')
                        is-invalid
                      @enderror"
                                                type="radio" value="aktif"
                                                @if ($siswa->status == 'Aktif') checked @endif>
                                            <label class="form-check-label">Aktif</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input name="status"
                                                class="form-check-input
                      @error('status')
                        is-invalid
                      @enderror"
                                                type="radio" value="non-aktif"
                                                @if ($siswa->status == 'Non-aktif') checked @endif>
                                            <label class="form-check-label">Non-Aktif</label>
                                        </div>
                                    </div>
                                </div>
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
                                    <a href="{{ route('bendahara.data.siswa') }}" class="btn btn-danger m-1">Batal</a>
                                    <button class="btn btn-purple m-1" type="submit" name="submit">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xxl">
                    <div class="card mb-4">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h4 class="mb-3">Reset Kata Sandi</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('bendahara.updatePassword.siswa', $siswa->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                {{-- <div class="mb-3 row">
                          <label for="password" class="col-md-2 col-form-label">Kata Sandi Lama</label>
                          <div class="col-md-10">
                            <input type="password" name="password" class="form-control
                            @error('password')
                              is-invalid
                            @enderror" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" value="{{ old('password') }}" autocomplete="off">
                            @error('password')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                            @enderror
                          </div>
                        </div> --}}
                                <div class="mb-3 row">
                                    <label for="new_password" class="col-md-2 col-form-label">Kata Sandi Baru</label>
                                    <div class="col-md-10">
                                        <input type="new_password" name="new_password"
                                            class="form-control
                            @error('password')
                              is-invalid
                            @enderror"
                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                            value="{{ old('password') }}" autocomplete="off">
                                        @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                {{-- <div class="mb-3 row">
                          <label class="col-md-2 col-form-label">Ulang Kata Sandi Baru</label>
                          <div class="col-md-10">
                            <input type="password" name="password" class="form-control
                            @error('password')
                              is-invalid
                            @enderror" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" value="{{ old('password') }}" autocomplete="off">
                            @error('password')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                            @enderror
                          </div>
                        </div> --}}
                                <div class="d-flex flex-wrap justify-content-end">
                                    <a href="{{ route('bendahara.data.guru') }}" class="btn btn-danger m-1">Batal</a>
                                    <button class="btn btn-purple m-1" type="submit" name="submit">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- {{ dd($siswa) }} --}}
    @endsection
