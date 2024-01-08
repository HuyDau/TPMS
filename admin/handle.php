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

?>