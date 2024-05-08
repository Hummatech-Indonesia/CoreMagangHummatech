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
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M12 1a7 7 0 0 1 7 7c0 5.457 -3.028 10 -7 10c-3.9 0 -6.89 -4.379 -6.997 -9.703l-.003 -.297l.004 -.24a7 7 0 0 1 6.996 -6.76zm0 4a1 1 0 0 0 0 2l.117 .007a1 1 0 0 1 .883 .993l.007 .117a1 1 0 0 0 1.993 -.117a3 3 0 0 0 -3 -3z" />
                                        <path
                                            d="M12 16a1 1 0 0 1 .993 .883l.007 .117v1a3 3 0 0 1 -2.824 2.995l-.176 .005h-3a1 1 0 0 0 -.993 .883l-.007 .117a1 1 0 0 1 -2 0a3 3 0 0 1 2.824 -2.995l.176 -.005h3a1 1 0 0 0 .993 -.883l.007 -.117v-1a1 1 0 0 1 1 -1z" />
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
                                <h3>{{ $offlineAttendances->count() }} Kali</h3>
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
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M12 2a5 5 0 1 1 -5 5l.005 -.217a5 5 0 0 1 4.995 -4.783z" />
                                        <path
                                            d="M14 14a5 5 0 0 1 5 5v1a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-1a5 5 0 0 1 5 -5h4z" />
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
                                <h3>56 Kali</h3>
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
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z" />
                                        <path d="M3 7l9 6l9 -6" />
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
                                <h3>56 Kali</h3>
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
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M10 10h4v4h-4z" />
                                        <path d="M10 10l-3.5 -3.5" />
                                        <path d="M9.96 6a3.5 3.5 0 1 0 -3.96 3.96" />
                                        <path d="M14 10l3.5 -3.5" />
                                        <path d="M18 9.96a3.5 3.5 0 1 0 -3.96 -3.96" />
                                        <path d="M14 14l3.5 3.5" />
                                        <path d="M14.04 18a3.5 3.5 0 1 0 3.96 -3.96" />
                                        <path d="M10 14l-3.5 3.5" />
                                        <path d="M6 14.04a3.5 3.5 0 1 0 3.96 3.96" />
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
                                <h3>56 Kali</h3>
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
            <form action="{{ route('attendance.online.store') }}" method="post">
                @csrf
                @method('POST')
                <button class="btn btn-success me-2" type="submit">Absen</button>
            </form> {{-- <button class="btn btn-danger me-2">
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
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#izinModal">
                Buat Izin
            </button>
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
                    @forelse ($offlineAttendances as $attendance)
                        <tr class="search-items">
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
                                            @if (date('H:i:s', strtotime($detailAttendance->created_at)) <=
                                                    \Carbon\Carbon::createFromFormat('H:i:s', '08:00:00')->addMinutes(1)->format('H:i:s'))
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
                                            @if (date('H:i:s', strtotime($detailAttendance->created_at)) <=
                                                    \Carbon\Carbon::createFromFormat('H:i:s', '08:00:00')->addMinutes(1)->format('H:i:s'))
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
                                            @if (date('H:i:s', strtotime($detailAttendance->created_at)) <=
                                                    \Carbon\Carbon::createFromFormat('H:i:s', '08:00:00')->addMinutes(1)->format('H:i:s'))
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
                                            @if (date('H:i:s', strtotime($detailAttendance->created_at)) <=
                                                    \Carbon\Carbon::createFromFormat('H:i:s', '08:00:00')->addMinutes(1)->format('H:i:s'))
                                                <span>{{ date('H:i', strtotime($detailAttendance->created_at)) }}</span>
                                            @else
                                                <span
                                                    class="badge fw-semibold bg-light-warning text-warning">{{ date('H:i', strtotime($detailAttendance->created_at)) }}</span>
                                            @endif
                                        @endif
                                    @endforeach
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">
                                <div class="col-md-12 text-center">
                                    <img src="{{ asset('assets-user/dist/images/products/empty-shopping-bag.gif') }}"
                                        alt="No Data" height="120px" />
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
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="izinStartDate" class="form-label">Dari Tanggal</label>
                            <input type="date" class="form-control" id="izinStartDate">
                        </div>
                        <div class="mb-3">
                            <label for="izinEndDate" class="form-label">Sampai Tanggal</label>
                            <input type="date" class="form-control" id="izinEndDate">
                        </div>
                        <div class="mb-3">
                            <label for="keteranganTextarea" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="keteranganTextarea" rows="3" placeholder="Masukkan deskripsi"></textarea>
                        </div>
                        <div class="mb-3">
                            <div>
                                <label for="statusIzin" class="form-label">Status Izin</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="statusIzin" id="izinDiterima"
                                    value="Diterima">
                                <label class="form-check-label" for="izinDiterima">
                                    Izin
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="statusIzin" id="izinDitolak"
                                    value="Ditolak">
                                <label class="form-check-label" for="izinDitolak">
                                    Sakit
                                </label>
                            </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
@endsection
