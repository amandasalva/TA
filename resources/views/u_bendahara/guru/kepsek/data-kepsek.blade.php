@extends('layout.main', ['title' => 'Data Bendahara', 'active' => 'kepalaSekolah'])

@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="nav nav-pills flex-column flex-md-row mb-3">
                                <li class="nav-item "><a class="nav-link active"
                                        href="{{ route('bendahara.detail.kepsek') }}"><i class="bx bx-user me-1"></i>
                                        Detail</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('bendahara.ubah.data') }}"><i
                                            class="bx bx-bell me-1"></i>
                                        Ubah</a></li>
                            </ul>
                            <div class="card mb-4">
                                <h5 class="card-header">Detail Profil Kepala Sekolah</h5>
                                <!-- Account -->
                                <div class="card-body">
                                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                                        @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 3 || Auth::user()->role_id == 4)
                                            @if (Auth::user()->pegawai && !empty(Auth::user()->pegawai->image))
                                                <img src="{{ asset('storage/foto_profil/' . Auth::user()->pegawai->image) }}"
                                                    alt class="d-block rounded" height="100" width="100">
                                            @else
                                                <img src="{{ asset('images/user-default.jpg') }}" alt
                                                    class="d-block rounded" height="100" width="100" />
                                            @endif
                                        @elseif(Auth::user()->role_id == 2)
                                            @if (Auth::user()->siswa && !empty(Auth::user()->siswa->image))
                                                <img src="{{ asset('storage/foto_profil/' . Auth::user()->siswa->image) }}"
                                                    alt class="d-block rounded" height="100" width="100">
                                            @else
                                                <img src="{{ asset('images/user-default.jpg') }}" alt
                                                    class="d-block rounded" height="100" width="100" />
                                            @endif
                                        @else
                                            <img src="{{ asset('images/user-default.jpg') }}" alt class="d-block rounded"
                                                height="100" width="100" />
                                        @endif
                                    </div>
                                </div>
                                <hr class="my-0">
                                <div class="card-body">
                                    <form id="formAccountSettings" method="POST" onsubmit="return false">
                                        <div class="row">
                                            @if ($kepsek)
                                                <div class="mb-3 col-md-6">
                                                    <label for="username" class="form-label">Nama Lengkap</label>
                                                    <input class="form-control" type="text" id="username"
                                                        name="username" value="{{ $kepsek->username }}" autofocus />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="email" class="form-label">Tempat dan Tanggal
                                                        Lahir</label>
                                                    <input class="form-control" type="text" id="email" name="email"
                                                        value="" placeholder="john.doe@example.com" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="nama_lengkap" class="form-label">Jenis Kelamin</label>
                                                    <input class="form-control" type="text" name="nama_lengkap"
                                                        id="nama_lengkap" value="" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="password" class="form-label">Alamat</label>
                                                    <input type="password" class="form-control" id="password"
                                                        name="password" value="ThemeSelection" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="email" class="form-label">Agama</label>
                                                    <input class="form-control" type="text" id="email" name="email"
                                                        value="john.doe@example.com" placeholder="john.doe@example.com" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="password" class="form-label">No. Telepon</label>
                                                    <input type="password" class="form-control" id="password"
                                                        name="password" value="ThemeSelection" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="email" class="form-label">Username</label>
                                                    <input class="form-control" type="text" id="email"
                                                        name="email" value="john.doe@example.com"
                                                        placeholder="john.doe@example.com" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="password" class="form-label">Password</label>
                                                    <input type="password" class="form-control" id="password"
                                                        name="password" value="ThemeSelection" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="text" class="form-label">Status Akun</label>
                                                    <input class="form-control" type="text" id="status"
                                                        name="status" value="" placeholder="Status akun" />
                                                </div>
                                            @else
                                                <div class="mb-3">
                                                    <div class="col-md-12">
                                                        <p>Tidak ada data yang tersedia</p>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </form>
                                </div>
                                <!-- /Account -->
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            {{-- <div class="row"> --}}
            {{-- <div class="col-md-12"> --}}
            {{-- <div class="row"> --}}
        </div>
    </div>
    </div>
    </div>
    </div>
@endsection
