<?php
require_once("config/config.php");
include 'handle.php';

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $newpassword = md5($password);

    $sqlUser = mysqli_query($conn,"SELECT * FROM tbl_customer WHERE username = '$username' AND password = '$newpassword'");
    if(mysqli_num_rows($sqlUser) == 0){
        $error1 = 'Tài';
        $error2 = 'khoản';
        $error3 = 'không';
        $error4 = "tồn";
        $error5 = "tại";
        $error6 = "!";
    }else{
        while($data = mysqli_fetch_array($sqlUser)){
            $_SESSION['userId'] = $data['id'];
        }
        echo "<script>window.location.href = 'index.php'</script>";
    }
}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="author" content="tpms.com">
    <meta property='og:site_name' content='tpms.com' />
    <title>TPMS - ĐĂNG NHẬP HỆ THỐNG</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/logo/favicon.ico" />
    <link rel="preload" href="assets/fonts/SegoeUI/SegoeUI.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="assets/fonts/SegoeUI/SegoeUIItalic.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="assets/fonts/SegoeUI/SegoeUIBold.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="assets/fonts/SegoeUI/SegoeUIBoldItalic.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="assets/fonts/SegoeUI/SegoeUISemilight.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="assets/fonts/SegoeUI/SegoeUISemilightItalic.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="assets/fonts/SegoeUI/hoangha.woff" as="font" type="font/woff" crossorigin>
    <link rel="preload" as="script" href="assets/js/main.js">
    <link rel="preload" as="style" href="assets/css/main.css">
    <link href="assets/css/main.css" rel="stylesheet" type="text/css">
    <!-- Slick Slide -->
    <link rel="stylesheet" type="text/css" href="assets/slick/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="assets/slick/slick/slick-theme.css" />
     <link rel="stylesheet" href="assets/fontawesome/css/all.min.css">
    <meta property="og:image" content="assets/images/logo/logo.png" />
    <script async src="assets/js/ins.js"></script>
</head>
<body>
    <?php  include 'header.php';  ?>
    <div class="jquery-modal blocker current">
        <div class="container modal" style="display: inline-block;">
            <div class="login-form">
                <div class="login-bg">
                    <img src="assets/images/bg/login-bg.png">
                </div>
                <div class="form">
                    <h1>Đăng nhập</h1>
                    <div class="external">
                        <form method="post" action="">
                            <button class="btn-extlogin btn-facebook" title="Đăng nhập qua Facebook" type="submit" id="Facebook" name="provider" value="Facebook"><img src="assets/images/bg/login-facebook.png"> Tiếp tục với Facebook</button>
                            <button class="btn-extlogin btn-google" type="submit" title="Đăng nhập qua Google+" id="Google" name="provider" value="Google"><img src="assets/images/bg/login-google.png"> Đăng nhập với Google</button>
                        </form>
                    </div>

                    <div class="split">
                        <p>Hoặc</p>
                    </div>
                    <?php
                        if(isset($error1) && isset($error2) && isset($error3) && isset($error4)){
                            ?>
                                <div class="waviy">
                                    <span style="--i:1"><?php echo $error1; ?></span>
                                    <span style="--i:2"><?php echo $error2; ?></span>
                                    <span style="--i:3"><?php echo $error3; ?></span>
                                    <span style="--i:4"><?php echo $error4; ?></span>
                                    <span style="--i:5"><?php echo $error5; ?></span>
                                    <span style="--i:6"><?php echo $error6; ?></span>
                                </div>

                            <?php
                        }
                    ?>

                    <div class="internal">
                        <form method="POST" action="dang-nhap.php">
                            <div class="row">
                                <div class="label">Tài khoản</div>
                                <div class="input">
                                    <input type="text" name="username" id="UserName" placeholder="Tài Khoản ...">
                                </div>
                            </div>

                            <div class="row">
                                <div class="label">Mật khẩu</div>
                                <div class="input">
                                    <input type="password" name="password" id="password" placeholder="Mật Khẩu ...">
                                </div>
                            </div>

                            <div class="row">
                                <label class="checkbox-ctn">Ghi nhớ
                                    <input type="checkbox" name="" value="" checked> 
                                    <span class="checkmark"></span>
                                </label>
                            </div>

                            <div class="row">
                                <div class="button-group">
                                    <button class="btn btn-submit" type="submit" name="login">ĐĂNG NHẬP</button>
                                    <a class="btn btn-link ajax-content" href="dang-ki.php">ĐĂNG KÝ</a>
                                </div>
                            </div>

                            <div class="row">
                                <p class="forgotpass"><a class="ajax-content" href="">Quên mật khẩu?</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php include 'footer.php' ?>
</body>
</html>