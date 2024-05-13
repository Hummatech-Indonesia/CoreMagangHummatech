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
<div class="d-flex gap-3 justify-content-end mb-3">
  <button type="button" class="btn btn-light-info text-info" data-bs-toggle="modal" data-bs-target="#edit-team">
    Edit Tim
  </button>
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
          <p class="text-danger m-0">Deadline: {{ $team->project_id != null ? $team->project->end_date  : '-' }}</p>
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
                @foreach (App\Models\StudentTeam::where('hummatask_team_id', $team->id)->get() as $key => $student)
                  <tr>
                    <td>
                      <p class="mb-0 fs-3">{{ (++$key + 1) }}</p>
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
  {{-- <div class="col-lg-5">
    <div class="card">
      <div class="card-header text-bg-primary d-flex justify-content-between align-items-center rounded-top-4">
        <h5 class="card-title text-white mb-0">Tema project yang diajukan</h5>
        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#add-team">
          setujui project
        </button>
      </div>
      <div class="card-body pb-1">
        <div class="accordion accordion-flush card position-relative overflow-hidden" id="accordionFlushExample">
          @forelse ($projects as $i => $project)
            <div class="accordion-item">
              <h2 class="accordion-header" id="flush-headingOne">
                <button class="accordion-button collapsed fs-4 fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                 {{$project->title}}
                </button>
              </h2>
              <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body fw-normal">
                  {{ $project->description }}
                </div>
              </div>
            </div>
          @empty
            <div class="container">
              <div class="row justify-content-center align-items-center">
                  <div class="col-md-6 text-center">
                      <img src="{{ asset('empty-asset.png') }}" alt="" width="100px" class="mb-2">
                      <p class="fs-3 text-dark">
                          Tim belum mengajukan tema project
                      </p>
                  </div>
              </div>
            </div>
          @endforelse
        </div>
      </div>
    </div>
  </div> --}}
  <div class="col-lg-5 ">
    <div class="card">
      <div class="card-body">
        <h5>Progress tim</h5>
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
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody class="border-top">
            <tr>
              <td>
                <p class="mb-0 fs-3">2</p>
              </td>
              <td class="ps-0">
                <div class="d-flex align-items-center">
                  <div class="me-2 pe-1">
                    <img src="{{ asset('assets-user/dist/images/profile/user-10.jpg') }}" class="rounded-circle" width="40" height="40" alt="" />
                  </div>
                  <div>
                    <h6 class="fw-semibold mb-1">Sunil Jamal</h6>
                    <p class="fs-2 mb-0 text-muted">Anggota</p>
                  </div>
                </div>
              </td>
              <td>
                <p class="fs-3 text-dark mb-0">Web technologies</p>
              </td>
              <td>
                <p class="fs-3 text-dark mb-0">Web technologies</p>
              </td>
              <td>
                <p class="fs-3 text-dark mb-0">Web technologies</p>
              </td>
              <td>
                <p class="fs-3 text-dark mb-0">Web technologies</p>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="edit-team" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                        <label for="" class="mt-2 mb-1">Ketua tim</label>
                        <select class="select2 form-control custom-select" style="width: 100%; height: 36px"
                        {{-- @dd($student->student->id, $team->student_id) --}}
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

                        <div class="mb-3 mt-2 col-md-12">
                            <label for="bm-title" class="mb-1">Anggota tim</label>
                            @foreach (App\Models\StudentTeam::where('hummatask_team_id', $team->id)->get() as $key => $member)
                              <select class="select2 form-control custom-select mb-3"
                                  name="student_id[]">
                                  <option disabled>Pilih anggota tim</option>
                                  @forelse ($students as $student)
                                      <option value="{{ $student->id }}" {{ $member->hummataskTeam->student_id == $student->student->id ? 'selected' : '' }}>{{ $student->student->name }}</option>
                                  @empty
                                      <option disabled>Tidak ada siswa</option>
                                  @endforelse
                              </select>
                              
                              @error('student_id.*')
                                  <p class="text-danger">{{ $message }}</p>
                              @enderror
                            @endforeach

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $('.btn-delete').on('click', function() {
            var id = $(this).data('id');
            $('#form-delete').attr('action', '/mentor/challenge/delete/' + id);
            $('#modal-delete').modal('show');
        });

        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });

        const deleteElement = (id) => $('#' + id).remove();

        (() => {
            $('.add-button-trigger').click((e) => {
                let idInput = 'input_' + Math.random().toString(36).substr(2, 9); // Generate random id
                let target = $(e.target).parent().find('#member');
                target.append(`<div class="d-flex align-items-center mt-3 gap-2" id="${idInput}">
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
@endsection
