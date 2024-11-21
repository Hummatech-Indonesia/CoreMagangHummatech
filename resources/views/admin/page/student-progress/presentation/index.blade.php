@extends('admin.layouts.app')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="row g-2 align-items-center">
            <ul class="nav nav-pills p-2 mb-0 rounded align-items-center">
                <li class="nav-item">
                    <a data-bs-toggle="tab" href="#todaypresentation" role="tab"
                        class="nav-link note-link d-flex align-items-center justify-content-center active px-3 px-md-3 me-0 me-md-2 text-body-color"
                        id="all-category">
                        <i class="ti ti-list fill-white me-0 me-md-1"></i>
                        <span class="d-none d-md-block font-weight-medium">Presentasi Hari Ini</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="tab" href="#presentationhistory" role="tab"
                        class="nav-link note-link d-flex align-items-center justify-content-center px-3 px-md-3 me-0 me-md-2 text-body-color "
                        id="note-business">
                        <i class="ti ti-list fill-white me-0 me-md-1"></i>
                        <span class="d-none d-md-block font-weight-medium">Riwayat Presentasi</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="tab" href="#notyetpresentation" role="tab"
                        class="nav-link note-link d-flex align-items-center justify-content-center px-3 px-md-3 me-0 me-md-2 text-body-color "
                        id="note-business">
                        <i class="ti ti-agenda fill-white me-0 me-md-1"></i>
                        <span class="d-none d-md-block font-weight-medium">Siswa Belum Presentasi</span>
                    </a>
                </li>
                <li class="nav-item ms-auto">
                    <div class="d-flex mx-3">
                        <form style="width: 200px" action="">
                            <div class="search-box ms-auto d-flex">
                                <input class="form-control" id="searchStudentList" name="studentName" type="text"
                                    placeholder="Cari Nama Siswa...">
                                <i class="ri-search-line search-icon"></i>
                            </div>
                        </form>
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
                    </div>
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

    <div class="tab-content">
        <div class="tab-pane active" id="todaypresentation" role="tabpanel">
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
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                                <td>1</td>
                                <td>Rental Mobil</td>
                                <td>Divisi Web</td>
                                <td>Pre Mini Project</td>
                                <td>001</td>
                                <td>
                                    <button class="btn btn-detail btn-primary" style="text-decoration: none; color: white; border: none;">
                                        <span>Lihat Detail</span>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="tab-pane active" id="presentationhistory" role="tabpanel">
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
                                    <td>1</td>
                                    <td>Rental Mobil</td>
                                    <td>Divisi Web</td>
                                    <td>Pre Mini Project</td>
                                    <td>001</td>
                                    <td>Selesai</td>
                                    {{-- TODO <td>
                                        @if ()
                                        <span class="badge bg-success">Selesai</span>
                                        @else
                                            <span class="badge bg-danger">Belum Presentasi</span>
                                        @endif
                                    TODO </td> --}}
                                    <td>
                                        <button class="btn btn-detail btn-primary" style="text-decoration: none; color: white; border: none;">
                                            <span>Lihat Detail</span>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>


                <div class="tab-pane active" id="notyetpresentation" role="tabpanel">
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
                                    <th>No Antrean</th>
                                    <th>Status Presentasi</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                        <td>1</td>
                                        <td>Rental Mobil</td>
                                        <td>Divisi Web</td>
                                        <td>Pre Mini Project</td>
                                        <td>001</td>
                                        <td>
                                            Belum Presentasi
                                        </td>
                                        <td>
                                            <button class="btn btn-detail btn-primary" style="text-decoration: none; color: white; border: none;">
                                                <span>Lihat Detail</span>
                                            </button>
                                        </td>
                                </tbody>
                            </table>
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