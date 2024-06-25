@extends('admin.layouts.app')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h4 class="mx-3">Data Alumni</h4>
            </div>
            <button class="btn btn-success" data-toggle="modal" data-target="#tambahAlumniModal">Tambah Alumni</button>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="tambahAlumniModal" tabindex="-1" aria-labelledby="tambahAlumniModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahAlumniModalLabel">Tambah Alumni</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form action="{{ route('alumni-admin.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control mb-3" id="nama" name="name" placeholder="Masukkan nama">
                    </div>
                    <div class="form-group">
                        <label for="sekolah">Sekolah</label>
                        <input type="text" class="form-control mb-3" id="sekolah" name="school" placeholder="Masukkan sekolah">
                    </div>
                    <div class="form-group">
                        <label for="gambar">Gambar</label>
                        <input type="file" class="form-control" name="image" id="gambar">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="row">
    @forelse ($alumni as $alumni)
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card">
                <div class="card-body d-flex justify-content-between">
                    <div class="d-flex gap-3 align-items-center">
                        <div class="">
                            {{-- <img src="{{ asset('storage/' . $alumni->image) }}" class="avatar-xl rounded" alt=""> --}}
                            @if (file_exists(public_path('storage/' . $alumni->image)))
                                <img class="avatar-xl rounded"
                                    style="object-fit: cover"
                                    src="{{ asset('storage/' . $alumni->image) }}">
                            @else
                                <img class="avatar-xl rounded"
                                    style="object-fit: cover"
                                    src="{{ asset('user.webp') }}">
                            @endif
                        </div>
                        <div class="">
                            <h5 class="m-0">{{$alumni->name}}</h5>
                            <p class="m-1 text-muted">{{$alumni->school}}</p>
                            <div class="mt-1 d-flex  justify-content-start gap-1">
                                <div class="w-50 m-0">
                                    <span class="badge px-4 bg-info" style="font-size: 12px">Lulus</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="dropdown card-header-dropdown">
                            <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <span class="text-muted fs-16"><i class="mdi mdi-dots-vertical align-middle"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" style="">
                                {{-- <button class="dropown-item bg-transparent border-0 w-100 text-start ps-3 btn-detail"
                                    data-name="Tonya kobo" data-phone="0054157785" data-address="Malang, Jawa Timur"
                                    data-birthdate="2005-10-23" data-birthplace="Malang" data-startdate="2024-07-16"
                                    data-finishdate="2024-12-16" data-school="SMKN 1 TAMBAKBOYO"
                                    data-avatar="{{ asset('assets/images/users/avatar-6.jpg') }}"
                                    data-cv="{{ asset('assets/images/error400-cover.png') }}"
                                    data-selfstatement="{{ asset('assets/images/error400-cover.png') }}"
                                    data-parentsstatement="{{ asset('assets/images/error400-cover.png') }}">Detail</button> --}}
                                {{-- <button class="dropown-item bg-transparent border-0 w-100 text-start ps-3 text-danger">
                                    Hapus
                                </button> --}}
                                <button class="dropdown-item btn-delete text-danger"
                                                id="{{ $alumni->id }}"
                                                data-id="{{ $alumni->id }}">Hapus</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty

    @endforelse
</div>
<div class="d-flex justify-content-between px-3">
    {{-- <p>Showing 1 to 10 of 14 entries</p>
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
    </nav> --}}
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
                        <img src="" class="avatar-xl rounded-circle show-image" alt="" style="object-fit: cover">
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
                            <a class="btn btn-primary download-parent-statement" href="" download="">Download</a>
                        </div>
                    </div>
                    <div class="mt-3 mx-4">
                        <h4>Pernyataan Diri</h4>
                        <img class="rounded show-self-statement" alt="200x200" width="330" src=""
                            style="object-fit: cover;cursor: pointer;" onclick="zoomImage(this)">
                        <div class="mt-2 d-flex justify-content-end ">
                            <a class="btn btn-primary download-self-statement" href="" download="">Download</a>
                        </div>
                    </div>
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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
    $('.btn-delete').click(function() {
        let id = $(this).data('id');
        $('#form-delete').attr('action', '/alumni-admin/delete/' + id);
        $('#modal-delete').modal('show');
    });
</script>
@endsection
