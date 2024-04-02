@extends('mentor.layouts.app')
@section('content')

<div class="card bg-light-info shadow-none position-relative overflow-hidden">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Tantangan</h4>
                <nav aria-label="breadcrumb mt-2">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-muted " href="/siswa-offline">Beranda</a></li>
                        <li class="breadcrumb-item" aria-current="page">Tantangan</li>
                    </ol>
                </nav>
            </div>
            <div class="col-3">
                <div class="text-center mb-n5">
                    <img src="{{ asset('assets-user/dist/images/breadcrumb/ChatBc.png') }}" alt="" class="img-fluid mb-n4">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid note-has-grid overflow-hidden">
    <ul class="nav nav-pills p-3 mb-3 rounded align-items-center card flex-md-row flex-column">
        <div class="col-md-4 col-xl-2 mb-3 mb-md-0">
            <form class="position-relative">
                <input type="text" class="form-control product-search ps-5" id="input-search" placeholder="Search Contacts...">
                <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
            </form>
        </div>
        <li class="nav-item ms-auto">
            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#addModal">
                Tambah Tantangan
            </button>
        </li>
    </ul>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Tambah Tantangan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="dropdownMenu" class="form-label">Tingkat Kesulitan</label>
                    <select class="form-select" id="dropdownMenu" aria-label="Pilih Opsi">
                        <option selected>Pilih tingkat kesulitan</option>
                        <option value="Biasa">Biasa</option>
                        <option value="Sedang">Sedang</option>
                        <option value="Sulit">Sulit</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="inputText" class="form-label">Judul</label>
                    <input type="text" class="form-control" id="inputText" placeholder="Masukkan Judul Tantangan">
                </div>
                <div class="mb-3">
                    <label for="textarea" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="textarea" rows="3" placeholder="Masukkan Deskripsi Tantangan "></textarea>
                </div>
                <div class="mb-3">
                    <label for="datePicker" class="form-label">Tanggal Mulai</label>
                    <input type="date" class="form-control" id="datePicker">
                </div>
                <div class="mb-3">
                    <label for="datePicker" class="form-label">Tenggat</label>
                    <input type="date" class="form-control" id="datePicker">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>

<div class="d-flex flex-wrap  all-category note-important">
    <div class="p-1 col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-wrap gap-2 align-items-center">
                    <p class="badge bg-primary-subtle text-primary" style="font-size: 12px">
                        Batas: 29 oktober 2023 10:33
                    </p>
                    <p class="badge bg-info-subtle text-info" style="font-size: 12px">
                        Mudah
                    </p>
                    <div class="flex-grow-1 mb-3 text-end">
                        <div class="dropdown d-inline-block">
                            <button class="bg-transparent border-0 dropdown text-center" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M5 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                    <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                    <path d="M19 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                </svg>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <button type="button" class="dropdown-item edit-item-btn btn-detail text-center" data-bs-toggle="modal" data-bs-target="#editModal">
                                    Edit
                                    </button>
                                </li>
                                <li>
                                    <button type="button" class="dropdown-item edit-item-btn text-danger btn-detail text-center">
                                    Hapus
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <h5>Lorem ipsum dolor sit, amet consectetur adipisicing.</h5>
                <p class="text-mute">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Assumenda inventore molestias...
                </p>
            </div>
        </div>
    </div>

    <div class="p-1 col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-wrap gap-2 align-items-center">
                    <p class="badge bg-primary-subtle text-primary" style="font-size: 12px">
                        Batas: 29 oktober 2023 10:33
                    </p>
                    <p class="badge bg-warning-subtle text-warning" style="font-size: 12px">
                        Sedang
                    </p>
                    <div class="flex-grow-1 mb-3 text-end">
                        <div class="dropdown d-inline-block">
                            <button class="bg-transparent border-0 dropdown text-center" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M5 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                    <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                    <path d="M19 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                </svg>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <button type="button" class="dropdown-item edit-item-btn btn-detail text-center" data-bs-toggle="modal" data-bs-target="#editModal">
                                    Edit
                                    </button>
                                </li>
                                <li>
                                    <button type="button" class="dropdown-item edit-item-btn text-danger btn-detail text-center">
                                    Hapus
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <h5>Lorem ipsum dolor sit, amet consectetur adipisicing.</h5>
                <p class="text-mute">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Assumenda inventore molestias...
                </p>
            </div>
        </div>
    </div>

    <div class="p-1 col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-wrap gap-2 align-items-center">
                    <p class="badge bg-primary-subtle text-primary" style="font-size: 12px">
                        Batas: 29 oktober 2023 10:33
                    </p>
                    <p class="badge bg-danger-subtle text-danger" style="font-size: 12px">
                        Sulit
                    </p>
                    <div class="flex-grow-1 mb-3 text-end">
                        <div class="dropdown d-inline-block">
                            <button class="bg-transparent border-0 dropdown text-center" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M5 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                    <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                    <path d="M19 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                </svg>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <button type="button" class="dropdown-item edit-item-btn btn-detail text-center" data-bs-toggle="modal" data-bs-target="#editModal">
                                    Edit
                                    </button>
                                </li>
                                <li>
                                    <button type="button" class="dropdown-item edit-item-btn text-danger btn-detail text-center">
                                    Hapus
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <h5>Lorem ipsum dolor sit, amet consectetur adipisicing.</h5>
                <p class="text-mute">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Assumenda inventore molestias...
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Tambah Tantangan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="dropdownMenu" class="form-label">Tingkat Kesulitan</label>
                    <select class="form-select" id="dropdownMenu" aria-label="Pilih Opsi">
                        <option selected>Pilih tingkat kesulitan</option>
                        <option value="Biasa">Biasa</option>
                        <option value="Sedang">Sedang</option>
                        <option value="Sulit">Sulit</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="inputText" class="form-label">Judul</label>
                    <input type="text" class="form-control" id="inputText" placeholder="Masukkan Judul Tantangan">
                </div>
                <div class="mb-3">
                    <label for="textarea" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="textarea" rows="3" placeholder="Masukkan Deskripsi Tantangan "></textarea>
                </div>
                <div class="mb-3">
                    <label for="datePicker" class="form-label">Tanggal Mulai</label>
                    <input type="date" class="form-control" id="datePicker">
                </div>
                <div class="mb-3">
                    <label for="datePicker" class="form-label">Tenggat</label>
                    <input type="date" class="form-control" id="datePicker">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>

@endsection
