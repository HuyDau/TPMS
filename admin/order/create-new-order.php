<?php
require_once("../../config/config.php");
include '../handle.php';
if (!isset($_SESSION['admin_user'])) {
    header("location: ../login.php");
}
function execPostRequest($url, $data){
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt(
        $ch,
        CURLOPT_HTTPHEADER,
        array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data)
        )
    );
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    //execute post
    $result = curl_exec($ch);
    //close connection
    curl_close($ch);
    return $result;
}

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
    $sqlcheckOrder = mysqli_query($conn,"SELECT * FROM tbl_cart WHERE id = $id");
    $time = date("Y-m-d H:i:s");
    $agentId = $_SESSION['admin_id'];
    if(mysqli_num_rows($sqlcheckOrder)>0){
        echo "<script>window.alert('Order Exist!');window.location='create-new-order.php'</script>";
    }else{
        $_SESSION['orderCode'] = $id;
        $sqlCreateOrder = mysqli_query($conn,"INSERT INTO `tbl_cart`(`id`, `userId`, `name`, `phone`, `email`, `city`, `district`, `ward`, `address`, `note`, `total`, `time`, `idtype`, `idstatus`, `idpayment`,`agentId`) VALUES (' $id ','','','','','','','','','','',' $time','2','1','1','$agentId')");
        if($sqlCreateOrder){
            header("Location: create-new-order.php");
        }
    }
    
}

if(isset($_POST['addProduct'])){
    if(!isset($_POST['product'])){
        echo "<script>window.alert('You have not chosen any product!');window.location='create-new-order.php'</script>";
    }else{
       
        $idAgent = $_SESSION['admin_id'];
        $cartId = $_SESSION['orderCode'];
        $productId = $_POST['product'];
        $quantity = $_POST['quantity'];
        if($productId != ''){
            $sqlWarehouse = mysqli_query($conn,"SELECT * FROM tbl_warehouse INNER JOIN tbl_users ON tbl_warehouse.agentId = tbl_users.Id  WHERE versionId =  $productId AND agentId = $idAgent");
            $infoWarehouse = mysqli_fetch_assoc($sqlWarehouse);
            $quantityOld = 0;
            if(mysqli_num_rows($sqlWarehouse) > 0 ){
                $quantityOld = $infoWarehouse['quantity'];
                if($quantity <= $quantityOld ){
                    $sqlVersion = mysqli_query($conn,"SELECT * FROM tbl_versions WHERE idVersion =  $productId");
                    $infoProd = mysqli_fetch_assoc($sqlVersion);
                    $promotionalPrice = $infoProd['versionPromotionalPrice'];
                    $sqlCheck = mysqli_query($conn,"SELECT * FROM tbl_detailcart WHERE cartId = $cartId AND versionId = $productId");
                    if(mysqli_num_rows($sqlCheck)>0){
                        $infoCheck = mysqli_fetch_assoc($sqlCheck);
                        $newQuantity = $quantity + $infoCheck['quantity'];
                        $newQuantityWareHouse = $quantityOld - $quantity;
                        $updateWareHouse = mysqli_query($conn,"UPDATE `tbl_warehouse` SET `quantity`='$newQuantityWareHouse' WHERE versionId = $productId AND agentId = $idAgent");
                        $sqlDetailCart = mysqli_query($conn,"UPDATE `tbl_detailcart` SET `quantity`='$newQuantity' WHERE cartId = $cartId AND versionId = $productId");
                        if($sqlDetailCart && $updateWareHouse){
                            header("Location: create-new-order.php");
                        }
                    }else{
                        $newQuantityWareHouse = $quantityOld - $quantity;
                        $updateWareHouse = mysqli_query($conn,"UPDATE `tbl_warehouse` SET `quantity`='$newQuantityWareHouse' WHERE versionId = $productId AND agentId = $idAgent");
                        $sqlDetailCart = mysqli_query($conn,"INSERT INTO `tbl_detailcart`(`id`, `cartId`, `versionId`, `quantity`, `versionPromotionalPrice`) VALUES (NULL,'$cartId','$productId','$quantity','$promotionalPrice')");
                        if($updateWareHouse && $sqlDetailCart){
                            header("Location: create-new-order.php");
                        }
                    } 
                }else{
                    echo "<script>window.alert('Product is not enough!');window.location='create-new-order.php'</script>";
                }
                
            }else{
                echo "<script>window.alert('Product is not enough!');window.location='create-new-order.php'</script>";
            }
        }else{
            echo "<script>window.alert('You have not chosen any product!');window.location='create-new-order.php'</script>";
        }
    }
}
if(isset($_SESSION['orderCode'])){
    $totalPay = 0;
    $cartId = $_SESSION['orderCode'];
    $DetailCart = mysqli_query($conn,"SELECT * FROM tbl_detailcart WHERE cartId = $cartId ");
    while($item = mysqli_fetch_assoc($DetailCart)){
        $totalPay += $item['versionPromotionalPrice']*$item['quantity'];
    }
}

