@extends('Hummatask.layouts.app')
@section('style')
    <style>
        /* * {
                                                                                                    border: 1px solid #f00;
                                                                                                } */
        .select2-container--default .select2-selection--multiple .select2-selection__rendered li {
            color: black;
        }

        .DButton {
            position: absolute;
            right: 10%;
            top: 30%
        }

        .bg-blue {
            background-color: #b1dcfb;
            color: #007bff;
            border: 1px solid #007bff;
        }

        .text-bold {
            font-weight: 700;
        }

        .apexcharts-legend {
            display: flex;
            flex-direction: column;
            /* gap: 10px; */
            /* margin-top: 10%; */
        }
    </style>
@endsection
@section('sidebar')
    @include('Hummatask.layouts.sidebar-project-progress')
@endsection
@section('content')
    @if (session('errors'))
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container-fluid">
        <div class="card bg-light-info position-relative overflow-hidden shadow-none">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">Management Progress</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class="text-muted">Management Progress</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">Catatan</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-3">
                        <div class="mb-n5 text-center">
                            <img class="img-fluid"
                                src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/breadcrumb/ChatBc.png"
                                alt="">

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="add-team" data-bs-backdrop="static" data-bs-keyboard="false"
            aria-labelledby="staticBackdropLabel" aria-hidden="true" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Ajukan Project</h5>
                        <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('project.submit') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="mt-n2 mx-sm-0 mx-auto flex-shrink-0">
                                <div class="mx-3">
                                    <label class="mb-2 mt-1" for="">Nama Project</label>
                                    <input class="form-control" name="project_name" type="text"
                                        value="{{ old('project_name') }}" placeholder="Masukkan Project">
                                    @error('project_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <label class="mb-2 mt-4" for="">Deskripsi</label>
                                    <textarea class="form-control" name="description" rows="3" placeholder="Masukkan deskripsi tema anda">{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <label class="mb-2 mt-4" for="">Link repository (opsional)</label>
                                    <input class="form-control" name="link" type="text" value="{{ old('link') }}"
                                        placeholder="Masukkan link repositori projek">
                                    @error('link')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="row row-cols-2 mt-2">
                                        <div id="startDate">
                                            <label class="mb-2 mt-1" for="">Tanggal Mulai</label>
                                            <input class="form-control" id="start_date" name="start_date" type="date"
                                                value="{{ old('start_date') }}">
                                            @error('start_date')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div id="endDate">
                                            <label class="mb-2 mt-1" for="">Tanggal Selesai</label>
                                            <input class="form-control" id="end_date" name="end_date" type="date"
                                                value="{{ old('end_date') }}">
                                            @error('end_date')
                                                <div class="text- danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <label class="mb-2 mt-4" for="">Kategori Project</label>
                                    <select class="form-control" name="type_project" onchange="changeProject(this)">
                                        @foreach ($categoryProject as $category)
                                            <option value="{{ $category->name }}">{{ ucwords($category->name) }}</option>
                                        @endforeach
                                    </select>
                                    @error('type_project')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror

                                    <div id="memberSection">
                                        <label class="d-block mb-2 mt-4" for="">Anggota Tim</label>
                                        <select class="js-example-basic-multiple d-block w-100" id="selectMembers"
                                            name="members[]" style="width: 100%;" multiple>
                                            @foreach ($students as $id => $student)
                                                <option value="{{ $id }}">
                                                    {{ $student }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('members')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <label class="mb-2 mt-4" for="">Leader</label>
                                    <input class="form-control" name="leader_id" type="text"
                                        value="{{ auth()->user()->name }}" placeholder="Leader" disabled>
                                    @error('leader_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-light-danger text-danger" data-bs-dismiss="modal" type="button">Tutup
                            </button>
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <style>
            .bg-light-primary {
                padding: 0;
                margin: 0px;
            }

            .card-header {
                padding-top: 6px;
                padding-right: 9px;
                padding-bottom: 10px;
                padding-left: 9px;
                gap: 0;
            }

            .card-body {
                padding-top: 3%;
                padding-right: 9px;
                padding-bottom: 10px;
                padding-left: 9px;
                gap: 0;
            }
        </style>
        <div class="row">
            <div class="col-8">
                <div class="row row-cols-2">
                    @forelse ($projects as $project)
                        <div class="col">
                            <div class="card card-body rounded-2">
                                <div class="bg-light-primary rounded-2">

                                    <div
                                        class="card-header d-flex align-items-end position-relative gap-1 bg-transparent pt-4">
                                        <div class="d-flex gap-2">
                                            <span class="fw-semibold text-dark fs-3">
                                                {{ ucwords($project['type_project']) }}
                                            </span>
                                            <span class="fw-semibold fs-1 mt-1">
                                                {{ \Carbon\Carbon::parse($project['start_date'])->format('d F Y') }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0">
                                        <h2 class="fs-7">{{ $project['project_name'] }}</h2>
                                        <div class="d-flex align-items-center gap-2 pt-1">
                                            {{--  @if ($project['status_project'] == \App\Enum\ProjectAcceptStatus::ACCEPT->value)
                                                <small class="rounded-pill text-success fw-bolder p-2"
                                                    style="background: rgba(19,222,185,.2)">Disetujui</small>
                                            @elseif($project['status_project'] == \App\Enum\ProjectAcceptStatus::WAITING->value)
                                                <small class="rounded-pill text-warning fw-bolder p-2"
                                                    style="background: rgba(255,174,31,.2)">Menunggu</small>
                                            @elseif($project['status_project'] == \App\Enum\ProjectAcceptStatus::REJECTED->value)
                                                <small class="rounded-pill text-danger fw-bolder p-2"
                                                    style="background: rgb(250,137,107,.2)">Ditolak</small>
                                            @endif  --}}
                                            <div class="d-flex gap-2">
                                                <small class="rounded-pill fs-1 text-primary fw-bolder p-2"
                                                    style="background: rgba(93,135,255,.2)">Sedang dikerjakan
                                                </small>
                                                @if ($project['revision_count'] > 0)
                                                    <small class="rounded-pill fs-1 text-light fw-bolder bg-danger p-2"
                                                        style="background: rgba(77, 78, 79, 0.2)">
                                                        Revisi ({{ $project['revision_count'] }})
                                                    </small>
                                                @endif
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <div class="d-flex justify-content-between mt-2">
                                    <div class="deadline">
                                        <b class="d-block">Deadline</b>
                                        <span class="fw-bold text-dark">
                                            {{ \Carbon\Carbon::parse($project['start_date'])->format('d/m/Y') }} -
                                            {{ \Carbon\Carbon::parse($project['end_date'])->format('d/m/Y') }}
                                        </span>

                                    </div>
                                    <div class="action">
                                        <a class="btn btn-primary p-2 px-4"
                                            href="{{ route('siswa-offline.project.detail', $project['id']) }}">Detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="delete-modal-{{ $project['id'] }}"
                            aria-labelledby="deleteModalLabel" aria-hidden="true" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel">Hapus Presentasi</h5>
                                        <button class="btn-close" data-bs-dismiss="modal" type="button"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah Anda yakin ingin menghapus presentasi <span
                                            class="fw-bold">{{ $project['project_name'] }}</span>?
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{ route('project.destroy', $project['id']) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">
                                                Batal
                                            </button>
                                            <button class="btn btn-danger" type="submit">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="delete-modal-{{ $project['id'] }}"
                            aria-labelledby="deleteModalLabel" aria-hidden="true" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel">Hapus Presentasi</h5>
                                        <button class="btn-close" data-bs-dismiss="modal" type="button"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah Anda yakin ingin menghapus presentasi <span
                                            class="fw-bold">{{ $project['project_name'] }}</span>?
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{ route('presentations.destroy', $project['id']) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">
                                                Batal
                                            </button>
                                            <button class="btn btn-danger" type="submit">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>

            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-bold">Progress Tugas</h5>
                        <div id="donutChart"></div>
                    </div>
                </div>
            </div>

            @forelse ($projects as $project)

                <div class="">
                    @php
                        $total_revisi = 100;
                        $anggota = [
                            [
                                'nama' => 'John Doe',
                                'revisi' => 40,
                            ],
                            [
                                'nama' => 'Jane Doe',
                                'revisi' => 40,
                            ],
                            [
                                'nama' => 'Bob Smith',
                                'revisi' => 20,
                            ],
                        ];

                        $total_revisi_anggota = array_sum(array_column($anggota, 'revisi'));
                        $revisi = ($total_revisi_anggota / $total_revisi) * 100;

                        foreach ($anggota as &$item) {
                            $item['revisi'] = ($item['revisi'] / $total_revisi) * 100;
                        }
                    @endphp
                    <style>
                        .progress {
                            height: 5px;
                            border-radius: 10px;
                            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                            background-color: #e0e0e0;
                            /* Warna latar belakang progress bar */
                        }

                        .progress-bar {
                            background-color: #1ccdad;
                            position: relative;
                            height: 5px;
                            border-radius: 10px;
                            /* Menambahkan properti untuk membuat ujung kanan bulat */
                        }

                        .progress-bar::after {
                            content: '';
                            position: absolute;
                            top: 50%;
                            right: -15px;
                            /* Menempatkan bulatan lebih keluar dari ujung */
                            transform: translateY(-50%);
                            width: 20px;
                            /* Ukuran bulatan yang lebih besar */
                            height: 20px;
                            /* Ukuran bulatan yang lebih besar */
                            border-radius: 50%;
                            /* Membuat bulatan */
                            background-color: #1ccdad;
                            /* Warna bulatan sama dengan warna progress bar */
                        }

                        .anggota-progress {
                            margin-top: 10px;
                            /* Memberikan jarak antara progress pekerjaan dengan yang bawah */
                        }

                        .anggota-item {
                            display: flex;
                            align-items: center;
                            /* Menyelaraskan gambar dan nama di tengah */
                            margin-bottom: 10px;
                            /* Memberikan jarak antar anggota */
                        }

                        .anggota-item img {
                            width: 25px;
                            /* Ukuran avatar */
                            height: 25px;
                            /* Ukuran avatar */
                            border-radius: 50%;
                            /* Membuat gambar menjadi bulat */
                            margin-right: 10px;
                            /* Jarak antara avatar dan nama */
                        }

                        .anggota-item span {
                            font-size: 1rem;
                            /* Ukuran font untuk nama */
                        }
                    </style>

                    <div class="row">
                        <div class="col-4">
                            <div class="card">
                                <div class="card-header">
                                    <h2>Hummatask</h2>
                                    <div class="anggota-item d-flex">
                                        <span class="d-flex fs-2 mb-2">
                                            Progress Pengerjaan
                                        </span>
                                    </div>
                                    <div class="progress">
                                        <a class="progress-bar" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="{{ $revisi }}%" role="progressbar"
                                            aria-valuenow="{{ $revisi }}" aria-valuemin="0" aria-valuemax="100"
                                            style="width: {{ $revisi }}%;">
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">

                                    @foreach ($anggota as $item)
                                        <div>
                                            <div class="anggota-item d-flex">
                                                <img src="{{ asset('assets/images/users/avatar-1.jpg') }}"
                                                    alt="{{ $item['nama'] }}">
                                                <span class="d-flex fs-2">
                                                    {{ $item['nama'] }}
                                                </span>
                                            </div>
                                            <div class="progress anggota-progress">
                                                <a class="progress-bar" data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="{{ $item['revisi'] }}%" role="progressbar"
                                                    aria-valuenow="{{ $item['revisi'] }}" aria-valuemin="0"
                                                    aria-valuemax="100" style="width: {{ $item['revisi'] }}%;">
                                                    {{-- {{ $item['revisi'] }}% --}}
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div>
                                    <h2>Anggota Progress</h2>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            @empty
            @endforelse
        </div>
    @endsection
    @section('script')
        <script>
            var options = {
                // width: 300,
                height: 800,
                chart: {
                    type: 'donut'
                },
                dataLabels: {
                    enabled: true,
                    formatter: function(val) {
                        return Math.round(val) + '%';
                    },
                    style: {
                        // fontSize: '20px',
                        fontFamily: 'Helvetica, sans-serif',
                    }
                },
                series: [
                    {{ $upcomingProject }},
                    {{ $inprogress ?? 0 }},
                    {{ $revision ?? 0 }},
                    {{ $completed ?? 0 }}
                ],
                colors: ['#5d87ff', '#ffcc00', '#ff0000', '#42bd53'],
                labels: ['Tugas Belum Selesai', 'Project Berjalan', 'Revisi', 'Selesai'],
                legend: {
                    colors: ['#5d87ff', '#ffcc00', '#ff0000', '#42bd53'],
                    useSeriesColors: true,
                    position: 'bottom',
                    fontWeight: 700,
                },
                plotOptions: {
                    pie: {
                        customScale: 1,
                        donut: {
                            size: '60%',
                        }
                    }
                }
            }
            var chart = new ApexCharts(document.querySelector("#donutChart"), options);
            chart.render();
        </script>
    @endsection
