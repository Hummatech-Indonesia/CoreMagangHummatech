@extends('Hummatask.layouts.app')
@section('style')
    <link type="text/css" href="#" rel="stylesheet"/>
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

        .select2-container--default .select2-selection--multiple .select2-selection__rendered li {
            color: black;
        }

        /* Shadow untuk div pertama (Navbar) */
        .navbar-shadow {
            box-shadow: 0 2px 8px rgba(99, 98, 98, 0.1);
            /* Sesuaikan intensitas shadow */
        }

        #item {
            cursor: grab;
            touch-action: none;
            user-select: none;
            /*position: absolute;*/
            z-index: 9999999 !important;
        }

        .onprogress-panel,
        .revision-panel,
        .done-panel {
            min-height: 200px; /* Berikan tinggi minimum agar terlihat */
            border: 2px dashed #ccc; /* Batas visual untuk dropzone */
            box-sizing: border-box;
            padding: 10px;
            position: relative;
        }


        .can-drop {
            border: 2px solid #4caf50;
        }

        .drop-target {
            background-color: #f0f8ff;
        }
    </style>
@endsection
@section('sidebar')
    @include('Hummatask.layouts.sidebar-detail-presentation')
@endsection
@section('content')
    <div class="container-fluid">
        <div class="card bg-light-info shadow-none position-relative overflow-hidden">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">Revision</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class="text-muted " href="index-2.html">Presentation</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">Revision</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-3">
                        <div class="text-center mb-n5">
                            <img
                                src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/breadcrumb/ChatBc.png"
                                alt="" class="img-fluid">

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="d-flex justify-content-between w-100 mb-4 gap-2 navbar-shadow">
            <a class="text-decoration-none" href="/dashboard/task">
                <div class="back bg-label-primary rounded p-3">
                    <svg width="32" height="24" viewBox="0 0 36 28" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M1.27307 12.586C0.89813 12.9611 0.687499 13.4697 0.687499 14C0.687499 14.5303 0.89813 15.0389 1.27307 15.414L12.5871 26.728C12.7716 26.919 12.9923 27.0714 13.2363 27.1762C13.4803 27.281 13.7427 27.3362 14.0083 27.3385C14.2738 27.3408 14.5372 27.2902 14.783 27.1896C15.0288 27.0891 15.2521 26.9406 15.4399 26.7528C15.6276 26.565 15.7762 26.3417 15.8767 26.0959C15.9773 25.8501 16.0279 25.5868 16.0256 25.3212C16.0233 25.0556 15.9681 24.7932 15.8633 24.5492C15.7585 24.3052 15.6061 24.0845 15.4151 23.9L7.51507 16L34.0011 16C34.5315 16 35.0402 15.7893 35.4153 15.4142C35.7904 15.0391 36.0011 14.5304 36.0011 14C36.0011 13.4696 35.7904 12.9609 35.4153 12.5858C35.0402 12.2107 34.5315 12 34.0011 12L7.51507 12L15.4151 4.1C15.7794 3.72279 15.981 3.21759 15.9764 2.6932C15.9719 2.16881 15.7615 1.66718 15.3907 1.29637C15.0199 0.925548 14.5183 0.715209 13.9939 0.710653C13.4695 0.706096 12.9643 0.907684 12.5871 1.272L1.27307 12.586Z"
                            fill="#5D87FF"/>
                    </svg>
                </div>
            </a>
            <div class="bg-label-primary w-100 d-flex justify-content-center align-items-center text-center">
                <h2 class="text-primary fw-bolder fs-4">Hummatask</h2>
            </div>
        </div>


        <div class="row">

            {{--  card revision --}}
            <div class="col-md-4">
                <div class="card">
                    <div class="container">
                        <h5 class="fw-semibold mt-3">Revisi</h5>
                        {{--  content  --}}
                        <div class="revision-panel" status-panel="{{ \App\Enum\RevisionStatusEnum::Todo->value }}">
                            @foreach($revisionTodo as $revision)
                                <div class="row mt-3" id="item" id-revision="{{ $revision->id }}">
                                    <div class="col-12">
                                        <div class="container rounded-1 bg-light-primary position-relative p-3">
                                            <div class="d-flex">
                                                <div class="mt-2 flex-grow-1">
                                                    <p class="fw-semibold fs-3 mb-2 mt-2" style="color: #0da8ff">
                                                        {{ $revision->revision }}
                                                    </p>
                                                </div>
                                                <a href="#" class=" position-absolute" style="top: 10px; right: 10px;"
                                                   data-bs-toggle="dropdown" aria-expanded="false">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                         fill="currentColor" class="bi bi-three-dots-vertical"
                                                         viewBox="0 0 16 16">
                                                        <path
                                                            d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"/>
                                                    </svg>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item fs-2" href="#">
                                                            Edit
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item fs-2" data-bs-toggle="modal"
                                                           data-bs-target="#submit-a-presentation" href="#">
                                                            Hapus
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="d-flex justify-content-end">
                                                <ul class="hstack mb-2">
                                                    <li class="ms-n8">
                                                        <a href="javascript:void(0)" class="me-1"
                                                           data-bs-toggle="tooltip"
                                                           data-bs-placement="top" aria-label="gito"
                                                           data-bs-original-title="gito">
                                                            <img
                                                                src="{{ asset('assets-user/dist/images/profile/user-2.jpg') }}"
                                                                class="rounded-circle border border-2 border-white"
                                                                width="33"
                                                                height="33" alt="">
                                                        </a>
                                                    </li>
                                                    <li class="ms-n8">
                                                        <a href="javascript:void(0)" class="me-1"
                                                           data-bs-toggle="tooltip"
                                                           data-bs-placement="top" aria-label="sugiren"
                                                           data-bs-original-title="sugiren">
                                                            <img
                                                                src="{{ asset('assets-user/dist/images/profile/user-3.jpg') }}"
                                                                class="rounded-circle border border-2 border-white"
                                                                width="33"
                                                                height="33" alt="">
                                                        </a>
                                                    </li>
                                                    <li class="ms-n8">
                                                        <a href="javascript:void(0)" class="me-1"
                                                           data-bs-toggle="tooltip"
                                                           data-bs-placement="top" aria-label="mustafa"
                                                           data-bs-original-title="mustafa">
                                                            <img
                                                                src="{{ asset('assets-user/dist/images/profile/user-4.jpg') }}"
                                                                class="rounded-circle border border-2 border-white"
                                                                width="33"
                                                                height="33" alt="">
                                                        </a>
                                                    </li>
                                                    <li class="ms-n8">
                                                        <a href="javascript:void(0)" class="me-1"
                                                           data-bs-toggle="tooltip"
                                                           data-bs-placement="top" aria-label="Mark Smith"
                                                           data-bs-original-title="Mark Smith">
                                                            <img
                                                                src="{{ asset('assets-user/dist/images/profile/user-5.jpg') }}"
                                                                class="rounded-circle border border-2 border-white"
                                                                width="33"
                                                                height="33" alt="">
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="mb-4 mt-4">
                            <a href="#"  style="color: gray; display: flex; align-items: center;"  data-bs-toggle="modal"
                               data-bs-target="#addRevisionTodo">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                     stroke-linecap="round" stroke-linejoin="round"
                                     class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M12 5l0 14"/>
                                    <path d="M5 12l14 0"/>
                                </svg>
                                <span style="margin-left: 8px;">Tambah card</span>
                                <svg style="margin-left: 170px" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                     aria-label="Tambahkan" data-bs-original-title="Tambahkan"
                                     xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                     viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                          d="M20 2H8c-1.103 0-2 .897-2 2v12c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2V4c0-1.103-.897-2-2-2M8 16V4h12l.002 12z"/>
                                    <path fill="currentColor"
                                          d="M4 8H2v12c0 1.103.897 2 2 2h12v-2H4zm11-2h-2v3h-3v2h3v3h2v-3h3V9h-3z"/>
                                </svg>
                            </a>

                        </div>
                    </div>

                </div>
            </div>

            {{--  card work period  --}}
            <div class="col-md-4">
                <div class="card">
                    <div class="container">
                        <h5 class="fw-semibold mt-3">Dikerjakan</h5>

                        {{--  content  --}}
                        <div class="onprogress-panel"
                             status-panel="{{ \App\Enum\RevisionStatusEnum::InProgress->value }}">
                            @foreach($revisionInProgress as $revision)
                                <div class="row mt-3" id="item" id-revision="{{ $revision->id }}">
                                    <div class="col-12">
                                        <div class="container rounded-1 bg-light-primary position-relative p-3">
                                            <div class="d-flex">
                                                <div class="mt-2 flex-grow-1">
                                                    <p class="fw-semibold fs-3 mb-2 mt-2" style="color: #0da8ff">
                                                        {{ $revision->revision }}
                                                    </p>
                                                </div>
                                                <a href="#" class=" position-absolute" style="top: 10px; right: 10px;"
                                                   data-bs-toggle="dropdown" aria-expanded="false">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                         fill="currentColor" class="bi bi-three-dots-vertical"
                                                         viewBox="0 0 16 16">
                                                        <path
                                                            d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"/>
                                                    </svg>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item fs-2" href="#">
                                                            Edit
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item fs-2" data-bs-toggle="modal"
                                                           data-bs-target="#submit-a-presentation" href="#">
                                                            Hapus
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="d-flex justify-content-end">
                                                <ul class="hstack mb-2">
                                                    <li class="ms-n8">
                                                        <a href="javascript:void(0)" class="me-1"
                                                           data-bs-toggle="tooltip"
                                                           data-bs-placement="top" aria-label="gito"
                                                           data-bs-original-title="gito">
                                                            <img
                                                                src="{{ asset('assets-user/dist/images/profile/user-2.jpg') }}"
                                                                class="rounded-circle border border-2 border-white"
                                                                width="33"
                                                                height="33" alt="">
                                                        </a>
                                                    </li>
                                                    <li class="ms-n8">
                                                        <a href="javascript:void(0)" class="me-1"
                                                           data-bs-toggle="tooltip"
                                                           data-bs-placement="top" aria-label="sugiren"
                                                           data-bs-original-title="sugiren">
                                                            <img
                                                                src="{{ asset('assets-user/dist/images/profile/user-3.jpg') }}"
                                                                class="rounded-circle border border-2 border-white"
                                                                width="33"
                                                                height="33" alt="">
                                                        </a>
                                                    </li>
                                                    <li class="ms-n8">
                                                        <a href="javascript:void(0)" class="me-1"
                                                           data-bs-toggle="tooltip"
                                                           data-bs-placement="top" aria-label="mustafa"
                                                           data-bs-original-title="mustafa">
                                                            <img
                                                                src="{{ asset('assets-user/dist/images/profile/user-4.jpg') }}"
                                                                class="rounded-circle border border-2 border-white"
                                                                width="33"
                                                                height="33" alt="">
                                                        </a>
                                                    </li>
                                                    <li class="ms-n8">
                                                        <a href="javascript:void(0)" class="me-1"
                                                           data-bs-toggle="tooltip"
                                                           data-bs-placement="top" aria-label="Mark Smith"
                                                           data-bs-original-title="Mark Smith">
                                                            <img
                                                                src="{{ asset('assets-user/dist/images/profile/user-5.jpg') }}"
                                                                class="rounded-circle border border-2 border-white"
                                                                width="33"
                                                                height="33" alt="">
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        {{--  bottom  --}}
                        <div class="mb-4 mt-4">
                            <a href="" style="color: gray; display: flex; align-items: center;"  data-bs-toggle="modal"
                               data-bs-target="#addRevisionInProgress
                               ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                     stroke-linecap="round" stroke-linejoin="round"
                                     class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M12 5l0 14"/>
                                    <path d="M5 12l14 0"/>
                                </svg>
                                <span style="margin-left: 8px;">Tambah card</span>
                                <svg style="margin-left: 170px" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                     aria-label="Tambahkan" data-bs-original-title="Tambahkan"
                                     xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                     viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                          d="M20 2H8c-1.103 0-2 .897-2 2v12c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2V4c0-1.103-.897-2-2-2M8 16V4h12l.002 12z"/>
                                    <path fill="currentColor"
                                          d="M4 8H2v12c0 1.103.897 2 2 2h12v-2H4zm11-2h-2v3h-3v2h3v3h2v-3h3V9h-3z"/>
                                </svg>
                            </a>

                        </div>
                    </div>
                </div>
            </div>

            {{--  card done  --}}
            <div class="col-md-4">
                <div class="card">
                    <div class="container">
                        <h5 class="fw- mt-3">Selesai</h5>

                        {{--  content  --}}
                        <div class="done-panel" status-panel="{{ \App\Enum\RevisionStatusEnum::Completed->value }}">
                            @foreach($revisionDone as $revision)
                                <div class="row mt-3" id="item" id-revision="{{ $revision->id }}">
                                    <div class="col-12">
                                        <div class="container rounded-1 bg-light-primary position-relative p-3">
                                            <div class="d-flex">
                                                <div class="mt-2 flex-grow-1">
                                                    <p class="fw-semibold fs-3 mb-2 mt-2" style="color: #0da8ff">
                                                        {{ $revision->revision }}
                                                    </p>
                                                </div>
                                                <a href="#" class=" position-absolute" style="top: 10px; right: 10px;"
                                                   data-bs-toggle="dropdown" aria-expanded="false">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                         fill="currentColor" class="bi bi-three-dots-vertical"
                                                         viewBox="0 0 16 16">
                                                        <path
                                                            d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"/>
                                                    </svg>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item fs-2" href="#">
                                                            Edit
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item fs-2" data-bs-toggle="modal"
                                                           data-bs-target="#submit-a-presentation" href="#">
                                                            Hapus
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="d-flex justify-content-end">
                                                <ul class="hstack mb-2">
                                                    <li class="ms-n8">
                                                        <a href="javascript:void(0)" class="me-1"
                                                           data-bs-toggle="tooltip"
                                                           data-bs-placement="top" aria-label="gito"
                                                           data-bs-original-title="gito">
                                                            <img
                                                                src="{{ asset('assets-user/dist/images/profile/user-2.jpg') }}"
                                                                class="rounded-circle border border-2 border-white"
                                                                width="33"
                                                                height="33" alt="">
                                                        </a>
                                                    </li>
                                                    <li class="ms-n8">
                                                        <a href="javascript:void(0)" class="me-1"
                                                           data-bs-toggle="tooltip"
                                                           data-bs-placement="top" aria-label="sugiren"
                                                           data-bs-original-title="sugiren">
                                                            <img
                                                                src="{{ asset('assets-user/dist/images/profile/user-3.jpg') }}"
                                                                class="rounded-circle border border-2 border-white"
                                                                width="33"
                                                                height="33" alt="">
                                                        </a>
                                                    </li>
                                                    <li class="ms-n8">
                                                        <a href="javascript:void(0)" class="me-1"
                                                           data-bs-toggle="tooltip"
                                                           data-bs-placement="top" aria-label="mustafa"
                                                           data-bs-original-title="mustafa">
                                                            <img
                                                                src="{{ asset('assets-user/dist/images/profile/user-4.jpg') }}"
                                                                class="rounded-circle border border-2 border-white"
                                                                width="33"
                                                                height="33" alt="">
                                                        </a>
                                                    </li>
                                                    <li class="ms-n8">
                                                        <a href="javascript:void(0)" class="me-1"
                                                           data-bs-toggle="tooltip"
                                                           data-bs-placement="top" aria-label="Mark Smith"
                                                           data-bs-original-title="Mark Smith">
                                                            <img
                                                                src="{{ asset('assets-user/dist/images/profile/user-5.jpg') }}"
                                                                class="rounded-circle border border-2 border-white"
                                                                width="33"
                                                                height="33" alt="">
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        {{--  bottom  --}}
                        <div class="mb-4 mt-4">
                            <a href="" style="color: gray; display: flex; align-items: center;"  data-bs-toggle="modal"
                               data-bs-target="#addRevisionDone">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                     stroke-linecap="round" stroke-linejoin="round"
                                     class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M12 5l0 14"/>
                                    <path d="M5 12l14 0"/>
                                </svg>
                                <span style="margin-left: 8px;">Tambah card</span>
                                <svg style="margin-left: 170px" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                     aria-label="Tambahkan" data-bs-original-title="Tambahkan"
                                     xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                     viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                          d="M20 2H8c-1.103 0-2 .897-2 2v12c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2V4c0-1.103-.897-2-2-2M8 16V4h12l.002 12z"/>
                                    <path fill="currentColor"
                                          d="M4 8H2v12c0 1.103.897 2 2 2h12v-2H4zm11-2h-2v3h-3v2h3v3h2v-3h3V9h-3z"/>
                                </svg>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="addRevisionTodo" tabindex="-1" aria-labelledby="addRevisionTodoLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('project.presentation.revision.saveRevision',['project' => $project->id,'presentation' => $presentation->id]) }}" method="POST">
                    @csrf
                    <input type="hidden" name="status" value="{{ \App\Enum\RevisionStatusEnum::Todo->value }}">
                    <div class="modal-header">
                        <h1 class="modal-title fs-4" id="addRevisionTodoLabel">Tambah Revisi</h1>
                        <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="startDate">
                            <label class="mb-2 mt-1 fs-2" for="">Revisi</label>
                            <textarea name="revision" class="form-control"></textarea>
                            @error('revision')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success btn-sm">Kirim</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="modal fade" id="addRevisionInProgress" tabindex="-1" aria-labelledby="addRevisionInProgressLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('project.presentation.revision.saveRevision',['project' => $project->id,'presentation' => $presentation->id]) }}" method="POST">
                    @csrf
                    <input type="hidden" name="status" value="{{ \App\Enum\RevisionStatusEnum::InProgress->value }}">
                    <div class="modal-header">
                        <h1 class="modal-title fs-4" id="addRevisionInProgressLabel">Tambah Revisi</h1>
                        <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="startDate">
                            <label class="mb-2 mt-1 fs-2" for="">Revisi</label>
                            <textarea name="revision" class="form-control"></textarea>
                            @error('revision')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success btn-sm">Kirim</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="modal fade" id="addRevisionDone" tabindex="-1" aria-labelledby="addRevisionDoneLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('project.presentation.revision.saveRevision',['project' => $project->id,'presentation' => $presentation->id]) }}" method="POST">
                    @csrf
                    <input type="hidden" name="status" value="{{ \App\Enum\RevisionStatusEnum::Completed->value }}">
                    <div class="modal-header">
                        <h1 class="modal-title fs-4" id="addRevisionDoneLabel">Tambah Revisi</h1>
                        <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="startDate">
                            <label class="mb-2 mt-1 fs-2" for="">Revisi</label>
                            <textarea name="revision" class="form-control"></textarea>
                            @error('revision')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success btn-sm">Kirim</button>
                    </div>
                </form>

            </div>
        </div>
    </div>


