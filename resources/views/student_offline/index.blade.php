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

                {{-- <div class="col-lg-4">
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
                </div> --}}
            </div>
        </div>
    </div>



    <!-- <div class="all-category note-important">
        <div class="d-flex align-items-center mb-3 pt-3">
            <h5 class="mb-0">Materi Baru</h5>
        </div>
        <div class="d-flex flex-wrap">
            @foreach (range(1, 4) as $item)
    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                <div class="card m-2">
                    <img class="card-img-top img-responsive w-100"
                        src="{{ asset('assets-user/dist/images/blog/blog-img10.jpg') }}" style="object-fit: cover;"
                        alt="Card image cap" />
                    <div class="d-flex justify-content-between px-3" style="margin-top: -27px">
                        <img src="{{ asset('assets-user/dist/images/profile/user-1.jpg') }}" class="rounded-circle rounded"
                            width="50px">
                        <div class="px-2 py-1 rounded-2 rounded" style="background: #fff; font-size: 12px;">Website</div>
                    </div>
                    <div class="card-body">
                        <a href="/siswa-offline/course/detail/" style="font-size: 15px" class="text-dark">
                            Tutorial Restful API Next.js dan Prisma
                        </a>
                        <div class="d-flex justify-content-between pt-3">
                            <div class="gap-2 d-flex">
                                <svg width="19" height="17" viewBox="0 0 19 17" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" class="mt-1">
                                    <path
                                        d="M10.554 2.375H17.8013M10.554 5.875H15.0835M10.554 11.125H17.8013M10.554 14.625H15.0835M1.49487 2.375C1.49487 2.14294 1.59032 1.92038 1.76021 1.75628C1.9301 1.59219 2.16052 1.5 2.40078 1.5H6.02442C6.26469 1.5 6.49511 1.59219 6.665 1.75628C6.83489 1.92038 6.93033 2.14294 6.93033 2.375V5.875C6.93033 6.10706 6.83489 6.32962 6.665 6.49372C6.49511 6.65781 6.26469 6.75 6.02442 6.75H2.40078C2.16052 6.75 1.9301 6.65781 1.76021 6.49372C1.59032 6.32962 1.49487 6.10706 1.49487 5.875V2.375ZM1.49487 11.125C1.49487 10.8929 1.59032 10.6704 1.76021 10.5063C1.9301 10.3422 2.16052 10.25 2.40078 10.25H6.02442C6.26469 10.25 6.49511 10.3422 6.665 10.5063C6.83489 10.6704 6.93033 10.8929 6.93033 11.125V14.625C6.93033 14.8571 6.83489 15.0796 6.665 15.2437C6.49511 15.4078 6.26469 15.5 6.02442 15.5H2.40078C2.16052 15.5 1.9301 15.4078 1.76021 15.2437C1.59032 15.0796 1.49487 14.8571 1.49487 14.625V11.125Z"
                                        stroke="#5D87FF" stroke-width="1.6" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                                <p class="text-muted">24 Tugas</p>
                            </div>
                            <div class="gap-2 d-flex">
                                <svg width="20" height="16" viewBox="0 0 20 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" class="mt-1">
                                    <path
                                        d="M10 14.4165C8.74584 13.6924 7.32318 13.3112 5.875 13.3112C4.42682 13.3112 3.00416 13.6924 1.75 14.4165V2.49982C3.00416 1.77573 4.42682 1.39453 5.875 1.39453C7.32318 1.39453 8.74584 1.77573 10 2.49982M10 14.4165C11.2542 13.6924 12.6768 13.3112 14.125 13.3112C15.5732 13.3112 16.9958 13.6924 18.25 14.4165V2.49982C16.9958 1.77573 15.5732 1.39453 14.125 1.39453C12.6768 1.39453 11.2542 1.77573 10 2.49982M10 14.4165V2.49982"
                                        stroke="#5D87FF" stroke-width="1.6" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                                <p class="text-muted">2 Materi</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    @endforeach
        </div>
    </div> -->

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
                height: 400
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
                        return  val + " kali"
                    }
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart-journal"), options);
        chart.render();
    </script>
@endsection
