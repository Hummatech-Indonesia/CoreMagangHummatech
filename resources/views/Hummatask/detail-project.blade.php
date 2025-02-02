@extends('Hummatask.layouts.app')
<div hidden>
    @dump(session('success'))
    @dump(session('error'))
</div>
@section('style')
    <link type="text/css" href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" />
    <style>
        .bg-label-primary {
            background-color: #eff3ff !important;
            color: #557be8 !important;
        }

        .bg-label-info {
            background-color: #d9ebff !important;
            color: #0da8ff !important;
        }

        .bg-label-warning {
            background-color: #fef5e5 !important;
            color: #ffaa05 !important;
        }

        .bg-label-danger {
            background-color: #fbf2ef !important;
            color: #e12d5b !important;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__rendered li {
            color: black;
        }
    </style>
@endsection

@section('sidebar')
    @include('Hummatask.layouts.sidebar-detail-presentation')
@endsection

@section('content')
    <div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="editModalLabel"
        aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Presentation</h5>
                    <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                </div>
                <form action="{{ route('presentation-detail.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input name="id" type="hidden" value="{{ $project->id }}">
                    <div class="modal-body">
                        <div class="mt-n2 mx-sm-0 mx-auto flex-shrink-0">
                            <div class="mx-3">
                                <label class="mb-2 mt-1" for="">Nama Project</label>
                                <input class="form-control" name="project_name" type="text"
                                    value="{{ old('project_name') ?? $project->project_name }}"
                                    placeholder="Masukkan Project">
                                @error('project_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <label class="mb-2 mt-4" for="">Deskripsi</label>
                                <textarea class="form-control" name="description" rows="3" placeholder="Masukkan deskripsi tema anda">{{ old('description') ?? $project->description }}</textarea>
                                @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <label class="mb-2 mt-4" for="">Link repository
                                    (opsional)</label>
                                <input class="form-control" name="link" type="text"
                                    value="{{ old('link') ?? $project->link }}"
                                    placeholder="Masukkan link repositori projek">
                                @error('link')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror

                                <div class="row row-cols-2 mt-2">
                                    <div id="startDate">
                                        <label class="mb-2 mt-1" for="">Tanggal
                                            Mulai</label>
                                        <input class="form-control" name="start_date" type="date"
                                            value="{{ old('start_date') ?? $project->start_date }}">
                                        @error('start_date')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div id="endDate">
                                        <label class="mb-2 mt-1" for="">Tanggal
                                            Selesai</label>
                                        <input class="form-control" name="end_date" type="date"
                                            value="{{ old('end_date') ?? $project->end_date }}">
                                        @error('end_date')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <label class="mb-2 mt-4" for="">Kategori Project</label>
                                <select class="form-control" id="selectProject" name="type_project"
                                    onchange="changeProject(this)">
                                    @foreach ($categoryProject as $category)
                                        <option value="{{ $category->name }}"
                                            {{ $project->type_project == $category->name ? 'selected' : '' }}>
                                            {{ ucwords($category->name) }}</option>
                                    @endforeach
                                </select>
                                @error('type_project')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror

                                <div id="memberSection">
                                    <label class="d-block mb-2 mt-4" for="">Anggota
                                        Tim</label>
                                    <select class="js-example-basic-multiple d-block w-100 text-gray-900" id="selectMembers"
                                        name="members[]" style="width: 100%;" multiple>
                                        @foreach ($studentsData as $id => $student)
                                            <option value="{{ $id }}"
                                                {{ in_array($id, $project->members->pluck('member_id')->toArray()) ? 'selected' : '' }}>
                                                {{ $student->name }}
                                                {{ $id }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('members')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <label class="mb-2 mt-4" for="">Leader</label>
                                <input class="form-control" name="leader_id" type="text"
                                    value="{{ auth()->user()->name }}" placeholder="Leader" disabled>
                                @error('leader_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-light-danger text-danger" data-bs-dismiss="modal" type="button">Tutup
                        </button>
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-between w-100 mb-4 gap-2">
        <a class="text-decoration-none" href="/siswa-offline/dashboard/task">
            <div class="back bg-label-primary rounded p-3">
                <svg width="32" height="24" viewBox="0 0 36 28" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M1.27307 12.586C0.89813 12.9611 0.687499 13.4697 0.687499 14C0.687499 14.5303 0.89813 15.0389 1.27307 15.414L12.5871 26.728C12.7716 26.919 12.9923 27.0714 13.2363 27.1762C13.4803 27.281 13.7427 27.3362 14.0083 27.3385C14.2738 27.3408 14.5372 27.2902 14.783 27.1896C15.0288 27.0891 15.2521 26.9406 15.4399 26.7528C15.6276 26.565 15.7762 26.3417 15.8767 26.0959C15.9773 25.8501 16.0279 25.5868 16.0256 25.3212C16.0233 25.0556 15.9681 24.7932 15.8633 24.5492C15.7585 24.3052 15.6061 24.0845 15.4151 23.9L7.51507 16L34.0011 16C34.5315 16 35.0402 15.7893 35.4153 15.4142C35.7904 15.0391 36.0011 14.5304 36.0011 14C36.0011 13.4696 35.7904 12.9609 35.4153 12.5858C35.0402 12.2107 34.5315 12 34.0011 12L7.51507 12L15.4151 4.1C15.7794 3.72279 15.981 3.21759 15.9764 2.6932C15.9719 2.16881 15.7615 1.66718 15.3907 1.29637C15.0199 0.925548 14.5183 0.715209 13.9939 0.710653C13.4695 0.706096 12.9643 0.907684 12.5871 1.272L1.27307 12.586Z"
                        fill="#5D87FF" />
                </svg>
            </div>
        </a>
        <div class="bg-label-primary w-100 d-flex justify-content-center align-items-center text-center">
            <h2 class="text-primary fw-bolder fs-4">{{ $project->project_name }}</h2>
        </div>
        <div class="presentation-action d-flex gap-2">
            <button class="btn px-3" data-bs-toggle="modal" data-bs-target="#editModal" type="button"
                style="background: #FFF5E3">
                <svg width="25" height="25" viewBox="0 0 31 31" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M17.0882 4.84885L23.4412 11.0814M25.8235 19.6512L22.6471 24.3256H29L25.8235 29M2 25.8838H8.35294L25.0294 9.52336C25.4466 9.11412 25.7774 8.62829 26.0032 8.0936C26.229 7.55891 26.3451 6.98583 26.3451 6.40708C26.3451 5.82834 26.229 5.25526 26.0032 4.72056C25.7774 4.18587 25.4466 3.70004 25.0294 3.2908C24.6123 2.88157 24.1171 2.55695 23.572 2.33547C23.027 2.11399 22.4429 2 21.8529 2C21.263 2 20.6789 2.11399 20.1338 2.33547C19.5888 2.55695 19.0936 2.88157 18.6765 3.2908L2 19.6513V25.8838Z"
                        stroke="#FFAE1F" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </button>
            <form class="ms-2 p-0" action="{{ route('project.destroy', $project->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn h-100 px-3" style="background: #FBF2EF"
                    {{ $project->status_project->value == \App\Enum\ProjectAcceptStatus::WAITING->value }}>
                    <svg width="22" height="26" viewBox="0 0 27 31" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M1.83203 8.20833H25.1654M10.582 14.0417V22.7917M16.4154 14.0417V22.7917M3.29036 8.20833L4.7487 25.7083C4.7487 26.4819 5.05599 27.2237 5.60297 27.7707C6.14995 28.3177 6.89182 28.625 7.66536 28.625H19.332C20.1056 28.625 20.8474 28.3177 21.3944 27.7707C21.9414 27.2237 22.2487 26.4819 22.2487 25.7083L23.707 8.20833M9.1237 8.20833V3.83333C9.1237 3.44656 9.27734 3.07563 9.55083 2.80214C9.82433 2.52865 10.1953 2.375 10.582 2.375H16.4154C16.8021 2.375 17.1731 2.52865 17.4466 2.80214C17.7201 3.07563 17.8737 3.44656 17.8737 3.83333V8.20833"
                            stroke="#F73164" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-7">
            <div class="card" style="border:1px solid rgba(0,0,0,.03);">
                <div class="card-content">
                    <div class="card-body d-flex justify-content-start align-items-center m-0 p-3 text-center">
                        <h5 class="m-0 p-0">
                            Informasi Project</h5>
                    </div>
                </div>
            </div>
            <div class="card" style="border:1px solid rgba(0,0,0,.03);">
                <div class="card-content">
                    <div class="card-body d-flex flex-column align-items-start justify-content-start">
                        <div class="d-flex w-100 justify-content-between align-items-center my-3">
                            <h5 class="">Status</h5>
                            <a class="rounded-2 text-primary fw-bold p-2"
                                href="{{ $project->id }}/detail-progress"
                                style="background: #eff3ff">
                                Detail Progress
                            </a>
                        </div>
                        @if ($project->status == \App\Enum\ProjectAcceptStatus::ACCEPT)
                            <small class="rounded-2 text-success fw-bolder p-2"
                                style="background: rgba(19,222,185,.2)">Disetujui</small>
                        @elseif($project->status == \App\Enum\ProjectAcceptStatus::WAITING)
                            <small class="rounded-2 text-waiting fw-bolder p-2"
                                style="background: rgba(255,174,31,.2)">Menunggu</small>
                        @elseif($project->status == \App\Enum\ProjectAcceptStatus::REJECTED)
                            <small class="rounded-2 text-danger fw-bolder p-2"
                                style="background: rgb(250,137,107,.2)">Ditolak</small>
                        @endif
                        <h5 class="my-3">Kategori Project</h5>
                        <input class="form-control" type="text" value="{{ ucwords($project->type_project->value) }}"
                            style="pointer-events: none" readonly>
                        <h5 class="my-3">Deskripsi</h5>
                        <textarea class="form-control" type="text" style="pointer-events: none" readonly rows="4">{{ $project->description ? $project->description : 'tema anda' }}</textarea>
                        <h5 class="my-3">Link Repository Github (Opsional)</h5>
                        <input class="form-control" type="text"
                            value="{{ $project->link ? $project->link : 'https://....' }}" style="pointer-events: none"
                            readonly>
                        <h5 class="my-3">Waktu Pengerjaan</h5>
                        <input class="form-control" type="text"
                            value="{{ $project->start_date . ' - ' . $project->end_date }}" style="pointer-events: none"
                            readonly>

                        {{-- NEED FIX --}}
                        @if ($project->status === \App\Enum\ProjectAcceptStatus::WAITING)
                        @elseif($project->status === \App\Enum\ProjectAcceptStatus::REJECTED)
                            <h5 class="my-3">Alasan Ditolak</h5>
                            <textarea class="form-control" style="pointer-events: none;resize:none;" cols="20" rows="5" readonly
                                placeholder="{{ $project->reason ? $project->reason : 'Alasan ditolak...' }}"></textarea>
                        @elseif($project->status_project->value === 'ongoing')
                            <h5 class="my-3">Alasan Ditolak</h5>
                            <textarea class="form-control" style="pointer-events: none;resize:none;" cols="20" rows="5" readonly
                                placeholder="{{ $project->reason ? $project->reason : 'Alasan ditolak...' }}"></textarea>
                        @endif

                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-5">
            <div class="card" style="border:1px solid rgba(0,0,0,.03);">
                <div class="card-content">
                    <div class="card-body d-flex justify-content-between align-items-center m-0 p-3">
                        <h5 class="m-0 p-0">
                            Anggota</h5>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="search-table text-nowrap table align-middle">
                                <thead class="header-item">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse ($students as $index => $student)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td class="d-flex align-items-center gap-2">
                                                <img class="rounded-circle rounded border"
                                                    src="{{ isset($student->members->faces->first()->photo) ? asset('storage/' . $student->members->faces->first()->photo) : asset('user.webp') }}"
                                                    alt="" width="35" height="35">
                                                {{ $student->members->name }}
                                            </td>
                                            <td>
                                                <b
                                                    class="{{ $student->status == \App\Enum\StatusMemberTeamEnum::Leader->value ? 'text-warning' : 'text-primary' }}">
                                                    {{ $student->status }}
                                                </b>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr colspan="999">
                                            <td>Tidak ada anggota</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/libs/jquery/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/libs/select2/select2.min.js') }}"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/fixedcolumns/5.0.3/js/dataTables.fixedColumns.js"></script>
    <script src="https://cdn.datatables.net/fixedcolumns/5.0.3/js/fixedColumns.dataTables.js"></script>
    <script src="https://cdn.datatables.net/select/2.1.0/js/dataTables.select.js"></script>
    <script src="https://cdn.datatables.net/select/2.1.0/js/select.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#selectMembers').select2({
                dropdownParent: $('#editModal')
            });
            if ($('#selectProject').val() !== 'solo project') {
                $('#memberSection').show();
            } else {
                $('#memberSection').hide()
                $('#selectMembers').prop('disabled', true)
            }
        });

        function changeProject(e) {
            if (e.value !== 'solo project') {
                $('#selectMembers').prop('disabled', false)
                $('#memberSection').show();
            } else {
                $('#selectMembers').prop('disabled', true)
                $('#memberSection').hide();
            }
        }
    </script>

    {{--
    <script>
        const table = new DataTable('#dataTableUsers', {
            // columnDefs: [{
            //     orderable: false,
            //     render: DataTable.render.select(),
            //     targets: 0
            // }],
            fixedColumns: {
                start: 2
            },
            order: [
                [1, 'asc']
            ],
            paging: false,
            scrollCollapse: true,
            scrollX: true,
            scrollY: 300,
            // select: {
            //     style: 'multi',
            //     selector: 'td:first-child'
            // }
        });
    </script> --}}
@endsection
