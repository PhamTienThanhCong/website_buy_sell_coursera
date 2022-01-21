<?php
    session_start();
    if (isset($_SESSION['id']) == false){
        header('Location: ./login_and_register.php');
    }
    $id_user = $_SESSION['id'];

    $id_course = addslashes($_GET['idcourse']);
    $number_video = 1;
    if (isset($_GET['number_video'])){
        $number_video = addslashes($_GET['number_video']);
    }  
    $number_video = (int)$number_video - 1;
    require "./public/connect_sql.php";

    $sql = "SELECT
                *
            FROM
                `oder`
            WHERE
                (id_user = '$id_user') AND (id_course = '$id_course')";
    
    $check = mysqli_query($connection, $sql);
    $check = mysqli_fetch_array($check);

    if(isset($check['history_lesson'])==false){
        // header('Location: ./my_course.php');
    }

    if($check['history_lesson'] < $number_video+1){
        $number_video = $check['history_lesson']-1;
    }

    $sql = "SELECT
                course.*,
                lesson.*
            FROM
                `course`
            LEFT OUTER JOIN lesson ON course.id_course = lesson.id_course
            WHERE
                course.id_course = '$id_course'
            GROUP BY
                lesson.id_lesson
            LIMIT 1 OFFSET $number_video";

    
    $course = mysqli_query($connection, $sql);
    $one_course = mysqli_fetch_array($course);

    $sql = "SELECT
                course.id_course,
                lesson.name_lesson
            FROM
                `course`
            LEFT OUTER JOIN lesson ON course.id_course = lesson.id_course
            WHERE
                course.id_course = '$id_course'
            GROUP BY
                lesson.id_lesson;";

    $all_lesson = mysqli_query($connection, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/my_course_view_lesson.css">
    <title><?php echo $one_course['name_course']?></title>
</head>
<body>
    <?php require "./default/header.php"; ?>
        <div class=content>
            <iframe width="100%" height="508" src="https://www.youtube.com/embed/<?php echo $one_course['link_ytb_lesson']?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <h2 style="margin-top: 20px">
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
        <div class="tab-lesson">
            <form id="next-course" method="post" action="./processing/my_course_next_lesson.php">
                <input name = "id_course" type="hidden" value = "<?php echo $id_course?>">
                <input name = "check_lesson" type="hidden" value = "<?php echo $number_video+1 ?>">
                <button id = "check-complete">
                    hoàn thành và tiếp tục
                    <i class='bx bx-check'></i>
                </button>
            </form>
            <div class="all-lessons-list">
                <ul>
                    <?php foreach ($all_lesson as $index => $lesson) { ?>
                        <?php if (($index+1 < $check['history_lesson']) && ($index+ 1 != $number_video+1)) { ?>
                            <li class="name-lesson done">
                                <a href="./my_course_view_lesson.php?idcourse=<?php echo $lesson['id_course'] ?>&number_video=<?php echo $index+1 ?>">
                                    <?php echo $lesson['name_lesson']?>    
                                    <i style="color: blue" class='icon-lesson bx bx-check'></i>
                                </a>
                            </li>
                        <?php }else if (($index+1 == $check['history_lesson']) && ($index+ 1 != $number_video+1)) { ?>
                            <li class="name-lesson" style="background-color: #e6e6e6">
                                <a href="./my_course_view_lesson.php?idcourse=<?php echo $lesson['id_course'] ?>&number_video=<?php echo $index+1 ?>">
                                    <?php echo $lesson['name_lesson']?>    
                                    <i class='icon-lesson bx bx-lock-open-alt'></i>
                                </a>
                            </li>
                        <?php }else if ($index+ 1 == $number_video+1) { ?>
                            <li class="name-lesson" style="background-color: #b3daff">
                                <a href="./my_course_view_lesson.php?idcourse=<?php echo $lesson['id_course'] ?>&number_video=<?php echo $index+1 ?>">
                                    <?php echo $lesson['name_lesson']?>    
                                    <i class='icon-lesson bx bx-album'></i>
                                </a>
                            </li>
                        <?php } else { ?>
                            <li class="name-lesson">
                                <a href="">
                                    <?php echo $lesson['name_lesson']?>    
                                    <i class='icon-lesson bx bx-lock-alt'></i>
                                </a>
                            </li>
                        <?php } ?>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
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
</html>