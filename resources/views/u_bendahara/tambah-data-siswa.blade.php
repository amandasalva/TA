@extends('layout.main', ['title' => 'Tambah Data Siswa - Bendahara', 'foto_profil' => $data->image, 'active' => 'data-siswa'])

@section('content')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <!-- Basic Layout & Basic with Icons -->
      <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
          <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
              <h4 class="mb-3">Tambah Data Siswa</h4>
            </div>
            <div class="card-body">
              <form>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-default-name">nama lengkap</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Amanda Salva Balesta" />
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="tempat_lahir">tempat lahir</label>
                  <div class="col-sm-10">
                    <input
                      type="text"
                      class="form-control"
                      id="tempat_lahir"
                      name="tempat_lahir"
                      placeholder="Aceh"
                    />
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="tgl_lahir">tanggal lahir</label>
                  <div class="col-sm-10">
                    <div class="input-group input-group-merge">
                      <input
                        type="date"
                        id="tgl_lahir"
                        class="form-control"
                      />
                    </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="no_hp">no hp</label>
                  <div class="col-sm-10">
                    <input
                      type="text"
                      id="no_hp"
                      name="no_hp"
                      class="form-control phone-mask"
                      placeholder="0878 4799 8941"
                      aria-label="0978 4799 8941"
                    />
                  </div>
                </div>
                <div class="row justify-content-end">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Send</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection