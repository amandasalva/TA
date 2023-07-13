@extends('layout.auth', ['title' => 'Lupa Sandi'])

@section('content')
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <div class="card">
                    <div class="card-body">
                        <h3 align="center">Atur Ulang Kata Sandi Anda</h3>
                        <form class="mb-3" action="{{ route('password.request') }}" method="POST">
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
                            <div class="mt-5 mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="email">Email</label>
                                </div>
                                <input type="email"
                                    class="form-control
                                    @error('email')
                                        is-invalid
                                    @enderror"
                                    name="email" placeholder="Masukkan email" value="{{ old('email') }}"
                                    autocomplete="off" autofocus />
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <button class="btn d-grid w-100"
                                    style="background: linear-gradient(to bottom right, #00cc00 0%, #00ffff 96%);color: white; font-weight:bold;"
                                    type="submit">Kirim </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
