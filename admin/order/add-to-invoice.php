<?php
    require_once("../../config/config.php");
    if(isset($_GET['cartId']) && isset($_GET['prodId']) && isset($_GET['quantity'])){
        $cardId = $_GET['cartId'];
        $prodId = $_GET['prodId'];
        $quantity = $_GET['quantity'];
        $idAgent = $_GET['agentId'];
        $sqlWarehouse = mysqli_query($conn,"SELECT * FROM tbl_warehouse INNER JOIN tbl_users ON tbl_warehouse.agentId = tbl_users.Id  WHERE versionId =  $prodId AND agentId = $idAgent");
        $infoWarehouse = mysqli_fetch_assoc($sqlWarehouse);
        $quantityOld =  $infoWarehouse['quantity'];
        if( $quantityOld >= 1){
            $newQuantity = $quantity + 1;
            $newQuantityWareHouse = $quantityOld - 1;
            $updateWareHouse = mysqli_query($conn,"UPDATE `tbl_warehouse` SET `quantity`='$newQuantityWareHouse' WHERE versionId =  $prodId AND agentId = $idAgent");
            $sqlDetailCart = mysqli_query($conn,"UPDATE `tbl_detailcart` SET `quantity`='$newQuantity' WHERE cartId = $cardId AND versionId = $prodId");
            if($updateWareHouse && $sqlDetailCart){
                header("Location: create-new-order.php");
            }
        }else{
            echo "<script>window.alert('Product is not enough!');window.location='create-new-order.php'</script>";
        }
        
    }
?>