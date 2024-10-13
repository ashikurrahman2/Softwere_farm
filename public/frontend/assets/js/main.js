; (function ($) {
    "use strict";

    $(document).ready(function () {

        

            /**-----------------------------
             *  Navbar fix
             * ---------------------------*/
            $(document).on('click', '.navbar-area .navbar-nav li.menu-item-has-children>a', function (e) {
                e.preventDefault();
            })
           
            /*-------------------------------------
                menu
            -------------------------------------*/
            $('.navbar-area .menu').on('click', function() {
                $(this).toggleClass('open');
                $('.navbar-area .navbar-collapse').toggleClass('sopen');
            });

            $(window).on('load resize', function () {
        
                // mobile menu
                if ($(window).width() < 992) {
                    $(".in-mobile").clone().appendTo(".sidebar-inner");
                    $(".in-mobile ul li.menu-item-has-children").append('<i class="fas fa-chevron-right"></i>');
                    $('<i class="fas fa-chevron-right"></i>').insertAfter("");

                    $(".menu-item-has-children a").on('click', function(e) {
                        // e.preventDefault();

                        $(this).siblings('.sub-menu').animate({
                            height: "toggle"
                        }, 300);
                    });
                }
                
            });

            var menutoggle = $('.menu-toggle');
            var mainmenu = $('.navbar-nav');
            
            menutoggle.on('click', function() {
                if (menutoggle.hasClass('is-active')) {
                    mainmenu.removeClass('menu-open');
                } else {
                    mainmenu.addClass('menu-open');
                }
            });

       

        /*--------------------------------------------------
            select onput
        ---------------------------------------------------*/
        if ($('select').length){
            $('select').niceSelect();
        } 


        /* -----------------------------------------------------
            Variables
        ----------------------------------------------------- */
        var leftArrow = '<i class="la la-angle-left"></i>';
        var rightArrow = '<i class="la la-angle-right"></i>';

        
        /* -------------------------------------------------
            Magnific JS 
        ------------------------------------------------- */
        $('.video-play-btn').magnificPopup({
          type: 'iframe',
          removalDelay: 260,
          mainClass: 'mfp-zoom-in',
        });
        $.extend(true, $.magnificPopup.defaults, {
          iframe: {
            patterns: {
              youtube: {
                index: 'youtube.com/', 
                id: 'v=', 
                src: 'https://www.youtube.com/embed/Wimkqo8gDZ0' 
              }
            }
          }
        });


        /*------------------------------------------------
            breaking-news-slider
        ------------------------------------------------*/
        $('.breaking-news-slider').owlCarousel({
            loop: true,
            nav: true,
            dots: true,
            autoplay: true,
            mouseDrag: false,
            smartSpeed: 1500,
            navText: [ leftArrow, rightArrow],
            items: 1,
        });

        /*---------------------------------------------
            trending-slider
        ----------------------------------------------*/
        $('.single-post-slider').owlCarousel({
            loop: true,
            nav: true,
            dots: true,
            smartSpeed:1500,
            items: 1,
            navText: [ leftArrow, rightArrow],
        });

        /*---------------------------------------------
            trending-slider
        ----------------------------------------------*/
        $('.trending-slider').owlCarousel({
            loop: true,
            nav: true,
            dots: true,
            smartSpeed:1500,
            items: 3,
            margin: 30,
            navText: [ leftArrow, rightArrow],
            responsive: {
                0: {
                    items: 1
                },
                576: {
                    items: 2
                },
                992: {
                    items: 3
                },
            }
        });

        /*---------------------------------------------
            trending-slider-2
        ----------------------------------------------*/
        $('.trending-slider-2').owlCarousel({
            loop: true,
            nav: true,
            dots: true,
            smartSpeed:1500,
            items: 2,
            margin: 30,
            navText: [ leftArrow, rightArrow],
            responsive: {
                0: {
                    items: 1
                },
                576: {
                    items: 2
                },
            }
        });

        /*---------------------------------------------
            trending-slider-3
        ----------------------------------------------*/
        $('.trending-slider-3').owlCarousel({
            loop: true,
            nav: true,
            dots: true,
            smartSpeed:1500,
            items: 3,
            margin: 30,
            navText: [ leftArrow, rightArrow],
            responsive: {
                0: {
                    items: 1
                },
                576: {
                    items: 2
                },
                992: {
                    items: 4
                },
            }
        });

         /*---------------------------------------------
            trending-slider-8
        ----------------------------------------------*/
        $('.home-8-banner-side').owlCarousel({
            loop: true,
            nav: true,
            dots: true,
            smartSpeed:1500,
            items: 3,
            margin: 30,
            navText: [ leftArrow, rightArrow],
            responsive: {
                0: {
                    items: 1
                },
                576: {
                    items: 2
                },
                992: {
                    items: 4
                },
            }
        });


        $('.home-8-collection-side').owlCarousel({
            loop: true,
            nav: false,
            dots: true,
            smartSpeed:1500,
            items: 3,
            margin: 30,
            navText: [ leftArrow, rightArrow],
            responsive: {
                0: {
                    items: 1
                },
                576: {
                    items: 2
                },
                992: {
                    items: 4
                },
            }
        });

        $('.home-8-informetion-side').owlCarousel({
            loop: true,
            nav: false,
            dots: true,
            smartSpeed:1500,
            items: 3,
            margin: 30,
            navText: [ leftArrow, rightArrow],
            responsive: {
                0: {
                    items: 1
                },
                576: {
                    items: 2
                },
                992: {
                    items: 3
                },
            }
        });



        $('.review-slider').owlCarousel({
            loop: true,
            nav: false,
            dots: true,
            smartSpeed:1500,
            items: 3,
            margin: 30,
            autoplay: true,
            navText: [ leftArrow, rightArrow],
            responsive: {
                0: {
                    items: 1
                },
                576: {
                    items: 2
                },
                992: {
                    items: 3
                },
            }
        });


        // COUNTER STARTS 
    $('.counter').counterUp({
        delay: 10,
        time: 2000
      });
      // COUNTER ENDS


        /*--------------------------------------------
            Search Popup
        ---------------------------------------------*/
        var bodyOvrelay =  $('#body-overlay');
        var searchPopup = $('#td-search-popup');

        $(document).on('click','#body-overlay',function(e){
            e.preventDefault();
        bodyOvrelay.removeClass('active');
            searchPopup.removeClass('active');
        });
        $(document).on('click','.nav-search',function(e){
            e.preventDefault();
            searchPopup.addClass('active');
        bodyOvrelay.addClass('active');
        });



        /*-------------------------------------------------
            wow js init
        --------------------------------------------------*/
        new WOW().init();

        /*------------------
           back to top
        ------------------*/
        $(document).on('click', '.back-to-top', function () {
            $("html,body").animate({
                scrollTop: 0
            }, 2000);
        });

    });

    $(window).on("scroll", function() {
        /*---------------------------------------
        sticky menu activation && Sticky Icon Bar
        -----------------------------------------*/

        var mainMenuTop = $(".navbar-area");
        if ($(window).scrollTop() >= 1) {
            mainMenuTop.addClass('navbar-area-fixed');
        }
        else {
            mainMenuTop.removeClass('navbar-area-fixed');
        }
        
        var ScrollTop = $('.back-to-top');
        if ($(window).scrollTop() > 1000) {
            ScrollTop.fadeIn(1000);
        } else {
            ScrollTop.fadeOut(1000);
        }
    });


    $(window).on('load', function () {

        /*-----------------
            preloader
        ------------------*/
        var preLoder = $("#preloader");
        preLoder.fadeOut(0);

        /*-----------------
            back to top
        ------------------*/
        var backtoTop = $('.back-to-top')
        backtoTop.fadeOut();

        /*---------------------
            Cancel Preloader
        ----------------------*/
        $(document).on('click', '.cancel-preloader a', function (e) {
            e.preventDefault();
            $("#preloader").fadeOut(2000);
        });

    });



})(jQuery);