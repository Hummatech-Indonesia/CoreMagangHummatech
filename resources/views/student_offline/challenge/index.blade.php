@extends('student_offline.layouts.app')
@section('content')
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Tantangan</h4>
                    <nav aria-label="breadcrumb mt-2">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-muted " href="/siswa-offline">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">Tantangan</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-3">
                    <div class="text-center mb-n5">
                        <img src="{{ asset('assets-user/dist/images/breadcrumb/ChatBc.png') }}" alt="" class="img-fluid mb-n4">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid note-has-grid">
        <ul class="nav nav-pills p-3 mb-3 rounded align-items-center card flex-row">
          <li class="nav-item">
            <a data-bs-toggle="tab" href="#task" role="tab" class="nav-link note-link d-flex align-items-center justify-content-center active px-3 px-md-3 me-0 me-md-2 text-body-color" id="all-category">
              <i class="ti ti-chart-area-line fill-white me-0 me-md-1"></i>
              <span class="d-none d-md-block font-weight-medium">Tantangan Baru</span>
            </a>
          </li>
          <li class="nav-item">
            <a data-bs-toggle="tab" href="#done" role="tab" class="nav-link note-link d-flex align-items-center justify-content-center px-3 px-md-3 me-0 me-md-2 text-body-color " id="note-business">
              <i class="ti ti-history fill-white me-0 me-md-1"></i>
              <span class="d-none d-md-block font-weight-medium">Tantangan Terselesaikan</span>
            </a>
          </li>
          <li class="nav-item">
            <a data-bs-toggle="tab" href="#acc" role="tab" class="nav-link note-link d-flex align-items-center justify-content-center px-3 px-md-3 me-0 me-md-2 text-body-color " id="note-social">
              <i class="ti ti-medal-2 fill-white me-0 me-md-1"></i>
              <span class="d-none d-md-block font-weight-medium">Tantangan Dinilai</span>
            </a>
          </li>
          <li class="nav-item ms-auto">
            <form action="">
                <div class="d-flex">
                    <div class="search-box mx-2">
                        <input type="text" class="form-control search-chat py-2" id="text-srh" placeholder="Cari Materi">
                    </div>
                    <button class="btn btn-primary">
                        Cari
                    </button>
                </div>
            </form>
          </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="task" role="tabpanel">
               <div class="d-flex flex-wrap  all-category note-important">
                @forelse ($challenges as $challenge)
                <div class="p-1 col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-wrap gap-2">
                                <p class="badge bg-primary-subtle text-primary" style="font-size: 12px">
                                    Batas: {{ \Carbon\Carbon::parse($challenge->deadline)->locale('id_ID')->isoFormat('dddd, D MMMM YYYY') }}
                                </p>
                                <p class="badge bg-info-subtle text-info" style="font-size: 12px">
                                    {{$challenge->level}}
                                </p>
                            </div>
                            <h4>{{$challenge->title}}</h4>
                            <p class="text-mute">
                                {{ Str::limit($challenge->description, 150) }}
                            </p>
                            <button type="button" class="btn btn-primary w-100 btn-add"
                            data-id="{{ $challenge->id }}" data-challenge="{{ $challenge->title }}" data-description="{{ $challenge->description }}" data-user="{{ auth()->user()->student->id }}">
                                Selesaikan Tantangan
                            </button>
                        </div>
                    </div>
                </div>
                @empty

                @endforelse
               </div>
            </div>
            <div class="tab-pane" id="done" role="tabpanel">
                <div class="d-flex flex-wrap  all-category note-important">
                    @forelse ($studentChallenges as $studentChallenge)
                        <div class="p-1 col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-wrap gap-2">
                                        <p class="badge bg-primary-subtle text-primary" style="font-size: 12px">
                                            Batas: {{ \Carbon\Carbon::parse($studentChallenge->deadline)->locale('id_ID')->isoFormat('dddd, D MMMM YYYY') }}
                                        </p>
                                        <p class="badge bg-info-subtle text-info" style="font-size: 12px">
                                            {{ $studentChallenge->challenge->level }}
                                        </p>
                                    </div>
                                    <h4>{{ $studentChallenge->challenge->title }}</h4>
                                    <p class="text-mute">
                                       {{$studentChallenge->challenge->description}}
                                    </p>
                                    <button type="button" class="btn btn-success w-100 btn-detail" 
                                        data-id="{{ $studentChallenge->id }}"
                                        data-title="{{ $studentChallenge->challenge->title }}"
                                        data-description="{{ $studentChallenge->challenge->description }}"
                                        data-file="{{ asset('storage/'.$studentChallenge->file) }}"
                                        >
                                        <i class="ti ti-eye"></i>
                                    Tantangan selesai
                                    </button>
                                </div>
                            </div>
                        </div>
                    @empty
                        
                    @endforelse
               </div>
            </div>
            <div class="tab-pane" id="acc" role="tabpanel">
                <div class="d-flex flex-wrap  all-category note-important">
                    @foreach (range(1, 5) as $item)
                    <div class="p-1 col-xxl-3 col-xl-4 col-lg-6 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center gap-3">
                                    <h3 class="col-sm-2 py-4 px-1 col-xl-4 bg-success-subtle text-success text-center rounded rounded-2" >87.9</h3>
                                    <h5>Lorem ipsum dolor sit.</h5>
                                </div>
                                <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente est tenetur expedit...</p>
                                <div class="d-flex gap-2 flex-wrap">
                                    <p class="badge bg-primary-subtle text-primary" style="font-size: 12px">Batas : 29 Oktober 2023 10:33</p>
                                    <p class="badge bg-danger-subtle text-danger" style="font-size: 12px">Sulit</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="modal fade" id="add" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                <div class="modal-content">
                    <div class="modal-header d-flex align-items-center">
                        <h4 class="modal-title" id="myLargeModalLabel">
                            Selesaikan Tantangan
                        </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="modal-body">
                            <div class="mb-2">
                                <h6>
                                    <svg width="26" class="me-2" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M20.5837 2.1665C21.4126 2.16646 22.2103 2.48319 22.8134 3.05189C23.4166 3.6206 23.7796 4.39829 23.8282 5.22584L23.8337 5.4165V20.5832C23.8337 21.4121 23.517 22.2098 22.9483 22.813C22.3796 23.4161 21.6019 23.7791 20.7743 23.8278L20.5837 23.8332H5.41699C4.58801 23.8332 3.79035 23.5165 3.18721 22.9478C2.58407 22.3791 2.22104 21.6014 2.17241 20.7738L2.16699 20.5832V5.4165C2.16695 4.58753 2.48368 3.78986 3.05238 3.18672C3.62109 2.58358 4.39877 2.22055 5.22633 2.17192L5.41699 2.1665H20.5837ZM13.0003 11.9165H11.917L11.7902 11.9241C11.5269 11.9554 11.2843 12.0822 11.1082 12.2805C10.9321 12.4787 10.8349 12.7347 10.8349 12.9998C10.8349 13.265 10.9321 13.5209 11.1082 13.7192C11.2843 13.9175 11.5269 14.0443 11.7902 14.0756L11.917 14.0832V17.3332L11.9246 17.4599C11.9531 17.7017 12.0622 17.9269 12.2344 18.0991C12.4066 18.2712 12.6318 18.3804 12.8736 18.4089L13.0003 18.4165H14.0837L14.2104 18.4089C14.4522 18.3804 14.6774 18.2712 14.8496 18.0991C15.0217 17.9269 15.1309 17.7017 15.1594 17.4599L15.167 17.3332L15.1594 17.2064C15.1335 16.9854 15.0402 16.7777 14.8921 16.6116C14.744 16.4455 14.5484 16.329 14.3317 16.278L14.2104 16.2563L14.0837 16.2498V12.9998L14.0761 12.8731C14.0476 12.6313 13.9384 12.4061 13.7662 12.2339C13.5941 12.0618 13.3689 11.9526 13.1271 11.9241L13.0003 11.9165ZM13.0112 8.6665L12.8736 8.67409C12.6103 8.70541 12.3676 8.83221 12.1915 9.03047C12.0154 9.22873 11.9182 9.48468 11.9182 9.74984C11.9182 10.015 12.0154 10.2709 12.1915 10.4692C12.3676 10.6675 12.6103 10.7943 12.8736 10.8256L13.0003 10.8332L13.1379 10.8256C13.4012 10.7943 13.6439 10.6675 13.82 10.4692C13.996 10.2709 14.0933 10.015 14.0933 9.74984C14.0933 9.48468 13.996 9.22873 13.82 9.03047C13.6439 8.83221 13.4012 8.70541 13.1379 8.67409L13.0112 8.6665Z" fill="#5D87FF"/>
                                    </svg>
                                     Challenge!
                                    </h6>
                                    <h6 class="px-4 ms-2" id="challenge"></h6>
                                <p class="px-4 ms-2" id="description"></p>
                            </div>
                            <div class="px-4">
                                <input type="text" id="challengeId" hidden name="challenge_id">
                                <input type="text" id="userId" hidden name="student_id">
                                <label for="file" class="mt-2 mb-2">Jawaban</label>
                                <input type="file" name="file" class="form-control">
                                @error('challenge_id')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror
                                @error('student_id')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror
                                @error('file')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer pe-4 me-2">
                            <button type="button" class="btn btn-light-danger text-danger font-medium waves-effect text-start"
                                data-bs-dismiss="modal">
                                Tutup
                            </button>
                            <button type="submit"
                                class="btn btn-primary font-medium waves-effect text-start"
                                data-bs-dismiss="modal">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>

      <div class="modal fade" id="modal-detail" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title" id="myLargeModalLabel">
                        Detail Tantangan Yang terselesaikan
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="modal-body">
                        <div class="mb-2">
                          <h6 class="d-flex">
                              <svg width="26" class="me-2" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M20.5837 2.1665C21.4126 2.16646 22.2103 2.48319 22.8134 3.05189C23.4166 3.6206 23.7796 4.39829 23.8282 5.22584L23.8337 5.4165V20.5832C23.8337 21.4121 23.517 22.2098 22.9483 22.813C22.3796 23.4161 21.6019 23.7791 20.7743 23.8278L20.5837 23.8332H5.41699C4.58801 23.8332 3.79035 23.5165 3.18721 22.9478C2.58407 22.3791 2.22104 21.6014 2.17241 20.7738L2.16699 20.5832V5.4165C2.16695 4.58753 2.48368 3.78986 3.05238 3.18672C3.62109 2.58358 4.39877 2.22055 5.22633 2.17192L5.41699 2.1665H20.5837ZM13.0003 11.9165H11.917L11.7902 11.9241C11.5269 11.9554 11.2843 12.0822 11.1082 12.2805C10.9321 12.4787 10.8349 12.7347 10.8349 12.9998C10.8349 13.265 10.9321 13.5209 11.1082 13.7192C11.2843 13.9175 11.5269 14.0443 11.7902 14.0756L11.917 14.0832V17.3332L11.9246 17.4599C11.9531 17.7017 12.0622 17.9269 12.2344 18.0991C12.4066 18.2712 12.6318 18.3804 12.8736 18.4089L13.0003 18.4165H14.0837L14.2104 18.4089C14.4522 18.3804 14.6774 18.2712 14.8496 18.0991C15.0217 17.9269 15.1309 17.7017 15.1594 17.4599L15.167 17.3332L15.1594 17.2064C15.1335 16.9854 15.0402 16.7777 14.8921 16.6116C14.744 16.4455 14.5484 16.329 14.3317 16.278L14.2104 16.2563L14.0837 16.2498V12.9998L14.0761 12.8731C14.0476 12.6313 13.9384 12.4061 13.7662 12.2339C13.5941 12.0618 13.3689 11.9526 13.1271 11.9241L13.0003 11.9165ZM13.0112 8.6665L12.8736 8.67409C12.6103 8.70541 12.3676 8.83221 12.1915 9.03047C12.0154 9.22873 11.9182 9.48468 11.9182 9.74984C11.9182 10.015 12.0154 10.2709 12.1915 10.4692C12.3676 10.6675 12.6103 10.7943 12.8736 10.8256L13.0003 10.8332L13.1379 10.8256C13.4012 10.7943 13.6439 10.6675 13.82 10.4692C13.996 10.2709 14.0933 10.015 14.0933 9.74984C14.0933 9.48468 13.996 9.22873 13.82 9.03047C13.6439 8.83221 13.4012 8.70541 13.1379 8.67409L13.0112 8.6665Z" fill="#5D87FF"/>
                              </svg>
                               <p id="detail-title" class="pt-1"></p></h6>
                          <p class="px-4 ms-2" id="detail-description"></p>
                      </div>
                      <div class="px-4">
                        <h6>Jawaban</h6>
                        <a id="answer-file" class="d-flex text-primary gap-2" download="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M14 3V7C14 7.26522 14.1054 7.51957 14.2929 7.70711C14.4804 7.89464 14.7348 8 15 8H19M14 3H7C6.46957 3 5.96086 3.21071 5.58579 3.58579C5.21071 3.96086 5 4.46957 5 5V12M14 3L19 8M19 8V12M16 18H17.5C17.8978 18 18.2794 17.842 18.5607 17.5607C18.842 17.2794 19 16.8978 19 16.5C19 16.1022 18.842 15.7206 18.5607 15.4393C18.2794 15.158 17.8978 15 17.5 15H16V21M12 15V21M5 15H8L5 21H8" stroke="#5D87FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            <p>unduh file</p>
                        </a>
                    </div>
                    </div>
                    <div class="modal-footer pe-4 me-2">
                        <button type="button" class="btn btn-light-danger text-danger font-medium waves-effect text-start"
                            data-bs-dismiss="modal">
                            Tutup
                        </button>
                    </div>
                </form>
            </div>
        </div>
      </div>
    </div>

    {{-- <div class="row g-2 mb-4">
        <div class="col-sm-4">
            <h4 class="mx-1">Tugas</h4>
        </div>
        <div class="col-sm-auto ms-auto">
            <form action="">
                <div class="d-flex">
                    <div class="search-box mx-2">
                        <input type="text" class="form-control search-chat py-2" id="text-srh" placeholder="Cari Materi">
                    </div>
                    <button class="btn btn-primary">
                        Cari
                    </button>
                </div>
            </form>
        </div>
    </div> --}}



