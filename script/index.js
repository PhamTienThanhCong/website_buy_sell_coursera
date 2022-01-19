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
})