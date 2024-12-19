@extends('admin.layouts.app')
@section('content')
<div class="row">
    <div class="col-md-3">
        <div class="card hover-img">
            <div class="card-body p-4 text-center border-bottom">
                <img class="avatar-lg rounded" style="object-fit: cover" src="{{ asset('user.webp') }}" width="80">
                <h5 class="fw-semibold mb-0 fs-5">Haikal Sontoso</h5>
                <p class="text-dark">SMKN 1 Kepanjen</p>
                <div class="row mt-3">
                    <div class="col-12">
                        <a href="{{ route('administrator.student-progress.student.project') }}" class="btn btn-primary w-100">Lihat
                            Project</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="col-md-3">
        <div class="card hover-img">
            <div class="card-body p-4 text-center border-bottom">
                <img class="avatar-lg rounded" style="object-fit: cover" src="{{ asset('user.webp') }}" width="80">
                <h5 class="fw-semibold mb-0 fs-5">Haikal Sontoso</h5>
                <p class="text-dark">SMKN 1 Kepanjen</p>
                <div class="row mt-3">
                    <div class="col-12">
                        <a href="{{ route('administrator.student-progress.student.project') }}" class="btn btn-primary w-100">Lihat
                            Project</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
