@extends('admin.layouts.app')
@section('style')
    <style>
        .type-project {
            background-color: rgba(212, 208, 255, 1);
            color: rgba(105, 94, 239, 1);
            border-radius: 3px;
            text-align: center;
            font-weight: bolder;
            padding-inline: 6px;
            padding-block: 12px;
        }
        .antrian-wrapper {
            display: flex; 
            align-items: center; 
            gap: 8px;
        }

        .antrian {
            background-color: rgb(124, 120, 120);
            color: white;
            padding: 10px;
            margin:0px;
            border-radius: 3px;
            text-align: center; 
            min-width: 40px; 
            font-size: 16px;
            font-weight: bold;
            height: 40px;
        }

        .btn-delete {
            background-color: rgba(247, 49, 100, 1);
            border: none; 
            border-radius: 3px;
            padding: 10px;
            height: 40px;;
            color: white;
            display: flex; 
            align-items: center; 
            justify-content: center;
            cursor: pointer; 
            box-shadow: none;
        }

        .btn-delete svg {
            display: block;
        }
        
        .status {
            background-color: rgba(251, 242, 239, 1);
            padding: 8px;
            border-radius: 3px;
            color: rgba(247, 49, 100, 1);
            height: 27px;
            min-width: 40px;
            width: 72px;
        }
    </style>
@endsection
@section('content')
<div class="row">
    {{-- @forelse ($categoryProjects as $categoryProject) --}}
        <div class="col-12 col-sm-6 col-md-4">
            <div class="card card-height-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3">
                        <div class="d-flex">
                            {{-- tipe project --}}
                            <h6 class="type-project">Solo Project</h6>
                        </div>
                        <div>
                            {{-- Nomor antrian dan tombol delete --}}
                            <div class="antrian-wrapper">
                                <!-- Nomor Antrian -->
                                <h6 class="antrian">01</h6>
                            
                                <!-- Tombol Delete -->
                                <button class="btn btn-delete" data-id="">
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
                        <h4 class="fw-bolder mb-0"> Web Rental Mobil</h4>
                        <div class="gap-2">
                            <span class="badge status"> Telat 1 Hari</span>
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
                        <span class="avatar-title bg-success-subtle rounded-circle fs-2 mt-2" style="height:35px; width:38px; padding:2px">
                            <img src="{{ asset('berkas/logo.png') }}" alt="" srcset=""
                                class="avatar-title bg-success-subtle rounded-circle fs-2">
                        </span>
                    </div>

                    {{-- deskripsi proyek --}}
                    <div class="d-flex justify-content-between mt-4 mb-2">
                        <h5 class="fs-bolder">Project yang mengerjakan web rental mobil</h5>
                    </div>

                    {{-- body  --}}
                    <div class="d-flex justify-content-between">
                        <h6> Kondisi Proyek</h6>
                        <div class="gap-2">
                            <span class="badge text-success p-8 pt-2" style="background-color: rgba(230, 255, 250, 1);  border-radius:7px; font-size:small; height:27px; width:68px;">Active</span>
                            {{-- 
                            @if ()
                                <span class="badge text-success p-8 pt-2" style="background-color: rgba(230, 255, 250, 1);  border-radius:7px; font-size:small; height:27px; width:68px;">Active</span>
                            @else
                                <span class="badge text-danger p-8 pt-2" style="background-color:  rgba(251, 242, 239, 1);  border-radius:7px; font-size:small; height:27px; width:68px;">Deactive</span>
                            @endif
                            --}}
                        </div>
                    </div> 
                    
                    <div class="d-flex justify-content-between pl-0 mt-1 mb-3">
                        <h6> Deadline :</h6>
                        <div class="gap-2">
                            <span style="color: rgba(19, 222, 185, 1);"> Senin, 25 November 2024</span>
                        </div>
                    </div> 
                    <button class="btn btn-detail justify-content-center" style="background-color: rgba(105, 94, 239, 1); border-radius: 4px; color: white; width: 324px; height: 43;">Lihat Detail</button>
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