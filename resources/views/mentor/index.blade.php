@extends('mentor.layouts.app')
@section('content')


    {{-- <div class="row">
        <div class="col-lg-6 d-flex align-items-stretch">
            <div class="card w-100 bg-light-info overflow-hidden shadow-none">
                <div class="card-body position-relative">
                    <div class="row">
                        <div class="col-sm-7">
                            <div class="d-flex align-items-center mb-7">
                                <div class="rounded-circle overflow-hidden me-6">
                                    <img src="{{ asset('assets-user/dist/images/profile/user-1.jpg') }}" width="40" height="40" alt="">
                                </div>
                                <h5 class="fw-semibold mb-0 fs-5">Welcome back Mathew Anderson!</h5>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="border-end pe-4 border-muted border-opacity-10">
                                    <h3 class="mb-1 fw-semibold fs-8 d-flex align-content-center">Mentor</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="welcome-bg-img mb-n7 text-end">
                                <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/backgrounds/welcome-bg.svg"
                                alt="" class="img-fluid" style="width: 300px; height: auto;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 align-items-stretch">
            <div class="card bg-light-primary shadow-none">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <div class="round rounded bg-primary d-flex align-items-center justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-backpack" style="color: white">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M5 18v-6a6 6 0 0 1 6 -6h2a6 6 0 0 1 6 6v6a3 3 0 0 1 -3 3h-8a3 3 0 0 1 -3 -3z" />
                                <path d="M10 6v-1a2 2 0 1 1 4 0v1" />
                                <path d="M9 21v-4a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v4" />
                                <path d="M11 10h2" />
                            </svg>
                        </div>
                        <h6 class="mb-0 ms-3">BTC</h6>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mt-4">
                        <div class="mb-0 fw-semibold fs-7">10 Materi</div>
                        <span class="fw-bold">$1,015.00</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 align-items-stretch">
            <div class="card bg-light-primary shadow-none">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <div class="round rounded bg-primary d-flex align-items-center justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-backpack" style="color: white">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M5 18v-6a6 6 0 0 1 6 -6h2a6 6 0 0 1 6 6v6a3 3 0 0 1 -3 3h-8a3 3 0 0 1 -3 -3z" />
                                <path d="M10 6v-1a2 2 0 1 1 4 0v1" />
                                <path d="M9 21v-4a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v4" />
                                <path d="M11 10h2" />
                            </svg>
                        </div>
                        <h6 class="mb-0 ms-3">BTC</h6>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mt-4">
                        <div class="mb-0 fw-semibold fs-7">10 Materi</div>
                        <span class="fw-bold">$1,015.00</span>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}


    <div class="row flex-wrap">
        <div class="col-lg-8">
            <div class=" d-flex align-items-stretch">
                <div class="card w-100 bg-light-info overflow-hidden shadow-none" >
                    <div class="card-body position-relative">
                        <div class="row">
                            <div class="col-md-12 ">
                                <div class="d-flex align-items-center mb-3 flex-column flex-sm-row">
                                    <div class="d-flex align-items-center justify-content-center overflow-hidden me-sm-6 mb-3 mb-sm-0" style="width: 40px; height: 40px;">
                                        <img src="{{ asset('assets-user/dist/images/profile/user-1.jpg') }}" alt="" class="img-fluid rounded-circle" style="object-fit: cover;">
                                    </div>
                                    <h5 class="fw-semibold mb-3 mb-sm-0 fs-5 text-center text-sm-start">Selamat Datang {{ auth()->user()->name }}!</h5>
                                </div>
                                <div class="d-flex align-items-center mt-4">
                                    <div class="border-end pe-4 border-muted border-opacity-10">
                                        <h4>Mentor Website</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="welcome-bg-img mb-n7 text-end">
                                    <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/backgrounds/welcome-bg.svg"
                                        alt="" class="img-fluid" style="width: 300px; height: auto;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-body">
                <h4>Siswa</h4>
                <div class="table-responsive">
                    <table class="table search-table align-middle text-nowrap">
                        <thead class="header-item">
                            <tr>
                                <th>Siswa</th>
                                <th>Email</th>
                                <th>Sekolah</th>
                                <th>No. Hp</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="search-items">
                                <td class="d-flex">
                                    <div class="n-chk align-self-center text-center">
                                        <img src="{{ asset('assets-user/dist/images/profile/user-1.jpg') }}" alt="avatar" class="rounded-circle" width="35">
                                    </div>
                                    <div class="ms-3">
                                        <div class="user-meta-info">
                                            <h6 class="user-name mb-0" data-name="Emma Adams">Emma Adams</h6>
                                            <span class="user-work fs-3" data-occupation="Web Developer">Web Developer</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h6 class="usr-email-addr">adams@mail.com</h6>
                                </td>
                                <td>
                                    <h6>Boston, USA</h6>
                                </td>
                                <td>
                                    <h6>+91 (070) 123-4567</h6>
                                </td>
                            </tr>
                            <tr class="search-items">
                                <td class="d-flex">
                                    <div class="n-chk align-self-center text-center">
                                        <img src="{{ asset('assets-user/dist/images/profile/user-2.jpg') }}" alt="avatar" class="rounded-circle" width="35">
                                    </div>
                                    <div class="ms-3">
                                        <div class="user-meta-info">
                                            <h6 class="user-name mb-0" data-name="Emma Adams">Emma Adams</h6>
                                            <span class="user-work fs-3" data-occupation="Web Developer">Web Developer</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h6 class="usr-email-addr">adams@mail.com</h6>
                                </td>
                                <td>
                                    <h6>Boston, USA</h6>
                                </td>
                                <td>
                                    <h6>+91 (070) 123-4567</h6>
                                </td>
                            </tr>
                            <tr class="search-items">
                                <td class="d-flex">
                                    <div class="n-chk align-self-center text-center">
                                        <img src="{{ asset('assets-user/dist/images/profile/user-3.jpg') }}" alt="avatar" class="rounded-circle" width="35">
                                    </div>
                                    <div class="ms-3">
                                        <div class="user-meta-info">
                                            <h6 class="user-name mb-0" data-name="Emma Adams">Emma Adams</h6>
                                            <span class="user-work fs-3" data-occupation="Web Developer">Web Developer</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h6 class="usr-email-addr">adams@mail.com</h6>
                                </td>
                                <td>
                                    <h6>Boston, USA</h6>
                                </td>
                                <td>
                                    <h6>+91 (070) 123-4567</h6>
                                </td>
                            </tr>
                            <tr class="search-items">
                                <td class="d-flex">
                                    <div class="n-chk align-self-center text-center">
                                        <img src="{{ asset('assets-user/dist/images/profile/user-4.jpg') }}" alt="avatar" class="rounded-circle" width="35">
                                    </div>
                                    <div class="ms-3">
                                        <div class="user-meta-info">
                                            <h6 class="user-name mb-0" data-name="Emma Adams">Emma Adams</h6>
                                            <span class="user-work fs-3" data-occupation="Web Developer">Web Developer</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h6 class="usr-email-addr">adams@mail.com</h6>
                                </td>
                                <td>
                                    <h6>Boston, USA</h6>
                                </td>
                                <td>
                                    <h6>+91 (070) 123-4567</h6>
                                </td>
                            </tr>
                            <tr class="search-items">
                                <td class="d-flex">
                                    <div class="n-chk align-self-center text-center">
                                        <img src="{{ asset('assets-user/dist/images/profile/user-4.jpg') }}" alt="avatar" class="rounded-circle" width="35">
                                    </div>
                                    <div class="ms-3">
                                        <div class="user-meta-info">
                                            <h6 class="user-name mb-0" data-name="Emma Adams">Emma Adams</h6>
                                            <span class="user-work fs-3" data-occupation="Web Developer">Web Developer</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h6 class="usr-email-addr">adams@mail.com</h6>
                                </td>
                                <td>
                                    <h6>Boston, USA</h6>
                                </td>
                                <td>
                                    <h6>+91 (070) 123-4567</h6>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <div class="col-lg-4">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card bg-light-warning shadow-none">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="round rounded bg-warning d-flex align-items-center justify-content-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-backpack" style="color: white">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M5 18v-6a6 6 0 0 1 6 -6h2a6 6 0 0 1 6 6v6a3 3 0 0 1 -3 3h-8a3 3 0 0 1 -3 -3z" />
                                        <path d="M10 6v-1a2 2 0 1 1 4 0v1" />
                                        <path d="M9 21v-4a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v4" />
                                        <path d="M11 10h2" />
                                    </svg>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-4">
                                <h3 class="mb-0 fw-semibold fs-5">10 materi</h3>
                                <span class="fw-bold">materi</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card bg-light-danger shadow-none">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="round rounded bg-danger d-flex align-items-center justify-content-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-calendar-month" style="color: white">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z" />
                                        <path d="M16 3v4" />
                                        <path d="M8 3v4" />
                                        <path d="M4 11h16" />
                                        <path d="M7 14h.013" />
                                        <path d="M10.01 14h.005" />
                                        <path d="M13.01 14h.005" />
                                        <path d="M16.015 14h.005" />
                                        <path d="M13.015 17h.005" />
                                        <path d="M7.01 17h.005" />
                                        <path d="M10.01 17h.005" />
                                    </svg>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-4">
                                <h3 class="mb-0 fw-semibold fs-5">4 jadwal</h3>
                                <span class="fw-bold">jadwal</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card bg-light-primary shadow-none">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="round rounded bg-primary d-flex align-items-center justify-content-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-clipboard-copy" style="color: white">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h3m9 -9v-5a2 2 0 0 0 -2 -2h-2" />
                                        <path d="M13 17v-1a1 1 0 0 1 1 -1h1m3 0h1a1 1 0 0 1 1 1v1m0 3v1a1 1 0 0 1 -1 1h-1m-3 0h-1a1 1 0 0 1 -1 -1v-1" />
                                        <path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                                      </svg>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-4">
                                <h3 class="mb-0 fw-semibold fs-5">10 materi</h3>
                                <span class="fw-bold">materi</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="card bg-light-success shadow-none">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="round rounded bg-success d-flex align-items-center justify-content-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-user" style="color: white">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M12 2a5 5 0 1 1 -5 5l.005 -.217a5 5 0 0 1 4.995 -4.783z" />
                                        <path d="M14 14a5 5 0 0 1 5 5v1a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-1a5 5 0 0 1 5 -5h4z" />
                                      </svg>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-4">
                                <h3 class="mb-0 fw-semibold fs-5">200 siswa</h3>
                                <span class="fw-bold">siswa</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 col-md-6 col-sm-12 mb-4">
                <h5 class="mb-3">Jadwal Hari Ini</h5>
                <div class="card h-100">
                    <div class="card-header text-bg-primary d-flex align-items-center rounded-top-4">
                        <h4 class="card-title text-white mb-0">Belajar Laravel 11</h4>
                        <div class="ms-auto d-flex">
                            <span class="mb-1 badge bg-light text-dark">Mendatang</span>
                        </div>
                    </div>
                    <div class="card-body collapse show">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6>12 Maret 2024</h6>
                            </div>
                            <div>
                                <h6>08.00 - 09.00</h6>
                            </div>
                        </div>
                        <div class="mx-3 mt-3">
                            <h6>Link Meet :</h6>
                            <a href="#">Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur ipsam fugiat tenetur.</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
