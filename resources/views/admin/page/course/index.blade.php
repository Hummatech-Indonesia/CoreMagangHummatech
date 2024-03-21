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
            <div class="col-xl-3">
                <div class="card ribbon-box border shadow-none mb-lg-0">
                    <div class="card-body">
                        <span class="ribbon-three ribbon-three-primary material-shadow"><span>Rp. 20.000</span></span>
                        <img class="card-img-top img-responsive w-100" src="{{ asset('assets/images/materi-1.png') }}" style="object-fit: cover;" width="20em" height="170em" alt="Card image cap" />
                        <div class="d-flex justify-content-end px-3 mb-4" style="margin-top: -45px">
                            <div class="px-2 py-1 rounded-2 rounded" style="background: #fff; font-size: 15px;">Website</div>
                        </div>
                        <a href="/siswa-offline/course/detail" style="font-size: 18px" class="text-dark">
                            Tutorial Laravel SPA Menggunakan Blade Template Engine (Splade)
                        </a>
                        <p class="text-muted my-2">Tutorial Laravel SPA Menggunakan Blade Template Engine Splade...</p>
                        <div class="d-flex pt-3 gap-2">
                            <a href="" class="btn btn-primary flex-fill">
                                Lihat detail
                            </a>
                            <button class="py-1 btn btn-soft-warning" data-bs-toggle="modal"
                            data-bs-target="#edit">
                                <i class="ri-pencil-line fs-3"></i>
                            </button>
                            <button class="py-1 btn btn-soft-danger">
                                <i class=" ri-delete-bin-5-line fs-3"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3">
                <div class="card ribbon-box border shadow-none mb-lg-0">
                    <div class="card-body">
                        <span class="ribbon-three ribbon-three-success material-shadow"><span>Gratis</span></span>
                        <img class="card-img-top img-responsive w-100" src="{{ asset('assets/images/materi-1.png') }}" style="object-fit: cover;" width="20em" height="170em" alt="Card image cap" />
                        <div class="d-flex justify-content-end px-3 mb-4" style="margin-top: -45px">
                            <div class="px-2 py-1 rounded-2 rounded" style="background: #fff; font-size: 15px;">Website</div>
                        </div>
                        <a href="/siswa-offline/course/detail" style="font-size: 18px" class="text-dark">
                            Tutorial Laravel SPA Menggunakan Blade Template Engine (Splade)
                        </a>
                        <p class="text-muted my-2">Tutorial Laravel SPA Menggunakan Blade Template Engine Splade...</p>
                        <div class="d-flex pt-3 gap-2">
                            <a href="" class="btn btn-primary flex-fill">
                                Lihat detail
                            </a>
                            <button class="py-1 btn btn-soft-warning" data-bs-toggle="modal"
                        data-bs-target="#edit">
                                <i class="ri-pencil-line fs-3"></i>
                            </button>
                            <button class="py-1 btn btn-soft-danger">
                                <i class=" ri-delete-bin-5-line fs-3"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="free" class="tab-pane fade">
        <div class="row row-cols-xxl-4 row-cols-lg-3 row-cols-md-2">
            <div class="col-xl-3">
                <div class="card ribbon-box border shadow-none mb-lg-0">
                    <div class="card-body">
                        <span class="ribbon-three ribbon-three-success material-shadow"><span>Gratis</span></span>
                        <img class="card-img-top img-responsive w-100" src="{{ asset('assets/images/materi-1.png') }}" style="object-fit: cover;" width="20em" height="170em" alt="Card image cap" />
                        <div class="d-flex justify-content-end px-3 mb-4" style="margin-top: -45px">
                            <div class="px-2 py-1 rounded-2 rounded" style="background: #fff; font-size: 15px;">Website</div>
                        </div>
                        <a href="/siswa-offline/course/detail" style="font-size: 18px" class="text-dark">
                            Tutorial Laravel SPA Menggunakan Blade Template Engine (Splade)
                        </a>
                        <p class="text-muted my-2">Tutorial Laravel SPA Menggunakan Blade Template Engine Splade...</p>
                        <div class="d-flex pt-3 gap-2">
                            <a href="" class="btn btn-primary flex-fill">
                                Lihat detail
                            </a>
                            <button class="py-1 btn btn-soft-warning" data-bs-toggle="modal"
                        data-bs-target="#edit">
                                <i class="ri-pencil-line fs-3"></i>
                            </button>
                            <button class="py-1 btn btn-soft-danger">
                                <i class=" ri-delete-bin-5-line fs-3"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="paid" class="tab-pane fade">
        <div class="row row-cols-xxl-4 row-cols-lg-3 row-cols-md-2">
            <div class="col-xl-3">
                <div class="card ribbon-box border shadow-none mb-lg-0">
                    <div class="card-body">
                        <span class="ribbon-three ribbon-three-primary material-shadow"><span>Rp. 20.000</span></span>
                        <img class="card-img-top img-responsive w-100" src="{{ asset('assets/images/materi-1.png') }}" style="object-fit: cover;" width="20em" height="170em" alt="Card image cap" />
                        <div class="d-flex justify-content-end px-3 mb-4" style="margin-top: -45px">
                            <div class="px-2 py-1 rounded-2 rounded" style="background: #fff; font-size: 15px;">Website</div>
                        </div>
                        <a href="/siswa-offline/course/detail" style="font-size: 18px" class="text-dark">
                            Tutorial Laravel SPA Menggunakan Blade Template Engine (Splade)
                        </a>
                        <p class="text-muted my-2">Tutorial Laravel SPA Menggunakan Blade Template Engine Splade...</p>
                        <div class="d-flex pt-3 gap-2">
                            <a href="" class="btn btn-primary flex-fill">
                                Lihat detail
                            </a>
                            <button class="py-1 btn btn-soft-warning" data-bs-toggle="modal"
                        data-bs-target="#edit">
                                <i class="ri-pencil-line fs-3"></i>
                            </button>
                            <button class="py-1 btn btn-soft-danger">
                                <i class=" ri-delete-bin-5-line fs-3"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="add" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Tambah Materi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="title">Judul</label>
                        <input type="text" class="form-control" placeholder="Judul materi">
                    </div>
                    <div class="mb-3">
                        <label for="description">Deskripsi</label>
                        <textarea name="description" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="divisi" class="col-form-label">Divisi</label>
                        <select class="tambah js-example-basic-single form-control @error('divisi') is-invalid @enderror" aria-label=".form-select example" name="student_id">
                            <option value="">Pilih divisi</option>
                            <option value="">WEB</option>
                            <option value="">MOBILE</option>
                            <option value="">UI/UX</option>
                            <option value="">DIGITAL MARKETING</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">Materi</label>
                        <div class="d-flex gap-5 type">
                            <div class="form-check form-radio-primary">
                                <input class="form-check-input" type="radio" value="free" name="type" id="free" checked>
                                <label class="form-check-label" for="free">
                                    Gratis
                                </label>
                            </div>
                            <div class="form-check form-radio-primary">
                                <input class="form-check-input" type="radio" value="paid" name="type" id="paid">
                                <label class="form-check-label" for="paid">
                                    Berbayar
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 price" id="price" style="display: none;">
                        <label for="price">Harga</label>
                        <input type="number" name="price" id="" placeholder="masukan harga" class="form-control">
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

