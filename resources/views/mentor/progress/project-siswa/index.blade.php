@extends('mentor.layouts.app')
@section('content')
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Project Siswa</h4>
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

    <div class="card py-3">
        <div class="d-flex justify-content-end">
            <div class="col-md-12 ">
                <form class="row g-3 align-items-center justify-content-end me-3"
                    action="{{ route('mentor.project-siswa') }}">

                    <div class="col-md-3 position-relative">
                        <input type="text"
                            class="form-control product-search ps-5 p-3 text-primary border-0 bg-light-primary"
                            name="search" value="{{ request('search') }}" id="input-search"
                            placeholder="Cari nama siswa...">
                        <i
                            class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-primary ms-4"></i>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        @forelse ($students as $student)
            <div class="col-md-4">
                <div class="card hover-img">
                    <div class="card-body p-4 text-center border-bottom">
                        @if (file_exists(public_path('storage/' . $student->avatar)))
                            <img class="avatar-lg rounded" style="object-fit: cover"
                                src="{{ asset('storage/' . $student->avatar) }}">
                        @else
                            <img class="avatar-lg rounded" style="object-fit: cover" src="{{ asset('user.webp') }}"
                                width="80">
                        @endif
                        <h5 class="fw-semibold mb-0 fs-5">{{ $student->name }}</h5>
                        <span class="text-dark fs-2">{{ $student->school }}</span>
                        <div class="row mt-3">
                            <div class="col-12">
                                <a href="{{ route('mentor.project-siswa.group', $student->id) }}"
                                    class="btn btn-primary w-100">Lihat
                                    Project</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        @empty
            <div class="d-flex justify-content-center align-items-center" style="min-height: 300px; width: 100%;">
                <div class="text-center">
                    <img src="{{ asset('assets-user/dist/images/products/empty-shopping-bag.gif') }}" alt="No Data"
                        height="120px" />
                    <h3 class="mt-3">Data Masih Kosong</h3>
                </div>
            </div>
        @endforelse
    </div>
    {{ $students->links() }}
@endsection
