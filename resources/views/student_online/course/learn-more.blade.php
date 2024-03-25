@extends('student_online.layouts.app')
@section('content')
    <div class="text-end">
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
                                <div class="p-3">
                                    <img class="img-responsive w-100" src="{{ asset('assets/images/materi-1.png') }}" />
                                </div>
                            </div>
                            <div class="tab-pane p-3" id="profile" role="tabpanel">
                                <div class="ratio ratio-16x9">
                                    <iframe src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" title="YouTube video"
                                        allowfullscreen></iframe>
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
                @forelse ($subCourses as $data)
                    <div class="col-lg-12 m-0 p-0">
                        <a href="{{ $data->id === $subCourse->id ? 'javascript:void(0)' : route('siswa-online.course.subcourse', ['subCourse' => $data->id, 'course' => $course->id]) }}" class="card @if($data->id === $subCourse->id) bg-light @endif border-start border-info py-3 px-4 m-2">
                            <div class="d-flex no-block align-items-center">
                                <div class="col-2">
                                    <img alt="{{ $data->title }}" class="img-responsive w-100" src="{{ asset("storage/{$data->image_course}") }}" />
                                </div>
                                <div class="col-lg-9 px-3 d-flex flex-column gap-1">
                                    <h6 class="m-0">{{ $data->title }}</h6>
                                    <p style="font-size: 12px" class="mb-0">{{ Str::limit($data->description, 100) }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
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