<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Edit Materi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="title">Judul</label>
                        <input type="text" class="form-control" placeholder="Judul materi">
                    </div>
                    <div class="mb-3">
                        <label for="description">Deskripsi</label>
                        <textarea name="description" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="divisi" class="col-form-label">Divisi</label>
                        <select class="tambah js-example-basic-single form-control @error('divisi') is-invalid @enderror" aria-label=".form-select example" name="student_id">
                            <option value="">Pilih divisi</option>
                            <option value="">WEB</option>
                            <option value="">MOBILE</option>
                            <option value="">UI/UX</option>
                            <option value="">DIGITAL MARKETING</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">Materi</label>
                        <div class="d-flex gap-5 type">
                            <div class="form-check form-radio-primary">
                                <input class="form-check-input" type="radio" value="free" name="type" id="free" checked>
                                <label class="form-check-label" for="free">
                                    Gratis
                                </label>
                            </div>
                            <div class="form-check form-radio-primary">
                                <input class="form-check-input" type="radio" value="paid" name="type" id="paid">
                                <label class="form-check-label" for="paid">
                                    Berbayar
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 price" id="price" style="display: none;">
                        <label for="price">Harga</label>
                        <input type="number" name="price" id="" placeholder="masukan harga" class="form-control">
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
</script>
<script>
    var studentSelect = document.getElementById('studentSelect');

    studentSelect.addEventListener('change', function() {
        var selectedOption = this.options[this.selectedIndex];

        // Remove the selected option
        this.removeChild(selectedOption);
    });

    $(document).ready(function(){
    $('input[type=radio][name=type]').change(function() {
        if (this.value === 'free') {
            $('#price').show();
        } else {
            $('#price').hide();
        }
    });
});
</script>

@endsection
