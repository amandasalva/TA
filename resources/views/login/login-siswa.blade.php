@extends('layout.auth', ['title' => 'Login Siswa'])

@section('content')
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center gap-2">
                            <div class="app-brand-link">
                                <span class="app-brand-logo demo">
                                    <img src="../img/logo.ico" alt="Logo">
                                </span>
                            </div>
                            <span class="app-brand-text demo fw-bolder" style="color:#1d751d">Siakas</span>
                        </div>
                        <p align="center">Silahkan masuk untuk mengakses aplikasi</p>
                        <!-- /Logo -->
                        <form class="mb-3" action="{{ route('siswa.proses.login') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="username" class="form-label">Nama Pengguna</label>
                                <input type="text"
                                    class="form-control
                @error('username')
                  is-invalid
                @enderror"
                                    name="username" placeholder="Masukkan nama pengguna" value="{{ old('username') }}"
                                    autocomplete="off" autofocus />
                                @error('username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="password">Kata Sandi</label>
                                <div class="input-group input-group-merge">
                                    <input type="password"
                                        class="form-control
                  @error('password')
                    is-invalid
                  @enderror"
                                        name="password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <button class="btn d-grid w-100"
                                    style="background: linear-gradient(to bottom right, #00cc00 0%, #00ffff 96%);
              color: white; font-weight:bold;"
                                    type="submit">Login </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
