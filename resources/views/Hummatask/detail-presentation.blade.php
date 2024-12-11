@extends('Hummatask.layouts.app')
@section('style')
    <link type="text/css" href="#" rel="stylesheet" />
    <style>
        .bg-label-primary {
            background-color: #eff3ff !important;
            color: #557be8 !important;
        }

        .bg-label-info {
            background-color: #d9ebff !important;
            color: #0da8ff !important;
        }

        .bg-label-warning {
            background-color: #fef5e5 !important;
            color: #ffaa05 !important;
        }

        .bg-label-danger {
            background-color: #fbf2ef !important;
            color: #e12d5b !important;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__rendered li {
            color: black;
        }

        /* Shadow untuk div pertama (Navbar) */
        .navbar-shadow {
            box-shadow: 0 2px 8px rgba(99, 98, 98, 0.1);
            /* Sesuaikan intensitas shadow */
        }
    </style>
@endsection
@section('sidebar')
    @include('Hummatask.layouts.sidebar-detail-presentation')
@endsection
@section('content')
    <div class="container-fluid">
        <div class="card bg-light-info shadow-none position-relative overflow-hidden">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">Presentation</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class="text-muted " href="index-2.html">Detail
                                        Project</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">Presentation</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-3">
                        <div class="text-center mb-n5">
                            <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/backgrounds/welcome-bg.svg"
                                alt="" class="img-fluid" style="width: 300px; height: auto;">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between w-100 mb-4 gap-2 navbar-shadow">
            <a class="text-decoration-none" href="/student-offline/dashboard/task">
                <div class="back bg-label-primary rounded p-3">
                    <svg width="32" height="24" viewBox="0 0 36 28" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M1.27307 12.586C0.89813 12.9611 0.687499 13.4697 0.687499 14C0.687499 14.5303 0.89813 15.0389 1.27307 15.414L12.5871 26.728C12.7716 26.919 12.9923 27.0714 13.2363 27.1762C13.4803 27.281 13.7427 27.3362 14.0083 27.3385C14.2738 27.3408 14.5372 27.2902 14.783 27.1896C15.0288 27.0891 15.2521 26.9406 15.4399 26.7528C15.6276 26.565 15.7762 26.3417 15.8767 26.0959C15.9773 25.8501 16.0279 25.5868 16.0256 25.3212C16.0233 25.0556 15.9681 24.7932 15.8633 24.5492C15.7585 24.3052 15.6061 24.0845 15.4151 23.9L7.51507 16L34.0011 16C34.5315 16 35.0402 15.7893 35.4153 15.4142C35.7904 15.0391 36.0011 14.5304 36.0011 14C36.0011 13.4696 35.7904 12.9609 35.4153 12.5858C35.0402 12.2107 34.5315 12 34.0011 12L7.51507 12L15.4151 4.1C15.7794 3.72279 15.981 3.21759 15.9764 2.6932C15.9719 2.16881 15.7615 1.66718 15.3907 1.29637C15.0199 0.925548 14.5183 0.715209 13.9939 0.710653C13.4695 0.706096 12.9643 0.907684 12.5871 1.272L1.27307 12.586Z"
                            fill="#5D87FF" />
                    </svg>
                </div>
            </a>
            <div class="bg-label-primary w-100 d-flex justify-content-center align-items-center text-center">
                <h2 class="text-primary fw-bolder fs-4">{{ $project->project_name }}</h2>
            </div>
        </div>

        @if (session('errors'))
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                <div class="row d-flex align-items-center justify-content-center">
                    <div class="col-12 col-md-4">
                        <div class="d-flex justify-content-center">
                            <div class="mt-4 mt-md-0 gap-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <a data-bs-toggle="tab" href="#offline" role="tab"
                                            class="nav-link note-link d-flex align-items-center justify-content-center text-body-color active"
                                            id="presentasi-offline">
                                            <span class="d-none d-md-block font-weight-medium">Presentasi Offline</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a data-bs-toggle="tab" href="#online" role="tab"
                                            class="nav-link note-link d-flex align-items-center justify-content-center text-body-color"
                                            id="presentasi-online">
                                            <span class="d-none d-md-block font-weight-medium">Presentasi Online</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-3">
                        <!-- Empty space to center the content in medium or larger screens -->
                    </div>

                    <div class="col-12 col-md-5">
                        <div class="d-flex justify-content-end gap-2">
                            <div class="tab-content mt-3">

                                <ul class="nav nav-tabs" role="tablist gap-2" id="offline-tabs">
                                    <div class="d-flex">
                                        <li class="nav-item ms-auto" style="margin-right: 5px">
                                            <form class="position-relative">
                                                <input type="text" class="form-control product-search ps-5 fs-2"
                                                    id="input-search" placeholder="Cari Presentasi...">
                                                <i
                                                    class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-3 text-dark ms-3"></i>
                                            </form>
                                        </li>
                                        <li class="nav-item ms-auto">
                                            <button class="btn btn-muted fs-2" data-bs-toggle="modal"
                                                data-bs-target="#submit-a-presentation-offline">
                                                Ajukan Presentasi offline
                                            </button>
                                        </li>
                                    </div>

                                </ul>

                                <ul class="nav nav-tabs" role="tablist gap-2" id="online-tabs">
                                    <div class="d-flex">
                                        <li class="nav-item ms-auto" style="margin-right: 5px">
                                            <form class="position-relative">
                                                <input type="text" class="form-control product-search ps-5 fs-2"
                                                    id="input-search" placeholder="Cari Presentasi...">
                                                <i
                                                    class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-3 text-dark ms-3"></i>
                                            </form>
                                        </li>
                                        <li class="nav-item ms-auto">
                                            <button class="btn btn-muted fs-2" data-bs-toggle="modal"
                                                data-bs-target="#submit-a-presentation-online">
                                                Ajukan Presentasi online
                                            </button>
                                        </li>

                                    </div>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    // Ambil elemen tombol
                    const showOfflineBtn = document.getElementById('presentasi-offline');
                    const showOnlineBtn = document.getElementById('presentasi-online');

                    // Ambil elemen ul
                    const offlineTabs = document.getElementById('offline-tabs');
                    const onlineTabs = document.getElementById('online-tabs');

                    // Fungsi untuk menambahkan class active ke tombol yang dipilih
                    function setActiveTab(button) {
                        // Hapus class active dari kedua tombol
                        showOfflineBtn.classList.remove('active');
                        showOnlineBtn.classList.remove('active');

                        // Tambahkan class active ke tombol yang diklik
                        button.classList.add('active');
                    }

                    // Sembunyikan semua ul saat pertama kali
                    offlineTabs.style.display = 'none';
                    onlineTabs.style.display = 'none';

                    // Fungsi untuk menampilkan offline tab
                    showOfflineBtn.addEventListener('click', function() {
                        offlineTabs.style.display = 'block'; // Tampilkan offline tab
                        onlineTabs.style.display = 'none'; // Sembunyikan online tab
                        setActiveTab(showOfflineBtn); // Set tombol offline sebagai active
                    });

                    // Fungsi untuk menampilkan online tab
                    showOnlineBtn.addEventListener('click', function() {
                        onlineTabs.style.display = 'block'; // Tampilkan online tab
                        offlineTabs.style.display = 'none'; // Sembunyikan offline tab
                        setActiveTab(showOnlineBtn); // Set tombol online sebagai active
                    });

                    // Set default active tab
                    showOfflineBtn.classList.add('active'); // Set tombol offline sebagai active pertama kali
                    offlineTabs.style.display = 'block'; // Tampilkan tab offline pertama kali
                </script>



                <!-- Tab panes -->
                <div class="tab-content mt-3">
                    <div class="tab-pane fade show active" id="offline" role="tabpanel">
                        <!-- Konten untuk Presentasi Offline -->
                        <table class="table align-middle mb-0 text-nowrap">
                            <thead>
                                <tr>
                                    <th class="ps-0 text">No</th>
                                    <th class="text-center">Tanggal Presentation</th>
                                    <th class="text-center">Mentor</th>
                                    <th class="text-center">Antrian</th>
                                    <th class="text-center">Status Presentasi</th>
                                    <th class="text-center">Status Pengajuan</th>
                                    <th class="text-center">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($offlinePresentations as $presentation)
                                    <tr>
                                        <td class="ps-0 text">
                                            <span>{{ $loop->iteration }}.</span>
                                        </td>
                                        <td class="text-center">
                                            <h6 class="mb-0">{{ $presentation->planning_date_presentation }}</h6>
                                        </td>
                                        <td class="text-center">
                                            <h6 class="mb-0">{{ $presentation->mentor->name ?? '-' }}</h6>
                                        </td>
                                        <td class="text-center">
                                            <h6 class="mb-0">#{{ sprintf('%02d', $presentation->urutan) }}</h6>
                                        </td>
                                        <td class="text-center">
                                            <h6 class="mb-0 badge bg-light-dark rounded-2">Presentasi {{ $presentation->category_presentation }}</h6>
                                        </td>
                                        <td class="text-center">
                                            @if ($presentation->status_presentation->value == \App\Enum\StatusPresentationEnum::WAITING->value)
                                                <small class="bg-label-warning p-2 rounded-2">
                                                    {{ ucwords($presentation->status_presentation->value) }}
                                                </small>
                                            @elseif($presentation->status_presentation->value == \App\Enum\StatusPresentationEnum::PENNDING->value)
                                                <small class="bg-label-danger p-2 rounded-2">
                                                    {{ ucwords($presentation->status_presentation->value) }}
                                                </small>
                                            @elseif($presentation->status_presentation->value == \App\Enum\StatusPresentationEnum::FINISH->value)
                                                <small class="bg-label-primary p-2 rounded-2">
                                                    {{ ucwords($presentation->status_presentation->value) }}
                                                </small>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <h6 class="mb-0">
                                                <a
                                                    href="{{ route('student-offline.project.presentation.revision', ['project' => $presentation->project->id, 'presentation' => $presentation->id]) }}">
                                                    <button class="btn btn-warning btn-sm">Revisi</button>
                                                </a>
                                            </h6>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>


                    <div class="tab-pane fade {{ request('tab') == 'online' ? 'show active' : '' }}" id="online"
                        role="tabpanel">
                        <!-- Konten untuk Presentasi Online -->
                        <table class="table align-middle mb-0 text-nowrap">
                            <thead>
                                <tr>
                                    <th class="ps-0 text">No</th>
                                    <th class="text-center">Jam</th>
                                    <th class="text-center">Tanggal</th>
                                    <th class="text-center">Mentor</th>
                                    <th class="text-center">Status Presentasi</th>
                                    <th class="text-center">Status Pengajuan</th>
                                    <th class="text-center">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($onlinePresentations as $presentation)
                                    <tr>
                                        <td class="ps-0 text">
                                            <span>{{ $loop->iteration }}.</span>
                                        </td>
                                        <td class="text-center">
                                            <span class="text-warning">{{ \Carbon\Carbon::parse($presentation->date_time_presentation)->format('h:i A') }}</span>
                                        </td>
                                        <td class="text-center">
                                            <span class="text-warning">{{ \Carbon\Carbon::parse($presentation->date_time_presentation)->format('j F Y') }}</span>
                                        </td>
                                        <td class="text-center">
                                            <h6 class="mb-0">{{ $presentation->mentor->name ?? '-' }}</h6>
                                        </td>
                                        <td class="text-center">
                                            <h6 class="mb-0 badge bg-light-success text-success rounded-2">Presentasi {{ $presentation->category_presentation }}</h6>
                                        </td>
                                        <td class="text-center">
                                            @if ($presentation->status_presentation->value == \App\Enum\StatusPresentationEnum::WAITING->value)
                                            <small class="bg-label-warning p-2 rounded-2">
                                                {{ ucwords($presentation->status_presentation->value) }}
                                            </small>
                                        @elseif($presentation->status_presentation->value == \App\Enum\StatusPresentationEnum::PENNDING->value)
                                            <small class="bg-label-danger p-2 rounded-2">
                                                {{ ucwords($presentation->status_presentation->value) }}
                                            </small>
                                        @elseif($presentation->status_presentation->value == \App\Enum\StatusPresentationEnum::FINISH->value)
                                            <small class="bg-label-primary p-2 rounded-2">
                                                {{ ucwords($presentation->status_presentation->value) }}
                                            </small>
                                        @endif
                                        </td>
                                        <td class="text-center">
                                            <h6 class="mb-0">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#link-modal-{{ $presentation->id }}">
                                                    <button class="btn btn-info btn-sm">Link</button>
                                                </a>
                                                <a
                                                    href="{{ route('student-offline.project.presentation.revision', ['project' => $presentation->project->id, 'presentation' => $presentation->id]) }}">
                                                    <button class="btn btn-warning btn-sm">Revisi</button>
                                                </a>
                                            </h6>
                                        </td>
                                    </tr>
                                    @include('Hummatask.partials.link-modal')
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
        </div>

    </div>

    @include('Hummatask.partials.submit-modal')

    
@endsection
