@extends('mentor.layouts.app')
@section('content')

<div class="card bg-light-info shadow-none position-relative overflow-hidden">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Tantangan</h4>
                <nav aria-label="breadcrumb mt-2">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-muted " href="/siswa-offline">Beranda</a></li>
                        <li class="breadcrumb-item" aria-current="page">Tantangan</li>
                    </ol>
                </nav>
            </div>
            <div class="col-3">
                <div class="text-center mb-n5">
                    <img src="{{ asset('assets-user/dist/images/breadcrumb/ChatBc.png') }}" alt="" class="img-fluid mb-n4">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid note-has-grid overflow-hidden">
    <ul class="nav nav-pills p-3 mb-3 rounded align-items-center card flex-md-row flex-column">
        <div class="col-md-4 col-xl-2 mb-3 mb-md-0">
            <form class="position-relative">
                <input type="text" class="form-control product-search ps-5" id="input-search" placeholder="Search Contacts...">
                <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
            </form>
        </div>
        <li class="nav-item ms-auto">
            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#addModal">
                Tambah Tantangan
            </button>
        </li>
    </ul>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Tambah Tantangan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('challenge.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="modal-body">
                    @error('mentor_id')
                    <strong>{{ $message }}</strong>
                    @enderror
                    <div class="mb-3">
                        <label for="dropdownMenu" class="form-label">Tingkat Kesulitan</label>
                        <select name="level" id="level" class="form-select">
                            <option value="easy">Mudah</option>
                            <option value="normal">Biasa</option>
                            <option value="hard">Sulit</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="mentor_id" id="inputText" value="{{auth()->user()->mentor->id}}" hidden>

                    </div>
                    <div class="mb-3">
                        <label for="inputText" class="form-label">Judul</label>
                        <input type="text" class="form-control" name="title" id="inputText" placeholder="Masukkan Judul Tantangan">
                        @error('title')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="textarea" class="form-label">Deskripsi</label>
                        <textarea class="form-control" name="description" id="textarea" rows="3" placeholder="Masukkan Deskripsi Tantangan "></textarea>
                        @error('description')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="datePicker" class="form-label">Tanggal Mulai</label>
                        <input type="date" class="form-control" name="start_date" id="datePicker">
                        @error('start_date')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="datePicker" class="form-label">Tenggat</label>
                        <input type="date" class="form-control" name="deadline" id="datePicker">
                        @error('deadline')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="d-flex flex-wrap  all-category note-important">
    @forelse ($challenges as $challenge)

    <div class="p-1 col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-wrap gap-2 align-items-center">
                    <p class="badge {{ \Carbon\Carbon::parse($challenge->deadline)->isPast() ? 'bg-danger-subtle text-danger' : 'bg-primary-subtle text-primary' }}" style="font-size: 12px">
                        @if(\Carbon\Carbon::parse($challenge->deadline)->isPast())
                            Tenggat : {{ \Carbon\Carbon::parse($challenge->deadline)->locale('id_ID')->isoFormat('dddd, D MMMM YYYY') }}
                        @else
                            Batas: {{ \Carbon\Carbon::parse($challenge->deadline)->locale('id_ID')->isoFormat('dddd, D MMMM YYYY') }}
                        @endif
                    </p>
                    <p class="badge bg-light-{{$challenge->level->color()}} text-{{$challenge->level->color()}}" style="font-size: 12px">
                        {{$challenge->level->label()}}
                    </p>
                    <div class="flex-grow-1 mb-3 text-end">
                        <div class="dropdown d-inline-block">
                            <button class="bg-transparent border-0 dropdown text-center" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M5 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                    <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                    <path d="M19 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                </svg>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a href="{{ route('tantangan.detail', $challenge->id) }}" class="dropdown-item edit-item-btn text-primary btn-detail text-center">
                                    Detail
                                    </a>
                                </li>
                                <li>
                                    <button type="button" class="dropdown-item  text-center edit-button"
                                    data-id="{{$challenge->id}}" data-title="{{$challenge->title}}" data-description="{{$challenge->description}}" data-start_date="{{$challenge->start_date}}" data-deadline="{{$challenge->deadline}}">
                                        Edit
                                    </button>

                                </li>
                                <li>
                                    <button type="button" class="dropdown-item edit-item-btn text-danger btn-delete text-center" data-id="{{ $challenge->id }}">
                                    Hapus
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <h5>{{$challenge->title}}</h5>
                <p class="text-mute">
                    {{ Str::limit($challenge->description, 150) }}
                </p>
            </div>
        </div>
    </div>

    @empty

    <div class="mb-2 mt-5 text-center" style="margin: 0 auto;">
        <img src="{{ asset('no data.png') }}" alt="" width="300px" srcset="">
        <p class="fs-5 text-dark">
            Belum Ada Tantangan
        </p>
    </div>

    @endforelse
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Edit Tantangan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" enctype="multipart/form-data" id="form-update">
                @csrf
                @method('PUT')

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="dropdownMenu" class="form-label">Tingkat Kesulitan</label>
                        <select name="level" id="level" class="form-select">
                            <option value="easy">Mudah</option>
                            <option value="normal">Biasa</option>
                            <option value="hard">Sulit</option>
                        </select>
                        @error('level')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="inputText" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="title-edit" name="title" placeholder="Masukkan Judul Tantangan">
                        @error('title')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="textarea" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="description-edit" name="description" rows="3" placeholder="Masukkan Deskripsi Tantangan "></textarea>
                        @error('description')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="datePicker" class="form-label">Tanggal Mulai</label>
                        <input type="date" class="form-control" id="start_date-edit" name="start_date">
                        @error('start_date')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="datePicker" class="form-label">Tenggat</label>
                        <input type="date" class="form-control" id="deadline-edit" name="deadline">
                        @error('deadline')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>

            </form>
        </div>
    </div>
</div>

@include('admin.components.delete-modal-component')

@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $('.btn-delete').on('click', function() {
        var id = $(this).data('id');
        $('#form-delete').attr('action', '/mentor/challenge/delete/' + id);
        $('#modal-delete').modal('show');
    });
    $('.edit-button').on('click', function() {
        var id = $(this).data('id');
        var title = $(this).data('title');
        var description = $(this).data('description');
        var start_date = $(this).data('start_date');
        var deadline = $(this).data('deadline');
        var level = $(this).data('level'); // Tambahkan ini untuk mengambil data tingkat kesulitan



        var collab_category_id = $(this).data('collab_category_id');

        console.log(id);
        $('#form-update').attr('action', '/mentor/challenge/' + id);
        $('#title-edit').val(title);
        $('#description-edit').val(description);
        $('#start_date-edit').val(start_date);
        $('#deadline-edit').val(deadline);
        $('#category-edit').val(collab_category_id).trigger('change');
        $('#editModal').modal('show');
    });
</script>

@endsection
