@extends('auth.layouts.app')

@section('content')
    <title>{{ $dataceos->ceo->field }} | Hummatech</title>
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
            <div class="card-header">
                <h4 class="mb-2 text-dark text-center">{{ $dataceos->ceo->company }}</h4>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-center mb-4">
                    <img src="{{ asset('storage/' . $dataceos->ceo->image) }}" class="rounded-circle" width="100" style="object-fit:cover" height="100" alt="" srcset="">
                </div>
                <table class="table">
                    <tbody>
                        <tr>
                            <td class="text-right">Nama:</td>
                            <td>{{ $dataceos->ceo->name }}</td>
                        </tr>
                        <tr>
                            <td class="text-right">Jabatan:</td>
                            <td>{{ $dataceos->ceo->field }}</td>
                        </tr>
                        <tr>
                            <td class="text-right">Tanda Tangan:</td>
                            <td>{{ \Carbon\Carbon::parse($dataceos->created_at)->locale('id')->isoFormat('dddd, D MMMM Y') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
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
