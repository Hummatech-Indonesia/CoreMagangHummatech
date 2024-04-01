@extends('student_online.layouts.app')
@section('content')
    {{-- <div class="row">
        <div class="col-lg-8 d-flex align-items-stretch">
            <div class="card w-100 bg-light-info overflow-hidden shadow-none">
                <div class="card-body position-relative">
                    <div class="row">
                        <div class="col-sm-7">
                            <div class="d-flex align-items-center mb-7">
                                <div class="rounded-circle overflow-hidden me-6">
                                    <img src="{{ asset('assets-user/dist/images/profile/user-1.jpg') }}" alt=""
                                        width="40" height="40">
                                </div>
                                <h5 class="fw-semibold mb-0 fs-5">Welcome back {{ auth()->user()->name }}!</h5>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="border-end pe-4 border-muted border-opacity-10">
                                    <h3 class="mb-1 fw-semibold fs-8 d-flex align-content-center">Divisi {{ auth()->user()->student->division->name }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="welcome-bg-img mb-n7 text-end">
                                <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/backgrounds/welcome-bg.svg"
                                    alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    {{-- <div class="col-md-6 col-lg-4 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body">
                <h5 class="card-title fw-semibold">Sales Overview</h5>
                <p class="card-subtitle mb-2">Every Month</p>
                <div id="sales-overview" class="mb-4"></div>
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <div
                            class="bg-light-primary rounded-2 me-8 p-8 d-flex align-items-center justify-content-center">
                            <i class="ti ti-grid-dots text-primary fs-6"></i>
                        </div>
                        <div>
                            <h6 class="fw-semibold text-dark fs-4 mb-0">$23,450</h6>
                            <p class="fs-3 mb-0 fw-normal">Profit</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div
                            class="bg-light-secondary rounded-2 me-8 p-8 d-flex align-items-center justify-content-center">
                            <i class="ti ti-grid-dots text-secondary fs-6"></i>
                        </div>
                        <div>
                            <h6 class="fw-semibold text-dark fs-4 mb-0">$23,450</h6>
                            <p class="fs-3 mb-0 fw-normal">Expance</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="d-flex gap-2 flex-wrap">
        <div class="col-lg-8">
            <div class=" d-flex align-items-stretch">
                <div class="card w-100 bg-light-info overflow-hidden shadow-none" >
                    <div class="card-body position-relative">
                        <div class="row">
                            <div class="col-sm-7">
                                <div class="d-flex align-items-center mb-3 flex-column flex-sm-row">
                                    <div class="d-flex align-items-center justify-content-center overflow-hidden me-sm-6 mb-3 mb-sm-0" style="width: 40px; height: 40px;">
                                        <img src="{{ asset('assets-user/dist/images/profile/user-1.jpg') }}" alt="" class="img-fluid rounded-circle" style="object-fit: cover;">
                                    </div>
                                    <h5 class="fw-semibold mb-3 mb-sm-0 fs-5 text-center text-sm-start">Selamat Datang {{ auth()->user()->name }}!</h5>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="border-end pe-4 mt-2 border-muted border-opacity-10">
                                        <h4>Divisi {{ auth()->user()->student->division->name }}</h4>
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
            <div class="card w-100">
                <div class="card-body">
                    <div>
                        <div>
                            <h5 class="card-title fw-semibold">Data Statistik Jurnal</h5>
                            <p class="card-subtitle mb-2">Tahun ini</p>
                        </div>
                    </div>
                    <div id="chart-journal"></div>
                </div>
            </div>
        </div>


        <div class="d-flex align-items-stretch">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="pt-2">
                            <h5 class="card-title fw-semibold">Data Absensi</h5>
                            <p class="card-subtitle mb-5">Tahun ini</p>
                        </div>
                        <div>
                            <button class="btn btn-success">Absen</button>
                        </div>
                    </div>
                    <div id="chart-absen" class=""></div>
                </div>
            </div>
        </div>
    </div>

    <div class="all-category note-important">
        <div class="d-flex align-items-center mb-3 pt-3">
            <h5 class="mb-0 ">Riwayat Transaksi</h5>
        </div>

        <div class="row">
            <div class="card card-body">
                <div class="table-responsive">
                    <table class="table search-table align-middle text-nowrap">
                        <thead class="header-item">
                            <tr>
                                <th>Metode Pembayaran</th>
                                <th>Harga</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="search-items">
                                <td class="d-flex">
                                    <div class="ms-3">
                                        <div class="user-meta-info">
                                            <h6 class="user-name mb-0 text-primary" data-name="Emma Adams">Bank Mandiri</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="usr-email-addr">Rp.2.000.000</span>
                                </td>
                                <td>
                                    <span class="usr-email-addr">12 Maret 2024</span>
                                </td>
                                <td>
                                    <span class="mb-1 badge font-medium bg-light-warning text-warning ">Belum Bayar</span>

                                </td>
                                <td>
                                    <div class="action-btn">
                                        <a href="javascript:void(0)" class="text-info edit" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-eye">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                                <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                            </svg>
                                        </a>
                                        <a href="" class="mx-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-trash" style="color: red;">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M4 7l16 0" />
                                                <path d="M10 11l0 6" />
                                                <path d="M14 11l0 6" />
                                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>

                            <tr class="search-items">
                                <td class="d-flex">
                                    <div class="ms-3">
                                        <div class="user-meta-info">
                                            <h6 class="user-name mb-0 text-primary" data-name="Emma Adams">Bank Mandiri</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="usr-email-addr">Rp.2.000.000</span>
                                </td>
                                <td>
                                    <span class="usr-email-addr">12 Maret 2024</span>
                                </td>
                                <td>
                                    <span class="mb-1 badge font-medium bg-light-success text-success ">Berhasil</span>

                                </td>
                                <td>
                                    <div class="action-btn">
                                        <a href="javascript:void(0)" class="text-info edit" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-eye">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                                <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                            </svg>
                                        </a>
                                        <a href="" class="mx-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-trash" style="color: red;">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M4 7l16 0" />
                                                <path d="M10 11l0 6" />
                                                <path d="M14 11l0 6" />
                                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>

                            <tr class="search-items">
                                <td class="d-flex">
                                    <div class="ms-3">
                                        <div class="user-meta-info">
                                            <h6 class="user-name mb-0 text-primary" data-name="Emma Adams">Bank Mandiri</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="usr-email-addr">Rp.2.000.000</span>
                                </td>
                                <td>
                                    <span class="usr-email-addr">12 Maret 2024</span>
                                </td>
                                <td>
                                    <span class="mb-1 badge font-medium text-dark " style="background-color: #4f4f4f1b;">Gagal</span>

                                </td>
                                <td>
                                    <div class="action-btn">
                                        <a href="javascript:void(0)" class="text-info edit" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-eye">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                                <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                            </svg>
                                        </a>
                                        <a href="" class="mx-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-trash" style="color: red;">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M4 7l16 0" />
                                                <path d="M10 11l0 6" />
                                                <path d="M14 11l0 6" />
                                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>

                            <tr class="search-items">
                                <td class="d-flex">
                                    <div class="ms-3">
                                        <div class="user-meta-info">
                                            <h6 class="user-name mb-0 text-primary" data-name="Emma Adams">Bank Mandiri</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="usr-email-addr">Rp.2.000.000</span>
                                </td>
                                <td>
                                    <span class="usr-email-addr">12 Maret 2024</span>
                                </td>
                                <td>
                                    <span class="mb-1 badge font-medium bg-light-danger text-danger ">Kadaluarsa</span>

                                </td>
                                <td>
                                    <div class="action-btn">
                                        <a href="javascript:void(0)" class="text-info edit" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-eye">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                                <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                            </svg>
                                        </a>
                                        <a href="" class="mx-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-trash" style="color: red;">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M4 7l16 0" />
                                                <path d="M10 11l0 6" />
                                                <path d="M14 11l0 6" />
                                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
<div class="modal fade" id="staticBackdrop" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Detail Transaksi</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div>
                <h6>Nama</h6>
                <p>Bagas Ran</p>
            </div>
            <div>
                <h6>Harga</h6>
                <p>Rp.20.000</p>
            </div>
            <div>
                <h6>Stok</h6>
                <p>12</p>
            </div>
            <div>
                <h6>Tanggal</h6>
                <p>12 Maret 2024</p>
            </div>
            <div>
                <h6>Total</h6>
                <p>Rp.20.000</p>
            </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
</div>

@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.48.0/apexcharts.min.js" integrity="sha512-wqcdhB5VcHuNzKcjnxN9wI5tB3nNorVX7Zz9NtKBxmofNskRC29uaQDnv71I/zhCDLZsNrg75oG8cJHuBvKWGw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.48.0/apexcharts.min.css" integrity="sha512-qc0GepkUB5ugt8LevOF/K2h2lLGIloDBcWX8yawu/5V8FXSxZLn3NVMZskeEyOhlc6RxKiEj6QpSrlAoL1D3TA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<script>
    var options = {
        series: [44, 55, 41, 17],
        chart: {
            type: 'donut',
            height: 500
        },
        labels: ['Hadir', 'Telat', 'Izin', 'Alpha'],
        colors: ['#13DEB9', '#5D87FF', '#49BEFF', '#FFAE1F'],
        dataLabels: {
            enabled: false
        },
        plotOptions: {
            pie: {
                donut: {
                    labels: {
                        show: false
                    }
                }
            },
            stroke: {
                show: false
            }
        },
        legend: {
            position: 'bottom'
        },
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    height: 900,
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };

    var chart = new ApexCharts(document.querySelector("#chart-absen"), options);
    chart.render();
</script>

<script>
        var options = {
        series: [{
            name: 'Mengisi',
            data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
        }, {
            name: 'Tidak Mengisi',
            data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
        }],
        chart: {
            type: 'bar',
            height: '230px',
        },
        colors: ['#5D87FF', '#82D2FF'],
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '30%',
                endingShape: 'rounded'
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
        },
        xaxis: {
            categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
        },
        fill: {
            opacity: 1
        },
        tooltip: {
            y: {
                formatter: function (val) {
                    return "$ " + val + " thousands"
                }
            }
        }
    };

    var chart = new ApexCharts(document.querySelector("#chart-journal"), options);
    chart.render();
</script>

@endsection
