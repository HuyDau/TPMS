<?php
    session_start();

    require_once("../config/config.php");
    if(isset($_SESSION['user_admin'])){
        header("location: index.php");
    }

    if(isset($_POST['btn_login'])){
        $user = $_POST['username'];
        $pass = $_POST['password'];

       

        $user = strip_tags($user);
        $user = addslashes($user);

        $pass = strip_tags($pass);
        $pass = addslashes($pass);
        $password = md5($pass);
        $login = "SELECT * FROM user WHERE username = '$user' AND password = '$password' AND  permission = '1'";
        $querry = mysqli_query($conn, $login);
        $num_rows_login = mysqli_num_rows($querry);
        if($num_rows_login == 0){
            echo "<script>window.alert('Username or password incorrect !');</script>";
        }else{
            while($data = mysqli_fetch_array($querry)){
                $_SESSION['user_id'] = $data['id'];
                $_SESSION['user_admin'] = $data['username'];
                $_SESSION['pass_admin'] = $data['password'];
                $_SESSION['email_admin'] = $data['email'];
                $_SESSION['fullname_admin'] = $data['fullname'];
                $_SESSION['sdt_admin'] = $data['sdt'];
            }
            echo "<script>window.alert('System login successful !');window.location = 'index.php'</script>";

           
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Cake Bakery - Đăng nhập hệ thống</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
        <meta content="Coderthemes" name="author">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets\images\fav-icon.png">

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- App css -->
        <link href="assets\css\bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets\css\icons.min.css" rel="stylesheet" type="text/css">
        <link href="assets\css\app.min.css" rel="stylesheet" type="text/css">

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
                                        <span><img src="assets/images/logo/avt.png" alt="" height="26"></span>
                                    </a>
                                </div>

                                <h5 class="auth-title">ĐĂNG NHẬP</h5>

                                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">

                                    <div class="form-group mb-3">
                                        <label for="emailaddress">Username: </label>
                                        <input class="form-control" name="username" type="email" id="emailaddress" required="" placeholder="Enter your email">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="password">Password</label>
                                        <input class="form-control" name="password" type="password" required="" id="password" placeholder="Enter your password">
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="custom-control custom-checkbox checkbox-info">
                                            <input type="checkbox" class="custom-control-input" id="checkbox-signin">
                                            <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                                        </div>
                                    </div>

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-danger btn-block" name="btn_login" type="submit" id="toastr-three">Đăng nhập</button>
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

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p> <a href="pages-recoverpw.html" class="text-muted ml-1">Forgot your password?</a></p>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->


        <footer class="footer footer-alt">
            2023 &copy; Design by <a href="" class="text-muted">Le Huy Dau</a> 
        </footer>

        <!-- Vendor js -->
        <script src="assets\js\vendor.min.js"></script>
        <!-- Tost-->
        <script src="assets\libs\jquery-toast\jquery.toast.min.js"></script>

        <!-- toastr init js-->
        <script src="assets\js\pages\toastr.init.js"></script>
        <!-- App js -->
        <script src="assets\js\app.min.js"></script>
        
    </body>
</html>