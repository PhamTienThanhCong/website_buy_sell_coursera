$(document).ready(function() {
    $('#form-register').submit(function(){
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "./processing/register.php",
            dataType: "html",
            data: $(this).serializeArray(),
        })
        .done(function(response){
            if(response == 0){
                $('#alert-register').html('Email này đã được sử dụng');
                $('#alert-register').removeClass('hidden');
            }else if(response == 1){
                document.getElementById('flip').click();
                $('#alert-login').html('Đăng kí tài khoản thành công! vui lòng đăng nhập lại');
                $('#alert-login').removeClass('hidden');
                $('#alert-login').css('color', 'blue');
            }
        })
    })
    $('#login-form').submit(function(){
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "./processing/login.php",
            dataType: "html",
            data: $(this).serializeArray(),
        })
        .done(function(response){
            if(response == 0){
                $('#alert-login').html('Email hoặc mật khẩu không đúng');
                $('#alert-login').removeClass('hidden');
            }else if(response == 1){
                document.getElementById('click_home').click();
            }
        })
    })
})