@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@2"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('.btn-add').click(function () {
            var challenge = $(this).data('challenge');
            var description = $(this).data('description');
            var id = $(this).data('id');
            var user = $(this).data('user');
            $('#challengeId').val(id);
            $('#userId').val(user);
            $("#challenge").text(challenge);
            $("#description").text(description);
            $('#add').modal('show');
        });

        $('.btn-edit').click(function () {
            var id = $(this).data('id');
            $('#form-update').attr('action', '/material/' + id);
            $('#modal-edit').modal('show');
        });

        $('.btn-detail').click(function () {
            var id = $(this).data('id');
            var title = $(this).data('title');
            var description = $(this).data('description');
            var file = $(this).data('file');

            $('#detail-title').text(title);
            $('#detail-description').text(description);
            $('#answer-file').attr('href', file);
            $('#modal-detail').modal('show');
        });

        function preview(event) {
            var input = event.target;
            var previewImages = document.getElementsByClassName('image-preview');

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    Array.from(previewImages).forEach(function(previewImage) {
                        previewImage.src = e.target.result;
                        previewImage.style.display = 'block';
                    });
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        $('.btn-delete').click(function () {
            var id = $(this).data('id');
            $('#form-delete').attr('action', '/division/' + id);
            $('#modal-delete').modal('show');
        });
    </script>
@endsection
