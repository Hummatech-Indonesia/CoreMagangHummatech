@extends('student_online.layouts.app')

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

        .card-floating {
            position: fixed;
            bottom: 0;
            right: 0;
            left: 270px;
            margin: 2rem;
            z-index: 1000;
            width: calc(100% - ((2rem * 2) + 270px));
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-direction: row;
            padding: 1rem !important;
            border-radius: var(--bs-border-radius-lg);
        }

        .card-floating [class*="navigation-"] {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: .75rem;
            border-radius: var(--bs-border-radius);
            padding: .75rem 1.5rem;
            color: var(--bs-primary);
            background: rgba(var(--bs-primary-rgb), .125);
        }

        .card-floating [class*="navigation-"]:hover {
            color: var(--bs-white);
            background: rgba(var(--bs-primary-rgb), 1);
        }

        .card-floating [class*="navigation-"].disabled,
        .card-floating [class*="navigation-"].disabled:hover {
            cursor: not-allowed;
            color: var(--bs-dark);
            background: rgba(var(--bs-dark-rgb), .125);
        }

        .card-floating .course-title {
            font-weight: bold;
            font-size: 1.25rem;
        }
    </style>
@endsection

@section('content')
    <div class="text-end mb-3">
        <a href="{{ route('siswa-online.course.detail', $course->id) }}" class="btn btn-primary">Kembali</a>
    </div>

    <div class="row">
        <div class="col-lg-8 px-4">
            <div class="card">
                <div class="card-body">
                    <div>
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
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
                                <div class="py-3">

                                    <div id="carousel" class="carousel" data-ride="carousel">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <canvas id="pdf-canvas" class="d-block w-100"
                                                    data-file="{{ asset('storage/' . $subCourse->file_course) }}"></canvas>
                                                <div class="carousel-caption d-none d-md-block">
                                                    <span>Page: <span id="page-num"></span> /
                                                        <span id="page-count"></span></span>
                                                </div>
                                            </div>
                                        </div>
                                        <a class="carousel-control-prev" href="javascript:void(0)" role="button"
                                            data-slide="prev">
                                            <i class="fas fa-chevron-left"></i>
                                        </a>
                                        <a class="carousel-control-next" href="javascript:void(0)" role="button"
                                            data-slide="next">
                                            <i class="fas fa-chevron-right"></i>
                                        </a>
                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane p-3" id="profile" role="tabpanel">
                                <div class="ratio ratio-16x9">
                                    <iframe width="560" title="Video" class="embed-responsive-item" height="315"
                                        src="{{ $subCourse->video_course }}" allow="autoplay; encrypted-media"
                                        allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            {{-- Task List --}}
            {{-- @if($taskData->isNotEmpty())
            <section id="tasklisting" class="mb-3 row">
                <div class="col-lg-12 m-0 p-0">
                    <div class="card overflow-hidden">
                        <div class="card-header bg-white p-4" id="headingOne">
                            <button class="btn btn-link text-decoration-none p-0 d-flex gap-2 align-items-center w-100" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                aria-expanded="true" aria-controls="collapseOne">
                                <h5 class="mb-0 d-flex gap-2 align-items-center">
                                    <span>Daftar Tugas</span>
                                    <span class="badge bg-primary">{{ $taskData->count() }}</span>
                                </h5>
                                <div class="ms-auto">
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                            </button>
                        </div>

                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-bs-parent="#accordion">
                            <div class="card-body pt-0">
                                @foreach ($taskData as $task)
                                <div class="card card-body" style="border-left: 6px solid var(--bs-primary)">
                                    <span
                                        class="badge bg-{{ $task->getLevel()->color() }} ">{{ $task->getLevel()->label() }}</span>
                                    <h3 class="h5 mb-0">{{ $task->title }}</h3>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            @endif --}}

            {{-- Other Courses --}}
            <section id="other-course">
                <h5>Materi Lainnya</h5>
                <div class="row">
                    @forelse ($course->subCourses as $data)

                        <div class="col-lg-12 m-0 p-0">
                            <a href="{{ route('siswa-online.course.subcourse', ['subCourse' => $data->id, 'course' => $course->id]) }}" class="card card-body mb-3 border-rounded @if($subCourse->id == $data->id) border-2 bg-light-primary border-primary @endif"  style="border-left: 6px solid var(--bs-gray-300); border-left-color: var(--bs-primary);">
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <img alt="{{ $data->title }}" class="img-responsive w-100"
                                            src="{{ asset("storage/{$data->image_course}") }}" />
                                    </div>
                                    <div class="col-lg-8 d-flex align-items-center gap-2">
                                        <div class="d-flex flex-column gap-1">
                                            <h3 class="m-0 mb-2 h5 fw-bolder">{{ $data->title }}</h3>
                                            <p style="font-size: 12px" class="mb-0">
                                                {{ Str::limit($data->description, 100) }}</p>
                                        </div>

                                    </div>
                                </div>
                            </a>
                        </div>
                        @if ($course->subCourses->count() == 1)
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="text-center">
                                        <img src="{{ asset('assets-user/dist/images/products/empty-shopping-bag.gif') }}"
                                            alt="No Data" height="150px" width="auto" />
                                        <h3>Tidak Ada Data</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    @empty
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="text-center">
                                        <img src="{{ asset('assets-user/dist/images/products/empty-shopping-bag.gif') }}"
                                            alt="No Data" height="150px" width="auto" />
                                        <h3>Tidak Ada Data</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforelse
                </div>


            </section>
        </div>
    </div>

    <div class="card-floating card card-body">
        <a href="{{($prev != null) ? route('siswa-online.course.subcourse', ['course' => $course->id, 'subCourse' => $prev->id]) : '#' }}" class="navigation-next @if ($prev == null) disabled @endif">
            <i class="fas fa-arrow-left"></i>
            <span>Sebelumnya</span>
        </a>
        <span class="course-title">
            {{ $subCourse->title }}
        </span>
        <a href="{{($next != null) ? route('siswa-online.course.subcourse', ['course' => $course->id, 'subCourse' => $next->id]) : '#' }}" class="navigation-next @if ($next == null) disabled @endif">
            <span>Selanjutnya</span>
            <i class="fas fa-arrow-right"></i>
        </a>
    </div>
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@2"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.338/pdf.min.js"></script>

    <script>
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
