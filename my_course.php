<?php
    session_start();
    if (isset($_SESSION['lever'])){session_destroy();}
    if (isset($_SESSION['id']) == false){
        header('Location: ./login_and_register.php');
    }
    $id_user = $_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Khóa học của tôi</title>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/index.css">
</head>
<style>
    #home{
        background-color: #fff;
    }
    #my-sourse {
        background-color: #e8ebed;
    }
    .btn{
        border: none;
        margin-left: 0  ;
    }
</style>

<body>
    <?php
    require "./default/header.php";
    $search = "";
    if (isset($_GET["search"])) {
        $search = $_GET["search"];
    }
    if (!function_exists('currency_format')) {
        function currency_format($number, $suffix = ' VND')
        {
            if (!empty($number)) {
                return number_format($number, 0, ',', '.') . "{$suffix}";
            }
        }
    }    

    require "./public/connect_sql.php";
    $sql = "SELECT
                course.id_course,
                course.name_course,
                course.author,
                course.image_course,
                course.status_course,
                COUNT(course.id_course) AS number_course
            FROM
                course
            INNER JOIN oder ON oder.id_course = course.id_course
            LEFT OUTER JOIN lesson ON course.id_course = lesson.id_course
            WHERE
                oder.id_user = '$id_user'
            GROUP BY
                course.id_course";
    $all_courses = mysqli_query($connection, $sql);

    ?>
    <div class=content>
        <div class="all-course">
            <h2 style="width: 100%">
                <?php if ($search != "") {
                    echo "Tìm kiếm kết quả cho $search";
                } else {
                    echo "Khóa học của tôi";
                }
                ?>
            </h2>
            <?php foreach ($all_courses as $course) { ?>
                <div class="card">
                    <a href="<?php if($course['status_course']==0){
                            echo "#";
                    } else
                    print("./my_course_view_lesson.php?idcourse=${course['id_course']}") ?>">
                        <div class="img-preview">
                            <img src="./public/images/upload/<?php echo $course['image_course'] ?>" alt="Avatar" style="width:100%">
                        </div>
                    </a>
                    <div class="container-card">
                        <br><h3><b>
                        <?php if($course['status_course']==0){
                            echo "Khóa học chưa được chấp thuận";
                        }else {?>
                        <a href="./my_course_view_lesson.php?idcourse=<?php echo $course['id_course'] ?>">
                            <?php echo $course['name_course'] ?>
                        </a>
                        <?php } ?></b></h3>
                        <p>
                            <i class='bx bxs-videos'></i>
                            Tổng số bài học:
                            <?php echo $course['number_course'] ?>
                        </p>
                        <p>
                            <i class='bx bxs-user'></i>
                            Tác giả:
                            <?php echo $course['author'] ?>
                        </p>
                        <br>
                        <a class='btn' href="./view_course.php?id=<?php echo $course['id_course'] ?>">
                            Đánh giá ngay
                            <i class='bx bx-star'></i>
                        </a>
                    </div>
                </div>
            <?php } ?>
            <div class="clear"></div>
        </div>
    </div>
    <?php require "./default/footer.php" ?>
    <div class="tab-right"></div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
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
    })
</script>
<script type="text/javascript" src="./script/all.js" ></script>
</html>