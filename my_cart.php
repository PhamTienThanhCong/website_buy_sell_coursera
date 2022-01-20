<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <link rel="stylesheet" href="./css/header.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
</head>
<style>
    #my-cart{
        background-color: #e8ebed;
    }
    .content{
        width: calc(100% - 470px);
        margin-left: 20px;
    }
    .all-course{
        width: 100%;
        min-height: 500px;
        border-radius: 20px;
        border: 1px solid #ccc;
        padding: 15px;
    }
    .tab-right{
        width: 300px;
        display: inline-block;
        margin-left: 20px;
        position: relative;
    }
    .in4{
        width: 300px;
        position: fixed;
    }
    .my-infor{
        height: 350px;
        width: 100%;
        border-radius: 20px;
        border: 1px solid #ccc;
        padding: 10px
    }
    .course{
        width: 100%;
        height: 200px;
    }
    table,
    td,
    th {
        border: 1px solid #ddd;
        text-align: left;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        padding: 10px;
        font-weight: normal;
        text-align: center;
    }
    tr th a{
        text-decoration: none;
        color: black;
    }
    tr th a i{
        transform: translateY(2px);
    }
    .btn-delete{
        cursor: pointer;
        padding: 8px 12px;
        border-radius: 8px;
        background-color: #ff3333;
        transition: all 0.5s;
    }
    .btn-delete:hover{
        background-color: #ff6666;
    }
    .input-check{
        cursor: pointer;
    }
    .total-price{
        margin-top: 15px;
        font-size: 18px;
    }
    .emty-cart{
        width: 100%;
        text-align: center;
        margin-top: 25px;
        font-size: 20px;
    }
    
</style>
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
        $all_cart = $_SESSION['cart'];
        $number_cart = count($all_cart);
    ?>
    <div class=content> 
        <div class = "all-course">
            <h2 style="text-align: center;">Thông tin giỏ hàng của bạn</h2>
            <br>
            <div class="course">
                <table>
                    <tr>
                        <th>Tên</th>
                        <th>Tác giả</th>
                        <th>Số bài</th>
                        <th>Giá</th>
                        <th>Tương tác</th>
                        <th>Mua</th>
                    </tr>
                    <?php if ($number_cart > 0) { ?>
                    <?php foreach($all_cart as $id => $cart) { ?>
                        <tr>
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
                                <a class = "btn-delete" data-id='<?php echo $id ?>'>
                                    Xóa
                                    <i class='bx bx-trash'></i> 
                                </a>
                            </th>
                            <th>
                                <input data-price='<?php echo $cart['price'] ?>' data-id='<?php echo $id ?>' class = "input-check" type="checkbox" check="false">
                            </th>
                        </tr>
                    <?php } ?>
                </table>
                <?php }else{ ?>
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
                <h3>Thông tin thẻ</h3>
            </div>
        </div>
    </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="./script/my_cart.js"></script>
</body>
</html>