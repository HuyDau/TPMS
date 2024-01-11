<?php
require_once("../../config/config.php");
include '../handle.php';
if (!isset($_SESSION['admin_id']) && isset($_SESSION['permission']) && $_SESSION['permission'] != 1) {
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>TPMS - LIST COMMENT</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="Coderthemes" name="author">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   
    <link rel="shortcut icon" href="../../assets/images/logo/favicon.ico">
    
    <link href="..\assets\libs\jquery-vectormap\jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css">
    
    <link href="..\assets\css\bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="..\assets\css\icons.min.css" rel="stylesheet" type="text/css">
    <link href="..\assets\css\app.min.css" rel="stylesheet" type="text/css">

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
                                    <img src="..\assets\images\users\user-1.jpg" class="img-fluid rounded-circle" alt="">
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
                                    <img src="..\assets\images\users\user-4.jpg" class="img-fluid rounded-circle" alt="">
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
                        <img src="..\assets\images\users\user-1.jpg" alt="user-image" class="rounded-circle">
                        <span class="pro-user-name ml-1">
                            <?php if (isset($_SESSION['user_admin'])) {
                                echo $_SESSION['fullname_admin'];
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
                        <img src="..\assets\images\logo-2.png" alt="" height="24">
                        <!-- <span class="logo-lg-text-light">Cake Bakery</span> -->
                    </span>
                    <span class="logo-sm">
                        
                        <img src="..\assets\images\fav-icon.png" alt="" height="28">
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
                        Support
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
                                    <a href="../index.php">Statistical</a>
                                </li>
                                <li>
                                    <a href="../index2.php">Details Statistical</a>
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
                                                <a href="../agent/list-agent/list-agent.php">LIST AGENT</a>
                                            </li>
                                            <li>
                                                <a href="../agent/list-staff/list-staff.php">LIST STAFF</a>
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
                                    <a href="../categories/categories.php">CATEGORIES</a>
                                </li>
                                <li>
                                    <a href="../brands/brands.php">BRANDS</a>
                                </li>
                                <li>
                                    <a href="../products/products.php">PRODUCTS</a>
                                </li>
                                <li>
                                    <a href="../version/version.php">VERSIONS</a>
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
                                                <a href="list-comment.php">List Comment</a>
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
                                    <a href="../order/create-new-order.php">Create New Order</a>
                                </li>
                                <li>
                                    <a href="../order/list-order.php">List Order</a>
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
                                                <a href="../orderonline/orderonline.php">List Online Order</a>
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
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Comment</a></li>
                                        <li class="breadcrumb-item active">List Comment</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Comment</h4>
                            </div>
                        </div>
                    </div>
                    


                    <div class="row">

                        
                        <div class="col-12">
                            <div class="card-box">
                                <div>
                                    <div class="mt-3">
                                        <ul class="message-list">
                                            <?php
                                            $sqlComment = mysqli_query($conn, "SELECT * FROM tbl_comments");
                                            while ($itemComment = mysqli_fetch_assoc($sqlComment)) {
                                            ?>
                                                <li class="unread" style="display: flex;">
                                                    <div class="col-mail col-8">
                                                        <?= $itemComment['star'] ?><span class="star-toggle far fa-star text-warning" style=" margin: auto 10px;"></span>
                                                        <a style="margin-right: 10px;" href="rep-comment.php?commentId=<?= $itemComment['id'] ?>" class="title"> <?= $itemComment['name'] ?> </a> || <a style="margin-left: 10px;" href="../../chi-tiet-san-pham.php?idsanpham=<?= $itemComment['versionId'] ?>"> <?= getDetailProduct($conn, $itemComment['versionId'])['versionName'] ?></a>
                                                    </div>
                                                    <div class="col-mail col-4" style="justify-content: space-between;">
                                                        <a href="rep-comment.php?commentId=<?= $itemComment['id'] ?>" class="subject">
                                                            <span class="teaser"> <?= $itemComment['content'] ?> </span>
                                                        </a>
                                                        <div class="date">
                                                            <?php $date_now = strtotime($itemComment['datetime']);
                                                            echo date("M  d,  Y", $date_now);
                                                            ?>
                                                        </div>
                                                    </div>
                                                </li>
                                            <?php
                                            }
                                            ?>

                                        </ul>
                                    </div>
                                    <!-- end .mt-4 -->

                                    <div class="row">
                                        <div class="col-7 mt-1">
                                            Showing 1 - 20 of <?php $count_contact = mysqli_num_rows($sqlComment);
                                                                echo $count_contact; ?>
                                        </div>
                                        <div class="col-5">
                                            <div class="btn-group float-right">
                                                <button type="button" class="btn btn-light btn-sm"><i class="mdi mdi-chevron-left"></i></button>
                                                <button type="button" class="btn btn-info btn-sm"><i class="mdi mdi-chevron-right"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                                                    </div>
                               

                                <div class="clearfix"></div>
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

    
    <script src="..\assets\js\vendor.min.js"></script>

    
    <script src="..\assets\js\pages\inbox.js"></script>

    
    <script src="..\assets\js\app.min.js"></script>

</body>

</html>