<?php
session_start();

// GET CART
function getOnlineOrder($conn){
    $sqlOnlineOrder = mysqli_query($conn, "SELECT * FROM `tbl_cart` INNER JOIN tbl_status ON tbl_cart.idstatus = tbl_status.id INNER JOIN tbl_payment ON tbl_cart.idpayment = tbl_payment.id INNER JOIN tbl_detailcart ON tbl_cart.id = tbl_detailcart.cartId WHERE tbl_cart.idstatus = 1 OR tbl_cart.idstatus = 2;");
    return $sqlOnlineOrder;
}

?>