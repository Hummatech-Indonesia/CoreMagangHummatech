@extends('mentor.layouts.app')
@section('style')
<style>

@media (max-width: 767px) {
  #offcanvasRight { width: 100%; }
}

@media (min-width: 768px) and (max-width: 991px) {
  #offcanvasRight { width: 50%; }
}

@media (min-width: 992px) {
  #offcanvasRight { width: 25%; }
}
</style>
@endsection
@section('content')
@php
    $studentTeam = App\Models\StudentTeam::where('hummatask_team_id', $team->id)->get();
    $project = App\Models\Project::where('hummatask_team_id', $team->id)->where('status', 'accepted')->first();
@endphp
<div class="d-flex gap-3 justify-content-end mb-3">
  <a href="{{ route('mentor-team.edit', ['slug' => $team->slug]) }}" class="btn btn-light-info text-info edit-team-btn">Edit Tim</a>
  <a href="/mentor/team" class="btn btn-primary">Kembali</a>
</div>
<div class="row">
  <div class="col-lg-7">
    <div class="card w-100 p-4 bg-light-info overflow-hidden shadow-none">
      <div class="d-flex gap-4">
        <div class="text-center align-content-center ">
          <div class="bg-primary rounded rounded-2 text-white d-flex align-items-center justify-content-center text-uppercase" style="width: 6pc; height: 6pc; position: relative;">
            <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                {{ $team->categoryProject->name }}
            </div>
          </div>
        </div>
        <div class="description">
          <h3 class="text-primary text-capitalize" style="font-weight: 700">{{ $team->name }}</h3>
          <p class="text-muted m-0">{{ ($team->project_id != null) ? $team->project->description : ($team->hummataskTeam->description ?? '') }}</p>
          <p class="m-0">Mentor: {{ auth()->user()->mentor->name }}</p>
          <p class="text-danger m-0">Deadline: {{ $done ? \Carbon\Carbon::parse($done->end_date)->locale('id')->isoFormat('dddd, D MMMM Y')  : '-' }}</p>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-body px-4 py-3">
        <h5 class="p-0 m-0">Anggota</h5>
      </div>
    </div>
    <div class="d-flex align-items-strech">
      <div class="card w-100">
        <div class="card-body pt-1">
          <div class="table-responsive">
            <table class="table align-middle text-nowrap mb-0">
              <thead>
                <tr class="text-muted fw-semibold">
                  <th scope="col" class="ps-0" style="width: 3.5pc">No</th>
                  <th scope="col">Nama</th>
                </tr>
              </thead>
              <tbody class="border-top">
                @if ($team->category_project_id != 1)
                  <tr>
                    <td>
                      <p class="mb-0 fs-3">1</p>
                    </td>
                    <td class="ps-0">
                      <div class="d-flex align-items-center">
                        <div class="me-2 pe-1">
                          @if(Storage::disk('public')->exists($team->student->avatar))
                            <img src="{{ asset('storage/' . $team->student->avatar) }}" alt="avatar" class="rounded-circle mb-3" width="40px" height="40px" >
                          @else
                            <img src="{{ asset('user.webp') }}" alt="default avatar" class="rounded-circle mb-3" width="40px" height="40px">
                          @endif
                        </div>
                        <div>
                          <h6 class="fw-semibold mb-1">{{ $team->student->name }}</h6>
                          <p class="fs-2 mb-0 text-muted">Ketua</p>
                        </div>
                      </div>
                    </td>
                  </tr>
                @endif
                @foreach ($studentTeam as $key => $student)
                  <tr>
                    <td>
                      <p class="mb-0 fs-3">{{ $team->category_project_id != 1 ? (++$key + 1) : 1 }}</p>
                    </td>
                    <td class="ps-0">
                      <div class="d-flex align-items-center">
                        <div class="me-2 pe-1">
                          @if(Storage::disk('public')->exists($student->student->avatar))
                            <img src="{{ asset('storage/' . $student->student->avatar) }}" alt="avatar" class="rounded-circle mb-3" width="40px" height="40px" >
                          @else
                            <img src="{{ asset('user.webp') }}" alt="default avatar" class="rounded-circle mb-3" width="40px" height="40px">
                          @endif
                        </div>
                        <div>
                          <h6 class="fw-semibold mb-1">{{ $student->student->name }}</h6>
                          <p class="fs-2 mb-0 text-muted">Anggota</p>
                        </div>
                      </div>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-5 d-flex align-items-stretch">
    <div class="card">
      <div class="card-body">
        <h5>Progress tim</h5>
            <div id="chart-progres" class="pt-4"></div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body px-4 py-3">
        <h5 class="p-0 m-0">Riwayat presentasi</h5>
      </div>
    </div>
  </div>
