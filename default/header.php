<header>
    <h2>Shop Group 59 </h2>
        <form autocomplete="off" id="search" method="get" action="./index.php">
            <i class='search bx bx-search'></i>
            <input type="text" name="search" id="project" placeholder="Tìm kiếm khóa học mà bạn thích" onkeyup="showResult()">
            <!-- <input type="hidden" id="project-id"> -->
        </form>
        <div id="live-search" class = "hidden-search">

            

        </div>
    <?php if (isset($_SESSION['name'])) { ?>
        <div class='user-login'>
            <div class='user-avatar'>
                <?php if ($_SESSION['image'] == 'null') { ?>
                    <img src="./public/images/default/avata.png" alt="">
                <?php } else { ?>
                    <img src="./public/images/upload/<?php echo $_SESSION['image'] ?>" alt="">
                <?php } ?>
                <ul class="sub-nav-user menu-select">
                    <li class="sub-nav">
                        <a href="./my_account.php">Tài khoản của tôi</a>
                    </li>
                    <li class="sub-nav">
                        <a href="./my_cart.php">Giỏ hàng của tôi</a>
                    </li>
                    <li class="sub-nav">
                        <a id="btn-logout" style="cursor: pointer">Đăng xuất</a>
                    </li>
                </ul>
            </div>
            <div class='user-name'>
                <?php echo $_SESSION['name'] ?>
            </div>
        </div>
    <?php } else { ?>
        <div class=user>
            <a class="user-a" href="./login_and_register.php">Đăng nhập</a>
        </div>
    <?php } ?>


</header>
<div class="hinder"></div>
<div class="container">
    <ul class="menu-select">
        <li class="li-header" id="home">
            <a id="click_home" href="./index.php">
                <i class='bx bxs-home'></i>
                <br>
                Trang chủ
            </a>
        </li>
        <li class="li-header" id="my-sourse">
            <a href="./my_course.php">
                <i class='bx bxs-book-content'></i>
                <br>
                Khóa học
            </a>
        </li>
        <li class="li-header" id="my-cart">
            <a href="./my_cart.php">
                <i class='bx bxs-cart'></i>
                <br>
                Giỏ hàng
            </a>
        </li>
        <li class="li-header" id="my-account">
            <a id="my-account-click" href="./my_account.php">
                <i class='bx bxs-user'></i>
                <br>
                Tài khoản
            </a>
        </li>
    </ul>
    <div class="tab-left"></div>