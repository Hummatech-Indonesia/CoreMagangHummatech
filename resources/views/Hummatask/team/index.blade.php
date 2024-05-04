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
    <div class="col-12">
        <div class="d-flex align-items-center gap-4 mb-4">
            <div class="position-relative">
                <div class="border border-2 border-primary rounded-circle">
                    <img src="{{ asset('assets-user/dist/images/profile/user-1.jpg') }}" class="rounded-circle m-1" alt="user1"
                        width="60" />
                </div>
            </div>
            <div>
                <h3 class="fw-semibold"><span class="text-dark">{{ $hummataskTeam->name }}</span>
                </h3>
                <span>Tanggal Mulai : {{ \Carbon\Carbon::parse($hummataskTeam->start_date)->locale('id')->isoFormat('dddd, D MMMM Y') }} &nbsp; &nbsp;- &nbsp;  Tenggat : {{ \Carbon\Carbon::parse($hummataskTeam->end_date)->locale('id')->isoFormat('dddd, D MMMM Y') }}</span>
                <div class="tb-section-2 mt-2">
                    <span class="badge px-2  text-bg-success fs-1">Aktif</span>
                    <span class="badge px-2  text-bg-warning fs-1">Big Project</span>
                </div>
            </div>
        </div>
    </div>
@endsection
