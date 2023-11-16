<?php
session_start();
require_once("../config/config.php");
if (!isset($_SESSION['admin_name'])) {
    header("location: login.php");
}
$day_of_firt_this_week = mysqli_query($conn,"SELECT DATE_SUB(CURDATE(), INTERVAL WEEKDAY(CURDATE()) DAY) AS first_day_of_week;");

$money_last_week = mysqli_query($conn, "SELECT * FROM cart WHERE time BETWEEN CURDATE() - INTERVAL WEEKDAY(CURDATE()) + 1 DAY - INTERVAL 1 WEEK AND CURDATE() - INTERVAL WEEKDAY(CURDATE()) DAY - INTERVAL 1 WEEK AND id_status = 3");
$total_last_week = 0;
while ($row_last_week = mysqli_fetch_array($money_last_week)) {
    $total_last_week += $row_last_week['total'];
}

$money_this_week = mysqli_query($conn, "SELECT * FROM cart WHERE time BETWEEN CURDATE() - INTERVAL WEEKDAY(CURDATE()) DAY AND CURDATE() + INTERVAL (6 - WEEKDAY(CURDATE())) DAY AND id_status = 3");
$total_this_week = 0;
while ($row_this_week = mysqli_fetch_array($money_this_week)) {
    $total_this_week += $row_this_week['total'];
}

$money_today = mysqli_query($conn, "SELECT * FROM `cart` WHERE DATE(time) = DATE(now()) AND id_status = 3");
$total_today = 0;
while ($row_today = mysqli_fetch_array($money_today)) {
    $total_today += $row_today['total'];
}
$money_month = mysqli_query($conn, "SELECT * FROM `cart` WHERE MONTH(time) = MONTH(now()) AND id_status = 3");
$total_month = 0;
while ($row_month = mysqli_fetch_array($money_month)) {
    $total_month += $row_month['total'];
}

$money_last_month = mysqli_query($conn, "SELECT * FROM `cart` WHERE MONTH(time) = MONTH(DATE_SUB(now(), INTERVAL 1 MONTH)) AND id_status = 3");
$total_last_month = 0;
while ($row_last_month = mysqli_fetch_array($money_last_month)) {
    $total_last_month += $row_last_month['total'];
}
$money = mysqli_query($conn, "SELECT * FROM cart WHERE id_status = 3");
$total = 0;
while ($row = mysqli_fetch_array($money)) {
    $total += $row['total'];
}

$money_dec = mysqli_query($conn, "SELECT * FROM cart WHERE MONTH(time) = 12 AND id_status = 3");
$total_dec = 0;
while ($row_dec = mysqli_fetch_array($money_dec)) {
    $total_dec += $row_dec['total'];
}

$money_nov = mysqli_query($conn, "SELECT * FROM cart WHERE MONTH(time) = 11 AND id_status = 3");
$total_nov = 0;
while ($row_nov = mysqli_fetch_array($money_nov)) {
    $total_nov += $row_nov['total'];
}

$money_oct = mysqli_query($conn, "SELECT * FROM cart WHERE MONTH(time) = 10 AND id_status = 3");
$total_oct = 0;
while ($row_oct = mysqli_fetch_array($money_oct)) {
    $total_oct += $row_oct['total'];
}

$money_sep = mysqli_query($conn, "SELECT * FROM cart WHERE MONTH(time) = 9 AND id_status = 3");
$total_sep = 0;
while ($row_sep = mysqli_fetch_array($money_sep)) {
    $total_sep += $row_sep['total'];
}

$money_aug = mysqli_query($conn, "SELECT * FROM cart WHERE MONTH(time) = 8 AND id_status = 3");
$total_aug = 0;
while ($row_aug = mysqli_fetch_array($money_aug)) {
    $total_aug += $row_aug['total'];
}

$money_jul = mysqli_query($conn, "SELECT * FROM cart WHERE MONTH(time) = 7 AND id_status = 3");
$total_jul = 0;
while ($row_jul = mysqli_fetch_array($money_jul)) {
    $total_jul += $row_jul['total'];
}

$money_jun = mysqli_query($conn, "SELECT * FROM cart WHERE MONTH(time) = 6 AND id_status = 3");
$total_jun = 0;
while ($row_jun = mysqli_fetch_array($money_jun)) {
    $total_jun += $row_jun['total'];
}

