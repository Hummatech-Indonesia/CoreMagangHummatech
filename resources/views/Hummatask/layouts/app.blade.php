<!DOCTYPE html>
<html lang="en">

{{--  <!-- Mirrored from demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/html/horizontal/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 21 Mar 2024 02:26:30 GMT -->  --}}

<head>
    <title>{{ env('APP_NAME') }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="handheldfriendly" content="true" />
    <meta name="MobileOptimized" content="width" />
    <meta name="description" content="Mordenize" />
    <meta name="author" content="" />
    <meta name="keywords" content="Mordenize" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Favicon -->
    <link type="image/png" href="{{ asset('mobilelogo.png') }}" rel="shortcut icon" />
    <!-- Owl Carousel -->
    <link href="{{ asset('assets-user/dist/libs/owl.carousel/dist/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <!-- Core Css -->
    <link id="themeColors" href="{{ asset('assets-user/dist/css/style.min.css') }}" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/fixedcolumns/5.0.3/css/fixedColumns.dataTables.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/select/2.1.0/css/select.dataTables.css" rel="stylesheet">
    @yield('style')
</head>

<body>
    <!-- Preloader -->
    <!-- Preloader -->
    <div class="preloader">
        <img class="lds-ripple" src="{{ asset('preloader.png') }}" alt="loader" style="width:150px" />
    </div>
    <!-- Preloader -->
    <div class="preloader">
        <img class="lds-ripple" src="{{ asset('preloader.png') }}" alt="loader" style="width:150px" />
    </div>
    <!-- Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="horizontal" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Header Start -->
        @include('Hummatask.layouts.header')
        <!-- Header End -->
        <!-- Sidebar Start -->
        @yield('sidebar')
        <!-- Sidebar End -->
        <!-- Main wrapper -->
        <div class="body-wrapper">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
        <div class="dark-transparent sidebartoggler"></div>
    </div>

    <!--  Mobilenavbar -->
    <div class="offcanvas offcanvas-start" id="mobilenavbar" data-bs-scroll="true"
        aria-labelledby="offcanvasWithBothOptionsLabel" tabindex="-1">
        <nav class="sidebar-nav scroll-sidebar">
            <div class="offcanvas-header justify-content-between">
                <img class="img-fluid"
                    src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/logos/favicon.ico"
                    alt="">
                <button class="btn-close" data-bs-dismiss="offcanvas" type="button" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body profile-dropdown mobile-navbar" data-simplebar="" data-simplebar>
                <ul id="sidebarnav">
                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                            <span>
                                <i class="ti ti-apps"></i>
                            </span>
                            <span class="hide-menu">Apps</span>
                        </a>
                        <ul class="first-level collapse my-3" aria-expanded="false">
                            <li class="sidebar-item py-2">
                                <a class="d-flex align-items-center" href="#">
                                    <div
                                        class="bg-light rounded-1 d-flex align-items-center justify-content-center me-3 p-6">
                                        <img class="img-fluid"
                                            src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-dd-chat.svg"
                                            alt="" width="24" height="24">
                                    </div>
                                    <div class="d-inline-block">
                                        <h6 class="bg-hover-primary mb-1">Chat Application</h6>
                                        <span class="fs-2 d-block fw-normal text-muted">New messages arrived</span>
                                    </div>
                                </a>
                            </li>
                            <li class="sidebar-item py-2">
                                <a class="d-flex align-items-center" href="#">
                                    <div
                                        class="bg-light rounded-1 d-flex align-items-center justify-content-center me-3 p-6">
                                        <img class="img-fluid"
                                            src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-dd-invoice.svg"
                                            alt="" width="24" height="24">
                                    </div>
                                    <div class="d-inline-block">
                                        <h6 class="bg-hover-primary mb-1">Invoice App</h6>
                                        <span class="fs-2 d-block fw-normal text-muted">Get latest invoice</span>
                                    </div>
                                </a>
                            </li>
                            <li class="sidebar-item py-2">
                                <a class="d-flex align-items-center" href="#">
                                    <div
                                        class="bg-light rounded-1 d-flex align-items-center justify-content-center me-3 p-6">
                                        <img class="img-fluid"
                                            src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-dd-mobile.svg"
                                            alt="" width="24" height="24">
                                    </div>
                                    <div class="d-inline-block">
                                        <h6 class="bg-hover-primary mb-1">Contact Application</h6>
                                        <span class="fs-2 d-block fw-normal text-muted">2 Unsaved Contacts</span>
                                    </div>
                                </a>
                            </li>
                            <li class="sidebar-item py-2">
                                <a class="d-flex align-items-center" href="#">
                                    <div
                                        class="bg-light rounded-1 d-flex align-items-center justify-content-center me-3 p-6">
                                        <img class="img-fluid"
                                            src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-dd-message-box.svg"
                                            alt="" width="24" height="24">
                                    </div>
                                    <div class="d-inline-block">
                                        <h6 class="bg-hover-primary mb-1">Email App</h6>
                                        <span class="fs-2 d-block fw-normal text-muted">Get new emails</span>
                                    </div>
                                </a>
                            </li>
                            <li class="sidebar-item py-2">
                                <a class="d-flex align-items-center" href="#">
                                    <div
                                        class="bg-light rounded-1 d-flex align-items-center justify-content-center me-3 p-6">
                                        <img class="img-fluid"
                                            src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-dd-cart.svg"
                                            alt="" width="24" height="24">
                                    </div>
                                    <div class="d-inline-block">
                                        <h6 class="bg-hover-primary mb-1">User Profile</h6>
                                        <span class="fs-2 d-block fw-normal text-muted">learn more information</span>
                                    </div>
                                </a>
                            </li>
                            <li class="sidebar-item py-2">
                                <a class="d-flex align-items-center" href="#">
                                    <div
                                        class="bg-light rounded-1 d-flex align-items-center justify-content-center me-3 p-6">
                                        <img class="img-fluid"
                                            src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-dd-date.svg"
                                            alt="" width="24" height="24">
                                    </div>
                                    <div class="d-inline-block">
                                        <h6 class="bg-hover-primary mb-1">Calendar App</h6>
                                        <span class="fs-2 d-block fw-normal text-muted">Get dates</span>
                                    </div>
                                </a>
                            </li>
                            <li class="sidebar-item py-2">
                                <a class="d-flex align-items-center" href="#">
                                    <div
                                        class="bg-light rounded-1 d-flex align-items-center justify-content-center me-3 p-6">
                                        <img class="img-fluid"
                                            src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-dd-lifebuoy.svg"
                                            alt="" width="24" height="24">
                                    </div>
                                    <div class="d-inline-block">
                                        <h6 class="bg-hover-primary mb-1">Contact List Table</h6>
                                        <span class="fs-2 d-block fw-normal text-muted">Add new contact</span>
                                    </div>
                                </a>
                            </li>
                            <li class="sidebar-item py-2">
                                <a class="d-flex align-items-center" href="#">
                                    <div
                                        class="bg-light rounded-1 d-flex align-items-center justify-content-center me-3 p-6">
                                        <img class="img-fluid"
                                            src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-dd-application.svg"
                                            alt="" width="24" height="24">
                                    </div>
                                    <div class="d-inline-block">
                                        <h6 class="bg-hover-primary mb-1">Notes Application</h6>
                                        <span class="fs-2 d-block fw-normal text-muted">To-do and Daily tasks</span>
                                    </div>
                                </a>
                            </li>
                            <ul class="mb-4 mt-7 px-8">
                                <li class="sidebar-item mb-3">
                                    <h5 class="fs-5 fw-semibold">Quick Links</h5>
                                </li>
                                <li class="sidebar-item py-2">
                                    <a class="fw-semibold text-dark" href="#">Pricing Page</a>
                                </li>
                                <li class="sidebar-item py-2">
                                    <a class="fw-semibold text-dark" href="#">Authentication Design</a>
                                </li>
                                <li class="sidebar-item py-2">
                                    <a class="fw-semibold text-dark" href="#">Register Now</a>
                                </li>
                                <li class="sidebar-item py-2">
                                    <a class="fw-semibold text-dark" href="#">404 Error Page</a>
                                </li>
                                <li class="sidebar-item py-2">
                                    <a class="fw-semibold text-dark" href="#">Notes App</a>
                                </li>
                                <li class="sidebar-item py-2">
                                    <a class="fw-semibold text-dark" href="#">User Application</a>
                                </li>
                                <li class="sidebar-item py-2">
                                    <a class="fw-semibold text-dark" href="#">Account Settings</a>
                                </li>
                            </ul>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="app-chat.html" aria-expanded="false">
                            <span>
                                <i class="ti ti-message-dots"></i>
                            </span>
                            <span class="hide-menu">Chat</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="app-calendar.html" aria-expanded="false">
                            <span>
                                <i class="ti ti-calendar"></i>
                            </span>
                            <span class="hide-menu">Calendar</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="app-email.html" aria-expanded="false">
                            <span>
                                <i class="ti ti-mail"></i>
                            </span>
                            <span class="hide-menu">Email</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <!--  Search Bar -->
    <div class="modal fade" id="exampleModal" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content rounded-1">
                <div class="modal-header border-bottom">
                    <input class="form-control fs-3" id="search" type="search" placeholder="Search here" />
                    <span class="lh-1 cursor-pointer" data-bs-dismiss="modal">
                        <i class="ti ti-x fs-5 ms-3"></i>
                    </span>
                </div>
                <div class="modal-body message-body" data-simplebar="">
                    <h5 class="fs-5 mb-0 p-1">Quick Page Links</h5>
                    <ul class="list mb-0 py-2">
                        <li class="bg-hover-light-black mb-1 p-1">
                            <a href="#">
                                <span class="fs-3 fw-normal d-block text-black">Modern</span>
                                <span class="fs-3 text-muted d-block">/dashboards/dashboard1</span>
                            </a>
                        </li>
                        <li class="bg-hover-light-black mb-1 p-1">
                            <a href="#">
                                <span class="fs-3 fw-normal d-block text-black">Dashboard</span>
                                <span class="fs-3 text-muted d-block">/dashboards/dashboard2</span>
                            </a>
                        </li>
                        <li class="bg-hover-light-black mb-1 p-1">
                            <a href="#">
                                <span class="fs-3 fw-normal d-block text-black">Contacts</span>
                                <span class="fs-3 text-muted d-block">/apps/contacts</span>
                            </a>
                        </li>
                        <li class="bg-hover-light-black mb-1 p-1">
                            <a href="#">
                                <span class="fs-3 fw-normal d-block text-black">Posts</span>
                                <span class="fs-3 text-muted d-block">/apps/blog/posts</span>
                            </a>
                        </li>
                        <li class="bg-hover-light-black mb-1 p-1">
                            <a href="#">
                                <span class="fs-3 fw-normal d-block text-black">Detail</span>
                                <span
                                    class="fs-3 text-muted d-block">/apps/blog/detail/streaming-video-way-before-it-was-cool-go-dark-tomorrow</span>
                            </a>
                        </li>
                        <li class="bg-hover-light-black mb-1 p-1">
                            <a href="#">
                                <span class="fs-3 fw-normal d-block text-black">Shop</span>
                                <span class="fs-3 text-muted d-block">/apps/ecommerce/shop</span>
                            </a>
                        </li>
                        <li class="bg-hover-light-black mb-1 p-1">
                            <a href="#">
                                <span class="fs-3 fw-normal d-block text-black">Modern</span>
                                <span class="fs-3 text-muted d-block">/dashboards/dashboard1</span>
                            </a>
                        </li>
                        <li class="bg-hover-light-black mb-1 p-1">
                            <a href="#">
                                <span class="fs-3 fw-normal d-block text-black">Dashboard</span>
                                <span class="fs-3 text-muted d-block">/dashboards/dashboard2</span>
                            </a>
                        </li>
                        <li class="bg-hover-light-black mb-1 p-1">
                            <a href="#">
                                <span class="fs-3 fw-normal d-block text-black">Contacts</span>
                                <span class="fs-3 text-muted d-block">/apps/contacts</span>
                            </a>
                        </li>
                        <li class="bg-hover-light-black mb-1 p-1">
                            <a href="#">
                                <span class="fs-3 fw-normal d-block text-black">Posts</span>
                                <span class="fs-3 text-muted d-block">/apps/blog/posts</span>
                            </a>
                        </li>
                        <li class="bg-hover-light-black mb-1 p-1">
                            <a href="#">
                                <span class="fs-3 fw-normal d-block text-black">Detail</span>
                                <span
                                    class="fs-3 text-muted d-block">/apps/blog/detail/streaming-video-way-before-it-was-cool-go-dark-tomorrow</span>
                            </a>
                        </li>
                        <li class="bg-hover-light-black mb-1 p-1">
                            <a href="#">
                                <span class="fs-3 fw-normal d-block text-black">Shop</span>
                                <span class="fs-3 text-muted d-block">/apps/ecommerce/shop</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--  Customizer -->
    {{-- <button class="btn btn-primary p-3 rounded-circle d-flex align-items-center justify-content-center customizer-btn"
        type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample"
        aria-controls="offcanvasExample">
        <i class="ti ti-settings fs-7" data-bs-toggle="tooltip" data-bs-placement="top"
            data-bs-title="Settings"></i>
    </button> --}}
    <div class="offcanvas offcanvas-end customizer" id="offcanvasExample" data-simplebar=""
        aria-labelledby="offcanvasExampleLabel" tabindex="-1">
        <div class="d-flex align-items-center justify-content-between border-bottom p-3">
            <h4 class="offcanvas-title fw-semibold" id="offcanvasExampleLabel">Settings</h4>
            <button class="btn-close" data-bs-dismiss="offcanvas" type="button" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body p-4">
            <div class="theme-option pb-4">
                <h6 class="fw-semibold fs-4 mb-1">Theme Option</h6>
                <div class="d-flex align-items-center my-3 gap-3">
                    <a class="rounded-2 customizer-box hover-img d-flex align-items-center light-theme text-dark gap-2 p-9"
                        href="javascript:void(0)" onclick="toggleTheme('../../dist/css/style.min.css')">
                        <i class="ti ti-brightness-up fs-7 text-primary"></i>
                        <span class="text-dark">Light</span>
                    </a>
                    <a class="rounded-2 customizer-box hover-img d-flex align-items-center dark-theme text-dark gap-2 p-9"
                        href="javascript:void(0)" onclick="toggleTheme('../../dist/css/style-dark.min.css')">
                        <i class="ti ti-moon fs-7"></i>
                        <span class="text-dark">Dark</span>
                    </a>
                </div>
            </div>
            <div class="theme-direction pb-4">
                <h6 class="fw-semibold fs-4 mb-1">Theme Direction</h6>
                <div class="d-flex align-items-center my-3 gap-3">
                    <a class="rounded-2 customizer-box hover-img d-flex align-items-center gap-2 p-9"
                        href="javascript:void(0)">
                        <i class="ti ti-text-direction-ltr fs-6 text-primary"></i>
                        <span class="text-dark">LTR</span>
                    </a>
                    <a class="rounded-2 customizer-box hover-img d-flex align-items-center gap-2 p-9"
                        href="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/html/rtl/index.html">
                        <i class="ti ti-text-direction-rtl fs-6 text-dark"></i>
                        <span class="text-dark">RTL</span>
                    </a>
                </div>
            </div>
            <div class="theme-colors pb-4">
                <h6 class="fw-semibold fs-4 mb-1">Theme Colors</h6>
                <div class="d-flex align-items-center my-3 gap-3">
                    <ul class="list-unstyled d-flex change-colors mb-0 flex-wrap gap-3">
                        <li
                            class="rounded-2 customizer-box hover-img d-flex align-items-center justify-content-center p-9">
                            <a class="rounded-circle position-relative d-block customizer-bgcolor skin1-bluetheme-primary active-theme"
                                data-color="blue_theme" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-title="BLUE_THEME" href="javascript:void(0)"
                                onclick="toggleTheme('../../dist/css/style.min.css')"><i
                                    class="ti ti-check d-flex align-items-center justify-content-center fs-5 text-white"></i></a>
                        </li>
                        <li
                            class="rounded-2 customizer-box hover-img d-flex align-items-center justify-content-center p-9">
                            <a class="rounded-circle position-relative d-block customizer-bgcolor skin2-aquatheme-primary"
                                data-color="aqua_theme" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-title="AQUA_THEME" href="javascript:void(0)"
                                onclick="toggleTheme('../../dist/css/style-aqua.min.css')"><i
                                    class="ti ti-check d-flex align-items-center justify-content-center fs-5 text-white"></i></a>
                        </li>
                        <li
                            class="rounded-2 customizer-box hover-img d-flex align-items-center justify-content-center p-9">
                            <a class="rounded-circle position-relative d-block customizer-bgcolor skin3-purpletheme-primary"
                                data-color="purple_theme" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-title="PURPLE_THEME" href="javascript:void(0)"
                                onclick="toggleTheme('../../dist/css/style-purple.min.css')"><i
                                    class="ti ti-check d-flex align-items-center justify-content-center fs-5 text-white"></i></a>
                        </li>
                        <li
                            class="rounded-2 customizer-box hover-img d-flex align-items-center justify-content-center p-9">
                            <a class="rounded-circle position-relative d-block customizer-bgcolor skin4-greentheme-primary"
                                data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="GREEN_THEME"
                                href="javascript:void(0)"
                                onclick="toggleTheme('../../dist/css/style-green.min.css')"><i
                                    class="ti ti-check d-flex align-items-center justify-content-center fs-5 text-white"></i></a>
                        </li>
                        <li
                            class="rounded-2 customizer-box hover-img d-flex align-items-center justify-content-center p-9">
                            <a class="rounded-circle position-relative d-block customizer-bgcolor skin5-cyantheme-primary"
                                data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="CYAN_THEME"
                                href="javascript:void(0)"
                                onclick="toggleTheme('../../dist/css/style-cyan.min.css')"><i
                                    class="ti ti-check d-flex align-items-center justify-content-center fs-5 text-white"></i></a>
                        </li>
                        <li
                            class="rounded-2 customizer-box hover-img d-flex align-items-center justify-content-center p-9">
                            <a class="rounded-circle position-relative d-block customizer-bgcolor skin6-orangetheme-primary"
                                data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="ORANGE_THEME"
                                href="javascript:void(0)"
                                onclick="toggleTheme('../../dist/css/style-orange.min.css')"><i
                                    class="ti ti-check d-flex align-items-center justify-content-center fs-5 text-white"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="layout-type pb-4">
                <h6 class="fw-semibold fs-4 mb-1">Layout Type</h6>
                <div class="d-flex align-items-center my-3 gap-3">
                    <a class="rounded-2 customizer-box hover-img d-flex align-items-center gap-2 p-9"
                        href="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/html/main/index.html">
                        <i class="ti ti-layout-sidebar text-dark fs-6"></i>
                        <span class="text-dark">Vertical</span>
                    </a>
                    <a class="rounded-2 customizer-box hover-img d-flex align-items-center gap-2 p-9"
                        href="index.html">
                        <i class="ti ti-layout-navbar fs-6 text-primary"></i>
                        <span class="text-dark">Horizontal</span>
                    </a>
                </div>
            </div>
            <div class="container-option pb-4">
                <h6 class="fw-semibold fs-4 mb-1">Container Option</h6>
                <div class="d-flex align-items-center my-3 gap-3">
                    <a class="rounded-2 customizer-box hover-img d-flex align-items-center boxed-width text-dark gap-2 p-9"
                        href="javascript:void(0)">
                        <i class="ti ti-layout-distribute-vertical fs-7 text-primary"></i>
                        <span class="text-dark">Boxed</span>
                    </a>
                    <a class="rounded-2 customizer-box hover-img d-flex align-items-center full-width text-dark gap-2 p-9"
                        href="javascript:void(0)">
                        <i class="ti ti-layout-distribute-horizontal fs-7"></i>
                        <span class="text-dark">Full</span>
                    </a>
                </div>
            </div>
            <div class="card-with pb-4">
                <h6 class="fw-semibold fs-4 mb-1">Card With</h6>
                <div class="d-flex align-items-center my-3 gap-3">
                    <a class="rounded-2 customizer-box hover-img d-flex align-items-center text-dark cardborder gap-2 p-9"
                        href="javascript:void(0)">
                        <i class="ti ti-border-outer fs-7"></i>
                        <span class="text-dark">Border</span>
                    </a>
                    <a class="rounded-2 customizer-box hover-img d-flex align-items-center cardshadow gap-2 p-9"
                        href="javascript:void(0)">
                        <i class="ti ti-border-none fs-7"></i>
                        <span class="text-dark">Shadow</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Customizer -->

    <!-- Import Js Files -->
    <script src="{{ asset('assets-user/dist/libs/simplebar/dist/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets-user/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!--  core files -->
    <script src="{{ asset('assets-user/dist/js/app.min.js') }}"></script>
    <script src="{{ asset('assets-user/dist/js/app.init.js') }}"></script>
    <script src="{{ asset('assets-user/dist/js/app-style-switcher.js') }}"></script>
    <script src="{{ asset('assets-user/dist/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('assets-user/dist/js/custom.js') }}"></script>
    <!--  current page js files -->
    <script src="{{ asset('assets-user/dist/libs/owl.carousel/dist/owl.carousel.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="{{ asset('assets-user/dist/js/dashboard.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
    <script>
        @if (session('success'))
            iziToast.success({
                title: 'Success',
                message: "{{ session('success') }}",
                position: 'topRight'
            });
        @endif
        @if (session('error'))
            iziToast.error({
                title: 'Error',
                message: "{{ session('error') }}",
                position: 'topRight'
            });
        @endif
        @if (session('warning'))
            iziToast.warning({
                title: 'Information',
                message: "{{ session('warning') }}",
                position: 'topRight'
            });
        @endif
    </script>
    @yield('script')
</body>

</html>
