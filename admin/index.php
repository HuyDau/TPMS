<?php

require_once("../config/config.php");
include 'handle.php';
if (!isset($_SESSION['admin_id']) && !isset($_SESSION['permission']) && $_SESSION['permission'] != 1) {
    header("location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>TPMS - DASHBOARD</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="Coderthemes" name="author">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="../assets/images/logo/favicon.ico">
    <link href="assets\libs\jquery-vectormap\jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css">
    <link href="assets\css\bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets\css\icons.min.css" rel="stylesheet" type="text/css">
    <link href="assets\css\app.min.css" rel="stylesheet" type="text/css">
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

    <script src="assets\libs\peity\jquery.peity.min.js"></script>
    <script src="assets\libs\apexcharts\apexcharts.min.js"></script>
    <script src="assets\libs\jquery-vectormap\jquery-jvectormap-1.2.2.min.js"></script>
    <script src="assets\libs\jquery-vectormap\jquery-jvectormap-us-merc-en.js"></script>
    <script src="assets\js\pages\dashboard-1.init.js"></script>

    <script src="assets\js\app.min.js"></script>
    <script>
    var options={
        chart:{height:400,type:"bar",toolbar:{show:!1}},
        plotOptions:{bar:{columnWidth:"30%",endingShape:"rounded"}},
        dataLabels:{enabled:!1},
        stroke:{width:2},
        colors:["#f0643b"],
        series:[{name:"Growth",data:
        [
            <?=getTotalMonth($conn,1)?>,
            <?=getTotalMonth($conn,2)?>,
            <?=getTotalMonth($conn,3)?>,
            <?=getTotalMonth($conn,4)?>,
            <?=getTotalMonth($conn,5)?>,
            <?=getTotalMonth($conn,6)?>,
            <?=getTotalMonth($conn,7)?>,
            <?=getTotalMonth($conn,8)?>,
            <?=getTotalMonth($conn,9)?>,
            <?=getTotalMonth($conn,10)?>,
            <?=getTotalMonth($conn,11)?>,
            <?=getTotalMonth($conn,12)?>,
        ]
        }],
        grid:{borderColor:"#f1f3fa",padding:{right:0,bottom:0,left:0}},
        xaxis:{categories:["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],
        offsetX:0},
        yaxis:{title:{text:"Growth"}},
        fill:{type:"gradient",gradient:{shade:"light",type:"horizontal",shadeIntensity:.25,gradientToColors:void 0,inverseColors:!0,opacityFrom:.85,opacityTo:.85,stops:[50,0,100]}}
        };
        (   
            chart=new ApexCharts(document.querySelector("#rotate-labels-column"),options)).render();
            options={
                chart:{height:480,type:"line",zoom:{enabled:!1},toolbar:{show:!1}},
                colors:["#f0643b","#56c2d6"],dataLabels:{enabled:!0},
                stroke:{width:[3,3],curve:"smooth"},series:[{name:"Previus Week",
                data:[
                    <?=getTotalWeek($conn,1,2)?>,
                    <?=getTotalWeek($conn,1,3)?>,
                    <?=getTotalWeek($conn,1,4)?>,
                    <?=getTotalWeek($conn,1,5)?>,
                    <?=getTotalWeek($conn,1,6)?>,
                    <?=getTotalWeek($conn,1,7)?>,
                    <?=getTotalWeek($conn,1,1)?>,
                ]},
                {name:"Current Week",
                    data:[
                        <?=getTotalWeek($conn,2,2)?>,
                        <?=getTotalWeek($conn,2,3)?>,
                        <?=getTotalWeek($conn,2,4)?>,
                        <?=getTotalWeek($conn,2,5)?>,
                        <?=getTotalWeek($conn,2,6)?>,
                        <?=getTotalWeek($conn,2,7)?>,
                        <?=getTotalWeek($conn,2,1)?>,
                    ]}],
                    grid:{row:{colors:["transparent","transparent"],
                    opacity:.2
                },
                borderColor:"#f1f3fa"},
                markers:{style:"inverted",size:6},
                xaxis:{categories:["Mon","Tue","Wed","Thu","Fri","Sat","Sun"],
                
                title:{
                    
                    text:"This Week"}},
                yaxis:{title:{text:"Sales Analytics"},min:50,max:1000},
                legend:{position:"top",horizontalAlign:"right",floating:!0,offsetY:-25,offsetX:-5},
                responsive:[{breakpoint:600,options:{chart:{toolbar:{show:!1}},legend:{show:!1}}}]};
                (chart=new ApexCharts(document.querySelector("#apex-line-1"),options)).render();var chart;
                options={chart:{height:337,type:"radar",toolbar:{show:!1}},
                series:[{name:"Desktops",data:[80,50,30,40,100,20]},
                {name:"Tablets",data:[20,30,40,80,20,80]},
                {name:"Mobiles",data:[
                    30,
                    76,78,13,43,10
                ]}],
                stroke:{width:0,curve:"smooth"},
                fill:{opacity:.4},markers:{size:0},
                legend:{show:!0,offsetY:-10},
                colors:["#5089de","#56c2d6","#f0643b"],
                labels:["2011","2012","2013","2014","2015","2016"]};
                (chart=new ApexCharts(document.querySelector("#radar-multiple-series"),options)).render(),$("#usa-map").vectorMap({map:"us_merc_en",backgroundColor:"transparent",regionStyle:{initial:{fill:"#48525e"}},series:{regions:[{values:{"US-VA":"#a6d8d1","US-PA":"#a6d8d1","US-TN":"#a6d8d1","US-WY":"#a6d8d1","US-WA":"#a6d8d1","US-TX":"#a6d8d1"},
                attribute:"fill"}]}});    
    </script>
</body>

</html>