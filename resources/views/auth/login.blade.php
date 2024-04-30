@extends('auth.layouts.app')

@section('content')
    {{-- <div class="authentication-wrapper authentication-cover authentication-bg">
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
                                <div class="text-danger">
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
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary d-grid w-100">
                            Masuk
                        </button>
                        <div class="text-center mt-3">
                            <a href="/register" class="text-black mt-2">Belum Punya akun? <span
                                    class="text-primary">Daftar</span></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}

    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: url('{{ asset('assetsLogin/bg.png') }}') no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 0;
        }

        .card {
            background: rgba(255, 255, 255, 0.7);
            border-radius: 5%;
            padding: 5rem;
            margin: -1%;
            backdrop-filter: blur(2px);

        }

        .gradient-btn {
            background: linear-gradient(to right, #B1D0FF 0%, #3597F1 100%);
            border: none;
        }

        img.person-holding-card {
            max-width: 150px;
            height: auto;
            margin: 0 0 300px 0;
            align-self: center;
            z-index: 1;

        }

        @media (min-width: 185px) and (max-width: 1280px) {
            body {
                height: 100%;
                align-items: flex-start;
                padding-top: 7rem;
            }

            .card {
                max-width: 100%;
                margin: 1rem;
                padding: 1rem;
            }

            .person-holding-card {
                display: none;
            }

            h3 {
                font-size: 22px;
            }

            h5 {
                font-size: 12px;
            }
        }
    </style>

    <div class="login-container">
        <div class="card">
            <div class="card-body">
                <div class=" text-center">
                    <h3 class="mb-2 text-dark">Selamat datang!👋</h3>
                    <h5 class="text-dark mb-4">Masuk dan mulai berpetualang</h5>
                </div>
                <form id="formAuthentication" class="mb-3  " action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text"
                            class="form-control @error('email')
                        is-invalid
                        @enderror"
                            id="email" name="email" placeholder="Masukkan email Anda" autofocus />

                        @error('email')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="my-4 form-password-toggle">
                        <label for="email" class="form-label">Password</label>
                        <div class="input-group input-group-merge">
                            <input type="password" id="password"
                                class="form-control @error('password')
                            is-invalid
                            @enderror"
                                name="password" placeholder="Masukkan kata sandi akun anda" aria-describedby="password" />
                            <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>

                            @error('password')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="">
                        <button type="submit" class="btn btn-primary d-grid w-100 rounded-pill gradient-btn">
                            Masuk
                        </button>
                    </div>
                    <div class="text-center mt-3">
                        <a href="/register" class="text-black mt-2">Belum Punya akun? <span
                                class="text-primary mb-4">Daftar</span></a>
                    </div>
                </form>
            </div>
        </div>
        <img src="{{ asset('assetsLogin/cartoon.png') }}" alt="Person holding card" class="img-fluid person-holding-card">
    </div>

    @if (session('pending'))
        <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-modal="true"
            role="dialog">
            <div class="modal-dialog">
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

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            $("#myModal").modal('show');
        });
    </script>
@endsection
