@extends('layout.main', ['title' => 'Tambah Tahun Pelajaran - Bendahara', 'active' => 'thn-pelajaran'])

@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-xxl">
                    <div class="card mb-4">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h4 class="mb-3">Tambah Data Tahun Pelajaran</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('bendahara.tahun-pelajaran.store') }}" method="POST">
                                @csrf
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">tahun pelajaran</label>
                                    <div class="col-sm-10">
                                        <input type="text"
                                            class="form-control
                    @error('tahun')
                      is-invalid
                    @enderror"
                                            id="tahun" name="tahun" placeholder="2020/2021" autocomplete="off"
                                            autofocus />
                                        @error('tahun')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Semester</label>
                                    <div class="col-md-10">
                                        <div class="form-check form-check-inline">
                                            <input name="semester"
                                                class="form-check-input
                      @error('semester')
                        is-invalid
                      @enderror"
                                                type="radio" value="Ganjil"
                                                {{ old('semester') == 'Ganjil' ? 'checked=' . '"' . 'checked' . '"' : '' }}>
                                            <label class="form-check-label">Ganjil</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input name="semester"
                                                class="form-check-input
                      @error('semester')
                        is-invalid
                      @enderror"
                                                type="radio" value="Genap"
                                                {{ old('semester') == 'Genap' ? 'checked=' . '"' . 'checked' . '"' : '' }}>
                                            <label class="form-check-label">Genap</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-wrap justify-content-end">
                                    <a href="{{ route('bendahara.tahun-pelajaran') }}" class="btn btn-danger m-1">Batal</a>
                                    <button class="btn btn-purple m-1" type="submit" name="submit">Simpan</button>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
