<?php
session_start();
if (!isset($_SESSION['admin_user'])) {
    header("location: ../login.php");
}

require_once("../../config/config.php");

if (isset($_POST['sbm']) && !empty($_POST['search'])) {
    $search = $_POST['search'];
    $sqlProduct = mysqli_query($conn, "SELECT * FROM tbl_products WHERE productName LIKE '%$search%' OR productCode LIKE'%$search%' ");
    $totalCategory = mysqli_num_rows($sqlProduct);
} else {
    $sqlProduct = mysqli_query($conn, "SELECT * FROM tbl_products");
}
if (isset($_POST['all_prd'])) {
    unset($_POST['sbm']);
}


if (isset($_POST['add'])) {
    $id = $_POST['id'];
    $category = $_POST['category'];
    $brand = $_POST['brand'];
    $code = $_POST['code'];
    $name = $_POST['name'];
    $version = $_POST['version'];
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $price = $_POST['price'];
    $prices = $_POST['p-price'];
    $description = $_POST['description'];

    $productCode = mysqli_query($conn, "SELECT * FROM tbl_products WHERE productCode = '$code' ");
    $productId = mysqli_query($conn, "SELECT * FROM tbl_products WHERE id = '$id' ");
    if (mysqli_num_rows($productCode) > 0 && mysqli_num_rows($productId)) {
        echo "<script>window.alert('Product exists !');</script>";
    } else {
        if($prices > $price ){
            echo "<script>window.alert('Promotional price cannot be greater than the price!');window.location.href = 'products.php'</script>";
        }else{
            $addProduct = "INSERT INTO `tbl_products`(`id`, `idCategory`, `idBrand`, `productCode`, `productName`, `productVersion`, `productImage`,`productPrice`, `productPromotionalPrice` ,`productDescription`,`isActive`) VALUES ('$id','$category','$brand','$code','$name','$version','$image','$price','$prices','$description','2')";
            $addVersion = "INSERT INTO `tbl_versions`(`idVersion`, `productId`, `versionVersion`, `productCode`, `versionName`, `versionImage`, `versionPrice`, `versionPromotionalPrice`, `versionDescription`,`isActive`)  VALUES (NULL,'$id','$version','$code','$name','$image','$price','$prices','$description','2')";
            
            $queryAddProduct = mysqli_query($conn, $addProduct);
            $queryAddVersion = mysqli_query($conn, $addVersion);
            if ($queryAddProduct && $addVersion) {
                echo "<script>window.alert('Successful!');window.location.href = 'products.php'</script>";
            }
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
        $price1 = $_POST['price1'];
        $prices1 = $_POST['p-price1'];
        $description1 = $_POST['description1'];
        if($prices1 > $price1){
            echo "<script>window.alert('Promotional price cannot be greater than the price!');window.location.href = 'products.php'</script>";
        }else{
            $editProduct = mysqli_query($conn, "UPDATE `tbl_products` SET `idCategory`='$category1',`idBrand`='$brand1',`productCode`='$code1',`productName`='$name1',`productVersion`='$version1',`productImage`='$image1',`productPrice`='$price1',`productPromotionalPrice`='$prices1',`productDescription`='$description1' WHERE id = $id");
            $editVersion = mysqli_query($conn, "UPDATE `tbl_versions` SET `productCode`='$code1',`versionName`='$name1',`versionVersion`='$version1',`versionImage`='$image1',`versionPrice`='$price1',`versionPromotionalPrice`='$prices1',`versionDescription`='$description1' WHERE productId = $id");

            if($editProduct && $editVersion){
                echo "<script>window.alert('Successful!');window.location.href = 'products.php'</script>";
            }else{
                echo "<script>window.alert('Error!');window.location.href = 'products.php'</script>";
            }
        }
    }
}

if(isset($_GET['productId'])){

    $id = $_GET['productId'];
    $sqlDetalProd = mysqli_query($conn,"SELECT * FROM `tbl_products` WHERE id = $id");
    $itemDetailProd = mysqli_fetch_assoc($sqlDetalProd);

    $idCategory = $_GET['categoryId'];
    if (isset($_POST['addVersion'])) {
        $prodId = $_POST['prodId'];
        $prodCode = $_POST['prodCode'];
        $prodName = $_POST['prodName'];
        $prodVersion = $_POST['prodVersion'];
        $prodImage = $_FILES['prodImage']['name'];
        $prodImage_tmp = $_FILES['prodImage']['tmp_name'];
        $prodPrice = $_POST['prodPrice'];
        $prodPromotionalPrice = $_POST['prodPromotionalPrice'];
        $prodDescription = $_POST['prodDescription'];
        $prodQuantity = $_POST['prodQuantity'];
        if($prodPromotionalPrice > $prodPrice){
            echo "<script>window.alert('Promotional price cannot be greater than the price!');window.location.href = 'products.php'</script>";
        }else{
            $addVersion = mysqli_query($conn, "INSERT INTO `tbl_versions`(`idVersion`, `productId`, `versionVersion`, `productCode`, `versionName`, `quantity`, `versionImage`, `versionPrice`, `versionPromotionalPrice`, `versionDescription`,`versionSpecifications`,`isActive`)  VALUES (NULL,'$prodId','$prodVersion','$prodCode','$prodName', '$prodQuantity','$prodImage','$prodPrice','$prodPromotionalPrice','$prodDescription','','2')");

            if($addVersion){
                header("Location: ../version/version.php");
            }
        }
        

        if($idCategory == 1){
            move_uploaded_file($prodImage_tmp, '../../uploads/product/smartphone/' . $prodImage);
        }else if($idCategory == 2){
            move_uploaded_file($prodImage_tmp, '../../uploads/product/laptop/' . $prodImage);
        }else if($idCategory == 3){
            move_uploaded_file($prodImage_tmp, '../../uploads/product/tablet/' . $prodImage);
        }else if($idCategory == 4){
            move_uploaded_file($prodImage_tmp, '../../uploads/product/monitor/' . $prodImage);
        }else if($idCategory == 5){
            move_uploaded_file($prodImage_tmp, '../../uploads/product/smarttv/' . $prodImage);
        }else if($idCategory == 5){
            move_uploaded_file($prodImage_tmp, '../../uploads/product/watch/' . $prodImage);
        }
    }
}

if(isset($_GET['isActive'])){
    $idProduct = $_GET['isActive'];
    $sqlUpdate = mysqli_query($conn,"UPDATE `tbl_products` SET `isActive`='2' WHERE id = $idProduct");
    if($sqlUpdate){
        header("Location: products.php");
    }
}
if(isset($_GET['offActive'])){
    $idProduct = $_GET['offActive'];
    $sqlUpdate = mysqli_query($conn,"UPDATE `tbl_products` SET `isActive`='1' WHERE id = $idProduct");
    if($sqlUpdate){
        header("Location: products.php");
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
    <link rel="stylesheet" href="products.css">
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
                        <h4 class="modal-title">Edit Product</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" ><a href="products.php">×</a></button>
                    </div>
                    <div class="modal-body p-3">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="control-label">Product ID: </label>
                                    <input class="form-control form-white" placeholder="Enter Product Id ..." type="text" name="id1" value="<?=$infoProduct['id']?>" required>
                                </div>
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
                                <div class="form-group">
                                    <label class="control-label">Price: </label>
                                    <input class="form-control form-white" placeholder="Enter Price ..." type="text" name="price1" value="<?=$infoProduct['productPrice']?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Promotional Price: </label>
                                    <input class="form-control form-white" placeholder="Enter Promotional Price ..." type="text" name="p-price1" value="<?=$infoProduct['productPrice']?>" required>
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
                    </div> 
                </div> 
            </div> 
        </form>
    </div>
    
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
                                    <label class="control-label">Product Code: </label>
                                    <input class="form-control form-white" placeholder="Enter Product Code ..." type="text" name="prodCode" value="<?=$itemDetailProd['productCode']?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Product Name: </label>
                                    <input class="form-control form-white" placeholder="Enter Product Name ..." type="text" name="prodName" value="<?=$itemDetailProd['productName']?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Product Version: </label>
                                    <input class="form-control form-white" placeholder="Enter Product Version ..." type="text" name="prodVersion" value="" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Product Image: </label>
                                    <input type="file" multiple="multiple" name="prodImage" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Quantity: </label>
                                    <input class="form-control form-white" placeholder="Enter Quantity ..." type="text" name="prodQuantity" value="" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Price: </label>
                                    <input class="form-control form-white" placeholder="Enter Price ..." type="text" name="prodPrice" value="<?=$itemDetailProd['productPrice']?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Promotional Price: </label>
                                    <input class="form-control form-white" placeholder="Enter Promotional Price ..." type="text" name="prodPromotionalPrice" value="" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="control-label">Description: </label>
                                    <textarea name="prodDescription" id="des3" cols="150" rows="10" required>
                                        <?=$itemDetailProd['productDescription']?>
                                    </textarea>
                                    <script>
                                        CKEDITOR.replace('des3')
                                    </script>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="text-right pt-2">
                                <button name="addVersion" class="btn btn-primary ml-1">Save</button>
                                <button type="button" class="btn btn-light " data-dismiss="modal" name="close"><a style="color: #fff;" href="products.php">Close</a></button>
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
                                        <li class="breadcrumb-item active">PRODUCTS</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">PRODUCTS</h4>
                            </div>
                        </div>
                    </div>
                    <form method="POST" class="modal fade" id="addProduct" tabindex="-1" enctype="multipart/form-data">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">CREATE NEW PRODUCT</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body p-3">
                                    <div class="row">
                                        
                                        <div class="col-6">
                                            <div class="form-group">
                                                <?php
                                                    $sqlIdProduct = mysqli_query($conn, "SELECT * FROM `tbl_products` ORDER BY `tbl_products`.`id` DESC LIMIT 1");
                                                   $itemIdProd = mysqli_fetch_assoc($sqlIdProduct);
                                                   $idProd = $itemIdProd['id'] + 1;
                                                ?>
                                                <label class="control-label">Product ID: </label>
                                                <input class="form-control form-white" placeholder="Enter Product Id ..." type="text" name="id" value="<?=$idProd?>" required>
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
                                            <div class="form-group">
                                                <label class="control-label">Price: </label>
                                                <input class="form-control form-white" placeholder="Enter Price ..." type="text" name="price" value="" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Promotional Price: </label>
                                                <input class="form-control form-white" placeholder="Enter Promotional Price ..." type="text" name="p-price" value="" required>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="control-label">Description: </label>
                                                <textarea name="description" id="des1" cols="150" rows="10" required>

                                                </textarea>
                                                <script>
                                                    CKEDITOR.replace('des1')
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
                                                <th>PRODUCT Code</th>
                                                <th>CATEGORY</th>
                                                <th>BRAND</th>
                                                <th>IMAGE</th>
                                                <th>PRICE</th>
                                                <th>PROMOTIONAL PRICE</th>
                                                <?php
                                                    if (isset($_SESSION['permission']) && $_SESSION['permission'] ==  1) {
                                                        ?>
                                                            <th>ADD VERSION</th>
                                                            <th>VIEW AND EDIT</th>
                                                            <th>ACTIVE</th>
                                                            <th>DELETE</th>
                                                        <?php
                                                    }
                                                ?>
                                                
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
                                                    <td>
                                                        <?php
                                                            if($row['idCategory'] == 1){
                                                                ?>
                                                                    <img src="../../uploads/product/smartphone/<?=$row['productImage']?>" alt="">
                                                                <?php
                                                            }else if($row['idCategory'] == 2){
                                                                ?>
                                                                    <img src="../../uploads/product/laptop/<?=$row['productImage']?>" alt="">
                                                                <?php
                                                            }else if($row['idCategory'] == 3){
                                                                ?>
                                                                    <img src="../../uploads/product/tablet/<?=$row['productImage']?>" alt="">
                                                                <?php
                                                            }else if($row['idCategory'] == 4){
                                                                ?>
                                                                    <img src="../../uploads/product/monitor/<?=$row['productImage']?>" alt="">
                                                                <?php
                                                            }else if($row['idCategory'] == 5){
                                                                ?>
                                                                    <img src="../../uploads/product/smarttv/<?=$row['productImage']?>" alt="">
                                                                <?php
                                                            }else if($row['idCategory'] == 6){
                                                                ?>
                                                                    <img src="../../uploads/product/watch/<?=$row['productImage']?>" alt="">
                                                                <?php
                                                            }else if($row['idCategory'] == 7){
                                                                ?>
                                                                    <img src="../../uploads/product/voice/<?=$row['productImage']?>" alt="">
                                                                <?php
                                                            }else if($row['idCategory'] == 8){
                                                                ?>
                                                                    <img src="../../uploads/product/smarthome/<?=$row['productImage']?>" alt="">
                                                                <?php
                                                            }else if($row['idCategory'] == 16){
                                                                ?>
                                                                    <img src="../../uploads/product/accessory/<?=$row['productImage']?>" alt="">
                                                                <?php
                                                            }else if($row['idCategory'] == 17){
                                                                ?>
                                                                    <img src="../../uploads/product/toys/<?=$row['productImage']?>" alt="">
                                                                <?php
                                                            }else if($row['idCategory'] == 18){
                                                                ?>
                                                                    <img src="../../uploads/product/driftingmachine/<?=$row['productImage']?>" alt="">
                                                                <?php
                                                            }else if($row['idCategory'] == 19){
                                                                ?>
                                                                    <img src="../../uploads/product/repair/<?=$row['productImage']?>" alt="">
                                                                <?php
                                                            }else if($row['idCategory'] == 20){
                                                                ?>
                                                                    <img src="../../uploads/product/service/<?=$row['productImage']?>" alt="">
                                                                <?php
                                                            }
                                                        ?>
                                                    </td>
                                                    <td><?= number_format($row['productPrice'],0,"",".") ?></td>
                                                    <td><?= number_format($row['productPromotionalPrice'],0,"",".") ?></td>
                                                    <?php
                                                        if (isset($_SESSION['permission']) && $_SESSION['permission'] ==  1) {
                                                            ?>
                                                                <td><a href="products.php?productId=<?php echo $row['id']; ?>&categoryId=<?php echo $row['idCategory']; ?>"  class="add"><i class="icon-add las la-plus-circle"></i></a></td>
                                                                <td><a href="products.php?id=<?php echo $row['id']; ?>" name="edit" class="edit"><i class="icon-edit la la-edit"></i></a></td>
                                                                <td>
                                                                    <?php 
                                                                        if($row['isActive'] == 1){
                                                                            ?>
                                                                                <a onclick="return On('<?php echo $row['productName']; ?>')" href="products.php?isActive=<?php echo $row['id']; ?>" name="edit" class="edit"><img style="width: 30px;" src="../assets/images/icon/switch-off.png" alt=""></a>
                                                                            <?php 
                                                                        }else{
                                                                            ?>
                                                                                <a onclick="return Off('<?php echo $row['productName']; ?>')" href="products.php?offActive=<?php echo $row['id']; ?>" name="edit" class="edit"><img style="width: 30px;" src="../assets/images/icon/switch-on.png" alt=""></a>
                                                                            <?php 
                                                                        }
                                                                    ?>
                                                                </td>
                                                                <td><a onclick="return Del1('<?=$row['productName']?>')" class="delete" href="deleteProduct.php?id=<?=$row['id']; ?>"><i class="icon-delete la la-trash-o"></i></a></td>
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
                    <div class="col-lg-2">
                        <a href="#" data-toggle="modal" data-target="#addProduct" class="btn btn-lg font-13  btn-success btn-block  ">
                            <i class="mdi mdi-plus-circle-outline"></i> Add
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
        function On(name){
            return confirm("Do You Want To Turn On: " + name + " ?");
        }

        function Off(name){
            return confirm("Do You Want To Turn Off: " + name + " ?");
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
    <?php
        if(isset($_GET['productId'])){
            echo '<script> document.getElementById("form-add-version").classList.add("show")</script>';
           
        }
    ?>
    <script src="categories.js"></script>
    
</body>

</html>