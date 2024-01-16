<?php
session_start();
// GET CATEGORY
function getCategory($conn){
    $getCat = mysqli_query($conn,"SELECT * FROM tbl_categories");
    return $getCat;
}
// GET BRand
function getBrands($conn, $a){
    $getBrand = mysqli_query($conn,"SELECT * FROM tbl_brands WHERE categoryId = $a");
    return $getBrand;
}
// GET ONLINE ORDER
function getOnlineOrder($conn,$a){
    if($a == 0){
        $sqlOnlineOrder = mysqli_query($conn, "SELECT *,tbl_cart.id as A  FROM `tbl_cart` INNER JOIN tbl_status ON tbl_cart.idstatus = tbl_status.id INNER JOIN tbl_payment ON tbl_cart.idpayment = tbl_payment.id ");
    }else if($a == 1){
        $sqlOnlineOrder = mysqli_query($conn, "SELECT *,tbl_cart.id as A FROM `tbl_cart` INNER JOIN tbl_status ON tbl_cart.idstatus = tbl_status.id INNER JOIN tbl_payment ON tbl_cart.idpayment = tbl_payment.id  WHERE tbl_cart.idstatus = $a");
    }else if($a == 2){
        $sqlOnlineOrder = mysqli_query($conn, "SELECT *,tbl_cart.id as A FROM `tbl_cart` INNER JOIN tbl_status ON tbl_cart.idstatus = tbl_status.id INNER JOIN tbl_payment ON tbl_cart.idpayment = tbl_payment.id  WHERE tbl_cart.idstatus = $a");
    }else if($a == 3){
        $sqlOnlineOrder = mysqli_query($conn, "SELECT *,tbl_cart.id as A FROM `tbl_cart` INNER JOIN tbl_status ON tbl_cart.idstatus = tbl_status.id INNER JOIN tbl_payment ON tbl_cart.idpayment = tbl_payment.id  WHERE tbl_cart.idstatus = $a");
    }else if($a == 4){
        $sqlOnlineOrder = mysqli_query($conn, "SELECT *,tbl_cart.id as A FROM `tbl_cart` INNER JOIN tbl_status ON tbl_cart.idstatus = tbl_status.id INNER JOIN tbl_payment ON tbl_cart.idpayment = tbl_payment.id  WHERE tbl_cart.idstatus = $a");
    }
    return $sqlOnlineOrder;
}

// GET ORDER OFFLINE
function getOfflineOrder($conn,$a){
    if($a == 0){
        $sqlOnlineOrder = mysqli_query($conn, "SELECT *,tbl_cart.id as A  FROM `tbl_cart` INNER JOIN tbl_status ON tbl_cart.idstatus = tbl_status.id INNER JOIN tbl_payment ON tbl_cart.idpayment = tbl_payment.id WHERE idtype = 2 ");
    }else if($a == 1){
        $sqlOnlineOrder = mysqli_query($conn, "SELECT *,tbl_cart.id as A FROM `tbl_cart` INNER JOIN tbl_status ON tbl_cart.idstatus = tbl_status.id INNER JOIN tbl_payment ON tbl_cart.idpayment = tbl_payment.id  WHERE tbl_cart.idstatus = $a");
    }else if($a == 2){
        $sqlOnlineOrder = mysqli_query($conn, "SELECT *,tbl_cart.id as A FROM `tbl_cart` INNER JOIN tbl_status ON tbl_cart.idstatus = tbl_status.id INNER JOIN tbl_payment ON tbl_cart.idpayment = tbl_payment.id  WHERE tbl_cart.idstatus = $a");
    }else if($a == 3){
        $sqlOnlineOrder = mysqli_query($conn, "SELECT *,tbl_cart.id as A FROM `tbl_cart` INNER JOIN tbl_status ON tbl_cart.idstatus = tbl_status.id INNER JOIN tbl_payment ON tbl_cart.idpayment = tbl_payment.id  WHERE tbl_cart.idstatus = $a");
    }else if($a == 4){
        $sqlOnlineOrder = mysqli_query($conn, "SELECT *,tbl_cart.id as A FROM `tbl_cart` INNER JOIN tbl_status ON tbl_cart.idstatus = tbl_status.id INNER JOIN tbl_payment ON tbl_cart.idpayment = tbl_payment.id  WHERE tbl_cart.idstatus = $a");
    }
    return $sqlOnlineOrder;
}

// COUNT LIST ORDER 
function countListOrder($conn,$a){
    if($a == 0){
        $sqlListOrder = mysqli_query($conn,"SELECT * FROM `tbl_cart` ");
    }else if($a == 1){
        $sqlListOrder = mysqli_query($conn,"SELECT * FROM `tbl_cart` INNER JOIN tbl_status ON tbl_cart.idstatus = tbl_status.id INNER JOIN tbl_payment ON tbl_cart.idpayment = tbl_payment.id WHERE tbl_cart.idstatus = $a ");
    }
    else if($a == 2){
        $sqlListOrder = mysqli_query($conn,"SELECT * FROM `tbl_cart` WHERE idstatus = $a ");
    }else if($a == 3){
        $sqlListOrder = mysqli_query($conn,"SELECT * FROM `tbl_cart` WHERE idstatus = $a ");
    }else if($a == 4){
        $sqlListOrder = mysqli_query($conn,"SELECT * FROM `tbl_cart` WHERE idstatus = $a ");
    }
    return mysqli_num_rows($sqlListOrder);
}

// GET TOTAL ONLINE ORDER

