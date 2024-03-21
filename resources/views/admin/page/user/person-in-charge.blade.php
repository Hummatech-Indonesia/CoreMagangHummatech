@extends('admin.layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row g-2 align-items-center">
                <div class="col-lg-4 col-sm-4">
                    <h3 class="mx-3">Data Penanggung Jawab</h3>
                </div>
                <div class="col-lg-8 d-flex gap-2 justify-content-end">
                    <div class="list-grid-nav hstack gap-1 mx-1 w-25">
                        <select name="school" class="form-select bg-light border-0" id="">
                            <option selected>Semua</option>
                        </select>
                    </div>
                    <form class="app-search d-none d-md-block w-25">
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="Cari..." autocomplete="off" id="search-options" value="">
                            <span class="mdi mdi-magnify search-widget-icon"></span>
                            <span class="mdi mdi-close-circle search-widget-icon search-widget-icon-close d-none" id="search-close-options"></span>
                        </div>
                    </form>
                    <div class="list-grid-nav hstack gap-1">
                        <button class="btn btn-success shadow-none addMembers-modal" data-bs-toggle="modal"
                            data-bs-target="#add">
                            Tambah Data
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        @foreach (range(1, 3) as $alumni)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body d-flex justify-content-between">
                        <div class="d-flex gap-3 align-items-center">
                            <div class="">
                                <img src="{{ asset('assets/images/users/avatar-6.jpg') }}" class="avatar-xl rounded"
                                    alt="">
                            </div>
                            <div class="">
                                <a href="{{ url('/person-in-charge/detail') }}" class="text-dark"><h5 class="m-0">Tonya Noble</h5></a>
                                <p class="m-1 text-muted">SMKN 1 TAMBAKBOYO</p>
                                <div class="mt-1 d-flex  justify-content-start gap-1">
                                    <div class="w-50 m-0">
                                        <span class="badge px-4 bg-warning" style="font-size: 12px">Penanggung Jawab</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="dropdown card-header-dropdown">
                                <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <span class="text-muted fs-16"><i class="mdi mdi-dots-vertical align-middle"></i></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" style="">
                                    <button class="dropown-item bg-transparent border-0 w-100 text-start ps-3 btn-delete py-2">Hapus</button>
                                    <button class="dropown-item bg-transparent border-0 w-100 text-start ps-3 btn-reset py-2">Reset password</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center px-3">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-end">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
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

    <div id="add" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Tambah Penanggung Jawab</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                </div>
                <form action="" method="POST" id="form-change" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body p-4">
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label">Nama Penanggung Jawab</label>
                                <input type="text" name="name" class="form-control" placeholder="Masukkan Nama Penanggung Jawab">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Masukkan Email Penanggung Jawab">
                            </div>
                            <div class="mb-3">
                                <label for="choices-multiple-remove-button" class="form-label">Siswa</label>
                                <select class="form-control" placeholder="Pilih siswa" id="choices-multiple-remove-button" data-choices data-choices-removeItem name="choices-multiple-remove-button" multiple>
                                    <option value="Kader">Kader</option>
                                    <option value="Niam">Niam</option>
                                    <option value="Farah">Farah</option>
                                    <option value="Nesa">Nesa</option>
                                    <option value="Rendi">Rendi</option>
                                    <option value="Adi">Adi</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-soft-danger shadow-none" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-secondary shadow-none">Simpan</button>
                        </div>

                    </div><!-- /.modal-content -->
                </form>
            </div><!-- /.modal-dialog -->
        </div>
    </div>

    @include('admin.components.delete-modal-component')
    @include('admin.components.reset-modal-component')

@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function() {
            $("#message").modal('show');
        });
    </script>

    <script>
        $('.btn-delete').click(function() {
            let id = $(this).data('id');
            $('#form-delete').attr('action', '#' + id);
            $('#modal-delete').modal('show');
        });

        $('.btn-reset').click(function() {
            let id = $(this).data('id');
            $('#form-reset').attr('action', '#' + id);
            $('#modal-reset').modal('show');
        });
    </script>
@endsection
