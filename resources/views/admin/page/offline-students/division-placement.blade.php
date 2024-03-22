@extends('admin.layouts.app')
@section('content')
<div class="card">
    <div class="px-3 py-1">
        <div class="d-flex row justify-content-between align-items-center">
            <div class="col-xl-3 col-sm-4 m-0">
                <h4 class="my-0 py-0">Penempatan Divisi</h4>
            </div>
            <div class="col-xl-2">
                <form class="app-search d-none d-md-block w-100">
                    <div class="position-relative">
                        <input type="text" class="form-control" placeholder="Cari..." autocomplete="off" id="search-options" value="">
                        <span class="mdi mdi-magnify search-widget-icon"></span>
                        <span class="mdi mdi-close-circle search-widget-icon search-widget-icon-close d-none" id="search-close-options"></span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
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
                    <table class="align-middle table table-nowrap table-bordered table-striped" style="width:100%">
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
                                        <img src="{{ asset('storage/'. $studentOffline->avatar) }}" alt="{{ $studentOffline->name }}" class="rounded-circle avatar-sm">
                                        <div class="mt-3 ms-3">
                                            <h5 class="m-0 p-0">{{ $studentOffline->name }}</h5>
                                            <p class="text-primary">{{ $studentOffline->school }}</p>
                                        </div>
                                    </td>
                                    <td>{{ \carbon\Carbon::parse($studentOffline->start_date)->locale('id_ID')->isoFormat('D MMMM YYYY') }}</td>
                                    <td>{{ \carbon\Carbon::parse($studentOffline->finish_date)->locale('id_ID')->isoFormat('D MMMM YYYY') }}</td>
                                    <td>
                                        {{ $studentOffline->email }}
                                    </td>
                                    <td class="text-center">
                                        <div class="dropdown d-inline-block">
                                            <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ri-more-fill align-middle"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li>
                                                    <button type="button" class="dropdown-item btn-detail" data-id="1"
                                                    data-name="{{ $studentOffline->name }}" data-phone="{{ $studentOffline->phone }}"
                                                    data-address="{{ $studentOffline->address }}" data-birthdate="{{ $studentOffline->birth_date }}"
                                                    data-birthplace="{{ $studentOffline->birth_place }}"
                                                    data-startdate="{{ \carbon\Carbon::parse($studentOffline->start_date)->locale('id_ID')->isoFormat('D MMMM YYYY') }}"
                                                    data-finishdate="{{ \carbon\Carbon::parse($studentOffline->finish_date)->locale('id_ID')->isoFormat('D MMMM YYYY') }}" 
                                                    data-school="{{ $studentOffline->school }}"
                                                    data-avatar="{{ asset('storage/'. $studentOffline->avatar) }}" 
                                                    data-cv="{{ asset('storage/'. $studentOffline->cv) }}"
                                                    data-selfstatement="{{ asset('storage/'. $studentOffline->self_statement) }}"
                                                    data-parentsstatement="{{ asset('storage/'. $studentOffline->parents_statement) }}">
                                                        <i class="ri-eye-fill align-bottom me-2 text-muted"></i> Lihat Detail
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type="button" class="dropdown-item edit-item-btn btn-edit" data-id="{{ $studentOffline->id }}">
                                                        <i class="ri-apps-2-line align-bottom me-2 text-secondary"></i> Tempatkan Divisi
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <p>Tidak ada data</p>
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
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
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
                        <select class="tambah js-example-basic-single form-control" aria-label=".form-select example" name="division_id">
                           @forelse ($divisions as $division)
                                <option>Pilih divisi</option>
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

    <!-- offcanvas -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header border-bottom">
            <h5 class="offcanvas-title" id="offcanvasRightLabel">Detail Siswa</h5>
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
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
        
        $('.btn-edit').click(function () {
            var id = $(this).data('id');
            $('#form-update').attr('action', '/offline-students/division-placement/' + id);
            $('#add').modal('show');
        });
    </script>

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

            $('#offcanvasRight').offcanvas('show');
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
    </script>
@endsection