</div>
<div class="d-flex align-items-strech">
  <div class="card w-100">
    <div class="card-body pt-1">
      <div class="table-responsive">
        <table class="table align-middle text-nowrap mb-0">
          <thead>
            <tr class="text-muted fw-semibold">
              <th scope="col" class="ps-0" style="width: 3.5pc">No</th>
              <th scope="col">Judul</th>
              <th scope="col">Tanggal</th>
              <th scope="col">Status presentasi</th>
              <th scope="col">Jadwal</th>
              <th scope="col" class="text-center">Aksi</th>
            </tr>
          </thead>
          <tbody class="border-top">
            @forelse ($presentationHistories as $presentationHistory)
              <tr>
                <td>
                  <p class="mb-0 fs-3">{{ $loop->iteration }}.</p>
                </td>
                <td class="ps-0">
                  <h6 class="fw-semibold mb-1">{{ $presentationHistory->title }}</h6>
                </td>
                <td>
                  <p class="fs-3 text-dark mb-0">{{ \Carbon\Carbon::parse($presentationHistory->created_at)->locale('id')->isoFormat('dddd, D MMMM Y') }}</p>
                </td>
                <td>
                  <p class="fs-3 text-{{ $presentationHistory->status_presentation->color()  }} mb-0 bg-light-{{ $presentationHistory->status_presentation->color()  }} badge">{{ $presentationHistory->status_presentation->label() }}</p>
                </td>
                <td>
                  <p class="fs-3 text-dark mb-0">{{ $presentationHistory->schedule_to }}</p>
                </td>
                <td class="d-flex gap-2 justify-content-center">
                  <button class="text-primary show-btn badge border-0 bg-light-primary"
                  data-id="{{ $presentationHistory->id }}"
                  data-title="{{ $presentationHistory->title }}"
                  data-description="{{ $presentationHistory->description }}"
                  data-date="{{ \Carbon\Carbon::parse($presentationHistory->created_at)->locale('id')->isoFormat('dddd, D MMMM Y') }}"
                  data-callback="{{ $presentationHistory->callback != null ? $presentationHistory->callback : 'Belum ada tanggapan' }}"
                  data-schedule-to="{{ $presentationHistory->schedule_to }}"
                  data-start-date="{{ $presentationHistory->start_date }}"
                  data-end-date="{{ $presentationHistory->end_date }}"
                  >
                    <i class="ti ti-eye fs-5"></i>
                  </button>
                  @if ($presentationHistory->status_presentation == 'finish')
                    <button class="text-warning callback-btn badge border-0 bg-light-warning"
                    data-id="{{ $presentationHistory->id }}"
                    >
                      <i class="ti ti-send fs-5"></i>
                    </button>
                  @endif
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="6">
                  <div class="mb-2 mt-5 text-center" style="margin: 0 auto;">
                    <img src="{{ asset('empty-asset.png') }}" alt="" width="100px" srcset="">
                    <p class="fs-3 text-dark text-capitalize">
                        Tim {{ $team->name }} Belum Pernah Presentasi
                    </p>
                  </div>
                </td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="show-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title px-2" id="staticBackdropLabel">Detail presentasi</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body px-4">
          <div class="d-flex justify-content-between border-bottom">
            <h6><b>Judul</b></h6>
            <p id="title" class="mb-0"></p>
          </div>
          <div class="d-flex justify-content-between border-bottom mt-2">
            <h6><b>Tanggal</b></h6>
            <p id="date" class="mb-0"></p>
          </div>
          <div class="d-flex justify-content-between border-bottom mt-2">
            <h6><b>Jadwal</b></h6>
            <p id="schedule_to" class="mb-0"></p>
          </div>
          <div class="card p-3 mt-4 mb-2 shadow-sm">
            <span><b>Deskripsi</b></span>
            <span id="description" class="fs-2"></span>
          </div>
          <div class="card p-3 mt-3 shadow-sm mb-0">
            <span><b>Feedback dari Mentor</b></span>
            <span id="callback" class="fs-2"></span>
          </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-light-danger text-danger"
                data-bs-dismiss="modal">Tutup</button>
        </div>
    </div>
