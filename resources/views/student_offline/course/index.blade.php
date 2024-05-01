@extends('student_offline.layouts.app')
@section('content')
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Pilih materi kamu : Di setiap materi ada latihan yang bisa membuat kemampuan kamu meningkat</h4>
                    <nav aria-label="breadcrumb mt-2">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-muted " href="/siswa-offline">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">Materi</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-3">
                    <div class="text-center mb-n5">
                        <img src="{{ asset('assets-user/dist/images/breadcrumb/ChatBc.png') }}" alt=""
                            class="img-fluid mb-n4">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row g-2 mb-4">
        <div class="col-sm-4">
            <h4 class="mx-1">Materi</h4>
        </div>
        <div class="col-sm-auto ms-auto">
            <form action="">
                <div class="d-flex">
                    <div class="search-box mx-2">
                        <input type="text" class="form-control search-chat py-2" id="text-srh" placeholder="Cari Materi">
                    </div>
                    <button class="btn btn-primary">
                        Cari
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        @forelse ($courses as $course)

        <div class="col-lg-3 col-md-4 col-sm-12">
          <div class="card">
            <img class="card-img-top img-responsive w-100" src="{{ asset('storage/' .$course->image) }}" style="object-fit: cover;" alt="{{ $course->title }}" />
            <div class="d-flex justify-content-between px-3" style="margin-top: -27px">
                <img src="{{ asset('assets-user/dist/images/profile/user-1.jpg') }}" class="rounded-circle rounded" width="50px">
                <div class="px-2 py-1 rounded-2 rounded" style="background: #fff; font-size: 12px;">{{$course->division->name}}</div>
            </div>
            <div class="card-body">
                <a href="/siswa-offline/course/detail/{{ $course->id }}" style="font-size: 15px" class="text-dark">
                    {{$course->title}}
                </a>
              <div class="d-flex justify-content-between pt-3">
                {{-- <div class="gap-2 d-flex">
                    <svg width="19" height="17" viewBox="0 0 19 17" fill="none" xmlns="http://www.w3.org/2000/svg" class="mt-1">
                        <path d="M10.554 2.375H17.8013M10.554 5.875H15.0835M10.554 11.125H17.8013M10.554 14.625H15.0835M1.49487 2.375C1.49487 2.14294 1.59032 1.92038 1.76021 1.75628C1.9301 1.59219 2.16052 1.5 2.40078 1.5H6.02442C6.26469 1.5 6.49511 1.59219 6.665 1.75628C6.83489 1.92038 6.93033 2.14294 6.93033 2.375V5.875C6.93033 6.10706 6.83489 6.32962 6.665 6.49372C6.49511 6.65781 6.26469 6.75 6.02442 6.75H2.40078C2.16052 6.75 1.9301 6.65781 1.76021 6.49372C1.59032 6.32962 1.49487 6.10706 1.49487 5.875V2.375ZM1.49487 11.125C1.49487 10.8929 1.59032 10.6704 1.76021 10.5063C1.9301 10.3422 2.16052 10.25 2.40078 10.25H6.02442C6.26469 10.25 6.49511 10.3422 6.665 10.5063C6.83489 10.6704 6.93033 10.8929 6.93033 11.125V14.625C6.93033 14.8571 6.83489 15.0796 6.665 15.2437C6.49511 15.4078 6.26469 15.5 6.02442 15.5H2.40078C2.16052 15.5 1.9301 15.4078 1.76021 15.2437C1.59032 15.0796 1.49487 14.8571 1.49487 14.625V11.125Z" stroke="#5D87FF" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <p class="text-muted">{{$taskCount}} Tugas</p>
                </div> --}}
                <div class="gap-2 d-flex">
                    <svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="mt-1">
                        <path d="M10 14.4165C8.74584 13.6924 7.32318 13.3112 5.875 13.3112C4.42682 13.3112 3.00416 13.6924 1.75 14.4165V2.49982C3.00416 1.77573 4.42682 1.39453 5.875 1.39453C7.32318 1.39453 8.74584 1.77573 10 2.49982M10 14.4165C11.2542 13.6924 12.6768 13.3112 14.125 13.3112C15.5732 13.3112 16.9958 13.6924 18.25 14.4165V2.49982C16.9958 1.77573 15.5732 1.39453 14.125 1.39453C12.6768 1.39453 11.2542 1.77573 10 2.49982M10 14.4165V2.49982" stroke="#5D87FF" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <p class="text-muted">{{$subCourseCount}} Sub Materi</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        @empty
        <div class="d-flex justify-content-center mb-2 mt-5">
            <img src="{{ asset('assets-user/dist/images/products/empty-shopping-bag.gif') }}" alt="No Data" height="120px" />
        </div>
            <p class="fs-5 text-dark text-center">
                Data Masih Kosong
            </p>
        @endforelse
    </div>
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@2"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('.btn-edit').click(function () {
            var id = $(this).data('id');
            var title = $(this).data('title');
            var description = $(this).data('description');
            var image = $(this).data('image');
            $('#form-update').attr('action', '/journal/' + id);
            $('#title-edit').val(title);
            $('#description-edit').val(description);
            $('#image-edit').attr('src', image);
            $('#modal-edit').modal('show');
        });

        function preview(event) {
            var input = event.target;
            var previewImages = document.getElementsByClassName('image-preview');

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    Array.from(previewImages).forEach(function(previewImage) {
                        previewImage.src = e.target.result;
                        previewImage.style.display = 'block';
                    });
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        $('.btn-detail').click(function() {
            var detail = $('#detail-content');
            detail.empty();
            var id = $(this).data('id');
            var name = $(this).data('name');
            var date = $(this).data('date');
            var school = $(this).data('school');
            var description = $(this).data('description');
            var image = $(this).data('image');
            detail.append('<div class="mb-2">');
            detail.append('<h6 class="f-w-600">Nama</h6>');
            detail.append('<p class="text-muted">' + name + '</p>')
            detail.append('</div>');
            detail.append('<div class="mb-2">');
            detail.append('<h6 class="f-w-600">Tanggal</h6>');
            detail.append('<p class="text-muted">' + date + '</p>')
            detail.append('</div>');
            detail.append('<div class="mb-2">');
            detail.append('<h6 class="f-w-600">Sekolah</h6>');
            detail.append('<p class="text-muted">' + school + '</p>')
            detail.append('</div>');
            detail.append('<div class="mb-2">');
            detail.append('<h6 class="f-w-600">Kegiatan</h6>');
            detail.append('<p>' + description + '</p>')
            detail.append('</div>');
            detail.append('<div class="mb-2">');
            detail.append('<h6 class="f-w-600">Bukti</h6>');
            detail.append('<img src="' + image + '" width="100%"></img>')
            detail.append('</div>');
            $('#detail').modal('show');
        });

        $('.btn-delete').click(function () {
            var id = $(this).data('id');
            $('#form-delete').attr('action', '/division/' + id);
            $('#modal-delete').modal('show');
        });
    </script>
@endsection
