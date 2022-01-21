let total_price = 0;
let course = [];

function convetArrayToString(a){
    var ArrayString = "";
    for (var i=0; i<a.length; i++){
        ArrayString = ArrayString + a[i]
        if(i<a.length-1){
            ArrayString = ArrayString + ","
        }
    }
    return ArrayString;
}

const totalPrice = () =>{
    let x = total_price.toLocaleString('vi', {style : 'currency', currency : 'VND'});
    var money = $('#my-money').data('currency');
    money = money - total_price;

    $('.total-price').html("Tổng Tiền "+ x +"");
    $('#currency-pay').html("Số Tiền phải trả: "+x+"");
    
    x = money.toLocaleString('vi', {style : 'currency', currency : 'VND'});  

    $('#currency-money').html("Số tiền thừa thiếu: " + x + "");

    $('#number-course').html("Số lượng bài học bạn mua: "+ course.length +"")

    $('#mat-hang-se-mua').attr('value', convetArrayToString(course));
}

$(document).ready(function () {
    $('#stk').html("Số tài khoản: " + Math.floor(Math.random() * 100000) + "" + Math.floor(Math.random() * 100000));

    $('.input-check').change(function(){
        if ($(this).attr('check') == 'false'){
            $(this).attr('check','true')
            let price = $(this).data('price');
            let id = $(this).data('id')
            total_price += parseInt(price);
    
            course.push(id)
        }else if ($(this).attr('check') == 'true'){
            $(this).attr('check','false')
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
    
    $('.btn-delete').click(function(){
        let id = $(this).data('id')
        $.ajax({
            type: "POST",
            url: "./processing/my_cart_delete.php",
            data: {id},
            // dataType: "dataType",
            success: function (response) {
                
            }
        });
        if ($(this).parent().parent().find(".input-check").attr('check')=="true"){
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
    })
    
    $("#btn-logout").click(function() {
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
        document.getElementById('buy-course').click();
    })
});

