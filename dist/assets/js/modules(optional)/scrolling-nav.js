/* SCROLLING NAVBAR */
//jQuery to collapse the side-navbar on scroll
$(window).scroll(function () {
if ($(".side-navbar").offset()) {
    if ($(".side-navbar").offset().top > 50) {
        $(".scrolling-side-navbar").addClass("top-nav-collapse");
    } else {
        $(".scrolling-side-navbar").removeClass("top-nav-collapse");
    }
}

});

//jQuery for page scrolling feature - requires jQuery Easing plugin
$(function () {
    $('a.page-scroll').bind('click', function (event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
});
