<?php 
    session_start();
    if(isset($_SESSION['admin_id'])){
        unset($_SESSION['admin_id']);
    }
    if(isset($_SESSION['admin_user'])){
    }
    if(isset($_SESSION['admin_pass'])){
        unset($_SESSION['admin_pass']);
    }
    if(isset($_SESSION['admin_mail'])){
        unset($_SESSION['admin_mail']);
    }
    if(isset($_SESSION['admin_name'])){
        unset($_SESSION['admin_name']);
        unset($_SESSION['admin_phone']);
        unset($_SESSION['permission']);
    }
    if(isset($_SESSION['admin_phone'])){
        unset($_SESSION['admin_phone']);
    }
    if(isset($_SESSION['permission'])){
        unset($_SESSION['permission']);
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>TPMS - Log Out</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
        <meta content="Coderthemes" name="author">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
       
        <link rel="shortcut icon" href="../assets/images/logo/favicon.ico">

        
        <link href="assets\css\bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets\css\icons.min.css" rel="stylesheet" type="text/css">
        <link href="assets\css\app.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="assets/css/style.css">
    </head>

    <body class="authentication-bg authentication-bg-pattern">

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card">

                            <div class="card-body p-4">
                            
                                <div class="text-center w-75 m-auto">
                                    <a href="index.html">
                                        <span><img src="assets\images\logo-2.png" alt="" height="26"></span>
                                    </a>
                                </div>

                                <div class="text-center">
                                    <div class="mt-4">
                                        <div class="logout-checkmark">
                                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 130.2 130.2">
                                                <circle class="path circle" fill="none" stroke="#4bd396" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1"></circle>
                                                <polyline class="path check" fill="none" stroke="#4bd396" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" points="100.2,40.2 51.5,88.8 29.8,67.5 "></polyline>
                                            </svg>
                                        </div>
                                    </div>

                                    <h3>See you again !</h3>

                                    <p class="text-muted font-13"> You have successfully signed out.. </p>
                                </div>

                            </div> 
        
                        </div>
                        

                        <div class="row">
                            <div class="col-12 text-center">
                                <p class="text-muted"><a href="login.php" class="text-muted ml-1"><b class="font-weight-semibold login-btn">LOGIN</b></a></p>
                            </div> 
                        </div>
                        
    
                    </div> 
                </div>
                
            </div>
            
        </div>
        <footer class="footer footer-alt">
            2023 &copy; Design by <a href="" class="text-muted">Le Huy Dau</a> 
        </footer>

        
        <script src="assets\js\vendor.min.js"></script>

        
        <script src="assets\js\app.min.js"></script>
        
    </body>
</html>