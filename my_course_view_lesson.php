<?php
    session_start();
    if (isset($_SESSION['id']) == false){
        header('Location: ./login_and_register.php');
    }
    $id_user = $_SESSION['id'];

    $id_course = addslashes($_GET['idcourse']);
    $number_video = 0;
    if (isset($_GET['number_video'])){
        $number_video = addslashes($_GET['number_video']);
    }  
    require "./public/connect_sql.php";

    $sql = "SELECT course.*, lesson.* FROM `course` 
            LEFT OUTER JOIN lesson ON course.id_course = lesson.id_course
            WHERE course.id_course = '$id_course'
            GROUP BY lesson.id_lesson
            LIMIT 1 OFFSET $number_video";

    $course = mysqli_query($connection, $sql);
    $one_course = mysqli_fetch_array($course);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./css/header.css">
    <title><?php echo $one_course['name_course']?></title>
</head>
<style>
    #my-sourse {
        background-color: #e8ebed;
    }
    .content{
        width: calc(100% - 400px);
        height: 400px;
        background-color: #e8ebed;
    }
    .tab-right{
        width: 260px;
        background-color: #ccc;
        height: 450px;
        margin-left: 10px;
    }
</style>
<body>
    <?php require "./default/header.php"; ?>
        <div class=content>
            <iframe width="100%" height="488" src="https://www.youtube.com/embed/<?php echo $one_course['link_ytb_lesson']?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <h2>
                <?php echo $one_course['name_lesson']?>
            </h2>
            <br>
            <h4>
                Chú Thích
            </h4>
            <p>
                <?php echo nl2br($one_course['description_lesson'])?>
            </p>
            <br>
            <h4>
                Bình luận
            </h4>
        </div>
        <div class="tab-right"></div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    
</script>
</html>