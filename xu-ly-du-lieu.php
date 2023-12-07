<?php
require_once("config/config.php");

// Menu
$sqlSP = mysqli_query($conn, "SELECT * FROM `tbl_brands` WHERE id BETWEEN 1 AND 18");

$sqlSlide = mysqli_query($conn, "SELECT * FROM `tbl_banners`");


// Product Details
if (isset($_GET['idsp'])) {
    $idDetailProd = $_GET['idsp'];
    $sqlDetailProd = mysqli_query($conn, "SELECT * FROM tbl_products WHERE id = $idDetailProd");
    $itemDetailProd = mysqli_fetch_assoc($sqlDetailProd);

    // Version
    $productId =  $itemDetailProd['id'];
    $sqlVersion = mysqli_query($conn, "SELECT * FROM tbl_products WHERE productId = $productId");
}

// Version
