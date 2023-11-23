<?php

    require_once("../../config/config.php");

    $id = $_GET['id'];
    $delete = "DELETE FROM tbl_products WHERE id = $id";
    $query_deltete = mysqli_query($conn, $delete);
    if(
        $query_deltete
    ){
        echo "<script>window.alert('Successfully!');window.location.href = 'products.php'</script>";
    }else{
        echo "<script>window.alert('Error!');window.location.href = 'products.php'</script>";
    }
    
?>