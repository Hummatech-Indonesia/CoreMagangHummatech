<header class="app-header">
    <nav class="navbar navbar-expand-xl navbar-light container-fluid px-0">
        <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
                <a class="nav-link sidebartoggler ms-n3" id="sidebarCollapse" href="javascript:void(0)">
                    <i class="ti ti-menu-2"></i>
                </a>
            </li>
            <li class="nav-item d-none d-xl-block">
                <a href="javascript:void(0)" class="text-nowrap nav-link">
                    <img src="{{ asset('logopkldark.png') }}" class="dark-logo" width="200" alt="" />
                    <img src="{{ asset('logopkldark.png') }}" class="light-logo" width="200" alt="" />
                </a>
            </li>
        </ul>
        <div class="d-block d-xl-none">
            <a href="javascript:void(0)" class="text-nowrap nav-link">
                <img src="{{ asset('logopkldark.png') }}"
                    width="180" alt="" />
            </a>
        </div>
        <button class="navbar-toggler p-0 border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="p-2">
                <i class="ti ti-dots fs-7"></i>
            </span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <div class="d-flex align-items-center justify-content-between px-0 px-xl-8">
                <a href="javascript:void(0)"
                    class="nav-link round-40 p-1 ps-0 d-flex d-xl-none align-items-center justify-content-center"
                    type="button" data-bs-toggle="offcanvas" data-bs-target="#mobilenavbar"
                    aria-controls="offcanvasWithBothOptions">
                    {{-- <i class="ti ti-align-justified fs-7"></i> --}}
                </a>
                <style>
                    .myElement {
                        background: linear-gradient(to right, #ffffff,  rgba(200, 200, 200, 0.5));
                    }
                </style>
                <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
                    <li class="nav-item">
                        <a href="/login">
                            <div class="myElement py-1 px-2 rounded" >
                                <div class="d-flex gap-3">
                                    <div class="mt-2">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M19 12H5M5 12L9 16M5 12L9 8" stroke="#2A3547" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                    <div class="mt-2">
                                        Magang.hummatech
                                    </div>
                                    <div class="">
                                        <svg width="37" height="37" viewBox="0 0 37 37" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="18.5" cy="18.5" r="18.5" transform="matrix(-1 0 0 1 37 0)"
                                            fill="#5D87FF" />
                                            <path
                                            d="M18.0358 11.058C16.5923 11.2336 15.224 11.7993 14.078 12.6943C12.9319 13.5893 12.0515 14.7797 11.5313 16.1376C11.0112 17.4955 10.8709 18.9695 11.1257 20.4011C11.3805 21.8327 12.0206 23.1678 12.9773 24.2629C13.934 25.3579 15.1711 26.1715 16.5556 26.6162C17.94 27.0609 19.4195 27.1198 20.8349 26.7866C22.2503 26.4534 23.5482 25.7408 24.589 24.7253C25.6297 23.7098 26.374 22.4298 26.7418 21.023M19 27V16L11.5 20M24.4994 9.00001C25.1625 9.00001 25.7983 9.2634 26.2672 9.73224C26.736 10.2011 26.9994 10.837 26.9994 11.5C26.9994 12.163 26.736 12.7989 26.2672 13.2678C25.7983 13.7366 25.1625 14 24.4994 14L13.4994 9.00001C12.894 8.99873 12.3087 9.21718 11.8522 9.61479C11.3957 10.0124 11.099 10.5622 11.0171 11.162C10.9353 11.7618 11.0738 12.371 11.4071 12.8764C11.7404 13.3818 12.2458 13.749 12.8294 13.91M16 18V26M23.0002 19H22.9902"
                                            stroke="white" stroke-width="1.7" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link pe-0" href="javascript:void(0)" id="drop1" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <div class="d-flex align-items-center">
                                <div class="user-profile-img">
                                    @if (auth()->user()->student && !empty(auth()->user()->student->avatar))
                                        @php
                                            $avatarPath = 'storage/' . auth()->user()->student->avatar;
                                            $avatarExists = file_exists(public_path($avatarPath));
                                        @endphp

                                        @if ($avatarExists)
                                            <img src="{{ asset($avatarPath) }}" class="rounded-circle" width="35"
                                                height="35" alt="" />
                                        @else
                                            <img src="{{ asset('user.webp') }}" class="rounded-circle" width="35"
                                                height="35" alt="" />
                                        @endif
                                    @else
                                        <img src="{{ asset('user.webp') }}" class="rounded-circle" width="35"
                                            height="35" alt="" />
                                    @endif
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up"
                            aria-labelledby="drop1">
                            <div class="profile-dropdown position-relative" data-simplebar>
                                <div class="py-3 px-7 pb-0">
                                    <h5 class="mb-0 fs-5 fw-semibold">User Profile</h5>
                                </div>
                                <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                                    @if (auth()->user()->student && !empty(auth()->user()->student->avatar))
                                        @php
                                            $avatarPath = 'storage/' . auth()->user()->student->avatar;
                                            $avatarExists = file_exists(public_path($avatarPath));
                                        @endphp

                                        @if ($avatarExists)
                                            <img src="{{ asset($avatarPath) }}" class="rounded-circle" width="80"
                                                height="80" alt="" />
                                        @else
                                            <img src="{{ asset('user.webp') }}" class="rounded-circle" width="80"
                                                height="80" alt="" />
                                        @endif
                                    @else
                                        <img src="{{ asset('user.webp') }}" class="rounded-circle" width="80"
                                            height="80" alt="" />
                                    @endif
                                    <div class="ms-3">
                                        <span cla <div class="ms-3">
                                            <h5 class="mb-1 fs-3">{{ auth()->user()->student->name }}</h5>
                                            <span
                                                class="mb-1 d-block text-dark">{{ auth()->user()->student->division->name }}</span>
                                            <p class="mb-0 d-flex text-dark align-items-center gap-2">
                                                <i class="ti ti-mail fs-4"></i> {{ auth()->user()->student->email }}
                                            </p>
                                    </div>
                                </div>
                                <div class="d-grid py-4 px-7 pt-8">
                                    <a class="btn btn-outline-primary" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                                        <i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i>
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
