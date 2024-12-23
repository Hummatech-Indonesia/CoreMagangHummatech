@extends('admin.layouts.app')

@section('content')
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
        @forelse ($projects as $project)
            <div class="col">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="badge bg-primary-subtle text-primary  px-3 py-2 rounded-2 fw-bolder">
                                {{ $project->type_project }}
                            </span>

                        </div>
                        <h5 class="fw-semibold">{{ $project->project_name }}</h5>
                        <p class="text-muted mb-1">Ketua Kelompok {{ $project->members->first()?->members->name }}</p>
                        <div class="mb-4">
                            <div class="col-sm-auto">
                                <div class="avatar-group">
                                    @php($members = $project->members)
                                    @forelse ($members as $index => $member)
                                        <div class="avatar-group-item material-shadow">
                                            <a href="javascript: void(0);" class="d-inline-block" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title=""
                                                data-bs-original-title="{{ $member->members->name }}">

                                                @if (file_exists(public_path('storage/' . $member->members->avatar)))
                                                    <img class="rounded-circle avatar-xxs"
                                                        src="{{ asset('storage/' . $member->members->avatar) }}"
                                                        alt="{{ $member->members->name }}">
                                                @else
                                                    <img class="rounded-circle avatar-xxs" src="{{ asset('user.webp') }}"
                                                        alt="{{ $member->members->name }}">
                                                @endif
                                            </a>
                                        </div>
                                    @empty
                                    @endforelse
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-2">
                            <p class="fw-bold text-black mb-0">Kondisi Project:</p>

                            @if ($project->status_project == \App\Enum\TaskStatusEnum::INPROGRESS)
                                <span class="badge bg-warning-subtle fw-light text-warning px-3 py-2">
                                    Dikerjakan
                                </span>
                            @elseif($project->status_project == \App\Enum\TaskStatusEnum::REVISION)
                                <span class="badge bg-danger-subtle fw-light text-warning px-3 py-2">
                                    Dalam Revisi
                                </span>
                            @elseif($project->status_project == \App\Enum\TaskStatusEnum::COMPLETED)
                                <span class="badge bg-success-subtle fw-light text-success px-3 py-2">
                                    Selesai
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
        <div class="d-flex justify-content-center align-items-center" style="min-height: 300px; width: 100%;">
            <div class="text-center">
                <img src="{{ asset('assets-user/dist/images/products/empty-shopping-bag.gif') }}" alt="No Data"
                    height="120px" />
                <h3 class="mt-3">Data Masih Kosong</h3>
            </div>
        </div>
        @endforelse
    </div>
@endsection
