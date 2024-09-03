@extends('admin.layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row g-2 align-items-center">
                <div class="col-sm-4">
                    <h3 class="mx-3">Approval / Izin dan Sakit</h3>
                    <div class="step-arrow-nav mb-4 pt-3 mx-3">
                        <ul class="nav nav-pills custom-nav nav-justified" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="steparrow-gen-info-tab" data-bs-toggle="pill"
                                    data-bs-target="#steparrow-gen-info" type="button" role="tab"
                                    aria-controls="steparrow-gen-info" aria-controls="steparrow-gen-info"
                                    aria-selected="true" data-position="0">
                                    Permintaan Izin
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="steparrow-description-info-tab" data-bs-toggle="pill"
                                    data-bs-target="#steparrow-description-info" type="button" role="tab"
                                    aria-controls="steparrow-description-info" aria-selected="false" data-position="1"
                                    tabindex="-1">
                                    Izin Diterima
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="steparrow-rejected-info-tab" data-bs-toggle="pill"
                                    data-bs-target="#steparrow-rejected-info" type="button" role="tab"
                                    aria-controls="steparrow-rejected-info" aria-selected="false" data-position="2"
                                    tabindex="-1">
                                    Izin Ditolak
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-auto ms-auto pt-4">
                    <form action="/administrator/permission" class="d-flex flex-column flex-sm-row mb-2">
                        <div class="mb-2 me-sm-2">
                            <input type="text" class="form-control" name="name" value="{{ request()->name }}"
                                id="searchMemberList" placeholder="Cari Siswa...">
                        </div>
                        <div class="mx-sm-2 mb-2">
                            <input type="date" name="created_at" value="{{ request()->created_at }}" class="form-control"
                                id="exampleInputdate">
                        </div>
                        <div>
                            <button class="btn btn-primary w-100" type="submit">Cari</button>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>


    <div class="tab-content">
        <div id="steparrow-gen-info" class="tab-pane fade show">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="listjs-table" id="customerList">
                                {{-- <div class="row g-4 mb-3">
                                    <div class="col-sm-auto">
                                        <div class="d-flex">
                                            <h5 class="mx-2 pt-2">Show</h5>
                                            <select name="" class="form-select" id="expiry-month-input">
                                                <option value="1">10</option>
                                            </select>
                                            <h5 class="mx-2 pt-2">entries</h5>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="table-responsive">
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
                                                    Sekolah
                                                </th>
                                                <th class="sort" data-sort="status">
                                                    Dari Tanggal
                                                </th>
                                                <th class="sort" data-sort="description">
                                                    Sampai Tanggal
                                                </th>
                                                <th class="sort" data-sort="description">
                                                    Keterangan
                                                </th>
                                                <th class="sort" data-sort="description">
                                                    Status
                                                </th>
                                                <th class="sort" data-sort="action">
                                                    Aksi
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="list form-check-all">
                                            @forelse ($pandingPermissions as  $permission)
                                                <tr>
                                                    <td class="number">{{ $loop->iteration }}</td>
                                                    <td class="name">{{ $permission->student->name }}</td>
                                                    <td class="date">{{ $permission->student->school }}</td>
                                                    <td class="status">
                                                        {{ \Carbon\Carbon::parse($permission->start)->locale('id')->isoFormat('dddd, D MMMM YYYY') }}
                                                    </td>
                                                    <td class="description">
                                                        {{ \Carbon\Carbon::parse($permission->end)->locale('id')->isoFormat('dddd, D MMMM YYYY') }}
                                                    </td>
                                                    <td class="status">
                                                        <span
                                                            class="badge bg-success-subtle text-success text-uppercase">{{ $permission->status }}</span>
                                                    </td>
                                                    <td class="status_approval">
                                                        @if ($permission->status_approval == 'agree')
                                                            Diterima
                                                        @elseif($permission->status_approval == 'reject')
                                                            Ditolak
                                                        @elseif($permission->status_approval == 'pending')
                                                            Menunggu Konfirmasi
                                                        @else
                                                            Status Tidak Dikenal
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="dropdown d-inline-block">

                                                            <button class="btn btn-soft-secondary btn-sm dropdown"
                                                                type="button" data-bs-toggle="dropdown"
                                                                aria-expanded="false">
                                                                <i class="ri-more-fill align-middle"></i>
                                                            </button>
                                                            <ul class="dropdown-menu dropdown-menu-end">
                                                                <li>
                                                                    <button class="dropdown-item btn-reset btn-detail"
                                                                        type="button" data-id="{{ $permission->id }}"
                                                                        data-proof="{{ file_exists(public_path('storage/' . $permission->proof)) ? asset('storage/' . $permission->proof) : asset('user.webp') }}"
                                                                        data-description="{{ $permission->description }}">Lihat
                                                                        Bukti</button>
                                                                </li>
                                                                <li>
                                                                    <a href="#"
                                                                        class="dropdown-item btn-reset text-success btn-agree"
                                                                        data-id="{{ $permission->id }}">Terima</a>
                                                                </li>
                                                                <li>
                                                                    <button
                                                                        class="dropdown-item btn-ban text-danger btn-reject"
                                                                        type="button"
                                                                        data-id="{{ $permission->id }}">Tolak</button>
                                                                </li>
                                                                <li>
                                                                    <button class="dropdown-item btn-ban btn-delete"
                                                                        type="button"
                                                                        data-id="{{ $permission->id }}">Hapus</button>

                                                                </li>
                                                            </ul>
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
                                {{ $pandingPermissions->links() }}

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
                            <div class="listjs-table" id="customerList">
                                <div class="row g-4 mb-3">
                                    <div class="col-sm-auto">
                                        <div class="d-flex">
                                            <h5 class="mx-2 pt-2">Show</h5>
                                            <select name="" class="form-select" id="expiry-month-input">
                                                <option value="1">10</option>
                                            </select>
                                            <h5 class="mx-2 pt-2">entries</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
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
                                                    Sekolah
                                                </th>
                                                <th class="sort" data-sort="status">
                                                    Dari Tanggal
                                                </th>
                                                <th class="sort" data-sort="description">
                                                    Sampai Tanggal
                                                </th>
                                                <th class="sort" data-sort="description">
                                                    Keterangan
                                                </th>
                                                <th class="sort" data-sort="description">
                                                    Status
                                                </th>
                                                <th class="sort" data-sort="action">
                                                    Aksi
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="list form-check-all">
                                            @forelse ($agreePermissions as $permission)
                                                <tr>
                                                    <td class="number">{{ $loop->iteration }}</td>
                                                    <td class="name">{{ $permission->student->name }}</td>
                                                    <td class="date">{{ $permission->student->school }}</td>
                                                    <td class="status">
                                                        {{ \Carbon\Carbon::parse($permission->start)->locale('id')->isoFormat('dddd, D MMMM YYYY') }}
                                                    </td>
                                                    <td class="description">
                                                        {{ \Carbon\Carbon::parse($permission->end)->locale('id')->isoFormat('dddd, D MMMM YYYY') }}
                                                    </td>
                                                    <td class="status">
                                                        <span
                                                            class="badge bg-success-subtle text-success text-uppercase">{{ $permission->status }}</span>
                                                    </td>
                                                    <td class="status_approval">
                                                        @if ($permission->status_approval == 'agree')
                                                            Diterima
                                                        @elseif($permission->status_approval == 'reject')
                                                            Ditolak
                                                        @elseif($permission->status_approval == 'pending')
                                                            Menunggu Konfirmasi
                                                        @else
                                                            Status Tidak Dikenal
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="dropdown d-inline-block">
                                                            <button class="btn btn-soft-secondary btn-sm dropdown"
                                                                type="button" data-bs-toggle="dropdown"
                                                                aria-expanded="false">
                                                                <i class="ri-more-fill align-middle"></i>
                                                            </button>
                                                            <ul class="dropdown-menu dropdown-menu-end">
                                                                <li>
                                                                    <button class="dropdown-item btn-reset btn-detail"
                                                                        type="button" data-id="{{ $permission->id }}"
                                                                        data-proof="{{ file_exists(public_path('storage/' . $permission->proof)) ? asset('storage/' . $permission->proof) : asset('user.webp') }}"
                                                                        data-description="{{ $permission->description }}">Lihat
                                                                        Bukti</button>
                                                                </li>
                                                                <li>
                                                                    <button
                                                                        class="dropdown-item btn-ban text-danger btn-reject"
                                                                        type="button"
                                                                        data-id="{{ $permission->id }}">Tolak</button>
                                                                </li>
                                                                <li>
                                                                    <button class="dropdown-item btn-ban btn-delete"
                                                                        type="button"
                                                                        data-id="{{ $permission->id }}">Hapus</button>

                                                                </li>
                                                            </ul>
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
                                {{ $agreePermissions->links() }}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="steparrow-rejected-info" class="tab-pane fade">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="listjs-table" id="customerList">
                                <div class="row g-4 mb-3">
                                    <div class="col-sm-auto">
                                        <div class="d-flex">
                                            <h5 class="mx-2 pt-2">Show</h5>
                                            <select name="" class="form-select" id="expiry-month-input">
                                                <option value="1">10</option>
                                            </select>
                                            <h5 class="mx-2 pt-2">entries</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
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
                                                    Sekolah
                                                </th>
                                                <th class="sort" data-sort="status">
                                                    Dari Tanggal
                                                </th>
                                                <th class="sort" data-sort="description">
                                                    Sampai Tanggal
                                                </th>
                                                <th class="sort" data-sort="description">
                                                    Keterangan
                                                </th>
                                                <th class="sort" data-sort="description">
                                                    Status
                                                </th>
                                                <th class="sort" data-sort="action">
                                                    Aksi
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="list form-check-all">
                                            @forelse ($rejectPermissions as  $permission)
                                                <tr>
                                                    <td class="number">{{ $loop->iteration }}</td>
                                                    <td class="name">{{ $permission->student->name }}</td>
                                                    <td class="date">{{ $permission->student->school }}</td>
                                                    <td class="status">
                                                        {{ \Carbon\Carbon::parse($permission->start)->locale('id')->isoFormat('dddd, D MMMM YYYY') }}
                                                    </td>
                                                    <td class="description">
                                                        {{ \Carbon\Carbon::parse($permission->end)->locale('id')->isoFormat('dddd, D MMMM YYYY') }}
                                                    </td>
                                                    <td class="status">
                                                        <span
                                                            class="badge bg-success-subtle text-success text-uppercase">{{ $permission->status }}</span>
                                                    </td>
                                                    <td class="status_approval">
                                                        @if ($permission->status_approval == 'agree')
                                                            Diterima
                                                        @elseif($permission->status_approval == 'reject')
                                                            Ditolak
                                                        @elseif($permission->status_approval == 'pending')
                                                            Menunggu Konfirmasi
                                                        @else
                                                            Status Tidak Dikenal
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="dropdown d-inline-block">
                                                            <button class="btn btn-soft-secondary btn-sm dropdown"
                                                                type="button" data-bs-toggle="dropdown"
                                                                aria-expanded="false">
                                                                <i class="ri-more-fill align-middle"></i>
                                                            </button>
                                                            <ul class="dropdown-menu dropdown-menu-end">
                                                                <li>
                                                                    <button class="dropdown-item btn-reset btn-detail"
                                                                        type="button" data-id="{{ $permission->id }}"
                                                                        data-proof="{{ file_exists(public_path('storage/' . $permission->proof)) ? asset('storage/' . $permission->proof) : asset('user.webp') }}"
                                                                        data-description="{{ $permission->description }}">Lihat
                                                                        Bukti</button>
                                                                </li>
                                                                <li>
                                                                    <a href="#"
                                                                        class="dropdown-item btn-reset text-success btn-agree"
                                                                        data-id="{{ $permission->id }}">Terima</a>
                                                                </li>
                                                                <li>
                                                                    <button class="dropdown-item btn-ban btn-delete"
                                                                        type="button"
                                                                        data-id="{{ $permission->id }}">Hapus</button>

                                                                </li>
                                                            </ul>
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
                                {{ $rejectPermissions->links() }}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Modal Konfirmasi Terima -->

    <div class="modal fade" id="konfirmasiTerimaModal" tabindex="-1" aria-labelledby="konfirmasiTerimaModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method="post" id="form-update">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="konfirmasiTerimaModalLabel">Konfirmasi Terima</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Apakah Anda yakin ingin menerima permohonan izin ini?
                        <input type="text" class="form-control" id="reason" name="status_approval" value="agree"
                            hidden>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success" data-bs-dismiss="modal">Ya, Terima</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal Bukti -->
    <div class="modal fade" id="buktiModal" tabindex="-1" aria-labelledby="buktiModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="buktiModalLabel">Bukti</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img id="show-proof" class="img-fluid" alt="Bukti">
                    <h6 id="show-description-title" class="pt-3">Deskripsi:</h6>
                    <p id="show-description"></p>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <a id="download-link" class="btn btn-primary" download>Download</a>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal Tolak -->
    <div class="modal fade" id="tolakModal" tabindex="-1" aria-labelledby="tolakModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="" method="post" id="form-tolak">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="tolakModalLabel">Konfirmasi Penolakan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Apakah Anda yakin ingin menolak permohonan izin ini?
                        <input type="text" class="form-control" id="reason" name="status_approval" value="reject"
                            hidden>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Ya, Tolak</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('admin.components.delete-modal-component')
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
                    case '#steparrow-rejected-info':
                        tab = $('#steparrow-rejected-info-tab');
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
            });

            // Initialize tab based on stored value or default to first tab
            var storedTab = localStorage.getItem('activeTab');
            if (storedTab) {
                window.location.hash = storedTab;
            } else {
                $('#steparrow-gen-info-tab').addClass('active');
                $('#steparrow-gen-info').addClass('active show');
            }

            changeTab(); // Initialize the correct tab on page load
        });
    </script>


    <script>
        $('.btn-detail').click(function() {
            let proof = $(this).data('proof');
            let description = $(this).data('description');
            console.log(proof);
            $('#show-proof').attr('src', proof);
            $('#show-description').text(description);

            $('#buktiModal').modal('show');
        });


        $('#download-link').click(function() {
            var imageSrc = $('#show-proof').attr('src');
            var fileName = imageSrc.substring(imageSrc.lastIndexOf('/') + 1);
            var downloadAnchor = document.createElement('a');
            downloadAnchor.href = imageSrc;
            downloadAnchor.download = fileName;
            downloadAnchor.click();
        });

        $('.btn-reject').click(function() {
            let id = $(this).data('id');
            $('#form-tolak').attr('action', '/administrator/permission/update/reject/' + id);
            $('#tolakModal').modal('show');
        });

        $('.btn-agree').click(function() {
            let id = $(this).data('id');
            $('#form-update').attr('action', '/administrator/permission/update/' + id);
            $('#konfirmasiTerimaModal').modal('show');
        });

        $('.btn-delete').click(function() {
            var id = $(this).data('id');
            $('#form-delete').attr('action', '/administrator/permission/delete/' + id);
            $('#modal-delete').modal('show');
        });
    </script>
@endsection
