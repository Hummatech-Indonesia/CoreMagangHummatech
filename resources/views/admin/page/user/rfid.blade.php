@extends('admin.layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row g-2 align-items-center">
                <div class="col-sm-4">
                    <h3 class="mx-3">Approfal / RFID</h3>
                    <div class="step-arrow-nav mb-4 pt-3 mx-3">
                        <ul class="nav nav-pills custom-nav nav-justified" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="steparrow-gen-info-tab" data-bs-toggle="pill"
                                    data-bs-target="#steparrow-gen-info" type="button" role="tab"
                                    aria-controls="steparrow-gen-info" aria-selected="true">
                                    Data Siswa
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="steparrow-description-info-tab" data-bs-toggle="pill"
                                    data-bs-target="#steparrow-description-info" type="button" role="tab"
                                    aria-controls="steparrow-description-info" aria-selected="false">
                                    Daftarkan RFID
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-sm-auto ms-auto pt-4">
                    <div class="search-box">
                        <form action="/rfid">
                            <div class="input-group">
                                <input type="text" class="form-control" name="name" value="{{ request()->name }}"
                                    id="searchMemberList" placeholder="Cari Siswa...">
                                <span class="input-group-text">
                                    <i class="ri-search-line search-icon"></i>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-sm-auto pt-4">
                    <form action="/rfid" method="GET">
                        <div class="list-grid-nav hstack gap-1">
                            <input type="date" class="form-control" id="exampleInputdate" name="created_at"
                                value="{{ request()->created_at }}">
                            <button type="submit" class="btn btn-primary">Cari</button>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>

    <div class="tab-content">
        <div id="steparrow-gen-info" class="tab-pane fade show active">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="listjs-table"id="customerList">
                                <div class="row g-4 mb-3">
                                    <div class="col-sm-auto">
                                        <div class="d-flex">
                                            <h5 class="mx-2 pt-2">Show</h5>
                                            <select name=""class="form-select" id="expiry-month-input">
                                                <option value="1">10</option>
                                            </select>
                                            <h5 class="mx-2 pt-2">entries</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive table-card mt-3 mb-1 mx-3">
                                    <table class="table align-middle table-nowrap" id="customerTable">
                                        <thead class="table-light">
                                            <tr>
                                                <th class="sort" data-sort="number">
                                                    NO
                                                </th>
                                                <th class="sort" data-sort="name">
                                                    Nama
                                                </th>
                                                <th class="sort" data-sort="date">
                                                    Email
                                                </th>
                                                <th class="sort" data-sort="status">
                                                    Masa Magang
                                                </th>
                                                <th class="sort" data-sort="description">
                                                    Sekolah
                                                </th>
                                                <th class="sort" data-sort="action">
                                                    Aksi
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="list form-check-all">
                                            @forelse ($rfidStudents as $student)
                                                <tr>
                                                    <td class="number">{{ $loop->iteration }}</td>
                                                    <td class="name">{{ $student->name }}</td>
                                                    <td class="date">{{ $student->email }}</td>
                                                    <td class="time">
                                                        {{ \carbon\Carbon::parse($student->start_date)->locale('id_ID')->isoFormat('D MMMM YYYY') }}
                                                        -
                                                        {{ \carbon\Carbon::parse($student->finish_date)->locale('id_ID')->isoFormat('D MMMM YYYY') }}
                                                    </td>
                                                    <td class="description">{{ $student->school }}</td>
                                                    <td>
                                                        <div class="view">
                                                            <button class="btn btn-soft-warning  edit-rfid-btn"
                                                                data-id="{{ $student->id }}"
                                                                data-name="{{ $student->name }}"
                                                                data-rfid="{{ $student->rfid }}">
                                                                Ganti RFID
                                                            </button>
                                                        </div>
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
                                </div>
                                <!-- Pagination -->
                                {{ $rfidStudents->links() }}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div id="steparrow-description-info" class="tab-pane fade">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="listjs-table"id="customerList">
                                <div class="row g-4 mb-3">
                                    <div class="col-sm-auto">
                                        <div class="d-flex">
                                            <h5 class="mx-2 pt-2">Show</h5>
                                            <select name=""class="form-select" id="expiry-month-input">
                                                <option value="1">10</option>
                                            </select>
                                            <h5 class="mx-2 pt-2">entries</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive table-card mt-3 mb-1 mx-3">
                                    <table class="table align-middle table-nowrap" id="customerTable">
                                        <thead class="table-light">
                                            <tr>
                                                <th class="sort" data-sort="number">
                                                    NO
                                                </th>
                                                <th class="sort" data-sort="name">
                                                    Nama
                                                </th>
                                                <th class="sort" data-sort="date">
                                                    Email
                                                </th>
                                                <th class="sort" data-sort="status">
                                                    Masa Magang
                                                </th>
                                                <th class="sort" data-sort="description">
                                                    Sekolah
                                                </th>
                                                <th class="sort" data-sort="action">
                                                    Aksi
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="list form-check-all">
                                            @forelse ($students as $student)
                                                <tr>
                                                    <td class="number">{{ $loop->iteration }}</td>
                                                    <td class="name">{{ $student->name }}</td>
                                                    <td class="date">{{ $student->email }}</td>
                                                    <td class="time">
                                                        {{ \carbon\Carbon::parse($student->start_date)->locale('id_ID')->isoFormat('D MMMM YYYY') }}
                                                        -
                                                        {{ \carbon\Carbon::parse($student->finish_date)->locale('id_ID')->isoFormat('D MMMM YYYY') }}
                                                    </td>
                                                    <td class="description">{{ $student->school }}</td>
                                                    <td>
                                                        <div class="view">
                                                            <button class="btn btn-soft-success add-rfid-btn"
                                                                data-id="{{ $student->id }}"
                                                                data-name="{{ $student->name }}">
                                                                Daftarkan
                                                            </button>
                                                        </div>
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
                                </div>

                                <!-- Pagination -->
                                {{ $students->links() }}


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="showModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="showModalLabel">Daftar RFID Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="form-add" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="modal-body">
                        <div class="mt-3">
                            <h5>Nama: <span id="name"></span></h5>
                        </div>
                        <div class="my-3">
                            <label for="rfid">RFID Siswa</label>
                            <input type="text" class="form-control" name="rfid" id="rfid"
                                placeholder="Masukkan RFID">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="showModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="showModalLabel">Daftar RFID Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="form-edit" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="modal-body">
                        <div class="mt-3">
                            <h5>Nama: <span id="name-edit"></span></h5>
                        </div>
                        <div class="my-3">
                            <label for="rfid-edit">RFID Siswa</label>
                            <input type="text" class="form-control" name="rfid" id="edit-rfid"
                                placeholder="Masukkan RFID">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="showModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="showModalLabel">Daftar RFID Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="form-add" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="modal-body">
                        <div class="mt-3">
                            <h5>Nama: <span id="name"></span></h5>
                        </div>
                        <div class="my-3">
                            <label for="rfid">RFID Siswa</label>
                            <input type="text" class="form-control" name="rfid" id="rfid"
                                placeholder="Masukkan RFID">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            $(document).ready(function() {
                function resetActiveTab() {
                    $('.nav-link').removeClass('active');
                    $('.tab-pane').removeClass('active show');
                }

                function changeTab() {
                    var hash = window.location.hash;
                    resetActiveTab();
                    var tab = null;
                    switch (hash) {
                        case '#steparrow-description-info':
                            tab = $('#steparrow-description-info-tab');
                            break;
                        case '#steparrow-gen-info':
                        default:
                            tab = $('#steparrow-gen-info-tab');
                            break;
                    }
                    tab.addClass('active');
                    $(tab.attr('data-bs-target')).addClass('active show');
                }

                function storeActiveTab() {
                    var activeTab = $('.nav-link.active').attr('data-bs-target');
                    localStorage.setItem('activeTab', activeTab);
                }

                $(window).on('hashchange', function() {
                    changeTab();
                    storeActiveTab();
                });

                $('.nav-link').on('shown.bs.tab', function() {
                    storeActiveTab();
                    // Update the URL hash when tab changes
                    var target = $(this).attr('data-bs-target');
                    window.location.hash = target;
                });

                // Initialize tab based on stored value or default to first tab
                var storedTab = localStorage.getItem('activeTab');
                if (storedTab) {
                    // Ensure the tab is shown on load
                    $(window).on('load', function() {
                        // Remove the hash if it's not found in local storage
                        if (storedTab) {
                            window.location.hash = storedTab;
                            changeTab();
                        }
                    });
                } else {
                    $('#steparrow-gen-info-tab').addClass('active');
                    $('#steparrow-gen-info').addClass('active show');
                }

                changeTab(); // Initialize the correct tab on page load
            });
        </script>


    <script>
        $('.add-rfid-btn').click(function() {
            let id = $(this).data('id');
            let name = $(this).data('name');
            $('#name').text(name);
            $('#form-add').attr('action', '/rfid/add/' + id);
            $('#showModal').modal('show');
        });

        $('.edit-rfid-btn').click(function() {
            let id = $(this).data('id');
            let name = $(this).data('name');
            let rfid = $(this).data('rfid');
            $('#name-edit').text(name);
            $('#edit-rfid').val(rfid);
            $('#form-edit').attr('action', '/rfid/update/' + id);
            $('#editModal').modal('show');
        });
    </script>
@endsection
