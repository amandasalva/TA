@extends('layout.main', ['title' => 'Ubah Data Diri Bendahara', 'active' => 'kepalaSekolah'])

@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="nav nav-pills flex-column flex-md-row mb-3">
                                <li class="nav-item"><a class="nav-link" href="{{ route('bendahara.detail.kepsek') }}"><i
                                            class="bx bx-user me-1"></i>
                                        Detail</a></li>
                                <li class="nav-item"><a
                                        class="nav-link {{ request()->routeIs('bendahara.ubah.data') ? 'active' : '' }}"
                                        href="{{ route('bendahara.ubah.data') }}"><i class="bx bx-bell me-1"></i>
                                        Ubah</a></li>
                            </ul>
                            <div class="card mb-4">
                                <h5 class="card-header">Detail Profil Siswa</h5>
                                <div class="card-body">
                                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                                        <img src="../assets/img/avatars/1.png" alt="user-avatar" class="d-block rounded"
                                            height="100" width="100" id="uploadedAvatar" />
                                        <div class="button-wrapper">
                                            <label for="upload" class="btn btn-purple me-2 mb-4" tabindex="0">
                                                <span class="d-none d-sm-block">Unggah foto baru</span>
                                                <i class="bx bx-upload d-block d-sm-none"></i>
                                                <input type="file" id="formFile" class="form-control" hidden
                                                    accept="image/png, image/jpeg" />
                                            </label>

                                            <p class="text-muted mb-0">Format file JPG, PEG, PNG
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-0">
                                <div class="card-body">
                                    <form id="formAccountSettings" method="POST" onsubmit="return false">
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label for="username" class="form-label">Nama Pengguna</label>
                                                <input class="form-control" type="text" id="username" name="username"
                                                    value="John" autofocus />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                                <input class="form-control" type="text" name="nama_lengkap"
                                                    id="nama_lengkap" value="Doe" />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="email" class="form-label">Email</label>
                                                <input class="form-control" type="text" id="email" name="email"
                                                    value="john.doe@example.com" placeholder="john.doe@example.com" />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="password" class="form-label">Kata Sandi</label>
                                                <input type="password" class="form-control" id="password" name="password"
                                                    value="ThemeSelection" />
                                            </div>
                                        </div>
                                        <div class="mt-2">
                                            <button type="submit" class="btn btn-purple me-2">Simpan Perubahan</button>
                                            <button type="reset" class="btn btn-danger">Batal</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- /Account -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
