@extends('layout.main', ['title' => 'Transaksi Siswa - Bendahara', 'active' => 'transaksi']);

@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Data Semua Transaksi</h4>
                    {{-- <div class="float-end">
                        <button data-bs-toggle="modal" data-bs-target="#modal-kelas" class="btn btn-green"><i
                                class='bx bx-list-plus'></i> Riwayat</button>
                    </div> --}}
                </div>
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover table-bordered" id="classTable">
                            <thead style="background-color: #f5f1f3">
                                <tr style="text-align:center; justify-content:center; display:flex;">
                                    <th>No</th>
                                    <th>Nama Siswa</th>
                                    <th>Tahun Pelajaran</th>
                                    <th>Total Pembayaran</th>
                                    <th>Status</th>
                                    <th>Keterangan</th>
                                    <th>Tanggal Pembayaran</th>
                                    <th>Tanggal Kadaluarsa</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                {{-- @foreach ($kelas as $class) --}}
                                {{-- <tr> --}}
                                {{-- <td>{{ $no++ }}</td> --}}
                                {{-- <td>{{ $class->tingkat }}</td> --}}
                                {{-- </tr> --}}
                                {{-- @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
