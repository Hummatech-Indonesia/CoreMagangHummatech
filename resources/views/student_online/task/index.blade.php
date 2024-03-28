@extends('student_online.layouts.app')
@section('content')
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Tugas kamu : Di setiap latihan akan membuat kemampuan kamu meningkat jadi
                        lebih baik </h4>
                    <nav aria-label="breadcrumb mt-2">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-muted " href="/siswa-online">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">Tugas</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-3">
                    <div class="text-center mb-n5">
                        <img src="{{ asset('assets/images/task-people.png') }}" alt="" class="img-fluid mb-n4">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card my-4 py-3">
        <div class="row g-2 px-4">
            <div class="d-flex g-2 justify-content-between">
                <div class="dropdown d-lg-none">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="icon icon-tabler icon-tabler-menu-2">
                            <path d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="{{ route('siswa-online.tasksubmit.index') }}">Tugas</a></li>
                    </ul>
                </div>
                <ul class="nav nav-tabs gap-2 d-none d-md-none d-lg-flex" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link d-flex {{ !request()->get('status') ? 'active' : '' }}"
                            href="{{ route('siswa-online.tasksubmit.index') }}">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-book">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M3 19a9 9 0 0 1 9 0a9 9 0 0 1 9 0" />
                                    <path d="M3 6a9 9 0 0 1 9 0a9 9 0 0 1 9 0" />
                                    <path d="M3 6l0 13" />
                                    <path d="M12 6l0 13" />
                                    <path d="M21 6l0 13" />
                                </svg>
                            </span>
                            <span class="d-none d-md-block ms-2">Semua Tugas</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex {{ request()->get('status') === 'inprogress' ? 'active' : '' }}"
                            href="{{ route('siswa-online.tasksubmit.index', ['status' => 'inprogress']) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-award">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 9m-6 0a6 6 0 1 0 12 0a6 6 0 1 0 -12 0" />
                                <path d="M12 15l3.4 5.89l1.598 -3.233l3.598 .232l-3.4 -5.889" />
                                <path d="M6.802 12l-3.4 5.89l3.598 -.233l1.598 3.232l3.4 -5.889" />
                            </svg>
                            <span class="d-none d-md-block ms-2">Tugas Dinilai</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex {{ request()->get('status') === 'completed' ? 'active' : '' }}"
                            href="{{ route('siswa-online.tasksubmit.index', ['status' => 'completed']) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-history">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 8l0 4l2 2" />
                                <path d="M3.05 11a9 9 0 1 1 .5 4m-.5 5v-5h5" />
                            </svg>
                            <span class="d-none d-md-block ms-2">Tugas Selesai</span>
                        </a>
                    </li>
                </ul>
                <form method="GET" action="{{ request()->getRequestUri() }}" class="d-flex gap-2">
                    @if(request()->get('status'))
                    <input type="hidden" name="status" value="{{ request()->get('status') }}" />
                    @endif
                    <input type="text" class="form-control" id="search course" placeholder="Cari Materi" name="search" value="{{ request()->get('search') }}" />
                    <button class="btn btn-primary">Cari</button>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        @forelse ($tasks as $task)
            <div class="col-md-6">
                <div class="card card-body" style="border-left: 6px solid var(--bs-primary)">
                    <div class="row align-items-center">
                        <div class="col-md-9">
                            <div class="d-flex mb-3 gap-3 align-items-center">
                                <ul class="course-paginate breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a
                                            href="{{ route('siswa-online.course.detail', $task->subCourse->course->id) }}">{{ $task->subCourse->course->title }}</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a
                                            href="{{ route('siswa-online.course.subcourse', ['course' => $task->subCourse->course->id, 'subCourse' => $task->subCourse->id]) }}">{{ $task->subCourse->title }}</a>
                                    </li>
                                </ul>

                                @php
                                    $submissions = $task->submissions()->latest()->first();
                                @endphp

                                <div class="d-flex gap-2">
                                    <span
                                        class="badge bg-{{ $task->getLevel()->color() }} ">{{ $task->getLevel()->label() }}</span>
                                    <span
                                        class="badge bg-{{ $submissions->getStatus()->color() }} ">{{ $submissions->getStatus()->label() }}</span>
                                </div>
                            </div>

                            <h3 class="mb-0">{{ $task->title }}</h3>
                        </div>
                        <div class="col-md-3 d-flex justify-content-end">
                            <a href="{{ route('siswa-online.tasksubmit.detail', $task->id) }}"
                                class="btn btn-primary">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-md-12">
                <div class="card card-body">
                    <div class="text-center">
                        <img src="{{ asset('assets-user/dist/images/products/empty-shopping-bag.gif') }}" alt="No Data"
                            height="150px" width="auto" />
                        <h3>Tidak Ada Data</h3>
                    </div>
                </div>
            </div>
        @endforelse
    </div>
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@2"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $('.btn-edit').click(function() {
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
