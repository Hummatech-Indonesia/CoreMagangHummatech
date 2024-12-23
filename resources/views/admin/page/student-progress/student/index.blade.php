@extends('admin.layouts.app')
@section('content')
    <div class="row">
        @forelse ($students as $student)
            <div class="col-md-3">
                <div class="card hover-img">
                    <div class="card-body p-4 text-center border-bottom">
                        @if (file_exists(public_path('storage/' . $student->avatar)))
                        <img class="avatar-lg bg-cover" src="{{ asset('storage/' . $student->avatar) }}"
                            alt="{{ $student->name }}" width="80">
                        @else
                            <img class="avatar-lg bg-cover" src="{{ asset('user.webp') }}" alt="{{ $student->name }}" width="80">
                        @endif
                        <h5 class="fw-semibold mb-0 fs-5">{{ $student->name }}</h5>
                        <p class="text-dark">{{ $student->school }}</p>
                        <div class="row mt-3">
                            <div class="col-12">
                                <a href="{{ route('administrator.student-progress.student.project', $student->id) }}"
                                    class="btn btn-primary w-100">Lihat
                                    Project</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        @empty
            <div class="d-flex justify-content-center align-items-center" style="min-height: 300px; width: 100%;">
                <div class="text-center">
                    <img src="{{ asset('assets-user/dist/images/products/empty-shopping-bag.gif') }}" alt="No Data"
                        height="120px" />
                    <h3 class="mt-3">Data Masih Kosong</h3>
                </div>
            </div>
        @endforelse
        {{ $students->links() }}
    </div>
@endsection
