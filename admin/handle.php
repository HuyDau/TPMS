<?php
session_start();

// GET CART
function getOnlineOrder($conn,$a){
    if($a == 0){
        $sqlOnlineOrder = mysqli_query($conn, "SELECT * FROM `tbl_cart` INNER JOIN tbl_status ON tbl_cart.idstatus = tbl_status.id INNER JOIN tbl_payment ON tbl_cart.idpayment = tbl_payment.id INNER JOIN tbl_detailcart ON tbl_cart.id = tbl_detailcart.cartId");
    }else if($a == 1){
        $sqlOnlineOrder = mysqli_query($conn, "SELECT * FROM `tbl_cart` INNER JOIN tbl_status ON tbl_cart.idstatus = tbl_status.id INNER JOIN tbl_payment ON tbl_cart.idpayment = tbl_payment.id INNER JOIN tbl_detailcart ON tbl_cart.id = tbl_detailcart.cartId WHERE tbl_cart.idstatus = $a");
    }else if($a == 2){
        $sqlOnlineOrder = mysqli_query($conn, "SELECT * FROM `tbl_cart` INNER JOIN tbl_status ON tbl_cart.idstatus = tbl_status.id INNER JOIN tbl_payment ON tbl_cart.idpayment = tbl_payment.id INNER JOIN tbl_detailcart ON tbl_cart.id = tbl_detailcart.cartId WHERE tbl_cart.idstatus = $a");
    }else if($a == 3){
        $sqlOnlineOrder = mysqli_query($conn, "SELECT * FROM `tbl_cart` INNER JOIN tbl_status ON tbl_cart.idstatus = tbl_status.id INNER JOIN tbl_payment ON tbl_cart.idpayment = tbl_payment.id INNER JOIN tbl_detailcart ON tbl_cart.id = tbl_detailcart.cartId WHERE tbl_cart.idstatus = $a");
    }else if($a == 4){
        $sqlOnlineOrder = mysqli_query($conn, "SELECT * FROM `tbl_cart` INNER JOIN tbl_status ON tbl_cart.idstatus = tbl_status.id INNER JOIN tbl_payment ON tbl_cart.idpayment = tbl_payment.id INNER JOIN tbl_detailcart ON tbl_cart.id = tbl_detailcart.cartId WHERE tbl_cart.idstatus = $a");
    }
    return $sqlOnlineOrder;
}

// COUNT LIST ORDER 
function countListOrder($conn,$a){
    if($a == 0){
        $sqlListOrder = mysqli_query($conn,"SELECT * FROM `tbl_cart` ");
    }else if($a == 2){
        $sqlListOrder = mysqli_query($conn,"SELECT * FROM `tbl_cart` WHERE idstatus = $a ");
    }else if($a == 3){
        $sqlListOrder = mysqli_query($conn,"SELECT * FROM `tbl_cart` WHERE idstatus = $a ");
    }else if($a == 4){
        $sqlListOrder = mysqli_query($conn,"SELECT * FROM `tbl_cart` WHERE idstatus = $a ");
    }
    return mysqli_num_rows($sqlListOrder);
}

// GET TOTAL ONLINE ORDER

function getTotal($conn, $a){
    $total = 0;
    if($a == 0){
        $money = mysqli_query($conn, "SELECT * FROM tbl_cart WHERE idstatus = 3");
        while ($row = mysqli_fetch_array($money)) {
            $total += $row['total'];
        }
    }else if($a == 1){ //GET TOTAL THIS MONTH
        $money_month = mysqli_query($conn, "SELECT * FROM `tbl_cart` WHERE MONTH(time) = MONTH(now()) AND idstatus = 3");
        while ($row_month = mysqli_fetch_array($money_month)) {
            $total += $row_month['total'];
        }
    }else if($a == 2){ //GET TOTAL LAST MONTH
        $money_last_month = mysqli_query($conn, "SELECT * FROM `tbl_cart` WHERE MONTH(time) = MONTH(DATE_SUB(now(), INTERVAL 1 MONTH)) AND idstatus = 3");
        while ($row_last_month = mysqli_fetch_array($money_last_month)) {
            $total += $row_last_month['total'];
        }
    }else if($a == 4){
        $money_today = mysqli_query($conn, "SELECT * FROM `tbl_cart` WHERE DATE(time) = DATE(now()) AND idstatus = 3");
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
function getTotalMonth($conn, $a) {
    $total = 0;
    $moneyMonth= mysqli_query($conn, "SELECT * FROM tbl_cart WHERE MONTH(time) = $a AND idstatus = 3");
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


?>