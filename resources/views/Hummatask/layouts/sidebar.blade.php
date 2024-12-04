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
                <li class="sidebar-item px-2">
                    <a class="sidebar-link " href="/student-offline/dashboard/task" aria-expanded="false">
                        <span>

                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M3.60001 15H14.15M6.55099 4.93799L9.81099 14.972M17.032 4.63599L8.49701 10.837M20.559 14.51L12.024 8.30899M12.257 20.916L15.518 10.882M3 12C3 13.1819 3.23279 14.3522 3.68508 15.4442C4.13738 16.5361 4.80031 17.5282 5.63604 18.364C6.47177 19.1997 7.46392 19.8626 8.55585 20.3149C9.64778 20.7672 10.8181 21 12 21C13.1819 21 14.3522 20.7672 15.4442 20.3149C16.5361 19.8626 17.5282 19.1997 18.364 18.364C19.1997 17.5282 19.8626 16.5361 20.3149 15.4442C20.7672 14.3522 21 13.1819 21 12C21 10.8181 20.7672 9.64778 20.3149 8.55585C19.8626 7.46392 19.1997 6.47177 18.364 5.63604C17.5282 4.80031 16.5361 4.13738 15.4442 3.68508C14.3522 3.23279 13.1819 3 12 3C10.8181 3 9.64778 3.23279 8.55585 3.68508C7.46392 4.13738 6.47177 4.80031 5.63604 5.63604C4.80031 6.47177 4.13738 7.46392 3.68508 8.55585C3.23279 9.64778 3 10.8181 3 12Z"
                            stroke="white" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>

                        </span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                @auth
                    @if (auth()->user()->student->internship_type == App\Enum\InternshipTypeEnum::OFFLINE->value)
                        <li class="sidebar-item px-2">
                            <button class="bg-transparent border-0 sidebar-link " type="button" aria-expanded="false"
                                    data-bs-toggle="modal" data-bs-target="#add-team">
                            <span>
                                <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M13.0013 19.5C13.5759 19.5 14.127 19.7282 14.5334 20.1346C14.9397 20.5409 15.168 21.092 15.168 21.6666C15.168 22.2413 14.9397 22.7924 14.5334 23.1987C14.127 23.605 13.5759 23.8333 13.0013 23.8333C12.4267 23.8333 11.8756 23.605 11.4692 23.1987C11.0629 22.7924 10.8346 22.2413 10.8346 21.6666C10.8346 21.092 11.0629 20.5409 11.4692 20.1346C11.8756 19.7282 12.4267 19.5 13.0013 19.5ZM13.0013 19.5V15.1666M13.0013 6.49996C12.4267 6.49996 11.8756 6.27169 11.4692 5.86536C11.0629 5.45903 10.8346 4.90793 10.8346 4.33329C10.8346 3.75866 11.0629 3.20756 11.4692 2.80123C11.8756 2.3949 12.4267 2.16663 13.0013 2.16663C13.5759 2.16663 14.127 2.3949 14.5334 2.80123C14.9397 3.20756 15.168 3.75866 15.168 4.33329C15.168 4.90793 14.9397 5.45903 14.5334 5.86536C14.127 6.27169 13.5759 6.49996 13.0013 6.49996ZM13.0013 6.49996V10.8333M6.5013 13C6.5013 12.4253 6.27303 11.8742 5.8667 11.4679C5.46037 11.0616 4.90927 10.8333 4.33464 10.8333C3.76 10.8333 3.2089 11.0616 2.80257 11.4679C2.39624 11.8742 2.16797 12.4253 2.16797 13C2.16797 13.5746 2.39624 14.1257 2.80257 14.532C3.2089 14.9384 3.76 15.1666 4.33464 15.1666C4.90927 15.1666 5.46037 14.9384 5.8667 14.532C6.27303 14.1257 6.5013 13.5746 6.5013 13ZM6.5013 13H10.8346M19.5013 13C19.5013 12.4253 19.7296 11.8742 20.1359 11.4679C20.5422 11.0616 21.0933 10.8333 21.668 10.8333C22.2426 10.8333 22.7937 11.0616 23.2 11.4679C23.6064 11.8742 23.8346 12.4253 23.8346 13C23.8346 13.5746 23.6064 14.1257 23.2 14.532C22.7937 14.9384 22.2426 15.1666 21.668 15.1666C21.0933 15.1666 20.5422 14.9384 20.1359 14.532C19.7296 14.1257 19.5013 13.5746 19.5013 13ZM19.5013 13H15.168M15.168 13C15.168 12.4253 14.9397 11.8742 14.5334 11.4679C14.127 11.0616 13.5759 10.8333 13.0013 10.8333M15.168 13C15.168 13.5746 14.9397 14.1257 14.5334 14.532C14.127 14.9384 13.5759 15.1666 13.0013 15.1666M13.0013 10.8333C12.4267 10.8333 11.8756 11.0616 11.4692 11.4679C11.0629 11.8742 10.8346 12.4253 10.8346 13M10.8346 13C10.8346 13.5746 11.0629 14.1257 11.4692 14.532C11.8756 14.9384 12.4267 15.1666 13.0013 15.1666M14.6263 5.95829L20.043 11.375M5.95964 14.625L11.3763 20.0416M14.6263 20.0416L20.043 14.625M11.3763 5.95829L5.95964 11.375"
                                    stroke="#919191" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>

                            </span>
                                <span class="hide-menu">Ajukan Project</span>
                                <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                          d="M11.5 16.5h1v-4h4v-1h-4v-4h-1v4h-4v1h4zm.503 4.5q-1.866 0-3.51-.708q-1.643-.709-2.859-1.924q-1.216-1.214-1.925-2.856Q3 13.87 3 12.003q0-1.866.708-3.51q.709-1.643 1.924-2.859q1.214-1.216 2.856-1.925Q10.13 3 11.997 3q1.866 0 3.51.708q1.643.709 2.859 1.924q1.216 1.214 1.925 2.856Q21 10.13 21 11.997q0 1.866-.708 3.51q-.709 1.643-1.924 2.859q-1.214 1.216-2.856 1.925Q13.87 21 12.003 21"/>
                                </svg>
                            </span>
                            </button>
                        </li>
                        <li class="sidebar-item px-2 ms-auto">
                            <a class="btn p-2 px-3 text-primary border-none d-flex gap-2"
                                    style="background: rgba(93, 135, 255, .2)" href="{{ route('student-offline.project.management') }}">
                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M18.5833 13.1666H3.41667C2.22005 13.1666 1.25 14.1367 1.25 15.3333V18.5833C1.25 19.7799 2.22005 20.75 3.41667 20.75H18.5833C19.78 20.75 20.75 19.7799 20.75 18.5833V15.3333C20.75 14.1367 19.78 13.1666 18.5833 13.1666Z"
                                        stroke="#5D87FF" stroke-width="2"/>
                                    <path
                                        d="M8.83333 1.79163H3.41667C2.84203 1.79163 2.29093 2.0199 1.8846 2.42623C1.47827 2.83256 1.25 3.38366 1.25 3.95829V7.20829C1.25 7.78293 1.47827 8.33403 1.8846 8.74036C2.29093 9.14669 2.84203 9.37496 3.41667 9.37496H8.83333"
                                        stroke="#5D87FF" stroke-width="2" stroke-linecap="round"/>
                                    <path
                                        d="M16.4154 9.91667C18.8086 9.91667 20.7487 7.97657 20.7487 5.58333C20.7487 3.1901 18.8086 1.25 16.4154 1.25C14.0221 1.25 12.082 3.1901 12.082 5.58333C12.082 7.97657 14.0221 9.91667 16.4154 9.91667Z"
                                        stroke="#5D87FF" stroke-width="2"/>
                                    <path
                                        d="M16.418 7.20837C17.3154 7.20837 18.043 6.48084 18.043 5.58337C18.043 4.68591 17.3154 3.95837 16.418 3.95837C15.5205 3.95837 14.793 4.68591 14.793 5.58337C14.793 6.48084 15.5205 7.20837 16.418 7.20837Z"
                                        fill="#5D87FF"/>
                                </svg>
                                Manajemen Progress
                            </a>
                        </li>
                    @endif
                @endauth
{{--                @forelse ($studentTeams as $studentTeam)--}}
{{--                    @if ($studentTeam->hummataskTeam->category_project_id != 1)--}}
{{--                        <li class="sidebar-item px-2">--}}
{{--                            <a href="{{ route('team.show', ['slug' => $studentTeam->hummataskTeam->slug]) }}"--}}
{{--                               class="d-flex align-items-center">--}}
{{--                                <div class="rounded-circle overflow-hidden me-6">--}}
{{--                                    @if($studentTeam->hummataskTeam->image != null && Storage::disk('public')->exists($studentTeam->hummataskTeam->image))--}}
{{--                                        <img src="{{ asset('storage/' . $studentTeam->hummataskTeam->image) }}"--}}
{{--                                             class="rounded-circle card-hover border border-white" width="40"--}}
{{--                                             height="40">--}}
{{--                                    @else--}}
{{--                                        @php--}}
{{--                                            $firstLetter = substr($studentTeam->hummataskTeam->name, 0, 1);--}}
{{--                                            $firstLetter = strtoupper($firstLetter);--}}
{{--                                            $backgroundColors = [--}}
{{--                                                '#ff5722',--}}
{{--                                                '#4caf50',--}}
{{--                                                '#2196f3',--}}
{{--                                            ];--}}
{{--                                            $backgroundColor = $backgroundColors[ord($firstLetter) % count($backgroundColors)];--}}
{{--                                        @endphp--}}
{{--                                        <div--}}
{{--                                            style="background-color: {{ $backgroundColor }}; width: 40px; height: 40px; border-radius: 50%; display: flex; justify-content: center; align-items: center;">--}}
{{--                                            <span style="color: white; font-size: 15px;">{{ $firstLetter }}</span>--}}
{{--                                        </div>--}}
{{--                                    @endif--}}
{{--                                </div>--}}
{{--                                <div class="d-inline-block">--}}
{{--                                    <h6 class="mb-1 bg-hover-primary">{{ $studentTeam->hummataskTeam->name }} </h6>--}}
{{--                                    <div class="tb-section-2 mt-2">--}}
{{--                                        @if ($studentTeam->project_id)--}}
{{--                                            <span--}}
{{--                                                class="bg-{{ $studentTeam->hummataskTeam->status->color() }} px-2  text-bg-{{ $studentTeam->hummataskTeam->status->color() }} fs-2 text-capitalize rounded-1 pb-1">{{ $studentTeam->hummataskTeam->status->label() }}</span>--}}
{{--                                        @else--}}
{{--                                            <span--}}
{{--                                                class="bg-warning px-2  text-bg-warning fs-2 text-capitalize rounded-1 pb-1">Belum aktif</span>--}}
{{--                                        @endif--}}
{{--                                        <span--}}
{{--                                            class="bg-primary px-2  text-bg-primary fs-2 rounded-1 pb-1">{{ $studentTeam->hummataskTeam->categoryProject->name }}</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    @endif--}}
{{--                @empty--}}

