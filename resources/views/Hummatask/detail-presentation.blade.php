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
                        <h4 class="fw-semibold mb-8">Presentation</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class="text-muted " href="index-2.html">Detail Project</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">Presentation</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-3">
                        <div class="text-center mb-n5">
                            <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/backgrounds/welcome-bg.svg"
                                alt="" class="img-fluid" style="width: 300px; height: auto;">
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


        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-8">
                        <div class="d-md-flex align-items-center mb-9">
                            <div>
                                <ul class="nav nav-tabs " role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#date-by-day" role="tab"
                                            aria-selected="true">
                                            <span class="fs-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-calendar-month">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path
                                                        d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z" />
                                                    <path d="M16 3v4" />
                                                    <path d="M8 3v4" />
                                                    <path d="M4 11h16" />
                                                    <path d="M7 14h.013" />
                                                    <path d="M10.01 14h.005" />
                                                    <path d="M13.01 14h.005" />
                                                    <path d="M16.015 14h.005" />
                                                    <path d="M13.015 17h.005" />
                                                    <path d="M7.01 17h.005" />
                                                    <path d="M10.01 17h.005" />
                                                </svg>
                                                Date By Day
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" data-bs-toggle="tab" href="#date-by-month" role="tab"
                                            aria-selected="false" tabindex="-1">
                                            <span class="fs-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-calendar-month">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path
                                                        d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z" />
                                                    <path d="M16 3v4" />
                                                    <path d="M8 3v4" />
                                                    <path d="M4 11h16" />
                                                    <path d="M7 14h.013" />
                                                    <path d="M10.01 14h.005" />
                                                    <path d="M13.01 14h.005" />
                                                    <path d="M16.015 14h.005" />
                                                    <path d="M13.015 17h.005" />
                                                    <path d="M7.01 17h.005" />
                                                    <path d="M10.01 17h.005" />
                                                </svg>
                                                Date By Month
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 ">
                        <div class="d-flex align-items-center justify-content-end">
                            <div class="ms-auto mt-4 mt-md-0">
                                <ul class="nav nav-tabs" role="tablist">
                                    <div class="nav-item ms-auto">
                                        <form class="position-relative">
                                            <input type="text" class="form-control product-search ps-5 fs-2"
                                                id="input-search" placeholder="Cari Presentasi...">
                                            <i
                                                class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-3 text-dark ms-3"></i>
                                        </form>
                                    </div>
                                </ul>
                            </div>
                            <div class="ms-auto mt-4 mt-md-0">
                                <ul class="nav nav-tabs" role="tablist">
                                    <div class="nav-item ms-auto">
                                        <button class="btn btn-primary fs-2" data-bs-toggle="modal"
                                            data-bs-target="#submit-a-presentation">
                                            Ajukan Presentasi
                                        </button>
                                    </div>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Tab panes -->
                <div class="tab-content mt-3">
                    <div class="tab-pane active show" id="date-by-day" role="tabpanel">
                        <div class="table-responsive">
                            <table class="table align-middle mb-0 text-nowrap">
                                <thead>
                                    <tr>
                                        <th class="ps-0 text">No</th>
                                        <th class="text-center">Nama Project</th>
                                        <th class="text-center">Devisi</th>
                                        <th class="text-center">Jenis Project</th>
                                        <th class="text-center">Antrian</th>
                                        <th class="text-center">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="ps-0 text">
                                            <span>1.</span>
                                        </td>
                                        <td class="text-center">
                                            <h6 class="mb-0">Hummatask</h6>
                                        </td>
                                        <td class="text-center">
                                            <h6 class="mb-0">Web</h6>
                                        </td>
                                        <td class="text-center">
                                            <h6 class="mb-0">Big Project</h6>
                                        </td>
                                        <td class="text-center">
                                            <h6 class="mb-0">#001</h6>
                                        </td>
                                        <td class="text-center">
                                            <h6 class="mb-0">
                                                <a href="">
                                                    <button class="btn btn-primary">Detail</button>
                                                </a>
                                            </h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="ps-0 text">
                                            <span>1.</span>
                                        </td>
                                        <td class="text-center">
                                            <h6 class="mb-0">Hummatask</h6>
                                        </td>
                                        <td class="text-center">
                                            <h6 class="mb-0">Web</h6>
                                        </td>
                                        <td class="text-center">
                                            <h6 class="mb-0">Big Project</h6>
                                        </td>
                                        <td class="text-center">
                                            <h6 class="mb-0">#002</h6>
                                        </td>
                                        <td class="text-center">
                                            <h6 class="mb-0">
                                                <a href="">
                                                    <button class="btn btn-primary">Detail</button>
                                                </a>
                                            </h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="ps-0 text">
                                            <span>1.</span>
                                        </td>
                                        <td class="text-center">
                                            <h6 class="mb-0">Hummatask</h6>
                                        </td>
                                        <td class="text-center">
                                            <h6 class="mb-0">Web</h6>
                                        </td>
                                        <td class="text-center">
                                            <h6 class="mb-0">Big Project</h6>
                                        </td>
                                        <td class="text-center">
                                            <h6 class="mb-0">#003</h6>
                                        </td>
                                        <td class="text-center">
                                            <h6 class="mb-0">
                                                <a href="">
                                                    <button class="btn btn-primary">Detail</button>
                                                </a>
                                            </h6>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="date-by-month" role="tabpanel">
                        <div class="table-responsive">
                            <table class="table align-middle mb-0 text-nowrap">
                                <thead>
                                    <tr>
                                        <th class="ps-0 text">No</th>
                                        <th class="text-center">Nama Project</th>
                                        <th class="text-center">Devisi</th>
                                        <th class="text-center">Jenis Project</th>
                                        <th class="text-center">Antrian</th>
                                        <th class="text-center">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="ps-0 text">
                                            <span>1.</span>
                                        </td>
                                        <td class="text-center">
                                            <h6 class="mb-0">Echommer</h6>
                                        </td>
                                        <td class="text-center">
                                            <h6 class="mb-0">Web</h6>
                                        </td>
                                        <td class="text-center">
                                            <h6 class="mb-0">Big Project</h6>
                                        </td>
                                        <td class="text-center">
                                            <h6 class="mb-0">#001</h6>
                                        </td>
                                        <td class="text-center">
                                            <h6 class="mb-0">
                                                <a href="">
                                                    <button class="btn btn-primary">Detail</button>
                                                </a>
                                            </h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="ps-0 text">
                                            <span>1.</span>
                                        </td>
                                        <td class="text-center">
                                            <h6 class="mb-0">Echommer</h6>
                                        </td>
                                        <td class="text-center">
                                            <h6 class="mb-0">Web</h6>
                                        </td>
                                        <td class="text-center">
                                            <h6 class="mb-0">Big Project</h6>
                                        </td>
                                        <td class="text-center">
                                            <h6 class="mb-0">#002</h6>
                                        </td>
                                        <td class="text-center">
                                            <h6 class="mb-0">
                                                <a href="">
                                                    <button class="btn btn-primary">Detail</button>
                                                </a>
                                            </h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="ps-0 text">
                                            <span>1.</span>
                                        </td>
                                        <td class="text-center">
                                            <h6 class="mb-0">Echommer</h6>
                                        </td>
                                        <td class="text-center">
                                            <h6 class="mb-0">Web</h6>
                                        </td>
                                        <td class="text-center">
                                            <h6 class="mb-0">Big Project</h6>
                                        </td>
                                        <td class="text-center">
                                            <h6 class="mb-0">#003</h6>
                                        </td>
                                        <td class="text-center">
                                            <h6 class="mb-0">
                                                <a href="">
                                                    <button class="btn btn-primary">Detail</button>
                                                </a>
                                            </h6>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

{{--  modal  --}}
<div class="modal fade" id="submit-a-presentation" tabindex="-1" aria-labelledby="submit-a-presentationLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="#" method="POST">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-4" id="submit-a-presentationLabel">Ajukan Presentasi</h1>
                    <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="startDate">
                        <label class="mb-2 mt-1 fs-2" for="">Tanggal Presentasi</label>
                        <input class="form-control" name="#" type="date" value="{{ old('#') }}">
                        @error('#')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success btn-sm">Kirim</button>
                </div>
            </form>

        </div>
    </div>
</div>
