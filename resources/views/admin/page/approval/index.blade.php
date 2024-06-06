@extends('admin.layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row g-2 align-items-center">
                <div class="col-sm-4">
                    <h3 class="mx-3">Approval</h3>
                    <div class="step-arrow-nav mb-4 pt-3 mx-3">
                        <ul class="nav nav-pills custom-nav nav-justified"role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="steparrow-gen-info-tab" data-bs-toggle="pill"
                                    data-bs-target="#steparrow-gen-info" type="button" role="tab"
                                    aria-controls="steparrow-gen-info" aria-controls="steparrow-gen-info"
                                    aria-selected="true" data-position="0">
                                    Siswa Offline
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="steparrow-description-info-tab" data-bs-toggle="pill"
                                    data-bs-target="#steparrow-description-info" type="button" role="tab"
                                    aria-controls="steparrow-description-info" aria-selected="false" data-position="1"
                                    tabindex="-1">
                                    Siswa Online
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-auto ms-auto d-flex align-items-center">
                    <div class="search-box mx-3 flex-grow-1">
                        <form action="\approval">
                            <div class="input-group">
                                <input type="text" class="form-control" name="name" value="{{request()->name}}" id="searchMemberList" placeholder="Cari Siswa...">
                                <span class="input-group-text"><i class="ri-search-line search-icon"></i></span>
                            </div>
                        </form>
                    </div>
                    <div class="list-grid-nav hstack gap-1">
                        <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#myModal">Edit Limit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-content">
        <div id="steparrow-gen-info" class="tab-pane fade show active">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header align-items-center d-flex justify-content-between mx-md-3 flex-column flex-md-row">
                            <div class="d-flex gap-2 mb-2 mb-md-0">
                                <p class="m-0 me-2">Show</p>
                                <select class="form-select" id="showEntries">
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                                <p class="m-0 ms-2">entries</p>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-3">
                                <!-- Tambahkan tombol submit -->
                                <button id="submitSelected" type="button" class="btn btn-success me-3" data-bs-toggle="modal" data-bs-target="#modal-acc-multiple" style="display: none;">Terima</button>
                                <span class="btn bg-secondary-subtle text-secondary">Limit saat ini: {{ $limits == null ? 0 : $limits->limits }}, Sisa limit: {{ $countLimits }}</span>
                            </div>

                        </div><!-- end card header -->

                        <div class="card-body mx-3">
                            <div class="live-preview ">
                                <form id="studentForm">
                                    @csrf
                                    <div class="table-responsive table-card">
                                        <table class="table align-middle table-nowrap table-striped-columns mb-0">
                                            <thead class="table-light">
                                                <tr>
                                                    <th scope="col" style="width: 46px;">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="selectAll">
                                                            <label class="form-check-label" for="selectAll">All</label>
                                                        </div>
                                                    </th>
                                                    <th scope="col">No</th>
                                                    <th scope="col">Nama</th>
                                                    <th scope="col">Jurusan</th>
                                                    <th scope="col">Kelas</th>
                                                    <th scope="col">Masa Magang</th>
                                                    <th scope="col">Sekolah</th>
                                                    <th scope="col" style="width: 150px;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($studentOffline as $student)
                                                    <tr>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input cardtableCheck" type="checkbox" value="{{ $student->id }}" id="cardtableCheck{{ $student->id }}" data-school="{{ $student->school }}">
                                                                <label class="form-check-label" for="cardtableCheck{{ $student->id }}"></label>
                                                            </div>
                                                        </td>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $student->name }}</td>
                                                        <td>{{ $student->major }}</td>
                                                        <td>{{ $student->class }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($student->start_date)->isoFormat('dddd, D MMMM YYYY') }}</td>
                                                        <td>{{ $student->school }}</td>
                                                        <td>
                                                            <button type="button" data-id="{{ $student->id }}"
                                                                data-name="{{ $student->name }}"
                                                                data-majors="{{ $student->major }}"
                                                                data-class="{{ $student->class }}"
                                                                data-phone="{{ $student->phone }}"
                                                                data-address="{{ $student->address }}"
                                                                data-birthdate="{{ \carbon\Carbon::parse($student->birth_date)->locale('id_ID')->isoFormat('D MMMM YYYY') }}"
                                                                data-birthplace="{{ $student->birth_place }}"
                                                                data-startdate="{{ \carbon\Carbon::parse($student->start_date)->locale('id_ID')->isoFormat('D MMMM YYYY') }}"
                                                                data-finishdate="{{ \carbon\Carbon::parse($student->finish_date)->locale('id_ID')->isoFormat('D MMMM YYYY') }}"
                                                                data-school="{{ $student->school }}"
                                                                data-email="{{ $student->email }}"
                                                                data-avatar="{{ file_exists(public_path('storage/' . $student->avatar)) ? asset('storage/' . $student->avatar) : asset('user.webp') }}"
                                                                data-cv="{{ file_exists(public_path('storage/' . $student->cv)) ? asset('storage/' . $student->cv) : asset('no data.png') }}"
                                                                data-selfstatement="{{ file_exists(public_path('storage/' . $student->self_statement)) ? asset('storage/' . $student->self_statement) : asset('no data.png') }}"
                                                                data-parentsstatement="{{ file_exists(public_path('storage/' . $student->parents_statement)) ? asset('storage/' . $student->parents_statement) : asset('no data.png') }}"
                                                                data-identify_number="{{ $student->identify_number }}"
                                                                data-internship_type="{{ $student->internship_type }}"
                                                                class="btn bg-secondary-subtle text-secondary btn-detail">
                                                                <i class="ri-eye-fill"></i>
                                                            </button>

                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="8" class="text-center">Data Masih kosong</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                        <div class="pt-3">
                                            {{ $studentOffline->links() }}
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div><!-- end card-body -->
                    </div>
                </div>
            </div>
        </div>
        <div id="steparrow-description-info" class="tab-pane fade">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header align-items-center d-flex justify-content-between mx-md-3 flex-column flex-md-row">
                            <div class="d-flex gap-2 mb-2 mb-md-0">
                                <p class="m-0 me-2">Show</p>
                                <select class="form-select" id="showEntries">
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                                <p class="m-0 ms-2">entries</p>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-3">
                                <!-- Tambahkan tombol submit -->
                                <button id="submitSelectedOnline" type="button" class="btn btn-success me-3" data-bs-toggle="modal" data-bs-target="#modal-acc-multiple" style="display: none;">Terima</button>
                                <span class="btn bg-secondary-subtle text-secondary">Limit saat ini: {{ $limits == null ? 0 : $limits->limits }}, Sisa limit: {{ $countLimits }}</span>
                            </div>

                        </div><!-- end card header -->

                        <div class="card-body mx-3">
                            <div class="live-preview ">
                                <form id="studentForm">
                                    @csrf
                                    <div class="table-responsive table-card">
                                        <table class="table align-middle table-nowrap table-striped-columns mb-0">
                                            <thead class="table-light">
                                                <tr>
                                                    <th scope="col" style="width: 46px;">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="selectAllOnline">
                                                            <label class="form-check-label" for="selectAllOnline">All</label>
                                                        </div>
                                                    </th>
                                                    <th scope="col">No</th>
                                                    <th scope="col">Nama</th>
                                                    <th scope="col">Jurusan</th>
                                                    <th scope="col">Kelas</th>
                                                    <th scope="col">Masa Magang</th>
                                                    <th scope="col">Sekolah</th>
                                                    <th scope="col" style="width: 150px;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($studentOnline as $student)
                                                    <tr>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input cardtableCheck-online" type="checkbox" value="{{ $student->id }}" data-school="{{ $student->school }}" id="cardtableCheck-online{{ $student->id }}">
                                                                <label class="form-check-label" for="cardtableCheck-online{{ $student->id }}"></label>
                                                            </div>
                                                        </td>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $student->name }}</td>
                                                        <td>{{ $student->major }}</td>
                                                        <td>{{ $student->class }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($student->start_date)->isoFormat('dddd, D MMMM YYYY') }}</td>
                                                        <td>{{ $student->school }}</td>
                                                        <td>
                                                            <button type="button" data-id="{{ $student->id }}"
                                                                data-name="{{ $student->name }}"
                                                                data-majors="{{ $student->major }}"
                                                                data-class="{{ $student->class }}"
                                                                data-phone="{{ $student->phone }}"
                                                                data-address="{{ $student->address }}"
                                                                data-birthdate="{{ \carbon\Carbon::parse($student->birth_date)->locale('id_ID')->isoFormat('D MMMM YYYY') }}"
                                                                data-birthplace="{{ $student->birth_place }}"
                                                                data-startdate="{{ \carbon\Carbon::parse($student->start_date)->locale('id_ID')->isoFormat('D MMMM YYYY') }}"
                                                                data-finishdate="{{ \carbon\Carbon::parse($student->finish_date)->locale('id_ID')->isoFormat('D MMMM YYYY') }}"
                                                                data-school="{{ $student->school }}"
                                                                data-email="{{ $student->email }}"
                                                                data-avatar="{{ file_exists(public_path('storage/' . $student->avatar)) ? asset('storage/' . $student->avatar) : asset('user.webp') }}"
                                                                data-cv="{{ file_exists(public_path('storage/' . $student->cv)) ? asset('storage/' . $student->cv) : asset('no data.png') }}"
                                                                data-selfstatement="{{ file_exists(public_path('storage/' . $student->self_statement)) ? asset('storage/' . $student->self_statement) : asset('no data.png') }}"
                                                                data-parentsstatement="{{ file_exists(public_path('storage/' . $student->parents_statement)) ? asset('storage/' . $student->parents_statement) : asset('no data.png') }}"
                                                                data-identify_number="{{ $student->identify_number }}"
                                                                data-internship_type="{{ $student->internship_type }}"
                                                                class="btn bg-secondary-subtle text-secondary btn-detail">
                                                                <i class="ri-eye-fill"></i>
                                                            </button>

                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="8" class="text-center">Data Masih kosong</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                        <div class="pt-3">
                                            {{ $studentOnline->links() }}
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div><!-- end card-body -->
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- offcanvas -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header border-bottom">
            <h5 class="offcanvas-title" id="offcanvasRightLabel">Detail Pendaftar</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body p-0 overflow-hidden">
            <div data-simplebar="init" style="height: calc(100vh - 112px);" class="simplebar-scrollable-y">
                <div class="simplebar-wrapper" style="margin: 0px;">
                    <div class="simplebar-height-auto-observer-wrapper">
                        <div class="simplebar-height-auto-observer"></div>
                    </div>
                    <div class="simplebar-mask mt-4 overflow-y-scroll">
                        <div class="d-flex justify-content-center align-items-center">
                            <img src="" class="avatar-xl rounded-circle show-image" alt=""
                                style="object-fit: cover">
                        </div>
                        <div class="d-flex justify-content-center align-items-center mt-4">
                            <h4 class="show-name"></h4>
                        </div>
                        <div class="d-flex justify-content-center align-items-center mb-2">
                            <span class="badge bg-primary-subtle text-primary show-internship_type p-2"></span>

                        </div>
                        <div class="row mx-2">
                            <div class="col-6 d-flex align-items-center gap-1">
                                <i class="bx bx-id-card fs-3 text-primary"></i>
                                <p class="m-0 show-identify_number"></p>
                            </div>
                            <div class="col-6 d-flex  align-items-center gap-1">
                                <i class="ri-mail-line fs-3 text-primary"></i>
                                <p class="m-0 show-email" style="word-break: break-all"></p>
                            </div>
                            <div class="col-6 d-flex align-items-center gap-1">
                                <i class=" ri-smartphone-line fs-3 text-primary"></i>
                                <p class="m-0 show-phone"></p>
                            </div>
                            <div class="col-6 d-flex align-items-center gap-1">
                                <i class="ri-map-pin-user-line fs-3 text-primary"></i>
                                <p class="m-0 show-address"></p>
                            </div>
                            <div class="col-6 d-flex align-items-center gap-1">
                                <i class="ri-gift-2-line fs-3 text-primary"></i>
                                <p class="m-0 show-birthday"></p>
                            </div>
                            <div class="col-6 d-flex align-items-center gap-1">
                                <i class="ri-building-line fs-3 text-primary"></i>
                                <p class="m-0 show-school"></p>
                            </div>
                            <div class="col-6 d-flex align-items-center gap-1">
                                <i class="ri-calendar-line fs-3 text-primary"></i>
                                <p class="m-0 show-start"></p>
                            </div>
                            <div class="col-6 d-flex align-items-center gap-1">
                                <i class="ri-calendar-line fs-3 text-primary"></i>
                                <p class="m-0 show-finish"></p>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center gap-2 mt-3">
                            <button class="btn btn-success btn-sm btn-accept" type="button">Terima</button>
                            <button class="btn btn-warning btn-sm btn-reject" type="button">Tolak</button>
                            <button class="btn btn-warning btn-sm btn-reject-reason" type="button">Tolak dengan alasan</button>
                            <button class="btn btn-danger btn-sm btn-delete">Hapus</button>
                        </div>
                        <div class="mt-3 mx-4">
                            <h4>CV</h4>
                            <img class="rounded show-cv" alt="200x200" width="330" src="gambar.jpg"
                                style="object-fit: cover; cursor: pointer;" onclick="zoomImage(this)">
                            <div class="mt-2 d-flex justify-content-end">
                                <a class="btn btn-primary download-cv" download="cv.jpg" href="gambar.jpg">Download</a>
                            </div>

                        </div>
                        <div class="mt-3 mx-4">
                            <h4>Pernyataan Orang tua</h4>
                            <img class="rounded show-parent-statement" alt="200x200" width="330" src=""
                                style="object-fit: cover;cursor: pointer;" onclick="zoomImage(this)">
                            <div class="mt-2 d-flex justify-content-end ">
                                <a class="btn btn-primary download-parent-statement" href=""
                                    download="">Download</a>
                            </div>
                        </div>
                        <div class="mt-3 mx-4">
                            <h4>Pernyataan Diri</h4>
                            <img class="rounded show-self-statement" alt="200x200" width="330" src=""
                                style="object-fit: cover;cursor: pointer;" onclick="zoomImage(this)">
                            <div class="mt-2 d-flex justify-content-end ">
                                <a class="btn btn-primary download-self-statement" href=""
                                    download="">Download</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit LImit -->
    <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
        style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Edit Limit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                @if ($limits)
                    <form action="limit/update/{{ $limits->id }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <label for="">Limit</label>
                            <input type="number" class="form-control" value="{{ $limits->limits }}" name="limits"
                                id="">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary ">Save Changes</button>
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                @else
                    <form action="/limit" method="POST">
                        @csrf
                        <div class="modal-body">
                            <label for="">Limit</label>
                            <input type="number" class="form-control" name="limits" id="">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary ">Save Changes</button>
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>

    <!-- Letter Number -->
    <div class="modal fade bs-example-modal-center" id="accepted-one" tabindex="-1" aria-labelledby="mySmallModalLabel"
        style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-2 text-center">
                    <div class="mt-3 mx-3">
                        <h4>Nomor surat</h4>
                        <form action="" id="form-accepted-one" method="POST">
                            @csrf
                            @method('put')
                            <label for="">Masukan Nomer Surat</label>
                            <input type="number" class="form-control" name="letter_number" id="">
                            <div class="mt-4 mb-3 d-flex justify-content-center gap-2">
                                <button class="btn btn-success">Ya,terima</button>
                                <button class="btn btn-light" type="button" data-bs-dismiss="modal">Batal</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bs-example-modal-center" id="modal-acc-multiple" tabindex="-1" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-2 text-center">
                    <div class="mt-3 mx-3">
                        <h4>Nomor surat</h4>
                        <form action="{{ route('approval.acceptMultiple') }}" id="form-accepted" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="selected_ids" id="selected_ids">

                            <div id="school-letters-container">
                                <!-- Dynamic inputs will be inserted here -->
                            </div>

                            <div class="mt-4 mb-3 d-flex justify-content-center gap-2">
                                <button id="acceptButton" class="btn btn-success">Ya, terima</button>
                                <button class="btn btn-light" type="button" data-bs-dismiss="modal">Batal</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="modalReject" tabindex="-1" aria-labelledby="modal-deleteLabel1">
        <div class="modal-dialog modal-sm" role="document">
            <form id="form-reject" method="POST">
                @method('PUT')
                @csrf
                <div class="modal-content">
                    <div class="modal-header d-flex align-items-center">
                        <h5 class="modal-title" id="modal-deleteLabel1">
                            Tolak Siswa
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="text-dark fs-7 mb-0">Apakah anda yakin ingin menolak data?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger text-white font-medium waves-effect"
                            data-bs-dismiss="modal">
                            Tutup
                        </button>
                        <button style="background-color: #1B3061" type="submit" class="btn text-white btn-create">
                            Tolak
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    {{-- modal reject reason start --}}
    <div class="modal fade" id="modalReject-reason" tabindex="-1" aria-labelledby="modal-deleteLabel1">
        <div class="modal-dialog modal-lg" role="document">
            <form id="form-reject-reason" method="POST">
                @method('PUT')
                @csrf
                <div class="modal-content">
                    <div class="modal-header d-flex align-items-center">
                        <h5 class="modal-title" id="modal-deleteLabel1">
                            Tolak Siswa dengan alasan
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label for="reason">Alasan ditolak</label>
                        <input type="text" placeholder="Masukkan alasan" name="reason" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger text-white font-medium waves-effect"
                            data-bs-dismiss="modal">
                            Tutup
                        </button>
                        <button style="background-color: #1B3061" type="submit" class="btn text-white btn-create">
                            Tolak
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- modal reject reason end --}}


    @include('admin.components.delete-modal-component')
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script>
        $('.btn-detail').click(function() {
            let id = $(this).data('id');
            let name = $(this).data('name');
            let avatar = $(this).data('avatar');
            let address = $(this).data('address');
            let phone = $(this).data('phone');
            let birth_date = $(this).data('birthdate');
            let birth_place = $(this).data('birthplace');
            let start_date = $(this).data('startdate');
            let finish_date = $(this).data('finishdate');
            let school = $(this).data('school');
            let cv = $(this).data('cv');
            let self_statement = $(this).data('selfstatement');
            let parents_statement = $(this).data('parentsstatement');
            let email = $(this).data('email');
            let identify_number = $(this).data('identify_number');
            let intern = $(this).data('internship_type');

            $('.show-name').text(name);
            $('.show-internship_type').text(intern);
            $('.show-identify_number').text(identify_number);
            $('.show-email').text(email);
            $('.show-image').attr('src', avatar);
            $('.show-address').text(address);
            $('.show-phone').text(phone);
            $('.show-birthday').text(birth_place + ',' + birth_date)
            $('.show-start').text(start_date);
            $('.show-school').text(school);
            $('.show-finish').text(finish_date);

            // console.log(cv);
            $('.show-cv').attr('src', cv);
            $('.download-cv').attr('href', cv);
            $('.download-cv').attr('download', cv);

            // console.log(parents_statement);
            $('.show-parent-statement').attr('src', parents_statement);
            $('.download-parent-statement').attr('href', parents_statement);
            $('.download-parent-statement').attr('download', parents_statement);

            // console.log(self_statement);
            $('.show-self-statement').attr('src', self_statement);
            $('.download-self-statement').attr('href', self_statement);
            $('.download-self-statement').attr('download', self_statement);


            $('.btn-delete').attr('data-id', id);
            $('.btn-accept').attr('data-id', id);
            $('.btn-reject').attr('data-id', id);
            $('.btn-reject-reason').attr('data-id', id);

            $('#form-declined').attr('action', 'approval/decline/' + id);
            $('#offcanvasRight').offcanvas('show');
        });

        $('.btn-delete').click(function() {
            let id = $(this).data('id');
            $('#form-delete').attr('action', '/approval/delete/' + id);
            $('#modal-delete').modal('show');
        });

        $('.btn-accept').click(function() {
            let id = $(this).data('id');
            $('#form-accepted-one').attr('action', 'approval/accept/' + id);
            $('#accepted-one').modal('show');
        });

        $('.btn-reject').click(function() {
            let id = $(this).data('id');
            $('#form-reject').attr('action', 'approval/decline/' + id);
            $('#modalReject').modal('show');
        });

        $('.btn-reject-reason').click(function() {
            let id = $(this).data('id');
            $('#form-reject-reason').attr('action', 'approval/decline/' + id);
            $('#modalReject-reason').modal('show');
        });
    </script>

    <script>
        function zoomImage(img) {
            // Membuat elemen overlay
            var overlay = document.createElement('div');
            overlay.style.position = 'fixed';
            overlay.style.top = 0;
            overlay.style.left = 0;
            overlay.style.width = '100%';
            overlay.style.height = '100%';
            overlay.style.backgroundColor = 'rgba(0, 0, 0, 0.8)';
            overlay.style.zIndex = 9999;
            overlay.style.display = 'flex';
            overlay.style.alignItems = 'center';
            overlay.style.justifyContent = 'center';

            // Membuat elemen gambar yang diperbesar
            var zoomedImg = document.createElement('img');
            zoomedImg.src = img.src;
            zoomedImg.style.maxWidth = '90%';
            zoomedImg.style.maxHeight = '90%';

            // Menambahkan gambar ke dalam overlay
            overlay.appendChild(zoomedImg);

            // Menambahkan overlay ke dalam body
            document.body.appendChild(overlay);

            // Menghapus overlay saat diklik
            overlay.onclick = function() {
                document.body.removeChild(overlay);
            };
        }
    </script>

    {{-- <script>
    $(document).ready(function() {
        $('#selectAll').on('change', function() {
            $('.cardtableCheck').prop('checked', this.checked);
            toggleSubmitButton();
        });

        $('.cardtableCheck').on('change', function() {
            if ($('.cardtableCheck:checked').length == $('.cardtableCheck').length) {
                $('#selectAll').prop('checked', true);
            } else {
                $('#selectAll').prop('checked', false);
            }
            toggleSubmitButton();
        });

        function toggleSubmitButton() {
            if ($('.cardtableCheck:checked').length > 0) {
                $('#submitSelected').show();
            } else {
                $('#submitSelected').hide();
            }
        }

        $('#submitSelected').on('click', function() {
            var selectedIds = $('.cardtableCheck:checked').map(function() {
                return $(this).val();
            }).get().join(',');
            $('#selected_ids').val(selectedIds);

            // Menampilkan modal ketika tombol submit dipilih
            $('#modal-acc-multiple').modal('show');
        });

        // Tambahkan event listener untuk memperbarui placeholder nomor surat berdasarkan pilihan sekolah
        $('#letter_number').attr('placeholder', 'Masukkan Nomor Surat untuk Sekolah A');
        $('#letter_number').on('input', function() {
            var school = $('#school').val();
            $(this).attr('placeholder', 'Masukkan Nomor Surat untuk ' + school);
        });

    });

    </script> --}}

