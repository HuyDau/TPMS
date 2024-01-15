<?php
require_once("config/config.php");
include 'handle.php';
if(isset($_SESSION['add']))

if(isset($_POST['register'])){
    $username = $_POST['username'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $district = $_POST['district'];
    $ward = $_POST['ward'];
    $address = $_POST['address'];

    $sqlUsername = mysqli_query($conn,"SELECT * FROM tbl_customer WHERE username = '$username'");
    if($repassword != $password){
        $error = "Mật khẩu không trùng khớp !";
    }else if(mysqli_num_rows($sqlUsername) > 0){
        $error = "Tài khoản đăng kí đã tồn tại !";
    }else{
        $newpassword = md5($password);
        $addCustomer = mysqli_query($conn,"INSERT INTO `tbl_customer`(`id`, `username`, `password`, `name`, `email`, `phone`, `city`, `district`, `ward`, `address`) VALUES (NULL,'$username','$newpassword','$name','$email','$phone','$city','$district','$ward','$address')");
        $_SESSION['add'] = $addCustomer;
        if(isset($addCustomer)){
            $success = "Đăng kí tài khoản thành công";
        }
    }
}

?>
<!doctype html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="author" content="tpms.com">
    <meta property='og:site_name' content='tpms.com' />
    
    
    <title>TPMS - ĐĂNG KÍ</title>
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
                <?php
                    if(isset($success)){
                        ?>
                            <div class="form">
                                <div class="center" style="text-align:center;">
                                    <h2>Đăng ký tài khoản thành công</h2>
                                    <p>Cám ơn bạn đã đăng ký tài khoản tại website.</p>
                                    <p>Các hoạt động bạn có thể sử dụng sau khi đăng ký tài khoản</p>
                                </div>
                                <ol>
                                    <li><a href="dang-nhap.php">Đăng nhập tài khoản</a></li>
                                    <li><a href="/account">Về trang quản lý tài khoản</a></li>
                                    <li><a href="index.php">Quay trở về trang chủ</a></li>
                                </ol>
                            </div>
                        <?php
                    }else{
                        ?>
                            <div class="form">
                                <div class="center" style="text-align:center;">
                                    <h2>Đăng ký tài khoản</h2>
                                    <?php
                                        if(isset($error)){
                                            ?><div class="err-msg errors text-red" style="padding:10px;margin:10px 0;"><?=$error?><br></div><?php
                                        }else{
                                            ?><p>Chú ý các nội dung có dấu * bạn cần phải nhập</p><?php
                                        }
                                    ?>

                                </div>
                                <div id="registerForm" class="hh-form">
                                    <form method="POST" action="dang-ki.php">
                                        <div class="form-controls">
                                            <label>Tài khoản:</label>
                                            <div class="controls">
                                                <input type="text" name="username" id="UserName" placeholder="Tài khoản *"  required>
                                            </div>
                                        </div>
                                        <div class="form-controls">
                                            <label>Họ tên:</label>
                                            <div class="controls">
                                                <input type="text" name="name" id="Title" placeholder="Họ tên *"  required>
                                            </div>
                                        </div>
                                        <div class="form-controls">
                                            <label>Mật khẩu:</label>
                                            <div class="controls">
                                                <input type="text" name="password" id="PasswordHash" placeholder="Mật khẩu *"  required>
                                            </div>
                                        </div>
                                        <div class="form-controls">
                                            <label>Nhập lại mật khẩu:</label>
                                            <div class="controls">
                                                <input type="text" name="repassword" id="SecurityStamp" placeholder="Nhập lại mật khẩu *"  required>
                                            </div>
                                        </div>
                                        <div class="form-controls">
                                            <label>Email:</label>
                                            <div class="controls">
                                                <input type="text" name="email" id="Email" placeholder="Email *"  required>
                                            </div>
                                        </div>
                                        <div class="form-controls">
                                            <label>Điện thoại:</label>
                                            <div class="controls">
                                                <input type="tel" name="phone" id="PhoneNumber" placeholder="Điện thoại *"  required>
                                            </div>
                                        </div>
                                        <div class="form-controls">
                                            <label>Tỉnh/Thành phố:</label>
                                            <div class="controls">
                                                <select id="city" name="city" placeholder="Tỉnh/Thành phố" required>
                                                    <option value="" selected>Chọn tỉnh thành</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-controls">
                                            <label>Quận/Huyện:</label>
                                            <div class="controls">
                                                <select id="district" name="district" placeholder="Quận/ Huyện" required>
                                                    <option value="" selected>Chọn quận huyện</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-controls">
                                            <label>Phường/ Xã:</label>
                                            <div class="controls">
                                                <select id="ward" name="ward" placeholder="Phường/ Xã" required>
                                                    <option value="" selected>Chọn phường xã</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-controls">
                                            <label>Địa chỉ:</label>
                                            <div class="controls">
                                                <input type="text" name="address" id="Address" placeholder="Địa chỉ *"  required>
                                            </div>
                                        </div>
                                        <div class="form-controls">
                                            <div class="controls submit-controls">
                                                <button type="submit" name="register">ĐĂNG KÝ TÀI KHOẢN</button>
                                            </div>
                                        </div>

                                        <div class="form-controls">
                                            <div class="submit-controls">
                                                <p><strong>Bằng việc đăng kí này, bạn đã chấp nhận các chính sách của TPMS</strong></p>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        <?php
                    }
                ?>
                
            </div>
            <a href="#close-modal" rel="modal:close" class="close-modal icon-minutes"> </a>
        </div>
    </div>
    <?php include 'footer.php' ?>
    <!-- API Provice -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script>
        const host = "https://provinces.open-api.vn/api/";
        var callAPI = (api) => {
            return axios.get(api)
                .then((response) => {
                    renderData(response.data, "city");
                });
        }
        callAPI('https://provinces.open-api.vn/api/?depth=1');
        var callApiDistrict = (api) => {
            return axios.get(api)
                .then((response) => {
                    renderData(response.data.districts, "district");
                });
        }
        var callApiWard = (api) => {
            return axios.get(api)
                .then((response) => {
                    renderData(response.data.wards, "ward");
                });
        }

        var renderData = (array, select) => {
            let row = ' <option disable value="">Chọn</option>';
            array.forEach(element => {
                row += `<option data-id="${element.code}" value="${element.name}">${element.name}</option>`
            });
            document.querySelector("#" + select).innerHTML = row
        }

        $("#city").change(() => {
            callApiDistrict(host + "p/" + $("#city").find(':selected').data('id') + "?depth=2");
            printResult();
        });
        $("#district").change(() => {
            callApiWard(host + "d/" + $("#district").find(':selected').data('id') + "?depth=2");
            printResult();
        });
        $("#ward").change(() => {
            printResult();
        })

        var printResult = () => {
            if ($("#district").find(':selected').data('id') != "" && $("#city").find(':selected').data('id') != "" &&
                $("#ward").find(':selected').data('id') != "") {
                let result = $("#city option:selected").text() +
                    " | " + $("#district option:selected").text() + " | " +
                    $("#ward option:selected").text();
                $("#result").text(result)
            }

        }
    </script>
</body>

</html>