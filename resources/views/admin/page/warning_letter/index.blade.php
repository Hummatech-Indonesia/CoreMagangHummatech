@extends('admin.layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row g-2">
                <div class="col-sm-4 align-items-center d-flex">
                    <h5 class="mx-5 align-items-center">Data Sp</h5>
                </div>
                <div class="col-sm-auto ms-auto d-flex">
                    <div class="search-box mx-3">
                        <input type="text" class="form-control" id="searchMemberList" placeholder="Cari Siswa...">
                        <i class="ri-search-line search-icon"></i>
                    </div>
                    <div class="list-grid-nav hstack gap-1">
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#myModal">
                            Tambah
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex justify-content-between">
                    <div class="d-flex gap-2">
                        <p class="m-0">Show</p>
                        <select name="" id="">
                            <option value="10">10</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                        <p class="m-0">entries</p>
                    </div>
                </div><!-- end card header -->

                <div class="card-body ">
                    <div class="live-preview ">
                        <div class="table-responsive table-card">
                            <table class="table align-middle table-nowrap table-striped-columns mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">No Surat</th>
                                        <th scope="col">Alasan</th>
                                        <th scope="col">Keterangan</th>
                                        <th scope="col" style="width: 150px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($warningLetters as $warningLetter)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $warningLetter->student->name }}</td>
                                            <td style="font-family: Arial, sans-serif; font-size: 14px; color: #333;">
                                                {{ \carbon\Carbon::parse($warningLetter->start_date)->locale('id')->isoFormat('dddd, D MMMM YYYY') }}
                                            </td>
                                            <td>{{ $warningLetter->reference_number }}</td>
                                            <td>{{ Str::limit($warningLetter->reason, 50) }}</td>
                                            <td>SP {{ $warningLetter->status }}</td>
                                            <td>
                                                <a class="btn btn-light edit-item-btn"><i class="  ri-eye-line"></i></a>
                                                <a class="btn btn-soft-warning edit-item-btn"><i class=" ri-printer-line"></i></a>
                                                <a class="btn btn-soft-danger edit-item-btn"><i class="  bx bx-trash"></i></a>
                                                </div>
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
                            <img src="" class="avatar-xl rounded-circle show-image" alt="">
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
                            <img class="rounded show-cv" alt="200x200" width="330" src="">
                            <div class="mt-2 d-flex justify-content-end">
                                <a class="btn btn-primary download-cv" download="" href="">Download</a>
                            </div>
                        </div>
                        <div class="mt-3 mx-4">
                            <h4>Pernyataan Orang tua</h4>
                            <img class="rounded show-parent-statement" alt="200x200" width="330" src="">
                            <div class="mt-2 d-flex justify-content-end ">
                                <a class="btn btn-primary download-parent-statement" href=""
                                    download="">Download</a>
                            </div>
                        </div>
                        <div class="mt-3 mx-4">
                            <h4>Pernyataan Diri</h4>
                            <img class="rounded show-self-statement" alt="200x200" width="330" src="">
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
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                </div>
                <form action="warning-letter/store" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <label for="">Nama Siswa</label>
                                <select name="student_id" class="form-select select2" id="">
                                    <option value="">Pilih Siswa</option>
                                    @foreach ($students as $student)
                                        <option value="{{ $student->id }}">{{ $student->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 mt-3">
                                <label for="" class="mt-2">Status Sp</label><br>
                                <div class="d-flex justify-content-header gap-2">
                                    <input name="status" type="radio" class="" value="1"> SP 1
                                    <input name="status" type="radio" class="" value="2"> SP 2
                                    <input name="status" type="radio" class="" value="3"> SP 3
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="" class="mt-2">Tanggal Pembuatan</label>
                            <input name="date" type="date" class="form-control">
                        </div>
                        <div class="col-12">
                            <label for="" class="mt-2">Nomor Surat</label>
                            <input name="reference_number" type="number" class="form-control">
                        </div>
                        <div class="col-12">
                            <label for="" class="mt-2">Alasan</label>
                            <textarea name="reason" type="text" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary ">Simpan</button>
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </form>
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
@endsection
