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

<!-- tab bar end -->

    <div id="note-full-container" class="note-has-grid row">
        <div class="col-md-4 single-note-item all-category note-important">
            @foreach ($courses as $course)
            <div class="card card-body p-3" style="background-color: rgba(255, 255, 255, 0.5);">
                <div class="w-full h-full bg-black opacity-25 absol"></div>
                <img src="{{ asset('storage/' . $course->course->image) }}" style="object-fit: cover;" width="20em"
                    height="170em" class="card-img-top img-responsive w-100 mb-2" />
                <a href="{{ route('siswa-online.course.detail', $course->course->id) }}">
                    <h1 class="h2 fw-bolder">{{ $course->course->title }}</h1>
                </a>

                <p>{{ $course->course->description }}</p>

                <div class="d-flex flex-column flex-lg-row gap-2 w-100">
                    <a href="{{ route('siswa-offline.course.detail', $course->course->id) }}"
                        class="btn w-100 btn-lg btn-outline-primary">Detail</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
<!-- end isi -->

<script src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/js/apps/notes.js"></script>
@endsection
