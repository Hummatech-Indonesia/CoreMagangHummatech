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
                            <li class="breadcrumb-item"><a class="text-muted " href="{{ route('course-store.index') }}">Beli
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
            <img src="{{ asset("/storage/{$course->image}") }}" alt="{{ $course->title }}" class="w-100 rounded-2">
        </div>
        <div class="col-md-7">
            <h1 class="fw-bolder">{{ $course->title }}</h1>
            <h2 class="h4 text-primary mb-3">@currency($course->price)</h2>

            <div class="d-flex flex-column flex-lg-row gap-2">
                <form action="{{ route('course-store.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $course->id }}" />
                    <button type="submit" class="btn btn-lg btn-primary">Beli Sekarang</button>
                </form>
            </div>
        </div>
    </div>

    <div class="card shadow-none border">
        <div class="card-body p-4 pt-2">
            <ul class="nav nav-pills user-profile-tab border-bottom" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button
                        class="nav-link position-relative rounded-0 active d-flex align-items-center justify-content-center bg-transparent fs-3 py-6"
                        id="pills-description-tab" data-bs-toggle="pill" data-bs-target="#pills-description" type="button"
                        role="tab" aria-controls="pills-description" aria-selected="true">
                        Deskripsi
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button
                        class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-6"
                        id="pills-course-tab" data-bs-toggle="pill" data-bs-target="#pills-course" type="button"
                        role="tab" aria-controls="pills-course" aria-selected="false" tabindex="-1">
                        Detail Materi
                    </button>
                </li>
            </ul>
            <div class="tab-content pt-4" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-description" role="tabpanel"
                    aria-labelledby="pills-description-tab" tabindex="0">
                    <h5 class="fs-5 mb-3">
                        {{ $course->title }}
                    </h5>

                    {{ $course->description }}
                </div>
                <div class="tab-pane fade" id="pills-course" role="tabpanel" aria-labelledby="pills-course-tab"
                    tabindex="0">
                    <div class="row">
                        <div class="col-lg-4 d-flex align-items-stretch">
                            <div class="card shadow-none border w-100 mb-7 mb-lg-0">
                                <div class="card-body text-center p-4 d-flex flex-column justify-content-center">
                                    <h6 class="mb-3">Average Rating</h6>
                                    <h2 class="text-primary mb-3 fw-semibold fs-9">4/5</h2>
                                    <ul class="list-unstyled d-flex align-items-center justify-content-center mb-0">
                                        <li>
                                            <a class="me-1" href="javascript:void(0)">
                                                <i class="ti ti-star text-warning fs-6"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="me-1" href="javascript:void(0)">
                                                <i class="ti ti-star text-warning fs-6"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="me-1" href="javascript:void(0)">
                                                <i class="ti ti-star text-warning fs-6"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="me-1" href="javascript:void(0)">
                                                <i class="ti ti-star text-warning fs-6"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <i class="ti ti-star text-warning fs-6"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 d-flex align-items-stretch">
                            <div class="card shadow-none border w-100 mb-7 mb-lg-0">
                                <div class="card-body p-4 d-flex flex-column justify-content-center">
                                    <div class="d-flex align-items-center gap-9 mb-3">
                                        <span class="flex-shrink-0 fs-2">1 Stars</span>
                                        <div class="progress bg-primary-subtle w-100 h-4">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="45"
                                                aria-valuemin="0" aria-valuemax="100" style="width: 45%;"></div>
                                        </div>
                                        <h6 class="mb-0">(485)</h6>
                                    </div>
                                    <div class="d-flex align-items-center gap-9 mb-3">
                                        <span class="flex-shrink-0 fs-2">2 Stars</span>
                                        <div class="progress bg-primary-subtle w-100 h-4">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="25"
                                                aria-valuemin="0" aria-valuemax="100" style="width: 25%;"></div>
                                        </div>
                                        <h6 class="mb-0">(215)</h6>
                                    </div>
                                    <div class="d-flex align-items-center gap-9 mb-3">
                                        <span class="flex-shrink-0 fs-2">3 Stars</span>
                                        <div class="progress bg-primary-subtle w-100 h-4">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="20"
                                                aria-valuemin="0" aria-valuemax="100" style="width: 20%;"></div>
                                        </div>
                                        <h6 class="mb-0">(110)</h6>
                                    </div>
                                    <div class="d-flex align-items-center gap-9 mb-3">
                                        <span class="flex-shrink-0 fs-2">4 Stars</span>
                                        <div class="progress bg-primary-subtle w-100 h-4">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="80"
                                                aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                                        </div>
                                        <h6 class="mb-0">(620)</h6>
                                    </div>
                                    <div class="d-flex align-items-center gap-9">
                                        <span class="flex-shrink-0 fs-2">5 Stars</span>
                                        <div class="progress bg-primary-subtle w-100 h-4">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="12"
                                                aria-valuemin="0" aria-valuemax="100" style="width: 12%;"></div>
                                        </div>
                                        <h6 class="mb-0">(160)</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 d-flex align-items-stretch">
                            <div class="card shadow-none border w-100 mb-7 mb-lg-0">
                                <div class="card-body p-4 d-flex flex-column justify-content-center">
                                    <button type="button"
                                        class="btn btn-outline-primary d-flex align-items-center gap-2 mx-auto">
                                        <i class="ti ti-pencil fs-7"></i>Write an Review
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
