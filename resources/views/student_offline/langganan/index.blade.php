@extends('student_offline.layouts.app')
@section('content')
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Langganan Untuk Membuka Kunci</h4>
                    <nav aria-label="breadcrumb mt-2">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-muted " href="/siswa-offline">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">Jurnal</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-3">
                    <div class="text-center mb-n5">
                        <img src="{{ asset('assets-user/dist/images/breadcrumb/ChatBc.png') }}" alt=""
                            class="img-fluid mb-n4">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-12 text-center">
            <h2 class="fw-bolder mb-3 fs-8 lh-base">Langganan untuk membuka semua fitur</h2>
        </div>
    </div>
    <div class="row d-flex justify-content-center">
        <div class="col-sm-6 col-lg-4 ">
            <div class="card">
                <div class="card-body pt-6">
                    <div class="text-end">
                        <span
                            class="badge fw-bolder py-1 bg-light-warning text-warning text-uppercase fs-2 rounded-3">POPULAR</span>
                    </div>
                    <span class="fw-bolder text-uppercase fs-2 d-block mb-7">bronze</span>
                    <div class="my-4">
                        <img src="{{ asset('assets-user/dist/images/backgrounds/bronze.png') }}" alt=""
                            class="img-fluid" width="80" height="80">
                    </div>
                    <div class="d-flex mb-3">
                        <h5 class="fw-bolder fs-6 mb-0">$</h5>
                        <h2 class="fw-bolder fs-12 ms-2 mb-0">4.99</h2>
                        <span class="ms-2 fs-4 d-flex align-items-center">/mo</span>
                    </div>
                    <ul class="list-unstyled mb-7">
                        <li class="d-flex align-items-center gap-2 py-2">
                            <i class="ti ti-check text-primary fs-4"></i>
                            <span class="text-dark">5 Members</span>
                        </li>
                        <li class="d-flex align-items-center gap-2 py-2">
                            <i class="ti ti-check text-primary fs-4"></i>
                            <span class="text-dark">Single Devise</span>
                        </li>
                        <li class="d-flex align-items-center gap-2 py-2">
                            <i class="ti ti-check text-primary fs-4"></i>
                            <span class="text-dark">80GB Storage</span>
                        </li>
                        <li class="d-flex align-items-center gap-2 py-2">
                            <i class="ti ti-x text-muted fs-4"></i>
                            <span class="text-muted">Monthly Backups</span>
                        </li>
                        <li class="d-flex align-items-center gap-2 py-2">
                            <i class="ti ti-x text-muted fs-4"></i>
                            <span class="text-muted">Permissions & workflows</span>
                        </li>
                    </ul>
                    <button class="btn btn-primary fw-bolder rounded-2 py-6 w-100 text-capitalize">choose bronze</button>
                </div>
            </div>
        </div>
    </div>
@endsection
