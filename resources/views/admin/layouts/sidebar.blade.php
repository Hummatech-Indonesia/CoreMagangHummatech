<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a class="logo logo-dark" href="/">
            <span class="logo-sm">
                <img src="{{ asset('assets/images/logo-pkl.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('assets/images/logo-pkl.png') }}" alt="" height="71px">
            </span>
        </a>
        <!-- Light Logo-->
        <a class="logo logo-light" href="/">
            <span class="logo-sm">
                <img src="{{ asset('assets/images/logo-pkl.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('assets/images/logo-pkl.png') }}" alt="" height="71px">
            </span>
        </a>
        <button class="btn btn-sm fs-20 header-item float-end btn-vertical-sm-hover p-0" id="vertical-hover"
            type="button">
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
                        <i class="ri-vidicon-line"></i> <span data-key="t-dashboards">Jadwal Zoom</span>
                    </a>
                </li>
                <li class="menu-title"><span data-key="t-menu">Paket</span></li>
                {{--  <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->is('administrator/course*') || request()->is('administrator/appointmentofmentor') ? 'active' : '' }}"
                       href="#materi" data-bs-toggle="collapse" role="button"
                       aria-expanded="{{ request()->is('administrator/course*') || request()->is('administrator/appointmentofmentor') ? 'true' : 'false' }}"
                       aria-controls="sidebarApps">
                        <i class="ri-book-open-line"></i> <span data-key="t-apps">Materi</span>
                    </a>
                    <div
                        class="collapse menu-dropdown {{ request()->is('administrator/course*') || request()->is('administrator/appointmentofmentor') ? 'show' : '' }}"
                        id="materi">
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
                </li>  --}}

                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->is('product*') ? 'active' : '' }}"
                        href="{{ url('/product') }}">
                        <i class="ri-price-tag-2-line"></i> <span data-key="t-dashboards">Daftar Paket</span>
                    </a>
                </li>

                <li class="nav-item {{ request()->is('/voucher') ? 'active' : '' }}">
                    <a class="nav-link menu-link {{ request()->is('voucher*') ? 'active' : '' }}"
                        href="{{ url('/voucher') }}">
                        <i class="las la-ticket-alt"></i> <span data-key="t-dashboards">Kode Kupon</span>
                    </a>
                </li>
                <li class="menu-title"><span data-key="t-menu">Magang</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" data-bs-toggle="collapse" href="#sidebarApps1" role="button"
                        aria-expanded="{{ request()->is('approval*') ? 'true' : 'false' }}"
                        aria-controls="sidebarApps">
                        <i class="ri-bookmark-2-fill"></i> <span data-key="t-apps">Menu Admin</span>
                    </a>
                    <div class="menu-dropdown {{ request()->is('approval*') ? 'show' : '' }} collapse"
                        id="sidebarApps1">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('approval*') ? 'active' : '' }}" data-key="t-chat"
                                    href="{{ url('/approval') }}">Pendaftaran</a>
                            </li>
                            <li class="nav-item {{ request()->is('administrator/permission*') ? 'active' : '' }}">
                                <a class="nav-link" data-key="t-api-key"
                                    href="{{ url('/administrator/permission') }}">Izin &amp; Sakit</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('journal*') ? 'active' : '' }}"
                                    data-key="t-chartjs" href="{{ url('/journal') }}">Jurnal</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('absent*') ? 'active' : '' }}" data-key="t-echarts"
                                    href="{{ url('/absent') }}">Absensi</a>
                            </li>
                            {{-- <li class="nav-item">
                                <a href="{{ url('/top-up') }}" class="nav-link" data-key="t-api-key">TopUp</a>
                            </li> --}}
                        </ul>
                    </div>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarCharts1" data-bs-toggle="collapse" role="button"
                       aria-expanded="{{ request()->is('journal*') || request()->is('absent*') ? 'true' : 'false' }}"
                       aria-controls="sidebarCharts">
                        <i class="ri-article-line"></i> <span data-key="t-charts">Pendataan Admin</span>
                    </a>
                    <div
                        class="collapse menu-dropdown {{ request()->is('journal*') || request()->is('absent*') ? 'show' : '' }}"
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
                            <li class="nav-item">
                                <a href="" class="nav-link" data-key="t-echarts">Report</a>
                            </li>
                        </ul>
                    </div>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link menu-link" data-bs-toggle="collapse" href="#sidebarApps" role="button"
                        aria-expanded="{{ request()->is('response-letter*') || request()->is('warning-letter*') ? 'true' : 'false' }}"
                        aria-controls="sidebarApps">
                        <i class="ri-file-list-3-line"></i> <span data-key="t-surat">Surat</span>
                    </a>
                    <div class="menu-dropdown {{ request()->is('response-letter*') || request()->is('warning-letter*') ? 'show' : '' }} collapse"
                        id="sidebarApps">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('response-letter*') ? 'active' : '' }}"
                                    data-key="t-chat" href="{{ url('/response-letter') }}">
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
                                <a class="nav-link {{ request()->is('warning-letter*') ? 'active' : '' }}"
                                    data-key="t-api-key" href="{{ url('/warning-letter') }}">SP</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->is('administrator/institution') ? 'active' : '' }}"
                        href="{{ route('institution.index') }}">
                        <i class="ri-community-line"></i> <span data-key="t-dashboards">Sekolah/Universitas</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->is('division*') ? 'active' : '' }}"
                        href="{{ url('/division') }}">
                        <i class="ri-apps-line"></i> <span data-key="t-dashboards">Divisi</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->is('rfid*') ? 'active' : '' }}"
                        href="{{ url('/rfid') }}">
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
                    <a class="nav-link menu-link" data-bs-toggle="collapse" href="#sidebarForms" role="button"
                        aria-expanded="{{ request()->is('menu-siswa*') || request()->is('menu-mentor*') || request()->is('students-rejected*') || request()->is('students-banned*') ? 'true' : 'false' }}"
                        aria-controls="sidebarForms">
                        <i class="ri-account-circle-line"></i> <span data-key="t-forms">User</span>
                    </a>
                    <div class="menu-dropdown {{ request()->is('menu-siswa*') || request()->is('menu-mentor*') || request()->is('students-rejected*') || request()->is('students-banned*') ? 'show' : '' }} collapse"
                        id="sidebarForms">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('*menu-siswa') ? 'active' : '' }}"
                                    data-key="t-basic-elements" href="/menu-siswa">Siswa</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('*manage-session*') ? 'active' : '' }}"
                                    data-key="t-basic-elements" href="{{ route('student.managesession') }}">Kelola
                                    Sesi</a>
                            </li>
                            {{--                            <li class="nav-item"> --}}
                            {{--                                <a href="/faces" class="nav-link {{ request()->is('faces*') ? 'active' : '' }}" --}}
                            {{--                                    data-key="t-basic-elements">Data Wajah</a> --}}
                            {{--                            </li> --}}
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('menu-mentor*') ? 'active' : '' }}"
                                    data-key="t-form-select" href="/menu-mentor">Mentor</a>
                            </li>
                            {{-- <li class="nav-item">
                                <a href="{{ url('/alumni-admin') }}"
                                    class="nav-link {{ request()->is('alumni*') ? 'active' : '' }}"
                                    data-key="t-checkboxs-radios">Alumni</a>
                            </li> --}}
                            {{-- <li class="nav-item">
                                <a href="{{ url('/person-in-charge') }}" class="nav-link {{ request()->is('person-in-charge*') ? 'active' : '' }}" data-key="t-pickers">Penanggung Jawab</a>
                            </li> --}}

                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('students-rejected*') ? 'active' : '' }}"
                                    data-key="t-advanced" href="{{ url('/students-rejected') }}">Siswa Ditolak</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('students-banned*') ? 'active' : '' }}"
                                    data-key="t-range-slider" href="{{ url('/students-banned') }}">Banned Siswa</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('email-user*') ? 'active' : '' }}"
                                    data-key="t-range-slider" href="{{ url('/email-user') }}">Email user</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" data-bs-toggle="collapse" href="#siswaOffline" role="button"
                        aria-expanded="{{ request()->is('offline-students/division-placement*') || request()->is('offline-students/team*') || request()->is('offline-students/presentation*') ? 'true' : 'false' }}"
                        aria-controls="siswaOffline">
                        <i class="ri-user-line"></i> <span data-key="t-surat">Menu Siswa</span>
                    </a>
                    <div class="menu-dropdown {{ request()->is('offline-students/division-placement*') || request()->is('offline-students/team*') || request()->is('offline-students/presentation*') ? 'show' : '' }} collapse"
                        id="siswaOffline">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('offline-students/division-placement*') ? 'active' : '' }}"
                                    data-key="t-chat" href="{{ url('/offline-students/division-placement') }}">
                                    Penempatan Divisi </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('offline-students/team*') ? 'active' : '' }}"
                                    data-key="t-api-key" href="{{ url('/offline-students/team') }}">Tim</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('offline-students/presentation*') ? 'active' : '' }}"
                                    data-key="t-api-key"
                                    href="{{ url('/offline-students/presentation') }}">Presentasi</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('online-student/menotor-placement*') ? 'active' : '' }}"
                                    data-key="t-chat" href="{{ url('/online-student/menotor-placement') }}">
                                    Penetapan Mentor </a>
                            </li>
                        </ul>
                    </div>
                </li>
                {{-- <li class="nav-item">
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
                            <li class="nav-item">
                                <a href="javascript:void(0)" class="nav-link" data-key="t-api-key">Tim</a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void(0)" class="nav-link" data-key="t-api-key">Presentasi</a>
                            </li>
                        </ul>
                    </div>
                </li> --}}

                {{-- <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ url('/announcement') }}">
                        <i class=" ri-radar-line"></i> <span data-key="t-dashboards">Pengumuman</span>
                    </a>
                </li> --}}

                <li class="nav-item">
                    <a class="nav-link menu-link" data-bs-toggle="collapse" href="#sidebarCharts2" role="button"
                        aria-expanded="false" aria-controls="sidebarCharts">
                        <i class="ri-pencil-ruler-2-line"></i> <span data-key="t-charts">Piket</span>
                    </a>
                    <div class="menu-dropdown collapse" id="sidebarCharts2">
                        <ul class="nav nav-sm flex-column">

                            <li class="nav-item">
                                <a class="nav-link" data-key="t-chartjs" href="/picket">
                                    Jadwal Piket </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-key="t-echarts" href="{{ url('/report') }}"> Laporan Piket
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
