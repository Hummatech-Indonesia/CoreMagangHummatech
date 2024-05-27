@extends('admin.layouts.app')
@section('content')
<div class="card">
    <div class="card-body d-flex justify-content-between">
        <ul class="nav nav-pills nav-custom nav-custom-light" style="width: fit-content" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#done" role="tab">
                    Histori
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#on" role="tab">
                    Siswa
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#off" role="tab">
                    Tim
                </a>
            </li>
        </ul>
        <div class="me-2 col-xl-2 d-flex align-items-center gap-2">
            <label for="" class="mt-2">Filter: </label>
            <select class="form-control" data-choices name="choices-single-default" id="choices-single-default">
                <option value="">Semua</option>
                <option value="">Solo</option>
                <option value="">Premini</option>
                <option value="">Mini</option>
            </select>
        </div>
    </div>
</div>

<div class="tab-content text-muted">
    <div class="tab-pane active" id="done" role="tabpanel">
        <div class="row gap-2">
            @forelse ($finisheds as $presentation)
                <div class="card col-xl-4">
                    <div class="p-3 d-flex justify-content-between">
                        <p class="text-muted">{{ $presentation->end_date }}</p>
                        <div class="gap-2">
                            <p class="badge bg-success-subtle text-success">Premini Project</p>
                            <p class="badge bg-secondary-subtle text-secondary">Website</p>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex gap-4">
                            <img src="{{ asset('assets/images/users/avatar-3.jpg') }}" alt="" class="rounded avatar-sm shadow">
                            <div class="about">
                                <h4>{{ $presentation->hummataskTeam->name }}</h4>
                                <p class="text-muted">
                                    {{ $presentation->hummataskTeam->description }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end gap-3">
                        <p class="text-muted" style="position: relative; top: 10px">Anggota:</p>
                        <div class="avatar-group">
                            <a href="javascript: void(0);" class="avatar-group-item shadow" data-bs-toggle="tooltip" data-bs-placement="top" title="Christi">
                                <img src="{{ asset('assets/images/users/avatar-4.jpg') }}" alt="" class="rounded-circle avatar-xs">
                            </a>
                            <a href="javascript: void(0);" class="avatar-group-item shadow" data-bs-toggle="tooltip" data-bs-placement="top" title="Frank Hook">
                                <img src="{{ asset('assets/images/users/avatar-3.jpg') }}" alt="" class="rounded-circle avatar-xs">
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="py-5 mt-5">
                    <div class="d-flex justify-content-center mt-3">
                        <img src="{{ asset('no data.png') }}" width="200px"
                            alt="">
                    </div>
                    <h4 class="text-center mt-2 mb-4">
                        Belum ada tim yang selesai presentasi
                    </h4>
                </div>
            @endforelse
        </div>
    </div>
    <div class="tab-pane " id="on" role="tabpanel">
        <div class="row gap-2">
            @forelse ($ongoings as $presentation)
                <div class="card col-xl-4">
                    <div class="p-3 d-flex justify-content-between">
                        <p class="text-muted">{{ $presentation->end_date }}</p>
                        <div class="gap-2">
                            <p class="badge bg-success-subtle text-success">Premini Project</p>
                            <p class="badge bg-secondary-subtle text-secondary">Website</p>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex gap-4">
                            <img src="{{ asset('assets/images/users/avatar-3.jpg') }}" alt="" class="rounded avatar-sm shadow">
                            <div class="about">
                                <h4>{{ $presentation->hummataskTeam->name }}</h4>
                                <p class="text-muted">
                                    {{ $presentation->hummataskTeam->description }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end gap-3">
                        <p class="text-muted" style="position: relative; top: 10px">Anggota:</p>
                        <div class="avatar-group">
                            <a href="javascript: void(0);" class="avatar-group-item shadow" data-bs-toggle="tooltip" data-bs-placement="top" title="Christi">
                                <img src="{{ asset('assets/images/users/avatar-4.jpg') }}" alt="" class="rounded-circle avatar-xs">
                            </a>
                            <a href="javascript: void(0);" class="avatar-group-item shadow" data-bs-toggle="tooltip" data-bs-placement="top" title="Frank Hook">
                                <img src="{{ asset('assets/images/users/avatar-3.jpg') }}" alt="" class="rounded-circle avatar-xs">
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="py-5 mt-5">
                    <div class="d-flex justify-content-center mt-3">
                        <img src="{{ asset('no data.png') }}" width="200px"
                            alt="">
                    </div>
                    <h4 class="text-center mt-2 mb-4">
                        Tidak ada tim yang sedang presentasi
                    </h4>
                </div>
            @endforelse
        </div>
    </div>
    <div class="tab-pane " id="off" role="tabpanel">
        <div class="row gap-2">
            @forelse ($pendings as $presentation)
                <div class="card col-xl-4">
                    <div class="p-3 d-flex justify-content-between">
                        <p class="text-muted">{{ $presentation->start_date }} - {{$presentation->end_date}}</p>
                        <div class="gap-2">
                            <p class="badge bg-success-subtle text-success">Premini Project</p>
                            <p class="badge bg-secondary-subtle text-secondary">Website</p>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex gap-4">
                            <img src="{{ asset('assets/images/users/avatar-3.jpg') }}" alt="" class="rounded avatar-sm shadow">
                            <div class="about">
                                <h4>{{ $presentation->hummataskTeam->name }}</h4>
                                <p class="text-muted">
                                    {{ $presentation->hummataskTeam->description }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end gap-3">
                        <p class="text-muted" style="position: relative; top: 10px">Anggota:</p>
                        <div class="avatar-group">
                            <a href="javascript: void(0);" class="avatar-group-item shadow" data-bs-toggle="tooltip" data-bs-placement="top" title="Christi">
                                <img src="{{ asset('assets/images/users/avatar-4.jpg') }}" alt="" class="rounded-circle avatar-xs">
                            </a>
                            <a href="javascript: void(0);" class="avatar-group-item shadow" data-bs-toggle="tooltip" data-bs-placement="top" title="Frank Hook">
                                <img src="{{ asset('assets/images/users/avatar-3.jpg') }}" alt="" class="rounded-circle avatar-xs">
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="py-5 mt-5">
                    <div class="d-flex justify-content-center mt-3">
                        <img src="{{ asset('no data.png') }}" width="200px"
                            alt="">
                    </div>
                    <h4 class="text-center mt-2 mb-4">
                        Belum ada tim yang menunggu presentasi
                    </h4>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
@section('script')

    <script>
        $(document).ready(function() {
            function toggleTableResponsive() {
                var screenWidth = $(window).width();
                var $table = $('#responsive-team');
                if (screenWidth <= 880) {
                $table.addClass('py-4');
                } else {
                $table.removeClass('py-4');
                }
            }

            toggleTableResponsive();

            $(window).resize(function() {
                toggleTableResponsive();
            });
        });
    </script>
@endsection
