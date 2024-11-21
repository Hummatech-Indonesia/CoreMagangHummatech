@extends('mentor.layouts.app')

@section('content')
    <div class="container-fluid">

        <div class="d-flex justify-content-between w-100 mb-4 gap-2 navbar-shadow">
            <a class="text-decoration-none" href="/mentor/project-submissions">
                <div class="back bg-light-info rounded p-3">
                    <svg width="32" height="24" viewBox="0 0 36 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M1.27307 12.586C0.89813 12.9611 0.687499 13.4697 0.687499 14C0.687499 14.5303 0.89813 15.0389 1.27307 15.414L12.5871 26.728C12.7716 26.919 12.9923 27.0714 13.2363 27.1762C13.4803 27.281 13.7427 27.3362 14.0083 27.3385C14.2738 27.3408 14.5372 27.2902 14.783 27.1896C15.0288 27.0891 15.2521 26.9406 15.4399 26.7528C15.6276 26.565 15.7762 26.3417 15.8767 26.0959C15.9773 25.8501 16.0279 25.5868 16.0256 25.3212C16.0233 25.0556 15.9681 24.7932 15.8633 24.5492C15.7585 24.3052 15.6061 24.0845 15.4151 23.9L7.51507 16L34.0011 16C34.5315 16 35.0402 15.7893 35.4153 15.4142C35.7904 15.0391 36.0011 14.5304 36.0011 14C36.0011 13.4696 35.7904 12.9609 35.4153 12.5858C35.0402 12.2107 34.5315 12 34.0011 12L7.51507 12L15.4151 4.1C15.7794 3.72279 15.981 3.21759 15.9764 2.6932C15.9719 2.16881 15.7615 1.66718 15.3907 1.29637C15.0199 0.925548 14.5183 0.715209 13.9939 0.710653C13.4695 0.706096 12.9643 0.907684 12.5871 1.272L1.27307 12.586Z"
                            fill="#5D87FF" />
                    </svg>
                </div>
            </a>
            <div class="bg-light-info w-100 d-flex justify-content-center align-items-center text-center rounded-2">
                <h2 class="text-primary fw-bolder fs-4">Detail Project</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7">
                <div class="card px-3 pb-4 mb-4 rounded-sm">
                    <div class="row g-2 mt-3">
                        <div class="col-lg-4 col-md-6 col-sm-12 d-flex align-items-center ">
                            <h6 class="mx-1 mb-0">Informasi Project</h6>
                        </div>
                    </div>
                </div>

                <div class="card card-body">
                    <div class="col-md-3 mb-3">
                        <h6 class="fw-semibold">Status</h6>
                        <span class="{{ $project->getStatus()->color() }}  px-2 py-1 rounded-pill">
                            {{ $project->getStatus()->label() }}
                        </span>
                    </div>

                    <div class="mb-3">
                        <h6 class="fw-semibold">Kategori Project</h6>
                        <input type="text" class="form-control" value="{{ $project->type_project }}" />
                    </div>
                    <div class="mb-3">
                        <h6 class="fw-semibold">Descripsi Project Project</h6>
                        <textarea class="form-control" rows="5">{{ $project->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <h6 class="fw-semibold">Link Repository Github (Opsional)</h6>
                        <input type="text" class="form-control" value="{{ $project->link }}"
                            placeholder="https://...." />
                    </div>
                    <div class="mb-3">
                        <h6 class="fw-semibold">Waktu Pengerjaan</h6>
                        <p class="fs-3">
                            {{ \Carbon\Carbon::parse($project->start_date)->format('d/m/Y') }} -
                            {{ \Carbon\Carbon::parse($project->end_date)->format('d/m/Y') }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card px-3 pb-4 mb-4 rounded-sm">
                    <div class="row g-2 mt-3">
                        <div class="col-lg-4 col-md-6 col-sm-12 d-flex align-items-center ">
                            <h6 class="mx-1 mb-0">Anggota</h6>
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
                                                        <img src="{{ asset('assets-user/dist/images/profile/user-1.jpg') }}"
                                                            class="rounded-circle" alt="user" width="40" />
                                                        <span>{{ $member->members->name }}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span @class([
                                                        'text-warning' => $member->status == 'Leader',
                                                        'text-primary' => $member->status == 'Member',
                                                    ])>
                                                        @php($array = ['Leader' => 'Ketua', 'Member' => 'Anggota'])

                                                        {{ $array[$member->status] }}
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

    </div>
@endsection
