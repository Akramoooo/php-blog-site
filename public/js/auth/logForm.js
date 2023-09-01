$(document).ready(function () {
    var userData ;
    $('.reg-btn').on('click', function () {
        var emailEl = $('form>div .email').val();
        var passwordEl = $('form>div .password').val();
        $.ajax({
            url: '/auth/check-is-have',
            method: 'POST',
            data: { emailEl: emailEl, passwordEl: passwordEl },
            success: function (data) {
                userData = data;
            }
        });

        $('.error').remove()
        if (emailEl == '') {
            $('form>div .email').after('<p class="error">Поле email должно быть заполнено </p>');
        } else if (passwordEl == '' || passwordEl.length < 8) {
            $('form>div .password').after('<p class="error">Поле password должно иметь не меньше 8 символов</p>');
        } else if (userData == null) {
            $('form>div .password').after('<p class="error">Нету такого пользователя</p>');
        } else {
            $('.reg-btn').attr('type', 'submit')
        }
    })
});
