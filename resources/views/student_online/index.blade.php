@extends('student_online.layouts.app')
@section('content')
    <div class="row gap-2 flex-wrap">
        <div class="col-lg-8">
            <div class=" d-flex align-items-stretch">
                <div class="card w-100 bg-light-info overflow-hidden shadow-none">
                    <div class="card-body position-relative">
                        <div class="row">
                            <div class="col-md-12 ">
                                <div class="d-flex align-items-center mb-3 flex-column flex-sm-row">
                                    <div class="d-flex align-items-center justify-content-center overflow-hidden me-sm-6 mb-3 mb-sm-0"
                                        style="width: 64px; height: 64px;">
                                        <img src="{{ asset('assets-user/dist/images/profile/user-1.jpg') }}" alt=""
                                            class="img-fluid rounded-circle" style="object-fit: cover;">
                                    </div>
                                    <div class="d-flex flex-column gap-2">
                                        <h5 class="fw-semibold mb-3 mb-sm-0 fs-5 text-center text-sm-start">
                                            Selamat Datang
                                            {{ auth()->user()->name }}!
                                        </h5>
                                        <h6 class="mb-0">Divisi {{ auth()->user()->student->division->name }}</h6>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="border-end pe-4 border-muted border-opacity-10 mt-2">
                                        <h3>Selamat Datang Kembali Dan Selamat Belajar.</h3>
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


        <div class="row align-items-stretch col-lg-4">
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
                    <div id="chart-absen" class="pt-4"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="all-category note-important">
        <div class="card card-body">
            <div class="d-flex pb-4 justify-content-between align-items-center">
                <div>
                    <h5 class="mb-1">Riwayat Transaksi</h5>
                    <p class="mb-0 text-muted">Semua riwayat transaksi ada disini.</p>
                </div>
                <a href="{{ route('transaction-history.index') }}" class="btn btn-primary">Lihat Semuanya</a>
            </div>
            <div class="table-responsive">
                <table class="table mb-0 search-table align-middle text-nowrap">
                    <thead>
                        <tr>
                            <th scope="col">ID Transaksi</th>
                            <th scope="col">Tanggal Terbit</th>
                            <th scope="col">Tenggat Waktu</th>
                            <th scope="col">Nominal</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($transactions as $transaction)
                            <tr>
                                <th>
                                    <a
                                        href="{{ route('transaction-history.detail', $transaction->transaction_id) }}">#{{ $transaction->transaction_id }}</a>
                                </th>
                                <td>{{ $transaction->issued_at->locale('id_ID')->isoFormat('dddd, D MMMM Y HH:mm \W\I\B') }}
                                </td>
                                <td>{{ $transaction->expired_at->locale('id_ID')->isoFormat('dddd, D MMMM Y HH:mm \W\I\B') }}
                                </td>
                                <td>@currency($transaction->amount)</td>
                                <td>
                                    @php
                                        $status = strtoupper($transaction->status);
                                        $refs = match ($status) {
                                            'PENDING' => \App\Enum\TransactionStatusEnum::PENDING,
                                            'PAID' => \App\Enum\TransactionStatusEnum::PAID,
                                            'CANCELLED' => \App\Enum\TransactionStatusEnum::CANCELLED,
                                            'EXPIRED' => \App\Enum\TransactionStatusEnum::EXPIRED,
                                            'FAILED' => \App\Enum\TransactionStatusEnum::FAILED,
                                            'REFUND' => \App\Enum\TransactionStatusEnum::REFUND,
                                            'UNPAID' => \App\Enum\TransactionStatusEnum::UNPAID,
                                            default => \App\Enum\TransactionStatusEnum::DEFAULT,
                                        };
                                    @endphp
                                    <span class="badge bg-{{ $refs->color() }}">{{ $refs->label() }}</span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">
                                    <div class="text-center">
                                        <img src="{{ asset('assets-user/dist/images/products/empty-shopping-bag.gif') }}"
                                            alt="No Data" height="150px" width="auto" />
                                        <h3>Tidak Ada Data</h3>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
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
    </div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.48.0/apexcharts.min.js"
        integrity="sha512-wqcdhB5VcHuNzKcjnxN9wI5tB3nNorVX7Zz9NtKBxmofNskRC29uaQDnv71I/zhCDLZsNrg75oG8cJHuBvKWGw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.48.0/apexcharts.min.css"
        integrity="sha512-qc0GepkUB5ugt8LevOF/K2h2lLGIloDBcWX8yawu/5V8FXSxZLn3NVMZskeEyOhlc6RxKiEj6QpSrlAoL1D3TA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script>
        var options = {
            series: [44, 55, 41, 17],
            chart: {
                type: 'donut',
                height: 400,
                fontFamily: "'Plus Jakarta Sans', sans-serif",
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
                },
                {
                    name: 'Tidak Mengisi',
                    data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
                }
            ],
            yaxis: {
                labels: {
                    show: false,
                },
            },
            chart: {
                type: 'bar',
                height: '300px',
                fontFamily: "'Plus Jakarta Sans', sans-serif",
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
            grid: {
                borderColor: "rgba(0,0,0,0.1)",
                strokeDashArray: 3,
                xaxis: {
                    lines: {
                        show: false,
                    },
                },
            },
            xaxis: {
                categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
                axisBorder: {
                    show: false,
                },
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return `${val} kali`
                    }
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart-journal"), options);
        chart.render();
    </script>
@endsection
