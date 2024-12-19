@extends('admin.layouts.app')

@section('content')
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
        <div class="col">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge bg-primary-subtle text-primary  px-3 py-2 rounded-2 fw-bolder">
                            mini project
                        </span>

                        <div class="btn btn-primary position-relative p-0 avatar-xs rounded">
                            <span class="avatar-title bg-transparent">
                                1
                            </span>
                        </div>
                    </div>
                    <h5 class="fw-semibold">Web Jawa Hitam</h5>
                    <p class="text-muted mb-1">By Kelompok Haikal Santoso</p>
                    <div class="mb-4">
                        <div class="col-sm-auto">
                            <div class="avatar-group">

                                <div class="avatar-group-item material-shadow">
                                    <a href="javascript: void(0);" class="d-inline-block" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="" data-bs-original-title="Haikal Santoso">

                                        <img class="rounded-circle avatar-xxs" src="{{ asset('user.webp') }}"
                                            alt="Haikal Santoso">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-2">
                        <p class="fw-bold text-black mb-0">Kondisi Project:</p>
                        <span class="badge bg-warning-subtle fw-light text-warning px-3 py-2">
                            Menunggu Konfirmasi
                        </span>


                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-2">
                        <p class="text-black mb-0">Deadline:</p>
                        <small class="text-warning">
                            Senin. 26 Juni 2024
                        </small>
                    </div>
                    <div class="d-flex justify-content-center mt-3">
                        <a href=""
                            class="btn btn-primary w-100">Detail Progress</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
