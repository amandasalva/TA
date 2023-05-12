@extends('layout.main', ['title' => 'Data Guru - Bendahara', 'foto_profil' => $data->image, 'active' => 'data-guru'])

@section('content')
<div class="content-wrapper">

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Data Siswa</h4>
                <div class="float-end">
                    <a href="{{ route('bendahara.tambah.guru') }}" class="btn btn-green"><i class='bx bx-list-plus'></i> Tambah Data</a>
                </div>
            </div>
        <div class="card-body">
          <div class="table-responsive text-nowrap">
            <table class="table table-hover table-bordered" id="myTable">
              <thead style="background-color: #cff0d660">
                <tr style="text-align:center;">
                  <th>No</th>
                  <th>Nama</th>
                  <th>Nama Pengguna</th>
                  <th>Gender</th>
                  <th>Alamat</th>
                  <th>Telepon</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($guru as $dtguru)
                <tr style="text-align: center">
                  <td>{{ $no++ }}</td>
                  <td>{{ $dtguru->nama_lengkap }}</td>
                  <td>{{ $dtguru->username }}</td>
                  <td>{{ $dtguru->jk }}</td>
                  <td>{{ $dtguru->alamat }}</td>
                  <td>
                    @if ($dtguru->image == null)
                        <img src="{{ asset('storage/foto_profil/') }}" alt="Foto guru" class="w-px-40 h-auto rounded-circle" />
                      @else
                        <img src="{{ asset('images/' .$dtguru->image) }}" alt="Foto guru" class="w-px-40 h-auto rounded-circle" />                              
                      @endif
                  </td>
                  <td><span class="badge bg-label-info me-1">{{ $dtguru->status }}</span></td>
                  <td>
                    <a href="{{ route('bendahara.edit.guru', $dtguru->id) }}" class="btn btn-warning" type="button" style="padding: 7px"><i class='bx bxs-edit-alt'></i></a>
                    <a href="#" class="btn btn-danger" type="button" style="padding: 7px"><i class='bx bx-trash'></i></a>
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