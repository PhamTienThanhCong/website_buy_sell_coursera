<?php
session_start();
if (isset($_SESSION['lever'])) {
    session_destroy();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/my_cart.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
</head>

<body>
    <?php
    if (!function_exists('currency_format')) {
        function currency_format($number, $suffix = ' VND')
        {
            if (!empty($number)) {
                return number_format($number, 0, ',', '.') . "{$suffix}";
            }
        }
    }
    require "./default/header.php";
    $number_cart = 0;
    if (isset($_SESSION['cart'])) {
        $all_cart = $_SESSION['cart'];
        $number_cart = count($all_cart);
    }
    ?>
    <div class=content>
        <div class="all-course">
            <h2 style="text-align: center;">Thông tin giỏ hàng của bạn</h2>
            <br>
            <div class="course">
                <table id="course-table">
                    <tr>
                        <th>Tên</th>
                        <th>Tác giả</th>
                        <th>Số bài</th>
                        <th>Giá</th>
                        <th>Tương tác</th>
                        <th>Mua</th>
                    </tr>
                    <?php if ($number_cart > 0) { ?>
                        <?php foreach ($all_cart as $id => $cart) { ?>
                            <tr id="course<?php echo $id ?>">
                                <th>
                                    <a href="./view_course.php?id=<?php echo $id ?>">
                                        <?php echo $cart['name']; ?>
                                    </a>
                                </th>
                                <th>
                                    <?php echo $cart['author']; ?>
                                </th>
                                <th>
                                    <?php echo $cart['lesson']; ?>
                                </th>
                                <th>
                                    <?php echo currency_format($cart['price']) ?>
                                </th>
                                <th>
                                    <a class="btn-delete" data-id='<?php echo $id ?>'>
                                        Xóa
                                        <i class='bx bx-trash'></i>
                                    </a>
                                </th>
                                <th>
                                    <input data-price='<?php echo $cart['price'] ?>' data-id='<?php echo $id ?>' class="input-check" type="checkbox" check="false">
                                </th>
                            </tr>
                        <?php } ?>
                </table>
            <?php } else { ?>
                </table>
                <p class="emty-cart">
                    Giỏ hàng trống, mua sắm ngay
                    <a href="./index.php">Tại đây</a>
                </p>
            <?php } ?>
            <p class="total-price">
                Tổng Tiền: 0 đ
            </p>
            </div>
        </div>
    </div>
    <div class="tab-right">
        <div class="in4">
            <div class="my-infor">
                <h3>
                    <i class='bx bx-credit-card'></i>
                    Thông tin thanh toán
                </h3>
                <br>
                <?php if (isset($_SESSION['id']) == true) { ?>
                    <p>
                        Tên : <?php echo $_SESSION['name'] ?>
                    </p>
                    <br>
                    <p id="stk">
                        Số tài khoản:
                    </p>
                    <br>
                    <p>
                        Ngân hàng Quân đội (MBBANK)
                    </p>
                    <br>
                    <form method="post" action="./processing/my_cart_buy.php">
                        <input name="course" id="mat-hang-se-mua" type="hidden">
                        <button id="buy-course" style="display: none">btn an</button>
                    </form>
                <?php } else { ?>
                    Chưa có thông tin. <br> Bạn phải <a href="login_and_register.php">đăng nhập</a>
                    <p id="my-money" data-currency="0"></p>
                <?php } ?>
            </div>
            <div class="my-infor">
                <h3>
                    <i class='bx bx-cart'></i>
                    Thông tin về mặt hàng
                </h3>
                <br>
                <p id="currency-pay">
                    Số Tiền phải trả: 0
                </p>
                <p id="number-course">
                    Số lượng bài học bạn mua: 0
                </p>
            </div>
            <lable id="listen-buy-course" class="buy">Mua hàng ngay</lable>
        </div>
    </div>
    <?php require "./default/footer.php" ?>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script type="text/javascript" src="./script/my_cart.js"></script>
    <script type="text/javascript" src="./script/all.js" ></script>

</body>

</html>