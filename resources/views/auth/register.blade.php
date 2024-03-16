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
                                        <span class="bs-stepper-title">3</span>
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
                                            <label class="form-label" for="multiStepsUsername">Nama</label>
                                            <input type="text" name="name" id="multiStepsUsername" value="{{ old('name') }}"
                                                class="form-control" placeholder="Nama" />
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label" for="multiStepsEmail">NISN/NIM</label>
                                            <input type="number" name="identify_number" id="multiStepsEmail" value="{{ old('identify_number') }}"
                                                class="form-control" placeholder="Nisn/Nim" aria-label="john.doe" />
                                        </div>
                                        <div class="col-sm-6 form-password-toggle">
                                            <label class="form-label" for="multiStepsPass">Tempat Lahir</label>
                                            <div class="input-group input-group-merge">
                                                <input type="text" id="multiStepsPass" name="birth_place"
                                                    class="form-control" placeholder="Tempat Lahir" value="{{ old('birth_place') }}"
                                                    aria-describedby="multiStepsPass2" />
                                                <span class="input-group-text cursor-pointer" id="multiStepsPass2"><i
                                                        class="ti ti-eye-off"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 form-password-toggle">
                                            <label class="form-label" for="multiStepsConfirmPass">Tanggal Lahir</label>
                                            <div class="input-group input-group-merge">
                                                <input type="date" id="multiStepsConfirmPass" name="birth_date" value="{{ old('birth_date') }}"
                                                    class="form-control" placeholder=""
                                                    aria-describedby="multiStepsConfirmPass2" />
                                                <span class="input-group-text cursor-pointer" id="multiStepsConfirmPass2"><i
                                                        class="ti ti-eye-off"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="multiStepsURL">Kelas</label>
                                            <select name="class" class="form-select" id="">
                                                <option selected disabled>Pilih Kelas</option>
                                                <option value="10" {{ old('class') == '10' ? 'selected' : '' }}>10</option>
                                                <option value="11" {{ old('class') == '11' ? 'selected' : '' }}>11</option>
                                                <option value="12" {{ old('class') == '12' ? 'selected' : '' }}>12</option>
                                                <option value="13" {{ old('class') == '13' ? 'selected' : '' }}>13</option>
                                                <option value="scholar" {{ old('class') == 'scholar' ? 'selected' : '' }}>Mahasiswa</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="multiStepsURL">Sekolah</label>
                                            <input type="text" name="school" class="form-control" value="{{ old('school') }}" id="">
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label" for="multiStepsFirstName">Alamat</label>
                                            <textarea id="multiStepsFirstName" name="address" class="form-control" {{ old('address') }} placeholder="John"></textarea>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label" for="multiStepsLastName">No Hp</label>
                                            <input type="number" id="multiStepsLastName" name="phone" value="{{ old('phone') }}"
                                                class="form-control" placeholder="Doe" />
                                        </div>
                                        <div class="col-sm-12">
                                            <label class="form-label" for="multiStepsLastName">Jenis Kelamin</label>
                                            <br>
                                            <input type="radio" id="multiStepsLastName" value="male" name="gender"
                                                class="" placeholder="Doe"/> Laki-laki &nbsp;
                                            <input type="radio" id="multiStepsLastName" value="female" name="gender"
                                                class="" placeholder="Doe"/> Perempuan
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
                                                class="form-control" placeholder="John" />
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label" for="multiStepsLastName">CV</label>
                                            <input type="file" id="multiStepsLastName" name="cv"
                                                class="form-control" placeholder="Doe" />
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label" for="multiStepsMobile">Surat Pernyataan Diri</label>
                                            <div class="input-group">
                                                <input type="file" id="multiStepsMobile" name="self_statement"
                                                    class="form-control multi-steps-mobile" placeholder="202 555 0111" />
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label" for="multiStepsPincode">Surat Pernyataan Orang
                                                Tua</label>
                                            <input type="file" id="multiStepsPincode" name="parents_statement"
                                                class="form-control multi-steps-pincode" placeholder="Postal Code"
                                                maxlength="6" />
                                        </div>

                                        <div class="col-sm-6">
                                            <label class="form-label" for="multiStepsMobile">Mulai Magang</label>
                                            <div class="input-group">
                                                <input type="date" id="multiStepsMobile" name="start_date" value="{{ old('start_date') }}"
                                                    class="form-control multi-steps-mobile" placeholder="202 555 0111" />
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label" for="multiStepsPincode">Selesai Magang</label>
                                            <input type="date" id="multiStepsPincode" name="finish_date" value="{{ old('finish_date') }}"
                                                class="form-control multi-steps-pincode" placeholder="Postal Code"
                                                maxlength="6" />
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="multiStepsAddress">Pilih Jurusan</label>
                                            <select name="major" class="form-select" id="multiStepsAddress">
                                                <option disabled selected>Pilih Jurusan</option>
                                                <option value="rpl" {{ old('major')  == 'rpl' ? 'selected' : '' }}>Rekayasa Perangkat Lunak</option>
                                                <option value="multimedia" {{ old('major')  == 'multimedia' ? 'selected' : '' }}>Multimedia</option>
                                                <option value="ti" {{ old('major') == 'ti' ? 'selected' : '' }}>Teknik Informatika</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="multiStepsAddress">Tipe Magang</label>
                                            <select name="internship_type" class="form-select" id="multiStepsAddress">
                                                <option disabled selected>Pilih Jenis Magang</option>
                                                <option value="online" {{ old('internship_type') == 'online' ? 'selected' : '' }}>online</option>
                                                <option value="offline" {{ old('internship_type') == 'offline' ? 'selected' : '' }}>offline</option>
                                            </select>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label" for="multiStepsAddress">Jenis Magang</label>
                                            <select name="division_id" class="form-select" id="multiStepsAddress">
                                                <option disabled selected>Pilih Divisi</option>
                                                @foreach ($divisions as $division)
                                                    <option value="{{ $division->id }}" {{ old('division_id') == $division->id ? 'selected' : '' }}>{{ $division->name }}</option>
                                                @endforeach
                                            </select>
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
                                    </div>
                                </div>
                                <!-- Billing Links -->
                                <div id="billingLinksValidation" class="content">
                                    <div class="content-header mb-4">
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-sm-6">
                                            <label class="form-label" for="multiStepsFirstName">Email</label>
                                            <input type="email" id="multiStepsFirstName" name="email" value="{{ old('email') }}"
                                                class="form-control" placeholder="email@gmail.com" />
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label" for="multiStepsAddress">Password</label>
                                            <input type="password" id="multiStepsFirstName" name="password"
                                                class="form-control" placeholder="password" />
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="multiStepsAddress">konfirmasi password</label>
                                            <input type="password" id="multiStepsFirstName" name=""
                                                class="form-control" placeholder="password" />
                                        </div>
                                        <div class="col-12 d-flex justify-content-between mt-4">
                                            <button class="btn btn-label-secondary btn-prev" type="button"> <i
                                                    class="ti ti-arrow-left ti-xs me-sm-1 me-0"></i>
                                                <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                            </button>
                                            <button class="btn btn-primary btn-next" type="submit"> <span
                                                    class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Simpan</span></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- / Multi Steps Registration -->
        </div>
    </div>

    <script>
        // Check selected custom option
        window.Helpers.initCustomOptionCheck();
    </script>
@endsection
@section('script')
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
