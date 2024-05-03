@extends('Hummatask.layouts.app')
@section('content')
{{-- modal add team start --}}
<div class="modal fade" id="add-team" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Buat Tim Solo Project</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('team.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="modal-body">
            <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                <label for="image-input3" class="form-label text-white hover-label">
                  <div class="image-container">
                    <div class="img-img text-center">
                      <img
                        src="{{ asset('pen.png') }}"
                        alt="example placeholder" id="preview-image3" class="img-fluid rounded-circle col-lg-3" style="object-fit: cover">
                    </div>
                    <div class="overlay">
                      <i class="ti ti-pencil"></i>
                    </div>
                  </div>
                  <input type="file" class="d-none" id="image-input3" name="image"
                    onchange="previewImage()" />
                </label>
                @error('image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="mx-3 my-2">
                    <label for="" class="mt-2 mb-2">Nama Tim</label>
                    <input type="text" name="name" class="form-control" placeholder="Masukkan nama tim" value="{{ old('name') }}">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <label for="" class="mt-4 mb-2">Tema</label>
                    <textarea name="description" class="form-control" rows="5" placeholder="Masukkan deskripsi tema anda">{{ old('description') }}</textarea>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-light-danger text-danger" data-bs-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
      </div>
    </div>
</div>
{{-- modal add team end --}}
    <div class="card w-100 bg-light-info overflow-hidden shadow-none">
        <div class="card-body position-relative">
            <div class="row">
                <div class="col-sm-8">
                    <div class="d-flex align-items-center mb-7">
                        <div class="rounded-circle overflow-hidden me-6">
                            <img src="{{ asset('assets-user/dist/images/profile/user-1.jpg') }}" alt="" width="40"
                                height="40">
                        </div>
                        <h5 class="fw-semibold mb-0 fs-5 mt-1">Rabu, 20 Maret 2024</h5>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="border-end pe-4 border-opacity-10">
                            <h3 class="mb-1 fw-semibold fs-8 d-flex align-content-center">Selamat datang, {{ auth()->user()->student->name }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="welcome-bg-img mb-n7 text-end">
                        <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/backgrounds/welcome-bg.svg"
                            alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <h5 class="fs-5  mb-4" style="font-weight: 600">
        Tugas terbaru
    </h5>
    <div class="row mt-2">
        <div class="col-12 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <p class="fs-3 text-dark" style="font-weight:500">
                        Lorem ipsum dolor sit amet consectetur. Et in et quis metus nunc tempus dignissim dui amet vulputate.
                    </p>
                    <div class="row">
                        <div class="col">
                            <div class="w-100 tb-section-2">
                                <span class="w-100 badge text-bg-warning fs-1">Front End</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="w-100 tb-section-2">
                                <span class="w-100 badge text-bg-danger fs-1">Mendesak</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="w-100 tb-section-2">
                                <span class="w-100 badge text-bg-primary fs-1">Di Revisi Mentor</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <p class="text-danger mb-0 ">
                        Sudah melewati batas deadline
                    </p>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <p class="fs-3 text-dark" style="font-weight:500">
                        Lorem ipsum dolor sit amet consectetur. Et in et quis metus nunc tempus dignissim dui amet vulputate.
                    </p>
                    <div class="row">
                        <div class="col">
                            <div class="w-100 tb-section-2">
                                <span class="w-100 badge text-bg-warning fs-1">Front End</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="w-100 tb-section-2">
                                <span class="w-100 badge text-bg-danger fs-1">Mendesak</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="w-100 tb-section-2">
                                <span class="w-100 badge text-bg-primary fs-1">Di Revisi Mentor</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <p class="text-primary mb-0 ">
                        3 Hari Lagi
                    </p>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <p class="fs-3 text-dark" style="font-weight:500">
                        Lorem ipsum dolor sit amet consectetur. Et in et quis metus nunc tempus dignissim dui amet vulputate.
                    </p>
                    <div class="row">
                        <div class="col">
                            <div class="w-100 tb-section-2">
                                <span class="w-100 badge text-bg-warning fs-1">Front End</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="w-100 tb-section-2">
                                <span class="w-100 badge text-bg-danger fs-1">Mendesak</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="w-100 tb-section-2">
                                <span class="w-100 badge text-bg-primary fs-1">Di Revisi Mentor</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <p class="text-primary mb-0 ">
                        3 Hari Lagi
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script>
    function previewImage() {
      var preview = document.getElementById('preview-image3');
      var fileInput = document.getElementById('image-input3');
      var file = fileInput.files[0];

      if (file) {
        var reader = new FileReader();

        reader.onload = function(e) {
          preview.src = e.target.result;
        };

        reader.readAsDataURL(file);
      } else {
        Swal.fire({
          icon: 'warning',
          title: 'Peringatan',
          text: 'Silahkan pilih file gambar!',
          showConfirmButton: false
        });
      }
    }
  </script>
@endsection