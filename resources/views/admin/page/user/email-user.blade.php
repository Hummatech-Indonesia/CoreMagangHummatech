@extends('admin.layouts.app')
@section('content')
    <div class="col-sm-4 mt-2 mb-4">
        <h4 class="mx-3">Data Email pengguna</h4>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-3 d-flex justify-content-between">
                        <div class="col-sm-auto">
                            <div class="d-flex">
                                <h5 class="mx-2 pt-2">Show</h5>
                                <select name=""class="form-select" id="expiry-month-input">
                                    <option value="1">10</option>
                                </select>
                                <h5 class="mx-2 pt-2">entries</h5>
                            </div>
                        </div>
                        <div class="col-sm-auto">
                            <form action="/email-user" method="GET" class="d-flex gap-2 align-items-center">
                                <label for="search">Cari:</label>
                                <input type="text" name="email" value="{{ old('email', request()->email) }}"
                                    id="search" class="form-control">
                                <button type="submit" class="btn btn-primary">Cari</button>
                            </form>

                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="align-middle table table-nowrap table-bordered table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col" class="text-center" style="width: 150px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                    @if ($user->email == auth()->user()->email)
                                    @else
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td class="text-center">
                                                <button class="btn btn-danger btn-delete shadow-none"
                                                    data-id="{{ $user->id }}">Hapus</button>
                                            </td>
                                        </tr>
                                    @endif
                                @empty
                                    <tr>
                                        <td colspan="9">
                                            <div class="d-flex justify-content-center mb-3 mt-3">
                                                <img src="{{ asset('no data.png') }}" width="200px" alt=""
                                                    srcset="">
                                            </div>
                                            <p class="text-center mb-0 fs-5">
                                                Data Masih Kosong
                                            </p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="pt-2">
                            {{-- {{ $users->links() }} --}}
                        </div>
                    </div>
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
    <script>
        $('.btn-delete').click(function() {
            var id = $(this).data('id');

            $('#form-delete').attr('action', '/email-user/' + id);
            $('#modal-delete').modal('show');
        });
    </script>
@endsection