$money_may = mysqli_query($conn, "SELECT * FROM cart WHERE MONTH(time) = 5 AND id_status = 3");
$total_may = 0;
while ($row_may = mysqli_fetch_array($money_may)) {
    $total_may += $row_may['total'];
}
$money_apr = mysqli_query($conn, "SELECT * FROM cart WHERE MONTH(time) = 4 AND id_status = 3");
$total_apr = 0;
while ($row_apr = mysqli_fetch_array($money_apr)) {
    $total_apr += $row_apr['total'];
}
$money_mar = mysqli_query($conn, "SELECT * FROM cart WHERE MONTH(time) = 3 AND id_status = 3");
$total_mar = 0;
while ($row_mar = mysqli_fetch_array($money_mar)) {
    $total_mar += $row_mar['total'];
}
$money_feb = mysqli_query($conn, "SELECT * FROM cart WHERE MONTH(time) = 2 AND id_status = 3");
$total_feb = 0;
while ($row_feb = mysqli_fetch_array($money_feb)) {
    $total_feb += $row_feb['total'];
}
$money_jan = mysqli_query($conn, "SELECT * FROM cart WHERE MONTH(time) = 1 AND id_status = 3");
$total_jan = 0;
while ($row_jan = mysqli_fetch_array($money_jan)) {
    $total_jan += $row_jan['total'];
}

