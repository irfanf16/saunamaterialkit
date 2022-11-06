$(document).ready(function () {

//    $(window).scroll(function () {
//        var scroll = $(window).scrollTop();
//
//        if (scroll >= 100) {
//
//            $(".menu-bar").addClass("bg");
//
//        } else {
//            $(".menu-bar").removeClass("bg");
//        }
//    });

    $(".btn-menu").click(function () {
        $(".menu-area").addClass("open");
        $(".menu-bar").addClass("up");
        $('.overlay').addClass("dark");
        $('body').addClass("no-scroll");
        $(".sear").addClass("down");
    });
    $(".btn-diss").click(function () {
        $(".menu-area").removeClass("open");
        $(".menu-bar").removeClass("up");
        $('.overlay').removeClass("dark");
        $('body').removeClass("no-scroll");
    });
    $(".sear").click(function () {
        $(".menu-bar").addClass("up");
        $("#search-bar").addClass("down");
    });
    $(".btn-clo").click(function () {
        $(".menu-bar").removeClass("up");
        $('#search-bar').removeClass("down");
    });
    $('.service-slider').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 2
            }
        }
    });
    $('.brands-slider').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        responsive: {
            0: {
                items: 2
            },
            600: {
                items: 3
            },
            1000: {
                items: 6
            }
        }
    });
    $('.banner-slider').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });
    $("#header-content .menu-area .site-nav .main-nav .dropdown").hover(function () {
        $(this).find(".dropdown-menu").stop(!0, !0).delay(200).fadeIn(500)
    }, function () {
        $(this).find(".dropdown-menu").stop(!0, !0).delay(200).fadeOut(500)
    });

});