@extends('mentor.layouts.app')
@section('content')

<div class="row mb-3">
    <div class="col-md-4 col-xl-2">
        <form class="position-relative">
            <input type="text" class="form-control product-search ps-5" id="input-search" placeholder="Cari siswa...">
            <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
        </form>
    </div>
    <div class="col-md-8 col-xl-9 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
        <div class="action-btn show-btn" style="display: none">
            <a href="javascript:void(0)" class="delete-multiple btn-light-danger btn me-2 text-danger d-flex align-items-center font-medium">
                <i class="ti ti-trash text-danger me-1 fs-5"></i>
                Delete All Row

            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="card hover-img">
            <div class="card-body p-4 text-center border-bottom">
                <img src="{{ asset('assets-user/dist/images/profile/user-1.jpg') }}" class="rounded-circle mb-3" width="80" height="80" alt="">
                <h5 class="fw-semibold mb-0 fs-5">Victoria</h5>
                <span class="text-dark fs-2">SMK Negeri 8 Jember</span>
            </div>
            <ul class="px-2 py-2 list-unstyled d-flex align-items-center justify-content-center mb-0">
                <li class="position-relative">
                    <a href="javascript:void(0)" class="text-primary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user-circle">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                        <path d="M12 10m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                        <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855" />
                        </svg>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card hover-img">
            <div class="card-body p-4 text-center border-bottom">
                <img src="{{ asset('assets-user/dist/images/profile/user-4.jpg') }}" class="rounded-circle mb-3" width="80" height="80" alt="">
                <h5 class="fw-semibold mb-0 fs-5">Victoria</h5>
                <span class="text-dark fs-2">SMK Negeri 8 Jember</span>
            </div>
            <ul class="px-2 py-2 list-unstyled d-flex align-items-center justify-content-center mb-0">
                <li class="position-relative">
                    <a href="javascript:void(0)" class="text-primary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user-circle">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                        <path d="M12 10m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                        <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855" />
                        </svg>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card hover-img">
            <div class="card-body p-4 text-center border-bottom">
                <img src="{{ asset('assets-user/dist/images/profile/user-2.jpg') }}" class="rounded-circle mb-3" width="80" height="80" alt="">
                <h5 class="fw-semibold mb-0 fs-5">Victoria</h5>
                <span class="text-dark fs-2">SMK Negeri 8 Jember</span>
            </div>
            <ul class="px-2 py-2 list-unstyled d-flex align-items-center justify-content-center mb-0">
                <li class="position-relative">
                    <a href="javascript:void(0)" class="text-primary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user-circle">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                        <path d="M12 10m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                        <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855" />
                        </svg>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card hover-img">
            <div class="card-body p-4 text-center border-bottom">
                <img src="{{ asset('assets-user/dist/images/profile/user-3.jpg') }}" class="rounded-circle mb-3" width="80" height="80" alt="">
                <h5 class="fw-semibold mb-0 fs-5">Victoria</h5>
                <span class="text-dark fs-2">SMK Negeri 8 Jember</span>
            </div>
            <ul class="px-2 py-2 list-unstyled d-flex align-items-center justify-content-center mb-0">
                <li class="position-relative">
                    <a href="javascript:void(0)" class="text-primary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user-circle">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                        <path d="M12 10m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                        <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855" />
                        </svg>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

@endsection
