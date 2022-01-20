$(document).ready(function() {
    $(".btn-add-to-cart").click(function() {
        let id = $(this).data("id");
        $.ajax({
            type: "POST",
            url: "./processing/my_cart.php",
            data: {id},
            // dataType: "dataType",
            success: function (response) {
                
            }
        });
        $(this).html("<i class='bx bxs-cart-download'></i> Đã đặt")
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
        $(this).parent().html("<a href='./login_and_register.php'>Đăng nhập</a>")
    })
})