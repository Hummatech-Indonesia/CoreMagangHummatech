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
                        </div>
                        <h5 class="fw-semibold">{{ $project->project_name }}</h5>
                        <p class="text-muted mb-1">By Kelompok
                            {{ $project->members->first()?->members->name }}
                        </p>
                        <div class="mb-4">
                            @php($members = $project->members)

                                @if ($members->count() === 1)
                                    <div class="d-flex justify-content-start">
                                        @if (file_exists(public_path('storage/' . $members->first()?->members->avatar)))
                                            <a href="javascript:void(0)" class="me-1" data-bs-toggle="tooltip"
                                                data-bs-placement="top" aria-label="{{ $members->name }}"
                                                data-bs-original-title="{{ $members->name }}">
                                                <img src="{{ asset('storage/' . $members->first()?->members->avatar) }}"
                                                    alt="Avatar" class="rounded-circle border border-2 border-white"
                                                    width="33" height="33">
                                            </a>
                                        @else
                                            <a href="javascript:void(0)" class="me-1" data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                aria-label="{{ $members->first()?->members->name }}"
                                                data-bs-original-title="{{ $members->first()?->members->name }}">

                                                @if ($members->first()?->members->gender == \App\Enum\GenderEnum::MALE->value)
                                                    <img src="{{ asset('assets-user/dist/images/profile/user-1.jpg') }}"
                                                        alt="Avatar"
                                                        class="rounded-circle border border-2 border-white"
                                                        width="33" height="33">
                                                @elseif ($members->first()?->members->gender == \App\Enum\GenderEnum::FEMALE->value)
                                                    <img src="{{ asset('assets-user/dist/images/profile/user-2.jpg') }}"
                                                        alt="Avatar"
                                                        class="rounded-circle border border-2 border-white"
                                                        width="33" height="33">
                                                @endif
                                            </a>
                                        @endif
                                    </div>
                                @elseif ($members->count() > 1)
                                    <div class="d-flex justify-content-start">
                                        <ul class="hstack mb-0">
                                            @foreach ($members as $index => $member)
                                                <li class="{{ $index > 0 ? 'ms-n8' : '' }}">
                                                    @if (file_exists(public_path('storage/' . $member->members->avatar)))
                                                        <a href="javascript:void(0)" class="me-1"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            aria-label="{{ $member->$members->name }}"
                                                            data-bs-original-title="{{ $member->$members->name }}">
                                                            <img src="{{ asset('storage/' . $member->members->avatar) }}"
                                                                alt="Avatar"
                                                                class="rounded-circle border border-2 border-white"
                                                                width="33" height="33">
                                                        </a>
                                                    @else
                                                        <a href="javascript:void(0)" class="me-1"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            aria-label="{{ $member->members->name }}"
                                                            data-bs-original-title="{{ $member->members->name }}">

                                                            @if ($member->members->gender == \App\Enum\GenderEnum::MALE->value)
                                                                <img src="{{ asset('assets-user/dist/images/profile/user-1.jpg') }}"
                                                                    alt="Avatar"
                                                                    class="rounded-circle border border-2 border-white"
                                                                    width="33" height="33">
                                                            @elseif ($member->members->gender == \App\Enum\GenderEnum::FEMALE->value)
                                                                <img src="{{ asset('assets-user/dist/images/profile/user-2.jpg') }}"
                                                                    alt="Avatar"
                                                                    class="rounded-circle border border-2 border-white"
                                                                    width="33" height="33">
                                                            @endif
                                                        </a>
                                                    @endif
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
                            <a class="btn btn-primary w-100"
                                href="{{ route('mentor.project-submissions.show', $project->id) }}">Detail Project</a>
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
