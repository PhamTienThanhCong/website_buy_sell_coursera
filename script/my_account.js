var loadFile = function(event) {
    var output = document.getElementById('avatar-preview');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
    }
};

$(document).ready(function() {

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
        content_submit = content_submit.replaceAll('<input type="hidden">','<label for="">Ảnh mới: </label><input type="file" id="file" name="image_user" class="input-image" onchange="loadFile(event)">')
        content_submit = content_submit.replaceAll('<input name="passworld" type="hidden">',`<label for="">Mật khẩu: </label> <input class="input-in4 input-replace" type="password" name="password"> <br>`)
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

        if($('#new-password').val() == $('#confirm-password').val()){
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
        }else{
            alert('Mật khẩu xác nhận ko khớp');
        }
   
    })

    // $('#my-in4').submit(function(event){
        // event.preventDefault();

        // var file_data = $('#file').prop('files')[0];

        // $.ajax({
        //     type: "POST",
        //     url: "./processing/my_account_update.php",
        //     dataType: "html",
        //     data: $(this).serializeArray(),
        // })
        
        // .done(function(response){
        //     if(response == '0'){
        //         alert('Mật khẩu không đúng');
        //     }else if(response == '1'){
        //         document.getElementById('my-account-click').click();
        //         $('#my-in4').submit();
        //     }
        // })
    // })
})