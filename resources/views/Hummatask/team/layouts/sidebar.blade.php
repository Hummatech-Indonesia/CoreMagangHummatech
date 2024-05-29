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
                        <a class="sidebar-link " href="{{ route('team.show', ['slug' => $team->slug]) }}" aria-expanded="false">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-topology-star-ring">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M14 20a2 2 0 1 0 -4 0a2 2 0 0 0 4 0z" />
                                    <path d="M14 4a2 2 0 1 0 -4 0a2 2 0 0 0 4 0z" />
                                    <path d="M6 12a2 2 0 1 0 -4 0a2 2 0 0 0 4 0z" />
                                    <path d="M22 12a2 2 0 1 0 -4 0a2 2 0 0 0 4 0z" />
                                    <path d="M14 12a2 2 0 1 0 -4 0a2 2 0 0 0 4 0z" />
                                    <path d="M6 12h4" />
                                    <path d="M14 12h4" />
                                    <path d="M13.5 5.5l5 5" />
                                    <path d="M5.5 13.5l5 5" />
                                    <path d="M13.5 18.5l5 -5" />
                                    <path d="M10.5 5.5l-5 5" />
                                    <path d="M12 6v4" />
                                    <path d="M12 14v4" />
                                  </svg>                            </span>
                            <span class="hide-menu">Project</span>
                        </a>
                    </li>
                    <li class="sidebar-item px-2">
                        <a class="sidebar-link " href="{{ route('team.board', ['slug' => $team->slug]) }}" aria-expanded="false">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-layout-kanban">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M4 4l6 0" />
                                    <path d="M14 4l6 0" />
                                    <path d="M4 8m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                                    <path d="M14 8m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v2a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                                  </svg>
                            </span>
                            <span class="hide-menu">Board</span>
                        </a>
                    </li>
                    <li class="sidebar-item px-2">
                        <a class="sidebar-link " href="{{ route('team.note', ['slug' => $team->slug]) }}" aria-expanded="false">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-list-details">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M13 5h8" />
                                    <path d="M13 9h5" />
                                    <path d="M13 15h8" />
                                    <path d="M13 19h5" />
                                    <path d="M3 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                                    <path d="M3 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                                  </svg>
                            </span>
                            <span class="hide-menu">Catatan</span>
                        </a>
                    </li>
                    <li class="sidebar-item px-2">
                        <a class="sidebar-link " href="{{ route('team.presentation', ['slug' => $team->slug]) }}" aria-expanded="false">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-presentation">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M3 4l18 0" />
                                    <path d="M4 4v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-10" />
                                    <path d="M12 16l0 4" />
                                    <path d="M9 20l6 0" />
                                    <path d="M8 12l3 -3l2 2l3 -3" />
                                  </svg>
                                </span>
                            <span class="hide-menu">Presentation</span>
                        </a>
                    </li>
                    <li class="nav-item ms-auto">
                        <div class="d-flex gap-3">
                            <button class="bg-transparent border-0 sidebar-link text-primary" type="button" aria-expanded="false" data-bs-toggle="modal" data-bs-target="#edit-team">
                                <span class="hide-menu">Edit tim</span>
                            </button>   
                            <a href="{{url('dashboard/task')}}" class="btn me-1 mb-1 btn-info text-light btn-sm px-4 fs-4">
                                <i class="ti ti-arrow-back fs-3"></i> Kembali
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
</aside>
