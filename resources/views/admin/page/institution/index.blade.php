@extends('admin.layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row g-2 align-items-center">
                <div class="col-sm-4">
                    <h3 class="mx-3">Daftar Lembaga</h3>
                </div>
                <div class="col-sm-auto ms-auto d-flex justify-content-between pt-4">
                    <div class="search-box mx-3">
                        <form action="">
                            <input type="text" class="form-control" name="name" value="{{ request()->name }}"
                                id="searchMemberList" placeholder="Cari Lembaga...">
                            <i class="ri-search-line search-icon"></i>
                        </form>
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

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="listjs-table"id="customerList">
                        <div class="table-responsive table-card mt-3 mb-1 mx-3">
                            <table class="table align-middle table-nowrap" id="customerTable">
                                <thead class="table-light">
                                    <tr>
                                        <th>
                                            NO
                                        </th>
                                        <th>
                                            Nama
                                        </th>
                                        <th>
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="list form-check-all">
                                    @forelse ($institutions as $institution)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td class="d-flex align-items-center">
                                                {{ $institution->name }}
                                            </td>
                                            <td>
                                                <button type="button" class="btn-delete bg-transparent"
                                                    style="border: none" data-id="{{ $institution->id }}">
                                                    <i class="ri-delete-bin-fill align-bottom me-2 text-danger"></i>
                                                    Hapus
                                                </button>
                                                <button type="button" class="btn-edit bg-transparent" style="border: none"
                                                    data-id="{{ $institution->id }}" data-name="{{ $institution->name }}">
                                                    <i class="ri-pencil-fill align-bottom me-2 text-warning"></i>
                                                    Edit
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5">
                                                <div class="d-flex justify-content-center mb-3 mt-3">
                                                    <img src="{{ asset('no data.png') }}" width="200px" alt=""
                                                        srcset="">
                                                </div>
                                                <p class="text-center mb-0 fs-5">
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

    @include('admin.page.institution.widgets.create')
    @include('admin.page.institution.widgets.update')
    @include('admin.components.delete-modal-component')
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        
    <script>
        $('.btn-edit').click(function() {
            var id = $(this).data('id');
            var name = $(this).data('name');
            $('#name_institution').val(name);
            $('#modal-edit').modal('show');

            $('#form-update').attr('action', '/administrator/institution/' + id);
        });

        $('.btn-delete').click(function() {
            var id = $(this).data('id');

            $('#form-delete').attr('action', '/administrator/institution/' + id);
            $('#modal-delete').modal('show');
        });
    </script>
@endsection
