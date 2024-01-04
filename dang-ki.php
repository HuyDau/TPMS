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
    <meta name="google-site-verification" content="JOFGGI7j9vWfBf-xpElM5Tec0UJ1k_CfdNjpaHm5z10" />
    <meta name="msvalidate.01" content="5C8CDF0992489498A30F9E5F6668A4D5" />
    <meta name="geo.placename" content="Hanoi, Vietnam" />
    <meta name="geo.position" content="21.017249242314964;105.84134504199028" />
    <meta name="geo.region" content="VN-Hanoi" />
    <meta name="ICBM" content="21.017249242314964, 105.84134504199028" />
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
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/fontawesome/css/all.min.css">
    <meta property="og:image" content="assets/images/logo/logo.png" />
    <script async src="assets/js/ins.js"></script>
</head>

<body>
    <header>
        <div class="top-navigation">
            <div class="container">
                <ul>
                    <li><a href="/mobileswitch?mobile=true">Bản mobile</a></li>
                    <li><a href="gioi-thieu-cong-ty.php">Giới Thiệu</a></li>
                    <li><a href="/san-pham-da-xem">Sản Phẩm Đã Xem</a></li>
                    <li><a href="/trung-tam-bao-hanh">Trung Tâm Bảo Hành</a></li>
                    <li><a href="/he-thong-cua-hang">Hệ Thống Showroom</a></li>
                    <li><a href="https://tuyendung.hoanghamobile.com/">Tuyển dụng</a></li>
                    <li><a href="/order/check">Tra Cứu Đơn Hàng</a></li>
                    <li><a id="login-modal" href="dang-nhap.php">Đăng nhập</a></li>
                </ul>
            </div>
        </div>


        <!-- logo and search box -->
        <div class="heading">
            <div class="container">
                <div class="logo">
                    <a href="index.php" title="TPMS - Hệ Thống Bán Lẻ Sản Phẩm Thiết Bị Công Nghệ">
                        <img src="assets/images/logo/logo.png" alt="TPMS - Hệ Thống Bán Lẻ Sản Phẩm Thiết Bị Công Nghệ">
                    </a>
                </div>

                <div class="search-box">
                    <form method="get" action="/tim-kiem" onsubmit="return submitSearch(this);" enctype="application/x-www-form-urlencoded">
                        <div class="border">
                            <input type="text" id="kwd" name="kwd" placeholder="Hôm nay bạn cần tìm gì?" />
                            <button type="submit" class="search"><i class="icon-search"></i></button>
                        </div>
                    </form>
                </div>

                <div class="order-tools">
                    <div class="item check-order">
                        <a id="btnCheckOrder" href="/order/check">
                            <span class="icon"><i class="icon-truck"></i></span>
                            <span class="text">Kiểm tra đơn hàng</span>
                        </a>
                    </div>
                    <div class="item cart">
                        <a href="gio-hang.php"><i class="icon-cart"></i><label><i class="icon-left"></i><span id="cart-total">0</span></label></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- nav -->
        <nav>
            <div class="container">
                <ul class="root">
                    <li id="dien-thoai-di-dong">
                        <a href="san-pham.php?idCat=1" target="_self">
                            <i class="icon icon-phone"></i>
                            <span>Điện thoại</span>
                        </a>
                        <div class="sub-container">
                            <div class="sub">

                                <div class="menu g1">
                                    <h4><a href="san-pham.php?idCat=1">Hãng Sảnn Xuất</a></h4>
                                    <ul class="display-column format_3">
                                        <?php
                                        while ($itemBrand1 = mysqli_fetch_assoc($sqlBrand1)) {
                                        ?>
                                            <li><a href="san-pham.php?idCat=1&idBrand=<?= $itemBrand1['id'] ?>"><?= $itemBrand1['brandName'] ?></a></li>
                                        <?php
                                        }
                                        ?>

                                    </ul>
                                    <h4><a href="san-pham.php?idCat=1&idBrand=19">Điện thoại cao cấp</a></h4>
                                    <ul class="display-row format_1">
                                    </ul>
                                    <h4><a href="san-pham.php?idCat=1&idBrand=20">Điện Thoại Gập</a></h4>
                                    <ul class="display-row format_1">
                                    </ul>
                                </div>
                                <div class="menu g2">
                                    <h4><a href="san-pham.php?idCat=1&priceMax=1000000">Mức Giá</a></h4>
                                    <ul class="display-row format_2">
                                        <li><a href="san-pham.php?idCat=1&priceMin=100000000">Trên 100 Triệu</a></li>
                                        <li><a href="san-pham.php?idCat=1&priceMax=1000000">Dưới 1 triệu</a></li>
                                        <li><a href="san-pham.php?idCat=1&priceMax=3000000&priceMin=2000000">Từ 2 đến 3 triệu</a></li>
                                        <li><a href="san-pham.php?idCat=1&priceMax=4000000&priceMin=3000000">Từ 3 đến 4 triệu</a></li>
                                        <li><a href="san-pham.php?idCat=1&priceMax=8000000&priceMin=6000000">Từ 6 đến 8 triệu</a></li>
                                        <li><a href="san-pham.php?idCat=1&priceMax=20000000&priceMin=15000000">Từ 15 đến 20 triệu</a></li>
                                        <li><a href="san-pham.php?idCat=1&priceMax=100000000&priceMin=20000000">Từ 20 đến 100 triệu</a></li>
                                    </ul>
                                </div>
                                <?php

                                ?>
                                <div class="menu ads" style="width:600px">
                                    <!-- <a href="https://hoanghamobile.comchi-tiet-san-pham.php?idsanpham=<?= $itemTablet['idVersion'] ?>?source=Topmenu" target="_blank"><img style="width:600px" src="admin/assets/images/category/<?= getImageCategory($conn, 2) ?>" alt="HTC A103"></a> -->
                                </div>
                            </div>
                        </div>
                    </li>
                    <li id="apple">
                        <a href="san-pham.php?idCat=1&idBrand=1" target="_self">
                            <i class="icon iconv2 iconv2-iphone"></i>
                            <span>Apple</span>
                        </a>
                    </li>
                    <li id="laptop">
                        <a href="san-pham.php?idCat=2" target="_self">
                            <i class="icon icon-laptop"></i>
                            <span>Laptop</span>
                        </a>
                        <div class="sub-container">
                            <div class="sub">

                                <div class="menu g1">
                                    <h4><a href="/laptop">Hãng Sản Xuất</a></h4>
                                    <ul class="display-column format_3">
                                        <?php
                                        $sqlBran = mysqli_query($conn, getBrand($conn, 2));
                                        while ($itemBrand = mysqli_fetch_assoc($sqlBran)) {
                                        ?>
                                            <li><a href="san-pham.php?idCat=2&idBrand=<?= $itemBrand['id'] ?>"><?= $itemBrand['brandName'] ?></a></li>
                                        <?php
                                        }
                                        ?>
                                    </ul>
                                    <h4><a>Phân Loại Sản Phẩm</a></h4>
                                    <ul class="display-column format_1">
                                        <li><a href="/laptop/cao-cap-sang-trong">Cao cấp - Sang trọng</a></li>
                                        <li><a href="/laptop/do-hoa-ki-thuat">Đồ họa - Kĩ thuật</a></li>
                                        <li><a href="/laptop/hoc-tap-van-phong">Học tập - Văn ph&#242;ng</a></li>
                                        <li><a href="/laptop/laptop-gaming">Laptop Gaming</a></li>
                                        <li><a href="/laptop/mong-nhe">Mỏng nhẹ</a></li>
                                    </ul>
                                </div>
                                <div class="menu g3">
                                    <h4><a>Mức Giá</a></h4>
                                    <ul class="display-row format_2">
                                        <li><a href="san-pham.php?idCat=2&priceMin=20000000">Trên 20 Triệu</a></li>
                                        <li><a href="san-pham.php?idCat=1&priceMax=15000000&priceMin=12000000">Từ 12 đến 15 Triệu</a></li>
                                        <li><a href="san-pham.php?idCat=1&priceMax=20000000&priceMin=15000000">Từ 15 đến 20 triệu</a></li>
                                    </ul>
                                </div>


                                <div class="menu ads" style="width:600px">
                                    <a href="san-pham.php?idCat=2" target="_blank"><img style="width:600px" src="admin/assets/images/category/<?= getImageCategory($conn, 2) ?>" alt="HTC A103"></a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li id="tablet">
                        <a href="san-pham.php?idCat=3" target="_self">
                            <i class="icon icon-tablet"></i>
                            <span>Tablet</span>
                        </a>
                        <div class="sub-container">
                            <div class="sub">

                                <div class="menu g2">
                                    <h4><a href="/tablet">Hãng Sản Xuất</a></h4>
                                    <ul class="display-column format_3">
                                        <?php
                                        $sqlBran = mysqli_query($conn, getBrand($conn, 3));
                                        while ($itemBrand = mysqli_fetch_assoc($sqlBran)) {
                                        ?>
                                            <li><a href="san-pham.php?idCat=2&idBrand=<?= $itemBrand['id'] ?>"><?= $itemBrand['brandName'] ?></a></li>
                                        <?php
                                        }
                                        ?>
                                        <li><a href="/tablet/ipad">Apple</a></li>
                                        <li><a href="/tablet/samsung">Samsung</a></li>
                                        <li><a href="/tablet/xiaomi">Xiaomi</a></li>
                                        <li><a href="/tablet/nokia">Nokia</a></li>
                                        <li><a href="/tablet/tcl">TCL</a></li>
                                        <li><a href="/tablet/lenovo">Lenovo</a></li>
                                        <li><a href="/tablet/oppo">OPPO</a></li>
                                        <li><a href="/tablet/huawei">HUAWEI</a></li>
                                        <li><a href="/tablet/htc">HTC</a></li>
                                        <li><a href="/tablet/yuho">Yuho</a></li>
                                    </ul>
                                </div>


                                <div class="menu ads" style="width:600px">
                                    <a href="https://hoanghamobile.comchi-tiet-san-pham.php?idsanpham=<?= $itemTablet['idVersion'] ?>?source=Topmenu" target="_blank"><img style="width:600px" src="https://hoanghamobile.com/Uploads/2023/11/13/htc-a103-top-menu.png" alt="HTC A103" /></a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li id="man-hinh">
                        <a href="/man-hinh" target="_self">
                            <i class="icon icon-monitor"></i>
                            <span>M&#224;n h&#236;nh</span>
                        </a>
                        <div class="sub-container">
                            <div class="sub">

                                <div class="menu g0">
                                    <h4><a href="/man-hinh">Hãng Sản Xuất</a></h4>
                                    <ul class="display-column format_2">
                                        <li><a href="/man-hinh/acer">Acer</a></li>
                                        <li><a href="/man-hinh/hang-san-xuat/aoc">AOC</a></li>
                                        <li><a href="/man-hinh/hang-san-xuat/asus">Asus</a></li>
                                        <li><a href="/man-hinh/hang-san-xuat/dell">Dell</a></li>
                                        <li><a href="/man-hinh/gigabyte">GIGABYTE</a></li>
                                        <li><a href="/man-hinh/hang-san-xuat/hp">HP</a></li>
                                        <li><a href="/man-hinh/hang-san-xuat/huawei">HUAWEI</a></li>
                                        <li><a href="/man-hinh/hang-san-xuat/lenovo">Lenovo</a></li>
                                        <li><a href="/man-hinh/hang-san-xuat/lg">LG</a></li>
                                        <li><a href="/man-hinh/hang-san-xuat/msi">MSI</a></li>
                                        <li><a href="/man-hinh/hang-san-xuat/samsung">Samsung</a></li>
                                        <li><a href="/man-hinh/hang-san-xuat/viewsonic">ViewSonic</a></li>
                                    </ul>
                                </div>
                                <div class="menu g2">
                                    <h4><a>Phân Loại Sản Phẩm</a></h4>
                                    <ul class="display-column format_1">
                                        <li><a href="/man-hinh/phan-loai-san-pham/man-hinh-do-hoa">M&#224;n h&#236;nh đồ họa</a></li>
                                        <li><a href="/man-hinh/phan-loai-san-pham/man-hinh-gaming">M&#224;n h&#236;nh Gaming</a></li>
                                        <li><a href="/man-hinh/phan-loai-san-pham/man-hinh-van-phong">M&#224;n h&#236;nh văn ph&#242;ng</a></li>
                                        <li><a href="/man-hinh/phan-loai-san-pham/man-hinh-di-dong">M&#224;n h&#236;nh di động</a></li>
                                    </ul>
                                </div>
                                <div class="menu g3">
                                    <h4><a href="/phu-kien/phu-kien-man-hinh">Phụ kiện m&#224;n h&#236;nh</a></h4>
                                    <ul class="display-row format_1">
                                    </ul>
                                </div>


                                <div class="menu ads" style="width:580px">
                                    <a href="https://hoanghamobile.com/man-hinh/man-hinh-msi-pro-mp243x-chinh-hang?source=Topmenu" target="_blank"><img style="width:580px" src="https://hoanghamobile.com/Uploads/2023/11/07/580x266-01.png" alt="M&#224;n h&#236;nh MSI PRO MP243" /></a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li id="smart-tv">
                        <a href="/smart-tv" target="_self">
                            <i class="icon icon-tivi"></i>
                            <span>Smart TV</span>
                        </a>
                        <div class="sub-container">
                            <div class="sub">

                                <div class="menu g1">
                                    <h4><a href="/smart-tv">Hãng Sản Xuất</a></h4>
                                    <ul class="display-column format_1">
                                        <li><a href="/smart-tv/tv-xiaomi">Tivi Xiaomi</a></li>
                                        <li><a href="/smart-tv/tv-casper">Tivi Casper</a></li>
                                        <li><a href="/smart-tv/tv-coocaa">TV Coocaa</a></li>
                                        <li><a href="/smart-tv/itel">TV Itel</a></li>
                                        <li><a href="/smart-tv/samsung">TV Samsung</a></li>
                                        <li><a href="/smart-tv/tv-skyworth">TV SKYWORTH</a></li>
                                        <li><a href="/smart-tv/tv-toshiba">TV Toshiba</a></li>
                                    </ul>
                                    <h4><a href="/phu-kien/phu-kien-smart-tv">Phụ kiện TV</a></h4>
                                    <ul class="display-column format_1">
                                    </ul>
                                </div>


                                <div class="menu ads" style="width:600px">
                                    <a href="https://hoanghamobile.com/smart-tv/tv-xiaomi?source=Topmenu" target="_blank"><img style="width:600px" src="https://hoanghamobile.com/Uploads/2023/12/04/tv-xiaomi-t12-580x266.png" alt="TV Xiaomi m&#249;a lễ hội" /></a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li id="dong-ho">
                        <a href="/dong-ho" target="_self">
                            <i class="icon icon-watch"></i>
                            <span>Đồng hồ</span>
                        </a>
                        <div class="sub-container">
                            <div class="sub">

                                <div class="menu g0">
                                    <h4><a>Đồng hồ</a></h4>
                                    <ul class="display-column format_4">
                                        <li><a href="/dong-ho/apple-watch">Apple</a></li>
                                        <li><a href="/dong-ho/sam-sung">Samsung</a></li>
                                        <li><a href="/dong-ho/garmin">Garmin</a></li>
                                        <li><a href="/dong-ho/huawei">HUAWEI</a></li>
                                        <li><a href="/dong-ho/xiaomi">Xiaomi</a></li>
                                        <li><a href="/dong-ho/dong-ho-tre-em">Đồng hồ trẻ em</a></li>
                                        <li><a href="/dong-ho/realme">realme</a></li>
                                        <li><a href="/dong-ho/huami">Amazfit</a></li>
                                        <li><a href="/dong-ho/masstel">Masstel</a></li>
                                        <li><a href="/dong-ho/oppo">OPPO</a></li>
                                        <li><a href="/dong-ho/top-vong-deo-tay">Top v&#242;ng đeo tay</a></li>
                                        <li><a href="/dong-ho/soundpeats">SoundPEATS</a></li>
                                        <li><a href="/dong-ho/kieslect">Kieslect</a></li>
                                        <li><a href="/dong-ho/fitbit">Fitbit</a></li>
                                    </ul>
                                </div>


                                <div class="menu ads" style="width:600px">
                                    <a href="https://hoanghamobile.com/dong-ho/garmin?source=BannerSlider" target="_blank"><img style="width:600px" src="https://hoanghamobile.com/Uploads/2023/12/05/garmin-02-thumb.jpg" alt="Garmin tháng 12" /></a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li id="loa-tai-nghe">
                        <a href="/loa-tai-nghe" target="_self">
                            <i class="icon icon-headphone"></i>
                            <span>&#194;m thanh</span>
                        </a>
                        <div class="sub-container">
                            <div class="sub">

                                <div class="menu g0">
                                    <h4><a href="/loa">Loa</a></h4>
                                    <ul class="display-column format_2">
                                        <li><a href="/loa/samsung">Samsung</a></li>
                                        <li><a href="/loa/harman-kardon">Harman Kardon</a></li>
                                        <li><a href="/loa/jbl">JBL</a></li>
                                        <li><a href="/loa/monster">MONSTER</a></li>
                                        <li><a href="/loa/sony">Sony</a></li>
                                        <li><a href="/loa/alpha-works">Alpha Works</a></li>
                                        <li><a href="/loa/edifier">Edifier</a></li>
                                        <li><a href="/loa/energizer">Energizer</a></li>
                                        <li><a href="/loa/havit">Havit</a></li>
                                        <li><a href="/loa/huawei">HUAWEI</a></li>
                                        <li><a href="/loa/lg">LG</a></li>
                                        <li><a href="/loa/loa-mic-cam-tay">Loa mic cầm tay</a></li>
                                        <li><a href="/loa/marshall">Marshall</a></li>
                                        <li><a href="/loa/soundpeats">SoundPEATS</a></li>
                                        <li><a href="/loa/tekin">Tekin</a></li>
                                        <li><a href="/loa/apple">Apple</a></li>
                                    </ul>
                                </div>
                                <div class="menu g1">
                                    <h4><a href="/tai-nghe">Tai nghe</a></h4>
                                    <ul class="display-column format_3">
                                        <li><a href="/tai-nghe/sony">Sony</a></li>
                                        <li><a href="/tai-nghe/jbl">JBL</a></li>
                                        <li><a href="/tai-nghe/soundpeats">Soundpeats</a></li>
                                        <li><a href="/tai-nghe/apple-airpods">Apple</a></li>
                                        <li><a href="/tai-nghe/asus">Asus</a></li>
                                        <li><a href="/tai-nghe/beats">Beats</a></li>
                                        <li><a href="/tai-nghe/denon">Denon </a></li>
                                        <li><a href="/tai-nghe/edifier">Edifier</a></li>
                                        <li><a href="/tai-nghe/energizer">Energizer</a></li>
                                        <li><a href="/tai-nghe/havit">Havit</a></li>
                                        <li><a href="/tai-nghe/haylou">Haylou</a></li>
                                        <li><a href="/tai-nghe/huawei">HUAWEI</a></li>
                                        <li><a href="/tai-nghe/iwalk">iWalk</a></li>
                                        <li><a href="/tai-nghe/lg">LG</a></li>
                                        <li><a href="/tai-nghe/monster">MONSTER</a></li>
                                        <li><a href="/tai-nghe/motorola">Motorola</a></li>
                                        <li><a href="/tai-nghe/myalo">myAlo</a></li>
                                        <li><a href="/tai-nghe/nokia">Nokia</a></li>
                                        <li><a href="/tai-nghe/philips">PHILIPS</a></li>
                                        <li><a href="/tai-nghe/pioneer">Pioneer</a></li>
                                        <li><a href="/tai-nghe/pisen">Pisen</a></li>
                                        <li><a href="/tai-nghe/plantronics">Plantronics</a></li>
                                        <li><a href="/tai-nghe/rapoo">Rapoo</a></li>
                                        <li><a href="/tai-nghe/razer">Razer</a></li>
                                        <li><a href="/tai-nghe/realme">realme</a></li>
                                        <li><a href="/tai-nghe/samsung">Samsung</a></li>
                                        <li><a href="/tai-nghe/sennheiser">Sennheiser</a></li>
                                        <li><a href="/tai-nghe/shokz">Shokz</a></li>
                                        <li><a href="/tai-nghe/baseus">Tai nghe Baseus</a></li>
                                        <li><a href="/tai-nghe/tai-nghe-marshall">Tai nghe Marshall</a></li>
                                        <li><a href="/tai-nghe/oppo">Tai nghe OPPO</a></li>
                                        <li><a href="/tai-nghe/xiaomi">Xiaomi</a></li>
                                        <li><a href="/tai-nghe/yamaha">YAMAHA</a></li>
                                    </ul>
                                </div>


                                <div class="menu ads" style="width:600px">
                                    <a href="https://hoanghamobile.com/tim-kiem?kwd=beam" target="_blank"><img style="width:600px" src="https://hoanghamobile.com/Uploads/2023/11/08/web-top.jpg" alt="JBL tháng 11" /></a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li id="smart-home">
                        <a href="/smart-home" target="_self">
                            <i class="icon icon-home"></i>
                            <span>Smart Home</span>
                        </a>
                        <div class="sub-container">
                            <div class="sub">

                                <div class="menu g4">
                                    <h4><a href="/smart-home">Gia dụng th&#244;ng minh</a></h4>
                                    <ul class="display-row format_2">
                                        <li><a href="/do-gia-dung/may-loc-khong-khi">Máy lọc kh&#244;ng kh&#237;</a></li>
                                        <li><a href="/do-gia-dung/robot-hut-bui">Robot, Máy h&#250;t bụi</a></li>
                                        <li><a href="/smart-home/phu-kien-gia-dung">Phụ kiện gia dụng</a></li>
                                        <li><a href="/phu-kien/smart-home/fpt-play-box">FPT Play box</a></li>
                                        <li><a href="/smart-home/can-thong-minh">C&#226;n th&#244;ng minh</a></li>
                                        <li><a href="/smart-home/dth-tivi-box-k">DTH/Tivi Box K+</a></li>
                                        <li><a href="/smart-home/khuyen-mai-do-gia-dung-xiaomi">Khuyến mại đồ gia dụng Xiaomi</a></li>
                                        <li><a href="/smart-home/may-chieu">Máy Chiếu</a></li>
                                        <li><a href="/smart-home/noi-chien-khong-dau">Nồi chiên kh&#244;ng dầu</a></li>
                                        <li><a href="/phu-kien/do-gia-dung/o-cam-dien">Ổ Cắm điện</a></li>
                                        <li><a href="/smart-home/quat-dien">Quạt Điện</a></li>
                                        <li><a href="/smart-home/thiet-bi-dinh-vi-thong-minh">Thiết bị định vị th&#244;ng minh</a></li>
                                    </ul>
                                </div>
                                <div class="menu g0">
                                    <h4><a href="/do-gia-dung/may-loc-khong-khi">Máy Lọc Kh&#244;ng kh&#237;</a></h4>
                                    <ul class="display-row format_1">
                                        <li><a href="/do-gia-dung/may-loc-khong-khi/clair">Máy lọc kh&#244;ng kh&#237; hãng Clair</a></li>
                                        <li><a href="/do-gia-dung/may-loc-khong-khi/daikin">Máy lọc kh&#244;ng kh&#237; hãng Daikin</a></li>
                                        <li><a href="/do-gia-dung/may-loc-khong-khi/may-loc-khong-khi-hang-philips">Máy lọc kh&#244;ng kh&#237; hãng Philips</a></li>
                                        <li><a href="/do-gia-dung/may-loc-khong-khi/may-loc-khong-khi-hang-xiaomi">Máy lọc kh&#244;ng kh&#237; hãng Xiaomi</a></li>
                                        <li><a href="/do-gia-dung/may-loc-khong-khi/may-loc-khong-khi-levoit">Máy lọc kh&#244;ng kh&#237; Levoit</a></li>
                                    </ul>
                                </div>


                                <div class="menu ads" style="width:600px">
                                </div>
                            </div>
                        </div>
                    </li>
                    <li id="phu-kien">
                        <a href="/phu-kien" target="_self">
                            <i class="icon icon-sac"></i>
                            <span>Phụ kiện</span>
                        </a>
                        <div class="sub-container">
                            <div class="sub">

                                <div class="menu g0">
                                    <h4><a href="/phu-kien/phu-kien-dien-thoai">Phụ kiện điện thoại</a></h4>
                                    <ul class="display-column format_1">
                                        <li><a href="/sac-du-phong">Sạc dự ph&#242;ng</a></li>
                                        <li><a href="/cu-sac-day-cap">Củ sạc, d&#226;y cáp</a></li>
                                        <li><a href="/the-nho-usb">Thẻ nhớ - USB</a></li>
                                        <li><a href="/op-lung-dien-thoai">Bao da - Ốp lưng</a></li>
                                        <li><a href="/phu-kien/mieng-dan-man-hinh">Miếng dán m&#224;n h&#236;nh</a></li>
                                    </ul>
                                    <h4><a href="/phu-kien/xa-ton-phu-kien-gia-soc">Xả tồn phụ kiện - GI&#193; SỐC</a></h4>
                                    <ul class="display-column format_1">
                                    </ul>
                                </div>
                                <div class="menu g1">
                                    <h4><a href="/phu-kien/ban-phim-chuot-gaming-gear">B&#224;n ph&#237;m, Chuột Gaming Gear</a></h4>
                                    <ul class="display-column format_2">
                                        <li><a href="/phu-kien/ban-phim">B&#224;n Ph&#237;m</a></li>
                                        <li><a href="/phu-kien/chuot">Chuột</a></li>
                                        <li><a href="/phu-kien/ban-phim-chuot-gaming-gear/tay-cam-choi-game">Tay cầm chơi game</a></li>
                                    </ul>
                                    <h4><a href="/camera-an-ninh">Camera an ninh - H&#224;nh tr&#236;nh</a></h4>
                                    <ul class="display-row format_1">
                                        <li><a href="/camera-an-ninh/camera-an-ninh">Camera an ninh</a></li>
                                        <li><a href="/camera-an-ninh/camera-hanh-trinh">Camera h&#224;nh tr&#236;nh</a></li>
                                    </ul>
                                    <h4><a href="/phu-kien/phu-kien-smart-tv">Phụ kiện Smart TV</a></h4>
                                    <ul class="display-row format_1">
                                    </ul>
                                </div>
                                <div class="menu g2">
                                    <h4><a href="/phu-kien/linh-kien-may-tinh">Linh kiện máy t&#237;nh </a></h4>
                                    <ul class="display-column format_2">
                                        <li><a href="/phu-kien/phu-kien-may-tinh/o-cung">Ổ cứng</a></li>
                                        <li><a href="/phu-kien/linh-kien-may-tinh/phan-mem">Phần mềm</a></li>
                                        <li><a href="/phu-kien/phu-kien-may-tinh/ram">RAM</a></li>
                                    </ul>
                                    <h4><a href="/phu-kien/pin-man-hinh">Pin, M&#224;n h&#236;nh ch&#237;nh hãng</a></h4>
                                    <ul class="display-column format_1">
                                        <li><a href="/phu-kien/pin-man-hinh/man-hinh-iphone">M&#224;n h&#236;nh iPhone</a></li>
                                        <li><a href="/phu-kien/pin-man-hinh/pin">Pin iPhone</a></li>
                                    </ul>
                                </div>
                                <div class="menu g3">
                                    <h4><a href="/phu-kien/phu-kien-apple">Phụ kiện Apple</a></h4>
                                    <ul class="display-row format_1">
                                        <li><a href="/phu-kien/phu-kien-apple/phu-kien-chinh-hang-apple">Phụ kiện Chính Hãng Apple</a></li>
                                        <li><a href="/phu-kien/phu-kien-apple/phu-kien-cho-macbook">Phụ kiện cho Macbook</a></li>
                                        <li><a href="/phu-kien/phu-kien-apple/phu-kien-iphone-15">Phụ kiện iPhone 15</a></li>
                                        <li><a href="/phu-kien/phu-kien-apple/san-pham-uu-dai">Sản phẩm Ưu đãi</a></li>
                                        <li><a href="/phu-kien/phu-kien-apple/thiet-bi-dinh-vi-thong-minh">Thiết bị định vị th&#244;ng minh</a></li>
                                    </ul>
                                    <h4><a href="/phu-kien/phu-kien-khac">Phụ kiện khác</a></h4>
                                    <ul class="display-column format_1">
                                        <li><a href="/phu-kien/tui-xach-balo-chong-soc">Balo - t&#250;i xách - t&#250;i chống sốc</a></li>
                                    </ul>
                                </div>
                                <div class="menu g4">
                                    <h4><a href="/phu-kien/thiet-bi-mang">Thiết bị mạng</a></h4>
                                    <ul class="display-row format_1">
                                        <li><a href="/phu-kien/thiet-bi-mang/bo-kich-song">Bộ k&#237;ch sóng</a></li>
                                        <li><a href="/phu-kien/thiet-bi-mang/bo-phat-wifi-di-dong-3g-4g">Bộ phát Wifi di động (3G/4G)</a></li>
                                        <li><a href="/phu-kien/thiet-bi-mang/router-modem">Router/Modem</a></li>
                                        <li><a href="/phu-kien/thiet-bi-mang/thuong-hieu">Thương hiệu</a></li>
                                    </ul>
                                </div>


                                <div class="menu ads" style="width:300px">
                                </div>
                            </div>
                        </div>
                    </li>
                    <li id="do-choi-cong-nghe">
                        <a href="/do-choi-cong-nghe" target="_self">
                            <i class="icon icon-game"></i>
                            <span>Đồ chơi CN</span>
                        </a>
                        <div class="sub-container">
                            <div class="sub">

                                <div class="menu g0">
                                    <h4><a>Đồ chơi c&#244;ng nghệ</a></h4>
                                    <ul class="display-row format_1">
                                        <li><a href="/do-choi-cong-nghe/quat-cam-tay-mini">Quạt cầm tay mini</a></li>
                                        <li><a href="/do-choi-cong-nghe/day-do-nhip-tim">D&#226;y đo nhịp tim</a></li>
                                        <li><a href="/do-choi-cong-nghe/kinh-thuc-te-ao">K&#237;nh thực tế ảo</a></li>
                                        <li><a href="/do-choi-cong-nghe/tay-cam-chong-rung">Tay cầm chống rung</a></li>
                                        <li><a href="/do-choi-cong-nghe/camera-hanh-trinh">Camera h&#224;nh tr&#236;nh</a></li>
                                    </ul>
                                </div>


                                <div class="menu ads" style="width:600px">
                                    <a href="https://hoanghamobile.com/camera/camera-hanh-trinh-gopro-hero-11-chinh-hang-fpt" target="_blank"><img style="width:600px" src="https://hoanghamobile.com/Uploads/2023/11/07/17nov-01.jpg" alt="Hero 11 Black" /></a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li id="kho-san-pham-cu">
                        <a href="/kho-san-pham-cu" target="_self">
                            <i class="icon icon-maycu"></i>
                            <span>Máy tr&#244;i</span>
                        </a>
                        <div class="sub-container">
                            <div class="sub">

                                <div class="menu g0">
                                    <h4><a>H&#224;ng cũ giá rẻ</a></h4>
                                    <ul class="display-column format_3">
                                        <li><a href="/kho-san-pham-cu?=filters={type:1}">Điện thoại di động</a></li>
                                        <li><a href="/kho-san-pham-cu?filters={type:5}">Đồng hồ th&#244;ng minh</a></li>
                                        <li><a href="/kho-san-pham-cu?filters={type:2}">Máy t&#237;nh bảng</a></li>
                                        <li><a href="/kho-san-pham-cu?=filters={type:3}">Laptop</a></li>
                                        <li><a href="/kho-san-pham-cu?=filters={type:7}">Loa</a></li>
                                        <li><a href="/kho-san-pham-cu?=filters={type:13}">Tai nghe</a></li>
                                        <li><a href="/kho-san-pham-cu?=filters={type:26}">Camera</a></li>
                                        <li><a href="/kho-san-pham-cu?=filters={type:10}">Củ sạc</a></li>
                                        <li><a href="/kho-san-pham-cu?=filters={type:11}">D&#226;y cáp</a></li>
                                        <li><a href="/kho-san-pham-cu?=filters={type:28}">Máy lọc kh&#244;ng kh&#237;</a></li>
                                        <li><a href="/kho-san-pham-cu?=filters={type:18}">Phụ kiện</a></li>
                                        <li><a href="/kho-san-pham-cu?=filters={type:25}">Sạc dự ph&#242;ng</a></li>
                                        <li><a href="/kho-san-pham-cu?=filters={type:30}">Tay cầm chống rung</a></li>
                                    </ul>
                                </div>


                            </div>
                        </div>
                    </li>
                    <li id="dich-vu-sua-chua">
                        <a href="/dich-vu-sua-chua" target="_self">
                            <i class="icon icon-suachua"></i>
                            <span>Sửa chữa</span>
                        </a>
                        <div class="sub-container">
                            <div class="sub">

                                <div class="menu g0">
                                    <h4><a href="/dich-vu-sua-chua/android">Android</a></h4>
                                    <ul class="display-column format_2">
                                        <li><a href="/dich-vu-sua-chua/android/pin">Pin</a></li>
                                        <li><a href="/dich-vu-sua-chua/android/camera">Camera</a></li>
                                        <li><a href="/dich-vu-sua-chua/android/man-hinh">M&#224;n h&#236;nh</a></li>
                                        <li><a href="/dich-vu-sua-chua/android/vo-va-mat-lung">Vỏ v&#224; mặt lưng</a></li>
                                    </ul>
                                </div>
                                <div class="menu g1">
                                    <h4><a href="/dich-vu-sua-chua/apple/iphone">Apple iPhone</a></h4>
                                    <ul class="display-column format_2">
                                        <li><a href="/dich-vu-sua-chua/apple/iphone/camera-truoc">Camera Trước</a></li>
                                        <li><a href="/dich-vu-sua-chua/apple/iphone/cap-phim-am-luong-phim-nguon">Cáp ph&#237;m &#226;m lượng - Cáp ph&#237;m nguồn</a></li>
                                        <li><a href="/dich-vu-sua-chua/apple/iphone/loa-trong-loa-ngoai">Loa Trong - Loa Ngo&#224;i</a></li>
                                        <li><a href="/dich-vu-sua-chua/apple/iphone/vo-kinh">Vỏ - K&#237;nh Lưng</a></li>
                                        <li><a href="/dich-vu-sua-chua/apple/iphone/camera">Camera Sau</a></li>
                                        <li><a href="/dich-vu-sua-chua/apple/iphone/man-hinh">M&#224;n h&#236;nh</a></li>
                                        <li><a href="/dich-vu-sua-chua/apple/iphone/cac-loai-cap">Cáp bo sạc IPhone</a></li>
                                    </ul>
                                </div>
                                <div class="menu g2">
                                    <h4><a href="/dich-vu-sua-chua/apple/ipad">Apple iPad</a></h4>
                                    <ul class="display-row format_3">
                                        <li><a href="/dich-vu-sua-chua/apple/ipad/pin">Pin</a></li>
                                        <li><a href="/dich-vu-sua-chua/apple/ipad/cam-ung">Cảm ứng</a></li>
                                        <li><a href="/dich-vu-sua-chua/apple/ipad/man-hinh">M&#224;n h&#236;nh</a></li>
                                    </ul>
                                </div>


                            </div>
                        </div>
                    </li>
                    <li id="dich-vu">
                        <a href="/dich-vu" target="_self">
                            <i class="icon icon-simthe"></i>
                            <span>Dịch Vụ</span>
                        </a>
                        <div class="sub-container">
                            <div class="sub">

                                <div class="menu g0">
                                    <h4><a href="/sim-the/sim-the">Sim Thẻ</a></h4>
                                    <ul class="display-row format_3">
                                        <li><a href="/sim-the/sim-wintel">SIM Wintel</a></li>
                                        <li><a href="/sim-the/sim-the/sim-mobifone">SIM MobiFone</a></li>
                                        <li><a href="/sim-the/sim-the/sim-viettel">SIM Viettel</a></li>
                                        <li><a href="/sim-the/sim-the/sim-vinaphone">SIM Vinaphone</a></li>
                                        <li><a href="/sim-the/sim-the/sim-itel">SIM iTel</a></li>
                                        <li><a href="/sim-the/sim-the/sim-local">SIM Local</a></li>
                                        <li><a href="/sim-the/sim-the/sim-vietnamobile">SIM Vietnamobile</a></li>
                                    </ul>
                                </div>
                                <div class="menu g1">
                                    <h4><a href="/phu-kien/bo-phat-wifi/truyen-hinh-k">Mua truyền h&#236;nh K+</a></h4>
                                    <ul class="display-row format_1">
                                    </ul>
                                </div>


                            </div>
                        </div>
                    </li>
                    <li id="tin-tuc">
                        <a href="/tin-tuc" target="_self">
                            <i class="icon icon-news"></i>
                            <span>Tin hot</span>
                        </a>
                    </li>
                    <li id="tin-khuyen-maiuu-dai-hot">
                        <a href="/tin-khuyen-mai/uu-dai-hot" target="_blank">
                            <i class="icon icon-flash"></i>
                            <span>Ưu đãi</span>
                        </a>
                        <div class="sub-container">
                            <div class="sub">

                                <div class="menu g0">
                                    <h4><a href="/tin-khuyen-mai/uu-dai-hot">Ưu đãi Hot</a></h4>
                                    <ul class="display-row format_1">
                                        <li><a href="/tin-khuyen-mai/uu-dai-hot/khuyen-mai-jbl-harman-kardon">&#226;m thanh - JBL Harman</a></li>
                                        <li><a href="/tin-khuyen-mai/uu-dai-hot/combo-uu-dai">Combo ưu đãi</a></li>
                                        <li><a href="/tin-khuyen-mai/uu-dai-hot/combo-uu-dai-samsung">Combo ưu đãi samsung</a></li>
                                        <li><a href="/tin-khuyen-mai/uu-dai-hot/tcl">Hot Sale TCL</a></li>
                                        <li><a href="/tin-khuyen-mai/uu-dai-hot/khuyen-mai-Apple">Khuyến mại Apple</a></li>
                                        <li><a href="/tin-khuyen-mai/uu-dai-hot/samsung-xiaomi-hot">KM Samsung + Xiaomi</a></li>
                                        <li><a href="/tin-khuyen-mai/uu-dai-hot/laptop-man-hinh-hp">Laptop M&#224;n h&#236;nh HP</a></li>
                                        <li><a href="/tin-khuyen-mai/uu-dai-hot/mo-ban-phu-kien-9fit">Mở bán Phụ kiện 9Fit</a></li>
                                        <li><a href="/tin-khuyen-mai/san-pham-doc-quyen">Sản phẩm độc quyền</a></li>
                                        <li><a href="/uu-dai-hot/uu-dai-mophie-zagg">Ưu đãi Mophie + ZAGG</a></li>
                                    </ul>
                                </div>


                                <div class="menu ads" style="width:600px">
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- nav -->

    </header>
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
    <footer>
        <div class="container">
            <div class="bg">
                <div class="col-content">
                    <div class="link-content">
                        <h4>
                            <a>Hỗ Trợ - Dịch Vụ</a>
                        </h4>
                        <ul>
                            <li>
                                <a href="mua-tra-gop.php">Chính Sách Và Hướng Dẫn Mua Hàng Trả Góp</a>
                            </li>
                            <li>
                                <a href="huong-dan-dat-hang.php">Hướng Dẫn Đặt Hàng Và Thanh Toán</a>
                            </li>
                            <li>
                                <a href="/order/check">Tra Cứu Đơn Hàng</a>
                            </li>
                            <li>
                                <a href="chinh-sach-bao-hanh.php">Chính Sách Bảo Hành</a>
                            </li>
                            <li>
                                <a href="/dat-hang/bao-hanh-mo-rong">Phạm Vi, Điều Khoản Gói Bảo Hành Mở Rộng</a>
                            </li>
                            <li>
                                <a href="chinh-sach-bao-mat.php">Chính Sách Bảo Mật</a>
                            </li>
                            <li>
                                <a href="chinh-sach-giai-quyet-khieu-nai.php">Chính Sách Giải Quyết Khiếu Nại</a>
                            </li>
                            <li>
                                <a href="dieu-khoan-mua-ban-hang-hoa.php">Điều Khoản Mua Bán Hàng Hóa</a>
                            </li>
                            <li>
                                <a href="cau-hoi-thuong-gap.php">Câu Hỏi Thường Gặp</a>
                            </li>
                        </ul>
                    </div>
                    <div class="link-content">
                        <h4>
                            <a>Thông Tin Liên Hệ</a>
                        </h4>
                        <ul>
                            <li>
                                <a href="mua-hang-online.php">Bán Hàng Online</a>
                            </li>
                            <li>
                                <a href="cham-soc-khach-hang.php">Chăm Sóc Khách Hàng</a>
                            </li>
                            <li>
                                <a href="/tin-tuc/hoang-ha-care-dich-vu-sua-chua-dien-thoai-may-tinh-bang-voi-gia-tot-nhat-thi-truong">Dịch Vụ Sửa Chữa TPMS Care</a>
                            </li>
                            <li>
                                <a href="hop-tac-kinh-doanh.php">Hợp Tác Kinh Doanh</a>
                            </li>
                            <li>
                                <a href="/trung-tam-bao-hanh">Tra Cứu Bảo Hành</a>
                            </li>
                        </ul>
                    </div>
                    <div class="link-content">
                        <h4>
                            <a href="/he-thong-cua-hang">Hệ Thống Showroom</a>
                        </h4>
                        <ul>
                            <li>
                                <a href="/he-thong-cua-hang">Danh Sách Showroom</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h4>Tổng đài</h4>
                        <a class="hotline" href="tel:0386131716">03.86.13.17.16</a>
                    </div>
                    <div>
                        <h4>Thanh toán miễn phí</h4>
                        <ul class="list-logo">
                            <li>
                                <img src="assets/images/logo/logo-visa.png">
                                <img src="assets/images/logo/logo-master.png">
                            </li>
                            <li>
                                <img src="assets/images/logo/logo-jcb.png">
                                <img src="assets/images/logo/logo-samsungpay.png">
                            </li>
                            <li>
                                <img src="assets/images/logo/logo-atm.png">
                                <img src="assets/images/logo/logo-vnpay.png">
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h4>Hình thức vận chuyển</h4>
                        <ul class="list-logo">
                            <li>
                                <img src="assets/images/logo/nhattin.jpg">
                                <img src="assets/images/logo/vnpost.jpg">
                            </li>
                        </ul>
                        <div class="mg-top20">
                            <a href="http://online.gov.vn/Home/WebDetails/28738" target="_blank"><img src="assets/images/logo/logo-bct.png"></a>
                        </div>
                    </div>
                </div>

            </div>
            <div id="navSocial">
                <div class="social">
                    <ul>
                        <li><a href="https://www.facebook.com/lehuydau2312/" title="Facebook" target="_blank" class="blue"><span><i class="icon-facebook"></i></span></a></li>
                        <li><a href="https://www.youtube.com/channel/UCJm_GdFJzT8h1odq1oMu_7Q?sub_confirmation=1" title="Youtube" target="_blank" class="red"><span><i class="icon-youtube"></i></span></a></li>
                        <li><a href="https://www.instagram.com/lehuydau2312?fbclid=IwAR37NMIskkkDEjeCGX9BdRb8njYkAiMOEurf6y9ok0HP1b2Dx8BPMbNMBVQ" title="Instagram" target="_blank" class="rainbow"><span><i class="icon-instagram"></i></span></a></li>
                        <li><a href="https://www.tiktok.com/@daulh____" title="Tiktok" target="_blank" class="black"><span><i class="icon-tiktok"></i></span></a></li>
                    </ul>
                </div>
            </div>
            <div id="backtoTop">
                <a id="top" href="javascript:;">
                    <i class="icon-left"></i>
                </a>
            </div>
        </div>
    </footer>
    <div id="popup-modal"></div>
    <div id="sticker-modal"></div>
    <div class="search-bg"></div>
    <div class="footer-stick-right" style="position: fixed; bottom: 175px; right: 33px; display:none">
        <a href="javascript:removeStick();" style="background: #4B4B4B;color: #FFF;border-radius: 20px;font-size: 8px;width: 20px;height: 20px;display: flex;text-align: center; position:absolute; right:-5px; top:-5px;">
            <i class="iconv2-remove" style="display:block; margin:auto;"></i>
        </a>
        <div style="padding-bottom:10px;">
            <a href="/kho-san-pham-cu">
                <img src="assets/images/icon/maycugiatot.png" />
            </a>
        </div>
        <div>
            <a href="/dat-hang/thu-cu-doi-moi-iphone-chinh-hang-vn-a-hoanghamobile">
                <img src="assets/images/icon/thucugiacao.png" />
            </a>
        </div>
    </div>
    <div class="footer-zalo" style="position: fixed; bottom: 110px; right: 33px;">
        <a href="https://chat.zalo.me/0386131716" target="_blank"><img src="assets/images/icon/zalo.svg" /></a>
    </div>
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