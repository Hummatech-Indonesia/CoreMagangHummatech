@extends('mentor.layouts.app')
@section('content')

    <div class="container-fluid note-has-grid">
        <div class="card bg-light-info shadow-none position-relative overflow-hidden">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">Presentasi</h4>
                        <nav aria-label="breadcrumb mt-2">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class="text-muted " href="/siswa-offline">Dashboard</a></li>
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
                <a data-bs-toggle="tab" href="#antrian" role="tab" class="nav-link note-link d-flex align-items-center justify-content-center active px-3 px-md-3 me-0 me-md-2 text-body-color" id="all-category">
                  <i class="ti ti-list fill-white me-0 me-md-1"></i>
                  <span class="d-none d-md-block font-weight-medium">Antrian</span>
                </a>
              </li>
              <li class="nav-item">
                <a data-bs-toggle="tab" href="#request" role="tab" class="nav-link note-link d-flex align-items-center justify-content-center px-3 px-md-3 me-0 me-md-2 text-body-color " id="note-business">
                  <i class="ti ti-list fill-white me-0 me-md-1"></i>
                  <span class="d-none d-md-block font-weight-medium">Pengajuan Presentasi</span>
                </a>
              </li>
              <li class="nav-item">
                <a data-bs-toggle="tab" href="#done" role="tab" class="nav-link note-link d-flex align-items-center justify-content-center px-3 px-md-3 me-0 me-md-2 text-body-color " id="note-business">
                  <i class="ti ti-agenda fill-white me-0 me-md-1"></i>
                  <span class="d-none d-md-block font-weight-medium">History Presentasi</span>
                </a>
              </li>
            <li class="nav-item ms-auto">
                <form action="/timetable">
                    <div class="ms-auto d-flex">
                        <div class="mx-sm-2 mb-2">
                            <input type="date" name="date" value="{{ request()->date }}" class="form-control" id="exampleInputdate">
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
                        <table id="dataTablePresentasion1" class="stripe row-border order-column nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Urutan</th>
                                    <th>Nama Project </th>
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
                                        <td>{{ $waiting->urutan }}</td>
                                        <td>{{ $waiting->project_name }}</td>
                                        <td>{{ $waiting->description }}</td>
                                        <td>{{ $waiting->start_date }}</td>
                                        <td>{{ $waiting->end_date }}</td>
                                        <td>{{ $waiting->type_project }}</td>
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
                        <table id="dataTablePresentasion2" class="stripe row-border order-column nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Urutan</th>
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
                                        <td>{{ $waiting->urutan }}</td>
                                        <td>{{ $waiting->project_name }}</td>
                                        <td>
                                            @foreach ($waiting->members as $member)
                                            <p>{{ $member->users->name }}</p>
                                            @endforeach

                                        </td>
                                        <td>{{ $waiting->description }}</td>
                                        <td>{{ $waiting->start_date }}</td>
                                        <td>{{ $waiting->end_date }}</td>
                                        <td>{{ $waiting->type_project }}</td>
                                        <td>...</td>
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
                        {{-- <table class="table search-table align-middle text-nowrap">
                            <thead class="header-item">
                                <tr>
                                    <th>Jadwal</th>
                                    <th>Jam</th>
                                    <th>Tim</th>
                                    <th>Judul Presentasi</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($presentations as $presentation)
                                    <tr class="search-items">
                                        <td>
                                            <h6>
                                                {{$presentation ? $presentation->schedule_to : ''}}
                                            </h6>
                                        </td>
                                        <td>
                                            <h6>
                                                {{$presentation ? $presentation->start_date : ''}} -  {{$presentation ? $presentation->end_date : ''}}

                                            </h6>
                                        </td>
                                        <td class="d-flex">
                                            <div class="n-chk align-self-center text-center">
                                                @if ($presentation->hummataskTeam && $presentation->hummataskTeam->hummatask_team_id && $presentation->hummataskTeam->hummatask_team)
                                                    <img src="{{ asset('storage/' . $presentation->hummataskTeam->hummatask_team) }}"
                                                        alt="avatar" class="rounded-circle" width="35" height="35">
                                                @elseif ($presentation->hummataskTeam && !$presentation->hummataskTeam->hummatask_team_id)
                                                    <img src="{{ asset('user.webp') }}" alt="default avatar"
                                                        class="rounded-circle" width="35" height="35">
                                                @endif

                                            </div>

                                            <div class="ms-3">
                                                <div class="user-meta-info">
                                                    <h6 class="user-name mb-0" data-name="Emma Adams">
                                                        {{ $presentation->hummataskTeam ? $presentation->hummataskTeam->name : 'Belum ada tim yang memilih' }}
                                                    </h6>
                                                    <span class="user-work fs-3">
                                                        {{ $presentation->hummataskTeam && $presentation->hummataskTeam->categoryProject ? $presentation->hummataskTeam->categoryProject->name : 'Belum ada tim yang memilih' }}
                                                    </span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h6 class="usr-email-addr">
                                                {{$presentation ? $presentation->title : ''}}
                                            </h6>
                                        </td>
                                        <td>
                                            <h6>
                                                @if ($presentation)
                                                    <span class="badge bg-{{$presentation->status_presentation?->color()}}">
                                                        {{$presentation->status_presentation?->label()}}
                                                    </span>
                                                @endif
                                            </h6>
                                        </td>
                                        <td class=" gap-2 justify-content-center">
                                            @if($presentation->hummatask_team_id)
                                                <button class="text-primary show-btn badge border-0 bg-light-primary"
                                                    data-id="{{ $presentation->id }}"
                                                    data-title="{{ $presentation->title }}"
                                                    data-description="{{ $presentation->description }}"
                                                    data-date="{{ \Carbon\Carbon::parse($presentation->created_at)->locale('id')->isoFormat('dddd, D MMMM Y') }}"
                                                    data-callback="{{ $presentation->callback != null ? $presentation->callback : 'Belum ada tanggapan' }}"
                                                    >
                                                    <i class="ti ti-eye fs-5"></i>
                                                </button>
                                                <button class="text-warning callback-btn badge border-0 bg-light-warning"
                                                    data-id="{{ $presentation->id }}"
                                                    >
                                                    <i class="ti ti-send fs-5"></i>
                                                </button>
                                            @endif
                                        </td>

                                    </tr>
                                @empty
                                <tr>
                                    <td colspan="8">
                                        <div class="d-flex justify-content-center mt-3">
                                            <img src="{{ asset('no data.png') }}" width="200px"
                                                alt="">
                                        </div>
                                        <h4 class="text-center mt-2 mb-4">
                                            Data Masih kosong
                                        </h4>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{$presentations->links()}} --}}
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
    </script>
@endsection
