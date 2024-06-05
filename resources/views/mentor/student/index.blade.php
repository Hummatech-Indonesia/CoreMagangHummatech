@extends('mentor.layouts.app')
@section('style')
<style>

@media (max-width: 767px) {
  #offcanvasRight { width: 100%; }
}

@media (min-width: 768px) and (max-width: 991px) {
  #offcanvasRight { width: 50%; }
}

@media (min-width: 992px) {
  #offcanvasRight { width: 25%; }
}
</style>
@endsection
@section('content')

<div class="row mb-3">
    <div class="col-md-4 col-xl-2">
        <form class="position-relative" action="/student">
            <input type="text" class="form-control product-search ps-5" name="name" value="{{ request()->name }}" id="input-search" placeholder="Cari siswa...">
            <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
        </form>
    </div>
    <div class="col-md-8 col-xl-9 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
        <div class="action-btn show-btn" style="display: none">
            <a href="javascript:void(0)" class="delete-multiple btn-light-danger btn me-2 text-danger d-flex align-items-center font-medium">
                <i class="ti ti-trash text-danger me-1 fs-5"></i>
                Delete All Row

            </a>
        </div>
    </div>
</div>

<div class="row">
    @forelse ($mentorStudent as $student)

    {{-- @dd($student); --}}

    <div class="col-md-4">
        <div class="card hover-img">
            <div class="card-body p-4 text-center border-bottom">
                {{-- <img src="{{ asset('storage/' . $student->student->avatar) }}" class="rounded-circle mb-3" width="80" height="80" alt=""> --}}

                @if(Storage::disk('public')->exists($student->student->avatar))
                    <img src="{{ asset('storage/' . $student->student->avatar) }}" alt="avatar" class="rounded-circle mb-3" width="80px" height="80px" >
                @else
                    <img src="{{ asset('user.webp') }}" alt="default avatar" class="rounded-circle mb-3" width="80px" height="80px">
                @endif

                <h5 class="fw-semibold mb-0 fs-5">{{$student->student->name}}</h5>
                <span class="text-dark fs-2">{{$student->student->school}}</span>
            </div>
            <ul class="px-2 py-2 list-unstyled d-flex align-items-center justify-content-center mb-0">
                <li class="position-relative">
                    <button class="btn mb-1 btn-detail" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"
                        data-id="{{ $student->student->id }}"
                        data-name="{{ $student->student->name }}"
                        data-majors="{{ $student->student->major }}"
                        data-class="{{ $student->student->class }}"
                        data-phone="{{ $student->student->phone }}"
                        data-address="{{ $student->student->address }}"
                        data-birthdate="{{ \carbon\Carbon::parse($student->student->birth_date)->locale('id_ID')->isoFormat('D MMMM YYYY') }}"
                        data-birthplace="{{ $student->student->birth_place }}"
                        data-startdate="{{ \carbon\Carbon::parse($student->student->start_date)->locale('id_ID')->isoFormat('D MMMM YYYY') }}"
                        data-finishdate="{{ \carbon\Carbon::parse($student->student->finish_date)->locale('id_ID')->isoFormat('D MMMM YYYY') }}"
                        data-school="{{ $student->student->school }}"
                        data-email="{{ $student->student->email }}"
                        data-avatar="{{ file_exists(public_path('storage/' . $student->student->avatar)) ? asset('storage/' . $student->student->avatar) : asset('user.webp') }}"
                        data-cv="{{ file_exists(public_path('storage/' . $student->student->cv)) ? asset('storage/' . $student->student->cv) : asset('no data.png') }}"
                        data-selfstatement="{{ file_exists(public_path('storage/' . $student->student->self_statement)) ? asset('storage/' . $student->student->self_statement) : asset('no data.png') }}"
                        data-parentsstatement="{{ file_exists(public_path('storage/' . $student->student->parents_statement)) ? asset('storage/' . $student->student->parents_statement) : asset('no data.png') }}"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user-circle">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                            <path d="M12 10m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                            <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855" />
                          </svg>
                    </button>
                </li>
            </ul>
        </div>
    </div>

    @empty
    <div class="d-flex justify-content-center mb-2 mt-5">
        <img src="{{ asset('no data.png') }}" alt="" width="300px" srcset="">
    </div>
        <p class="fs-5 text-dark text-center">
            Belum Ada Siswa
        </p>
    @endforelse
</div>

