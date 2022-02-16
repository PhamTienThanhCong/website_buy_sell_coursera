<?php

session_start();

$id = htmlspecialchars($_POST['id']);

require "../public/connect_sql.php";

$sql = "SELECT course.*, COUNT(lesson.id_course) as lesson FROM `course` 
        LEFT OUTER JOIN lesson ON course.id_course = lesson.id_course
        LEFT OUTER JOIN admin ON course.id_admin = admin.id_admin
        WHERE course.status_course = '1' and course.id_course = '$id'
        GROUP BY course.id_course";

$course = mysqli_query($connection, $sql);
$course = mysqli_fetch_array($course);

mysqli_close($connection);

if (isset($course['name_course'])){
        $_SESSION['cart'][$id]['name'] = $course['name_course'];
        $_SESSION['cart'][$id]['author'] = $course['author'];
        $_SESSION['cart'][$id]['price'] = $course['price'];
        $_SESSION['cart'][$id]['lesson'] = $course['lesson'];
        echo 1;
}else{
        echo 0;
}
