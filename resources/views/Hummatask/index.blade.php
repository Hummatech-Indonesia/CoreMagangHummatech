@extends('Hummatask.layouts.app')
@section('content')
    <div class="card w-100 bg-light-info overflow-hidden shadow-none">
        <div class="card-body position-relative">
            <div class="row">
                <div class="col-sm-8">
                    <div class="d-flex align-items-center mb-7">
                        <div class="rounded-circle overflow-hidden me-6">
                            <img src="{{ asset('assets-user/dist/images/profile/user-1.jpg') }}" alt="" width="40"
                                height="40">
                        </div>
                        <h5 class="fw-semibold mb-0 fs-5 mt-1">Rabu, 20 Maret 2024</h5>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="border-end pe-4 border-opacity-10">
                            <h3 class="mb-1 fw-semibold fs-8 d-flex align-content-center">Selamat datang, {{ auth()->user()->student->name }}</h3>
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
    <h5 class="fs-5  mb-4" style="font-weight: 600">
        Tugas terbaru
    </h5>
    <div class="row mt-2">
        <div class="col-12 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <p class="fs-3 text-dark" style="font-weight:500">
                        Lorem ipsum dolor sit amet consectetur. Et in et quis metus nunc tempus dignissim dui amet vulputate.
                    </p>
                    <div class="row">
                        <div class="col">
                            <div class="w-100 tb-section-2">
                                <span class="w-100 badge text-bg-warning fs-1">Front End</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="w-100 tb-section-2">
                                <span class="w-100 badge text-bg-danger fs-1">Mendesak</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="w-100 tb-section-2">
                                <span class="w-100 badge text-bg-primary fs-1">Di Revisi Mentor</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <p class="text-danger mb-0 ">
                        Sudah melewati batas deadline
                    </p>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <p class="fs-3 text-dark" style="font-weight:500">
                        Lorem ipsum dolor sit amet consectetur. Et in et quis metus nunc tempus dignissim dui amet vulputate.
                    </p>
                    <div class="row">
                        <div class="col">
                            <div class="w-100 tb-section-2">
                                <span class="w-100 badge text-bg-warning fs-1">Front End</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="w-100 tb-section-2">
                                <span class="w-100 badge text-bg-danger fs-1">Mendesak</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="w-100 tb-section-2">
                                <span class="w-100 badge text-bg-primary fs-1">Di Revisi Mentor</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <p class="text-primary mb-0 ">
                        3 Hari Lagi
                    </p>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <p class="fs-3 text-dark" style="font-weight:500">
                        Lorem ipsum dolor sit amet consectetur. Et in et quis metus nunc tempus dignissim dui amet vulputate.
                    </p>
                    <div class="row">
                        <div class="col">
                            <div class="w-100 tb-section-2">
                                <span class="w-100 badge text-bg-warning fs-1">Front End</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="w-100 tb-section-2">
                                <span class="w-100 badge text-bg-danger fs-1">Mendesak</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="w-100 tb-section-2">
                                <span class="w-100 badge text-bg-primary fs-1">Di Revisi Mentor</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <p class="text-primary mb-0 ">
                        3 Hari Lagi
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
