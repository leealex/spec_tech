var graph = {
    run: function (wrapper) {
        var items = wrapper.find('.circle');
        $.each(items, function () {
            var percent = $(this).data('percent');
            var number = $(this).data('number') ? $(this).data('number') : null;
            var width = $(this).data('width') ? $(this).data('width') : 15;
            var color = $(this).data('color') ? $(this).data('color') : '#2c90cf';
            $(this).empty().removeData().attr('data-percent', percent).circliful({
                foregroundColor: color,
                backgroundColor: '#eeeeee',
                fontColor: '#222222',
                animationStep: percent / 10 + 2,
                foregroundBorderWidth: width,
                backgroundBorderWidth: width,
                percent: percent,
                number: number
            });
        })
    }
};

$(document).on('scroll', function () {
    if ($('.graph').css("visibility") == "visible") {
        $(document).off('scroll');
        graph.run($('.slick-slider'));
    }
});

$('.slick-slider').off().on('afterChange', function () {
    graph.run($(this));
});

$('button.bars').on('click', function () {
    $('.navbar-nav').toggleClass('collapse')
});

$('#modalCard').on('show.bs.modal', function (e) {
    var button = $(e.relatedTarget);
    $('.modal-body').html('<div class="spinner-box"><div class="spinner"></div></div>');
    $.ajax({
        url: '/site/modal-content',
        type: 'post',
        dataType: 'json',
        data: {id: button.data('id')},
        success: function (data) {
            $('.modal-body').html(data);
        }
    });
    $('.modal-header span').text(button.data('title'));
});

$('.buttons button').click(function () {
    $('.pdf-wrapper embed').remove();
    $('.pdf-wrapper').html('<embed src="' + $(this).data('file') + '" class="embed-responsive-item">')
});

new WOW().init();
