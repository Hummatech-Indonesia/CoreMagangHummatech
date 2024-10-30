@extends('Hummatask.layouts.app')
@section('style')
    <style>
        .select2-container--default .select2-selection--multiple .select2-selection__rendered li {
            color: black;
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
                                <input type="text" name="project_name" class="form-control"
                                       placeholder="Masukkan Project"
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
                                        <input type="date" name="start_date" class="form-control"
                                               value="{{ old('start_date') }}">
                                        @error('start_date')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div id="startDate">
                                        <label for="" class="mt-1 mb-2">Tanggal Selesai</label>
                                        <input type="date" name="end_date" class="form-control"
                                               value="{{ old('end_date') }}">
                                        @error('end_date')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                                <label for="" class="mt-1 mb-2">Tanggal Presentasi</label>
                                <input type="date" name="planning_date_presentation" class="form-control"
                                       value="{{ old('planning_date_presentation') }}">
                                @error('planning_date_presentation')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror

                                <label for="" class="mt-4 mb-2">Kategori Project</label>
                                <select class="form-control"
                                        onchange="changeProject(this)" name="type_project">
                                    @foreach($categoryProject as $category)
                                        <option value="{{ $category->name }}">{{ ucwords($category->name) }}</option>
                                    @endforeach
                                </select>
                                @error('type_project')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror


                                <div id="memberSection">
                                    <label for="" class="mt-4 mb-2 d-block">Anggota Tim</label>
                                    <select class="js-example-basic-multiple d-block w-100" name="members[]"
                                            id="selectMembers" style="width: 100%;" multiple>
                                        @foreach($students as $id => $student)
                                            <option value="{{ $id }}">{{ $student }}</option>
                                        @endforeach
                                    </select>
                                    @error('members')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <label for="" class="mt-4 mb-2">Leader</label>
                                <input type="text" name="leader_id" class="form-control"
                                       placeholder="Leader" value="{{ auth()->user()->name }}" disabled>
                                @error('leader_id')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
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
    {{--     modal add team end --}}
    <div class="card w-100 bg-light-info overflow-hidden shadow-none">
        <div class="card-body position-relative">
            <div class="row">
                <div class="col-sm-8">
                    <div class="d-flex align-items-center mb-7">
                        <div class="rounded-circle overflow-hidden me-6">
                            @if(auth()->user()->student->avatar != null && Storage::disk('public')->exists(auth()->user()->student->avatar))
                                <img src="{{ asset('storage/' . auth()->user()->student->avatar) }}" alt="avatar"
                                     class="rounded-circle mb-3" width="40px" height="40px">
                            @else
                                <img src="{{ asset('user.webp') }}" alt="default avatar" class="rounded-circle mb-3"
                                     width="40px" height="40px">
                            @endif
                        </div>
                        <h5 class="fw-semibold mb-0 fs-5 mt-1">Selamat datang!</h5>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="border-end pe-4 border-opacity-10">
                            <h3 class="mb-1 fw-semibold fs-8 d-flex align-content-center">Selamat
                                datang, {{ auth()->user()->student->name }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="welcome-bg-img mb-n7 text-end">
                        <img
                            src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/backgrounds/welcome-bg.svg"
                            alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <h5 class="fs-5  mb-4" style="font-weight: 600">
        Data Presentasi
    </h5>
    <div class="row row-cols-3 gx-3">
        @foreach($presentations as $presentation)
            <div class="col">
                <div class="card">
                    <div class="card-header bg-transparent d-flex align-items-end gap-2 position-relative">
                        <div class="position-absolute d-flex gap-1" style="top:10px; right:20px">
                            <div class="urutan rounded-2 fs-2 p-2 fw-bolder text-white" style="background: #7E7E7E">
                                01
                            </div>
                            <button class="btn btn-danger">
                                <svg width="15" height="17" viewBox="0 0 15 17" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M5.83333 13.6C6.05435 13.6 6.26631 13.5104 6.42259 13.351C6.57887 13.1916 6.66667 12.9754 6.66667 12.75V7.65C6.66667 7.42457 6.57887 7.20836 6.42259 7.04896C6.26631 6.88955 6.05435 6.8 5.83333 6.8C5.61232 6.8 5.40036 6.88955 5.24408 7.04896C5.0878 7.20836 5 7.42457 5 7.65V12.75C5 12.9754 5.0878 13.1916 5.24408 13.351C5.40036 13.5104 5.61232 13.6 5.83333 13.6ZM14.1667 3.4H10.8333V2.55C10.8333 1.8737 10.5699 1.2251 10.1011 0.746878C9.63226 0.26866 8.99638 0 8.33333 0H6.66667C6.00363 0 5.36774 0.26866 4.8989 0.746878C4.43006 1.2251 4.16667 1.8737 4.16667 2.55V3.4H0.833333C0.61232 3.4 0.400358 3.48955 0.244078 3.64896C0.0877973 3.80837 0 4.02457 0 4.25C0 4.47543 0.0877973 4.69163 0.244078 4.85104C0.400358 5.01045 0.61232 5.1 0.833333 5.1H1.66667V14.45C1.66667 15.1263 1.93006 15.7749 2.3989 16.2531C2.86774 16.7313 3.50363 17 4.16667 17H10.8333C11.4964 17 12.1323 16.7313 12.6011 16.2531C13.0699 15.7749 13.3333 15.1263 13.3333 14.45V5.1H14.1667C14.3877 5.1 14.5996 5.01045 14.7559 4.85104C14.9122 4.69163 15 4.47543 15 4.25C15 4.02457 14.9122 3.80837 14.7559 3.64896C14.5996 3.48955 14.3877 3.4 14.1667 3.4ZM5.83333 2.55C5.83333 2.32457 5.92113 2.10837 6.07741 1.94896C6.23369 1.78955 6.44565 1.7 6.66667 1.7H8.33333C8.55435 1.7 8.76631 1.78955 8.92259 1.94896C9.07887 2.10837 9.16667 2.32457 9.16667 2.55V3.4H5.83333V2.55ZM11.6667 14.45C11.6667 14.6754 11.5789 14.8916 11.4226 15.051C11.2663 15.2104 11.0543 15.3 10.8333 15.3H4.16667C3.94565 15.3 3.73369 15.2104 3.57741 15.051C3.42113 14.8916 3.33333 14.6754 3.33333 14.45V5.1H11.6667V14.45ZM9.16667 13.6C9.38768 13.6 9.59964 13.5104 9.75592 13.351C9.9122 13.1916 10 12.9754 10 12.75V7.65C10 7.42457 9.9122 7.20836 9.75592 7.04896C9.59964 6.88955 9.38768 6.8 9.16667 6.8C8.94565 6.8 8.73369 6.88955 8.57741 7.04896C8.42113 7.20836 8.33333 7.42457 8.33333 7.65V12.75C8.33333 12.9754 8.42113 13.1916 8.57741 13.351C8.73369 13.5104 8.94565 13.6 9.16667 13.6Z"
                                        fill="white"/>
                                </svg>
                            </button>
                        </div>
                        <span class="fw-semibold fs-5">{{ ucwords($presentation->type_project) }}</span>
                        <small>{{ \Carbon\Carbon::parse($presentation->planning_date_presentation)->format('d F Y') }}</small>
                    </div>
                    <div class="card-body pt-0">
                        <h2 class="fs-7">{{ $presentation->project_name }}</h2>
                        <div class="d-flex gap-2 align-items-center">
                            <span class="fs-2 p-2 px-3 rounded-pill text-primary"
                                  style="background:rgba(93,135,255,.2)">
                                {{ $presentation->status_presentation }}
                            </span>
                            <span class="fs-2 p-2 px-3 rounded-pill " style="background:rgba(118, 118, 128, .2)">Direvisi (5)</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <div class="deadline">
                                <b class="d-block">Deadline : </b>
                                <span class="fw-bold">
                                    {{ \Carbon\Carbon::parse($presentation->start_date)->format('d/m/Y') }} -
                                    {{ \Carbon\Carbon::parse($presentation->end_date)->format('d/m/Y') }}
                                </span>

                            </div>
                            <div class="action">
                                <button class="btn btn-primary p-2 px-4">Detail</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{--    <div class="mb-2 mt-5 text-center" style="margin: 0 auto;">--}}
    {{--        <img src="{{ asset('empty-asset.png') }}" alt="" width="100px" srcset="">--}}
    {{--        <p class="fs-5 text-dark">--}}
    {{--            Belum ada tugas--}}
    {{--        </p>--}}
    {{--    </div>--}}
@endsection
@section('script')
    <script>
        $(document).ready(function () {
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