$money_Mon = mysqli_query($conn, "SELECT * FROM cart WHERE DAYOFWEEK(time) = 2 AND WEEK(time) = WEEK(CURDATE()) AND id_status = 3");
$total_Mon = 0;
while ($row_Mon = mysqli_fetch_array($money_Mon)) {
    $total_Mon += $row_Mon['total'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Cake Bakery - Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="Coderthemes" name="author">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets\images\fav-icon.png">
    <!-- plugin css -->
    <link href="assets\libs\jquery-vectormap\jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css">

    <!-- App css -->
    <link href="assets\css\bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets\css\icons.min.css" rel="stylesheet" type="text/css">
    <link href="assets\css\app.min.css" rel="stylesheet" type="text/css">

</head>

<body>
    <!-- Begin page -->
    <div id="wrapper">
        <!-- Topbar Start -->
        <div class="navbar-custom">
            <ul class="list-unstyled topnav-menu float-right mb-0">
                <li class="d-none d-sm-block">
                    <form class="app-search">
                        <div class="app-search-box">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search...">
                                <div class="input-group-append">
                                    <button class="btn" type="submit">
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
                                    <img src="assets\images\users\user-1.jpg" class="img-fluid rounded-circle" alt="">
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
                                    <img src="assets\images\users\user-4.jpg" class="img-fluid rounded-circle" alt="">
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
                        <img src="assets\images\users\user-1.jpg" alt="user-image" class="rounded-circle">
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
                        <a href="logout.php" class="dropdown-item notify-item">
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
                        <img src="assets\images\logo-2.png" alt="" height="24">
                        <!-- <span class="logo-lg-text-light">Cake Bakery</span> -->
                    </span>
                    <span class="logo-sm">
                        <!-- <span class="logo-sm-text-dark">X</span> -->
                        <img src="assets\images\fav-icon.png" alt="" height="28">
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
                            Báo cáo tài chính
                        </a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">
                            Báo cáo hàng tháng
                        </a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">
                            Báo cáo hàng tháng
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
                                <span> Cake Bakery </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li>
                                    <a href="category.php">Category</a>
                                </li>
                                <li>
                                    <a href="product.php">Products</a>
                                </li>
                                <li>
                                    <a href="customer.php">Customers</a>
                                </li>
                                
                                
                                <li>
                                    <a href="order.php">Order</a>
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
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Cake Bakery</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                                        <li class="breadcrumb-item active">Dashboard</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Dashboard</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-xl-3">
                            <div class="card-box">
                                <i class="fa fa-info-circle text-muted float-right" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="More Info"></i>
                                <h4 class="mt-0 font-16">Revenue</h4>
                                <h2 class="text-primary my-4 text-center">$<span data-plugin="counterup"><?=$total?>.00</span></h2>
                                <div class="row mb-4">
                                    <div class="col-6">
                                        <p class="text-muted mb-1">This Month</p>
                                        <h3 class="mt-0 font-20">$<?php echo $total_month; ?> <?php if(($total_month/10  -100)<0){echo '<small class="badge badge-light-danger font-13">'. ($total_month/10  -100) ."%".'</small>';}else{echo '<small class="badge badge-light-success font-13">'. ($total_month/10  -100)."%" . '</small>';}?></h3>
                                    </div>

                                    <div class="col-6">
                                        <p class="text-muted mb-1">Last Month</p>
                                        <h3 class="mt-0 font-20">$<?php echo $total_last_month; ?> <?php if(($total_last_month/10  -100)<0){echo '<small class="badge badge-light-danger font-13">'. ($total_last_month/10  -100) . "%". '</small>';}else{echo '<small class="badge badge-light-success font-13">'. ($total_last_month/10  -100). "%" .'</small>';}?></h3>
                                    </div>
                                </div>

                                <div class="mt-5">
                                    <span data-plugin="peity-line" data-fill="#56c2d6" data-stroke="#4297a6" data-width="100%" data-height="50">3,5,2,9,7,2,5,3,9,6,5,9,7</span>
                                </div>

                            </div> <!-- end card-box-->
                        </div>

                        <div class="col-xl-6">
                            <div class="card-box" dir="ltr">
                                <div class="float-right d-none d-md-inline-block">
                                    <div class="btn-group mb-2">
                                        <button type="button" class="btn btn-xs btn-light">Today</button>
                                        <button type="button" class="btn btn-xs btn-light">Weekly</button>
                                        <button type="button" class="btn btn-xs btn-light active">Monthly</button>
                                    </div>
                                </div>
                                <h4 class="header-title mb-1">Revenue by month</h4>
                                <div id="rotate-labels-column" class="apex-charts"></div>
                            </div> <!-- end card-box-->
                        </div> <!-- end col -->

                        <div class="col-xl-3">
                            <div class="card-box">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="avatar-sm bg-light rounded">
                                            <i class="fe-shopping-cart avatar-title font-22 text-success"></i>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-right">
                                            <h3 class="text-dark my-1"><span data-plugin="counterup"><?php $slq_car = mysqli_query($conn,"SELECT * FROM cart");$count_cart = mysqli_num_rows($slq_car);echo $count_cart; ?></span></h3>
                                            <p class="text-muted mb-1 text-truncate">Total Orders</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <h6 class="text-uppercase">Target <span class="float-right">49%</span></h6>
                                    <div class="progress progress-sm m-0">
                                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="49" aria-valuemin="0" aria-valuemax="100" style="width: 49%">
                                            <span class="sr-only">49% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end card-box-->

                            <div class="card-box">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="avatar-sm bg-light rounded">
                                            <i class="fe-aperture avatar-title font-22 text-purple"></i>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-right">
                                            <h3 class="text-dark my-1">$<span data-plugin="counterup"><?php echo $total_month; ?></span></h3>
                                            <p class="text-muted mb-1 text-truncate">Income status</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <h6 class="text-uppercase">Target <span class="float-right">60%</span></h6>
                                    <div class="progress progress-sm m-0">
                                        <div class="progress-bar bg-purple" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end card-box-->
                        </div>
                    </div>
                    <!-- end row -->


                    <div class="row">
                        <div class="col-xl-12">
                            <!-- Portlet card -->
                            <div class="card">
                                <div class="card-body" dir="ltr">
                                    <div class="card-widgets">
                                        <a href="javascript: void(0);" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                                        <a data-toggle="collapse" href="#cardCollpase1" role="button" aria-expanded="false" aria-controls="cardCollpase1"><i class="mdi mdi-minus"></i></a>
                                        <a href="javascript: void(0);" data-toggle="remove"><i class="mdi mdi-close"></i></a>
                                    </div>
                                    <h4 class="header-title mb-0">Revenue</h4>

                                    <div id="cardCollpase1" class="collapse pt-3 show">
                                        <div class="bg-soft-light">
                                            <div class="row text-center">
                                                <div class="col-md-4">
                                                    <p class="text-muted mb-0 mt-3">Today's Earning</p>
                                                    <h2 class="font-weight-normal mb-3">
                                                        
                                                        <span>$<?=$total_today?></span>
                                                    </h2>
                                                </div>
                                                <div class="col-md-4">
                                                    <p class="text-muted mb-0 mt-3">Current Week</p>
                                                    <h2 class="font-weight-normal mb-3">
                                                        
                                                        <span>$<?=$total_this_week?></span>
                                                    </h2>
                                                </div>
                                                <div class="col-md-4">
                                                    <p class="text-muted mb-0 mt-3">Previous Week</p>
                                                    <h2 class="font-weight-normal mb-3">
                                                        
                                                        <span>$<?=$total_last_week?></span>
                                                    </h2>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="apex-line-1" class="apex-charts" style="min-height: 480px !important;"></div>
                                    </div> <!-- collapsed end -->
                                </div> <!-- end card-body -->
                            </div> <!-- end card-->
                        </div> <!-- end col-->

                         <!-- end col-->
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-widgets">
                                        <a href="javascript: void(0);" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                                        <a data-toggle="collapse" href="#cardCollpase4" role="button" aria-expanded="false" aria-controls="cardCollpase4"><i class="mdi mdi-minus"></i></a>
                                        <a href="javascript: void(0);" data-toggle="remove"><i class="mdi mdi-close"></i></a>
                                    </div>
                                    <h4 class="header-title mb-0">Revenue by Location</h4>

                                    <div id="cardCollpase4" class="collapse pt-3 show">
                                        <div class="row">
                                            <div class="col-md-12 align-self-center">
                                                <div id="usa-map" style="height: 350px" class="dash-usa-map"></div>
                                            </div> <!-- end col -->
                                            
                                        </div> <!-- end row-->

                                    </div> <!-- collapsed end -->
                                </div> <!-- end card-body -->
                            </div> <!-- end card-->
                        </div> <!-- end col-->
                         <!-- end col-->
                    </div>
                    <!-- end row -->
                </div> <!-- container -->

            </div> <!-- content -->

            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            2023 &copy; Design by <a href="">Le Huy Dau</a>
                        </div>
                        <div class="col-md-6">
                            <div class="text-md-right footer-links d-none d-sm-block">
                                <a href="javascript:void(0);">About Us</a>
                                <a href="javascript:void(0);">Help</a>
                                <a href="javascript:void(0);">Contact Us</a>
                            </div>
                        </div>
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

    <!-- Right Sidebar -->

    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- Vendor js -->
    <script src="assets\js\vendor.min.js"></script>

    <!-- Third Party js-->
    <script src="assets\libs\peity\jquery.peity.min.js"></script>
    <script src="assets\libs\apexcharts\apexcharts.min.js"></script>
    <script src="assets\libs\jquery-vectormap\jquery-jvectormap-1.2.2.min.js"></script>
    <script src="assets\libs\jquery-vectormap\jquery-jvectormap-us-merc-en.js"></script>

    <!-- Dashboard init -->
    <script src="assets\js\pages\dashboard-1.init.js"></script>

    <!-- App js -->
    <script src="assets\js\app.min.js"></script>
<?php
    $money_Tue = mysqli_query($conn, "SELECT * FROM cart WHERE DAYOFWEEK(time) = 3 AND WEEK(time) = WEEK(CURDATE()) AND id_status = 3");
    $total_Tue = 0;
    while ($row_Tue = mysqli_fetch_array($money_Tue)) {
        $total_Tue += $row_Tue['total'];
    }
    $money_Wed = mysqli_query($conn, "SELECT * FROM cart WHERE DAYOFWEEK(time) = 4 AND WEEK(time) = WEEK(CURDATE()) AND id_status = 3");
    $total_Wed = 0;
    while ($row_Wed = mysqli_fetch_array($money_Wed)) {
        $total_Wed += $row_Wed['total'];
    }
    $money_Thu = mysqli_query($conn, "SELECT * FROM cart WHERE DAYOFWEEK(time) = 5 AND WEEK(time) = WEEK(CURDATE()) AND id_status = 3");
    $total_Thu = 0;
    while ($row_Thu = mysqli_fetch_array($money_Thu)) {
        $total_Thu += $row_Tue['total'];
    }
    $money_Fri = mysqli_query($conn, "SELECT * FROM cart WHERE DAYOFWEEK(time) = 6 AND WEEK(time) = WEEK(CURDATE()) AND id_status = 3");
    $total_Fri = 0;
    while ($row_Fri = mysqli_fetch_array($money_Fri)) {
        $total_Fri += $row_Fri['total'];
    }
    $money_Sat = mysqli_query($conn, "SELECT * FROM cart WHERE DAYOFWEEK(time) = 7 AND WEEK(time) = WEEK(CURDATE()) AND id_status = 3");
    $total_Sat = 0;
    while ($row_Sat = mysqli_fetch_array($money_Sat)) {
        $total_Sat += $row_Sat['total'];
    }
    $money_Sun = mysqli_query($conn, "SELECT * FROM cart WHERE DAYOFWEEK(time) = 1 AND WEEK(time) = WEEK(CURDATE()) AND id_status = 3");
    $total_Sun = 0;
    while ($row_Sun = mysqli_fetch_array($money_Sun)) {
        $total_Sun += $row_Sun['total'];
    }


    $money_Mon_last_week = mysqli_query($conn, "SELECT * FROM cart WHERE DAYOFWEEK(time) = 2 AND WEEK(time) = WEEK(CURDATE()) - 1 AND id_status = 3");
    $total_Mon_last_week = 0;
    while ($row_Mon_last_week = mysqli_fetch_array($money_Mon_last_week)) {
        $total_Mon_last_week += $row_Mon_last_week['total'];
    }
    $Tueey_Tue_last_week = mysqli_query($conn, "SELECT * FROM cart WHERE DAYOFWEEK(time) = 3 AND WEEK(time) = WEEK(CURDATE()) - 1 AND id_status = 3");
    $total_Tue_last_week = 0;
    while ($row_Tue_last_week = mysqli_fetch_array($Tueey_Tue_last_week)) {
        $total_Tue_last_week += $row_Tue_last_week['total'];
    }
    $Wedey_Wed_last_week = mysqli_query($conn, "SELECT * FROM cart WHERE DAYOFWEEK(time) = 4 AND WEEK(time) = WEEK(CURDATE()) - 1 AND id_status = 3");
    $total_Wed_last_week = 0;
    while ($row_Wed_last_week = mysqli_fetch_array($Wedey_Wed_last_week)) {
        $total_Wed_last_week += $row_Wed_last_week['total'];
    }
    $Thuey_Thu_last_week = mysqli_query($conn, "SELECT * FROM cart WHERE DAYOFWEEK(time) = 5 AND WEEK(time) = WEEK(CURDATE()) - 1 AND id_status = 3");
    $total_Thu_last_week = 0;
    while ($row_Thu_last_week = mysqli_fetch_array($Thuey_Thu_last_week)) {
        $total_Thu_last_week += $row_Thu_last_week['total'];
    }
    $Friey_Fri_last_week = mysqli_query($conn, "SELECT * FROM cart WHERE DAYOFWEEK(time) = 6 AND WEEK(time) = WEEK(CURDATE()) - 1 AND id_status = 3");
    $total_Fri_last_week = 0;
    while ($row_Fri_last_week = mysqli_fetch_array($Friey_Fri_last_week)) {
        $total_Fri_last_week += $row_Fri_last_week['total'];
    }
    $Satey_Sat_last_week = mysqli_query($conn, "SELECT * FROM cart WHERE DAYOFWEEK(time) = 7 AND WEEK(time) = WEEK(CURDATE()) - 1 AND id_status = 3");
    $total_Sat_last_week = 0;
    while ($row_Sat_last_week = mysqli_fetch_array($Satey_Sat_last_week)) {
        $total_Sat_last_week += $row_Sat_last_week['total'];
    }
    $Suney_Sun_last_week = mysqli_query($conn, "SELECT * FROM cart WHERE DAYOFWEEK(time) = 1 AND WEEK(time) = WEEK(CURDATE()) - 1 AND id_status = 3");
    $total_Sun_last_week = 0;
    while ($row_Sun_last_week = mysqli_fetch_array($Suney_Sun_last_week)) {
        $total_Sun_last_week += $row_Sun_last_week['total'];
    }
?>
    <script>
        
    var options={
        chart:{height:279,type:"bar",toolbar:{show:!1}},
        plotOptions:{bar:{columnWidth:"30%",endingShape:"rounded"}},
        dataLabels:{enabled:!1},
        stroke:{width:2},
        colors:["#f0643b"],
        series:[{name:"Growth",data:
        [
            <?php echo $total_jan?>,
            <?php echo $total_feb?>,
            <?php echo $total_mar?>,
            <?php echo $total_apr?>,
            <?php echo $total_may?>,
            <?php echo $total_jun?>,
            <?php echo $total_jul?>,
            <?php echo $total_aug?>,
            <?php echo $total_sep?>,
            <?php echo $total_oct?>,
            <?php echo $total_nov?>,
            <?php echo $total_dec?>,
        ]
        }],
        grid:{borderColor:"#f1f3fa",padding:{right:0,bottom:0,left:0}},
        xaxis:{categories:["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],
        offsetX:0},
        yaxis:{title:{text:"Growth"}},
        fill:{type:"gradient",gradient:{shade:"light",type:"horizontal",shadeIntensity:.25,gradientToColors:void 0,inverseColors:!0,opacityFrom:.85,opacityTo:.85,stops:[50,0,100]}}
        };
        (   
            chart=new ApexCharts(document.querySelector("#rotate-labels-column"),options)).render();
            options={
                chart:{height:480,type:"line",zoom:{enabled:!1},toolbar:{show:!1}},
                colors:["#f0643b","#56c2d6"],dataLabels:{enabled:!0},
                stroke:{width:[3,3],curve:"smooth"},series:[{name:"Previus Week",
                data:[
                    <?php echo $total_Mon_last_week?>,
                    <?php echo $total_Tue_last_week?>,
                    <?php echo $total_Wed_last_week?>,
                    <?php echo $total_Thu_last_week?>,
                    <?php echo $total_Fri_last_week?>,
                    <?php echo $total_Sat_last_week?>,
                    <?php echo $total_Sun_last_week?>,
                ]},
                {name:"Current Week",
                    data:[
                        <?php echo $total_Mon?>,
                        <?php echo $total_Tue?>,
                        <?php echo $total_Wed?>,
                        <?php echo $total_Thu?>,
                        <?php echo $total_Fri?>,
                        <?php echo $total_Sat?>,
                        <?php echo $total_Sun?>,
                    ]}],
                    grid:{row:{colors:["transparent","transparent"],
                    opacity:.2
                },
                borderColor:"#f1f3fa"},
                markers:{style:"inverted",size:6},
                xaxis:{categories:["Mon","Tue","Wed","Thu","Fri","Sat","Sun"],
                
                title:{
                    
                    text:"This Week"}},
                yaxis:{title:{text:"Sales Analytics"},min:50,max:1000},
                legend:{position:"top",horizontalAlign:"right",floating:!0,offsetY:-25,offsetX:-5},
                responsive:[{breakpoint:600,options:{chart:{toolbar:{show:!1}},legend:{show:!1}}}]};
                (chart=new ApexCharts(document.querySelector("#apex-line-1"),options)).render();var chart;
                options={chart:{height:337,type:"radar",toolbar:{show:!1}},
                series:[{name:"Desktops",data:[80,50,30,40,100,20]},
                {name:"Tablets",data:[20,30,40,80,20,80]},
                {name:"Mobiles",data:[
                    <?php echo $total_Mon?>,
                    76,78,13,43,10
                ]}],
                stroke:{width:0,curve:"smooth"},
                fill:{opacity:.4},markers:{size:0},
                legend:{show:!0,offsetY:-10},
                colors:["#5089de","#56c2d6","#f0643b"],
                labels:["2011","2012","2013","2014","2015","2016"]};
                (chart=new ApexCharts(document.querySelector("#radar-multiple-series"),options)).render(),$("#usa-map").vectorMap({map:"us_merc_en",backgroundColor:"transparent",regionStyle:{initial:{fill:"#48525e"}},series:{regions:[{values:{"US-VA":"#a6d8d1","US-PA":"#a6d8d1","US-TN":"#a6d8d1","US-WY":"#a6d8d1","US-WA":"#a6d8d1","US-TX":"#a6d8d1"},
                attribute:"fill"}]}});    
    </script>
</body>

</html>