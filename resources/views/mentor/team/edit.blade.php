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
  <a href="/mentor/team/{{ $team->slug }}" class="btn btn-primary">Kembali</a>
</div>

<div class="modal fade" id="edit-team-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
{{-- <div class="modal-dialog modal-lg">
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
</div> --}}

@include('admin.components.delete-modal-component')

@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
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
        })();
    </script>
@endsection
