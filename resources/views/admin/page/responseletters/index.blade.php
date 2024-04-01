@extends('admin.layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row g-2">
                <div class="col-sm-4 align-items-center d-flex">
                    <h5 class="mx-5 align-items-center">Data Surat</h5>
                </div>
                <div class="col-sm-auto ms-auto d-flex">
                    <div class="search-box mx-3">
                        <input type="text" class="form-control" id="searchMemberList" placeholder="Cari Siswa...">
                        <i class="ri-search-line search-icon"></i>
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
                                        <th scope="col" style="width: 150px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($responsesletters as $responsesletter)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $responsesletter->student->name }}</td>
                                            <td>
                                                {{ \carbon\Carbon::parse($responsesletter->created_at)->locale('id')->isoFormat('dddd, D MMMM YYYY') }}
                                            </td>
                                            <td>{{ $responsesletter->letter_number }}</td>
                                            <td>
                                                <a href="show/student/{{ $responsesletter->id }}"
                                                    class="btn btn-soft-primary edit-item-btn"><i
                                                        class="ri-eye-fill align-bottom me-1"></i></a>
                                                <a href="{{ asset('storage/response_letter/' . $responsesletter->letter_file) }}"
                                                    class="btn btn-soft-warning edit-item-btn"
                                                    onclick="printPDF('{{ asset('storage/response_letter/' . $responsesletter->letter_file) }}'); return false;"><i
                                                        class="ri-printer-line align-bottom me-1"></i></a>
                                                <script>
                                                    function printPDF(pdfUrl) {
                                                        var printWindow = window.open(pdfUrl, '_blank');
                                                        printWindow.addEventListener('load', function() {});
                                                    }
                                                </script>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8">
                                                <div class="d-flex justify-content-center mt-3">
                                                    <img src="{{ asset('no data.png') }}" width="200px" alt="">
                                                </div>
                                                <h4 class="text-center mt-2 mb-4">
                                                    Data Masih kosong
                                                </h4>
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



    @include('admin.components.delete-modal-component')
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
