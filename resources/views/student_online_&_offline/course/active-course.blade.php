@extends(auth()->user()->hasRole('siswa-online') ? 'student_online.layouts.app' : 'student_offline.layouts.app')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
@section('content')
<div class="card bg-light-info shadow-none position-relative overflow-hidden">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Beli Materi</h4>
                <nav aria-label="breadcrumb mt-2">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-muted " href="/siswa-offline">Dasborard</a></li>
                        <li class="breadcrumb-item" aria-current="page">Beli Materi</li>
                    </ol>
                </nav>
            </div>
            <div class="col-3">
                <div class="text-center mb-n5">
                    <img src="https://pkl-hummatech.dev.id/assets-user/dist/images/breadcrumb/ChatBc.png" alt="Image"
                        class="img-fluid mb-n4" />
                </div>
            </div>
        </div>
    </div>
</div>

<!-- tab bar start -->
<ul class="nav nav-pills p-3 mb-3 gap-3 rounded align-items-center card flex-row">
    <li class="nav-item">
        <a href="javascript:void(0)" class="
                      nav-link
                     gap-6
                      note-link
                      d-flex
                      align-items-center
                      justify-content-center
                      active
                      px-3 px-md-3
                    " id="all-category">
            <span class="d-none d-md-block fw-medium">Semua</span>
        </a>
    </li>
    <li class="nav-item">
        <a href="javascript:void(0)" class="
                      nav-link
                    gap-6
                      note-link
                      d-flex
                      align-items-center
                      justify-content-center
                      px-3 px-md-3
                    " id="note-business">
            <span class="d-none d-md-block fw-medium">Berlangganan</span>
        </a>
    </li>
    <li class="nav-item">
        <a href="javascript:void(0)" class="
                      nav-link
                    gap-6
                      note-link
                      d-flex
                      align-items-center
                      justify-content-center
                      px-3 px-md-3
                    " id="note-important">
            <span class="d-none d-md-block fw-medium">Berbayar</span>
        </a>
    </li>
</ul>
<!-- tab bar end -->

<!-- isi start -->
<div class="tab-content">
    <div id="note-full-container" class="note-has-grid row">
        @foreach ($subscibeCourses as $course)
        <div class="col-md-4 single-note-item all-category note-business">
            <div class="card card-body p-3 disable" style="background-color: rgba(255, 255, 255, 0.5);">
                <div class="w-full h-full bg-black opacity-25 absol"></div>
                <img src="{{ asset('storage/' . $course->image) }}" style="object-fit: cover;" width="20em"
                    height="170em" class="card-img-top img-responsive w-100 mb-2" />
                <a href="{{ url('/courses/detail')}}">
                    <h1 class="h2 fw-bolder">{{ $course->title }}</h1>
                </a>

                <p>{{ $course->description }}</p>

                @if ($position >= $course->position)
                <div class="d-flex flex-column flex-lg-row gap-2 w-100">
                    <a href="{{ route('siswa-online.course.detail', $course->id) }}"
                        class="btn w-100 btn-lg btn-outline-primary">Detail</a>
                </div>
                @endif
            </div>
        </div>
        @endforeach

        @foreach ($courses as $course)
        <div class="col-md-4 single-note-item all-category note-important">
            <div class="card card-body p-3" style="background-color: rgba(255, 255, 255, 0.5);">
                <div class="w-full h-full bg-black opacity-25 absol"></div>
                <img src="{{ asset('storage/' . $course->course->image) }}" style="object-fit: cover;" width="20em"
                    height="170em" class="card-img-top img-responsive w-100 mb-2" />
                <a href="{{ route('siswa-online.course.detail', $course->course->id) }}">
                    <h1 class="h2 fw-bolder">{{ $course->course->title }}</h1>
                </a>

                <p>{{ $course->course->description }}</p>

                <div class="d-flex flex-column flex-lg-row gap-2 w-100">
                    <a href="{{ route('siswa-online.course.detail', $course->course->id) }}"
                        class="btn w-100 btn-lg btn-outline-primary">Detail</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <!-- Modal Add notes -->
    <div class="modal fade" id="addnotesmodal" tabindex="-1" role="dialog" aria-labelledby="addnotesmodalTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content border-0">
                <div class="modal-header text-bg-primary">
                    <h6 class="modal-title text-white">Add Notes</h6>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="notes-box">
                        <div class="notes-content">
                            <form action="javascript:void(0);" id="addnotesmodalTitle">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <div class="note-title">
                                            <label class="form-label">Note Title</label>
                                            <input type="text" id="note-has-title" class="form-control" minlength="25"
                                                placeholder="Title" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="note-description">
                                            <label class="form-label">Note Description</label>
                                            <textarea id="note-has-description" class="form-control" minlength="60"
                                                placeholder="Description" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="d-flex gap-6">
                        <button class="btn bg-danger-subtle text-danger" data-bs-dismiss="modal">Discard</button>
                        <button id="btn-n-add" class="btn btn-primary" disabled>Add</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- end isi -->

<script src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/js/apps/notes.js"></script>
@endsection
