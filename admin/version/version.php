<?php
session_start();
if (!isset($_SESSION['admin_user'])) {
    header("location: ../login.php");
}

require_once("../../config/config.php");

if (isset($_POST['sbm']) && !empty($_POST['search'])) {
    $search = $_POST['search'];
    $sqlVersion = mysqli_query($conn, "SELECT * FROM tbl_versions WHERE versionName LIKE '%$search%' OR versionCode LIKE'%$search%' ");

} else {
    $sqlVersion = mysqli_query($conn, "SELECT * FROM tbl_versions");
}
if (isset($_POST['all_prd'])) {
    unset($_POST['sbm']);
}


if (isset($_POST['add'])) {
    $code = $_POST['code'];
    $name = $_POST['name'];

    $categoryName = mysqli_query($conn, "SELECT * FROM tbl_categories WHERE categoryName = '$name' ");

    if (mysqli_num_rows($categoryName) > 0) {
        echo "<script>window.alert('Category exists !');</script>";
    } else {
        $addCategory = "INSERT INTO `tbl_categories`(`Id`, `categoryCode`, `categoryName`) VALUES ('','$code','$name')";

        $queryAddCategory = mysqli_query($conn, $addCategory);
        if ($queryAddCategory) {
            echo "<script>window.alert('Successful!');window.location.href = 'categories.php'</script>";
        }
    }
}

if(isset($_GET['productId'])){

    $id = $_GET['productId'];

    $sqlEditVersion = mysqli_query($conn, "SELECT * FROM tbl_versions WHERE idVersion = $id");
    $infoVersion = mysqli_fetch_assoc($sqlEditVersion);

    if (isset($_POST['EditVersion'])) {
        $prodId = $_POST['id1'];
        $code1 = $_POST['code1'];
        $name1 = $_POST['name1'];
        $version1 = $_POST['version1'];
        $price1 = $_POST['price1'];
        $prices1 = $_POST['p-price1'];
        if ($_FILES['image1']['name'] == "") {
            $versionImage = $infoVersion['versionImage'];
        } else {
            $versionImage = $_FILES['image1']['name'];
            $versionImage_tmp = $_FILES['image1']['tmp_name'];
            $sqlPrroduct = mysqli_query($conn,"SELECT * FROM tbl_products WHERE id = $prodId");
            $itemProduct = mysqli_fetch_assoc($sqlPrroduct);
            $idCategory = $itemProduct['idCategory'];
            if($idCategory == 1){
                move_uploaded_file($versionImage_tmp, '../../uploads/product/smartphone/' . $versionImage);
            }else if($idCategory == 2){
                move_uploaded_file($versionImage_tmp, '../../uploads/product/laptop/' . $versionImage);
            }else if($idCategory == 3){
                move_uploaded_file($versionImage_tmp, '../../uploads/product/tablet/' . $versionImage);
            }else if($idCategory == 4){
                move_uploaded_file($versionImage_tmp, '../../uploads/product/monitor/' . $versionImage);
            }else if($idCategory == 5){
                move_uploaded_file($versionImage_tmp, '../../uploads/product/smarttv/' . $versionImage);
            }else if($idCategory == 5){
                move_uploaded_file($versionImage_tmp, '../../uploads/product/watch/' . $versionImage);
            }
        }
        $description1 = $_POST['description1'];
        $specifications = $_POST['specifications'];
        if($prices1 <= $price1){
            $editVersion = mysqli_query($conn, "UPDATE `tbl_versions` SET `versionVersion`='$version1',`productCode`='$code1',`versionName`='$name1',`versionImage`='$versionImage',`versionPrice`='$price1',`versionPromotionalPrice`='$prices1',`versionDescription`='$description1', `versionSpecifications` =  '$specifications' WHERE idVersion = $id");
            if($editVersion){
                header("Location: version.php");
            }
        }else{
            echo "<script>window.alert('Promotional price cannot be greater than the price!');window.location.href = 'version.php'</script>";
        }
        
    }
}

