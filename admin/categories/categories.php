<?php
session_start();
if (!isset($_SESSION['admin_user'])) {
    header("location: ../login.php");
}

require_once("../../config/config.php");

if (isset($_POST['sbm']) && !empty($_POST['search'])) {
    $search = $_POST['search'];
    $sqlCategory = mysqli_query($conn, "SELECT * FROM tbl_categories WHERE categoryName LIKE '%$search%' OR categoryCode LIKE'%$search%' ");
    $totalCategory = mysqli_num_rows($sqlCategory);
} else {
    $sqlCategory = mysqli_query($conn, "SELECT * FROM tbl_categories");
}
if (isset($_POST['all_prd'])) {
    unset($_POST['sbm']);
}


if (isset($_POST['add'])) {
    $code = $_POST['code'];
    $name = $_POST['name'];
    $image = $_FILES['catImage']['name'];
    $image_tmp = $_FILES['catImage']['tmp_name'];

    $categoryName = mysqli_query($conn, "SELECT * FROM tbl_categories WHERE categoryName = '$name' ");

    if (mysqli_num_rows($categoryName) > 0) {
        echo "<script>window.alert('Category exists !');</script>";
    } else {
        $addCategory = "INSERT INTO `tbl_categories`(`Id`, `categoryCode`, `categoryName`,`categoryImage`) VALUES ('','$code','$name','$image')";

        $queryAddCategory = mysqli_query($conn, $addCategory);
        if ($queryAddCategory) {
            echo "<script>window.alert('Successful!');window.location.href = 'categories.php'</script>";
        }
    }
    move_uploaded_file($image_tmp, '../assets/images/category/' . $image);
}

if(isset($_GET['id'])){

    $id = $_GET['id'];

    $sqlEditCategory = mysqli_query($conn, "SELECT * FROM tbl_categories WHERE Id = $id");
    $infoCategory = mysqli_fetch_assoc($sqlEditCategory);

    if (isset($_POST['edit'])) {
        $codeEdit = $_POST['codeEdit'];
        $nameEdit = $_POST['nameEdit'];
        if ($_FILES['catImage1']['name'] == "") {
            $image1 = $infoCategory['categoryImage'];
        } else {
            $image1 = $_FILES['catImage1']['name'];
            $image1_tmp = $_FILES['catImage1']['tmp_name'];
            move_uploaded_file($image1_tmp, '../assets/images/category/' . $image1);
        }
       
        $edit = mysqli_query($conn, "UPDATE `tbl_categories` SET `categoryCode`='$codeEdit',`categoryName`='$nameEdit',`categoryImage`='$image1' WHERE Id = $id");

        if($edit){
            header("Location: categories.php");
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>TECHNOLOGY PRODUCTS MANAGER SYSTEM - CATEGORIES</title>
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
    <link rel="stylesheet" href="categories.css">
    <link rel="stylesheet" href="../assets/fontawesome/css/all.min.css">
    <script src="../assets/fontawesome/js/all.min.js"></script>
    <link rel="stylesheet" href="../assets/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <!-- CK Editor -->
    <script src="../assets/ckeditor/ckeditor.js"></script>
</head>

<body>
    
    <div class="form-edit form" id="form-edit">
        <form method="POST" class="" enctype="multipart/form-data">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">EDIT CATEGORY</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" ><a href="categories.php">×</a></button>
                    </div>
                    <div class="modal-body p-3">
                        <div>
                            <div class="form-group">
                                <label class="control-label">CATEGORY CODE: </label>
                                <input class="form-control form-white" placeholder="Enter Category Code ..." type="text" name="codeEdit" value="<?php if (isset($infoCategory['categoryCode'])) {echo $infoCategory['categoryCode'];} ?>" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">CATEGORY NAME: </label>
                                <input class="form-control form-white" placeholder="Enter Category Name ..." type="text" name="nameEdit" value="<?php if (isset($infoCategory['categoryName'])) {echo $infoCategory['categoryName'];} ?>" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">CATEGORY IMAGE: </label>
                                <input type="file" multiple="multiple" name="catImage1" class="form-control">
                            </div>
                            <div class="text-right pt-2">
                                <button name="edit" class="btn btn-primary ml-1">Save</button>
                                <button class="btn btn-light close-form"><a href="categories.php">Close</a></button>
                            </div>
                            
                        </div>
                    </div> 
                </div> 
            </div> 
        </form>
    </div>
    
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
                                        <li class="breadcrumb-item active">CATEGORIES</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">CATEGORIES</h4>
                            </div>
                        </div>
                    </div>
                    <form method="POST" class="modal fade" id="addModel" tabindex="-1" enctype="multipart/form-data">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">CREATE NEW CATEGORY</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body p-3">
                                    <div>
                                        <div class="form-group">
                                            <label class="control-label">CATEGORY CODE: </label>
                                            <input class="form-control form-white" placeholder="Enter Category Code ..." type="text" name="code" value="<?php if (isset($var['Id'])) {echo $var['Id']; } ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">CATEGORY NAME: </label>
                                            <input class="form-control form-white" placeholder="Enter Category Name ..." type="text" name="name" value="<?php if (isset($var['ModelName'])) {echo $var['ModelName'];} ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">CATEGORY IMAGE: </label>
                                            <input type="file" multiple="multiple" name="catImage" class="form-control">
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
                                                <th>CATEGORY CODE</th>
                                                <th>CATEGORY NAME</th>
                                                <th>CATEGORY IMAGE</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $i = 1;
                                            while ($row = mysqli_fetch_assoc($sqlCategory)) {
                                            ?>
                                                <tr>
                                                    <td>
                                                        <?= $i++ ?>
                                                    </td>
                                                    <td>
                                                        <?= $row['categoryCode'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $row['categoryName'] ?>
                                                    </td>
                                                    <td><img style="width: 200px;" src="../assets/images/category/<?=$row['categoryImage']?>" alt=""></td>

                                                    <?php
                                                        if(isset($_SESSION['permission']) && $_SESSION['permission'] == 1){
                                                            ?>
                                                                <td><a href="categories.php?id=<?php echo $row['Id']; ?>" name="edit" class="edit"><i class="icon-edit la la-edit"></i></a></td>
                                                                <td><a onclick="return Del1('<?php echo $row['categoryName']; ?>')" class="delete" href="deleteCategory.php?id=<?php echo $row['Id']; ?>"><i class="icon-delete la la-trash-o"></i></a></td>
                                                            <?php
                                                        }
                                                    ?>
                                                    
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
                    <?php
                        if(isset($_SESSION['permission']) && $_SESSION['permission'] == 1){
                            ?>
                                <div class="col-lg-2">
                                    <a href="#" data-toggle="modal" data-target="#addModel" class="btn btn-lg font-13  btn-success btn-block  ">
                                        <i class="mdi mdi-plus-circle-outline"></i> Add
                                    </a>
                                </div>
                            <?php
                        }
                    ?>
                    
                    <div class="col-lg-2">
                        <a href="export_category.php" class="btn btn-lg font-13 btn-primary btn-block  ">
                            <i class="las la-download"></i> Export
                        </a>
                    </div>
                </div>
            </footer>
            

        </div>

        


    </div>
    

    
    <div class="rightbar-overlay"></div>

    
    <script src="..\assets\js\vendor.min.js"></script>
    
    <script>
        function Del1(name) {
            return confirm("Do You Want To Delete: " + name + " ?");
        }
    </script>
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