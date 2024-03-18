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
            <div class="d-flex col-12 col-lg-5 align-items-center p-sm-5 p-2">
                <div class="w-px-400 mx-auto">

                    <div class="mb-3 px-5">
                        <a href="{{ route('home') }}" class="d-flex justify-content-center">
                            <img src="{{ asset('logopkldark.png') }}" class="d-flex" height="96px" alt="PKL Hummatech" />
                        </a>

                        <h3 class="mb-1 text-center">Selamat datang! 👋</h3>
                        <p class="text-center">Masuk dan mulai berpetualang.</p>

                        <form id="formAuthentication" action="{{ route('login') }}" method="POST">

                            @csrf
                            <div class="mb-3 mt-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                                    placeholder="Mis: email@domain.tld" value="{{ old('email') }}" autofocus />
                                @error('username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="my-4 form-password-toggle">
                                <label for="email" class="form-label">Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password"
                                        placeholder="Masukkan kata sandimu"
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
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
