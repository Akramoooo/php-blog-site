$(document).ready(function(){
    $('.card-desc').each(function(){
      var maxLength = 30;
      var text = $(this).text();
      var trimmedText = $.trim(text).split(" ", maxLength).join(" ");
      if (text.length > trimmedText.length) {
            trimmedText = trimmedText + "...";
      }
      $(this).text(trimmedText);
    });

    $('.blog-card').mouseover(function(){
        $(this).stop().animate({'width':'100%', 'margin-left':'0'});
    });

    $('.blog-card').mouseout(function(){
        $(this).stop().animate({'width':'90%', 'margin-left':'5%'});
    });
  });