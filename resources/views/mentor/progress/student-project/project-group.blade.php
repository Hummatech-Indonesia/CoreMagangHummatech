@extends('mentor.layouts.app')
@section('content')

    <div class="d-flex justify-content-between w-100 mb-4 gap-2 navbar-shadow">
        <a class="text-decoration-none" href="{{ route('mentor.project-student') }}">
            <div class="back bg-light-info rounded p-3">
                <svg width="32" height="24" viewBox="0 0 36 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M1.27307 12.586C0.89813 12.9611 0.687499 13.4697 0.687499 14C0.687499 14.5303 0.89813 15.0389 1.27307 15.414L12.5871 26.728C12.7716 26.919 12.9923 27.0714 13.2363 27.1762C13.4803 27.281 13.7427 27.3362 14.0083 27.3385C14.2738 27.3408 14.5372 27.2902 14.783 27.1896C15.0288 27.0891 15.2521 26.9406 15.4399 26.7528C15.6276 26.565 15.7762 26.3417 15.8767 26.0959C15.9773 25.8501 16.0279 25.5868 16.0256 25.3212C16.0233 25.0556 15.9681 24.7932 15.8633 24.5492C15.7585 24.3052 15.6061 24.0845 15.4151 23.9L7.51507 16L34.0011 16C34.5315 16 35.0402 15.7893 35.4153 15.4142C35.7904 15.0391 36.0011 14.5304 36.0011 14C36.0011 13.4696 35.7904 12.9609 35.4153 12.5858C35.0402 12.2107 34.5315 12 34.0011 12L7.51507 12L15.4151 4.1C15.7794 3.72279 15.981 3.21759 15.9764 2.6932C15.9719 2.16881 15.7615 1.66718 15.3907 1.29637C15.0199 0.925548 14.5183 0.715209 13.9939 0.710653C13.4695 0.706096 12.9643 0.907684 12.5871 1.272L1.27307 12.586Z"
                        fill="#5D87FF" />
                </svg>
            </div>
        </a>
        <div class="bg-light-info w-100 d-flex justify-content-center align-items-center text-center rounded-2">
            <h2 class="text-primary fw-bolder fs-4 mb-0">Kumpulan Project {{ $student->name }}</h2>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-3 g-4">
        @forelse ($projects as $project)
            <div class="col">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <div class="d-flex justify-content-start align-items-center mb-3">
                            <span class="badge bg-light-primary text-primary px-3 py-2 rounded-2 fw-bolder">
                                {{ $project->type_project }}
                            </span>
                        </div>
                        <h5 class="fw-semibold">{{ $project->project_name }}</h5>
                        <p class="text-muted mb-1">By Kelompok {{ $project->members->first()?->members->name }}
                        </p>
                        <div class="mb-4">
                            @php($members = $project->members)

                            @if ($members->count() === 1)
                                <div class="d-flex justify-content-start">
                                    <a href="javascript:void(0)" class="me-1" data-bs-toggle="tooltip"
                                        data-bs-placement="top"
                                        aria-label="{{ $project->members->first()?->members->name }}"
                                        data-bs-original-title="{{ $project->members->first()?->members->name }}">
                                        <img src="{{ asset('assets-user/dist/images/profile/user-2.jpg') }}" alt="Avatar"
                                            class="rounded-circle shadow-sm img-fluid" width="33" height="33">
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
                                                        class="rounded-circle border border-2 border-white" width="33"
                                                        height="33" alt="{{ $member->members->name }}">
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="fw-bold text-black mb-0">Kondisi Project:</p>
                            <span class="{{ $project->getProjectStatus()->color() }}  px-3 py-1 rounded-2">
                                {{ $project->getProjectStatus()->label() }}
                            </span>
                        </div>


                        <div class="d-flex justify-content-between align-items-center mt-1">
                            <p class="text-black mb-0">Deadline:</p>
                            <small class="{{ $project->getProjectStatus()->color() }} bg-transparent fw-semibold">
                                {{ \Carbon\Carbon::parse($project->start_date)->format('d/m/Y') }} -
                                {{ \Carbon\Carbon::parse($project->end_date)->format('d/m/Y') }}
                            </small>
                        </div>

                        <div class="d-flex justify-content-center mt-4">
                            <a href="{{ route('mentor.progress-project.detail', $project->id) }}"
                                class="btn btn-primary w-100 ms-2" type="button">Detail Progress</a>
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
