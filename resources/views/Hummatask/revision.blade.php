@extends('Hummatask.layouts.app')
@section('style')
    <link type="text/css" href="#" rel="stylesheet" />
    <style>
        .bg-label-primary {
            background-color: #eff3ff !important;
            color: #557be8 !important;
        }

        .bg-label-info {
            background-color: #d9ebff !important;
            color: #0da8ff !important;
        }

        .bg-label-warning {
            background-color: #fef5e5 !important;
            color: #ffaa05 !important;
        }

        .bg-label-danger {
            background-color: #fbf2ef !important;
            color: #e12d5b !important;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__rendered li {
            color: black;
        }

        /* Shadow untuk div pertama (Navbar) */
        .navbar-shadow {
            box-shadow: 0 2px 8px rgba(99, 98, 98, 0.1);
            /* Sesuaikan intensitas shadow */
        }
    </style>
@endsection
@section('sidebar')
    @include('Hummatask.layouts.sidebar-detail-presentation')
@endsection
@section('content')
    <div class="container-fluid">
        <div class="card bg-light-info shadow-none position-relative overflow-hidden">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">Revision</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class="text-muted " href="index-2.html">Presentation</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">Revision</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-3">
                        <div class="text-center mb-n5">
                            <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/breadcrumb/ChatBc.png"
                                alt="" class="img-fluid">

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="d-flex justify-content-between w-100 mb-4 gap-2 navbar-shadow">
            <a class="text-decoration-none" href="/dashboard/task">
                <div class="back bg-label-primary rounded p-3">
                    <svg width="32" height="24" viewBox="0 0 36 28" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M1.27307 12.586C0.89813 12.9611 0.687499 13.4697 0.687499 14C0.687499 14.5303 0.89813 15.0389 1.27307 15.414L12.5871 26.728C12.7716 26.919 12.9923 27.0714 13.2363 27.1762C13.4803 27.281 13.7427 27.3362 14.0083 27.3385C14.2738 27.3408 14.5372 27.2902 14.783 27.1896C15.0288 27.0891 15.2521 26.9406 15.4399 26.7528C15.6276 26.565 15.7762 26.3417 15.8767 26.0959C15.9773 25.8501 16.0279 25.5868 16.0256 25.3212C16.0233 25.0556 15.9681 24.7932 15.8633 24.5492C15.7585 24.3052 15.6061 24.0845 15.4151 23.9L7.51507 16L34.0011 16C34.5315 16 35.0402 15.7893 35.4153 15.4142C35.7904 15.0391 36.0011 14.5304 36.0011 14C36.0011 13.4696 35.7904 12.9609 35.4153 12.5858C35.0402 12.2107 34.5315 12 34.0011 12L7.51507 12L15.4151 4.1C15.7794 3.72279 15.981 3.21759 15.9764 2.6932C15.9719 2.16881 15.7615 1.66718 15.3907 1.29637C15.0199 0.925548 14.5183 0.715209 13.9939 0.710653C13.4695 0.706096 12.9643 0.907684 12.5871 1.272L1.27307 12.586Z"
                            fill="#5D87FF" />
                    </svg>
                </div>
            </a>
            <div class="bg-label-primary w-100 d-flex justify-content-center align-items-center text-center">
                <h2 class="text-primary fw-bolder fs-4">Hummatask</h2>
            </div>
        </div>


        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5>Revisi</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection


