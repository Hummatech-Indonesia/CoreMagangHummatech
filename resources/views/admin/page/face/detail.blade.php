@extends('admin.layouts.app')
@section('content')
    <div class="d-flex justify-content-end">
        <a href="/faces" class="btn btn-primary mb-3 ">Kembali</a>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row g-2 align-items-center">
                <div class="col-sm-4">
                    <h5 class="mx-3">Data Wajah</h5>
                </div>
                <div class="col-sm-auto ms-auto d-flex justify-content-between gap-2">
                    <div class="list-grid-nav hstack gap-1 ">
                        <form action="/faces/delete/{{ $id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm w-100">Hapus Data</button>
                        </form>
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
        @forelse ($faces as $item)
        <div class="col-12 col-md-6 col-lg-3">
            <div class="card" style="height: 500px; margin-bottom: 20px;">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{ asset('storage/' . $item->photo) }}" class="card-img" alt="Foto Saya" style="width: 100%; height: 470px; max-width: 400px;object-fit:cover">
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="d-flex justify-content-center mt-3">
            <img src="{{ asset('no data.png') }}" width="200px" alt="">
        </div>
        <h4 class="text-center mt-2 mb-4">
            Data Masih kosong
        </h4>
        @endforelse
    </div>
    @error('photo')
        {{ $message }}
    @enderror
    @error('student_id')
        {{ $message }}
    @enderror
    <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
        style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                </div>
                <form action="/faces/create" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label">Foto</label>
                                <input type="hidden" name="student_id" value="{{ $id }}">
                                <input type="file" name="photo[]" class="form-control" multiple>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary ">Simpan</button>
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                        </div>

                    </div><!-- /.modal-content -->
                </form>
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    @endsection
