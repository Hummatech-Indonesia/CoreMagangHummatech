@extends('admin.layouts.app')
@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .image-container {
            position: relative;
            width: 100%;
        }

        .break-word {
            word-wrap: break-word;
        }

        .image-container img {
            width: 100%;
            height: auto;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            opacity: 0;
            transition: opacity 0.5s;
        }

        .overlay a {
            color: #fff;
            margin: 0 10px;
            font-size: 20px;
        }

        .overlay a:hover {
            color: #ddd;
        }

        .image-container:hover .overlay {
            opacity: 1;
        }
    </style>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row g-2 align-items-center">
                <div class="col-sm-5">
                    <h3 class="mx-3">Kategori Projek</h3>
                </div>
                <div class="col-sm-auto ms-auto d-flex justify-content-between pt-4">
                    <div class="search-box me-3">
                        <input type="text" class="form-control" id="searchMemberList" placeholder="Cari kategori projek...">
                        <i class="ri-search-line search-icon"></i>
                    </div>
                    <div class="list-grid-nav hstack gap-1">
                        <button class="btn btn-primary addMembers-modal" data-bs-toggle="modal"
                            data-bs-target="#add">
                            Tambah kategori
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex justify-content-between mx-3">
                   
                </div><!-- end card header -->

                <div class="card-body mx-3">
                    <div class="live-preview ">
                        <div class="table-responsive table-card">
                            <table class="table align-middle table-nowrap table-striped-columns mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col" style="width: 70px">No</th>
                                        <th scope="col">Kategori Projek</th>
                                        <th scope="col" style="width: 180px;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($categoryProjects as $category)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td class="name">{{ $category->name }}</td>
                                            <td class="row gap-2">
                                                <div class="view">
                                                    <button class="btn btn-soft-primary btn-edit"
                                                    data-id="{{ $category->id }}"
                                                    data-name="{{ $category->name }}">
                                                        <i class=" ri-pencil-fill fs-5"></i>
                                                    </button>
                                                    <button class="btn btn-soft-primary btn-delete"
                                                    data-id="{{ $category->id }}">
                                                        <i class="ri-delete-bin-2-fill fs-5"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8">
                                                <div class="d-flex justify-content-center mt-3">
                                                    <img src="{{ asset('no data.png') }}" width="200px"
                                                        alt="">
                                                </div>
                                                <h4 class="text-center mt-2 mb-4">
                                                    Data Masih kosong
                                                </h4>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-between px-3 pt-3">
                                <p>Showing 1 to 10 of 14 entries</p>
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-end">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1"
                                                aria-disabled="true">Previous</a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">Next</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div><!-- end card-body -->
            </div>
        </div>
    </div>

{{-- modal add category-project start --}}
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="varyingcontentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="varyingcontentModalLabel">Kategori Projek Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('category-project.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-1">
                        <label for="name" class="col-form-label">Kategori</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Masukkan kategori projek">
                        @error('name')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Buat</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- modal add category-project end --}}

{{-- modal edit category-project start --}}
<div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="varyingcontentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="varyingcontentModalLabel">Edit Kategori Projek</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" id="form-update">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <div class="mb-1">
                        <label for="name" class="col-form-label">Projek</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name-edit" name="name" placeholder="Nama kategori projek">
                        @error('name')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- modal edit category-project end --}}

@include('admin.components.delete-modal-component')
@endsection


@section('script')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>

    <script>
        $('.btn-edit').click(function () {
            var id = $(this).data('id');
            var name = $(this).data('name');
            $('#form-update').attr('action', '/administrator/category-project/' + id);
            $('#name-edit').val(name);
            $('#modal-edit').modal('show');
        });

        $('.btn-delete').click(function () {
            var id = $(this).data('id');
            $('#form-delete').attr('action', '/administrator/category-project/' + id);
            $('#modal-delete').modal('show');
        });
    </script>
@endsection
