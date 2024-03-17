@extends('admin.layouts.app')
@section('content')

<div class="card">
    <div class="card-body">
        <div class="d-flex align-items g-2 ">
            <div class="col-sm-4">
                <h3 class="mx-1">Pengumuman</h3>
            </div>
            <div class="col-sm-auto ms-auto d-flex">
                <div class="search-box mx-3">
                    <input type="text" class="form-control" id="searchMemberList" placeholder="Cari Siswa...">
                    <i class="ri-search-line search-icon"></i>
                </div>
                <div class="list-grid-nav hstack gap-1">
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#add">
                        Tambah Data
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
                <div class="row">
                    <div class="col-sm-auto col-md-auto col-lg-auto">
                        <div class="dataTables_length" id="example_length">
                            <label class="d-flex align-items-center">Show 
                            <select name="example_length" aria-controls="example" class="form-select form-select-sm mx-2">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select> 
                            entries</label>
                        </div>
                    </div>
                </div>
                <div class="table-responsive table-card p-3 mt-1">
                    <table class="table align-middle table-nowrap mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>No.</th>
                                <th class="text-center">Tanggal Dibuat</th>
                                <th class="text-center">Tanggal Mulai</th>
                                <th class="text-center">Tanggal Selesai</th>
                                <th>Pesan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="table-light">01</td>
                                <td class="text-center">15 Maret 2027</td>
                                <td class="text-center">15 Maret 2027</td>
                                <td class="text-center">15 Maret 2027</td>
                                <td>
                                    Lorem ipsum dolor sit amet consectetur. Interdum..
                                </td>
                                <td><span class="badge bg-success-subtle text-success py-2 px-4 fs-6">Penting</span></td>
                                <td>
                                    <div class="dropdown d-inline-block">
                                        <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ri-more-fill align-middle"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li>
                                                <button type="button" class="dropdown-item btn-show" data-id="1"
                                                data-create="15-03-2024"
                                                data-start="15-03-2024"
                                                data-end="18-03-2024"
                                                data-description="Lorem ipsum dolor sit amet consectetur. Interdum.."
                                                data-status="Penting">
                                                    <i class="ri-eye-fill align-bottom me-2 text-muted"></i> Lihat Detail
                                                </button>
                                            </li>
                                            <li>
                                                <button type="button" class="dropdown-item edit-item-btn btn-edit" data-id="1"
                                                data-start="15-03-2024"
                                                data-end="18-03-2024"
                                                data-description="Lorem ipsum dolor sit amet consectetur. Interdum.."
                                                data-status="Penting">
                                                    <i class="ri-pencil-fill align-bottom me-2 text-warning"></i> Edit
                                                </button>
                                            </li>
                                            <li>
                                                <button type="button" class="dropdown-item btn-delete" data-id="1">
                                                    <i class="ri-delete-bin-fill align-bottom me-2 text-danger"></i> Hapus
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- modal add announcement start --}}
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="varyingcontentModalLabel">Tambah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="start" class="col-form-label">Tanggal Mulai</label>
                        <input type="date" class="form-control @error('start') is-invalid @enderror" id="start" name="start">
                        @error('start')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="end" class="col-form-label">Tanggal Selesai</label>
                        <input type="date" class="form-control @error('end') is-invalid @enderror" id="end" name="end">
                        @error('end')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="col-form-label">Pesan</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description"  rows="4" placeholder="Pesan"></textarea>
                        @error('description')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="description" class="col-form-label">Status</label>
                        <div class=" mb-2">
                            <input class="form-check-input" type="radio" name="status" id="Penting" value="Penting">
                            <label class="form-check-label me-3" for="Penting">
                                Penting
                            </label>
                            <input class="form-check-input" type="radio" name="status" id="SangatPenting" value="Sangat Penting">
                            <label class="form-check-label me-3" for="SangatPenting">
                                Sangat Penting
                            </label>
                            <input class="form-check-input" type="radio" name="status" id="Prioritas" value="Prioritas">
                            <label class="form-check-label" for="Prioritas">
                                Prioritas
                            </label>
                        </div>
                        @error('status')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Buat</button>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- modal add announcement end --}}

