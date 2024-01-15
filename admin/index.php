<?php

require_once("../config/config.php");
include 'handle.php';
if (!isset($_SESSION['admin_id']) && !isset($_SESSION['permission']) && $_SESSION['permission'] != 1) {
    header("location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>TPMS - DASHBOARD</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="Coderthemes" name="author">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="../assets/images/logo/favicon.ico">
    <link href="assets\libs\jquery-vectormap\jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css">
    <link href="assets\css\bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets\css\icons.min.css" rel="stylesheet" type="text/css">
    <link href="assets\css\app.min.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div id="wrapper">
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

                                <a href="javascript:void(0);" class="dropdown-item notify-item active">
                                <div class="notify-icon">
                                    <img src="assets\images\users\user-1.jpg" class="img-fluid rounded-circle" alt="">
                                </div>
                                <p class="notify-details">Cristina Pride</p>
                                <p class="text-muted mb-0 user-msg">
                                    <small>Hi, How are you? What about our next meeting</small>
                                </p>
                            </a>

                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-primary">
                                    <i class="mdi mdi-comment-account-outline"></i>
                                </div>
                                <p class="notify-details">Caleb Flakelar commented on Admin
                                    <small class="text-muted">1 min ago</small>
                                </p>
                            </a>

                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon">
                                    <img src="assets\images\users\user-4.jpg" class="img-fluid rounded-circle" alt="">
                                </div>
                                <p class="notify-details">Karen Robinson</p>
                                <p class="text-muted mb-0 user-msg">
                                    <small>Wow ! this admin looks good and awesome design</small>
                                </p>
                            </a>

                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-warning">
                                    <i class="mdi mdi-account-plus"></i>
                                </div>
                                <p class="notify-details">New user registered.
                                    <small class="text-muted">5 hours ago</small>
                                </p>
                            </a>

                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-info">
                                    <i class="mdi mdi-comment-account-outline"></i>
                                </div>
                                <p class="notify-details">Caleb Flakelar commented on Admin
                                    <small class="text-muted">4 days ago</small>
                                </p>
                            </a>

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
                            <?php if (isset($_SESSION['admin_name'])) {
                                echo $_SESSION['admin_name'];
                            } ?> <i class="mdi mdi-chevron-down"></i>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                        <div class="dropdown-item noti-title">
                            <h5 class="m-0 text-white">
                                Welcome !
                            </h5>
                        </div>
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="fe-user"></i>
                            <span>Account</span>
                        </a>
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="fe-settings"></i>
                            <span>Setting</span>
                        </a>
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="fe-lock"></i>
                            <span>Screen Block</span>
                        </a>
                        <div class="dropdown-divider"></div>

                        <a href="logout.php" class="dropdown-item notify-item">
                            <i class="fe-log-out"></i>
                            <span>Logout</span>
                        </a>
                    </div>
                </li>
            </ul>
            <div class="logo-box">
                <a href="index.php" class="logo text-center">
                    <span class="logo-lg">
                        <img src="../assets/images/logo/logo-dark.png" alt="" height="24">
                    </span>
                    <span class="logo-sm">
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
                        
                        <a href="javascript:void(0);" class="dropdown-item">
                            Support
                        </a>
                    </div>
                </li>
            </ul>
        </div>
        <div class="left-side-menu">
            <div class="slimscroll-menu">
                
                <div id="sidebar-menu">
                    <ul class="metismenu" id="side-menu">
                        <li>
                            <a href="javascript: void(0);">
                                <i class="la la-dashboard"></i>
                                <span class="badge badge-info badge-pill float-right">2</span>
                                <span> HOME </span>
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
                        <?php
                            if(isset($_SESSION['permission']) && $_SESSION['permission'] ==  1){
                                ?>
                                    <li>
                                        <a href="javascript: void(0);">
                                            <i class="la la-connectdevelop"></i>
                                            <span> WEB </span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <ul class="nav-second-level" aria-expanded="false">
                                            <li>
                                                <a href="web/banner/banner.php">BANNER</a>
                                            </li>
                                            <li>
                                                <a href="email-read.php">Read Email</a>
                                            </li>
                                            <li>
                                                <a href="email-compose.php">Compose Email</a>
                                            </li>
                                        </ul>
                                    </li>
                                <?php
                            }
                        ?>
                        <?php
                            if(isset($_SESSION['permission']) && $_SESSION['permission'] ==  1){
                                ?>
                                    <li>
                                        <a href="javascript: void(0);">
                                            <i class="la la-home"></i>
                                            <span> AGENT </span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <ul class="nav-second-level" aria-expanded="false">
                                            <li>
                                                <a href="agent/list-agent/list-agent.php">LIST AGENT</a>
                                            </li>
                                            <li>
                                                <a href="agent/list-staff/list-staff.php">LIST STAFF</a>
                                            </li>
                                        </ul>
                                    </li>
                                <?php
                            }
                        ?>
                        <li>
                            <a href="javascript: void(0);">
                                <i class="la la-cube"></i>
                                <span> PRODUCTS </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li>
                                    <a href="categories/categories.php">CATEGORIES</a>
                                </li>
                                <li>
                                    <a href="brands/brands.php">BRANDS</a>
                                </li>
                                <li>
                                    <a href="products/products.php">PRODUCTS</a>
                                </li>
                                <li>
                                    <a href="version/version.php">VERSIONS</a>
                                </li>
                            </ul>
                        </li>
                        <?php
                            if(isset($_SESSION['permission']) && $_SESSION['permission'] ==  1){
                                ?>
                                    <li>
                                        <a href="javascript: void(0);">
                                            <i class="la la-envelope"></i>
                                            <span> Comment </span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <ul class="nav-second-level" aria-expanded="false">
                                            <li>
                                                <a href="comment/list-comment.php">List Comment</a>
                                            </li>
                                        </ul>
                                    </li>
                                <?php
                            }
                        ?>
                        <li>
                            <a href="javascript: void(0);">
                                <i class=" fab fa-opencart"></i>
                                <span> Order </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li>
                                    <a href="order/create-new-order.php">Create New Order</a>
                                </li>
                                <li>
                                    <a href="order/list-order.php">List Order</a>
                                </li>
                            </ul>
                        </li>
                        <?php
                            if(isset($_SESSION['permission']) && $_SESSION['permission'] ==  1){
                                ?>
                                    <li>
                                        <a href="javascript: void(0);">
                                            <i class=" fab fa-opencart"></i>
                                            <span>Online Order </span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <ul class="nav-second-level" aria-expanded="false">
                                            <li>
                                                <a href="orderonline/orderonline.php">List Online Order</a>
                                            </li>
                                            
                                        </ul>
                                    </li>
                                <?php
                            }
                        ?>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>   
        </div>
        <div class="content-page">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">TPMS</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                                        <li class="breadcrumb-item active">Dashboard</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Dashboard</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-3">
                            <div class="card-box" style="height: 470px;">
                                <i class="fa fa-info-circle text-muted float-right" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="More Info"></i>
                                <h4 class="mt-0 font-16">Revenue</h4>
                                <h2 class="text-primary my-4 text-center"><span style="font-size: 23px;"><?=number_format(getTotal($conn,0),0,"",".")?> đ</span></h2>
                                <div class="row mb-4">
                                    <div class="col-12">
                                        <p class="text-muted mb-1">This Month</p>
                                        <h3 class="mt-0 font-20"><?=number_format(getTotal($conn,1),0,"",".")?> đ<?php if((getTotal($conn,1)/10 - 100)<0){echo '<small class="badge badge-light-danger font-13">'. (getTotal($conn,1)/10  -100) ."%".'</small>';}else{echo '<small class="badge badge-light-success font-13">'. (getTotal($conn,1)/10  -100)."%" . '</small>';}?></h3>
                                    </div>

                                    <div class="col-12">
                                        <p class="text-muted mb-1">Last Month</p>
                                        <h3 class="mt-0 font-20"><?=number_format(getTotal($conn,2),0,"",".") ?> đ<?php if((getTotal($conn,2)/10  -100)<0){echo '<small class="badge badge-light-danger font-13">'. (getTotal($conn,2)/10  -100) . "%". '</small>';}else{echo '<small class="badge badge-light-success font-13">'. (getTotal($conn,2)/10  -100). "%" .'</small>';}?></h3>
                                    </div>
                                </div>
                                <div class="mt-5">
                                    <span data-plugin="peity-line" data-fill="#56c2d6" data-stroke="#4297a6" data-width="100%" data-height="50">3,5,2,9,7,2,5,3,9,6,5,9,7</span>
                                </div>

                            </div> 
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
                            </div> 
                        </div>
                        <div class="col-xl-3" style="display: flex;flex-direction: column;justify-content: space-between;">
                            <div class="card-box">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="avatar-sm bg-light rounded">
                                            <i class="fe-shopping-cart avatar-title font-22 text-success"></i>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-right">
                                            <h3 class="text-dark my-1"><span ><?=getCountOrderOnline($conn,0) ?></span></h3>
                                            <p class="text-muted mb-1 text-truncate">Total Orders</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <h6 class="text-uppercase">Target (100) <span class="float-right"><?=getCountOrderOnline($conn,0)?>%</span></h6>
                                    <div class="progress progress-sm m-0">
                                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="<?=getCountOrderOnline($conn,0)?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=getCountOrderOnline($conn,0)?>%">
                                            <span class="sr-only"><?=getCountOrderOnline($conn,0)?>% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-box">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="avatar-sm bg-light rounded">
                                            <i class="fe-aperture avatar-title font-22 text-purple"></i>
                                        </div>
                                    </div>
                                    <div class="col-9">
                                        <div class="text-center">
                                            <h3 class="text-dark my-1"><span style="font-size: 20px;"><?=number_format(getTotal($conn,1),0,"",".")?> đ</span></h3>
                                            <p class="text-muted mb-1 text-truncate">Income status</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <h6 class="text-uppercase">Target (1.000.000.000) <span class="float-right"><?=getTotal($conn,1)/1000000000 * 100?>%</span></h6>
                                    <div class="progress progress-sm m-0">
                                        <div class="progress-bar bg-purple" role="progressbar" aria-valuenow="<?=getTotal($conn,1)/1000000000 * 100?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=getTotal($conn,1)/1000000000 * 100?>%">
                                            <span class="sr-only"><?=getTotal($conn,1)/1000000000 * 100?>% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-6">
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
                                                        <span style="font-size: 20px;"><?=number_format(getTotal($conn,4),0,"",".")?>đ</span>
                                                    </h2>
                                                </div>
                                                <div class="col-md-4">
                                                    <p class="text-muted mb-0 mt-3">Current Week</p>
                                                    <h2 class="font-weight-normal mb-3">
                                                        <span style="font-size: 20px;"><?=number_format(getTWeek($conn,1),0,"",".")?>đ</span>
                                                    </h2>
                                                </div>
                                                <div class="col-md-4">
                                                    <p class="text-muted mb-0 mt-3">Previous Week</p>
                                                    <h2 class="font-weight-normal mb-3">
                                                        <span style="font-size: 20px;"><?=number_format(getTWeek($conn,2),0,"",".")?>đ</span>
                                                    </h2>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="apex-line-1" class="apex-charts" style="min-height: 480px !important;"></div>
                                    </div> 
                                </div> 
                            </div> 
                        </div>
                    </div>
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
                                            </div> 
                                        </div> 
                                    </div> 
                                </div> 
                            </div> 
                        </div>
                        
                    </div>
                    
                </div> 

            </div> 

           
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
        </div>
    </div>
    <div class="rightbar-overlay"></div>
    <script src="assets\js\vendor.min.js"></script>

    <script src="assets\libs\peity\jquery.peity.min.js"></script>
    <script src="assets\libs\apexcharts\apexcharts.min.js"></script>
    <script src="assets\libs\jquery-vectormap\jquery-jvectormap-1.2.2.min.js"></script>
    <script src="assets\libs\jquery-vectormap\jquery-jvectormap-us-merc-en.js"></script>
    <script src="assets\js\pages\dashboard-1.init.js"></script>

    <script src="assets\js\app.min.js"></script>
    <script>
    var options={
        chart:{height:400,type:"bar",toolbar:{show:!1}},
        plotOptions:{bar:{columnWidth:"30%",endingShape:"rounded"}},
        dataLabels:{enabled:!1},
        stroke:{width:2},
        colors:["#f0643b"],
        series:[{name:"Growth",data:
        [
            <?=getTotalMonth($conn,1)?>,
            <?=getTotalMonth($conn,2)?>,
            <?=getTotalMonth($conn,3)?>,
            <?=getTotalMonth($conn,4)?>,
            <?=getTotalMonth($conn,5)?>,
            <?=getTotalMonth($conn,6)?>,
            <?=getTotalMonth($conn,7)?>,
            <?=getTotalMonth($conn,8)?>,
            <?=getTotalMonth($conn,9)?>,
            <?=getTotalMonth($conn,10)?>,
            <?=getTotalMonth($conn,11)?>,
            <?=getTotalMonth($conn,12)?>,
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
                    <?=getTotalWeek($conn,1,2)?>,
                    <?=getTotalWeek($conn,1,3)?>,
                    <?=getTotalWeek($conn,1,4)?>,
                    <?=getTotalWeek($conn,1,5)?>,
                    <?=getTotalWeek($conn,1,6)?>,
                    <?=getTotalWeek($conn,1,7)?>,
                    <?=getTotalWeek($conn,1,1)?>,
                ]},
                {name:"Current Week",
                    data:[
                        <?=getTotalWeek($conn,2,2)?>,
                        <?=getTotalWeek($conn,2,3)?>,
                        <?=getTotalWeek($conn,2,4)?>,
                        <?=getTotalWeek($conn,2,5)?>,
                        <?=getTotalWeek($conn,2,6)?>,
                        <?=getTotalWeek($conn,2,7)?>,
                        <?=getTotalWeek($conn,2,1)?>,
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
                    30,
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