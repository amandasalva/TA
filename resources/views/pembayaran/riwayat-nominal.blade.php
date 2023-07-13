@extends('layout.main', ['title' => 'Riwayat Nominal Tagihan', 'active' => 'jenis-trans'])

@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Riwayat Ubah Nominal Jenis Transaksi</h4>
                    {{-- <div class="float-end"> --}}
                    {{-- <a href="{{ route('bendahara.jenis.transaksi') }}" class="btn btn-green"><i class='bx bx-history'></i>
                            Riwayat</a> --}}
                    {{-- </div> --}}
                </div>
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover table-bordered" id="classTable">
                            <thead style="background-color: #f5f1f3">
                                <tr style="text-align:center">
                                    <th>No</th>
                                    <th>Nama Transaksi</th>
                                    <th>Nominal</th>
                                    <th>Tanggal</th>
                                    {{-- <th style="text-align: center;">Aksi</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($riwayat as $r)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $r->nama_tagihan }}</td>
                                        <td>{{ moneyFormat($r->nominal) }}</td>
                                        <td>{{ \Carbon\Carbon::parse($r->created_at)->locale('id')->translatedFormat('l, d M Y') }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
