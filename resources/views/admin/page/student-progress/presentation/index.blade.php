@extends('admin.layouts.app')
@section('style')
    <style>
        .nav-link .icon-tab {
            fill: #000000; 
            transition: fill 0.3s ease; 
        }

        .nav-link.active .icon-tab {
            fill: #fff; 
        }
        .custom-input {
            background-color: #EAE9FF;
            color: #695EEF;
        }

        .custom-input::placeholder {
            color: #695EEF;
            opacity: 1; 
        }
        input[type="date"]::-webkit-calendar-picker-indicator {
            display: none;
            -webkit-appearance: none;
        }
        input[type="date"] {
            -moz-appearance: textfield;
            appearance: none;
        }
        .custom-icon {
            background-color: #695EEF;
            border: none;
            border-radius: 4px 0 0 4px; 
            color: #695EEF;
            cursor: pointer;
        }
        .custom-date-picker{
            background-color: #EAE9FF;
            color: #695EEF;
            border-radius: 0 4px 4px 0; 
        }
        /* Input group styling */
        .input-group {
            max-width: 250px; /* Batasi panjang maksimum */
            flex: 1; /* Agar tetap fleksibel */
        }

        /* Search box styling */
        .search-box {
            max-width: 180px; /* Batasi panjang maksimum */
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
                            class="nav-link note-link d-flex align-items-center justify-content-center active px-3 px-md-3 me-2 text-body-color">
                            <svg class="icon-tab" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16">
                                <path fill="none" d="M0 0h24v24H0z"></path>
                                <path d="M13 18V20H17V22H7V20H11V18H3C2.44772 18 2 17.5523 2 17V4C2 3.44772 2.44772 3 3 3H21C21.5523 3 22 3.44772 22 4V17C22 17.5523 21.5523 18 21 18H13ZM4 5V16H20V5H4ZM10 7.5L15 10.5L10 13.5V7.5Z"></path>
                            </svg>
                            <span class="d-none d-md-block font-weight-medium mx-1">Presentasi Hari Ini</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a data-bs-toggle="tab" href="#presentationhistory" role="tab"
                            class="nav-link note-link d-flex align-items-center justify-content-center px-3 px-md-3 me-2 text-body-color">
                            <svg class="icon-tab" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16">
                                <path fill="none" d="M0 0h24v24H0z"></path>
                                <path d="M12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12H4C4 16.4183 7.58172 20 12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C9.53614 4 7.33243 5.11383 5.86492 6.86543L8 9H2V3L4.44656 5.44648C6.28002 3.33509 8.9841 2 12 2ZM13 7L12.9998 11.585L16.2426 14.8284L14.8284 16.2426L10.9998 12.413L11 7H13Z"></path>
                            </svg>
                            <span class="d-none d-md-block font-weight-medium mx-1">Riwayat Presentasi</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a data-bs-toggle="tab" href="#notyetpresentation" role="tab"
                            class="nav-link note-link d-flex align-items-center justify-content-center px-3 px-md-3 text-body-color">
                            <svg class="icon-tab" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16">
                                <path fill="none" d="M0 0h24v24H0z"></path>
                                <path d="M14 14.252V16.3414C13.3744 16.1203 12.7013 16 12 16C8.68629 16 6 18.6863 6 22H4C4 17.5817 7.58172 14 12 14C12.6906 14 13.3608 14.0875 14 14.252ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13ZM12 11C14.21 11 16 9.21 16 7C16 4.79 14.21 3 12 3C9.79 3 8 4.79 8 7C8 9.21 9.79 11 12 11ZM19 17.5858L21.1213 15.4645L22.5355 16.8787L20.4142 19L22.5355 21.1213L21.1213 22.5355L19 20.4142L16.8787 22.5355L15.4645 21.1213L17.5858 19L15.4645 16.8787L16.8787 15.4645L19 17.5858Z"></path>
                            </svg>
                            <span class="d-none d-md-block font-weight-medium mx-1">Siswa Belum Presentasi</span>
                        </a>
                    </li>
                </div>
        
                <!-- Pencarian -->
                <li class="nav-item ms-auto d-flex align-items-center">
                    <!-- Input Group -->
                    <div class="input-group me-3" style="max-width: 250px;">
                        <span class="input-group-text custom-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" fill="rgba(255,255,255,1)">
                                <path fill="none" d="M0 0h24v24H0z"></path>
                                <path d="M9 1V3H15V1H17V3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3 2 3 3 3H7V1H9ZM20 11H4V19H20V11ZM8 13V15H6V13H8ZM13 13V15H11V13H13ZM18 13V15H16V13H18ZM7 5H4V9H20V5H17V7H15V5H9V7H7V5Z"></path>
                            </svg>
                        </span>
                        <input type="date" class="form-control custom-date-picker" id="exampleInputdate">
                    </div>
        
                    <!-- Search Box -->
                    <form style="max-width: 180px;">
                        <div class="search-box ms-auto d-flex my-2">
                            <input class="form-control custom-input" id="searchStudentList" name="studentName" type="text"
                                placeholder="Cari Nama Siswa...">
                            <i class="ri-search-line search-icon custom-search-icon"></i>
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