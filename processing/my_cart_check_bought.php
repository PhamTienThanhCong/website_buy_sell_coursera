<?php
    session_start();
    $id = $_SESSION['id'];
    
    $courses = $_SESSION['cart'];

    require "../public/connect_sql.php";

    $data = [];

    foreach ($courses as $index => $course){
        $sql = "SELECT
                    id_order
                FROM
                    `oder`
                WHERE
                    (`id_user` = '$id') AND(`id_course` = '$index')";
        $check = mysqli_query($connection, $sql);
        $check = mysqli_fetch_array($check);

        if (isset($check['id_order'])){
            unset($_SESSION['cart'][$index]);
            $data[] = [
                'id' => $index,
                'name' => $course['name'],
            ];
        }

    }
    echo json_encode($data);