if(isset($_GET['versionId'])){
    $id = $_GET['versionId'];

    if(isset($_POST['ADDSPECIFICATION'])){
        $screen = $_POST['screen'];
        $rearCamera = $_POST['rearCamera'];
        $frontCamera = $_POST['frontCamera'];
        $cpu = $_POST['cpu'];
        $memoryStorage = $_POST['memoryStorage'];
        $connect = $_POST['connect'];
        $utilities = $_POST['utilities'];
        $generalInformation = $_POST['generalInformation'];
        $batteryandCharger = $_POST['batteryandCharger'];
        $card = $_POST['card'];
        $sizeWeight = $_POST['sizeWeight'];
        $otherInformation = $_POST['otherInformation'];

        $sql = mysqli_query($conn,"SELECT * FROM `tbl_specifications` WHERE versionId = $id");
        
        if(mysqli_num_rows($sql)>0){
            echo "<script>window.alert('Error!');</script>";
        }else{
            $add = mysqli_query($conn,"INSERT INTO `tbl_specifications`(`specificationsId`, `versionId`, `screen`, `rearCamera`, `frontCamera`, `CPU`, `MemoryStorage`, `Connect`, `Utilities`, `generalInformation`, `BatteryandCharger`, `card`, `sizeWeight`, `otherInformation`) 
        VALUES (NULL,'$id','$screen','$rearCamera','$frontCamera','$cpu','$memoryStorage','$connect','$utilities','$generalInformation','$batteryandCharger','$card','$sizeWeight','$otherInformation')");
            if($add){
                echo "<script>window.alert('Successful!');window.location.href = 'version.php'</script>";
            }
        }
        
    }
}

if(isset($_GET['specificationsId'])){
    $id = $_GET['specificationsId'];
    $sqlSpecifications1 = mysqli_query($conn,"SELECT * FROM tbl_specifications WHERE specificationsId = $id");
    $itemSpecifications1 = mysqli_fetch_assoc( $sqlSpecifications1);
    if(isset($_POST['EDITSPECIFICATION'])){
        $screen1 = $_POST['screen1'];
        $rearCamera1 = $_POST['rearCamera1'];
        $frontCamera1 = $_POST['frontCamera1'];
        $cpu1 = $_POST['cpu1'];
        $memoryStorage1 = $_POST['memoryStorage1'];
        $connect1 = $_POST['connect1'];
        $utilities1 = $_POST['utilities1'];
        $generalInformation1 = $_POST['generalInformation1'];
        $batteryandCharger1 = $_POST['batteryandCharger1'];
        $card1 = $_POST['card1'];
        $sizeWeight1 = $_POST['sizeWeight1'];
        $otherInformation1 = $_POST['otherInformation1'];

        $edit = mysqli_query($conn,"UPDATE `tbl_specifications` SET `screen`='$screen1',`rearCamera`='$rearCamera1',`frontCamera`='$frontCamera1',`CPU`='$cpu1',`MemoryStorage`='$memoryStorage1',`Connect`='$connect1',`Utilities`='$utilities1',`generalInformation`='$generalInformation1',`BatteryandCharger`='$batteryandCharger1',`card`='$card1',`sizeWeight`='$sizeWeight1',`otherInformation`='$otherInformation1' WHERE `specificationsId` = $id");
        
        if($edit){
            echo "<script>window.alert('Successful!');window.location.href = 'version.php'</script>";
        }else{
            echo "<script>window.alert('Error!');window.location.href = 'version.php'</script>";
        }
        
    }
}
if(isset($_GET['isActive'])){
    $idVersion = $_GET['isActive'];
    $sqlUpdate = mysqli_query($conn,"UPDATE `tbl_versions` SET `isActive`='2' WHERE idVersion = $idVersion");
    if($sqlUpdate){
        header("Location: version.php");
    }
}
if(isset($_GET['offActive'])){
    $idVersion = $_GET['offActive'];
    $sqlUpdate = mysqli_query($conn,"UPDATE `tbl_versions` SET `isActive`='1' WHERE idVersion = $idVersion");
    if($sqlUpdate){
        header("Location: version.php");
    }
}
if(isset($_GET['productIdUpdate'])){
    $idProduct = $_GET['productIdUpdate'];
    $agentId = $_SESSION['admin_id'];

    $sqlEditVersion = mysqli_query($conn, "SELECT * FROM tbl_versions WHERE idVersion = $idProduct");
    $infoVersion = mysqli_fetch_assoc($sqlEditVersion);

    $q = $_GET['quantity'];
    if(isset($_POST['EditVersionQ'])){
        $quantity = $_POST['quantity'];
        $newQuantity = $q + $quantity;

        $sqlW = mysqli_query($conn,"SELECT * FROM tbl_warehouse WHERE versionId = $idProduct AND agentId = $agentId");
        $infoW = mysqli_fetch_assoc($sqlW);
        if(mysqli_num_rows($sqlW) > 0){
            $idW = $infoW['id'];
            $sqlUpdateW = mysqli_query($conn,"UPDATE `tbl_warehouse` SET `quantity`='$newQuantity' WHERE id = $idW");
        }else{
            $sqlUpdateW = mysqli_query($conn,"INSERT INTO `tbl_warehouse`(`id`, `versionId`, `agentId`, `quantity`) VALUES (NULL,'$idProduct','$agentId','$newQuantity')");
        }
    }
    
    

}  
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>TECHNOLOGY PRODUCTS MANAGER SYSTEM - VERSION</title>
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
    <link rel="stylesheet" href="version.css">
    <link rel="stylesheet" href="../assets/fontawesome/css/all.min.css">
    <script src="../assets/fontawesome/js/all.min.js"></script>
    <link rel="stylesheet" href="../assets/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <!-- CK Editor -->
    <script src="../assets/ckeditor/ckeditor.js"></script>
    <!-- <script src="../assets/ckeditorme/build/ckeditor.js"></script> -->
</head>

<body>
    
    <div class="form-edit form" id="form-edit">
        <form method="POST" class="" enctype="multipart/form-data">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Version</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" ><a href="version.php">×</a></button>
                    </div>
                    <div class="modal-body p-3">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="control-label">Product ID: </label>
                                    <input class="form-control form-white" placeholder="Enter Product Id ..." type="text" name="id1" value="<?=$infoVersion['productId']?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Product Code: </label>
                                    <input class="form-control form-white" placeholder="Enter Product Code ..." type="text" name="code1" value="<?=$infoVersion['productCode']?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Version Name: </label>
                                    <input class="form-control form-white" placeholder="Enter Version Name ..." type="text" name="name1" value="<?=$infoVersion['versionName']?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Version: </label>
                                    <input class="form-control form-white" placeholder="Enter Product Version ..." type="text" name="version1" value="<?=$infoVersion['versionVersion']?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Version Iamge: </label>
                                    <input type="file" multiple="multiple" name="image1" class="form-control">
                                    <span><?=$infoVersion['versionImage']?></span>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Price: </label>
                                    <input class="form-control form-white" placeholder="Enter Price ..." type="text" name="price1" value="<?=$infoVersion['versionPrice']?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Promotional Price: </label>
                                    <input class="form-control form-white" placeholder="Enter Promotional Price ..." type="text" name="p-price1" value="<?=$infoVersion['versionPromotionalPrice']?>" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="control-label">Description: </label>
                                    <textarea name="description1" id="des" cols="150" rows="10" required>
                                        <?=$infoVersion['versionDescription']?>
                                    </textarea>
                                    <script>
                                        CKEDITOR.replace('des')
                                    </script>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Specifications: </label>
                                    <textarea name="specifications" id="des1" cols="150" rows="10" required>
                                        <?=$infoVersion['versionSpecifications']?>
                                    </textarea>
                                    <script>
                                        CKEDITOR.replace('des1')
                                    </script>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="text-right pt-2">
                                <button name="EditVersion" class="btn btn-primary ml-1">Save</button>
                                <button type="button" class="btn btn-light " data-dismiss="modal" name="close"><a style="color: #fff;" href="version.php">Close</a></button>
                            </div>
                        </div>
                    </div> 
                </div> 
            </div> 
        </form>
    </div>
    <div class="form-edit form" id="form-edit1">
        <form method="POST" class="" enctype="multipart/form-data">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Version</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" ><a href="version.php">×</a></button>
                    </div>
                    <div class="modal-body p-3">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="control-label">Product ID: </label>
                                    <input class="form-control form-white" placeholder="Enter Product Id ..." type="text" name="id1" value="<?=$infoVersion['productId']?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Product Code: </label>
                                    <input class="form-control form-white" placeholder="Enter Product Code ..." type="text" name="code1" value="<?=$infoVersion['productCode']?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Version Name: </label>
                                    <input class="form-control form-white" placeholder="Enter Version Name ..." type="text" name="name1" value="<?=$infoVersion['versionName']?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Version: </label>
                                    <input class="form-control form-white" placeholder="Enter Product Version ..." type="text" name="version1" value="<?=$infoVersion['versionVersion']?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Version Iamge: </label>
                                    <input type="file" multiple="multiple" name="image1" class="form-control">
                                    <span><?=$infoVersion['versionImage']?></span>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Price: </label>
                                    <input class="form-control form-white" placeholder="Enter Price ..." type="text" name="price1" value="<?=$infoVersion['versionPrice']?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Promotional Price: </label>
                                    <input class="form-control form-white" placeholder="Enter Promotional Price ..." type="text" name="p-price1" value="<?=$infoVersion['versionPromotionalPrice']?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Quantity Update: </label>
                                    <input class="form-control form-white" placeholder="Enter Quantity ..." type="number" min="0" step="1" name="quantity" value="0" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="control-label">Description: </label>
                                    <textarea name="description1" id="des11" cols="150" rows="10" required>
                                        <?=$infoVersion['versionDescription']?>
                                    </textarea>
                                    <script>
                                        CKEDITOR.replace('des11')
                                    </script>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Specifications: </label>
                                    <textarea name="specifications" id="des12" cols="150" rows="10" required>
                                        <?=$infoVersion['versionSpecifications']?>
                                    </textarea>
                                    <script>
                                        CKEDITOR.replace('des12')
                                    </script>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="text-right pt-2">
                                <button name="EditVersionQ" class="btn btn-primary ml-1">Save</button>
                                <button type="button" class="btn btn-light " data-dismiss="modal" name="close"><a style="color: #fff;" href="version.php">Close</a></button>
                            </div>
                        </div>
                    </div> 
                </div> 
            </div> 
        </form>
    </div>
    <!-- ADD Specifications-->
    <div class="form-add-specifications form" id="form-add-specifications">
        <form method="POST" class="" enctype="multipart/form-data">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">ADD SPECIFICATION</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" ><a href="version.php">×</a></button>
                    </div>
                    <div class="modal-body p-3 specification">
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label class="control-label">Screen: </label>
                                    <textarea name="screen" id="screen" cols="100" rows="5" required>
                                        
                                    </textarea>
                                    <script>
                                        CKEDITOR.replace('screen')
                                    </script>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Rear Camera: </label>
                                    <textarea name="rearCamera" id="rearCamera" cols="100" rows="5" required>
                                        
                                    </textarea>
                                    <script>
                                        CKEDITOR.replace('rearCamera')
                                    </script>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Front Camera: </label>
                                    <textarea name="frontCamera" id="frontCamera" cols="100" rows="5" required>
                                        
                                    </textarea>
                                    <script>
                                        CKEDITOR.replace('frontCamera')
                                    </script>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">CPU: </label>
                                    <textarea name="cpu" id="cpu" cols="100" rows="5" required>
                                        
                                    </textarea>
                                    <script>
                                        CKEDITOR.replace('cpu')
                                    </script>
                                </div>
                                
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label class="control-label">Memory & Storage: </label>
                                    <textarea name="memoryStorage" id="memoryStorage" cols="100" rows="5" required>
                                        
                                    </textarea>
                                    <script>
                                        CKEDITOR.replace('memoryStorage')
                                    </script>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Connect: </label>
                                    <textarea name="connect" id="connect" cols="100" rows="5" required>
                                        
                                    </textarea>
                                    <script>
                                        CKEDITOR.replace('connect')
                                    </script>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Utilities: </label>
                                    <textarea name="utilities" id="utilities" cols="100" rows="5" required>
                                        
                                    </textarea>
                                    <script>
                                        CKEDITOR.replace('utilities')
                                    </script>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">General Information: </label>
                                    <textarea name="generalInformation" id="generalInformation" cols="100" rows="5" required>
                                        
                                    </textarea>
                                    <script>
                                        CKEDITOR.replace('generalInformation')
                                    </script>
                                </div>
                            </div>
                            <div class="col-4">
                                
                                <div class="form-group">
                                    <label class="control-label">Battery & Charger: </label>
                                    <textarea name="batteryandCharger" id="batteryandCharger" cols="100" rows="5" required>
                                        
                                    </textarea>
                                    <script>
                                        CKEDITOR.replace('batteryandCharger')
                                    </script>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Card: </label>
                                    <textarea name="card" id="card" cols="100" rows="5" required>
                                        
                                    </textarea>
                                    <script>
                                        CKEDITOR.replace('card')
                                    </script>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Size Weight: </label>
                                    <textarea name="sizeWeight" id="sizeWeight" cols="100" rows="5" required>
                                        
                                    </textarea>
                                    <script>
                                        CKEDITOR.replace('sizeWeight')
                                    </script>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Other Information: </label>
                                    <textarea name="otherInformation" id="otherInformation" cols="100" rows="5" required>
                                        
                                    </textarea>
                                    <script>
                                        CKEDITOR.replace('otherInformation')
                                    </script>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="text-right pt-2">
                                <button name="ADDSPECIFICATION" class="btn btn-primary ml-1">Save</button>
                                <button type="button" class="btn btn-light " data-dismiss="modal" name="close"><a style="color: #fff;" href="version.php">Close</a></button>
                            </div>
                        </div>
                    </div> 
                </div> 
            </div> 
        </form>
    </div>
    <div class="form-add-specifications form" id="form-edit-specifications">
        <form method="POST" class="" enctype="multipart/form-data">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">EDIT  SPECIFICATION</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" ><a href="version.php">×</a></button>
                    </div>
                    <div class="modal-body p-3 specification">
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label class="control-label">Screen: </label>
                                    <textarea name="screen1" id="screen1" cols="100" rows="5" required>
                                        <?=$itemSpecifications1['screen']?>
                                    </textarea>
                                    <script>
                                        CKEDITOR.replace('screen1')
                                    </script>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Rear Camera: </label>
                                    <textarea name="rearCamera1" id="rearCamera1" cols="100" rows="5" required>
                                        <?=$itemSpecifications1['rearCamera']?>
                                    </textarea>
                                    <script>
                                        CKEDITOR.replace('rearCamera1')
                                    </script>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Front Camera: </label>
                                    <textarea name="frontCamera1" id="frontCamera1" cols="100" rows="5" required>
                                        <?=$itemSpecifications1['frontCamera']?>
                                    </textarea>
                                    <script>
                                        CKEDITOR.replace('frontCamera1')
                                    </script>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">CPU: </label>
                                    <textarea name="cpu1" id="cpu1" cols="100" rows="5" required>
                                        <?=$itemSpecifications1['CPU']?>
                                    </textarea>
                                    <script>
                                        CKEDITOR.replace('cpu1')
                                    </script>
                                </div>
                                
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label class="control-label">Memory & Storage: </label>
                                    <textarea name="memoryStorage1" id="memoryStorage1" cols="100" rows="5" required>
                                        <?=$itemSpecifications1['MemoryStorage']?>
                                    </textarea>
                                    <script>
                                        CKEDITOR.replace('memoryStorage1')
                                    </script>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Connect: </label>
                                    <textarea name="connect1" id="connect1" cols="100" rows="5" required>
                                        <?=$itemSpecifications1['Connect']?>
                                    </textarea>
                                    <script>
                                        CKEDITOR.replace('connect1')
                                    </script>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Utilities: </label>
                                    <textarea name="utilities1" id="utilities1" cols="100" rows="5" required>
                                        <?=$itemSpecifications1['Utilities']?>
                                    </textarea>
                                    <script>
                                        CKEDITOR.replace('utilities1')
                                    </script>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">General Information: </label>
                                    <textarea name="generalInformation1" id="generalInformation1" cols="100" rows="5" required>
                                        <?=$itemSpecifications1['generalInformation']?>
                                    </textarea>
                                    <script>
                                        CKEDITOR.replace('generalInformation1')
                                    </script>
                                </div>
                            </div>
                            <div class="col-4">
                                
                                <div class="form-group">
                                    <label class="control-label">Battery & Charger: </label>
                                    <textarea name="batteryandCharger1" id="batteryandCharger1" cols="100" rows="5" required>
                                        <?=$itemSpecifications1['BatteryandCharger']?>
                                    </textarea>
                                    <script>
                                        CKEDITOR.replace('batteryandCharger1')
                                    </script>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Card: </label>
                                    <textarea name="card1" id="card1" cols="100" rows="5" required>
                                        <?=$itemSpecifications1['card']?>
                                    </textarea>
                                    <script>
                                        CKEDITOR.replace('card1')
                                    </script>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Size Weight: </label>
                                    <textarea name="sizeWeight1" id="sizeWeight1" cols="100" rows="5" required>
                                        <?=$itemSpecifications1['sizeWeight']?>
                                    </textarea>
                                    <script>
                                        CKEDITOR.replace('sizeWeight1')
                                    </script>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Other Information: </label>
                                    <textarea name="otherInformation1" id="otherInformation1" cols="100" rows="5" required>
                                        <?=$itemSpecifications1['otherInformation']?>
                                    </textarea>
                                    <script>
                                        CKEDITOR.replace('otherInformation1')
                                    </script>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="text-right pt-2">
                                <button name="EDITSPECIFICATION" class="btn btn-primary ml-1">Save</button>
                                <button type="button" class="btn btn-light " data-dismiss="modal" name="close"><a style="color: #fff;" href="version.php">Close</a></button>
                            </div>
                        </div>
                    </div> 
                </div> 
            </div> 
        </form>
    </div>
    <!-- END Specifications  -->

    
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
                                        <li class="breadcrumb-item active">VERSIONS</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">VERSIONS</h4>
                            </div>
                        </div>
                    </div>                    <!--  -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <table id="basic-datatable" class="table dt-responsive nowrap">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>PRODUCT ID</th>
                                                <th>PRODUCT CODE</th>
                                                <th>CATEGORY</th>
                                                <th>BRAND</th>
                                                <th>IMAGE</th>
                                                <th>PRICE</th>
                                                <th>PROMOTIONAL PRICE</th>
                                                <?php
                                                    if(isset($_SESSION['permission']) && $_SESSION['permission'] == 1){
                                                        ?>
                                                            <th>VIEW AND EDIT VERSION</th>
                                                            <th>ADD SPECIFICATIONS</th>
                                                            <th>VIEW AND EDIT SPECIFICATIONS</th>
                                                            <th>ACTIVE</th>
                                                            <th>DELETE</th>
                                                        <?php
                                                    }else{
                                                        ?><th>QUANTITY</th><?php
                                                        ?><th>UPDATE</th><?php
                                                    }
                                                ?>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $i = 1;
                                            while ($row = mysqli_fetch_assoc($sqlVersion)) {
                                                $versionId = $row['idVersion'];
                                                $sqlSpecifications = mysqli_query($conn,"SELECT * FROM tbl_specifications WHERE versionId =  $versionId");
                                                $iSpecifications = mysqli_fetch_assoc($sqlSpecifications);

                                            ?>
                                                <tr>
                                                    <td>
                                                        <?= $i++ ?>
                                                    </td>
                                                    <td>
                                                        <?=  $row['productId'] ; ?>
                                                    </td>
                                                    <td>
                                                        <?=  $row['productCode'] ; ?>
                                                    </td>
                                                    <td>
                                                        <?php 
                                                            $idProd = $row['productId'];
                                                            $sqlProduct = mysqli_query($conn,"SELECT * FROM tbl_products WHERE id = $idProd");
                                                            $itemProduct = mysqli_fetch_assoc($sqlProduct);
                                                            $idCat = $itemProduct['idCategory'];
                                                            $sqlCategory = mysqli_query($conn,"SELECT * FROM tbl_products INNER JOIN tbl_categories ON tbl_categories.Id = tbl_products.idCategory   WHERE idCategory = $idCat");
                                                            $itemCategory = mysqli_fetch_assoc($sqlCategory);
                                                            echo $itemCategory['categoryName'];
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php 
                                                            $idBrand = $itemProduct['idBrand'];
                                                            $sqlBrand = mysqli_query($conn,"SELECT * FROM tbl_products INNER JOIN tbl_brands ON tbl_brands.id = tbl_products.idBrand   WHERE idBrand = $idBrand");
                                                            $itemBrand = mysqli_fetch_assoc($sqlBrand);
                                                            echo $itemBrand['brandName'];
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            if($itemProduct['idCategory'] == 1){
                                                                ?> <img src="../../uploads/product/smartphone/<?= $row['versionImage'] ?>" alt="<?= $row['versionName'] ?>"> <?php
                                                            }else if($itemProduct['idCategory'] == 2){
                                                                ?> <img src="../../uploads/product/laptop/<?= $row['versionImage'] ?>" alt="<?= $row['versionName'] ?>"> <?php
                                                            }else if($itemProduct['idCategory'] == 3){
                                                                ?> <img src="../../uploads/product/tablet/<?= $row['versionImage'] ?>" alt="<?= $row['versionName'] ?>"> <?php
                                                            }else if($itemProduct['idCategory'] == 4){
                                                                ?> <img src="../../uploads/product/monitor/<?= $row['versionImage'] ?>" alt="<?= $row['versionName'] ?>"> <?php
                                                            }else if($itemProduct['idCategory'] == 5){
                                                                ?> <img src="../../uploads/product/smarttv/<?= $row['versionImage'] ?>" alt="<?= $row['versionName'] ?>"> <?php
                                                            }else if($itemProduct['idCategory'] == 6){
                                                                ?> <img src="../../uploads/product/watch/<?= $row['versionImage'] ?>" alt="<?= $row['versionName'] ?>"> <?php
                                                            }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?= number_format($row['versionPrice'],0,"",".") ?>
                                                    </td>
                                                    <td>
                                                        <?= number_format($row['versionPromotionalPrice'],0,"",".") ?>
                                                    </td>
                                                    <?php
                                                        if(isset($_SESSION['permission']) && $_SESSION['permission'] == 1){
                                                            ?>
                                                                <td><a href="version.php?productId=<?php echo $row['idVersion']; ?>" name="edit" class="edit"><i class="icon-edit la la-edit"></i></a></td>
                                                                <td><a href="version.php?versionId=<?php echo $row['idVersion']; ?>" name="edit" class="edit"><i class="icon-add las la-plus-circle"></i></a></td>
                                                                <td><a href="version.php?specificationsId=<?php echo $iSpecifications['specificationsId']; ?>" name="edit" class="edit"><i class="icon-edit la la-edit"></i></a></td>
                                                                <td>
                                                                    <?php 
                                                                        if($row['isActive'] == 1){
                                                                            ?>
                                                                                <a onclick="return On('<?php echo $row['versionName']; ?>')" href="version.php?isActive=<?php echo $row['idVersion']; ?>" name="edit" class="edit"><img style="width: 30px;" src="../assets/images/icon/switch-off.png" alt=""></a>
                                                                            <?php 
                                                                        }else{
                                                                            ?>
                                                                                <a onclick="return Off('<?php echo $row['versionName']; ?>')" href="version.php?offActive=<?php echo $row['idVersion']; ?>" name="edit" class="edit"><img style="width: 30px;" src="../assets/images/icon/switch-on.png" alt=""></a>
                                                                            <?php 
                                                                        }
                                                                    ?>
                                                                </td>
                                                                <td><a onclick="return Del1('<?php echo $row['versionName']; ?>')" class="delete" href="deleteVersion.php?id=<?php echo $row['idVersion']; ?>"><i class="icon-delete la la-trash-o"></i></a></td>
                                                            <?php
                                                        }else{
                                                            $versionID1 = $row['idVersion'];
                                                            $idAgent = $_SESSION['admin_id'];
                                                            $sqlQuantity = mysqli_query($conn,"SELECT * FROM tbl_warehouse WHERE  versionId = $versionID1 AND agentId = $idAgent");
                                                            $infoQuantity = mysqli_fetch_assoc($sqlQuantity);
                                                            if(isset($infoQuantity['quantity'])){
                                                                ?>
                                                                    <td><?=$infoQuantity['quantity']?></td>
                                                                    <td><a href="version.php?productIdUpdate=<?php echo $row['idVersion'];?>&quantity=<?php if(isset($infoQuantity['quantity'])){echo $infoQuantity['quantity']; }else{echo "0";} ?> " name="edit" class="edit"><i class="icon-edit la la-edit"></i></a></td>
                                                                <?php
                                                            }else {?>
                                                                <td>0</td>
                                                                <td><a href="version.php?productIdUpdate=<?php echo $row['idVersion'];?>&quantity=<?php if(isset($infoQuantity['quantity'])){echo $infoQuantity['quantity']; }else{echo "0";} ?>" name="edit" class="edit"><i class="icon-edit la la-edit"></i></a></td>
                                                            <?php }
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
    <!-- third party js ends -->

    <!-- Datatables init -->
    <script src="..\assets\js\pages\datatables.init.js"></script>

    
    <script src="..\assets\js\app.min.js"></script>
    
    <?php
        if(isset($_GET['productId'])){
            echo '<script> document.getElementById("form-edit").classList.add("show")</script>';

            $id = $_GET['productId'];

            $sqlEditCategory = mysqli_query($conn, "SELECT * FROM tbl_categories WHERE Id = $id");
            $infoCategory = mysqli_fetch_assoc($sqlEditCategory);
        }
    ?>

    <?php
        if(isset($_GET['versionId'])){
            echo '<script> document.getElementById("form-add-specifications").classList.add("show")</script>';
            $id = $_GET['versionId'];
            
        }
    ?>
    <?php
        if(isset($_GET['specificationsId'])){
            echo '<script> document.getElementById("form-edit-specifications").classList.add("show")</script>';
            $id = $_GET['specificationsId'];
            
        }
    ?>
    <?php
        if(isset($_GET['productIdUpdate'])){
            echo '<script> document.getElementById("form-edit1").classList.add("show")</script>';

            $id = $_GET['productId'];
            
        }
    ?>
    <script src="version.js"></script>
    
</body>

</html>