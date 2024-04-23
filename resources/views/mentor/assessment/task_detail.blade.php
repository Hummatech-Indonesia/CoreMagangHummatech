@extends('mentor.layouts.app')
@section('content')

<div class="row">
    <div class="d-flex justify-content-between">
        <h5>Detail Tugas</h5>
        <a href="{{ url('mentor/assessment') }}" type="button" class="btn btn-light-primary text-primary">Kembali</a>
    </div>
    <div>
        <span class="mb-1 badge font-medium bg-light-success text-success">{{$task->level}}</span>
        <h2 class="mt-3">{{$task->title}}</h2>
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
                    @forelse ($studentTasks as $studentTask)

                    <tr class="search-items">
                        <td>{{$loop->iteration}}</td>
                        <td class="d-flex">
                            <div class="n-chk align-self-center text-center">
                                @if(Storage::disk('public')->exists($studentTask->student->avatar))
                                    <img src="{{ asset('storage/' . $studentTask->student->avatar) }}" alt="avatar" class="rounded-circle" width="35">
                                @else
                                    <img src="{{ asset('user.webp') }}" alt="default avatar" class="rounded-circle" width="35">
                                @endif
                            </div>


                            <div class="ms-3">
                                <div class="user-meta-info">
                                    <h6 class="user-name mb-0 mt-2" data-name="Emma Adams">{{$studentTask->student->name}}</h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="usr-email-addr">
                                {{ \Carbon\Carbon::parse($studentTask->updated_at)->locale('id_ID')->isoFormat('dddd, D MMMM YYYY') }}
                            </span>
                        </td>
                        <td>
                            <span class="mb-1 badge font-medium bg-light-success text-success">{{$studentTask->student->internship_type}}</span>
                        </td>
                        <td>
                            <button type="button" class="justify-content-center btn mb-1 btn-rounded btn-outline-primary d-flex align-items-center download-btn" data-id="{{$studentTask->id}}">
                                <div class="mx-1">
                                    <i class="ti ti-folder-down fs-4 me-2"></i>
                                    Download
                                </div>
                            </button>
                        </td>
                        <form action="{{ route('task-offline.assessment', ['studentTask' => $studentTask]) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <td class="d-flex justify-content-between">
                                <div class="form-group col-md-3">
                                    <input type="text" name="score" class="form-control" value="{{ $studentTask->score ?? '' }}" @if(isset($studentTask->score) && $studentTask->score !== 0) readonly @endif>
                                </div>
                                @if(!isset($studentTask->score) || $studentTask->score === 0)
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                @endif
                            </td>
                        </form>
                    </tr>

                    @empty

                    <div class="d-flex justify-content-center mb-2 mt-5">
                        <img src="{{ asset('no data.png') }}" alt="" width="300px" srcset="">
                    </div>
                        <p class="fs-5 text-dark text-center">
                            Data Masih Kosong
                        </p>

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
