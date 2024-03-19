@extends('student_online.layouts.app')
@section('content')
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Tugas kamu : Di setiap latihan akan membuat kemampuan kamu meningkat jadi lebih baik </h4>
                    <nav aria-label="breadcrumb mt-2">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-muted " href="/siswa-online">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">Tugas</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-3">
                    <div class="text-center mb-n5">
                        <img src="{{ asset('assets/images/task-people.png') }}" alt=""
                            class="img-fluid mb-n4">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card my-4 py-3">
        <div class="row g-2 px-4">
            <div class="d-flex g-2 justify-content-between">
                <ul class="nav nav-tabs gap-2" role="tablist">
                    <li class="nav-item">
                    <a class="nav-link d-flex active" data-bs-toggle="tab" href="#home2" role="tab" >
                        <span>
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-book"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 19a9 9 0 0 1 9 0a9 9 0 0 1 9 0" /><path d="M3 6a9 9 0 0 1 9 0a9 9 0 0 1 9 0" /><path d="M3 6l0 13" /><path d="M12 6l0 13" /><path d="M21 6l0 13" /></svg>
                        </span>
                        <span class="d-none d-md-block ms-2">Tugas</span>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link d-flex" data-bs-toggle="tab" href="#profile2" role="tab" > 
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-history"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 8l0 4l2 2" /><path d="M3.05 11a9 9 0 1 1 .5 4m-.5 5v-5h5" /></svg>
                        <span class="d-none d-md-block ms-2">Tugas Selesai</span>
                    </a>
                    </li>
                </ul>
                <div class="d-flex gap-2">
                    <input type="text" class="form-control" id="searchMemberList" placeholder="Cari Tugas">
                    <button class="btn btn-primary">Cari</button>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-content">
        <div class="tab-pane active" id="home2" role="tabpanel">
            <div class="row">
                @foreach (range(1, 3) as $data)
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="card">
                      <img class="card-img-top img-responsive w-100" src="{{ asset('assets/images/materi-1.png') }}" style="object-fit: cover;" alt="Card image cap" />
                      <div class="d-flex justify-content-between px-3" style="margin-top: -27px">
                          <img src="{{ asset('assets-user/dist/images/profile/user-1.jpg') }}" class="rounded-circle rounded" width="50px">
                          <div class="px-2 py-1 rounded-2 rounded" style="background: #fff; font-size: 12px;">Website</div>
                      </div>
                      <div class="card-body m-0 p-3">
                          <a href="/siswa-online/tugas/detail" style="font-size: 15px" class="text-dark">
                              Tutorial Laravel SPA Menggunakan Blade Template Engine (Splade)
                          </a><br>
                          <div class="badge bg-light-success text-success px-4 mt-3" style="font-size: 12px">
                            Low
                        </div>
                      </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="tab-pane" id="profile2" role="tabpanel">
            <div class="row">
                @foreach (range(1, 2) as $data)
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="card">
                      <img class="card-img-top img-responsive w-100" src="{{ asset('assets/images/materi-1.png') }}" style="object-fit: cover;" alt="Card image cap" />
                      <div class="d-flex justify-content-between px-3" style="margin-top: -27px">
                          <img src="{{ asset('assets-user/dist/images/profile/user-1.jpg') }}" class="rounded-circle rounded" width="50px">
                          <div class="px-2 py-1 rounded-2 rounded" style="background: #fff; font-size: 12px;">Website</div>
                      </div>
                      <div class="card-body m-0 p-3">
                          <a href="/siswa-online/tugas/detail/detail-jawaban" style="font-size: 15px" class="text-dark">
                              Tutorial Laravel SPA Menggunakan Blade Template Engine (Splade)
                          </a><br>
                          <div class="badge bg-light-success text-success px-4 mt-3" style="font-size: 12px">
                            Low
                        </div>
                      </div>
                    </div>
                </div>
                @endforeach
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="card">
                      <img class="card-img-top img-responsive w-100" src="{{ asset('assets/images/materi-1.png') }}" style="object-fit: cover;" alt="Card image cap" />
                      <div class="d-flex justify-content-between px-3" style="margin-top: -27px">
                          <img src="{{ asset('assets-user/dist/images/profile/user-1.jpg') }}" class="rounded-circle rounded" width="50px">
                          <div class="px-2 py-1 rounded-2 rounded" style="background: #fff; font-size: 12px;">Website</div>
                      </div>
                      <div class="card-body m-0 p-3">
                          <a href="/siswa-online/tugas/detail/detail-jawaban" style="font-size: 15px" class="text-dark">
                              Tutorial Laravel SPA Menggunakan Blade Template Engine (Splade)
                          </a><br>
                          <div class="badge bg-light-danger text-danger px-4 mt-3" style="font-size: 12px">
                            High
                        </div>
                      </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="card">
                      <img class="card-img-top img-responsive w-100" src="{{ asset('assets/images/materi-1.png') }}" style="object-fit: cover;" alt="Card image cap" />
                      <div class="d-flex justify-content-between px-3" style="margin-top: -27px">
                          <img src="{{ asset('assets-user/dist/images/profile/user-1.jpg') }}" class="rounded-circle rounded" width="50px">
                          <div class="px-2 py-1 rounded-2 rounded" style="background: #fff; font-size: 12px;">Website</div>
                      </div>
                      <div class="card-body m-0 p-3">
                          <a href="/siswa-online/tugas/detail/detail-jawaban" style="font-size: 15px" class="text-dark">
                              Tutorial Laravel SPA Menggunakan Blade Template Engine (Splade)
                          </a><br>
                          <div class="badge bg-light-warning text-warning px-4 mt-3" style="font-size: 12px">
                            Medium
                        </div>
                      </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="card">
                      <img class="card-img-top img-responsive w-100" src="{{ asset('assets/images/materi-1.png') }}" style="object-fit: cover;" alt="Card image cap" />
                      <div class="d-flex justify-content-between px-3" style="margin-top: -27px">
                          <img src="{{ asset('assets-user/dist/images/profile/user-1.jpg') }}" class="rounded-circle rounded" width="50px">
                          <div class="px-2 py-1 rounded-2 rounded" style="background: #fff; font-size: 12px;">Website</div>
                      </div>
                      <div class="card-body m-0 p-3">
                          <a href="/siswa-online/tugas/detail/detail-jawaban" style="font-size: 15px" class="text-dark">
                              Tutorial Laravel SPA Menggunakan Blade Template Engine (Splade)
                          </a><br>
                          <div class="badge bg-light-primary text-primary px-4 mt-3" style="font-size: 12px">
                            Very high
                        </div>
                      </div>
                    </div>
                </div>
            </div> 
            </div>   
        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@2"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('.btn-edit').click(function () {
            var id = $(this).data('id'); 
            var title = $(this).data('title'); 
            var description = $(this).data('description'); 
            var image = $(this).data('image'); 
            $('#form-update').attr('action', '/journal/' + id);
            $('#title-edit').val(title);
            $('#description-edit').val(description);
            $('#image-edit').attr('src', image);
            $('#modal-edit').modal('show');
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

        $('.btn-detail').click(function() {
            var detail = $('#detail-content');
            detail.empty();
            var id = $(this).data('id');
            var name = $(this).data('name'); 
            var date = $(this).data('date'); 
            var school = $(this).data('school'); 
            var description = $(this).data('description'); 
            var image = $(this).data('image');
            detail.append('<div class="mb-2">');
            detail.append('<h6 class="f-w-600">Nama</h6>');
            detail.append('<p class="text-muted">' + name + '</p>')
            detail.append('</div>');
            detail.append('<div class="mb-2">');
            detail.append('<h6 class="f-w-600">Tanggal</h6>');
            detail.append('<p class="text-muted">' + date + '</p>')
            detail.append('</div>');
            detail.append('<div class="mb-2">');
            detail.append('<h6 class="f-w-600">Sekolah</h6>');
            detail.append('<p class="text-muted">' + school + '</p>')
            detail.append('</div>');
            detail.append('<div class="mb-2">');
            detail.append('<h6 class="f-w-600">Kegiatan</h6>');
            detail.append('<p>' + description + '</p>')
            detail.append('</div>');
            detail.append('<div class="mb-2">');
            detail.append('<h6 class="f-w-600">Bukti</h6>');
            detail.append('<img src="' + image + '" width="100%"></img>')
            detail.append('</div>');
            $('#detail').modal('show');
        });

        $('.btn-delete').click(function () {
            var id = $(this).data('id'); 
            $('#form-delete').attr('action', '/division/' + id);
            $('#modal-delete').modal('show');
        });
    </script>
@endsection
