@extends('Hummatask.team.layouts.app')
@section('content')
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Project</h4>
                    <nav aria-label="breadcrumb mt-2">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-muted " href="/siswa-offline">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">Project</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-3">
                    <div class="text-center mb-n5">
                        <img src="{{ asset('assets-user/dist/images/breadcrumb/ChatBc.png') }}" alt=""
                            class="img-fluid mb-n4">
                    </div>
                </div>
            </div>
        </div>
    </div>
    @forelse ($studentProjects as $studentProject)
    <div class="col-12">
        <div class="d-flex align-items-center gap-4 mb-4">
            <div class="position-relative">
                <div class="border border-2 border-primary rounded-circle">
                    <img src="{{ asset('storage/'.$studentProject->project->hummataskTeam->image) }}" style="width: 60px; height: 60px; object-fit: cover;" class="img-fluid rounded-circle m-1" alt="user1"
                        width="60" />
                </div>
            </div>
            <div>
                <h3 class="fw-semibold"><span class="text-dark">{{ $studentProject->project->title }}</span>
                </h3>
                <span>Tanggal  Mulai : {{ \Carbon\Carbon::parse($studentProject->project->start_date)->locale('id')->isoFormat('dddd, D MMMM Y') }} &nbsp; &nbsp;- &nbsp;  Tenggat : {{ \Carbon\Carbon::parse($studentProject->project->end_date)->locale('id')->isoFormat('dddd, D MMMM Y') }}</span>
                <div class="tb-section-2 mt-2">
                    <span class="badge px-2  text-bg-{{ $studentProject->project->status->color() }} fs-1">{{ $studentProject->project->status->label() }}</span>
                    <span class="badge px-2  text-bg-primary fs-1">{{ $studentProject->project->hummataskTeam->categoryProject->name }}</span>
                </div>
            </div>
        </div>
    </div>
    @empty
        
    @endforelse
@endsection
