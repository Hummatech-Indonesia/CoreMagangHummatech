@extends('mentor.layouts.app')
@section('style')
    <style>
        @media (max-width: 767px) {
            #offcanvasRight {
                width: 100%;
            }
        }

        @media (min-width: 768px) and (max-width: 991px) {
            #offcanvasRight {
                width: 50%;
            }
        }

        @media (min-width: 992px) {
            #offcanvasRight {
                width: 25%;
            }
        }
    </style>
@endsection
@section('content')
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
    </style>
    <div class="d-flex justify-content-between w-100 mb-4 gap-2">
        <a class="text-decoration-none" href="javascript:void(0)" onclick="window.history.back()">
            <div class="back bg-label-primary rounded p-3 d-flex align-items-center">
                <!-- Ikon Panah -->
                <svg width="32" height="24" viewBox="0 0 36 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M1.27307 12.586C0.89813 12.9611 0.687499 13.4697 0.687499 14C0.687499 14.5303 0.89813 15.0389 1.27307 15.414L12.5871 26.728C12.7716 26.919 12.9923 27.0714 13.2363 27.1762C13.4803 27.281 13.7427 27.3362 14.0083 27.3385C14.2738 27.3408 14.5372 27.2902 14.783 27.1896C15.0288 27.0891 15.2521 26.9406 15.4399 26.7528C15.6276 26.565 15.7762 26.3417 15.8767 26.0959C15.9773 25.8501 16.0279 25.5868 16.0256 25.3212C16.0233 25.0556 15.9681 24.7932 15.8633 24.5492C15.7585 24.3052 15.6061 24.0845 15.4151 23.9L7.51507 16L34.0011 16C34.5315 16 35.0402 15.7893 35.4153 15.4142C35.7904 15.0391 36.0011 14.5304 36.0011 14C36.0011 13.4696 35.7904 12.9609 35.4153 12.5858C35.0402 12.2107 34.5315 12 34.0011 12L7.51507 12L15.4151 4.1C15.7794 3.72279 15.981 3.21759 15.9764 2.6932C15.9719 2.16881 15.7615 1.66718 15.3907 1.29637C15.0199 0.925548 14.5183 0.715209 13.9939 0.710653C13.4695 0.706096 12.9643 0.907684 12.5871 1.272L1.27307 12.586Z"
                        fill="#5D87FF" />
                </svg>
            </div>
        </a>

        <div class="bg-label-primary w-100 d-flex justify-content-center align-items-center text-center">
            <h2 class="text-primary fw-bolder fs-4">Kumpulan project Akbar</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-4">
            <div class="card">
                <div class="card-body p-3"> <!-- Mengurangi padding dalam card-body -->
                    <!-- Badge dengan posisi di pojok kiri atas -->
                    <span class="badge bg-light-primary text-primary mb-1">Solo Project</span>

                    <!-- Judul proyek di bawah badge -->
                    <h5 class="text-dark mb-1">Web Solo Project</h5>

                    <!-- Teks "by Akbar" di bawah judul -->
                    <span class="text-muted d-block mb-2">by Akbar</span>

                    <!-- Avatar -->
                    <div class="d-flex align-items-center mb-2">
                        <img src="{{ asset('assets/images/users/avatar-10.jpg') }}" alt="avatar"
                            class="rounded-circle" width="30px" height="30px">
                    </div>

                    <!-- Kondisi Project -->
                    <div class="d-flex justify-content-between mb-2">
                        <div class="col-6">Kondisi Project</div>
                        <span class="badge bg-light-success text-success">Selesai</span>
                    </div>

                    <!-- Deadline -->
                    <div class="d-flex justify-content-between mb-3">
                        <div class="col-6">Deadline :</div>
                        <span class="badge text-success fs-1">20/11/2024 - 20/11/2024</span>
                    </div>

                    <!-- Button -->
                    <a href="/mentor/progress-project-siswa/project-group/detail-progress" class="btn btn-primary w-100">Lihat Progress</a>
                </div>
            </div>

        </div>



    </div>
    </div>
@endsection
