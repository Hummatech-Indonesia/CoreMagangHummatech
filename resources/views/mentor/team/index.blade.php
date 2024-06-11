@extends('mentor.layouts.app')
@section('style')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
            <input type="text" class="form-control product-search ps-5" id="input-search" placeholder="Cari tim...">
            <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
        </form>
    </div>
    <div class="ms-auto text-end" style="margin-top: -38px">
        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#add-team">
            Buat Tim
        </button>
    </div>
</div>

<div class="row mt-5">
    @forelse ($teams as $team)
        <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-12 mb-5 mt-3" style="height: 20pc">
            <div class="card">
                <div class="card-body py-1 px-2">
                    <div class="d-flex justify-content-end">
                        <button type="button" class="bg-info rounded-1 text-white py-1 px-2 border-0 mt-2 btn-delete"
                            data-id="{{ $team->id }}">
                            <i class="ti ti-trash fs-6"></i>
                        </button>
                    </div>
                    <div class="text-center row justify-content-center align-items-center">
                        <div class="bg-primary rounded rounded-2 text-white d-flex align-items-center justify-content-center text-uppercase"
                            style="width: 5pc; height: 5pc; position: relative;">
                            <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);"
                                class="fs-2">
                                {{ $team->categoryProject->name }}
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-center p-3">
                            <a href="#{{ $team->student->name }}" title="{{ $team->student->name }}">
                                @if(Storage::disk('public')->exists($team->student->avatar))
                                    <img src="{{ asset('storage/' . $team->student->avatar) }}"
                                        class="rounded-circle me-n3 card-hover border border-white" width="32" height="32">
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
                                    <div style="background-color: {{ $backgroundColor }}; width: 32px; height: 32px; border-radius: 50%; display: flex; justify-content: center; align-items: center;"
                                        class="me-n3">
                                        <span style="color: white; font-size: 15px;">{{ $firstLetter }}</span>
                                    </div>
                                @endif
                            </a>
                            @if ($team->category_project_id == 1)

                            @else
                                @foreach (App\Models\StudentTeam::where('hummatask_team_id', $team->id)->get() as $student)
                                    <a href="#{{ $student->student->name }}" title="{{ $student->student->name }}">
                                        @if(Storage::disk('public')->exists($student->student->avatar))
                                            <img src="{{ asset('storage/' . $student->student->avatar) }}"
                                                class="rounded-circle me-n4 card-hover border border-white" width="32" height="32">
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
                                            <div style="background-color: {{ $backgroundColor }}; width: 32px; height: 32px; border-radius: 50%; display: flex; justify-content: center; align-items: center;"
                                                class="me-n3">
                                                <span style="color: white; font-size: 15px;">{{ $firstLetter }}</span>
                                            </div>
                                        @endif
                                    </a>
                                @endforeach
                            @endif
                        </div>
                        <h5 style="font-weight: 700" class="text-capitalize">{{ $team->name }}</h5>
                        <p>{{ Str::limit($team->description, 40) }}</p>
                        @php
                            $project = App\Models\Project::where('hummatask_team_id', $team->id)->where(
                                'status',
                                'accepted'
                            )->first()
                        @endphp
                        <div class="px-3 pb-3">
                            <div class="d-flex justify-content-between">
                                <h6>Kondisi Tim</h6>
                                <span
                                    class="mb-1 badge font-medium bg-light-{{ $team->status->color() }} text-{{ $team->status->color() }}">{{  $team->status->label() }}</span>
                            </div>
                            <div class="d-flex justify-content-between py-1">
                                <h6>Deadline:</h6>
                                @if ($project)
                                    <p class="text-danger">
                                        {{ \Carbon\Carbon::parse($project->end_date)->locale('id')->isoFormat('dddd, D MMMM Y') }}
                                    </p>
                                @else
                                    <p class="text-danger">-</p>
                                @endif
                            </div>
                            <a href="{{ route('mentor.team-detail', ['slug' => $team->slug]) }}"
                                class="btn btn-primary col-12">Lihat detail</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="mb-2 mt-5 text-center" style="margin: 0 auto;">
            <img src="{{ asset('empty-asset.png') }}" alt="" width="150px" srcset="">
            <p class="fs-5 text-dark">
                Belum Ada Team
            </p>
        </div>
    @endforelse
