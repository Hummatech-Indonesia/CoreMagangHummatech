@extends('admin.layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row g-2">
                <div class="col-sm-4">
                    <h4 class="mx-5 pt-2">Jadwal Zoom</h4>
                </div>
                <div class="col-sm-auto d-flex ms-auto">
                    <form style="width: 300px; margin-top: 5px; margin-right: 10px" action="/administrator/zoom-schedules">
                        <div class="search-box d-flex mx-3">
                            <select class="js-example-basic-single" name="title">
                                <option value="" disabled {{ request()->title ? '' : 'selected' }}>Cari Zoom...
                                </option>
                                @forelse ($zoomSchedulesSearch as $zoomSchedule)
                                    <option value="{{ $zoomSchedule->title }}"
                                        {{ request()->title == $zoomSchedule->title ? 'selected' : '' }}>
                                        {{ $zoomSchedule->title }}
                                    </option>
                                @empty
                                @endforelse
                            </select>
                            <button class="btn btn-primary btn-sm ms-1" type="submit">Cari</button>
                            <button class="btn btn-info btn-sm ms-1" type="button"
                                onclick="window.location.href='/administrator/zoom-schedules';"><svg
                                    class="bi bi-arrow-repeat" xmlns="http://www.w3.org/2000/svg" width="16"
                                    height="16" fill="currentColor" viewBox="0 0 16 16">
                                    <path
                                        d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41m-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9" />
                                    <path fill-rule="evenodd"
                                        d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5 5 0 0 0 8 3M3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9z" />
                                </svg></button>
                        </div>
                    </form>
                    <div class="list-grid-nav hstack gap-1">
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#add">
                            Tambah Data
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Add Modal -->
    <div class="modal fade" id="add" aria-labelledby="varyingcontentModalLabel" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="varyingcontentModalLabel">Tambah Jadwal Zoom</h5>
                    <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                </div>
                <form action="{{ route('zoom-schedule.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="m-2 mb-1">
                            <label class="col-form-label" for="title">Judul</label>
                            <input class="form-control" id="title" name="title" type="text"
                                value="{{ old('title') }}" placeholder="Masukkan Judul">
                            @error('title')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="flex-grow-1 m-2 mb-1">
                                <label class="col-form-label" for="tanggal">Tanggal Mulai</label>
                                <input class="form-control" id="start_date" name="start_date" type="datetime-local"
                                    value="{{ old('start_date') }}" placeholder="Masukkan Tanggal Mulai">
                                @error('start_date')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            {{-- <div class="mb-1 flex-grow-1 m-2">
                            <label for="jam" class="col-form-label">Jam</label>
                            <input type="time" class="form-control" id="jam" name="jam" placeholder="Masukkan Jam">
                        </div> --}}
                            <div class="flex-grow-1 m-2 mb-1">
                                <label class="col-form-label" for="jam">Tanggal Berakhir</label>
                                <input class="form-control" id="jam" name="end_date" type="datetime-local"
                                    value="{{ old('end_date') }}" placeholder="Masukkan tabggal berakhir">
                                @error('end_date')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>

                        <div class="m-2 mb-1">
                            <label class="col-form-label" for="name">Link</label>
                            <input class="form-control" id="name" name="link" type="text"
                                value="{{ old('link') }}" placeholder="Masukkan Judul">
                            @error('link')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-soft-danger" data-bs-dismiss="modal" type="button">Tutup</button>
                        <button class="btn btn-secondary" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        @forelse ($zoomSchedules as $zoomSchedule)
            <div class="col-xxl-4 col-lg-6">
                <div class="card card-body">
                    <div class="d-flex justify-content-between">
                        <h3 class="mb-3">
                            {{ $zoomSchedule->title }}
                        </h3>
                        <div>
                            <button class="btn-edit border-0 bg-transparent" data-id="{{ $zoomSchedule->id }}"
                                data-title="{{ $zoomSchedule->title }}"
                                data-start_date="{{ $zoomSchedule->start_date }}"
                                data-end_date="{{ $zoomSchedule->end_date }}" data-link="{{ $zoomSchedule->link }}">
                                <i class="ri-edit-2-line fs-4" style="color: #FFAE1F"></i>

                            </button>
                            <button class="btn-delete border-0 bg-transparent" data-id="{{ $zoomSchedule->id }}">
                                <i class="ri-delete-bin-line fs-4 ms-2" style="color: #DC3545"></i>
                            </button>
                        </div>
                    </div>

                    <div class="d-flex">
                        <p class="text-muted">
                            <i class="ri-calendar-event-line"></i>
                            {{ \Carbon\Carbon::parse($zoomSchedule->start_date)->locale('id_ID')->isoFormat('dddd, D MMMM YYYY') }}
                        </p>
                        <p class="text-muted ms-5">
                            <i class="ri-compass-2-line"></i>
                            {{ \Carbon\Carbon::parse($zoomSchedule->start_date)->format('H:i') }} -
                            {{ \Carbon\Carbon::parse($zoomSchedule->end_date)->format('H:i') }}

                    </div>

                    <a href="{{ $zoomSchedule->link }}" target="_blank">
                        {{ $zoomSchedule->link }}
                    </a>
                </div>
            </div>

        @empty

            <div class="mb-2 mt-5 text-center" style="margin: 0 auto;">
                <img src="{{ asset('no data.png') }}" srcset="" alt="" width="300px">
                <p class="fs-5 text-dark">
                    Belum Ada Jadwal
                </p>
            </div>
        @endforelse

        {{ $zoomSchedules->links() }}

    </div>

    <!--Edit Modal -->
    <div class="modal fade" id="modal-edit" aria-labelledby="varyingcontentModalLabel" aria-hidden="true"
        tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="varyingcontentModalLabel">Tambah Daftar Paket</h5>
                    <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                </div>
                <form id="form-update" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="m-2 mb-1">
                            <label class="col-form-label" for="title">Judul</label>
                            <input class="form-control" id="title-edit" name="title" type="text"
                                placeholder="Masukkan Judul">
                            @error('title')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="flex-grow-1 m-2 mb-1">
                                <label class="col-form-label" for="tanggal">Tanggal Mulai</label>
                                <input class="form-control" id="start_date-edit" name="start_date" type="datetime-local"
                                    placeholder="Masukkan Tanggal Mulai">
                                @error('start_date')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            <div class="flex-grow-1 m-2 mb-1">
                                <label class="col-form-label" for="jam">Tanggal Berakhir</label>
                                <input class="form-control" id="end_date-edit" name="end_date" type="datetime-local"
                                    placeholder="Masukkan tabggal berakhir">
                                @error('end_date')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>

                        <div class="m-2 mb-1">
                            <label class="col-form-label" for="name">Link</label>
                            <input class="form-control" id="link-edit" name="link" type="text"
                                placeholder="Masukkan Judul">
                            @error('link')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-soft-danger" data-bs-dismiss="modal" type="button">Tutup</button>
                        <button class="btn btn-secondary" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('admin.components.delete-modal-component')
@endsection

@section('script')
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script> --}}
    {{-- <script src="{{ asset('assets/libs/jquery/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/libs/select2/select2.min.js') }}"></script> --}}

    <script>
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
        $('.btn-edit').click(function() {
            var id = $(this).data('id');
            var title = $(this).data('title');
            var start_date = $(this).data('start_date');
            var end_date = $(this).data('end_date');
            var link = $(this).data('link');

            $('#form-update').attr('action', '/administrator/zoom-schedules/' + id);
            $('#title-edit').val(title);
            $('#start_date-edit').val(start_date);
            $('#end_date-edit').val(end_date);
            $('#link-edit').val(link);

            $('#modal-edit').modal('show');
        });

        $('.btn-delete').click(function() {
            var id = $(this).data('id');
            $('#form-delete').attr('action', '/administrator/zoom-schedules/' + id);
            $('#modal-delete').modal('show');
        });
    </script>
@endsection
