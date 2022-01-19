<?php

session_start();

echo json_encode($_SESSION['cart']);
// echo $_SESSION['cart'][3]['name'];