@extends('admin.layouts.app')

@section('content')
<div class="row g-2 mb-4">
    <div class="col-sm-4">
        <h4 class="mx-1">Detail Materi</h4>
    </div>
    <div class="col-sm-auto ms-auto">
        <div class="text-end">
            <a href="/administrator/course" class="btn btn-primary">Kembali</a>
        </div>
    </div>
</div>


{{-- @foreach ($course as $course) --}}
<div class="row">
    <div class="col-lg-3">
        <img class="img-responsive w-100 rounded rounde-3" src="{{ asset('storage/' . $course->image) }}" />
    </div>
    <div class="col-lg-8 px-4">
        <div class="border-bottom my-3">
            <h1>{{ $course->title }}</h1>
            <p class="fs-5">{{ $course->description }}</p>
        </div>
    </div>
</div>
{{-- @endforeach --}}

<div class="card my-4">
    <div class="p-3 py-2">
        <div class="d-flex g-2 align-items-center">
            <div class="col-sm-4">
                <div class="p-3 d-flex gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="23" class="me-2" height="19" viewBox="0 0 23 19"
                        fill="none">
                        <path
                            d="M11.5 18C9.9038 17.0547 8.09313 16.5571 6.25 16.5571C4.40686 16.5571 2.5962 17.0547 1 18V2.44294C2.5962 1.49765 4.40686 1 6.25 1C8.09313 1 9.9038 1.49765 11.5 2.44294M11.5 18C13.0962 17.0547 14.9069 16.5571 16.75 16.5571C18.5931 16.5571 20.4038 17.0547 22 18V2.44294C20.4038 1.49765 18.5931 1 16.75 1C14.9069 1 13.0962 1.49765 11.5 2.44294M11.5 18V2.44294"
                            stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <span class="h4 mb-0">Sub Materi</span>
                </div>
            </div>
            <div class="col-sm-auto col-xl-4 ms-auto d-flex gap-4 justify-content-end">
                <form class="app-search d-none d-md-block w-50">
                    <div class="position-relative">
                        <input type="text" class="form-control" placeholder="Cari..." autocomplete="off"
                            id="search-options" value="">
                        <span class="mdi mdi-magnify search-widget-icon"></span>
                        <span class="mdi mdi-close-circle search-widget-icon search-widget-icon-close d-none"
                            id="search-close-options"></span>
                    </div>
                </form>
                <div class="list-grid-nav hstack">
                    <button class="btn btn-secondary shadow-none me-2" data-bs-toggle="modal" data-bs-target="#add">
                        Tambah Sub Materi
                    </button>
                    <button class="btn btn-secondary shadow-none" data-bs-toggle="modal" data-bs-target="#addtask">
                        Tambah Tugas
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tab panes -->
<div class="tab-content text-muted">
    <div class="tab-pane active show" id="home-1" role="tabpanel">
        <div class="row">
            @forelse ($subCourses as $subCourse)
                <div class="col-12">
                    <div class="card border-start border-info py-3 px-4">
                        <div class="d-flex align-items-center no-block align-items-start">
                            <div class="col-lg-1 col-md-10 col-sm-1">
                                <img class="img-responsive w-100 rounded"
                                    src="{{ asset('storage/' . $subCourse->image_course) }}" />
                            </div>
                            <div class="col-lg-9 col-sm-12 px-4">
                                <h4>{{ $subCourse->title }}</h4>
                                <p class="mb-0">{{ Str::limit(strip_tags($subCourse->description), 200) }}</p>
                            </div>
                            <div class="ms-auto">
                                <div class="dropdown d-inline-block">
                                    <button class="bg-transparent border-0 fs-2 dropdown" style="margin-top: -10px"
                                        type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ri-more-fill align-middle"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li>
                                            <a href="/administrator/subcourse/detail/{{ $subCourse->id }}" type="button"
                                                class="dropdown-item btn-show">
                                                Detail Sub Materi
                                            </a>
                                        </li>
                                        <li>
                                            <button type="button" class="dropdown-item edit-item-btn btn-edit"
                                                data-id="{{ $subCourse->id }}" data-title="{{ $subCourse->title }}"
                                                data-description="{{ $subCourse->description }}"
                                                data-image="{{ $subCourse->image_course }}"
                                                data-file="{{ $subCourse->file_course }}"
                                                data-video="{{ $subCourse->video_course }}">
                                                Edit Sub Materi
                                            </button>
                                        </li>
                                        <li>
                                            <button type="button" class="dropdown-item btn-delete text-danger"
                                                data-id="{{ $subCourse->id }}">
                                                Hapus Sub Materi
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            @empty

                <div class="d-flex justify-content-center mb-2 mt-5">
                    <img src="{{ asset('no data.png') }}" alt="" width="300px" srcset="">
                </div>
                <p class="fs-5 text-dark text-center">
                    Data Masih Kosong
                </p>
            @endforelse

            {{ $subCourses->links() }}
        </div>
    </div>
