@extends(auth()->user()->hasRole('siswa-online') ? 'student_online.layouts.app' : 'student_offline.layouts.app')

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
<ul class="nav nav-pills p-3 mb-3 rounded align-items-center card flex-row">
    <li class="nav-item">
        <a href="javascript:void(0)" class="
                      nav-link
                    gap-6
                      note-link
                      d-flex
                      align-items-center
                      justify-content-center
                      px-3 px-md-3 active
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
                    " id="note-social">
            <span class="d-none d-md-block fw-medium">Berbayar</span>
        </a>
    </li>
</ul>
<!-- tab bar end -->

<!-- isi start -->
<div class="tab-content">
    <div id="note-full-container" class="note-has-grid row">

        <div class="row single-note-item all-category note-business">
            @foreach ($courses as $course)
                <div class="col-md-4 col-xxl-3">
                    <div class="card card-body p-3" style="background-color: rgba(255, 255, 255, 0.5);">
                        <div class="w-full h-full bg-black opacity-25 absol"></div>
                        <img src="{{ asset('assets-user/images/laravel-11.jpg') }}" class=" rounded-1 mb-3 w-100" />
                        <a href="{{ url('/courses/detail')}}">
                            <h1 class=" h2 fw-bolder">{{ $course->course->title }} berlangganan</h1>
                        </a>

                        <p>{{ $course->course->description }}</p>

                        <form action="" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $course->id }}" />
                        </form>
                        <div class=" d-flex flex-column flex-lg-row gap-2 w-100">
                            <a href="{{ route('student.course.show', $course->course->id) }}"
                                class=" btn w-100 btn-lg btn-outline-primary">Detail</a>
                            <!-- <a href="{{ route('transaction.checkout-course', $course->course->id) }}" class="btn btn-lg btn-primary w-100 btn-lg">Beli</a> -->
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row single-note-item all-category note-social">
            @foreach ($courses as $course)
                <div class="col-md-4 col-xxl-3">
                    <div class="card card-body p-3" style="background-color: rgba(255, 255, 255, 0.5);">
                        <div class="w-full h-full bg-black opacity-25 absol"></div>
                        <img src="{{ asset('assets-user/images/laravel-11.jpg') }}" class=" rounded-1 mb-3 w-100" />
                        <a href="{{ url('/courses/detail')}}">
                            <h1 class=" h2 fw-bolder">{{ $course->course->title }} berbayar</h1>
                        </a>

                        <p>{{ $course->course->description }}</p>

                        <form action="" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $course->id }}" />
                        </form>
                        <div class=" d-flex flex-column flex-lg-row gap-2 w-100">
                            <a href="{{ route('student.course.show', $course->course->id) }}"
                                class=" btn w-100 btn-lg btn-outline-primary">Detail</a>
                            <!-- <a href="{{ route('transaction.checkout-course', $course->course->id) }}" class="btn btn-lg btn-primary w-100 btn-lg">Beli</a> -->
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- isi end -->

<script src="../../../../cdn.jsdelivr.net/npm/iconify-icon%401.0.8/dist/iconify-icon.min.js"></script>
<script src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/libs/fullcalendar/index.global.min.js"></script>
<script src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/js/apps/notes.js"></script>
@endsection