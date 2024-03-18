@extends('admin.layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row g-2">
                <div class="col-sm-4 align-items-center d-flex">
                    <h5 class="mx-5 align-items-center">Kode Voucher</h5>
                </div>
                <div class="col-sm-auto ms-auto d-flex">
                    <div class="search-box mx-3">
                        <input type="text" class="form-control" id="searchMemberList" placeholder="Cari Siswa...">
                        <i class="ri-search-line search-icon"></i>
                    </div>
                    <div class="list-grid-nav hstack gap-1">
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#myModal">
                            Tambah
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach ($vouchers as $voucher)
            <div class="col-3">
                <div
                    class="border-end-0 border-top-0 border-bottom-0 border-5 border-secondary bg-light mx-auto mb-1 card mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h5>Diskon {{ $voucher->presentase }}%</h5>
                                <p>{{ $voucher->code_voucher }}</p>
                            </div>
                            <div>
                                <button class="btn btn-soft-secondary btn-sm" data-bs-toggle="dropdown"><i
                                        class=" ri-more-line"></i></button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li class="dropdown-item">
                                        <button data-id="{{ $voucher->id }}" class="text-black fs-5 btn-delete"
                                            style="border: none; background: transparent">
                                            <i class="bx bxs-trash text-danger"></i> Hapus
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="mt-3">
                            <p class="m-0">{{ \Carbon\Carbon::parse($voucher->start_date)->locale('id')->isoFormat('D MMMM Y') }} - {{ \Carbon\Carbon::parse($voucher->end_date)->locale('id')->isoFormat('D MMMM Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
        style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Tambah Kode Vocer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                </div>
                <form action="/administrator/voucher-code/store" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="col-12 mb-2">
                            <label for="">Kode Vocer</label>
                            <input type="text" name="code_voucher" placeholder="Masukan Kode Voucher" class="form-control" id="">
                        </div>
                        <div class="col-12 mb-2">
                            <label for="">Presentase Voucher</label>
                            <input type="text" name="presentase" placeholder="Masukan Presentase" class="form-control" id="">
                        </div>
                        <div class="col-12 mb-2">
                            <label for="">Mulai Voucher</label>
                            <input type="date" name="start_date" class="form-control" id="">
                        </div>
                        <div class="col-12 mb-2">
                            <label for="">Berakhirnya Voucher</label>
                            <input type="date" name="end_date" class="form-control" id="">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary ">Save Changes</button>
                    </div>
                </form>
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
        $('.btn-delete').click(function () {
            var id = $(this).data('id');
            $('#form-delete').attr('action', '/administrator/voucher-code/delete/' + id);
            $('#modal-delete').modal('show');
        });
    </script>
@endsection
