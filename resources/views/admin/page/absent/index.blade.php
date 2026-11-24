@extends('admin.layouts.app')
<div hidden>
    @dump(session('success'))
    @dump(session('error'))
</div>

@section('style')
    <style>
        @media (max-width: 767.98px) {
            .ml-mobile-100 {
                margin-left: 100px !important;
            }
        }
    </style>
@endsection

@section('content')

    <div class="card">
        <div class="card-header">
            <div class="row g-2">
                <div class="col-sm-3">
                    <h3 class="mx-1">Absensi Siswa</h3>
                </div>
                <div class="col-sm-auto ms-auto d-flex">
                    <div class="list-grid-nav hstack gap-2">
                        <button class="btn d-inline-flex align-items-center gap-2 text-white"
                            style="background-color: #4B3BC4; border-radius: 9px; padding: 12px 20px;" data-bs-toggle="modal"
                            data-bs-target="#exportExcelModal">
                            <svg width="17" height="18" viewBox="0 0 17 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10.5 0.75H4C2.67392 1.26891 1.51891 2.42392 1 3.75V15.75C1.51891 17.0761 2.67392 18.2311 4 18.75H13.5C14.8261 18.2311 15.9811 17.0761 16.5 15.75V6L10.5 0.75Z"
                                    stroke="white" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M10.5 0.75V4.75C10.5 5.28043 10.7107 5.78914 11.0858 6.16421C11.4609 6.53929 11.9696 6.75 12.5 6.75H16.5"
                                    stroke="white" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M5.5 9.75L8.5 12.75M8.5 12.75L11.5 9.75M8.5 12.75V6.75" stroke="white"
                                    stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            Rekap Excel
                        </button>
                        <!-- Export Excel Modal -->
                        <div class="modal fade" id="exportExcelModal" tabindex="-1" aria-labelledby="exportExcelModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exportExcelModalLabel">Rekap Excel</h5>
                                    </div>
                                    <form action="{{ route('administrator.absent.export.excel') }}" method="get">
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="yearInput" class="form-label">Tahun</label>
                                                <select class="form-select" id="yearInput" name="year">
                                                    @foreach ($attendanceYears as $year)
                                                        <option value="{{ $year->year }}"
                                                            {{ request()->input('year', now()->year) == $year->year ? ' selected' : '' }}>
                                                            {{ $year->year }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label for="monthInput" class="form-label">Bulan</label>
                                                <select class="form-select" id="monthInput" name="month">
                                                    @foreach ($attendanceMonth as $month)
                                                        <option value="{{ $month->month }}"
                                                            {{ request()->input('month', now()->month) == $month->month ? ' selected' : '' }}>
                                                            {{ $month->month
                                                                ? \Illuminate\Support\Carbon::parse(
                                                                    '2024-' . str_pad($month->month, 2, '0', STR_PAD_LEFT) . '-01',
                                                                )->translatedFormat('F')
                                                                : '-' }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label for="schoolInput" class="form-label">Sekolah</label>
                                                <select class="form-select" id="schoolInput" name="school">
                                                    <option value="">Semua Sekolah</option>
                                                    @foreach ($students->pluck('school')->unique()->sort()->values() as $schoolOption)
                                                        <option value="{{ $schoolOption }}"
                                                            {{ request()->input('school') == $schoolOption ? ' selected' : '' }}>
                                                            {{ $schoolOption }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light"
                                                style="border: 1px solid #D5DBE7; color: #667797;" data-bs-dismiss="modal">
                                                Batal
                                            </button>
                                            <button type="submit" class="btn text-white"
                                                style="background-color: #306BFF;">
                                                Simpan
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <button class="btn d-inline-flex align-items-center gap-2 text-white"
                            style="background-color: #3CC68A; border-radius: 9px; padding: 12px 20px;"
                            data-bs-toggle="modal" data-bs-target="#add">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M8 2V14M2 8H14" stroke="white" stroke-width="1.6" stroke-linecap="round" />
                            </svg>
                            Tambah Absensi
                        </button>
                    </div>
                </div>
            </div>
            <div class="row g-2 mt-3">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="step-arrow-nav">
                        <ul class="nav nav-pills custom-nav nav-justified" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="offline-tab" data-bs-toggle="pill"
                                    data-bs-target="#offline" type="button" role="tab" aria-controls="offline"
                                    aria-selected="false" data-position="1" tabindex="-1">
                                    Siswa Offline
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="online-tab" data-bs-toggle="pill" data-bs-target="#online"
                                    type="button" role="tab" aria-controls="online" aria-selected="false"
                                    data-position="2" tabindex="-1">
                                    Siswa Online
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-8 col-md-6 col-sm-12">
                    <div class="d-flex flex-column flex-lg-row justify-content-end gap-2">
                        <form action="/administrator/absent" class="d-flex flex-column flex-lg-row gap-2 col-12 col-lg-auto">
                            <div class="search-box col-12 col-lg-auto">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="name"
                                        value="{{ request()->name }}" id="searchMemberList" placeholder="Cari Siswa">
                                    <button type="submit"
                                        class="btn btn-outline-secondary d-flex align-items-center px-3 border-start-0">
                                        <i class="ri-search-line fs-5"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="col-12 col-lg-auto">
                                <div class="input-group">
                                    <input type="text" class="form-control flatpickr-input" name="date"
                                        value="{{ request()->date }}" data-provider="flatpickr"
                                        placeholder="Pilih tanggal" readonly>
                                    <button type="submit"
                                        class="btn btn-outline-secondary d-flex align-items-center px-3 border-start-0">
                                        <i class="ri-calendar-line fs-5"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="col-12 col-lg-auto">
                                <select class="form-select" name="school" onchange="this.form.submit()">
                                    <option value="">Semua Sekolah</option>
                                    @foreach ($students->pluck('school')->filter()->unique()->sort()->values() as $schoolOpt)
                                        <option value="{{ $schoolOpt }}"
                                            {{ request()->school == $schoolOpt ? 'selected' : '' }}>
                                            {{ $schoolOpt }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </form>
                        <div class="form-check form-switch col-lg-3 col-12 d-flex justify-content-between align-items-center mt-2 mt-lg-0"
                            style="width: auto;">
                            <form action="{{ route('wfh.today') }}" class="d-flex align-items-center w-100"
                                id="toggleForm" method="POST">
                                @csrf
                                <label class="form-check-label ms-n4" for="switchSizeLargeChecked">WFO</label>
                                <div class="flex-grow-1 ml-mobile-100">
                                    <input class="form-check-input" type="checkbox" name="is_on"
                                        style="width: 40px; height: 20px" role="switch" id="switchSizeLargeChecked"
                                        value="true" {{ $wfh && $wfh->is_on == 1 ? 'checked' : '' }} />
                                </div>
                                <label class="form-check-label ms-1" for="switchSizeLargeChecked">WFH</label>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="card-body border-top">
            @if (!function_exists('dateFormatted'))
                @php
                    function dateFormatted(string $dateTime): string
                    {
                        return \Carbon\Carbon::parse($dateTime)->format('H:i');
                    }
                @endphp
            @endif
            <div class="table-responsive table-card p-3">
                <div class="tab-content">
                    <div class="tab-pane fade" id="online">
                        <table class="table align-middle table-nowrap table-striped-columns mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col" style="width: 1rem">No.</th>
                                    <th scope="col">Siswa</th>
                                    <th scope="col">Sekolah</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col" class="text-center">Keterangan</th>
                                    <th scope="col" class="text-center">Masuk</th>
                                    <th scope="col" class="text-center">Pulang</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($onlineAttendances as $attendance)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $attendance->name }}</td>
                                            <td>{{ $attendance->school }}</td>
                                            <td>{{ request('date') ?? \Carbon\Carbon::now()->format('Y-m-d') }}</td>
                                            <td class="text-center">
                                                @if (isset($attendance->attendances[0]))
                                                    @if ($attendance->attendances[0]->status == 'masuk')
                                                        <span class="badge bg-success-subtle text-success py-2 px-3">
                                                            {{ $attendance->attendances[0]->status }}
                                                        </span>
                                                    @endif
                                                    @if ($attendance->attendances[0]->status == 'izin')
                                                        <span class="badge bg-warning-subtle text-warning py-2 px-3">
                                                            {{ $attendance->attendances[0]->status }}
                                                        </span>
                                                    @endif
                                                    @if ($attendance->attendances[0]->status == 'sakit')
                                                        <span class="badge bg-warning-subtle text-warning py-2 px-3">
                                                            {{ $attendance->attendances[0]->status }}
                                                        </span>
                                                    @endif
                                                    @if ($attendance->attendances[0]->status == 'alpha')
                                                        <span class="badge bg-danger-subtle text-danger py-2 px-3">
                                                            {{ $attendance->attendances[0]->status }}
                                                        </span>
                                                    @endif
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if (isset($attendance->attendances[0]))
                                                    @foreach ($attendance->attendances[0]->attendanceDetails as $detailAttendance)
                                                        @if ($detailAttendance->status == 'present')
                                                            @if (date('H:i:s', strtotime($detailAttendance->created_at)) <=
                                                                    \Carbon\Carbon::createFromFormat('H:i:s', $rule?->checkin_ends ?? '08:00:00')->addMinutes(1)->format('H:i:s'))
                                                                <span
                                                                    class="badge bg-success-subtle text-success py-2 px-3">{{ dateFormatted($detailAttendance->created_at) }}</span>
                                                            @else
                                                                <span
                                                                    class="badge bg-danger-subtle text-danger py-2 px-3">{{ dateFormatted($detailAttendance->created_at) }}</span>
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if (isset($attendance->attendances[0]))
                                                    @foreach ($attendance->attendances[0]->attendanceDetails as $detailAttendance)
                                                        @if ($detailAttendance->status == 'return')
                                                            @if (date('H:i:s', strtotime($detailAttendance->created_at)) <=
                                                                    \Carbon\Carbon::createFromFormat('H:i:s', $rule?->checkout_ends ?? '20:00:00')->addMinutes(1)->format('H:i:s'))
                                                                <span
                                                                    class="badge bg-success-subtle text-success py-2 px-3">{{ dateFormatted($detailAttendance->created_at) }}</span>
                                                            @else
                                                                <span
                                                                    class="badge bg-danger-subtle text-danger py-2 px-3">{{ dateFormatted($detailAttendance->created_at) }}</span>
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
                    <div class="tab-pane fade show active" id="offline">
                        <table class="table align-middle table-nowrap table-striped-columns mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col" style="width: 1rem">No.</th>
                                    <th scope="col">Siswa</th>
                                    <th scope="col">Sekolah</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col" class="text-center">Tipe Absen</th>
                                    <th scope="col" class="text-center">Keterangan</th>
                                    <th scope="col" class="text-center">Masuk</th>
                                    <th scope="col" class="text-center">Istirahat</th>
                                    <th scope="col" class="text-center">Kembali</th>
                                    <th scope="col" class="text-center">Pulang</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($oflineAttendances as $attendance)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $attendance->name }}</td>
                                        <td>{{ $attendance->school }}</td>
                                        <td>{{ request('date') ?? \Carbon\Carbon::now()->format('Y-m-d') }}</td>
                                        <td class="text-center">
                                            @if (isset($attendance->attendances[0]))
                                                @if ($attendance->attendances[0]->attendance_type == 'offline')
                                                    <span class="badge bg-success-subtle text-success py-2 px-3">
                                                        {{ $attendance->attendances[0]->attendance_type }}
                                                    </span>
                                                @endif
                                                @if ($attendance->attendances[0]->attendance_type == 'online')
                                                    <span class="badge bg-warning-subtle text-warning py-2 px-3">
                                                        {{ $attendance->attendances[0]->attendance_type }}
                                                    </span>
                                                @endif
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if (isset($attendance->attendances[0]))
                                                @if ($attendance->attendances[0]->status == 'masuk')
                                                    <span class="badge bg-success-subtle text-success py-2 px-3">
                                                        {{ $attendance->attendances[0]->status }}
                                                    </span>
                                                @endif
                                                @if ($attendance->attendances[0]->status == 'izin')
                                                    <span class="badge bg-warning-subtle text-warning py-2 px-3">
                                                        {{ $attendance->attendances[0]->status }}
                                                    </span>
                                                @endif
                                                @if ($attendance->attendances[0]->status == 'sakit')
                                                    <span class="badge bg-warning-subtle text-warning py-2 px-3">
                                                        {{ $attendance->attendances[0]->status }}
                                                    </span>
                                                @endif
                                                @if ($attendance->attendances[0]->status == 'alpha')
                                                    <span class="badge bg-danger-subtle text-danger py-2 px-3">
                                                        {{ $attendance->attendances[0]->status }}
                                                    </span>
                                                @endif
                                            @else
                                                <div class="badge bg-danger-subtle text-danger py-2 px-3">
                                                    @php
                                                        $waktuSaatIni = \Carbon\Carbon::now();
                                                        $waktuJamDelapan = \Carbon\Carbon::today()->setHour(8);
                                                    @endphp

                                                    @if ($waktuSaatIni->greaterThan($waktuJamDelapan))
                                                        Alpha
                                                    @else
                                                        Belum Hadir
                                                    @endif

                                                </div>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if (isset($attendance->attendances[0]))
                                                @foreach ($attendance->attendances[0]->attendanceDetails as $detailAttendance)
                                                    @if ($detailAttendance->status == 'present')
                                                        @if (date('H:i:s', strtotime($detailAttendance->created_at)) <=
                                                                \Carbon\Carbon::createFromFormat('H:i:s', $rule?->checkin_ends ?? '08:00:00')->addMinutes(1)->format('H:i:s'))
                                                            <span
                                                                class="badge bg-success-subtle text-success py-2 px-3">{{ dateFormatted($detailAttendance->created_at) }}</span>
                                                        @else
                                                            <span
                                                                class="badge bg-danger-subtle text-danger py-2 px-3">{{ dateFormatted($detailAttendance->created_at) }}</span>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if (isset($attendance->attendances[0]))
                                                @foreach ($attendance->attendances[0]->attendanceDetails as $detailAttendance)
                                                    @if ($detailAttendance->status == 'break')
                                                        @if (date('H:i:s', strtotime($detailAttendance->created_at)) <=
                                                                \Carbon\Carbon::createFromFormat('H:i:s', $rule?->break_ends ?? '12:35:00')->addMinutes(1)->format('H:i:s'))
                                                            <span
                                                                class="badge bg-success-subtle text-success py-2 px-3">{{ dateFormatted($detailAttendance->created_at) }}</span>
                                                        @else
                                                            <span
                                                                class="badge bg-danger-subtle text-danger py-2 px-3">{{ dateFormatted($detailAttendance->created_at) }}</span>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if (isset($attendance->attendances[0]))
                                                @foreach ($attendance->attendances[0]->attendanceDetails as $detailAttendance)
                                                    @if ($detailAttendance->status == 'return_break')
                                                        @if (date('H:i:s', strtotime($detailAttendance->created_at)) <=
                                                                \Carbon\Carbon::createFromFormat('H:i:s', $rule?->return_ends ?? '13:00:00')->addMinutes(1)->format('H:i:s'))
                                                            <span
                                                                class="badge bg-success-subtle text-success py-2 px-3">{{ dateFormatted($detailAttendance->created_at) }}</span>
                                                        @else
                                                            <span
                                                                class="badge bg-danger-subtle text-danger py-2 px-3">{{ dateFormatted($detailAttendance->created_at) }}</span>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if (isset($attendance->attendances[0]))
                                                @foreach ($attendance->attendances[0]->attendanceDetails as $detailAttendance)
                                                    @if ($detailAttendance->status == 'return')
                                                        @if (date('H:i:s', strtotime($detailAttendance->created_at)) <=
                                                                \Carbon\Carbon::createFromFormat('H:i:s', '18:00:00')->addMinutes(1)->format('H:i:s'))
                                                            <span
                                                                class="badge bg-success-subtle text-success py-2 px-3">{{ dateFormatted($detailAttendance->created_at) }}</span>
                                                        @else
                                                            <span
                                                                class="badge bg-danger-subtle text-danger py-2 px-3">{{ dateFormatted($detailAttendance->created_at) }}</span>
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
        </div>

        {{-- modal add absent start --}}
        <div class="modal fade" id="add" tabindex="-1" aria-labelledby="varyingcontentModalLabel"
            aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="varyingcontentModalLabel">Tambah Absensi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('attendance.offline.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-4">
                                <label for="student_id">Pilih Siswa</label>
                                <select
                                    class="tambah js-example-basic-single form-control @error('name') is-invalid @enderror"
                                    aria-label=".form-select example" name="student_id">
                                    @forelse ($students as $student)
                                        <option value="{{ $student->id }}">{{ $student->name }}</option>
                                    @empty
                                        <option disabled>Tidak ada siswa</option>
                                    @endforelse
                                </select>
                                @error('student_id')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            <div class="mb-1">
                                <label for="status">Status</label>
                                <select
                                    class="tambah js-example-basic-single form-control @error('status') is-invalid @enderror"
                                    aria-label=".form-select example" name="status">
                                    <option value="masuk">Masuk</option>
                                    <option value="izin">Izin</option>
                                    <option value="sakit">Sakit</option>
                                </select>
                                @error('status')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary px-5">Buat</button>
                            <button type="button" class="btn btn-light px-5" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- modal add absent end --}}

    @endsection
    @section('script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
            integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        {{-- <script>
            $(document).ready(function() {
                $('#switchSizeLargeChecked').change(function() {
                    $('#toggleForm').submit();
                });
            });
            </script> --}}
        <script>
            $(document).ready(function() {
                $('#switchSizeLargeChecked').change(function() {
                    $('#toggleForm').submit();
                });
            });
        </script>
    @endsection
