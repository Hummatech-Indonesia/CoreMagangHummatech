@extends('auth.layouts.app')
@section('content')
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5J3LMKC" height="0" width="0"
            style="display: none; visibility: hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->


    <!-- Layout Content -->

    <!-- Content -->
    <div class="authentication-wrapper authentication-cover authentication-bg">
        <div class="authentication-inner row">

            <!-- Left Text -->
            <div
                class="d-none d-lg-flex col-lg-5 align-items-center justify-content-center p-5 auth-cover-bg-color position-relative auth-multisteps-bg-height">
                <img src="assetsLogin/img/illustrations/auth-register-multisteps-illustration.png" class="img-fluid"
                    width="280">

            </div>
            <!-- /Left Text -->

            <!--  Multi Steps Registration -->
            <div class="d-flex col-lg-7 align-items-center justify-content-center p-sm-5 p-3">
                <div class="w-px-850">
                    <div id="multiStepsValidation" class="bs-stepper shadow-none">
                        <div class="bs-stepper-header border-bottom-0">
                            <div class="step" data-target="#accountDetailsValidation">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-circle"><i class="ti ti-smart-home ti-sm"></i></span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Tahap 1</span>
                                    </span>
                                </button>
                            </div>
                            <div class="line">
                                <i class="ti ti-chevron-right"></i>
                            </div>
                            <div class="step" data-target="#personalInfoValidation">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-circle"><i class="ti ti-users ti-sm"></i></span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Tahap 2</span>
                                    </span>
                                </button>
                            </div>
                            <div class="line">
                                <i class="ti ti-chevron-right"></i>
                            </div>
                            <div class="step" data-target="#billingLinksValidation">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-circle"><i class="ti ti-file-text ti-sm"></i></span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Tahap 3</span>
                                    </span>
                                </button>
                            </div>
                            <div class="line">
                                <i class="ti ti-chevron-right"></i>
                            </div>
                        </div>
                        <div class="bs-stepper-content">
                            <form id="multiStepsForm" method="POST" action="/register/post" enctype="multipart/form-data">
                                @method('POST')
                                @csrf
                                <div id="accountDetailsValidation" class="content">
                                    <div class="content-header mb-4">
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-sm-6">
                                            <label class="form-label" for="multiStepsUsername">Nama Lengkap</label>
                                            <input type="text" name="name" id="multiStepsUsername"
                                                value="{{ old('name') }}" class="form-control" placeholder="Nama Lengkap"
                                                onkeyup="capitalizeInput(this)" />
                                            @error('name')
                                                <p class="text-danger m-0">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label" for="multiStepsEmail">NISN/NIM</label>
                                            <input type="number" name="identify_number" id="multiStepsEmail"
                                                value="{{ old('identify_number') }}" class="form-control"
                                                placeholder="Nisn/Nim" />
                                            @error('identify_number')
                                                <p class="text-danger m-0">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6 form-password-toggle">
                                            <label class="form-label" for="multiStepsPass">Tempat Lahir</label>
                                            <input type="text" id="multiStepsPass" name="birth_place"
                                                class="form-control" placeholder="Tempat Lahir"
                                                value="{{ old('birth_place') }}" />
                                            @error('birth_place')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6 form-password-toggle">
                                            <label class="form-label" for="multiStepsConfirmPass">Tanggal Lahir</label>
                                            <input type="date" id="multiStepsConfirmPass" name="birth_date"
                                                value="{{ old('birth_date') }}" class="form-control"
                                                aria-describedby="multiStepsConfirmPass2" />
                                            @error('birth_date')
                                                <p class="text-danger m-0">{{ $message }}</p>
                                            @enderror

                                        </div>
                                        <div class="col-sm-12">
                                            <label class="form-label" for="multiStepsLastName">Jenis Kelamin</label>
                                            <br>
                                            <input type="radio" id="multiStepsLastName" value="male" name="gender"
                                                class="" placeholder="Doe" /> Laki-laki &nbsp;
                                            <input type="radio" id="multiStepsLastName" value="female" name="gender"
                                                class="" placeholder="Doe" /> Perempuan
                                            @error('gender')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label" for="multiStepsFirstName">Alamat</label>
                                            <textarea id="multiStepsFirstName" name="address" class="form-control" placeholder="Alamat">{{ old('address') }}</textarea>
                                            @error('address')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label" for="multiStepsLastName">No Hp</label>
                                            <input type="number" id="multiStepsLastName" name="phone"
                                                value="{{ old('phone') }}" class="form-control"
                                                placeholder="No Telp" />
                                            @error('phone')
                                                <p class="text-danger m-0">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="multiStepsURL">Kelas</label>
                                            <select name="class" class="form-select" id="">
                                                <option selected disabled>Pilih Kelas</option>
                                                <option value="10" {{ old('class') == '10' ? 'selected' : '' }}>10
                                                </option>
                                                <option value="11" {{ old('class') == '11' ? 'selected' : '' }}>11
                                                </option>
                                                <option value="12" {{ old('class') == '12' ? 'selected' : '' }}>12
                                                </option>
                                                <option value="13" {{ old('class') == '13' ? 'selected' : '' }}>13
                                                </option>
                                                <option value="scholar" {{ old('class') == 'scholar' ? 'selected' : '' }}>
                                                    Mahasiswa</option>
                                            </select>
                                            @error('class')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="multiStepsURL">Sekolah / Universitas</label>
                                            <input type="text" name="school" class="form-control"
                                                placeholder="Sekolah / Universitas" value="{{ old('school') }}"
                                                id="school-input" onkeyup="capitalizeInput(this)">
                                            @error('school')
                                                <p class="text-danger m-0">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label" for="multiStepsFirstName">Alamat Sekolah</label>
                                            <textarea id="multiStepsFirstName" name="school_address" class="form-control" placeholder="Alamat Sekolah">{{ old('school_address') }}</textarea>
                                            @error('school_address')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label" for="multiStepsLastName">No Telp Sekolah</label>
                                            <input type="number" id="multiStepsLastName" name="school_phone"
                                                value="{{ old('phone') }}" class="form-control"
                                                placeholder="No Telp Sekolah" />
                                            @error('school_phone')
                                                <p class="text-danger m-0">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-12 d-flex justify-content-between mt-4">
                                            <button class="btn btn-label-secondary btn-prev" type="button" disabled> <i
                                                    class="ti ti-arrow-left ti-xs me-sm-1 me-0"></i>
                                                <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                            </button>
                                            <button class="btn btn-primary btn-next" type="button"> <span
                                                    class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Next</span>
                                                <i class="ti ti-arrow-right ti-xs"></i></button>
                                        </div>
                                        <a href="/login" class="text-black mt-4 text-center ">Sudah punya akun? <span
                                                class="text-primary">Masuk</span></a>
                                    </div>
                                </div>
                                <!-- Personal Info -->
                                <div id="personalInfoValidation" class="content">
                                    <div class="content-header mb-4">
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-sm-6">
                                            <label class="form-label" for="multiStepsFirstName">Foto Siswa</label>
                                            <input type="file" id="multiStepsFirstName" name="avatar"
                                                class="form-control" />
                                            <p class="text-danger">*Foto Harus Berformat .jpg, .jpeg, atau .png</p>
                                            @error('avatar')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label" for="multiStepsLastName">CV</label>
                                            <input type="file" id="multiStepsLastName" name="cv"
                                                class="form-control" />
                                            <p class="text-danger">*CV Harus Berformat .jpg, .jpeg, atau .png</p>
                                            @error('cv')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label" for="multiStepsMobile">Surat Pernyataan Diri</label>
                                            <div class="input-group">
                                                <input type="file" id="multiStepsMobile" name="self_statement"
                                                    class="form-control multi-steps-mobile" placeholder="202 555 0111" />
                                            </div>
                                            <p class="text-danger">*Surat Pernyataan Diri Harus Berformat .jpg, .jpeg,
                                                atau .png</p>
                                            @error('self_statement')
                                                <p class="text-danger m-0">{{ $message }}</p>
                                            @enderror
                                            <button class="btn btn-primary btn-xs" type="button" data-bs-toggle="modal"
                                                data-bs-target="#createSuratPernyataan">Buat Surat Pernyataan Diri</button>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label" for="multiStepsPincode">Surat Pernyataan Orang
                                                Tua</label>
                                            <input type="file" id="multiStepsPincode" name="parents_statement"
                                                class="form-control multi-steps-pincode" />
                                            <p class="text-danger">*Surat Pernyataan Diri Harus Berformat .jpg, .jpeg, atau
                                                .png</p>
                                            @error('parents_statement')
                                                <p class="text-danger m-0">{{ $message }}</p>
                                            @enderror
                                            <button class="btn btn-primary btn-xs" type="button" data-bs-toggle="modal"
                                                data-bs-target="#create-parent-statement">Buat Surat Pernyataan Orang
                                                Tua</button>
                                        </div>

                                        <div class="col-sm-6">
                                            <label class="form-label" for="multiStepsMobile">Mulai Magang</label>
                                            <input type="date" id="multiStepsMobile" name="start_date"
                                                value="{{ old('start_date') }}" class="form-control multi-steps-mobile"
                                                placeholder="202 555 0111" />
                                            @error('start_date')
                                                <p class="text-danger m-0">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label" for="multiStepsPincode">Selesai Magang</label>
                                            <input type="date" id="multiStepsPincode" name="finish_date"
                                                value="{{ old('finish_date') }}"
                                                class="form-control multi-steps-pincode" />
                                            @error('finish_date')
                                                <p class="text-danger m-0">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="multiStepsAddress">Pilih Jurusan</label>
                                            <select name="major" class="form-select" id="multiStepsAddress">
                                                <option disabled selected>Pilih Jurusan</option>
                                                <option value="rpl" {{ old('major') == 'rpl' ? 'selected' : '' }}>
                                                    Rekayasa Perangkat Lunak</option>
                                                <option value="multimedia"
                                                    {{ old('major') == 'multimedia' ? 'selected' : '' }}>Multimedia
                                                </option>
                                                <option value="ti" {{ old('major') == 'ti' ? 'selected' : '' }}>Teknik
                                                    Informatika</option>
                                            </select>
                                            @error('major')
                                                <p class="text-danger m-0">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="multiStepsAddress">Tipe Magang</label>
                                            <select name="internship_type" class="form-select" id="internshipType"
                                                onchange="toggleDivision()">
                                                <option disabled selected>Pilih Jenis Magang</option>
                                                <option value="online"
                                                    {{ old('internship_type') == 'online' ? 'selected' : '' }}>
                                                    online</option>
                                                <option value="offline"
                                                    {{ old('internship_type') == 'offline' ? 'selected' : '' }}>
                                                    offline</option>
                                            </select>
                                            @error('internship_type')
                                                <p class="text-danger m-0">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 " hidden id="divisionContainer">
                                            <label class="form-label" for="multiStepsAddress">Divisi</label>
                                            <select name="division_id" class="form-select" id="multiStepsAddress">
                                                <option disabled selected>Pilih Divisi</option>
                                                @forelse ($divisions as $division)
                                                <option value="{{ $division->id }}"
                                                        {{ old('division_id') == $division->id ? 'selected' : '' }}>
                                                        {{ $division->name }}</option>
                                                @empty
                                                    <option>Belum ada divisi</option>
                                                @endforelse
                                            </select>
                                            @error('division_id')
                                                <p class="text-danger m-0">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-12 d-flex justify-content-between mt-4">
                                            <button class="btn btn-label-secondary btn-prev" type="button"> <i
                                                    class="ti ti-arrow-left ti-xs me-sm-1 me-0"></i>
                                                <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                            </button>
                                            <button class="btn btn-primary btn-next" type="button"> <span
                                                    class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Next</span>
                                                <i class="ti ti-arrow-right ti-xs"></i></button>
                                        </div>
                                        <a href="/login" class="text-black mt-4 text-center ">Sudah punya akun? <span
                                                class="text-primary">Masuk</span></a>
                                    </div>
                                </div>
                                <!-- Billing Links -->
                                <div id="billingLinksValidation" class="content">
                                    <div class="content-header mb-4">
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-sm-6">
                                            <label class="form-label" for="multiStepsFirstName">Email</label>
                                            <input type="email" id="multiStepsFirstName" name="email"
                                                value="{{ old('email') }}" class="form-control"
                                                placeholder="email@gmail.com" />
                                            @error('email')
                                                <p class="text-danger m-0">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label" for="multiStepsAddress">Password</label>
                                            <div class="input-group input-group-merge">
                                                <input type="password" id="multiStepsPass" name="password"
                                                    class="form-control" placeholder="password"
                                                    aria-describedby="multiStepsPass2" />
                                                <span class="input-group-text cursor-pointer" id="multiStepsPass2"><i
                                                        class="ti ti-eye-off"></i></span>
                                            </div>
                                            @error('password')
                                                <p class="text-danger m-0">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="multiStepsAddress">konfirmasi password</label>
                                            <div class="input-group input-group-merge">
                                                <input type="password" name="confirm_password" id="multiStepsFirstName"
                                                    class="form-control" placeholder="password"
                                                    aria-describedby="multiStepsConfirmPass2" />
                                                <span class="input-group-text cursor-pointer"
                                                    id="multiStepsConfirmPass2"><i class="ti ti-eye-off"></i></span>
                                            </div>
                                            @error('confirm_password')
                                                <p class="text-danger m-0">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-12 d-flex justify-content-between mt-4">
                                            <button class="btn btn-label-secondary btn-prev" type="button"> <i
                                                    class="ti ti-arrow-left ti-xs me-sm-1 me-0"></i>
                                                <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                            </button>
                                            <button class="btn btn-primary btn-next btn-submit" type="button"> <span
                                                    class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Simpan</span></button>
                                        </div>
                                        <a href="/login" class="text-black mt-4 text-center ">Sudah punya akun? <span
                                                class="text-primary">Masuk</span></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="createSuratPernyataan" tabindex="-1" aria-labelledby="createSuratPernyataanLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createSuratPernyataanLabel">Buat
                        Surat Pernyataan Diri</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/statement-self" method="GET">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label for="">Nama</label>
                                <input type="text" class="form-control" placeholder="Masukan Nama" name="name">
                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-6 mb-3">
                                <label for="">Tempat Lahir</label>
                                <input type="text" class="form-control" placeholder="Masukan Tempat Lahir"
                                    name="birth_place">
                                @error('birth_place')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-6 mb-3">
                                <label for="">Tgl. Lahir</label>
                                <input type="date" class="form-control" placeholder="Masukan Tgl. Lahir"
                                    name="birth_date">
                                @error('birth_date')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-6 mb-3">
                                <label for="">Alamat</label>
                                <textarea class="form-control" placeholder="Masukan Alamat" name="address"></textarea>
                                @error('address')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-6 mb-3">
                                <label for="">No Telp</label>
                                <input type="number" class="form-control" placeholder="Masukan No. Telp"
                                    name="phone">
                                @error('phone')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-6 mb-3">
                                <label for="">Email</label>
                                <input type="email" class="form-control" placeholder="Masukan Email" name="email">
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="create-parent-statement" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Pernyataan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/statement-parent" method="GET">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="parent_name">Nama Orang tua</label>
                                    <input type="text" name="parent_name" value="{{ old('parent_name') }}"
                                        placeholder="Masukkan Nama Orang tua" class="form-control" id="">
                                    @error('parent_name')
                                        <p class="text-danger">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="identity_card">No. KTP</label>
                                    <input type="number" name="identity_card" value="{{ old('identity_card') }}"
                                        placeholder="Masukkan No. KTP" class="form-control" id="">
                                    @error('identity_card')
                                        <p class="text-danger">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="parent_address">Alamat Orang tua</label>
                                    <textarea name="parent_address" placeholder="Masukkan Alamat Orang tua" class="form-control" id="">{{ old('parent_address') }}</textarea>
                                    @error('parent_address')
                                        <p class="text-danger">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="parent_place_birth">Tempat Lahir Orang tua</label>
                                    <input type="text" name="parent_place_birth"
                                        value="{{ old('parent_place_birth') }}"
                                        placeholder="Masukkan Tempat Lahir Orang tua" class="form-control"
                                        id="">
                                    @error('parent_place_birth')
                                        <p class="text-danger">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="parent_date_birth">Tgl. Lahir Orang tua</label>
                                    <input type="date" name="parent_date_birth"
                                        value="{{ old('parent_date_birth') }}" class="form-control" id="">
                                    @error('parent_date_birth')
                                        <p class="text-danger">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="parent_phone">No-Telp Orang tua</label>
                                    <input type="number" name="parent_phone" value="{{ old('parent_phone') }}"
                                        placeholder="Masukkan No. Telp Orang tua" class="form-control" id="">
                                    @error('parent_phone')
                                        <p class="text-danger">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="student_name">Nama Siswa</label>
                                    <input type="text" name="student_name" value="{{ old('student_name') }}"
                                        placeholder="Masukkan Nama Siswa" class="form-control" id="">
                                    @error('student_name')
                                        <p class="text-danger">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="place_birth">Tempat Lahir</label>
                                    <input type="text" name="place_birth" value="{{ old('place_birth') }}"
                                        placeholder="Masukkan Tempat Lahir" class="form-control" id="">
                                    @error('place_birth')
                                        <p class="text-danger">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="date_birth">Tgl. Lahir</label>
                                    <input type="date" name="date_birth" value="{{ old('date_birth') }}"
                                        class="form-control" id="">
                                    @error('date_birth')
                                        <p class="text-danger">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="major">Jurusan</label>
                                    <select name="major" class="form-control" id="">
                                        <option value selected disabled>Pilih Jurusan</option>
                                        <option value="Teknik Informatika"
                                            {{ old('major') == 'Teknik Informatika' ? 'selected' : '' }}>Teknik Informatika
                                        </option>
                                        <option value="Rekayasa Perangkat Lunak"
                                            {{ old('major') == 'Rekayasa Perangkat Lunak' ? 'selected' : '' }}>Rekayasa
                                            Perangkat Lunak</option>
                                        <option value="Multi Media" {{ old('major') == 'Multi Media' ? 'selected' : '' }}>
                                            Multi Media</option>
                                    </select>
                                    @error('major')
                                        <p class="text-danger">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="phone">No. Telp</label>
                                    <input type="number" value="{{ old('phone') }}" placeholder="Masukan No. Telp"
                                        name="phone" class="form-control" id="">
                                    @error('phone')
                                        <p class="text-danger">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="modalForm" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
        style="display: none;">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                </div>
                <div class="modal-body text-center">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 24 24"
                            class="bg-secondary rounded-circle icon" fill="none" stroke="white" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-question-mark">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M8 8a3.5 3 0 0 1 3.5 -3h1a3.5 3 0 0 1 3.5 3a3 3 0 0 1 -2 3a3 4 0 0 0 -2 4" />
                            <path d="M12 19l0 .01" />
                        </svg>
                    </div>
                    <h4 class="mt-3">Apakah anda yakin ingin melanjutkan?</h4>
                </div>
                <div class="modal-footer d-flex justify-content-center m-0">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-success btn-save">Simpan</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $('.btn-submit').on('click', function() {
            $('#modalForm').modal('show');
        });
        $('.btn-save').on('click', function() {
            $('#multiStepsForm').submit();
        });
    </script>
    <script>
        function toggleDivision() {
            const internshipType = document.getElementById('internshipType');
            const divisionContainer = document.getElementById('divisionContainer');
            if (internshipType.value === 'online') {
                divisionContainer.hidden = false;
            } else {
                divisionContainer.hidden = true;
            }
        }
    </script>
    <script>
        // Check selected custom option
        window.Helpers.initCustomOptionCheck();
    </script>
    <script>
        function capitalizeInput(input) {
            input.value = input.value.toUpperCase();
        }
    </script>
    <script>
        window.templateCustomizer = new TemplateCustomizer({
            cssPath: '',
            themesPath: '',
            defaultStyle: "light",
            defaultShowDropdownOnHover: "true", // true/false (for horizontal layout only)
            displayCustomizer: "true",
            lang: 'en',
            pathResolver: function(path) {
                var resolvedPaths = {
                    // Core stylesheets
                    'core.css': 'https://demos.pixinvent.com/vuexy-html-laravel-admin-template/demo/assetsLogin/vendor/css/rtl/core.css?id=9dd8321ea008145745a7d78e072a6e36',
                    'core-dark.css': 'https://demos.pixinvent.com/vuexy-html-laravel-admin-template/demo/assetsLogin/vendor/css/rtl/core-dark.css?id=d661bae1d0ada9f7e9e3685a3e1f427e',

                    // Themes
                    'theme-default.css': 'https://demos.pixinvent.com/vuexy-html-laravel-admin-template/demo/assetsLogin/vendor/css/rtl/theme-default.css?id=a4539ede8fbe0ee4ea3a81f2c89f07d9',
                    'theme-default-dark.css': 'https://demos.pixinvent.com/vuexy-html-laravel-admin-template/demo/assetsLogin/vendor/css/rtl/theme-default-dark.css?id=ce86d777a4c5030f51d0f609f202bcc5',
                    'theme-bordered.css': 'https://demos.pixinvent.com/vuexy-html-laravel-admin-template/demo/assetsLogin/vendor/css/rtl/theme-bordered.css?id=786794ca0c68d96058e8ceeb20f4e7c5',
                    'theme-bordered-dark.css': 'https://demos.pixinvent.com/vuexy-html-laravel-admin-template/demo/assetsLogin/vendor/css/rtl/theme-bordered-dark.css?id=e7122ef6338b22f7cea9eaff5a96aa8b',
                    'theme-semi-dark.css': 'https://demos.pixinvent.com/vuexy-html-laravel-admin-template/demo/assetsLogin/vendor/css/rtl/theme-semi-dark.css?id=a0a317e88e943fdd62d514e00deebb22',
                    'theme-semi-dark-dark.css': 'https://demos.pixinvent.com/vuexy-html-laravel-admin-template/demo/assetsLogin/vendor/css/rtl/theme-semi-dark-dark.css?id=e9a2f7cd6ace727264936f6bf93ab1e2',
                }
                return resolvedPaths[path] || path;
            },
            'controls': ["rtl", "style", "headerType", "contentLayout", "layoutCollapsed", "layoutNavbarOptions",
                "themes"
            ],
        });
    </script>
@endsection
