@extends('landing.layouts.app')
@section('content')
    <div class="th-hero-wrapper hero-1" id="hero">
        <div class="hero-img tilt-active"><img src="assets_landing/img/hero/hero_img_1_1.png" alt="Hero Image"></div>
        <div class="container">
            <div class="hero-style1"><span class="hero-subtitle">Solusi meningkatkan skill</span>
                <h1 class="hero-title">Membentuk Masa Depan</h1>
                <h1 class="hero-title"><span class="text-theme fw-medium">Pkl Di Hummatech</span></h1>
                <p class="hero-text">Dengan fokus pada peningkatan kualitas, pengembangan keterampilan, dan pemberdayaan,
                    Hummatech berupaya menciptakan lingkungan yang kondusif bagi PKL untuk tumbuh dan berkembang.</p>
                <div class="btn-group"><a href="/register" class="th-btn">Daftar<i
                            class="fa-regular fa-arrow-right ms-2"></i></a>
                </div>
            </div>
        </div>
        <div class="hero-shape1"><img src="assets_landing/img/hero/hero_shape_1_1.svg" alt="shape"></div>
        <div class="hero-shape2"><img src="assets_landing/img/hero/hero_shape_1_2.svg" alt="shape"></div>
        <div class="hero-shape3"><img src="assets_landing/img/hero/hero_shape_1_3.svg" alt="shape"></div>
    </div>
    {{-- <section class="about-sec-v4 space-bottom">
        <div class="container">
            <div class="row gy-4 justify-content-center">
                @foreach ($divisions as $division)
                    <div class="col-xl-3 col-md-6">
                        <div class="feature-card">
                            <div class="shape-icon">
                                <?php
                                $icons = ['assets_landing/img/icon/feature_card_1.png', 'assets_landing/img/icon/feature_card_2.png', 'assets_landing/img/icon/feature_card_3.png'];
                                $randomIcon = $icons[array_rand($icons)];
                                ?>
                                <img src="{{ $randomIcon }}" alt="icon">
                            </div>
                            <h3 class="box-title">{{ $division->name }}</h3>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="container space-top">
            <div class="row align-items-center">
                <div class="col-lg-5 mb-30 mb-lg-0">
                    <div class="img-box6">
                        <div class="img1"><img src="assets_landing/img/normal/about_4_1.png" alt="About"></div>
                        <div class="shape1"><img src="assets_landing/img/normal/about_4_2.png" alt="About"></div>
                        <div class="shape2"><img src="assets_landing/img/normal/about_4_3.png" alt="About"></div>
                        <div class="color-animate"></div>
                    </div>
                </div>
                <div class="col-lg-7 text-lg-start text-center">
                    <div class="ps-xxl-5">
                        <div class="title-area mb-35"><span class="sub-title">About Company</span>
                            <h2 class="sec-title">We've Been Thriving for 25 Years.</h2>
                        </div>
                        <p class="mt-n2 mb-25">Continually harness backward-compatible initiatives and synergistic
                            content. Objectively strategize cutting edge niches with collaborative synergy. Globally
                            pontificate e-business processes through orthoonal web readiness enhance backend value.</p>
                        <div class="checklist style4 mb-40 list-center">
                            <ul>
                                <li><img src="assets_landing/img/icon/check_1.png" alt="icon"> Dramatically re-engineer
                                    value
                                    added IT systems via mission</li>
                                <li><img src="assets_landing/img/icon/check_1.png" alt="icon"> Website & Mobile
                                    application
                                    design & Development</li>
                                <li><img src="assets_landing/img/icon/check_1.png" alt="icon"> Professional User
                                    Experince &
                                    Interface researching</li>
                            </ul>
                        </div><a href="about.html" class="th-btn">ABOUT MORE<i
                                class="fa-regular fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <section class="" id="">
        <div class="container-fluid space">
            <div class="container">
                <div class="row gy-40 justify-content-between">
                    <div class="col-4 col-lg-auto">
                        <div class="counter-card">
                            <div class="icon"><img src="assets_landing/img/icon/counter_2_1.png" alt="Icon"></div>
                            <div class="media-body">
                                <h2 class="counter-card_number text-title"><span class="counter-number">986</span></h2>
                                <p class="counter-card_text text-body">Setifkat Di Berikan</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-auto">
                        <div class="counter-card">
                            <div class="icon"><img src="assets_landing/img/icon/counter_2_2.png" alt="Icon"></div>
                            <div class="media-body">
                                <h2 class="counter-card_number text-title"><span class="counter-number">896</span></h2>
                                <p class="counter-card_text text-body">Alumni</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-auto">
                        <div class="counter-card">
                            <div class="icon"><img src="assets_landing/img/icon/counter_2_3.png" alt="Icon"></div>
                            <div class="media-body">
                                <h2 class="counter-card_number text-title"><span class="counter-number">396</span></h2>
                                <p class="counter-card_text text-body">Anak Magang</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-auto">
                        <div class="counter-card">
                            <div class="icon"><img src="assets_landing/img/icon/counter_2_4.png" alt="Icon"></div>
                            <div class="media-body">
                                <h2 class="counter-card_number text-title"><span class="counter-number">496</span></h2>
                                <p class="counter-card_text text-body">Produk Yang Di Hasilkan</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="about-sec-v4 space-bottom">
        <div class="container space-top">
            <div class="row align-items-center">
                <div class="col-lg-5 mb-30 mb-lg-0">
                    <div class="img-box6">
                        <div class="img1"><img src="assets_landing/img/normal/about_4_1.png" alt="About"></div>
                        <div class="shape1"><img src="assets_landing/img/normal/about_4_2.png" alt="About"></div>
                        <div class="shape2"><img src="assets_landing/img/normal/about_4_3.png" alt="About"></div>
                        <div class="color-animate"></div>
                    </div>
                </div>
                <div class="col-lg-7 text-lg-start text-center">
                    <div class="ps-xxl-5">
                        <div class="title-area mb-35"><span class="sub-title">Tentang Kami</span>
                            <h2 class="sec-title">Transformasi Masa Depan di Hummatech.</h2>
                        </div>
                        <p class="mt-n2 mb-25">Melalui berbagai inisiatif, program, dan solusi yang inovatif, Hummatech
                            bertujuan untuk membawa transformasi positif dalam berbagai aspek kehidupan, mulai dari ekonomi
                            hingga teknologi.</p>
                        <div class="checklist style4 mb-40 list-center">
                            <ul>
                                <li><img src="assets_landing/img/icon/check_1.png" alt="icon"> Magang Secara Offline
                                </li>
                                <li><img src="assets_landing/img/icon/check_1.png" alt="icon"> Magang Secara Online</li>
                                <li><img src="assets_landing/img/icon/check_1.png" alt="icon"> Pembelajaran Yang Menarik
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="service-sec space" id="service-sec" data-bg-src="assets_landing/img/bg/service_bg_1.png">
        <div class="container">
            <div class="row justify-content-lg-between justify-content-center align-items-center">
                <div class="col-lg-6 col-sm-9 pe-xl-5">
                    <div class="title-area text-center text-lg-start"><span class="sub-title">
                            <div class="icon-masking me-2"><span class="mask-icon"
                                    data-mask-src="assets/img/theme-img/title_shape_2.svg"></span> <img
                                    src="assets_landing/img/theme-img/title_shape_2.svg" alt="shape"></div>Ada Apa saja
                        </span>
                        <h2 class="sec-title">Kami Mempunyai Berbagai Divisi
                            Untuk <span class="text-theme fw-normal">Mengasah Skill Anda</span></h2>
                    </div>
                </div>
                <div class="col-auto">

                </div>
            </div>
            <div class="slider-area">
                <div class="swiper th-slider has-shadow" id="projectSlider2"
                    data-slider-options='{"loop":true,"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"3"},"1200":{"slidesPerView":"4"}}}'>
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="service-box">
                                <div class="service-box_img"><img src="assets_landing/img/service/service_box_1.jpg"
                                        alt="Icon">
                                </div>
                                <div class="service-box_content">
                                    <div class="service-box_icon"><img src="assets_landing/img/icon/service_box_1.svg"
                                            alt="Icon"></div>
                                    <h3 class="box-title"><a href="service-details.html">Web Development</a></h3>
                                    <p class="service-box_text">Pembelajaran Membuat website yang baik dan benar serta
                                        dinamis.</p>
                                    <div class="bg-shape"><img src="assets_landing/img/bg/service_box_bg.png"
                                            alt="bg">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="service-box">
                                <div class="service-box_img"><img src="assets_landing/img/service/service_box_2.jpg"
                                        alt="Icon">
                                </div>
                                <div class="service-box_content">
                                    <div class="service-box_icon"><img src="assets_landing/img/icon/service_box_2.svg"
                                            alt="Icon"></div>
                                    <h3 class="box-title"><a href="service-details.html">UI/UX Design</a></h3>
                                    <p class="service-box_text">Pembelajaran Tentang Bagaiamana Cara mendesign agar nyaman
                                        dilihat oleh user.</p>
                                    <div class="bg-shape"><img src="assets_landing/img/bg/service_box_bg.png"
                                            alt="bg">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="service-box">
                                <div class="service-box_img"><img src="assets_landing/img/service/service_box_3.jpg"
                                        alt="Icon">
                                </div>
                                <div class="service-box_content">
                                    <div class="service-box_icon"><img src="assets_landing/img/icon/service_box_3.svg"
                                            alt="Icon"></div>
                                    <h3 class="box-title"><a href="service-details.html">Digital Marketing</a></h3>
                                    <p class="service-box_text">praktik pemasaran produk atau layanan menggunakan media
                                        digital .</p>
                                    <div class="bg-shape"><img src="assets_landing/img/bg/service_box_bg.png"
                                            alt="bg">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="service-box">
                                <div class="service-box_img"><img src="assets_landing/img/service/service_box_4.jpg"
                                        alt="Icon">
                                </div>
                                <div class="service-box_content">
                                    <div class="service-box_icon"><img src="assets_landing/img/icon/service_box_4.svg"
                                            alt="Icon"></div>
                                    <h3 class="box-title"><a href="service-details.html">Mobile Development</a></h3>
                                    <p class="service-box_text"> pembelajaran merujuk pada proses pengembangan aplikasi
                                        yang dirancang khusus.</p>
                                    <div class="bg-shape"><img src="assets_landing/img/bg/service_box_bg.png"
                                            alt="bg">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="" id="team-sec">
        <div class="container space">
            <div class="title-area text-center">
                <div class="shadow-title">Team</div><span class="sub-title">
                    <div class="icon-masking me-2"><span class="mask-icon"
                            data-mask-src="assets/img/theme-img/title_shape_2.svg"></span> <img
                            src="assets_landing/img/theme-img/title_shape_2.svg" alt="shape"></div>Team Kami
                </span>
                <h2 class="sec-title">Tim<span class="text-theme">&nbsp; Pkl Hummatech</span></h2>
            </div>
            <div class="slider-area">
                <div class="swiper th-slider has-shadow" id="teamSlider1"
                    data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"2"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"3"},"1200":{"slidesPerView":"3"}}}'>
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="th-team team-grid">
                                <div class="team-img"><img src="{{ asset('team/kader.png') }}" alt="Team">
                                </div>
                                <div class="team-social">
                                    <div class="play-btn"><i class="far fa-plus"></i></div>
                                    <div class="th-social"><a target="_blank" href="https://facebook.com/"><i
                                                class="fab fa-facebook-f"></i></a> <a target="_blank"
                                            href="https://twitter.com/"><i class="fab fa-twitter"></i></a> <a
                                            target="_blank" href="https://instagram.com/"><i
                                                class="fab fa-instagram"></i></a> <a target="_blank"
                                            href="https://linkedin.com/"><i class="fab fa-linkedin-in"></i></a></div>
                                </div>
                                <h3 class="box-title"><a href="javascript:void(0)">Abdul Kader</a></h3><span
                                    class="team-desig">Ketua Tim</span>
                                <div class="box-particle" id="team-p1"></div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="th-team team-grid">
                                <div class="team-img"><img src="{{ asset('team/femas.png') }}" alt="Team">
                                </div>
                                <div class="team-social">
                                    <div class="play-btn"><i class="far fa-plus"></i></div>
                                    <div class="th-social"><a target="_blank" href="https://facebook.com/"><i
                                                class="fab fa-facebook-f"></i></a> <a target="_blank"
                                            href="https://twitter.com/"><i class="fab fa-twitter"></i></a> <a
                                            target="_blank" href="https://instagram.com/"><i
                                                class="fab fa-instagram"></i></a> <a target="_blank"
                                            href="https://linkedin.com/"><i class="fab fa-linkedin-in"></i></a></div>
                                </div>
                                <h3 class="box-title"><a href="javascript:void(0)">Femas Akbar Faturrohim</a></h3><span
                                    class="team-desig">Ketua Mobile Devloper</span>
                                <div class="box-particle" id="team-p2"></div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="th-team team-grid">
                                <div class="team-img"><img src="{{ asset('team/adi.png') }}" alt="Team">
                                </div>
                                <div class="team-social">
                                    <div class="play-btn"><i class="far fa-plus"></i></div>
                                    <div class="th-social"><a target="_blank" href="https://facebook.com/"><i
                                                class="fab fa-facebook-f"></i></a> <a target="_blank"
                                            href="https://twitter.com/"><i class="fab fa-twitter"></i></a> <a
                                            target="_blank" href="https://instagram.com/"><i
                                                class="fab fa-instagram"></i></a> <a target="_blank"
                                            href="https://linkedin.com/"><i class="fab fa-linkedin-in"></i></a></div>
                                </div>
                                <h3 class="box-title"><a href="javascript:void(0)">Amir Zuhdi Wibowo</a></h3><span
                                    class="team-desig">Web Developer</span>
                                <div class="box-particle" id="team-p3"></div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="th-team team-grid">
                                <div class="team-img"><img src="{{ asset('team/farah.png') }}" alt="Team">
                                </div>
                                <div class="team-social">
                                    <div class="play-btn"><i class="far fa-plus"></i></div>
                                    <div class="th-social"><a target="_blank" href="https://facebook.com/"><i
                                                class="fab fa-facebook-f"></i></a> <a target="_blank"
                                            href="https://twitter.com/"><i class="fab fa-twitter"></i></a> <a
                                            target="_blank" href="https://instagram.com/"><i
                                                class="fab fa-instagram"></i></a> <a target="_blank"
                                            href="https://linkedin.com/"><i class="fab fa-linkedin-in"></i></a></div>
                                </div>
                                <h3 class="box-title"><a href="javascript:void(0)">Farah Amalia</a></h3><span
                                    class="team-desig">Web Developer</span>
                                <div class="box-particle" id="team-p4"></div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="th-team team-grid">
                                <div class="team-img"><img src="{{ asset('team/nesa.png') }}" alt="Team">
                                </div>
                                <div class="team-social">
                                    <div class="play-btn"><i class="far fa-plus"></i></div>
                                    <div class="th-social"><a target="_blank" href="https://facebook.com/"><i
                                                class="fab fa-facebook-f"></i></a> <a target="_blank"
                                            href="https://twitter.com/"><i class="fab fa-twitter"></i></a> <a
                                            target="_blank" href="https://instagram.com/"><i
                                                class="fab fa-instagram"></i></a> <a target="_blank"
                                            href="https://linkedin.com/"><i class="fab fa-linkedin-in"></i></a></div>
                                </div>
                                <h3 class="box-title"><a href="javascript:void(0)">Nesa Athussholeha</a></h3><span
                                    class="team-desig">Web Developer</span>
                                <div class="box-particle" id="team-p1"></div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="th-team team-grid">
                                <div class="team-img"><img src="{{ asset('team/panji.png') }}" alt="Team">
                                </div>
                                <div class="team-social">
                                    <div class="play-btn"><i class="far fa-plus"></i></div>
                                    <div class="th-social"><a target="_blank" href="https://facebook.com/"><i
                                                class="fab fa-facebook-f"></i></a> <a target="_blank"
                                            href="https://twitter.com/"><i class="fab fa-twitter"></i></a> <a
                                            target="_blank" href="https://instagram.com/"><i
                                                class="fab fa-instagram"></i></a> <a target="_blank"
                                            href="https://linkedin.com/"><i class="fab fa-linkedin-in"></i></a></div>
                                </div>
                                <h3 class="box-title"><a href="javascript:void(0)">Panji Aryo Kusumo</a></h3><span
                                    class="team-desig">Mobile Devloper</span>
                                <div class="box-particle" id="team-p2"></div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="th-team team-grid">
                                <div class="team-img"><img src="{{ asset('team/aris.png') }}" alt="Team">
                                </div>
                                <div class="team-social">
                                    <div class="play-btn"><i class="far fa-plus"></i></div>
                                    <div class="th-social"><a target="_blank" href="https://facebook.com/"><i
                                                class="fab fa-facebook-f"></i></a> <a target="_blank"
                                            href="https://twitter.com/"><i class="fab fa-twitter"></i></a> <a
                                            target="_blank" href="https://instagram.com/"><i
                                                class="fab fa-instagram"></i></a> <a target="_blank"
                                            href="https://linkedin.com/"><i class="fab fa-linkedin-in"></i></a></div>
                                </div>
                                <h3 class="box-title"><a href="javascript:void(0)">M.Fajrul Falah Ar-riziq</a></h3><span
                                    class="team-desig">Web Devloper</span>
                                <div class="box-particle" id="team-p3"></div>
                            </div>
                        </div>
                    </div>
                </div><button data-slider-prev="#teamSlider1" class="slider-arrow style3 slider-prev"><i
                        class="far fa-arrow-left"></i></button> <button data-slider-next="#teamSlider1"
                    class="slider-arrow style3 slider-next"><i class="far fa-arrow-right"></i></button>
            </div>
        </div>
        <div class="shape-mockup" data-top="0" data-right="0"><img src="assets_landing/img/shape/tech_shape_1.png"
                alt="shape">
        </div>
        <div class="shape-mockup" data-top="0%" data-left="0%"><img src="assets_landing/img/shape/square_1.png"
                alt="shape">
        </div>
    </section>
    <section class="space">
        <div class="container">
            <div class="title-area text-center"><span class="sub-title">
                    <div class="icon-masking me-2"><span class="mask-icon"
                            data-mask-src="assets_landing/img/theme-img/title_shape_2.svg"></span> <img
                            src="assets_landing/img/theme-img/title_shape_2.svg" alt="shape"></div>Materi
                </span>
                <h2 class="sec-title">Materi <span class="text-theme fw-normal">Terbaik</span></h2>
            </div>
            <div class="row gy-4 justify-content-center">
                @forelse ($courses as $course)
                    <div class="col-xl-4 col-md-6">
                        <div class="price-card">
                            <div class="price-card_top">
                                <h3 class="price-card_title">{{ $course->title }}</h3>
                                <p class="price-card_text">{{ $course->division->name }}</p>
                                <h4 class="price-card_price">@currency($course->price)<span class="duration"></span></h4>
                                <div class="particle">
                                    <div class="price-particle" id="price-p1"></div>
                                </div>
                            </div>
                            <div class="price-card_content">
                                <div class="checklist">
                                    <p>
                                        {{ $course->description }}
                                    </p>
                                </div><a href="/login" class="th-btn">Beli Materi<i
                                        class="fa-regular fa-arrow-right ms-2"></i></a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="text-center">
                            <img src="{{ asset('assetsLogin/img/no-data-presentasi.png') }}" width="400px"
                                alt="no-data">
                            <p class="text-center fw-border text-dark fs-5" style="font-weight: 600 ">Materi Belum
                                Tersedia</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
        <div class="shape-mockup" data-top="0" data-right="0"><img src="assets_landing/img/shape/tech_shape_1.png"
                alt="shape">
        </div>
        <div class="shape-mockup" data-top="0%" data-left="0%"><img src="assets_landing/img/shape/square_1.png"
                alt="shape">
        </div>
    </section>
@endsection
