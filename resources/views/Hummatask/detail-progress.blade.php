@extends('Hummatask.layouts.app')
@section('style')
    <link type="text/css" href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" />
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

        .select2-container--default .select2-selection--multiple .select2-selection__rendered li {
            color: black;
        }
    </style>
@endsection

@section('sidebar')
    @include('Hummatask.layouts.sidebar-detail-presentation')
@endsection

@section('content')
    <div class="d-flex justify-content-between w-100 mb-4 gap-2">
        <a class="text-decoration-none" href="/student-offline/dashboard/task">
            <div class="back bg-label-primary rounded p-3">
                <svg width="32" height="24" viewBox="0 0 36 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M1.27307 12.586C0.89813 12.9611 0.687499 13.4697 0.687499 14C0.687499 14.5303 0.89813 15.0389 1.27307 15.414L12.5871 26.728C12.7716 26.919 12.9923 27.0714 13.2363 27.1762C13.4803 27.281 13.7427 27.3362 14.0083 27.3385C14.2738 27.3408 14.5372 27.2902 14.783 27.1896C15.0288 27.0891 15.2521 26.9406 15.4399 26.7528C15.6276 26.565 15.7762 26.3417 15.8767 26.0959C15.9773 25.8501 16.0279 25.5868 16.0256 25.3212C16.0233 25.0556 15.9681 24.7932 15.8633 24.5492C15.7585 24.3052 15.6061 24.0845 15.4151 23.9L7.51507 16L34.0011 16C34.5315 16 35.0402 15.7893 35.4153 15.4142C35.7904 15.0391 36.0011 14.5304 36.0011 14C36.0011 13.4696 35.7904 12.9609 35.4153 12.5858C35.0402 12.2107 34.5315 12 34.0011 12L7.51507 12L15.4151 4.1C15.7794 3.72279 15.981 3.21759 15.9764 2.6932C15.9719 2.16881 15.7615 1.66718 15.3907 1.29637C15.0199 0.925548 14.5183 0.715209 13.9939 0.710653C13.4695 0.706096 12.9643 0.907684 12.5871 1.272L1.27307 12.586Z"
                        fill="#5D87FF" />
                </svg>
            </div>
        </a>
        <div class="bg-label-primary w-100 d-flex justify-content-center align-items-center text-center">
            <h2 class="text-primary fw-bolder fs-4">Detail Progress</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-7">
            <div class="card" style="border:1px solid rgba(0,0,0,.03);">
                <div class="card-content">
                    <div class="card-body d-flex justify-content-start align-items-center m-0 p-3 text-center">
                        <h5 class="m-0 p-0">
                            Progress Project</h5>
                    </div>
                </div>
            </div>
            <div class="card" style="border:1px solid rgba(0,0,0,.03);">
                <div class="card-content">
                    <div class="card-body d-flex flex-column align-items-start justify-content-start">
                        <div class="d-flex w-100 justify-content-between align-items-center my-3">
                            <h5 class="fw-bold fs-9">{{ $project->project_name }}</h5>
                            <a class="rounded-2 text-primary fw-bold p-2" href="1/detail-progress"
                                style="background: #eff3ff">
                                Detail Revisi
                            </a>
                        </div>

                        <div class="d-flex">
                            <h5 class="fw-bold mx-4">Status</h5>
                            <h5 class="fw-bold mx-4">Kategori</h5>
                        </div>
                        <div class="d-flex">
                            @if ($project->status == \App\Enum\ProjectAcceptStatus::ACCEPT)
                                <small class="rounded-2 text-success fw-bolder mx-3 p-2"
                                    style="background: rgba(19,222,185,.2)">Disetujui</small>
                            @elseif($project->status == \App\Enum\ProjectAcceptStatus::WAITING)
                                <small class="rounded-2 text-waiting fw-bolder mx-3 p-2"
                                    style="background: rgba(255,174,31,.2)">Menunggu</small>
                            @elseif($project->status == \App\Enum\ProjectAcceptStatus::REJECTED)
                                <small class="rounded-2 text-danger fw-bolder mx-3 p-2"
                                    style="background: rgb(250,137,107,.2)">Ditolak</small>
                            @endif

                            <small class="rounded-2 text-primary fw-bolder mx-3 p-2" style="background: #eef1ff;">{{ ucwords($project->type_project->value) }}</small>
                        </div>

                        <div class="w-100">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="fw-bold mb-3 mt-4">Progress Pengerjaan</h5>
                                <span style=" right: 0; top: -20px; color: #3366ff; font-size: 14px;">Progress Dikerjakan
                                    90%</span>
                            </div>
                            <div class="w-100" style="height: 6px; background: #eee; border-radius: 5px;">
                                <div class="h-100" style="width: 90%; background: #3366ff; border-radius: 5px;"></div>
                            </div>
                        </div>

                        <div class="w-100 mt-4">
                            <div class="d-flex align-items-center mb-2">
                                <img src="{{ asset('user.webp') }}" alt="avatar"
                                    style="width: 40px; height: 40px; border-radius: 50%; margin-right: 10px;">
                                <div style="width: 100%;">
                                    <div class="d-flex justify-content-between">
                                        <span>Victoria Sharma</span>
                                        <span style="color: #3366ff; font-size: 14px;">Partisipasi 30%</span>
                                    </div>
                                    <div style="width: 100%; height: 6px; background: #eee; border-radius: 5px;">
                                        <div style="width: 30%; background: #3366ff; border-radius: 5px;" class="h-100">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <img src="{{ asset('user.webp') }}" alt="avatar"
                                    style="width: 40px; height: 40px; border-radius: 50%; margin-right: 10px;">
                                <div style="width: 100%;">
                                    <div class="d-flex justify-content-between">
                                        <span>Victoria Sharma</span>
                                        <span style="color: #3366ff; font-size: 14px;">Partisipasi 50%</span>
                                    </div>
                                    <div style="width: 100%; height: 6px; background: #eee; border-radius: 5px;">
                                        <div style="width: 50%; background: #3366ff; border-radius: 5px;" class="h-100">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <img src="{{ asset('user.webp') }}" alt="avatar"
                                    style="width: 40px; height: 40px; border-radius: 50%; margin-right: 10px;">
                                <div style="width: 100%;">
                                    <div class="d-flex justify-content-between">
                                        <span>Victoria Sharma</span>
                                        <span style="color: #3366ff; font-size: 14px;">Partisipasi 80%</span>
                                    </div>
                                    <div style="width: 100%; height: 6px; background: #eee; border-radius: 5px;">
                                        <div style="width: 80%; background: #3366ff; border-radius: 5px;" class="h-100">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <img src="{{ asset('user.webp') }}" alt="avatar"
                                    style="width: 40px; height: 40px; border-radius: 50%; margin-right: 10px;">
                                <div style="width: 100%;">
                                    <div class="d-flex justify-content-between">
                                        <span>Victoria Sharma</span>
                                        <span style="color: #3366ff; font-size: 14px;">Partisipasi 10%</span>
                                    </div>
                                    <div style="width: 100%; height: 6px; background: #eee; border-radius: 5px;">
                                        <div style="width: 10%; height: 100%; background: #3366ff; border-radius: 5px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-12 col-lg-5">
            <div class="card" style="border:1px solid rgba(0,0,0,.03);">
                <div class="card-content">
                    <div class="card-body d-flex justify-content-between align-items-center m-0 p-3">
                        <h5 class="m-0 p-0">
                            Anggota</h5>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="search-table text-nowrap table align-middle">
                                <thead class="header-item">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse ($students as $index => $student)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td class="d-flex align-items-center gap-2">
                                                <img class="rounded-circle rounded border"
                                                    src="{{ isset($student->members->faces->first()->photo) ? asset('storage/' . $student->members->faces->first()->photo) : asset('user.webp') }}"
                                                    alt="" width="35" height="35">
                                                {{ $student->members->name }}
                                            </td>
                                            <td>
                                                <b
                                                    class="{{ $student->status == \App\Enum\StatusMemberTeamEnum::Leader->value ? 'text-warning' : 'text-primary' }}">
                                                    {{ $student->status }}
                                                </b>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr colspan="999">
                                            <td>Tidak ada anggota</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/libs/jquery/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/libs/select2/select2.min.js') }}"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/fixedcolumns/5.0.3/js/dataTables.fixedColumns.js"></script>
    <script src="https://cdn.datatables.net/fixedcolumns/5.0.3/js/fixedColumns.dataTables.js"></script>
    <script src="https://cdn.datatables.net/select/2.1.0/js/dataTables.select.js"></script>
    <script src="https://cdn.datatables.net/select/2.1.0/js/select.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#selectMembers').select2({
                dropdownParent: $('#editModal')
            });
            if ($('#selectProject').val() !== 'solo project') {
                $('#memberSection').show();
            } else {
                $('#memberSection').hide()
                $('#selectMembers').prop('disabled', true)
            }
        });

        function changeProject(e) {
            if (e.value !== 'solo project') {
                $('#selectMembers').prop('disabled', false)
                $('#memberSection').show();
            } else {
                $('#selectMembers').prop('disabled', true)
                $('#memberSection').hide();
            }
        }
    </script>

    {{--
    <script>
        const table = new DataTable('#dataTableUsers', {
            // columnDefs: [{
            //     orderable: false,
            //     render: DataTable.render.select(),
            //     targets: 0
            // }],
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
            // select: {
            //     style: 'multi',
            //     selector: 'td:first-child'
            // }
        });
    </script> --}}
@endsection
