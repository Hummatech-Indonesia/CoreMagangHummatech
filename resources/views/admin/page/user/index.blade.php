@extends('admin.layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row g-2 align-items-center">
                <div class="col-sm-4">
                    <h3 class="mx-3">Data Siswa</h3>
                </div>
                <div class="col-sm-auto ms-auto d-flex justify-content-between ">
                    <div class="list-grid-nav hstack gap-1 mx-1">
                        <select name="school" class="form-select" id="">
                            <option disabled selected>Sekolah</option>
                            <option value="1">Sekolah 1</option>
                            <option value="2">Sekolah 2</option>
                        </select>
                    </div>
                    <div class="list-grid-nav hstack gap-1 mx-1">
                        <select name="status" class="form-select" id="">
                            <option disabled selected>Status</option>
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </select>
                    </div>
                    <div class="list-grid-nav hstack gap-1 mx-1">
                        <select name="gender" class="form-select" id="">
                            <option disabled selected>jenis kelamin</option>
                            <option value="male">Laki-laki</option>
                            <option value="female">Perempuan</option>
                        </select>
                    </div>
                    <div class="search-box d-flex justify-content-end w-25">
                        <input type="text" class="form-control" id="searchMemberList" placeholder="Cari Siswa...">
                        <i class="ri-search-line search-icon"></i>
                    </div>
                    <div class="list-grid-nav hstack gap-1">
                        <button class="btn btn-primary addMembers-modal" data-bs-toggle="modal"
                            data-bs-target="#addmemberModal">
                            Cari
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        @foreach ($students as $student)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body d-flex justify-content-between">
                        <div class="d-flex gap-3 align-items-center">
                            <div class="">
                                <img src="{{ asset('storage/' . $student->avatar) }}" class="avatar-xl rounded"
                                    alt="">
                            </div>
                            <div class="">
                                <h5 class="m-0">{{ $student->name }}</h5>
                                <p class="m-1 text-muted">{{ $student->school }}</p>
                                <div class="mt-1 d-flex  justify-content-start gap-1">
                                    <div class="w-50 m-0">
                                        <p class="m-0 text-muted">Status</p>
                                        <span class="badge {{ $student->acepted == '0' ? 'bg-danger' : 'bg-success' }} "
                                            style="font-size: 12px">{{ $student->acepted == '0' ? 'Tidak Aktif' : 'Aktif' }}</span>
                                    </div>
                                    <div class="w-50">
                                        <p class="m-0 text-muted">Divisi</p>
                                        <span
                                            class="badge {{ $student->division_id == !null ? 'bg-success-subtle text-success' : 'bg-danger-subtle text-danger' }} "
                                            style="font-size: 12px">{{ $student->division_id == !null ? $student->division->name : 'N/A' }}</span>
                                    </div>
                                </div>
                                <div class="mt-3 d-flex justify-content-start gap-1">
                                    <button class="btn btn-sm btn-soft-secondary w-50 btn-detail"
                                        data-name="{{ $student->name }}" data-phone="{{ $student->phone }}"
                                        data-address="{{ $student->address }}" data-birthdate="{{ $student->birth_date }}"
                                        data-birthplace="{{ $student->birth_place }}"
                                        data-startdate="{{ $student->start_date }}"
                                        data-finishdate="{{ $student->finish_date }}" data-school="{{ $student->school }}"
                                        data-avatar="{{ $student->avatar }}" data-cv="{{ $student->cv }}"
                                        data-selfstatement="{{ $student->self_statement }}"
                                        data-parentsstatement="{{ $student->parents_statement }}">Detail</button>
                                    @if ($student->division_id == null)
                                        <button class="btn btn-sm btn-soft-primary w-100 btn-join"
                                            data-id="{{ $student->id }}">Tambah Divisi</button>
                                    @else
                                        <button class="btn btn-sm btn-soft-danger w-50">Banned</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="dropdown card-header-dropdown">
                                <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <span class="text-muted fs-16"><i class="mdi mdi-dots-vertical align-middle"></i></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" style="">
                                    <a class="dropdown-item" href="/menu-siswa/face/{{ $student->id }}">Wajah</a>
                                    <form action="/menu-siswa/reset-password/{{ $student->id }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button class="dropdown-item" type="submit">Reset Password</button>
                                    </form>
                                    <button class="dropdown-item btn-change" data-id="{{ $student->id }}">Ganti
                                        Profile</button>
                                    <a class="dropdown-item btn-delete" id="{{ $student->id }}"
                                        data-id="{{ $student->id }}">Hapus</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @if (session('message'))
        <div id="message" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-modal="true"
            role="dialog">
            <div class="modal-dialog">
                <div class="modal-content text-center">
                    <div class="modal-header">
                    </div>
                    <div class="modal-body">
                        <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 24 24"
                            class="bg-success rounded-circle icon" fill="none" stroke="white" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-check">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M5 12l5 5l10 -10" />
                        </svg>
                        <h4 class="text-dark fs-7 mb-0 mt-3">{{ session('message') }}</h4>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="button" class="btn btn-success" data-bs-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>
    @endif

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

    @include('admin.components.delete-modal-component')

    <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
        style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Ubah Foto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                </div>
                <form action="" method="POST" id="form-change" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label">Foto</label>
                                <input type="file" name="avatar" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary ">Simpan</button>
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                        </div>

                    </div><!-- /.modal-content -->
                </form>
            </div><!-- /.modal-dialog -->
        </div>
    </div>
    <div id="modal-join" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
        style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Tambah Divisi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                </div>
                <form action="" method="POST" id="form-join" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label">Pilih Divisi</label>
                                <select class="form-select" name="division_id">
                                    <option disabled selected>Pilih Divisi</option>
                                    @forelse ($divisions as $division)
                                        <option value="{{ $division->id }}">{{ $division->name }}</option>
                                    @empty
                                        <option value="">Tidak ada divisi</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary ">Simpan</button>
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                        </div>

                    </div><!-- /.modal-content -->
                </form>
            </div><!-- /.modal-dialog -->
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

            $('#offcanvasRight').offcanvas('show');
        });

        $('.btn-change').click(function() {
            let id = $(this).data('id');
            $('#form-change').attr('action', '/menu-siswa/update/' + id);
            $('#myModal').modal('show');
        });

        $('.btn-delete').click(function() {
            let id = $(this).data('id');
            $('#form-delete').attr('action', '/menu-siswa/delete/' + id);
            $('#modal-delete').modal('show');
        });

        $('.btn-join').click(function() {
            let id = $(this).data('id');
            $('#form-join').attr('action', '/menu-siswa/update/' + id);

            $('#modal-join').modal('show');
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
