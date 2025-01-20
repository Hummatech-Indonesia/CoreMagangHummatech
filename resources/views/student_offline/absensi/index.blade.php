@extends('student_offline.layouts.app')

@section('content')
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Optimalkan Kehadiran dan Kedisiplinan Siswa: Inovasi Terkini dalam <br>
                        Manajemen Absensi</h4>
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

    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card mb-4 bg-light-primary">
                    <a href="/siswa-offline/absensi" class="stretched-link"></a>
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-3">
                                <div
                                    class="bg-primary text-light rounded d-flex align-items-center justify-content-center p-2">

                                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36"
                                         viewBox="0 0 24 24" fill="currentColor"
                                         class="icon icon-tabler icons-tabler-filled icon-tabler-balloon">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path
                                            d="M12 1a7 7 0 0 1 7 7c0 5.457 -3.028 10 -7 10c-3.9 0 -6.89 -4.379 -6.997 -9.703l-.003 -.297l.004 -.24a7 7 0 0 1 6.996 -6.76zm0 4a1 1 0 0 0 0 2l.117 .007a1 1 0 0 1 .883 .993l.007 .117a1 1 0 0 0 1.993 -.117a3 3 0 0 0 -3 -3z"/>
                                        <path
                                            d="M12 16a1 1 0 0 1 .993 .883l.007 .117v1a3 3 0 0 1 -2.824 2.995l-.176 .005h-3a1 1 0 0 0 -.993 .883l-.007 .117a1 1 0 0 1 -2 0a3 3 0 0 1 2.824 -2.995l.176 -.005h3a1 1 0 0 0 .993 -.883l.007 -.117v-1a1 1 0 0 1 1 -1z"/>
                                    </svg>


                                </div>
                            </div>

                            <div class="col-9">
                                <div>
                                    <h6 class="card-subtitle mb-0">Total Absensi</h6>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="d-flex justify-content-between">
                                <h3>{{ $total }} Kali</h3>
                                <span class="ml-auto">Absensi</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card mb-4 bg-light-success">
                    <a href="/siswa-offline/absensi?status=attend" class="stretched-link"></a>
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-3">
                                <div
                                    class="bg-success text-light rounded d-flex align-items-center justify-content-center p-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36"
                                         viewBox="0 0 24 24" fill="currentColor"
                                         class="icon icon-tabler icons-tabler-filled icon-tabler-user">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M12 2a5 5 0 1 1 -5 5l.005 -.217a5 5 0 0 1 4.995 -4.783z"/>
                                        <path
                                            d="M14 14a5 5 0 0 1 5 5v1a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-1a5 5 0 0 1 5 -5h4z"/>
                                    </svg>
                                </div>

                            </div>

                            <div class="col-9">
                                <div>
                                    <h6 class="card-subtitle mb-0">Total Hadir</h6>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="d-flex justify-content-between">
                                <h3>{{ $attends }} Kali</h3>
                                <span class="ml-auto">Absensi</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card mb-4 bg-light-warning">
                    <a href="/siswa-offline/absensi?status=absent" class="stretched-link"></a>
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-3">
                                <div
                                    class="bg-warning text-light rounded d-flex align-items-center justify-content-center p-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36"
                                         viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                         stroke-linecap="round" stroke-linejoin="round"
                                         class="icon icon-tabler icons-tabler-outline icon-tabler-mail">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path
                                            d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z"/>
                                        <path d="M3 7l9 6l9 -6"/>
                                    </svg>
                                </div>
                            </div>

                            <div class="col-9">
                                <div>
                                    <h6 class="card-subtitle mb-0">Total Izin & Sakit</h6>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="d-flex justify-content-between">
                                <h3>{{ $permissions }} Kali</h3>
                                <span class="ml-auto">Absensi</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card mb-4 bg-light-danger">
                    <a href="/siswa-offline/absensi?status=alpha" class="stretched-link"></a>
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-3">
                                <div
                                    class="bg-danger text-light rounded d-flex align-items-center justify-content-center p-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36"
                                         viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                         stroke-linecap="round" stroke-linejoin="round"
                                         class="icon icon-tabler icons-tabler-outline icon-tabler-drone">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M10 10h4v4h-4z"/>
                                        <path d="M10 10l-3.5 -3.5"/>
                                        <path d="M9.96 6a3.5 3.5 0 1 0 -3.96 3.96"/>
                                        <path d="M14 10l3.5 -3.5"/>
                                        <path d="M18 9.96a3.5 3.5 0 1 0 -3.96 -3.96"/>
                                        <path d="M14 14l3.5 3.5"/>
                                        <path d="M14.04 18a3.5 3.5 0 1 0 3.96 -3.96"/>
                                        <path d="M10 14l-3.5 3.5"/>
                                        <path d="M6 14.04a3.5 3.5 0 1 0 3.96 3.96"/>
                                    </svg>
                                </div>
                            </div>

                            <div class="col-9">
                                <div>
                                    <h6 class="card-subtitle mb-0">Total Alpha</h6>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="d-flex justify-content-between">
                                <h3>{{ $absent }} Kali</h3>
                                <span class="ml-auto">Absensi</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>






    <div class="row mb-3">
        <div class="col text-end">
            <div class="d-flex gap-2 justify-content-end">
                @if ($workFromHomes)
                    <form action="{{ route('attendance.online.store') }}" method="post">
                        @csrf
                        @method('POST')
                        <button class="btn btn-success me-2" type="submit">Absen</button>
                    </form>
                @else
                @endif
                <button type="button" class="btn mb-1 btn-light-warning text-warning btn-lg px-4 fs-4 font-medium ms-3"
                        data-bs-toggle="modal" data-bs-target="#printAbsensiModal">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                         class="h-5 w-5 ltr:mr-2 rtl:ml-2">
                        <path
                            d="M15.3929 4.05365L14.8912 4.61112L15.3929 4.05365ZM19.3517 7.61654L18.85 8.17402L19.3517 7.61654ZM21.654 10.1541L20.9689 10.4592V10.4592L21.654 10.1541ZM3.17157 20.8284L3.7019 20.2981H3.7019L3.17157 20.8284ZM20.8284 20.8284L20.2981 20.2981L20.2981 20.2981L20.8284 20.8284ZM14 21.25H10V22.75H14V21.25ZM2.75 14V10H1.25V14H2.75ZM21.25 13.5629V14H22.75V13.5629H21.25ZM14.8912 4.61112L18.85 8.17402L19.8534 7.05907L15.8947 3.49618L14.8912 4.61112ZM22.75 13.5629C22.75 11.8745 22.7651 10.8055 22.3391 9.84897L20.9689 10.4592C21.2349 11.0565 21.25 11.742 21.25 13.5629H22.75ZM18.85 8.17402C20.2034 9.3921 20.7029 9.86199 20.9689 10.4592L22.3391 9.84897C21.9131 8.89241 21.1084 8.18853 19.8534 7.05907L18.85 8.17402ZM10.0298 2.75C11.6116 2.75 12.2085 2.76158 12.7405 2.96573L13.2779 1.5653C12.4261 1.23842 11.498 1.25 10.0298 1.25V2.75ZM15.8947 3.49618C14.8087 2.51878 14.1297 1.89214 13.2779 1.5653L12.7405 2.96573C13.2727 3.16993 13.7215 3.55836 14.8912 4.61112L15.8947 3.49618ZM10 21.25C8.09318 21.25 6.73851 21.2484 5.71085 21.1102C4.70476 20.975 4.12511 20.7213 3.7019 20.2981L2.64124 21.3588C3.38961 22.1071 4.33855 22.4392 5.51098 22.5969C6.66182 22.7516 8.13558 22.75 10 22.75V21.25ZM1.25 14C1.25 15.8644 1.24841 17.3382 1.40313 18.489C1.56076 19.6614 1.89288 20.6104 2.64124 21.3588L3.7019 20.2981C3.27869 19.8749 3.02502 19.2952 2.88976 18.2892C2.75159 17.2615 2.75 15.9068 2.75 14H1.25ZM14 22.75C15.8644 22.75 17.3382 22.7516 18.489 22.5969C19.6614 22.4392 20.6104 22.1071 21.3588 21.3588L20.2981 20.2981C19.8749 20.7213 19.2952 20.975 18.2892 21.1102C17.2615 21.2484 15.9068 21.25 14 21.25V22.75ZM21.25 14C21.25 15.9068 21.2484 17.2615 21.1102 18.2892C20.975 19.2952 20.7213 19.8749 20.2981 20.2981L21.3588 21.3588C22.1071 20.6104 22.4392 19.6614 22.5969 18.489C22.7516 17.3382 22.75 15.8644 22.75 14H21.25ZM2.75 10C2.75 8.09318 2.75159 6.73851 2.88976 5.71085C3.02502 4.70476 3.27869 4.12511 3.7019 3.7019L2.64124 2.64124C1.89288 3.38961 1.56076 4.33855 1.40313 5.51098C1.24841 6.66182 1.25 8.13558 1.25 10H2.75ZM10.0298 1.25C8.15538 1.25 6.67442 1.24842 5.51887 1.40307C4.34232 1.56054 3.39019 1.8923 2.64124 2.64124L3.7019 3.7019C4.12453 3.27928 4.70596 3.02525 5.71785 2.88982C6.75075 2.75158 8.11311 2.75 10.0298 2.75V1.25Z"
                            fill="currentColor"/>
                        <path opacity="0.5"
                              d="M13 2.5V5C13 7.35702 13 8.53553 13.7322 9.26777C14.4645 10 15.643 10 18 10H22"
                              stroke="currentColor" stroke-width="1.5"/>
                    </svg>
                    PDF
                </button>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#izinModal">
                    Buat Izin
                </button>
            </div>
            {{-- <button class="btn btn-danger me-2">
                Ekspor PDF
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-file-type-pdf">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                    <path d="M5 12v-7a2 2 0 0 1 2 -2h7l5 5v4" />
                    <path d="M5 18h1.5a1.5 1.5 0 0 0 0 -3h-1.5v6" />
                    <path d="M17 18h2" />
                    <path d="M20 15h-3v6" />
                    <path d="M11 15v6h1a2 2 0 0 0 2 -2v-2a2 2 0 0 0 -2 -2h-1z" />
                </svg>
            </button> --}}
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
                    <th>Istirahat</th>
                    <th>Kembali</th>
                    <th>Pulang</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($attendances as $attendance)
                    <tr>
                        <td>{{ auth()->user()->student->name }}</td>
                        {{-- <td>{{ \Carbon\Carbon::parse($attendance->created_at)->format('Y-m-d') }}</td> --}}
                        <td> {{ \Carbon\Carbon::parse($attendance->created_at)->locale('id_ID')->isoFormat('dddd , D MMMM YYYY') }}
                        </td>
                        <td>
                            @if ($attendance->status == 'masuk')
                                <span class="badge bg-success-subtle text-success py-2 px-3">
                                        {{ $attendance->status }}
                                    </span>
                            @endif
                            @if ($attendance->status == 'izin')
                                <span class="badge bg-warning-subtle text-warning py-2 px-3">
                                        {{ $attendance->status }}
                                    </span>
                            @endif
                            @if ($attendance->status == 'sakit')
                                <span class="badge bg-warning-subtle text-warning py-2 px-3">
                                        {{ $attendance->status }}
                                    </span>
                            @endif
                            @if ($attendance->status == 'alpha')
                                <span class="badge bg-danger-subtle text-danger py-2 px-3">
                                        {{ $attendance->status }}
                                    </span>
                            @endif

                        </td>
                        <td>
                            @foreach ($attendance->attendanceDetails as $detailAttendance)
                                @if ($detailAttendance->status == 'present')
                                    @if (date('H:i:s', strtotime($detailAttendance->created_at)) <=
                                            \Carbon\Carbon::createFromFormat('H:i:s', '08:00:00')->addMinutes(1)->format('H:i:s'))
                                        <span
                                            class="badge bg-success-subtle text-success py-2 px-3">{{ \Carbon\Carbon::parse($detailAttendance->created_at)->setTimezone('Asia/Jakarta')->format('H:i') }}</span>
                                    @else
                                        <span
                                            class="badge bg-danger-subtle text-danger py-2 px-3">{{ \Carbon\Carbon::parse($detailAttendance->created_at)->setTimezone('Asia/Jakarta')->format('H:i') }}</span>
                                    @endif
                                @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($attendance->attendanceDetails as $detailAttendance)
                                @if ($detailAttendance->status == 'break')
                                    @if (date('H:i:s', strtotime($detailAttendance->created_at)) >=
                                            \Carbon\Carbon::createFromFormat('H:i:s', '11:00:00')->addMinutes(1)->format('H:i:s') &&
                                            date('H:i:s', strtotime($detailAttendance->created_at)) <
                                                \Carbon\Carbon::createFromFormat('H:i:s', '13:00:00')->addMinutes(1)->format('H:i:s'))
                                        <span
                                            class="badge bg-success-subtle text-success py-2 px-3">{{ \Carbon\Carbon::parse($detailAttendance->created_at)->setTimezone('Asia/Jakarta')->format('H:i') }}</span>
                                    @else
                                        <span
                                            class="badge bg-danger-subtle text-danger py-2 px-3">{{ \Carbon\Carbon::parse($detailAttendance->created_at)->setTimezone('Asia/Jakarta')->format('H:i') }}</span>
                                    @endif
                                @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($attendance->attendanceDetails as $detailAttendance)
                                @if ($detailAttendance->status == 'return_break')
                                    <span
                                        class="badge bg-success-subtle text-success py-2 px-3">{{ \Carbon\Carbon::parse($detailAttendance->created_at)->setTimezone('Asia/Jakarta')->format('H:i') }}</span>
                                @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($attendance->attendanceDetails as $detailAttendance)
                                @if ($detailAttendance->status == 'return')
                                    @if (date('H:i:s', strtotime($detailAttendance->created_at)) <=
                                            \Carbon\Carbon::createFromFormat('H:i:s', '08:00:00')->addMinutes(1)->format('H:i:s'))
                                        <span
                                            class="badge bg-success-subtle text-success py-2 px-3">{{ \Carbon\Carbon::parse($detailAttendance->created_at)->setTimezone('Asia/Jakarta')->format('H:i') }}</span>
                                    @else
                                        <span
                                            class="badge bg-success-subtle text-success py-2 px-3">{{ \Carbon\Carbon::parse($detailAttendance->created_at)->setTimezone('Asia/Jakarta')->format('H:i') }}</span>
                                    @endif
                                @endif
                            @endforeach
                        </td>
                    </tr>
                    {{-- <tr class="search-items">
                        <td class="d-flex">
                            <div class="ms-3">
                                <div class="user-meta-info">
                                    <h6 class="user-name mb-0" data-name="Emma Adams">{{ $attendance->name }}</h6>
                                    <span class="user-work fs-3" data-occupation="Web Developer">Web Developer</span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="usr-email-addr">12 Maret 2024</span>
                        </td>
                        <td>
                            <span
                                class="badge fw-semibold bg-light-success text-success">{{ $attendance->attendances[0]->status }}</span>
                        </td>
                        <td>
                            @if (isset($student->attendances[0]))
                                @foreach ($student->attendances[0]->attendanceDetails as $detailAttendance)
                                    @if ($detailAttendance->status == 'present')
                                        @if (date('H:i:s', strtotime($detailAttendance->created_at)) <= \Carbon\Carbon::createFromFormat('H:i:s', '08:00:00')->addMinutes(1)->format('H:i:s'))
                                            <span>{{ date('H:i', strtotime($detailAttendance->created_at)) }}</span>
                                        @else
                                            <span>{{ date('H:i', strtotime($detailAttendance->created_at)) }}</span>
                                        @endif
                                    @endif
                                @endforeach
                            @endif
                        </td>
                        <td>
                            @if (isset($student->attendances[0]))
                                @foreach ($student->attendances[0]->attendanceDetails as $detailAttendance)
                                    @if ($detailAttendance->status == 'break')
                                        @if (date('H:i:s', strtotime($detailAttendance->created_at)) <= \Carbon\Carbon::createFromFormat('H:i:s', '08:00:00')->addMinutes(1)->format('H:i:s'))
                                            <span>{{ date('H:i', strtotime($detailAttendance->created_at)) }}</span>
                                        @else
                                            <span
                                                class="badge fw-semibold bg-light-warning text-warning">{{ date('H:i', strtotime($detailAttendance->created_at)) }}</span>
                                        @endif
                                    @endif
                                @endforeach
                            @endif
                        </td>
                        <td>
                            @if (isset($student->attendances[0]))
                                @foreach ($student->attendances[0]->attendanceDetails as $detailAttendance)
                                    @if ($detailAttendance->status == 'return_break')
                                        @if (date('H:i:s', strtotime($detailAttendance->created_at)) <= \Carbon\Carbon::createFromFormat('H:i:s', '08:00:00')->addMinutes(1)->format('H:i:s'))
                                            <span>{{ date('H:i', strtotime($detailAttendance->created_at)) }}</span>
                                        @else
                                            <span
                                                class="badge fw-semibold bg-light-warning text-warning">{{ date('H:i', strtotime($detailAttendance->created_at)) }}</span>
                                        @endif
                                    @endif
                                @endforeach
                            @endif
                        </td>
                        <td>
                            @if (isset($student->attendances[0]))
                                @foreach ($student->attendances[0]->attendanceDetails as $detailAttendance)
                                    @if ($detailAttendance->status == 'return')
                                        @if (date('H:i:s', strtotime($detailAttendance->created_at)) <= \Carbon\Carbon::createFromFormat('H:i:s', '08:00:00')->addMinutes(1)->format('H:i:s'))
                                            <span>{{ date('H:i', strtotime($detailAttendance->created_at)) }}</span>
                                        @else
                                            <span
                                                class="badge fw-semibold bg-light-warning text-warning">{{ date('H:i', strtotime($detailAttendance->created_at)) }}</span>
                                        @endif
                                    @endif
                                @endforeach
                            @endif
                        </td>
                    </tr> --}}
                @empty
                    <tr>
                        <td colspan="8" class="text-center">
                            <div class="col-md-12 text-center">
                                <img src="{{ asset('assets-user/dist/images/products/empty-shopping-bag.gif') }}"
                                     alt="No Data" height="120px"/>
                                <h3 class="text-center">Data Masih Kosong</h3>
                            </div>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Izin Modal -->
    <div class="modal fade" id="izinModal" tabindex="-1" aria-labelledby="izinModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="izinModalLabel">Tambah Izin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/permission" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">

                        <!-- Start Date -->
                        <div class="mb-3">
                            <label for="izinStartDate" class="form-label">Dari Tanggal</label>
                            <input type="date" class="form-control @error('start') is-invalid @enderror"
                                   id="izinStartDate" name="start" value="{{ old('start') }}">
                            @error('start', 'create')
                            <div class="invalid-feedback error-create d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- End Date -->
                        <div class="mb-3">
                            <label for="izinEndDate" class="form-label">Sampai Tanggal</label>
                            <input type="date" class="form-control @error('end') is-invalid @enderror"
                                   id="izinEndDate" name="end" value="{{ old('end') }}">
                            @error('end', 'create')
                            <div class="invalid-feedback error-create d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Proof -->
                        <div class="mb-3">
                            <label for="izinProof" class="form-label">Bukti</label>
                            <input type="file" class="form-control @error('proof') is-invalid @enderror"
                                   id="izinProof" name="proof">
                            @error('proof', 'create')
                            <div class="invalid-feedback error-create d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div class="mb-3">
                            <label for="keteranganTextarea" class="form-label">Deskripsi</label>
                            <textarea class="form-control @error('description') is-invalid @enderror"
                                      id="keteranganTextarea" name="description"
                                      rows="3" placeholder="Masukkan deskripsi">{{ old('description') }}</textarea>
                            @error('description', 'create')
                            <div class="invalid-feedback error-create d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Status -->
                        <div class="mb-3">
                            <div>
                                <label for="statusIzin" class="form-label">Status Izin</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input @error('status') is-invalid @enderror" type="radio"
                                       name="status" id="izinDiterima" value="izin"
                                    {{ old('status') == 'izin' ? 'checked' : '' }}>
                                <label class="form-check-label" for="izinDiterima">Izin</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input @error('status') is-invalid @enderror" type="radio"
                                       name="status" id="izinDitolak" value="sakit"
                                    {{ old('status') == 'sakit' ? 'checked' : '' }}>
                                <label class="form-check-label" for="izinDitolak">Sakit</label>
                            </div>
                            @error('status', 'create')
                            <div class="invalid-feedback error-create d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Modal Footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="printAbsensiModal" tabindex="-1" aria-labelledby="printAbsensiModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="printAbsensiModalLabel">Cetak Jurnal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="printJournalForm" action="{{ url('/absen/export/pdf') }}" method="GET">
                        <div class="mb-3">
                            <label for="yearSelect" class="form-label">Tahun</label>
                            <select class="form-select" id="yearSelect" name="year">
                                @foreach ($years as $yearOption)
                                    <option value="{{ $yearOption }}" {{ $yearOption == $year ? 'selected' : '' }}>
                                        {{ $yearOption }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        @php
                            use Carbon\Carbon;

                            $months = [];
                            for ($i = 1; $i <= 12; $i++) {
                                $months[] = [
                                    'value' => $i,
                                    'name' => Carbon::create()->month($i)->locale('id')->format('F'),
                                ];
                            }
                        @endphp

                        <div class="mb-3">
                            <label for="monthSelect" class="form-label">Bulan</label>
                            <select class="form-select" id="monthSelect" name="month">
                                @foreach ($months as $month)
                                    <option value="{{ $month['value'] }}"
                                        {{ $month['value'] == old('month', request('month')) ? 'selected' : '' }}>
                                        {{ $month['name'] }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-danger text-danger font-medium waves-effect"
                            data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-light-primary text-primary font-medium waves-effect"
                            form="printJournalForm">Cetak</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@2"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
            integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Cek session flash dan kesalahan untuk modal create
            const showCreateModal = @json(session('showCreateModal'));
            if (showCreateModal) {
                var createModalErrors = document.querySelectorAll('.error-create');
                if (createModalErrors.length > 0) {
                    var createModalElement = new bootstrap.Modal(document.getElementById('izinModal'));
                    createModalElement.show();
                }
            }
        });
    </script>
@endsection