</div>

<div class="modal fade" id="add-team" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title px-3" id="staticBackdropLabel">Buat Tim Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('team.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                        <div class="mx-3">
                            <label for="" class="mt-1 mb-1">Nama Tim</label>
                            <input type="text" name="name" class="form-control" placeholder="Masukkan nama tim"
                                value="{{ old('name') }}">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <label for="" class="mt-2 mb-1">Kategori projek</label>
                            <select class="select2 form-control custom-select" style="width: 100%; height: 36px"
                                name="category_project_id">
                                <option>Pilih kategori projek</option>
                                @forelse ($categoryProjects as $categoryProject)
                                    <option value="{{ $categoryProject->id }}">{{ $categoryProject->name }}</option>
                                @empty
                                    <option disabled>Belum ada kategori projek</option>
                                @endforelse
                            </select>
                            @error('category_project_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <label for="" class="mt-2 mb-1">Ketua tim</label>
                            <select class="select2 form-control custom-select" style="width: 100%; height: 36px"
                                name="leader">
                                <option>Pilih ketua tim</option>
                                @forelse ($mentorStudents as $mentorStudent)
                                    <option value="{{ $mentorStudent->student->id }}">{{ $mentorStudent->student->name }}
                                    </option>
                                @empty
                                    <option disabled>Tidak ada siswa</option>
                                @endforelse
                            </select>
                            @error('leader')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                            <div class="mb-3 mt-2 col-md-12">
                                <label for="bm-title">Anggota tim</label>
                                <select class="select2 form-control custom-select" style="width: 100%; height: 36px"
                                    name="student_id[]">
                                    <option>Pilih anggota tim</option>
                                    @forelse ($mentorStudents as $mentorStudent)
                                        <option value="{{ $mentorStudent->student->id }}">
                                            {{ $mentorStudent->student->name }}
                                        </option>
                                    @empty
                                        <option>Tidak ada siswa</option>
                                    @endforelse
                                </select>
                                @error('student_id.*')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror

                                <div id="member"></div>

                                <button type="button" class="btn add-button-trigger btn-primary mt-3">Tambah
                                    anggota</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-danger text-danger"
                        data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

@include('admin.components.delete-modal-component')
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $('.btn-delete').on('click', function () {
        var id = $(this).data('id');
        $('#form-delete').attr('action', '/hummateam/team/' + id);
        $('#modal-delete').modal('show');
    });

    $('.select2').select2({
        dropdownParent: $('#add-team')
    });


    const deleteElement = (id) => $('#' + id).remove();

    (() => {
        $('.add-button-trigger').click((e) => {
            let idInput = 'input_' + Math.random().toString(36).substr(2, 9); // Generate random id
            let target = $(e.target).parent().find('#member');
            target.append(`<div class="d-flex align-items-center mt-3 gap-2" id="${idInput}">
                    <select class="select2 form-control custom-select" style="width: 100%; height: 36px"
                        name="student_id[]">
                        <option>Pilih anggota tim</option>
                        @forelse ($mentorStudents as $mentorStudent)
                            <option value="{{ $mentorStudent->student->id }}">{{ $mentorStudent->student->name }}</option>
                        @empty
                            <option>Tidak ada siswa</option>
                        @endforelse
                    </select>
                <button onclick="deleteElement('${idInput}')" type="button" class="btn delete-trigger px-3 mt-0 btn-danger"><i class="fas fa-trash"></i></button>
                </div>`);
        });

        $('.btn-close').click((e) => {
            let target = $(e.target).parent('.modal').find('.delete-trigger');
            target.each((i, el) => $(el).click());
        });
    })();
</script>
@endsection