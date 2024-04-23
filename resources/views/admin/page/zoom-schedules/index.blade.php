@extends('admin.layouts.app')
@section('content')

<div class="card">
    <div class="card-body">
        <div class="row g-2">
            <div class="col-sm-4">
                <h4 class="mx-5 pt-2">Jadwal Zoom</h4>
            </div>
            <div class="col-sm-auto ms-auto d-flex">
                <div class="search-box mx-3">
                    <input type="text" class="form-control" id="searchMemberList" placeholder="Cari Siswa...">
                    <i class="ri-search-line search-icon"></i>
                </div>

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
<div class="modal fade " id="add" tabindex="-1" aria-labelledby="varyingcontentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="varyingcontentModalLabel">Tambah Jadwal Zoom</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('zoom-schedule.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-1 m-2">
                        <label for="title" class="col-form-label">Judul</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Masukkan Judul">
                        @error('title')
                        <p class="text-danger">
                            {{$message}}
                        </p>
                        @enderror

                    </div>
                    <div class="d-flex justify-content-between">
                        <div class="mb-1 flex-grow-1 m-2">
                            <label for="tanggal" class="col-form-label">Tanggal Mulai</label>
                            <input type="datetime-local" class="form-control" id="start_date" name="start_date" placeholder="Masukkan Tanggal Mulai">
                            @error('start_date')
                            <p class="text-danger">
                                {{$message}}
                            </p>
                            @enderror
                        </div>
                        {{-- <div class="mb-1 flex-grow-1 m-2">
                            <label for="jam" class="col-form-label">Jam</label>
                            <input type="time" class="form-control" id="jam" name="jam" placeholder="Masukkan Jam">
                        </div> --}}
                        <div class="mb-1 flex-grow-1 m-2">
                            <label for="jam" class="col-form-label">Tanggal Berakhir</label>
                            <input type="datetime-local" class="form-control" id="jam" name="end_date" placeholder="Masukkan tabggal berakhir">
                            @error('end_date')
                            <p class="text-danger">
                                {{$message}}
                            </p>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-1 m-2">
                        <label for="name" class="col-form-label">Link</label>
                        <input type="text" class="form-control" id="name" name="link" placeholder="Masukkan Judul">
                        @error('link')
                        <p class="text-danger">
                            {{$message}}
                        </p>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-soft-danger" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-secondary">Simpan</button>
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
                    {{$zoomSchedule->title}}
                </h3>
                <div>
                    <button class="bg-transparent border-0 btn-edit"
                    data-id="{{ $zoomSchedule->id }}"
                    data-title="{{ $zoomSchedule->title }}"
                    data-start_date="{{ $zoomSchedule->start_date }}"
                    data-end_date="{{ $zoomSchedule->end_date }}"
                    data-link="{{ $zoomSchedule->link }}"
                    >
                        <i class=" ri-edit-2-line fs-4" style="color: #FFAE1F"></i>

                    </button>
                    <button class="bg-transparent border-0 btn-delete" data-id="{{ $zoomSchedule->id }}">
                        <i class=" ri-delete-bin-line fs-4 ms-2" style="color: #DC3545"></i>
                    </button>
                </div>
            </div>

            <div class="d-flex">
                <p class="text-muted">
                    <i class="ri-calendar-event-line"></i>
                    {{ \Carbon\Carbon::parse($zoomSchedule->start_date)->locale('id_ID')->isoFormat('dddd, D MMMM YYYY') }}                </p>
                <p class="text-muted ms-5">
                    <i class=" ri-compass-2-line"></i>
                    {{ \Carbon\Carbon::parse($zoomSchedule->end_date)->format('H:i') }}
                </div>

            <a href="{{$zoomSchedule->link}}" target="_blank">
                {{$zoomSchedule->link}}
            </a>
        </div>
    </div>

    @empty

    @endforelse

</div>


<!--Edit Modal -->
<div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="varyingcontentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="varyingcontentModalLabel">Tambah Daftar Paket</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" enctype="multipart/form-data" id="form-update">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-1 m-2">
                        <label for="title" class="col-form-label">Judul</label>
                        <input type="text" class="form-control" id="title-edit" name="title" placeholder="Masukkan Judul">
                        @error('title')
                        <p class="text-danger">
                            {{$message}}
                        </p>
                        @enderror

                    </div>
                    <div class="d-flex justify-content-between">
                        <div class="mb-1 flex-grow-1 m-2">
                            <label for="tanggal" class="col-form-label">Tanggal Mulai</label>
                            <input type="datetime-local" class="form-control" id="start_date-edit" name="start_date" placeholder="Masukkan Tanggal Mulai">
                            @error('start_date')
                            <p class="text-danger">
                                {{$message}}
                            </p>
                            @enderror
                        </div>
                        <div class="mb-1 flex-grow-1 m-2">
                            <label for="jam" class="col-form-label">Tanggal Berakhir</label>
                            <input type="datetime-local" class="form-control" id="end_date-edit" name="end_date" placeholder="Masukkan tabggal berakhir">
                            @error('end_date')
                            <p class="text-danger">
                                {{$message}}
                            </p>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-1 m-2">
                        <label for="name" class="col-form-label">Link</label>
                        <input type="text" class="form-control" id="link-edit" name="link" placeholder="Masukkan Judul">
                        @error('link')
                        <p class="text-danger">
                            {{$message}}
                        </p>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-soft-danger" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-secondary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@include('admin.components.delete-modal-component')

@endsection

@section('script')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script>
    $('.btn-edit').click(function () {
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

    $('.btn-delete').click(function () {
        var id = $(this).data('id');
        $('#form-delete').attr('action', '/administrator/zoom-schedules/' + id);
        $('#modal-delete').modal('show');
    });
</script>
@endsection