function getTotal($conn, $a, $b){
    $total = 0;
    if($a == 0){
        $money = mysqli_query($conn, "SELECT * FROM tbl_cart WHERE idstatus = 3 AND agentId = $b");
        while ($row = mysqli_fetch_array($money)) {
            $total += $row['total'];
        }
    }else if($a == 1){ //GET TOTAL THIS MONTH
        $money_month = mysqli_query($conn, "SELECT * FROM `tbl_cart` WHERE MONTH(time) = MONTH(now()) AND idstatus = 3 AND agentId = $b");
        while ($row_month = mysqli_fetch_array($money_month)) {
            $total += $row_month['total'];
        }
    }else if($a == 2){ //GET TOTAL LAST MONTH
        $money_last_month = mysqli_query($conn, "SELECT * FROM `tbl_cart` WHERE MONTH(time) = MONTH(DATE_SUB(now(), INTERVAL 1 MONTH)) AND idstatus = 3 AND agentId = $b");
        while ($row_last_month = mysqli_fetch_array($money_last_month)) {
            $total += $row_last_month['total'];
        }
    }else if($a == 4){
        $money_today = mysqli_query($conn, "SELECT * FROM `tbl_cart` WHERE DATE(time) = DATE(now()) AND idstatus = 3 AND agentId = $b");
        while ($row_today = mysqli_fetch_array($money_today)) {
            $total += $row_today['total'];
        }
    }
    return $total;
}


// GET TOTAL WEEK
function getTWeek($conn, $a) {
    $total = 0;
    if($a == 1){
        $money_this_week = mysqli_query($conn, "SELECT * FROM tbl_cart WHERE time BETWEEN CURDATE() - INTERVAL WEEKDAY(CURDATE()) DAY AND CURDATE() + INTERVAL (6 - WEEKDAY(CURDATE())) DAY AND idstatus = 3");
        while ($row_this_week = mysqli_fetch_array($money_this_week)) {
            $total += $row_this_week['total'];
        }
    }else if($a == 2){
        $money_last_week = mysqli_query($conn, "SELECT * FROM tbl_cart WHERE time BETWEEN CURDATE() - INTERVAL WEEKDAY(CURDATE()) + 1 DAY - INTERVAL 1 WEEK AND CURDATE() - INTERVAL WEEKDAY(CURDATE()) DAY - INTERVAL 1 WEEK AND idstatus = 3");
        while ($row_last_week = mysqli_fetch_array($money_last_week)) {
            $total += $row_last_week['total'];
        }
    }
    return $total;
}
// GET TOTAL DAY IN WEEK
function getTotalWeek($conn,$a,$b){
    $total = 0;
    if($a == 1){
        $money_last_week = mysqli_query($conn, "SELECT * FROM tbl_cart WHERE DAYOFWEEK(time) = $b AND WEEK(time) = WEEK(CURDATE()) - 1 AND idstatus = 3");
        while ($row_last_week = mysqli_fetch_array($money_last_week)) {
            $total += $row_last_week['total'];
        }
    }else if($a == 2){
        $money_this_week = mysqli_query($conn, "SELECT * FROM tbl_cart WHERE DAYOFWEEK(time) = $b AND WEEK(time) = WEEK(CURDATE()) AND idstatus = 3");
        while ($row_this_week = mysqli_fetch_array($money_this_week)) {
            $total += $row_this_week['total'];
        }
    }

    return $total;
}
// GET TOTAL MONTH IN YEAR
function getTotalMonth($conn, $a, $b) {
    $total = 0;
    $moneyMonth= mysqli_query($conn, "SELECT * FROM tbl_cart WHERE MONTH(time) = $a AND idstatus = 3 AND agentId = $b");
    while ($row = mysqli_fetch_array($moneyMonth)) {
        $total += $row['total'];
    }
    return $total;
}
// GET COUNT ORDER ONLINE
function getCountOrderOnline($conn,$a){
    $count = 0;
    if($a == 0){
        $slq_car = mysqli_query($conn,"SELECT * FROM tbl_cart");
        $count =  mysqli_num_rows($slq_car);
    }
    return $count;
}

// GET DETAIL PRODUCT
function getDetailProduct($conn, $a){
    $query = mysqli_query($conn,"SELECT * FROM tbl_versions WHERE idVersion = $a");
    $info = mysqli_fetch_assoc( $query);
    return $info;
}

// GET LIST PRODUCT INVOICE
function getListProductInvoice($conn, $a) {
    $getListProductInvoice = mysqli_query($conn,"SELECT * FROM tbl_detailcart INNER JOIN tbl_versions ON  tbl_detailcart.versionId = tbl_versions.idVersion INNER JOIN tbl_products ON tbl_products.id = tbl_versions.productId WHERE cartId = $a");
    return  $getListProductInvoice;
}

/*==============================DASHBOARD============================== */
// COUNT LIST INVOICE 
function countListInvoice($conn,$a){
    $countListInvoice = mysqli_query($conn,"SELECT * FROM `tbl_cart` WHERE agentId = $a");
    return mysqli_num_rows($countListInvoice);
}
function getProdAgent($conn,$a){
    $countProdAgent = mysqli_query($conn,"SELECT * FROM tbl_versions");
    return mysqli_num_rows($countProdAgent);
}
function getTotalAgent($conn,$a){
    $total = 0;
    $TotalAgent = mysqli_query($conn,"SELECT * FROM `tbl_cart` WHERE agentId = $a");
    while($item = mysqli_fetch_assoc($TotalAgent)){
        $total += $item['total'];
    }
    return $total;
}

?>