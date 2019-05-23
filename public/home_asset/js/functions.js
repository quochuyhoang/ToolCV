jQuery(function($) {
    "use strict";

    /*----------------------------------------------------*/
    /*  Loader
    /*----------------------------------------------------*/
    jQuery(window).on("load", function () {
        jQuery("#loader").fadeOut(800);
    });
    var $window = $(window);
    var windowsize = $(window).width();
    var $root = $("html, body");
    var $body = $("body");

    /*----------------------------------------------------*/
    /*  Equal Heights  Scroll
    /*----------------------------------------------------*/
    checheight();
        $window.on("resize", function () {
            checheight();
        });
        function checheight() {
        var $smae_height = $(".equalheight");
        if ($smae_height.length) {
            if (windowsize > 359) {
                $smae_height.matchHeight({
                    property: "height"
                });
            }
        }
    }
    /*----------------------------------------------------*/
    /*  Scrolling Function
    /*----------------------------------------------------*/
    var amountScrolled = 700;
        var backBtn = $("a.back-to");
        $(window).on("scroll", function() {
            if ($(window).scrollTop() > amountScrolled) {
                backBtn.fadeIn("slow");
            } else {
                backBtn.fadeOut("slow");
            }
        });
        backBtn.on("click", function() {
        $("html, body").animate({
            scrollTop: 0
        }, 700);
        return false;
    });

    /*----------------------------------------------------*/
    /*  FunFact
    /*----------------------------------------------------*/
    $(".number-counters").appear(function () {
        $(".number-counters [data-to]").each(function () {
            var e = $(this).attr("data-to");
            $(this).delay(6e3).countTo({
                from: 1,
                to: e,
                speed: 3000,
                refreshInterval: 50
            })
        })
    });

    /*----------------------------------------------------*/
    /*  SEARCH POPUP
    /*----------------------------------------------------*/
    $(".search_btn").on("click", function(event) {
        event.preventDefault();
        $("#search").addClass("open");
        $("#search > form > input[type='search']").focus();
    });
    $("#search, #search button.close").on("click keyup", function(event) {
        if (event.target == this || event.target.className == "close" || event.keyCode == 27) {
            $(this).removeClass("open");
        }
    });

    /*----------------------------------------------------*/
    /*  FANCY BOX
    /*----------------------------------------------------*/
    $(".fancybox").fancybox({
        openEffect: 'elastic',
        openSpeed: 650,
        closeEffect: 'fade',
        closeClick: true,
    });

    /*----------------------------------------------------*/
    /*  Top Search
    /*----------------------------------------------------*/
    $(function() {
        var $searchlink = $('#searchtoggl i');
        var $searchbar = $('#searchbar');
        $('#header_top ul li a').on('click', function(e) {
            e.preventDefault();
            if ($(this).attr('id') == 'searchtoggl') {
                if (!$searchbar.is(":visible")) {
                    $searchlink.removeClass('fa-search').addClass('fa-search-minus');
                } else {
                    $searchlink.removeClass('fa-search-minus').addClass('fa-search');
                }

                $searchbar.slideToggle(300, function() {
                });
            }
        });
        $('#searchform').submit(function(e) {
            e.preventDefault();
        });
    });
    /*----------------------------------------------------*/
    /*  Typewriter
    /*----------------------------------------------------*/
     $('#typewriter').typewriter({
        prefix : "Welcome to Hostza Corporate ",
        text : ["Premium Hosting", "Cloud Hosting", "VPS Hosting" , "Dedicated Hosting"],
        typeDelay : 90,
        waitingTime : 1500,
        blinkSpeed : 200
    });
     
    /*----------------------------------------------------*/
    /*  DATE PICKER
    /*----------------------------------------------------*/
    $('.datepicker').datepicker();

    /*----------------------------------------------------*/
    /*  Main Slider
    /*----------------------------------------------------*/
    $("#revo_main").show().revolution({
        sliderType: "standard",
        sliderLayout: "fullwidth",
        scrollbarDrag: "true",
        dottedOverlay: "none",
        delay: 9000,
        navigation: {
            arrows: {
                enable: true,
                hide_onmobile: true,
                hide_under: 600,
            },
            touch: {
                touchenabled: "on",
                swipe_threshold: 75,
                swipe_min_touches: 1,
                swipe_direction: "horizontal",
                drag_block_vertical: false
            }
        },
        viewPort: {
            enable: true,
            outof: "pause",
            visible_area: "80%"
        },
        responsiveLevels: [4096, 1024, 778, 480],
        gridwidth: [1170, 1024, 750, 480],
        gridheight: [680, 600, 450, 350],
        lazyType: "none",
        parallax: {
            type: "mouse",
            origo: "slidercenter",
            speed: 9000,
            levels: [2, 3, 4, 5, 6, 7, 12, 16, 10, 50],
        },
        shadow: 0,
        spinner: "off",
        stopLoop: "off",
        stopAfterLoops: -1,
        stopAtSlide: -1,
        shuffle: "off",
        autoHeight: "off",
        hideThumbsOnMobile: "off",
        hideSliderAtLimit: 0,
        hideCaptionAtLimit: 0,
        hideAllCaptionAtLilmit: 0,
        debugMode: false,
        fallbacks: {
            simplifyAll: "off",
            nextSlideOnWindowFocus: "off",
            disableFocusListener: false,
        }
    });
    $('#main-slider.carousel').carousel({
        interval: 6000,
        singleItem: true,
        transitionStyle: "fade"
    });
    //Latest news home Slider
    var owl = $("#latest_news_slider");
        owl.owlCarousel({
        autoPlay: 3000,
        items: 3,
        pagination: false,
        navigation: true,
        navigationText: [
            "<img src='images/prev.png' alt='image' />",
            "<img src='images/next.png' alt='image' />",
        ],
        itemsDesktopSmall: [1024, 2],
        itemsTablet: [768, 2],
        itemsMobile: [479, 1],
    });
    //Latest news home Slider
    var owl = $("#partner_slider");
        owl.owlCarousel({
            autoPlay: 4000,
            items: 6,
            pagination: true,
            navigation: false
    });
    // Testinomial home slider
    $("#testinomial_slider").owlCarousel({
        autoPlay: 5000,
        pagination: true,
        navigation: false,
        items: 3,
        itemsDesktopSmall: [999, 2],
        itemsTablet: [768, 2],
        itemsMobile: [479, 1],
    });
    
    $("#testinomial_second_slider").owlCarousel({
        autoPlay: 5000,
        pagination: true,
        navigation: false,
        items: 2,
        itemsDesktopSmall: [1199, 2],
        itemsTablet: [999, 1],
        itemsMobile: [479, 1],
    });
    // Testinomial home slider
    var owl = $("#team_slider");
        owl.owlCarousel({
        autoPlay: false,
        pagination: true,
        navigation: false,
        items: 2,
        itemsDesktopSmall: [1199, 2],
        itemsTablet: [992, 1],
        itemsMobile: [479, 1],
    });
    //Blog page Slider
    var owl = $("#blog_slider");
        owl.owlCarousel({
        autoPlay: 3000,
        singleItem: true,
        pagination: false,
        navigation: true,
        navigationText: [
            "<img src='images/prev.png' alt='image' />",
            "<img src='images/next.png' alt='image' />",
        ],
    });
    var owl = $("#testinomial_slider_blog");
        owl.owlCarousel({
        autoPlay: false,
        pagination: true,
        navigation: false,
        singleItem: true,
        itemsDesktopSmall: [1199, 2],
        itemsTablet: [992, 1],
        itemsMobile: [479, 1],
    });

    // gradient layout
    function checkGradeient() {
        //gradient animations
        var colors = new Array(
            [15, 183, 140], [15, 199, 158], [15, 183, 140], [15, 183, 140], [15, 199, 158], [15, 183, 140]);
        var step = 0;
        // next color right
        var colorIndices = [0, 1, 2, 3];
        //transition speed
        var gradientSpeed = 0.004;
        function updateGradient() {
            if ($ === undefined) return;
            var c0_0 = colors[colorIndices[0]];
            var c0_1 = colors[colorIndices[1]];
            var c1_0 = colors[colorIndices[2]];
            var c1_1 = colors[colorIndices[3]];
            var istep = 1 - step;
            var r1 = Math.round(istep * c0_0[0] + step * c0_1[0]);
            var g1 = Math.round(istep * c0_0[1] + step * c0_1[1]);
            var b1 = Math.round(istep * c0_0[2] + step * c0_1[2]);
            var color1 = "rgb(" + r1 + "," + g1 + "," + b1 + ")";
            var r2 = Math.round(istep * c1_0[0] + step * c1_1[0]);
            var g2 = Math.round(istep * c1_0[1] + step * c1_1[1]);
            var b2 = Math.round(istep * c1_0[2] + step * c1_1[2]);
            var color2 = "rgb(" + r2 + "," + g2 + "," + b2 + ")";
            $('#gradient-banner').css({
                background: "-webkit-gradient(linear, left top, right top, from(" + color1 + "), to(" + color2 + "))"
            }).css({
                background: "-moz-linear-gradient(left, " + color1 + " 0%, " + color2 + " 100%)"
            });
            step += gradientSpeed;
            if (step >= 1) {
                step %= 1;
                colorIndices[0] = colorIndices[1];
                colorIndices[2] = colorIndices[3];
                //pick two new target color indices
                //do not pick the same as the current one
                colorIndices[1] = (colorIndices[1] + Math.floor(1 + Math.random() * (colors.length - 1))) % colors.length;
                colorIndices[3] = (colorIndices[3] + Math.floor(1 + Math.random() * (colors.length - 1))) % colors.length;
            }
        }
        setInterval(updateGradient, 10);
    }
    if ($('#gradient-banner').hasClass("gradient-banner")) {
        checkGradeient()
    }
    /*----------------------------------------------------*/
    /*  SKILL BAR
    /*----------------------------------------------------*/
    $(".skills li").each(function() {
        $(this).appear(function() {
            $(this).animate({
                opacity: 1,
                left: "0px"
            }, 800);
            var b = jQuery(this).find(".progress-bar").attr("data-width");
            $(this).find(".progress-bar").animate({
                width: b + "%"
            }, 1300, "linear");
        });
    });

	/*----------------------------------------------------*/
    /*  ACCORDIONS
    /*----------------------------------------------------*/
    $(".items > li > a").on('click', function(e) {
        e.preventDefault();
        var $this = $(this);
        if ($this.hasClass("expanded")) {
            $this.removeClass("expanded");
        } else {
            $(".items a.expanded").removeClass("expanded");
            $this.addClass("expanded");
            $(".sub-items").filter(":visible").slideUp("normal");
        }
        $this.parent().children("ul").stop(true, true).slideToggle("normal");
    });
	/*----------------------------------------------------*/
    /*  PARALLAX
    /*----------------------------------------------------*/
    $(".parallaxie").parallaxie({
        speed: 0.6,
        offset: 0,
    });

});