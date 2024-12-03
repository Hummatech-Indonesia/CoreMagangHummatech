<div class="tab-pane {{ request()->has('history_page') ? 'active' : '' }}" id="history-submissions" role="tabpanel">
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
                            </div>
                        </div>
                        <h5 class="fw-semibold">{{ $project->project_name }}</h5>
                        <p class="text-muted mb-1">By Kelompok
                            {{ $project->members->first()?->members->name }}
                        </p>
                        <div class="mb-4">
                            @php($members = $project->members)

                            @if ($members->count() === 1)
                                <div class="d-flex justify-content-start">
                                    <a href="javascript:void(0)" class="me-1" data-bs-toggle="tooltip"
                                        data-bs-placement="top"
                                        aria-label="{{ $project->members->first()?->members->name }}"
                                        data-bs-original-title="{{ $project->members->first()?->members->name }}">
                                        <img src="{{ asset('assets-user/dist/images/profile/user-2.jpg') }}"
                                            alt="Avatar" class="rounded-circle shadow-sm img-fluid" width="33"
                                            height="33">
                                    </a>
                                </div>
                            @elseif ($members->count() > 1)
                                <div class="d-flex justify-content-start">
                                    <ul class="hstack mb-0">
                                        @foreach ($members as $index => $member)
                                            <li class="{{ $index > 0 ? 'ms-n8' : '' }}">
                                                <a href="javascript:void(0)" class="me-1" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" aria-label="{{ $member->members->name }}"
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
    {{ $history_projects->appends(['history_page' => request('history_page')])->links() }}
</div>
