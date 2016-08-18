/*!
 * Start Bootstrap - Grayscale Bootstrap Theme (http://startbootstrap.com)
 * Code licensed under the Apache License v2.0.
 * For details, see http://www.apache.org/licenses/LICENSE-2.0.
 */

// jQuery to collapse the navbar on scroll
$(window).scroll(function() {
    if ($(".navbar").offset().top > 50) {
        $(".navbar-fixed-top").addClass("top-nav-collapse");
        $(".logo-holder").addClass("logo-holder-collapsed");
         $(".dropdown-bar").addClass("dropdown-bar-collapsed");
    } else {
        $(".navbar-fixed-top").removeClass("top-nav-collapse");
        $(".logo-holder").removeClass("logo-holder-collapsed");
        $(".dropdown-bar").removeClass("dropdown-bar-collapsed");
    }
});

// jQuery for page scrolling feature - requires jQuery Easing plugin
$(function() {
    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
});

$(window).ready(function() {
    $("ul.navbar-collapse").css({ maxHeight: $(window).height() - 140 + "px" });
    if ($(window).width() < 767) { 
        $('.navbar-right .dropdown a').removeClass('disabled');
    }
    else {
        $('.navbar-right .dropdown a').addClass('disabled');
    }
});

$(window).resize(function() {
    $("ul.navbar-collapse").css({ maxHeight: $(window).height() - 140 + "px" });
    if ($(window).width() < 767) { 
        $('.navbar-right .dropdown a').removeClass('disabled');
    }
    else {
        $('.navbar-right .dropdown a').addClass('disabled');
    }
});

