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

    ///////////////////////работа с кнопкой Добавления Блога///

    $('.add-blog-container>.blog-btns>.add-btn').on('click', function () {
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
                var parsedResponse = JSON.parse(response);
                $('.blog-main-container').after('<div class="blog-card">< img src = " '+ parsedResponse.image + '" alt = "изображение"><div class="card-info"><p class="card-title"> ' + parsedResponse.title + '</p><a href="#"><p class="card-desc"> ' + parsedResponse.description + '</p></a><div class="cacki"><p class="card-category"> ' + parsedResponse.category_id + '</p></div></div></div > ');

            },
            error: function (jqXHR, textStatus, errorThrown) {
                // Обработка ошибки AJAX
                console.log('Ошибка выполнения запроса:', textStatus, errorThrown);
            }
        });
    })


    ///////////////////////////////работа с Фильтром

    $('.filter-btn').on('click', function () {
        var filter = $('#myFilter');
        var btn = $('.filter-btn>span');

        if (filter.css('display') === 'none') {
            filter.css('display', 'block');
            btn.html('&#9660;');
        } else {
            filter.css('display', 'none');
            btn.html('&#9658');
        }
    });
});