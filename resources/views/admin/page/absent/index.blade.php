@extends('admin.layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        <div class="row g-2">
            <div class="col-sm-3">
                <h3 class="mx-1">Absensi Siswa</h3>
            </div>
            <div class="col-sm-auto ms-auto d-flex">
                <div class="list-grid-nav hstack gap-2">
                    <button class="btn btn-primary">
                        Rekap Excel
                    </button>
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#add">
                        Tambah Absensi
                    </button>
                </div>
            </div>
        </div>
        <div class="row g-2 mt-3">
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="step-arrow-nav">
                    <ul class="nav nav-pills custom-nav nav-justified"role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="offline-tab" data-bs-toggle="pill"
                                data-bs-target="#offline" type="button" role="tab"
                                aria-controls="offline" aria-selected="false" data-position="1"
                                tabindex="-1">
                                Siswa Offline
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="online-tab" data-bs-toggle="pill"
                                data-bs-target="#online" type="button" role="tab"
                                aria-controls="online" aria-selected="false" data-position="2" tabindex="-1">
                                Siswa Online
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-8 col-md-6 col-sm-12">
                <div class="d-flex justify-content-end gap-2">
                    <div class="search-box col-lg-3">
                            <form action="/absent">
                            <input type="text" class="form-control" name="name" value="{{request()->name}}" id="searchMemberList" placeholder="Cari Siswa">
                            <i class="ri-search-line search-icon"></i>
                        </form>
                        </div>
                    <div class="search-box col-lg-3">
                        <form action="/absent">
                            <input type="text" class="form-control" name="created_at" value="{{request()->created_at}}" data-provider="flatpickr" data-date-format="d M, Y" placeholder="Pilih tanggal">
                            <i class="ri-calendar-line search-icon"></i>
                        </form>
                    </div>
                    <div class="form-check form-switch d-flex justify-content-between align-items-center"
                        style="width: 160px">
                        <form action="{{ route('wfh.today') }}" class="d-flex align-items-center"
                            id="toggleForm" method="POST">
                            @csrf
                            <label class="form-check-label ms-n4" for="switchSizeLargeChecked">WFO</label>
                            <div class="" style="margin-left: 38px">
                                <input class="form-check-input" type="checkbox" name="is_on"
                                    style="width: 40px; height: 20px" role="switch" id="switchSizeLargeChecked" value="true"
                                    {{ $wfh && $wfh->is_on == 1 ? 'checked' : '' }} />
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
                function dateFormatted(string $dateTime): string {
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
                                                    \Carbon\Carbon::createFromFormat('H:i:s', $rule?->checkin_ends ?? "08:00:00")->addMinutes(1)->format('H:i:s'))
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
</div>

{{-- modal add absent start --}}
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="varyingcontentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
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
                        <select class="tambah js-example-basic-single form-control @error('name') is-invalid @enderror" aria-label=".form-select example" name="student_id">
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
                        <select class="tambah js-example-basic-single form-control @error('status') is-invalid @enderror" aria-label=".form-select example" name="status">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
        $('#switchSizeLargeChecked').change(function() {
            $('#toggleForm').submit();
        });
    });
</script>

@endsection