{{-- modal edit announcement start --}}
<div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="varyingcontentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="varyingcontentModalLabel">Edit Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" id="form-update">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-4">
                        <label for="start" class="col-form-label">Tanggal Mulai</label>
                        <input type="date" class="form-control @error('start') is-invalid @enderror" id="start-edit" name="start">
                        @error('start')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="end" class="col-form-label">Tanggal Selesai</label>
                        <input type="date" class="form-control @error('end') is-invalid @enderror" id="end-edit" name="end">
                        @error('end')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="description" class="col-form-label">Pesan</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description-edit"  rows="4"></textarea>
                        @error('description')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="description" class="col-form-label">Status</label>
                        <div class=" mb-2">
                            <input class="form-check-input" type="radio" name="status" id="Penting-edit" value="Penting">
                            <label class="form-check-label me-3" for="Penting">
                                Penting
                            </label>
                            <input class="form-check-input" type="radio" name="status" id="SangatPenting-edit" value="Sangat Penting">
                            <label class="form-check-label me-3" for="SangatPenting">
                                Sangat Penting
                            </label>
                            <input class="form-check-input" type="radio" name="status" id="Prioritas-edit" value="Prioritas">
                            <label class="form-check-label" for="Prioritas">
                                Prioritas
                            </label>
                        </div>
                        @error('status')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- modal edit announcement end --}}

{{-- modal detail announcement start --}}
<div class="modal fade modal-bookmark" id="detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content px-2">
            <div class="modal-header">
                <h5 class="modal-title me-2" id="exampleModalLabel">Detail Pengumuman</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="product-details col-lg-6 text-start" id="detail-content">
            </div>
            <div class="modal-footer">
                <div class="d-flex justify-content-end">
                    <button class="purchase-btn btn btn-hover-effect btn-primary f-w-500" type="button" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- modal detail announcement end --}}

@include('admin.components.delete-modal-component')
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('.btn-edit').click(function () {
            var id = $(this).data('id'); 
            var start = $(this).data('start'); 
            var end = $(this).data('end'); 
            var description = $(this).data('description'); 
            var status = $(this).data('status'); 
            $('#form-update').attr('action', '/announcement/' + id);
            $('#start-edit').val(start);
            $('#end-edit').val(end);
            $('#description-edit').val(description);
            // $('#status-edit').val(status);
            $('#modal-edit').modal('show');
        });

        $('.btn-delete').click(function () {
            var id = $(this).data('id'); 
            $('#form-delete').attr('action', '/announcement/' + id);
            $('#modal-delete').modal('show');
        });

        $('.btn-show').click(function() {
            var detail = $('#detail-content');
            detail.empty();
            var id = $(this).data('id');
            var create = $(this).data('create'); 
            var start = $(this).data('start'); 
            var end = $(this).data('end'); 
            var description = $(this).data('description'); 
            var status = $(this).data('status');
            detail.append('<div class="mb-2">');
            detail.append('<h6 class="f-w-600">Tanggal Pembuatan</h6>');
            detail.append('<p class="text-muted">' + create + '</p>')
            detail.append('</div>');
            detail.append('<div class="mb-2">');
            detail.append('<h6 class="f-w-600">Tanggal Mulai</h6>');
            detail.append('<p class="text-muted">' + start + '</p>')
            detail.append('</div>');
            detail.append('<div class="mb-2">');
            detail.append('<h6 class="f-w-600">Tanggal Selesai</h6>');
            detail.append('<p class="text-muted">' + end + '</p>')
            detail.append('</div>');
            detail.append('<div class="mb-2">');
            detail.append('<h6 class="f-w-600">Pesan:</h6>');
            detail.append('<p>' + description + '</p>')
            detail.append('</div>');
            detail.append('<div class="mb-2">');
            detail.append('<h6 class="f-w-600">Status:</h6>');
            detail.append('<p>' + status + '</p>')
            detail.append('</div>');
            $('#detail').modal('show');
        });
    </script>
@endsection