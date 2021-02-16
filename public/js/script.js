$(document).ready(function(){
 
    $("#press-slide").owlCarousel({
        loop: true,
        dots: true,
        margin: 20,
        slideSpeed: 9000,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        resonsiveClass: true,
        responsiveRefreshRate: true,
        responsive: {
            0 : {
                items: 1
            },
            768 : {
                items: 2
            },
            1000 : {
                items: 3
            },
            1200 : {
                items: 3
            },
            1920 : {
                items: 3
            }
        }
    }); 
    $("#happy").owlCarousel({
        loop: true,
        dots: true,
        margin: 20,
        item:5,
        slideSpeed: 9000,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        resonsiveClass: true,
        responsiveRefreshRate: true,
        responsive: {
            0 : {
                items: 1
            },
            768 : {
                items: 2
            },
            1000 : {
                items: 2
            },
            1200 : {
                items: 2
            },
            1920 : {
                items: 2
            }
        }
    }); 
    $("#events").owlCarousel({
        loop: true,
        dots: true,
        margin: 20,
        slideSpeed: 9000,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        resonsiveClass: true,
        responsiveRefreshRate: true,
        responsive: {
            0 : {
                items: 1
            },
            768 : {
                items: 1
            },
            1000 : {
                items: 1
            },
            1200 : {
                items: 1
            },
            1920 : {
                items: 1
            }
        }
    }); 
    $(".caro-2").owlCarousel({
        loop: true,
        dots: false,
        nav: false,
        slideSpeed: 6000,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        resonsiveClass: true,
        responsiveRefreshRate: true,
        responsive: {
            0 : {
                items: 1
            },
            400 : {
                items: 2
            },
            768 : {
                items: 3
            },
            1000 : {
                items: 4
            },
            1200 : {
                items: 5
            },
            1920 : {
                items: 5
            }
        }
    }); 
    $(".caro-3").owlCarousel({
        loop: true,
        dots: false,
        nav: false,
        slideSpeed: 1000,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        resonsiveClass: true,
        responsiveRefreshRate: true,
        responsive: {
        0 : {
            items: 0
        },
        350 : {
            items: 1
        },
        400 : {
            items: 2
        },
        768 : {
            items: 3
        },
        1920 : {
            items: 3
        }
        }
    }); 
    // program-page
    $('#programSlider').owlCarousel({
        loop: true,
        dots: false,
        margin: 20,
        slideSpeed: 9000,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        resonsiveClass: true,
        responsiveRefreshRate: true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });
    // partner-page
    var partner = $('#partner');
    partner.owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        autoplay: true,
        autoplayTimeout: 3000,
        item: 4,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:4
            }
        }
    })
    partner.on('mousewheel', '.owl-stage', function (e) {
        if (e.deltaY>0) {
            partner.trigger('next.owl');
        } else {
            partner.trigger('prev.owl');
        }
        e.preventDefault();
    });

    wow = new WOW();
    wow.init();
    
});