</div>


<!-- Add sub course -->
<div class="modal fade" id="add" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <h4 class="modal-title" id="myLargeModalLabel">
                    Tambah Sub Materi
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/create/sub-materi/{{ $id }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="course_id" value="{{ $id }}">
                    <div class="mb-3">
                        <label for="">Judul Sub Materi</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Deskripsi Sub Materi</label>
                        <textarea name="description" id="" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="">Foto Sub Materi</label>
                        <input type="file" name="image_course" class="form-control" accept="image/*" />
                    </div>
                    <div class="mb-3">
                        <label for="">Link video Sub Materi</label>
                        <input type="url" name="video_course" class="form-control" />
                    </div>
                    <div class="mb-3">
                        <label for="">File Sub Materi</label>
                        <input type="file" name="file_course" class="form-control" accept="application/pdf" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light shadow-none font-medium waves-effect text-start"
                        data-bs-dismiss="modal">
                        Tutup
                    </button>
                    <button type="submit" class="btn btn-primary shadow-none font-medium waves-effect text-start">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Add sub course -->
<div class="modal fade" id="addtask" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <h4 class="modal-title" id="myLargeModalLabel">
                    Tambah Tugas
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/create/sub-materi/{{ $id }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="course_id" value="{{ $id }}">
                    <div class="mb-3">
                        <label for="">Judul Tugas</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Deskripsi</label>
                        <textarea name="description" id="" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="">Jenis</label>
                        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                            <option selected>Jenis</option>
                            <option value="1">File</option>
                            <option value="2">Image</option>
                            <option value="3">Link</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light shadow-none font-medium waves-effect text-start"
                        data-bs-dismiss="modal">
                        Tutup
                    </button>
                    <button type="submit" class="btn btn-primary shadow-none font-medium waves-effect text-start"
                        data-bs-dismiss="modal">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Sub Course -->
<div class="modal fade" id="edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-lg ">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <h4 class="modal-title" id="myLargeModalLabel">
                    Edit Sub Materi
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post" id="edit-form" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <input type="hidden" name="course_id" value="{{ $id }}">
                    <div class="mb-3">
                        <label for="">Judul Sub Materi</label>
                        <input type="text" name="title" id="edit-title" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Deskripsi Sub Materi</label>
                        <textarea name="description" id="edit-description" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="">Foto Sub Materi</label>
                        <div class="w-50 mb-2">
                            <img src="" id="edit-image" class="img-fluid w-50" alt="">
                        </div>
                        <input type="file" name="image_course" id="edit-image" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Link video Sub Materi</label>
                        <input type="url" name="video_course" id="edit-video" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">File Sub Materi</label>
                        <input type="file" name="file_course" id="edit-file" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light shadow-none font-medium waves-effect text-start"
                        data-bs-dismiss="modal">
                        Tutup
                    </button>
                    <button type="submit" class="btn btn-primary shadow-none font-medium waves-effect text-start"
                        data-bs-dismiss="modal">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@include('admin.components.delete-modal-component')
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script>
    $('.btn-edit').on('click', function () {
        let id = $(this).data('id');
        let title = $(this).data('title');
        let description = $(this).data('description');
        let image = $(this).data('image');
        let video = $(this).data('video');
        let file = $(this).data('file');

        $('#edit-title').val(title);
        $('#edit-description').val(description);
        $('#edit-image').attr('src', '/storage/' + image);
        $('#edit-video').val(video);

        $('#edit-form').attr('action', '/administrator/subcourse/edit/' + id);
        $('#edit').modal('show');
    });
</script>

<script>
    $('.btn-delete').on('click', function () {
        let id = $(this).data('id');

        $('#form-delete').attr('action', '/administrator/subcourse/delete/' + id);
        $('#modal-delete').modal('show');
    });
</script>
@endsection