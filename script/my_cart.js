let total_price = 0;
let course = [];
var course_was_bought;

function convetArrayToString(a) {
    var ArrayString = "";
    for (var i = 0; i < a.length; i++) {
        ArrayString = ArrayString + a[i]
        if (i < a.length - 1) {
            ArrayString = ArrayString + ","
        }
    }
    return ArrayString;
}

const totalPrice = () => {
    let x = total_price.toLocaleString('vi', {style: 'currency', currency: 'VND'});

    $('.total-price').html("Tổng Tiền " + x + "");
    $('#currency-pay').html("Số Tiền phải trả: " + x + "");

    // x = money.toLocaleString('vi', {style : 'currency', currency : 'VND'});  

    $('#number-course').html("Số lượng bài học bạn mua: " + course.length + "")

    $('#mat-hang-se-mua').attr('value', convetArrayToString(course));
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
    
    $('#stk').html("Số tài khoản: " + Math.floor(Math.random() * 100000) + "" + Math.floor(Math.random() * 100000));

    $('.input-check').change(function () {
        if ($(this).attr('check') == 'false') {
            $(this).attr('check', 'true')
            let price = $(this).data('price');
            let id = $(this).data('id')
            total_price += parseInt(price);

            course.push(id)
        } else if ($(this).attr('check') == 'true') {
            $(this).attr('check', 'false')
            let price = $(this).data('price');
            let id = $(this).data('id')
            total_price -= parseInt(price);

            var index = course.indexOf(id);
            if (index !== -1) {
                course.splice(index, 1);
            }
        }
        totalPrice()
    })

    $('.btn-delete').click(function () {
        let id = $(this).data('id')
        $.ajax({
            type: "POST",
            url: "./processing/my_cart_delete.php",
            data: {id},
            // dataType: "dataType",
            success: function (response) {
                toastr["info"]("Xóa sản phẩm thành công", "Thông báo");
            }
        });

        // Khi xóa mặt hàng đã chọn cần giảm tiền mua của sản phẩm xóa
        if ($(this).parent().parent().find(".input-check").attr('check') == "true") {
            let price = $(this).parent().parent().find(".input-check").data('price');
            let id = $(this).parent().parent().find(".input-check").data('id')
            total_price -= parseInt(price);

            var index = course.indexOf(id);
            if (index !== -1) {
                course.splice(index, 1);
            }
        }
        totalPrice()
        $(this).parent().parent().remove()
        checkNullCart()
    })

    $("#btn-logout").click(function () {
        $.ajax({
            type: "GET",
            url: "./processing/logout.php",
            // data: {id},
            // dataType: "dataType",
            success: function (response) {
            }
        });
        $('.user-login').html('<a class="user-a" href="./login_and_register.php">Đăng nhập</a>');
        $('.user-login').addClass('user');
        $('.user').removeClass('user-login');
    })

    $('#listen-buy-course').click(function () {
        try {
            document.getElementById('buy-course').click();
        } catch (e) {
            window.location.href="login_and_register.php";
        }

    })

    // kiểm tra khóa học đã mua
    checkCourse()
});

// Hàm kiểm tra xem khóa học này đã mua hay chưa
function checkCourse(){
    $.ajax({
        url: "./processing/my_cart_check_bought.php",
        dataType: "json",
    })
    .done(function(response){
        course_was_bought = response
        var ThongBao = "Thông báo các khóa học đã được mua, không thể mua lại: \n";
        if (course_was_bought.length > 0) {
            for (var i = 0; i < course_was_bought.length; i++) {
                var id = "#course"+course_was_bought[i].id
                $(id).remove();
                ThongBao += (i+1) + ": " + course_was_bought[i].name + "\n";
            }
            checkNullCart()
            // alert(ThongBao)
            toastr["warning"](ThongBao,"Cảnh báo");
        }
    })
    
}
// Hàm kiểm tra xem khóa học này đã mua hay chưa

// hàm kiểm tra xem đã xáo hết khóa học hay chưa
function checkNullCart(){
    var size = document.getElementById('course-table').innerText.length;
    if (size < 40){
        $('.course').html(` <table id = "course-table">
                                <tr>
                                    <th>Tên</th>
                                    <th>Tác giả</th>
                                    <th>Số bài</th>
                                    <th>Giá</th>
                                    <th>Tương tác</th>
                                    <th>Mua</th>
                                </tr>
                            </table>
                            <p class="emty-cart">
                                Giỏ hàng trống, mua sắm ngay
                                <a href="./index.php">Tại đây</a>
                            </p>
                            <p class="total-price">
                                Tổng Tiền: 0 đ
                            </p>
                            `)
    }
}
// hàm kiểm tra xem đã xáo hết khóa học hay chưa

