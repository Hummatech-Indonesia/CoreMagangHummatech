@extends('mentor.layouts.app')
@section('content')
    <div class="container-fluid note-has-grid">
        <ul class="nav nav-pills p-3 mb-3 rounded align-items-center card flex-row">
            <li class="nav-item">
                <a data-bs-toggle="tab" href="#project-submissions" role="tab"
                    class="nav-link note-link d-flex align-items-center justify-content-center active px-3 px-md-3 me-0 me-md-2 text-body-color"
                    id="all-category">
                    <i class="ti ti-presentation fill-white me-0 me-md-1 fs-7"></i>
                    <span class="d-none d-md-block font-weight-medium">Pengajuan Project</span>
                </a>
            </li>
            <li class="nav-item">
                <a data-bs-toggle="tab" href="#history-submissions" role="tab"
                    class="nav-link note-link d-flex align-items-center justify-content-center px-3 px-md-3 me-0 me-md-2 text-body-color"
                    id="note-business">
                    <i class="ti ti-history fill-white me-0 me-md-1 fs-7"></i>
                    <span class="d-none d-md-block font-weight-medium">Riwayat Pengajuan Project</span>
                </a>
            </li>
        </ul>

        <div class="tab-content">
            <!-- Tab 1 -->
            <div class="tab-pane active" id="project-submissions" role="tabpanel">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-3 g-4">
                    @forelse ($waiting_projects as $project)
                        <div class="col">
                            <div class="card shadow-sm border-0">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <span class="badge bg-light-primary text-primary px-3 py-2 rounded-2 fw-bolder">
                                            {{ $project->type_project }}
                                        </span>
                                        <div class="d-flex gap-1">
                                            <a href="{{ route('mentor.project-submissions.show', $project->id) }}"
                                                class="btn btn-primary text-white p-1">
                                                <i class="ti ti-eye fs-7"></i>
                                            </a>
                                            <button class="btn text-white p-1" style="background-color: #f73164">
                                                <i class="ti ti-trash fs-7"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <h5 class="fw-semibold">{{ $project->project_name }}</h5>
                                    <p class="text-muted mb-1">By Kelompok {{ $project->members->first()?->members->name }}
                                    </p>
                                    <div class="mb-4">
                                        @php($members = $project->members)

                                        @if ($members->count() === 1)
                                            <div class="d-flex justify-content-start">
                                                <img src="{{ asset('assets-user/dist/images/profile/user-2.jpg') }}"
                                                    alt="Avatar" class="rounded-circle shadow-sm img-fluid" width="33"
                                                    height="33">
                                            </div>
                                        @elseif ($members->count() > 1)
                                            <div class="d-flex justify-content-start">
                                                <ul class="hstack mb-0">
                                                    @foreach ($members as $index => $member)
                                                        <li class="{{ $index > 0 ? 'ms-n8' : '' }}">
                                                            <a href="javascript:void(0)" class="me-1"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                aria-label="{{ $member->members->name }}"
                                                                data-bs-original-title="{{ $member->members->name }}">
                                                                <img src="{{ asset('assets-user/dist/images/profile/user-1.jpg') }}"
                                                                    class="rounded-circle border border-2 border-white"
                                                                    width="33" height="33"
                                                                    alt="{{ $member->members->name }}">
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p class="fw-bold text-black mb-0">Kondisi Project:</p>
                                        <span class="{{ $project->getStatus()->color() }}  px-2 py-1 rounded-2">
                                            {{ $project->getStatus()->label() }}
                                        </span>
                                    </div>


                                    <div class="d-flex justify-content-between align-items-center mt-1">
                                        <p class="text-black mb-0">Deadline:</p>
                                        <small class="text-success fw-semibold">
                                            {{ \Carbon\Carbon::parse($project->start_date)->format('d/m/Y') }} -
                                            {{ \Carbon\Carbon::parse($project->end_date)->format('d/m/Y') }}
                                        </small>
                                    </div>

                                    <div class="d-flex justify-content-between mt-4">
                                        <button class="btn btn-light-danger text-danger w-50 me-2">Tolak</button>
                                        <button class="btn btn-light-success text-success w-50 ms-2"
                                        data-bs-toggle="modal" data-bs-target="#completeModal{{ $project->id }}"
                                        type="button">Terima</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Accept -->
                        <div class="modal fade" id="completeModal{{ $project->id }}" tabindex="-1"
                            aria-labelledby="completeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header d-flex align-items-center">
                                        <h5 class="modal-title" id="completeModalLabel">Konfirmasi</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Apakah anda yakin?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button"
                                            class="btn btn-light-danger text-danger font-medium waves-effect text-start"
                                            data-bs-dismiss="modal">Batal</button>
                                        <form action="{{ route('mentor.project-submissions.accept', $project->id) }}"
                                            method="post">
                                            @csrf
                                            @method('PATCH')
                                            <button class="btn btn-light-success text-success" type="submit">Ya, proyek telah
                                                Diterima</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="d-flex justify-content-center align-items-center"
                            style="min-height: 300px; width: 100%;">
                            <div class="text-center">
                                <img src="{{ asset('assets-user/dist/images/products/empty-shopping-bag.gif') }}"
                                    alt="No Data" height="120px" />
                                <h3 class="mt-3">Data Masih Kosong</h3>
                            </div>
                        </div>
                    @endforelse


                </div>
            </div>

            <!-- Tab 2 -->
            <div class="tab-pane" id="history-submissions" role="tabpanel">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-3 g-4">
                    @forelse ($history_projects as $project)
                        <div class="col">
                            <div class="card shadow-sm border-0">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <span class="badge bg-light-primary text-primary px-3 py-2 rounded-2 fw-bolder">
                                            {{ $project->type_project }}
                                        </span>
                                        <div class="d-flex gap-1">
                                            <a href="{{ route('mentor.project-submissions.show', $project->id) }}"
                                                class="btn btn-primary text-white p-1">
                                                <i class="ti ti-eye fs-7"></i>
                                            </a>
                                            <button class="btn text-white p-1" style="background-color: #f73164">
                                                <i class="ti ti-trash fs-7"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <h5 class="fw-semibold">{{ $project->project_name }}</h5>
                                    <p class="text-muted mb-1">By Kelompok {{ $project->members->first()?->members->name }}
                                    </p>
                                    <div class="mb-4">
                                        @php($members = $project->members)

                                        @if ($members->count() === 1)
                                            <div class="d-flex justify-content-start">
                                                <img src="{{ asset('assets-user/dist/images/profile/user-2.jpg') }}"
                                                    alt="Avatar" class="rounded-circle shadow-sm img-fluid" width="33"
                                                    height="33">
                                            </div>
                                        @elseif ($members->count() > 1)
                                            <div class="d-flex justify-content-start">
                                                <ul class="hstack mb-0">
                                                    @foreach ($members as $index => $member)
                                                        <li class="{{ $index > 0 ? 'ms-n8' : '' }}">
                                                            <a href="javascript:void(0)" class="me-1"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                aria-label="{{ $member->members->name }}"
                                                                data-bs-original-title="{{ $member->members->name }}">
                                                                <img src="{{ asset('assets-user/dist/images/profile/user-1.jpg') }}"
                                                                    class="rounded-circle border border-2 border-white"
                                                                    width="33" height="33"
                                                                    alt="{{ $member->members->name }}">
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p class="fw-bold text-black mb-0">Kondisi Project:</p>
                                        <span class="{{ $project->getStatus()->color() }}  px-2 py-1 rounded-2">
                                            {{ $project->getStatus()->label() }}
                                        </span>
                                    </div>


                                    <div class="d-flex justify-content-between align-items-center mt-1">
                                        <p class="text-black mb-0">Deadline:</p>
                                        <small class="text-success fw-semibold">
                                            {{ \Carbon\Carbon::parse($project->start_date)->format('d/m/Y') }} -
                                            {{ \Carbon\Carbon::parse($project->end_date)->format('d/m/Y') }}
                                        </small>
                                    </div>

                                    <div class="d-flex justify-content-between mt-4">
                                        <button class="btn btn-light-danger text-danger w-50 me-2">Tolak</button>
                                        <button class="btn btn-light-success text-success w-50 ms-2"
                                            data-bs-toggle="modal" data-bs-target="#completeModal{{ $project->id }}"
                                            type="button">Terima</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        

                        
                        <!-- Modal Accept -->
                        <div class="modal fade" id="completeModal{{ $project->id }}" tabindex="-1"
                            aria-labelledby="completeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header d-flex align-items-center">
                                        <h5 class="modal-title" id="completeModalLabel">Konfirmasi</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Apakah anda yakin?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button"
                                            class="btn btn-light-danger text-danger font-medium waves-effect text-start"
                                            data-bs-dismiss="modal">Batal</button>
                                        <form action="{{ route('mentor.project-submissions.accept', $project->id) }}"
                                            method="post">
                                            @csrf
                                            @method('PATCH')
                                            <button class="btn btn-light-success text-success" type="submit">Ya, proyek telah
                                                Diterima</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @empty
                        <div class="d-flex justify-content-center align-items-center"
                            style="min-height: 300px; width: 100%;">
                            <div class="text-center">
                                <img src="{{ asset('assets-user/dist/images/products/empty-shopping-bag.gif') }}"
                                    alt="No Data" height="120px" />
                                <h3 class="mt-3">Data Masih Kosong</h3>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>


@endsection
