$(document).ready(function(){
    $('.shares>div').on('mouseenter',function(){
        $(this).stop().animate({'width':'380px', 'height':'430px'},400);
    });

    $('.shares>div').on('mouseleave',function(){
        $(this).stop().animate({'width':'350px', 'height':'400px'},400);
    });
});