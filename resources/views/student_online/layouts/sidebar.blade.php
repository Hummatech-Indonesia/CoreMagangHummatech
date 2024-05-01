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
                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#presentation-modal"
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
                                        Presentasi
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-lock">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M5 13a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-6z" />
                                        <path d="M11 16a1 1 0 1 0 2 0a1 1 0 0 0 -2 0" />
                                        <path d="M8 11v-4a4 4 0 1 1 8 0v4" />
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
                                <i class="ti ti-pencil"></i>
                            </span>
                            <span class="hide-menu">Jurnal <i class="fas fa-lock opacity-50 ms-2"></i></span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" data-bs-toggle="modal" data-bs-target="#login-modal"
                            href="javascript:void(0)" aria-expanded="false">
                            <span>
                                <i class="ti ti-presentation-analytics"></i>
                            </span>
                            <span class="hide-menu">Absensi <i class="fas fa-lock opacity-50 ms-2"></i></span>
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
                    {{-- <li class="sidebar-item">
                        <a class="sidebar-link" data-bs-toggle="modal" data-bs-target="#login-modal"
                            href="javascript:void(0)" aria-expanded="false">
                            <span>
                                <i class="ti ti-pencil"></i>
                            </span>
                            <span class="hide-menu">Tugas <i class="fas fa-lock opacity-50 ms-2"></i></span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" data-bbs-toggle="modal" data-bs-target="#login-modal"
                            href="javascript:void(0)" aria-expanded="false">
                            <span>
                                <i class="ti ti-chart-area-line"></i>
                            </span>
                            <span class="hide-menu">Tantangan <i class="fas fa-lock opacity-50 ms-2"></i></span>
                        </a>
                    </li> --}}
                    <li class="sidebar-item">
                        <a class="sidebar-link" data-bs-toggle="modal" data-bs-target="#login-modal"
                            href="javascript:void(0)" aria-expanded="false">
                            <span>
                                <i class="ti ti-clock"></i>
                            </span>
                            <span class="hide-menu">Jadwal Mentor <i class="fas fa-lock opacity-50 ms-2"></i></span>
                        </a>
                    </li>
                    {{-- <li class="sidebar-item">
                        <a class="sidebar-link" data-bs-toggle="modal" data-bs-target="#login-modal"
                            href="javascript:void(0)" aria-expanded="false">
                            <span>
                                <i class="ti ti-medal"></i>
                            </span>
                            <span class="hide-menu">Sertifikat <i class="fas fa-lock opacity-50 ms-2"></i></span>
                        </a>
                    </li> --}}
                @else
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ url('/siswa-online/jurnal') }}" aria-expanded="false">
                            <span>
                                <i class="ti ti-pencil"></i>
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
                        <a class="sidebar-link" href="{{ url('/siswa-online/materi') }}" aria-expanded="false">
                            <span>
                                <i class="ti ti-book"></i>
                            </span>
                            <span class="hide-menu">Materi</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ url('/courses') }}" aria-expanded="false">
                            <span>
                                <i class="ti ti-shopping-cart"></i>
                            </span>
                            <span class="hide-menu">Beli Materi</span>
                        </a>
                    </li>
                    {{-- <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ url('/siswa-online/tugas') }}" aria-expanded="false">
                            <span>
                                <i class="ti ti-pencil"></i>
                            </span>
                            <span class="hide-menu">Tugas</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{url('/siswa-online/challenge')}}" aria-expanded="false">
                            <span>
                                <i class="ti ti-chart-area-line"></i>
                            </span>
                            <span class="hide-menu">Tantangan</span>
                        </a>
                    </li> --}}
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ url('/siswa-online/meeting') }}" aria-expanded="false">
                            <span>
                                <i class="ti ti-calendar"></i>
                            </span>
                            <span class="hide-menu">Jadwal Bimbingan</span>
                        </a>
                    </li>
                    {{-- <li class="sidebar-item">
                        <a class="sidebar-link" href="#" aria-expanded="false">
                            <span>
                                <i class="ti ti-medal"></i>
                            </span>
                            <span class="hide-menu">Sertifikat</span>
                        </a>
                    </li> --}}
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
                <ul class="list-group list-group-flush">
                    @forelse ($zoomSchedule as $zoomData)
                        <li class="list-group-item d-flex gap-2 flex-column py-3">
                            <div class="row g-0 align-items-center gx-2">
                                <div class="col-3">
                                    <div class="ratio ratio-1x1">
                                        <div
                                            class="d-flex align-items-center justify-content-center p-2 rounded-2 bg-light-primary text-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                                viewBox="0 0 20 20">
                                                <path fill="currentColor"
                                                    d="M5 5a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1.029l2.841 1.847A.75.75 0 0 0 17 13.19V6.811a.75.75 0 0 0-1.16-.629L13 8.032V7a2 2 0 0 0-2-2zm8 4.224l3-1.952v5.457l-3-1.95zM12 7v6a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1M6.892 2.03a7.067 7.067 0 0 0-.85.37a4.67 4.67 0 0 0-.292.166l-.018.012l-.006.004l-.002.001l-.001.001L6 3l-.277-.416a.5.5 0 0 0 .554.833l.007-.005l.041-.025c.038-.023.099-.058.18-.1c.162-.085.407-.2.728-.317A8.105 8.105 0 0 1 10 2.5c1.183 0 2.125.236 2.767.47c.32.117.566.232.728.317a3.69 3.69 0 0 1 .22.125l.008.004l.262-.393l-.262.393a.5.5 0 1 0 .554-.832L14 3l.277-.416l-.001-.001l-.002-.001l-.006-.004l-.019-.012a4.665 4.665 0 0 0-.292-.166a7.063 7.063 0 0 0-.849-.37A9.104 9.104 0 0 0 10 1.5a9.104 9.104 0 0 0-3.108.53m-.615 1.387c-.001 0 0 0 0 0m.615 14.553c.733.267 1.79.53 3.108.53a9.104 9.104 0 0 0 3.108-.53c.367-.133.653-.268.85-.37a4.626 4.626 0 0 0 .291-.166l.019-.012l.006-.004l.002-.001s.001-.001-.276-.417l.277.416a.5.5 0 0 0-.554-.832l.262.393l-.262-.393l-.008.005a3.67 3.67 0 0 1-.22.125a6.05 6.05 0 0 1-.728.316A8.106 8.106 0 0 1 10 17.5a8.106 8.106 0 0 1-2.767-.47a6.075 6.075 0 0 1-.728-.317a3.663 3.663 0 0 1-.22-.125l-.008-.005a.5.5 0 0 0-.554.833L6 17l-.277.416l.001.001l.002.001l.006.004l.018.012l.063.038a7.063 7.063 0 0 0 1.078.497m-.615-1.386c-.001 0 0 0 0 0m7.446 0" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-9">
                                    <div class="d-flex flex-column gap-1">
                                        <h3 class="h6 fw-bolder text-truncate m-0">{{ $zoomData->title }}</h3>
                                        <div class="mb-0 d-flex gap-2 align-items-center text-muted"><i
                                                class="fas fa-clock"></i><span>{{ $zoomData->start_date->locale('id_ID')->isoFormat('HH:mm \W\I\B') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @empty
                        <div class="list-group-item p-0 d-flex gap-2 align-items-center">
                            <div class="alert alert-info d-flex gap-3 align-items-center">
                                <i class="fas fa-info-circle fa-2x"></i>Tidak ada jadwal Zoom.
                            </div>
                        </div>
                    @endforelse
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
