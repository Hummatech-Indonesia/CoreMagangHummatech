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
                    <a class="nav-link menu-link" href="{{ url('/administrator') }}">
                        <i class="mdi mdi-speedometer"></i> <span data-key="t-dashboards">Dashboards</span>
                    </a>
                </li> <!-- end Dashboard Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ url('/product') }}">
                        <i class=" ri-price-tag-2-line"></i> <span data-key="t-dashboards">Daftar Paket</span>
                    </a>
                </li>

                <li class="nav-item {{ request()->is('/voucher') ? 'active' : '' }}">
                    <a class="nav-link menu-link" href="{{ url('/voucher') }}">
                        <i class=" las la-ticket-alt"></i> <span data-key="t-dashboards">Kode Kupon</span>
                    </a>
                </li> <!-- end Dashboard Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps1" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarApps">
                        <i class=" ri-bookmark-2-fill"></i> <span data-key="t-apps">Approval</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarApps1">
                        <ul class="nav nav-sm flex-column">

                            <li class="nav-item">
                                <a href="{{ url('/approval') }}" class="nav-link" data-key="t-chat"> Pendaftaran </a>
                            </li>
                            <li class="nav-item {{ request()->is('/permission') ? 'active' : '' }}">
                                <a href="{{ url('/permission') }}" class="nav-link" data-key="t-api-key">Izin &
                                    Sakit</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/top-up') }}" class="nav-link" data-key="t-api-key">TopUp</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarForms" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarForms">
                        <i class=" ri-account-circle-line"></i> <span data-key="t-forms">User</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarForms">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="/menu-siswa" class="nav-link" data-key="t-basic-elements">Siswa</a>
                            </li>
                            <li class="nav-item">
                                <a href="/menu-mentor" class="nav-link" data-key="t-form-select">Mentor</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/alumni') }}" class="nav-link" data-key="t-checkboxs-radios">Alumni</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/person-in-charge') }}" class="nav-link" data-key="t-pickers">
                                    Penanggung Jawab </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/rfid') }}" class="nav-link" data-key="t-input-masks">RFID</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/students-rejected') }}" class="nav-link" data-key="t-advanced">Siswa
                                    Ditolak</a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link" data-key="t-range-slider"> Banned Siswa </a>
                            </li>

                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarCharts1" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarCharts">
                        <i class="ri-article-line"></i> <span data-key="t-charts">Pendataan Admin</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarCharts1">
                        <ul class="nav nav-sm flex-column">

                            <li class="nav-item">
                                <a href="{{ url('/journal') }}" class="nav-link" data-key="t-chartjs"> Jurnal </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/absent') }}" class="nav-link" data-key="t-echarts"> Absensi
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link" data-key="t-echarts"> Report
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarApps">
                        <i class="ri-file-list-3-line"></i> <span data-key="t-surat">Surat</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarApps">
                        <ul class="nav nav-sm flex-column">

                            <li class="nav-item">
                                <a href="{{ url('/response-letter') }}" class="nav-link" data-key="t-chat">
                                    Pendaftaran </a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link" data-key="t-api-key">Izin &
                                    Sakit</a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link" data-key="t-api-key">TopUp</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/warning-letter') }}" class="nav-link" data-key="t-api-key">SP</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ url('/announcement') }}">
                        <i class=" ri-radar-line"></i> <span data-key="t-dashboards">Pengumuman</span>
                    </a>
                </li>
                </li>

                <li class="nav-item">
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ url('/division') }}">
                        <i class=" ri-apps-line"></i> <span data-key="t-dashboards">Divisi</span>
                    </a>
                </li>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="">
                        <i class="ri-rocket-line"></i> <span data-key="t-dashboards">Tim</span>
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link menu-link" href="">
                        <i class="ri-slideshow-line"></i> <span data-key="t-dashboards">Presentasi</span>
                    </a>
                </li>

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
                                <a href="" class="nav-link" data-key="t-echarts"> Laporan Piket
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
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
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
