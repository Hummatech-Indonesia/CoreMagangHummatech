@extends('mentor.layouts.app')
@section('content')
    <div class="d-flex justify-content-end">
        <button type="button" class="btn mb-1 btn-primary btn-lg px-4 fs-4 font-medium" data-bs-toggle="modal"
            data-bs-target="#staticBackdrop">
            Tambah Materi
        </button>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title" id="myLargeModalLabel">
                        Tambah Materi
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/create/materi" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <label for="">Judul Materi</label>
                        <input type="text" name="title" class="form-control">
                        <label for="">Deskripsi Materi</label>
                        <textarea name="description" id="" class="form-control"></textarea>
                        <label for="">Foto Materi</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-danger text-danger font-medium waves-effect text-start"
                            data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit"
                            class="btn btn-light-primary text-primary font-medium waves-effect text-start"
                            data-bs-dismiss="modal">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        @forelse ($courses as $course)

            <div class="col-md-4 col-xl-3 col-12 col-sm-6">
                <div class="card shadow-none border position-relative mb-md-0">
                    <div class="overflow-hidden rounded">
                        <a href="javascript:void(0)">
                            <img src="{{ asset('storage/' .$course->image) }}"
                                style="min-height: 50px ;width:;height:200px;object-fit:cover"
                                class="rounded hover-img card-img" alt="art" />
                        </a>
                    </div>
                    <div class="p-2 flex-column">
                        <div>
                            <h5 class="mt-2 mb-0 fw-semibold">
                                {{ $course->title }}
                            </h5>
                            <p class="mt-2 mb-1" style="word-wrap: break-word;">{{ $course->description }}</p>
                        </div>
                    <div class="p-2 mb-2">
                        <div class="row">
                            <div class="col-12 col-xl-6 mt-2">
                                <a href="/show/materi/{{ $course->id }}" class="btn btn-primary w-100">Detail</a>
                            </div>
                            <div class="col-12 col-xl-3 mt-2">
                                <button class="btn btn-light-warning w-100">
                                    <svg width="25" height="25" viewBox="0 0 25 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M15.7774 5.17506L19.6291 8.83224M20.0374 3.91391L20.9217 4.7629C21.7353 5.54395 21.7353 6.81028 20.9217 7.59133L9.21773 18.8271C8.98903 19.0467 8.71023 19.2121 8.40341 19.3103L4.11222 20.6835C3.70505 20.8138 3.31769 20.4419 3.45341 20.051L4.8838 15.9315C4.98609 15.6369 5.1584 15.3693 5.3871 15.1497L17.0911 3.9139C17.9047 3.13286 19.2238 3.13286 20.0374 3.91391Z"
                                            stroke="#FFAE1F" stroke-width="1.25" stroke-linecap="round" />
                                    </svg>
                                </button>
                            </div>
                            <div class="col-12 col-xl-3 mt-2">
                                <button class="btn btn-light-danger w-100">
                                    <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M18.75 8.03963H19.2708C19.8461 8.03963 20.3125 7.57326 20.3125 6.99797V6.47713C20.3125 5.90184 19.8461 5.43547 19.2708 5.43547H16.1458M18.75 8.03963V20.5396C18.75 21.6903 17.8173 22.623 16.6667 22.623H8.33333C7.18274 22.623 6.25 21.6903 6.25 20.5396V8.03963M18.75 8.03963H6.25M16.1458 5.43547V4.91463C16.1458 3.76404 15.2131 2.8313 14.0625 2.8313H10.9375C9.78691 2.8313 8.85417 3.76404 8.85417 4.91463V5.43547M16.1458 5.43547H8.85417M6.25 8.03963H5.72917C5.15387 8.03963 4.6875 7.57326 4.6875 6.99797V6.47713C4.6875 5.90184 5.15387 5.43547 5.72917 5.43547H8.85417M10.4167 11.6855V18.9771M14.5833 11.6855V18.9771"
                                            stroke="#DC3545" stroke-width="1.25" stroke-linecap="round" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            Data kosong
        @endforelse
    </div>
@endsection
