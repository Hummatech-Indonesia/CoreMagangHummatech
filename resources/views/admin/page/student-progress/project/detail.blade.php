@extends('admin.layouts.app')
@section('style')
    <style>
        .btn-back {
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .btn-back:hover {
            background-color: #dddcf8;
            /* Warna hover */
            transform: translateY(-2px);
        }

        .custom-card {
            box-shadow: 0 4px 8px rgba(223, 221, 221, 0.267);
            border: none;
        }

        .status-badge {
            border-radius: 34px;
            font-size: 12px;
            color: ;
            min-width: 140px;
            min-height: 30px;
            padding-top: 12px;
            padding-bottom: 0px;
            font-weight: 100;
        }

        .detail-badge {
            background-color: rgba(93, 135, 255, 0.1);
            border-radius: 6px;
            font-size: 12px;
            color: rgba(93, 135, 255, 1);
            min-width: 122px;
            min-height: 30px;
            padding-top: 8px;
            padding-bottom: 0px;
            font-weight: 100;
            justify-content: end;
            align-items: flex-end
        }

        .category-badge {
            background-color: rgba(93, 135, 255, 0.1);
            border-radius: 34px;
            font-size: 12px;
            color: rgba(93, 135, 255, 1);
            min-width: 145px;
            min-height: 30px;
            padding-top: 9px;
            font-weight: 100;
        }

        .status-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
        }

        .status-badge-container {
            display: flex;
            align-items: center;
            justify-content: flex-end;
        }

        .detail-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background-color: rgba(93, 135, 255, 0.1);
            border-radius: 6px;
            font-size: 12px;
            color: rgba(93, 135, 255, 1);
            min-width: 122px;
            height: 30px;
            padding: 0 8px;
            font-weight: 500;
            border: none;
        }
    </style>
