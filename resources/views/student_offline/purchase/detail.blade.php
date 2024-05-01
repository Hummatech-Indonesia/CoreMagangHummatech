@extends('student_offline.layouts.app')
@section('style')
<style>
    /* Penyesuaian untuk layar desktop */
    @media (min-width: 992px) {
        .btn-desktop {
            padding: 4px 8px; /* Padding lebih kecil untuk desktop */
            font-size: 12px; /* Ukuran font lebih kecil untuk desktop */
        }
    }
</style>
@endsection
@section('content')
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Detail Pembelian</h4>
                    <nav aria-label="breadcrumb mt-2">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-muted " href="/siswa-offline">Pembelian</a></li>
                            <li class="breadcrumb-item" aria-current="page">Detail Pembelian</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-3">
                    <div class="text-center mb-n5">
                        <img src="{{ asset('assets-user/dist/images/backgrounds/track-bg.png') }}" alt="" class="img-fluid mb-n4">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="shop-detail">
        <div class="card shadow-none border">
            <div class="card-body">
                @forelse ($courses as $course)

                <div class="row">
                    <div class="col-lg-4">
                        <img src="{{ asset('storage/' .$course->image) }}" alt="" class="img-fluid rounded-2 mb-3 h-100" >
                    </div>
                    <div class="col-lg-8">
                        <div class="shop-content">
                            <h4 class="fw-semibold mb-3">{{$course->title}}</h4>
                            <p class="mb-3">
                                {{$course->description}}
                            </p>
                            <span>
                                <i class="ti ti-book text-primary"></i>
                                {{ $course->subCourse()->count() }} &nbsp; Sub Materi
                            </span>

                            <div class="d-flex align-items-center gap-7 border-top py-2 mt-2 border-bottom">
                                <h6 class="mb-0 fs-4 fw-semibold">Kategori : </h6>
                                <span class="mb-1 badge font-medium bg-light-warning text-warning">{{$course->division->name}}</span>
                            </div>
                            <div class="d-flex align-items-center gap-3 pt-5 mb-7">
                                <h4 class="text-primary">{{ 'Rp ' . number_format($course->price, 0, ',', '.') }}</h4>
                                <a href="javascript:void(0)" class="btn d-block btn-primary px-4 mx-4 py-2 mb-2 mb-sm-0 w-80">Beli Sekarang</a>
                            </div>
                        </div>
                    </div>
                </div>

                @empty

                @endforelse
            </div>
        </div>
    </div>

    <div class="tab-pane active" id="task" role="tabpanel">
        <div class="all-category note-important">
            <div class="d-flex align-items-center mb-3 pt-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-info-square text-primary">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M19 2a3 3 0 0 1 2.995 2.824l.005 .176v14a3 3 0 0 1 -2.824 2.995l-.176 .005h-14a3 3 0 0 1 -2.995 -2.824l-.005 -.176v-14a3 3 0 0 1 2.824 -2.995l.176 -.005h14zm-7 9h-1l-.117 .007a1 1 0 0 0 0 1.986l.117 .007v3l.007 .117a1 1 0 0 0 .876 .876l.117 .007h1l.117 -.007a1 1 0 0 0 .876 -.876l.007 -.117l-.007 -.117a1 1 0 0 0 -.764 -.857l-.112 -.02l-.117 -.006v-3l-.007 -.117a1 1 0 0 0 -.876 -.876l-.117 -.007zm.01 -3l-.127 .007a1 1 0 0 0 0 1.986l.117 .007l.127 -.007a1 1 0 0 0 0 -1.986l-.117 -.007z" />
                </svg>
                <h5 class="mb-0 ms-2">Sub Materi Yang Ada Didalamnya</h5>
            </div>
            <div class="d-flex flex-wrap">
                @foreach ($course->subCourse as $subCourse)
                <div class="col-lg-12">
                    <div class="card border-start border-info">
                        <div class="card-body px-4 py-3">
                            <div class="d-flex no-block align-items-center">
                                <div class="">
                                    <span class="d-flex display-6">
                                        <img src="{{ asset('storage/' .$subCourse->image_course) }}" style="width: 6.7pc; height: 6.7pc; object-fit: cover;">
                                        <div class="px-3 pe-5">
                                            {{-- <div class="d-flex gap-2">
                                                <i class="text-primary ti ti-list-details fs-6"></i>
                                                <p class="text-muted" style="font-size: 15px">{{ $subCourse->tasks_count }} Tugas</p>
                                            </div> --}}
                                            <h5>
                                                {{ $subCourse->title }}
                                            </h5>
                                            <h6 class="text-muted">
                                                {{ $subCourse->description }}
                                            </h6>
                                        </div>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
