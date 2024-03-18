@extends('admin.layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row g-2">
                <div class="col-sm-4 align-items-center d-flex">
                    <h5 class="mx-5 align-items-center">Approval Pendaftaran</h5>
                </div>
                <div class="col-sm-auto ms-auto d-flex">
                    <div class="search-box mx-3">
                        <input type="text" class="form-control" id="searchMemberList" placeholder="Cari Siswa...">
                        <i class="ri-search-line search-icon"></i>
                    </div>
                    <div class="list-grid-nav hstack gap-1">
                        <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#myModal">
                            Edit Limit
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex justify-content-between mx-3">
                    <div class="d-flex gap-2">
                        <p class="m-0">Show</p>
                        <select name="" id="">
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                        <p class="m-0">entries</p>
                    </div>
                    <div>
                        <span class="btn bg-secondary-subtle text-secondary">Limit saat ini 70</span>
                    </div>
                </div><!-- end card header -->

                <div class="card-body mx-3">
                    <div class="live-preview ">
                        <div class="table-responsive table-card">
                            <table class="table align-middle table-nowrap table-striped-columns mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col" style="width: 46px;">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="cardtableCheck">
                                                <label class="form-check-label" for="cardtableCheck"></label>
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
                                    @foreach ($students as $student)
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="cardtableCheck01">
                                                    <label class="form-check-label" for="cardtableCheck01"></label>
                                                </div>
                                            </td>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $student->name }}</td>
                                            <td>{{ $student->major }}</td>
                                            <td>{{ $student->class }}</td>
                                            <td style="font-family: Arial, sans-serif; font-size: 14px; color: #333;">
                                                {{ \carbon\Carbon::parse($student->start_date)->isoFormat('dddd, D MMMM YYYY') }}
                                            </td>
                                            <td>{{ $student->school }}</td>
                                            <td>
                                                <button type="button" data-id="{{ $student->id }}"
                                                    data-name="{{ $student->name }}" data-phone="{{ $student->phone }}"
                                                    data-address="{{ $student->address }}"
                                                    data-birthdate="{{ $student->birth_date }}"
                                                    data-birthplace="{{ $student->birth_place }}"
                                                    data-startdate="{{ $student->start_date }}"
                                                    data-finishdate="{{ $student->finish_date }}"
                                                    data-school="{{ $student->school }}"
                                                    data-avatar="{{ $student->avatar }}" data-cv="{{ $student->cv }}"
                                                    data-selfstatement="{{ $student->self_statement }}"
                                                    data-parentsstatement="{{ $student->parents_statement }}"
                                                    class="btn bg-secondary-subtle text-secondary btn-detail">
                                                    <i class="ri-eye-fill"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!-- end card-body -->
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
                        <div class="row mx-2">
                            <div class="col-6 d-flex align-items-center gap-1">
                                <i class="ri-map-pin-user-line fs-3 text-primary"></i>
                                <p class="m-0 show-address"></p>
                            </div>
                            <div class="col-6 d-flex align-items-center gap-1">
                                <i class=" ri-smartphone-line fs-3 text-primary"></i>
                                <p class="m-0 show-phone"></p>
                            </div>
                            <div class="col-6 d-flex align-items-center gap-1">
                                <i class="ri-gift-2-line fs-3 text-primary"></i>
                                <p class="m-0 show-birthday"></p>
                            </div>
                            <div class="col-6 d-flex align-items-center gap-1">
                                <i class="ri-calendar-line fs-3 text-primary"></i>
                                <p class="m-0 show-start"></p>
                            </div>
                            <div class="col-6 d-flex align-items-center gap-1">
                                <i class="ri-building-line fs-3 text-primary"></i>
                                <p class="m-0 show-school"></p>
                            </div>
                            <div class="col-6 d-flex align-items-center gap-1">
                                <i class="ri-calendar-line fs-3 text-primary"></i>
                                <p class="m-0 show-finish"></p>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center gap-2 mt-3">
                            <button class="btn btn-success btn-accept" type="button">Terima</button>
                            <form action="" id="form-declined" method="POST">
                                @csrf
                                @method('put')
                                <button class="btn btn-warning" type="submit">Tolak</button>
                            </form>
                            <button class="btn btn-danger btn-delete">Hapus</button>
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
                            <div class="mt-2 d-flex justify-content-end " >
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
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                </div>
                <div class="modal-body">
                    <label for="">Limit</label>
                    <input type="number" class="form-control" name="limit" id="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary ">Save Changes</button>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

    <!-- Letter Number -->
    <div class="modal fade bs-example-modal-center" tabindex="-1" aria-labelledby="mySmallModalLabel"
        style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-2 text-center">
                    <div class="mt-3 mx-3">
                        <h4>Nomor surat</h4>
                        <form action="" id="form-accepted" method="POST">
                            @csrf
                            @method('put')
                            <label for="">Masukan Nomer Surat</label>
                            <input type="text" class="form-control" name="letter_number" id="">
                            <div class="mt-4 mb-3 d-flex justify-content-center gap-2">
                                <button class="btn btn-success">Ya,terima</button>
                                <button class="btn btn-light">Batal</button>
                            </div>
                        </form>
                    </div>
                </div>
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

            $('.show-name').text(name);
            $('.show-image').attr('src', '{{ asset('storage') }}/' + avatar);
            $('.show-address').text(address);
            $('.show-phone').text(phone);
            $('.show-birthday').text(birth_place + ',' + birth_date)
            $('.show-start').text(start_date);
            $('.show-school').text(school);
            $('.show-finish').text(finish_date);

            // console.log(cv);
            $('.show-cv').attr('src', '{{ asset('storage') }}/' + cv);
            $('.download-cv').attr('href', '{{ asset('storage') }}/' + cv);
            $('.download-cv').attr('download', '{{ asset('storage') }}/' + cv);

            // console.log(parents_statement);
            $('.show-parent-statement').attr('src', '{{ asset('storage') }}/' + parents_statement);
            $('.download-parent-statement').attr('href', '{{ asset('storage') }}/' + parents_statement);
            $('.download-parent-statement').attr('download', '{{ asset('storage') }}/' + parents_statement);

            // console.log(self_statement);
            $('.show-self-statement').attr('src', '{{ asset('storage') }}/' + self_statement);
            $('.download-self-statement').attr('href', '{{ asset('storage') }}/' + self_statement);
            $('.download-self-statement').attr('download', '{{ asset('storage') }}/' + self_statement);


            $('.btn-delete').attr('data-id', id);
            $('.btn-accept').attr('data-id', id);

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
            $('#form-accepted').attr('action', 'approval/accept/' + id);
            $('.bs-example-modal-center').modal('show');
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
@endsection
