<?php
require_once("../../config/config.php");
include '../handle.php';
if (!isset($_SESSION['admin_id']) && isset($_SESSION['permission']) && $_SESSION['permission'] != 1) {
    header("location: login.php");
}

if(isset($_GET['commentId'])){
    $commentId = $_GET['commentId'];
    $sqlComment = mysqli_query($conn,"SELECT * FROM tbl_comments WHERE id = $commentId ");
    $infoComment = mysqli_fetch_assoc($sqlComment);

    $sqlRepComment = mysqli_query($conn,"SELECT * FROM tbl_repcomments WHERE commentId = $commentId");
}

if(isset($_POST['repComment'])){
    $versionId = $infoComment['versionId'];
    $commentId = $infoComment['id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $content = $_POST['content'];
    $time = date("Y-m-d H:i:s");

    $rep = mysqli_query($conn,"INSERT INTO `tbl_repcomments`(`id`, `versionId`, `commentId`, `name`, `phone`, `email`, `content`, `time`,`permission`) VALUES (NULL,'$versionId','$commentId','$name','$phone','$email','$content', '$time','1')");
    if($rep){
        ?>
            <script>window.alert('Success!');window.location.href = 'rep-comment.php?commentId=<?=$commentId?>'</script>
        <?php
    }

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>TPMS - REP COMMENT</title>
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
            include '../navbar-custom.php' ;
            include '../left-menu.php' ;
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
                                <div >
                                    <div class="mt-4">
                                        <div style="display: flex;"><a class="font-18" style=" margin: 5px 0;color: #fff;" href="../../chi-tiet-san-pham.php?idsanpham=<?= $infoComment['versionId'] ?>"> <?= getDetailProduct($conn, $infoComment['versionId'])['versionName'] ?></a></div>
                                        <hr>
                                        <div class="media mb-4 mt-1">
                                            <img class="d-flex mr-2 rounded-circle avatar-sm"
                                                src="..\assets\images\users\user-2.jpg" alt="Generic placeholder image">
                                            <div class="media-body">
                                                <span class="float-right"><?php if(isset($_GET['commentId'])){$date_now = strtotime($infoComment['datetime']); echo date("M  d,  Y", $date_now);}   ?></span>
                                                <h6 class="m-0 font-14"><?php if(isset($_GET['commentId'])){ echo  $infoComment['name'];}?></h6>
                                                <h6 class="text-muted">From: <?php if(isset($_GET['commentId'])){ echo  $infoComment['email'];}?></h6>
                                                <h6 class="text-muted">Phone: 0<?php if(isset($_GET['commentId'])){ echo  $infoComment['phone'];}?></h6>
                                            </div>
                                        </div>

                                        <div style="display: flex;"><p><?php if(isset($_GET['commentId'])){ echo  $infoComment['content'];}?></p></div>
                                        
                                        <hr>
                                        <?php
                                            while($itemRep = mysqli_fetch_assoc( $sqlRepComment)){
                                                ?>
                                                    <div class="media mb-4 mt-1">
                                                        <?php
                                                            if($itemRep['permission'] == 1){
                                                                ?><img class="d-flex mr-2 rounded-circle avatar-sm"  src="../../assets/images/icon/icon-member.png" alt="Generic placeholder image"><?php
                                                            }else{
                                                                ?><img class="d-flex mr-2 rounded-circle avatar-sm"  src="..\assets\images\users\user-2.jpg" alt="Generic placeholder image"><?php
                                                            }
                                                        ?>
                                                        <div class="media-body">
                                                            <span class="float-right"><?php $date_now = strtotime($itemRep['time']); echo date("M  d,  Y", $date_now);  ?></span>
                                                            <h6 class="m-0 font-14"><?=$itemRep['name']?></h6>
                                                            <h6 class="text-muted">From: <?= $itemRep['email']?></h6>
                                                            <h6 class="text-muted">Phone: 0<?= $itemRep['phone']?></h6>
                                                        </div>
                                                    </div>

                                                    <div style="display: flex;"><p><?= $itemRep['content']?></p></div>
                                                    
                                                    <hr>
                                                <?php
                                            }
                                        ?>
                                    </div>
                                    <div class="text-right">
                                        <a href="#" data-toggle="modal" data-target="#rep-comment" class="btn btn-lg font-16 btn-primary  btn-rounded width-sm">
                                            <i class="mdi mdi-plus-circle-outline"></i> Rep Comment
                                        </a>
                                    </div>
                                    <form method="POST" class="modal fade" id="rep-comment" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Rep Comment</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>
                                                <div class="modal-body p-3">
                                                    <div>
                                                        <div class="form-group">
                                                            <label class="control-label">Name: </label>
                                                            <input class="form-control form-white" placeholder="Enter name ..." type="text" name="name" value="<?php if(isset($_SESSION['admin_name'])){echo $_SESSION['admin_name'];}?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Phone: </label>
                                                            <input class="form-control form-white" placeholder="Enter phone ..." type="text" name="phone" value="0<?php if(isset($_SESSION['admin_phone'])){echo $_SESSION['admin_phone'];}?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Email: </label>
                                                            <input class="form-control form-white" placeholder="Enter email ..." type="text" name="email" value="<?php if(isset($_SESSION['admin_mail'])){echo $_SESSION['admin_mail'];}?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Content: </label>
                                                            
                                                            <textarea style="width: 100%;" name="content" id="" cols="30" rows="10"></textarea>
                                                        </div>
                                                        <div class="text-right pt-2">
                                                            <button type="button" class="btn btn-light " data-dismiss="modal" name="close">Close</button>
                                                            <button name="repComment" class="btn btn-primary ml-1">Save</button>
                                                        </div>

                                                    </div>


                                                </div>
                                            </div> 
                                        </div> 
                                    </form>
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