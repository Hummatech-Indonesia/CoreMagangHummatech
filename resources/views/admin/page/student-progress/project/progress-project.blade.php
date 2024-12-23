@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-start gap-3 bg-galaxy-transparent">
                <a href="/administrator/student-progress/project/detail/{{ $project->id }}/revision"
                    class="bg-primar p-2 rounded-3 bg-transparent text-black">
                    <i class="ri-list-check-2"></i>
                    Revisi Project
                </a>
                <a href="/administrator/student-progress/project/detail/{{ $project->id }}/progress"
                    class="bg-primary p-2 rounded-3 text-white">
                    <i class="ri-menu-2-fill"></i>
                    Progress Project
                </a>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="d-flex justify-content-between w-100 mb-4 gap-2 navbar-shadow">
            <a class="btn btn-back py-3 px-3 me-3 d-flex align-items-center custom-card shadow-sm"
                style="background-color: rgba(234, 233, 255, 1); border-radius: 8px;" href="{{ route('administrator.student-progress.project.detail', $project->id) }}">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16"
                    fill="rgba(105, 94, 239, 1)">
                    <path fill="none" d="M0 0h24v24H0z"></path>
                    <path
                        d="M7.82843 10.9999H20V12.9999H7.82843L13.1924 18.3638L11.7782 19.778L4 11.9999L11.7782 4.22168L13.1924 5.63589L7.82843 10.9999Z">
                    </path>
                </svg>
            </a>
            <div class="flex-grow-1 text-center py-3 px-3 rounded fw-bold custom-card shadow-sm"
                style="background-color: rgba(234, 233, 255, 1); color: rgba(105, 94, 239, 1); border-radius: 8px; ">
                Detail Progress
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-7">
            <div class="card">
                <div class="card-content">
                    <div class="card-body d-flex justify-content-start align-items-center m-0 p-3 text-center">
                        <h5 class="m-0 p-0 fw-semibold">
                            Progres Project</h5>
                    </div>
                </div>
            </div>
            <div class="card">
                <div style="background: white" class="card-header">
                    <div class="">
                        <h4 class="mb-4 fw-bolder">{{ $project->project_name }}</h4>
                    </div>
                    <div class="row d-flex justify-content-start">
                        <div class="col-12 col-md-3 text-center text-md-start mb-2">
                            <h6 class="mb-3 fw-bolder">Status Project</h6>
                            @if ($project->status_project == \App\Enum\TaskStatusEnum::REVISION)
                                <span class="badge bg-warning-subtle fw-light text-warning px-3 py-2 rounded-pill">
                                    Revisi
                                </span>
                            @elseif($project->status_project == \App\Enum\TaskStatusEnum::COMPLETED)
                                <span class="badge bg-success-subtle fw-light text-success px-3 py-2 rounded-pill">
                                    Project Selesai
                                </span>
                            @elseif($project->status_project == \App\Enum\TaskStatusEnum::INPROGRESS)
                                <span class="badge bg-info-subtle fw-light text-info px-3 py-2 rounded-pill">
                                    Dikerjakan
                                </span>
                            @endif
                        </div>
                        <div class="col-12 col-md-6 text-center text-md-start mb-2">
                            <h6 class="mb-3 fw-bolder">Kategori Project</h6>
                            <span class="bg-primary-subtle text-primary badge px-4 py-2 rounded-pill">
                                {{ $project->type_project }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-2">
                    <div class="mb-3">
                        <div class="anggota-item d-flex mb-3">
                            <span class="d-flex text-black fw-semibold">
                                Progress Pengerjaan
                            </span>
                        </div>
                        <div class="flex-grow-1">
                            <div class="progress animated-progress custom-progress progress-label">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: {{ number_format($total_progress) }}%"
                                    aria-valuenow="{{ number_format($total_progress) }}" aria-valuemin="0" aria-valuemax="100">
                                    <div class="label">{{ number_format($total_progress) }}%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="anggota-item d-flex mb-3">
                            <span class="d-flex text-black fw-semibold">
                                Revisi belum selesai
                            </span>
                        </div>
                        <div class="flex-grow-1">
                            <div class="progress animated-progress custom-progress progress-label">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: {{  number_format($total_revisi_dont_completed) }}%" aria-valuenow="{{  number_format($total_revisi_dont_completed) }}"
                                    aria-valuemin="0" aria-valuemax="100">
                                    <div class="label">{{  number_format($total_revisi_dont_completed) }}%</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @forelse ($anggota as $item)
                    <div class="mb-3">
                        <div class="d-flex align-items-center gap-2 fw-semibold text-dark mb-3">
                            <img src="{{ asset('assets-user/dist/images/profile/user-1.jpg') }}" class="rounded-circle"
                                alt="user" width="30" />
                            <span class="text-black fw-semibold">{{ $item['nama'] }}</span>
                        </div>
                        <div class="flex-grow-1">
                            <div class="progress animated-progress custom-progress progress-label">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: {{ number_format($item['revisi_percent']) }}%"
                                    aria-valuenow="{{ number_format($item['revisi_percent']) }}" aria-valuemin="0" aria-valuemax="100">
                                    <div class="label">{{ number_format($item['revisi_percent']) }}%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty

                    @endforelse


                </div>

            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-content">
                    <div class="card-body d-flex justify-content-start align-items-center m-0 p-3 text-center">
                        <h5 class="m-0 p-0 fw-semibold">Anggota</h5>
                    </div>
                </div>
            </div>
            <div class="card w-100">
                <div class="card-body p-4">
                    <div class="card mt-4 mb-0 shadow-none">
                        <div class="table-responsive">
                            <table class="table mb-0 align-middle text-nowrap ">
                                <thead>
                                    <tr>
                                        <th class="ps-0">No</th>
                                        <th>Nama</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody class="text-black">
                                    @forelse ($project->members as $member)
                                        <tr>

                                            <td class="ps-0 text-black">{{ $loop->iteration }}. </td>
                                            <td>
                                                <div class="d-flex align-items-center gap-3 fw-semibold text-dark">
                                                @if (file_exists(public_path('storage/' . $member->members->avatar)))
                                                    <img class="rounded-circle"
                                                        src="{{ asset('storage/' . $member->members->avatar) }}"
                                                        alt="{{ $member->members->name }}" width="40">
                                                @else
                                                    <img class="rounded-circle" src="{{ asset('user.webp') }}"
                                                        alt="{{ $member->members->name }}" width="40">
                                                @endif
                                                    <span>{{ $member->members->name }}</span>
                                                </div>
                                            </td>
                                            <td>
                                                <span @class([
                                                    'text-warning' =>
                                                        $member->status == \App\Enum\StatusMemberTeamEnum::Leader->value,
                                                    'text-primary' =>
                                                        $member->status == \App\Enum\StatusMemberTeamEnum::Member->value,
                                                ])>
                                                    @if ($member->status == \App\Enum\StatusMemberTeamEnum::Leader->value)
                                                        Ketua
                                                    @else
                                                        Anggota
                                                    @endif
                                                </span>
                                            </td>
                                        </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
