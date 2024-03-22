@extends('admin.layouts.app')
@section('content')
    <div class="d-flex justify-content-end">
        <a href="/menu-siswa" class="btn btn-primary mb-3 ">Kembali</a>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row g-2 align-items-center">
                <div class="col-sm-4">
                    <h5 class="mx-3">Data Wajah</h5>
                </div>
                <div class="col-sm-auto ms-auto d-flex justify-content-between gap-2">
                    <div class="list-grid-nav hstack gap-1 ">
                        <button class="btn btn-danger btn-sm w-100">Hapus Data</button>
                    </div>
                    <div class="list-grid-nav hstack gap-1 ">
                        <button class="btn btn-success btn-sm w-100" data-bs-toggle="modal"
                            data-bs-target="#myModal">Tambah</button>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        @foreach (range(1, 12) as $item)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-center">
                            <img src="{{ asset('assets/images/bg-d.png') }}" alt="">
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
                    <h5 class="modal-title" id="myModalLabel">Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                </div>
                <div class="modal-body">
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label">Foto</label>
                            <input type="file" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary ">Simpan</button>
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                    </div>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    @endsection
