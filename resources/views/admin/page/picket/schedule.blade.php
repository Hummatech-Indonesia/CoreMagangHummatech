@extends('admin.layouts.app')
@section('content')


<div class="card">
    <div class="card-body">
        <div class="row g-2 align-items-center">
            <div class="col-sm-4">
                <div class="bg-dark-subtle">
                    <ul class="nav nav-pills custom-nav nav-justified"role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="steparrow-gen-info-tab" data-bs-toggle="pill" data-bs-target="#steparrow-gen-info" type="button" role="tab"
                            aria-controls="steparrow-gen-info" aria-controls="steparrow-gen-info" aria-selected="true" data-position="0">
                            Pagi
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="steparrow-description-info-tab" data-bs-toggle="pill" data-bs-target="#steparrow-description-info" type="button" role="tab"
                            aria-controls="steparrow-description-info" aria-selected="false" data-position="1" tabindex="-1">
                                Sore
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-experience-tab" data-bs-toggle="pill" data-bs-target="#pills-experience" type="button" role="tab" aria-controls="pills-experience"
                            aria-selected="false" data-position="2" tabindex="-1">
                            Laporan
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-auto ms-auto d-flex justify-content-between ">
                <div class="list-grid-nav hstack gap-1">
                    <button class="btn btn-success mx-3" type="button" data-bs-toggle="modal" data-bs-target="#add">
                        Tambah Data
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

@if($errors->all())
<div class="alert alert-danger">
    <h3>Ada Kesalahan</h3>

    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</div>
@endif

<!-- Add Modal -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Tambah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('picket.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Waktu</label>
                        <div>
                            @foreach (\App\Enum\TimeEnum::cases() as $time)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="tim" id="{{ $time->value }}" value="{{ $time->value }}">
                                <label class="form-check-label" for="{{ $time->value }}">{{ $time->label() }}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Hari</label>
                        <select class="form-select" name="day_picket" id="" required>
                            @foreach (\App\Enum\DayEnum::cases() as $day)
                                <option value="{{ $day->value }}">{{ $day->label() }}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="form-group mb-3 mt-3 col-md-12">
                        <label for="division_id">Anggota</label>
                        <select class="tambah" aria-label="form-select example" name="student_id">
                            @foreach ($students as $division)
                                <option value="{{ $division->id }}"
                                    {{ $division->student_id == $division->id ? 'selected' : '' }}>
                                    {{ $division->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-soft-dark" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="tab-content">
    <!-- Pagi -->
    <div id="steparrow-gen-info" class="tab-pane fade show active">
        <div class="row row-cols-xxl-6 row-cols-lg-5 row-cols-1 justify-content-center">
            <div class="col mx-3">
                <div class="card mx-auto" style="max-width: 300px;">
                    <div class="card-header text-center rounded" style="background-color: #695EEF; color: white; padding: 0px;">
                        <p style="font-size: 14px; margin: 0;" class="pt-2 mb-2">Senin</p>
                    </div>
                    <div class="card-body text-center" style="padding: 0px;">
                        <div class="d-flex mb-4 align-items-center justify-content-center">
                            <div class="flex-grow-1 ms-2 pt-3 pb-3" >
                                <h5 class="mb-3">Jhon Doe</h5>
                                <h5 class="mb-3">Alexander Arnold</h5>
                                <h5 class="mb-3">Monkey D Luffy</h5>
                                <h5 class="mb-3">Namikaze</h5>
                                <h5 class="mb-3">Hashirama</h5>

                            </div>
                        </div>
                    </div>
                </div>
                <button data-bs-toggle="modal" data-bs-target="#editModal" class="btn btn-soft-primary w-100 d-flex align-items-center justify-content-center" style="font-size: 18px;">
                    <i class="ri-ball-pen-line mx-2"></i>
                    Edit Siswa
                </button>
            </div>
        </div>

        <div class="row pt-5">
            <div class="card">
                <div class="card-body">
                    <div class="row g-2">
                        <div class="col-sm-4">
                            <h4 class=" pt-2">Catatan</h4>
                        </div>
                        <div class="col-sm-auto ms-auto d-flex">
                            <div class="list-grid-nav hstack gap-1">
                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#notes">
                                    Tambah Data
                                  </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="card bg-white" style="height: 300px;">
                <div class="card-body">
                    <!-- Konten card Anda di sini -->
                </div>
            </div>
        </div>

    </div>

     <!-- Sore -->
    <div id="steparrow-description-info" class="tab-pane fade">
        <div class="row row-cols-xxl-6 row-cols-lg-5 row-cols-1 justify-content-center">
            <div class="col mx-3">
                <div class="card mx-auto" style="max-width: 300px;">
                    <div class="card-header text-center rounded" style="background-color: #695EEF; color: white; padding: 0px;">
                        <p style="font-size: 14px; margin: 0;" class="pt-2 mb-2">Senin</p>
                    </div>

                    <div class="card-body text-center" style="padding: 0px;">
                        <div class="d-flex mb-4 align-items-center justify-content-center">
                            <div class="flex-grow-1 ms-2 pt-3 pb-3" >
                                <h5 class="mb-3">Jhon Doe</h5>
                                <h5 class="mb-3">Alexander Arnold</h5>
                                <h5 class="mb-3">Monkey D Luffy</h5>
                                <h5 class="mb-3">Namikaze</h5>
                                <h5 class="mb-3">Hashirama</h5>

                            </div>
                        </div>
                    </div>
                </div>
                <button data-bs-toggle="modal" data-bs-target="#editModal" class="btn btn-soft-primary w-100 d-flex align-items-center justify-content-center" style="font-size: 18px;">
                    <i class="ri-ball-pen-line mx-2"></i>
                    Edit Siswa
                </button>
            </div>
        </div>
        
        <div class="row">
            <div class="card bg-white" style="height: 300px;">
                <div class="card-body">
                    <!-- Konten card Anda di sini -->
                </div>
            </div>
        </div>
    </div>

    <div id="pills-experience" class="tab-pane fade">
        <div class="row">
            <div class="col-xxl-6 d-flex">
                <div class="card flex-fill">
                    <div class="row g-0 align-items-stretch">
                        <div class="col-md-4">
                            <img src="assets/images/small/img-12.jpg" alt="My Image" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div class="col-md-8">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Inspektur : Niel</h5>
                            </div>
                            <div class="card-body">
                                <p class="card-text mb-2">For that very reason, I went on a quest and spoke to many different professional graphic designers and asked them what graphic design tips they live.</p>
                                <p class="card-text">
                                    <small class="text-muted"> Jumat-Sore</small>
                                </p>
                                <div class="">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detailModal" style="background-color: #695EEF;">Lihat Detail</button>
                                    <button type="button" class="btn btn-success">Terima</button>
                                    <button type="button" class="btn btn-danger" style="background-color: #DC3545;">Tolak</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-6 d-flex">
                <div class="card flex-fill">
                    <div class="row g-0 align-items-stretch">
                        <div class="col-md-4">
                            <img src="assets/images/small/img-12.jpg" alt="My Image" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div class="col-md-8">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Inspektur : Niel</h5>
                            </div>
                            <div class="card-body">
                                <p class="card-text mb-2">For that very reason, I went on a quest and spoke to many different professional graphic designers and asked them what graphic design tips they live.</p>
                                <p class="card-text">
                                    <small class="text-muted"> Jumat-Sore</small>
                                </p>
                                <div class="">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detailModal" style="background-color: #695EEF;">Lihat Detail</button>
                                    <button type="button" class="btn btn-success">Terima</button>
                                    <button type="button" class="btn btn-danger" style="background-color: #DC3545;">Tolak</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Tambah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label class="form-label">Waktu</label>
                        <div class="mb-3 d-flex align-items-center">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="time" id="morning" value="MORNING">
                                <label class="form-check-label" for="morning">
                                    Pagi
                                </label>
                            </div>
                            <div class="form-check ms-3">
                                <input class="form-check-input" type="radio" name="time" id="afternoon" value="AFTERNOON">
                                <label class="form-check-label" for="afternoon">
                                    Sore
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Hari</label>
                        <select class="form-select" id="day">
                            <option value="MONDAY">Senin</option>
                            <option value="TUESDAY">Selasa</option>
                            <option value="WEDNESDAY">Rabu</option>
                            <option value="THURSDAY">Kamis</option>
                            <option value="FRIDAY">Jumat</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Anggota</label>
                        <select class="form-select" id="time">
                            <option value="">Pilih Siswa</option>
                            <option value="MORNING">Pagi</option>
                            <option value="AFTERNOON">Sore</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Simpan</button>
                <button type="button" class="btn btn-soft-dark" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div> <!-- end modal -->

<!-- Note Modal -->
<div class="modal fade" id="notes" tabindex="-1" aria-labelledby="addLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addLabel">Tambah Data</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Catatan</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary ">Simpan</button>
          <button type="button" class="btn btn-light " data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Detail Modal -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="showModalLabel">Detail Laporan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>
                    <h6 style="color: black;">Hari :</h6>
                    <p id="modalName">Jumat</p>
                </div>
                <div>
                    <h6 style="color: black;">Waktu :</h6>
                    <p id="modalName">Sore</p>
                </div>
                <div>
                    <h6 style="color: black;">Bukti :</h6>
                    <p id="modalName">
                        <img src="assets/images/galaxy/img-1.png" alt="My Image" style="width: 100%; height: auto;">
                    </p>
                </div>
                <div>
                    <h6 style="color: black;">Deskripsi :</h6>
                    <p id="modalName">
                        Lorem ipsum dolor sit amet consectetur. Viverra ornare ullamcorper mattis amet pretium. Morbi ac ipsum tellus dignissim sapien. Diam at enim semper pharetra ac libero a neque sit. Sit tristique fermentum ullamcorper leo mattis quis. Nisl eget viverra id imperdiet pharetra. Elit in pulvinar adipiscing diam adipiscing. Senectus cum in amet a congue. Amet etiam vitae fringilla adipiscing sit et lorem. Urna mi sed ac commodo. Ornare nulla sit sit porta. Varius commodo tortor odio aliquam consectetur.
                    </p>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
  </div>

@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $(".tambah").select2({
            dropdownParent: $("#add")
        });
    });
    $(document).ready(function() {
        $(".js-example-basic-single").select2({
            dropdownParent: $("#modal-edit")
        });
    });
</script>
@endsection
