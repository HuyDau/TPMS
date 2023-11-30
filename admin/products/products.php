<?php
session_start();
if (!isset($_SESSION['admin_user'])) {
    header("location: ../login.php");
}

require_once("../../config/config.php");

if (isset($_POST['sbm']) && !empty($_POST['search'])) {
    $search = $_POST['search'];
    $sqlProduct = mysqli_query($conn, "SELECT * FROM tbl_products WHERE productName LIKE '%$search%' OR categoryCode LIKE'%$search%' ");
    $totalCategory = mysqli_num_rows($sqlProduct);
} else {
    $sqlProduct = mysqli_query($conn, "SELECT * FROM tbl_products");
}
if (isset($_POST['all_prd'])) {
    unset($_POST['sbm']);
}


if (isset($_POST['add'])) {
    $category = $_POST['category'];
    $brand = $_POST['brand'];
    $prooductId = $_POST['id'];
    $code = $_POST['code'];
    $name = $_POST['name'];
    $version = $_POST['version'];
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $description = $_POST['description'];

    $productCode = mysqli_query($conn, "SELECT * FROM tbl_products WHERE productCode = '$code' ");

    if (mysqli_num_rows($productCode) > 0) {
        echo "<script>window.alert('Product exists !');</script>";
    } else {
        $addProduct = "INSERT INTO `tbl_products`(`id`, `idCategory`, `idBrand`, `productId`, `productCode`, `productName`, `productVersion`, `productImage`, `productDescription`) VALUES (NULL,'$category','$brand','$prooductId','$code','$name','$version','$image','$description')";

        $queryAddProduct = mysqli_query($conn, $addProduct);
        if ($queryAddProduct) {
            echo "<script>window.alert('Successful!');window.location.href = 'products.php'</script>";
        }
    }
    if($category == 1){
        move_uploaded_file($image_tmp, '../../uploads/product/smartphone/' . $image);
    }else if($category == 2){
        move_uploaded_file($image_tmp, '../../uploads/product/laptop/' . $image);
    }else if($category == 3){
        move_uploaded_file($image_tmp, '../../uploads/product/tablet/' . $image);
    }else if($category == 4){
        move_uploaded_file($image_tmp, '../../uploads/product/monitor/' . $image);
    }else if($category == 5){
        move_uploaded_file($image_tmp, '../../uploads/product/smarttv/' . $image);
    }else if($category == 5){
        move_uploaded_file($image_tmp, '../../uploads/product/watch/' . $image);
    }
    
}

if(isset($_GET['id'])){

    $id = $_GET['id'];

    $sqlProduct = mysqli_query($conn, "SELECT * FROM tbl_products WHERE id = $id");
    $infoProduct = mysqli_fetch_assoc($sqlProduct);

    if (isset($_POST['EditProduct'])) {
        $category1 = $_POST['category1'];
        $brand1 = $_POST['brand1'];
        $productId1 = $_POST['id1'];
        $code1 = $_POST['code1'];
        $name1 = $_POST['name1'];
        $version1 = $_POST['version1'];
        if ($_FILES['image1']['name'] == "") {
            $image1 = $infoProduct['productImage'];
        } else {
            $image1 = $_FILES['image1']['name'];
            $image1_tmp = $_FILES['image1']['tmp_name'];
            $category =$category1;
            if($category == 1){
                move_uploaded_file($image1_tmp, '../../uploads/product/smartphone/' . $image1);
            }else if($category == 2){
                move_uploaded_file($image1_tmp, '../../uploads/product/laptop/' . $image1);
            }else if($category == 3){
                move_uploaded_file($image1_tmp, '../../uploads/product/tablet/' . $image1);
            }else if($category == 4){
                move_uploaded_file($image1_tmp, '../../uploads/product/monitor/' . $image1);
            }else if($category == 5){
                move_uploaded_file($image1_tmp, '../../uploads/product/smarttv/' . $image1);
            }else if($category == 5){
                move_uploaded_file($image1_tmp, '../../uploads/product/watch/' . $image1);
            }
        }
        $description1 = $_POST['description1'];
        $editProduct = mysqli_query($conn, "UPDATE `tbl_products` SET `idCategory`='$category1',`idBrand`='$brand1',`productId`='$productId1',`productCode`='$code1',`productName`='$name1',`productVersion`='$version1',`productImage`='$image1',`productDescription`='$description1' WHERE id = $id");

        if($editProduct){
            echo "<script>window.alert('Successful!');window.location.href = 'products.php'</script>";
        }else{
            echo "<script>window.alert('Error!');window.location.href = 'products.php'</script>";
        }
    }
}

