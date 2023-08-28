$(document).ready(function(){
    ///////////работа с описанием//////////////////
    $('.card-desc').each(function(){
      var maxLength = 30;
      var text = $(this).text();
      var trimmedText = $.trim(text).split(" ", maxLength).join(" ");
      if (text.length > trimmedText.length) {
            trimmedText = trimmedText + "...";
      }
      $(this).text(trimmedText);
    });
    ////////////////работа с постами///////////////
    $('.blog-card').mouseover(function(){
        $(this).stop().animate({'width':'100%', 'margin-left':'0'});
    });

    $('.blog-card').mouseout(function(){
        $(this).stop().animate({'width':'90%', 'margin-left':'5%'});
    });

    //////////////работа с блог текстом////////////

    $('.blog-icon').mouseover(function(){
        $(this).append('<span>Akramoooo</span>');
        $('span').css({'color':'red', 'font-size':'10px'});

    });

    $('.blog-icon').mouseout(function(){
        $(this).text('Blogs');
        $(this).remove('<span>Akramoooo</span>')
    });

    ///////////////////////работа с кнопкой Добавления Блога///

    $('.add-blog-container>button').on('click', function(){
        $('#myForm').fadeIn(400).css({'display':'block'})
    });

    $('.leave-btn>p').on('click', function(){
        $('#myForm').fadeOut(400)
    });


    ///////////////////////////////
  });