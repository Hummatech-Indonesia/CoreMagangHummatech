@extends('mentor.layouts.app')
@section('content')

<div class="row">
    <div class="d-flex justify-content-between">
        <h5>Detail Tantangan</h5>
        <a href="{{ url('mentor/assessment') }}" type="button" class="btn btn-light-primary text-primary">Kembali</a>
    </div>
    <div>
        <span class="mb-1 badge font-medium bg-light-success text-success">{{$challenge->level}}</span>
        <h2 class="mt-3">{{$challenge->title}}</h2>
    </div>
</div>

<div class="card card-body mt-3">
    <div class="row">
        <div class="col-md-4 col-xl-3">
            <h5>Jawaban yang Di Kumpulkan</h5>
        </div>
        <div class="col-md-8 col-xl-9 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">

            <form class="position-relative">
                <input type="text" class="form-control product-search ps-5" id="input-search" placeholder="Cari Siswa...">
                <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
            </form>

            <div class="col-md-4 col-lg-2 col-xl-2 mx-2">
                <select class="form-select">
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
                            <button type="button" class="justify-content-center w-100 btn mb-1 btn-rounded btn-outline-primary d-flex align-items-center">
                                <i class="ti ti-folder-down fs-4 me-2"></i>
                                Download
                            </button>
                        </td>
                        <form action="{{ route('challenge.assessment', ['studentChallenge' => $studentChallenge]) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <td class="d-flex justify-content-between">
                                <div class="form-group col-md-3">
                                    <input type="number" name="score" class="form-control" value="{{ $studentChallenge->score ?? '' }}" @if(isset($studentChallenge->score) && $studentChallenge->score !== 0) readonly @endif>
                                </div>
                                @if(!isset($studentChallenge->score) || $studentChallenge->score === 0)
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                @endif
                            </td>
                        </form>
                    </tr>


                    @empty

                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const downloadButtons = document.querySelectorAll('.download-btn');

        downloadButtons.forEach(button => {
            button.addEventListener('click', function() {
                const studentTaskId = this.getAttribute('data-id');
                const url = `/download-file/${studentTaskId}`;
                window.location.href = url;
            });
        });
    });
</script>
@endsection
