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
                    <a class="sidebar-link" href="/mentor/presentation" aria-expanded="false">
                        <span>
                            <i class="ti ti-calendar-event"></i>
                        </span>
                        <span class="hide-menu">Presentasi</span>
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
                <li class="sidebar-item">
                    <a class="sidebar-link" href="/mentor/team" aria-expanded="false">
                        <span>
                            <svg width="28" height="28" viewBox="0 0 28 28" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M9.33333 24.5V23.3333C9.33333 22.7145 9.57917 22.121 10.0168 21.6834C10.4543 21.2458 11.0478 21 11.6667 21H16.3333C16.9522 21 17.5457 21.2458 17.9832 21.6834C18.4208 22.121 18.6667 22.7145 18.6667 23.3333V24.5M19.8333 11.6667H22.1667C22.7855 11.6667 23.379 11.9125 23.8166 12.3501C24.2542 12.7877 24.5 13.3812 24.5 14V15.1667M3.5 15.1667V14C3.5 13.3812 3.74583 12.7877 4.18342 12.3501C4.621 11.9125 5.21449 11.6667 5.83333 11.6667H8.16667M11.6667 15.1667C11.6667 15.7855 11.9125 16.379 12.3501 16.8166C12.7877 17.2542 13.3812 17.5 14 17.5C14.6188 17.5 15.2123 17.2542 15.6499 16.8166C16.0875 16.379 16.3333 15.7855 16.3333 15.1667C16.3333 14.5478 16.0875 13.9543 15.6499 13.5168C15.2123 13.0792 14.6188 12.8333 14 12.8333C13.3812 12.8333 12.7877 13.0792 12.3501 13.5168C11.9125 13.9543 11.6667 14.5478 11.6667 15.1667ZM17.5 5.83333C17.5 6.45217 17.7458 7.04566 18.1834 7.48325C18.621 7.92083 19.2145 8.16667 19.8333 8.16667C20.4522 8.16667 21.0457 7.92083 21.4832 7.48325C21.9208 7.04566 22.1667 6.45217 22.1667 5.83333C22.1667 5.21449 21.9208 4.621 21.4832 4.18342C21.0457 3.74583 20.4522 3.5 19.8333 3.5C19.2145 3.5 18.621 3.74583 18.1834 4.18342C17.7458 4.621 17.5 5.21449 17.5 5.83333ZM5.83333 5.83333C5.83333 6.45217 6.07917 7.04566 6.51675 7.48325C6.95434 7.92083 7.54783 8.16667 8.16667 8.16667C8.7855 8.16667 9.379 7.92083 9.81658 7.48325C10.2542 7.04566 10.5 6.45217 10.5 5.83333C10.5 5.21449 10.2542 4.621 9.81658 4.18342C9.379 3.74583 8.7855 3.5 8.16667 3.5C7.54783 3.5 6.95434 3.74583 6.51675 4.18342C6.07917 4.621 5.83333 5.21449 5.83333 5.83333Z"
                                    stroke="#919191" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                        <span class="hide-menu">Tim</span>
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
