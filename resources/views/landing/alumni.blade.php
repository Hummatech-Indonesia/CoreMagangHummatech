@extends('landing.layouts.app')

<style>
    .team-img {
    width: auto;
    max-width: 300px;
    height: 300px;
    overflow: hidden;
}

.team-img img.responsive-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    display: block;
}

</style>

@section('content')


<div class="breadcumb-wrapper" data-bg-src="assets_landing/img/alumni/Alumni.jpg"
    style="background-position: center 20%;">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Alumni</h1>
            <ul class="breadcumb-menu">
                <li><a href="/">Home</a></li>
                <li>Alumni</li>
            </ul>
        </div>
    </div>
</div>

<section class="space">
    <div class="container">
        <div class="title-area text-center">
            <span class="sub-title">
                <div class="icon-masking me-2">
                    <span class="mask-icon" data-mask-src="assets_landing/img/alumni/theme/title_shape_1.svg"></span>
                    <img src="assets_landing/img/alumni/theme/title_shape_1.svg" alt="shape">
                </div>ALUMNI
            </span>
            <h2 class="sec-title">Semua Alumni Magang <span class="text-theme">Hummatech</span></h2>
        </div>
        <div class="row gy-40">
            @forelse ($alumni as $alumni)
                <div class="col-lg-3 col-md-6">
                    <div class="th-team team-card">
                        <div class="team-img">
                            <img src="{{ asset('storage/' . $alumni->image) }}" alt="Team" class="responsive-img">
                        </div>                        <div class="team-content">
                            <div class="box-particle" id="team-p1"></div>
                            {{-- <div class="team-social">
                                <a target="_blank" href="https://instagram.com/">
                                    <i class="fab fa-instagram"></i></a>
                                <a target="_blank" href="https://linkedin.com/">
                                    <i class="fab fa-linkedin-in"></i></a>
                            </div> --}}
                            <h3 class="box-title"><a href="team-details.html">{{$alumni->name}}</a></h3><span
                                class="team-desig">{{$alumni->school}}</span>
                        </div>
                    </div>
                </div>

            @empty

            @endforelse
            <div class="th-pagination mt-5 text-center">
                {{-- <ul>
                    <li><a href="blog.html">1</a></li>
                    <li><a href="blog.html">2</a></li>
                    <li><a href="blog.html">3</a></li>
                    <li><a href="blog.html"><i class="far fa-arrow-right"></i></a></li>
                </ul> --}}
            </div>
        </div>
    </div>
</section>
@endsection
