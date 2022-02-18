<?php
$str=htmlspecialchars($_GET['search']);
$query="select name_course as label,description_course as desc, image_course as icon, id_course as value from course where name_course like '%".$str."%' and status_course=1";
require "../public/connect_sql.php";
$result=mysqli_query($connection,$query);
$result=mysqli_fetch_array($result);
print json_encode($result);