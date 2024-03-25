@extends('admin.layouts.app')
@section('content')

<div class="card">
    <div class="card-body">
        <div class="row g-2 align-items-center">
            <div class="col-sm-4">
                <div class="bg-dark-subtle">
                    <ul class="nav nav-pills custom-nav nav-justified"role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="all-tab" data-bs-toggle="pill" data-bs-target="#all" type="button" role="tab"
                            aria-controls="all" aria-controls="all" aria-selected="true" data-position="0">
                            Semua
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="free-tab" data-bs-toggle="pill" data-bs-target="#free" type="button" role="tab"
                            aria-controls="free" aria-selected="false" data-position="1" tabindex="-1">
                                Gratis
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="paid-tab" data-bs-toggle="pill" data-bs-target="#paid" type="button" role="tab" aria-controls="paid"
                            aria-selected="false" data-position="2" tabindex="-1">
                            Berbayar
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-auto col-xl-4 ms-auto d-flex gap-2 justify-content-end">
                <form class="app-search d-none d-md-block w-50">
                    <div class="position-relative">
                        <input type="text" class="form-control" placeholder="Cari..." autocomplete="off" id="search-options" value="">
                        <span class="mdi mdi-magnify search-widget-icon"></span>
                        <span class="mdi mdi-close-circle search-widget-icon search-widget-icon-close d-none" id="search-close-options"></span>
                    </div>
                </form>
                <div class="list-grid-nav hstack gap-1">
                    <button class="btn btn-secondary shadow-none" data-bs-toggle="modal"
                        data-bs-target="#add">
                        Tambah Data
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

@if($errors->all())
<div class="alert alert-danger">
    <h3>Ada Kesalahan</h3>

    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</div>
@endif




