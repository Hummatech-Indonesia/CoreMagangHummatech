<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar container-fluid">
            <ul id="sidebarnav">
                <!-- ============================= -->
                <!-- Home -->
                <!-- ============================= -->
                <!-- =================== -->
                <!-- Dashboard -->
                <!-- =================== -->

                <li class=" sidebar-item px-2">
                    <a class="sidebar-link" href="/dashboard/task" aria-expanded="false">
                        <span class="material-symbols-outlined text-black">
                            home
                            </span>
                        <span class="hide-menu">Home</span>
                    </a>
                </li>
                <li class="sidebar-item px-2">
                    <a class="sidebar-link" href="#" aria-expanded="false">
                        <span>

                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M3.60001 15H14.15M6.55099 4.93799L9.81099 14.972M17.032 4.63599L8.49701 10.837M20.559 14.51L12.024 8.30899M12.257 20.916L15.518 10.882M3 12C3 13.1819 3.23279 14.3522 3.68508 15.4442C4.13738 16.5361 4.80031 17.5282 5.63604 18.364C6.47177 19.1997 7.46392 19.8626 8.55585 20.3149C9.64778 20.7672 10.8181 21 12 21C13.1819 21 14.3522 20.7672 15.4442 20.3149C16.5361 19.8626 17.5282 19.1997 18.364 18.364C19.1997 17.5282 19.8626 16.5361 20.3149 15.4442C20.7672 14.3522 21 13.1819 21 12C21 10.8181 20.7672 9.64778 20.3149 8.55585C19.8626 7.46392 19.1997 6.47177 18.364 5.63604C17.5282 4.80031 16.5361 4.13738 15.4442 3.68508C14.3522 3.23279 13.1819 3 12 3C10.8181 3 9.64778 3.23279 8.55585 3.68508C7.46392 4.13738 6.47177 4.80031 5.63604 5.63604C4.80031 6.47177 4.13738 7.46392 3.68508 8.55585C3.23279 9.64778 3 10.8181 3 12Z"
                                    stroke="white" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>

                        </span>
                        <span class="hide-menu">Detail Project</span>
                    </a>
                </li>
                <li class="sidebar-item px-2">
                    <a class="sidebar-link" href="/presentasi" aria-expanded="false">
                        <span>

                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M3.60001 15H14.15M6.55099 4.93799L9.81099 14.972M17.032 4.63599L8.49701 10.837M20.559 14.51L12.024 8.30899M12.257 20.916L15.518 10.882M3 12C3 13.1819 3.23279 14.3522 3.68508 15.4442C4.13738 16.5361 4.80031 17.5282 5.63604 18.364C6.47177 19.1997 7.46392 19.8626 8.55585 20.3149C9.64778 20.7672 10.8181 21 12 21C13.1819 21 14.3522 20.7672 15.4442 20.3149C16.5361 19.8626 17.5282 19.1997 18.364 18.364C19.1997 17.5282 19.8626 16.5361 20.3149 15.4442C20.7672 14.3522 21 13.1819 21 12C21 10.8181 20.7672 9.64778 20.3149 8.55585C19.8626 7.46392 19.1997 6.47177 18.364 5.63604C17.5282 4.80031 16.5361 4.13738 15.4442 3.68508C14.3522 3.23279 13.1819 3 12 3C10.8181 3 9.64778 3.23279 8.55585 3.68508C7.46392 4.13738 6.47177 4.80031 5.63604 5.63604C4.80031 6.47177 4.13738 7.46392 3.68508 8.55585C3.23279 9.64778 3 10.8181 3 12Z"
                                    stroke="black" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>

                        </span>
                        <span class="hide-menu">Presentation</span>
                    </a>
                </li>
                {{--                @forelse ($studentTeams as $studentTeam) --}}
                {{--                    @if ($studentTeam->hummataskTeam->category_project_id != 1) --}}
                {{--                        <li class="sidebar-item px-2"> --}}
                {{--                            <a href="{{ route('team.show', ['slug' => $studentTeam->hummataskTeam->slug]) }}" --}}
                {{--                               class="d-flex align-items-center"> --}}
                {{--                                <div class="rounded-circle overflow-hidden me-6"> --}}
                {{--                                    @if ($studentTeam->hummataskTeam->image != null && Storage::disk('public')->exists($studentTeam->hummataskTeam->image)) --}}
                {{--                                        <img src="{{ asset('storage/' . $studentTeam->hummataskTeam->image) }}" --}}
                {{--                                             class="rounded-circle card-hover border border-white" width="40" --}}
                {{--                                             height="40"> --}}
                {{--                                    @else --}}
                {{--                                        @php --}}
                {{--                                            $firstLetter = substr($studentTeam->hummataskTeam->name, 0, 1); --}}
                {{--                                            $firstLetter = strtoupper($firstLetter); --}}
                {{--                                            $backgroundColors = [ --}}
                {{--                                                '#ff5722', --}}
                {{--                                                '#4caf50', --}}
                {{--                                                '#2196f3', --}}
                {{--                                            ]; --}}
                {{--                                            $backgroundColor = $backgroundColors[ord($firstLetter) % count($backgroundColors)]; --}}
                {{--                                        @endphp --}}
                {{--                                        <div --}}
                {{--                                            style="background-color: {{ $backgroundColor }}; width: 40px; height: 40px; border-radius: 50%; display: flex; justify-content: center; align-items: center;"> --}}
                {{--                                            <span style="color: white; font-size: 15px;">{{ $firstLetter }}</span> --}}
                {{--                                        </div> --}}
                {{--                                    @endif --}}
                {{--                                </div> --}}
                {{--                                <div class="d-inline-block"> --}}
                {{--                                    <h6 class="mb-1 bg-hover-primary">{{ $studentTeam->hummataskTeam->name }} </h6> --}}
                {{--                                    <div class="tb-section-2 mt-2"> --}}
                {{--                                        @if ($studentTeam->project_id) --}}
                {{--                                            <span --}}
                {{--                                                class="bg-{{ $studentTeam->hummataskTeam->status->color() }} px-2  text-bg-{{ $studentTeam->hummataskTeam->status->color() }} fs-2 text-capitalize rounded-1 pb-1">{{ $studentTeam->hummataskTeam->status->label() }}</span> --}}
                {{--                                        @else --}}
                {{--                                            <span --}}
                {{--                                                class="bg-warning px-2  text-bg-warning fs-2 text-capitalize rounded-1 pb-1">Belum aktif</span> --}}
                {{--                                        @endif --}}
                {{--                                        <span --}}
                {{--                                            class="bg-primary px-2  text-bg-primary fs-2 rounded-1 pb-1">{{ $studentTeam->hummataskTeam->categoryProject->name }}</span> --}}
                {{--                                    </div> --}}
                {{--                                </div> --}}
                {{--                            </a> --}}
                {{--                        </li> --}}
                {{--                    @endif --}}
                {{--                @empty --}}

                {{--                @endforelse --}}
                {{--                @forelse ($hummataskTeams as $hummatas  kTeam) --}}
                {{--                    <li class="sidebar-item px-2"> --}}
                {{--                        <a href="{{ route('team.show', ['slug' => $hummataskTeam->slug]) }}" --}}
                {{--                           class="d-flex align-items-center"> --}}
                {{--                            <div class="rounded-circle overflow-hidden me-6"> --}}
                {{--                                @if ($hummataskTeam->image != null && Storage::disk('public')->exists($hummataskTeam->image)) --}}
                {{--                                    <img src="{{ asset('storage/' . $hummataskTeam->image) }}" --}}
                {{--                                         class="rounded-circle card-hover border border-white" width="40" --}}
                {{--                                         height="40"> --}}
                {{--                                @else --}}
                {{--                                    @php --}}
                {{--                                        $firstLetter = substr($hummataskTeam->name, 0, 1); --}}
                {{--                                        $firstLetter = strtoupper($firstLetter); --}}
                {{--                                        $backgroundColors = [ --}}
                {{--                                            '#ff5722', --}}
                {{--                                            '#4caf50', --}}
                {{--                                            '#2196f3', --}}
                {{--                                        ]; --}}
                {{--                                        $backgroundColor = $backgroundColors[ord($firstLetter) % count($backgroundColors)]; --}}
                {{--                                    @endphp --}}
                {{--                                    <div --}}
                {{--                                        style="background-color: {{ $backgroundColor }}; width: 40px; height: 40px; border-radius: 50%; display: flex; justify-content: center; align-items: center;"> --}}
                {{--                                        <span style="color: white; font-size: 15px;">{{ $firstLetter }}</span> --}}
                {{--                                    </div> --}}
                {{--                                @endif --}}
                {{--                            </div> --}}
                {{--                            <div class="d-inline-block"> --}}
                {{--                                <h6 class="mb-1 bg-hover-primary">{{ $hummataskTeam->name }}</h6> --}}
                {{--                                <div class="tb-section-2 mt-2"> --}}
                {{--                                    <span --}}
                {{--                                        class="bg-{{ $hummataskTeam->status->color()  }} px-2  text-bg-{{ $hummataskTeam->status->color() }} fs-2 text-capitalize rounded-1 pb-1">{{  $hummataskTeam->status->label() }}</span> --}}
                {{--                                    <span --}}
                {{--                                        class="bg-primary px-2  text-bg-primary fs-2 rounded-1 pb-1">{{ $hummataskTeam->categoryProject->name }}</span> --}}
                {{--                                </div> --}}
                {{--                            </div> --}}
                {{--                        </a> --}}
                {{--                    </li> --}}
                {{--                @empty --}}

                {{--                @endforelse --}}
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
</aside>
