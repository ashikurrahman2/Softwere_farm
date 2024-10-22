@extends('layouts.app')

@section('title', 'About us')

@section('content')
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
                            @foreach($abouts as $about)
                            <div class="image">
                                <img src="{{ asset($about->self_image) }}" alt="">
                            </div>
                            @endforeach
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
                                        <a href="#" class="toggle-detail">{{ $about->our_mission }}<i class="fas fa-long-arrow-alt-right"></i></a>
                                        <div class="detail-content" style="display: none;">
                                            <!-- Add your details here -->
                                            <p>{{ $about->mission_details }}</p>
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
  <!-- About Start -->
@endsection