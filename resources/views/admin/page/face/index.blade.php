@extends('admin.layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row g-2 align-items-center">
                <div class="col-sm-8">
                    <h5 class="mx-3 mb-0">Data Wajah</h5>
                </div>
                <div class="col-sm-4 mb-3 text-end">
                    <form action="/faces" method="GET" class="d-flex align-items-center justify-content-end">
                        <div class="input-group me-2">
                            <input type="text" name="name" class="form-control" placeholder="Cari..."
                                aria-label="Cari data wajah" value="{{ request()->name }}">
                        </div>

                        <select name="school" class="form-select me-2" id="schoolFilter">
                            <option value="">Semua Sekolah</option>
                            @forelse ($schoolOption as $school)
                                <option value="{{ $school }}" {{ request()->school == $school ? 'selected' : '' }}>
                                    {{ $school }}
                                </option>
                            @empty
                                <option value="">Belum ada data</option>
                            @endforelse
                        </select>

                        <button type="submit" class="btn btn-primary">Cari</button>
                    </form>
                </div>

            </div>
        </div>
    </div>



    <div class="row">
        @foreach ($students as $student)
            @php
                $imageFiles = ['folder.png', 'folder-2.png', 'folder-3.png', 'folder-4.png'];
                $randomImage = $imageFiles[array_rand($imageFiles)];
            @endphp
            <div class="col-12 col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-header justify-content-header gap-4">
                            <img src="{{ asset($randomImage) }}" alt="">
                            <div class="">
                                <div class="col-12 col-xl-9">
                                    <p class="text-dark fs-5 mb-0" style="font-weight:600">
                                        {{ $student->name }}
                                    </p>
                                </div>
                                <p>
                                    {{ $student->school }}
                                </p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <a href="/faces/detail/{{ $student->id }}" class="btn btn-primary w-100">Lihat Wajah</a>
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
