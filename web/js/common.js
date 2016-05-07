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

$('#modalDocument').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var file = button.attr('href');
    var title = button.data('title');
    var modal = $(this);
    var extension = file.split('.').pop();
    if (extension == 'pdf') {
        if (PDFObject.supportsPDFs) {
            modal.find('.modal-body').html('<div class="embed-responsive embed-responsive-4by3">' +
                '<embed src="' + file + '" class="embed-responsive-item"></div>');
        } else {
            modal.find('.modal-body').html('<p class="text-center">Ваш браузер не поддерживает отображение документов PDF. ' +
                'Для просмотра документа загрузите его по ссылке: <a href="' + file + '">' + title + '</a></p>');
        }
    } else {
        modal.find('.modal-body').html('<img src="' + file + '" class="img-responsive center-block">');
    }

    modal.find('.modal-header span').text(title);

});

new WOW().init();
