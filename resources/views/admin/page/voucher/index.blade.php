@extends('admin.layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row g-2">
                <div class="col-sm-4 align-items-center d-flex">
                    <h5 class="mx-1 align-items-center">Kode Voucher</h5>
                </div>
                <div class="col-sm-auto ms-auto d-flex">
                    <div class="search-box mx-2">
                        <select name="" id="" class="form-select">
                            <option value="">Terbaru</option>
                            <option value="">Terlama</option>
                        </select>
                    </div>
                    <div class="search-box mx-2">
                        <select name="" id="" class="form-select">
                            <option value="">Tersedia</option>
                            <option value="">Kadaluarsa</option>
                        </select>
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
        @forelse ($vouchers as $voucher)
            <div class="col-3">
                <div class="card">
                    <div class="card-header border border-5 border-secondary border-bottom-0 border-top-0 border-end-0 p-2">
                        <div class="d-flex justify-content-between">
                            <h5>Diskon {{ $voucher->presentase }}%</h5>
                            <button type="button" class="btn bx bx-trash text-danger fs-3 btn-delete"
                                data-id="{{ $voucher->id }}" style="border: 0; box-shadow: none; padding: 0"></button>
                        </div>
                        <p style="font-size: 11px" class="m-0">
                            {{ \Carbon\Carbon::parse($voucher->start_date)->locale('id')->isoFormat('dddd, D MMMM Y') }} -
                            {{ \Carbon\Carbon::parse($voucher->end_date)->locale('id')->isoFormat('dddd, D MMMM Y') }}</p>
                    </div>
                    <div class="card-body">
                        <h4 class="text-secondary fw-semibold">{{ $voucher->code_voucher }}</h4>
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
    <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
        style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Tambah Kode Kupon</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                </div>
                <form action="/voucher/store" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="col-12 mb-2">
                            <label for="">Kode Kupon</label>
                            <input type="text" name="code_voucher" placeholder="Masukan Kode Voucher"
                                onkeyup="capitalizeInput(this)" value="{{ old('code_voucher') }}" class="form-control"
                                id="">
                            @error('code_voucher')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="col-12 mb-2 ">
                            <label for="">Presentase Voucher</label>
                            <div class="input-group">
                                <input type="number" name="presentase" placeholder="Masukan Presentase"
                                    value="{{ old('presentase') }}" class="form-control" id="">
                                <span class="input-group-text">%</span>
                            </div>
                            @error('presentase')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="col-12 mb-2">
                            <label for="">Mulai Voucher</label>
                            <input type="date" name="start_date" value="{{ old('start_date') }}" class="form-control"
                                id="">
                            @error('start_date')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="col-12 mb-2">
                            <label for="">Berakhirnya Voucher</label>
                            <input type="date" name="end_date" value="{{ old('end_date') }}" class="form-control"
                                id="">
                            @error('end_date')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary ">Simpan</button>
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
        $('.btn-delete').click(function() {
            var id = $(this).data('id');
            $('#form-delete').attr('action', '/voucher/delete/' + id);
            $('#modal-delete').modal('show');
        });
    </script>

    <script>
        function capitalizeInput(input) {
            input.value = input.value.toUpperCase();
        }
    </script>
@endsection
