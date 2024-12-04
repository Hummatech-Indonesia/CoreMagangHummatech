@extends('admin.layouts.app')
@section('style')
<style>
    .bg-label-primary {
        background-color: #eff3ff !important;
        color: #557be8 !important;
    }

    .bg-label-info {
        background-color: #d9ebff !important;
        color: #0da8ff !important;
    }

    .bg-label-warning {
        background-color: #fef5e5 !important;
        color: #ffaa05 !important;
    }

    .bg-label-danger {
        background-color: #fbf2ef !important;
        color: #e12d5b !important;
    }

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
        margin: 0px;
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
        height: 40px;
        ;
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
<div class="col-12">
    <div class="card card-body">

        <div class=" col-md-7 col-sm-10">
            <div class="step-arrow-nav">
                <ul class="nav nav-pills custom-nav nav-justified" role="tablist">

                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="online-tab" data-bs-toggle="pill" data-bs-target="#all"
                            type="button" role="tab" aria-controls="offline" aria-selected="false" data-position="2"
                            tabindex="-1">
                            Semua
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="online-tab" data-bs-toggle="pill" data-bs-target="#acceptAndrejected "
                            type="button" role="tab" aria-controls="online" aria-selected="false" data-position="2"
                            tabindex="-1">
                            Diterima & tolak
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="online-tab" data-bs-toggle="pill" data-bs-target="#waiting "
                            type="button" role="tab" aria-controls="online" aria-selected="false" data-position="2"
                            tabindex="-1">
                            Menunggu
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="online-tab" data-bs-toggle="pill" data-bs-target="#completed "
                            type="button" role="tab" aria-controls="online" aria-selected="false" data-position="2"
                            tabindex="-1">
                            Selesai
                        </button>
                    </li>

                </ul>
            </div>
        </div>

    </div>
