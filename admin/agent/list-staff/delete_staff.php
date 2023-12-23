<?php
    require_once("../../../config/config.php");

    $id = $_GET['id'];
    $delete = "DELETE FROM tbl_staff WHERE id = $id";
    $query_deltete = mysqli_query($conn, $delete);
    if(
        $query_deltete
    ){
        echo "<script>window.alert('Successfully!');window.location.href = 'list-staff.php'</script>";
    }else{
        echo "<script>window.alert('Error!');window.location.href = 'list-staff.php'</script>";
    }
    
?>