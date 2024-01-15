<?php
require_once("../../config/config.php");
include '../handle.php';
if (!isset($_SESSION['admin_user'])) {
    header("location: ../login.php");
}

require_once("../../config/config.php");

if (isset($_POST['sbm']) && !empty($_POST['search'])) {
    $search = $_POST['search'];
    $sqlCategory = mysqli_query($conn, "SELECT * FROM tbl_categories WHERE categoryName LIKE '%$search%' OR categoryCode LIKE'%$search%' ");
    $totalCategory = mysqli_num_rows($sqlCategory);
} else {
   if(isset($_GET['type'])){
        if($_GET['type'] == "order"){
            $queryOnlineOrder = getOnlineOrder($conn,1);
        }else if($_GET['type'] == "confirm"){
            $queryOnlineOrder = getOnlineOrder($conn,2);
        }else if($_GET['type'] == "complete"){
            $queryOnlineOrder = getOnlineOrder($conn,3);
        }else if($_GET['type'] == "cancel"){
            $queryOnlineOrder = getOnlineOrder($conn,4);
        }
   }else{
        $queryOnlineOrder = getOnlineOrder($conn,0);
   }
}
if (isset($_POST['all_prd'])) {
    unset($_POST['sbm']);
}
if(isset($_POST['createNew'])){
    $id = $_POST['orderCode'];
    $_SESSION['orderCode'] = $id;
    $time = date("Y-m-d H:i:s");

    $sqlCreateOrder = mysqli_query($conn,"INSERT INTO `tbl_cart`(`id`, `userId`, `name`, `phone`, `email`, `city`, `district`, `ward`, `address`, `note`, `total`, `time`, `idtype`, `idstatus`, `idpayment`) VALUES (' $id ','','','','','','','','','','',' $time','2','1','1')");
    if($sqlCreateOrder){
        header("Location: create-new-order.php");
    }
}

