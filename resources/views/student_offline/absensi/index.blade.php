@extends('student_offline.layouts.app')
@section('content')
<div class="card bg-light-info shadow-none position-relative overflow-hidden">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Optimalkan Kehadiran dan Kedisiplinan Siswa: Inovasi Terkini dalam <br> Manajemen Absensi</h4>
                <nav aria-label="breadcrumb mt-2">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-muted " href="/siswa-offline">Dashboard</a></li>
                        <li class="breadcrumb-item" aria-current="page">Absensi</li>
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
    <div class="col text-end">
        <button class="btn btn-success me-2">Absen</button>
        <button class="btn btn-danger me-2">
            Ekspor PDF
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-file-type-pdf">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                <path d="M5 12v-7a2 2 0 0 1 2 -2h7l5 5v4" />
                <path d="M5 18h1.5a1.5 1.5 0 0 0 0 -3h-1.5v6" />
                <path d="M17 18h2" />
                <path d="M20 15h-3v6" />
                <path d="M11 15v6h1a2 2 0 0 0 2 -2v-2a2 2 0 0 0 -2 -2h-1z" />
              </svg>
        </button>
        <button class="btn btn-primary">Buat Izin</button>
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
                        <th>Keterangan</th>
                        <th>Masuk</th>
                        <th>Istirahat</th>
                        <th>Kembali</th>
                        <th>Pulang</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="search-items">
                        <td class="d-flex">
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
                            <span class="badge fw-semibold bg-light-success text-success">Masuk</span>
                        </td>
                        <td>
                            <span>07.30</span>
                        </td>
                        <td>
                            <span class="badge fw-semibold bg-light-danger text-danger">Tidak Absen</span>
                        </td>
                        <td>
                            <span class="badge fw-semibold bg-light-warning text-warning">01.02</span>
                        </td>
                        <td>
                            <span>04.01</span>
                        </td>
                    </tr>
                    <tr class="search-items">
                        <td class="d-flex">
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
                            <span class="badge fw-semibold bg-light-warning text-warning">Izin</span>
                        </td>
                        <td>
                            <span>07.30</span>
                        </td>
                        <td>
                            <span class="badge fw-semibold bg-light-danger text-danger">Tidak Absen</span>
                        </td>
                        <td>
                            <span class="badge fw-semibold bg-light-warning text-warning">01.02</span>
                        </td>
                        <td>
                            <span>04.01</span>
                        </td>
                    </tr>
                    <tr class="search-items">
                        <td class="d-flex">
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
                            <span class="badge fw-semibold bg-light-danger text-danger">Alpha</span>
                        </td>
                        <td>
                            <span>07.30</span>
                        </td>
                        <td>
                            <span class="badge fw-semibold bg-light-danger text-danger">Tidak Absen</span>
                        </td>
                        <td>
                            <span class="badge fw-semibold bg-light-warning text-warning">01.02</span>
                        </td>
                        <td>
                            <span>04.01</span>
                        </td>
                </tbody>
            </table>
        </div>
    </div>
</div>

<nav aria-label="...">
    <ul class="pagination justify-content-end mb-0 mt-3">
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
