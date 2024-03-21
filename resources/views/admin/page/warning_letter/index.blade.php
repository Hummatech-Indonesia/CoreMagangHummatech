@extends('admin.layouts.app')
@section('style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row g-2">
                <div class="col-sm-4 align-items-center d-flex">
                    <h5 class="mx-5 align-items-center">Data Sp</h5>
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
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex justify-content-between">
                    <div class="d-flex gap-2">
                        <p class="m-0">Show</p>
                        <select name="" id="">
                            <option value="10">10</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                        <p class="m-0">entries</p>
                    </div>
                </div><!-- end card header -->

                <div class="card-body ">
                    <div class="live-preview ">
                        <div class="table-responsive table-card">
                            <table class="table align-middle table-nowrap table-striped-columns mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">No Surat</th>
                                        <th scope="col">Alasan</th>
                                        <th scope="col">Keterangan</th>
                                        <th scope="col" style="width: 150px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($warningLetters as $warningLetter)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $warningLetter->student->name }}</td>
                                            <td style="font-family: Arial, sans-serif; font-size: 14px; color: #333;">
                                                {{ \carbon\Carbon::parse($warningLetter->start_date)->locale('id')->isoFormat('dddd, D MMMM YYYY') }}
                                            </td>
                                            <td>{{ $warningLetter->reference_number }}</td>
                                            <td>{{ Str::limit($warningLetter->reason, 50) }}</td>
                                            <td>SP {{ $warningLetter->status }}</td>
                                            <td>
                                                <a class="btn btn-light edit-item-btn"
                                                    href="/warning-letter/show/{{ $warningLetter->id }}"><i
                                                        class="  ri-eye-line"></i></a>
                                                <a class="btn btn-soft-warning edit-item-btn"><i
                                                        class=" ri-printer-line" onclick="printPDF('{{ asset('storage/warning_letter/' .$warningLetter->file) }}'); return false;"></i></a>
                                                <button data-id="{{ $warningLetter->id }}"
                                                    class="btn btn-delete btn-soft-danger edit-item-btn"><i
                                                        class="bx bx-trash"></i></button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7">
                                                <div class="d-flex justify-content-center mb-2 mt-5">
                                                    <img src="{{ asset('no data.png') }}" alt="" width="300px"
                                                        srcset="">
                                                </div>
                                                <h4 class="text-dark text-center">Tidak ada data</h4>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!-- end card-body -->
            </div>
        </div>
    </div>

    <!-- Edit LImit -->
    <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
        style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                </div>
                <form action="warning-letter/store" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <label for="">Nama Siswa</label>
                                <select name="student_id" class="form-select select2" id="">
                                    <option value="">Pilih Siswa</option>
                                    @foreach ($students as $student)
                                        <option value="{{ $student->id }}">{{ $student->name }}</option>
                                    @endforeach
                                </select>
                                @error('student_id')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            <div class="col-12 mt-3">
                                <label for="" class="mt-2">Status Sp</label><br>
                                <div class="d-flex justify-content-header gap-2">
                                    <input name="status" type="radio" class="" value="1"> SP 1
                                    <input name="status" type="radio" class="" value="2"> SP 2
                                    <input name="status" type="radio" class="" value="3"> SP 3
                                </div>
                                @error('status')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="" class="mt-2">Tanggal Pembuatan</label>
                            <input name="date" type="date" class="form-control">
                            @error('date')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="" class="mt-2">Nomor Surat</label>
                            <input name="reference_number" type="number" class="form-control">
                            @error('reference_number')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="" class="mt-2">Alasan</label>
                            <textarea name="reason" type="text" class="form-control"></textarea>
                            @error('reason')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary ">Simpan</button>
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>

        function printPDF(pdfUrl) {
            var printWindow = window.open(pdfUrl, '_blank');
            printWindow.addEventListener('load', function() {});
        }
        $('.select2').select2({
            dropdownParent: $('#myModal')
        });

        $('.btn-delete').on('click', function() {
            var id = $(this).data('id');
            $('#form-delete').attr('action', '/warning-letter/delete/' + id);
            $('#modal-delete').modal('show');
        });
    </script>
@endsection
