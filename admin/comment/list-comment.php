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
        <?php 
            include '../navbar-custom.php';
            include '../left-menu.php';
        ?>
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