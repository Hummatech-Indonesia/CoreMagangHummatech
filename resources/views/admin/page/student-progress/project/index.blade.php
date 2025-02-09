@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-body">
                <div class="col-md-7 col-sm-10">
                    <div class="step-arrow-nav">
                        <ul class="nav nav-pills custom-nav nav-justified" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="all-tab" data-bs-toggle="pill" data-bs-target="#all"
                                    type="button" role="tab" aria-controls="all" aria-selected="true">Semua</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="accept-rejected-tab" data-bs-toggle="pill"
                                    data-bs-target="#acceptAndrejected" type="button" role="tab"
                                    aria-controls="acceptAndrejected" aria-selected="false">Diterima & Ditolak</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="waiting-tab" data-bs-toggle="pill" data-bs-target="#waiting"
                                    type="button" role="tab" aria-controls="waiting"
                                    aria-selected="false">Menunggu</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="completed-tab" data-bs-toggle="pill"
                                    data-bs-target="#completed" type="button" role="tab" aria-controls="completed"
                                    aria-selected="false">Selesai</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="tab-content">
        <div class="tab-pane fade show active" id="all">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
                @forelse ($projects as $project)
                    <div class="col">
                        <div class="card shadow-sm border-0">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <span class="badge bg-primary-subtle text-primary  px-3 py-2 rounded-2 fw-bolder">
                                        {{ $project->type_project }}
                                    </span>

                                    <div class="btn btn-primary position-relative p-0 avatar-xs rounded">
                                        <span class="avatar-title bg-transparent">
                                            {{ $project->presentation?->urutan == 0 ? '-' : sprintf('%02d', $project->presentation->urutan) }}
                                        </span>
                                    </div>
                                </div>
                                <h5 class="fw-semibold">{{ $project->project_name }}</h5>
                                <p class="text-muted mb-1">By Kelompok {{ $project->members->first()?->members->name }}</p>
                                <div class="mb-4">
                                    <div class="col-sm-auto">
                                        <div class="avatar-group">
                                            @php($members = $project->members)

                                            @if ($members->count() === 1)
                                                <div class="avatar-group-item material-shadow">
                                                    <a href="javascript: void(0);" class="d-inline-block"
                                                        data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                        data-bs-original-title="{{ $members->first()?->members->name }}">

                                                        @if (file_exists(public_path('storage/' . $members->first()?->members->avatar)))
                                                            <img class="rounded-circle avatar-xxs"
                                                                src="{{ asset('storage/' . $members->first()?->members->avatar) }}"
                                                                alt="{{ $members->first()?->members->name }}">
                                                        @else
                                                            <img class="rounded-circle avatar-xxs"
                                                                src="{{ asset('user.webp') }}"
                                                                alt="{{ $members->first()?->members->name }}">
                                                        @endif
                                                    </a>
                                                </div>
                                            @elseif($members->count() > 1)
                                                @foreach ($members as $index => $member)
                                                    <div class="avatar-group-item material-shadow">
                                                        <a href="javascript: void(0);" class="d-inline-block"
                                                            data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                            data-bs-original-title="{{ $member->members->name }}">

                                                            @if (file_exists(public_path('storage/' . $member->members->avatar)))
                                                                <img class="rounded-circle avatar-xxs"
                                                                    src="{{ asset('storage/' . $member->members->avatar) }}"
                                                                    alt="{{ $member->members->name }}">
                                                            @else
                                                                <img class="rounded-circle avatar-xxs"
                                                                    src="{{ asset('user.webp') }}"
                                                                    alt="{{ $member->members->name }}">
                                                            @endif
                                                        </a>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mt-2">
                                    <p class="fw-bold text-black mb-0">Kondisi Project:</p>
                                    @if ($project->status == \App\Enum\ProjectAcceptStatus::WAITING)
                                        <span class="badge bg-warning-subtle fw-light text-warning px-3 py-2">
                                            Menunggu Konfirmasi
                                        </span>
                                    @elseif($project->status == \App\Enum\ProjectAcceptStatus::ACCEPT)
                                        <span class="badge bg-success-subtle fw-light text-success px-3 py-2">
                                            Diterima
                                        </span>
                                    @elseif($project->status == \App\Enum\ProjectAcceptStatus::REJECTED)
                                        <span class="badge bg-danger-subtle fw-light text-danger px-3 py-2">
                                            Ditolak
                                        </span>
                                    @endif

                                </div>
                                <div class="d-flex justify-content-between align-items-center mt-2">
                                    <p class="text-black mb-0">Deadline:</p>
                                    <small class="{{ $project->getStatus()->color() }} bg-transparent">
                                        {{ \Carbon\Carbon::parse($project->start_date)->format('d/m/Y') }} -
                                        {{ \Carbon\Carbon::parse($project->end_date)->format('d/m/Y') }}
                                    </small>
                                </div>
                                <div class="d-flex justify-content-center mt-3">
                                    <a href="{{ route('administrator.student-progress.project.detail', $project->id) }}"
                                        class="btn btn-primary w-100">Detail Progress</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12"  style="flex: 0 0 100%;">
                        <div class="d-flex flex-column justify-content-center align-items-center mt-3">
                            <img class="d-block mx-auto" src="{{ asset('no data.png') }}" width="200px"
                                alt="">
                            <h4 class="text-center mt-2 mb-4">Data Masih kosong</h4>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>

        @include('admin.page.student-progress.project.partials.accept-and-rejected-project')
        @include('admin.page.student-progress.project.partials.waiting-project')
        @include('admin.page.student-progress.project.partials.complete-project')
    </div>
@endsection
