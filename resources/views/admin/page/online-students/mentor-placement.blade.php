@extends('admin.layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items g-2 ">
                <div class="col-sm-4">
                    <h3 class="mx-1">Pemilihan Mentor</h3>
                </div>
                <div class="col-sm-auto ms-auto d-flex">
                    <div class="list-grid-nav hstack gap-1">
                        <div class="search-box">
                            <input type="text" class="form-control" id="searchMemberList" placeholder="Cari Siswa...">
                            <i class="ri-search-line search-icon"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row g-4 mb-3">
                <div class="col-sm-auto">
                    <div class="d-flex">
                        <h5 class="mx-2 pt-2">Show</h5>
                        <select name=""class="form-select" id="expiry-month-input">
                            <option value="1">10</option>
                        </select>
                        <h5 class="mx-2 pt-2">entries</h5>
                    </div>
                </div>
            </div>
            <table class="align-middle table table-nowrap table-bordered table-striped" style="width:100%">
                <table class="table align-middle table-nowrap" id="customerTable">
                    <thead class="table-light">
                        <tr>
                            <th scope="col" style="width: 1rem">No.</th>
                            <th scope="col">Siswa</th>
                            <th scope="col">Tanggal Mulai</th>
                            <th scope="col">Tanggal Akhir</th>
                            <th scope="col">Divisi</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="list" id="searchResult">
                        @forelse ($students as $student)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img class="rounded-circle avatar-sm"
                                            src="{{ file_exists(public_path('storage/' . $student->avatar)) ? asset('storage/' . $student->avatar) : asset('user.webp') }}"
                                            alt="">
                                        <div class="">
                                            <p class="m-0 ms-2">{{ $student->name }}</p>
                                            <p class="m-0 ms-2 text-primary" style="font-size: 10px">{{ $student->school }}
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ \carbon\Carbon::parse($student->start_date)->locale('id')->isoFormat('dddd, D MMMM YYYY') }}
                                </td>
                                <td>{{ \carbon\Carbon::parse($student->finish_date)->locale('id')->isoFormat('dddd, D MMMM YYYY') }}
                                </td>
                                <td>
                                    <span class="btn bg-secondary-subtle text-secondary">
                                        {{ $student->division->name }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <button type="button"
                                        class="btn btn-sm bg-secondary-subtle text-secondary edit-placement" data-id="{{ $student->id }}" data-division="{{ $student->division_id }}">
                                        <i class="ri-apps-2-line align-bottom me-2 text-secondary"></i> Tempatkan Divisi
                                    </button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8">
                                    <div class="d-flex justify-content-center mt-3">
                                        <img src="{{ asset('no data.png') }}" width="200px"
                                            alt="">
                                    </div>
                                    <h4 class="text-center mt-2 mb-4">
                                        Data Masih kosong
                                    </h4>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </table>
        </div>
    </div>

    <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
        style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Pilih Mentor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                </div>
                <form action="" id="form-placement" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="example-date-input" class="form-label">Pilih Mentor</label>
                            <select class="form-select" name="mentor_id" aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                @foreach ($mentors as $mentor)
                                    <option value="{{ $mentor->id }}">{{ $mentor->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary ">Simpan</button>
                        </div>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('.edit-placement').on('click', function() {
            var id = $(this).data('id');
            var division = $(this).data('division');
            $('#form-placement').attr('action', '/online-student/menotor-placement/update/' + id);
            $('#myModal').modal('show');
        });
    </script>
@endsection
