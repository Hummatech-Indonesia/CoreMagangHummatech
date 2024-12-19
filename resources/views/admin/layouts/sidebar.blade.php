<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index.html" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('assets/images/logo-pkl.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('assets/images/logo-pkl.png') }}" alt="" height="71px">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index.html" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('assets/images/logo-pkl.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('assets/images/logo-pkl.png') }}" alt="" height="71px">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->is('administrator') ? 'active' : '' }}"
                        href="{{ url('/administrator') }}">
                        <i class="mdi mdi-speedometer"></i> <span data-key="t-dashboards">Dashboards</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->is('administrator/zoom-schedules') ? 'active' : '' }}"
                        href="{{ url('administrator/zoom-schedules') }}">
                        <i class=" ri-vidicon-line"></i> <span data-key="t-dashboards">Jadwal Zoom</span>
                    </a>
                </li>
                <li class="menu-title"><span data-key="t-menu">Paket</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->is('administrator/course*') || request()->is('administrator/appointmentofmentor') ? 'active' : '' }}"
                        href="#materi" data-bs-toggle="collapse" role="button"
                        aria-expanded="{{ request()->is('administrator/course*') || request()->is('administrator/appointmentofmentor') ? 'true' : 'false' }}"
                        aria-controls="sidebarApps">
                        <i class="ri-book-open-line"></i> <span data-key="t-apps">Materi</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->is('administrator/course*') || request()->is('administrator/appointmentofmentor') ? 'show' : '' }}"
                        id="materi">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ url('administrator/course') }}"
                                    class="nav-link {{ request()->is('administrator/course*') ? 'active' : '' }}"
                                    data-key="t-chat">Materi
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('administrator/appointmentofmentor') }}"
                                    class="nav-link {{ request()->is('administrator/appointmentofmentor') ? 'active' : '' }}"
                                    data-key="t-chat">Penetapan Mentor Materi
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li class="nav-item">
                    {{-- <a class="nav-link menu-link {{ request()->routeIs('administrator.product*') ? 'active' : '' }}"
                        href="{{ route('administrator.product') }}">
                        <i class=" ri-price-tag-2-line"></i> <span data-key="t-dashboards">Daftar Paket</span>
                    </a> --}}
                    <a class="nav-link menu-link {{ request()->routeIs('administrator.product.index') ? 'active' : '' }}"
                        href="{{ route('administrator.product.index') }}">
                        <i class="ri-price-tag-2-line"></i> <span data-key="t-dashboards">Daftar Paket</span>
                    </a>
                </li>

                <li class="nav-item {{ request()->is('administrator/voucher') ? 'active' : '' }}">
                    <a class="nav-link menu-link {{ request()->is('administrator/voucher*') ? 'active' : '' }}"
                        href="{{ url('administrator/voucher') }}">
                        <i class=" las la-ticket-alt"></i> <span data-key="t-dashboards">Kode Kupon</span>
                    </a>
                </li>
                <li class="menu-title"><span data-key="t-menu">Magang</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps1" data-bs-toggle="collapse" role="button"
                        aria-expanded="{{ request()->is('administrator/approval*') ? 'true' : 'false' }}"
                        aria-controls="sidebarApps">
                        <i class="ri-bookmark-2-fill"></i> <span data-key="t-apps">Approval</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->is('administrator/approval*') ? 'show' : '' }}"
                        id="sidebarApps1">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ url('administrator/approval') }}"
                                    class="nav-link {{ request()->is('administrator/approval*') ? 'active' : '' }}"
                                    data-key="t-chat">Pendaftaran</a>
                            </li>
                            <li class="nav-item {{ request()->is('administrator/permission*') ? 'active' : '' }}">
                                <a href="{{ url('/administrator/permission') }}" class="nav-link"
                                    data-key="t-api-key">Izin &amp; Sakit</a>
                            </li>
                            {{-- <li class="nav-item">
                                <a href="{{ url('/top-up') }}" class="nav-link" data-key="t-api-key">TopUp</a>
                            </li> --}}
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarCharts1" data-bs-toggle="collapse" role="button"
                        aria-expanded="{{ request()->is('administrator/journal*') || request()->is('administrator/absent*') ? 'true' : 'false' }}"
                        aria-controls="sidebarCharts">
                        <i class="ri-article-line"></i> <span data-key="t-charts">Pendataan Admin</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->is('administrator/journal*') || request()->is('administrator/absent*') ? 'show' : '' }}"
                        id="sidebarCharts1">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ url('administrator/journal') }}"
                                    class="nav-link {{ request()->is('administrator/journal*') ? 'active' : '' }}"
                                    data-key="t-chartjs">Jurnal</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('administrator/absent') }}"
                                    class="nav-link {{ request()->is('administrator/absent*') ? 'active' : '' }}"
                                    data-key="t-echarts">Absensi</a>
                            </li>
                            {{-- <li class="nav-item">
                                <a href="" class="nav-link" data-key="t-echarts">Report</a>
                            </li> --}}
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button"
                        aria-expanded="{{ request()->is('administrator/response-letter*') || request()->is('administrator/warning-letter*') ? 'true' : 'false' }}"
                        aria-controls="sidebarApps">
                        <i class="ri-file-list-3-line"></i> <span data-key="t-surat">Surat</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->is('administrator/response-letter*') || request()->is('administrator/warning-letter*') ? 'show' : '' }}"
                        id="sidebarApps">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ url('administrator/response-letter') }}"
                                    class="nav-link {{ request()->is('administrator/response-letter*') ? 'active' : '' }}"
                                    data-key="t-chat">
                                    Pendaftaran </a>
                            </li>
                            {{-- <li class="nav-item">
                                <a href="" class="nav-link" data-key="t-api-key">Izin &
                                    Sakit</a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link" data-key="t-api-key">TopUp</a>
                            </li> --}}
                            <li class="nav-item">
                                <a href="{{ url('administrator/warning-letter') }}"
                                    class="nav-link {{ request()->is('administrator/warning-letter*') ? 'active' : '' }}"
                                    data-key="t-api-key">SP</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->is('administrator/institution') ? 'active' : '' }}"
                        {{-- href="{{ route('institution.index') }}"> --}}
                        href="{{ url('administrator/institution') }}">
                        <i class="ri-community-line"></i> <span data-key="t-dashboards">Sekolah/Universitas</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->is('administrator/division*') ? 'active' : '' }}"
                        href="{{ url('administrator/division') }}">
                        <i class=" ri-apps-line"></i> <span data-key="t-dashboards">Divisi</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->is('administrator/rfid*') ? 'active' : '' }}"
                        href="{{ url('administrator/rfid') }}">
                        <i class="ri-bank-card-line"></i> <span data-key="t-dashboards">RFID</span>
                    </a>
                </li>
                {{--
                <li class="nav-item">
                    <a class="nav-link menu-link " href="">
                        <i class="ri-rocket-line"></i> <span data-key="t-dashboards">Tim</span>
                    </a>
                </li> --}}

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('administrator/presentation*') ? 'active' : '' }}"
                        href="{{ url('administrator/presentation') }}">
                        <i class="ri-slideshow-line"></i> <span data-key="t-dashboards">Presentasi</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('administrator/category-project*') ? 'active' : '' }}"
                        href="{{ url('administrator/category-project') }}">
                        <i class="ri-dashboard-line"></i> <span data-key="t-dashboards">Kategori projek</span>
                    </a>
                </li>
                <li class="menu-title"><span data-key="t-menu">Siswa</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarForms" data-bs-toggle="collapse" role="button"
                        aria-expanded="{{ request()->routeIs('administrator.menu-siswa.student.index') || request()->routeIs('administrator.menu-mentor.mentor.index') || request()->routeIs('administrator.students-rejected.index') || request()->routeIs('administrator.students-banned.index') ? 'true' : 'false' }}"
                        aria-controls="sidebarForms">
                        <i class="ri-account-circle-line"></i> <span data-key="t-forms">User</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->routeIs('administrator.menu-siswa.student.index') || request()->routeIs('administrator.menu-mentor.mentor.index') || request()->routeIs('administrator.students-rejected.index') || request()->routeIs('administrator.students-banned.index') ? 'show' : '' }}"
                        id="sidebarForms">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('administrator.menu-siswa.student.index') }}"
                                    class="nav-link {{ request()->routeIs('administrator.menu-siswa.student.index') ? 'active' : '' }}"
                                    data-key="t-basic-elements">Siswa</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('administrator.faces.index') }}"
                                    class="nav-link {{ request()->routeIs('administrator.faces.index') ? 'active' : '' }}"
                                    data-key="t-basic-elements">Data Wajah</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('administrator.menu-mentor.mentor.index') }}"
                                    class="nav-link {{ request()->routeIs('administrator.menu-mentor.mentor.index') ? 'active' : '' }}"
                                    data-key="t-form-select">Mentor</a>
                            </li>
                            {{-- <li class="nav-item">
                                <a href="{{ url('/alumni-admin') }}"
                                    class="nav-link {{ request()->routeIs('alumni*') ? 'active' : '' }}"
                                    data-key="t-checkboxs-radios">Alumni</a>
                            </li> --}}
                            {{-- <li class="nav-item">
                                <a href="{{ url('/person-in-charge') }}" class="nav-link {{ request()->routeIs('person-in-charge*') ? 'active' : '' }}" data-key="t-pickers">Penanggung Jawab</a>
                            </li> --}}
                            <li class="nav-item">
                                <a href="{{ route('administrator.students-rejected.index') }}"
                                    class="nav-link {{ request()->routeIs('administrator.students-rejected.index') ? 'active' : '' }}"
                                    data-key="t-advanced">Siswa Ditolak</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('administrator.students-banned.index') }}"
                                    class="nav-link {{ request()->routeIs('administrator.students-banned.index') ? 'active' : '' }}"
                                    data-key="t-range-slider">Banned Siswa</a>
                            </li>
                            {{-- <li class="nav-item">
                                <a href="{{ url('/email-user') }}"
                                    class="nav-link {{ request()->routeIs('email-user*') ? 'active' : '' }}"
                                    data-key="t-range-slider">Email user</a>
                            </li> --}}
                        </ul>
                    </div>
                </li>


                <li class="nav-item">
                    <a class="nav-link menu-link" href="#siswaOffline" data-bs-toggle="collapse" role="button"
                        aria-expanded="{{ request()->is('administrator/offline-students/division-placement*') || request()->is('administrator/offline-students/team*') || request()->is('administrator/offline-students/presentation*') ? 'true' : 'false' }}"
                        aria-controls="siswaOffline">
                        <i class="ri-user-line"></i> <span data-key="t-surat">Siswa Offline</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->is('administrator/offline-students/division-placement*') || request()->is('administrator/offline-students/team*') || request()->is('administrator/offline-students/presentation*') ? 'show' : '' }}"
                        id="siswaOffline">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ url('administrator/offline-students/division-placement') }}"
                                    class="nav-link {{ request()->is('administrator/offline-students/division-placement*') ? 'active' : '' }}"
                                    data-key="t-chat">
                                    Penempatan Divisi </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('administrator/offline-students/team') }}"
                                    class="nav-link {{ request()->is('administrator/offline-students/team*') ? 'active' : '' }}"
                                    data-key="t-api-key">Tim</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('administrator/offline-students/presentation') }}"
                                    class="nav-link {{ request()->is('administrator/offline-students/presentation*') ? 'active' : '' }}"
                                    data-key="t-api-key">Presentasi</a>
                            </li>

                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#siswaOnline" data-bs-toggle="collapse" role="button"
                        aria-expanded="{{ request()->is('administrator/online-student/mentor-placement*') ? 'true' : 'false' }}"
                        aria-controls="siswaOnline">
                        <i class="ri-user-line"></i> <span data-key="t-surat">Siswa Online</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->is('administrator/online-student/mentor-placement*') ? 'show' : '' }}"
                        id="siswaOnline">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ url('administrator/online-student/mentor-placement') }}"
                                    class="nav-link {{ request()->is('administrator/online-student/mentor-placement*') ? 'active' : '' }}"
                                    data-key="t-chat">
                                    Penetapan Mentor </a>
                            </li>
                            {{-- <li class="nav-item">
                                <a href="javascript:void(0)" class="nav-link" data-key="t-api-key">Tim</a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void(0)" class="nav-link" data-key="t-api-key">Presentasi</a>
                            </li> --}}
                        </ul>
                    </div>
                </li>

                {{-- <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ url('/announcement') }}">
                        <i class=" ri-radar-line"></i> <span data-key="t-dashboards">Pengumuman</span>
                    </a>
                </li> --}}

                <li class="menu-title"><span data-key="t-menu">Progres Siswa</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#presentasi" data-bs-toggle="collapse" role="button"
                        aria-expanded="{{ request()->is('administrator/student-progress/presentation*') || request()->is('administrator/student-progress/presentation/online*') ? 'true' : 'false' }}"
                        aria-controls="sidebarCharts">
                        <i class="ri-slideshow-line"></i> <span data-key="t-charts">Presentasi</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->is('administrator/student-progress/presentation*') || request()->is('administrator/student-progress/presentation/online*') ? 'show' : '' }}"
                        id="presentasi">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ url('administrator/student-progress/presentation') }}"
                                    class="nav-link {{ Route::is('administrator.student-progress.presentation') ? 'active' : '' }}"
                                    data-key="t-chartjs">Presentasi Offline</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('administrator/student-progress/presentation/online') }}"
                                    class="nav-link {{ Route::is('administrator.student-progress.presentation.online') ? 'active' : '' }}"
                                    data-key="t-echarts">Presentasi Online</a>
                            </li>
                            {{-- <li class="nav-item">
                                <a href="" class="nav-link" data-key="t-echarts">Report</a>
                            </li> --}}
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#progress-siswa" data-bs-toggle="collapse" role="button"
                        aria-expanded="{{ request()->is('administrator/student-progress/project*') || request()->is('administrator/student-progress/student*') ? 'true' : 'false' }}"
                        aria-controls="sidebarCharts">
                        <i class="ri-presentation-fill"></i> <span data-key="t-charts">Progress Siswa</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->is('administrator/student-progress/project*') || request()->is('administrator/student-progress/student*') ? 'show' : '' }}"
                        id="progress-siswa">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link menu-link {{ request()->is('administrator/student-progress/project*') ? 'active' : '' }}"
                                    href="{{ url('administrator/student-progress/project') }}">
                                    Proyek
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('administrator.student-progress.student') }}"
                                    class="nav-link {{ Route::is('administrator.student-progress.student') || Route::is('administrator.student-progress.student.project')   ? 'active' : '' }}"
                                    data-key="t-echarts">Siswa</a>
                            </li>
                            {{-- <li class="nav-item">
                                <a href="" class="nav-link" data-key="t-echarts">Report</a>
                            </li> --}}
                        </ul>
                    </div>
                </li>


                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarCharts2" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarCharts">
                        <i class=" ri-pencil-ruler-2-line"></i> <span data-key="t-charts">Piket</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarCharts2">
                        <ul class="nav nav-sm flex-column">

                            <li class="nav-item">
                                <a href="{{ route('administrator.picket.') }}" class="nav-link" data-key="t-chartjs">
                                    Jadwal Piket </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('administrator.picket.report') }}" class="nav-link" data-key="t-echarts"> Laporan Piket
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                {{-- <li class="nav-item">
                    <a class="nav-link menu-link" href="">
                        <i class=" ri-wallet-3-line"></i> <span data-key="t-widgets">Transaksi</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarCharts" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarCharts">
                        <i class=" ri-pie-chart-line"></i> <span data-key="t-charts">Histori</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarCharts">
                        <ul class="nav nav-sm flex-column">

                            <li class="nav-item">
                                <a href="" class="nav-link" data-key="t-chartjs">
                                    Pengaturan </a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link" data-key="t-echarts"> Lainnya
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> --}}

            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
