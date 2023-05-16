@extends('layout.main', ['title' => 'Edit Data Guru - Bendahara', 'active' => 'data-guru'])

@section('content')
  <div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
      <div class="row">
        <div class="col-xxl">
          <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
              <h4 class="mb-3">Edit Identitas Guru</h4>
            </div>
            <div class="card-body">
              <form action="{{ route('bendahara.update.guru', ['id' => $guru->id] ) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control
                    @error('nama_lengkap')
                      is-invalid
                    @enderror" id="nama_lengkap" value="{{ $guru->nama_lengkap }}" name="nama_lengkap" placeholder="Amanda Salva Balesta" autocomplete="off"/>
                    @error('nama_lengkap')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">nama pengguna</label>
                  <div class="col-sm-10">
                    
                    <input type="text" class="form-control
                    @error('username')
                      is-invalid
                    @enderror" id="username" name="username" value="{{ $guru->username }}" placeholder="Amanda Salva Balesta" autocomplete="off"/>
                    @error('username')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                    
                  
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">agama</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control
                    @error('agama')
                      is-invalid
                    @enderror" id="agama" name="agama" value="{{ $guru->agama }}" placeholder="Islam" autocomplete="off" />
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
                    <input type="text" class="form-control
                    @error('no_hp')
                      is-invalid
                    @enderror" id="no_hp" name="no_hp" value="{{ $guru->no_hp }}" placeholder="0812345678234" autocomplete="off" />
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
                    <input type="text" class="form-control
                    @error('tempat_lahir')
                      is-invalid
                    @enderror" id="tempat_lahir" name="tempat_lahir" value="{{ $guru->tempat_lahir }}" placeholder="Cilacap" autocomplete="off" />
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
                    <input type="date" class="form-control
                    @error('tgl_lahir')
                      is-invalid
                    @enderror" id="tgl_lahir" name="tgl_lahir" value="{{ $guru->tgl_lahir }}" placeholder="22/01/2003" />
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
                      <input name="jk" class="form-check-input
                      @error('jk')
                        is-invalid
                      @enderror" type="radio" value="Laki-laki" {{ ($guru->jk == "Laki-laki")? "checked" : "" }}>
                      <label class="form-check-label">Laki - laki</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input name="jk" class="form-check-input
                      @error('jk')
                        is-invalid
                      @enderror" type="radio" value="Perempuan" {{ ($guru->jk == "Perempuan")? "checked" : "" }}>
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
                    <input type="text" class="form-control
                    @error('alamat')
                      is-invalid
                    @enderror" id="alamat" name="alamat" value="{{ $guru->alamat }}" placeholder="Jalan Darusman" autocomplete="off"/>
                    @error('alamat')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-md-2 col-form-label">Status</label>
                  <div class="col-md-10">
                    <div class="form-check form-check-inline">
                      <input name="status" class="form-check-input
                      @error('status')
                        is-invalid
                      @enderror" type="radio" value="aktif" {{  ($guru->status == 'aktif')? "checked" : "" }}>
                      <label class="form-check-label">Aktif</label>
                    </div>  
                    <div class="form-check form-check-inline">
                      <input name="status" class="form-check-input
                      @error('status')
                        is-invalid
                      @enderror" type="radio" value="non-aktif" {{  ($guru->status == 'non-aktif')? "checked" : "" }}>
                      <label class="form-check-label">Non-Aktif</label>
                    </div>  
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-md-2 col-form-label">Foto</label>
                  <div class="col-md-10">
                    {{-- @if (Auth::user()->pegawai->image)
                    <img src="{{ asset('storage/foto_profil/'.Auth::user()->pegawai->image) }}" alt class="w-px-40 h-auto rounded-circle" />
                    @else
                    <img src="{{ asset('images/user-default.jpg') }}" alt class="w-px-40 h-auto rounded-circle" />                              
                    @endif --}}
                    <input type="file" name="image" class="form-control">
                  </div>
                </div>

                {{-- <div class="form-group row pt-2">
                  <label for="image" class="col-sm-2 col-form-label">Foto</label>
                  <div class="col-sm-10">
                      <div class="custom-file">
                          <input type="file" class="form-control" name="image" id="image"> --}}
                          {{-- <label class="form-label" for="image">Pilih --}}
                            {{-- file</label> --}}
                      {{-- </div>
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
      <div class="row">
        <div class="col-xxl">
          <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
              <h4 class="mb-3">Ubah Kata Sandi</h4>
            </div>
            <div class="card-body">
              <form action="{{ route('bendahara.updatePassword', $guru->id) }}" method="POST" >
                @csrf
                @method('PUT')
                <div class="mb-3 row">
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
                </div>
                <div class="mb-3 row">
                  <label for="new_password" class="col-md-2 col-form-label">Kata Sandi Baru</label>
                  <div class="col-md-10">
                    <input type="new_password" name="new_password" class="form-control
                    @error('password')
                      is-invalid
                    @enderror" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" value="{{ old('password') }}" autocomplete="off">
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
  </div>

  {{-- <script>
    function updateFilename(input) {
    var filename = input.files[0].name;
    var fileInput = document.getElementById('foto');
    fileInput.value = filename;
    }
    <script> --}}
@endsection