@endsection
@section('content')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <!-- Tombol Kembali -->
        <button class="btn btn-back py-3 px-3 me-3 d-flex align-items-center custom-card shadow-sm"
                style="background-color: rgba(234, 233, 255, 1); border-radius: 8px;">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16"
                 fill="rgba(105, 94, 239, 1)">
                <path fill="none" d="M0 0h24v24H0z"></path>
                <path
                    d="M7.82843 10.9999H20V12.9999H7.82843L13.1924 18.3638L11.7782 19.778L4 11.9999L11.7782 4.22168L13.1924 5.63589L7.82843 10.9999Z">
                </path>
            </svg>
        </button>

        <!-- Header Judul -->
        <div class="flex-grow-1 text-center py-3 px-3 rounded fw-bold custom-card shadow-sm"
             style="background-color: rgba(234, 233, 255, 1); color: rgba(105, 94, 239, 1); border-radius: 8px; ">
            {{ $project->project_name }}
        </div>
    </div>


    <div class="row">
        <div class="col-lg-8">
            <div class="d-flex flex-column h-50">
                <div class="card">
                    <div class="row align-items-end">
                        <div class="card-body mx-3 fw-semibold">
                            <span>Informasi Project</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="d-flex flex-column h-50">
                <div class="card">
                    <div class="row align-items-end">
                        <div class="card-body mx-3 fw-semibold">
                            <span>Anggota</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="d-flex flex-column h-100">
                <div class="card mb-4">
                    <div class="card-body">
                        <!-- Status -->
                        <div class="mb-3">
                            <div>
                                <div class="status-container">
                                    <label class="form-label">Status</label>
                                    <div class="status-badge-container">
                                        <a href="/administrator/student-progress/project/detail/{{ $project->id }}/revision" class="badge detail-badge">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16"
                                                 height="16" fill="rgba(93,135,255,1)">
                                                <path fill="none" d="M0 0h24v24H0z"></path>
                                                <path
                                                    d="M12.0003 3C17.3924 3 21.8784 6.87976 22.8189 12C21.8784 17.1202 17.3924 21 12.0003 21C6.60812 21 2.12215 17.1202 1.18164 12C2.12215 6.87976 6.60812 3 12.0003 3ZM12.0003 19C16.2359 19 19.8603 16.052 20.7777 12C19.8603 7.94803 16.2359 5 12.0003 5C7.7646 5 4.14022 7.94803 3.22278 12C4.14022 16.052 7.7646 19 12.0003 19ZM12.0003 16.5C9.51498 16.5 7.50026 14.4853 7.50026 12C7.50026 9.51472 9.51498 7.5 12.0003 7.5C14.4855 7.5 16.5003 9.51472 16.5003 12C16.5003 14.4853 14.4855 16.5 12.0003 16.5ZM12.0003 14.5C13.381 14.5 14.5003 13.3807 14.5003 12C14.5003 10.6193 13.381 9.5 12.0003 9.5C10.6196 9.5 9.50026 10.6193 9.50026 12C9.50026 13.3807 10.6196 14.5 12.0003 14.5Z">
                                                </path>
                                            </svg>
                                            Lihat Revisi
                                        </a>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center gap-2 pt-1">
                                    @if ($project->status == \App\Enum\ProjectAcceptStatus::ACCEPT)
                                        <small class="rounded-pill text-success fw-bolder p-2"
                                               style="background: rgba(19,222,185,.2)">Disetujui</small>
                                    @elseif($project->status == \App\Enum\ProjectAcceptStatus::WAITING)
                                        <small class="rounded-pill text-warning fw-bolder p-2"
                                               style="background: rgba(255,174,31,.2)">Menunggu</small>
                                    @elseif($project->status == \App\Enum\ProjectAcceptStatus::REJECTED)
                                        <small class="rounded-pill text-danger fw-bolder p-2"
                                               style="background: rgb(250,137,107,.2)">Ditolak</small>
                                    @endif
                                    <div class="d-flex gap-2">
                                        @if ($project->status == \App\Enum\ProjectAcceptStatus::ACCEPT)
                                            @switch($project->status_project)
                                                @case(\App\Enum\TaskStatusEnum::INPROGRESS->value)
                                                    <small class="rounded-pill text-primary fw-bolder p-2"
                                                           style="background-color: rgba(234, 233, 255, 1);">Sedang dikerjakan
                                                    </small>
                                                    @break

                                                @case(\App\Enum\TaskStatusEnum::REVISION->value)
                                                    <small class="rounded-pill text-danger fw-bolder p-2"
                                                           style="background: rgb(250,137,107,.2)">Revisi
                                                        ({{ $project->revision_count }})
                                                    </small>
                                                    @break

                                                @case(\App\Enum\TaskStatusEnum::COMPLETED->value)
                                                    <small class="rounded-pill text-success fw-bolder p-2"
                                                           style="background: rgba(19,222,185,.2)">Selesai
                                                    </small>
                                                    @break

                                                @default
                                                    <small class="rounded-pill text-primary fw-bolder p-2"
                                                           style="background-color: rgba(234, 233, 255, 1);">Sedang dikerjakan
                                                    </small>
                                                    @break
                                            @endswitch
                                        @endif
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- Kategori Project -->
                        <div class="mb-3">
                            <label class="form-label">Kategori Project</label>
                            <div>
                                <span class="badge category-badge">{{ ucwords($project->type_project->value) }}</span>
                            </div>
                        </div>

                        <!-- Deskripsi Project -->
                        <div class="mb-3">
                            <label class="form-label">Deskripsi Project</label>
                            <textarea class="form-control" rows="3"
                                      style="border:none">{{ $project->description }}</textarea>
                        </div>

                        <!-- Link Repository Github -->
                        <div class="mb-3">
                            <label class="form-label">Link Repository Github (Opsional)</label>
                            <input type="url" class="form-control" value="{{ $project->link }}" readonly>
                        </div>

                        <!-- Waktu Pengerjaan -->
                        <div class="mb-3">
                            <label class="form-label">Waktu Pengerjaan</label>
                            <input type="text" class="form-control"
                                   value="{{ \Carbon::parse($project->start_date)->format('d/m/Y') . ' - ' . \Carbon::parse($project->end_date)->format('d/m/Y') }}"
                                   readonly>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Kolom Samping -->
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
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
                                            <img src="{{ asset('assets-user/dist/images/profile/user-1.jpg') }}"
                                                 class="rounded-circle" alt="user" width="40" />
                                            <span>{{ $member->members->name }}</span>
                                        </div>
                                    </td>
                                    <td>
                                                    <span @class([
                                                        'text-warning' => $member->status == \App\Enum\StatusMemberTeamEnum::Leader->value,
                                                        'text-primary' => $member->status == \App\Enum\StatusMemberTeamEnum::Member->value,
                                                    ])>
                                                        {{ $member->status }}
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

@endsection
