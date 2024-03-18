@extends('admin.layouts.app')
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
                <div class="list-grid-nav hstack gap-1">
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#add">
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
                        <label for="division_id">Kategori Produk</label>
                        <select name="division_id" class=".js-example-basic-single form-select" id="#usaha">
                            <option value="" disabled selected>Pilih Divisi</option>
                            @forelse ($divisions as $division)
                                <option value="{{ $division->id }}">{{ $division->name }}</option>
                            @empty
                                <option value="" disabled selected>Kategori Masih Kosong</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="mb-1">
                        <label for="price" class="col-form-label">Harga</label>
                        <input type="text" class="form-control" id="price" name="price" placeholder="Masukkan Harga Paket">
                    </div>
                    <div class="mb-1">
                        <label for="" class="mt-2 mb-2">Deskripsi</label>
                        <textarea name="description" id="" class="form-control"></textarea>
                    </div>
                    <div class="mb-1">
                        <label for="" class="mt-2 mb-2">Gambar</label>
                        <figure class="col-xl-3 col-md-4 col-6" itemprop="associatedMedia" itemscope="">
                            <img class="img-thumbnail image-preview" itemprop="thumbnail">
                        </figure>
                        <input type="file" name="image" class="form-control" onchange="preview(event)">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary">Simpan</button>
                    <button type="button" class="btn btn-soft-danger" data-bs-dismiss="modal">Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="row">
    @forelse ($product as $product)

    <div class="col-sm-6 col-xl-3">
        <div class="card mb-3">
            <div class="d-flex justify-content-center">
                <img src="{{ asset('storage/' . $product->image) }}" alt="My Image" style="width: 85%; height: auto; margin-bottom: 20px;" class="mt-4 rounded-3">
            </div>
            <div class="card-body rounded-3 mb-3" style="background: #F3F6F9; width: 95%; margin: 0 auto;">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title mb-2">{{$product->name}}</h5>
                    <h4 class="card-title mb-2">IDR {{ number_format($product->price, 0, ',', '.') }} <small class="mt-3">/bulan</small></h4>
                </div>
                <p class="mt-3 text-muted">{{$product->description}}</p>
                <div class="justify-content-end d-flex">
                    <button class="btn btn-warning mx-2 btn-edit" data-id="{{ $division->id }}" data-name="{{ $division->name }}">
                        Edit
                    </button>
                    <button class="btn btn-danger btn-delete" data-id="{{ $division->id }}">
                        Hapus
                    </button>
                </div>
            </div>
        </div>
    </div>

    @empty

    @endforelse

</div>
@include('admin.components.delete-modal-component')


<!--Edit Modal -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="varyingcontentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="varyingcontentModalLabel">Tambah Daftar Paket</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-1">
                        <label for="name" class="col-form-label">Nama Paket</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama Paket">
                    </div>
                    <div class="form-group mb-3 mt-3 col-md-12">
                        <label for="division_id">Kategori Produk</label>
                        <select name="division_id" class=".js-example-basic-single form-select" id="#usaha">
                            <option value="" disabled selected>Pilih Divisi</option>
                            @forelse ($divisions as $division)
                                <option value="{{ $division->id }}">{{ $division->name }}</option>
                            @empty
                                <option value="" disabled selected>Kategori Masih Kosong</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="mb-1">
                        <label for="price" class="col-form-label">Harga</label>
                        <input type="text" class="form-control" id="price" name="price" placeholder="Masukkan Harga Paket">
                    </div>
                    <div class="mb-1">
                        <label for="" class="mt-2 mb-2">Deskripsi</label>
                        <textarea name="description" id="" class="form-control"></textarea>
                    </div>
                    <div class="mb-1">
                        <label for="" class="mt-2 mb-2">Gambar</label>
                        <figure class="col-xl-3 col-md-4 col-6" itemprop="associatedMedia" itemscope="">
                            <img class="img-thumbnail image-preview" itemprop="thumbnail">
                        </figure>
                        <input type="file" name="image" class="form-control" onchange="preview(event)">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary">Simpan</button>
                    <button type="button" class="btn btn-soft-danger" data-bs-dismiss="modal">Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>
<script>
    function preview(event) {
        const reader = new FileReader();
        reader.onload = function() {
            const preview = document.querySelector('.image-preview');
            preview.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
<script>
    $('.btn-edit').click(function () {
        var id = $(this).data('id');
        var name = $(this).data('name');
        $('#form-update').attr('action', '/product/' + id);
        $('#name-edit').val(name);
        $('#modal-edit').modal('show');
    });

    $('.btn-delete').click(function () {
        var id = $(this).data('id');
        $('#form-delete').attr('action', 'product/' + id);
        $('#modal-delete').modal('show');
    });
</script>
@endsection
