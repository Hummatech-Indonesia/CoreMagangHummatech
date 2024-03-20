@extends('mentor.layouts.app')
@section('content')
<div class="card bg-light-info shadow-none position-relative overflow-hidden">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Absensi Siswa</h4>
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

<div class="card card-body">
    <div class="row">
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
</div>

<div class="card card-body">
    <div class="table-responsive">
        <table class="table search-table align-middle text-nowrap">
            <thead class="header-item">
                <tr>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                    <th>Masuk</th>
                    <th>Pulang</th>
                </tr>
            </thead>
            <tbody>
                <tr class="search-items">
                    <td class="d-flex">
                        <div class="n-chk align-self-center text-center">
                            <img src="dist/images/products/product-1.jpg" alt="avatar" class="rounded-circle" width="35">
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
                        <span class="badge bg-success">Masuk</span>
                    </td>
                    <td>
                        <span>07.39.10</span>
                    </td>
                    <td>
                        <span>07.39.10</span>
                    </td>
                </tr>
                <tr class="search-items">
                    <td class="d-flex">
                        <div class="n-chk align-self-center text-center">
                            <img src="assets/assets-user/images/profile/user-1.jpg" alt="avatar" class="rounded-circle" width="35">
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
                        <span class="badge bg-warning">Izin</span>
                    </td>
                    <td>
                        <span>07.39.10</span>
                    </td>
                    <td>
                        <span>07.39.10</span>
                    </td>
                </tr>
                <tr class="search-items">
                    <td class="d-flex">
                        <div class="n-chk align-self-center text-center">
                            <img src="assets/images/users/avatar-1.jpg" alt="avatar" class="rounded-circle" width="35">
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
                        <span class="badge bg-danger">Alpha</span>
                    </td>
                    <td>
                        <span>07.39.10</span>
                    </td>
                    <td>
                        <span>07.39.10</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection
