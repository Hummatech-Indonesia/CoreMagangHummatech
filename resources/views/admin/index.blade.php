@extends('admin.layouts.app')
<div hidden>
    @dump(session('success'))
    @dump(session('error'))
</div>
@section('content')
@if ($errors->all())
<div class="alert alert-danger">
    <h3>Ada Kesalahan</h3>

    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</div>
@endif
@if(session('success'))
    <div class="alert alert-success" style="position: fixed; top: 20px; right: 20px; z-index: 1000;">
        {{ session('success') }}
    </div>
@endif

    <div class="row">
        <div class="col-12 col-md-4">
            <h4>Selamat Datang Admin</h4>
            <p>Pantau absensi dan jurnal dengan mudah. Pastikan untuk meninjau dan memproses semua permintaan izin yang
                tertunda.</p>
        </div>
        <div class="col-12 col-md-8">
            <div class="d-flex justify-content-end gap-2">
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target=".myModal">Ubah Account Admin</button>
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target=".myModalProfile">Ubah Profile Admin</button>
                {{--  <button class="btn btn-success" data-bs-toggle="modal" data-bs-target=".myModal1">Ubah Data CEO</button>  --}}
            </div>
        </div>
    </div>

    <div class="modal fade myModalProfile" id="myModalProfile" aria-labelledby="myModalLabel" aria-hidden="true" tabindex="-1"
        style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Ubah Profile Admin</h5>
                    <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                </div>
                @if ($dataadmin == null)
                <form action="administrator/data-admin/store" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="d-flex justify-content-center">
                            <label class="form-label text-white" for="image-input1">
                                <img class="rounded-circle" id="preview-image1"
                                    src="https://task.hummatech.com/assets/img/avatars/pen.png"
                                    alt="example placeholder"
                                    style="width: 150px; height: 150px; border-radius: 10px; cursor: pointer;object-fit: cover">
                                <input class="form-control d-none" id="image-input1" name="image" type="file"
                                    accept="image/*">
                            </label>
                        </div>
                        <div class="mb-2">
                            <label for="">Foto</label>
                            <input class="form-control" id="" name="image" type="file"
                                placeholder="Masukkan foto">
                        </div>
                        <div class="mb-2">
                            <label for="">Nama</label>
                            <input class="form-control" id="" name="name" type="text"  value=""
                                placeholder="Masukkan Nama">
                        </div>
                        <div class="mb-2">
                            <label for="">PT</label>
                            <input class="form-control" id="" name="company" type="text"  value=""
                                placeholder="Masukkan Nama Pt">
                        </div>
                        <div class="mb-2">
                            <label for="">Jabatan</label>
                            <input class="form-control" id="" name="field" type="text" value=""
                                placeholder="Masukkan Jabatan">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-light" data-bs-dismiss="modal" type="button">Close</button>
                        <button class="btn btn-primary" type="submit">Save Changes</button>
                    </div>
                </form>
                @else
                <form action="administrator/data-admin/update/{{ $dataadmin->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="d-flex justify-content-center">
                            <label class="form-label text-white" for="image-input1">
                                <img class="rounded-circle" id="preview-image1"
                                    src="{{ asset('storage/' . $dataadmin->image) }}" alt="example placeholder"
                                    style="width: 150px; height: 150px; border-radius: 10px; cursor: pointer;object-fit: cover">
                                <input class="form-control d-none" id="image-input1" name="image" type="file"
                                    accept="image/*">
                            </label>
                        </div>
                        <div class="mb-2">
                            <label for="">Foto</label>
                            <input class="form-control" id="" name="image" type="file"
                                placeholder="Masukkan Nama">
                        </div>
                        <div class="mb-2">
                            <label for="">Nama</label>
                            <input class="form-control" id="" name="name" type="text"
                                value="{{ $dataadmin->name }}" placeholder="Masukkan Nama">
                        </div>
                        <div class="mb-2">
                            <label for="">PT</label>
                            <input class="form-control" id="" name="company" type="text"
                                value="{{ $dataadmin->company }}" placeholder="Masukkan PT">
                        </div>
                        <div class="mb-2">
                            <label for="">Jabatan</label>
                            <input class="form-control" id="" name="field" type="text"
                                value="{{ $dataadmin->field }}" placeholder="Masukkan Jabatan">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-light" data-bs-dismiss="modal" type="button">Close</button>
                        <button class="btn btn-primary" type="submit">Save Changes</button>
                    </div>
                </form>
       @endif



            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="modal fade myModal" id="myModal" aria-labelledby="myModalLabel" aria-hidden="true" tabindex="-1"
        style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Ubah Data Admin</h5>
                    <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                </div>

                <form action="administrator/account-admin/update/{{ Auth::id() }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-2">
                            <label for="">Nama</label>
                            <input class="form-control" id="" name="name" type="text" value="{{ Auth::user()->name }}"
                                placeholder="Masukkan Nama">
                        </div>
                        <div class="mb-2">
                            <label for="">Email</label>
                            <input class="form-control" id="" name="email" type="email" value="{{ Auth::user()->email }}"
                                placeholder="Masukkan Email">
                        </div>
                        <div class="mb-2">
                            <label for="">Password</label>
                            <input class="form-control" id="" name="password" type="text" value=""
                                placeholder="Masukkan Password">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-light" data-bs-dismiss="modal" type="button">Close</button>
                        <button class="btn btn-primary" type="submit">Save Changes</button>
                    </div>
                </form>


            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    {{--  <div class="modal fade myModal1" id="myModal" aria-labelledby="myModalLabel" aria-hidden="true" tabindex="-1"
        style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Data CEO</h5>
                    <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                </div>
                @if ($dataceo == null)
                    <form action="/dataceo/store" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="d-flex justify-content-center">
                                <label class="form-label text-white" for="image-input1">
                                    <img class="rounded-circle" id="preview-image1"
                                        src="https://task.hummatech.com/assets/img/avatars/pen.png"
                                        alt="example placeholder"
                                        style="width: 150px; height: 150px; border-radius: 10px; cursor: pointer;object-fit: cover">
                                    <input class="form-control d-none" id="image-input1" name="image" type="file"
                                        accept="image/*">
                                </label>
                            </div>
                            <div class="mb-2">
                                <label for="">Foto</label>
                                <input class="form-control" id="" name="image" type="file"
                                    placeholder="Masukkan Nama">
                            </div>
                            <div class="mb-2">
                                <label for="">Nama</label>
                                <input class="form-control" id="" name="name" type="text"
                                    placeholder="Masukkan Nama">
                            </div>
                            <div class="mb-2">
                                <label for="">PT</label>
                                <input class="form-control" id="" name="company" type="text"
                                    placeholder="Masukkan PT">
                            </div>
                            <div class="mb-2">
                                <label for="">Jabatan</label>
                                <input class="form-control" id="" name="field" type="text"
                                    placeholder="Masukkan Jabatan">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-light" data-bs-dismiss="modal" type="button">Close</button>
                            <button class="btn btn-primary" type="submit">Save Changes</button>
                        </div>
                    </form>
                @else
                    <form action="/dataceo/update/{{ $dataceo->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="d-flex justify-content-center">
                                <label class="form-label text-white" for="image-input1">
                                    <img class="rounded-circle" id="preview-image1"
                                        src="{{ asset('storage/' . $dataceo->image) }}" alt="example placeholder"
                                        style="width: 150px; height: 150px; border-radius: 10px; cursor: pointer;object-fit: cover">
                                    <input class="form-control d-none" id="image-input1" name="image" type="file"
                                        accept="image/*">
                                </label>
                            </div>
                            <div class="mb-2">
                                <label for="">Foto</label>
                                <input class="form-control" id="" name="image" type="file"
                                    placeholder="Masukkan Nama">
                            </div>
                            <div class="mb-2">
                                <label for="">Nama</label>
                                <input class="form-control" id="" name="name" type="text"
                                    value="{{ $dataceo->name }}" placeholder="Masukkan Nama">
                            </div>
                            <div class="mb-2">
                                <label for="">PT</label>
                                <input class="form-control" id="" name="company" type="text"
                                    value="{{ $dataceo->company }}" placeholder="Masukkan PT">
                            </div>
                            <div class="mb-2">
                                <label for="">Jabatan</label>
                                <input class="form-control" id="" name="field" type="text"
                                    value="{{ $dataceo->field }}" placeholder="Masukkan Jabatan">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-light" data-bs-dismiss="modal" type="button">Close</button>
                            <button class="btn btn-primary" type="submit">Save Changes</button>
                        </div>
                    </form>
                @endif

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->  --}}

    <div class="row">
        <div class="col-xxl-4">
            <div class="d-flex flex-column h-100">
                <div class="row h-100">
                    <div class="col-12">
                        <div class="card">
                            <div class="row align-items-end">
                                <div class="card-body mx-3">
                                    <form action="{{ route('administrator.absent.maxlate.store') }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <label class="form-label" for="valueInput" style="font-size: 16px">Atur Maksimal
                                            Terlambat</label>
                                        <input class="form-control" id="valueInput" name="minute" type="number"
                                            value="{{ $maxLateMinute->minute ?? 0 }}">
                                        <div class="mt-3 text-end">
                                            <button class="btn btn-secondary waves-effect waves-light"
                                                type="submit">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p class="fw-medium text-muted mb-0">MENUNGGU KONFIRMASI</p>
                                        <h2 class="ff-secondary fw-semibold mt-4">
                                            <span class="counter-value" data-target="{{ $countPending }}"></span>
                                        </h2>
                                    </div>
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title rounded-3 fs-2" style="background-color: #FEF4E4">
                                            <i class="ri-user-settings-fill" style="color: #FFAE1F"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p class="fw-medium text-muted mb-0">SISWA DITOLAK</p>
                                        <h2 class="ff-secondary fw-semibold mt-4">
                                            <span class="counter-value" data-target="{{ $countDecline }}"></span>
                                        </h2>
                                        {{-- <a href="javascript:void(0)" class="text-decoration-underline">Lihat Data
                                            Siswa</a> --}}
                                    </div>
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title rounded-3 fs-2" style="background-color: #FBF2EF">
                                            <i class="ri-user-unfollow-fill" style="color: #DC3545"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p class="fw-medium text-muted mb-0">SISWA AKTIF</p>
                                        <h2 class="ff-secondary fw-semibold mt-4">
                                            <span class="counter-value" data-target="{{ $countofflineactive }}"></span>
                                        </h2>
                                    </div>
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title rounded-3 fs-2" style="background-color: #EDF9FF">
                                            <i class="ri-user-received-fill" style="color: #099885"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p class="fw-medium text-muted mb-0">SISWA TIDAK AKTIF</p>
                                        <h2 class="ff-secondary fw-semibold mt-4">
                                            <span class="counter-value"
                                                data-target="{{ $countofflinenonactive }}"></span>
                                        </h2>
                                    </div>
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title rounded-3 fs-2" style="background-color: #ececec">
                                            <i class="ri-user-shared-fill" style="color: #7a7a7a"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p class="fw-medium text-muted mb-0">SISWA OFFLINE</p>
                                        <h2 class="ff-secondary fw-semibold mt-4">
                                            <span class="counter-value" data-target="{{ $countOffline }}"></span>
                                        </h2>
                                    </div>
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title rounded-3 fs-2" style="background-color: #f6edff">
                                            <i class="ri-account-circle-fill" style="color: #470998"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p class="fw-medium text-muted mb-0">SISWA ONLINE</p>
                                        <h2 class="ff-secondary fw-semibold mt-4">
                                            <span class="counter-value" data-target="{{ $countOnline }}"></span>
                                        </h2>
                                    </div>
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title rounded-3 fs-2" style="background-color: #edf1ff">
                                            <i class="ri-account-box-fill" style="color: #093498"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p class="fw-medium text-muted mb-0">TOTAL ALUMNI</p>
                                        <h2 class="ff-secondary fw-semibold mt-4">
                                            <span class="counter-value" data-target="{{ $countAlumni }}"></span>
                                        </h2>
                                    </div>
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title rounded-3 fs-2" style="background-color: #edf7ff">
                                            <i class="ri-user-3-fill" style="color: #2799fc"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-8">
            <div class="row h-100">
                <div class="col-xl-12">
                    <div class="card card-height-100">
                        <div class="card-header border-0">
                            <h4 class="card-title flex-grow-1 mb-3">Atur Jam Masuk Kantor</h4>
                            <div class="">
                                <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0 d-flex rounded"
                                    role="tablist">

                                    <li class="nav-item active">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#monday" role="tab"
                                            aria-selected="true">Senin</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#tuesday" role="tab"
                                            aria-selected="false">Selasa</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#wednesday" role="tab"
                                            aria-selected="false">Rabu</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#thursday" role="tab"
                                            aria-selected="false">Kamis</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#friday" role="tab"
                                            aria-selected="false">Jumat</a>
                                    </li>
                                </ul>

                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tab-content p-0">
                                <div class="tab-pane active" id="monday" role="tabpanel">
                                    <form action="{{ route('administrator.attendance-rule.store') }}" method="post">
                                        @csrf
                                        <input name="day" type="hidden" value="monday">
                                        <label class="form-label" for="exampleInputtime">Masuk :</label>
                                        <div class="d-flex">
                                            <input class="form-control" id="exampleInputtime" name="checkin_starts"
                                                type="time" value="{{ $monday->checkin_starts ?? '' }}">
                                            @error('checkin_starts')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                            <h2 class="ms-2">-</h2>
                                            <input class="form-control ms-2" id="exampleInputtime" name="checkin_ends"
                                                type="time" value="{{ $monday->checkin_ends ?? '' }}">
                                            @error('checkin_ends')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>

                                        <label class="form-label mt-3" for="exampleInputtime">Istirahat :</label>
                                        <div class="d-flex">
                                            <input class="form-control" id="exampleInputtime" name="break_starts"
                                                type="time" value="{{ $monday->break_starts ?? '' }}">
                                            @error('break_starts')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                            <h2 class="ms-2">-</h2>
                                            <input class="form-control ms-2" id="exampleInputtime" name="break_ends"
                                                type="time" value="{{ $monday->break_ends ?? '' }}">
                                            @error('break_ends')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>

                                        <label class="form-label mt-3" for="exampleInputtime">Kembali :</label>
                                        <div class="d-flex">
                                            <input class="form-control" id="exampleInputtime" name="return_starts"
                                                type="time" value="{{ $monday->return_starts ?? '' }}">
                                            @error('return_starts')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                            <h2 class="ms-2">-</h2>
                                            <input class="form-control ms-2" id="exampleInputtime" name="return_ends"
                                                type="time" value="{{ $monday->return_ends ?? '' }}">
                                            @error('return_ends')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>

                                        <label class="form-label mt-3" for="exampleInputtime">Pulang :</label>
                                        <div class="d-flex">
                                            <input class="form-control" id="exampleInputtime" name="checkout_starts"
                                                type="time" value="{{ $monday->checkout_starts ?? '' }}">
                                            @error('checkout_starts')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                            <h2 class="ms-2">-</h2>
                                            <input class="form-control ms-2" id="exampleInputtime" name="checkout_ends"
                                                type="time" value="{{ $monday->checkout_ends ?? '' }}">
                                            @error('checkout_ends')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                        <button class="btn btn-secondary w-100 waves-effect waves-light mt-3"
                                            type="submit">Simpan</button>
                                    </form>
                                </div>
                                <div class="tab-pane" id="tuesday" role="tabpanel">
                                    <form action="{{ route('administrator.attendance-rule.store') }}" method="post">
                                        @csrf
                                        <input name="day" type="hidden" value="tuesday">
                                        <label class="form-label" for="exampleInputtime">Masuk :</label>
                                        <div class="d-flex">
                                            <input class="form-control" id="exampleInputtime" name="checkin_starts"
                                                type="time" value="{{ $tuesday->checkin_starts ?? '' }}">
                                            @error('checkin_starts')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                            <h2 class="ms-2">-</h2>
                                            <input class="form-control ms-2" id="exampleInputtime" name="checkin_ends"
                                                type="time" value="{{ $tuesday->checkin_ends ?? '' }}">
                                            @error('checkin_ends')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>

                                        <label class="form-label mt-3" for="exampleInputtime">Istirahat :</label>
                                        <div class="d-flex">
                                            <input class="form-control" id="exampleInputtime" name="break_starts"
                                                type="time" value="{{ $tuesday->break_starts ?? '' }}">
                                            @error('break_starts')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                            <h2 class="ms-2">-</h2>
                                            <input class="form-control ms-2" id="exampleInputtime" name="break_ends"
                                                type="time" value="{{ $tuesday->break_ends ?? '' }}">
                                            @error('break_ends')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>

                                        <label class="form-label mt-3" for="exampleInputtime">Kembali :</label>
                                        <div class="d-flex">
                                            <input class="form-control" id="exampleInputtime" name="return_starts"
                                                type="time" value="{{ $tuesday->return_starts ?? '' }}">
                                            @error('return_starts')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                            <h2 class="ms-2">-</h2>
                                            <input class="form-control ms-2" id="exampleInputtime" name="return_ends"
                                                type="time" value="{{ $tuesday->return_ends ?? '' }}">
                                            @error('return_ends')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>

                                        <label class="form-label mt-3" for="exampleInputtime">Pulang :</label>
                                        <div class="d-flex">
                                            <input class="form-control" id="exampleInputtime" name="checkout_starts"
                                                type="time" value="{{ $tuesday->checkout_starts ?? '' }}">
                                            @error('checkout_starts')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                            <h2 class="ms-2">-</h2>
                                            <input class="form-control ms-2" id="exampleInputtime" name="checkout_ends"
                                                type="time" value="{{ $tuesday->checkout_ends ?? '' }}">
                                            @error('checkout_ends')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                        <button class="btn btn-secondary w-100 waves-effect waves-light mt-3"
                                            type="submit">Simpan</button>
                                    </form>
                                </div>
                                <div class="tab-pane" id="wednesday" role="tabpanel">
                                    <form action="{{ route('administrator.attendance-rule.store') }}" method="post">
                                        @csrf
                                        <input name="day" type="hidden" value="wednesday">
                                        <label class="form-label" for="exampleInputtime">Masuk :</label>
                                        <div class="d-flex">
                                            <input class="form-control" id="exampleInputtime" name="checkin_starts"
                                                type="time" value="{{ $wednesday->checkin_starts ?? '' }}">
                                            @error('checkin_starts')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                            <h2 class="ms-2">-</h2>
                                            <input class="form-control ms-2" id="exampleInputtime" name="checkin_ends"
                                                type="time" value="{{ $wednesday->checkin_ends ?? '' }}">
                                            @error('checkin_ends')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>

                                        <label class="form-label mt-3" for="exampleInputtime">Istirahat :</label>
                                        <div class="d-flex">
                                            <input class="form-control" id="exampleInputtime" name="break_starts"
                                                type="time" value="{{ $wednesday->break_starts ?? '' }}">
                                            @error('break_starts')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                            <h2 class="ms-2">-</h2>
                                            <input class="form-control ms-2" id="exampleInputtime" name="break_ends"
                                                type="time" value="{{ $wednesday->break_ends ?? '' }}">
                                            @error('break_ends')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>

                                        <label class="form-label mt-3" for="exampleInputtime">Kembali :</label>
                                        <div class="d-flex">
                                            <input class="form-control" id="exampleInputtime" name="return_starts"
                                                type="time" value="{{ $wednesday->return_starts ?? '' }}">
                                            @error('return_starts')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                            <h2 class="ms-2">-</h2>
                                            <input class="form-control ms-2" id="exampleInputtime" name="return_ends"
                                                type="time" value="{{ $wednesday->return_ends ?? '' }}">
                                            @error('return_ends')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>

                                        <label class="form-label mt-3" for="exampleInputtime">Pulang :</label>
                                        <div class="d-flex">
                                            <input class="form-control" id="exampleInputtime" name="checkout_starts"
                                                type="time" value="{{ $wednesday->checkout_starts ?? '' }}">
                                            @error('checkout_starts')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                            <h2 class="ms-2">-</h2>
                                            <input class="form-control ms-2" id="exampleInputtime" name="checkout_ends"
                                                type="time" value="{{ $wednesday->checkout_ends ?? '' }}">
                                            @error('checkout_ends')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                        <button class="btn btn-secondary w-100 waves-effect waves-light mt-3"
                                            type="submit">Simpan</button>
                                    </form>
                                </div>
                                <div class="tab-pane" id="thursday" role="tabpanel">
                                    <form action="{{ route('administrator.attendance-rule.store') }}" method="post">
                                        @csrf
                                        <input name="day" type="hidden" value="thursday">
                                        <label class="form-label" for="exampleInputtime">Masuk :</label>
                                        <div class="d-flex">
                                            <input class="form-control" id="exampleInputtime" name="checkin_starts"
                                                type="time" value="{{ $thursday->checkin_starts ?? '' }}">
                                            @error('checkin_starts')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                            <h2 class="ms-2">-</h2>
                                            <input class="form-control ms-2" id="exampleInputtime" name="checkin_ends"
                                                type="time" value="{{ $thursday->checkin_ends ?? '' }}">
                                            @error('checkin_ends')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>

                                        <label class="form-label mt-3" for="exampleInputtime">Istirahat :</label>
                                        <div class="d-flex">
                                            <input class="form-control" id="exampleInputtime" name="break_starts"
                                                type="time" value="{{ $thursday->break_starts ?? '' }}">
                                            @error('break_starts')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                            <h2 class="ms-2">-</h2>
                                            <input class="form-control ms-2" id="exampleInputtime" name="break_ends"
                                                type="time" value="{{ $thursday->break_ends ?? '' }}">
                                            @error('break_ends')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>

                                        <label class="form-label mt-3" for="exampleInputtime">Kembali :</label>
                                        <div class="d-flex">
                                            <input class="form-control" id="exampleInputtime" name="return_starts"
                                                type="time" value="{{ $thursday->return_starts ?? '' }}">
                                            @error('return_starts')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                            <h2 class="ms-2">-</h2>
                                            <input class="form-control ms-2" id="exampleInputtime" name="return_ends"
                                                type="time" value="{{ $thursday->return_ends ?? '' }}">
                                            @error('return_ends')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>

                                        <label class="form-label mt-3" for="exampleInputtime">Pulang :</label>
                                        <div class="d-flex">
                                            <input class="form-control" id="exampleInputtime" name="checkout_starts"
                                                type="time" value="{{ $thursday->checkout_starts ?? '' }}">
                                            @error('checkout_starts')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                            <h2 class="ms-2">-</h2>
                                            <input class="form-control ms-2" id="exampleInputtime" name="checkout_ends"
                                                type="time" value="{{ $thursday->checkout_ends ?? '' }}">
                                            @error('checkout_ends')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                        <button class="btn btn-secondary w-100 waves-effect waves-light mt-3"
                                            type="submit">Simpan</button>
                                    </form>
                                </div>
                                <div class="tab-pane" id="friday" role="tabpanel">
                                    <form action="{{ route('administrator.attendance-rule.store') }}" method="post">
                                        @csrf
                                        <input name="day" type="hidden" value="friday">
                                        <label class="form-label" for="exampleInputtime">Masuk :</label>
                                        <div class="d-flex">
                                            <input class="form-control" id="exampleInputtime" name="checkin_starts"
                                                type="time" value="{{ $friday->checkin_starts ?? '' }}">
                                            @error('checkin_starts')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                            <h2 class="ms-2">-</h2>
                                            <input class="form-control ms-2" id="exampleInputtime" name="checkin_ends"
                                                type="time" value="{{ $friday->checkin_ends ?? '' }}">
                                            @error('checkin_ends')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>

                                        <label class="form-label mt-3" for="exampleInputtime">Istirahat :</label>
                                        <div class="d-flex">
                                            <input class="form-control" id="exampleInputtime" name="break_starts"
                                                type="time" value="{{ $friday->break_starts ?? '' }}">
                                            @error('break_starts')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                            <h2 class="ms-2">-</h2>
                                            <input class="form-control ms-2" id="exampleInputtime" name="break_ends"
                                                type="time" value="{{ $friday->break_ends ?? '' }}">
                                            @error('break_ends')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>

                                        <label class="form-label mt-3" for="exampleInputtime">Kembali :</label>
                                        <div class="d-flex">
                                            <input class="form-control" id="exampleInputtime" name="return_starts"
                                                type="time" value="{{ $friday->return_starts ?? '' }}">
                                            @error('return_starts')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                            <h2 class="ms-2">-</h2>
                                            <input class="form-control ms-2" id="exampleInputtime" name="return_ends"
                                                type="time" value="{{ $friday->return_ends ?? '' }}">
                                            @error('return_ends')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>

                                        <label class="form-label mt-3" for="exampleInputtime">Pulang :</label>
                                        <div class="d-flex">
                                            <input class="form-control" id="exampleInputtime" name="checkout_starts"
                                                type="time" value="{{ $friday->checkout_starts ?? '' }}">
                                            @error('checkout_starts')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                            <h2 class="ms-2">-</h2>
                                            <input class="form-control ms-2" id="exampleInputtime" name="checkout_ends"
                                                type="time" value="{{ $friday->checkout_ends ?? '' }}">
                                            @error('checkout_ends')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                        <button class="btn btn-secondary w-100 waves-effect waves-light mt-3"
                                            type="submit">Simpan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-xl-6">
                    <div class="card card-height-100">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1 ms-3">
                                Siswa Terlambat
                            </h4>
                        </div>
                        <div class="card-header align-items-center d-flex justify-content-between bg-light">
                            <h6 class="card-title mb-0 mx-3 text-muted">
                                Siswa
                            </h6>
                            <h6 class="card-title mb-0 mx-3 text-muted">
                                Jam Absensi
                            </h6>
                        </div>

                        <div class="card" style="box-shadow: none">
                            @foreach (range(1, 4) as $index)
                                <div class="card-body">
                                    <div>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm flex-shrink-0 me-3">
                                                <img src="{{ asset('assets/images/users/avatar-' . $index . '.jpg') }}" class="img-fluid rounded-circle" alt="">
                                            </div>
                                            <div class="flex-grow-1">
                                                <div>
                                                    <h5 class="fs-14 mb-1">
                                                        Esther James {{ $index }}
                                                    </h5>
                                                    <p class="fs-13 text-muted mb-0">
                                                        Frontend Developer
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="flex-shrink-0 ms-2">
                                                <h4 class="ms-auto">
                                                    <span class="badge bg-warning-subtle text-warning w-100">12 : 00</span>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>

    {{-- <div class="row">
        <div class="col-xl-8 d-flex">
            <div class="card flex-grow-1">
                <div class="card-header border-0 align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Grafik Pendapatan Perbulan</h4>
                    <div class="flex-shrink-0 col-lg-2">
                        <select class="form-select mb-3" aria-label="Default select example">
                            <option value="1">2024</option>
                            <option value="2">2025</option>
                            <option value="3">2026</option>
                        </select>
                    </div>
                </div>
                <div id="chart-income" class="flex-grow-1"></div>
            </div>
        </div>
        <div class="col-xl-4 d-flex">
            <div class="flex-grow-1 d-flex flex-column">
                <div class="mb-3">
                    <h5>Siswa Tidak Mengisi Jurnal</h5>
                </div>

                @foreach (range(1, 5) as $index)
                <div class="card ">
                    <div class="card-body">
                        <div>
                            <div class="d-flex align-items-center">
                                <div class="avatar-sm flex-shrink-0 me-3">
                                    <img src="{{ asset('assets/images/users/avatar-' . $index . '.jpg') }}" class="img-fluid rounded-circle" alt="">
                                </div>
                                <div class="flex-grow-1">
                                    <div>
                                        <h5 class="fs-14 mb-1">
                                            Esther James {{$index}}
                                        </h5>
                                        <p class="fs-13 text-muted mb-0">
                                            Frontend Developer
                                        </p>
                                    </div>
                                </div>
                                <div class="flex-shrink-0 ms-2">
                                    <h5 class="text-danger">3 Kali</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div> --}}

    {{-- <div class="row">
        <div class="col-xl-12">
            <div class="card card-height-100">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1 ms-3">
                        Siswa Absensi
                    </h4>
                </div>
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead class="table-light ms-3">
                            <tr>
                                <th></th>
                                <th scope="col" class="sm-3">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Sekolah</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Jam Absensi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (range(1, 5) as $index)

                            <tr>
                                <td></td>
                                <td class="">{{$index}}</td>
                                <td>
                                    <div class="d-flex gap-2 align-items-center">
                                        <div class="flex-shrink-0">
                                            <img src="{{ asset('assets/images/users/avatar-' . $index . '.jpg') }}" alt="" class="avatar-xs rounded-circle" />
                                        </div>
                                        <div class="flex-grow-1">
                                            Jordan Kennedy {{$index}}
                                        </div>
                                    </div>
                                </td>
                                <td>Mastering the grid</td>
                                <td>10 Oct, 14:47</td>
                                <td>
                                    <h4 class="ms-auto">
                                        <span class="badge bg-info-subtle text-info">12 : 00</span>
                                    </h4>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> --}}
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.48.0/apexcharts.min.js"
        integrity="sha512-wqcdhB5VcHuNzKcjnxN9wI5tB3nNorVX7Zz9NtKBxmofNskRC29uaQDnv71I/zhCDLZsNrg75oG8cJHuBvKWGw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.48.0/apexcharts.min.css" rel="stylesheet"
        integrity="sha512-qc0GepkUB5ugt8LevOF/K2h2lLGIloDBcWX8yawu/5V8FXSxZLn3NVMZskeEyOhlc6RxKiEj6QpSrlAoL1D3TA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            $('#image-input1').on('change', function(e) {
                var file = e.target.files[0];
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#preview-image1').attr('src', e.target.result);
                }

                reader.readAsDataURL(file);
            });
        });
    </script>

    <script>
        var options = {
            series: [{
                name: 'Mengisi',
                data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
            }],
            chart: {
                type: 'bar',
                height: '350px',
            },
            colors: ['#5D87FF'],
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '20%',
                    endingShape: 'rounded',
                    dropShadow: {
                        enabled: true,
                        top: 2,
                        left: 2,
                        blur: 5,
                        opacity: 0.5
                    }
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            xaxis: {
                categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return "$ " + val + " thousands"
                    }
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart-income"), options);
        chart.render();
    </script>
@endsection
