var loadFile = function(event) {
    var output = document.getElementById('avatar-preview');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
    }
};

$(document).ready(function() {
    $('#stk').html("Số tài khoản: " + Math.floor(Math.random() * 100000) + "" + Math.floor(Math.random() * 100000));

    $("#btn-logout").click(function() {
    $.ajax({
        type: "GET",
        url: "./processing/logout.php",
        // data: {id},
        // dataType: "dataType",
        success: function (response) {    
        }
    });
        document.getElementById("click_home").click()
    })

    $('.btn-primary').click(function() {
        let content_submit = $('#my-in4').html();
        content_submit = content_submit.replaceAll('readonly=', '');
        content_submit = content_submit.replaceAll('input-in4', 'input-in4 input-replace');
        content_submit = content_submit.replaceAll('<input type="hidden">','<label for="">Ảnh mới: </label><input type="file" name="image_user" class="input-image" onchange="loadFile(event)">')
        content_submit = content_submit.replaceAll('class="btn btn-primary" type="button"', 'class="btn btn-danger" type="submit" ')
        content_submit = content_submit.replaceAll('Sửa đổi và bổ sung','Xác nhận và lưu lại')
        content_submit = content_submit.replaceAll('<button id="change-danger" class="btn btn-danger" type="button">Chỉnh sửa nâng cao</button>',' ')
        $('#my-in4').html(content_submit);
    })

    $('#change-danger').click(function(){
        document.getElementById('my-password').style.display = 'inline-block';
        $('#change-danger').remove();
    })
    $('#my-password').submit(function(){
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "./processing/my_account_change_password.php",
            dataType: "html",
            data: $(this).serializeArray(),
        })
        .done(function(response){
            if(response == 0){
                alert('Mật khẩu không đúng');
            }else if(response == 1){
                document.getElementById('my-account-click').click();
            }
        })
    })
})