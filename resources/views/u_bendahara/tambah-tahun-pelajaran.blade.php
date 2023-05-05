@extends('layout.main', ['title' => 'Tambah Tahun Pelajaran - Bendahara', 'foto_profil' => $data->image, 'active' => 'thn-pelajaran'])

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
              <h4 class="mb-3">Tambah Data Tahun Pelajaran</h4>
            </div>
            <div class="card-body">
              <form action="{{ route('bendahara.tahun-pelajaran.store') }}" method="POST" >
                @csrf
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">tahun pelajaran</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="tahun" name="tahun" placeholder="2020/2021" />
                  </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-md-2 col-form-label">Semester</label>
                    <div class="col-md-10">
                        <div class="form-check form-check-inline">
                            <input name="semester" class="form-check-input
                            @error('semester')
                                is-invalid
                            @enderror" type="radio" value="ganjil" {{ old('semester')=="ganjil" ? 'checked='.'"'.'checked'.'"' : '' }}>
                            <label class="form-check-label">Ganjil</label>
                        </div>  
                        <div class="form-check form-check-inline">
                            <input name="semester" class="form-check-input
                            @error('semester')
                                is-invalid
                            @enderror" type="radio" value="genap" {{ old('semester')=="genap" ? 'checked='.'"'.'checked'.'"' : '' }}>
                            <label class="form-check-label">Genap</label>
                        </div>
                    </div>
                </div>
                {{-- <div class="mb-3 row">
                    <label class="col-md-2 col-form-label">semester</label>
                    <div class="col-md-10">
                        <select name="semester" class="form-control">
                            <option value="">~ Pilih Semester ~</option>
                            <option value="ganjil" @if (old('semester') == "ganjil") {{ 'selected' }} @endif>Ganjil</option>
                            <option value="genap" @if (old('semester') == "genap") {{ 'selected' }} @endif>Genap</option>
                        </select>
                        <span style="color: #fa6801">
                            @error('semester')
                                {{ $message }}
                            @enderror
                        </span>
                        <select id="semester" name="semester">
                            <option value="ganjil">Ganjil</option>
                            <option value="genap">Genap</option>
                          </select>
                    </div>
                </div> --}}
                  <div class="d-flex flex-wrap justify-content-end">
                    <a href="{{ route('bendahara.tahun-pelajaran') }}" class="btn btn-danger m-1">Batal</a>
                    <button class="btn btn-purple m-1" type="submit" name="submit">Simpan</button>
                </div>
                </div>
              </form>
              {{-- <form action="{{ route('bendahara.tahun-pelajaran.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="tahun" class="col-sm-3 col-form-label">Tahun
                            Pelajaran</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="tahun"
                                name="tahun" placeholder="Tahun Pelajaran"
                                value="{{ old('tahun') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="semester" class="col-sm-3 col-form-label">Semester</label>
                        <div class="col-sm-9 pt-1">
                            <label class="radio-inline mr-3"><input type="radio" name="semester"
                                    value="ganjil" @if (old('semester') == 'ganjil') checked @endif
                                    required>
                                Semester Ganjil</label>
                            <label class="radio-inline mr-3"><input type="radio" name="semester"
                                    value="genap" @if (old('semester') == 'genap') checked @endif
                                    required>
                                Semester Genap</label>
                        </div>
                    </div>
                </div>
                <div >
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form> --}}
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection