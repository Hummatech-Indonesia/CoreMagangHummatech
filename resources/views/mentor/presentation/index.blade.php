@extends('mentor.layouts.app')
@section('content')

    <div class="modal fade" id="pending-date" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tunda Presentasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('presentation.changeStatus') }}" method="post" id="pendingForm">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <input type="hidden" name="presentation_id" value="" id="inputPresentationId">
                        <input type="hidden" name="status_presentation"
                               value="{{ \App\Enum\StatusPresentationEnum::PENNDING->value }}"/>
                        <input type="date" name="planning_presentation_date" value="" id="inputPresentationDate"
                               class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-danger text-danger" data-bs-dismiss="modal">Tutup
                        </button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container-fluid note-has-grid">
        <div class="card bg-light-info shadow-none position-relative overflow-hidden">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">Presentasi</h4>
                        <nav aria-label="breadcrumb mt-2">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class="text-muted " href="/siswa-offline">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">Presentasi</li>
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

        

        <ul class="nav nav-pills p-3 mb-3 rounded align-items-center card flex-row">
            <li class="nav-item">
                <a data-bs-toggle="tab" href="#antrian" role="tab"
                   class="nav-link note-link d-flex align-items-center justify-content-center active px-3 px-md-3 me-0 me-md-2 text-body-color"
                   id="all-category">
                    <i class="ti ti-list fill-white me-0 me-md-1"></i>
                    <span class="d-none d-md-block font-weight-medium">Antrian</span>
                </a>
            </li>
            <li class="nav-item">
                <a data-bs-toggle="tab" href="#request" role="tab"
                   class="nav-link note-link d-flex align-items-center justify-content-center px-3 px-md-3 me-0 me-md-2 text-body-color "
                   id="note-business">
                    <i class="ti ti-list fill-white me-0 me-md-1"></i>
                    <span class="d-none d-md-block font-weight-medium">Pengajuan Presentasi</span>
                </a>
            </li>
            <li class="nav-item">
                <a data-bs-toggle="tab" href="#done" role="tab"
                   class="nav-link note-link d-flex align-items-center justify-content-center px-3 px-md-3 me-0 me-md-2 text-body-color "
                   id="note-business">
                    <i class="ti ti-agenda fill-white me-0 me-md-1"></i>
                    <span class="d-none d-md-block font-weight-medium">History Presentasi</span>
                </a>
            </li>
            <li class="nav-item ms-auto">
                <form action="/timetable">
                    <div class="ms-auto d-flex">
                        <div class="mx-sm-2 mb-2">
                            <input type="date" name="date" value="{{ request()->date }}" class="form-control"
                                   id="exampleInputdate">
                        </div>
                        <div>
                            <button class="btn btn-primary w-100" type="submit">Cari</button>
                        </div>
                    </div>
                </form>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane active" id="antrian" role="tabpanel">
                <div class="card card-body">
                    <div class="table-responsive">
                        <table id="dataTablePresentasion1" class="table stripe row-border order-column nowrap"
                               style="width:100%">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Urutan</th>
                                <th>Nama Project</th>
                                <th>Deskripsi</th>
                                <th>Tanggal Mulai</th>
                                <th>Batas Waktu</th>
                                <th>Tipe Project</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($ongoings as $ongoing)
                                <tr data-student-id="{{ $ongoing->id }}">
                                    <td></td>
                                    <td>{{ $ongoing->urutan }}</td>
                                    <td>{{ $ongoing->project_name }}</td>
                                    <td>{{ $ongoing->description }}</td>
                                    <td>{{ $ongoing->start_date }}</td>
                                    <td>{{ $ongoing->end_date }}</td>
                                    <td>{{ ucwords($ongoing->type_project) }}</td>
                                    <td>...</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="request" role="tabpanel">
                <div class="card card-body">
                    <div class="table-responsive">
                        <table id="dataTablePresentasion2" class="table stripe row-border order-column nowrap"
                               style="width:100%">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Nama Project</th>
                                <th>Nama Ketua</th>
                                <th>Deskripsi</th>
                                <th>Tanggal Mulai</th>
                                <th>Batas Waktu</th>
                                <th>Tipe Project</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($waitings as $waiting)
                                <tr data-student-id="{{ $waiting->id }}">
                                    <td></td>
                                    <td>{{ $waiting->project_name }}</td>
                                    <td>
                                        {{ \App\Models\User::find(collect($waiting->members)->where('status',\App\Enum\StatusMemberTeamEnum::Leader->value)->first()->member_id)->name }}
                                    </td>
                                    <td>{{ $waiting->description }}</td>
                                    <td>{{ $waiting->start_date }}</td>
                                    <td>{{ $waiting->end_date }}</td>
                                    <td>{{ ucwords($waiting->type_project) }}</td>
                                    <td class="d-flex gap-1">
                                        <form action="{{ route('presentation.changeStatus') }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="presentation_id" value="{{ $waiting->id }}">
                                            <input type="hidden" name="status_presentation"
                                                   value="{{ \App\Enum\StatusPresentationEnum::ONGOING->value }}">
                                            <button class="btn btn-success" type="submit"><i class="fa fa-check"></i>
                                            </button>
                                        </form>

                                        <button class="btn btn-warning" onclick="showModalPending({{ $waiting->id }})">
                                            <i class="fa fa-clock"></i>
                                        </button>

                                        <form action="{{ route('presentation.changeStatus') }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="presentation_id" value="{{ $waiting->id }}">
                                            <input type="hidden" name="status_presentation"
                                                   value="{{ \App\Enum\StatusPresentationEnum::NOTFINISH->value }}">
                                            <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="done" role="tabpanel">
                <div class="card card-body">
                    <div class="table-responsive">
                        <table id="dataTablePresentasion2" class="table stripe row-border order-column nowrap"
                               style="width:100%">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Nama Project</th>
                                <th>Nama Ketua</th>
                                <th>Deskripsi</th>
                                <th>Tanggal Presentasi</th>
                                <th>Tipe Project</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($presentations as $presentation)
                                <tr data-student-id="{{ $presentation->id }}">
                                    <td></td>
                                    <td>{{ $presentation->project_name }}</td>
                                    <td>
                                        {{ \App\Models\User::find(collect($presentation->members)->where('status',\App\Enum\StatusMemberTeamEnum::Leader->value)->first()->member_id)->name }}
                                    </td>
                                    <td>{{ $presentation->description }}</td>
                                    <td>{{ $presentation->planning_date_presentation }}</td>
                                    <td>{{ ucwords($presentation->type_project)  }}</td>
                                    <td>
                                        @if($presentation->status_presentation->value == \App\Enum\StatusPresentationEnum::FINISH->value)
                                            <small class="p-2 rounded-pill text-success fw-bolder"
                                                   style="background: rgba(19,222,185,.2)">Selesai</small>
                                        @elseif($presentation->status_presentation->value == \App\Enum\StatusPresentationEnum::WAITING->value)
                                            <small class="p-2 rounded-pill text-primary fw-bolder"
                                                   style="background: rgba(93,135,255,.2)">Menunggu</small>
                                        @elseif($presentation->status_presentation->value == \App\Enum\StatusPresentationEnum::PENNDING->value)
                                            <small class="p-2 rounded-pill text-warning fw-bolder"
                                                   style="background: rgba(255,174,31,.2)">Pending</small>
                                        @elseif($presentation->status_presentation->value == \App\Enum\StatusPresentationEnum::NOTFINISH->value)
                                            <small class="p-2 rounded-pill text-danger fw-bolder"
                                                   style="background: rgb(250,137,107,.2)">Ditolak</small>
                                        @elseif($presentation->status_presentation->value == \App\Enum\StatusPresentationEnum::ONGOING->value)
                                            <small class="p-2 rounded-pill text-warning fw-bolder"
                                                   style="background: rgba(255,174,31,.2)">Dalam Antrian</small>
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
    <script>
        for (let i = 1; i < 4; i++) { // Use 'let' instead of 'var' for block scope
            const table = new DataTable('#dataTablePresentasion' + i, {
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
