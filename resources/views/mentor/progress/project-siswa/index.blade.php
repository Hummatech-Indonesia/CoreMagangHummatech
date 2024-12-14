@extends('mentor.layouts.app')
@section('style')
<style>

@media (max-width: 767px) {
  #offcanvasRight { width: 100%; }
}

@media (min-width: 768px) and (max-width: 991px) {
  #offcanvasRight { width: 50%; }
}

@media (min-width: 992px) {
  #offcanvasRight { width: 25%; }
}
</style>
@endsection
@section('content')

<div class="row mb-3">
    <div class="col-md-4 col-xl-2">
        <form class="position-relative" action="/student">
            <input type="text" class="form-control product-search ps-5" name="name" value="{{ request()->name }}" id="input-search" placeholder="Cari siswa...">
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
                <img src="{{ asset('assets/images/users/avatar-10.jpg') }}" alt="avatar" class="rounded-circle mb-3" width="80px" height="80px" >
                <h5 class="fw-semibold mb-0 fs-5">Akbar</h5>
                <span class="text-dark fs-2">Muhi</span>
                <div class="row">
                    <div class="col-12">
                        <a href="/mentor/progress-project-siswa/project-group" class="btn btn-primary w-100">Lihat Project</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    {{--  @empty
    <div class="d-flex justify-content-center mb-2 mt-5">
        <img src="{{ asset('no data.png') }}" alt="" width="300px" srcset="">
    </div>
        <p class="fs-5 text-dark text-center">
            Belum Ada Siswa
        </p>
    @endforelse  --}}
</div>

@endsection

