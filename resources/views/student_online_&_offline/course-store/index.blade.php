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
                    <img src="https://pkl-hummatech.dev.id/assets-user/dist/images/breadcrumb/ChatBc.png" alt="Image" class="img-fluid mb-n4" />
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    @forelse ($courses as $index => $course)
    <div class="col-md-4 col-xxl-3">
        <div class="card card-body p-3">
            <img src="{{ url("/storage/{$course->image}") }}" alt="{{ $course->title }}" class="rounded-1 mb-3 w-100" />

            <p class="text-primary h4">@currency($course->price)</p>

            <a href="{{ route('course-store.detail', $course->id) }}">
                <h1 class="h2 fw-bolder">{{ $course->title }}</h1>
            </a>

            <p>{{ Str::limit(strip_tags($course->description), 100) }}</p>

            <form action="{{ route('course-store.store') }}" method="POST" id="buynow-{{ $index }}">
                @csrf
                <input type="hidden" name="id" value="{{ $course->id }}" />
            </form>
            <div class="d-flex flex-column flex-lg-row gap-2 w-100">
                <a href="{{ route('course-store.detail', $course->id) }}" class="btn w-100 btn-lg btn-outline-primary">Detail</a>
                <button type="button" class="btn btn-lg btn-primary w-100 btn-lg" onclick="$('#buynow-{{ $index }}').submit()">Beli</button>
            </div>
        </div>
    </div>
    @empty
    <div class="col-md-4 mx-auto">
        <div class="text-center">
            <img src="{{ asset('assets-user/dist/images/products/empty-shopping-bag.gif') }}" width="200px"
            alt="no-data">
            <p class="text-center fw-border text-dark fs-5" style="font-weight: 600 ">Materi Belum
                Tersedia</p>
        </div>
    </div>
    @endforelse

    {{ $courses->links() }}
</div>
@endsection
