@extends('student_offline.layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-8 d-flex align-items-stretch">
            <div class="card w-100 bg-light-info overflow-hidden shadow-none">
                <div class="card-body position-relative">
                    <div class="row">
                        <div class="col-sm-7">
                            <div class="d-flex align-items-center mb-7">
                                <div class="rounded-circle overflow-hidden me-6">
                                    <img src="{{ asset('assets-user/dist/images/profile/user-1.jpg') }}" alt=""
                                        width="40" height="40">
                                </div>
                                <h5 class="fw-semibold mb-0 fs-5">Selamat Datang &nbsp;&nbsp; {{ auth()->user()->name }}!</h5>
                                <button class="btn btn-primary mx-3">Isi Saldo</button>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="border-end pe-4 border-muted border-opacity-10">
                                    {{-- <h3 class="mb-1 fw-semibold fs-8 d-flex align-content-center">Divisi {{ auth()->user()->student->division->name }}</h3> --}}
                                    <h3 class="mb-1 fw-semibold fs-8 d-flex align-content-center mb-3">Rp.1200.500.00
                                        <span></span>
                                    </h3>
                                    <h6>Saldo anda saat ini</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="welcome-bg-img mb-n7 text-end">
                                <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/backgrounds/welcome-bg.svg"
                                    alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h5 class="card-title fw-semibold">Data Absensi</h5>
                            <p class="card-subtitle mb-2">Tahun ini</p>
                        </div>
                        <div>
                            <button class="btn btn-success">Absen</button>
                        </div>
                    </div>
                    <div id="sales-overview" class="mb-4"></div>
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <div
                                class="bg-light-primary rounded-2 me-8 p-8 d-flex align-items-center justify-content-center">
                                <i class="ti ti-grid-dots text-primary fs-6"></i>
                            </div>
                            <div>
                                <h6 class="fw-semibold text-dark fs-4 mb-0">$23,450</h6>
                                <p class="fs-3 mb-0 fw-normal">Profit</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div
                                class="bg-light-secondary rounded-2 me-8 p-8 d-flex align-items-center justify-content-center">
                                <i class="ti ti-grid-dots text-secondary fs-6"></i>
                            </div>
                            <div>
                                <h6 class="fw-semibold text-dark fs-4 mb-0">$23,450</h6>
                                <p class="fs-3 mb-0 fw-normal">Expance</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script src="{{ asset('assets-user/dist/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets-user/dist/js/dashboard2.js') }}"></script>

@endsection
