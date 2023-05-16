@extends('layout.main', ['title' => 'Data Siswa - Bendahara', 'active' => 'data-siswa'])

@section('content')
<div class="content-wrapper">

  <div class="container-xxl flex-grow-1 container-p-y">
      <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
              <h4 class="mb-0">Data Siswa</h4>
              <div class="float-end">
                  <a href="{{ route('bendahara.tambah.siswa') }}" class="btn btn-green"><i class='bx bx-list-plus'></i> Tambah Data</a>
              </div>
          </div>
      <div class="card-body">
        <div class="table-responsive text-nowrap">
          <table class="table table-hover table-bordered" id="mytable">
            <thead style="background-color: #f5f1f3">
              <tr>
                <th style="text-align:center;">No</th>
                <th style="text-align:center;">Nama Siswa</th>
                <th style="text-align:center;">NIS</th>
                <th style="text-align:center;">Kelas</th>
                <th style="text-align:center;">Jenis Kelamin</th>
                <th style="text-align:center;">Status</th>
                <th style="text-align:center;">Aksi</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection