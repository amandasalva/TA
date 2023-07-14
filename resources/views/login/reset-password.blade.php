@extends('layout.auth', ['title' => 'Atur Ulang Kata Sandi'])

@section('content')
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        {{-- <div class="app-brand justify-content-center gap-2">
                            <div class="app-brand-link">
                                <span class="app-brand-logo demo">
                                    <img src="../img/logo.ico" alt="Logo">
                                </span>
                            </div>
                            <span class="app-brand-text demo fw-bolder" style="color:#1d751d">Atur Ulang Kata Sandi</span>
                        </div> --}}
                        <h3 align="center">Atur Ulang Kata Sandi</h3>
                        <!-- /Logo -->
                        <form class="mb-3" action="{{ route('reset.password') }}" method="POST">
                            @if (Session::get('fail'))
                                <div class="alert alert-danger">
                                    {{ Session::get('fail') }}
                                </div>
                            @endif

                            @if (Session::get('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
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
                                    type="submit">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
