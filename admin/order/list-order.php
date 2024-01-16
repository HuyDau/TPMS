<?php
require_once("../../config/config.php");
include '../handle.php';
if (!isset($_SESSION['admin_user'])) {
    header("location: ../login.php");
}

require_once("../../config/config.php");

if (isset($_POST['sbm']) && !empty($_POST['search'])) {
    $search = $_POST['search'];
    $sqlCategory = mysqli_query($conn, "SELECT * FROM tbl_categories WHERE categoryName LIKE '%$search%' OR categoryCode LIKE'%$search%' ");
    $totalCategory = mysqli_num_rows($sqlCategory);
} else {
    $queryOnlineOrder = getOfflineOrder($conn, 0);
}
if (isset($_POST['all_prd'])) {
    unset($_POST['sbm']);
}

if (isset($_GET['action']) && $_GET['id']) {
    if ($_GET['action'] == "delete") {
        $cartId = $_GET['id'];
        $deleteDetailCart = mysqli_query($conn, "DELETE FROM tbl_detailcart WHERE cartId = $cartId");
        if ($deleteDetailCart) {
            $deleteCart = mysqli_query($conn, "DELETE FROM tbl_cart WHERE id = $cartId");
            if($deleteCart){
                echo "<script>window.alert('Delete Successful !');window.location.href = 'list-order.php';</script>";
            }
            
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>TECHNOLOGY PRODUCTS MANAGER SYSTEM - ONLINE ORDER</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="Coderthemes" name="author">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="shortcut icon" href="../../assets/images/logo/favicon.ico">
    <link href="..\assets\libs\datatables\dataTables.bootstrap4.css" rel="stylesheet" type="text/css">
    <link href="..\assets\libs\datatables\responsive.bootstrap4.css" rel="stylesheet" type="text/css">
    <link href="..\assets\libs\datatables\buttons.bootstrap4.css" rel="stylesheet" type="text/css">
    <link href="..\assets\libs\datatables\select.bootstrap4.css" rel="stylesheet" type="text/css">
    <link href="..\assets\css\bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="..\assets\css\icons.min.css" rel="stylesheet" type="text/css">
    <link href="..\assets\css\app.min.css" rel="stylesheet" type="text/css">
    <link href="..\assets\css\style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="../assets/scss/admin.css">
    <link rel="stylesheet" href="../assets/fontawesome/css/all.min.css">
    <script src="../assets/fontawesome/js/all.min.js"></script>
    <link rel="stylesheet" href="../assets/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <!-- CK Editor -->
    <script src="../assets/ckeditor/ckeditor.js"></script>
</head>

<body>

    <div id="wrapper" class="">
        <?php
        include '../navbar-custom.php';
        include '../left-menu.php';
        ?>
        <div class="content-page">
            <div class="content">


                <div class="container-fluid title">

                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">TECHNOLOGY PRODUCTS MANAGER SYSTEM</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">TPMS</a></li>
                                        <li class="breadcrumb-item active">ONLINE ORDERS</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">ONLINE ORDERS</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <a href="export_order.php" class="btn btn-lg font-16 btn-success btn-block  ">
                                <i class="las la-download"></i> Export
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card-box">
                                <table class="table table-hover m-0 table-centered dt-responsive nowrap w-100" id="tickets-table">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Total</th>
                                            <th>Time</th>
                                            <th>Payments</th>
                                            <th>Status</th>
                                            <th>Detail</th>
                                            <th class="hidden-sm">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        if (!empty($queryOnlineOrder)) {
                                            $i = 1;
                                            while ($itemOnlineOrder = mysqli_fetch_array($queryOnlineOrder)) {
                                        ?>
                                                <tr>
                                                    <td> <?= $i++; ?></td>
                                                    <td><a href="javascript: void(0);" class="text-body"><span class="ml-2"><?= $itemOnlineOrder['name'] ?></a></td>
                                                    <td>0<?= $itemOnlineOrder['phone'] ?></td>
                                                    <td><?= number_format($itemOnlineOrder['total'], 0, "", ".") ?>đ</td>
                                                    <td><?= date("H:i:s d-m-Y", strtotime($itemOnlineOrder['time'])) ?></td>
                                                    <td><?= $itemOnlineOrder['paymentName'] ?></td>
                                                    <td><span class="badge badge-success"><?=$itemOnlineOrder['statusName']?></span> </td>
                                                    <td><a href="detail_order.php?id=<?= $itemOnlineOrder['A'] ?>"><span class="badge badge-light-pink">Detail</span></a></td>
                                                    <td>
                                                        <div class="btn-group dropdown">
                                                            <a href="javascript: void(0);" class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="list-order.php?action=delete&id=<?= $itemOnlineOrder['A'] ?>"><i class="mdi mdi-delete mr-2 text-muted font-18 vertical-middle"></i>Delete</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>



    <div class="rightbar-overlay"></div>


    <script src="..\assets\js\vendor.min.js"></script>



    <script src="..\assets\libs\datatables\jquery.dataTables.min.js"></script>
    <script src="..\assets\libs\datatables\dataTables.bootstrap4.js"></script>
    <script src="..\assets\libs\datatables\dataTables.responsive.min.js"></script>
    <script src="..\assets\libs\datatables\responsive.bootstrap4.min.js"></script>
    <script src="..\assets\libs\datatables\dataTables.buttons.min.js"></script>
    <script src="..\assets\libs\datatables\buttons.bootstrap4.min.js"></script>
    <script src="..\assets\libs\datatables\buttons.html5.min.js"></script>
    <script src="..\assets\libs\datatables\buttons.flash.min.js"></script>
    <script src="..\assets\libs\datatables\buttons.print.min.js"></script>
    <script src="..\assets\libs\datatables\dataTables.keyTable.min.js"></script>
    <script src="..\assets\libs\datatables\dataTables.select.min.js"></script>
    <script src="..\assets\libs\pdfmake\pdfmake.min.js"></script>
    <script src="..\assets\libs\pdfmake\vfs_fonts.js"></script>



    <script src="..\assets\js\pages\datatables.init.js"></script>


    <script src="..\assets\js\app.min.js"></script>

</body>

</html>