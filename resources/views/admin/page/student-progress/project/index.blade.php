@extends('admin.layouts.app')
@section('content')
<div class="row">
    {{-- @forelse ($categoryProjects as $categoryProject) --}}
        <div class="col-lg-5">
            <div class="card card-height-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3">
                        <div>
                            {{-- tipe project --}}
                            <h6 class="bg-primary text-light p-2 rounded">
                                Solo Project</h6>
                        </div>
                        <div>
                            {{-- nomor antrian dan button delete --}}
                            <div class="d-flex flex-shrink-0 align-items-center justify-content-center">
                                <h6 class="bg-dark text-light p-2 m-1 rounded">01</h6>

                                <button class="bg-primary border-0 btn-delete p-1 m-1 rounded" data-id="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                        viewBox="0 0 20 20" fill="none">
                                        <path d="M15 4H20V6H18V19C18 19.5523 17.5523 20 17 20H3C2.44772 20 2 19.5523 2 19V6H0V4H5V1C5 0.44772 5.44772 0 6 0H14C14.5523 0 15 0.44772 15 1V4ZM7 9V15H9V9H7ZM11 9V15H13V9H11ZM7 2V4H13V2H7Z"
                                            fill="#FFFFFF" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    {{-- judul project dan status  --}}
                    <div class="d-flex justify-content-between">
                        <h4> Web Rental Mobil</h4>
                        <div class="gap-2">
                            <span class="badge bg-danger p-2"> Telat 1 Hari</span>
                            {{-- @if ()
                                <span class="badge bg-success"></span>
                            @else
                                <span class="badge bg-danger"></span>
                            @endif --}}
                        </div>
                    </div>

                    {{-- untuk kelompok yang mengerjakan --}}
                    <div class="d-flex justify-content-between">
                        <span class="text-muted">By Kelompok Jawir</span>
                    </div>

                    {{-- untuk avatar --}}
                    <div class="avatar-sm flex-shrink-0">
                        <span class="avatar-title bg-success-subtle rounded-circle fs-2 mt-2">
                            <img src="{{ asset('berkas/logo.png') }}" alt="" srcset=""
                                class="avatar-title bg-success-subtle rounded-circle fs-2">
                        </span>
                    </div>

                    {{-- deskripsi proyek --}}
                    <div class="d-flex justify-content-between mx-3 my-2">
                        <h6 class="">Project yang mengerjakan web rental mobil</h6>
                    </div>

                    {{-- body  --}}
                    <div class="d-flex justify-content-between mx-3">
                        <h6> Kondisi Proyek</h6>
                        <div class="gap-2">
                            <span class="badge bg-success p-2"> Aktif</span>
                            {{-- @if ()
                                <span class="badge bg-success">Aktif</span>
                            @else
                                <span class="badge bg-danger">Pasif</span>
                            @endif --}}
                        </div>
                    </div> 
                    
                    <div class="d-flex justify-content-between mx-3 pl-0 mt-1 mb-2">
                        <h6> Deadline</h6>
                        <div class="gap-2">
                            <span class="text-success"> Senin, 25 November 2024</span>
                            {{-- @if ()
                                <span class="text-success"></span>
                            @else
                                <span class="text-danger"></span>
                            @endif --}}
                        </div>
                    </div> 
                    <button class="btn btn-primary btn-detail text-light w-100">Lihat Detail</button>
                </div>
            </div>
        </div>

        {{-- {{ $categoryProjects->links() }} --}}

    {{-- @empty
        <div class="d-flex justify-content-center mt-3">
            <img src="{{ asset('no data.png') }}" width="200px" alt="">
        </div>
        <h4 class="text-center mt-2 mb-4">
            Data Masih kosong
        </h4>
    @endforelse --}}
</div>

@endsection