</div>
</div>
<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">

     <div class="tab-content">



    <div class="tab-pane fade show active" id="all">
        @forelse ($projects as $project)
            <div class="mb-4">
                <div class="card card-height-100">
                    <div class="card-body">
                        <!-- Tipe Project -->
                        <div class="d-flex justify-content-between mb-3">
                            <div class="d-flex">
                                <h6 class="type-project">{{ ucwords($project->type_project->value) }}</h6>
                            </div>
                            <div>
                                <!-- Nomor Antrian -->
                                <div class="antrian-wrapper">
                                    <h6 class="antrian">
                                        {{ $project->presentation?->urutan == 0 ? '-' : sprintf('%02d', $project->presentation->urutan) }}
                                    </h6>
                                </div>
                            </div>
                        </div>

                        <!-- Judul Project dan Status -->
                        <div class="d-flex justify-content-between">
                            <h4 class="fw-bolder mb-0">{{ $project->project_name }}</h4>
                            <div class="gap-2">
                                <span class="badge status"> Telat 1 Hari</span>
                                {{-- Uncomment this for conditional badges if needed
                                @if ()
                                    <span class="badge bg-success"></span>
                                @else
                                    <span class="badge bg-danger"></span>
                                @endif --}}
                            </div>
                        </div>

                        <!-- Avatar Anggota -->
                        @php($members = $project->members)
                        @if ($members->count() === 1)
                            <div class="d-flex justify-content-start">
                                <a href="javascript:void(0)" class="me-1" data-bs-toggle="tooltip" data-bs-placement="top"
                                   aria-label="{{ $members[0]->members->name }}"
                                   data-bs-original-title="{{ $members[0]->members->name }}">
                                    <img src="{{ asset('assets-user/dist/images/profile/user-2.jpg') }}" alt="Avatar"
                                         class="rounded-circle shadow-sm img-fluid" width="33" height="33">
                                </a>
                            </div>
                        @elseif ($members->count() > 1)
                            <div class="d-flex justify-content-start">
                                <ul class="hstack mb-0">
                                    @foreach ($members as $index => $member)
                                        <li class="{{ $index > 0 ? 'ms-n8' : '' }} list-unstyled">
                                            <a href="javascript:void(0)" class="me-1" data-bs-toggle="tooltip" data-bs-placement="top"
                                               aria-label="{{ $member->members->name }}"
                                               data-bs-original-title="{{ $member->members->name }}">
                                                <img src="{{ asset('assets-user/dist/images/profile/user-1.jpg') }}"
                                                     class="rounded-circle border border-2 border-white" width="33" height="33"
                                                     alt="{{ $member->members->name }}">
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Deskripsi Proyek -->
                        <div class="d-flex justify-content-between mt-4 mb-2">
                            <h5 class="fs-bolder">{{ $project->description }}</h5>
                        </div>

                        <!-- Kondisi Proyek -->
                        <div class="d-flex justify-content-between">
                            <h6>Kondisi Proyek</h6>
                            <div class="gap-2">
                                @if ($project->status == \App\Enum\ProjectAcceptStatus::WAITING)
                                    <small class="bg-label-warning p-2 rounded-pill">Menunggu Konfirmasi</small>
                                @elseif($project->status == \App\Enum\ProjectAcceptStatus::ACCEPT)
                                    <span class="badge text-success p-8 pt-2"
                                          style="background-color: rgba(230, 255, 250, 1);  border-radius:7px; font-size:small; height:27px; width:68px;">
                                        Diterima
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Deadline Proyek -->
                        <div class="d-flex justify-content-between pl-0 mt-1 mb-3">
                            <h6> Deadline :</h6>
                            <div class="gap-2">
                                @if($project->end_date >= Carbon::today())
                                    <span class="text-danger">
                                        {{ Carbon::parse($project->end_date)->translatedFormat('l, d F Y') }}
                                    </span>
                                @else
                                    <span class="text-success">
                                        {{ Carbon::parse($project->end_date)->translatedFormat('l, d F Y') }}
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Tombol Lihat Detail -->
                        <div class="d-flex justify-content-between pl-0">
                            <a class="btn btn-detail justify-content-center"
                               style="background-color: rgba(105, 94, 239, 1); border-radius: 4px; color: white; width: 324px; height: 43px;"
                               href="/administrator/student-progress/project/detail/{{$project->id}}">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <!-- Jika Tidak Ada Data -->
            <div class="d-flex justify-content-center mt-3">
                <img src="{{ asset('no data.png') }}" width="200px" alt="">
            </div>
            <h4 class="text-center mt-2 mb-4">Data Masih kosong</h4>
        @endforelse
    </div>
    <div class="tab-pane fade show " id="acceptAndrejected">
        @forelse ($acceptAndrejected_projects as $project)
            <div class="mb-4">
                <div class="card card-height-100">
                    <div class="card-body">
                        <!-- Tipe Project -->
                        <div class="d-flex justify-content-between mb-3">
                            <div class="d-flex">
                                <h6 class="type-project">{{ ucwords($project->type_project->value) }}</h6>
                            </div>
                            <div>
                                <!-- Nomor Antrian -->
                                <div class="antrian-wrapper">
                                    <h6 class="antrian">
                                        {{ $project->presentation?->urutan == 0 ? '-' : sprintf('%02d', $project->presentation->urutan) }}
                                    </h6>
                                </div>
                            </div>
                        </div>

                        <!-- Judul Project dan Status -->
                        <div class="d-flex justify-content-between">
                            <h4 class="fw-bolder mb-0">{{ $project->project_name }}</h4>
                            <div class="gap-2">
                                <span class="badge status"> Telat 1 Hari</span>
                                {{-- Uncomment this for conditional badges if needed
                                @if ()
                                    <span class="badge bg-success"></span>
                                @else
                                    <span class="badge bg-danger"></span>
                                @endif --}}
                            </div>
                        </div>

                        <!-- Avatar Anggota -->
                        @php($members = $project->members)
                        @if ($members->count() === 1)
                            <div class="d-flex justify-content-start">
                                <a href="javascript:void(0)" class="me-1" data-bs-toggle="tooltip" data-bs-placement="top"
                                   aria-label="{{ $members[0]->members->name }}"
                                   data-bs-original-title="{{ $members[0]->members->name }}">
                                    <img src="{{ asset('assets-user/dist/images/profile/user-2.jpg') }}" alt="Avatar"
                                         class="rounded-circle shadow-sm img-fluid" width="33" height="33">
                                </a>
                            </div>
                        @elseif ($members->count() > 1)
                            <div class="d-flex justify-content-start">
                                <ul class="hstack mb-0">
                                    @foreach ($members as $index => $member)
                                        <li class="{{ $index > 0 ? 'ms-n8' : '' }} list-unstyled">
                                            <a href="javascript:void(0)" class="me-1" data-bs-toggle="tooltip" data-bs-placement="top"
                                               aria-label="{{ $member->members->name }}"
                                               data-bs-original-title="{{ $member->members->name }}">
                                                <img src="{{ asset('assets-user/dist/images/profile/user-1.jpg') }}"
                                                     class="rounded-circle border border-2 border-white" width="33" height="33"
                                                     alt="{{ $member->members->name }}">
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Deskripsi Proyek -->
                        <div class="d-flex justify-content-between mt-4 mb-2">
                            <h5 class="fs-bolder">{{ $project->description }}</h5>
                        </div>

                        <!-- Kondisi Proyek -->
                        <div class="d-flex justify-content-between">
                            <h6>Kondisi Proyek</h6>
                            <div class="gap-2">
                                @if ($project->status == \App\Enum\ProjectAcceptStatus::WAITING)
                                    <small class="bg-label-warning p-2 rounded-pill">Menunggu Konfirmasi</small>
                                @elseif($project->status == \App\Enum\ProjectAcceptStatus::ACCEPT)
                                    <span class="badge text-success p-8 pt-2"
                                          style="background-color: rgba(230, 255, 250, 1);  border-radius:7px; font-size:small; height:27px; width:68px;">
                                        Diterima
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Deadline Proyek -->
                        <div class="d-flex justify-content-between pl-0 mt-1 mb-3">
                            <h6> Deadline :</h6>
                            <div class="gap-2">
                                @if($project->end_date >= Carbon::today())
                                    <span class="text-danger">
                                        {{ Carbon::parse($project->end_date)->translatedFormat('l, d F Y') }}
                                    </span>
                                @else
                                    <span class="text-success">
                                        {{ Carbon::parse($project->end_date)->translatedFormat('l, d F Y') }}
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Tombol Lihat Detail -->
                        <div class="d-flex justify-content-between pl-0">
                            <a class="btn btn-detail justify-content-center"
                               style="background-color: rgba(105, 94, 239, 1); border-radius: 4px; color: white; width: 324px; height: 43px;"
                               href="/administrator/student-progress/project/detail/{{$project->id}}">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <!-- Jika Tidak Ada Data -->
            <div class="d-flex justify-content-center mt-3">
                <img src="{{ asset('no data.png') }}" width="200px" alt="">
            </div>
            <h4 class="text-center mt-2 mb-4">Data Masih kosong</h4>
        @endforelse
    </div>

    <div class="tab-pane fade show " id="waiting">
        @forelse ($waiting_projects as $project)
            <div class="mb-4">
                <div class="card card-height-100">
                    <div class="card-body">
                        <!-- Tipe Project -->
                        <div class="d-flex justify-content-between mb-3">
                            <div class="d-flex">
                                <h6 class="type-project">{{ ucwords($project->type_project->value) }}</h6>
                            </div>
                            <div>
                                <!-- Nomor Antrian -->
                                <div class="antrian-wrapper">
                                    <h6 class="antrian">
                                        {{ $project->presentation?->urutan == 0 ? '-' : sprintf('%02d', $project->presentation->urutan) }}
                                    </h6>
                                </div>
                            </div>
                        </div>

                        <!-- Judul Project dan Status -->
                        <div class="d-flex justify-content-between">
                            <h4 class="fw-bolder mb-0">{{ $project->project_name }}</h4>
                            <div class="gap-2">
                                <span class="badge status"> Telat 1 Hari</span>
                                {{-- Uncomment this for conditional badges if needed
                                @if ()
                                    <span class="badge bg-success"></span>
                                @else
                                    <span class="badge bg-danger"></span>
                                @endif --}}
                            </div>
                        </div>

                        <!-- Avatar Anggota -->
                        @php($members = $project->members)
                        @if ($members->count() === 1)
                            <div class="d-flex justify-content-start">
                                <a href="javascript:void(0)" class="me-1" data-bs-toggle="tooltip" data-bs-placement="top"
                                   aria-label="{{ $members[0]->members->name }}"
                                   data-bs-original-title="{{ $members[0]->members->name }}">
                                    <img src="{{ asset('assets-user/dist/images/profile/user-2.jpg') }}" alt="Avatar"
                                         class="rounded-circle shadow-sm img-fluid" width="33" height="33">
                                </a>
                            </div>
                        @elseif ($members->count() > 1)
                            <div class="d-flex justify-content-start">
                                <ul class="hstack mb-0">
                                    @foreach ($members as $index => $member)
                                        <li class="{{ $index > 0 ? 'ms-n8' : '' }} list-unstyled">
                                            <a href="javascript:void(0)" class="me-1" data-bs-toggle="tooltip" data-bs-placement="top"
                                               aria-label="{{ $member->members->name }}"
                                               data-bs-original-title="{{ $member->members->name }}">
                                                <img src="{{ asset('assets-user/dist/images/profile/user-1.jpg') }}"
                                                     class="rounded-circle border border-2 border-white" width="33" height="33"
                                                     alt="{{ $member->members->name }}">
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Deskripsi Proyek -->
                        <div class="d-flex justify-content-between mt-4 mb-2">
                            <h5 class="fs-bolder">{{ $project->description }}</h5>
                        </div>

                        <!-- Kondisi Proyek -->
                        <div class="d-flex justify-content-between">
                            <h6>Kondisi Proyek</h6>
                            <div class="gap-2">
                                @if ($project->status == \App\Enum\ProjectAcceptStatus::WAITING)
                                    <small class="bg-label-warning p-2 rounded-pill">Menunggu Konfirmasi</small>
                                @elseif($project->status == \App\Enum\ProjectAcceptStatus::ACCEPT)
                                    <span class="badge text-success p-8 pt-2"
                                          style="background-color: rgba(230, 255, 250, 1);  border-radius:7px; font-size:small; height:27px; width:68px;">
                                        Diterima
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Deadline Proyek -->
                        <div class="d-flex justify-content-between pl-0 mt-1 mb-3">
                            <h6> Deadline :</h6>
                            <div class="gap-2">
                                @if($project->end_date >= Carbon::today())
                                    <span class="text-danger">
                                        {{ Carbon::parse($project->end_date)->translatedFormat('l, d F Y') }}
                                    </span>
                                @else
                                    <span class="text-success">
                                        {{ Carbon::parse($project->end_date)->translatedFormat('l, d F Y') }}
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Tombol Lihat Detail -->
                        <div class="d-flex justify-content-between pl-0">
                            <a class="btn btn-detail justify-content-center"
                               style="background-color: rgba(105, 94, 239, 1); border-radius: 4px; color: white; width: 324px; height: 43px;"
                               href="/administrator/student-progress/project/detail/{{$project->id}}">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <!-- Jika Tidak Ada Data -->
            <div class="d-flex justify-content-center mt-3">
                <img src="{{ asset('no data.png') }}" width="200px" alt="">
            </div>
            <h4 class="text-center mt-2 mb-4">Data Masih kosong</h4>
        @endforelse
    </div>
    <div class="tab-pane fade show " id="completed">
        @forelse ($completed_projects as $project)
            <div class="mb-4">
                <div class="card card-height-100">
                    <div class="card-body">
                        <!-- Tipe Project -->
                        <div class="d-flex justify-content-between mb-3">
                            <div class="d-flex">
                                <h6 class="type-project">{{ ucwords($project->type_project->value) }}</h6>
                            </div>
                            <div>
                                <!-- Nomor Antrian -->
                                <div class="antrian-wrapper">
                                    <h6 class="antrian">
                                        {{ $project->presentation?->urutan == 0 ? '-' : sprintf('%02d', $project->presentation->urutan) }}
                                    </h6>
                                </div>
                            </div>
                        </div>

                        <!-- Judul Project dan Status -->
                        <div class="d-flex justify-content-between">
                            <h4 class="fw-bolder mb-0">{{ $project->project_name }}</h4>
                            <div class="gap-2">
                                <span class="badge status"> Telat 1 Hari</span>
                                {{-- Uncomment this for conditional badges if needed
                                @if ()
                                    <span class="badge bg-success"></span>
                                @else
                                    <span class="badge bg-danger"></span>
                                @endif --}}
                            </div>
                        </div>

                        <!-- Avatar Anggota -->
                        @php($members = $project->members)
                        @if ($members->count() === 1)
                            <div class="d-flex justify-content-start">
                                <a href="javascript:void(0)" class="me-1" data-bs-toggle="tooltip" data-bs-placement="top"
                                   aria-label="{{ $members[0]->members->name }}"
                                   data-bs-original-title="{{ $members[0]->members->name }}">
                                    <img src="{{ asset('assets-user/dist/images/profile/user-2.jpg') }}" alt="Avatar"
                                         class="rounded-circle shadow-sm img-fluid" width="33" height="33">
                                </a>
                            </div>
                        @elseif ($members->count() > 1)
                            <div class="d-flex justify-content-start">
                                <ul class="hstack mb-0">
                                    @foreach ($members as $index => $member)
                                        <li class="{{ $index > 0 ? 'ms-n8' : '' }} list-unstyled">
                                            <a href="javascript:void(0)" class="me-1" data-bs-toggle="tooltip" data-bs-placement="top"
                                               aria-label="{{ $member->members->name }}"
                                               data-bs-original-title="{{ $member->members->name }}">
                                                <img src="{{ asset('assets-user/dist/images/profile/user-1.jpg') }}"
                                                     class="rounded-circle border border-2 border-white" width="33" height="33"
                                                     alt="{{ $member->members->name }}">
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Deskripsi Proyek -->
                        <div class="d-flex justify-content-between mt-4 mb-2">
                            <h5 class="fs-bolder">{{ $project->description }}</h5>
                        </div>

                        <!-- Kondisi Proyek -->
                        <div class="d-flex justify-content-between">
                            <h6>Kondisi Proyek</h6>
                            <div class="gap-2">
                                @if ($project->status == \App\Enum\ProjectAcceptStatus::WAITING)
                                    <small class="bg-label-warning p-2 rounded-pill">Menunggu Konfirmasi</small>
                                @elseif($project->status == \App\Enum\ProjectAcceptStatus::ACCEPT)
                                    <span class="badge text-success p-8 pt-2"
                                          style="background-color: rgba(230, 255, 250, 1);  border-radius:7px; font-size:small; height:27px; width:68px;">
                                        Diterima
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Deadline Proyek -->
                        <div class="d-flex justify-content-between pl-0 mt-1 mb-3">
                            <h6> Deadline :</h6>
                            <div class="gap-2">
                                @if($project->end_date >= Carbon::today())
                                    <span class="text-danger">
                                        {{ Carbon::parse($project->end_date)->translatedFormat('l, d F Y') }}
                                    </span>
                                @else
                                    <span class="text-success">
                                        {{ Carbon::parse($project->end_date)->translatedFormat('l, d F Y') }}
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Tombol Lihat Detail -->
                        <div class="d-flex justify-content-between pl-0">
                            <a class="btn btn-detail justify-content-center"
                               style="background-color: rgba(105, 94, 239, 1); border-radius: 4px; color: white; width: 324px; height: 43px;"
                               href="/administrator/student-progress/project/detail/{{$project->id}}">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <!-- Jika Tidak Ada Data -->
            <div class="d-flex justify-content-center mt-3">
                <img src="{{ asset('no data.png') }}" width="200px" alt="">
            </div>
            <h4 class="text-center mt-2 mb-4">Data Masih kosong</h4>
        @endforelse
    </div>
    </div>






</div>

@endsection
