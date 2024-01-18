<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("location: ../../login.php");
}
require_once("../../../config/config.php");
if (isset($_POST['sbm']) && !empty($_POST['search'])) {
    $search = $_POST['search'];
    $sqlBanner = mysqli_query($conn, "SELECT * FROM tbl_banners WHERE bannerTitle LIKE '%$search%' OR bannerContent LIKE'%$search%' ");
} else {
    $sqlBanner = mysqli_query($conn, "SELECT * FROM tbl_banners");
}
if (isset($_POST['all_prd'])) {
    unset($_POST['sbm']);
}
if (isset($_POST['add'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];

    $bannerTitle = mysqli_query($conn, "SELECT * FROM tbl_banners WHERE bannerTitle = '$title' ");

    if (mysqli_num_rows($bannerTitle) > 0) {
        echo "<script>window.alert('Banner exists !');</script>";
    } else {
        $addBanner = "INSERT INTO `tbl_banners`(`id`, `bannerTitle`, `bannerContent`, `bannerImage`) VALUES ('','$title','$content','$image')";

        $queryAddBanner = mysqli_query($conn, $addBanner);
        if ($queryAddBanner) {
            echo "<script>window.alert('Successful!');window.location.href = 'banner.php'</script>";
        }
    }
    move_uploaded_file($image_tmp, '../../assets/images/banner/' . $image);
}

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sqlEditBanner = mysqli_query($conn, "SELECT * FROM tbl_banners WHERE id = $id");
    $infoBanner = mysqli_fetch_assoc($sqlEditBanner);
    if (isset($_POST['edit'])) {
        $bannerTitle = $_POST['bannerTitle'];
        $bannerContent = $_POST['bannerContent'];
        if ($_FILES['image']['name'] == "") {
            $image = $infoBanner['bannerImage'];
        } else {
            $image = $_FILES['image']['name'];
            $image_tmp = $_FILES['image']['tmp_name'];
            move_uploaded_file($image_tmp, '../../assets/images/banner/' . $image);
        }
        $edit = mysqli_query($conn, "UPDATE `tbl_banners` SET `bannerTitle`='$bannerTitle',`bannerContent`='$bannerContent',`bannerImage`='$image' WHERE id = $id");

        if($edit){
            header("Location: banner.php");
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>TECHNOLOGY PRODUCTS MANAGER SYSTEM - Banner</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="Coderthemes" name="author">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="shortcut icon" href="../../../assets/images/logo/favicon.ico">
    <link href="..\..\assets\libs\datatables\dataTables.bootstrap4.css" rel="stylesheet" type="text/css">
    <link href="..\..\assets\libs\datatables\responsive.bootstrap4.css" rel="stylesheet" type="text/css">
    <link href="..\..\assets\libs\datatables\buttons.bootstrap4.css" rel="stylesheet" type="text/css">
    <link href="..\..\assets\libs\datatables\select.bootstrap4.css" rel="stylesheet" type="text/css">
    <link href="..\..\assets\css\bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="..\..\assets\css\icons.min.css" rel="stylesheet" type="text/css">
    <link href="..\..\assets\css\app.min.css" rel="stylesheet" type="text/css">
    <link href="..\..\assets\css\style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="../../assets/scss/admin.css">
    <link rel="stylesheet" href="banner.css">
    <link rel="stylesheet" href="../../assets/fontawesome/css/all.min.css">
    <script src="../../assets/fontawesome/js/all.min.js"></script>
    <link rel="stylesheet" href="../../assets/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <script src="../../assets/ckeditor/ckeditor.js"></script>
</head>

<body>
    <div class="form-edit form" id="form-edit"  class="modal fade" tabindex="-1">
        <form method="POST" class="" enctype="multipart/form-data">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Banner</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" ><a href="banner.php">×</a></button>
                    </div>
                    <div class="modal-body p-3">
                        <div>
                            <div class="form-group">
                                <label class="control-label">Banner Code: </label>
                                <input class="form-control form-white" placeholder="Enter Banner Code ..." type="text" name="bannerTitle" value="<?php if (isset($infoBanner['bannerTitle'])) {echo $infoBanner['bannerTitle'];} ?>">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Banner Name: </label>
                                <input class="form-control form-white" placeholder="Enter Banner Name ..." type="text" name="bannerContent" value="<?php if (isset($infoBanner['bannerContent'])) {echo $infoBanner['bannerContent'];} ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Image: </label>
                                <input type="file" multiple="multiple" name="image" class="form-control">
                                <img src="../../assets/images/banner/<?=$infoBanner['bannerImage']?>" style="width: 100%;" alt="">
                            </div>
                            <div class="text-right pt-2">
                                <button name="edit" class="btn btn-primary ml-1">Save</button>
                                <button class="btn btn-light close-form"><a href="banner.php">Close</a></button>
                            </div>
                        </div>
                    </div> 
                </div> 
            </div> 
        </form>
    </div>
    <div id="wrapper" class="">
        <?php 
            include '../../navbar-custom.php';
            include '../../left-menu.php';
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
                                        <li class="breadcrumb-item active">BANNERS</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">BANNERS</h4>
                            </div>
                        </div>
                    </div>
                    <form method="POST" class="modal fade" id="addBanner" tabindex="-1" enctype="multipart/form-data">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">ADD BANNER</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body p-3">
                                    <div>
                                        <div class="form-group">
                                            <label class="control-label">Title: </label>
                                            <input class="form-control form-white" placeholder="Enter Banner Code ..." type="text" name="title" value="">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Content: </label>
                                            <input class="form-control form-white" placeholder="Enter Banner Name ..." type="text" name="content" value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Image: </label>
                                            <input type="file" multiple="multiple" name="image" class="form-control">
                                        </div>
                                        <div class="text-right pt-2">
                                            <button name="add" class="btn btn-primary ml-1">Save</button>
                                            <button type="button" class="btn btn-light " data-dismiss="modal" name="close">Close</button>
                                        </div>
                                    </div>
                                </div> 
                            </div> 
                        </div> 
                    </form>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <table id="basic-datatable" class="table dt-responsive nowrap">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>TITLE</th>
                                                <th>CONTENT</th>
                                                <th>IMAGE</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $i = 1;
                                            while ($row = mysqli_fetch_assoc($sqlBanner)) {
                                            ?>
                                                <tr>
                                                    <td>
                                                        <?= $i++ ?>
                                                    </td>
                                                    <td>
                                                        <?= $row['bannerTitle'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $row['bannerContent'] ?>
                                                    </td>
                                                    <td><img class="banner-image" src="../../assets/images/banner/<?=$row['bannerImage']?>" alt=""></td>

                                                    <td><a href="banner.php?id=<?php echo $row['id']; ?>" name="edit" class="edit"><i class="icon-edit la la-edit"></i></a></td>
                                                    <td><a onclick="return Del1('<?php echo $row['bannerTitle']; ?>')" class="delete" href="delete_model.php?id=<?php echo $row['id']; ?>"><i class="icon-delete la la-trash-o"></i></a></td>
                                                </tr>
                                            <?php
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
            <footer class="footer">
                <div class="row">
                    <div class="col-lg-2">
                        <a href="#" data-toggle="modal" data-target="#addBanner" class="btn btn-lg font-13  btn-success btn-block  ">
                            <i class="mdi mdi-plus-circle-outline"></i> Add
                        </a>
                    </div>
                    
                </div>
            </footer>
        </div>
    </div>
    <div class="rightbar-overlay"></div>
    <script src="..\..\assets\js\vendor.min.js"></script>
    
    <script>
        function Del1(name) {
            return confirm("Do you want to delete: " + name + " ?");
        }
    </script>
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
    
    <script src="..\..\assets\js\pages\datatables.init.js"></script>

    
    <script src="..\..\assets\js\app.min.js"></script>
    
    <?php
        if(isset($_GET['id'])){
            echo '<script> document.getElementById("form-edit").classList.add("show")</script>';

            $id = $_GET['id'];

            $sqlEditCategory = mysqli_query($conn, "SELECT * FROM tbl_categories WHERE Id = $id");
            $infoCategory = mysqli_fetch_assoc($sqlEditCategory);
        }
    ?>
    <script src="categories.js"></script>
    
</body>

</html>