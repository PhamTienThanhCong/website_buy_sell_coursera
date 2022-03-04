<?php
    require "../check_admin/check_admin_1.php";
    
    $id_user = $_SESSION['id'];

    $id_course = addslashes($_GET['idcourse']);

    require "../../public/connect_sql.php";

    $lever = 1;

    $number_video = 1;

    if (isset($_GET['number_video'])){
        $number_video_request = addslashes($_GET['number_video']);
        $number_video = (int)$number_video_request; 
    }
    else $_GET['number_video'] = 1;

    $number_video -= 1;

    $sql = "SELECT
                course.*,
                lesson.*
            FROM
                `course`
            LEFT OUTER JOIN lesson ON course.id_course = lesson.id_course
            WHERE
                (course.id_course = '$id_course') AND (course.id_admin = '$id_user')
            GROUP BY
                lesson.id_lesson
            LIMIT 1 OFFSET $number_video";
    
    if ($_SESSION['lever'] == 2){
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
        $lever = 2;
        
    }

    $course = mysqli_query($connection, $sql);
    $one_course = mysqli_fetch_array($course);

    $sql = "SELECT
                course.id_course,
                course.status_course,
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
    <link rel="stylesheet" href="../../css/header.css">
    <link rel="stylesheet" href="../../css/my_course_view_lesson.css">
    <title>
        <?php 
            if (isset($one_course['name_course'])){
                echo $one_course['name_course'];
            }else{
                echo "không xác định";
            }
        ?>
    </title>
</head>
<style>
    *{
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }
    header .formSearch{
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
    }
    header .formSearch div input{
        border: none;
        outline: none;
        width: 365px;
        height: 40px;
        padding: 15px;
        font-size: 15px;
        margin-left: -13px;
    }
    header .formSearch i{
        color: black;
        font-size: 18px;
        margin-left: 20px;
        transform: translateY(3px);
    }
</style>
<body>
    <input id="check-lever" type="hidden" value="<?php echo $lever?>">
    <input id="check-id-course" type="hidden" value="<?php echo $id_course?>">
    <script>
                function handler(){
                    var lever = document.getElementById('check-lever').value;
                    var id_course = document.getElementById('check-id-course').value;
                    var url = "";
                    if (lever == '1' ){
                        url = "./course_manager.php";
                    }else if (lever == '2'){
                        url = "./course_manager_detail_admin.php?id="+id_course;
                    }
                    window.location.href = url;
                }
    </script>
    <?php require "../default/header_user.php"; ?>
        <?php
        if (!isset($one_course['status_course']))
        {
            echo "<h2> khóa học không tồn tại hoặc bạn không được phép truy cập vào nó </h2><br>";
            echo "<a href='./course_manager.php'> <<<< Quay lại trang chủ</a>";
            exit;
        }
        if (isset($one_course['name_lesson'])){ ?>
            <div class=content>
            <iframe width="100%" height="508" src="<?php 
            if ($one_course['type_link'] == 1) {
                echo "https://www.youtube.com/embed/".$one_course['link'];
            } else if ($one_course['type_link'] == 2){
                echo "https://drive.google.com/file/d/".$one_course['link']."/preview";
            } else{
                echo $one_course['link'];
            }
            ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
        <?php }else{ ?>
            <h1>Khóa học hiện tại chưa có bài này vui lòng chọn bài khác</h1>
        <?php } ?>
        <div class="tab-lesson">
            <div id="next-course"> 
                <button id = "check-complete">
                    hoàn thành và tiếp tục
                    <i class='bx bx-check'></i>
                </button>
        </div>
            <div class="all-lessons-list">
                <ul>
                    <?php foreach ($all_lesson as $index => $lesson) { ?>
                        <?php if ($index != $number_video) { ?>

                            <li class="name-lesson done">
                                <a href="./view_lesson.php?idcourse=<?php echo $lesson['id_course'] ?>&number_video=<?php echo $index+1 ?>">
                                    <?php echo $lesson['name_lesson']?>    
                                    <i style="color: blue" class='icon-lesson bx bx-check'></i>
                                </a>
                            </li>

                        <?php } else if ($index == $number_video) { ?>
                            <li class="name-lesson" style="background-color: #b3daff">
                                <a href="./view_lesson.php?idcourse=<?php echo $lesson['id_course'] ?>&number_video=<?php echo $index+1 ?>">
                                    <?php echo $lesson['name_lesson']?>    
                                    <i class='icon-lesson bx bx-album'></i>
                                </a>
                            </li>
                        <?php } ?>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
    <?php require "../default/footer_user.php" ?>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</html>