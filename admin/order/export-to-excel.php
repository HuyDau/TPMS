<?php
    require_once("../../config/config.php");
    $agentId = $_GET['agentId'];
    function filterData(&$str){ 
        $str = preg_replace("/\t/", "\\t", $str); 
        $str = preg_replace("/\r?\n/", "\\n", $str); 
        if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"'; 
    }

    // Excel file name for download 
    $fileName = "Order" . ".xls"; 
    
    $fields = array('ID','NAME','PHONE','TOTAL');

    $excelData = implode("\t", array_values($fields)) . "\n";

    $query = mysqli_query($conn,"SELECT * FROM `tbl_cart` WHERE idtype = 2 AND agentId = $agentId ORDER BY `id` ASC"); 
    if($query->num_rows > 0){
        while($row = $query->fetch_assoc()){
            $lineData = array($row['id'], $row['name'], $row['phone'],$row['total']); 
            array_walk($lineData, 'filterData'); 
            $excelData .= implode("\t", array_values($lineData)) . "\n"; 
        }
    }else{
        $excelData .= 'No records found...'. "\n"; 
    }

    header("Content-Type: application/vnd.ms-excel"); 
    header("Content-Disposition: attachment; filename=\"$fileName\""); 
    
    // Render excel data 
    echo $excelData; 
    
    exit;
?>