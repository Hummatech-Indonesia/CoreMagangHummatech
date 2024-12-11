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
                @foreach ($errors->all() as $error)
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
                                                <option value="{{ $id }}">{{ $student }}
                                                    {{ $id }}
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
                    @foreach ($projects as $project)
                        <div class="col">
                            <div class="card card-body rounded-2">
                                <div class="bg-light-primary rounded-2">

                                    <div
                                        class="card-header d-flex align-items-end position-relative gap-1 bg-transparent pt-4">
                                        <div class="position-absolute d-flex gap-1" style="top:10px; right:20px">
                                            <div class="urutan rounded-2 fs-2 fw-bolder p-2 text-white"
                                                style="background: rgba(110, 113, 120, 0.5)">
                                                {{ str_pad($project['urutan'], 2, '0', STR_PAD_LEFT) }}
                                            </div>
                                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#delete-modal-{{ $project['id'] }}"
                                                {{ $project['status_project'] == \App\Enum\ProjectAcceptStatus::WAITING->value ? '' : 'disabled' }}>
                                                <svg width="15" height="17" viewBox="0 0 15 17" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M5.83333 13.6C6.05435 13.6 6.26631 13.5104 6.42259 13.351C6.57887 13.1916 6.66667 12.9754 6.66667 12.75V7.65C6.66667 7.42457 6.57887 7.20836 6.42259 7.04896C6.26631 6.88955 6.05435 6.8 5.83333 6.8C5.61232 6.8 5.40036 6.88955 5.24408 7.04896C5.0878 7.20836 5 7.42457 5 7.65V12.75C5 12.9754 5.0878 13.1916 5.24408 13.351C5.40036 13.5104 5.61232 13.6 5.83333 13.6ZM14.1667 3.4H10.8333V2.55C10.8333 1.8737 10.5699 1.2251 10.1011 0.746878C9.63226 0.26866 8.99638 0 8.33333 0H6.66667C6.00363 0 5.36774 0.26866 4.8989 0.746878C4.43006 1.2251 4.16667 1.8737 4.16667 2.55V3.4H0.833333C0.61232 3.4 0.400358 3.48955 0.244078 3.64896C0.0877973 3.80837 0 4.02457 0 4.25C0 4.47543 0.0877973 4.69163 0.244078 4.85104C0.400358 5.01045 0.61232 5.1 0.833333 5.1H1.66667V14.45C1.66667 15.1263 1.93006 15.7749 2.3989 16.2531C2.86774 16.7313 3.50363 17 4.16667 17H10.8333C11.4964 17 12.1323 16.7313 12.6011 16.2531C13.0699 15.7749 13.3333 15.1263 13.3333 14.45V5.1H14.1667C14.3877 5.1 14.5996 5.01045 14.7559 4.85104C14.9122 4.69163 15 4.47543 15 4.25C15 4.02457 14.9122 3.80837 14.7559 3.64896C14.5996 3.48955 14.3877 3.4 14.1667 3.4ZM5.83333 2.55C5.83333 2.32457 5.92113 2.10837 6.07741 1.94896C6.23369 1.78955 6.44565 1.7 6.66667 1.7H8.33333C8.55435 1.7 8.76631 1.78955 8.92259 1.94896C9.07887 2.10837 9.16667 2.32457 9.16667 2.55V3.4H5.83333V2.55ZM11.6667 14.45C11.6667 14.6754 11.5789 14.8916 11.4226 15.051C11.2663 15.2104 11.0543 15.3 10.8333 15.3H4.16667C3.94565 15.3 3.73369 15.2104 3.57741 15.051C3.42113 14.8916 3.33333 14.6754 3.33333 14.45V5.1H11.6667V14.45ZM9.16667 13.6C9.38768 13.6 9.59964 13.5104 9.75592 13.351C9.9122 13.1916 10 12.9754 10 12.75V7.65C10 7.42457 9.9122 7.20836 9.75592 7.04896C9.59964 6.88955 9.38768 6.8 9.16667 6.8C8.94565 6.8 8.73369 6.88955 8.57741 7.04896C8.42113 7.20836 8.33333 7.42457 8.33333 7.65V12.75C8.33333 12.9754 8.42113 13.1916 8.57741 13.351C8.73369 13.5104 8.94565 13.6 9.16667 13.6Z"
                                                        fill="white" />
                                                </svg>
                                            </button>
                                        </div>
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
                                            href="{{ route('student-offline.project.detail', $project['id']) }}">Detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="delete-modal-{{ $project['id'] }}" aria-labelledby="deleteModalLabel"
                            aria-hidden="true" tabindex="-1">
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
                        <div class="modal fade" id="delete-modal-{{ $project['id'] }}" aria-labelledby="deleteModalLabel"
                            aria-hidden="true" tabindex="-1">
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
                                        <form action="{{ route('presentations.destroy', $project['id']) }}" method="POST">
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
                    @endforeach
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
        </div>
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
                {{--  {{ count($projects) == null ? 99 : $pending }},  --}}
                {{ count($projects) == null ? 99 : $inprogress }},
                {{ count($projects) == null ? 99 : $revision }},
                {{ count($projects) == null ? 99 : $completed }}
            ],
            colors: ['#5d87ff', '#ffcc00', '#ff0000', '#42bd53'],
            labels: ['Tugas Belum Selesai', 'Dikerjakan', 'Revisi', 'Selesai'],
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
