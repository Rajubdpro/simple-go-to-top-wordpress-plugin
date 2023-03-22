(function ($) {
    'use strict';
    new WOW().init();
   
    //=======================Start back to top btn js========================//
    $(window).on("scroll", function () {
        var e = $(window).scrollTop();
        e > 300 && $(".go-top").addClass("active"), e < 300 && $(".go-top").removeClass("active");
    });
    $(".go-top").on("click", function () {
        $("html, body").animate({
            scrollTop: "0"
        }, 500)
    });
    //=======================End back to top btn js========================//

})(jQuery);