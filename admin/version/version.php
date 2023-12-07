<?php
session_start();
if (!isset($_SESSION['admin_user'])) {
    header("location: ../login.php");
}

require_once("../../config/config.php");

if (isset($_POST['sbm']) && !empty($_POST['search'])) {
    $search = $_POST['search'];
    $sqlVersion = mysqli_query($conn, "SELECT * FROM tbl_versions WHERE versionName LIKE '%$search%' OR versionCode LIKE'%$search%' ");

} else {
    $sqlVersion = mysqli_query($conn, "SELECT * FROM tbl_versions");
}
if (isset($_POST['all_prd'])) {
    unset($_POST['sbm']);
}


if (isset($_POST['add'])) {
    $code = $_POST['code'];
    $name = $_POST['name'];

    $categoryName = mysqli_query($conn, "SELECT * FROM tbl_categories WHERE categoryName = '$name' ");

    if (mysqli_num_rows($categoryName) > 0) {
        echo "<script>window.alert('Category exists !');</script>";
    } else {
        $addCategory = "INSERT INTO `tbl_categories`(`Id`, `categoryCode`, `categoryName`) VALUES ('','$code','$name')";

        $queryAddCategory = mysqli_query($conn, $addCategory);
        if ($queryAddCategory) {
            echo "<script>window.alert('Successful!');window.location.href = 'categories.php'</script>";
        }
    }
}

