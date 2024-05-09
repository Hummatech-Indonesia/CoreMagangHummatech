<header class="th-header header-layout2">
    <div class="header-top">
        <div class="container">
            <div class="row justify-content-center justify-content-lg-between align-items-center gy-2">
                <div class="col-auto d-none d-lg-block">
                    <div class="header-links">
                        <ul>
                            <li>
                                <a target="_blank" href="https://maps.app.goo.gl/cnQBvsG4PNj6NBLN8" class="px-2 text-white">
                                    <i class="fas fa-map-location"></i> &nbsp; Perum Permata Regency 1, Blk. 10 No.28, Perun Gpa
                                </a>
                            </li>
                            <li><i class="fas fa-phone"></i><a href="https://wa.me/+6285176777785" target="_blank">085176777785</a></li>
                            <li><i class="fas fa-envelope"></i><a href="mailto:info@hummatech.com">info@hummatech.com</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="header-social"><span class="social-title">Follow Us On : </span><a
                            href="https://www.facebook.com/hummatech" target="_blank"><i class="fab fa-facebook-f"></i></a> <a
                            href="https://www.twitter.com/hummatech" target="_blank"><i class="fab fa-twitter"></i></a> <a
                            href="https://www.linkedin.com/company/cv-hummasoft-komputindo/" target="_blank"><i class="fab fa-linkedin-in"></i></a> <a
                            href="https://www.instagram.com/hummatech" target="_blank"><i class="fab fa-instagram"></i></a> <a
                            href="https://www.youtube.com/@hummatech" target="_blank"><i class="fab fa-youtube"></i></a></div>
                </div>
            </div>
        </div>
    </div>
    <div class="sticky-wrapper">
        <div class="menu-area">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto">
                        <div class="header-logo"><a class="icon-masking" href="javascript:void(0)"><span
                                    data-mask-src="{{ asset('logopkldark.png') }}" class="mask-icon"></span><img
                                    src="{{ asset('logopkldark.png') }}" alt="{{ env('APP_NAME') }}" width="250px"></a>
                        </div>
                    </div>
                    <div class="col-auto">
                        <nav class="main-menu d-none d-lg-inline-block">
                            <ul>
                                <li><a href="/">Beranda</a></li>
                                <li><a href="javscript:void(0)">Tentang Kami</a></li>
                                <li><a href="javscript:void(0)">Team</a></li>
                                <li><a href="javscript:void(0)">Hubungi kami</a></li>
                                <li><a href="javscript:void(0)">Galeri</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-auto">
                        <div class="d-block d-lg-inline-block">
                                <a href="/login" class="th-btn shadow-none">{{(auth()->check()) ? 'Home' : 'Login'}}<i class="fas fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                    {{-- <div class="col-auto px-5 d-none d-lg-block">
                        <div class="header-button">
                             <a href="/login" class="th-btn shadow-none">{{(auth()->check()) ? 'Home' : 'Login'}}<i class="fas fa-arrow-right ms-2"></i></a>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</header>
