@extends('Hummatask.team.layouts.app')
@section('content')
    <div class="card p-4 bg-light-info overflow-hidden shadow-none">
        <div class="d-flex gap-4">
          <div class="description">
            <h4 class="text-primary text-capitalize" style="font-weight: 700">Perhatikan!</h4>
            <p class="m-0">List <span style="font-weight: 800">5</span> tema projek untuk tim anda beserta deskripsinya.</p>
            <p class="m-0">Apabila sudah anda ajukan, silahkan temui mentor anda dan tunggu mentor untuk menyetujui salah satu tema projek yang diajukan tim anda.</p>
            <h6 class="mt-2 text-warning" style="font-weight: 600">Mentor: Test Mentor</h6>
          </div>
        </div>
    </div>
    <div class="card">
        <div class="card-bod p-3">
            <form action="{{ route('project.store', ['slug' => $team->slug]) }}" method="post">
                @csrf
                @foreach (range(1, 5) as $key => $item)
                    <div class="row col-12 mb-4">
                        <div class="col-4">
                            <label for="" class="mt-1 mb-1">Tema ke-{{ ++$key }}</label>
                            <input type="text" name="title[]" class="form-control" placeholder="Masukkan Tema"
                                value="{{ old('title*') }}">
                            @error('title*')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-8">
                            <label for="" class="mt-1 mb-1">Deskripsi tema ke-{{ $key }}</label>
                            <input type="text" name="description[]" class="form-control" placeholder="Masukkan Deskripsi Tema"
                                value="{{ old('description*') }}">
                            @error('description*')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                @endforeach
                <button type="submit" class="justify-content-center w-100 btn mb-1 btn-rounded btn-info d-flex align-items-center">
                    <i class="ti ti-send fs-4 me-2"></i>
                    Ajukan semua tema
                </button>
            </form>
        </div>
    </div>

{{-- edit tim modal --}}
<div class="modal fade" id="edit-team" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Edit Tim</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('team-student.update', $team->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
        <div class="modal-body">
            <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                <label for="image-input3" class="form-label text-white hover-label">
                  <div class="image-container">
                    <div class="img-img text-center">
                      <img
                        src="{{ $team->image == null ? asset('pen.png') : asset('storage/'. $team->image) }}"
                        alt="example placeholder" id="preview-image3" class="img-fluid rounded-circle col-lg-3" style="object-fit: cover">
                    </div>
                  </div>
                  <input type="file" class="d-none" id="image-input3" name="image"
                    onchange="previewImage()" />
                </label>
                @error('image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="mx-3">
                    <label for="" class="mt-1 mb-2">Nama Tim</label>
                    <input type="text" name="name" class="form-control" placeholder="Masukkan nama tim" value="{{ old('name', $team->name) }}">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <label for="" class="mt-4 mb-2">Deskripsi Tema</label>
                    <textarea name="description" class="form-control" rows="5" placeholder="Masukkan deskripsi tema anda">{{ old('description', $team->description) }}</textarea>
                    @error('description')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
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
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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