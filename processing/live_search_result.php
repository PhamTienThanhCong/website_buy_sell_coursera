<?php

$str=htmlspecialchars($_POST['result_search']);

if (!function_exists('currency_format')) {
    function currency_format($number, $suffix = ' VND')
    {
        if (!empty($number)) {
            return number_format($number, 0, ',', '.') . "{$suffix}";
        }
    }
}

$sql = "SELECT
             name_course, id_course, author, price
        FROM
            `course`
        WHERE
            name_course LIKE '%$str%' and status_course = 1";

require "../public/connect_sql.php";

$courses=mysqli_query($connection,$sql);

$data = [];

foreach ($courses as $course){
    $data[] = [
        'id' => $course['id_course'],
        'name' => $course['name_course'],
        'author' => $course['author'],
        'price' => currency_format($course['price'])
    ];
}

print json_encode($data);