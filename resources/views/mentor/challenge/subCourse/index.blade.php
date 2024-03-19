@extends('mentor.layouts.app')
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
<div class="text-end">
    <a href="/challenge" class="btn btn-primary">Kembali</a>
</div>
<div class="row">
    <div class="col-lg-8 px-4">
        <div class="card">
            <div class="card-body">
                <div>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                      <li class="nav-item w-50 text-center">
                        <a
                          class="nav-link active"
                          data-bs-toggle="tab"
                          href="#home"
                          role="tab"
                        >
                          <span>Materi</span>
                        </a>
                      </li>
                      <li class="nav-item w-50 text-center">
                        <a
                          class="nav-link"
                          data-bs-toggle="tab"
                          href="#profile"
                          role="tab"
                        >
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
                                            <canvas id="pdf-canvas" class="d-block w-100" data-file="{{ asset('storage/' . $subCourses->file_course) }}"></canvas>
                                            <div class="carousel-caption d-none d-md-block">
                                                <span>Page: <span id="page-num"></span> / <span id="page-count"></span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <a class="carousel-control-prev" href="#" role="button" data-slide="prev">
                                        <i class="fas fa-chevron-left"></i>
                                    </a>
                                    <a class="carousel-control-next" href="#" role="button" data-slide="next">
                                        <i class="fas fa-chevron-right"></i>
                                    </a>
                                </div>
                            </main>
                        </div>
                      </div>
                      <div class="tab-pane p-3" id="profile" role="tabpanel">
                        <div class="ratio ratio-16x9">
                            <iframe src="{{ asset('storage/' . $subCourses->video_course) }}" class="w-100" title="YouTube video" allowfullscreen></iframe>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <h5>Materi Lainnya</h5>
        <div class="row">
            @foreach (range(1, 5) as $data)
                <div class="col-lg-12 m-0 p-0">
                    <div class="card border-start border-info py-3 px-4 m-2">
                        <div class="d-flex no-block align-items-center">
                            <div class="col-2">
                                <img class="img-responsive w-100" src="{{ asset('assets/images/materi-1.png') }}"/>
                            </div>
                            <div class="col-lg-9 px-3">
                                <h6 class="m-0">Lorem ipsum dolor sit amet.</h6>
                                <p style="font-size: 12px">Lorem ipsum dolor sit amet...</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="d-flex justify-content-center mt-3">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                      <li class="page-item">
                        <a
                          class="page-link link"
                          href="#"
                          aria-label="Previous"
                        >
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
</div>
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
                    const page_viewport = page.getViewport({ scale });
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
@endsection
