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


<div class="row mb-3">
    <div class="col-md-4 col-xl-2">
        <form class="position-relative">
            <input type="text" class="form-control product-search ps-5" id="input-search" placeholder="Search Contacts...">
            <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
        </form>
    </div>
    <div class="col-md-4 col-xl-1">
        <select class="form-select">
            <option selected>Semua</option>
            <option value="1">Option 1</option>
            <option value="2">Option 2</option>
            <option value="3">Option 3</option>
        </select>
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
                        <th>Keterangan</th>
                        <th>Masuk</th>
                        <th>Pulang</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($attendances as $attendance)
                    <tr class="search-items">
                        <td class="d-flex">
                            <div class="n-chk align-self-center text-center">
                                <img src="{{ asset('assets-user/dist/images/breadcrumb/ChatBc.png') }}" alt="avatar" class="rounded-circle" width="35">
                            </div>
                            <div class="ms-3">
                                <div class="user-meta-info">
                                    <h6 class="user-name mb-0" data-name="Emma Adams">{{ $attendance->name }}</h6>
                                    <span class="user-work fs-3" data-occupation="Web Developer">{{ $attendance->division->name }}</span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="usr-email-addr">{{ now()->format('d M Y') }}</span>
                        </td>
                        <td>
                            @if (isset($attendance->attendances[0]))
                                @if ($attendance->attendances[0]->status == 'masuk')
                                    <span class="badge bg-success">{{ $attendance->attendances[0]->status }}</span>
                                @endif
                                @if ($attendance->attendances[0]->status == 'izin')
                                    <span class="badge bg-warning">{{ $attendance->attendances[0]->status }}</span>
                                @endif
                                @if ($attendance->attendances[0]->status == 'sakit')
                                    <span class="badge bg-warning">{{ $attendance->attendances[0]->status }}</span>
                                @endif
                                @if ($attendance->attendances[0]->status == 'alpha')
                                    <span class="badge bg-danger">{{ $attendance->attendances[0]->status }}</span>
                                @endif
                            @else
                                <div class="badge bg-danger-subtle text-danger py-2 px-3">
                                    @php
                                        $waktuSaatIni = \Carbon\Carbon::now();
                                        $waktuJamDelapan = \Carbon\Carbon::today()->setHour(8);
                                    @endphp

                                    @if ($waktuSaatIni->greaterThan($waktuJamDelapan))
                                        <span class="badge bg-danger">Alpha</span>
                                    @else
                                        <span class="badge bg-danger">Belum Hadir</span>
                                    @endif

                                </div>
                            @endif
                        </td>
                        <td>
                            @if (isset($attendance->attendances[0]))
                                @foreach ($attendance->attendances[0]->attendanceDetails as $detailAttendance)
                                    @if ($detailAttendance->status == 'present')
                                        @if (date('H:i:s', strtotime($detailAttendance->created_at)) <=
                                                \Carbon\Carbon::createFromFormat('H:i:s', $rule?->checkin_ends ?? "08:00:00")->addMinutes(1)->format('H:i:s'))
                                            <span>{{ dateFormatted($detailAttendance->created_at) }}</span>
                                        @else
                                            <span>{{ dateFormatted($detailAttendance->created_at) }}</span>
                                        @endif
                                    @endif
                                @endforeach
                            @endif
                        </td>
                        <td>
                            @if (isset($attendance->attendances[0]))
                                @foreach ($attendance->attendances[0]->attendanceDetails as $detailAttendance)
                                    @if ($detailAttendance->status == 'return')
                                        @if (date('H:i:s', strtotime($detailAttendance->created_at)) <=
                                                \Carbon\Carbon::createFromFormat('H:i:s', $rule?->checkout_ends ?? '20:00:00')->addMinutes(1)->format('H:i:s'))
                                            <span>{{ dateFormatted($detailAttendance->created_at) }}</span>
                                        @else
                                            <span>{{ dateFormatted($detailAttendance->created_at) }}</span>
                                        @endif
                                    @endif
                                @endforeach
                            @endif
                        </td>
                    </tr>
                    @endforeach
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
