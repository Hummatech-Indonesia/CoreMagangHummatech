@extends('admin.layouts.app')
@section('content')
<div class="card">
    <div class="card-body d-flex justify-content-between">
        <ul class="nav nav-pills nav-custom nav-custom-light" style="width: fit-content" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#nav-light-home" role="tab">
                    Project
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#nav-light-profile" role="tab">
                    Catatan
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#nav-light-messages" role="tab">
                    Board
                </a>
            </li>
        </ul>
        <a href="{{ url('/offline-students/team') }}" class="btn bg-primary-subtle waves-effect waves-light shadow-none">Kembali</a>
    </div>
</div>

<div class="card">
    <div class="card-body row">
        <div class="info d-flex align-items-center col-xl-7">
            <img class="rounded-circle avatar-xl shadow ms-3" alt="200x200" src="{{ asset('assets/images/users/avatar-4.jpg') }}">
            <div class="description px-4">
                <h4>IndeKost Mini Project</h4>
                <p class="text-muted mb-3">
                    Lorem ipsum dolor sit amet consectetur. Dignissim feugiat pretium arcu velit eu amet porttitor. Aliquam nibh quis blandit dolor pellentesque.
                </p>
                <p class="text-muted mb-1">
                    Link Repository: 
                    <a href="https://github.com/Irsyadandhikaariadi/indekostv2" target="_blank" class="text-secondary">https://github.com/Irsyadandhikaariadi/indekostv2</a>
                </p>
                <p class="text-muted mb-1">
                    Tanggal Mulai: Jumat, 18 Februari 2020
                </p>
                <p class="text-muted mb-1">
                    Tenggat: Jumat, 18 Maret 2020
                </p>
            </div>
        </div>
        <div class="col-xl-5">
            <div class="row gap-3">
                <div class="col-5 m-0 card card-animate">
                    <div class="py-3 d-flex justify-content-between">
                        <div>
                            <p class="fw-medium text-muted mb-0">Di Revisi</p>
                            <h2 class="mt-1 ff-secondary fw-semibold"><span class="counter-value" data-target="24">0</span>Tugas</h2>
                        </div>
                        <div class="avatar-sm flex-shrink-0">
                            <span class="avatar-title bg-secondary-subtle text-secondary rounded-circle fs-2">
                                <i class="ri-attachment-2"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-5 m-0 card card-animate">
                    <div class="py-3 d-flex justify-content-between">
                        <div>
                            <p class="fw-medium text-muted mb-0">Tugas Baru</p>
                            <h2 class="mt-1 ff-info fw-semibold"><span class="counter-value" data-target="24">0</span>Tugas</h2>
                        </div>
                        <div class="avatar-sm flex-shrink-0">
                            <span class="avatar-title bg-info-subtle text-info rounded-circle fs-2">
                                <i class="ri-task-line"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-5 m-0 card card-animate">
                    <div class="py-3 d-flex justify-content-between">
                        <div>
                            <p class="fw-medium text-muted mb-0">Tugas Baru</p>
                            <h2 class="mt-1 ff-success fw-semibold"><span class="counter-value" data-target="24">0</span>Tugas</h2>
                        </div>
                        <div class="avatar-sm flex-shrink-0">
                            <span class="avatar-title bg-success-subtle text-success rounded-circle fs-2">
                                <i class="ri-list-check-2"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-5 m-0 card card-animate">
                    <div class="py-3 d-flex justify-content-between">
                        <div>
                            <p class="fw-medium text-muted mb-0">Tugas Baru</p>
                            <h2 class="mt-1 ff-warning fw-semibold"><span class="counter-value" data-target="24">0</span>Tugas</h2>
                        </div>
                        <div class="avatar-sm flex-shrink-0">
                            <span class="avatar-title bg-warning-subtle text-warning rounded-circle fs-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 39 39" fill="none">
                                    <path d="M3.25 19.5C3.25 28.4746 10.5254 35.75 19.5 35.75C28.4746 35.75 35.75 28.4746 35.75 19.5C35.75 10.5254 28.4746 3.25 19.5 3.25C10.5254 3.25 3.25 10.5254 3.25 19.5ZM32.5 19.5C32.5 26.6797 26.6797 32.5 19.5 32.5C12.3203 32.5 6.5 26.6797 6.5 19.5C6.5 12.3203 12.3203 6.5 19.5 6.5C26.6797 6.5 32.5 12.3203 32.5 19.5ZM29.25 19.5C29.25 22.1925 28.1586 24.63 26.3942 26.3942L19.5 19.5V9.75C24.8848 9.75 29.25 14.1152 29.25 19.5Z" fill="#FFAA05"/>
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h5>Anggota Tim</h5>
        <div class="d-flex">
            <div class="col-3 card">
                <div class="card-body">
                    <img class="rounded-circle avatar-sm shadow" alt="200x200" src="{{ asset('assets/images/users/avatar-4.jpg') }}">
                    <div class="d-block">
                        <p>Oliver Phillips</p>
                        <p class="badge bg-secondary">Ketua Kelompok</p>
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
            <form action="" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-1">
                        <label for="divisi" class="col-form-label">Divisi</label>
                        <select class="tambah js-example-basic-single form-control @error('divisi') is-invalid @enderror" aria-label=".form-select example" name="student_id">
                            <option value="">WEB</option>
                            <option value="">MOBILE</option>
                            <option value="">UI/UX</option>
                            <option value="">DIGITAL MARKETING</option>
                        </select>
                        @error('divisi')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Buat</button>
                </div>
            </form>
        </div>
    </div>
</div>

    <!-- offcanvas -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header border-bottom">
            <h5 class="offcanvas-title" id="offcanvasRightLabel">Detail Alumni</h5>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function() {
            $("#message").modal('show');
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
                var $table = $('#responsive-team');
                if (screenWidth <= 880) {
                $table.addClass('py-4');
                } else {
                $table.removeClass('py-4');
                }
            }

            toggleTableResponsive();

            $(window).resize(function() {
                toggleTableResponsive();
            });
        });
    </script>
@endsection
