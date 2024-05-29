@extends('admin.layouts.app')
@section('content')
<div class="card">
    <div class="card-body d-flex justify-content-between">
        <ul class="nav nav-pills nav-custom nav-custom-light" style="width: fit-content" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#project" role="tab">
                    Project
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#note" role="tab">
                    Catatan
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#board" role="tab">
                    Board
                </a>
            </li>
        </ul>
        <a href="{{ url('/offline-students/team') }}" class="btn bg-primary-subtle waves-effect waves-light shadow-none">Kembali</a>
    </div>
</div>

<div class="tab-content text-muted">
    <div class="tab-pane active" id="project" role="tabpanel">
        <div class="card col-12">
            <div class="card-body row">
                <div class="info d-flex align-items-center col-xl-12">
                    @if ($project)
                        @if ($team->image != null)
                            <img class="rounded-circle avatar-xl shadow ms-3" alt="200x200" src="{{ (Storage::disk('public')->exists($team->image)) ? asset('storage/'. $team->image) : asset('team-default.png') }}">
                        @endif
                        <div class="description px-4">
                            <h4>{{ $project->title }}</h4>
                            <p class="text-muted mb-3">
                                {{ $project->description }}
                            </p>
                            <p class="text-muted mb-1">
                                Link Repository: 
                                <a href="{{ $team->link }}" target="_blank" class="text-secondary">{{ $team->link }}</a>
                            </p>
                            <p class="text-muted mb-1">
                                Tanggal Mulai: {{ \Carbon\Carbon::parse($project->start_date)->locale('id')->isoFormat('dddd, D MMMM Y') }}
                            </p>
                            <p class="text-muted mb-1">
                                Tenggat: {{ \Carbon\Carbon::parse($project->end_date)->locale('id')->isoFormat('dddd, D MMMM Y') }}
                            </p>
                        </div>
                    @else
                        <div class="mb-2 mt-5 text-center" style="margin: 0 auto;">
                            <img src="{{ asset('no-data/2.png') }}" alt="" width="200px" srcset="">
                            <p class="fs-5 text-dark">
                                Tim ini belum memilliki projek
                            </p>
                        </div>
                    @endif
                </div>
                <div class="mx-1 mt-3">
                    <h5>Anggota Tim</h5>
                    <div class="row">
                        @if ($team->category_project_id != 1)
                            <div class="col-xl-3 card">
                                <div class="p-2 mb-0 d-flex">
                                    <img class="rounded-circle avatar-sm shadow me-3" alt="200x200" src="{{ (Storage::disk('public')->exists($team->student->avatar)) ? asset('storage/'. $team->student->avatar) : asset('user.webp') }}">
                                    <div class="d-block">
                                        <p class="m-0">{{ $team->student->name }}</p>
                                        <p class="badge bg-success-subtle text-success p-2 m-0">Ketua</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @foreach ($studentTeams as $studentTeam)
                            <div class="col-xl-3 card">
                                <div class="p-2 mb-0 d-flex">
                                    <img class="rounded-circle avatar-sm shadow me-3" alt="200x200" src="{{ (Storage::disk('public')->exists($studentTeam->student->avatar)) ? asset('storage/'. $studentTeam->student->avatar) : asset('user.webp') }}">
                                    <div class="d-block">
                                        <p class="m-0">{{ $studentTeam->student->name }}</p>
                                        <p class="badge bg-warning-subtle text-warning p-2 m-0">Anggota</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane" id="note" role="tabpanel">
        <div class="row gap-5 ms-3">
            <div class="col-xl-4 card">
                <div class="card-body my-2">
                    @if ($project)
                        <div class="project">
                            <h4>{{ $project->title }}</h4>
                            <p>{{ $project->description }}</p>
                        </div>
                        <div class="note">
                            <h4>List Catatan:</h4>
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                @forelse ($categoryBoards as $key => $categoryBoard)
                                    <a class="nav-link mb-2 {{ $key++ < 1 ? 'active' : '' }}" id="nav-{{ $key }}" data-bs-toggle="pill" href="#tab-{{ $key }}" role="tab" aria-controls="v-pills-home" aria-selected="true">{{ $categoryBoard->title }}</a>
                                @empty
                                    <div class="mb-2 text-center" style="margin: 0 auto;">
                                        <img src="{{ asset('no-data/2.png') }}" alt="" width="100px" srcset="">
                                        <p class="fs-6 text-dark">
                                            Tim ini belum memilliki catatan
                                        </p>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    @else
                        <div class="mb-2 mt-5 text-center" style="margin: 0 auto;">
                            <img src="{{ asset('no-data/2.png') }}" alt="" width="200px" srcset="">
                            <p class="fs-5 text-dark">
                                Tim ini belum memilliki projek
                            </p>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-xl-7 card">
                <div class="card-body my-2">
                    @if($project)
                        <div class="tab-content text-muted mt-4 mt-md-0" id="v-pills-tabContent">
                            @forelse ($categoryBoards as $key => $categoryBoard)
                                <div class="tab-pane fade show {{ $key++ < 1 ? 'active' : '' }}" id="tab-{{ $key }}" role="tabpanel" aria-labelledby="nav-{{ $key }}">
                                    <h4 class="mb-3">{{ $categoryBoard->title }}</h4>
                                    @forelse (App\Models\Board::where('category_board_id', $categoryBoard->id)->get() as $key => $board)
                                        <div class="my-1">
                                            <div class="d-flex ">
                                                <h6 class="no mt-1 me-2">{{ ++$key }}.</h6>
                                                <div class="content">
                                                    <h5 class="m-0">{{ $board->name }}</h5>
                                                    <p class="text-muted">{{ $board->description }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="mb-2 mt-5 text-center" style="margin: 0 auto;">
                                            <img src="{{ asset('no-data/2.png') }}" alt="" width="80px" srcset="">
                                            <p class="fs-6 text-dark">
                                                Catatan kosong
                                            </p>
                                        </div>
                                    @endforelse
                                </div>
                            @empty
                                <div class="mb-2 mt-5 text-center" style="margin: 0 auto;">
                                    <img src="{{ asset('no-data/2.png') }}" alt="" width="150px" srcset="">
                                    <p class="fs-6 text-dark">
                                        Tim ini belum memilliki catatan
                                    </p>
                                </div>
                            @endforelse
                        </div>
                    @else
                        <div class="mb-2 mt-5 text-center" style="margin: 0 auto;">
                            <img src="{{ asset('no-data/2.png') }}" alt="" width="200px" srcset="">
                            <p class="fs-5 text-dark">
                                Tim ini belum memilliki projek
                            </p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane" id="board" role="tabpanel">
        <div class="d-flex gap-2">
            @forelse ($categoryBoards as $categoryBoard)
            <div class="col-3">
                <div class="d-flex align-items-center">
                    <h5 class="text-uppercase m-0">{{ $categoryBoard->title }}</h5>
                    <div class="badge bg-success mx-2">2</div>
                </div>
                <div class="mt-3 mx-0 px-0">
                    @forelse (App\Models\Board::where('category_board_id', $categoryBoard->id)->get() as $board)
                        <div class="card col-11">
                            <div class="card-body">
                                <h5 class="text-secondary">
                                    {{ $board->name }}
                                </h5>
                                <div class="d-flex gap-2">
                                    <div class="badge bg-warning-subtle text-warning">{{ $board->label }}</div>
                                    <div class="badge bg-danger-subtle text-danger">{{ $board->priority }}</div>
                                    <div class="badge bg-secondary">{{ $board->status }}</div>
                                </div>
                            </div>
                            <div class="card-footer d-flex gap-2 align-items-center" style="border-top-style: dotted;">
                                    <h6 class="text-secondary" style="font-size: 12px">{{ \Carbon\Carbon::parse($board->end_date)->locale('id')->isoFormat('dddd, D MMMM Y') }}</h6>
                                <div class="avatar-group">
                                    @if ($team->category_project_id != 1)
                                        @if(Storage::disk('public')->exists($studentTeam->student->avatar))
                                            <a href="javascript: void(0);" class="avatar-group-item shadow" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $studentTeam->student->name }}">
                                                <img src="{{ asset('storage/'. $studentTeam->student->avatar) }}" alt="" class="rounded-circle avatar-xxs">
                                            </a>
                                        @else
                                            @php
                                                $firstLetter = substr($studentTeam->student->name, 0, 1);
                                                $firstLetter = strtoupper($firstLetter);
                                                $backgroundColors = [
                                                    '#ff5722',
                                                    '#4caf50',
                                                    '#2196f3',
                                                ];
                                                $backgroundColor = $backgroundColors[ord($firstLetter) % count($backgroundColors)];
                                            @endphp
                                            <a href="javascript: void(0);" class="avatar-group-item shadow ms-n3" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $studentTeam->student->name }}">
                                                <div class="avatar-xs">
                                                    <div style="background-color: {{ $backgroundColor }};" class="avatar-title rounded-circle">
                                                        {{ $firstLetter }}
                                                    </div>
                                                </div>
                                            </a>
                                        @endif
                                    @endif
                                    @foreach ($studentTeams as $studentTeam)
                                        @if(Storage::disk('public')->exists($studentTeam->student->avatar))
                                            <a href="javascript: void(0);" class="avatar-group-item shadow" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $studentTeam->student->name }}">
                                                <img src="{{ asset('storage/'. $studentTeam->student->avatar) }}" alt="" class="rounded-circle avatar-xxs">
                                            </a>
                                        @else
                                            @php
                                                $firstLetter = substr($studentTeam->student->name, 0, 1);
                                                $firstLetter = strtoupper($firstLetter);
                                                $backgroundColors = [
                                                    '#ff5722',
                                                    '#4caf50',
                                                    '#2196f3',
                                                ];
                                                $backgroundColor = $backgroundColors[ord($firstLetter) % count($backgroundColors)];
                                            @endphp
                                            <a href="javascript: void(0);" class="avatar-group-item shadow ms-n3" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $studentTeam->student->name }}">
                                                <div class="avatar-xs">
                                                    <div style="background-color: {{ $backgroundColor }};" class="avatar-title rounded-circle">
                                                        {{ $firstLetter }}
                                                    </div>
                                                </div>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @empty
                    <div class="card col-11">
                        <div class="card-body">
                            <div class="my-1 text-center" style="margin: 0 auto;">
                                <img src="{{ asset('no-data/2.png') }}" alt="" width="80px" srcset="">
                                <p class="fs-6 text-dark">
                                    Board {{ $categoryBoard->title }} kosong
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforelse
                </div>
            </div>
            @empty
                <div class="mb-2 mt-5 text-center" style="margin: 0 auto;">
                    <img src="{{ asset('no-data/2.png') }}" alt="" width="200px" srcset="">
                    <p class="fs-5 text-dark">
                        Tim ini belum memilliki board
                    </p>
                </div>
            @endforelse
        </div>
    </div>
</div>

@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function() {
            function toggleTableResponsive() {
                var screenWidth = $(window).width();
                var $table = $('#responsive-team');
                if (screenWidth <= 880) {
                $table.addClass('py-4');
                } else {
                $table.removeClass('py-4');
                }
            }

            toggleTableResponsive();

            $(window).resize(function() {
                toggleTableResponsive();
            });
        });
    </script>
@endsection
