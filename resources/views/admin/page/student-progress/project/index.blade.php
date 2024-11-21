@extends('admin.layouts.app')
@section('content')
<div class="row">
    {{-- @forelse ($categoryProjects as $categoryProject) --}}
        <div class="col-lg-5">
            <div class="card card-height-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3">
                        <div class="d-flex">
                            {{-- tipe project --}}
                            <h6 class="bg-primary text-light p-2 rounded">
                                Solo Project</h6>
                        </div>
                        <div>
                            {{-- Nomor antrian dan tombol delete --}}
                            <div class="d-flex flex-shrink-0 align-items-center justify-content-center">
                                <!-- Nomor Antrian -->
                                <h6 class="bg-dark text-light p-2 m-1 rounded">01</h6>
                        
                                <!-- Tombol Delete -->
                                <button class="bg-primary text-white border-0 p-2 m-1 rounded d-flex align-items-center justify-content-center" data-id="">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" fill="currentColor">
                                        <path fill="none" d="M0 0h24v24H0z"></path>
                                        <path d="M17 6H22V8H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V8H2V6H7V3C7 2.44772 7.44772 2 8 2H16C16.5523 2 17 2.44772 17 3V6ZM18 8H6V20H18V8ZM9 11H11V17H9V11ZM13 11H15V17H13V11ZM9 4V6H15V4H9Z"></path>
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
                    <div class="d-flex justify-content-between mt-4 mb-2">
                        <h6 class="">Project yang mengerjakan web rental mobil</h6>
                    </div>

                    {{-- body  --}}
                    <div class="d-flex justify-content-between">
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
                    
                    <div class="d-flex justify-content-between pl-0 mt-1 mb-2">
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
                    <button class="btn btn-primary btn-detail text-light w-100 rounded">Lihat Detail</button>
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