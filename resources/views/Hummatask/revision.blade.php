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

            {{--  card revision --}}
            <div class="col-md-4">
                <div class="card">
                    <div class="container">
                        <h5 class="fw-semibold mt-3">Revisi</h5>
                        {{--  content  --}}
                        <div class="row mt-3">
                            <div class="col-12">
                                <div class="container rounded-1 bg-light-primary position-relative p-3">
                                    <div class="d-flex">
                                        <div class="mt-2 flex-grow-1">
                                            <p class="fw-semibold fs-1 mb-2 mt-2" style="color: #0da8ff">
                                                Super awesome, Vue coming s awesome, Vue coming s awesome, Vue coming s
                                                awesome, Vue coming sooawesome, Vue coming sooawesome, Vue coming
                                                sooawesome, Vue coming soo n!
                                            </p>
                                        </div>
                                        <a href="#" class=" position-absolute" style="top: 10px; right: 10px;"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                                                <path
                                                    d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                            </svg>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item fs-2" href="#">
                                                    Edit
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item fs-2"  data-bs-toggle="modal" data-bs-target="#submit-a-presentation" href="#">
                                                    Hapus
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <ul class="hstack mb-2">
                                            <li class="ms-n8">
                                                <a href="javascript:void(0)" class="me-1" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" aria-label="gito" data-bs-original-title="gito">
                                                    <img src="assets-user/dist/images/profile/user-2.jpg"
                                                        class="rounded-circle border border-2 border-white" width="33"
                                                        height="33" alt="">
                                                </a>
                                            </li>
                                            <li class="ms-n8">
                                                <a href="javascript:void(0)" class="me-1" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" aria-label="sugiren"
                                                    data-bs-original-title="sugiren">
                                                    <img src="assets-user/dist/images/profile/user-3.jpg"
                                                        class="rounded-circle border border-2 border-white" width="33"
                                                        height="33" alt="">
                                                </a>
                                            </li>
                                            <li class="ms-n8">
                                                <a href="javascript:void(0)" class="me-1" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" aria-label="mustafa"
                                                    data-bs-original-title="mustafa">
                                                    <img src="assets-user/dist/images/profile/user-4.jpg"
                                                        class="rounded-circle border border-2 border-white" width="33"
                                                        height="33" alt="">
                                                </a>
                                            </li>
                                            <li class="ms-n8">
                                                <a href="javascript:void(0)" class="me-1" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" aria-label="Mark Smith"
                                                    data-bs-original-title="Mark Smith">
                                                    <img src="assets-user/dist/images/profile/user-5.jpg"
                                                        class="rounded-circle border border-2 border-white" width="33"
                                                        height="33" alt="">
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-12">
                                <div class="container rounded-1 bg-light-primary position-relative p-3">
                                    <div class="d-flex">
                                        <div class="mt-2 flex-grow-1">
                                            <p class="fw-semibold fs-1 mb-2 mt-2" style="color: #0da8ff">
                                                Super awesome, Vue coming s awesome, n!
                                            </p>
                                        </div>
                                        <a href="#" class=" position-absolute" style="top: 10px; right: 10px;"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-three-dots-vertical"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                            </svg>
                                        </a>

                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item fs-2" href="#">
                                                    Edit
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item fs-2"  data-bs-toggle="modal" data-bs-target="#submit-a-presentation" href="#">
                                                    Hapus
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <ul class="hstack mb-2">
                                            <li class="ms-n8">
                                                <a href="javascript:void(0)" class="me-1" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" aria-label="gito"
                                                    data-bs-original-title="gito">
                                                    <img src="assets-user/dist/images/profile/user-2.jpg"
                                                        class="rounded-circle border border-2 border-white" width="33"
                                                        height="33" alt="">
                                                </a>
                                            </li>
                                            <li class="ms-n8">
                                                <a href="javascript:void(0)" class="me-1" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" aria-label="sugiren"
                                                    data-bs-original-title="sugiren">
                                                    <img src="assets-user/dist/images/profile/user-3.jpg"
                                                        class="rounded-circle border border-2 border-white" width="33"
                                                        height="33" alt="">
                                                </a>
                                            </li>
                                            <li class="ms-n8">
                                                <a href="javascript:void(0)" class="me-1" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" aria-label="mustafa"
                                                    data-bs-original-title="mustafa">
                                                    <img src="assets-user/dist/images/profile/user-4.jpg"
                                                        class="rounded-circle border border-2 border-white" width="33"
                                                        height="33" alt="">
                                                </a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4 mt-4">
                            <a href="" style="color: gray; display: flex; align-items: center;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 5l0 14" />
                                    <path d="M5 12l14 0" />
                                </svg>
                                <span style="margin-left: 8px;">Tambah card</span>
                                <svg style="margin-left: 170px" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    aria-label="Tambahkan" data-bs-original-title="Tambahkan"
                                    xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                    viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M20 2H8c-1.103 0-2 .897-2 2v12c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2V4c0-1.103-.897-2-2-2M8 16V4h12l.002 12z" />
                                    <path fill="currentColor"
                                        d="M4 8H2v12c0 1.103.897 2 2 2h12v-2H4zm11-2h-2v3h-3v2h3v3h2v-3h3V9h-3z" />
                                </svg>
                            </a>

                        </div>
                    </div>

                </div>
            </div>

            {{--  card work period  --}}
            <div class="col-md-4">
                <div class="card">
                    <div class="container">
                        <h5 class="fw-semibold mt-3">Dikerjakan</h5>

                        {{--  content  --}}
                        <div class="row mt-3">
                            <div class="col-12">
                                <div class="container rounded-1 bg-light-primary position-relative p-3">
                                    <div class="d-flex">
                                        <div class="mt-2 flex-grow-1">
                                            <p class="fw-semibold fs-1 mb-2 mt-2" style="color: #0da8ff">
                                                Super awesome, Vue coming s awesome, Vue coming s awesome, Vue coming s
                                                awesome, Vue coming sooawesome, Vue coming sooawesome, Vue coming
                                                sooawesome, Vue coming soo n!
                                            </p>
                                        </div>
                                        <a href="#" class=" position-absolute" style="top: 10px; right: 10px;"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-three-dots-vertical"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                            </svg>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item fs-2" href="#">
                                                    Edit
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item fs-2"  data-bs-toggle="modal" data-bs-target="#submit-a-presentation" href="#">
                                                    Hapus
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <ul class="hstack mb-2">
                                            <li class="ms-n8">
                                                <a href="javascript:void(0)" class="me-1" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" aria-label="gito"
                                                    data-bs-original-title="gito">
                                                    <img src="assets-user/dist/images/profile/user-2.jpg"
                                                        class="rounded-circle border border-2 border-white" width="33"
                                                        height="33" alt="">
                                                </a>
                                            </li>
                                            <li class="ms-n8">
                                                <a href="javascript:void(0)" class="me-1" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" aria-label="sugiren"
                                                    data-bs-original-title="sugiren">
                                                    <img src="assets-user/dist/images/profile/user-3.jpg"
                                                        class="rounded-circle border border-2 border-white" width="33"
                                                        height="33" alt="">
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-12">
                                <div class="container rounded-1 bg-light-primary position-relative p-3">
                                    <div class="d-flex">
                                        <div class="mt-2 flex-grow-1">
                                            <p class="fw-semibold fs-1 mb-2 mt-2" style="color: #0da8ff">
                                                Super awesome, Vue coming s awesome, n!
                                            </p>
                                        </div>
                                        <a href="#" class=" position-absolute" style="top: 10px; right: 10px;"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-three-dots-vertical"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                            </svg>
                                        </a>

                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item fs-2" href="#">
                                                    Edit
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item fs-2"  data-bs-toggle="modal" data-bs-target="#submit-a-presentation" href="#">
                                                    Hapus
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <ul class="hstack mb-2">
                                            <li class="ms-n8">
                                                <a href="javascript:void(0)" class="me-1" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" aria-label="gito"
                                                    data-bs-original-title="gito">
                                                    <img src="assets-user/dist/images/profile/user-2.jpg"
                                                        class="rounded-circle border border-2 border-white" width="33"
                                                        height="33" alt="">
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-12">
                                <div class="container rounded-1 bg-light-primary position-relative p-3">
                                    <div class="d-flex">
                                        <div class="mt-2 flex-grow-1">
                                            <p class="fw-semibold fs-1 mb-2 mt-2" style="color: #0da8ff">
                                                Super awesome, Vue coming s awesome, n!
                                            </p>
                                        </div>
                                        <a href="#" class=" position-absolute" style="top: 10px; right: 10px;"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-three-dots-vertical"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                            </svg>
                                        </a>

                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item fs-2" href="#">
                                                    Edit
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item fs-2"  data-bs-toggle="modal" data-bs-target="#submit-a-presentation" href="#">
                                                    Hapus
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <ul class="hstack mb-2">
                                            <li class="ms-n8">
                                                <a href="javascript:void(0)" class="me-1" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" aria-label="gito"
                                                    data-bs-original-title="gito">
                                                    <img src="assets-user/dist/images/profile/user-2.jpg"
                                                        class="rounded-circle border border-2 border-white" width="33"
                                                        height="33" alt="">
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{--  bottom  --}}
                        <div class="mb-4 mt-4">
                            <a href="" style="color: gray; display: flex; align-items: center;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 5l0 14" />
                                    <path d="M5 12l14 0" />
                                </svg>
                                <span style="margin-left: 8px;">Tambah card</span>
                                <svg style="margin-left: 170px" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    aria-label="Tambahkan" data-bs-original-title="Tambahkan"
                                    xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                    viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M20 2H8c-1.103 0-2 .897-2 2v12c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2V4c0-1.103-.897-2-2-2M8 16V4h12l.002 12z" />
                                    <path fill="currentColor"
                                        d="M4 8H2v12c0 1.103.897 2 2 2h12v-2H4zm11-2h-2v3h-3v2h3v3h2v-3h3V9h-3z" />
                                </svg>
                            </a>

                        </div>
                    </div>
                </div>
            </div>

            {{--  card done  --}}
            <div class="col-md-4">
                <div class="card">
                    <div class="container">
                        <h5 class="fw- mt-3">Selesai</h5>

                        {{--  content  --}}
                        <div class="row mt-3">
                            <div class="col-12">
                                <div class="container rounded-1 bg-light-primary position-relative p-3">
                                    <div class="d-flex">
                                        <div class="mt-2 flex-grow-1">
                                            <p id="textContent" class="fw-semibold fs-1 mb-2 mt-2" style="color: #0da8ff">
                                                Super awesome, Vue coming soon!
                                            </p>
                                            <input type="text" id="editInput" class="form-control d-none FS-2" value="Super awesome, Vue coming soon!">
                                        </div>
                                        <a href="#" class="position-absolute" style="top: 10px; right: 10px;" data-bs-toggle="dropdown" aria-expanded="false">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                                                <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"/>
                                            </svg>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item fs-2" href="#" id="editButton">
                                                    Edit
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item fs-2" href="#" data-bs-toggle="modal" data-bs-target="#submit-a-presentation">
                                                    Hapus
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div id="saveCancelButtons" class="d-none MT-2">
                                        <button class="btn btn-primary btn-sm" id="saveButton">Save</button>
                                        <button class="btn btn-secondary btn-sm" id="cancelButton">Cancel</button>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <ul class="hstack mb-2">
                                            <li class="ms-n8">
                                                <a href="javascript:void(0)" class="me-1" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="gito" data-bs-original-title="gito">
                                                    <img src="assets-user/dist/images/profile/user-2.jpg" class="rounded-circle border border-2 border-white" width="33" height="33" alt="">
                                                </a>
                                            </li>
                                            <li class="ms-n8">
                                                <a href="javascript:void(0)" class="me-1" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="sugiren" data-bs-original-title="sugiren">
                                                    <img src="assets-user/dist/images/profile/user-3.jpg" class="rounded-circle border border-2 border-white" width="33" height="33" alt="">
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                        document.getElementById('editButton').addEventListener('click', function(event) {
                            event.preventDefault();
                            document.getElementById('textContent').classList.add('d-none');
                            document.getElementById('editInput').classList.remove('d-none');
                            document.getElementById('saveCancelButtons').classList.remove('d-none');
                        });

                        document.getElementById('saveButton').addEventListener('click', function() {
                            var editedText = document.getElementById('editInput').value;
                            document.getElementById('textContent').innerText = editedText;
                            document.getElementById('textContent').classList.remove('d-none');
                            document.getElementById('editInput').classList.add('d-none');
                            document.getElementById('saveCancelButtons').classList.add('d-none');
                        });

                        document.getElementById('cancelButton').addEventListener('click', function() {
                            document.getElementById('editInput').value = document.getElementById('textContent').innerText;
                            document.getElementById('textContent').classList.remove('d-none');
                            document.getElementById('editInput').classList.add('d-none');
                            document.getElementById('saveCancelButtons').classList.add('d-none');
                        });
                        </script>


                        <div class="row mt-3">
                            <div class="col-12">
                                <div class="container rounded-1 bg-light-primary position-relative p-3">
                                    <div class="d-flex">
                                        <div class="mt-2 flex-grow-1">
                                            <p class="fw-semibold fs-1 mb-2 mt-2" style="color: #0da8ff">
                                                Super awesome, Vue coming s awesome, n!
                                            </p>
                                        </div>
                                        <a href="#" class=" position-absolute" style="top: 10px; right: 10px;"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-three-dots-vertical"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                            </svg>
                                        </a>

                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item fs-2" href="#">
                                                    Edit
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item fs-2"  data-bs-toggle="modal" data-bs-target="#submit-a-presentation" href="#">
                                                    Hapus
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <ul class="hstack mb-2">
                                            <li class="ms-n8">
                                                <a href="javascript:void(0)" class="me-1" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" aria-label="gito"
                                                    data-bs-original-title="gito">
                                                    <img src="assets-user/dist/images/profile/user-2.jpg"
                                                        class="rounded-circle border border-2 border-white" width="33"
                                                        height="33" alt="">
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-12">
                                <div class="container rounded-1 bg-light-primary position-relative p-3">
                                    <div class="d-flex">
                                        <div class="mt-2 flex-grow-1">
                                            <p class="fw-semibold fs-1 mb-2 mt-2" style="color: #0da8ff">
                                                Super awesome, Vue coming s awesome, n!
                                            </p>
                                        </div>
                                        <a href="#" class=" position-absolute" style="top: 10px; right: 10px;"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-three-dots-vertical"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                            </svg>
                                        </a>

                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item fs-2" href="#">
                                                    Edit
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item fs-2"  data-bs-toggle="modal" data-bs-target="#submit-a-presentation" href="#">
                                                    Hapus
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <ul class="hstack mb-2">
                                            <li class="ms-n8">
                                                <a href="javascript:void(0)" class="me-1" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" aria-label="gito"
                                                    data-bs-original-title="gito">
                                                    <img src="assets-user/dist/images/profile/user-2.jpg"
                                                        class="rounded-circle border border-2 border-white" width="33"
                                                        height="33" alt="">
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{--  bottom  --}}
                        <div class="mb-4 mt-4">
                            <a href="" style="color: gray; display: flex; align-items: center;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 5l0 14" />
                                    <path d="M5 12l14 0" />
                                </svg>
                                <span style="margin-left: 8px;">Tambah card</span>
                                <svg style="margin-left: 170px" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    aria-label="Tambahkan" data-bs-original-title="Tambahkan"
                                    xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                    viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M20 2H8c-1.103 0-2 .897-2 2v12c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2V4c0-1.103-.897-2-2-2M8 16V4h12l.002 12z" />
                                    <path fill="currentColor"
                                        d="M4 8H2v12c0 1.103.897 2 2 2h12v-2H4zm11-2h-2v3h-3v2h3v3h2v-3h3V9h-3z" />
                                </svg>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@include('Hummatask.partials.modal-delete')
