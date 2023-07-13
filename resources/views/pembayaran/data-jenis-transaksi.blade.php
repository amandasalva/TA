@extends('layout.main', ['title' => 'Data Jenis Transaksi - Bendahara', 'active' => 'jenis-trans'])

@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Data Jenis Transaksi</h4>
                    <div class="float-end">
                        <a href="{{ route('bendahara.riwayat.nominal.transaksi') }}" class="btn btn-green"><i
                                class='bx bx-history'></i>
                            Riwayat</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover table-bordered" id="classTable">
                            <thead style="background-color: #f5f1f3">
                                <tr style="text-align:center">
                                    <th>No</th>
                                    <th>Nama Transaksi</th>
                                    <th>Nominal</th>
                                    <th style="text-align: center;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($jenis as $j)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $j->nama_tagihan }}</td>
                                        <td>{{ moneyFormat($j->nominal) }}</td>
                                        <td style="justify-content: center; align-items: center;">
                                            <button style="padding: 7px; margin-right: 10px;" class="btn btn-warning"
                                                data-bs-target="#modal-edit{{ $j->id }}" data-bs-toggle="modal">
                                                <i class='bx bx-pen'></i>
                                            </button>
                                        </td>
                                    </tr>
                                    {{-- modal edit  --}}
                                    <div class="modal fade" id="modal-edit{{ $j->id }}" tabindex="-1"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel3">Ubah Nominal
                                                        {{ $j->nama_tagihan }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form
                                                        action="{{ route('bendahara.edit.jenis.transaksi', ['id' => $j->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        <div class="row g-2 mb-2">
                                                            <div class="col mb-0">
                                                                <label for="nominal" class="form-label">Nominal</label>
                                                                <input type="number" id="nominal" min="0"
                                                                    value="{{ $j->nominal }}" name="nominal"
                                                                    class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="d-flex flex-wrap justify-content-end">
                                                            <button data-bs-dismiss="modal"
                                                                class="btn btn-danger m-1">Batal</button>
                                                            <button class="btn btn-purple m-1" type="submit"
                                                                name="submit">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
