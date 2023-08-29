$(document).ready(function () {
    ///////////работа с описанием//////////////////
    $('.card-desc').each(function () {
        var maxLength = 30;
        var text = $(this).text();
        var trimmedText = $.trim(text).split(" ", maxLength).join(" ");
        if (text.length > trimmedText.length) {
            trimmedText = trimmedText + "...";
        }
        $(this).text(trimmedText);
    });
    ////////////////работа с постами///////////////
    $('.blog-card').mouseover(function () {
        $(this).stop().animate({ 'width': '100%', 'margin-left': '0' });
    });

    $('.blog-card').mouseout(function () {
        $(this).stop().animate({ 'width': '90%', 'margin-left': '5%' });
    });

    //////////////работа с блог текстом////////////

    $('.blog-icon').mouseover(function () {
        $(this).append('<span>Akramoooo</span>');
        $('span').css({ 'color': 'red', 'font-size': '10px' });

    });

    $('.blog-icon').mouseout(function () {
        $(this).text('Blogs');
        $(this).remove('<span>Akramoooo</span>')
    });

    ///////////////////////работа с кнопкой Добавления Блога///

    $('.add-blog-container>button').on('click', function () {
        $('#myForm').fadeIn(400).css({ 'display': 'block' })
    });

    $('.leave-btn>p').on('click', function () {
        $('#myForm').fadeOut(400)
    });

    $('#myForm>button').on('click', function () {
        $('#myForm').fadeOut(400)
        var formData = new FormData($('#myForm')[0]);
        $('#myForm')[0].reset();


        $.ajax({
            url: '/blog/store', // Укажите URL вашего обработчика данных на сервере
            type: 'POST',
            data: formData,
            cache: false,
            processData: false, // Отключить обработку данных jQuery, т.к. FormData сам обработает их
            contentType: false, // Отключить установку заголовка Content-Type jQuery, т.к. FormData сам установит его
            success: function (response) {
                // Обработка успешного завершения запроса
                console.log('Запрос выполнен успешно:', response);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                // Обработка ошибки AJAX
                console.log('Ошибка выполнения запроса:', textStatus, errorThrown);
            }
        });
    })


    ///////////////////////////////
});