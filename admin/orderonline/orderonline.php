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
   if(isset($_GET['type'])){
        if($_GET['type'] == "order"){
            $queryOnlineOrder = getOnlineOrder($conn,1);
        }else if($_GET['type'] == "confirm"){
            $queryOnlineOrder = getOnlineOrder($conn,2);
        }else if($_GET['type'] == "complete"){
            $queryOnlineOrder = getOnlineOrder($conn,3);
        }else if($_GET['type'] == "cancel"){
            $queryOnlineOrder = getOnlineOrder($conn,4);
        }
   }else{
        $queryOnlineOrder = getOnlineOrder($conn,0);
   }
}
if (isset($_POST['all_prd'])) {
    unset($_POST['sbm']);
}

if(isset($_GET['action']) && $_GET['id']){
    if($_GET['action'] == "confirm"){
        $cartId = $_GET['id'];
        $update = mysqli_query($conn,"UPDATE `tbl_cart` SET `idstatus`='2' WHERE id = $cartId");
        if($update){
            echo "<script>window.alert('Update Status Successful !');window.location.href = 'orderonline.php';</script>";
        }
    }else if($_GET['action'] == "complete"){
        $cartId = $_GET['id'];
        $update = mysqli_query($conn,"UPDATE `tbl_cart` SET `idstatus`='3' WHERE id = $cartId");
        if($update){
            echo "<script>window.alert('Update Status Successful !');window.location.href = 'orderonline.php';</script>";
        }
    }else if($_GET['action'] == "cancel"){
        $cartId = $_GET['id'];
        $update = mysqli_query($conn,"UPDATE `tbl_cart` SET `idstatus`='4' WHERE id = $cartId");
        if($update){
            echo "<script>window.alert('Update Status Successful !');window.location.href = 'orderonline.php';</script>";
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
                                <h4 class="page-title" >ONLINE ORDERS</h4>
                            </div>
                        </div>
                    </div>                    <div class="row no-gutters">
                        <a href="orderonline.php?type=order" class="col-md-6 col-xl-3">
                            <div class="widget-rounded-circle bg-soft-primary rounded-0 card-box mb-0">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="avatar-lg rounded-circle bg-soft-primary">
                                            <i class="fe-tag font-22 avatar-title text-primary"></i>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-right">
                                            <h3 class="text-dark mt-1"><span data-plugin="counterup">
                                                    <?= countListOrder($conn,1) ?>
                                                </span></h3>
                                            <p class="text-primary mb-1 text-truncate">Waiting Order</p>
                                        </div>
                                    </div>
                                </div>                             
                            </div> 
                        </a>

                        <a href="orderonline.php?type=confirm" class="col-md-6 col-xl-3">
                            <div class="widget-rounded-circle bg-soft-warning rounded-0 card-box mb-0">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="avatar-lg rounded-circle bg-soft-warning">
                                            <i class="fe-clock font-22 avatar-title text-warning"></i>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-right">
                                            <h3 class="text-dark mt-1"><span data-plugin="counterup">
                                                    <?= countListOrder($conn,2) ?>
                                                </span></h3>
                                            <p class="text-warning mb-1 text-truncate">Confirm Order</p>
                                        </div>
                                    </div>
                                </div>                             </div> 
                        </a>

                        <a href="orderonline.php?type=complete" class="col-md-6 col-xl-3">
                            <div class="widget-rounded-circle bg-soft-success rounded-0 card-box mb-0">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="avatar-lg rounded-circle bg-soft-success">
                                            <i class="fe-check-circle font-22 avatar-title text-success"></i>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-right">
                                            <h3 class="text-dark mt-1"><span data-plugin="counterup">
                                                    <?=countListOrder($conn,3) ?>
                                                </span></h3>
                                            <p class="text-success mb-1 text-truncate">Complete Order</p>
                                        </div>
                                    </div>
                                </div>                             </div> 
                        </a>

                        <a href="orderonline.php?type=cancel" class="col-md-6 col-xl-3">
                            <div class="widget-rounded-circle bg-soft-danger rounded-0 card-box mb-0">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="avatar-lg rounded-circle bg-soft-danger">
                                            <i class="fe-trash-2 font-22 avatar-title text-danger"></i>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-right">
                                            <h3 class="text-dark mt-1"><span data-plugin="counterup">
                                                    <?= countListOrder($conn,4) ?>
                                                </span></h3>
                                            <p class="text-danger mb-1 text-truncate">Cancel Tickets</p>
                                        </div>
                                    </div>
                                </div>                             </div> 
                        </a>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <a href="export_order.php" class="btn btn-lg font-16 btn-success btn-block  ">
                                <i class="las la-download"></i>    Export
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card-box">
                                <table class="table table-hover m-0 table-centered dt-responsive nowrap w-100"
                                    id="tickets-table">
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
                                                    <td>0<?=$itemOnlineOrder['phone'] ?></td>
                                                    <td>$<?= number_format($itemOnlineOrder['total'],0,"",".") ?></td>
                                                    <td><?= date("H:i:s d-m-Y", strtotime($itemOnlineOrder['time'])) ?></td>
                                                    <td><?= $itemOnlineOrder['paymentName'] ?></td>
                                                    <td>
                                                        <?php
                                                        if ($itemOnlineOrder['idstatus'] == 1) {
                                                            echo '<span class="badge badge-pink">' . $itemOnlineOrder['statusName'] . '</span>';
                                                        } elseif ($itemOnlineOrder['idstatus'] == 2) {
                                                            echo '<span class="badge badge-warning">' . $itemOnlineOrder['statusName'] . '</span>';
                                                        } elseif ($itemOnlineOrder['idstatus'] == 3) {
                                                            echo '<span class="badge badge-success">' . $itemOnlineOrder['statusName'] . '</span>';
                                                        } else {
                                                            echo '<span class="badge badge-danger">' . $itemOnlineOrder['statusName'] . '</span>';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td><a href="detail_order.php?id=<?= $itemOnlineOrder['A'] ?>"><span class="badge badge-light-pink">Detail</span></a></td>
                                                    <td>
                                                        <div class="btn-group dropdown">
                                                            <a href="javascript: void(0);" class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <?php if($itemOnlineOrder['idstatus']==2){}else{?><a class="dropdown-item"  href="orderonline.php?action=confirm&id=<?= $itemOnlineOrder['A'] ?>" ><i  class="mdi mdi-pencil mr-2 text-muted font-18 vertical-middle"></i>Confirm</a><?php }?>
                                                                <a class="dropdown-item"  href="orderonline.php?action=complete&id=<?= $itemOnlineOrder['A'] ?>"><i  class="mdi mdi-check-all mr-2 text-muted font-18 vertical-middle"></i>Complete</a>
                                                                <a class="dropdown-item"  href="orderonline.php?action=cancel&id=<?= $itemOnlineOrder['A'] ?>"><i  class="mdi mdi-delete mr-2 text-muted font-18 vertical-middle"></i>Cancel</a>
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