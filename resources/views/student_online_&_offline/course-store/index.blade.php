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
                        <img src="{{ asset('assets-user/dist/images/breadcrumb/ChatBc.png') }}" alt="Image"
                            class="img-fluid mb-n4" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        @forelse ($courses as $course)
            <div class="col-md-4 col-xxl-3">
                <div class="card card-body p-3">
                    <img src="{{ asset('storage/' . $course->image) }}" class="rounded-1 mb-3 w-100 img-fluid" style="height: 200px; object-fit: cover;" />

                    <a href="{{ url('/courses/detail') }}">
                        <h4 class="fw-bolder">{{ $course->title }}</h4>
                    </a>

                    <p>{{ Str::limit($course->description, 150, '...') }}</p>

                    <form action="" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $course->id }}" />
                    </form>
                    <div class="d-flex flex-column flex-lg-row gap-2 w-100">
                        <a href="{{ route('student.course.show', $course->id) }}"
                            class="btn w-100 btn-lg btn-outline-primary">Detail</a>
                        <a href="{{ route('transaction.checkout-course', $course->id) }}"
                            class="btn btn-lg btn-primary w-100 btn-lg">Beli</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-md-12 text-center">
                <img src="{{ asset('assets-user/dist/images/products/empty-shopping-bag.gif') }}" alt="No Data"
                    height="120px" />
                <h3 class="text-center">Data Masih Kosong</h3>
            </div>
        @endforelse
    </div>
@endsection
