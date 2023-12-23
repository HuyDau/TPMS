<?php
session_start();
if (!isset($_SESSION['admin_user'])) {
    header("location: ../../login.php");
}

require_once("../../../config/config.php");

if (isset($_POST['sbm']) && !empty($_POST['search'])) {
    $search = $_POST['search'];
    $sqlBanner = mysqli_query($conn, "SELECT * FROM tbl_staff WHERE bannerTitle LIKE '%$search%' OR bannerContent LIKE'%$search%' ");
} else {
    $sqlStaff = mysqli_query($conn, "SELECT * FROM tbl_staff ");
}
if (isset($_POST['all_prd'])) {
    unset($_POST['sbm']);
}


if (isset($_POST['addPosition'])) {
    $agent = $_POST['agent'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $gmail = $_POST['gmail'];
    $position = $_POST['position'];

    $querySatff = mysqli_query($conn, "INSERT INTO `tbl_staff` (`id`, `idAgent`, `staffName`, `staffPhone`, `staffAddress`, `staffGmail`, `idPosition`) VALUES (NULL, '$agent', '$name', '$phone', '$address', '$gmail', '$position');");
    if ($querySatff) {
        echo "<script>window.alert('Successful!');window.location.href = 'list-staff.php'</script>";
    }
}

if(isset($_GET['idStaff'])){

    $idStaff = $_GET['idStaff'];

    $sqlEditStaff = mysqli_query($conn, "SELECT * FROM tbl_staff WHERE id = $idStaff");
    $infoStaff = mysqli_fetch_assoc($sqlEditStaff);

    if (isset($_POST['editStaff'])) {
        $agent1 = $_POST['agent1'];
        $name1 = $_POST['name1'];
        $address1 = $_POST['address1'];
        $phone1 = $_POST['phone1'];
        $gmail1 = $_POST['gmail1'];
        $position1 = $_POST['position1'];
        //echo "UPDATE `tbl_staff` SET `idAgent`='$agent1',`staffName`='$name1',`staffPhone`='$phone1',`staffAddress`='$address1',`staffGmail`='$gmail1',`staffPosition`='$position1' WHERE id = $id";
        $edit = mysqli_query($conn, "UPDATE `tbl_staff` SET `idAgent`='$agent1',`staffName`='$name1',`staffPhone`='$phone1',`staffAddress`='$address1',`staffGmail`='$gmail1',`idPosition`='$position1' WHERE id = $idStaff");

        if($edit){
            header("Location: list-staff.php");
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>TECHNOLOGY PRODUCTS MANAGER SYSTEM - STAFF</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="Coderthemes" name="author">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- App favicon -->
    <link rel="shortcut icon" href="../../../assets/images/logo/favicon.ico">
    <!-- third party css -->
    <link href="..\..\assets\libs\datatables\dataTables.bootstrap4.css" rel="stylesheet" type="text/css">
    <link href="..\..\assets\libs\datatables\responsive.bootstrap4.css" rel="stylesheet" type="text/css">
    <link href="..\..\assets\libs\datatables\buttons.bootstrap4.css" rel="stylesheet" type="text/css">
    <link href="..\..\assets\libs\datatables\select.bootstrap4.css" rel="stylesheet" type="text/css">
    <!-- third party css end -->
    <!-- App css -->
    <link href="..\..\assets\css\bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="..\..\assets\css\icons.min.css" rel="stylesheet" type="text/css">
    <link href="..\..\assets\css\app.min.css" rel="stylesheet" type="text/css">
    <link href="..\..\assets\css\style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <!-- Style Css -->
    <link rel="stylesheet" href="../../assets/scss/admin.css">
    <link rel="stylesheet" href="banner.css">
    <!-- Font awesome -->
    <link rel="stylesheet" href="../../assets/fontawesome/css/all.min.css">
    <script src="../../assets/fontawesome/js/all.min.js"></script>
    <link rel="stylesheet" href="../../assets/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <!-- CK Editor -->
    <script src="../../assets/ckeditor/ckeditor.js"></script>
</head>

<body>
    <!-- Form Edit -->
    <div class="form-edit form" id="form-edit"  class="modal fade" tabindex="-1">
        <form method="POST" class="" enctype="multipart/form-data">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">EDIT STAFF</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" ><a href="list-staff.php">×</a></button>
                    </div>
                    <div class="modal-body p-3">
                        <div>
                            <div class="form-group">
                                <label>AGENT: </label>
                                <select class="form-control" name="agent1">
                                    <?php
                                    $sqlAgent = mysqli_query($conn, "SELECT * FROM tbl_agents");
                                    while ($rowAgent = mysqli_fetch_assoc($sqlAgent)) { ?>
                                        <option value="<?php echo $rowAgent['id']; ?>" <?php if (isset($infoStaff['id'])) {if ($rowAgent['id'] == $infoStaff['idAgent']) {echo "SELECTED";} } ?>><?php echo $rowAgent['agentName']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">STAFF NAME: </label>
                                <input class="form-control form-white" placeholder="Enter Staff Name ..." type="text" name="name1" value="<?php if(isset($infoStaff['staffName'])){echo $infoStaff['staffName'];}?>" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">STAFF PHONE: </label>
                                <input class="form-control form-white" placeholder="Enter Staff Phone ..." type="text" name="phone1" value="<?=$infoStaff['staffPhone']?>" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">STAFF ADDRESS: </label>
                                <input class="form-control form-white" placeholder="Enter Staff Address ..." type="text" name="address1" value="<?=$infoStaff['staffAddress']?>" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">STAFF GMAIL: </label>
                                <input class="form-control form-white" placeholder="Enter Staff Gmail ..." type="text" name="gmail1" value="<?=$infoStaff['staffGmail']?>" required>
                            </div>
                            <div class="form-group">
                                <label>POSITION: </label>
                                <select class="form-control" name="position1">
                                    <?php
                                    $sqlPosition = mysqli_query($conn, "SELECT * FROM tbl_position");
                                    while ($rowPosition = mysqli_fetch_assoc($sqlPosition)) { ?>
                                        <option value="<?php echo $rowPosition['id']; ?>" <?php if (isset($infoStaff['id'])) {if ($rowPosition['id'] == $infoStaff['idPosition']) {echo "SELECTED";} } ?>><?php echo $rowPosition['positionName']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="text-right pt-2">
                                <button name="editStaff" class="btn btn-primary ml-1">Save</button>
                                <button class="btn btn-light close-form"><a href="list-staff.php">Close</a></button>
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
                                    <img src="..\..\assets\images\users\user-1.jpg" class="img-fluid rounded-circle" alt="">
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
                                    <img src="..\..\assets\images\users\user-4.jpg" class="img-fluid rounded-circle" alt="">
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
                        <img src="..\..\assets\images\users\user-1.jpg" alt="user-image" class="rounded-circle">
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
                        <img src="..\../../assets/images/logo/logo-dark.png" alt="" height="24">
                        <!-- <span class="logo-lg-text-light">BMS MANAGER SYSTEM</span> -->
                    </span>
                    <span class="logo-sm">
                        <!-- <span class="logo-sm-text-dark">X</span> -->
                        <img src="..\..\assets\images\logo\favicon.png" alt="" height="28">
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
                                    <a href="../../categories/categories.php">CATEGORIES</a>
                                </li>
                                <li>
                                    <a href="../../brands/brands.php">BRANDS</a>
                                </li>
                                <li>
                                    <a href="../../products/products.php">PRODUCTS</a>
                                </li>
                                <li>
                                    <a href="../../version/version.php">VERSIONS</a>
                                </li>


                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);">
                                <i class="la la-cube"></i>
                                <span> TPMS </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li>
                                    <a href="../list-agent/list-agent.php">AGENTS</a>
                                </li>
                                <li>
                                    <a href="list-staff.php">STAFF</a>
                                </li>
                                <!-- <li>
                                    <a href="../../products/products.php">PRODUCTS</a>
                                </li>
                                <li>
                                    <a href="../../version/version.php">VERSIONS</a>
                                </li> -->


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
                                    <a href="banner.php">BANNER</a>
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
                                        <li class="breadcrumb-item active">LIST STAFF</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">LIST STAFF</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <!--  -->

                    <form method="POST" class="modal fade" id="addBanner" tabindex="-1" enctype="multipart/form-data">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">ADD STAFF</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body p-3">
                                    <div>
                                        <div class="form-group">
                                            <label>AGENT: </label>
                                            <select class="form-control" name="agent">
                                                <?php
                                                $sqlAgent = mysqli_query($conn, "SELECT * FROM tbl_agents");
                                                while ($rowAgent = mysqli_fetch_assoc($sqlAgent)) { ?>
                                                    <option value="<?php echo $rowAgent['id']; ?>"><?php echo $rowAgent['agentName']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">STAFF NAME: </label>
                                            <input class="form-control form-white" placeholder="Enter Staff Name ..." type="text" name="name" value="" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">STAFF PHONE: </label>
                                            <input class="form-control form-white" placeholder="Enter Staff Phone ..." type="text" name="phone" value="" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">STAFF ADDRESS: </label>
                                            <input class="form-control form-white" placeholder="Enter Staff Address ..." type="text" name="address" value="" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">STAFF GMAIL: </label>
                                            <input class="form-control form-white" placeholder="Enter Staff Gmail ..." type="text" name="gmail" value="" required>
                                        </div><div class="form-group">
                                            <label class="control-label">STAFF POSITION: </label>
                                            <select class="form-control" name="position">
                                                <?php
                                                $sqlPosition = mysqli_query($conn, "SELECT * FROM tbl_position");
                                                while ($rowPosition = mysqli_fetch_assoc($sqlPosition)) { ?>
                                                    <option value="<?php echo $rowPosition['id']; ?>"><?php echo $rowPosition['positionName']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="text-right pt-2">
                                            <button name="addPosition" class="btn btn-primary ml-1">Save</button>
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
                                                <th>AGENT</th>
                                                <th>STAFF NAME</th>
                                                <th>STAFF PHONE</th>
                                                <th>STAFF ADDRESS</th>
                                                <th>STAFF GMAIL</th>
                                                <th>STAFF POSITION</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $i = 1;
                                            while ($row = mysqli_fetch_assoc($sqlStaff)) {
                                            ?>
                                                <tr>
                                                    <td>
                                                        <?= $i++ ?>
                                                    </td>
                                                    <td><?php $idAgent = $row['idAgent']; $sqlNameAgent = mysqli_query($conn,"SELECT * FROM tbl_agents WHERE id = $idAgent"); $infoAgent = mysqli_fetch_assoc($sqlNameAgent); echo $infoAgent['agentName']; ?></td>
                                                    <td>
                                                        <?= $row['staffName'] ?>
                                                    </td>
                                                    <td>0<?= $row['staffPhone'] ?></td>
                                                    <td><?= $row['staffAddress'] ?></td>
                                                    <td><?= $row['staffGmail'] ?></td>
                                                    <td><?php $idPosition = $row['idPosition']; $sqlNamePosition = mysqli_query($conn,"SELECT * FROM tbl_position WHERE id = $idPosition"); $infoPosition = mysqli_fetch_assoc($sqlNamePosition); echo $infoPosition['positionName']; ?></td>
                                                    <td><a href="list-staff.php?idStaff=<?php echo $row['id']; ?>" name="edit" class="edit"><i class="icon-edit la la-edit"></i></a></td>
                                                    <td><a onclick="return Del1('<?php echo $row['staffName']; ?>')" class="delete" href="delete_staff.php?id=<?php echo $row['id']; ?>"><i class="icon-delete la la-trash-o"></i></a></td>
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
                        <a href="#" data-toggle="modal" data-target="#addBanner" class="btn btn-lg font-13  btn-success btn-block  ">
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
    <script src="..\..\assets\js\vendor.min.js"></script>
    <!-- Scritp -->
    <script>
        function Del1(name) {
            return confirm("Do you want to delete: " + name + " ?");
        }
    </script>

    <!-- third party js -->
    <script src="..\..\assets\libs\datatables\jquery.dataTables.min.js"></script>
    <script src="..\..\assets\libs\datatables\dataTables.bootstrap4.js"></script>
    <script src="..\..\assets\libs\datatables\dataTables.responsive.min.js"></script>
    <script src="..\..\assets\libs\datatables\responsive.bootstrap4.min.js"></script>
    <script src="..\..\assets\libs\datatables\dataTables.buttons.min.js"></script>
    <script src="..\..\assets\libs\datatables\buttons.bootstrap4.min.js"></script>
    <script src="..\..\assets\libs\datatables\buttons.html5.min.js"></script>
    <script src="..\..\assets\libs\datatables\buttons.flash.min.js"></script>
    <script src="..\..\assets\libs\datatables\buttons.print.min.js"></script>
    <script src="..\..\assets\libs\datatables\dataTables.keyTable.min.js"></script>
    <script src="..\..\assets\libs\datatables\dataTables.select.min.js"></script>
    <script src="..\..\assets\libs\pdfmake\pdfmake.min.js"></script>
    <script src="..\..\assets\libs\pdfmake\vfs_fonts.js"></script>
    <!-- third party js ends -->

    <!-- Datatables init -->
    <script src="..\..\assets\js\pages\datatables.init.js"></script>

    <!-- App js -->
    <script src="..\..\assets\js\app.min.js"></script>
    
    <?php
        if(isset($_GET['idStaff'])){
            echo '<script> document.getElementById("form-edit").classList.add("show")</script>';

        }
    ?>
    <script src="categories.js"></script>
    
</body>

</html>