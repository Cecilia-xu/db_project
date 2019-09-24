<?php
    session_start();
    date_default_timezone_set("Asia/Shanghai");
    error_reporting(0);

    $conn = mysqli_connect("localhost","root","mysql","shopping");
    if (!$conn){
        $conn=null;
        die("Connection failed");
    }
    mysqli_set_charset($conn,'utf8');

?>