{{--                @endforelse--}}
{{--                @forelse ($hummataskTeams as $hummatas  kTeam)--}}
{{--                    <li class="sidebar-item px-2">--}}
{{--                        <a href="{{ route('team.show', ['slug' => $hummataskTeam->slug]) }}"--}}
{{--                           class="d-flex align-items-center">--}}
{{--                            <div class="rounded-circle overflow-hidden me-6">--}}
{{--                                @if($hummataskTeam->image != null && Storage::disk('public')->exists($hummataskTeam->image))--}}
{{--                                    <img src="{{ asset('storage/' . $hummataskTeam->image) }}"--}}
{{--                                         class="rounded-circle card-hover border border-white" width="40"--}}
{{--                                         height="40">--}}
{{--                                @else--}}
{{--                                    @php--}}
{{--                                        $firstLetter = substr($hummataskTeam->name, 0, 1);--}}
{{--                                        $firstLetter = strtoupper($firstLetter);--}}
{{--                                        $backgroundColors = [--}}
{{--                                            '#ff5722',--}}
{{--                                            '#4caf50',--}}
{{--                                            '#2196f3',--}}
{{--                                        ];--}}
{{--                                        $backgroundColor = $backgroundColors[ord($firstLetter) % count($backgroundColors)];--}}
{{--                                    @endphp--}}
{{--                                    <div--}}
{{--                                        style="background-color: {{ $backgroundColor }}; width: 40px; height: 40px; border-radius: 50%; display: flex; justify-content: center; align-items: center;">--}}
{{--                                        <span style="color: white; font-size: 15px;">{{ $firstLetter }}</span>--}}
{{--                                    </div>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                            <div class="d-inline-block">--}}
{{--                                <h6 class="mb-1 bg-hover-primary">{{ $hummataskTeam->name }}</h6>--}}
{{--                                <div class="tb-section-2 mt-2">--}}
{{--                                    <span--}}
{{--                                        class="bg-{{ $hummataskTeam->status->color()  }} px-2  text-bg-{{ $hummataskTeam->status->color() }} fs-2 text-capitalize rounded-1 pb-1">{{  $hummataskTeam->status->label() }}</span>--}}
{{--                                    <span--}}
{{--                                        class="bg-primary px-2  text-bg-primary fs-2 rounded-1 pb-1">{{ $hummataskTeam->categoryProject->name }}</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                @empty--}}

{{--                @endforelse--}}
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
</aside>
