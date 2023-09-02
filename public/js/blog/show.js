$(document).ready(function () {
    $('.comment-main-container>button').on('click', function () {
        var commentEl = $('.comment-main-container .send-comment input').val();
        var postId = $('.blog-card').data('post-id')
        $('.comment-main-container .send-comment input').val('')
        
        $.ajax({
            url: '/blog/add-comment',  
            method: 'post',   
            data: { comment: commentEl, id: postId},  
            success: function (data) { 
                console.log('Успешно:', data);   
                $('.comment-chat').append('<p class="comment-message">'+ commentEl +'</p>');    
            }
        });
    });
});