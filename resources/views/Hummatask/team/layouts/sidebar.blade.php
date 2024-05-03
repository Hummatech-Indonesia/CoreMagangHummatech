<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <!-- Sidebar navigation-->
        <nav class="px-0 sidebar-nav scroll-sidebar container-fluid">
            <div class="d-flex justify-content-between">
                <ul id="sidebarnav">
                    <!-- ============================= -->
                    <!-- Home -->
                    <!-- ============================= -->
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">Home</span>
                    </li>
                    <!-- =================== -->
                    <!-- Dashboard -->
                    <!-- =================== -->
                    <li class="sidebar-item px-2">
                        <a class="sidebar-link " href="{{ url('/hummateam/team', $hummataskTeam->id) }}" aria-expanded="false">
                            <span>
                                <i class="ti ti-aperture"></i>
                            </span>
                            <span class="hide-menu">Project</span>
                        </a>
                    </li>
                    <li class="sidebar-item px-2">
                        <a class="sidebar-link " href="/hummateam/board" aria-expanded="false">
                            <span>
                                <i class="ti ti-aperture"></i>
                            </span>
                            <span class="hide-menu">Board</span>
                        </a>
                    </li>
                    <li class="sidebar-item px-2">
                        <a class="sidebar-link " href="/hummateam/team/team" aria-expanded="false">
                            <span>
                                <i class="ti ti-aperture"></i>
                            </span>
                            <span class="hide-menu">Catatan</span>
                        </a>
                    </li>
                    <li class="nav-item ms-auto">
                        <div class="row g-3 align-items-center">
                            <a href="{{url('dashboard/task')}}" class="btn me-1 mb-1 btn-info text-light btn-lg px-4 fs-4 font-medium">
                                <i class="ti ti-arrow-back fs-4"></i> Kembali
                            </a>
                        </div>

                    </li>

                </ul>
            </div>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
</aside>
