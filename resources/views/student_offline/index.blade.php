@extends('student_offline.layouts.app')
@section('content')
    <div class="row gap-2 flex-wrap">
        <div class="col-lg-12">
            <div class=" d-flex align-items-stretch">
                <div class="card w-100 bg-light-info overflow-hidden shadow-none">
                    <div class="card-body position-relative">
                        <div class="row">
                            <div class="col-md-12 ">
                                <div class="d-flex align-items-center mb-3 flex-column flex-sm-row">
                                    <div class="d-flex align-items-center justify-content-center overflow-hidden me-sm-6 mb-3 mb-sm-0"
                                        style="width: 40px; height: 40px;">
                                        @if (auth()->user()->student && !empty(auth()->user()->student->avatar))
                                            @php
                                                $avatarPath = 'storage/' . auth()->user()->student->avatar;
                                                $avatarExists = file_exists(public_path($avatarPath));
                                            @endphp

                                            @if ($avatarExists)
                                                <img src="{{ asset($avatarPath) }}" class="img-fluid rounded-circle"
                                                    style="object-fit: cover;" />
                                            @else
                                                <img src="{{ asset('user.webp') }}" class="img-fluid rounded-circle"
                                                    style="object-fit: cover;" />
                                            @endif
                                        @else
                                            <img src="{{ asset('user.webp') }}" class="img-fluid rounded-circle"
                                                style="object-fit: cover;" />
                                        @endif
                                    </div>
                                    <h5 class="fw-semibold mb-3 mb-sm-0 fs-5 text-center text-sm-start">Selamat Datang
                                        {{ auth()->user()->name }}!
                                    </h5>
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

            <!-- Row for data statistics and attendance -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="card w-100 h-100">
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

                <div class="col-lg-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="pt-2">
                                    <h5 class="card-title fw-semibold">Data Absensi</h5>
                                    <p class="card-subtitle mb-5">Tahun ini</p>
                                </div>
                                <div>
                                    @if ($workFromHomes)
                                        <form action="{{ route('attendance.online.store') }}" method="post">
                                            @csrf
                                            @method('POST')
                                            <button class="btn btn-success me-2" type="submit">Absen</button>
                                        </form>
                                    @else
                                    @endif
                                </div>
                            </div>
                            <div id="chart-absen" class="pt-4"></div>
                        </div>
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
            series: [{{ $attends }}, {{ $absent }}, {{ $permissions }}, {{ $sick }}],
            chart: {
                type: 'donut',
                height: 400
            },
            labels: ['Hadir', 'Sakit', 'Izin', 'Alpha'],
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
        var fillin = @json($fillinJournal);
        var notfillin = @json($notFillinJournal);

        var options = {
            series: [{
                name: 'Mengisi',
                data: fillin.map(item => item.journal)
            }, {
                name: 'Tidak Mengisi',
                data: notfillin.map(item => item.journal)
            }],
            chart: {
                type: 'bar',
                height: '530px',
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
                categories: fillin.map(item => item.month),
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return val + " kali"
                    }
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart-journal"), options);
        chart.render();
    </script>
@endsection
