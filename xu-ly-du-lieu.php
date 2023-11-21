<?php
    require_once("config/config.php");

    // Menu
    $sqlSP = mysqli_query($conn,"SELECT * FROM `tbl_brands` WHERE id BETWEEN 1 AND 18");
?>