@extends('admin.layouts.app')
@section('content')
    <div class="card">
        <div class="px-3 py-1">
            <div class="d-flex row justify-content-between align-items-center">
                <div class="col-sm-4">
                    <div class="step-arrow-nav mb-4 pt-3 mx-3">
                        <ul class="nav nav-pills custom-nav nav-justified"role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="steparrow-gen-info-tab" data-bs-toggle="pill"
                                    data-bs-target="#steparrow-gen-info" type="button" role="tab"
                                    aria-controls="steparrow-gen-info" aria-controls="steparrow-gen-info"
                                    aria-selected="true" data-position="0">
                                    Tempatkan Divisi
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="steparrow-description-info-tab" data-bs-toggle="pill"
                                    data-bs-target="#steparrow-description-info" type="button" role="tab"
                                    aria-controls="steparrow-description-info" aria-selected="false" data-position="1"
                                    tabindex="-1">
                                    Data Siswa
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-2">
                    <form class="app-search d-none d-md-block w-100">
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="Cari..." autocomplete="off"
                                id="search-options" value="">
                            <span class="mdi mdi-magnify search-widget-icon"></span>
                            <span class="mdi mdi-close-circle search-widget-icon search-widget-icon-close d-none"
                                id="search-close-options"></span>
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
                            <div class="row mb-3 d-flex justify-content-between">
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
                            <div id="responsive-table">
                                <table class="align-middle table table-nowrap table-bordered table-striped"
                                    style="width:100%">
                                    <thead>
                                        <tr class="table-light">
                                            <th scope="col">No.</th>
                                            <th scope="col">Siswa</th>
                                            <th scope="col">Tanggal Mulai</th>
                                            <th scope="col">Tanggal Selesai</th>
                                            <th scope="col">Email</th>
                                            <th scope="col" class="text-center" style="width: 150px;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($studentOfflines as $key => $studentOffline)
                                            <tr>
                                                <td>{{ str_pad(++$key, 2, '0', STR_PAD_LEFT) }}</td>
                                                <td class="d-flex align-items-center">
                                                    <img src="{{ asset('storage/' . $studentOffline->avatar) }}"
                                                        alt="{{ $studentOffline->name }}" class="rounded-circle avatar-sm">
                                                    <div class="mt-3 ms-3">
                                                        <h5 class="m-0 p-0">{{ $studentOffline->name }}</h5>
                                                        <p class="text-primary">{{ $studentOffline->school }}</p>
                                                    </div>
                                                </td>
                                                <td>{{ \carbon\Carbon::parse($studentOffline->start_date)->locale('id_ID')->isoFormat('D MMMM YYYY') }}
                                                </td>
                                                <td>{{ \carbon\Carbon::parse($studentOffline->finish_date)->locale('id_ID')->isoFormat('D MMMM YYYY') }}
                                                </td>
                                                <td>
                                                    {{ $studentOffline->email }}
                                                </td>
                                                <td class="text-center">
                                                    <button type="button" class="btn bg-secondary-subtle text-secondary edit-item-btn btn-add"
                                                    data-id="{{ $studentOffline->id }}">
                                                    <i class="ri-apps-2-line align-bottom me-2 text-secondary"></i>
                                                    Tempatkan Divisi
                                                </button>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="8">
                                                    <div class="d-flex justify-content-center mb-3 mt-3">
                                                        <img src="{{ asset('no data.png') }}" width="200px"
                                                            alt="" srcset="">
                                                    </div>
                                                    <p class="text-center mb-0 fs-5">
                                                        Data Masih Kosong
                                                    </p>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between px-3">
                            <p>Showing 1 to 10 of 14 entries</p>
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-end">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1"
                                            aria-disabled="true">Previous</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                    </li>
                                </ul>
                            </nav>
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
                            <div class="row mb-3 d-flex justify-content-between">
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
                            <div id="responsive-table-2">
                                <table class="align-middle table table-nowrap table-bordered table-striped"
                                    style="width:100%">
                                    <thead>
                                        <tr class="table-light">
                                            <th scope="col">No.</th>
                                            <th scope="col">Siswa</th>
                                            <th scope="col">Tanggal Mulai</th>
                                            <th scope="col">Tanggal Selesai</th>
                                            <th scope="col">Email</th>
                                            <th scope="col" class="text-center" style="width: 150px;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($students as $key => $student)
                                            <tr>
                                                <td>{{ str_pad(++$key, 2, '0', STR_PAD_LEFT) }}</td>
                                                <td class="d-flex align-items-center">
                                                    <img src="{{ file_exists(public_path('storage/' . $student->avatar)) ? asset('storage/' . $student->avatar) : asset('user.webp') }}"
                                                        alt="{{ $student->name }}" class="rounded-circle avatar-sm">
                                                    <div class="mt-3 ms-3">
                                                        <h5 class="m-0 p-0">{{ $student->name }}</h5>
                                                        <p class="text-primary">{{ $student->school }}</p>
                                                    </div>
                                                </td>
                                                <td>{{ \carbon\Carbon::parse($student->start_date)->locale('id_ID')->isoFormat('D MMMM YYYY') }}
                                                </td>
                                                <td>{{ \carbon\Carbon::parse($student->finish_date)->locale('id_ID')->isoFormat('D MMMM YYYY') }}
                                                </td>
                                                <td>
                                                    {{ $student->email }}
                                                </td>
                                                <td class="text-center">
                                                    <button type="button" class="btn bg-warning-subtle text-warning edit-item-btn btn-edit"
                                                        data-id="{{ $student->id }}" data-division="{{ $student->division_id }}">
                                                        <i class="ri-apps-2-line align-bottom me-2 text-warning"></i>
                                                        Rubah  Divisi
                                                    </button>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="8">
                                                    <div class="d-flex justify-content-center mb-3 mt-3">
                                                        <img src="{{ asset('no data.png') }}" width="200px"
                                                            alt="" srcset="">
                                                    </div>
                                                    <p class="text-center mb-0 fs-5">
                                                        Data Masih Kosong
                                                    </p>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between px-3">
                            <p>Showing 1 to 10 of 14 entries</p>
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-end">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1"
                                            aria-disabled="true">Previous</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="add" tabindex="-1" aria-labelledby="varyingcontentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="varyingcontentModalLabel">Tempatkan Divisi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="form-update" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-1">
                            <label for="divisi" class="col-form-label">Divisi</label>
                            <select class="tambah js-example-basic-single form-control" aria-label=".form-select example"
                                name="division_id">
                                <option selected disabled>Pilih divisi</option>
                                @forelse ($divisions as $division)
                                    <option value="{{ $division->id }}">{{ $division->name }}</option>
                                @empty
                                    <option>Belum ada divisi</option>
                                @endforelse
                            </select>
                            @error('division_id')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
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

    {{-- Edit Division --}}
    <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="varyingcontentModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="varyingcontentModalLabel">Rubah Divisi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="form-update-edit" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-1">
                            <label for="divisi" class="col-form-label">Divisi</label>
                            <select class="tambah js-example-basic-single form-control" aria-label=".form-select example"
                                name="division_id">
                                @forelse ($divisions as $division)
                                    <option value="{{ $division->id }}">{{ $division->name }}</option>
                                @empty
                                    <option>Belum ada divisi</option>
                                @endforelse
                            </select>
                            @error('division_id')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@2"></script>

    <script>
        $(document).ready(function() {
            $(".js-example-basic-single").select2({
                dropdownParent: $("#add")
            });
        });

        $(document).ready(function() {
            $("#message").modal('show');
        });

        $('.btn-add').click(function() {
            var id = $(this).data('id');
            $('#form-update').attr('action', '/offline-students/division-placement/' + id);
            $('#add').modal('show');
        });

        $('.btn-edit').click(function() {
            var id = $(this).data('id');
            // var division = $(this).data('division').trigger('change');
            $('#form-update-edit').attr('action', '/offline-students/division-placement/update/' + id);
            $('#edit').modal('show');
        })
    </script>

    <script>
        $(document).ready(function() {
            function toggleTableResponsive() {
                var screenWidth = $(window).width();
                var $table = $('#responsive-table');
                if (screenWidth <= 880) {
                    $table.addClass('table-responsive');
                } else {
                    $table.removeClass('table-responsive');
                }
            }

            toggleTableResponsive();

            $(window).resize(function() {
                toggleTableResponsive();
            });
        });
        $(document).ready(function() {
            function toggleTableResponsive() {
                var screenWidth = $(window).width();
                var $table = $('#responsive-table-2');
                if (screenWidth <= 880) {
                    $table.addClass('table-responsive');
                } else {
                    $table.removeClass('table-responsive');
                }
            }

            toggleTableResponsive();

            $(window).resize(function() {
                toggleTableResponsive();
            });
        });
    </script>
@endsection
