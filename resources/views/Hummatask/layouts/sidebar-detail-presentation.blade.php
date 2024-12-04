<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar container-fluid">
            <ul id="sidebarnav">
                <!-- Home -->
                {{-- <li class="sidebar-item px-2">
                    <a class="sidebar-link" href="/dashboard/task" aria-expanded="false">
                        <span class="material-symbols-outlined {{ Route::is('project.task.index') ? 'text-white' : 'text-black' }}">
                            home
                        </span>
                        <span class="hide-menu">Home</span>
                    </a>
                </li> --}}

                <!-- Detail Project -->
                <li class="sidebar-item px-2">
                    <a class="sidebar-link" href="{{ route('student-offline.project.detail', $project->id) }}" aria-expanded="false">
                        <span>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M3.60001 15H14.15M6.55099 4.93799L9.81099 14.972M17.032 4.63599L8.49701 10.837M20.559 14.51L12.024 8.30899M12.257 20.916L15.518 10.882M3 12C3 13.1819 3.23279 14.3522 3.68508 15.4442C4.13738 16.5361 4.80031 17.5282 5.63604 18.364C6.47177 19.1997 7.46392 19.8626 8.55585 20.3149C9.64778 20.7672 10.8181 21 12 21C13.1819 21 14.3522 20.7672 15.4442 20.3149C16.5361 19.8626 17.5282 19.1997 18.364 18.364C19.1997 17.5282 19.8626 16.5361 20.3149 15.4442C20.7672 14.3522 21 13.1819 21 12C21 10.8181 20.7672 9.64778 20.3149 8.55585C19.8626 7.46392 19.1997 6.47177 18.364 5.63604C17.5282 4.80031 16.5361 4.13738 15.4442 3.68508C14.3522 3.23279 13.1819 3 12 3C10.8181 3 9.64778 3.23279 8.55585 3.68508C7.46392 4.13738 6.47177 4.80031 5.63604 5.63604C4.80031 6.47177 4.13738 7.46392 3.68508 8.55585C3.23279 9.64778 3 10.8181 3 12Z"
                                    stroke="{{ Route::is('student-offline.project.detail', $project->id) ? 'white' : 'black' }}"
                                    stroke-width="1.7"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"/>
                            </svg>
                        </span>
                        <span class="hide-menu">Detail Project</span>
                    </a>
                </li>
                {{-- Presentasi --}}
                @if ($project->status != 'rejected' && $project->status != 'waiting')
                <li class="sidebar-item px-2">
                    <a class="sidebar-link" href="{{ route('student-offline.project.presentation', $project->id) }}" aria-expanded="false">
                        <span>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M3.60001 15H14.15M6.55099 4.93799L9.81099 14.972M17.032 4.63599L8.49701 10.837M20.559 14.51L12.024 8.30899M12.257 20.916L15.518 10.882M3 12C3 13.1819 3.23279 14.3522 3.68508 15.4442C4.13738 16.5361 4.80031 17.5282 5.63604 18.364C6.47177 19.1997 7.46392 19.8626 8.55585 20.3149C9.64778 20.7672 10.8181 21 12 21C13.1819 21 14.3522 20.7672 15.4442 20.3149C16.5361 19.8626 17.5282 19.1997 18.364 18.364C19.1997 17.5282 19.8626 16.5361 20.3149 15.4442C20.7672 14.3522 21 13.1819 21 12C21 10.8181 20.7672 9.64778 20.3149 8.55585C19.8626 7.46392 19.1997 6.47177 18.364 5.63604C17.5282 4.80031 16.5361 4.13738 15.4442 3.68508C14.3522 3.23279 13.1819 3 12 3C10.8181 3 9.64778 3.23279 8.55585 3.68508C7.46392 4.13738 6.47177 4.80031 5.63604 5.63604C4.80031 6.47177 4.13738 7.46392 3.68508 8.55585C3.23279 9.64778 3 10.8181 3 12Z"
                                    stroke="{{ Route::is('student-offline.project.presentation', $project->id) ? 'white' : 'black' }}"
                                    stroke-width="1.7"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"/>
                            </svg>
                        </span>
                        <span class="hide-menu">Presentation</span>
                    </a>
                </li>
                @endif


            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
</aside>
