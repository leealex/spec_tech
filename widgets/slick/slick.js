$(document).ready(function () {
    $('.slick-slider').each(function () {
        $(this).slick({
            autoplay: $(this).data('auto-play'),
            prevArrow: '<button type="button" class="slick-prev"></button>',
            nextArrow: '<button type="button" class="slick-next"></button>',
            slidesToShow: $(this).data('show-number'),
            slidesToScroll: $(this).data('scroll-number'),
            variableWidth: $(this).data('variable-width'),
            centerMode: $(this).data('center-mode')
        });
    })
});