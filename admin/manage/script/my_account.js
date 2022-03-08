function edit() {
    var a = document.getElementById("user-in4").innerHTML;
    a = a.replaceAll("readonly=", "");
    a = a.replace('<input type="hidden" id="img" name="image">', '<label for="img">Ảnh mới: </label><input type="file" id="img" name="image" onchange="loadFile(event)">')
    a = a.replace('<button id="btn" type="button" onclick="edit()">Sửa</button>', '<button id="btn">Lưu lại</button>')
    document.getElementById("user-in4").innerHTML = a;
    document.getElementById("btn").style.backgroundColor = "red";
    for (let i = 1; i < 5; i++) {
        document.getElementsByTagName('input')[i].style.borderBottom = "1px solid #004080";
    }
}
var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
    }
};
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