@extends('admin.layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row g-2 align-items-center">
                <div class="col-sm-4">
                    <div class="step-arrow-nav mb-4 pt-3 mx-3">
                        <ul class="nav nav-pills custom-nav nav-justified"role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="steparrow-gen-info-tab" data-bs-toggle="pill"
                                    data-bs-target="#steparrow-gen-info" type="button" role="tab"
                                    aria-controls="steparrow-gen-info" aria-controls="steparrow-gen-info"
                                    aria-selected="true" data-position="0">
                                    Semua
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="steparrow-description-info-tab" data-bs-toggle="pill"
                                    data-bs-target="#steparrow-description-info" type="button" role="tab"
                                    aria-controls="steparrow-description-info" aria-selected="false" data-position="1"
                                    tabindex="-1">
                                    Siswa Offline
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-experience-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-experience" type="button" role="tab"
                                    aria-controls="pills-experience" aria-selected="false" data-position="2" tabindex="-1">
                                    Siswa Online
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-auto ms-auto d-flex justify-content-between ">
                    <div class="list-grid-nav hstack gap-1 mx-1">
                        <select name="school" class="form-select" id="">
                            <option disabled selected>Sekolah</option>
                            <option value="1">Sekolah 1</option>
                            <option value="2">Sekolah 2</option>
                        </select>
                    </div>
                    <div class="list-grid-nav hstack gap-1 mx-1">
                        <select name="status" class="form-select" id="">
                            <option disabled selected>Status</option>
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </select>
                    </div>
                    <div class="list-grid-nav hstack gap-1 mx-1">
                        <select name="gender" class="form-select" id="">
                            <option disabled selected>jenis kelamin</option>
                            <option value="male">Laki-laki</option>
                            <option value="female">Perempuan</option>
                        </select>
                    </div>
                    <div class="search-box d-flex justify-content-end w-25">
                        <input type="text" class="form-control" id="searchMemberList" placeholder="Cari Siswa...">
                        <i class="ri-search-line search-icon"></i>
                    </div>
                    <div class="list-grid-nav hstack gap-1">
                        <button class="btn btn-primary addMembers-modal" data-bs-toggle="modal"
                            data-bs-target="#addmemberModal">
                            Cari
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="tab-content">
        <div id="steparrow-gen-info" class="tab-pane fade show active">
            <div class="row">
                @forelse ($students as $student)
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card">
                            <div class="card-body d-flex  gap-1">
                                <div class="position-relative">
                                    <div
                                        class="position-absolute top-0 start-0 translate-middle rounded-circle {{ $student->rfid == null ? 'bg-danger' : 'bg-success' }} border-5 border-white border rounded p-2">
                                    </div>
                                    @if (file_exists(public_path('storage/' . $student->avatar)))
                                        <img class="avatar-lg rounded" style="object-fit: cover"
                                            src="{{ asset('storage/' . $student->avatar) }}">
                                    @else
                                        <img class="avatar-lg rounded" style="object-fit: cover"
                                            src="{{ asset('user.webp') }}">
                                    @endif
                                </div>
                                <div class="ms-2">
                                    <h5 class="mt-1 m-0 fw-semibold">{{ $student->name }}</h5>
                                    <p class="mt-1 m-0 text-muted">{{ $student->school }}</p>
                                    <div class="d-flex m-0 gap-2">
                                        <span
                                            class="badge px-4 py-1 text-uppercase {{ $student->acepted == 1 ? 'bg-success' : 'bg-danger' }} mt-1">{{ $student->acepted == '0' ? 'Tidak aktif' : 'Aktif' }}</span>
                                        <span
                                            class="badge px-4 py-1 text-uppercase {{ $student->internship_type == 'online' ? 'bg-primary' : 'bg-danger' }} mt-1">{{ $student->internship_type == 'online' ? 'online' : 'offline' }}</span>
                                    </div>
                                    <p class=" mt-1"><strong class="fs-6">RFID: </strong><span
                                            class="text-muted">{{ $student->rfid == null ? '-' : $student->rfid }}</span>
                                    </p>
                                </div>
                                <div class="d-flex justify-content-end w-100">
                                    <div class="dropdown card-header-dropdown">
                                        <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <span class="text-muted fs-16"><i
                                                    class="mdi mdi-dots-vertical align-center"></i></span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item"
                                                href="/menu-siswa/face/{{ $student->id }}">Wajah</a>
                                            <button class="dropdown-item btn-reset" type="button"
                                                data-id="{{ $student->id }}">Reset Password</button>
                                            <button class="dropdown-item btn-ban"
                                                data-id="{{ $student->id }}">Banned</button>
                                            <button class="dropdown-item btn-change" data-id="{{ $student->id }}"
                                                data-image="{{ $student->avatar }}">Ganti
                                                Profile</button>
                                            <button class="dropdown-item btn-detail" data-name="{{ $student->name }}"
                                                data-majors="{{ $student->major }}" data-class="{{ $student->class }}"
                                                data-phone="{{ $student->phone }}"
                                                data-address="{{ $student->address }}"
                                                data-birthdate="{{ \carbon\Carbon::parse($student->birth_date)->locale('id_ID')->isoFormat('D MMMM YYYY') }}"
                                                data-birthplace="{{ $student->birth_place }}"
                                                data-startdate="{{ \carbon\Carbon::parse($student->start_date)->locale('id_ID')->isoFormat('D MMMM YYYY') }}"
                                                data-finishdate="{{ \carbon\Carbon::parse($student->finish_date)->locale('id_ID')->isoFormat('D MMMM YYYY') }}"
                                                data-email="{{ $student->email }}" data-school="{{ $student->school }}"
                                                data-avatar="{{ file_exists(public_path('storage/' . $student->avatar)) ? asset('storage/' . $student->avatar) : asset('user.webp') }}"
                                                data-cv="{{ file_exists(public_path('storage/' . $student->cv)) ? asset('storage/' . $student->cv) : asset('no data.png') }}"
                                                data-selfstatement="{{ file_exists(public_path('storage/' . $student->self_statement)) ? asset('storage/' . $student->self_statement) : asset('no data.png') }}"
                                                data-parentsstatement="{{ file_exists(public_path('storage/' . $student->parents_statement)) ? asset('storage/' . $student->parents_statement) : asset('no data.png') }}"
                                                data-identify_number="{{ $student->identify_number }}">Detail</button>
                                            <button class="dropdown-item btn-delete text-danger" id="{{ $student->id }}"
                                                data-id="{{ $student->id }}">Hapus</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 d-flex justify-content-center text-center">
                        <img src="{{ asset('no data.png') }}" width="200px" alt="">
                    </div>
                    <h5 class="mt-3 text-center">Tidak ada data</h5>
                @endforelse
            </div>
        </div>
        <div id="steparrow-description-info" class="tab-pane fade">
            <div class="row">
                @forelse ($studentOfflines as $studentoffline)
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card">
                            <div class="card-body d-flex  gap-1">
                                <div class="position-relative">
                                    <div
                                        class="position-absolute top-0 start-0 translate-middle rounded-circle {{ $studentoffline->rfid == null ? 'bg-danger' : 'bg-success' }} border-5 border-white border rounded p-2">
                                    </div>
                                    @if (file_exists(public_path('storage/' . $studentoffline->avatar)))
                                        <img class="avatar-lg rounded" style="object-fit: cover"
                                            src="{{ asset('storage/' . $studentoffline->avatar) }}">
                                    @else
                                        <img class="avatar-lg rounded" style="object-fit: cover"
                                            src="{{ asset('user.webp') }}">
                                    @endif
                                </div>
                                <div class="ms-2">
                                    <h5 class="mt-1 m-0 fw-semibold">{{ $studentoffline->name }}</h5>
                                    <p class="mt-1 m-0 text-muted">{{ $studentoffline->school }}</p>
                                    <div class="d-flex m-0 gap-2">
                                        <span
                                            class="badge px-4 py-1 text-uppercase {{ $studentoffline->acepted == 1 ? 'bg-success' : 'bg-danger' }} mt-1">{{ $studentoffline->acepted == '0' ? 'Tidak aktif' : 'Aktif' }}</span>
                                        <span
                                            class="badge px-4 py-1 text-uppercase {{ $studentoffline->internship_type == 'online' ? 'bg-primary' : 'bg-danger' }} mt-1">{{ $studentoffline->internship_type == 'online' ? 'online' : 'offline' }}</span>
                                    </div>
                                    <p class=" mt-1"><strong class="fs-6">RFID: </strong><span
                                            class="text-muted">{{ $studentoffline->rfid == null ? '-' : $studentoffline->rfid }}</span>
                                    </p>
                                </div>
                                <div class="d-flex justify-content-end w-100">
                                    <div class="dropdown card-header-dropdown">
                                        <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <span class="text-muted fs-16"><i
                                                    class="mdi mdi-dots-vertical align-center"></i></span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item"
                                                href="/menu-siswa/face/{{ $studentoffline->id }}">Wajah</a>
                                            <button class="dropdown-item btn-reset" type="button"
                                                data-id="{{ $studentoffline->id }}">Reset Password</button>
                                            <button class="dropdown-item btn-ban"
                                                data-id="{{ $studentoffline->id }}">Banned</button>
                                            <button class="dropdown-item btn-change" data-id="{{ $studentoffline->id }}"
                                                data-image="{{ $student->avatar }}">Ganti
                                                Profile</button>
                                            <button class="dropdown-item btn-detail"
                                                data-name="{{ $studentoffline->name }}"
                                                data-majors="{{ $studentoffline->major }}"
                                                data-class="{{ $studentoffline->class }}"
                                                data-phone="{{ $studentoffline->phone }}"
                                                data-address="{{ $studentoffline->address }}"
                                                data-birthdate="{{ \carbon\Carbon::parse($studentoffline->birth_date)->locale('id_ID')->isoFormat('D MMMM YYYY') }}"
                                                data-birthplace="{{ $studentoffline->birth_place }}"
                                                data-startdate="{{ \carbon\Carbon::parse($studentoffline->start_date)->locale('id_ID')->isoFormat('D MMMM YYYY') }}"
                                                data-finishdate="{{ \carbon\Carbon::parse($studentoffline->finish_date)->locale('id_ID')->isoFormat('D MMMM YYYY') }}"
                                                data-school="{{ $studentoffline->school }}"
                                                data-email="{{ $studentoffline->email }}"
                                                data-avatar="{{ file_exists(public_path('storage/' . $student->avatar)) ? asset('storage/' . $student->avatar) : asset('user.webp') }}"
                                                data-cv="{{ file_exists(public_path('storage/' . $student->cv)) ? asset('storage/' . $student->cv) : asset('no data.png') }}"
                                                data-selfstatement="{{ file_exists(public_path('storage/' . $student->self_statement)) ? asset('storage/' . $student->self_statement) : asset('no data.png') }}"
                                                data-parentsstatement="{{ file_exists(public_path('storage/' . $student->parents_statement)) ? asset('storage/' . $student->parents_statement) : asset('no data.png') }}"
                                                data-identify_number="{{ $studentoffline->identify_number }}">Detail</button>
                                            <button class="dropdown-item btn-delete text-danger"
                                                id="{{ $studentoffline->id }}"
                                                data-id="{{ $studentoffline->id }}">Hapus</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 d-flex justify-content-center text-center">
                        <img src="{{ asset('no data.png') }}" width="200px" alt="">
                    </div>
                    <h5 class="mt-3 text-center">Tidak ada data</h5>
                @endforelse
            </div>
        </div>
        <div id="pills-experience" class="tab-pane fade">
            <div class="row">
                @forelse ($studentOnllines as $studentonline)
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card">
                            <div class="card-body d-flex  gap-1">
                                <div class="position-relative">
                                    <div
                                        class="position-absolute top-0 start-0 translate-middle rounded-circle {{ $studentonline->rfid == null ? 'bg-danger' : 'bg-success' }} border-5 border-white border rounded p-2">
                                    </div>
                                    @if (file_exists(public_path('storage/' . $studentonline->avatar)))
                                        <img class="avatar-lg rounded" style="object-fit: cover"
                                            src="{{ asset('storage/' . $studentonline->avatar) }}">
                                    @else
                                        <img class="avatar-lg rounded" style="object-fit: cover"
                                            src="{{ asset('user.webp') }}">
                                    @endif
                                </div>
                                <div class="ms-2">
                                    <h5 class="mt-1 m-0 fw-semibold">{{ $studentonline->name }}</h5>
                                    <p class="mt-1 m-0 text-muted">{{ $studentonline->school }}</p>
                                    <div class="d-flex m-0 gap-2">
                                        <span
                                            class="badge px-4 py-1 text-uppercase {{ $studentonline->acepted == 1 ? 'bg-success' : 'bg-danger' }} mt-1">{{ $studentonline->acepted == '0' ? 'Tidak aktif' : 'Aktif' }}</span>
                                        <span
                                            class="badge px-4 py-1 text-uppercase {{ $studentonline->internship_type == 'online' ? 'bg-primary' : 'bg-danger' }} mt-1">{{ $studentonline->internship_type == 'online' ? 'online' : 'offline' }}</span>
                                    </div>
                                    <p class=" mt-1"><strong class="fs-6">RFID: </strong><span
                                            class="text-muted">{{ $studentonline->rfid == null ? '-' : $studentonline->rfid }}</span>
                                    </p>
                                </div>
                                <div class="d-flex justify-content-end w-100">
                                    <div class="dropdown card-header-dropdown">
                                        <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <span class="text-muted fs-16"><i
                                                    class="mdi mdi-dots-vertical align-center"></i></span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item"
                                                href="/menu-siswa/face/{{ $studentonline->id }}">Wajah</a>
                                            <button class="dropdown-item btn-reset" type="button"
                                                data-id="{{ $studentonline->id }}">Reset Password</button>
                                            <button class="dropdown-item btn-ban"
                                                data-id="{{ $studentonline->id }}">Banned</button>
                                            <button class="dropdown-item btn-change" data-id="{{ $studentonline->id }}"
                                                data-image="{{ $student->avatar }}">Ganti
                                                Profile</button>
                                            <button class="dropdown-item btn-detail"
                                                data-name="{{ $studentonline->name }}"
                                                data-majors="{{ $studentonline->major }}"
                                                data-class="{{ $studentonline->class }}"
                                                data-phone="{{ $studentonline->phone }}"
                                                data-address="{{ $studentonline->address }}"
                                                data-birthdate="{{ \carbon\Carbon::parse($studentonline->birth_date)->locale('id_ID')->isoFormat('D MMMM YYYY') }}"
                                                data-birthplace="{{ $studentonline->birth_place }}"
                                                data-startdate="{{ \carbon\Carbon::parse($studentonline->start_date)->locale('id_ID')->isoFormat('D MMMM YYYY') }}"
                                                data-finishdate="{{ \carbon\Carbon::parse($studentonline->finish_date)->locale('id_ID')->isoFormat('D MMMM YYYY') }}"
                                                data-school="{{ $studentonline->school }}"
                                                data-email="{{ $studentonline->email }}"
                                                data-avatar="{{ file_exists(public_path('storage/' . $student->avatar)) ? asset('storage/' . $student->avatar) : asset('user.webp') }}"
                                                data-cv="{{ file_exists(public_path('storage/' . $student->cv)) ? asset('storage/' . $student->cv) : asset('no data.png') }}"
                                                data-selfstatement="{{ file_exists(public_path('storage/' . $student->self_statement)) ? asset('storage/' . $student->self_statement) : asset('no data.png') }}"
                                                data-parentsstatement="{{ file_exists(public_path('storage/' . $student->parents_statement)) ? asset('storage/' . $student->parents_statement) : asset('no data.png') }}"
                                                data-identify_number="{{ $studentonline->identify_number }}">Detail</button>
                                            <button class="dropdown-item btn-delete text-danger"
                                                id="{{ $studentonline->id }}"
                                                data-id="{{ $studentonline->id }}">Hapus</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 d-flex justify-content-center text-center">
                        <img src="{{ asset('no data.png') }}" width="200px" alt="">
                    </div>
                    <h5 class="mt-3 text-center">Tidak ada data</h5>
                @endforelse
            </div>
        </div>
    </div>

    @if (session('message'))
        <div id="message" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-modal="true"
            role="dialog">
            <div class="modal-dialog">
                <div class="modal-content text-center">
                    <div class="modal-header">
                    </div>
                    <div class="modal-body">
                        <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 24 24"
                            class="bg-success rounded-circle icon" fill="none" stroke="white" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-check">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M5 12l5 5l10 -10" />
                        </svg>
                        <h4 class="text-dark fs-7 mb-0 mt-3">{{ session('message') }}</h4>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="button" class="btn btn-success" data-bs-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- offcanvas -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header border-bottom">
            <h5 class="offcanvas-title" id="offcanvasRightLabel">Detail Siswa</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body p-0 overflow-hidden">
            <div data-simplebar="init" style="height: calc(100vh - 112px);" class="simplebar-scrollable-y">
                <div class="simplebar-wrapper" style="margin: 0px;">
                    <div class="simplebar-height-auto-observer-wrapper">
                        <div class="simplebar-height-auto-observer"></div>
                    </div>
                    <div class="simplebar-mask mt-4 overflow-y-scroll">
                        <div class="d-flex justify-content-center align-items-center">
                            <img src="" class="avatar-xl rounded-circle show-image" alt=""
                                style="object-fit: cover">
                        </div>
                        <div class="d-flex justify-content-center align-items-center mt-4">
                            <h4 class="show-name"></h4>
                        </div>
                        <div class="row mx-2">
                            <div class="col-6 d-flex align-items-center gap-1">
                                <i class="bx bx-id-card fs-3 text-primary"></i>
                                <p class="m-0 show-identify_number"></p>
                            </div>
                            <div class="col-6 d-flex  align-items-center gap-1">
                                <i class="ri-mail-line fs-3 text-primary"></i>
                                <p class="m-0 show-email" style="word-break: break-all"></p>
                            </div>
                            <div class="col-6 d-flex align-items-center gap-1">
                                <i class=" ri-smartphone-line fs-3 text-primary"></i>
                                <p class="m-0 show-phone"></p>
                            </div>
                            <div class="col-6 d-flex align-items-center gap-1">
                                <i class="ri-map-pin-user-line fs-3 text-primary"></i>
                                <p class="m-0 show-address"></p>
                            </div>
                            <div class="col-6 d-flex align-items-center gap-1">
                                <i class="ri-gift-2-line fs-3 text-primary"></i>
                                <p class="m-0 show-birthday"></p>
                            </div>
                            <div class="col-6 d-flex align-items-center gap-1">
                                <i class="ri-building-line fs-3 text-primary"></i>
                                <p class="m-0 show-school"></p>
                            </div>
                            <div class="col-6 d-flex align-items-center gap-1">
                                <i class="ri-calendar-line fs-3 text-primary"></i>
                                <p class="m-0 show-start"></p>
                            </div>
                            <div class="col-6 d-flex align-items-center gap-1">
                                <i class="ri-calendar-line fs-3 text-primary"></i>
                                <p class="m-0 show-finish"></p>
                            </div>
                        </div>
                        <div class="mt-3 mx-4">
                            <h4>CV</h4>
                            <img class="rounded show-cv" alt="200x200" width="330" src="gambar.jpg"
                                style="object-fit: cover; cursor: pointer;" onclick="zoomImage(this)">
                        </div>
                        <div class="mt-3 mx-4">
                            <h4>Pernyataan Orang tua</h4>
                            <img class="rounded show-parent-statement" alt="200x200" width="330" src=""
                                style="object-fit: cover;cursor: pointer;" onclick="zoomImage(this)">
                        </div>
                        <div class="mt-3 mx-4">
                            <h4>Pernyataan Diri</h4>
                            <img class="rounded show-self-statement" alt="200x200" width="330" src=""
                                style="object-fit: cover;cursor: pointer;" onclick="zoomImage(this)">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.components.delete-modal-component')

    <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
        style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Ubah Foto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                </div>
                <form action="" method="POST" id="form-change" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label">Foto</label>
                                <br>
                                <img src="" class="rounded show-image avatar-lg object-fit-cover" alt="">

                                <input type="file" name="avatar" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary ">Simpan</button>
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                        </div>

                    </div><!-- /.modal-content -->
                </form>
            </div><!-- /.modal-dialog -->
        </div>
    </div>
    <div id="modal-join" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
        style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Tambah Divisi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                </div>
                <form action="" method="POST" id="form-join" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label">Pilih Divisi</label>
                                <select class="form-select" name="division_id">
                                    <option disabled selected>Pilih Divisi</option>
                                    @forelse ($divisions as $division)
                                        <option value="{{ $division->id }}">{{ $division->name }}</option>
                                    @empty
                                        <option value="">Tidak ada divisi</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary ">Simpan</button>
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                        </div>

                    </div><!-- /.modal-content -->
                </form>
            </div><!-- /.modal-dialog -->
        </div>
    </div>

    <div class="modal fade" id="modal-ban" tabindex="-1" aria-labelledby="modal-resetLabel1">
        <div class="modal-dialog " role="document">
            <form id="form-ban" method="POST">
                @method('PUT')
                @csrf
                <div class="modal-content">
                    <div class="modal-header d-flex align-items-center">
                        <h5 class="modal-title" id="modal-resetLabel1">
                            Konfirmasi Banned Siswa
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="text-dark fs-7 mb-0">Apakah anda yakin ingin memban siswa?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light  font-medium waves-effect" data-bs-dismiss="modal">
                            Tidak
                        </button>
                        <button type="submit" class="btn text-white btn-success">
                            Yakin
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    @include('admin.components.reset-modal-component')
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function() {
            $("#message").modal('show');
        });
    </script>

    <script>
        $('.btn-detail').click(function() {
            let id = $(this).data('id');
            let name = $(this).data('name');
            let avatar = $(this).data('avatar');
            let address = $(this).data('address');
            let phone = $(this).data('phone');
            let birth_date = $(this).data('birthdate');
            let birth_place = $(this).data('birthplace');
            let start_date = $(this).data('startdate');
            let finish_date = $(this).data('finishdate');
            let school = $(this).data('school');
            let cv = $(this).data('cv');
            let self_statement = $(this).data('selfstatement');
            let parents_statement = $(this).data('parentsstatement');
            let email = $(this).data('email');
            let identify_number = $(this).data('identify_number');

            $('.show-name').text(name);
            $('.show-identify_number').text(identify_number);
            $('.show-email').text(email);
            $('.show-image').attr('src', avatar);
            $('.show-address').text(address);
            $('.show-phone').text(phone);
            $('.show-birthday').text(birth_place + ',' + birth_date)
            $('.show-start').text(start_date);
            $('.show-school').text(school);
            $('.show-finish').text(finish_date);

            // console.log(cv);
            $('.show-cv').attr('src', cv);

            // console.log(parents_statement);
            $('.show-parent-statement').attr('src', parents_statement);

            // console.log(self_statement);
            $('.show-self-statement').attr('src', self_statement);


            $('.btn-delete').attr('data-id', id);
            $('.btn-accept').attr('data-id', id);
            $('.btn-reject').attr('data-id', id);

            $('#form-declined').attr('action', 'approval/decline/' + id);
            $('#offcanvasRight').offcanvas('show');
        });

        $('.btn-change').click(function() {
            let id = $(this).data('id');
            let image = $(this).data('image');
            $('#form-change').attr('action', '/menu-siswa/update/' + id);
            $('.show-image').attr('src', image);
            $('#myModal').modal('show');
        });

        $('.btn-delete').click(function() {
            let id = $(this).data('id');
            $('#form-delete').attr('action', '/menu-siswa/delete/' + id);
            $('#modal-delete').modal('show');
        });

        $('.btn-join').click(function() {
            let id = $(this).data('id');
            $('#form-join').attr('action', '/menu-siswa/update/' + id);
            $('#modal-join').modal('show');
        });

        $('.btn-reset').click(function() {
            let id = $(this).data('id');
            $('#form-reset').attr('action', '/menu-siswa/reset-password/' + id);
            $('#modal-reset').modal('show');
        });

        $('.btn-ban').click(function() {
            let id = $(this).data('id');
            $('#form-ban').attr('action', '/menu-siswa/banned/' + id);
            $('#modal-ban').modal('show');
        })
    </script>

    <script>
        function zoomImage(img) {
            // Membuat elemen overlay
            var overlay = document.createElement('div');
            overlay.style.position = 'fixed';
            overlay.style.top = 0;
            overlay.style.left = 0;
            overlay.style.width = '100%';
            overlay.style.height = '100%';
            overlay.style.backgroundColor = 'rgba(0, 0, 0, 0.8)';
            overlay.style.zIndex = 9999;
            overlay.style.display = 'flex';
            overlay.style.alignItems = 'center';
            overlay.style.justifyContent = 'center';

            // Membuat elemen gambar yang diperbesar
            var zoomedImg = document.createElement('img');
            zoomedImg.src = img.src;
            zoomedImg.style.maxWidth = '90%';
            zoomedImg.style.maxHeight = '90%';

            // Menambahkan gambar ke dalam overlay
            overlay.appendChild(zoomedImg);

            // Menambahkan overlay ke dalam body
            document.body.appendChild(overlay);

            // Menghapus overlay saat diklik
            overlay.onclick = function() {
                document.body.removeChild(overlay);
            };
        }
    </script>
@endsection
