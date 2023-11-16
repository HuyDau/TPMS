<?php
    $sever_username = "root";
    $server_password = "";
    $sever_host = "localhost";
    $database = 'tpms';
    $conn = mysqli_connect($sever_host, $sever_username, $server_password, $database) or die("Không thể kết nối tới Database !");
    mysqli_query($conn, "SET NAMES 'UTF8'");
?>