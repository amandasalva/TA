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
                <tr>
                  <th style="text-align:center;">No</th>
                  <th style="text-align:center;">Nama</th>
                  <th style="text-align:center;">Jenis Kelamin</th>
                  <th style="text-align:center;">Alamat</th>
                  <th style="text-align:center;">Telepon</th>
                  <th style="text-align:center;">Status</th>
                  <th style="text-align:center;">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $)
                    
                @endforeach
                <tr>
                  <td>
                    <i class="fab fa-bootstrap fa-lg text-primary me-3"></i> <strong>1</strong>
                  </td>
                  <td>
                    <i class="fab fa-bootstrap fa-lg text-primary me-3"></i> <strong>Bootstrap Project</strong>
                  </td>
                  <td>
                    <i class="fab fa-bootstrap fa-lg text-primary me-3"></i> <strong>12345</strong>
                  </td>
                  <td>Jerry Milton</td>
                  <td>
                    <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                      <li
                        data-bs-toggle="tooltip"
                        data-popup="tooltip-custom"
                        data-bs-placement="top"
                        class="avatar avatar-xs pull-up"
                        title="Lilian Fuller"
                      >
                        <img src="../../assets/img/avatars/5.png" alt="Avatar" class="rounded-circle" />
                      </li>
                      <li
                        data-bs-toggle="tooltip"
                        data-popup="tooltip-custom"
                        data-bs-placement="top"
                        class="avatar avatar-xs pull-up"
                        title="Sophia Wilkerson"
                      >
                        <img src="../../assets/img/avatars/6.png" alt="Avatar" class="rounded-circle" />
                      </li>
                      <li
                        data-bs-toggle="tooltip"
                        data-popup="tooltip-custom"
                        data-bs-placement="top"
                        class="avatar avatar-xs pull-up"
                        title="Christina Parker"
                      >
                        <img src="../../assets/img/avatars/7.png" alt="Avatar" class="rounded-circle" />
                      </li>
                    </ul>
                  </td>
                  <td><span class="badge bg-label-warning me-1">Pending</span></td>
                  <td>
                    <a href="" class="btn btn-warning" type="button" style="padding: 7px"><i class='bx bxs-edit-alt'></i></a>
                    <a href="#" class="btn btn-danger" type="button" style="padding: 7px"><i class='bx bx-trash'></i></a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  
  </div>
@endsection