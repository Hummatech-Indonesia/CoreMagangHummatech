@extends('admin.layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<div class="card">
    <div class="card-body">
        <div class="d-flex align-items g-2 ">
            <div class="col-sm-4">
                <div class="step-arrow-nav mb-4 pt-3 mx-3">
                    <ul class="nav nav-pills custom-nav nav-justified" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="steparrow-gen-info-tab" data-bs-toggle="pill"
                                data-bs-target="#steparrow-gen-info" type="button" role="tab"
                                aria-controls="steparrow-gen-info" aria-controls="steparrow-gen-info"
                                aria-selected="true" data-position="0">
                                Tempatkan Mentor
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="steparrow-description-info-tab" data-bs-toggle="pill"
                                data-bs-target="#steparrow-description-info" type="button" role="tab"
                                aria-controls="steparrow-description-info" aria-selected="false" data-position="1"
                                tabindex="-1">
                                Data Siswa
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-auto ms-auto d-flex">
                <div class="list-grid-nav hstack gap-1">
                    <div class="search-box">
                        <form action="/online-student/menotor-placement">
                            <input type="text" class="form-control" id="searchMemberList" name="name"
                                value="{{request()->name}}" placeholder="Cari Siswa...">
                            <i class="ri-search-line search-icon"></i>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="tab-content">
    <div id="steparrow-gen-info" class="tab-pane fade show active">
        <div class="card">
            <div class="card-body">
                <div class="row g-4 mb-3">
                    <div class="col-sm-auto">
                        <div class="d-flex">
                            <h5 class="mx-2 pt-2">Show</h5>
                            <select name="" class="form-select" id="expiry-month-input">
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
                                            <p class=" m-0 ms-2">{{ $student->name }}</p>
                                            <p class="m-0 ms-2 text-primary" style="font-size: 10px">
                                                {{ $student->school }}
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
                                        class="btn btn-sm bg-secondary-subtle text-secondary add-placement"
                                        data-id="{{ $student->id }}" data-division=" {{ $student->division_id }}"> <i
                                            class="ri-apps-2-line align-bottom me-2 text-secondary"></i> Tempatkan
                                        Mentor
                                    </button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8">
                                    <div class="d-flex justify-content-center mt-3">
                                        <img src="{{ asset('no data.png') }}" width=" 200px" alt="">
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
                {{$students->links()}}
            </div>
        </div>
    </div>

    <div id="steparrow-description-info" class="tab-pane fade">
        <div class="card">
            <div class="card-body">
                <div class="row g-4 mb-3">
                    <div class="col-sm-auto">
                        <div class="d-flex">
                            <h5 class="mx-2 pt-2">Show</h5>
                            <select name="" class="form-select" id="expiry-month-input">
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
                            @forelse ($studentedit as $student)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img class="rounded-circle avatar-sm"
                                            src="{{ file_exists(public_path('storage/' . $student->avatar)) ? asset('storage/' . $student->avatar) : asset('user.webp') }}"
                                            alt="">
                                        <div class="">
                                            <p class=" m-0 ms-2">{{ $student->name }}</p>
                                            <p class="m-0 ms-2 text-primary" style="font-size: 10px">
                                                {{ $student->school }}
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
                                        class="btn btn-sm bg-warning-subtle text-warning edit-placement"
                                        data-id="{{ $student->id }}"
                                        data-division=" {{ $student->mentorstudent->where('student_id', $student->id)->pluck('mentor_id')->first() }}">
                                        <i class="ri-apps-2-line align-bottom me-2 text-warning"></i> Ganti
                                        Mentor
                                    </button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8">
                                    <div class="d-flex justify-content-center mt-3">
                                        <img src="{{ asset('no data.png') }}" width=" 200px" alt="">
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
                {{$studentedit->links()}}
            </div>
        </div>
    </div>
</div>

<div id="myModal" class="modal modal2 fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
    style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Pilih Mentor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>
            <form action="" id="form-placement" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="example-date-input" class="form-label">Pilih Mentor</label>
                        <select class="form-select select2" name="mentor_id" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            @foreach ($mentors as $mentor)
                            <option value="{{ $mentor->mentor->id }}">{{ $mentor->mentor->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class=" modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary ">Simpan</button>
                    </div>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="modal-edit" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
    style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Ganti Mentor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>
            <form action="" id="form-placement-edit" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="example-date-input" class="form-label">Pilih Mentor</label>
                        <select class="form-select " id="edit-mentor" name="mentor_id"
                            aria-label="Default select example">
                            @foreach ($mentors as $mentor)
                            <option value="{{ $mentor->mentor->id }}">{{ $mentor->mentor->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class=" modal-footer">
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
$('.select2').select2({
    dropdownParent: $('#myModal')
});
$('.add-placement').on('click', function() {
    var id = $(this).data('id');
    $('#form-placement').attr('action', '/online-student/menotor-placement/post/' + id);
    $('#myModal').modal('show');
});


$('.edit-placement').on('click', function() {
    var id = $(this).data('id');
    var mentor_id = $(this).data('division');

    $('#edit-mentor').val(mentor_id).trigger('change');


    $('#form-placement-edit').attr('action', '/online-student/menotor-placement/edit/' + id);
    $('#modal-edit').modal('show');
});
</script>
@endsection