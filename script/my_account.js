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
        content_submit = content_submit.replaceAll('<input type="hidden">','<label for="">Ảnh mới: </label><input type="file" name="image_user" class="input-image" onchange="loadFile(event)">')
        content_submit = content_submit.replaceAll('class="btn btn-primary" type="button"', 'class="btn btn-danger" type="submit" ')
        content_submit = content_submit.replaceAll('Sửa đổi và bổ sung','Xác nhận và lưu lại')
        $('#my-in4').html(content_submit);
    })
})