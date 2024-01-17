<?php
require_once("../config/config.php");
include 'handle.php';
if (!isset($_SESSION['admin_id']) && !isset($_SESSION['permission']) && $_SESSION['permission'] != 1) {
    header("location: login.php");
}
// $sql_customer = mysqli_query($conn, "SELECT * FROM user WHERE permission = 2");
// $count_customer = mysqli_num_rows($sql_customer);

// $sql_product = mysqli_query($conn, "SELECT * FROM product");
// $count_product = mysqli_num_rows($sql_product);

// $sql_order = mysqli_query($conn, "SELECT * FROM cart WHERE id_status = 3 OR id_status = 2 OR id_status = 1 ");
// $count_order = mysqli_num_rows($sql_order);

// $money = mysqli_query($conn, "SELECT * FROM cart WHERE id_status = 3");
// $total = 0;
// while ($row = mysqli_fetch_array($money)) {
//     $total += $row['total'];
// }



// $money_month = mysqli_query($conn, "SELECT * FROM `cart` WHERE MONTH(time) = MONTH(now()) AND id_status = 3");
// $total_month = 0;
// while ($row_month = mysqli_fetch_array($money_month)) {
//     $total_month += $row_month['total'];
// }

// $money_last_month = mysqli_query($conn, "SELECT * FROM `cart` WHERE MONTH(time) = MONTH(DATE_SUB(now(), INTERVAL 1 MONTH)) AND id_status = 3");
// $total_last_month = 0;
// while ($row_last_month = mysqli_fetch_array($money_last_month)) {
//     $total_last_month += $row_last_month['total'];
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>TPMS -DASHBOARD</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="Coderthemes" name="author">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="../assets/images/logo/favicon.ico">

    <!-- third party css -->
    <link href="assets\libs\datatables\dataTables.bootstrap4.css" rel="stylesheet" type="text/css">
    <link href="assets\libs\datatables\responsive.bootstrap4.css" rel="stylesheet" type="text/css">
    <!-- third party css end -->

    <!-- App css -->
    <link href="assets\css\bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets\css\icons.min.css" rel="stylesheet" type="text/css">
    <link href="assets\css\app.min.css" rel="stylesheet" type="text/css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
    
</head>

<body>
    <div id="wrapper">
        <?php 
            include 'navbar-custom.php';
            include 'left-menu.php' ;
            include 'dashboard/dashboard.php' ;
        ?>
    </div>
    <div class="rightbar-overlay"></div>
    <script>
    let myChart = document.getElementById('myChart').getContext('2d');
    // Global Options
    Chart.defaults.global.defaultFontFamily = 'Lato';
    Chart.defaults.global.defaultFontSize = 18;
    Chart.defaults.global.defaultFontColor = '#777';

    let massPopChart = new Chart(myChart, {
      type:'bar', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
      data:{
        labels:['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets:[{
          label:'Total revenue',
          data:[
            <?php
              if(isset($_SESSION['admin_id']) && $_SESSION['admin_id'] == 1){
                ?>
                  <?=getTotalMonthInYearAllSystem($conn,1)?>,
                  <?=getTotalMonthInYearAllSystem($conn,2)?>,
                  <?=getTotalMonthInYearAllSystem($conn,3)?>,
                  <?=getTotalMonthInYearAllSystem($conn,4)?>,
                  <?=getTotalMonthInYearAllSystem($conn,5)?>,
                  <?=getTotalMonthInYearAllSystem($conn,6)?>,
                  <?=getTotalMonthInYearAllSystem($conn,7)?>,
                  <?=getTotalMonthInYearAllSystem($conn,8)?>,
                  <?=getTotalMonthInYearAllSystem($conn,9)?>,
                  <?=getTotalMonthInYearAllSystem($conn,10)?>,
                  <?=getTotalMonthInYearAllSystem($conn,11)?>,
                  <?=getTotalMonthInYearAllSystem($conn,12)?>,
                <?php
              }else{
                ?>
                  <?=getTotalMonth($conn,1,$_SESSION['admin_id'])?>,
                  <?=getTotalMonth($conn,2,$_SESSION['admin_id'])?>,
                  <?=getTotalMonth($conn,3,$_SESSION['admin_id'])?>,
                  <?=getTotalMonth($conn,4,$_SESSION['admin_id'])?>,
                  <?=getTotalMonth($conn,5,$_SESSION['admin_id'])?>,
                  <?=getTotalMonth($conn,6,$_SESSION['admin_id'])?>,
                  <?=getTotalMonth($conn,7,$_SESSION['admin_id'])?>,
                  <?=getTotalMonth($conn,8,$_SESSION['admin_id'])?>,
                  <?=getTotalMonth($conn,9,$_SESSION['admin_id'])?>,
                  <?=getTotalMonth($conn,10,$_SESSION['admin_id'])?>,
                  <?=getTotalMonth($conn,11,$_SESSION['admin_id'])?>,
                  <?=getTotalMonth($conn,12,$_SESSION['admin_id'])?>,
                <?php
              }
            ?>
            
          ],
          backgroundColor:[
            'rgba(255, 99, 132, 0.6)',
            'rgba(255, 99, 132, 0.6)',
            'rgba(255, 99, 132, 0.6)',
            'rgba(255, 99, 132, 0.6)',
            'rgba(255, 99, 132, 0.6)',
            'rgba(255, 99, 132, 0.6)',
            'rgba(255, 99, 132, 0.6)',
            'rgba(255, 99, 132, 0.6)',
            'rgba(255, 99, 132, 0.6)',
            'rgba(255, 99, 132, 0.6)',
            'rgba(255, 99, 132, 0.6)',
            'rgba(255, 99, 132, 0.6)',
          ],
          borderWidth:1,
          borderColor:'#777',
          hoverBorderWidth:3,
          hoverBorderColor:'#000'
        }]
      },
      options:{
        title:{
          display:true,
          text:'Chart of revenue analysis by months',
          fontSize:25
        },
        legend:{
          display:true,
          position:'right',
          labels:{
            fontColor:'#000'
          }
        },
        layout:{
          padding:{
            left:50,
            right:0,
            bottom:0,
            top:0
          }
        },
        tooltips:{
          enabled:true
        }
      }
    });
  </script>
  <script src="assets\js\vendor.min.js"></script>
  <script src="assets\libs\jquery-knob\jquery.knob.min.js"></script>
  <script src="assets\libs\peity\jquery.peity.min.js"></script>
  <script src="assets\libs\apexcharts\apexcharts.min.js"></script>
  <script src="assets\libs\datatables\jquery.dataTables.min.js"></script>
  <script src="assets\libs\datatables\dataTables.bootstrap4.js"></script>
  <script src="assets\libs\datatables\dataTables.responsive.min.js"></script>
  <script src="assets\libs\datatables\responsive.bootstrap4.min.js"></script>
  <script src="assets\js\pages\dashboard-2.init.js"></script>
  <script src="assets\js\app.min.js"></script>

</body>

</html>