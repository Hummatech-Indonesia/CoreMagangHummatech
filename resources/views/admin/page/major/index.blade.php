@extends('admin.layouts.app')
<div hidden>
    @dump(session('success'))
    @dump(session('error'))
</div>
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row g-2">
                <div class="col-sm-4 align-items-center d-flex">
                    <h5 class="mx-1 align-items-center">Daftar Jurusan</h5>
                </div>
                <div class="col-sm-auto ms-auto d-flex justify-content-between gap-2">
                    <form action="/administrator/majors" class="m-0">
                        <div class="search-box">
                            <input type="text" class="form-control" name="name" value="{{ request()->name }}"
                                id="searchMemberList" placeholder="Cari Jurusan...">
                            <i class="ri-search-line search-icon"></i>
                        </div>
                    </form>
                    <div>
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal">
                            Tambah
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="listjs-table"id="customerList">
                        <div class="table-responsive table-card mx-3 mb-1 mt-3">
                            <table class="table-nowrap table align-middle" id="customerTable">
                                <thead class="table-light">
                                    <tr>
                                        <th>
                                            NO
                                        </th>
                                        <th>
                                            Nama Jurusan
                                        </th>
                                        <th>
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="list form-check-all">
                                    @forelse ($majors as $major)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td class="d-flex align-items-center">
                                                {{ $major->name }}
                                            </td>
                                            <td>
                                                <button class="btn-delete bg-transparent" data-id="{{ $major->id }}"
                                                    type="button" style="border: none">
                                                    <i class="ri-delete-bin-fill text-danger me-2 align-bottom"></i>
                                                    Hapus
                                                </button>
                                                <button class="btn-edit bg-transparent" data-id="{{ $major->id }}"
                                                    data-name="{{ $major->name }}" type="button"
                                                    style="border: none">
                                                    <i class="ri-pencil-fill text-warning me-2 align-bottom"></i>
                                                    Edit
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5">
                                                <div class="d-flex justify-content-center mb-3 mt-3">
                                                    <img src="{{ asset('no data.png') }}" srcset="" alt=""
                                                        width="200px">
                                                </div>
                                                <p class="fs-5 mb-0 text-center">
                                                    Tidak ada lembaga
                                                </p>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.page.major.widgets.create')
    @include('admin.page.major.widgets.update')
    @include('admin.components.delete-modal-component')
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });

        $('.btn-edit').click(function() {
            var id = $(this).data('id');
            var name = $(this).data('name');
            $('#name').val(name);
            $('#modal-edit').modal('show');
            $('#form-update').attr('action', '/administrator/majors/' + id);
        });

        $('.btn-delete').click(function() {
            var id = $(this).data('id');
            $('#form-delete').attr('action', '/administrator/majors/' + id);
            $('#modal-delete').modal('show');
        });
    </script>
@endsection
