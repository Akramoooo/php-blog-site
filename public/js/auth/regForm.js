$(document).ready(function(){
    $('.reg-btn').on('click', function(){
        var nameEl = $('form>div .name').val();
        var emailEl = $('form>div .email').val();
        var passwordEl = $('form>div .password').val();
        var confirmEl = $('form>div .confirm').val();
        $('.error').remove()
        if(nameEl == '' || nameEl.length < 5){
            $('form>div .name').after('<p class="error">Поле name должно быть не меньше 5 символов </p>');
        }else if(emailEl == ''){
            $('form>div .email').after('<p class="error">Поле email должно быть заполнено </p>');
        }else if(passwordEl == '' || passwordEl.length < 8){
            $('form>div .password').after('<p class="error">Поле password должно иметь не меньше 8 символов</p>');
        }else if(confirmEl == '' || confirmEl != passwordEl){
            $('form>div .confirm').after('<p class="error">Неправильно введено подтверждение</p>');
        }else{
            $(this).attr('type', 'submit');
        }
    })
});