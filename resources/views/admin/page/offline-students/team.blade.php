@extends('admin.layouts.app')
@section('content')
<div class="card">
    <div class="px-3 py-1">
        <div class="d-flex row justify-content-between align-items-center">
            <div class="col-xl-3 col-sm-4 m-0">
                <h4 class="my-0 py-0">Team</h4>
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
    <div class="col-xl-3">
        <div class="card">
            <span class="card-img-top w-100" style="height: 100px; background-color: #C7C7C7"></span>
            <div class="d-flex justify-content-center px-3" style="margin-top: -27px;">
                <img src="{{ asset('assets-user/dist/images/profile/user-1.jpg') }}" class="rounded-circle rounded w-25" style=" border: 6px solid #f4f4f4f4;">
            </div>
            <div class="card-body text-center">
                <div class="d-flex justify-content-center gap-2 mb-2">
                    <span class="badge bg-success-subtle text-success">Premini project</span>
                    <span class="badge bg-danger-subtle text-danger">Expired project</span>
                    <span class="badge bg-secondary-subtle text-secondary">Website</span>
                </div>
                <a href="{{ url('/offline-students/team/detail') }}" style="font-size: 15px" class="text-dark">
                    Pre-Mini Project Team Laundry
                </a>
                <p class="text-muted">
                    Jumat, 12 Januari 2024
                </p>
                <div class="d-flex w-100 justify-content-center align-items-center"><p>Anggota: </p>
                    <div class="d-flex">
                        @foreach (range(1, 3) as $team)
                            <img src="{{ asset('assets-user/dist/images/profile/user-1.jpg') }}" class="rounded-circle" style="width: 13%">
                        @endforeach
                    </div>
                </div>
              <div class="d-flex justify-content-between pt-3">
                <div class="gap-2 d-flex">
                    <svg width="19" height="17" viewBox="0 0 19 17" fill="none" xmlns="http://www.w3.org/2000/svg" class="mt-1">
                        <path d="M10.554 2.375H17.8013M10.554 5.875H15.0835M10.554 11.125H17.8013M10.554 14.625H15.0835M1.49487 2.375C1.49487 2.14294 1.59032 1.92038 1.76021 1.75628C1.9301 1.59219 2.16052 1.5 2.40078 1.5H6.02442C6.26469 1.5 6.49511 1.59219 6.665 1.75628C6.83489 1.92038 6.93033 2.14294 6.93033 2.375V5.875C6.93033 6.10706 6.83489 6.32962 6.665 6.49372C6.49511 6.65781 6.26469 6.75 6.02442 6.75H2.40078C2.16052 6.75 1.9301 6.65781 1.76021 6.49372C1.59032 6.32962 1.49487 6.10706 1.49487 5.875V2.375ZM1.49487 11.125C1.49487 10.8929 1.59032 10.6704 1.76021 10.5063C1.9301 10.3422 2.16052 10.25 2.40078 10.25H6.02442C6.26469 10.25 6.49511 10.3422 6.665 10.5063C6.83489 10.6704 6.93033 10.8929 6.93033 11.125V14.625C6.93033 14.8571 6.83489 15.0796 6.665 15.2437C6.49511 15.4078 6.26469 15.5 6.02442 15.5H2.40078C2.16052 15.5 1.9301 15.4078 1.76021 15.2437C1.59032 15.0796 1.49487 14.8571 1.49487 14.625V11.125Z" stroke="#5D87FF" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <p class="text-muted">5 Tugas</p>
                </div>
                <div class="gap-2 d-flex">
                    <svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="mt-1">
                        <path d="M10 14.4165C8.74584 13.6924 7.32318 13.3112 5.875 13.3112C4.42682 13.3112 3.00416 13.6924 1.75 14.4165V2.49982C3.00416 1.77573 4.42682 1.39453 5.875 1.39453C7.32318 1.39453 8.74584 1.77573 10 2.49982M10 14.4165C11.2542 13.6924 12.6768 13.3112 14.125 13.3112C15.5732 13.3112 16.9958 13.6924 18.25 14.4165V2.49982C16.9958 1.77573 15.5732 1.39453 14.125 1.39453C12.6768 1.39453 11.2542 1.77573 10 2.49982M10 14.4165V2.49982" stroke="#5D87FF" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <p class="text-muted">27 Materi</p>
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
@endsection
