slick = require('slick-carousel');

$(document).ready(function () {
    $('.slick').each(function (i, elem) {
        $(elem).slick({
            autoplay: ($(elem).data('autoplay') ? $(elem).data('autoplay') : false),
            arrows: ($(elem).data('arrows') ? $(elem).data('arrows') : false),
            fade: ($(elem).data('fade') ? $(elem).data('fade') : false),
            dots: ($(elem).data('dots') ? $(elem).data('dots') : false),
            slidesToShow: ($(elem).data('show') ? $(elem).data('show') : 1),
            slidesToScroll: ($(elem).data('scroll') ? $(elem).data('scroll') : 1),
            infinite: ($(elem).data('infinite') ? $(elem).data('infinite') : true),
            nextArrow: "<button type=\"button\" class=\"slick-next\"></button>"
        });
    });
});
