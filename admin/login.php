<?php
    session_start();

    require_once("../config/config.php");
    if(isset($_SESSION['admin_name'])){
        header("location: index.php");
    }

    if(isset($_POST['btn_login'])){
        $user = $_POST['username'];
        $pass = $_POST['password'];
        $password = md5($pass);
        $sqlUser = mysqli_query($conn,"SELECT * FROM tbl_users WHERE username = '$user'");
        $infoUser = mysqli_fetch_assoc($sqlUser);
        $permission = $infoUser['permission'];
        if($permission == 1){
            $login = "SELECT * FROM tbl_users WHERE username = '$user' AND password = '$password' AND  permission = '1'";
            $querry = mysqli_query($conn, $login);
            $num_rows_login = mysqli_num_rows($querry);

            // $to      = 'lehuydau2312@gmail.com';
            // $subject = 'the subject';
            // $message = 'hello';
            // $headers = 'From: webmaster@example.com'       . "\r\n" .
            //             'Reply-To: webmaster@example.com' . "\r\n" .
            //             'X-Mailer: PHP/' . phpversion();

            // mail($to, $subject, $message, $headers);
            
            if($num_rows_login == 0){
                $error1 = 'Account';
                $error2 = 'Not';
                $error3 = 'Exist';
                $error4 = "!";
            }else{
                while($data = mysqli_fetch_array($querry)){
                    $_SESSION['admin_id'] = $data['Id'];
                    $_SESSION['admin_user'] = $data['username'];
                    $_SESSION['admin_pass'] = $data['password'];
                    $_SESSION['admin_mail'] = $data['gmail'];
                    $_SESSION['admin_name'] = $data['fullname'];
                    $_SESSION['admin_phone'] = $data['phone'];
                    $_SESSION['permission'] = $data['permission'];
                }
                // echo "<script>window.location = 'categories/categories.php'</script>";     
            }
        }else{
            $login = "SELECT * FROM tbl_users WHERE username = '$user' AND password = '$password' AND permission = '2'";
            $querry = mysqli_query($conn, $login);
            $num_rows_login = mysqli_num_rows($querry);

            // $to      = 'lehuydau2312@gmail.com';
            // $subject = 'the subject';
            // $message = 'hello';
            // $headers = 'From: webmaster@example.com'       . "\r\n" .
            //             'Reply-To: webmaster@example.com' . "\r\n" .
            //             'X-Mailer: PHP/' . phpversion();

            // mail($to, $subject, $message, $headers);
            
            if($num_rows_login == 0){
                $error1 = 'Account';
                $error2 = 'Not';
                $error3 = 'Exist';
                $error4 = "!";
            }else{
                while($data = mysqli_fetch_array($querry)){
                    $_SESSION['admin_id'] = $data['Id'];
                    $_SESSION['admin_user'] = $data['username'];
                    $_SESSION['admin_pass'] = $data['password'];
                    $_SESSION['admin_mail'] = $data['gmail'];
                    $_SESSION['admin_name'] = $data['fullname'];
                    $_SESSION['admin_phone'] = $data['phone'];
                    $_SESSION['permission'] = $data['permission'];
                }
                // echo "<script>window.location = 'categories/categories.php'</script>";     
            }
        }
        
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>TECHNOLOGY PRODUCTS MANAGER SYSTEM</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
        <meta content="Coderthemes" name="author">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="shortcut icon" href="../assets/images/logo/favicon.ico">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <link href="assets\css\bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets\css\icons.min.css" rel="stylesheet" type="text/css">
        <link href="assets\css\app.min.css" rel="stylesheet" type="text/css">
        <link href="assets\scss\admin.css" rel="stylesheet" type="text/css">
    </head>

    <body class="authentication-bg authentication-bg-pattern">

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card">

                            <div class="card-body p-4">
                                
                                <div class="text-center w-75 m-auto">
                                    <a href="login.php">
                                        <span><img src="../assets/images/logo/favicon.ico" alt=""><h3 style="color: #009a82;">TPMS</h3></span>
                                    </a>
                                </div>

                                <h5 class="auth-title">SIGN IN</h5>
                                <?php
                                    if(isset($error1) && isset($error2) && isset($error3) && isset($error4)){
                                        ?>
                                            <div class="waviy">
                                                <span style="--i:1"><?php echo $error1; ?></span>
                                                <span style="--i:2"><?php echo $error2; ?></span>
                                                <span style="--i:3"><?php echo $error3; ?></span>
                                                <span style="--i:4"><?php echo $error4; ?></span>
                                            </div>

                                        <?php
                                    }
                                ?>
                                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">

                                    <div class="form-group mb-3">
                                        <label for="emailaddress">Username: </label>
                                        <input class="form-control" name="username" type="email" id="emailaddress" required="" placeholder="Enter Your Username">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="password">Password</label>
                                        <input class="form-control" name="password" type="password" required="" id="password" placeholder="Enter Your Password">
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="custom-control custom-checkbox checkbox-info">
                                            <input type="checkbox" class="custom-control-input" id="checkbox-signin" checked>
                                            <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                                        </div>
                                    </div>

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-danger btn-block" name="btn_login" type="submit" id="toastr-three">Sign In</button>
                                    </div>

                                </form>
                                <div class="text-center">
                                    <h5 class="mt-3 text-muted">Sign in with</h5>
                                    <ul class="social-list list-inline mt-3 mb-0">
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i class="mdi mdi-facebook"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="mdi mdi-google"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="mdi mdi-twitter"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i class="mdi mdi-github-circle"></i></a>
                                        </li>
                                    </ul>
                                </div>

                            </div> 
                        </div>
                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p> <a href="pages-recoverpw.html" class="text-muted ml-1">Forgot your password?</a></p>
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
        <script src="assets\libs\jquery-toast\jquery.toast.min.js"></script>
        <script src="assets\js\pages\toastr.init.js"></script>
        <script src="assets\js\app.min.js"></script>
        
    </body>
</html>