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

// $money_dec = mysqli_query($conn, "SELECT * FROM cart WHERE MONTH(time) = 12 AND id_status = 3");
// $total_dec = 0;
// while ($row_dec = mysqli_fetch_array($money_dec)) {
//     $total_dec += $row_dec['total'];
// }

// $money_nov = mysqli_query($conn, "SELECT * FROM cart WHERE MONTH(time) = 11 AND id_status = 3");
// $total_nov = 0;
// while ($row_nov = mysqli_fetch_array($money_nov)) {
//     $total_nov += $row_nov['total'];
// }

// $money_oct = mysqli_query($conn, "SELECT * FROM cart WHERE MONTH(time) = 10 AND id_status = 3");
// $total_oct = 0;
// while ($row_oct = mysqli_fetch_array($money_oct)) {
//     $total_oct += $row_oct['total'];
// }

// $money_sep = mysqli_query($conn, "SELECT * FROM cart WHERE MONTH(time) = 9 AND id_status = 3");
// $total_sep = 0;
// while ($row_sep = mysqli_fetch_array($money_sep)) {
//     $total_sep += $row_sep['total'];
// }

// $money_aug = mysqli_query($conn, "SELECT * FROM cart WHERE MONTH(time) = 8 AND id_status = 3");
// $total_aug = 0;
// while ($row_aug = mysqli_fetch_array($money_aug)) {
//     $total_aug += $row_aug['total'];
// }

// $money_jul = mysqli_query($conn, "SELECT * FROM cart WHERE MONTH(time) = 7 AND id_status = 3");
// $total_jul = 0;
// while ($row_jul = mysqli_fetch_array($money_jul)) {
//     $total_jul += $row_jul['total'];
// }

// $money_jun = mysqli_query($conn, "SELECT * FROM cart WHERE MONTH(time) = 6 AND id_status = 3");
// $total_jun = 0;
// while ($row_jun = mysqli_fetch_array($money_jun)) {
//     $total_jun += $row_jun['total'];
// }

// $money_may = mysqli_query($conn, "SELECT * FROM cart WHERE MONTH(time) = 5 AND id_status = 3");
// $total_may = 0;
// while ($row_may = mysqli_fetch_array($money_may)) {
//     $total_may += $row_may['total'];
// }
// $money_apr = mysqli_query($conn, "SELECT * FROM cart WHERE MONTH(time) = 4 AND id_status = 3");
// $total_apr = 0;
// while ($row_apr = mysqli_fetch_array($money_apr)) {
//     $total_apr += $row_apr['total'];
// }
// $money_mar = mysqli_query($conn, "SELECT * FROM cart WHERE MONTH(time) = 3 AND id_status = 3");
// $total_mar = 0;
// while ($row_mar = mysqli_fetch_array($money_mar)) {
//     $total_mar += $row_mar['total'];
// }
// $money_feb = mysqli_query($conn, "SELECT * FROM cart WHERE MONTH(time) = 2 AND id_status = 3");
// $total_feb = 0;
// while ($row_feb = mysqli_fetch_array($money_feb)) {
//     $total_feb += $row_feb['total'];
// }
// $money_jan = mysqli_query($conn, "SELECT * FROM cart WHERE MONTH(time) = 1 AND id_status = 3");
// $total_jan = 0;
// while ($row_jan = mysqli_fetch_array($money_jan)) {
//     $total_jan += $row_jan['total'];
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

</body>

</html>