<div class="tab-content">
    <div id="all" class="tab-pane fade show active">
        <div class="row row-cols-xxl-4 row-cols-lg-3 row-cols-md-2">
            @forelse ($courses as $course)
            <div class="col-xl-3">
                <div class="card ribbon-box border shadow-none mb-lg-0">
                    <div class="card-body">
                        <span class="ribbon-three {{ $course->price == null ? 'ribbon-three-success' : 'ribbon-three-secondary' }}  material-shadow"><span>{{ $course->price == null ? 'Gratis' : 'Rp.'. number_format($course->price, 0, ',', '.') }}</span></span>
                        <img class="card-img-top img-responsive w-100" src="{{ asset('storage/' . $course->image) }}" style="object-fit: cover;" width="20em" height="170em" alt="Card image cap" />
                        <div class="d-flex justify-content-end px-3 mb-4" style="margin-top: -45px">
                            <div class="px-2 py-1 rounded-2 rounded" style="background: #fff; font-size: 15px;">{{$course->division->name}}</div>
                        </div>
                        <a href="/administrator/course/detail" style="font-size: 18px" class="text-dark">
                            {{$course->title}}
                        </a>
                        <p class="text-muted my-2">{{ Str::limit($course->description, 100) }}</p>
                        <div class="d-flex pt-3 gap-2">
                            <a href="/administrator/course/detail/{{ $course->id }}" class="btn btn-secondary flex-fill">
                                Lihat detail
                            </a>
                            <button class="py-1 btn btn-soft-warning btn-edit" data-bs-toggle="modal"
                            data-bs-target="#edit" data-id="{{ $course->id}}" data-title="{{ $course->title }}" data-description="{{ $course->description }}">
                                <i class="ri-pencil-line fs-3"></i>
                            </button>
                            <button class="py-1 btn btn-soft-danger">
                                <i class=" ri-delete-bin-5-line fs-3"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            @empty
            <div class="d-flex justify-content-center mb-2 mt-5">
                <img src="{{ asset('no data.png') }}" alt="" width="300px" srcset="">
            </div>
                <p class="fs-5 text-dark text-center">
                    Data Masih Kosong
                </p>
            @endforelse
        </div>
    </div>

    <div id="free" class="tab-pane fade">
        <div class="row row-cols-xxl-4 row-cols-lg-3 row-cols-md-2">
            @forelse ($courses as $course)
            @if ($course->status === 'free')
            <div class="col-xl-3">
                <div class="card ribbon-box border shadow-none mb-lg-0">
                    <div class="card-body">
                        <span class="ribbon-three {{ $course->price == null ? 'ribbon-three-success' : 'ribbon-three-secondary' }}  material-shadow"><span>{{ $course->price == null ? 'Gratis' : 'Rp.'. number_format($course->price, 0, ',', '.') }}</span></span>
                        <img class="card-img-top img-responsive w-100" src="{{ asset('storage/' . $course->image) }}" style="object-fit: cover;" width="20em" height="170em" alt="Card image cap" />
                        <div class="d-flex justify-content-end px-3 mb-4" style="margin-top: -45px">
                            <div class="px-2 py-1 rounded-2 rounded" style="background: #fff; font-size: 15px;">{{$course->division->name}}</div>
                        </div>
                        <a href="/administrator/course/detail" style="font-size: 18px" class="text-dark">
                            {{$course->title}}
                        </a>
                        <p class="text-muted my-2">{{ Str::limit($course->description, 100) }}</p>
                        <div class="d-flex pt-3 gap-2">
                            <a href="/administrator/course/detail/{{ $course->id }}" class="btn btn-secondary flex-fill">
                                Lihat detail
                            </a>
                            <button class="py-1 btn btn-soft-warning btn-edit" data-bs-toggle="modal"
                            data-bs-target="#edit" data-id="{{ $course->id}}" data-title="{{ $course->title }}">
                                <i class="ri-pencil-line fs-3"></i>
                            </button>
                            <button class="py-1 btn btn-soft-danger">
                                <i class=" ri-delete-bin-5-line fs-3"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            @empty
            <div class="d-flex justify-content-center mb-2 mt-5">
                <img src="{{ asset('no data.png') }}" alt="" width="300px" srcset="">
            </div>
                <p class="fs-5 text-dark text-center">
                    Data Masih Kosong
                </p>
            @endforelse
        </div>
    </div>

    <div id="paid" class="tab-pane fade">
        <div class="row row-cols-xxl-4 row-cols-lg-3 row-cols-md-2">
            @forelse ($courses as $course)
            @if ($course->status === 'paid')
            <div class="col-xl-3">
                <div class="card ribbon-box border shadow-none mb-lg-0">
                    <div class="card-body">
                        <span class="ribbon-three {{ $course->price == null ? 'ribbon-three-success' : 'ribbon-three-secondary' }}  material-shadow"><span>{{ $course->price == null ? 'Gratis' : 'Rp.'. number_format($course->price, 0, ',', '.') }}</span></span>
                        <img class="card-img-top img-responsive w-100" src="{{ asset('storage/' . $course->image) }}" style="object-fit: cover;" width="20em" height="170em" alt="Card image cap" />
                        <div class="d-flex justify-content-end px-3 mb-4" style="margin-top: -45px">
                            <div class="px-2 py-1 rounded-2 rounded" style="background: #fff; font-size: 15px;">{{$course->division->name}}</div>
                        </div>
                        <a href="/administrator/course/detail" style="font-size: 18px" class="text-dark">
                            {{$course->title}}
                        </a>
                        <p class="text-muted my-2">{{ Str::limit($course->description, 100) }}</p>
                        <div class="d-flex pt-3 gap-2">
                            <a href="/administrator/course/detail/{{ $course->id }}" class="btn btn-secondary flex-fill">
                                Lihat detail
                            </a>
                            <button class="py-1 btn btn-soft-warning btn-edit" type="button"
                            data-id="{{ $course->id}}" data-title="{{ $course->title }}"
                            >
                                <i class="ri-pencil-line fs-3"></i>
                            </button>
                            <button class="py-1 btn btn-soft-danger">
                                <i class=" ri-delete-bin-5-line fs-3"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            @empty
            <div class="d-flex justify-content-center mb-2 mt-5">
                <img src="{{ asset('no data.png') }}" alt="" width="300px" srcset="">
            </div>
                <p class="fs-5 text-dark text-center">
                    Data Masih Kosong
                </p>
            @endforelse
        </div>
    </div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Tambah Materi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('course.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title">Judul</label>
                        <input type="text" name="title" class="form-control" placeholder="Judul materi">
                    </div>
                    <div class="mb-3">
                        <label for="description">Deskripsi</label>
                        <textarea name="description" class="form-control" placeholder="Masukkan deskripsi"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="divisi" class="col-form-label">Divisi</label>
                        <select class="tambah js-example-basic-single form-control @error('divisi') is-invalid @enderror" aria-label=".form-select example" name="division_id">
                            <option value="">Pilih divisi</option>
                            @foreach ($divisions as $division)
                                <option value="{{ $division->id }}">{{ $division->name }}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="mb-3">
                        <label>Status</label>
                        <div>
                            @foreach (\App\Enum\StatusCourseEnum::cases() as $status)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" id="studentSelect" type="radio" name="status" id="{{ $status->value }}" value="{{ $status->value }}">
                                <label class="form-check-label"  for="{{ $status->value }}">{{ $status->label() }}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="mb-3 price" id="price" style="display: none;">
                        <label for="priceInput">Harga</label>
                        <input type="number" name="price" id="price" placeholder="Masukan harga" class="form-control">
                        @error('price')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="image">Foto materi</label>
                        <input type="file" name="image" id="" class="form-control">
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-soft-dark" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Edit Materi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" id="form-update" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="title">Judul</label>
                        <input type="text" class="form-control" placeholder="Judul materi" id="title-edit">
                    </div>
                    <div class="mb-3">
                        <label for="description">Deskripsi</label>
                        <textarea name="description" class="form-control" id="description-edit"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="divisi" class="col-form-label">Divisi</label>
                        <select class="tambah js-example-basic-single1 form-control @error('divisi') is-invalid @enderror" aria-label=".form-select example" name="division_id">
                            <option value="">Pilih divisi</option>
                            @foreach ($divisions as $division)
                                <option value="{{ $division->id }}">{{ $division->name }}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="mb-3">
                        <label>Status</label>
                        <div>
                            @foreach (\App\Enum\StatusCourseEnum::cases() as $status)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" id="studentSelect1" type="radio" name="status" id="{{ $status->value }}" value="{{ $status->value }}">
                                <label class="form-check-label"  for="{{ $status->value }}">{{ $status->label() }}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="mb-3 price" id="price" style="display: none;">
                        <label for="priceInput">Harga</label>
                        <input type="number" name="price" id="price" placeholder="Masukan harga" class="form-control">
                        @error('price')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image">Foto materi</label>
                        <input type="file" name="image" id="" class="form-control">
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-soft-dark" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $(".js-example-basic-single").select2({
            dropdownParent: $("#add")
        });
    });
    $(document).ready(function() {
        $(".js-example-basic-single1").select2({
            dropdownParent: $("#modal-edit")
        });
    });
</script>
<script>
    var studentSelect = document.getElementById('studentSelect');

    studentSelect.addEventListener('change', function() {
        var selectedOption = this.options[this.selectedIndex];

        this.removeChild(selectedOption);
    });

    $(document).ready(function(){
        $('input[type=radio][name=status]').change(function() {
            if (this.value === 'paid') {
                $('#price').show();
            } else {
                $('#price').hide();
            }
        });
    });
</script>

    <script>
        $('.btn-edit').click(function () {
            var id = $(this).data('id');
            var title = $(this).data('title');
            var description = $(this).data('description');

            $('#form-update').attr('action', '/administrator/course/' + id);
            $('#title-edit').val(title);
            $('#description-edit').val(description);

            $('#modal-edit').modal('show');
        });

        $('.btn-delete').click(function () {
            var id = $(this).data('id');
            $('#form-delete').attr('action', '/division/' + id);
            $('#modal-delete').modal('show');
        });
    </script>

@endsection