if(isset($_POST['addProduct'])){
    $cartId = $_SESSION['orderCode'];
    $productId = $_POST['product'];
    $quantity = $_POST['quantity'];
    $sqlVersion = mysqli_query($conn,"SELECT * FROM tbl_versions WHERE idVersion =  $productId");
    $infoProd = mysqli_fetch_assoc($sqlVersion);
    $promotionalPrice = $infoProd['versionPromotionalPrice'];
    $sqlDetailCart = mysqli_query($conn,"INSERT INTO `tbl_detailcart`(`id`, `cartId`, `versionId`, `quantity`, `versionPromotionalPrice`) VALUES (NULL,'$cartId','$productId','$quantity','$promotionalPrice')");
    if($sqlDetailCart){
        header("Location: create-new-order.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>TECHNOLOGY PRODUCTS MANAGER SYSTEM - CREATE NEW ORDER</title>
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
    <link rel="stylesheet" href="../assets/fontawesome/css/all.min.css">
    <script src="../assets/fontawesome/js/all.min.js"></script>
    <link rel="stylesheet" href="../assets/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <!-- CK Editor -->
    <script src="../assets/ckeditor/ckeditor.js"></script>
</head>

<body>
    
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
                                        <li class="breadcrumb-item active">CREATE NEW ORDERS</li>
                                    </ol>
                                </div>
                                <h4 class="page-title" >CREATE NEW ORDERS</h4>
                            </div>
                        </div>
                        <?php
                            if(isset($_SESSION['orderCode'])){
                                echo "";
                            }else{
                                ?>
                                    <form method="POST" class="row col-12">
                                        <div class="col-lg-3">
                                            <input type="number" name="orderCode" placeholder="Order Code">
                                        </div>
                                        <div class="col-lg-3">
                                            <button name="createNew" class="btn btn-lg font-16 btn-success btn-block  ">
                                                <i class="las la-download"></i>CREATE NEW ORDER
                                            </button>
                                        </div>
                                    </form>
                                <?php
                            }
                        ?>
                        <?php
                            if(isset($_SESSION['orderCode'])){
                                
                                ?>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="card-box col-6">
                                                <div class="form-group">
                                                    <label class="control-label">Category: </label>
                                                    <div>
                                                        <select name="category" id="cat" class="selected form-control form-white" onchange="onchangeCat()">
                                                            <option value="">Category</option>
                                                            <?php
                                                                $sqlCategory = getCategory($conn);
                                                                while ($itemCategory = mysqli_fetch_assoc($sqlCategory)) { ?>
                                                                    <option value="<?php echo $itemCategory['Id']; ?>" ><?php echo $itemCategory['categoryName']; ?></option>
                                                                <?php }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <?php
                                                    if(isset($_GET['idCategory'])){
                                                        $getBrand = getBrands($conn,$_GET['idCategory']);
                                                        ?>
                                                            <div class="form-group">
                                                                <label class="control-label">Brand: </label>
                                                                <div>
                                                                    <select name="brand" id="brand" class="selected form-control form-white"  onchange="onchangeBrand()">
                                                                        <option value="">Brand</option>
                                                                        <?php
                                                                            while ($itemBrand = mysqli_fetch_assoc($getBrand)) { ?>
                                                                                <option value="<?php echo $itemBrand['id']; ?>" ><?php echo $itemBrand['brandName']; ?></option>
                                                                            <?php }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        <?php
                                                    }
                                                ?>
                                                <form action="create-new-order.php" method="POST">
                                                    <?php
                                                        if(isset($_GET['idBrand'])){
                                                            $brandId = $_GET['idBrand'];
                                                            $getProduct = mysqli_query($conn,"SELECT * FROM tbl_versions INNER JOIN tbl_products ON tbl_versions.productId = tbl_products.id WHERE tbl_products.idBrand = $brandId");
                                                            ?>
                                                                <div class="form-group">
                                                                    <label class="control-label">Product: </label>
                                                                    <div>
                                                                        <select name="product" id="product" class="selected form-control form-white">
                                                                            <option value="">Product</option>
                                                                            <?php
                                                                                while ($itemProduct = mysqli_fetch_assoc($getProduct)) { ?>
                                                                                    <option value="<?php echo $itemProduct['idVersion']; ?>" ><?php echo $itemProduct['versionName']; ?></option>
                                                                                <?php }
                                                                            ?>
                                                                        </select>
                                                                        
                                                                    </div>
                                                                </div>  
                                                            <?php
                                                        }
                                                    ?>
                                                    <div class="form-group">
                                                        <label class="control-label">Quantity: </label>
                                                        <div>
                                                            <input type="number" value="1" name="quantity" min="0" step="1" style="padding-left: 20px;font-size: 15px;width: 100%;height: 30px;">
                                                        </div>
                                                    </div>
                                                    <button type="submit" name="addProduct" type="submit" class="btn btn-lg font-16 btn-success btn-block  ">ADD</button>
                                                </form>
                                            </div>
                                            <div class="card-box col-6">
                                                <table class="table table-hover m-0 table-centered dt-responsive nowrap w-100" id="tickets-table">
                                                <thead>
                                                    <tr>
                                                        <th>STT</th>
                                                        <th>Name</th>
                                                        <th>Price</th>
                                                        <th>Quantity</th>
                                                        <th>Total</th>
                                                        <th class="hidden-sm">Action</th>
                                                    </tr>
                                                </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                            }
                        ?>
                    </div> 
            </div> 
        </div>
        
    </div>
    

    
    <div class="rightbar-overlay"></div>

    
    <script src="..\assets\js\vendor.min.js"></script>
    
    
    <!-- third party js -->
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
    <script>
        function onchangeCat(){
           window.location.href = "create-new-order.php?idCategory="+$('#cat').val();
        }
        function onchangeBrand(){
            window.location.href = "create-new-order.php?idBrand="+$('#brand').val();
        }
    </script>
    
</body>

</html>