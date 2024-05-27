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
  <a href="{{ route('project-submission.index') }}" class="btn btn-light-info text-info">Kembali</a>
  @if (!$done)
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#acc-project-modal">
   Pilih Tema
  </button>
  @endif
</div>
<div class="row">
  <div class="col-lg-12">
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
          <p class="text-danger m-0">Deadline: {{ $done ? \Carbon\Carbon::parse($done->end_date)->locale('id')->isoFormat('dddd, D MMMM Y') : '-' }}</p>
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
                      <p class="mb-0 fs-3">{{ ++$key + 1 }}</p>
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
</div>
<div class="row">
  <div class="col-lg-12 d-flex align-items-strech">
    <div class="card w-100">
      <div class="card-body p-4">
        <div class="d-flex align-items-center justify-content-between">
          <div>
            <h5 class="card-title fw-semibold">{{ $done ? 'Projek yang diterima' : 'Projek yang diajukan' }}</h5>
          </div>
        </div>
        <div class="card shadow-none mb-0 mt-3">
          @forelse ($projects as $project)
            <div class="d-flex align-items-center gap-3 py-3 border-bottom">
              <div>
                <h6 class="mb-0 fw-semibold">{{ $project->title }}</h6>
                <span class="fs-2">{{ $project->description }}</span>
              </div>
            </div>
          @empty
            <div class="mb-2 mt-5 text-center" style="margin: 0 auto;">
                <img src="{{ asset('empty-asset.png') }}" alt="" width="100px" srcset="">
                <p class="fs-4 text-dark">
                    Tim ini belum mengajukan projek
                </p>
            </div>
          @endforelse
        </div>
      </div>
    </div>
  </div>
</div>

{{-- acc project start --}}
<div class="modal fade" id="acc-project-modal" tabindex="-1" aria-labelledby="exampleModalLabel1" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header d-flex align-items-center">
        <h4 class="modal-title" id="exampleModalLabel1">
          Pilih Tema
        </h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="acc-form" method="post" action="">
        @csrf
        @method('PUT')
        <div class="modal-body">
            <label for="projek-checkbox">
              <input type="checkbox" id="projek-checkbox" data-slug="{{ $team->slug }}"> Tidak ada tema yang cocok
            </label>

            <div id="input-project" class="mb-3 my-2" style="display: none">
                <label for="custom-project">Tema dari mentor</label>
                <input type="text" id="custom-project" placeholder="Masukkan judul tema" class="form-control" name="custom-project">
            </div>
            @error('custom-project')
              <p class="text-danger">{{ $message }}</p>
            @enderror

            <div class="my-3" id="select-projek">
              <label for="project_id">Tema</label>
              <select class="select2 js-example-basic-single form-control" name="project_id" id="project_id" style="width: 100%; height: 36px" >
                <option>Pilih tema</option>
                @foreach ($projects as $project)
                    <option id="acc" value="{{ $project->id }}"
                      data-id="{{ $project->id }}"
                      data-slug="{{ $team->slug }}">{{ $project->title }}</option>
                @endforeach
              </select>
              @error('project_id')
                  <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>
            <div class="mb-1">
              <label for="deadline">Deadline</label>
              <input type="date" name="end_date" id="deadline" placeholder="Tambahkan Deadline" class="form-control">
              @error('end_date')
                  <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>
          </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-light-danger text-danger font-medium" data-bs-dismiss="modal" >
            Tutup
          </button>
          <button type="submit" class="btn btn-info">
            Terima
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
{{-- acc project end --}}

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

        $(document).ready(function() {
            $(".js-example-basic-single").select2({
                dropdownParent: $("#acc-project-modal")
            });
        });

        $(document).ready(function() {
          $('#project_id').on('change', function() {
            let selectedOption = $(this).find('option:selected');
            let id = selectedOption.data('id');
            let slug = selectedOption.data('slug');

            console.log(id);
            console.log(slug);

            let url = `{{ route('project-submission.acc', ['slug' => ':slug', 'project' => ':project']) }}`;
            url = url.replace(':slug', slug).replace(':project', id);
            $('#acc-form').attr('action', url);
          });
        });
    </script>

    <script>
      $(document).ready(function(){
          $('#projek-checkbox').change(function(){
              if ($(this).is(':checked')) {
                  $('#select-projek').hide();
                  $('#input-project').show();
                  let slug = $(this).data('slug');
                  console.log(slug);

                  let url = `{{ route('project-submission-mentor.acc', ['slug' => ':slug']) }}`;
                  url = url.replace(':slug', slug);
                  $('#acc-form').attr('action', url);
              } else {
                  $('#select-projek').show();
                  $('#input-project').hide();
              }
          });
      });
    </script>
@endsection
