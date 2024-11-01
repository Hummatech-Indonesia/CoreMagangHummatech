@extends('admin.layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row g-2 align-items-center">
                <div class="col-sm-4">
                    <h3 class="mx-3">Daftar Lembaga</h3>
                </div>
                <div class="col-sm-auto d-flex justify-content-between ms-auto pt-4">
                    <div class="search-box mx-3">
                        <form style="width: 300px; margin-top: 5px; margin-right: 15px" action="">
                            <div class="search-box mx-3  d-flex">
                                <select class="js-example-basic-single" name="name">
                                    <option value="" disabled {{ request()->name ? '' : 'selected' }}> Cari Zoom...
                                    </option>
                                    @foreach ($institutionsSearch as $institution)
                                        <option value="{{ $institution->name }}"
                                            {{ request()->name == $institution->name ? 'selected' : '' }}>
                                            {{ $institution->name }}
                                        </option>
                                    @endforeach
                                </select>

                            <div class="ml-2">
                                <div class="d-flex">
                                    <button class="btn btn-primary btn-sm ms-1" type="submit">Cari</button>
                                    <button class="btn btn-info btn-sm ms-1" type="button"
                                        onclick="window.location.href='/administrator/institution';"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                                            <path
                                                d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41m-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9" />
                                            <path fill-rule="evenodd"
                                                d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5 5 0 0 0 8 3M3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9z" />
                                        </svg></button>
                                </div>

                            </div>
                        </div>
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
                        <div class="table-responsive table-card mx-3 mb-1 mt-3">
                            <table class="table-nowrap table align-middle" id="customerTable">
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
                                                <button class="btn-delete bg-transparent" data-id="{{ $institution->id }}"
                                                    type="button" style="border: none">
                                                    <i class="ri-delete-bin-fill text-danger me-2 align-bottom"></i>
                                                    Hapus
                                                </button>
                                                <button class="btn-edit bg-transparent" data-id="{{ $institution->id }}"
                                                    data-name="{{ $institution->name }}" type="button"
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

    @include('admin.page.institution.widgets.create')
    @include('admin.page.institution.widgets.update')
    @include('admin.components.delete-modal-component')
@endsection
@section('script')
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    {{-- <script src="{{ asset('assets/libs/jquery/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/libs/select2/select2.min.js') }}"></script> --}}

    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
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
