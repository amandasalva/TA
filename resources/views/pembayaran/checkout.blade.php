@extends('layout.main', ['title' => 'Tambah data guru - Bendahara', 'active' => 'bendahara-transaksi'])

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
                            <form action="{{ route('bendahara.create.transaksi') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Nama Siswa</label>
                                    <div class="col-sm-10">
                                        <select name="siswa" id="siswa" class="form-control">
                                            <option value="">-- Pilih Siswa --</option>
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
                                    <label class="col-sm-2 col-form-label">Jenis Biaya Pembayaran</label>
                                    <div class="col-sm-10">
                                        <select name="jenis" id="jenis" class="form-control">
                                            <option value="" selected disabled>-- Pilih Pembayaran --</option>
                                            @foreach ($jenis as $j)
                                                <option value="{{ $j->id }}">{{ $j->nama_tagihan }} -
                                                    {{ moneyFormat($j->nominal) }}</option>
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
                                    <label class="col-sm-2 col-form-label">Tipe Pembayaran</label>
                                    <div class="col-sm-10">
                                        <select name="tipe_pembayaran" id="tipe_pembayaran" class="form-control">
                                            <option value="" selected disabled>-- Pilih Pembayaran --</option>
                                            <option value="tunai">Tunai</option>
                                            <option value="midtrans">Non-Tunai</option>
                                        </select>
                                        @error('nama_lengkap')
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
