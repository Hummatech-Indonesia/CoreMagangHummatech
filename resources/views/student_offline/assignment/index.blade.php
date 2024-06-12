@extends('student_online.layouts.app')

@section('style')
    <style>
        #detail-data .row .col-md-6:not(:last-child) {
            border-bottom: 1px solid var(--bs-gray-200);
        }

        @media screen and (min-width: 992px) {

            #detail-data .row .col-md-6:first-child,
            #detail-data .row .col-md-6:nth-child(3) {
                border-right: 1px solid var(--bs-gray-200);
            }

            #detail-data .row .col-md-6:nth-child(3),
            #detail-data .row .col-md-6:last-child {
                border-bottom: unset;
            }
        }
    </style>
@endsection

@section('content')
    <div class="row g-2 mb-4">
        <div class="col-sm-4">
            <h4 class="mx-1">Detail Materi</h4>
        </div>
        <div class="col-sm-auto ms-auto">
            <div class="text-end">
                <a href="{{ url('/siswa-online/materi') }}" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3">
            <img alt="{{ $course->title }}" class="img-responsive rounded-4 w-100" src="{{ asset("storage/{$course->image}") }}" />
        </div>
        <div class="col-lg-8 px-4">
            <div class="border-bottom mb-3">
                <h1>{{ $course->title }}</h1>
                <p class="fs-5">{{ $course->description }}</p>
            </div>
            <div class="d-flex gap-5">
                <div class="gap-2 d-flex">
                    <svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg"
                        class="mt-1">
                        <path
                            d="M10 14.4165C8.74584 13.6924 7.32318 13.3112 5.875 13.3112C4.42682 13.3112 3.00416 13.6924 1.75 14.4165V2.49982C3.00416 1.77573 4.42682 1.39453 5.875 1.39453C7.32318 1.39453 8.74584 1.77573 10 2.49982M10 14.4165C11.2542 13.6924 12.6768 13.3112 14.125 13.3112C15.5732 13.3112 16.9958 13.6924 18.25 14.4165V2.49982C16.9958 1.77573 15.5732 1.39453 14.125 1.39453C12.6768 1.39453 11.2542 1.77573 10 2.49982M10 14.4165V2.49982"
                            stroke="#5D87FF" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <p class="text-muted">{{ $course->subCourses->count() }} Materi</p>
                </div>
            </div>
        </div>
    </div>

    <div class="py-4 mb-3" id="header-content">
        <div class="d-flex g-2 align-items-center justify-content-between">
            <h3 class="mb-3 mb-lg-0">Tugas</h3>
        </div>
    </div>
    <div class="border-bottom mb-3">
        <h1>{{ $courseAssignment->title }}</h1>
        <p class="fs-5">{{ $courseAssignment->description }}</p>
    </div>
    <div class="d-flex gap-5">
        <div class="gap-2 d-flex">
            <svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg"
                class="mt-1">
                <path
                    d="M10 14.4165C8.74584 13.6924 7.32318 13.3112 5.875 13.3112C4.42682 13.3112 3.00416 13.6924 1.75 14.4165V2.49982C3.00416 1.77573 4.42682 1.39453 5.875 1.39453C7.32318 1.39453 8.74584 1.77573 10 2.49982M10 14.4165C11.2542 13.6924 12.6768 13.3112 14.125 13.3112C15.5732 13.3112 16.9958 13.6924 18.25 14.4165V2.49982C16.9958 1.77573 15.5732 1.39453 14.125 1.39453C12.6768 1.39453 11.2542 1.77573 10 2.49982M10 14.4165V2.49982"
                    stroke="#5D87FF" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <p class="text-muted">Jawaban yang dikumpulkan harus bertipe zip</p>
        </div>
    </div>
    @if ($courseAssignment->submitTasks->count() != 0)
        @if ($courseAssignment->submitTasks[0]->status == "pending")
            <div class="alert alert-warning" role="alert">
                Anda sudah mengumpulkan dan menunggu approval admin
            </div>
        @elseif ($courseAssignment->submitTasks[0]->status == "agree")
            <div class="alert alert-success" role="alert">
                Jawaban anda telah disetujui
            </div>
        @else
            <div class="alert alert-danger" role="alert">
                Jawaban anda tidak disetujui
            </div>
        @endif
    @endif
    @if ($courseAssignment->submitTasks->count() != 0)
        @if ($courseAssignment->submitTasks[0]->status != "agree")
        <form action="{{ route('submit.task.answer.store', $courseAssignment->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="mb-3">
                <label for="file" class="form-label">Unggah file</label>
                <input class="form-control" type="file" id="file" name="file" accept=".zip,.rar">
            </div>
            <button type="submit" class="btn btn-primary">@if ($courseAssignment->submitTasks->count() == 0) Simpan @else Ganti jawaban @endif</button>
        </form>
        @endif
    @else
    <form action="{{ route('submit.task.answer.store', $courseAssignment->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('POST')

        <div class="mb-3">
            <label for="file" class="form-label">Unggah file</label>
            <input class="form-control" type="file" id="file" name="file" accept=".zip,.rar">
        </div>
        <button type="submit" class="btn btn-primary">@if ($courseAssignment->submitTasks->count() == 0) Simpan @else Ganti jawaban @endif</button>
    </form>
    @endif
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@2"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('.btn-edit').click(function() {
            var id = $(this).data('id');
            $('#form-update').attr('action', '/material/' + id);
            $('#modal-edit').modal('show');
        });

        function preview(event) {
            var input = event.target;
            var previewImages = document.getElementsByClassName('image-preview');

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
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

        $('.btn-delete').click(function() {
            var id = $(this).data('id');
            $('#form-delete').attr('action', '/division/' + id);
            $('#modal-delete').modal('show');
        });
    </script>
@endsection
