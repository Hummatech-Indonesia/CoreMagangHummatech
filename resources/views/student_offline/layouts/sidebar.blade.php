<aside class="left-sidebar">
    <style>
        .myElement {
            background: linear-gradient(to right, rgba(200, 200, 200, 0.5), #ffffff);
        }
    </style>
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="/siswa-offline" class="text-nowrap logo-img">
                <img src="{{ asset('logopkldark.png') }}" class="dark-logo" width="180" alt="" />
                <img src="{{ asset('assets/images/logo-pkl.png') }}" class="light-logo" width="180" alt=""
                    style="display: none;" />
            </a>
            <div class="close-btn d-lg-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8 text-muted text-primary"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="init">
            <ul id="sidebarnav">
                <li class="nav-item mb-0 mt-2">
                    <a href="/dashboard/task"
                        aria-expanded="false">
                        <div class="myElement py-2 px-3 rounded gradient-bg">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex  gap-2">
                                    <div class="">
                                        <svg width="35" height="35" viewBox="0 0 37 37" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="18.5" cy="18.5" r="18.5" fill="#5D87FF" />
                                            <path
                                                d="M10 11H28M11 11V21C11 21.5304 11.2107 22.0391 11.5858 22.4142C11.9609 22.7893 12.4696 23 13 23H25C25.5304 23 26.0391 22.7893 26.4142 22.4142C26.7893 22.0391 27 21.5304 27 21V11M19 23V27M16 27H22M15 19L18 16L20 18L23 15"
                                                stroke="white" stroke-width="1.7" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                    <div class="mt-2">
                                        <span class="hide-menu">Presentasi</span>
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <i class="ti ti-arrow-right fs-5"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </li>
                <!-- ============================= -->
                <!-- Home -->
                <!-- ============================= -->
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Master</span>
                </li>
                <!-- =================== -->
                <!-- Dashboard -->
                <!-- =================== -->
                <li class="sidebar-item">
                    <a class="sidebar-link" href="/siswa-offline" aria-expanded="false">
                        <span>
                            <i class="ti ti-aperture"></i>
                        </span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ url('/siswa-offline/journal') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-calendar"></i>
                        </span>
                        <span class="hide-menu">Jurnal</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ url('/siswa-offline/absensi') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-presentation-analytics"></i>
                        </span>
                        <span class="hide-menu">Absensi</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ url('/courses') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-backpack"></i>
                        </span>
                        <span class="hide-menu">Materi</span>
                    </a>
                </li>
                {{-- <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ url('/siswa-offline/task') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-clipboard-copy"></i>
                        </span>
                        <span class="hide-menu">Tugas</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ url('/siswa-offline/challenge') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-chart-area-line"></i>
                        </span>
                        <span class="hide-menu">Tantangan</span>
                    </a>
                </li> --}}
                {{-- <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ url('siswa-offline/certificate') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-file-certificate"></i>
                        </span>
                        <span class="hide-menu">Sertifikat</span>
                    </a>
                </li> --}}
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('my-order') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-list"></i>
                        </span>
                        <span class="hide-menu">Pesanan Saya</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('transaction-history.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-wallet"></i>
                        </span>
                        <span class="hide-menu">Riwayat Transaksi</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="#">
                        <span class="d-flex">
                            <i class="ti ti-credit-card"></i>
                        </span>
                        <span class="hide-menu">Transaksi</span>
                    </a>
                    <ul class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="{{ url('siswa-offline/transaction/topUp') }}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">History Top Up</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ url('siswa-offline/transaction/history') }}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">History Transaksi</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="{{ url('/siswa-offline/letter-head') }}" class="sidebar-link">
                        <div class="round-16 d-flex align-items-center justify-content-center">
                            <i class="ti ti-notes"></i>
                        </div>
                        <span class="hide-menu">Kop Surat</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="#">
                        <span class="d-flex">
                            <i class="ti ti-dots-circle-horizontal"></i>
                        </span>
                        <span class="hide-menu">Lainnya</span>
                    </a>
                    <ul class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="{{ url('siswa-offline/others/rules') }}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Tata Tertib</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ url('siswa-offline/others/picket') }}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Jadwal Piket</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ url('siswa-offline/others/student') }}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Siswa</span>
                            </a>
                        </li>
                    </ul>
                </li>


            </ul>
            {{-- <div class="unlimited-access hide-menu bg-light-primary position-relative my-7 rounded">
                <div class="d-flex">
                    <div class="unlimited-access-title">
                        <h6 class="fw-semibold fs-4 mb-6 text-dark ">Buka Kunci</h6>
                        <a href="/student-offline/langganan"
                            class="btn btn-primary fs-2 fw-semibold lh-sm">Langganan</a>
                    </div>
                    <div class="unlimited-access-img ">
                        <img src="{{ asset('assets-user/dist/images/backgrounds/rocket.png') }}" alt=""
                            class="img-fluid">
                    </div>
                </div>
            </div> --}}
        </nav>
        <div class="fixed-profile p-3 bg-light-secondary rounded sidebar-ad mt-3">
            <div class="hstack gap-3">
                <div class="john-img">
                    <img src="../../dist/images/profile/user-1.jpg" class="rounded-circle" width="40"
                        height="40" alt="">
                </div>
                <div class="john-title">
                    <h6 class="mb-0 fs-4 fw-semibold">Mathew</h6>
                    <span class="fs-2 text-dark">Designer</span>
                </div>
                <button class="border-0 bg-transparent text-primary ms-auto" tabindex="0" type="button"
                    aria-label="logout" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="logout">
                    <i class="ti ti-power fs-6"></i>
                </button>
            </div>
        </div>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
