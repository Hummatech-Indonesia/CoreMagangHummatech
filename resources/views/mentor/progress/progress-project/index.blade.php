@extends('mentor.layouts.app')
@section('content')
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Progress Project</h4>
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

    <div class="card py-3">
        <div class="d-flex justify-content-end">
            <div class="col-md-12 ">
                <form class="row g-3 align-items-center justify-content-end me-3"
                    action="{{ route('mentor.progress-project') }}">
                    <div class="col-md-3 position-relative">
                        <input type="text"
                            class="form-control product-search ps-5 p-3 text-primary border-0 bg-light-primary"
                            name="search" value="{{ request('search') }}" id="input-search"
                            placeholder="Cari nama proyek...">
                        <i
                            class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-primary ms-4"></i>
                    </div>

                    <div class="col-md-3">
                        <div class="input-group">
                            <span class="input-group-text bg-primary text-white border-0">
                                <i class="ti ti-calendar"></i>
                            </span>
                            <input type="date" class="form-control text-primary bg-light-primary p-3 border-0"
                                name="start_date" value="{{ request('start_date') }}" placeholder="Tanggal mulai"
                                onchange="this.form.submit()">
                        </div>
                    </div>

                    <div class="col-md-2">
                        <form method="GET" action="{{ url()->current() }}">
                            <select name="type_project" class="form-select py-3 border-0 bg-light-primary text-primary"
                                onchange="this.form.submit()">
                                <option value="">Kategori Project</option>
                                <option value="{{ \App\Enum\PresentationTypeEnum::SOLO->value }}"
                                    @if (request('type_project') == \App\Enum\PresentationTypeEnum::SOLO->value) selected @endif>
                                    Solo Project
                                </option>
                                <option value="{{ \App\Enum\PresentationTypeEnum::PREMINI->value }}"
                                    @if (request('type_project') == \App\Enum\PresentationTypeEnum::PREMINI->value) selected @endif>
                                    Premini Project
                                </option>
                                <option value="{{ \App\Enum\PresentationTypeEnum::MINI->value }}"
                                    @if (request('type_project') == \App\Enum\PresentationTypeEnum::MINI->value) selected @endif>
                                    Mini Project
                                </option>
                                <option value="{{ \App\Enum\PresentationTypeEnum::BIG->value }}"
                                    @if (request('type_project') == \App\Enum\PresentationTypeEnum::BIG->value) selected @endif>
                                    Big Project
                                </option>
                            </select>
                        </form>
                    </div>


                </form>
            </div>
        </div>
    </div>



    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-3 g-4">
        @forelse ($projects as $project)
            <div class="col">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
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
    {{ $projects->links() }}
@endsection
