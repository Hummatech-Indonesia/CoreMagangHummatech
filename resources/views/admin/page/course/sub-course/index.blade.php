@extends('admin.layouts.app')
@section('style')
    <style>
        .carousel-control-prev,
        .carousel-control-next {
            top: 50%;
            transform: translateY(-50%);
            width: 40px;
            height: 40px;
            opacity: 0.5;
            background-color: rgba(0, 0, 0, 0.3);
            color: white;
            border-radius: 50%;
            font-size: 20px;
            text-align: center;
            line-height: 40px;
            position: absolute;
        }

        .carousel-control-prev {
            left: 10px;
        }

        .carousel-control-next {
            right: 10px;
        }

        .carousel-caption {
            color: black;
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            background-color: rgba(255, 255, 255, 0.7);
            padding: 5px 10px;
            border-radius: 5px;
        }
    </style>
@endsection
@section('content')
    <div class="text-end mb-4">
        <a href="/administrator/course/detail/{{ $subCourse->course_id }}" class="btn text-white"
            style="background-color: #7E7E7E;">Kembali</a>
    </div>

    <div class="row">
        <div class="col-lg-12 col-xl-8 col-12 px-4">
            <div class="card">
                <div class="card-body">
                    <div>
                        <!-- Nav tabs -->
                        <ul class="nav nav-pills nav-justified" role="tablist">
                            <li class="nav-item w-50 text-center">
                                <a class="nav-link active" data-bs-toggle="tab" href="#home" role="tab">
                                    <span>Materi</span>
                                </a>
                            </li>
                            <li class="nav-item w-50 text-center">
                                <a class="nav-link" data-bs-toggle="tab" href="#profile" role="tab">
                                    <span>Video Tutorial</span>
                                </a>
                            </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="home" role="tabpanel">
                                <div class="p-3">
                                    <main role="main">
                                        <div id="carousel" class="carousel" data-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <canvas id="pdf-canvas" class="d-block w-100"
                                                        data-file="{{ asset('storage/' . $subCourses->file_course) }}"></canvas>
                                                    <div class="carousel-caption d-none d-md-block">
                                                        <span>Page: <span id="page-num"></span> /
                                                            <span id="page-count"></span></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <a class="carousel-control-prev" href="#" role="button"
                                                data-slide="prev">
                                                <i class="fas fa-chevron-left"></i>
                                            </a>
                                            <a class="carousel-control-next" href="#" role="button"
                                                data-slide="next">
                                                <i class="fas fa-chevron-right"></i>
                                            </a>
                                        </div>
                                    </main>
                                </div>
                            </div>
                            <div class="tab-pane p-3" id="profile" role="tabpanel">
                                <div>
                                    <iframe width="560" height="315" src="{{ $subCourses->video_course }}"
                                        frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-xl-4 col-xs-12 col-12">
            <div class="materi">
                <div class="d-flex justify-content-between align-items-center">
                    <h5>Tugas</h5>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add">
                        <i class=" ri-add-fill"></i>
                    </button>
                </div>
                <div class="row mb-3">
                    @forelse ($task->where('sub_course_id', $subCourse->id) as $task)
                        <div class="col-lg-12 m-0 p-0">
                            <div class="card border-start border-info py-3 px-4 m-2">
                                <div class="d-flex no-block align-items-center">
                                    <div class="col-lg-9 px-3">
                                        <div class="col-2 bg-{{ $task->level->color() }}-subtle rounded w-25">
                                            <p style="" class="text-{{ $task->level->color() }} text-center ">{{ $task->level->label() }}</p>
                                        </div>
                                        <h6 class="m-0">{{ $task->title }}</h6>
                                    </div>
                                    <div class="ms-auto">
                                        <div class="dropdown d-inline-block">
                                            <button class="bg-transparent border-0 fs-2 dropdown" style="margin-top: -20px"
                                                type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ri-more-fill align-middle"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li>
                                                    <a type="button" class="dropdown-item btn-show btn-detail"
                                                        data-id="{{ $task->id }}" data-title="{{ $task->title }}"
                                                        data-level="{{ $task->level }}"
                                                        data-description="{{ $task->description }}"
                                                        data-level="{{ $task->level }}">
                                                        Detail Tugas
                                                    </a>
                                                </li>
                                                <li>
                                                    <button type="button" class="dropdown-item edit-item-btn btn-edit"
                                                        data-id="{{ $task->id }}" data-title="{{ $task->title }}"
                                                        data-level="{{ $task->level }}"
                                                        data-description="{{ $task->description }}"
                                                        data-level="{{ $task->level }}">
                                                        Edit Tugas
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type="button" class="dropdown-item btn-delete text-danger"
                                                        data-id="{{ $task->id }}">
                                                        Hapus Tugas
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
                        <p class="fs-5 text-dark text-center mb-5">
                            Data Masih Kosong
                        </p>
                    @endforelse
                </div>
            </div>

            <div class="d-flex justify-content-center mt-3">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link link" href="#" aria-label="Previous">
                                <span aria-hidden="true">
                                    <i class="ti ti-chevrons-left fs-4"></i>
                                </span>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link link" href="#">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link link" href="#">2</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link link" href="#">3</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link link" href="#" aria-label="Next">
                                <span aria-hidden="true">
                                    <i class="ti ti-chevrons-right fs-4"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <!-- Add Task -->
    <div class="modal fade" id="add" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg p-4">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title" id="myLargeModalLabel">
                        Tambah Tugas
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/create/task" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="sub_course_id" value="{{ $subCourses->id }}">
                    <div class="modal-body">
                        <input type="hidden" name="course_id" value="">
                        <div class="mb-3">
                            <label for="">Tugas</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Deskripsi</label>
                            <textarea name="description" id="" class="form-control" rows="5" placeholder="Masukkan tugas"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="">Level</label>
                            <select class="tambah js-example-basic-single form-select" aria-label=".form-select example"
                                name="level">
                                <option value="" disabled selected>Pilih level materi</option>
                                <option value="easy">Mudah</option>
                                <option value="normal">Biasa</option>
                                <option value="hard">Sulit</option>
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

    <div class="modal fade" id="detail" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg p-4">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title" id="myLargeModalLabel">
                        Detail Tugas
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5>Judul</h5>
                    <p class="text-muted title">

                    </p>
                    <h5 class="mt-2">Deskripsi</h5>
                    <p class="text-muted description">

                    </p>
                    <h5 class="mt-2">Level</h5>
                    <p class="text-muted level">

                    </p>
                </div>
                <div class="modal-footer text-end">
                    <button class="btn text-white" style="background-color: #7E7E7E;"
                        data-bs-dismiss="modal">Kembali</button>
                </div>
            </div>
        </div>
    </div>

    <!-- -->
    <div class="modal fade" id="modal-edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg p-4">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title" id="myLargeModalLabel">
                        Edit Tugas
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post" id="form-update" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <input type="hidden" name="sub_course_id" value="{{ $subCourses->id }}">
                        <div class="mb-3">
                            <label for="">Tugas</label>
                            <input type="text" name="title" id="title-edit" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Deskripsi</label>
                            <textarea name="description" id="description-edit" class="form-control" rows="5"
                                placeholder="Masukkan tugas"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="">Level</label>
                            <select class="tambah js-example-basic-single form-control" id="level-edit"
                                aria-label=".form-select example" name="level">
                                <option value="">Pilih level materi</option>
                                <option value="easy">Mudah</option>
                                <option value="normal">Biasa</option>
                                <option value="hard">Sulit</option>
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

    @include('admin.components.delete-modal-component')
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@2"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.338/pdf.min.js"></script>
    <script>
        $('#approval').addClass('mm-active')
        $('#approval-link').addClass('mm-active')
        $('#approval .sub-menu').addClass('mm-show');
        $('#kualifikasi-approval').addClass('mm-active')
        $('#kualifikasi-approval-link').addClass('active')
        $(function() {
            let pdfDoc = null,
                pageNum = 1,
                pageRendering = false,
                pageNumPending = null;

            const scale = 5.0,
                canvas = document.getElementById('pdf-canvas'),
                pnum = document.getElementById('page-num'),
                ctx = canvas.getContext('2d');

            /**
             * Get page info from document, resize canvas accordingly, and render page.
             * @param num Page number.
             */
            function renderPage(num) {
                pageRendering = true;

                // Using promise to fetch the page
                pdfDoc.getPage(num).then(function(page) {
                    const page_viewport = page.getViewport({
                        scale
                    });
                    canvas.height = page_viewport.height;
                    canvas.width = page_viewport.width;

                    // Render PDF page into canvas context
                    const renderContext = {
                        canvasContext: ctx,
                        viewport: page_viewport
                    };
                    const renderTask = page.render(renderContext);

                    // Wait for rendering to finish
                    renderTask.promise.then(function() {
                        pageRendering = false;
                        if (pageNumPending !== null) {
                            // New page rendering is pending
                            renderPage(pageNumPending);
                            pageNumPending = null;
                        }
                    });
                });

                // Update page counters
                pnum.textContent = num;
            }

            /**
             * If another page rendering in progress, waits until the rendering is
             * finished. Otherwise, executes rendering immediately.
             */
            function queueRenderPage(num) {
                if (pageRendering) {
                    pageNumPending = num;
                } else {
                    renderPage(num);
                }
            }

            /**
             * Displays previous page.
             */
            document.querySelector(".carousel-control-prev").addEventListener('click', function() {
                if (pageNum > 1) {
                    pageNum--;
                    queueRenderPage(pageNum);
                }
            });

            /**
             * Displays next page.
             */
            document.querySelector(".carousel-control-next").addEventListener('click', function() {
                if (pageNum < pdfDoc.numPages) {
                    pageNum++;
                    queueRenderPage(pageNum);
                }
            });

            /**
             * Asynchronously downloads PDF.
             */
            (function() {
                const url = canvas.dataset.file;
                pdfjsLib.getDocument(url).promise.then(function(pdfDoc_) {
                    pdfDoc = pdfDoc_;
                    document.getElementById("page-count").textContent = pdfDoc.numPages;

                    // Initial/first page rendering
                    renderPage(pageNum);
                });
            })();
        });
    </script>
    <script>
        $('.btn-edit').click(function() {
            var id = $(this).data('id');
            var title = $(this).data('title');
            var description = $(this).data('description');
            var level = $(this).data('level');
            $('#form-update').attr('action', '/update/task/' + id);
            $('#title-edit').val(title);
            $('#description-edit').val(description);
            $('#level-edit').val(level).trigger('change');
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
            $('#form-delete').attr('action', '/delete/task/' + id);
            $('#modal-delete').modal('show');
        });
        $('.btn-detail').click(function() {
            var id = $(this).data('id');
            var title = $(this).data('title');
            var description = $(this).data('description');
            var level = $(this).data('level');

            $('#detail').modal('show');
            $('.description').text(description);
            $('.level').text(level);
            $('.title').text(title);
        });

        $(document).ready(function() {
            $(".js-example-basic-single").select2({
                dropdownParent: $("#add")
            });
        });
    </script>
@endsection
