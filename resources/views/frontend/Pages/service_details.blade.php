@extends('layouts.app')

@section('title', 'Service Details')

@section('content')
      <!-- Service details Start -->
      <div class="section techwix-service-section-04 techwix-service-section-07 section-padding-02">
        <div class="container">
            <!-- Service Wrap Start -->
            <div class="service-wrap">
                <div class="section-title text-center">
                    <h3 class="sub-title color-3">Optimal security Solutions</h3>
                    <h2 class="title">Highly Tailored IT Design, Management & Support Services. </h2>
                </div>
                <div class="service-content-wrap">
                    <div class="row">
                        <div class="col-lg-6">
                            <!-- Experience Wrap Start -->
                            <div class="experience-wrap">
                                <img class="shape-1" src="{{ asset('/') }}frontend/assets/images/shape/experince-shape2.png" alt="">
                                <div class="experience" style="background-image: url({{ asset('/') }}frontend/assets/images/shape/exp-bg2.jpg);">
                                    <h3 class="number">2</h3>
                                    <span>Years Experience Working</span>
                                </div>
                            </div>
                            <!-- Experience Wrap End -->
                        </div>
                        <div class="col-lg-6">
                            <!-- Service Content Start -->
                            <div class="service-content">
                                <p class="text">Accelerate innovation with world-class tech teams We’ll match you to an entire remote team of incredible freelance talent for all your software development needs.</p>
                                <div class="service-list">
                                    <ul>
                                        <li>
                                            <span class="service-icon"><i class="fas fa-check"></i></span>
                                            <span class="service-text">We always focus on technical excellence</span>
                                        </li>
                                        <li>
                                            <span class="service-icon"><i class="fas fa-check"></i></span>
                                            <span class="service-text"> Wherever you’re going, we bring ideas and excitement</span>
                                        </li>
                                        <li>
                                            <span class="service-icon"><i class="fas fa-check"></i></span>
                                            <span class="service-text">We’re consultants, guides, and partners for brands</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Service details Content End -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Service details Wrap End -->
        </div>
    </div>
    <!-- Service details End -->
@endsection