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
                <li class="btn btn-primary ms-3">
                    <a class="sidebar-link" href="{{ route('project.task.index') }}" aria-expanded="false">
                        <span>

                            <svg width="24" height="24" viewBox="0 0 24 24" fill=""
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M19 12H5M5 12L9 16M5 12L9 8" stroke="#fff" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>

                        </span>
                        <span class="text-white">Kembali</span>
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
