<?php
require_once("config/config.php");
include 'handle.php';

if(!isset($_SESSION['userId'])){
    header("Location: index.php");
}else{
    $userId = $_SESSION['userId'];
    $sqlUser = mysqli_query($conn,"SELECT * FROM tbl_customer WHERE id = $userId ");
    $infoCus = mysqli_fetch_assoc( $sqlUser);
}
if (!isset($_SESSION["cart"])) {
    $_SESSION["cart"] = array();
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

if (isset($_GET["action"])) {
    function update_cart($add = false)
    {
        foreach ($_POST['quantity'] as $id => $quantity) {
            if ($quantity == 0) {
                unset($_SESSION["cart"][$id]);
            } else {
                if ($add) {
                    $_SESSION["cart"][$id] += $quantity;
                } else {
                    $_SESSION["cart"][$id] = $quantity;
                }
            }
        }
    }
    switch ($_GET["action"]) {
        case "add":
            update_cart(true);
            header('Location: gio-hang.php');
            break;

        case "delete":
            if (isset($_GET["id"])) {
                unset($_SESSION["cart"][$_GET["id"]]);
            }
            header('Location: gio-hang.php');
            break;

        case "submit":
            if (isset($_POST['updateCart'])) {
                update_cart();
                header('Location: gio-hang.php');
            }else if(isset($_POST['addCouple'])){
                if(!isset($_SESSION['discount']) && !isset($_SESSION['discountCode'])){
                    $discountCode = $_POST['discount'];
                    $sqlDiscount = mysqli_query($conn,"SELECT * FROM tbl_couple WHERE coupleCode = '$discountCode'");
                    $itemDiscount = mysqli_fetch_assoc($sqlDiscount);
                    $_SESSION['discount'] = $itemDiscount['coupleValue'];
                    $_SESSION['discountCode'] = $itemDiscount['coupleCode'];
                }else{
                    $discountExist = "Bạn đã dùng voucher này !";
                }
               
            }
            else{
                if (isset($_POST['order'])){
                    $pay_method = $_POST['pay_method'];
                    $userId = $_SESSION["userId"];
                    $date = date("Y-m-d H:i:s");
                    if($pay_method == 1 ){
                        if(!empty($_POST['quantity'])){
                            $sqlProd = mysqli_query($conn, "SELECT * FROM tbl_versions WHERE idVersion IN (" . implode(",", array_keys($_POST['quantity'])) . ")");
                            $total = 0;
                            $orderProduct = array();
                            while ($row = mysqli_fetch_array($sqlProd)) {
                                $orderProduct[] = $row;
                                $total += $row["versionPromotionalPrice"] * $_POST["quantity"][$row["idVersion"]];
                            }
                        }
                        if(isset($_POST['ReceiveTypeID']) && $_POST['ReceiveTypeID'] == 1){
                            $city = $_POST['city'];
                            $district = $_POST['district'];
                            $ward = $_POST['ward'];
                            $address = $_POST['address'];
                        }else if(isset($_POST['ReceiveTypeID']) && $_POST['ReceiveTypeID'] == 5){
                            $city = $_POST['city1'];
                            $district = $_POST['district1'];
                            $ward = $_POST['ward1'];
                            $address = $_POST['address1'];
                        }
                        if(isset($_SESSION['discount'])){
                            $newTotal = $total - $_SESSION['discount'];
                        }else{
                            $newTotal = $total;
                        }
                        if(isset($_POST['name']) && $_POST['name'] != '' && isset($_POST['phone']) && $_POST['phone'] != ''&& isset($_POST['email']) && $_POST['email'] != '' && $city != '' && $district != '' && $ward != '' && $address != '' ){
                            $addCart = mysqli_query($conn, "INSERT INTO `tbl_cart`(`id`, `userId`, `name`, `phone`, `email`, `city`, `district`, `ward`, `address`, `note`, `total`, `time`, `idtype`, `idstatus`, `idpayment`) VALUES (NULL,'$userId','".$_POST['name']."','".$_POST['phone']."','".$_POST['email']."','$city','$district','$ward','$address','".$_POST['note']."','$newTotal','$date','1','1','1')");
                            $cart_id = $conn->insert_id;
                            $insertString = "";

                            foreach ($orderProduct as $key => $product) {
                                $insertString .= "(NULL, '" . $cart_id . "', '" . $product['idVersion'] . "','" . $_POST['quantity'][$product['idVersion']] . "', '" . $product['versionPromotionalPrice'] . "')";
                                if ($key != count($orderProduct) - 1) {
                                    $insertString .= ",";
                                }
                            }

                            $addDetail = mysqli_query($conn, "INSERT INTO `tbl_detailcart`(`id`, `cartId`, `versionId`, `quantity`, `versionPromotionalPrice`) VALUES " . $insertString . "");
                            if($addDetail){
                                unset($_SESSION['cart']);
                                unset( $_SESSION['discount']);
                                unset($_SESSION['discountCode']);
                                echo "<script>window.location.href = 'dat-hang.php'</script>";
                            }
                        }else{
                            ?><script>window.alert('<?=$district?>')</script><?php
                        }

                    }
                    elseif($pay_method == 3){
                        if(!empty($_POST['quantity'])){
                            $sqlProd = mysqli_query($conn, "SELECT * FROM tbl_versions WHERE idVersion IN (" . implode(",", array_keys($_POST['quantity'])) . ")");
                            $total = 0;
                            $orderProduct = array();
                            while ($row = mysqli_fetch_array($sqlProd)) {
                                $orderProduct[] = $row;
                                $total += $row["versionPromotionalPrice"] * $_POST["quantity"][$row["idVersion"]];
                            }
                        }
                        if(isset($_SESSION['discount'])){
                            $newTotal = $total - $_SESSION['discount'];
                        }else{
                            $newTotal = $total;
                        }
                        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";


                        $partnerCode = 'MOMOBKUN20180529';
                        $accessKey = 'klm05TvNBzhg7h7j';
                        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';

                        $orderInfo = "Payment MoMo";
                        $amount = round($newTotal/1000000) ;
                        $orderId = time() . "";
                        $redirectUrl = "http://localhost/TPMS/bang-dieu-khien.php?page=order";
                        $ipnUrl = "http://localhost/TPMS/bang-dieu-khien.php?page=order";
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

                        //Just a example, please check more in there
                        if(isset($_POST['ReceiveTypeID']) && $_POST['ReceiveTypeID'] == 1){
                            $city = $_POST['city'];
                            $district = $_POST['district'];
                            $ward = $_POST['ward'];
                            $address = $_POST['address'];
                        }else if(isset($_POST['ReceiveTypeID']) && $_POST['ReceiveTypeID'] == 5){
                            $city = $_POST['city1'];
                            $district = $_POST['district1'];
                            $ward = $_POST['ward1'];
                            $address = $_POST['address1'];
                        }
                        header('Location: ' . $jsonResult['payUrl']);
                        if(isset($_POST['name']) && $_POST['name'] != '' && isset($_POST['phone']) && $_POST['phone'] != ''&& isset($_POST['email']) && $_POST['email'] != '' && $city != '' && $district != '' && $ward != '' && $address != '' ){
                            $addCart = mysqli_query($conn, "INSERT INTO `tbl_cart`(`id`, `userId`, `name`, `phone`, `email`, `city`, `district`, `ward`, `address`, `note`, `total`, `time`, `idtype`, `idstatus`, `idpayment`) VALUES (NULL,'$userId','".$_POST['name']."','".$_POST['phone']."','".$_POST['email']."','$city','$district','$ward','$address','".$_POST['note']."','$newTotal','$date','1','1','2')");
                            $cart_id = $conn->insert_id;
                            $insertString = "";

                            foreach ($orderProduct as $key => $product) {
                                $insertString .= "(NULL, '" . $cart_id . "', '" . $product['idVersion'] . "','" . $_POST['quantity'][$product['idVersion']] . "', '" . $product['versionPromotionalPrice'] . "')";
                                if ($key != count($orderProduct) - 1) {
                                    $insertString .= ",";
                                }
                            }
                            if(isset($addCart)){
                                $addDetail = mysqli_query($conn, "INSERT INTO `tbl_detailcart`(`id`, `cartId`, `versionId`, `quantity`, `versionPromotionalPrice`) VALUES " . $insertString . "");
                                if( $addDetail){
                                    $insert_momo = mysqli_query($conn, "INSERT INTO `tbl_momo`(`id`, `cartId`, `partnerCode`, `orderId`, `amount`, `orderInfo`, `orderType`, `transId`, `payType`) VALUES ('','$cart_id','$partnerCode','$orderId','$amount','$orderInfo','momo_wallet','2147483647','qr')");
                                    $success = "Order Success";
                                    if( $insert_momo ){
                                        unset($_SESSION['cart']);
                                        unset( $_SESSION['discount']);
                                        unset($_SESSION['discountCode']);
                                    }
                                }
                            }
                            
                        }else{
                            ?><script>window.alert('<?=$district?>')</script><?php
                        }
                        
                    }
                }
            }

            break;
    }
}


?>
<!doctype html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="author" content="hoanghamobile.com">
    <meta property='og:site_name' content='hoanghamobile.com' />
    
    

    <title>Giỏ hàng</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/logo/favicon.ico" />
    <link rel="preload" href="assets/fonts/SegoeUI/SegoeUI.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="assets/fonts/SegoeUI/SegoeUIItalic.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="assets/fonts/SegoeUI/SegoeUIBold.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="assets/fonts/SegoeUI/SegoeUIBoldItalic.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="assets/fonts/SegoeUI/SegoeUISemilight.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="assets/fonts/SegoeUI/SegoeUISemilightItalic.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="assets/fonts/SegoeUI/hoangha.woff" as="font" type="font/woff" crossorigin>
    <link rel="preload" as="script" href="assets/js/main.js">
    <link rel="preload" as="style" href="assets/css/main.css">
    <link href="assets/css/main.css" rel="stylesheet" type="text/css">

    <script async src="assets/js/ins.js"></script>
</head>

<body>
    <header>
        <div class="top-navigation">
            <div class="container">
                <ul>
                        <li><a href="/mobileswitch?mobile=true">Bản mobile</a></li>
                        <li><a href="/gioi-thieu-cong-ty">Giới thiệu</a></li>
                        <li><a href="/san-pham-da-xem">Sản phẩm đ&#227; xem</a></li>
                        <li><a href="/trung-tam-bao-hanh">Trung t&#226;m bảo hành</a></li>
                        <li><a href="/he-thong-cua-hang">Hệ thống 128 si&#234;u thị</a></li>
                        <li><a href="https://tuyendung.hoanghamobile.com/">Tuyển dụng</a></li>
                        <li><a href="/order/check">Tra cứu đơn hàng</a></li>
                                            <li class="member">
                            <i class="icon-account"></i> <a class="account" href="/Account"><strong>test@gmail.com</strong></a>
                            <div class="sub">
                                <ul>
                                    <li><a href="/account/index"><i class="icon-controls"></i><span>Bảng điều khiển</span></a></li>
                                    <li><a href="/account/info"><i class="icon-account"></i><span>Thông tin tài khoản</span></a></li>
                                    <li><a href="/account/order"><i class="icon-order-mgr"></i><span>Đơn hàng của bạn</span></a></li>
                                    <li><a href="/account/wishlist"><i class="icon-love"></i><span>Sản phẩm yêu thích</span></a></li>
                                    <li><a href="/account/comment"><i class="icon-comment"></i><span>Quản lý bình luận</span></a></li>
                                    <li><a href="/account/review"><i class="icon-edit-squad"></i><span>Quản lý đánh giá</span></a></li>
                                    <li>
                                        <form action="/Account/LogOff" id="logoutForm" method="post">
                                            <input type="hidden" name="ReturnUrl" id="ReturnUrl" value="/gio-hang" />
                                            <input name="__RequestVerificationToken" type="hidden" value="H-FgkZr9pmZIifBbcQy0bL913_-4-oF3fl26GgF1SbKqSsDbT-bDEXuMWOy1gDCcywiqd6SzdjuymTPxLVkKps1IBSsCkEa5QRr8HYH6x9fhKpV3F01Wtm83Yt6kzV86X1_2vA2" />
                                            <a href="javascript:document.getElementById('logoutForm').submit()"><i class="icon-logout"></i><span>Đăng xuất</span></a>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </li>
                </ul>
            </div>
        </div>
        
    </header>

    <section>
        <div class="container">

            <div class="cart">
                <div class="header">
                    <div class="back">
                        <a href="index.php">
                            <i class="icon-leftar"></i>
                            <strong>Quay lại</strong>
                        </a>
                    </div>
                </div>
                <?php
                    if (!empty($_SESSION["cart"])) {
                        ?>
                            <form method="POST" enctype="multipart/form-data" action="gio-hang.php?action=submit" class="cart-layout">
                                <div class="cart-info" id="cartInfo">
                                    <div class="cart-icon">
                                        <i class="icon-cart-index"></i>
                                        <label>Giỏ hàng</label>
                                    </div>
                                        <div style="display: flex;justify-content: flex-end;"><button name="updateCart" class="btn-update-cart">Cập nhật giỏ hàng</button></div>
                                    <div class="cart-items">
                                        <?php
                                            if (!empty($_SESSION["cart"])) {
                                                $total = 0;
                                                $sqlProd = mysqli_query($conn, "SELECT * FROM tbl_versions INNER JOIN tbl_products ON tbl_versions.productId = tbl_products.id  WHERE idVersion IN (" . implode(",", array_keys($_SESSION['cart'])) . ") ");
                                                while ($infoProd = mysqli_fetch_array($sqlProd)) { 
                                                   ?>
                                                        <div class="item">
                                                            <div class="img">
                                                                <?php
                                                                    if($infoProd['idCategory'] == 1){
                                                                        ?><img src="uploads/product/smartphone/<?=$infoProd['versionImage']?>" alt="<?=$infoProd['versionName']?>" /><?php
                                                                    }else if($infoProd['idCategory'] == 2){
                                                                        ?><img src="uploads/product/laptop/<?=$infoProd['versionImage']?>" alt="<?=$infoProd['versionName']?>" /><?php
                                                                    }else if($infoProd['idCategory'] == 3){
                                                                        ?><img src="uploads/product/tablet/<?=$infoProd['versionImage']?>" alt="<?=$infoProd['versionName']?>" /><?php
                                                                    }else if($infoProd['idCategory'] == 4){
                                                                        ?><img src="uploads/product/monitor/<?=$infoProd['versionImage']?>" alt="<?=$infoProd['versionName']?>" /><?php
                                                                    }else if($infoProd['idCategory'] == 5){
                                                                        ?><img src="uploads/product/smarttv/<?=$infoProd['versionImage']?>" alt="<?=$infoProd['versionName']?>" /><?php
                                                                    }else if($infoProd['idCategory'] == 6){
                                                                        ?><img src="uploads/product/watch/<?=$infoProd['versionImage']?>" alt="<?=$infoProd['versionName']?>" /><?php
                                                                    }else if($infoProd['idCategory'] == 7){
                                                                        ?><img src="uploads/product/voice/<?=$infoProd['versionImage']?>" alt="<?=$infoProd['versionName']?>" /><?php
                                                                    }else if($infoProd['idCategory'] == 8){
                                                                        ?><img src="uploads/product/smarthome/<?=$infoProd['versionImage']?>" alt="<?=$infoProd['versionName']?>" /><?php
                                                                    }else if($infoProd['idCategory'] == 16){
                                                                        ?><img src="uploads/product/accessory/<?=$infoProd['versionImage']?>" alt="<?=$infoProd['versionName']?>" /><?php
                                                                    }else if($infoProd['idCategory'] == 17){
                                                                        ?><img src="uploads/product/toys/<?=$infoProd['versionImage']?>" alt="<?=$infoProd['versionName']?>" /><?php
                                                                    }else if($infoProd['idCategory'] == 18){
                                                                        ?><img src="uploads/product/driftingmachine/<?=$infoProd['versionImage']?>" alt="<?=$infoProd['versionName']?>" /><?php
                                                                    }else if($infoProd['idCategory'] == 19){
                                                                        ?><img src="uploads/product/repair/<?=$infoProd['versionImage']?>" alt="<?=$infoProd['versionName']?>" /><?php
                                                                    }else if($infoProd['idCategory'] == 20){
                                                                        ?><img src="uploads/product/service/<?=$infoProd['versionImage']?>" alt="<?=$infoProd['versionName']?>" /><?php
                                                                    }
                                                                ?>
                                                            </div>

                                                            <div class="info">
                                                                                
                                                                <div class="edit">
                                                                    
                                                                    <a href="gio-hang.php?action=delete&id=<?= $infoProd["idVersion"] ?>" class="red"><i class="icon-minutes"></i></a>
                                                                </div>
                                                                <div>
                                                                    <p class="title"><?=$infoProd['versionName']?></p>
                                                                    <p class="price"><strong><?=number_format($infoProd['versionPromotionalPrice'],0,"",".")?> ₫</strong>

                                                                            <strike><?=number_format($infoProd['versionPrice'],0,"",".")?> ₫</strike>
                                                                                            </p>
                                                                    <div class="number" style="display: flex;">
                                                                        <label>Số lượng</label>
                                                                        <div class="control">
                                                                            <button id="minus" class="minus">-</button>
                                                                            <input type="text" id="input" name="quantity[<?= $infoProd["idVersion"] ?>]" value="<?= $_SESSION["cart"][$infoProd["idVersion"]] ?>" step="1" min="0" />
                                                                            <button id="plus" class="plus">+</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="options">
                                                                    <div class="option">
                                                                        <strong>Phiên bản</strong>
                                                                        <label>
                                                                            <i class="icon-checked"></i>
                                                                            <span><?=$infoProd['productVersion']?></span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <?php $money = $infoProd['versionPromotionalPrice'] * $_SESSION["cart"][$infoProd["idVersion"]] ?>
                                                   <?php
                                                   $total +=  ($infoProd['versionPromotionalPrice']) * $_SESSION["cart"][$infoProd["idVersion"]];
                                                }
                                            }
                                        ?>
                                    </div>
                                    <div class="cart-total">
                                        <?php 
                                            if(isset($_SESSION['discount'])){ 
                                                ?><div style="display: flex;">
                                                    <p style="width: 30%;padding: 10px;">Mã giảm giá:</p> 
                                                    <input  class="col-8" style="outline: none;width: 70%;background: none; border: 1px solid #006e5d;border-radius: 20px;font-size: 13px;color: #444;padding: 10px;" type="text" value="<?php if(isset($_SESSION['discountCode'])){echo $_SESSION['discountCode'];}?>">
                                                </div><?php 
                                            }else{?><div style="display: flex;"><p style="width: 30%;padding: 10px;">Mã giảm giá:</p> <input  class="col-8" style="outline: none;width: 70%;background: none; border: 1px solid #006e5d;border-radius: 20px;font-size: 13px;color: #444;padding: 10px;" type="text" name="discount" placeholder="Mã giảm giá ... "><button type="submit" name="addCouple" style="background: transparent linear-gradient(180deg,#009981 0%,#00483d 100%) 0% 0% no-repeat padding-box;margin-left: 10px; font-weight: bold;width: 100px; border: none; outline: none; box-shadow: 0 4px 6px #00000029; border-radius: 8px;color: #fff;font-size: 13px;text-align: center;padding: 10px;">Áp dụng</button></div><?php } ?>
                                        <?php if(isset($_SESSION['discount'])){ ?><p>Bạn đã thêm voucher thành công !</p><?php } ?>
                                    </div>
                                    <div class="cart-total">
                                        <p>Tổng giá trị: <strong class="price">
                                        <?=number_format($total,0,"",".")?> ₫</strong> 
                                        </p>
                                            <p>Giảm giá: <strong class="price">- <?php  if(isset($_SESSION['discount'])){echo $_SESSION['discount'];}else{echo "00";} ?> ₫</strong></p>
                                        <p>Tổng thanh toán: <strong class="price text-red"><?php if(isset($_SESSION['discount'])){echo number_format($total - $_SESSION['discount'],0,"",".");}else{echo number_format($total,0,"",".");} ?> ₫</strong></p>
                                        <button class="next">Tiếp tục</button>
                                    </div>

                                </div>
                                <div class="cart-form">
                                    <div>
                                         <h3>Thông tin người nhận</h3>
                                        
                                        <p class="text-gray"><i>Bạn cần nhập đầy đủ các trường thông tin có dấu *</i></p>
                                        <div class="row"><span class="group"><strong>Đại chỉ nhận hàng</strong></span></div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="control">
                                                    <input value="<?=$infoCus['name']?>" name="name" type="text" placeholder="Họ và tên *" data-required="1" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <div class="control">
                                                    <input value="0<?=$infoCus['phone']?>" name="phone" type="tel" placeholder="Số điện thoại *" data-required="1" />
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col">
                                                <div class="control">
                                                    <input value="<?=$infoCus['email']?>" name="email" type="email" placeholder="Email" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row"><span class="group"><strong>Địa chỉ nhận hàng</strong></span></div>

                                        <div class="row">
                                            <div class="col">
                                                <div id="payType_1" class="payment-opt">
                                                    <label class="radio-ctn">
                                                        <span>Nhận hàng tại nhà</span>
                                                        <input name="ReceiveTypeID" type="radio" id="ReceiveTypeID1" value="1" checked class="cart-paymentTypeId" >
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div id="payType_5" class="payment-opt">
                                                    <label class="radio-ctn">
                                                        <span>Nhận hàng địa chỉ khác</span>
                                                        <input name="ReceiveTypeID" type="radio" id="ReceiveTypeID5" value="5" class="cart-paymentTypeId" >
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                            </div>

                                        </div>
                                        <div id="f_payType_1" style="display: none;">

                                            <div class="row">
                                                <div class="col">
                                                    <div class="control"><input type="text" name="city" value="<?=$infoCus['city']?>" readonly></div>
                                                </div>
                                                <div class="col">
                                                    <div class="control"><input type="text" name="district" value="<?=$infoCus['district']?>" readonly></div>
                                                </div>
                                                <div class="col">
                                                    <div class="control"><input type="text" name="ward" value="<?=$infoCus['ward']?>" readonly></div>
                                                </div>
                                            </div>

                                            <div class="row shInfo">
                                                <div class="col">
                                                    <div class="control">
                                                        <input id="Address" name="address" type="text"  value="<?=$infoCus['address']?>" placeholder="Địa chỉ nhận hàng *" data-required="1" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="f_payType_5" style="display: none;">
                                            <div class="row">
                                                <span class="group"><strong>Nơi nhận hàng</strong></span>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="control">
                                                    <select id="city" name="city1" placeholder="Tỉnh/Thành phố" >
                                                        <option value="" selected>Chọn tỉnh thành</option>
                                                    </select>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="control">
                                                        <select id="district" name="district1" placeholder="Quận/ Huyện" >
                                                            <option value="" selected>Chọn quận huyện</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="control">
                                                        <select id="ward" name="ward1" placeholder="Phường/ Xã" >
                                                            <option value="" selected>Chọn phường xã</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row shInfo">
                                                <div class="col">
                                                    <div class="control">
                                                        <input value="" id="Address" name="address1" type="text" placeholder="Địa chỉ nhận hàng *" data-required="1" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row ">
                                            <div class="col">
                                                <div class="control">
                                                    <textarea name="note" placeholder="Ghi chú" spellcheck="false" data-minlength="15"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="cart-payment" >
                                                <label class="label-container">
                                                    <input type="radio" id="pay_method_1" name="pay_method" value="1" checked>
                                                    
                                                    <span>Thanh toán tiền mặt khi nhận hàng</span>
                                                    <div class="payment-detail" style="display: none;"></div>
                                                </label>
                                                <label class="label-container">
                                                    <input type="radio" id="pay_method_3" name="pay_method" value="3">
                                                    <span>Thanh toán Momo QR CODE</span>
                                                </label>
                                                
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="control-button">
                                                <button name="order" type="submit">XÁC NHẬN VÀ ĐẶT HÀNG</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        <?php
                    }else{
                        ?>
                        <div class="cart-layout">
                            <div class="cart-content">
                                <div class="no-items">
                                    <div class="cart-icon">
                                        <i class="icon-cart-index"></i>
                                        <label>Giỏ hàng</label>
                                    </div>
                                    <div class="img">
                                        <img src="assets/images/img/no-item.png">
                                        <p><strong>Hiện chưa có sản phẩm nào trong giỏ hàng</strong></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                ?>
                
            </div>
        </div>
    </section>
    <iframe src="https://asia.creativecdn.com/tags?id=pr_n4X0y6ApZyJaHX1dNxQd_basketstatus_1,794,2006" width="1" height="1" scrolling="no" frameBorder="0" style="display: none;"></iframe>
    <script src="https://www.google.com/recaptcha/api.js?render=6Lc8ieoiAAAAAOHeth4LTNkrthxFlRLJaduX7OYM"></script>



    <footer>
        <div class="container">
            
                <div id="navSocial">
                    <div class="social">
                        <ul>
                                <li><a href="https://www.facebook.com/hoanghamobilecom" title="Facebook Hoàng Hà Mobile" target="_blank" class="blue"><span><i class="icon-facebook"></i></span></a></li>
                                <li><a href="https://www.youtube.com/channel/UCJm_GdFJzT8h1odq1oMu_7Q?sub_confirmation=1" title="Youtube Hoàng Hà Mobile Channel" target="_blank" class="red"><span><i class="icon-youtube"></i></span></a></li>
                                <li><a href="https://www.instagram.com/hoanghamobile/?hl=vi" title="Hoàng Hà Mobile Instagram" target="_blank" class="rainbow"><span><i class="icon-instagram"></i></span></a></li>
                                <li><a href="https://www.tiktok.com/@hoanghaangels?" title="Tiktok" target="_blank" class="black"><span><i class="icon-tiktok"></i></span></a></li>
                        </ul>
                    </div>
                </div>


            <div id="backtoTop">
                <a id="top" href="javascript:;">
                    <i class="icon-left"></i>
                </a>
            </div>
        </div>
    </footer>
    <div id="popup-modal"></div>
    <div id="sticker-modal"></div>
    <div class="search-bg"></div>


    <div class="footer-stick-right" style="position: fixed; bottom: 175px; right: 33px; display:none">
        <a href="javascript:removeStick();" style="background: #4B4B4B;color: #FFF;border-radius: 20px;font-size: 8px;width: 20px;height: 20px;display: flex;text-align: center; position:absolute; right:-5px; top:-5px;">
            <i class="iconv2-remove" style="display:block; margin:auto;"></i>
        </a>
        <div style="padding-bottom:10px;">
            <a href="">
                <img src="assets/images/icon/maycugiatot.png" />
            </a>
        </div>
        <div>
            <a href="">
                <img src="assets/images/icon/thucugiacao.png" />
            </a>
        </div>
    </div>


    <div class="footer-zalo" style="position: fixed; bottom: 110px; right: 33px;">
        <a href="https://oa.zalo.me/262829019064124420" target="_blank"><img src="assets/images/icon/zalo.svg" /></a>
    </div>

    <!-- analytics -->
    <script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r; i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date(); a = s.createElement(o),
                m = s.getElementsByTagName(o)[0]; a.async = 1; a.src = g; m.parentNode.insertBefore(a, m)
        })(window, document, 'script', 'assets/js/analytics.js', 'ga');

        ga('create', 'UA-1415779-10', 'auto');
        ga('require', 'GTM-KXZQBMD');
        ga('require', 'GTM-WPLRWHK');
        ga('send', 'pageview');

    </script>
    <!-- analytics -->
    <!-- Google Tag Manager -->
    <script>
        (function (w, d, s, l, i) {
            w[l] = w[l] || []; w[l].push({
                'gtm.start':
                    new Date().getTime(), event: 'gtm.js'
            }); var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : ''; j.async = true; j.src =
                    'https://www.googletagmanager.com/gtm.js?id=' + i + dl; f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-5QM3X2');
    </script>
    <!-- End Google Tag Manager -->
    <!-- subiz -->
    <script>!function (s, u, b, i, z) { var o, t, r, y; s[i] || (s._sbzaccid = z, s[i] = function () { s[i].q.push(arguments) }, s[i].q = [], s[i]("setAccount", z), r = ["widget.subiz.net", "storage.googleapis" + (t = ".com"), "app.sbz.workers.dev", i + "a" + (o = function (k, t) { var n = t <= 6 ? 5 : o(k, t - 1) + o(k, t - 3); return k !== t ? n : n.toString(32) })(20, 20) + t, i + "b" + o(30, 30) + t, i + "c" + o(40, 40) + t], (y = function (k) { var t, n; s._subiz_init_2094850928430 || r[k] && (t = u.createElement(b), n = u.getElementsByTagName(b)[0], t.async = 1, t.src = "https://" + r[k] + "/sbz/app.js?accid=" + z, n.parentNode.insertBefore(t, n), setTimeout(y, 2e3, k + 1)) })(0)) }(window, document, "script", "subiz", "acqqrmpwwuqeianonpxt")</script>
    <!-- subiz -->
    <!-- accesstrade-->
    <script src="assets/js/tracking.min.js"></script>
    <script type="text/javascript">
        AT.init({ "campaign_id": 626, "is_reoccur": 1, "is_lastclick": 1 });
        AT.track();
    </script>
    <!-- accesstrade-->



    <script src="assets/js/main.js"></script>


    <script type="text/javascript">
        function removeStick() {
            sessionStorage.setItem('stickRemove', 1);
            $('.footer-stick-right').hide();
        }

        $(document).ready(function () {
            if (sessionStorage.getItem('stickRemove')) {
                $('.footer-stick-right').hide();
            }
            else {
                $('.footer-stick-right').show();
            }
        });

    </script>

    <script>
        $(document).ready(function() {
			$('.minus').click(function () {
				var $input = $(this).parent().find('input');
				var count = parseInt($input.val()) - 1;
				count = count < 0 ? 0 : count;
				$input.val(count);
				$input.change();
				return false;
			});
			$('.plus').click(function () {
				var $input = $(this).parent().find('input');
				$input.val(parseInt($input.val()) + 1);
				$input.change();
				return false;
			});
		});
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
    <script type="text/javascript">
        $('input[name="ReceiveTypeID"]').on("click", function() {
            var Number = $('input[name = "ReceiveTypeID"]:checked').val();
            if( Number == 1){
                $("#f_payType_1").show();
                $("#f_payType_5").hide();
            }
            if( Number == 5){
                $("#f_payType_1").hide();
                $("#f_payType_5").show();
            }
        });

        if( $('input[name = "ReceiveTypeID"]:checked').val() ==  1){
            $("#f_payType_1").show();
            $("#f_payType_5").hide();
        }
    </script>
</body>
</html>

