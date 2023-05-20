@extends('layout.main', ['title' => 'Tambah data guru - Bendahara', 'active' => 'jenis-trans'])

@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-xxl">
                    <div class="card mb-4">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h4 class="mb-3">Pembayaran Sekolah</h4>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Nama Siswa</label>
                                    <div class="col-sm-10">
                                        <select name="siswa" id="siswa" class="form-control">
                                            @foreach ($siswa as $s)
                                                <option value="{{ $s->id }}">{{ $s->nama_lengkap }}</option>
                                            @endforeach
                                        </select>
                                        @error('nama_lengkap')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Total Pembayaran</label>
                                    <div class="col-sm-10">
                                        <input type="number"
                                            class="form-control
                    @error('total')
                      is-invalid
                    @enderror"
                                            id="total" name="total" placeholder="0" autocomplete="off" />
                                        @error('username')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Keterangan</label>
                                    <div class="col-sm-10">
                                        <input type="text"
                                            class="form-control
                    @error('keterangan')
                      is-invalid
                    @enderror"
                                            id="keterangan" name="keterangan" placeholder="Keterangan" autocomplete="off" />
                                        @error('agama')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

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