if(isset($_GET['productId'])){

    $id = $_GET['productId'];

    $sqlEditVersion = mysqli_query($conn, "SELECT * FROM tbl_versions WHERE id = $id");
    $infoVersion = mysqli_fetch_assoc($sqlEditVersion);

    if (isset($_POST['EditVersion'])) {
        $prodId = $_POST['id1'];
        $code1 = $_POST['code1'];
        $name1 = $_POST['name1'];
        $version1 = $_POST['version1'];
        $price1 = $_POST['price1'];
        $prices1 = $_POST['p-price1'];
        if ($_FILES['image1']['name'] == "") {
            $versionImage = $infoVersion['productImage'];
        } else {
            $versionImage = $_FILES['image1']['name'];
            $versionImage_tmp = $_FILES['image1']['tmp_name'];
            $sqlPrroduct = mysqli_query($conn,"SELECT * FROM tbl_products WHERE id = $prodId");
            $itemProduct = mysqli_fetch_assoc($sqlPrroduct);
            $idCategory = $itemProduct['idCategory'];
            if($idCategory == 1){
                move_uploaded_file($versionImage_tmp, '../../uploads/product/smartphone/' . $versionImage);
            }else if($idCategory == 2){
                move_uploaded_file($versionImage_tmp, '../../uploads/product/laptop/' . $versionImage);
            }else if($idCategory == 3){
                move_uploaded_file($versionImage_tmp, '../../uploads/product/tablet/' . $versionImage);
            }else if($idCategory == 4){
                move_uploaded_file($versionImage_tmp, '../../uploads/product/monitor/' . $versionImage);
            }else if($idCategory == 5){
                move_uploaded_file($versionImage_tmp, '../../uploads/product/smarttv/' . $versionImage);
            }else if($idCategory == 5){
                move_uploaded_file($versionImage_tmp, '../../uploads/product/watch/' . $versionImage);
            }
        }
        $description1 = $_POST['description1'];
        if($prices1 <= $price1){
            $editVersion = mysqli_query($conn, "UPDATE `tbl_versions` SET `productVersion`='$version1',`productCode`='$code1',`productName`='$name1',`productImage`='$versionImage',`productPrice`='$price1',`productPromotionalPrice`='$prices1',`productDescription`='$description1' WHERE id = $id");
            if($editVersion){
                header("Location: version.php");
            }
        }else{
            echo "<script>window.alert('Promotional price cannot be greater than the price!');window.location.href = 'version.php'</script>";
        }
        
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>TECHNOLOGY PRODUCTS MANAGER SYSTEM - VERSION</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="Coderthemes" name="author">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- App favicon -->
    <link rel="shortcut icon" href="../../assets/images/logo/favicon.ico">
    <!-- third party css -->
    <link href="..\assets\libs\datatables\dataTables.bootstrap4.css" rel="stylesheet" type="text/css">
    <link href="..\assets\libs\datatables\responsive.bootstrap4.css" rel="stylesheet" type="text/css">
    <link href="..\assets\libs\datatables\buttons.bootstrap4.css" rel="stylesheet" type="text/css">
    <link href="..\assets\libs\datatables\select.bootstrap4.css" rel="stylesheet" type="text/css">
    <!-- third party css end -->
    <!-- App css -->
    <link href="..\assets\css\bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="..\assets\css\icons.min.css" rel="stylesheet" type="text/css">
    <link href="..\assets\css\app.min.css" rel="stylesheet" type="text/css">
    <link href="..\assets\css\style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <!-- Style Css -->
    <link rel="stylesheet" href="../assets/scss/admin.css">
    <link rel="stylesheet" href="version.css">
    <!-- Font awesome -->
    <link rel="stylesheet" href="../assets/fontawesome/css/all.min.css">
    <script src="../assets/fontawesome/js/all.min.js"></script>
    <link rel="stylesheet" href="../assets/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <!-- CK Editor -->
    <script src="../assets/ckeditor/ckeditor.js"></script>
</head>

<body>
    <!-- Form Edit -->
    <div class="form-edit form" id="form-edit">
        <form method="POST" class="" enctype="multipart/form-data">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Version</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" ><a href="version.php">×</a></button>
                    </div>
                    <div class="modal-body p-3">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="control-label">Product ID: </label>
                                    <input class="form-control form-white" placeholder="Enter Product Id ..." type="text" name="id1" value="<?=$infoVersion['productId']?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Product Code: </label>
                                    <input class="form-control form-white" placeholder="Enter Product Code ..." type="text" name="code1" value="<?=$infoVersion['productCode']?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Product Name: </label>
                                    <input class="form-control form-white" placeholder="Enter Product Name ..." type="text" name="name1" value="<?=$infoVersion['productName']?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Product Version: </label>
                                    <input class="form-control form-white" placeholder="Enter Product Version ..." type="text" name="version1" value="<?=$infoVersion['productVersion']?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Product Iamge: </label>
                                    <input type="file" multiple="multiple" name="image1" class="form-control">
                                    <span><?=$infoVersion['productImage']?></span>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Price: </label>
                                    <input class="form-control form-white" placeholder="Enter Price ..." type="text" name="price1" value="<?=$infoVersion['productPrice']?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Promotional Price: </label>
                                    <input class="form-control form-white" placeholder="Enter Promotional Price ..." type="text" name="p-price1" value="<?=$infoVersion['productPromotionalPrice']?>" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="control-label">Description: </label>
                                    <textarea name="description1" id="des" cols="150" rows="10" required>
                                        <?=$infoVersion['productDescription']?>
                                    </textarea>
                                    <script>
                                        CKEDITOR.replace('des')
                                    </script>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="text-right pt-2">
                                <button name="EditVersion" class="btn btn-primary ml-1">Save</button>
                                <button type="button" class="btn btn-light " data-dismiss="modal" name="close"><a style="color: #fff;" href="version.php">Close</a></button>
                            </div>
                        </div>
                    </div> <!-- end modal-body-->
                </div> <!-- end modal-content-->
            </div> <!-- end modal dialog-->
        </form>
    </div>
    <!-- End Form Edit -->
    <!-- Begin page -->
    <div id="wrapper" class="">
        <!-- Topbar Start -->
        <div class="navbar-custom">
            <ul class="list-unstyled topnav-menu float-right mb-0">
                <li class="d-none d-sm-block">
                    <form class="app-search" method="POST">
                        <div class="app-search-box">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search...">
                                <div class="input-group-append">
                                    <button class="btn" name="sbm" type="submit">
                                        <i class="fe-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </li>

                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle waves-light waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="fe-bell noti-icon"></i>
                        <span class="badge badge-danger rounded-circle noti-icon-badge">5</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-lg">

                        <!-- item-->
                        <div class="dropdown-item noti-title">
                            <h5 class="m-0 text-white">
                                <span class="float-right">
                                    <a href="" class="text-white">
                                        <small>Delete All</small>
                                    </a>
                                </span>Notification
                            </h5>
                        </div>

                        <div class="slimscroll noti-scroll">

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item active">
                                <div class="notify-icon">
                                    <img src="..\assets\images\users\user-1.jpg" class="img-fluid rounded-circle" alt="">
                                </div>
                                <p class="notify-details">Cristina Pride</p>
                                <p class="text-muted mb-0 user-msg">
                                    <small>Hi, How are you? What about our next meeting</small>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-primary">
                                    <i class="mdi mdi-comment-account-outline"></i>
                                </div>
                                <p class="notify-details">Caleb Flakelar commented on Admin
                                    <small class="text-muted">1 min ago</small>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon">
                                    <img src="..\assets\images\users\user-4.jpg" class="img-fluid rounded-circle" alt="">
                                </div>
                                <p class="notify-details">Karen Robinson</p>
                                <p class="text-muted mb-0 user-msg">
                                    <small>Wow ! this admin looks good and awesome design</small>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-warning">
                                    <i class="mdi mdi-account-plus"></i>
                                </div>
                                <p class="notify-details">New user registered.
                                    <small class="text-muted">5 hours ago</small>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-info">
                                    <i class="mdi mdi-comment-account-outline"></i>
                                </div>
                                <p class="notify-details">Caleb Flakelar commented on Admin
                                    <small class="text-muted">4 days ago</small>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-secondary">
                                    <i class="mdi mdi-heart text-danger"></i>
                                </div>
                                <p class="notify-details">Carlos Crouch liked
                                    <b>Admin</b>
                                    <small class="text-dark">13 days ago</small>
                                </p>
                            </a>
                        </div>

                        <!-- All-->
                        <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                            View All
                            <i class="fi-arrow-right"></i>
                        </a>

                    </div>
                </li>

                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="..\assets\images\users\user-1.jpg" alt="user-image" class="rounded-circle">
                        <span class="pro-user-name ml-1">
                            <?php if (isset($_SESSION['user_admin'])) {
                                echo $_SESSION['fullname_admin'];
                            } ?> <i class="mdi mdi-chevron-down"></i>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                        <!-- item-->
                        <div class="dropdown-item noti-title">
                            <h5 class="m-0 text-white">
                                Welcome !
                            </h5>
                        </div>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="fe-user"></i>
                            <span>Account</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="fe-settings"></i>
                            <span>Setting</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="fe-lock"></i>
                            <span>Screen Block</span>
                        </a>

                        <div class="dropdown-divider"></div>

                        <!-- item-->
                        <a href="../logout.php" class="dropdown-item notify-item">
                            <i class="fe-log-out"></i>
                            <span>Logout</span>
                        </a>

                    </div>
                </li>




            </ul>

            <!-- LOGO -->
            <div class="logo-box">
                <a href="index.php" class="logo text-center">
                    <span class="logo-lg">
                        <img src="..\assets\images\logo\avt.png" alt="" height="24">
                        <!-- <span class="logo-lg-text-light">BMS MANAGER SYSTEM</span> -->
                    </span>
                    <span class="logo-sm">
                        <!-- <span class="logo-sm-text-dark">X</span> -->
                        <img src="..\assets\images\logo\favicon.png" alt="" height="28">
                    </span>
                </a>
            </div>

            <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                <li>
                    <button class="button-menu-mobile waves-effect waves-light">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </li>

                <li class="dropdown d-none d-lg-block">
                    <a class="nav-link dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        Report
                        <i class="mdi mdi-chevron-down"></i>
                    </a>
                    <div class="dropdown-menu">
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">
                            Financial report
                        </a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">
                            Báo cáo hàng tháng
                        </a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">
                            Monthly report
                        </a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">
                            Support
                        </a>

                    </div>
                </li>
            </ul>
        </div>
        <!-- end Topbar -->
        <!-- ========== Left Sidebar Start ========== -->
        <div class="left-side-menu">
            <div class="slimscroll-menu">
                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <ul class="metismenu" id="side-menu">
                        <li>
                            <a href="javascript: void(0);">
                                <i class="la la-dashboard"></i>
                                <span class="badge badge-info badge-pill float-right">2</span>
                                <span> Home </span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li>
                                    <a href="index.php">Statistical</a>
                                </li>
                                <li>
                                    <a href="index2.php">Details Statistical</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);">
                                <i class="la la-cube"></i>
                                <span> PRODUCTS </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li>
                                    <a href="../categories/categories.php">CATEGORIES</a>
                                </li>
                                <li>
                                    <a href="../brands/brands.php">BRANDS</a>
                                </li>
                                <li>
                                    <a href="version.php">VERSIONS</a>
                                </li>
                                <li>
                                    <a href="../products/products.php">PRODUCTS</a>
                                </li>



                            </ul>
                        </li>
                        
                        <li>
                            <a href="javascript: void(0);">
                                <i class="la la-connectdevelop"></i>
                                <span> WEB </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li>
                                    <a href="../web/banner/banner.php">BANNER</a>
                                </li>
                                <li>
                                    <a href="email-read.php">Read Email</a>
                                </li>
                                <li>
                                    <a href="email-compose.php">Compose Email</a>
                                </li>

                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);">
                                <i class="la la-envelope"></i>
                                <span> Email </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li>
                                    <a href="email-inbox.php">Inbox</a>
                                </li>
                                <li>
                                    <a href="email-read.php">Read Email</a>
                                </li>
                                <li>
                                    <a href="email-compose.php">Compose Email</a>
                                </li>

                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);">
                                <i class=" fab fa-opencart"></i>
                                <span> Order </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li>
                                    <a href="order.php">List Order</a>
                                </li>
                                <li>
                                    <a href="list_complete_order.php">List Complete Order</a>
                                </li>
                                <li>
                                    <a href="list_cancel_order.php">List Cancel Order</a>
                                </li>
                            </ul>
                        </li>
                    </ul>

                </div>
                <!-- End Sidebar -->

                <div class="clearfix"></div>

            </div>
            <!-- Sidebar -left -->
        </div>
        <!-- Left Sidebar End -->
        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid title">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">TECHNOLOGY PRODUCTS MANAGER SYSTEM</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">TPMS</a></li>
                                        <li class="breadcrumb-item active">VERSIONS</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">VERSIONS</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <!--  -->
                    <!--  -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <table id="basic-datatable" class="table dt-responsive nowrap">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>PRODUCT CODE</th>
                                                <th>CATEGORY</th>
                                                <th>BRAND</th>
                                                <th>IMAGE</th>
                                                <th>PRICE</th>
                                                <th>PROMOTIONAL PRICE</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $i = 1;
                                            while ($row = mysqli_fetch_assoc($sqlVersion)) {
                                            ?>
                                                <tr>
                                                    <td>
                                                        <?= $i++ ?>
                                                    </td>
                                                    <td>
                                                        <?=  $row['productId'] ; ?>
                                                    </td>
                                                    <td>
                                                        <?php 
                                                            $idProd = $row['productId'];
                                                            $sqlProduct = mysqli_query($conn,"SELECT * FROM tbl_products WHERE id = $idProd");
                                                            $itemProduct = mysqli_fetch_assoc($sqlProduct);
                                                            $idCat = $itemProduct['idCategory'];
                                                            $sqlCategory = mysqli_query($conn,"SELECT * FROM tbl_products INNER JOIN tbl_categories ON tbl_categories.Id = tbl_products.idCategory   WHERE idCategory = $idCat");
                                                            $itemCategory = mysqli_fetch_assoc($sqlCategory);
                                                            echo $itemCategory['categoryName'];
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php 
                                                            // $idProd = $row['productId'];
                                                            // $sqlProduct = mysqli_query($conn,"SELECT * FROM tbl_products WHERE id = $idProd");
                                                            // $itemProduct = mysqli_fetch_assoc($sqlProduct);
                                                            $idBrand = $itemProduct['idBrand'];
                                                            $sqlBrand = mysqli_query($conn,"SELECT * FROM tbl_products INNER JOIN tbl_brands ON tbl_brands.id = tbl_products.idBrand   WHERE idBrand = $idCat");
                                                            $itemBrand = mysqli_fetch_assoc($sqlBrand);
                                                            echo $itemBrand['brandName'];
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            if($itemProduct['idCategory'] == 1){
                                                                ?> <img src="../../uploads/product/smartphone/<?= $row['productImage'] ?>" alt="<?= $row['productName'] ?>"> <?php
                                                            }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?= number_format($row['productPrice'],0,"",".") ?>
                                                    </td>
                                                    <td>
                                                        <?= number_format($row['productPromotionalPrice'],0,"",".") ?>
                                                    </td>
                                                    <td><a href="version.php?productId=<?php echo $row['id']; ?>" name="edit" class="edit"><i class="icon-edit la la-edit"></i></a></td>
                                                    <td><a onclick="return Del1('<?php echo $row['productName']; ?>')" class="delete" href="deleteVersion.php?id=<?php echo $row['id']; ?>"><i class="icon-delete la la-trash-o"></i></a></td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>

                                    </table>

                                </div> <!-- end card body-->
                            </div> <!-- end card -->
                        </div><!-- end col-->
                    </div>
                    <!-- end row-->

                </div> <!-- container -->

            </div> <!-- content -->

            <!-- Footer Start -->
            <footer class="footer">
                <div class="row">
                    
                    <div class="col-lg-2">
                        <a href="export_category.php" class="btn btn-lg font-13 btn-primary btn-block  ">
                            <i class="las la-download"></i> Export
                        </a>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- Vendor js -->
    <script src="..\assets\js\vendor.min.js"></script>
    <!-- Scritp -->
    <script>
        function Del1(name) {
            return confirm("Do You Want To Delete: " + name + " ?");
        }
    </script>

    <!-- third party js -->
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
    <!-- third party js ends -->

    <!-- Datatables init -->
    <script src="..\assets\js\pages\datatables.init.js"></script>

    <!-- App js -->
    <script src="..\assets\js\app.min.js"></script>
    
    <?php
        if(isset($_GET['productId'])){
            echo '<script> document.getElementById("form-edit").classList.add("show")</script>';

            $id = $_GET['id'];

            $sqlEditCategory = mysqli_query($conn, "SELECT * FROM tbl_categories WHERE Id = $id");
            $infoCategory = mysqli_fetch_assoc($sqlEditCategory);
        }
    ?>
    <script src="version.js"></script>
    
</body>

</html>