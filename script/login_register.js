const validateEmail = (email) => {
    return String(email)
        .toLowerCase()
        .match(
            /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        );
};
function validatePhoneNumber(input_str) {
    var re = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;

    return re.test(input_str);
}
$(document).ready(function () {
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

    $('#form-register').submit(function () {
        event.preventDefault();
        var check = true;
        if (validateEmail(document.getElementById('email-register').value)) {
            console.log()
        } else {
            check = false;
            toastr["error"]("email này không hợp lệ", "Lỗi email");
            $('#alert-register').html('email không hợp lệ');
            $('#alert-register').removeClass('hidden');
        }

        if ((validatePhoneNumber(document.getElementById('phone-number-register').value))==false) {
            check = false;
            toastr["error"]("Số điện thoại không hợp lệ", "Lỗi phone number");
            $('#alert-register').html('Số điện thoại không hợp lệ');
            $('#alert-register').removeClass('hidden');
        }

        if (check) {
            $.ajax({
                type: "POST",
                url: "./processing/register.php",
                dataType: "html",
                data: $(this).serializeArray(),
            })
                .done(function (response) {
                    if (response == 0) {
                        $('#alert-register').html('Email này không hợp lệ hoặc đã được sử dụng');
                        toastr["error"]("Email này không hợp lệ hoặc đã đuược sử dụng", "Lỗi email");
                        $('#alert-register').removeClass('hidden');
                    } else if (response == 1) {
                        $('#alert-register').html('số điện thoại đăng kí không hợp lệ');
                        toastr["error"]("Số điện thoại không hợp lệ", "Lỗi phone number");
                        $('#alert-register').removeClass('hidden');
                    } else if (response == 4) {
                        $('#alert-register').html('Password không đủ mạnh');
                        toastr["error"]("Password không đủ mạnh", "Lỗi Password");
                        $('#alert-register').removeClass('hidden');
                    }else if (response == 3) {
                        document.getElementById('flip').click();
                        $('#alert-login').html('Đăng kí tài khoản thành công! vui lòng đăng nhập lại');
                        $('#alert-login').removeClass('hidden');
                        $('#alert-login').css('color', 'blue');
                    }
                    else{
                        $('#alert-register').html('Phần tử không được để trống');
                        toastr["error"]("Phần tử không được để trống", "Lỗi đăng kí");
                        $('#alert-register').removeClass('hidden');
                    }
                })
        }
    })
    $('#login-form').submit(function () {
        event.preventDefault();
        var check = true;
        
        if (validateEmail(document.getElementById('email-login').value)) {
            console.log()
        } else {
            check = false;
            toastr["error"]("email này không hợp lệ", "Lỗi email");
            $('#alert-login').html('email không hợp lệ');
            $('#alert-login').removeClass('hidden');
        }

        if (check) {
            $.ajax({
                type: "POST",
                url: "./processing/login.php",
                dataType: "html",
                data: $(this).serializeArray(),
            })
                .done(function (response) {
                    if (response == "1") {
                        document.getElementById('back-home').click();
                    }else {
                        toastr["error"]("Email hoặc mật khẩu không đúng", "Lỗi đăng nhập");
                        $('#alert-login').html('Email hoặc mật khẩu không đúng');
                        $('#alert-login').removeClass('hidden');
                    } 
                })
        }
    })
})