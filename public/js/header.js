$(document).ready(function () {
    $('.left-panel>ul>li').on('mouseenter', function () {
        $(this).stop().animate({
            backgroundColor: 'yellow'
        }, 400);
    });
    $('.left-panel>ul>li').on('mouseleave', function () {
        $(this).stop().animate({backgroundColor: initialBackgroundColor},400);
    });
});