</div>
</div>

<div class="modal fade" id="callback-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog modal-md">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title px-3" id="staticBackdropLabel">Kirim tanggapan</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST" enctype="multipart/form-data" id="form-callback">
          @csrf
          @method('PATCH')
          <div class="modal-body">
              <div class="px-3">
                <label for="callback" class="mb-2">Berikan tanggapan</label>
              <textarea name="callback" id="callback" rows="5" class="form-control">{{ old('callback') }}</textarea>
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

<div class="modal fade" id="edit-team-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title px-3" id="staticBackdropLabel">Edit Tim</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('team.update', $team->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-body">
                <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                    <div class="mx-3">
                        <label for="" class="mt-1 mb-1">Nama Tim</label>
                        <input type="text" name="name" class="form-control" placeholder="Masukkan nama tim"
                            value="{{ old('name', $team->name) }}">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <label for="" class="mt-2 mb-1">Kategori projek</label>
                        <select class="select2 form-control custom-select" style="width: 100%; height: 36px"
                            name="category_project_id">
                            <option disabled>Pilih kategori projek</option>
                            @forelse ($categoryProjects as $categoryProject)
                                <option value="{{ $categoryProject->id }}" {{ $team->category_project_id == $categoryProject->id ? 'selected' : '' }}>{{ $categoryProject->name }}</option>
                            @empty
                                <option disabled>Belum ada kategori projek</option>
                            @endforelse
                        </select>
                        @error('category_project_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        @if ($project && $project->end_date != null)
                          <label for="deadline" class="mt-2 mb-1">Deadline</label>
                          <input type="date" name="end_date" id="edit-deadline" class="form-control">
                          @error('end_date')
                              <p class="text-danger">{{ $message }}</p>
                          @enderror
                        @endif
                        <label for="deadline" class="mt-3 mb-1">Status tim</label>
                        <div class="d-flex">
                          <div class="me-3">
                            <input type="radio" name="status" id="active" class="me-1" {{ $project && $project->status == 'accepted' ? 'checked' : '' }}>Aktif
                          </div>
                          <div class="">
                            <input type="radio" name="status" id="non-active" class="me-1" {{ !$project || $project->status != 'accepted' ? 'checked' : '' }}>Tidak Aktif
                          </div>
                        </div>
                        @error('status')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <label for="" class="mt-2 mb-1">Ketua tim</label>
                        <select class="select2 form-control custom-select" style="width: 100%; height: 36px"
                            name="leader">
                            <option disabled>Pilih ketua tim</option>
                            @forelse ($students as $student)
                                <option value="{{ $student->id }}" {{ $team->student_id == $student->student->id ? 'selected' : '' }}>{{ $student->student->name }}</option>
                            @empty
                                <option disabled>Tidak ada siswa</option>
                            @endforelse
                        </select>
                        @error('leader')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                        <div class="mb-3 mt-3 col-md-12">
                            <label for="bm-title" class="mb-1">Anggota tim</label>
                            @foreach ($studentTeam as $key => $member)
                            <div class="d-flex align-items-center mt-1 gap-2" id="{{ ++$key }}">
                              <select class="select2 form-control custom-select mb-1"
                                  name="student_id[]">
                                  <option disabled>Pilih anggota tim</option>
                                  @forelse ($students as $student)
                                      <option value="{{ $student->id }}" {{ $member->hummataskTeam->student_id == $student->student->id ? 'selected' : '' }}>{{ $student->student->name }}</option>
                                  @empty
                                      <option disabled>Tidak ada siswa</option>
                                  @endforelse
                              </select>
                              @if ($key > 1)
                                <button onclick="deleteElement('{{ $key }}')" type="button" class="btn delete-trigger px-3 btn-danger"><i class="fas fa-trash"></i></button>
                              @endif
                            </div>
                              @error('student_id.*')
                                  <p class="text-danger">{{ $message }}</p>
                              @enderror
                            @endforeach

                            <div id="member"></div>

                            <button type="button" class="btn add-button-trigger btn-light-info text-info mt-3">Tambah
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
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.48.0/apexcharts.min.js"
    integrity="sha512-wqcdhB5VcHuNzKcjnxN9wI5tB3nNorVX7Zz9NtKBxmofNskRC29uaQDnv71I/zhCDLZsNrg75oG8cJHuBvKWGw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.48.0/apexcharts.min.css"
    integrity="sha512-qc0GepkUB5ugt8LevOF/K2h2lLGIloDBcWX8yawu/5V8FXSxZLn3NVMZskeEyOhlc6RxKiEj6QpSrlAoL1D3TA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script>
        $('.btn-delete').on('click', function() {
            var id = $(this).data('id');
            $('#form-delete').attr('action', '/mentor/challenge/delete/' + id);
            $('#modal-delete').modal('show');
          });

        $('.show-btn').on('click', function() {
            let id = $(this).data('id');
            let date = $(this).data('date');
            let title = $(this).data('title');
            let description = $(this).data('description');
            let callback = $(this).data('callback');
            let schedule_to = $(this).data('schedule-to');
            let start_date = $(this).data('start-date');
            let end_date = $(this).data('end-date');

            console.log(start_date, end_date);
            $('#date').text(date);
            $('#title').text(title);
            $('#description').text(description);
            $('#callback').text(callback);
            $('#schedule_to').text(schedule_to+' ('+start_date+'-'+end_date+')');
            $('#show-modal').modal('show');
        });

        $('.callback-btn').on('click', function() {
          let id = $(this).data('id');
          $('#form-callback').attr('action', '/mentor/presentation/callback/' + id);
          $('#callback-modal').modal('show');
        });


        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });

        const deleteElement = (id) => $('#' + id).remove();

        (() => {
            $('.add-button-trigger').click((e) => {
                let idInput = 'input_' + Math.random().toString(36).substr(2, 9); // Generate random id
                let target = $(e.target).parent().find('#member');
                target.append(`<div class="d-flex align-items-center my-1 mb-2 gap-2" id="${idInput}">
                  <select class="select2 form-control custom-select" style="width: 100%; height: 36px" name="student_id[]">
                    <option>Pilih anggota tim</option>
                    @forelse ($students as $student)
                        <option value="{{ $student->id }}">{{ $student->student->name }}</option>
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
    <script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();

        // Function to delete an element by id
        const deleteElement = (id) => $('#' + id).remove();

        // Function to add new member input dynamically
        const addNewMemberInput = (target) => {
            let idInput = 'input_' + Math.random().toString(36).substr(2, 9); // Generate random id
            target.append(`
                <div class="d-flex align-items-center mt-3 gap-2" id="${idInput}">
                    <select class="select2 form-control custom-select" style="width: 100%; height: 36px" name="student_id[]">
                        <option>Pilih anggota tim</option>
                        @forelse ($students as $student)
                            <option value="{{ $student->id }}">{{ $student->student->name }}</option>
                        @empty
                            <option>Tidak ada siswa</option>
                        @endforelse
                    </select>
                    <button onclick="deleteElement('${idInput}')" type="button" class="btn delete-trigger px-3 mt-0 btn-danger">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            `);
            $('.select2').select2();
        }
        $('.select2').select2();
    });
    </script>

    <script>
              var options = {
                series: [44, 55, 41, 17],
                chart: {
                    type: 'donut',
                    height: 400
                },
                labels: ['Hadir', 'Telat', 'Izin', 'Alpha'],
                colors: ['#13DEB9', '#5D87FF', '#49BEFF', '#FFAE1F'],
                dataLabels: {
                    enabled: false
                },
                plotOptions: {
                    pie: {
                        donut: {
                            labels: {
                                show: false
                            }
                        }
                    },
                    stroke: {
                        show: false
                    }
                },
                legend: {
                    position: 'bottom'
                },
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            height: 900,
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            };


        var chart = new ApexCharts(document.querySelector("#chart-progres"), options);
        chart.render();



    </script>

@endsection
