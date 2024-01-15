<?php
session_start();
if (!isset($_SESSION['admin_user'])) {
    header("location: ../login.php");
}

require_once("../../config/config.php");

if (isset($_POST['sbm']) && !empty($_POST['search'])) {
    $search = $_POST['search'];
    $sqlBrand = mysqli_query($conn, "SELECT * FROM tbl_brands WHERE brandName LIKE '%$search%' OR brandCode LIKE'%$search%' ");
    $totalBrand = mysqli_num_rows($sqlBrand);
} else {
    $sqlBrand = mysqli_query($conn, "SELECT * FROM tbl_brands");
}
if (isset($_POST['all_prd'])) {
    unset($_POST['sbm']);
}


if (isset($_POST['add'])) {
    $code = $_POST['code'];
    $name = $_POST['name'];
    $category = $_POST['category'];

    $brandCode = mysqli_query($conn, "SELECT * FROM tbl_brands WHERE brandCode = '$code'");

    if (mysqli_num_rows($brandCode) > 0) {
        echo "<script>window.alert('Brand exists !');</script>";
    } else {
        $addBrand = "INSERT INTO `tbl_brands`(`id`, `brandCode`, `brandName`, `categoryId`) VALUES ('','$code','$name','$category')";

        $queryAddBrand = mysqli_query($conn, $addBrand);
        if ($queryAddBrand) {
            echo "<script>window.alert('Successful!');window.location.href = 'brands.php'</script>";
        }
    }
}

if(isset($_GET['id'])){

    $id = $_GET['id'];

    $sqlEditBrand = mysqli_query($conn, "SELECT * FROM tbl_brands WHERE id = $id");
    $infoBrand = mysqli_fetch_assoc($sqlEditBrand);

    if (isset($_POST['edit'])) {
        $codeEdit = $_POST['codeEdit'];
        $nameEdit = $_POST['nameEdit'];
        $category1 = $_POST['category1'];
        $edit = mysqli_query($conn, "UPDATE `tbl_brands` SET `brandCode`='$codeEdit',`brandName`='$nameEdit',`categoryId`='$category1'  WHERE id = $id");

        if($edit){
            header("Location: brands.php");
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>TECHNOLOGY PRODUCTS MANAGER SYSTEM - BRANDS</title>
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
    <link rel="stylesheet" href="brand.css">
    <link rel="stylesheet" href="../assets/fontawesome/css/all.min.css">
    <script src="../assets/fontawesome/js/all.min.js"></script>
    <link rel="stylesheet" href="../assets/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <!-- CK Editor -->
    <script src="../assets/ckeditor/ckeditor.js"></script>
</head>

<body>
    
    <div class="form-edit form" id="form-edit"  class="modal fade" tabindex="-1">
        <form method="POST" class="">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Brand</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" ><a href="brands.php">×</a></button>
                    </div>
                    <div class="modal-body p-3">
                        <div>
                            <div class="form-group">
                                <label class="control-label">Brand Code: </label>
                                <input class="form-control form-white" placeholder="Enter Brand Code ..." type="text" name="codeEdit" value="<?php if (isset($infoBrand['brandCode'])) { echo $infoBrand['brandCode'];} ?>" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Brand Name: </label>
                                <input class="form-control form-white" placeholder="Enter Brand Name ..." type="text" name="nameEdit" value="<?php if (isset($infoBrand['brandName'])) {echo $infoBrand['brandName'];} ?>" required>
                            </div>
                            <div class="form-group">
                                    <label class="control-label">Category: </label>
                                    <select name="category1" id="" class="selected form-control form-white">
                                        <?php
                                        $sqlCategory = mysqli_query($conn, "SELECT * FROM `tbl_categories`");
                                        while ($itemCategory = mysqli_fetch_assoc($sqlCategory)) { ?>
                                            <option value="<?php echo $itemCategory['Id']; ?>" <?php if (isset($itemCategory['Id'])) {if ($itemCategory['Id'] == $infoBrand['categoryId']) {echo "SELECTED";} } ?>><?php echo $itemCategory['categoryName']; ?></option>
                                        <?php }
                                        ?>
                                    </select>
                                </div>
                            <div class="text-right pt-2">
                                <button name="edit" class="btn btn-primary ml-1">Save</button>
                                <button class="btn btn-light close-form"><a href="brands.php">Close</a></button>
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
                                        <li class="breadcrumb-item active">BRANDS</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">BRANDS</h4>
                            </div>
                        </div>
                    </div>
                    <form method="POST" class="modal fade" id="addBrand" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Create New Brands</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body p-3">
                                    <div>
                                        <div class="form-group">
                                            <label class="control-label">Brand Code: </label>
                                            <input class="form-control form-white" placeholder="Enter Brand Code ..." type="text" name="code" value="<?php if (isset($var['Id'])) {echo $var['Id']; } ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Brand Name: </label>
                                            <input class="form-control form-white" placeholder="Enter Brand Name ..." type="text" name="name" value="<?php if (isset($var['BrandName'])) {echo $var['BrandName'];} ?>" required>
                                        </div>
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
                                                <th>BRAND CODE</th>
                                                <th>BRAND NAME</th>
                                                <th>CATEGORY NAME</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $i = 1;
                                            while ($row = mysqli_fetch_assoc($sqlBrand)) {
                                            ?>
                                                <tr>
                                                    <td>
                                                        <?= $i++ ?>
                                                    </td>
                                                    <td>
                                                        <?= $row['brandCode'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $row['brandName'] ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            $idCat = $row['categoryId'];
                                                            $sqlCat = mysqli_query($conn, "SELECT * FROM tbl_categories WHERE Id = $idCat");
                                                            $sqlCatName = mysqli_fetch_assoc($sqlCat);
                                                            echo $sqlCatName['categoryName'];
                                                        ?>
                                                    </td>

                                                    <?php
                                                        if(isset($_SESSION['permission']) && $_SESSION['permission'] == 1){
                                                            ?>
                                                                <td><a href="brands.php?id=<?php echo $row['id']; ?>" name="edit" class="edit"><i class="icon-edit la la-edit"></i></a></td>
                                                                <td><a onclick="return Del1('<?php echo $row['brandName']; ?>')" class="delete" href="deleteBrand.php?id=<?php echo $row['id']; ?>"><i class="icon-delete la la-trash-o"></i></a></td>
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
                                    <a href="#" data-toggle="modal" data-target="#addBrand" class="btn btn-lg font-13  btn-success btn-block  ">
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
            return confirm("Do you want to delete: " + name + " ?");
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
    <!-- third party js ends -->

    <!-- Datatables init -->
    <script src="..\assets\js\pages\datatables.init.js"></script>

    
    <script src="..\assets\js\app.min.js"></script>
    
    <?php
        if(isset($_GET['id'])){
            echo '<script> document.getElementById("form-edit").classList.add("show")</script>';

            $id = $_GET['id'];

            $sqlEditBrand = mysqli_query($conn, "SELECT * FROM tbl_categories WHERE Id = $id");
            $infoBrand = mysqli_fetch_assoc($sqlEditBrand);
        }
    ?>
    <script src="categories.js"></script>
    
</body>

</html>