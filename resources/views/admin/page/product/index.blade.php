@extends('admin.layouts.app')
@section('style')
<style>
    body.dark-mode .text-light-dark {
    color: #ffffff;
}
</style>
@endsection
@section('content')

<div class="card">
    <div class="card-body">
        <div class="row g-2">
            <div class="col-sm-4">
                <h4 class="mx-5 pt-2">Daftar Paket</h4>
            </div>
            <div class="col-sm-auto ms-auto d-flex">
                <div class="search-box mx-3">
                    <input type="text" class="form-control" id="searchMemberList" placeholder="Cari Siswa...">
                    <i class="ri-search-line search-icon"></i>
                </div>
                @php
                    $unusedDivisionsExist = false;

                    foreach ($divisions as $division) {
                        $isUsed = \App\Models\Product::where('division_id', $division->id)->exists();
                        if (!$isUsed) {
                            $unusedDivisionsExist = true;
                            break;
                        }
                    }
                @endphp

                @if ($unusedDivisionsExist)
                    <div class="list-grid-nav hstack gap-1">
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#add">
                            Tambah Data
                        </button>
                    </div>
                @endif
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

<div class="row">
    @forelse ($product as $product)

    <div class="col-sm-6 col-xl-3">
        <div class="card mb-3">
            <div class="d-flex justify-content-center">
                <img src="{{ asset('storage/' . $product->image) }}" alt="My Image" style="width: 85%; height: auto; margin-bottom: 20px;" class="mt-4 rounded-3">
            </div>
            <div class="card-body rounded-3 mb-3 bg-light" style="width: 95%; margin: 0 auto;">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title mb-2 text-dark text-light-dark">{{$product->name}}</h5>
                    <h4 class="card-title mb-2 text-dark text-light-dark">IDR {{ number_format($product->price, 0, ',', '.') }} <small class="mt-3 text-muted">/bulan</small></h4>
                </div>
                <p class="mt-3 text-muted">{{$product->description}}</p>
                <div class="justify-content-end d-flex">
                    <button type="button" class="btn btn-warning mx-2 btn-edit" data-id="{{ $product->id }}" data-name="{{ $product->name }}" data-price="{{ $product->price }}"
                        data-description="{{ $product->description }}" data-image="{{ $product->image }}" data-division_id="{{ $product->division_id }}">
                        Edit
                    </button>
                    <button type="button" class="btn btn-danger btn-delete" data-id="{{ $product->id }}">
                        Hapus
                    </button>
                </div>
            </div>

        </div>
    </div>

    @empty
        <div class="d-flex justify-content-center mb-2 mt-5">
            <img src="{{ asset('no data.png') }}" alt="" width="300px" srcset="">
        </div>
        <h4 class="text-dark text-center">Tidak ada data</h4>
    @endforelse

</div>
@include('admin.components.delete-modal-component')


<!--Add Modal -->
    <div class="modal fade" id="add" tabindex="-1" aria-labelledby="varyingcontentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="varyingcontentModalLabel">Tambah Daftar Paket</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-1">
                        <label for="name" class="col-form-label">Nama Paket</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama Paket">
                    </div>
                    <div class="form-group mb-3 mt-3 col-md-12">
                        <label for="division_id">Divisi</label>
                        <select name="division_id" class="js-example-basic-single form-select" id="division_id-edit">
                            @foreach ($divisions as $division)
                                @php
                                    $isUsed = \App\Models\Product::where('division_id', $division->id)->exists();
                                @endphp
                                @if (!$isUsed)
                                    <option value="{{ $division->id }}">{{ $division->name }}</option>
                                @endif
                            @endforeach
                            @if (count($divisions) === 0)
                                <option value="null" disabled selected>Divisi Masih Kosong</option>
                            @endif
                        </select>
                    </div>



                    <div class="mb-1">
                        <label for="price" class="col-form-label">Harga</label>
                        <input type="text" class="form-control" id="price" name="price" placeholder="Masukkan Harga Paket">
                    </div>
                    <div class="mb-1">
                        <label for="" class="mt-2 mb-2">Deskripsi</label>
                        <textarea name="description" id="" class="form-control" placeholder="Masukkan Deskripsi "></textarea>
                    </div>
                    <div class="mb-1">
                        <label for="" class="mt-2 mb-2">Gambar</label>
                        <figure class="col-xl-3 col-md-4 col-6" itemprop="associatedMedia" itemscope="">
                            <img class="img-thumbnail preview" itemprop="thumbnail">
                        </figure>
                        <input type="file" name="image" class="form-control" onchange="preview(event)">
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
                    <div class="mb-1">
                        <label for="name" class="col-form-label">Nama Paket</label>
                        <input type="text" class="form-control" id="name-edit" name="name" placeholder="Masukkan Nama Paket">
                    </div>
                    <div class="form-group mb-3 mt-3 col-md-12">
                        <label for="division_id">Divisi</label>
                        <select name="division_id" class="js-example-basic-single form-select" id="division_id-edit">
                            <option value="" disabled selected>Pilih Divisi</option>
                            @foreach ($divisions as $division)
                                @php
                                    $isUsed = \App\Models\Product::where('division_id', $division->id)->exists();
                                @endphp
                                @if (!$isUsed)
                                    <option value="{{ $division->id }}">{{ $division->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-1">
                        <label for="price" class="col-form-label">Harga</label>
                        <input type="text" class="form-control" id="price-edit" name="price" placeholder="Masukkan Harga Paket">
                    </div>
                    <div class="mb-1">
                        <label for="" class="mt-2 mb-2">Deskripsi</label>
                        <textarea name="description" id="description-edit" class="form-control"></textarea>
                    </div>
                    <div class="mb-1">
                        <label for="" class="mt-2 mb-2">Gambar</label>
                        <input type="file" name="image" class="form-control" onchange="preview(event)"><br>
                        <figure class="col-xl-3 col-md-4 col-6" itemprop="associatedMedia" itemscope="">
                            <img class="img-thumbnail preview" itemprop="thumbnail" src="" />
                        </figure>
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


@endsection

@section('script')
<!-- CSS -->
<!-- JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>


<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>

<script>

    $(document).ready(function() {
        $(".js-example-basic-single-add").select2({
            dropdownParent: $("#add")
        });
    });
    $(document).ready(function() {
        $(".js-example-basic-single").select2({
            dropdownParent: $("#modal-edit")
        });
    });
</script>

<script>
    function preview(event) {
        var reader = new FileReader();
        reader.onload = function () {
            var output = document.querySelector('.preview');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>

<script>
    $('.btn-edit').click(function () {
        var id = $(this).data('id');
        var name = $(this).data('name');
        var price = $(this).data('price');
        var description = $(this).data('description');
        var image = $(this).data('image');
        var division_id = $(this).data('division_id');

        $('#form-update').attr('action', 'product/' + id);
        $('#name-edit').val(name);
        $('#price-edit').val(price);
        $('#description-edit').val(description);
        $('#image-edit').val(image);
        $('#img-thumnail').attr('src', 'storage/' + image);
        $('#division_id-edit').val(division_id);
        $('#modal-edit').modal('show');
    });

    $('.btn-delete').click(function () {
        var id = $(this).data('id');
        $('#form-delete').attr('action', 'product/' + id);
        $('#modal-delete').modal('show');
    });
</script>

@endsection