<script>
    $(document).ready(function() {
        function updateModal() {
            var selectedSchools = {};
            var selectedIds = [];

            // Mengelompokkan siswa berdasarkan sekolah
            $('.cardtableCheck:checked').each(function() {
                var school = $(this).data('school');
                var studentId = $(this).val();

                if (school) { // Pengecekan untuk memastikan bahwa sekolah valid
                    if (!selectedSchools[school]) {
                        selectedSchools[school] = [];
                    }
                    selectedSchools[school].push(studentId);
                    selectedIds.push(studentId);
                }
            });

            // Menghapus input nomor surat yang ada
            $('#nomor-surat-container').empty();

            // Menambahkan input nomor surat untuk setiap sekolah
            for (var school in selectedSchools) {
                if (selectedSchools.hasOwnProperty(school)) {
                    var nomorSuratHtml = `
                        <div class="mb-3">
                            <label for="letter_number">Masukkan Nomor Surat untuk ${school}</label>
                            <input type="number" class="form-control" name="letter_number[${school}]" placeholder="Masukkan Nomor Surat untuk ${school}">
                        </div>
                    `;
                    $('#nomor-surat-container').append(nomorSuratHtml);
                }
            }

            // Memperbarui input hidden dengan ID siswa yang dipilih
            $('#selected_ids').val(selectedIds.join(','));
        }

        // Mendeteksi perubahan pada checkbox siswa
        $('.cardtableCheck').on('change', updateModal);

        // Saat tombol modal di klik, update modal dengan input nomor surat yang sesuai
        $('#openModalButton').on('click', function() {
            updateModal();
            $('#modal-acc-multiple').modal('show');
        });

        // Update modal saat checkbox select all diubah
        $('#selectAll').on('change', function() {
            $('.cardtableCheck').prop('checked', this.checked);
            updateModal();
        });
    });
