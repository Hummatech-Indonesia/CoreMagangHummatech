@extends('mentor.layouts.app')
@section('style')
    <style>
        @media (max-width: 767px) {
            #offcanvasRight {
                width: 100%;
            }
        }

        @media (min-width: 768px) and (max-width: 991px) {
            #offcanvasRight {
                width: 50%;
            }
        }

        @media (min-width: 992px) {
            #offcanvasRight {
                width: 25%;
            }
        }
    </style>
@endsection
@section('content')
    <div class="row mb-3">
        <div class="col-md-4 col-xl-2 col-sm-4">
            <form class="position-relative">
                <input type="text" class="form-control product-search ps-5" id="input-search" placeholder="Cari projek...">
                <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
            </form>
        </div>
    </div>

    <div class="row  mt-5">
    @forelse ($teams as $team)
    @if (!App\Models\Project::where('hummatask_team_id', $team->id)->where('status', 'accepted')->first())
        <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-body py-1 px-2">
                    <div class="d-flex justify-content-end">
                    <button type="button" class="bg-info rounded-1 text-white py-1 px-2 border-0 mt-2 btn-delete" data-id="{{ $team->id }}">
                        <i class="ti ti-trash fs-6"></i>
                    </button>
                    </div>
                    <div class="text-center row justify-content-center align-items-center">
                        <div class="bg-primary rounded rounded-2 text-white d-flex align-items-center justify-content-center text-uppercase" style="width: 5pc; height: 5pc; position: relative;">
                            <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);" class="fs-2">
                                {{ $team->categoryProject->name }}
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-center p-3">
                            <a href="#{{ $team->student->name }}" title="{{ $team->student->name }}">
                                @if(Storage::disk('public')->exists($team->student->avatar))
                                    <img src="{{ asset('storage/' . $team->student->avatar) }}"
                                        class="rounded-circle me-n3 card-hover border border-white" width="32"
                                        height="32">
                                @else
                                    @php
                                        $firstLetter = substr($team->student->name, 0, 1);
                                        $firstLetter = strtoupper($firstLetter);
                                        $backgroundColors = [
                                            '#ff5722',
                                            '#4caf50',
                                            '#2196f3',
                                        ];
                                        $backgroundColor = $backgroundColors[ord($firstLetter) % count($backgroundColors)];
                                    @endphp
                                    <div style="background-color: {{ $backgroundColor }}; width: 32px; height: 32px; border-radius: 50%; display: flex; justify-content: center; align-items: center;" class="me-n3">
                                        <span style="color: white; font-size: 15px;">{{ $firstLetter }}</span>
                                    </div>
                                @endif
                            </a>
                            @if ($team->categoryProject->name == 'solo project')

                            @else
                                @foreach (App\Models\StudentTeam::where('hummatask_team_id', $team->id)->get() as $student)
                                    <a href="#{{ $student->student->name }}" title="{{ $student->student->name }}">
                                        @if(Storage::disk('public')->exists($student->student->avatar))
                                            <img src="{{ asset('storage/' . $student->student->avatar) }}"
                                                class="rounded-circle me-n4 card-hover border border-white" width="32"
                                                height="32">
                                        @else
                                            @php
                                                $firstLetter = substr($student->student->name, 0, 1);
                                                $firstLetter = strtoupper($firstLetter);
                                                $backgroundColors = [
                                                    '#ff5722',
                                                    '#4caf50',
                                                    '#2196f3',
                                                ];
                                                $backgroundColor = $backgroundColors[ord($firstLetter) % count($backgroundColors)];
                                            @endphp
                                            <div style="background-color: {{ $backgroundColor }}; width: 32px; height: 32px; border-radius: 50%; display: flex; justify-content: center; align-items: center;" class="me-n3">
                                                <span style="color: white; font-size: 15px;">{{ $firstLetter }}</span>
                                            </div>
                                        @endif
                                    </a>
                                @endforeach
                            @endif
                        </div>
                        <h5 style="font-weight: 700" class="text-capitalize">{{ $team->name }}</h5>
                        <p>{{ $team->description }}</p>
                        <div class="px-3 pb-3">
                            <div class="d-flex justify-content-between">
                                <h6>Kondisi Tim</h6>
                                <span class="mb-1 badge font-medium bg-light-{{ $team->project_id != null ? $team->project->status->color()  : 'warning' }} text-{{ $team->project_id != null ? $team->project->status->color()  : 'warning' }}">{{  $team->project_id != null ? $team->project->status->label()  : 'Belum Aktif' }}</span>
                            </div>
                            <div class="d-flex justify-content-between py-1">
                                <h6>Deadline:</h6>
                                <p class="text-danger">{{ $team->project_id != null ? $team->project->end_date  : '-' }}</p>
                            </div>
                            <a href="{{ route('project-submission.detail', ['slug' => $team->slug]) }}" class="btn btn-primary col-12">Lihat detail</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @empty
        <div class="mb-2 mt-5 text-center" style="margin: 0 auto;">
            <img src="{{ asset('empty-asset.png') }}" alt="" width="150px" srcset="">
            <p class="fs-4 text-dark">
                Belum Ada Tim Yang Mengajukan Projek
            </p>
        </div>
    @endforelse
    </div>

    @include('admin.components.delete-modal-component')
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $('.btn-delete').on('click', function() {
            var id = $(this).data('id');
            $('#form-delete').attr('action', '/hummateam/team/' + id);
            $('#modal-delete').modal('show');
        });
    </script>
@endsection
