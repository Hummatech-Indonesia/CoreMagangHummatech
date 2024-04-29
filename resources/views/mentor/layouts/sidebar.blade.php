<aside class="left-sidebar">
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
                    <a class="sidebar-link" href="/mentor" aria-expanded="false">
                        <span>
                            <i class="ti ti-aperture"></i>
                        </span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="/timetable" aria-expanded="false">
                        <span>
                            <i class="ti ti-calendar-event"></i>
                        </span>
                        <span class="hide-menu">Jadwal</span>
                    </a>
                </li>
                {{-- <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ url('/mentor/assessment') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-star"></i>
                        </span>
                        <span class="hide-menu">Penilaian</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ url('/mentor/challenge') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-chart-area-line"></i>
                        </span>
                        <span class="hide-menu">Tantangan</span>
                    </a>
                </li> --}}
                <li class="sidebar-item">
                    <a class="sidebar-link" href="/student/absensi" aria-expanded="false">
                        <span>
                            <i class="ti ti-presentation-analytics"></i>
                        </span>
                        <span class="hide-menu">Absensi Siswa</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="/student/journal" aria-expanded="false">
                        <span>
                            <i class="ti ti-list-details"></i>
                        </span>
                        <span class="hide-menu">Jurnal Siswa</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="/student" aria-expanded="false">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user-hexagon">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 13a3 3 0 1 0 0 -6a3 3 0 0 0 0 6z" />
                                <path d="M6.201 18.744a4 4 0 0 1 3.799 -2.744h4a4 4 0 0 1 3.798 2.741" />
                                <path d="M19.875 6.27c.7 .398 1.13 1.143 1.125 1.948v7.284c0 .809 -.443 1.555 -1.158 1.948l-6.75 4.27a2.269 2.269 0 0 1 -2.184 0l-6.75 -4.27a2.225 2.225 0 0 1 -1.158 -1.948v-7.285c0 -.809 .443 -1.554 1.158 -1.947l6.75 -3.98a2.33 2.33 0 0 1 2.25 0l6.75 3.98h-.033z" />
                            </svg>
                        </span>
                        <span class="hide-menu">Siswa</span>
                    </a>
                </li>

            </ul>
        </nav>
        <div class="fixed-profile p-3 bg-light-secondary rounded sidebar-ad mt-3">
            <div class="hstack gap-3">
                <div class="john-img">
                    <img src="../../dist/images/profile/user-1.jpg" class="rounded-circle" width="40" height="40"
                        alt="">
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
