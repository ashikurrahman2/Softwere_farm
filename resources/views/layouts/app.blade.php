<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Magpie - Blog, Magazine Html Template</title>
    
    <!-- favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/')}}frontend/assets/images/favicon.png" sizes="20x20" type="image/png">
      
    <!-- CSS
        ============================================ -->
    
        <!-- Icon Font CSS -->
        <link rel="stylesheet" href="{{ asset('/') }}frontend/assets/css/plugins/all.min.css">
        <link rel="stylesheet" href="{{ asset('/') }}frontend/assets/css/plugins/flaticon.css">
    
        <!-- Plugins CSS -->
        <link rel="stylesheet" href="{{ asset('/') }}frontend/assets/css/plugins/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('/') }}frontend/assets/css/plugins/swiper-bundle.min.css">
        <link rel="stylesheet" href="{{ asset('/') }}frontend/assets/css/plugins/aos.css">
        <link rel="stylesheet" href="{{ asset('/') }}frontend/assets/css/plugins/magnific-popup.css">
    
        <!-- Main Style CSS -->
        <link rel="stylesheet" href="{{ asset('/') }}frontend/assets/css/style.css">

        
    <!-- JS
    ============================================ -->
    <script src="{{ asset('/') }}frontend/assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="{{ asset('/') }}frontend/assets/js/vendor/modernizr-3.11.2.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="{{ asset('/') }}frontend/assets/js/plugins/popper.min.js"></script>
    <script src="{{ asset('/') }}frontend/assets/js/plugins/bootstrap.min.js"></script>

    <!-- Plugins JS -->
    <script src="{{ asset('/') }}frontend/assets/js/plugins/swiper-bundle.min.js"></script>
    <script src="{{ asset('/') }}frontend/assets/js/plugins/aos.js"></script>
    <script src="{{ asset('/') }}frontend/assets/js/plugins/waypoints.min.js"></script>
    <script src="{{ asset('/') }}frontend/assets/js/plugins/back-to-top.js"></script>
    <script src="{{ asset('/') }}frontend/assets/js/plugins/jquery.counterup.min.js"></script>
    <script src="{{ asset('/') }}frontend/assets/js/plugins/appear.min.js"></script>
    <script src="{{ asset('/') }}frontend/assets/js/plugins/jquery.magnific-popup.min.js"></script>

    <!-- Main JS -->
    <script src="{{ asset('/') }}frontend/assets/js/main.js"></script>

</head>
<body>
    
        <!-- Preloader start -->
        <div id="preloader">
            <div class="preloader">
                <span></span>
                <span></span>
            </div>
        </div>
        <!-- Preloader End -->
    <!-- header start -->
    @include('frontend.layouts.header')
    <!-- navbar end -->

    @yield('content')

    <!-- footer area start -->
    @include('frontend.layouts.footer')
    <!-- footer area end -->
</body>
</html>