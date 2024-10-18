@extends('layouts.app')

@section('title', 'Message us')

@section('content')
     <!-- Contact Start -->
     <div class="section techwix-contact-section techwix-contact-section-02 techwix-contact-section-03" style="background-color: #f3f4f6; padding: 100px 0; color: #333;">
        <div class="container">
            <!-- Contact Wrap Start -->
            <div class="contact-wrap">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <!-- Contact Form Start -->
                        <h1 class="text-center" style="font-size: 36px; font-weight: bold; color: #333; margin-top: 30px;">Message Us</h1>
                        <div class="contact-form" style="background-color: #ffffff; padding: 30px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);">
                            <div class="contact-form-wrap">
                                {{-- <h1>Message Us</h1> --}}
                                <div class="heading-wrap text-center">
                                    <span class="sub-title" style="color: #ff6b6b; font-weight: bold;">Request a Quote</span>
                                    <h3 class="title" style="margin-top: 10px; font-size: 28px; color: #333; font-weight: bold;">How May We Help You!</h3>
                                </div>
                                <form action="#">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <!-- Single Form Start -->
                                            <div class="single-form" style="margin-bottom: 15px;">
                                                <input type="text" placeholder="Name *" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                                            </div>
                                            <!-- Single Form End -->
                                        </div>
                                        <div class="col-sm-6">
                                            <!-- Single Form Start -->
                                            <div class="single-form" style="margin-bottom: 15px;">
                                                <input type="email" placeholder="Email *" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                                            </div>
                                            <!-- Single Form End -->
                                        </div>
                                        <div class="col-sm-12">
                                            <!-- Single Form Start -->
                                            <div class="single-form" style="margin-bottom: 15px;">
                                                <input type="text" placeholder="Subject *" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                                            </div>
                                            <!-- Single Form End -->
                                        </div>
                                        <div class="col-sm-12">
                                            <!-- Single Form Start -->
                                            <div class="single-form" style="margin-bottom: 15px;">
                                                <textarea placeholder="Write A Message" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; height: 150px;"></textarea>
                                            </div>
                                            <!-- Single Form End -->
                                        </div>
                                        <div class="col-sm-12">
                                            <!-- Single Form Start -->
                                            <div class="form-btn" style="text-align: center;">
                                                <button class="btn" type="submit" style="background-color: #ff6b6b; color: white; padding: 10px 30px; border: none; border-radius: 5px; font-weight: bold; cursor: pointer;">Send Message</button>
                                            </div>
                                            <!-- Single Form End -->
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Contact Form End -->
                    </div>
                </div>
            </div>
            <!-- Contact Wrap End -->
        </div>
    </div>
    
    
    <!-- Contact End -->
@endsection