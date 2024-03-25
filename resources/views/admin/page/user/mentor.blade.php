@extends('admin.layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row g-2 align-items-center">
                <div class="col-sm-4">
                    <h3 class="mx-3">Mentor</h3>
                </div>
                <div class="col-sm-auto ms-auto d-flex justify-content-between pt-4">
                    <div class="search-box mx-3">
                        <input type="text" class="form-control" id="searchMemberList" placeholder="Cari Siswa...">
                        <i class="ri-search-line search-icon"></i>
                    </div>
                    <div class="list-grid-nav hstack gap-1">
                        <button class="btn btn-success addMembers-modal" data-bs-toggle="modal" data-bs-target="#addModal">
                            Tambah
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="tab-content">
        <div id="steparrow-gen-info" class="tab-pane fade show active">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="listjs-table"id="customerList">
                                <div class="row g-4 mb-3">
                                    <div class="col-sm-auto">
                                        <div class="d-flex">
                                            <h5 class="mx-2 pt-2">Show</h5>
                                            <select name=""class="form-select" id="expiry-month-input">
                                                <option value="1">10</option>
                                            </select>
                                            <h5 class="mx-2 pt-2">entries</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive table-card mt-3 mb-1 mx-3">
                                    <table class="table align-middle table-nowrap" id="customerTable">
                                        <thead class="table-light">
                                            <tr>
                                                <th class="sort" data-sort="number">
                                                    NO
                                                </th>
                                                <th class="sort" data-sort="name">
                                                    Nama
                                                </th>
                                                <th class="sort" data-sort="date">
                                                    Email
                                                </th>
                                                <th class="sort" data-sort="status">
                                                    Divisi
                                                </th>
                                                <th class="sort" data-sort="action">
                                                    Aksi
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="list form-check-all">
                                            @foreach ($mentors as $mentor)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td class="d-flex align-items-center gap-3">
                                                        <div>
                                                            @if (file_exists(public_path('storage/' . $mentor->image)))
                                                                <img class="avatar-sm rounded-circle"
                                                                    style="object-fit: cover"
                                                                    src="{{ asset('storage/' . $mentor->image) }}">
                                                            @else
                                                                <img class="avatar-sm rounded rounded-circle"
                                                                    style="object-fit: cover"
                                                                    src="{{ asset('user.webp') }}">
                                                            @endif
                                                        </div>
                                                        {{ $mentor->name }}
                                                    </td>
                                                    <td>{{ $mentor->email }}</td>
                                                    <td>{{ $mentor->division->name }}</td>
                                                    <td>
                                                        <div class="dropdown d-inline-block">
                                                            <button class="btn btn-soft-secondary btn-sm dropdown"
                                                                type="button" data-bs-toggle="dropdown"
                                                                aria-expanded="false">
                                                                <i class="ri-more-fill align-middle"></i>
                                                            </button>
                                                            <ul class="dropdown-menu dropdown-menu-end">
                                                                <li>
                                                                    <a href="/menu-mentor/detail/{{ $mentor->id }}"
                                                                        class="dropdown-item btn-show">
                                                                        <i
                                                                            class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                                                        Lihat Detail
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <button type="button"
                                                                        class="dropdown-item edit-item-btn btn-edit"
                                                                        data-id="{{ $mentor->id }}"
                                                                        data-name="{{ $mentor->name }}"
                                                                        data-email="{{ $mentor->email }}"
                                                                        data-division="{{ $mentor->division_id }}"
                                                                        @if (file_exists(public_path('storage/' . $mentor->image))) data-image="{{ asset('storage/' . $mentor->image) }}"
                                                                        @else
                                                                            data-image="{{ asset('user.webp') }}" @endif>
                                                                        <i
                                                                            class="ri-pencil-fill align-bottom me-2 text-warning"></i>
                                                                        Edit
                                                                    </button>
                                                                </li>
                                                                <li>
                                                                    <button type="button" class="dropdown-item btn-delete"
                                                                        data-id="{{ $mentor->id }}">
                                                                        <i
                                                                            class="ri-delete-bin-fill align-bottom me-2 text-danger"></i>
                                                                        Hapus
                                                                    </button>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Pagination -->
                                <div class="d-flex justify-content-between px-3">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="varyingcontentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="varyingcontentModalLabel">Edit Mentor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" id="form-update" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="">Nama</label>
                            <input type="text" name="name" id="mentor-name" placeholder="Masukkan Nama"
                                class="form-control">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Foto</label>
                            <br>
                            <img src="" class="rounded show-image avatar-lg object-fit-cover" id="mentor-image"
                                alt="">
                            <input type="file" name="image" id="" class="form-control">
                            @error('image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Email</label>
                            <input type="text" name="email" id="mentor-email" placeholder="Masukkan Email"
                                class="form-control">
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Divisi</label>
                            <select name="division_id" id="mentor-division" class="form-select">
                                <option disabled selected>Pilih Divisi</option>
                                @foreach ($divisions as $division)
                                    <option value="{{ $division->id }}">{{ $division->name }}</option>
                                @endforeach
                            </select>
                            @error('division_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="showModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="showModalLabel">Tambah Mentor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/menu-mentor/store" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="">Nama</label>
                            <input type="text" name="name" id=""
                                onkeyup="this.value = this.value.toUpperCase();" placeholder="Masukkan Nama"
                                class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Foto</label>
                            <input type="file" name="image" id="" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Email</label>
                            <input type="text" name="email" id="" placeholder="Masukkan Email"
                                class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Divisi</label>
                            <select name="division_id" id="" class="form-select">
                                <option disabled selected>Pilih Divisi</option>
                                @foreach ($divisions as $division)
                                    <option value="{{ $division->id }}">{{ $division->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-show" tabindex="-1" aria-labelledby="showModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mx-4" id="showModalLabel">Detail Mentor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="">Nama</label>
                        <h6 class="mentor-name"></h6>
                    </div>
                    <div class="mb-3">
                        <label for="">Email</label>
                        <h6 class="mentor-email"></h6>
                    </div>
                    <div class="mb-3">
                        <label for="">Divisi</label>
                        <h6 class="mentor-division"></h6>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>


    @include('admin.components.delete-modal-component')
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $('.js-example-basic-multiple').select2({
            dropdownParent: $('#addModal')
        });
        $('.js-example-basic-multiple').select2({
            dropdownParent: $('#modal-edit')
        });

        $('.btn-edit').click(function() {
            var id = $(this).data('id');
            var name = $(this).data('name');
            var email = $(this).data('email');
            var division = $(this).data('division');
            var image = $(this).data('image');
            $('#mentor-id').val(id);
            $('#mentor-name').val(name);
            $('#mentor-email').val(email);
            $('#mentor-image').attr('src', image);
            $('#mentor-division').val(division).find('option[value="' + division + '"]').prop('selected', true);
            $('#modal-edit').modal('show');

            $('#form-update').attr('action', '/menu-mentor/update/' + id);
        });

        $('.btn-delete').click(function() {
            var id = $(this).data('id');

            $('#form-delete').attr('action', '/menu-mentor/delete/' + id);
            $('#modal-delete').modal('show');
        });

        $('.btn-show').click(function() {
            var id = $(this).data('id');
            var name = $(this).data('name');
            var email = $(this).data('email');
            var division = $(this).data('division');


            $('.mentor-name').text(name);
            $('.mentor-image').attr('src', '/storage/' + image);
            $('.mentor-email').text(email);
            $('.mentor-division').text(division);

            $('#modal-show').modal('show');

        })
    </script>
@endsection
