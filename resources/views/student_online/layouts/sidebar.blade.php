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
                <div id="logo-container" class="d-flex justify-content-center align-items-center">
                    <img id="logo" src="{{ asset('animation1.gif') }}" class="dark-logo" width="110px" alt="" />
                </div>
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script>
                    $(document).ready(function() {
                        var logo = $('#logo');
                        var newSrc = "{{ asset('logopkldark.png') }}";
                        var newWidth = "180";

                        setTimeout(function() {
                            logo.fadeOut(1000, function() {
                                logo.attr('src', newSrc);
                                logo.attr('width', newWidth);
                                logo.fadeIn(1000);
                            });
                        }, 2500);
                    });
                </script>                <img src="{{ asset('assets/images/logo-pkl.png') }}" class="light-logo" width="180" alt=""
                    style="display: none;" />
            </a>
            <div class="close-btn d-lg-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8 text-muted text-primary"></i>
                    </div>
                    <script>
                        $(document).ready(function() {
                            // Fungsi untuk menutup sidebar saat tombol close di-klik
                            $('#sidebarCollapse').on('click', function() {
                                $('#sidebar').toggleClass('active');
                            });
                        });
                    </script>

        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar>
            <ul id="sidebarnav">
                <li class="nav-item mb-0 mt-2">
                    {{-- <a href="/student-online/dashboard/task"> --}}
                    <a href="" 
                        aria-expanded="false">
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
                                        Progress  <i class="fas fa-lock opacity-50 ms-2"></i>
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <i class="ti ti-arrow-right"></i>
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
                    <a class="sidebar-link" href="/student-online" aria-expanded="false">
                        <span>
                            <i class="ti ti-dashboard"></i>
                        </span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ Route::is('student-online.journals') ? 'active' : '' }}" href="{{ route('student-online.journals') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-pencil"></i>
                        </span>
                        <span class="hide-menu">Jurnal</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link {{ Route::is('student-online.attendances') }}" href="{{ route('student-online.attendances') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-presentation-analytics"></i>
                        </span>
                        <span class="hide-menu">Absensi</span>
                    </a>
                </li>
                {{-- <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ url('/student-online/meeting') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-calendar"></i>
                        </span>
                        <span class="hide-menu">Jadwal Bimbingan</span>
                    </a>
                </li> --}}

                @if (auth()->user()->feature)
                    <!-- ============================= -->
                    <!-- Jadwal Zoom -->
                    <!-- ============================= -->
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">Jadwal Zoom</span>
                    </li>
                @endif
            </ul>
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
