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
                    <h4 class="mx-3 mb-0">Kategori Projek</h4>
                </div>
                <div class="col-sm-auto ms-auto d-flex justify-content-between ">
                    <form action="/administrator/category-project">
                        <div class="search-box me-3">
                            <input type="text" class="form-control" id="searchMemberList" name="name" value="{{request()->name}}"
                                placeholder="Cari kategori projek...">
                            <i class="ri-search-line search-icon"></i>
                        </div>
                    </form>
                    <div class="list-grid-nav hstack gap-1">
                        <button class="btn btn-primary addMembers-modal" data-bs-toggle="modal" data-bs-target="#add">
                            Tambah kategori
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @forelse ($categoryProjects as $categoryProject)
            <div class="col-lg-3">
                <div class="card card-height-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <div>
                                <h4 class="mt-2 mb-4 ff-secondary fw-bold">
                                    <span>
                                        {{ $categoryProject->name }}
                                    </span>
                                </h4>
                            </div>
                            <div>
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-success-subtle rounded-circle fs-2">
                                        <img src="{{ asset('berkas/logo.png') }}" alt="" srcset=""
                                            class="avatar-title bg-success-subtle rounded-circle fs-2">
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="mb-0 text-muted">
                                {{ \Carbon\Carbon::parse($categoryProject->created_at)->locale('id_ID')->isoFormat('D MMMM YYYY') }}
                            </p>
                            <div class="gap-2">
                                <button class="bg-transparent border-0 btn-delete" data-id="{{ $categoryProject->id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 20 20" fill="none">
                                        <path
                                            d="M15 4H20V6H18V19C18 19.5523 17.5523 20 17 20H3C2.44772 20 2 19.5523 2 19V6H0V4H5V1C5 0.44772 5.44772 0 6 0H14C14.5523 0 15 0.44772 15 1V4ZM7 9V15H9V9H7ZM11 9V15H13V9H11ZM7 2V4H13V2H7Z"
                                            fill="#DC3545" />
                                    </svg>
                                </button>
                                <button class="bg-transparent border-0 btn-edit" data-id="{{ $categoryProject->id }}"
                                    data-name="{{ $categoryProject->name }}">
                                    <svg width="19" height="19" viewBox="0 0 19 19" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M4 5H3C2.46957 5 1.96086 5.21071 1.58579 5.58579C1.21071 5.96086 1 6.46957 1 7V16C1 16.5304 1.21071 17.0391 1.58579 17.4142C1.96086 17.7893 2.46957 18 3 18H12C12.5304 18 13.0391 17.7893 13.4142 17.4142C13.7893 17.0391 14 16.5304 14 16V15M13 3L16 6M17.385 4.58511C17.7788 4.19126 18.0001 3.65709 18.0001 3.10011C18.0001 2.54312 17.7788 2.00895 17.385 1.61511C16.9912 1.22126 16.457 1 15.9 1C15.343 1 14.8088 1.22126 14.415 1.61511L6 10.0001V13.0001H9L17.385 4.58511Z"
                                            stroke="#FFAE1F" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{ $categoryProjects->links() }}

        @empty
            <div class="d-flex justify-content-center mt-3">
                <img src="{{ asset('no data.png') }}" width="200px" alt="">
            </div>
            <h4 class="text-center mt-2 mb-4">
                Data Masih kosong
            </h4>
        @endforelse
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
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" placeholder="Masukkan kategori projek">
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
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name-edit"
                                name="name" placeholder="Nama kategori projek">
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
        $('.btn-edit').click(function() {
            var id = $(this).data('id');
            var name = $(this).data('name');
            $('#form-update').attr('action', '/administrator/category-project/' + id);
            $('#name-edit').val(name);
            $('#modal-edit').modal('show');
        });

        $('.btn-delete').click(function() {
            var id = $(this).data('id');
            $('#form-delete').attr('action', '/administrator/category-project/' + id);
            $('#modal-delete').modal('show');
        });
    </script>
@endsection