if(isset($_GET['productId'])){

    $id = $_GET['productId'];
    $idCategory = $_GET['categoryId'];
    if (isset($_POST['addVersion'])) {
        $prodId = $_POST['prodId'];
        $versionCode = $_POST['versionCode'];
        $versionName = $_POST['versionName'];
        $versionImage = $_FILES['versionImage']['name'];
        $versionImage_tmp = $_FILES['versionImage']['tmp_name'];
        $versionPrice = $_POST['versionPrice'];
        $addVersion = mysqli_query($conn, "INSERT INTO `tbl_versions`(`id`, `productId`, `versionCode`, `versionName`, `versionImage`, `versionPrice`) VALUES (NULL,'$prodId','$versionCode','$versionName','$versionImage','$versionPrice')");

        if($addVersion){
            header("Location: products.php");
        }

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
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>TECHNOLOGY PRODUCTS MANAGER SYSTEM - Products</title>
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
    <link rel="stylesheet" href="products.css">
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
                        <h4 class="modal-title">Edit Product</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" ><a href="products.php">×</a></button>
                    </div>
                    <div class="modal-body p-3">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="control-label">Category: </label>
                                    <select name="category1" id="" class="selected form-control form-white">
                                        <?php
                                        $sqlCategory = mysqli_query($conn, "SELECT * FROM `tbl_categories`");
                                        while ($itemCategory = mysqli_fetch_assoc($sqlCategory)) { ?>
                                            <option value="<?php echo $itemCategory['Id']; ?>" <?php if (isset($itemCategory['Id'])) {if ($itemCategory['Id'] == $infoProduct['idCategory']) {echo "SELECTED";} } ?>><?php echo $itemCategory['categoryName']; ?></option>
                                        <?php }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Brand: </label>
                                    <select name="brand1" id="" class="selected form-control form-white">
                                        <?php
                                        $sqlBrand = mysqli_query($conn, "SELECT * FROM `tbl_brands`");
                                        while ($itemBrand = mysqli_fetch_assoc($sqlBrand)) { ?>
                                            <option value="<?php echo $itemBrand['id']; ?>" <?php if (isset($itemBrand['id'])) {if ($itemBrand['id'] == $infoProduct['idBrand']) {echo "SELECTED";} } ?>><?php echo $itemBrand['brandName']; ?></option>
                                        <?php }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Product ID: </label>
                                    <input class="form-control form-white" placeholder="Enter Product Id ..." type="text" name="id1" value="<?=$infoProduct['productId']?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Product Code: </label>
                                    <input class="form-control form-white" placeholder="Enter Product Code ..." type="text" name="code1" value="<?=$infoProduct['productCode']?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Product Name: </label>
                                    <input class="form-control form-white" placeholder="Enter Product Name ..." type="text" name="name1" value="<?=$infoProduct['productName']?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Product Version: </label>
                                    <input class="form-control form-white" placeholder="Enter Product Version ..." type="text" name="version1" value="<?=$infoProduct['productVersion']?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Product Iamge: </label>
                                    <input type="file" multiple="multiple" name="image1" class="form-control">
                                    <span><?=$infoProduct['productImage']?></span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="control-label">Description: </label>
                                    <textarea name="description1" id="des" cols="150" rows="10" required>
                                        <?=$infoProduct['productDescription']?>
                                    </textarea>
                                    <script>
                                        CKEDITOR.replace('des')
                                    </script>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="text-right pt-2">
                                <button name="EditProduct" class="btn btn-primary ml-1">Save</button>
                                <button type="button" class="btn btn-light " data-dismiss="modal" name="close"><a style="color: #fff;" href="products.php">Close</a></button>
                            </div>
                        </div>
                    </div> <!-- end modal-body-->
                </div> <!-- end modal-content-->
            </div> <!-- end modal dialog-->
        </form>
    </div>
    <!-- End Form Edit -->
    <!-- Form Edit -->
    <div class="form-add-version form" id="form-add-version">
        <form method="POST" class="" enctype="multipart/form-data">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">ADD NEW VERSION PRODUCT</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" ><a href="products.php">×</a></button>
                    </div>
                    <div class="modal-body p-3">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="control-label">Product ID: </label>
                                    <input class="form-control form-white" placeholder="Enter Product ID ..." type="text" name="prodId" value="<?=$_GET['productId']?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Version Code: </label>
                                    <input class="form-control form-white" placeholder="Enter Version Code ..." type="text" name="versionCode" value="" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Version Name: </label>
                                    <input class="form-control form-white" placeholder="Enter Version Name ..." type="text" name="versionName" value="" required>
                                </div>
                                
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="control-label">Version Image: </label>
                                    <input type="file" multiple="multiple" name="versionImage" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Version Price: </label>
                                    <input class="form-control form-white" placeholder="Enter Version Price ..." type="text" name="versionPrice" value="" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="text-right pt-2">
                                <button name="addVersion" class="btn btn-primary ml-1">Save</button>
                                <button type="button" class="btn btn-light " data-dismiss="modal" name="close"><a style="color: #fff;" href="products.php">Close</a></button>
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
                        <a href="../../logout.php" class="dropdown-item notify-item">
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
                                    <a href="products.php">PRODUCTS</a>
                                </li>
                                <li>
                                    <a href="../version/version.php">VERSION</a>
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
                                        <li class="breadcrumb-item active">PRODUCTS</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">PRODUCTS</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <!--  -->

                    <form method="POST" class="modal fade" id="addModel" tabindex="-1" enctype="multipart/form-data">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Create New Product</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body p-3">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Category: </label>
                                                <select class="form-control" name="category">
                                                    <?php
                                                    $sqlCat = mysqli_query($conn, "SELECT * FROM tbl_categories");
                                                    while ($rowCat = mysqli_fetch_assoc($sqlCat)) { ?>
                                                        <option value="<?php echo $rowCat['Id']; ?>"><?php echo $rowCat['categoryName']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Brand: </label>
                                                <select class="form-control" name="brand">
                                                    <?php
                                                    $sqlBrand = mysqli_query($conn, "SELECT * FROM tbl_brands");
                                                    while ($rowBrand = mysqli_fetch_assoc($sqlBrand)) { ?>
                                                        <option value="<?php echo $rowBrand['id']; ?>"><?php echo $rowBrand['brandName']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Product ID: </label>
                                                <input class="form-control form-white" placeholder="Enter Product Id ..." type="text" name="id" value="" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Product Code: </label>
                                                <input class="form-control form-white" placeholder="Enter Product Code ..." type="text" name="code" value="" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Product Name: </label>
                                                <input class="form-control form-white" placeholder="Enter Product Name ..." type="text" name="name" value="" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Product Version: </label>
                                                <input class="form-control form-white" placeholder="Enter Product Version ..." type="text" name="version" value="" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Product Iamge: </label>
                                                <input type="file" multiple="multiple" name="image" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="control-label">Description: </label>
                                                <textarea name="description" id="des" cols="150" rows="10" required>

                                                </textarea>
                                                <script>
                                                    CKEDITOR.replace('des')
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="text-right pt-2">
                                            <button name="add" class="btn btn-primary ml-1">Save</button>
                                            <button type="button" class="btn btn-light " data-dismiss="modal" name="close">Close</button>
                                        </div>
                                    </div>
                                </div> <!-- end modal-body-->
                            </div> <!-- end modal-content-->
                        </div> <!-- end modal dialog-->
                    </form>
                    <!--  -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <table id="basic-datatable" class="table dt-responsive nowrap">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>PRODUCT ID</th>
                                                <th>PRODUCT Code</th>
                                                <th>CATEGORY</th>
                                                <th>BRAND</th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $i = 1;
                                            while ($row = mysqli_fetch_assoc($sqlProduct)) {
                                            ?>
                                                <tr>
                                                    <td>
                                                        <?= $i++ ?>
                                                    </td>
                                                    <td>
                                                        <p><?= $row['productId'] ?></p>
                                                    </td>
                                                    <td>
                                                        <?= $row['productCode'] ?>
                                                    </td>
                                                   
                                                    <td>
                                                        <?php
                                                        $idCat = $row['idCategory'];
                                                        $sqlCat = mysqli_query($conn, "SELECT * FROM tbl_categories WHERE Id = $idCat");
                                                        $sqlCatName = mysqli_fetch_assoc($sqlCat);
                                                        echo $sqlCatName['categoryName'];

                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $idBrand = $row['idBrand'];
                                                        $sqlBrand = mysqli_query($conn, "SELECT * FROM tbl_brands WHERE id = $idBrand");
                                                        $sqlBrandName = mysqli_fetch_assoc($sqlBrand);
                                                        echo $sqlBrandName['brandName'];

                                                        ?>
                                                    </td>
                                                    <td></td>
                                                    <td><a href="products.php?productId=<?php echo $row['id']; ?>&categoryId=<?php echo $row['idCategory']; ?>"  class="add"><i class="icon-edit la la-edit"></i></a></td>
                                                    <td><a href="products.php?id=<?php echo $row['id']; ?>" name="edit" class="edit"><i class="icon-edit la la-edit"></i></a></td>
                                                    <td><a onclick="return Del1('<?=$row['productName']?>')" class="delete" href="deleteProduct.php?id=<?=$row['id']; ?>"><i class="icon-delete la la-trash-o"></i></a></td>
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
                        <a href="#" data-toggle="modal" data-target="#addModel" class="btn btn-lg font-13  btn-success btn-block  ">
                            <i class="mdi mdi-plus-circle-outline"></i> Add
                        </a>
                    </div>
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
        if(isset($_GET['id'])){
            echo '<script> document.getElementById("form-edit").classList.add("show")</script>';

            $id = $_GET['id'];

            $sqlEditCategory = mysqli_query($conn, "SELECT * FROM tbl_categories WHERE Id = $id");
            $infoCategory = mysqli_fetch_assoc($sqlEditCategory);
        }
    ?>
    <?php
        if(isset($_GET['productId'])){
            echo '<script> document.getElementById("form-add-version").classList.add("show")</script>';
           
        }
    ?>
    <script src="categories.js"></script>
    
</body>

</html>