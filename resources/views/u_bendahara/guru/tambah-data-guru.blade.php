@extends('layout.main', ['title' => 'Tambah data guru - Bendahara', 'foto_profil' => $data->image, 'active' => 'data-guru'])

@section('content')
  <div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
      <div class="row">
        <div class="col-xxl">
          <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
              <h4 class="mb-3">Tambah Data Guru</h4>
            </div>
            <div class="card-body">
              <form action="{{ route('bendahara.store.guru') }}" method="POST" >
                @csrf
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control
                    @error('nama_lengkap')
                      is-invalid
                    @enderror" id="nama_lengkap" name="nama_lengkap" placeholder="Amanda Salva Balesta" autocomplete="off"/>
                    @error('nama_lengkap')
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
                    @enderror" id="agama" name="agama" placeholder="Islam" autocomplete="off" />
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
                    @enderror" id="no_hp" name="no_hp" placeholder="0812345678234" autocomplete="off" />
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
                    @enderror" id="tempat_lahir" name="tempat_lahir" placeholder="Cilacap" autocomplete="off" />
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
                    @enderror" id="tgl_lahir" name="tgl_lahir" placeholder="22/01/2003" />
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
                        @enderror" type="radio" value="Laki-laki" {{ old('jk')=="Laki-laki" ? 'checked='.'"'.'checked'.'"' : '' }}>
                      <label class="form-check-label">Laki - laki</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input name="jk" class="form-check-input
                      @error('jk')
                        is-invalid
                      @enderror" type="radio" value="Perempuan" {{ old('jk')=="Perempuan" ? 'checked='.'"'.'checked'.'"' : '' }}>
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
                    @enderror" id="alamat" name="alamat" placeholder="Jalan Darusman" autocomplete="off"/>
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
                      @enderror" type="radio" value="aktif" {{ old('status')=="aktif" ? 'checked='.'"'.'checked'.'"' : '' }}>
                      <label class="form-check-label">Aktif</label>
                    </div>  
                    {{-- <div class="form-check form-check-inline">
                      <input name="status" class="form-check-input
                      @error('status')
                        is-invalid
                      @enderror" type="radio" value="non-aktif" {{ old('status')=="non-aktif" ? 'checked='.'"'.'checked'.'"' : '' }}>
                      <label class="form-check-label">Non-Aktif</label>
                    </div> --}}
                  </div>
                </div>
                {{-- <div class="row mb-3 form-password-toggle">
                  <label class="col-sm-2 col-form-label">password</label>
                  <div class="input-group-merge col-sm-10">
                    <input type="password" class="form-control
                    @error('password')
                      is-invalid
                    @enderror" id="password" name="password" placeholder="Jalan Darusman" />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    @error('password')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                </div> --}}
                {{-- <div class="mb-3 row">
                  <label class="col-md-2 col-form-label">Foto</label>
                  <div class="col-md-10">
                      <input class="form-control" type="file" name="image" placeholder="image">
                      <span style="color: #fa6801">
                          @error('image')
                              {{ $message }}
                          @enderror
                      </span>
                  </div>
                </div> --}}
                <div class="d-flex flex-wrap justify-content-end">
                  <a href="{{ route('bendahara.data.guru') }}" class="btn btn-danger m-1">Batal</a>
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