@endsection
@include('Hummatask.partials.modal-delete')

@section('script')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script type="module">
        import 'https://cdn.interactjs.io/v1.9.20/auto-start/index.js'
        import 'https://cdn.interactjs.io/v1.9.20/actions/drag/index.js'
        import 'https://cdn.interactjs.io/v1.9.20/actions/resize/index.js'
        import 'https://cdn.interactjs.io/v1.9.20/modifiers/index.js'
        import 'https://cdn.interactjs.io/v1.9.20/dev-tools/index.js'
        import interact from 'https://cdn.interactjs.io/v1.9.20/interactjs/index.js'

        function dragMoveListener(event) {
            var target = event.target;
            var x = (parseFloat(target.getAttribute('data-x')) || 0) + event.dx;
            var y = (parseFloat(target.getAttribute('data-y')) || 0) + event.dy;

            // Terapkan perubahan posisi elemen yang diseret
            target.style.transform = 'translate(' + x + 'px, ' + y + 'px)';
            target.setAttribute('data-x', x);
            target.setAttribute('data-y', y);
        }

        // Aktifkan draggable pada elemen #item
        interact('#item').draggable({
            inertia: true,
            modifiers: [
                interact.modifiers.restrictRect({
                    restriction: 'parent',
                    endOnly: true
                })
            ],
            autoScroll: true,
            listeners: {move: dragMoveListener}
        });

        // Fungsi dropzone untuk panel-panel target
        ['.revision-panel', '.onprogress-panel', '.done-panel'].forEach(selector => {
            interact(selector).dropzone({
                accept: '#item',
                overlap: 0.75,
                ondropactivate: function (event) {
                    // console.log(event)
                    event.target.classList.add('drop-active');
                },
                ondragenter: function (event) {
                    let draggableElement = event.relatedTarget;
                    let dropzoneElement = event.target;

                    // Hitung posisi absolut elemen sebelum dipindahkan
                    const rectBefore = draggableElement.getBoundingClientRect();

                    // Pindahkan elemen ke dropzone baru
                    dropzoneElement.appendChild(draggableElement);

                    // Hitung posisi absolut elemen setelah dipindahkan
                    const rectAfter = draggableElement.getBoundingClientRect();

                    // Hitung perubahan posisi absolut (delta)
                    const deltaX = rectBefore.left - rectAfter.left;
                    const deltaY = rectBefore.top - rectAfter.top;

                    // Perbarui posisi transformasi elemen
                    const currentX = parseFloat(draggableElement.getAttribute('data-x')) || 0;
                    const currentY = parseFloat(draggableElement.getAttribute('data-y')) || 0;

                    draggableElement.style.transform = `translate(${currentX + deltaX}px, ${currentY + deltaY}px)`;
                    draggableElement.setAttribute('data-x', currentX + deltaX);
                    draggableElement.setAttribute('data-y', currentY + deltaY);

                    dropzoneElement.classList.add('drop-target');
                    draggableElement.classList.add('can-drop');
                },

                ondragleave: function (event) {
                    // console.log(event)
                    event.target.classList.remove('drop-target');
                    event.relatedTarget.classList.remove('can-drop');
                },
                ondrop: function (event) {
                    const draggableElement = event.relatedTarget;
                    const dropzoneElement = event.target;

                    // Pindahkan elemen ke dalam dropzone
                    dropzoneElement.appendChild(draggableElement);

                    // Ambil nilai atribut custom dari elemen
                    const idRevision = draggableElement.getAttribute('id-revision');
                    const statusPanel = dropzoneElement.getAttribute('status-panel');

                    console.log(idRevision);
                    console.log(statusPanel);

                    // Reset posisi elemen
                    draggableElement.style.transform = 'translate(0px, 0px)';
                    draggableElement.setAttribute('data-x', 0);
                    draggableElement.setAttribute('data-y', 0);

                    // URL endpoint
                    const url = "{{ route('project.presentation.revision.changestatus', ['project' => $project->id,'presentation' => $presentation->id]) }}"

                    // Request AJAX menggunakan Fetch API
                    fetch(url, {
                        method: 'PUT',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // Laravel CSRF Token
                        },
                        body: JSON.stringify({
                            id_revision: idRevision,
                            status: statusPanel // Kirim status baru
                        })
                    })
                        .then(response => {
                            if (response.ok) {
                                return response.json();
                            }
                            throw new Error('Network response was not ok.');
                        })
                        .then(data => {
                            console.log('Response:', data);
                            alert('Status successfully updated!');
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('Failed to update status.');
                        });
                },

                ondropdeactivate: function (event) {
                    // console.log(event)
                    event.target.classList.remove('drop-active');
                    event.target.classList.remove('drop-target');
                }
            });
        });
    </script>
@endsection
