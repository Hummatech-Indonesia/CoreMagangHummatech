@extends('mentor.layouts.app')
@section('content')
    <div class="container-fluid note-has-grid">
        <ul class="nav nav-pills p-3 mb-3 rounded align-items-center card flex-row">
            <li class="nav-item">
                <a data-bs-toggle="tab" href="#project-submissions" role="tab"
                    class="nav-link note-link d-flex align-items-center justify-content-center active px-3 px-md-3 me-0 me-md-2 text-body-color"
                    id="all-category">
                    <i class="ti ti-presentation fill-white me-0 me-md-1 fs-7"></i>
                    <span class="d-none d-md-block font-weight-medium">Pengajuan Project</span>
                </a>
            </li>
            <li class="nav-item">
                <a data-bs-toggle="tab" href="#history-submissions" role="tab"
                    class="nav-link note-link d-flex align-items-center justify-content-center px-3 px-md-3 me-0 me-md-2 text-body-color"
                    id="note-business">
                    <i class="ti ti-history fill-white me-0 me-md-1 fs-7"></i>
                    <span class="d-none d-md-block font-weight-medium">Riwayat Pengajuan Project</span>
                </a>
            </li>
        </ul>

        <div class="tab-content">
            <!-- Tab 1 -->
            <div class="tab-pane active" id="project-submissions" role="tabpanel">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-3 g-4">
                    <div class="col">
                        <div class="card shadow-sm border-0">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <span class="badge bg-light-primary text-primary px-3 py-2 rounded-2 fw-bolder">
                                        Solo Project
                                    </span>
                                    <div class="d-flex gap-1">
                                        <a href="/mentor/project-submissions/detail" class="btn btn-primary text-white p-1">
                                            <i class="ti ti-eye fs-7"></i>
                                        </a>
                                        <button class="btn text-white p-1" style="background-color: #f73164">
                                            <i class="ti ti-trash fs-7"></i>
                                        </button>
                                    </div>
                                </div>
                                <h5 class="fw-semibold">Web Jawa Hitam</h5>
                                <p class="text-muted mb-1">By Kelompok Jawir</p>
                                <div class="mb-4">
                                    <img src="{{ asset('assets-user/dist/images/profile/user-1.jpg') }}" alt="Avatar"
                                        class="rounded-circle shadow-sm img-fluid" width="33" height="33">
                                </div>
                                <p class="card-text">Pembuatan website menggunakan Laravel</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="fw-bold text-black mb-0">Kondisi Project:</p>
                                    <span class="badge bg-light-warning text-warning px-3 py-1 rounded-2">Menunggu</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mt-1">
                                    <p class="text-black mb-0">Deadline:</p>
                                    <small class="text-success fw-semibold">20/11/2024 - 25/11/2024</small>
                                </div>
                                <div class="d-flex justify-content-between mt-4">
                                    <button class="btn btn-light-danger text-danger w-50 me-2">Tolak</button>
                                    <button class="btn btn-light-success text-success w-50 ms-2">Terima</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card shadow-sm border-0">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <span class="badge bg-light-primary text-primary px-3 py-2 rounded-2 fw-bolder">
                                        Solo Project
                                    </span>
                                    <div class="d-flex gap-1">
                                        <button class="btn btn-primary text-white p-1">
                                            <i class="ti ti-eye fs-7"></i>
                                        </button>
                                        <button class="btn text-white p-1" style="background-color: #f73164">
                                            <i class="ti ti-trash fs-7"></i>
                                        </button>
                                    </div>
                                </div>
                                <h5 class="fw-semibold">Web Jawa Hitam</h5>
                                <p class="text-muted mb-1">By Kelompok Jawir</p>
                                <div class="mb-3    ">
                                    <div class="d-flex justify-content-start">
                                        <ul class="hstack mb-2">
                                            <li>
                                                <a href="javascript:void(0)" class="me-1" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" aria-label="gito" data-bs-original-title="gito">
                                                    <img src="{{ asset('assets-user/dist/images/profile/user-2.jpg') }}"
                                                        class="rounded-circle border border-2 border-white" width="33"
                                                        height="33" alt="">
                                                </a>
                                            </li>
                                            <li class="ms-n8">
                                                <a href="javascript:void(0)" class="me-1" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" aria-label="sugiren"
                                                    data-bs-original-title="sugiren">
                                                    <img src="{{ asset('assets-user/dist/images/profile/user-3.jpg') }}"
                                                        class="rounded-circle border border-2 border-white" width="33"
                                                        height="33" alt="">
                                                </a>
                                            </li>
                                            <li class="ms-n8">
                                                <a href="javascript:void(0)" class="me-1" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" aria-label="mustafa"
                                                    data-bs-original-title="mustafa">
                                                    <img src="{{ asset('assets-user/dist/images/profile/user-4.jpg') }}"
                                                        class="rounded-circle border border-2 border-white" width="33"
                                                        height="33" alt="">
                                                </a>
                                            </li>
                                            <li class="ms-n8">
                                                <a href="javascript:void(0)" class="me-1" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" aria-label="Mark Smith"
                                                    data-bs-original-title="Mark Smith">
                                                    <img src="{{ asset('assets-user/dist/images/profile/user-5.jpg') }}"
                                                        class="rounded-circle border border-2 border-white" width="33"
                                                        height="33" alt="">
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <p class="card-text">Pembuatan website menggunakan Laravel</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="fw-bold text-black mb-0">Kondisi Project:</p>
                                    <span class="badge bg-light-warning text-warning px-3 py-1 rounded-2">Menunggu</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mt-1">
                                    <p class="text-black mb-0">Deadline:</p>
                                    <small class="text-success fw-semibold">20/11/2024 - 25/11/2024</small>
                                </div>
                                <div class="d-flex justify-content-between mt-4">
                                    <button class="btn btn-light-danger text-danger w-50 me-2">Tolak</button>
                                    <button class="btn btn-light-success text-success w-50 ms-2">Terima</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Tab 2 -->
            <div class="tab-pane" id="history-submissions" role="tabpanel">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-3 g-4">
                    <div class="col">
                        <div class="card shadow-sm border-0">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <span class="badge bg-light-primary text-primary px-3 py-2 rounded-2 fw-bolder">
                                        Solo Project
                                    </span>
                                    <div class="d-flex gap-1">
                                        <button class="btn btn-primary text-white p-1">
                                            <i class="ti ti-eye fs-7"></i>
                                        </button>
                                        <button class="btn text-white p-1" style="background-color: #f73164">
                                            <i class="ti ti-trash fs-7"></i>
                                        </button>
                                    </div>
                                </div>
                                <h5 class="fw-semibold">Web Jawa Hitam</h5>
                                <p class="text-muted mb-1">By Kelompok Jawir</p>
                                <div class="mb-3">
                                    <div class="d-flex justify-content-start">
                                        <ul class="hstack mb-2">
                                            <li>
                                                <a href="javascript:void(0)" class="me-1" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" aria-label="gito" data-bs-original-title="gito">
                                                    <img src="{{ asset('assets-user/dist/images/profile/user-2.jpg') }}"
                                                        class="rounded-circle border border-2 border-white" width="33"
                                                        height="33" alt="">
                                                </a>
                                            </li>
                                            <li class="ms-n8">
                                                <a href="javascript:void(0)" class="me-1" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" aria-label="sugiren"
                                                    data-bs-original-title="sugiren">
                                                    <img src="{{ asset('assets-user/dist/images/profile/user-3.jpg') }}"
                                                        class="rounded-circle border border-2 border-white" width="33"
                                                        height="33" alt="">
                                                </a>
                                            </li>
                                            <li class="ms-n8">
                                                <a href="javascript:void(0)" class="me-1" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" aria-label="mustafa"
                                                    data-bs-original-title="mustafa">
                                                    <img src="{{ asset('assets-user/dist/images/profile/user-4.jpg') }}"
                                                        class="rounded-circle border border-2 border-white" width="33"
                                                        height="33" alt="">
                                                </a>
                                            </li>
                                            <li class="ms-n8">
                                                <a href="javascript:void(0)" class="me-1" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" aria-label="Mark Smith"
                                                    data-bs-original-title="Mark Smith">
                                                    <img src="{{ asset('assets-user/dist/images/profile/user-5.jpg') }}"
                                                        class="rounded-circle border border-2 border-white" width="33"
                                                        height="33" alt="">
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <p class="card-text">Pembuatan website menggunakan Laravel</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="fw-bold text-black mb-0">Kondisi Project:</p>
                                    <span class="badge bg-light-danger text-danger px-4 py-1 rounded-1">Ditolak</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mt-1">
                                    <p class="text-black mb-0">Deadline:</p>
                                    <small class="text-success fw-semibold">20/11/2024 - 25/11/2024</small>
                                </div>
                                <div class="d-flex justify-content-between mt-4">
                                    <button class="btn btn-light-danger text-danger w-50 me-2">Tolak</button>
                                    <button class="btn btn-light-success text-success w-50 ms-2">Terima</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
