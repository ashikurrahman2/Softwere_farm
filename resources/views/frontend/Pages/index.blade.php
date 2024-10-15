@extends('layouts.app')

@section('title', 'Home')

@section('content')

        <!-- Preloader start -->
        <div id="preloader">
            <div class="preloader">
                <span></span>
                <span></span>
            </div>
        </div>
        <!-- Preloader End -->
 <!-- Hero Start -->
 <div class="section techwix-hero-section-06" style="background-image: url({{ asset('/') }}frontend/assets/images/bg/hero-bg6.jpg);">

    <div class="container">
        <div class="row flex-column-reverse flex-lg-row">
            <div class="col-lg-6">
                <!-- Hero Image Start -->
                <div class="hero-images">
                    <img class="shape-1" src="{{ asset('/') }}frontend/assets/images/shape/hero-shape1.png" alt="">
                    <div class="images">
                        <img src="{{ asset('/') }}frontend/assets/images/hero-img2.png" alt="">
                    </div>
                </div>
                <!-- Hero Image ennd -->
            </div>
            <div class="col-lg-6">
                <!-- Hero Content Start -->
                <div class="hero-content">
                    <h3 class="sub-title" data-aos-delay="600" data-aos="fade-up">your network becomes easier to operate by ai</h3>
                    <h2 class="title" data-aos="fade-up" data-aos-delay="800">Leading <span>cyber security</span> & complete IT Solutions</h2>
                    <p data-aos="fade-up" data-aos-delay="900">We provide the most responsive and functional IT</p>
                    <div class="hero-btn" data-aos="fade-up" data-aos-delay="1000">
                        <a class="btn btn-4" href="#">Read More</a>
                    </div>
                </div>
                <!-- Hero Content End -->
            </div>
        </div>
    </div>
</div>
<!-- Hero End -->

<!-- Features Start -->
<div class="section techwix-features-section-02">
    <div class="container">
        <!-- Features Wrap Start -->
        <div class="features-wrap-02">
            <div class="row">
                <div class="col-lg-6">
                    <!-- Features Item Start -->
                    <div class="features-item">
                        <div class="features-icon">
                            <img src="{{ asset('/') }}frontend/assets/images/feat-4.png" alt="">
                        </div>
                        <div class="features-content">
                            <h3 class="title"><a href="#">Cyber security solutions</a></h3>
                            <p>Accelerate innovation with world-class tech teams We’ll match you to an entire remote team of incredible </p>
                            <a class="lern-more" href="#">Learn More <i class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                    <!-- Features Item End -->
                </div>
                <div class="col-lg-6">
                    <!-- Features Item Start -->
                    <div class="features-item">
                        <div class="features-icon">
                            <img src="assets/images/feat-5.png" alt="">
                        </div>
                        <div class="features-content">
                            <h3 class="title"><a href="#">Cloud Computing</a></h3>
                            <p>Accelerate innovation with world-class tech teams We’ll match you to an entire remote team of incredible </p>
                            <a class="lern-more" href="#">Learn More <i class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                    <!-- Features Item End -->
                </div>
            </div>
        </div>
        <!-- Features Wrap End -->
    </div>
</div>
<!-- Features End -->

       <!-- About Start -->
       <div class="section techwix-about-section-06 section-padding-03">
        <div class="shape-1"></div>
        <div class="container">
            <!-- About Wrapper Start -->
            <div class="about-wrap">
                <div class="row">
                    <div class="col-lg-6">
                        <!-- About Image Start -->
                        <div class="about-img">
                            <img class="shape-1" src="{{ asset('/') }}frontend/assets/images/shape/about-shape1.png" alt="">
                            <div class="image">
                                <img src="{{ asset('/') }}frontend/assets/images/about-img3.jpg" alt="">
                            </div>
                            <div class="play-btn">
                                <a class="popup-video" href="https://www.youtube.com/watch?time_continue=3&amp;v=_X0eYtY8T_U"><i class="fas fa-play"></i></a>
                            </div>
                        </div>
                        <!-- About Image End -->
                    </div>
                    <div class="col-lg-6">
                        <!-- About Content Wrap Start -->
                        <div class="about-content-wrap">
                            <div class="section-title">
                                @foreach ($abouts as $about )
                                <h3 class="sub-title color-3">Who we are</h3>
                                <h2 class="title">{{ $about->title }}</h2>
                            </div>
                            <p class="text">{{ $about->sub_title }}</p>
                            <!-- About List Wrap Start -->
                            <div class="about-list-wrap">
                                <ul class="about-list">
                                    <li class="list">
                                        <a href="#" class="toggle-detail">Home Protection <i class="fas fa-long-arrow-alt-right"></i></a>
                                        <div class="detail-content" style="display: none;">
                                            <!-- Add your details here -->
                                            <p>Home Protection includes a variety of services to ensure the safety of your home and property.</p>
                                        </div>
                                    </li>
                                    <li class="list">
                                        <a href="#" class="toggle-detail">Corporate Security for Office <i class="fas fa-long-arrow-alt-right"></i></a>
                                        <div class="detail-content" style="display: none;">
                                            <p>Corporate Security ensures the safety of your office premises with advanced systems.</p>
                                        </div>
                                    </li>
                                    <li class="list">
                                        <a href="#" class="toggle-detail">Solution For Devices <i class="fas fa-long-arrow-alt-right"></i></a>
                                        <div class="detail-content" style="display: none;">
                                            <p>Device protection solutions cover all your gadgets with comprehensive security.</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            
                            <!-- About List Wrap End -->
                        </div>
                        @endforeach
                        <!-- About Content Wrap End -->
                    </div>
                </div>
            </div>
            <!-- About Wrapper End -->
        </div>
    </div>
    <!-- About End -->

    {{-- List about style --}}
    <style>
    .detail-content {
    padding: 10px;
    background-color: #f0f0f0;
    margin-top: 5px;
    border-left: 3px solid #007bff;
}
 </style>

{{-- List toogle about desctiption script --}}
<script>
   document.querySelectorAll('.toggle-detail').forEach(item => {
    item.addEventListener('click', function(e) {
        e.preventDefault();
        const detailContent = this.nextElementSibling;

        // Toggle the visibility of the detail content
        if (detailContent.style.display === 'none') {
            detailContent.style.display = 'block';
        } else {
            detailContent.style.display = 'none';
        }
    });
});
</script>

@endsection