if(isset($_POST['confirm'])){
    $cartId = $_SESSION['orderCode'];
    $payment = $_POST['payment'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $city = $_POST['city'];
    $district = $_POST['district'];
    $ward = $_POST['ward'];
    $address = $_POST['address'];
    $totalPay = $_POST['totalPay'];

    if($payment == 1){
        $updateCart = mysqli_query($conn,"UPDATE `tbl_cart` SET `name`='$name',`phone`='$phone',`email`='$email',`city`='$city',`district`='$district',`ward`='$ward',`address`='$address',`total`='$totalPay',`idtype`='2',`idstatus`='3',`idpayment`='1'  WHERE id = $cartId");
        if($updateCart){
            unset($_SESSION['orderCode']);
            echo "<script>window.alert('Success!');window.location.href = 'create-new-order.php'</script>";
        }
    }else{
        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';

        $orderInfo = "Payment MoMo";
        $amount = round($totalPay/1000000) ;
        $orderId = time() . "";
        $redirectUrl = "http://localhost/TPMS/admin/order/list-order.php";
        $ipnUrl = "http://localhost/TPMS/admin/order/list-order.php";
        $extraData = "";


        $requestId = time() . "";
        $requestType = "captureWallet";

        $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
        $signature = hash_hmac("sha256", $rawHash, $secretKey);
        $data = array(
            'partnerCode' => $partnerCode,
            'partnerName' => "Test",
            "storeId" => "MomoTestStore",
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'redirectUrl' => $redirectUrl,
            'ipnUrl' => $ipnUrl,
            'lang' => 'vi',
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature
        );
        $result = execPostRequest($endpoint, json_encode($data));
        $jsonResult = json_decode($result, true); // decode json
        header('Location: ' . $jsonResult['payUrl']);

        $updateCart = mysqli_query($conn,"UPDATE `tbl_cart` SET `name`='$name',`phone`='$phone',`email`='$email',`city`='$city',`district`='$district',`ward`='$ward',`address`='$address',`total`='$totalPay',`idtype`='2',`idstatus`='3',`idpayment`='2'  WHERE id = $cartId");
        if($updateCart){
            unset($_SESSION['orderCode']);
            echo "<script>window.alert('Success!');window.location.href = 'create-new-order.php'</script>";
        }

    }
    
    
}
if(isset($_POST['cancelInvoice'])){
    $cartId = $_SESSION['orderCode'];
    $sqlDetailCart = mysqli_query($conn,"SELECT * FROM tbl_detailcart WHERE cartId = $cartId");
    if(mysqli_num_rows($sqlDetailCart) > 0){
        echo "<script>window.alert('You need to remove all products from the invoice!');window.location.href = 'create-new-order.php'</script>";
    }else{
        $DeleteCart = mysqli_query($conn,"DELETE FROM tbl_cart WHERE id = $cartId");
        if($DeleteCart){
            unset($_SESSION['orderCode']);
            echo "<script>window.alert('Cancel Success!');window.location.href = 'create-new-order.php'</script>";
        }
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
                                            <input style="width: 100%;height: 100%; padding-left: 10px;" type="number" name="orderCode" placeholder="Order Code">
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
                                            <div class="card-box col-4">
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
                                                                                    <option value="<?php echo $itemProduct['idVersion']; ?>" ><?php echo $itemProduct['versionName']; ?> - <?php echo $itemProduct['versionVersion']; ?></option>
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
                                                            <input type="number" value="0" name="quantity" min="0" step="1" style="padding-left: 20px;font-size: 15px;width: 100%;height: 30px;">
                                                        </div>
                                                    </div>
                                                    <?php
                                                        if(isset($_GET['idBrand'])){?><button type="submit" name="addProduct" type="submit" class="btn btn-lg font-16 btn-success btn-block  ">ADD</button><?php }
                                                    ?>
                                                    
                                                </form>
                                            </div>
                                            <div class="card-box col-8">
                                                <table class="table table-hover m-0 table-centered dt-responsive nowrap w-100" id="tickets-table">
                                                    <thead>
                                                        <tr>
                                                            <th>STT</th>
                                                            <th>Name</th>
                                                            <th>Version</th>
                                                            <th>Image</th>
                                                            <th>Price</th>
                                                            <th>Quantity</th>
                                                            <th>Total</th>
                                                            <th class="hidden-sm">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            $i = 1;
                                                            $getListProductInvoice = getListProductInvoice($conn,$_SESSION['orderCode']);
                                                            while($item = mysqli_fetch_assoc($getListProductInvoice)){
                                                                ?>
                                                                    <tr>
                                                                        <td><?=$i++?></td>
                                                                        <td><?=$item['versionName']?></td>
                                                                        <td><?=$item['versionVersion']?></td>
                                                                        <td>
                                                                            <?php
                                                                                if($item['idCategory']==1){
                                                                                    ?><img style="width: 50px;" src="../../uploads/product/smartphone/<?=$item['versionImage']?>" alt=""><?php
                                                                                }else if($item['idCategory']==2){
                                                                                    ?><img style="width: 50px;" src="../../uploads/product/laptop/<?=$item['versionImage']?>" alt=""><?php
                                                                                }else if($item['idCategory']==3){
                                                                                    ?><img style="width: 50px;" src="../../uploads/product/tablet/<?=$item['versionImage']?>" alt=""><?php
                                                                                }else if($item['idCategory']==4){
                                                                                    ?><img style="width: 50px;" src="../../uploads/product/monitor/<?=$item['versionImage']?>" alt=""><?php
                                                                                }else if($item['idCategory']==5){
                                                                                    ?><img style="width: 50px;" src="../../uploads/product/smarttv/<?=$item['versionImage']?>" alt=""><?php
                                                                                }else if($item['idCategory']==6){
                                                                                    ?><img style="width: 50px;" src="../../uploads/product/watch/<?=$item['versionImage']?>" alt=""><?php
                                                                                }else if($item['idCategory']==7){
                                                                                    ?><img style="width: 50px;" src="../../uploads/product/voice/<?=$item['versionImage']?>" alt=""><?php
                                                                                }else if($item['idCategory']==8){
                                                                                    ?><img style="width: 50px;" src="../../uploads/product/smarthome/<?=$item['versionImage']?>" alt=""><?php
                                                                                }else if($item['idCategory']==16){
                                                                                    ?><img style="width: 50px;" src="../../uploads/product/accessory/<?=$item['versionImage']?>" alt=""><?php
                                                                                }else if($item['idCategory']==17){
                                                                                    ?><img style="width: 50px;" src="../../uploads/product/toys/<?=$item['versionImage']?>" alt=""><?php
                                                                                }else if($item['idCategory']==18){
                                                                                    ?><img style="width: 50px;" src="../../uploads/product/driftingmachine/<?=$item['versionImage']?>" alt=""><?php
                                                                                }else if($item['idCategory']==19){
                                                                                    ?><img style="width: 50px;" src="../../uploads/product/repair/<?=$item['versionImage']?>" alt=""><?php
                                                                                }else if($item['idCategory']==20){
                                                                                    ?><img style="width: 50px;" src="../../uploads/product/service/<?=$item['versionImage']?>" alt=""><?php
                                                                                }
                                                                            ?>
                                                                        </td>
                                                                        <td><?=number_format($item['versionPromotionalPrice'],0,"",".")?></td>
                                                                        <td><?=$item['Q']?></td>
                                                                        <td><?=number_format($item['versionPromotionalPrice'] * $item['Q'],0,"",".")?></td>
                                                                        <td>
                                                                            <div class="btn-group dropdown">
                                                                                <a href="javascript: void(0);" class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
                                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                                    <a class="dropdown-item"  href="add-to-invoice.php?cartId=<?=$_SESSION['orderCode']?>&prodId=<?=$item['idVersion']?>&quantity=<?=$item['quantity']?>&agentId=<?=$_SESSION['admin_id']?>"><i  class="mdi mdi-check-all mr-2 text-muted font-18 vertical-middle"></i>Plus</a>
                                                                                    <a class="dropdown-item"  href="minus-to-invoice.php?cartId=<?=$_SESSION['orderCode']?>&prodId=<?=$item['idVersion']?>&quantity=<?=$item['quantity']?>&agentId=<?=$_SESSION['admin_id']?>"><i  class="mdi mdi-check-all mr-2 text-muted font-18 vertical-middle"></i>Minus</a>
                                                                                    <a class="dropdown-item"  href="delete-to-invoice.php?cartId=<?=$_SESSION['orderCode']?>&prodId=<?=$item['idVersion']?>&quantity=<?=$item['quantity']?>&agentId=<?=$_SESSION['admin_id']?>"><i  class="mdi mdi-delete mr-2 text-muted font-18 vertical-middle"></i>Delete</a>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                <?php
                                                            }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12"><h3>Customer Information</h3></div>
                                    <div class="col-12">
                                        <form method="POST" class="row">
                                            <div class="col-6 card-box">
                                                <div class="form-group">
                                                    <label class="control-label">Name: </label>
                                                    <input class="form-control form-white" placeholder="Enter Name ..." type="text" name="name" value="" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Phone: </label>
                                                    <input class="form-control form-white" placeholder="Enter Phone ..." type="text" name="phone" value="" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Email: </label>
                                                    <input class="form-control form-white" placeholder="Enter Email ..." type="text" name="email" value="" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">City: </label>
                                                    <select class="form-control form-white"   id="city" name="city" placeholder="Tỉnh/ Thành phố" required>
                                                        <option value="" selected>Choose City</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">District: </label>
                                                    <select class="form-control form-white"   id="district" name="district" placeholder="Quận/ Huyện" required>
                                                        <option value="" selected>Choose District</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Ward: </label>
                                                    <select class="form-control form-white"   id="ward" name="ward" placeholder="Phường/ Xã" required>
                                                        <option value="" selected>Choose War</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Address: </label>
                                                    <input class="form-control form-white" placeholder="Enter Address ..." type="text" name="address" value="" required>
                                                </div>
                                            </div>
                                            <div class="col-6 card-box" style="padding: 50px 0; display: flex; flex-direction: column;justify-content: space-between;">
                                                <div class="cart-total">
                                                    <p style="font-size: 16px;">Total Value: <strong class="price"> <?=number_format($totalPay,0,"",".")?> ₫</strong>  </p>
                                                    <p style="font-size: 16px;">Discount: <strong class="price">- 00 ₫</strong></p>
                                                    <p style="font-size: 16px;">Total Payment: <strong class="price text-red"><input name="totalPay" type="text" style="background: none;color: #fff;border: none;" value="<?=$totalPay?>"> ₫</strong></p>
                                                </div>
                                                <div class="cart-total">
                                                    <p style="font-size: 16px;">Select A Payment Method</p>
                                                    <div class="form-group">
                                                        <input type="radio" name="payment" id="cash-payment" value="1" checked><label for="cash-payment" style="padding-left: 10px">Cash Payment</label>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="radio" name="payment" id="momo" value="2"><label for="momo" style="padding-left: 10px">Momo QR Code</label>
                                                    </div>
                                                </div>
                                                <div>
                                                    <button class="btn btn-lg font-16 btn-success btn-block  " type="submit" name="confirm">CONFIRM</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-12">
                                        <form action="" method="POST"><button class="btn btn-danger" name="cancelInvoice">Cancel</button></form>
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
    <script>
        function onchangeCat(){
           window.location.href = "create-new-order.php?idCategory="+$('#cat').val();
        }
        function onchangeBrand(){
            window.location.href = "create-new-order.php?idBrand="+$('#brand').val();
        }
    </script>
     <!-- API Provice -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script>
        const host = "https://provinces.open-api.vn/api/";
        var callAPI = (api) => {
            return axios.get(api)
                .then((response) => {
                    renderData(response.data, "city");
                });
        }
        callAPI('https://provinces.open-api.vn/api/?depth=1');
        var callApiDistrict = (api) => {
            return axios.get(api)
                .then((response) => {
                    renderData(response.data.districts, "district");
                });
        }
        var callApiWard = (api) => {
            return axios.get(api)
                .then((response) => {
                    renderData(response.data.wards, "ward");
                });
        }

        var renderData = (array, select) => {
            let row = ' <option disable value="">Chọn</option>';
            array.forEach(element => {
                row += `<option data-id="${element.code}" value="${element.name}">${element.name}</option>`
            });
            document.querySelector("#" + select).innerHTML = row
        }

        $("#city").change(() => {
            callApiDistrict(host + "p/" + $("#city").find(':selected').data('id') + "?depth=2");
            printResult();
        });
        $("#district").change(() => {
            callApiWard(host + "d/" + $("#district").find(':selected').data('id') + "?depth=2");
            printResult();
        });
        $("#ward").change(() => {
            printResult();
        })

        var printResult = () => {
            if ($("#district").find(':selected').data('id') != "" && $("#city").find(':selected').data('id') != "" &&
                $("#ward").find(':selected').data('id') != "") {
                let result = $("#city option:selected").text() +
                    " | " + $("#district option:selected").text() + " | " +
                    $("#ward option:selected").text();
                $("#result").text(result)
            }

        }
    </script>
    
</body>

</html>