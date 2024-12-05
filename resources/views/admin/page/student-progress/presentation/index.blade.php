@extends('admin.layouts.app')
@section('style')
    <style>
        .bg-label-primary {
            background-color: #eff3ff !important;
            color: #557be8 !important;
        }

        .bg-label-info {
            background-color: #d9ebff !important;
            color: #0da8ff !important;
        }

        .bg-label-warning {
            background-color: #fef5e5 !important;
            color: #ffaa05 !important;
        }

        .bg-label-danger {
            background-color: #fbf2ef !important;
            color: #e12d5b !important;
        }

        .nav-link.active .icon-tab {
            fill: #fff;
        }

        .custom-input::placeholder {
            color: rgba(105, 94, 239, 1);
            opacity: 1;
        }

        .custom-icon {
            background-color: rgba(105, 94, 239, 1);
            border: none;
            border-radius: 4px 0 0 4px;
            cursor: pointer;
        }

        .input-group {
            max-width: 250px;
            flex: 1;
        }

        .nav-pills .nav-link {
            color: #000000;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .nav-pills .nav-link.active {
            color: #fff;
            background-color: rgba(105, 94, 239, 1);
        }

        .nav-pills .nav-link:hover {
            background-color: rgba(105, 94, 239, 0.8);
        }

        input[type="date"]::-webkit-calendar-picker-indicator {
            display: none;
            -webkit-appearance: none;
        }

        input[type="date"] {
            -moz-appearance: textfield;
            appearance: none;
        }

        .custom-date-picker {
            background-color: rgba(105, 94, 239, 0.1);
            border: 1px solid rgba(105, 94, 239, 1);
            color: rgba(105, 94, 239, 1);
        }

        .custom-input {
            background-color: rgba(105, 94, 239, 0.1);
            border: 1px solid rgba(105, 94, 239, 1);
            color: #000;
        }

        .custom-icon {
            background-color: rgba(105, 94, 239, 1);
            color: #fff;
        }

        .custom-search-icon {
            color: rgba(105, 94, 239, 1);
        }
    </style>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row g-2 align-items-center">
                <ul class="nav nav-pills p-1 mb-0 rounded align-items-center w-100 d-flex justify-content-between">
                    <!-- Tabs -->
                    <div class="d-flex align-items-center">
                        <li class="nav-item">
                            <a data-bs-toggle="tab" href="#todaypresentation" role="tab"
                                class="nav-link d-flex align-items-center justify-content-center px-3 px-md-3 me-2 text-body-color {{ request()->hasAny(['status', 'date', 'page', 'search']) ? '' : 'active' }}">
                                <svg class="icon-tab" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16"
                                    height="16">
                                    <path fill="none" d="M0 0h24v24H0z"></path>
                                    <path
                                        d="M13 18V20H17V22H7V20H11V18H3C2.44772 18 2 17.5523 2 17V4C2 3.44772 2.44772 3 3 3H21C21.5523 3 22 3.44772 22 4V17C22 17.5523 21.5523 18 21 18H13ZM4 5V16H20V5H4ZM10 7.5L15 10.5L10 13.5V7.5Z">
                                    </path>
                                </svg>
                                <span class="d-none d-md-block font-weight-medium mx-1">Presentasi Hari Ini</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-bs-toggle="tab" href="#presentationhistory" role="tab"
                                class="nav-link d-flex align-items-center justify-content-center px-3 px-md-3 me-2 text-body-color {{ request()->hasAny(['status', 'date', 'page', 'search']) ? 'active' : '' }}">
                                <svg class="icon-tab" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16"
                                    height="16">
                                    <path fill="none" d="M0 0h24v24H0z"></path>
                                    <path
                                        d="M12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12H4C4 16.4183 7.58172 20 12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C9.53614 4 7.33243 5.11383 5.86492 6.86543L8 9H2V3L4.44656 5.44648C6.28002 3.33509 8.9841 2 12 2ZM13 7L12.9998 11.585L16.2426 14.8284L14.8284 16.2426L10.9998 12.413L11 7H13Z">
                                    </path>
                                </svg>
                                <span class="d-none d-md-block font-weight-medium mx-1 ">Riwayat Presentasi</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-bs-toggle="tab" href="#notyetpresentation" role="tab"
                                class="nav-link d-flex align-items-center justify-content-center px-3 px-md-3 text-body-color">
                                <svg class="icon-tab" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16"
                                    height="16">
                                    <path fill="none" d="M0 0h24v24H0z"></path>
                                    <path
                                        d="M14 14.252V16.3414C13.3744 16.1203 12.7013 16 12 16C8.68629 16 6 18.6863 6 22H4C4 17.5817 7.58172 14 12 14C12.6906 14 13.3608 14.0875 14 14.252ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13ZM12 11C14.21 11 16 9.21 16 7C16 4.79 14.21 3 12 3C9.79 3 8 4.79 8 7C8 9.21 9.79 11 12 11ZM19 17.5858L21.1213 15.4645L22.5355 16.8787L20.4142 19L22.5355 21.1213L21.1213 22.5355L19 20.4142L16.8787 22.5355L15.4645 21.1213L17.5858 19L15.4645 16.8787L16.8787 15.4645L19 17.5858Z">
                                    </path>
                                </svg>
                                <span class="d-none d-md-block font-weight-medium mx-1">Project Belum Presentasi</span>
                            </a>
                        </li>
                    </div>

                    <!-- Pencarian -->
                    <li class="nav-item ms-auto d-flex align-items-center">

                        <form style="max-width: 180px;" action="{{ route('administrator.student-progress.presentation') }}">
                            <div class="d-flex justify-content-end gap-3">
                                <!-- Dropdown Status -->
                                <div class="mb-2 d-flex gap-2" style="margin-left: -80px">
                                    <select class="" style="font-size: 10px; padding: 10px; width: 100px;" name="status" onchange="this.form.submit()">
                                        <option value="" {{ request('status') === null ? 'selected' : '' }}>Semua
                                        </option>
                                        <option value="finish" {{ request('status') == 'finish' ? 'selected' : '' }}>Selesai
                                        </option>
                                        <option value="notfinish" {{ request('status') == 'notfinish' ? 'selected' : '' }}>
                                            Ditolak</option>
                                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>
                                            Pending</option>
                                        <option value="waiting" {{ request('status') == 'waiting' ? 'selected' : '' }}>
                                            Menunggu</option>
                                    </select>
                                    <div class="input-group">
                                        <div class="input-group-append">
                                            <span class="input-group-text bg-primary text-white"><i class="ri-calendar-line"></i></span>
                                        </div>
                                        <input type="text" class="form-control flatpickr-input" name="date" value="{{ request()->date }}" data-provider="flatpickr" placeholder="Pilih tanggal" readonly="readonly">

                                    </div>
                                </div>


                            </div>

                            <div class="d-flex justify-content-end gap-2">
                                <!-- Search Input -->
                                <div class="mb-2">
                                    <input type="search" style="width: 280px" name="search"
                                        value="{{ request()->search }}" class="form-control p-2"
                                        placeholder="Cari by nama project atau member...">
                                </div>

                                <!-- Search Button -->
                                <div>
                                    <button class="btn btn-primary" type="submit">Cari</button>
                                </div>
                            </div>
                        </form>
                    </li>
                </ul>
            </div>

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>


        <!-- Tab Content -->
        <div class="tab-content">
            <div class="tab-pane {{ request()->hasAny(['status', 'date', 'page', 'search']) ? '' : 'active' }}" id="todaypresentation" role="tabpanel">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dataTableStudentProgress1" class="table stripe row-border order-column nowrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Project</th>
                                    <th>Divisi</th>
                                    <th>Jenis Project</th>
                                    <th>No Antrean</th>
                                    <th>Status Presentasi</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($presentationsToday as $presentation)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $presentation->project->project_name }}</td>
                                        <td>{{ $presentation->project->division->name }}</td>
                                        <td>{{ ucwords($presentation->project->type_project->value) }}</td>
                                        <td>{{ $presentation->urutan == 0 ? '-' : sprintf('%02d', $presentation->urutan) }}
                                        </td>
                                        <td>
                                            @if ($presentation->status_presentation == \App\Enum\StatusPresentationEnum::WAITING)
                                                <small class="bg-label-warning p-2 rounded-pill">Menunggu Konfirmasi</small>
                                            @elseif($presentation->status_presentation == \App\Enum\StatusPresentationEnum::ONGOING)
                                                <small class="bg-label-info p-2 rounded-pill">Dalam Presentatasi</small>
                                            @elseif($presentation->status_presentation == \App\Enum\StatusPresentationEnum::PENNDING)
                                                <small class="bg-label-warning p-2 rounded-pill">Ditunda</small>
                                            @elseif($presentation->status_presentation == \App\Enum\StatusPresentationEnum::FINISH)
                                                <small class="bg-label-primary p-2 rounded-pill">Selesai</small>
                                            @endif
                                        </td>
                                        <td>
                                            <button class="btn btn-detail"
                                                style="text-decoration: none; color: white; border: none; background-color:rgba(105, 94, 239, 1)">
                                                <span>
                                                    <a href="presentation/{{ $presentation->project->id }}/detail">
                                                        Lihat Detail
                                                    </a>
                                                </span>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="tab-pane {{ request()->hasAny(['status', 'date', 'page', 'search']) ? 'active' : '' }}" id="presentationhistory" role="tabpanel">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dataTableStudentProgress2" class="table stripe row-border order-column nowrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Project</th>
                                    <th>Divisi</th>
                                    <th>Jenis Project</th>
                                    <th>No Antrean</th>
                                    <th>Status Presentasi</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($presentations as $presentation)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $presentation->project->project_name }}</td>
                                        <td>{{ $presentation->project->division->name }}</td>
                                        <td>{{ ucwords($presentation->project->type_project->value) }}</td>
                                        <td>{{ $presentation->urutan == 0 ? '-' : sprintf('%02d', $presentation->urutan) }}
                                        </td>
                                        <td>
                                            @if ($presentation->status_presentation == \App\Enum\StatusPresentationEnum::WAITING)
                                                <small class="bg-label-warning p-2 rounded-pill">Menunggu
                                                    Konfirmasi</small>
                                            @elseif($presentation->status_presentation == \App\Enum\StatusPresentationEnum::ONGOING)
                                                <small class="bg-label-info p-2 rounded-pill">Dalam Presentatasi</small>
                                            @elseif($presentation->status_presentation == \App\Enum\StatusPresentationEnum::PENNDING)
                                                <small class="bg-label-warning p-2 rounded-pill">Ditunda</small>
                                            @elseif($presentation->status_presentation == \App\Enum\StatusPresentationEnum::FINISH)
                                                <small class="bg-label-primary p-2 rounded-pill">Selesai</small>
                                            @endif
                                        </td>
                                        <td>
                                            <button class="btn btn-detail"
                                                style="text-decoration: none; color: white; border: none; background-color:rgba(105, 94, 239, 1)">
                                                <span>
                                                    <a href="presentation/{{ $presentation->project->id }}/detail">
                                                        Lihat Detail
                                                    </a>
                                                </span>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="notyetpresentation" role="tabpanel">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dataTableStudentProgress3" class="table stripe row-border order-column nowrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Project</th>
                                    <th>Divisi</th>
                                    <th>Jenis Project</th>
                                    <th>Deadline</th>
                                    <th>Status Presentasi</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($unpresentedProject as $project)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $project->project_name }}</td>
                                        <td>{{ $project->division->name }}</td>
                                        <td>{{ ucwords($project->type_project->value) }}</td>
                                        <td>{{ $project->end_date }}</td>
                                        <td>
                                            <span class="badge text-danger px-4 py-2 mt-1 fw-bolder"
                                                style="background-color: rgba(251, 242, 239, 1);  border-radius:4px; font-size:small;">Belum
                                                Presentasi</span>
                                        </td>
                                        <td>
                                            <button class="btn btn-detail"
                                                style="text-decoration: none; color: white; border: none; background-color:rgba(105, 94, 239, 1)">
                                                <span>
                                                    <a href="presentation/{{ $presentation->project->id }}/detail">
                                                        Lihat Detail
                                                    </a>
                                                </span>
                                            </button>
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
    <script>
        for (let i = 1; i < 4; i++) { // Use 'let' instead of 'var' for block scope
            const table = new DataTable('#dataTableStudentProgress' + i, {
                columnDefs: [{
                    orderable: false,
                    render: DataTable.render.select(),
                    targets: 0
                }],
                fixedColumns: {
                    start: 2
                },
                order: [
                    [1, 'asc']
                ],
                paging: false,
                scrollCollapse: true,
                scrollX: true,
                scrollY: 300,
                select: {
                    style: 'multi',
                    selector: 'td:first-child'
                }
            });
        }

        function showModalPending(idPresentation) {
            // Set nilai ID presentasi di input hidden
            $('#inputPresentationId').val(idPresentation);
            // Tampilkan modal
            $('#pending-date').modal('show');
        }
    </script>
@endsection
