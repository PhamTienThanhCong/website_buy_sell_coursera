var loadFile = function (event) {
    var output = document.getElementById('avatar-preview');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function () {
        URL.revokeObjectURL(output.src) // free memory
    }
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

    $("#btn-logout").click(function () {
        $.ajax({
            type: "GET",
            url: "./processing/logout.php",
            // data: {id},
            // dataType: "dataType",
            success: function (response) {
                document.getElementById("click_home").click();
            }
        });
    })

    $('.btn-primary').click(function () {
        let content_submit = $('#my-in4').html();
        content_submit = content_submit.replaceAll('readonly=', '');
        content_submit = content_submit.replaceAll('input-in4', 'input-in4 input-replace');
        content_submit = content_submit.replaceAll('<input type="hidden">', '<label for="">Ảnh mới: </label><input type="file" id="file" name="image_user" class="input-image" onchange="loadFile(event)">')
        content_submit = content_submit.replaceAll('<input name="passworld" type="hidden">', `<label for="">Mật khẩu: </label> <input class="input-in4 input-replace" type="password" name="password" required> <br>`)
        content_submit = content_submit.replaceAll('class="btn btn-primary" type="button"', 'class="btn btn-danger" type="submit" ')
        content_submit = content_submit.replaceAll('Sửa đổi và bổ sung', 'Xác nhận và lưu lại')
        content_submit = content_submit.replaceAll('<button id="change-danger" class="btn btn-danger" type="button">Chỉnh sửa nâng cao</button>', ' ')
        $('#my-in4').html(content_submit);
    })

    if ($('#alert-account').val() == '1') {
        toastr["success"]("Thay đổi thôn tin cá nhân thành công", "Thành công");
    } else if ($('#alert-account').val() == '0') {
        toastr["error"]("Thay đổi thôn tin thất bại", "Lỗi");
    } else if ($('#alert-account').val() == '2') {
        toastr["error"]("Thay đổi thôn tin thất bại :)", "Lỗi Số điện thoại");
    } else if ($('#alert-account').val() == '3') {
        toastr["error"]("Thay đổi thôn tin thất bại :)", "Lỗi email");
    }

    $('#change-danger').click(function () {
        document.getElementById('my-password').style.display = 'inline-block';
        $('#change-danger').css('display', 'none');
    })
    $('#my-password').submit(function () {
        event.preventDefault();

        if ($('#new-password').val() == $('#confirm-password').val()) {
            $.ajax({
                type: "POST",
                url: "./processing/my_account_change_password.php",
                dataType: "html",
                data: $(this).serializeArray(),
            })
                .done(function (response) {
                    if (response == 0) {
                        // alert('Mật khẩu không đúng');
                        toastr["error"]("Mật khẩu không đúng", "Lỗi");
                    } else if (response == 2) {
                        toastr["error"]("Bạn vừa nhập mật khẩu cũ", "Lỗi");
                    }else if (response == 4) {
                        toastr["error"]("Mật khẩu không đủ mạnh", "Lỗi");
                    } else if (response == 1) {
                        toastr["success"]("Thay đổi mật khẩu thành công", "Thành công");
                        $('#old-password').val('');
                        $('#new-password').val('');
                        $('#confirm-password').val('');
                        document.getElementById('my-password').style.display = 'none';
                        $('#change-danger').css('display', 'inline-block');
                    }
                })
        } else {
            toastr["error"]("Mật khẩu xác nhận ko khớp", "Lỗi");
        }

    })

    // $('#my-in4').submit(function(event){
    //     event.preventDefault();

    //     var check = true;

    //     if (validatePhoneNumber(document.getElementById("phone_number_check").value) == false){
    //         console.log("sai")
    //         toastr["error"]("Số điện thoại của bạn không đúng định dạng", "Lỗi Số Điện Thoại");
    //         check = false;
    //     }

    //     if (check){
    //         $('#my-in4').submit();
    //     }

    // })
})