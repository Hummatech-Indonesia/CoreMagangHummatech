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
        <nav class="sidebar-nav scroll-sidebar" data-simplebar>
            <ul id="sidebarnav">
                <li class="nav-item mb-0 mt-2">
                    <a href="/dashboard/task">
                        <div class="myElement py-2 px-3 rounded">
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

                                        </svg>
                                    </div>
                                    <div class="mt-2">
                                        Presentasi
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5 12H19M19 12L15 16M19 12L15 8" stroke="#2A3547" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
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
                    <span class="hide-menu">Dashboard</span>
                </li>
                <!-- =================== -->
                <!-- Dashboard -->
                <!-- =================== -->
                <li class="sidebar-item">
                    <a class="sidebar-link" href="/siswa-online" aria-expanded="false">
                        <span>
                            <i class="ti ti-dashboard"></i>
                        </span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                @if (!auth()->user()->feature)
                    <li class="sidebar-item">
                        <a class="sidebar-link" data-bs-toggle="modal" data-bs-target="#login-modal"
                            href="javascript:void(0)" aria-expanded="false">
                            <span>
                                <i class="ti ti-check"></i>
                            </span>
                            <span class="hide-menu">Jurnal <i class="fas fa-lock opacity-50 ms-2"></i></span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" data-bs-toggle="modal" data-bs-target="#login-modal"
                            href="javascript:void(0)" aria-expanded="false">
                            <span>
                                <i class="ti ti-book"></i>
                            </span>
                            <span class="hide-menu">Materi <i class="fas fa-lock opacity-50 ms-2"></i></span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" data-bs-toggle="modal" data-bs-target="#login-modal"
                            href="javascript:void(0)" aria-expanded="false">
                            <span>
                                <i class="ti ti-pencil"></i>
                            </span>
                            <span class="hide-menu">Tugas <i class="fas fa-lock opacity-50 ms-2"></i></span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" data-bs-toggle="modal" data-bs-target="#login-modal"
                            href="javascript:void(0)" aria-expanded="false">
                            <span>
                                <i class="ti ti-clock"></i>
                            </span>
                            <span class="hide-menu">Jadwal Mentor <i class="fas fa-lock opacity-50 ms-2"></i></span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" data-bs-toggle="modal" data-bs-target="#login-modal"
                            href="javascript:void(0)" aria-expanded="false">
                            <span>
                                <i class="ti ti-medal"></i>
                            </span>
                            <span class="hide-menu">Sertifikat <i class="fas fa-lock opacity-50 ms-2"></i></span>
                        </a>
                    </li>
                @else
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ url('/siswa-online/jurnal') }}" aria-expanded="false">
                            <span>
                                <i class="ti ti-check"></i>
                            </span>
                            <span class="hide-menu">Jurnal</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ url('/siswa-online/materi') }}" aria-expanded="false">
                            <span>
                                <i class="ti ti-book"></i>
                            </span>
                            <span class="hide-menu">Materi</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ url('/siswa-online/berlangganan-materi') }}" aria-expanded="false">
                            <span>
                                <i class="ti ti-shopping-cart"></i>
                            </span>
                            <span class="hide-menu">Beli Materi</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ url('/siswa-online/tugas') }}" aria-expanded="false">
                            <span>
                                <i class="ti ti-pencil"></i>
                            </span>
                            <span class="hide-menu">Tugas</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ url('/siswa-online/meeting') }}" aria-expanded="false">
                            <span>
                                <i class="ti ti-calendar"></i>
                            </span>
                            <span class="hide-menu">Jadwal Bimbingan</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="#" aria-expanded="false">
                            <span>
                                <i class="ti ti-medal"></i>
                            </span>
                            <span class="hide-menu">Sertifikat</span>
                        </a>
                    </li>
                @endif
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

                <!-- ============================= -->
                <!-- Home -->
                <!-- ============================= -->
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Jadwal Zoom</span>
                </li>
            </ul>

            @if (!auth()->user()->feature)
                <div class="unlimited-access hide-menu bg-light-primary position-relative my-7 rounded">
                    <div class="d-flex">
                        <div class="unlimited-access-title">
                            <h6 class="fw-semibold fs-4 mb-6 text-dark w-85">Akses Lebih Banyak</h6>
                            <a href="{{ route('subscription.index') }}"
                                class="btn btn-primary fs-2 fw-semibold lh-sm">Berlangganan</a>
                        </div>
                        <div class="unlimited-access-img">
                            <img src="{{ asset('assets-user/dist/images/backgrounds/rocket.png') }}" alt=""
                                class="img-fluid">
                        </div>
                    </div>
                </div>
            @else
                <ul class="list-group">
                    <li class="list-group-item">An item</li>
                    <li class="list-group-item">A second item</li>
                    <li class="list-group-item">A third item</li>
                    <li class="list-group-item">A fourth item</li>
                    <li class="list-group-item">And a fifth one</li>
                </ul>
            @endif
        </nav>
        <div class="fixed-profile p-3 bg-light-secondary rounded sidebar-ad mt-3">
            <div class="hstack gap-3">
                <div class="john-img">
                    <img src="{{ asset('assets-user/dist/images/profile/user-1.jpg') }}" class="rounded-circle"
                        width="40" height="40" alt="">
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
