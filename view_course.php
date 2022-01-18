<?php
    if (!function_exists('currency_format')) {
        function currency_format($number, $suffix = ' VND')
        {
            if (!empty($number)) {
                return number_format($number, 0, ',', '.') . "{$suffix}";
            }
        }
    }
    $id = addslashes($_GET['id']);
    require "./public/connect_sql.php";
    $sql = "SELECT course.*, COUNT(lesson.id_course) as number_course, admin.name_admin as author FROM `course` 
                LEFT OUTER JOIN lesson ON course.id_course = lesson.id_course
                LEFT OUTER JOIN admin ON course.id_admin = admin.id_admin
                WHERE course.id_course = $id
                GROUP BY course.id_course";
    $course = mysqli_query($connection, $sql);
    $course = mysqli_fetch_array($course);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $course['name_course']?></title>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./css/header.css">
</head>
<body>
    <?php require "./default/header.php" ?>
    <!-- content -->
    <div class=content>
        
    </div>
    <div class="tab-right"></div>
    </div>
</body>
</html>