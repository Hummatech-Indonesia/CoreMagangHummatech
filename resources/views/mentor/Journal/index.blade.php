@extends('mentor.layouts.app')
@section('content')
<div class="card bg-light-info shadow-none position-relative overflow-hidden">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Jurnal Siswa</h4>
                <nav aria-label="breadcrumb mt-2">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-muted " href="/siswa-offline">Dashboard</a></li>
                        <li class="breadcrumb-item" aria-current="page">jurnal</li>
                    </ol>
                </nav>
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


    <div class="row mb-3">
        <div class="col-md-4 col-xl-3">
            <form class="position-relative">
                <input type="text" class="form-control product-search ps-5" id="input-search" placeholder="Search Contacts...">
                <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
            </form>
        </div>
        <div class="col-md-8 col-xl-9 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
            <div class="action-btn show-btn" style="display: none">
                <a href="javascript:void(0)" class="delete-multiple btn-light-danger btn me-2 text-danger d-flex align-items-center font-medium">
                    <i class="ti ti-trash text-danger me-1 fs-5"></i>
                    Delete All Row

                </a>
            </div>
        </div>
    </div>


<div class="row">
    <div class="card card-body">
        <div class="table-responsive">
            <table class="table search-table align-middle text-nowrap">
                <thead class="header-item">
                    <tr>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="search-items">
                        <td class="d-flex">
                            <div class="n-chk align-self-center text-center">
                                <img src="{{ asset('assets-user/dist/images/breadcrumb/ChatBc.png') }}" alt="avatar" class="rounded-circle" width="35">
                            </div>
                            <div class="ms-3">
                                <div class="user-meta-info">
                                    <h6 class="user-name mb-0" data-name="Emma Adams">Emma Adams</h6>
                                    <span class="user-work fs-3" data-occupation="Web Developer">Web Developer</span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="usr-email-addr">12 Maret 2024</span>
                        </td>
                        <td>
                            <span class="badge fw-semibold bg-light-success text-success">Mengisi</span>
                        </td>
                        <td class="text-break">
                            <span>
                                Hari ini saya membuat website crud laravel 11, dengan ketentuan <br>15 tabel dan 8 relasi,dengan tenggat waktu 2 minggu
                            </span>
                        </td>
                        <td>
                            <a href="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-eye">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                    <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                </svg>
                            </a>
                        </td>
                    </tr>
                    <tr class="search-items">
                        <td class="d-flex">
                            <div class="n-chk align-self-center text-center">
                                <img src="{{ asset('assets-user/dist/images/breadcrumb/ChatBc.png') }}" alt="avatar" class="rounded-circle" width="35">
                            </div>
                            <div class="ms-3">
                                <div class="user-meta-info">
                                    <h6 class="user-name mb-0" data-name="Emma Adams">Emma Adams</h6>
                                    <span class="user-work fs-3" data-occupation="Web Developer">Web Developer</span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="usr-email-addr">12 Maret 2024</span>
                        </td>
                        <td>
                            <span class="badge fw-semibold bg-light-danger text-danger">Tidak Mengisi</span>
                        </td>
                        <td class="text-break">
                            <span>
                                Hari ini saya membuat website crud laravel 11, dengan ketentuan <br>15 tabel dan 8 relasi,dengan tenggat waktu 2 minggu
                            </span>
                        </td>
                        <td>
                            <a href="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-eye">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                    <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                </svg>
                            </a>
                        </td>
                    </tr>
                    <tr class="search-items">
                        <td class="d-flex">
                            <div class="n-chk align-self-center text-center">
                                <img src="{{ asset('assets-user/dist/images/breadcrumb/ChatBc.png') }}" alt="avatar" class="rounded-circle" width="35">
                            </div>
                            <div class="ms-3">
                                <div class="user-meta-info">
                                    <h6 class="user-name mb-0" data-name="Emma Adams">Emma Adams</h6>
                                    <span class="user-work fs-3" data-occupation="Web Developer">Web Developer</span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="usr-email-addr">12 Maret 2024</span>
                        </td>
                        <td>
                            <span class="badge fw-semibold bg-light-success text-success">Mengisi</span>
                        </td>
                        <td class="text-break">
                            <span>
                                Hari ini saya membuat website crud laravel 11, dengan ketentuan <br>15 tabel dan 8 relasi,dengan tenggat waktu 2 minggu
                            </span>
                        </td>
                        <td>
                            <a href="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-eye">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                    <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                </svg>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<nav aria-label="...">
    <ul class="pagination justify-content-center mb-0 mt-4">
        <li class="page-item">
            <a class="page-link border-0 rounded-circle text-dark round-32 d-flex align-items-center justify-content-center" href="#">
                <i class="ti ti-chevron-left"></i>
            </a>
        </li>
        <li class="page-item active">
            <a href="#" class="page-link border-0 rounded-circle round-32 mx-1 d-flex align-items-center justify-content-center">1</a>
        </li>
        <li class="page-item">
            <a href="#" class="page-link border-0 rounded-circle round-32 mx-1 d-flex align-items-center justify-content-center">2</a>
        </li>
        <li class="page-item">
            <a href="#" class="page-link border-0 rounded-circle round-32 mx-1 d-flex align-items-center justify-content-center">3</a>
        </li>
        <li class="page-item">
            <a href="#" class="page-link border-0 rounded-circle round-32 mx-1 d-flex align-items-center justify-content-center">...</a>
        </li>
        <li class="page-item">
            <a href="#" class="page-link border-0 rounded-circle round-32 mx-1 d-flex align-items-center justify-content-center">5</a>
        </li>
        <li class="page-item">
            <a href="#" class="page-link border-0 rounded-circle text-dark round-32 mx-1 d-flex align-items-center justify-content-center">
                <i class="ti ti-chevron-right"></i>
            </a>
        </li>
    </ul>
</nav>

@endsection
