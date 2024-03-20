<aside class="left-sidebar">

    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="/siswa-offline" class="text-nowrap logo-img">
                <img src="{{ asset('logopkldark.png') }}" class="dark-logo" width="250" alt="" />
                <img src="{{ asset('assets/images/logo-pkl.png') }}" class="light-logo" width="250" alt="" />
            </a>
            <div class="close-btn d-lg-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8 text-muted"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar>
            <ul id="sidebarnav">
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
                        <a class="sidebar-link" href="javascript:void(0)" aria-expanded="false">
                            <span>
                                <i class="ti ti-box"></i>
                            </span>
                            <span class="hide-menu">Kelas Divisi <i class="fas fa-lock opacity-50 ms-2"></i></span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="javascript:void(0)" aria-expanded="false">
                            <span>
                                <i class="ti ti-book"></i>
                            </span>
                            <span class="hide-menu">Materi <i class="fas fa-lock opacity-50 ms-2"></i></span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="javascript:void(0)" aria-expanded="false">
                            <span>
                                <i class="ti ti-pencil"></i>
                            </span>
                            <span class="hide-menu">Tugas <i class="fas fa-lock opacity-50 ms-2"></i></span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="javascript:void(0)" aria-expanded="false">
                            <span>
                                <i class="ti ti-clock"></i>
                            </span>
                            <span class="hide-menu">Jadwal Mentor <i class="fas fa-lock opacity-50 ms-2"></i></span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="javascript:void(0)" aria-expanded="false">
                            <span>
                                <i class="ti ti-medal"></i>
                            </span>
                            <span class="hide-menu">Sertifikat <i class="fas fa-lock opacity-50 ms-2"></i></span>
                        </a>
                    </li>
                @else
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="/siswa-online/jurnal" aria-expanded="false">
                            <span>
                                <i class="ti ti-check"></i>
                            </span>
                            <span class="hide-menu">Jurnal</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="/siswa-online/division" aria-expanded="false">
                            <span>
                                <i class="ti ti-box"></i>
                            </span>
                            <span class="hide-menu">Kelas Divisi</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="/siswa-online/materi" aria-expanded="false">
                            <span>
                                <i class="ti ti-book"></i>
                            </span>
                            <span class="hide-menu">Materi</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="#" aria-expanded="false">
                            <span>
                                <i class="ti ti-pencil"></i>
                            </span>
                            <span class="hide-menu">Tugas</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="#" aria-expanded="false">
                            <span>
                                <i class="ti ti-clock"></i>
                            </span>
                            <span class="hide-menu">Jadwal Mentor</span>
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
                    <a class="sidebar-link" href="#" aria-expanded="false">
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
