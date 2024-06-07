@extends(auth()->user()->hasRole('siswa-online') ? 'student_online.layouts.app' : 'student_offline.layouts.app')

@section('content')
<div class="card bg-light-info shadow-none position-relative overflow-hidden">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Detail Materi</h4>
                <nav aria-label="breadcrumb mt-2">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-muted " href="/siswa-offline">Dasbor</a></li>
                        <li class="breadcrumb-item"><a class="text-muted " href="#">Beli
                                Materi</a></li>
                        <li class="breadcrumb-item" aria-current="page">{{ $course->title }}</li>
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

<div class="row mb-3">
    <div class="col-md-5">
        <img src="{{ asset('storage/' . $course->image) }}" class="w-100 rounded-2">
    </div>
    <div class="col-md-7">
        <h1 class="fw-bolder">{{ $course->title }}</h1>
        <h2 class="h4 text-primary mb-3">{{ $course->price }}</h2>

        <div class="d-flex flex-column flex-lg-row gap-2">
            <form action="{{ url('/transaction/checkout') }}" method="">
                <input type="hidden" name="" value="" />
                <!-- <button type="submit" class="btn btn-lg btn-primary">Beli Sekarang</button> -->
            </form>
        </div>
    </div>
</div>

<div class="card shadow-none border">
    <div class="card-body p-4">
        <div class="row">
            <div class="col-md-6">
                <h4 class="border-bottom border-light mb-4 d-block fw-bolder"><span
                        class="border-bottom border-primary">Deskripsi</span></h4>

                <h5 class="fs-5 mb-3">
                    {{ $course->title }}
                </h5>
                {{ $course->description }}
            </div>
            <div class="col-md-6">
                <h4 class="border-bottom border-light mb-4 d-block fw-bolder"><span
                        class="border-bottom border-primary">Materinya</span></h4>

                <div class="list-group list-group-flush" style="max-height: 300px; overflow-y: auto;">
                    @foreach ($course->subCourses as $subCourse)
                    <div class="list-group-item py-4 d-flex gap-2 align-items-center">
                        <div class="row w-100 justify-content-between align-items-center">
                            <div class="col-md-3">
                                <img src="{{ asset('storage/' . $subCourse->image_course) }}" class="rounded-4 w-100" />
                            </div>
                            <div class="col-md-9">
                                <h5 class="mb-2">{{ $subCourse->title }}</h5>
                                <p class="mb-1">{{ $subCourse->description }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <hr>
        <h1>Tugas</h1>
        @if ($course->courseAssignments->count() > 0)
        <h1 style="color: red;">Judul : {{ $course->courseAssignments[0]->title }}</h1>
        <p style="color: blue;">{{ $course->courseAssignments[0]->description }}</p>
        <p style="color: pink;">{{ $course->courseAssignments[0]->type }}</p>
        <hr>
        <form action="{{route('submit.task.answer.store', $course->courseAssignments[0]->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <p>Upload jawaban anda untuk membuka materi selanjutnya</p>
            @if ($course->courseAssignments[0]->type == "link")
            <input type="text" name="link" placeholder="link">
            @else
            <input type="file" name="file" id="">
            @endif
            <button type="submit">Submit</button>
        </form>
        @else
        <h1>Tidak ada tugas</h1>
        @endif

        @endsection
