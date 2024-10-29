@extends('Hummatask.layouts.app')
@section('style')
    <style>
        .select2-container--default .select2-selection--multiple .select2-selection__rendered li{
            color:black;
        }
    </style>
@endsection
@section('content')
    <div class="modal fade" id="add-team" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Ajukan Presentasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('submit-presentation') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                            <div class="mx-3">
                                <label for="" class="mt-1 mb-2">Nama Project</label>
                                <input type="text" name="project_name" class="form-control" placeholder="Masukkan Project"
                                       value="{{ old('project_name') }}">
                                @error('project_name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <label for="" class="mt-4 mb-2">Deskripsi</label>
                                <textarea name="description" class="form-control" rows="3"
                                          placeholder="Masukkan deskripsi tema anda">{{ old('description') }}</textarea>
                                @error('description')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <label for="" class="mt-4 mb-2">Link repository (opsional)</label>
                                <input type="text" name="link" class="form-control"
                                       placeholder="Masukkan link repositori projek" value="{{ old('link') }}">
                                @error('link')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror

                                <div class="row row-cols-2 mt-2">
                                    <div id="startDate">
                                        <label for="" class="mt-1 mb-2">Tanggal Mulai</label>
                                        <input type="date" name="start_date" class="form-control" value="{{ old('start_date') }}">
                                        @error('start_date')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div id="startDate">
                                        <label for="" class="mt-1 mb-2">Tanggal Selesai</label>
                                        <input type="date" name="end_date" class="form-control" value="{{ old('end_date') }}">
                                        @error('end_date')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <label for="" class="mt-4 mb-2">Kategori Project</label>
                                <select class="form-control"
                                       placeholder="Kategori Project" value="{{ old('type_project') }}" onchange="changeProject(this)">
                                    @foreach($categoryProject as $category)
                                        <option value="{{ $category->name }}">{{ ucwords($category->name) }}</option>
                                    @endforeach
                                </select>
                                @error('projectCategory')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror


                                <div id="memberSection">
                                    <label for="" class="mt-4 mb-2 d-block">Anggota Tim</label>
                                    <select class="js-example-basic-multiple d-block w-100" name="members[]" id="selectMembers" style="width: 100%;" multiple>
                                       @foreach($students as $id => $student)
                                            <option value="{{ $id }}">{{ $student }}</option>
                                       @endforeach
                                    </select>
                                    @error('members')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-danger text-danger" data-bs-dismiss="modal">Tutup
                        </button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- modal add team end --}}
{{--    <div class="card w-100 bg-light-info overflow-hidden shadow-none">--}}
{{--        <div class="card-body position-relative">--}}
{{--            <div class="row">--}}
{{--                <div class="col-sm-8">--}}
{{--                    <div class="d-flex align-items-center mb-7">--}}
{{--                        <div class="rounded-circle overflow-hidden me-6">--}}
{{--                            @if(auth()->user()->student->avatar != null && Storage::disk('public')->exists(auth()->user()->student->avatar))--}}
{{--                                <img src="{{ asset('storage/' . auth()->user()->student->avatar) }}" alt="avatar"--}}
{{--                                     class="rounded-circle mb-3" width="40px" height="40px">--}}
{{--                            @else--}}
{{--                                <img src="{{ asset('user.webp') }}" alt="default avatar" class="rounded-circle mb-3"--}}
{{--                                     width="40px" height="40px">--}}
{{--                            @endif--}}
{{--                        </div>--}}
{{--                        <h5 class="fw-semibold mb-0 fs-5 mt-1">Selamat datang!</h5>--}}
{{--                    </div>--}}
{{--                    <div class="d-flex align-items-center">--}}
{{--                        <div class="border-end pe-4 border-opacity-10">--}}
{{--                            <h3 class="mb-1 fw-semibold fs-8 d-flex align-content-center">Selamat--}}
{{--                                datang, {{ auth()->user()->student->name }}</h3>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-sm-5">--}}
{{--                    <div class="welcome-bg-img mb-n7 text-end">--}}
{{--                        <img--}}
{{--                            src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/backgrounds/welcome-bg.svg"--}}
{{--                            alt="" class="img-fluid">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <h5 class="fs-5  mb-4" style="font-weight: 600">
        Data Presentasi
    </h5>
    <div class="mb-2 mt-5 text-center" style="margin: 0 auto;">
        <img src="{{ asset('empty-asset.png') }}" alt="" width="100px" srcset="">
        <p class="fs-5 text-dark">
            Belum ada tugas
        </p>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#selectMembers').select2({
                dropdownParent: $('#add-team')
            });
            $('#memberSection').hide()
        });

        function changeProject(e) {
            if (e.value !== 'solo project') {
                $('#memberSection').show();
            } else {
                $('#memberSection').hide();
            }
        }
    </script>
@endsection