</script>


<script>
    $(document).ready(function() {
        $('#selectAllOnline').on('change', function() {
            $('.cardtableCheck').prop('checked', this.checked);
            toggleSubmitButton();
        });

        $('.cardtableCheck').on('change', function() {
            if ($('.cardtableCheck:checked').length == $('.cardtableCheck').length) {
                $('#selectAllOnline').prop('checked', true);
            } else {
                $('#selectAllOnline').prop('checked', false);
            }
            toggleSubmitButton();
        });

        function toggleSubmitButton() {
            if ($('.cardtableCheck:checked').length > 0) {
                $('#submitSelectedOnline').show();
            } else {
                $('#submitSelectedOnline').hide();
            }
        }

        $('#submitSelectedOnline').on('click', function() {
            var selectedIds = $('.cardtableCheck:checked').map(function() {
                return $(this).val();
            }).get().join(',');
            $('#selected_ids').val(selectedIds);
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#selectAll').on('change', function() {
            $('.cardtableCheck').prop('checked', this.checked);
            toggleSubmitButton();
        });

        $('.cardtableCheck').on('change', function() {
            if ($('.cardtableCheck:checked').length == $('.cardtableCheck').length) {
                $('#selectAll').prop('checked', true);
            } else {
                $('#selectAll').prop('checked', false);
            }
            toggleSubmitButton();
        });

        function toggleSubmitButton() {
            if ($('.cardtableCheck:checked').length > 0) {
                $('#submitSelected').show();
            } else {
                $('#submitSelected').hide();
            }
        }

        $('#submitSelected').on('click', function() {
            var selectedIds = $('.cardtableCheck:checked').map(function() {
                return $(this).val();
            }).get().join(',');

            $('#selected_ids').val(selectedIds);

            var schools = {};
            $('.cardtableCheck:checked').each(function() {
                var school = $(this).data('school');
                if (!schools[school]) {
                    schools[school] = [];
                }
                schools[school].push($(this).val());
            });

            $('#school-letters-container').empty();
            $.each(schools, function(school, ids) {
                var schoolLabel = $('<label>').text(`Masukkan Nomor Surat untuk ${school}`);
                var schoolInput = $('<input>').attr({
                    type: 'number',
                    class: 'form-control',
                    name: `letter_numbers[${school}]`,
                    id: `letter_number_${school}`
                });
                var schoolGroup = $('<div>').addClass('school-letter-group');
                schoolGroup.append(schoolLabel).append(schoolInput);
                $('#school-letters-container').append(schoolGroup);
            });
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#selectAllOnline').on('change', function() {
            $('.cardtableCheck-online').prop('checked', this.checked);
            toggleSubmitButton();
        });

        $('.cardtableCheck-online').on('change', function() {
            if ($('.cardtableCheck-online:checked').length == $('.cardtableCheck-online').length) {
                $('#selectAllOnline').prop('checked', true);
            } else {
                $('#selectAllOnline').prop('checked', false);
            }
            toggleSubmitButton();
        });

        function toggleSubmitButton() {
            if ($('.cardtableCheck-online:checked').length > 0) {
                $('#submitSelectedOnline').show();
            } else {
                $('#submitSelectedOnline').hide();
            }
        }

        $('#submitSelectedOnline').on('click', function() {
            var selectedIds = $('.cardtableCheck-online:checked').map(function() {
                return $(this).val();
            }).get().join(',');

            $('#selected_ids').val(selectedIds);

            var schools = {};
            $('.cardtableCheck-online:checked').each(function() {
                var school = $(this).data('school');
                if (!schools[school]) {
                    schools[school] = [];
                }
                schools[school].push($(this).val());
            });

            $('#school-letters-container').empty();
            $.each(schools, function(school, ids) {
                var schoolLabel = $('<label>').text(`Masukkan Nomor Surat untuk ${school}`);
                var schoolInput = $('<input>').attr({
                    type: 'number',
                    class: 'form-control',
                    name: `letter_numbers[${school}]`,
                    id: `letter_number_${school}`
                });
                var schoolGroup = $('<div>').addClass('school-letter-group');
                schoolGroup.append(schoolLabel).append(schoolInput);
                $('#school-letters-container').append(schoolGroup);
            });
        });
    });
</script>

@endsection
