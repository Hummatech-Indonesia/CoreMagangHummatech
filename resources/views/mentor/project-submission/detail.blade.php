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
                      <p class="mb-0 fs-3">{{ ++$key }}</p>
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
  <div class="col-lg-5 d-flex align-items-strech">
    <div class="card w-100">
      <div class="card-body p-4">
        <div class="d-flex align-items-center justify-content-between">
          <div>
            <h5 class="card-title fw-semibold">Project yang diajukan</h5>
          </div>
        </div>
        <div class="card shadow-none mb-0 mt-3">
          @forelse ($projects as $project)
            <div class="d-flex align-items-center gap-3 py-3 border-bottom">
              <div>
                <h6 class="mb-0 fw-semibold">{{ $project->title }}</h6>
                <span class="fs-2">{{ $project->description }}</span>
              </div>
              <div class="ms-auto text-end">
                <span class="text-danger">-6.8%</span>
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
    </script>
@endsection
