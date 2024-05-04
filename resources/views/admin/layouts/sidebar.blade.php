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
                        href="{{ url('/administrator/zoom-schedules') }}">
                        <i class=" ri-vidicon-line"></i> <span data-key="t-dashboards">Jadwal Zoom</span>
                    </a>
                </li>
                <li class="menu-title"><span data-key="t-menu">Paket</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->is('administrator/course*') || request()->is('administrator/appointmentofmentor') ? 'active' : '' }}" href="#materi" data-bs-toggle="collapse" role="button"
                        aria-expanded="{{ request()->is('administrator/course*') || request()->is('administrator/appointmentofmentor') ? 'true' : 'false' }}"
                        aria-controls="sidebarApps">
                        <i class="ri-book-open-line"></i> <span data-key="t-apps">Materi</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->is('administrator/course*') || request()->is('administrator/appointmentofmentor') ? 'show' : '' }}" id="materi">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ url('/administrator/course') }}"
                                    class="nav-link {{ request()->is('administrator/course*') ? 'active' : '' }}"
                                    data-key="t-chat">Materi
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/administrator/appointmentofmentor"
                                    class="nav-link {{ request()->is('administrator/appointmentofmentor') ? 'active' : '' }}"
                                    data-key="t-chat">Penetapan Mentor Materi
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->is('product*') ? 'active' : '' }}"
                        href="{{ url('/product') }}">
                        <i class=" ri-price-tag-2-line"></i> <span data-key="t-dashboards">Daftar Paket</span>
                    </a>
                </li>

                <li class="nav-item {{ request()->is('/voucher') ? 'active' : '' }}">
                    <a class="nav-link menu-link {{ request()->is('voucher*') ? 'active' : '' }}"
                        href="{{ url('/voucher') }}">
                        <i class=" las la-ticket-alt"></i> <span data-key="t-dashboards">Kode Kupon</span>
                    </a>
                </li>
                <li class="menu-title"><span data-key="t-menu">Magang</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps1" data-bs-toggle="collapse" role="button"
                        aria-expanded="{{ request()->is('approval*') ? 'true' : 'false' }}"
                        aria-controls="sidebarApps">
                        <i class="ri-bookmark-2-fill"></i> <span data-key="t-apps">Approval</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->is('approval*') ? 'show' : '' }}"
                        id="sidebarApps1">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ url('/approval') }}"
                                    class="nav-link {{ request()->is('approval*') ? 'active' : '' }}"
                                    data-key="t-chat">Pendaftaran</a>
                            </li>
                            {{-- <li class="nav-item {{ request()->is('/permission') ? 'active' : '' }}">
                                <a href="{{ url('/permission') }}" class="nav-link" data-key="t-api-key">Izin &amp; Sakit</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/top-up') }}" class="nav-link" data-key="t-api-key">TopUp</a>
                            </li> --}}
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarCharts1" data-bs-toggle="collapse" role="button"
                        aria-expanded="{{ request()->is('journal*') || request()->is('absent*') ? 'true' : 'false' }}"
                        aria-controls="sidebarCharts">
                        <i class="ri-article-line"></i> <span data-key="t-charts">Pendataan Admin</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->is('journal*') || request()->is('absent*') ? 'show' : '' }}"
                        id="sidebarCharts1">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ url('/journal') }}"
                                    class="nav-link {{ request()->is('journal*') ? 'active' : '' }}"
                                    data-key="t-chartjs">Jurnal</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/absent') }}"
                                    class="nav-link {{ request()->is('absent*') ? 'active' : '' }}"
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
                        aria-expanded="{{ request()->is('response-letter*') || request()->is('warning-letter*') ? 'true' : 'false' }}"
                        aria-controls="sidebarApps">
                        <i class="ri-file-list-3-line"></i> <span data-key="t-surat">Surat</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->is('response-letter*') || request()->is('warning-letter*') ? 'show' : '' }}"
                        id="sidebarApps">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ url('/response-letter') }}"
                                    class="nav-link {{ request()->is('response-letter*') ? 'active' : '' }}"
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
                                <a href="{{ url('/warning-letter') }}"
                                    class="nav-link {{ request()->is('warning-letter*') ? 'active' : '' }}"
                                    data-key="t-api-key">SP</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->is('division*') ? 'active' : '' }}" href="{{ url('/division') }}">
                        <i class=" ri-apps-line"></i> <span data-key="t-dashboards">Divisi</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->is('rfid*') ? 'active' : '' }}" href="{{ url('/rfid') }}">
                        <i class=" ri-apps-line"></i> <span data-key="t-dashboards">RFID</span>
                    </a>
                </li>
{{--
                <li class="nav-item">
                    <a class="nav-link menu-link " href="">
                        <i class="ri-rocket-line"></i> <span data-key="t-dashboards">Tim</span>
                    </a>
                </li> --}}

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('administrator/presentation*') ? 'active' : '' }}" href="{{url('administrator/presentation')}}">
                        <i class="ri-slideshow-line"></i> <span data-key="t-dashboards">Presentasi</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('administrator/category-project*') ? 'active' : '' }}" href="{{url('administrator/category-project')}}">
                        <i class="ri-apps-line"></i> <span data-key="t-dashboards">Kategori projek</span>
                    </a>
                </li>
                <li class="menu-title"><span data-key="t-menu">Siswa</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarForms" data-bs-toggle="collapse" role="button"
                        aria-expanded="{{ request()->is('menu-siswa*') || request()->is('menu-mentor*') || request()->is('students-rejected*') || request()->is('students-banned*') ? 'true' : 'false' }}"
                        aria-controls="sidebarForms">
                        <i class="ri-account-circle-line"></i> <span data-key="t-forms">User</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->is('menu-siswa*') || request()->is('menu-mentor*') || request()->is('students-rejected*') || request()->is('students-banned*') ? 'show' : '' }}"
                        id="sidebarForms">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="/menu-siswa"
                                    class="nav-link {{ request()->is('menu-siswa*') ? 'active' : '' }}"
                                    data-key="t-basic-elements">Siswa</a>
                            </li>
                            <li class="nav-item">
                                <a href="/menu-mentor"
                                    class="nav-link {{ request()->is('menu-mentor*') ? 'active' : '' }}"
                                    data-key="t-form-select">Mentor</a>
                            </li>
                            {{-- <li class="nav-item">
                                <a href="{{ url('/alumni') }}" class="nav-link {{ request()->is('alumni*') ? 'active' : '' }}" data-key="t-checkboxs-radios">Alumni</a>
                            </li> --}}
                            {{-- <li class="nav-item">
                                <a href="{{ url('/person-in-charge') }}" class="nav-link {{ request()->is('person-in-charge*') ? 'active' : '' }}" data-key="t-pickers">Penanggung Jawab</a>
                            </li> --}}

                            <li class="nav-item">
                                <a href="{{ url('/students-rejected') }}"
                                    class="nav-link {{ request()->is('students-rejected*') ? 'active' : '' }}"
                                    data-key="t-advanced">Siswa Ditolak</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/students-banned') }}"
                                    class="nav-link {{ request()->is('students-banned*') ? 'active' : '' }}"
                                    data-key="t-range-slider">Banned Siswa</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#siswaOffline" data-bs-toggle="collapse" role="button"
                        aria-expanded="{{ request()->is('offline-students/division-placement*') || request()->is('offline-students/team*') || request()->is('offline-students/presentation*') ? 'true' : 'false' }}"
                        aria-controls="siswaOffline">
                        <i class="ri-user-line"></i> <span data-key="t-surat">Siswa Offline</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->is('offline-students/division-placement*') || request()->is('offline-students/team*') || request()->is('offline-students/presentation*') ? 'show' : '' }}"
                        id="siswaOffline">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ url('/offline-students/division-placement') }}"
                                    class="nav-link {{ request()->is('offline-students/division-placement*') ? 'active' : '' }}"
                                    data-key="t-chat">
                                    Penempatan Divisi </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/offline-students/team') }}"
                                    class="nav-link {{ request()->is('offline-students/team*') ? 'active' : '' }}"
                                    data-key="t-api-key">Tim</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/offline-students/presentation') }}"
                                    class="nav-link {{ request()->is('offline-students/presentation*') ? 'active' : '' }}"
                                    data-key="t-api-key">Presentasi</a>
                            </li>

                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#siswaOnline" data-bs-toggle="collapse" role="button"
                        aria-expanded="{{ request()->is('online-student/menotor-placement*') ? 'true' : 'false' }}"
                        aria-controls="siswaOnline">
                        <i class="ri-user-line"></i> <span data-key="t-surat">Siswa Online</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->is('online-student/menotor-placement*') ? 'show' : '' }}"
                        id="siswaOnline">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ url('/online-student/menotor-placement') }}"
                                    class="nav-link {{ request()->is('online-student/menotor-placement*') ? 'active' : '' }}"
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


                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarCharts2" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarCharts">
                        <i class=" ri-pencil-ruler-2-line"></i> <span data-key="t-charts">Piket</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarCharts2">
                        <ul class="nav nav-sm flex-column">

                            <li class="nav-item">
                                <a href="/picket" class="nav-link" data-key="t-chartjs">
                                    Jadwal Piket </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/report') }}" class="nav-link" data-key="t-echarts"> Laporan Piket
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
