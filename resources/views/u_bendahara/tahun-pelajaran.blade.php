@extends('layout.main', ['title' => 'Tahun Pelajaran - Bendahara', 'foto_profil' => $data->image, 'active' => 'thn-pelajaran'])

@section('content')
  <div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h4 class="mb-0">Tahun Pelajaran</h4>
          <div class="float-end">
            <a href="{{ route('bendahara.tambah.tahun.pelajaran') }}" class="btn btn-green"><i class='bx bx-list-plus'></i> Tambah Data</a>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive text-nowrap">
            <table class="table table-hover table-bordered table-striped" id="myTable">
              <thead style="background-color: #cff0d660">
                <tr>
                  <th style="text-align:center; font-weight:bold;">No</th>
                  <th style="text-align:center; font-weight:bold;">Id</th>
                  <th style="text-align:center; font-weight:bold;">Tahun Pelajaran</th>
                  <th style="text-align:center; font-weight:bold;">Semester</th>
                  <th style="text-align:center; font-weight:bold;">Aksi</th>
                </tr>
              </thead>
              <tbody style="text-align: center">
                @php
                    $no = 1;
                @endphp
                @foreach ($tahun as $thn_ajaran)
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $thn_ajaran->id }}</td>
                  <td>{{ $thn_ajaran->tahun }}</td>
                  <td>{{ $thn_ajaran->semester }}</td>
                  <td>
                    <form action="/bendahara/hapus/data/{{ $data->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="padding: 7px" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" class="btn btn-danger"><i class='bx bx-trash'></i></button>
                  </form> 
                  <a href="" class="btn btn-warning" type="button" style="padding: 7px"><i class='bx bxs-edit-alt'></i></a>
                    {{-- <a href="{{ route('bendahara.hapus.data', $data->id) }}" class="btn btn-danger" type="button" style="padding: 7px"><i class='bx bx-trash'></i></a> --}}
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