<!-- Modal -->
{{-- <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen modal-dialog-end" style="width: 25%; left: 75%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userModalLabel">Profil Pengguna</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <img src="{{ asset('assets-user/dist/images/profile/user-3.jpg') }}" class="rounded-circle mb-3" width="90" height="90" alt="">
                    <h5 class="modal-title mb-1" id="userModalLabel">John Doe</h5>
                </div>
                <div class="d-flex justify-content-center align-items-center mt-4">
                    <h4 class="show-name"></h4>
                </div>
                <div class="row mx-1 ">
                    <div class="col-6 d-flex align-items-center gap-1 mb-3">
                        <i class="ti ti-map-pin" style="color: #695EEF;"></i>
                        <p class="m-0 show-address">Malang, Jawa Timur</p>
                    </div>
                    <div class="col-6 d-flex align-items-center gap-1 mb-3">
                        <i class="ti ti-device-mobile" style="color: #695EEF;"></i>
                        <p class="m-0 show-phone">0054157785</p>
                    </div>
                    <div class="col-6 d-flex align-items-center gap-1 mb-3">
                        <i class="ti ti-gift-card" style="color: #695EEF;"></i>
                        <p class="m-0 show-birthday">Malang, 2005-10-23</p>
                    </div>
                    <div class="col-6 d-flex align-items-center gap-1 mb-3">
                        <i class="ti ti-calendar-stats" style="color: #695EEF;"></i>
                        <p class="m-0 show-start">2024-07-16</p>
                    </div>
                    <div class="col-6 d-flex align-items-center gap-1 mb-3">
                        <i class="ti ti-building-skyscraper" style="color: #695EEF;"></i>
                        <p class="m-0 show-school">SMK Negeri 8 Malang</p>
                    </div>
                    <div class="col-6 d-flex align-items-center gap-1 mb-3">
                        <i class="ti ti-calendar-stats" style="color: #695EEF;"></i>
                        <p class="m-0 show-finish">2025-07-16</p>
                    </div>
                </div>

                <div class="mt-4 mx-4">
                    <h5>CV</h5>
                    <img class="rounded show-cv" alt="200x200" width="330" src="{{ asset('assets-user/dist/images/blog/blog-img3.jpg') }}"
                        style="object-fit: cover; cursor: pointer;" onclick="zoomImage(this)">
                    <div class="mt-2 d-flex justify-content-end">
                        <a class="btn btn-primary download-cv" download="cv.jpg" href="gambar.jpg">Download</a>
                    </div>
                </div>
                <div class="mt-4 mx-4">
                    <h5>Surat Pernyataan Orang Tua</h5>
                    <img class="rounded show-cv" alt="200x200" width="330" src="{{ asset('assets-user/dist/images/blog/blog-img3.jpg') }}"
                        style="object-fit: cover; cursor: pointer;" onclick="zoomImage(this)">
                    <div class="mt-2 d-flex justify-content-end">
                        <a class="btn btn-primary download-cv" download="cv.jpg" href="gambar.jpg">Download</a>
                    </div>
                </div>
                <div class="mt-4 mx-4">
                    <h5>Surat Pernyataan Diri Sendiri</h5>
                    <img class="rounded show-cv" alt="200x200" width="330" src="{{ asset('assets-user/dist/images/blog/blog-img3.jpg') }}"
                        style="object-fit: cover; cursor: pointer;" onclick="zoomImage(this)">
                    <div class="mt-2 d-flex justify-content-end">
                        <a class="btn btn-primary download-cv" download="cv.jpg" href="gambar.jpg">Download</a>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div> --}}

<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel" aria-modal="true" role="dialog">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Detail Siswa</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div>
            <div class="d-flex flex-column justify-content-center align-items-center mb-3">
                {{-- <img src="{{ asset('storage/' . $student->student->avatar) }}" class="rounded-circle mb-3" width="90" height="90" alt=""> --}}
                <img src="" class="avatar-xl rounded-circle show-image mb-3" width="160px" height="160px" alt=""
                style="object-fit: cover">
                <h6 style="font-size: 22px" class="show-name"></h6>
            </div>

            <div class="row mx-2">
                <div class="col-6 d-flex align-items-center gap-1">
                    <i class="ti ti-map-pin" style="color: #695EEF;"></i>
                    <p class="m-0 show-address" style="font-size: 14px;"></p>
                </div>
                <div class="col-6 d-flex  align-items-center gap-1">
                    <i class="ti ti-device-mobile" style="color: #695EEF;"></i>
                    <p class="m-0 show-phone" style="word-break: break-all; font-size:14px;"></p>
                </div>
                <div class="col-6 d-flex align-items-center gap-1">
                    <i class="ti ti-gift-card" style="color: #695EEF;"></i>
                    <p class="m-0 show-birthday" style="font-size: 14px;"></p>
                </div>
                <div class="col-6 d-flex align-items-center gap-1">
                    <i class="ti ti-calendar-stats" style="color: #695EEF;"></i>
                    <p class="m-0 show-start" style="font-size: 14px;"></p>
                </div>
                <div class="col-6 d-flex align-items-center gap-1">
                    <i class="ti ti-building-skyscraper" style="color: #695EEF;"></i>
                    <p class="m-0 show-school" style="font-size: 14px;"></p>
                </div>
                <div class="col-6 d-flex align-items-center gap-1">
                    <i class="ti ti-calendar-stats" style="color: #695EEF;"></i>
                    <p class="m-0 show-finish" style="font-size: 14px;"></p>
                </div>
            </div>


            <div class="mt-4 ">
                <h4>CV</h4>
                <img class="rounded show-cv w-100" alt="200x200" src="gambar.jpg"
                    style="object-fit: cover; cursor: pointer;" onclick="zoomImage(this)">
                <div class="mt-2 d-flex justify-content-end">
                    <a class="btn btn-primary download-cv" download="cv.jpg" href="gambar.jpg">Download</a>
                </div>

            </div>
            <div class="mt-3 ">
                <h4>Pernyataan Orang tua</h4>
                <img class="rounded show-parent-statement w-100" alt="200x200" src=""
                    style="object-fit: cover;cursor: pointer;" onclick="zoomImage(this)">
                <div class="mt-2 d-flex justify-content-end ">
                    <a class="btn btn-primary download-parent-statement" href=""
                        download="">Download</a>
                </div>
            </div>
            <div class="mt-3 ">
                <h4>Pernyataan Diri</h4>
                <img class="rounded show-self-statement w-100" alt="200x200" src=""
                    style="object-fit: cover;cursor: pointer;" onclick="zoomImage(this)">
                <div class="mt-2 d-flex justify-content-end ">
                    <a class="btn btn-primary download-self-statement" href=""
                        download="">Download</a>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection

@section('script')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
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
        let email = $(this).data('email');


        $('.show-name').text(name);
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
