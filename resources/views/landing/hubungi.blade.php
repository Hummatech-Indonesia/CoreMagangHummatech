@extends('landing.layouts.app')
@section('content')
<div class="breadcumb-wrapper" data-bg-src="assets_landing/img/hubungi/hubungiKami.jpg"
    style="background-position: center 20%;">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Hubungi Kami</h1>
            <ul class="breadcumb-menu">
                <li><a href="index.html">Home</a></li>
                <li>Hubungi Kami</li>
            </ul>
        </div>
    </div>
</div>
<div class="space">
    <div class="container">
        <div class="title-area text-center">
            <h2 class="sec-title">Hubungi <span class="text-theme">Kami</span></h2>
            <p>Kami disini untuk anda! Hubungi kami kapan saja jika anda membutuhkan bantuan kami.</p>
        </div>
        <div class="row gy-4">
            <div class="col-xl-4 col-md-6 d-flex align-items-stretch">
                <div class="contact-info flex-fill d-flex flex-column">
                    <div class="contact-info_icon"><i class="fas fa-location-dot"></i></div>
                    <div class="media-body">
                        <h4 class="box-title">Our Office Address</h4>
                        <span class="contact-info_text"> Perum Permata Regency 1 Blok 10/28, Perun Gpa, Ngijo, Kec.
                            Karang Ploso, Kabupaten Malang, Jawa Timur 65152.</span>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 d-flex align-items-stretch">
                <div class="contact-info flex-fill d-flex flex-column">
                    <div class="contact-info_icon"><i class="fas fa-phone"></i></div>
                    <div class="media-body">
                        <h4 class="box-title">WhatsApp</h4>
                        <span class="contact-info_text"><a href="tel:+65485965789">+6285176777785</a></span>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 d-flex align-items-stretch">
                <div class="contact-info flex-fill d-flex flex-column">
                    <div class="contact-info_icon"><i class="fas fa-envelope"></i></div>
                    <div class="media-body">
                        <h4 class="box-title">Send An Email</h4>
                        <span class="contact-info_text"><a
                                href="mailto:info@hummatech.com">info@hummatech.com</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="bg-smoke space" data-bg-src="assets_landing/img/hubungi/theme/contact_bg_1.png" id="contact-sec">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="title-area mb-35 text-xl-start text-center"><span class="sub-title">
                        <div class="icon-masking me-2"><span class="mask-icon"
                                data-mask-src="assets_landing/img/hubungi/theme/title_shape_2.svg"></span> <img
                                src="assets_landing/img/hubungi/theme/title_shape_2.svg" alt="shape"></div>contact with
                        us!
                    </span>
                    <h2 class="sec-title">Ada Pertanyaan?</h2>
                </div>
                <div>
                    <div class="row">
                        <div class="col-xl-6">
                            <form action="https://html.themeholy.com/webteck/demo/mail.php" method="POST"
                                class="contact-form ajax-contact">
                                <div class="row">
                                    <div class="form-group col-md-6"><input type="text" class="form-control" name="name"
                                            id="name" placeholder="Your Name"> <i class="fal fa-user"></i></div>
                                    <div class="form-group col-md-6"><input type="email" class="form-control"
                                            name="email" id="email" placeholder="Email Address"> <i
                                            class="fal fa-envelope"></i></div>
                                    <div class="form-group col-md-6"><select name="subject" id="subject"
                                            class="form-select">
                                            <option value="" disabled="disabled" selected="selected" hidden>Select
                                                Subject
                                            </option>
                                            <option value="Web Development">Web Development</option>
                                            <option value="Brand Marketing">Brand Marketing</option>
                                            <option value="UI/UX Designing">UI/UX Designing</option>
                                            <option value="Digital Marketing">Digital Marketing</option>
                                        </select> <i class="fal fa-chevron-down"></i></div>
                                    <div class="form-group col-md-6"><input type="tel" class="form-control"
                                            name="number" id="number" placeholder="Phone Number"> <i
                                            class="fal fa-phone"></i></div>
                                    <div class="form-group col-12"><textarea name="message" id="message" cols="30"
                                            rows="3" class="form-control" placeholder="Your Message"></textarea> <i
                                            class="fal fa-comment"></i></div>
                                    <div class="form-btn text-xl-start text-center col-12"><button class="th-btn">Send
                                            Message<i class="fa-regular fa-arrow-right ms-2"></i></button></div>
                                </div>
                                <p class="form-messages mb-0 mt-3"></p>
                            </form>
                        </div>
                        <div class="col-xl-6 mb-30 mb-xl-0 mt-3 mt-md-0">
                            <div class="img-box1">
                                <div class="img1"><img src="assets_landing/img/hubungi/handphone.png" alt="handphone">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="map-sec"><iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.952251051282!2d112.602010676237!3d-7.900057658271093!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7881c2c4637501%3A0x10433eaf1fb2fb4c!2sHummasoft%20%2F%20Hummatech%20(PT%20Humma%20Teknologi%20Indonesia)!5e0!3m2!1sid!2sid!4v1716382198517!5m2!1sid!2sid"
        allowfullscreen="" loading="lazy"></iframe></div>
@endsection