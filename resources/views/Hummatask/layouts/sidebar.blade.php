<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar container-fluid">
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
                <li class="sidebar-item px-2" >
                    <a class="sidebar-link " href="/dashboard/task" aria-expanded="false">
                        <span>
                            <i class="ti ti-aperture"></i>
                        </span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item px-2">
                    <button class="bg-transparent border-0 sidebar-link " type="button" aria-expanded="false" data-bs-toggle="modal" data-bs-target="#add-team">
                        <span>
                            <svg width="28" height="28" viewBox="0 0 28 28" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M9.33333 24.5V23.3333C9.33333 22.7145 9.57917 22.121 10.0168 21.6834C10.4543 21.2458 11.0478 21 11.6667 21H16.3333C16.9522 21 17.5457 21.2458 17.9832 21.6834C18.4208 22.121 18.6667 22.7145 18.6667 23.3333V24.5M19.8333 11.6667H22.1667C22.7855 11.6667 23.379 11.9125 23.8166 12.3501C24.2542 12.7877 24.5 13.3812 24.5 14V15.1667M3.5 15.1667V14C3.5 13.3812 3.74583 12.7877 4.18342 12.3501C4.621 11.9125 5.21449 11.6667 5.83333 11.6667H8.16667M11.6667 15.1667C11.6667 15.7855 11.9125 16.379 12.3501 16.8166C12.7877 17.2542 13.3812 17.5 14 17.5C14.6188 17.5 15.2123 17.2542 15.6499 16.8166C16.0875 16.379 16.3333 15.7855 16.3333 15.1667C16.3333 14.5478 16.0875 13.9543 15.6499 13.5168C15.2123 13.0792 14.6188 12.8333 14 12.8333C13.3812 12.8333 12.7877 13.0792 12.3501 13.5168C11.9125 13.9543 11.6667 14.5478 11.6667 15.1667ZM17.5 5.83333C17.5 6.45217 17.7458 7.04566 18.1834 7.48325C18.621 7.92083 19.2145 8.16667 19.8333 8.16667C20.4522 8.16667 21.0457 7.92083 21.4832 7.48325C21.9208 7.04566 22.1667 6.45217 22.1667 5.83333C22.1667 5.21449 21.9208 4.621 21.4832 4.18342C21.0457 3.74583 20.4522 3.5 19.8333 3.5C19.2145 3.5 18.621 3.74583 18.1834 4.18342C17.7458 4.621 17.5 5.21449 17.5 5.83333ZM5.83333 5.83333C5.83333 6.45217 6.07917 7.04566 6.51675 7.48325C6.95434 7.92083 7.54783 8.16667 8.16667 8.16667C8.7855 8.16667 9.379 7.92083 9.81658 7.48325C10.2542 7.04566 10.5 6.45217 10.5 5.83333C10.5 5.21449 10.2542 4.621 9.81658 4.18342C9.379 3.74583 8.7855 3.5 8.16667 3.5C7.54783 3.5 6.95434 3.74583 6.51675 4.18342C6.07917 4.621 5.83333 5.21449 5.83333 5.83333Z"
                                    stroke="#919191" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                        <span class="hide-menu">Team</span>
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M11.5 16.5h1v-4h4v-1h-4v-4h-1v4h-4v1h4zm.503 4.5q-1.866 0-3.51-.708q-1.643-.709-2.859-1.924q-1.216-1.214-1.925-2.856Q3 13.87 3 12.003q0-1.866.708-3.51q.709-1.643 1.924-2.859q1.214-1.216 2.856-1.925Q10.13 3 11.997 3q1.866 0 3.51.708q1.643.709 2.859 1.924q1.216 1.214 1.925 2.856Q21 10.13 21 11.997q0 1.866-.708 3.51q-.709 1.643-1.924 2.859q-1.214 1.216-2.856 1.925Q13.87 21 12.003 21" />
                            </svg>
                        </span>
                    </button>
                </li>
                @forelse ($hummatask_teams as $team)
                <li class="sidebar-item px-2">
                    <a href="/hummateam/team" class="d-flex align-items-center">
                        <div class="rounded-circle overflow-hidden me-6">
                            <img src="{{ asset('storage/'. $team->image) }}" alt="{{ $team->name }}" width="40"
                                height="40">
                        </div>
                        <div class="d-inline-block">
                            <h6 class="mb-1 bg-hover-primary">{{ $team->name }}</h6>
                            <div class="row">
                                <div class="bg-{{ $team->status == 'active' ? 'success' : 'danger' }}-subtle text-{{ $team->status == 'active' ? 'success' : 'danger' }} col-lg-4 pb-1 rounded-2 text-center">{{ $team->status }}</div>
                                <div class="bg-primary-subtle text-primary col-lg-4 pb-1 rounded-2 text-center">{{ $team->student->division->name }}</div>
                            </div>
                        </div>
                    </a>
                </li>
                    @empty
                        
                    @endforelse
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
</aside>
