@extends('auth.layouts.app')

@section('content')
    <div class="authentication-wrapper authentication-cover authentication-bg">
        <div class="authentication-inner row">
            <div class="d-none d-lg-flex col-lg-7 p-0">
                <div class="">
                    <img src="{{ asset('assetsLogin/image.jpg') }}" alt="auth-login-cover"
                        class="img-fluid my-5 auth-illustration auth-cover-bg auth-cover-bg-color d-flex justify-content-center align-items-center"
                        style="object-fit: cover" data-app-dark-img="illustrations/auth-login-illustration-dark.html">
                </div>
            </div>
            <div class="d-flex col-12 col-lg-5 align-items-center p-sm-5 p-4">
                <div class="w-px-400 mx-auto">
                    <h3 class="mb-1 text-center">Selamat datang! 👋</h3>
                    <p class="text-center">Masuk dan mulai berpetualang.</p>
                    <form id="formAuthentication" class="mb-3 px-5 py-5" action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email"
                                placeholder="Masukkan email Anda" autofocus>
                            @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="my-4 form-password-toggle">
                            <label for="email" class="form-label">Password</label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password" class="form-control" name="password"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="password" />
                                <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary d-grid w-100">
                            Masuk
                        </button>
                        <a href="/register" class="text-black mt-2">Belum Punya akun? <span
                                class="text-primary">Daftar</span></a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if (session('pending'))
        <div id="myModal" class="modal fade show" tabindex="-1" aria-labelledby="myModalLabel" style="display: block;"
            aria-modal="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content text-center">
                    <div class="modal-header">
                    </div>
                    <div class="modal-body">
                        <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 24 24"
                            class="bg-success rounded-circle icon" fill="none" stroke="white" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-check">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M5 12l5 5l10 -10" />
                        </svg>
                        <h4 class="text-dark fs-7 mb-0 mt-3">{{ session('pending') }}</h4>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="button" class="btn btn-success" data-bs-dismiss="modal">OK</button>
                    </div>

                </div>
            </div>
        </div>
    @endif
@endsection
