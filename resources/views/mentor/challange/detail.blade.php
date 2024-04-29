@extends('mentor.layouts.app')
@section('content')

<div class="row">
    <div class="d-flex justify-content-between mb-3">
        <h5>Detail Tantangan</h5>
        <a href="{{ url('mentor/assessment') }}" type="button" class="btn btn-light-primary text-primary">Kembali</a>
    </div>
    <div class="card bg-light-primary m-0 p-0">
        <div class="card-body">
            <div class="d-flex  align-items-center">
                <h3 class="mt-2">{{$challenge->title}}</h3>
                <span class="badge ms-3 font-medium bg-white text-{{$challenge->level->color()}}">{{$challenge->level->label()}}</span>
            </div>
            <p>{{$challenge->description}}</p>
        </div>
    </div>

</div>

<div class="card card-body mt-3">
    <div class="row">
        <div class="col-md-4 col-xl-3">
            <h5>Jawaban yang Di Kumpulkan</h5>
        </div>
        <div class="col-md-8 col-xl-12 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">

            <form class="position-relative">
                <input type="text" class="form-control product-search ps-5" id="input-search" placeholder="Cari Siswa...">
                <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
            </form>

            <div class="col-md-4 col-lg-2 col-xl-2 mx-2">
                <select class="form-select select2">
                    <option selected>Semua</option>
                    <option value="1">Option 1</option>
                    <option value="2">Option 2</option>
                    <option value="3">Option 3</option>
                </select>
            </div>

        </div>
    </div>
</div>

<div class="row">
    <div class="card card-body">
        <div class="table-responsive">
            <table class="table search-table align-middle text-nowrap">
                <thead class="header-item">
                    <tr>
                        <th>No</th>
                        <th>Siswa</th>
                        <th>Tanggal Di Kumpulkan</th>
                        <th>Status Magang</th>
                        <th>File</th>
                        <th>Nilai</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($studentChallenges as $studentChallenge)

                    <tr class="search-items">
                        <td>{{$loop->iteration}}</td>
                        <td class="d-flex align-items-center">
                            <div class="n-chk align-self-center text-center me-3">
                                @if(Storage::disk('public')->exists($studentChallenge->student->avatar))
                                    <img src="{{ asset('storage/' . $studentChallenge->student->avatar) }}" alt="avatar" class="rounded-circle" width="35">
                                @else
                                    <img src="{{ asset('user.webp') }}" alt="default avatar" class="rounded-circle" width="35">
                                @endif
                            </div>

                            <div class="user-meta-info">
                                <h6 class="user-name  mt-2" data-name="Emma Adams">{{$studentChallenge->student->name}}</h6>
                            </div>
                        </td>

                        <td>
                            <span class="usr-email-addr">
                                {{ \Carbon\Carbon::parse($studentChallenge->updated_at)->locale('id_ID')->isoFormat('dddd, D MMMM YYYY') }}
                            </span>
                        </td>
                        <td>
                            <span class="mb-1 badge font-medium bg-light-success text-success">{{$studentChallenge->student->internship_type}}</span>
                        </td>
                        <td>
                            <a href="#" type="button" class="justify-content-center btn mb-1 btn-rounded btn-outline-primary d-flex align-items-center btn-download" data-id="{{$studentChallenge->id}}"
                                data-task="{{ file_exists(public_path('storage/' . $studentChallenge->file)) ? asset('storage/' . $studentChallenge->file) : asset('no data.png') }}"
                                data-student-name="{{$studentChallenge->student->name}}">
                                <div class="mx-1">
                                    <i class="ti ti-folder-down fs-4 me-2"></i>
                                    Download
                                </div>
                            </a>
                        </td>

                            <td class="d-flex justify-content-between">
                                <div class="form-group col-md-3">
                                    <input type="number" name="score" class="form-control" value="{{ $studentChallenge->score ?? '' }}" @if(isset($studentChallenge->score) && $studentChallenge->score !== 0) readonly @endif>
                                </div>
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
        </div>
    </div>
</div>

@endsection

@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<a href="#" class="download-file" style="display: none;"></a>
<script>
    $('.btn-download').click(function(e) {
        e.preventDefault();
        let file = $(this).data('task');
        let fileName = $(this).data('student-name') + '.zip';
        $('.download-file').attr('href', file);
        $('.download-file').attr('download', fileName);
        $('.download-file')[0].click();
    });
</script>
<script>
    $(document).ready(function() {
        $('.form-select select2').select2();
    });
</script>
@endsection
