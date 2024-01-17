<?php
session_start();
require_once("../../config/config.php");
if (!isset($_SESSION['admin_user'])) {
    header("location: ../login.php");
}
$id = $_GET['id'];
$sql_prod = mysqli_query($conn, "SELECT *, tbl_detailcart.quantity AS AQuantity FROM tbl_cart INNER JOIN tbl_detailcart ON tbl_cart.id = tbl_detailcart.cartId INNER JOIN tbl_versions ON tbl_detailcart.versionId = tbl_versions.idVersion INNER JOIN tbl_products ON tbl_products.id = tbl_versions.productId WHERE tbl_cart.id = $id");


$sqlCart = mysqli_query($conn, "SELECT * FROM tbl_cart  WHERE id = $id");
$info = mysqli_fetch_assoc($sqlCart);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>TPMS - ORDER DETAIL</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="Coderthemes" name="author">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- App favicon -->
    <link rel="shortcut icon" href="../../assets/images/logo/favicon.ico">

    <!-- App css -->
    <link href="..\assets\css\bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="..\assets\css\icons.min.css" rel="stylesheet" type="text/css">
    <link href="..\assets\css\app.min.css" rel="stylesheet" type="text/css">

</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">
        <?php
        include '../navbar-custom.php';
        include '../left-menu.php';
        ?>
        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">TPMS</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">DETAIL ORDER</a></li>
                                        <li class="breadcrumb-item active">DETAIL ORDER</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">DETAIL ORDER</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card-box">
                                <!-- Logo & title -->
                                <div class="clearfix">
                                    <div class="float-left">
                                        <img src="../../assets/images/logo/logo-dark.png" alt="logo_dark" height="24" class="d-none d-print-inline-block">
                                        <img src="../../assets/images/logo/logo-dark.png" alt="logo_light" height="24" class="d-print-none">
                                    </div>
                                    <div class="float-right">
                                        <h4 class="m-0 d-print-none">Invoice</h4>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mt-3">
                                            <p>Name: <b><?= $info['name'] ?></b></p>
                                            <p>Phone Number: <b> <?= $info['phone'] ?></b></p>
                                            <p>Email:<b> <?= $info['email'] ?></b></p>
                                        </div>

                                    </div><!-- end col -->
                                    <div class="col-md-4 offset-md-2">
                                        <div class="mt-3 float-md-right">
                                            <p><strong>Order Date : </strong> <span class="float-right"> &nbsp;&nbsp;&nbsp;&nbsp; <?= date('D, d-M-Y', strtotime($info['time'])) ?></span></p>
                                            <p><strong>Order No. : </strong> <span class="float-right">0000<?= $info['id'] ?></span></p>
                                        </div>
                                    </div><!-- end col -->
                                </div>
                                <!-- end row -->

                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <h6>Shipping Address</h6>
                                        <address>
                                            City: <?= $info['city'] ?><br>
                                            District: <?= $info['district'] ?><br>
                                            Ward: <?= $info['ward'] ?><br>
                                            Detail Address: <?= $info['address'] ?><br>
                                            <abbr title="Phone">Note: </abbr> <?= $info['note'] ?>
                                        </address>
                                    </div> <!-- end col -->

                                    <div class="col-md-6">
                                        <div class="text-md-right">
                                            <h6>Payment address</h6>
                                            <address>
                                                TPMS<br>
                                                89 Pham Van Dong<br>
                                                Mai Dich, Cau Giay, Ha Noi<br>
                                                <abbr title="Phone">BIDV:</abbr> 215 2956 520
                                            </address>
                                        </div>
                                    </div> <!-- end col -->
                                </div>
                                <!-- end row -->

                                <div class="row">
                                    <div class="col-12">
                                        <div class="table-responsive">
                                            <table class="table mt-4 table-centered">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 10%">#</th>
                                                        <th style="width: 20%">Product</th>
                                                        <th style="width: 20%">Image</th>
                                                        <th style="width: 10%">Price</th>
                                                        <th style="width: 10%">Quantity</th>
                                                        <th style="width: 10%">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $i = 1;
                                                    $total = 0;
                                                    while ($row = mysqli_fetch_array($sql_prod)) {
                                                    ?>
                                                        <tr>
                                                            <td><?= $i++ ?></td>
                                                            <td><?= $row['versionName'] ?></td>
                                                            <td>
                                                                <?php
                                                                if ($row['idCategory'] == 1) {
                                                                ?><img style="width: 100%;" src="../../uploads/product/smartphone/<?= $row['versionImage'] ?>" alt=""><?php
                                                                                                                                                                        } else if ($row['idCategory'] == 2) {
                                                                                                                                                                            ?><img style="width: 100%;" src="../../uploads/product/laptop/<?= $row['versionImage'] ?>" alt=""><?php
                                                                                                                                                                        } else if ($row['idCategory'] == 3) {
                                                                                                                                                                        ?><img style="width: 100%;" src="../../uploads/product/tablet/<?= $row['versionImage'] ?>" alt=""><?php
                                                                                                                                                                        } else if ($row['idCategory'] == 4) {
                                                                                                                                                                        ?><img style="width: 100%;" src="../../uploads/product/monitor/<?= $row['versionImage'] ?>" alt=""><?php
                                                                                                                                                                        } else if ($row['idCategory'] == 5) {
                                                                                                                                                                            ?><img style="width: 100%;" src="../../uploads/product/smarttv/<?= $row['versionImage'] ?>" alt=""><?php
                                                                                                                                                                        } else if ($row['idCategory'] == 6) {
                                                                                                                                                                            ?><img style="width: 100%;" src="../../uploads/product/watch/<?= $row['versionImage'] ?>" alt=""><?php
                                                                                                                                                                        } else if ($row['idCategory'] == 7) {
                                                                                                                                                                        ?><img style="width: 100%;" src="../../uploads/product/voice/<?= $row['versionImage'] ?>" alt=""><?php
                                                                                                                                                                        } else if ($row['idCategory'] == 8) {
                                                                                                                                                                        ?><img style="width: 100%;" src="../../uploads/product/smarthome/<?= $row['versionImage'] ?>" alt=""><?php
                                                                                                                                                                        } else if ($row['idCategory'] == 16) {
                                                                                                                                                                            ?><img style="width: 100%;" src="../../uploads/product/accessory/<?= $row['versionImage'] ?>" alt=""><?php
                                                                                                                                                                        } else if ($row['idCategory'] == 17) {
                                                                                                                                                                            ?><img style="width: 100%;" src="../../uploads/product/toys/<?= $row['versionImage'] ?>" alt=""><?php
                                                                                                                                                                        } else if ($row['idCategory'] == 18) {
                                                                                                                                                                        ?><img style="width: 100%;" src="../../uploads/product/driftingmachine/<?= $row['versionImage'] ?>" alt=""><?php
                                                                                                                                                                                } else if ($row['idCategory'] == 19) {
                                                                                                                                                                                    ?><img style="width: 100%;" src="../../uploads/product/repair/<?= $row['versionImage'] ?>" alt=""><?php
                                                                                                                                                                                } else if ($row['idCategory'] == 20) {
                                                                                                                                                                        ?><img style="width: 100%;" src="../../uploads/product/service/<?= $row['versionImage'] ?>" alt=""><?php
                                                                                                                                                                                }
                                                                                                                                                                            ?>
                                                            </td>
                                                            <td><?= number_format($row['versionPromotionalPrice'], 0, "", ".") ?>đ</td>
                                                            <td><?= $row['AQuantity'] ?></td>
                                                            <td><?= number_format($row['versionPromotionalPrice']*$row['AQuantity'], 0, "", ".") ?>đ</td>
                                                        </tr>

                                                    <?php

                                                    }
                                                    ?>



                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td>Sub-total:</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td>
                                                            <h3><?= number_format($info['total'], 0, "", ".") ?>đ</h3>
                                                        </td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div> <!-- end table-responsive -->
                                    </div> <!-- end col -->
                                </div>
                                <!-- end row -->

                                <div class="row">
                                    <div class="mt-12 mb-1">
                                        <div class="text-right d-print-none">
                                            <a href="javascript:window.print()" class="btn btn-primary waves-effect waves-light"><i class="mdi mdi-printer mr-1"></i> Print</a>
                                            <a href="orderonline.php" class="btn btn-info waves-effect waves-light"><i class="mdi mdi-send mr-1"></i> Back</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="rightbar-overlay"></div>
        <script src="..\assets\js\vendor.min.js"></script>
        <script src="..\assets\js\app.min.js"></script>

</body>

</html>