<?php
    require_once("config/config.php");
    include 'handle.php';

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
    <title>TPMS - Hệ thống bán lẻ thiết bị di động và công nghệ chính hãng giá tốt</title>
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
    <link rel="stylesheet" type="text/css" href="assets/slick/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="assets/slick/slick/slick-theme.css"/>
    <!-- Bootstrap -->
    <!-- <link href="assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="assets/bootstrap/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="assets/bootstrap/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script> -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/fontawesome/css/all.min.css">
    <meta property="og:image" content="assets/images/logo/logo.png" />
    <script async src="assets/js/ins.js"></script>
</head>

<body>
    <!-- <div class="top-link">
        <span class="pulse"></span>
        <p><strong>Cơ hội sở hữu Samsung S20 FE 256GB chỉ với 6.990.000đ - SL c&#243; hạn</strong> <a href="https://hoanghamobile.com/dien-thoai-di-dong/samsung-galaxy-s20-fe-256gb-chinh-hang" target="_top">Xem chi tiết</a></p>
    </div> -->
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
                    <li><a id="login-modal" href="/Account/Login?ReturnUrl=/gioi-thieu-cong-ty">Đăng nhập</a></li>
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
                                            while($itemBrand1 = mysqli_fetch_assoc($sqlBrand1)){
                                                ?>
                                                    <li><a href="san-pham.php?idCat=1&idBrand=<?=$itemBrand1['id']?>"><?=$itemBrand1['brandName']?></a></li>
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
                                    <!-- <a href="https://hoanghamobile.com/may-tinh-bang/may-tinh-bang-htc-a103-4gb-64gb-chinh-hang?source=Topmenu" target="_blank"><img style="width:600px" src="admin/assets/images/category/<?=getImageCategory($conn,2)?>" alt="HTC A103"></a> -->
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
                                                    $sqlBran = mysqli_query($conn,getBrand($conn,2));
                                                    while($itemBrand = mysqli_fetch_assoc($sqlBran)){
                                                        ?>
                                                            <li><a href="san-pham.php?idCat=2&idBrand=<?=$itemBrand['id']?>"><?=$itemBrand['brandName']?></a></li>
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
                                            <a href="san-pham.php?idCat=2" target="_blank"><img style="width:600px" src="admin/assets/images/category/<?=getImageCategory($conn,2)?>" alt="HTC A103"></a>
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
                                                        $sqlBran = mysqli_query($conn,getBrand($conn,3));
                                                        while($itemBrand = mysqli_fetch_assoc($sqlBran)){
                                                            ?>
                                                                <li><a href="san-pham.php?idCat=2&idBrand=<?=$itemBrand['id']?>"><?=$itemBrand['brandName']?></a></li>
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
                                                <a href="https://hoanghamobile.com/may-tinh-bang/may-tinh-bang-htc-a103-4gb-64gb-chinh-hang?source=Topmenu" target="_blank"><img style="width:600px" src="https://hoanghamobile.com/Uploads/2023/11/13/htc-a103-top-menu.png" alt="HTC A103" /></a>
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
                                                <a href="https://hoanghamobile.com/dong-ho/garmin?source=BannerSlider" target="_blank"><img style="width:600px" src="https://hoanghamobile.com/Uploads/2023/12/05/garmin-02-thumb.jpg" alt="Garmin th&#225;ng 12" /></a>
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
                                                <a href="https://hoanghamobile.com/tim-kiem?kwd=beam" target="_blank"><img style="width:600px" src="https://hoanghamobile.com/Uploads/2023/11/08/web-top.jpg" alt="JBL th&#225;ng 11" /></a>
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
                                                    <li><a href="/do-gia-dung/may-loc-khong-khi">M&#225;y lọc kh&#244;ng kh&#237;</a></li>
                                                    <li><a href="/do-gia-dung/robot-hut-bui">Robot, M&#225;y h&#250;t bụi</a></li>
                                                    <li><a href="/smart-home/phu-kien-gia-dung">Phụ kiện gia dụng</a></li>
                                                    <li><a href="/phu-kien/smart-home/fpt-play-box">FPT Play box</a></li>
                                                    <li><a href="/smart-home/can-thong-minh">C&#226;n th&#244;ng minh</a></li>
                                                    <li><a href="/smart-home/dth-tivi-box-k">DTH/Tivi Box K+</a></li>
                                                    <li><a href="/smart-home/khuyen-mai-do-gia-dung-xiaomi">Khuyến mại đồ gia dụng Xiaomi</a></li>
                                                    <li><a href="/smart-home/may-chieu">M&#225;y Chiếu</a></li>
                                                    <li><a href="/smart-home/noi-chien-khong-dau">Nồi chi&#234;n kh&#244;ng dầu</a></li>
                                                    <li><a href="/phu-kien/do-gia-dung/o-cam-dien">Ổ Cắm điện</a></li>
                                                    <li><a href="/smart-home/quat-dien">Quạt Điện</a></li>
                                                    <li><a href="/smart-home/thiet-bi-dinh-vi-thong-minh">Thiết bị định vị th&#244;ng minh</a></li>
                                            </ul>
                                    </div>
                                        <div class="menu g0">
                                            <h4><a href="/do-gia-dung/may-loc-khong-khi">M&#225;y Lọc Kh&#244;ng kh&#237;</a></h4>
                                            <ul class="display-row format_1">
                                                    <li><a href="/do-gia-dung/may-loc-khong-khi/clair">M&#225;y lọc kh&#244;ng kh&#237; h&#227;ng Clair</a></li>
                                                    <li><a href="/do-gia-dung/may-loc-khong-khi/daikin">M&#225;y lọc kh&#244;ng kh&#237; h&#227;ng Daikin</a></li>
                                                    <li><a href="/do-gia-dung/may-loc-khong-khi/may-loc-khong-khi-hang-philips">M&#225;y lọc kh&#244;ng kh&#237; h&#227;ng Philips</a></li>
                                                    <li><a href="/do-gia-dung/may-loc-khong-khi/may-loc-khong-khi-hang-xiaomi">M&#225;y lọc kh&#244;ng kh&#237; h&#227;ng Xiaomi</a></li>
                                                    <li><a href="/do-gia-dung/may-loc-khong-khi/may-loc-khong-khi-levoit">M&#225;y lọc kh&#244;ng kh&#237; Levoit</a></li>
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
                                                    <li><a href="/cu-sac-day-cap">Củ sạc, d&#226;y c&#225;p</a></li>
                                                    <li><a href="/the-nho-usb">Thẻ nhớ - USB</a></li>
                                                    <li><a href="/op-lung-dien-thoai">Bao da - Ốp lưng</a></li>
                                                    <li><a href="/phu-kien/mieng-dan-man-hinh">Miếng d&#225;n m&#224;n h&#236;nh</a></li>
                                            </ul>
                                            <h4><a href="/phu-kien/xa-ton-phu-kien-gia-soc">Xả tồn phụ kiện - GI&#193; SỐC</a></h4>
                                            <ul class="display-column format_1">
                                            </ul>
                                    </div>
                                        <div class="menu g1">
                                            <h4><a href="/phu-kien/ban-phim-chuot-gaming-gear">B&#224;n ph&#237;m, Chuột  Gaming Gear</a></h4>
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
                                            <h4><a href="/phu-kien/linh-kien-may-tinh">Linh kiện m&#225;y t&#237;nh </a></h4>
                                            <ul class="display-column format_2">
                                                    <li><a href="/phu-kien/phu-kien-may-tinh/o-cung">Ổ cứng</a></li>
                                                    <li><a href="/phu-kien/linh-kien-may-tinh/phan-mem">Phần mềm</a></li>
                                                    <li><a href="/phu-kien/phu-kien-may-tinh/ram">RAM</a></li>
                                            </ul>
                                            <h4><a href="/phu-kien/pin-man-hinh">Pin, M&#224;n h&#236;nh ch&#237;nh h&#227;ng</a></h4>
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
                                                    <li><a href="/phu-kien/phu-kien-apple/san-pham-uu-dai">Sản phẩm Ưu đ&#227;i</a></li>
                                                    <li><a href="/phu-kien/phu-kien-apple/thiet-bi-dinh-vi-thong-minh">Thiết bị định vị th&#244;ng minh</a></li>
                                            </ul>
                                            <h4><a href="/phu-kien/phu-kien-khac">Phụ kiện kh&#225;c</a></h4>
                                            <ul class="display-column format_1">
                                                    <li><a href="/phu-kien/tui-xach-balo-chong-soc">Balo - t&#250;i x&#225;ch - t&#250;i chống sốc</a></li>
                                            </ul>
                                    </div>
                                        <div class="menu g4">
                                            <h4><a href="/phu-kien/thiet-bi-mang">Thiết bị mạng</a></h4>
                                            <ul class="display-row format_1">
                                                    <li><a href="/phu-kien/thiet-bi-mang/bo-kich-song">Bộ k&#237;ch s&#243;ng</a></li>
                                                    <li><a href="/phu-kien/thiet-bi-mang/bo-phat-wifi-di-dong-3g-4g">Bộ ph&#225;t Wifi di động (3G/4G)</a></li>
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
                            <span>M&#225;y tr&#244;i</span>
                        </a>
                            <div class="sub-container">
                                <div class="sub">

                                        <div class="menu g0">
                                            <h4><a>H&#224;ng cũ gi&#225; rẻ</a></h4>
                                            <ul class="display-column format_3">
                                                    <li><a href="/kho-san-pham-cu?=filters={type:1}">Điện thoại di động</a></li>
                                                    <li><a href="/kho-san-pham-cu?filters={type:5}">Đồng hồ th&#244;ng minh</a></li>
                                                    <li><a href="/kho-san-pham-cu?filters={type:2}">M&#225;y t&#237;nh bảng</a></li>
                                                    <li><a href="/kho-san-pham-cu?=filters={type:3}">Laptop</a></li>
                                                    <li><a href="/kho-san-pham-cu?=filters={type:7}">Loa</a></li>
                                                    <li><a href="/kho-san-pham-cu?=filters={type:13}">Tai nghe</a></li>
                                                    <li><a href="/kho-san-pham-cu?=filters={type:26}">Camera</a></li>
                                                    <li><a href="/kho-san-pham-cu?=filters={type:10}">Củ sạc</a></li>
                                                    <li><a href="/kho-san-pham-cu?=filters={type:11}">D&#226;y c&#225;p</a></li>
                                                    <li><a href="/kho-san-pham-cu?=filters={type:28}">M&#225;y lọc kh&#244;ng kh&#237;</a></li>
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
                                                    <li><a href="/dich-vu-sua-chua/apple/iphone/cap-phim-am-luong-phim-nguon">C&#225;p ph&#237;m &#226;m lượng - C&#225;p ph&#237;m nguồn</a></li>
                                                    <li><a href="/dich-vu-sua-chua/apple/iphone/loa-trong-loa-ngoai">Loa Trong - Loa Ngo&#224;i</a></li>
                                                    <li><a href="/dich-vu-sua-chua/apple/iphone/vo-kinh">Vỏ - K&#237;nh Lưng</a></li>
                                                    <li><a href="/dich-vu-sua-chua/apple/iphone/camera">Camera Sau</a></li>
                                                    <li><a href="/dich-vu-sua-chua/apple/iphone/man-hinh">M&#224;n h&#236;nh</a></li>
                                                    <li><a href="/dich-vu-sua-chua/apple/iphone/cac-loai-cap">C&#225;p bo sạc IPhone</a></li>
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
                            <span>Ưu đ&#227;i</span>
                        </a>
                            <div class="sub-container">
                                <div class="sub">

                                        <div class="menu g0">
                                            <h4><a href="/tin-khuyen-mai/uu-dai-hot">Ưu đ&#227;i Hot</a></h4>
                                            <ul class="display-row format_1">
                                                    <li><a href="/tin-khuyen-mai/uu-dai-hot/khuyen-mai-jbl-harman-kardon">&#226;m thanh - JBL  Harman</a></li>
                                                    <li><a href="/tin-khuyen-mai/uu-dai-hot/combo-uu-dai">Combo ưu đ&#227;i</a></li>
                                                    <li><a href="/tin-khuyen-mai/uu-dai-hot/combo-uu-dai-samsung">Combo ưu đ&#227;i samsung</a></li>
                                                    <li><a href="/tin-khuyen-mai/uu-dai-hot/tcl">Hot Sale TCL</a></li>
                                                    <li><a href="/tin-khuyen-mai/uu-dai-hot/khuyen-mai-Apple">Khuyến mại Apple</a></li>
                                                    <li><a href="/tin-khuyen-mai/uu-dai-hot/samsung-xiaomi-hot">KM Samsung  + Xiaomi</a></li>
                                                    <li><a href="/tin-khuyen-mai/uu-dai-hot/laptop-man-hinh-hp">Laptop  M&#224;n h&#236;nh HP</a></li>
                                                    <li><a href="/tin-khuyen-mai/uu-dai-hot/mo-ban-phu-kien-9fit">Mở b&#225;n Phụ kiện 9Fit</a></li>
                                                    <li><a href="/tin-khuyen-mai/san-pham-doc-quyen">Sản phẩm độc quyền</a></li>
                                                    <li><a href="/uu-dai-hot/uu-dai-mophie-zagg">Ưu đ&#227;i Mophie + ZAGG</a></li>
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

    <!-- slider -->
    <section>
        <div class="container">
            <div class="top-slider">
                <div id="jssor_1" class="jssor-1200">
                    <!-- Loading Screen -->
                    <div data-u="loading" class="jssor-spin">
                        <img src="/Content/web/img/spin.svg" />
                    </div>
                    <div data-u="slides" class="jssor-1200-container">
                        <?php
                            $queryBanner = mysqli_query($conn,getSlide($conn));
                            while($itemBanner = mysqli_fetch_assoc($queryBanner)){
                                ?>
                                    <div>
                                        <a target="_blank" href="" title="<?=$itemBanner['bannerTitle']?>"><img data-u="image" data-src2="admin/assets/images/banner/<?=$itemBanner['bannerImage']?>" title="<?=$itemBanner['bannerTitle']?>" /></a>
                                        <div u="thumb">
                                            <?=$itemBanner['bannerTitle']?>
                                                <br /><small><?=$itemBanner['bannerContent']?></small>
                                        </div>
                                    </div>
                                <?php
                            }
                        ?>
                    </div>


                    <div data-u="thumbnavigator" class="jssor-1200-thumbs">
                        <div data-u="slides" style="cursor: pointer">
                            <div data-u="prototype" class="p">
                                <div class=w><div data-u="thumbnailtemplate"></div></div>
                                <div class=c></div>
                            </div>
                        </div>
                    </div>

                    <div data-u="arrowleft" class="slider-arr slider-arr-l" data-autocenter="2">
                        <i class="icon-left"></i>
                    </div>
                    <div data-u="arrowright" class="slider-arr slider-arr-r" data-autocenter="2">
                        <i class="icon-right"></i>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="quick-sales">
                    <div class="item">
                        <a href="https://hoanghamobile.com/dien-thoai-di-dong/samsung-galaxy-s20-fe-256gb-chinh-hang?source=Sanphamhot" target="_blank">
                            <img src="https://cdn.hoanghamobile.com/i/home/Uploads/2023/12/05/galaxy-s20-fe.png" title="Samsung Galaxy S20 FE" alt="Samsung Galaxy S20 FE" />
                        </a>
                    </div>
                    <div class="item">
                        <a href="https://hoanghamobile.comchi-tiet-san-pham.php?idsanpham=<?=$itemApple['productId']?>?source=Sanphamhot" target="_blank">
                            <img src="https://cdn.hoanghamobile.com/i/home/Uploads/2023/11/27/macbook-air.png" title="MacBook Air M1 8GB/256GB" alt="MacBook Air M1 8GB/256GB" />
                        </a>
                    </div>
                    <div class="item">
                        <a href="https://hoanghamobile.com/dien-thoai-di-dong/xiaomi-redmi-13c-6gb-128gb-chinh-hang?source=Sanphamhot" target="_blank">
                            <img src="https://cdn.hoanghamobile.com/i/home/Uploads/2023/11/17/redmi-13c_638358386471916868.png" title="Redmi 13C (6GB/128GB)" alt="Redmi 13C (6GB/128GB)" />
                        </a>
                    </div>
                    <div class="item">
                        <a href="https://hoanghamobile.com/laptop/laptop-asus-vivobook-14-x1404va-nk125w-chinh-hang?source=Sanphamhot" target="_blank">
                            <img src="https://cdn.hoanghamobile.com/i/home/Uploads/2023/11/22/vivobook-14.png" title="Laptop ASUS Vivobook 14 X1404VA-NK125W" alt="Laptop ASUS Vivobook 14 X1404VA-NK125W" />
                        </a>
                    </div>
            </div>
        </div>
    </section>
    <!-- flash sales -->
    <section class="fls" id="fls_6" style="display:block">
        <div class="container">
            <div class="flash-sales">
                <div class="header">
                    <h3>F<i class="icon-flash"></i>ASH SALE ONLINE</h3>
                    <ul class="flash-sale-nav">
                            <li>
                                <a class="actived" href="javascript:showFLS('fls_6');">Điện thoại/Tablet</a>
                            </li>
                            <li>
                                <a class="" href="javascript:showFLS('fls_8');">Laptop/M&#224;n h&#236;nh/Tivi</a>
                            </li>
                            <li>
                                <a class="" href="javascript:showFLS('fls_9');">Đồng hồ/Phụ kiện/kh&#225;c</a>
                            </li>
                    </ul>
                        <div class="timer" id="timer_6" data-start="December 06, 2023 11:33:31" data-end="December 11, 2023 00:00:00"></div>
                </div>

                <div class="content">
                    

                    <div class="owl-carousel lr-slider">
                            <div class="item">
                                <div class="img">
                                    <a href="/dien-thoai-di-dong/samsung-galaxy-a23-5g-chinh-hang" title="Samsung Galaxy A23 5G - Ch&#237;nh h&#227;ng (A236)"><img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2022/10/20/image-removebg-preview-28.png" alt="Samsung Galaxy A23 5G - Ch&#237;nh h&#227;ng (A236)"></a>
                                </div>
                                <div class="info">
                                    <a class="title" href="/dien-thoai-di-dong/samsung-galaxy-a23-5g-chinh-hang">Samsung Galaxy A23 5G - Ch&#237;nh h&#227;ng (A236)</a>
                                    <span class="price">
                                        <strong>4,390,000 ₫</strong>
                                        <strike>5,990,000 ₫</strike>
                                    </span>

                                </div>
                            </div>
                            <div class="item">
                                <div class="img">
                                    <a href="/dien-thoai-di-dong/samsung-galaxy-a54-5g-8gb-128gb-chinh-hang" title="Samsung Galaxy A54 5G 8GB/128GB - Ch&#237;nh h&#227;ng"><img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/12/05/anh-chup-man-hinh-2023-05-27-luc-21-06-44-removebg-preview.png" alt="Samsung Galaxy A54 5G 8GB/128GB - Ch&#237;nh h&#227;ng"></a>
                                </div>
                                <div class="info">
                                    <a class="title" href="/dien-thoai-di-dong/samsung-galaxy-a54-5g-8gb-128gb-chinh-hang">Samsung Galaxy A54 5G 8GB/128GB - Ch&#237;nh h&#227;ng</a>
                                    <span class="price">
                                        <strong>8,590,000 ₫</strong>
                                        <strike>10,490,000 ₫</strike>
                                    </span>

                                </div>
                            </div>
                            <div class="item">
                                <div class="img">
                                    <a href="/dien-thoai-di-dong/samsung-galaxy-s20-fe-256gb-chinh-hang" title="Samsung Galaxy S20 FE 256GB - Ch&#237;nh h&#227;ng "><img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/12/05/s20-fe-mint-1.png" alt="Samsung Galaxy S20 FE 256GB - Ch&#237;nh h&#227;ng "></a>
                                </div>
                                <div class="info">
                                    <a class="title" href="/dien-thoai-di-dong/samsung-galaxy-s20-fe-256gb-chinh-hang">Samsung Galaxy S20 FE 256GB - Ch&#237;nh h&#227;ng </a>
                                    <span class="price">
                                        <strong>6,790,000 ₫</strong>
                                        <strike>15,490,000 ₫</strike>
                                    </span>

                                </div>
                            </div>
                            <div class="item">
                                <div class="img">
                                    <a href="/dien-thoai-di-dong/samsung-galaxy-s22-Ultra-8gb-128gb-chinh-hang" title="Samsung Galaxy S22 Ultra - 8GB/128GB - Ch&#237;nh h&#227;ng"><img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2022/02/09/image-removebg-preview-19.png" alt="Samsung Galaxy S22 Ultra - 8GB/128GB - Ch&#237;nh h&#227;ng"></a>
                                </div>
                                <div class="info">
                                    <a class="title" href="/dien-thoai-di-dong/samsung-galaxy-s22-Ultra-8gb-128gb-chinh-hang">Samsung Galaxy S22 Ultra - 8GB/128GB - Ch&#237;nh h&#227;ng</a>
                                    <span class="price">
                                        <strong>16,590,000 ₫</strong>
                                        <strike>30,990,000 ₫</strike>
                                    </span>

                                </div>
                            </div>
                            <div class="item">
                                <div class="img">
                                    <a href="/may-tinh-bang/may-tinh-bang-htc-a103-4gb-64gb-chinh-hang" title="HTC A103 - 10 - 4G LTE - (4GB/64GB) - Ch&#237;nh h&#227;ng"><img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/08/24/htc-a103-6.png" alt="HTC A103 - 10 - 4G LTE - (4GB/64GB) - Ch&#237;nh h&#227;ng"></a>
                                </div>
                                <div class="info">
                                    <a class="title" href="/may-tinh-bang/may-tinh-bang-htc-a103-4gb-64gb-chinh-hang">HTC A103 - 10 - 4G LTE - (4GB/64GB) - Ch&#237;nh h&#227;ng</a>
                                    <span class="price">
                                        <strong>1,990,000 ₫</strong>
                                        <strike>3,990,000 ₫</strike>
                                    </span>

                                </div>
                            </div>
                            <div class="item">
                                <div class="img">
                                    <a href="/dien-thoai-di-dong/samsung-galaxy-a05-chinh-hang" title="Samsung Galaxy A05 - 4GB/128GB - Ch&#237;nh h&#227;ng"><img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/12/05/a05.png" alt="Samsung Galaxy A05 - 4GB/128GB - Ch&#237;nh h&#227;ng"></a>
                                </div>
                                <div class="info">
                                    <a class="title" href="/dien-thoai-di-dong/samsung-galaxy-a05-chinh-hang">Samsung Galaxy A05 - 4GB/128GB - Ch&#237;nh h&#227;ng</a>
                                    <span class="price">
                                        <strong>2,790,000 ₫</strong>
                                        <strike>3,090,000 ₫</strike>
                                    </span>

                                </div>
                            </div>
                            <div class="item">
                                <div class="img">
                                    <a href="/dien-thoai-di-dong/redmi-note-12-4gb-128gb-chinh-hang" title="Redmi Note 12 (4GB/128GB) - Ch&#237;nh h&#227;ng"><img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/03/24/redminote12-0.png" alt="Redmi Note 12 (4GB/128GB) - Ch&#237;nh h&#227;ng"></a>
                                </div>
                                <div class="info">
                                    <a class="title" href="/dien-thoai-di-dong/redmi-note-12-4gb-128gb-chinh-hang">Redmi Note 12 (4GB/128GB) - Ch&#237;nh h&#227;ng</a>
                                    <span class="price">
                                        <strong>3,990,000 ₫</strong>
                                        <strike>4,990,000 ₫</strike>
                                    </span>

                                </div>
                            </div>
                            <div class="item">
                                <div class="img">
                                    <a href="/dien-thoai-di-dong/samsung-galaxy-a05s-4gb-128gb-chinh-hang" title="Samsung Galaxy A05S - 4GB/128GB - Ch&#237;nh h&#227;ng"><img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/09/27/samsung-galaxy-a05-1.png" alt="Samsung Galaxy A05S - 4GB/128GB - Ch&#237;nh h&#227;ng"></a>
                                </div>
                                <div class="info">
                                    <a class="title" href="/dien-thoai-di-dong/samsung-galaxy-a05s-4gb-128gb-chinh-hang">Samsung Galaxy A05S - 4GB/128GB - Ch&#237;nh h&#227;ng</a>
                                    <span class="price">
                                        <strong>3,350,000 ₫</strong>
                                        <strike>3,990,000 ₫</strike>
                                    </span>

                                </div>
                            </div>
                            <div class="item">
                                <div class="img">
                                    <a href="/dien-thoai-di-dong/oppo-a18-4gb-128gb-chinh-hang" title="OPPO A18 4GB/128GB - Ch&#237;nh h&#227;ng"><img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/10/31/thumb-xanh.png" alt="OPPO A18 4GB/128GB - Ch&#237;nh h&#227;ng"></a>
                                </div>
                                <div class="info">
                                    <a class="title" href="/dien-thoai-di-dong/oppo-a18-4gb-128gb-chinh-hang">OPPO A18 4GB/128GB - Ch&#237;nh h&#227;ng</a>
                                    <span class="price">
                                        <strong>3,990,000 ₫</strong>
                                        <strike>3,990,000 ₫</strike>
                                    </span>

                                </div>
                            </div>
                            <div class="item">
                                <div class="img">
                                    <a href="/dien-thoai-di-dong/tecno-pova-5-8gb-128gb-chinh-hang" title="TECNO POVA 5 (8GB/128GB) - Ch&#237;nh h&#227;ng"><img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/12/05/tecno-pova-5.png" alt="TECNO POVA 5 (8GB/128GB) - Ch&#237;nh h&#227;ng"></a>
                                </div>
                                <div class="info">
                                    <a class="title" href="/dien-thoai-di-dong/tecno-pova-5-8gb-128gb-chinh-hang">TECNO POVA 5 (8GB/128GB) - Ch&#237;nh h&#227;ng</a>
                                    <span class="price">
                                        <strong>3,990,000 ₫</strong>
                                        <strike>4,490,000 ₫</strike>
                                    </span>

                                </div>
                            </div>
                            <div class="item">
                                <div class="img">
                                    <a href="/dien-thoai-di-dong/samsung-galaxy-a34-5g-8gb-128gb-chinh-hang" title="Samsung Galaxy A34 5G 8GB/128GB - Ch&#237;nh h&#227;ng"><img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/05/17/a34-3.png" alt="Samsung Galaxy A34 5G 8GB/128GB - Ch&#237;nh h&#227;ng"></a>
                                </div>
                                <div class="info">
                                    <a class="title" href="/dien-thoai-di-dong/samsung-galaxy-a34-5g-8gb-128gb-chinh-hang">Samsung Galaxy A34 5G 8GB/128GB - Ch&#237;nh h&#227;ng</a>
                                    <span class="price">
                                        <strong>6,790,000 ₫</strong>
                                        <strike>8,490,000 ₫</strike>
                                    </span>

                                </div>
                            </div>
                            <div class="item">
                                <div class="img">
                                    <a href="/dien-thoai-di-dong/infinix-hot-30i-8gb-128gb-chinh-hang" title="Infinix HOT 30i (8GB/128GB) - Ch&#237;nh h&#227;ng"><img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/10/24/infinix-hot-30i.png" alt="Infinix HOT 30i (8GB/128GB) - Ch&#237;nh h&#227;ng"></a>
                                </div>
                                <div class="info">
                                    <a class="title" href="/dien-thoai-di-dong/infinix-hot-30i-8gb-128gb-chinh-hang">Infinix HOT 30i (8GB/128GB) - Ch&#237;nh h&#227;ng</a>
                                    <span class="price">
                                        <strong>2,590,000 ₫</strong>
                                        <strike>3,290,000 ₫</strike>
                                    </span>

                                </div>
                            </div>
                            <div class="item">
                                <div class="img">
                                    <a href="/dien-thoai-di-dong/samsung-galaxy-z-fold5-256gb-12gb-chinh-hang" title="Samsung Galaxy Z Fold5 12GB/256GB - Ch&#237;nh h&#227;ng"><img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/12/05/fold-5-chinh-thuc.png" alt="Samsung Galaxy Z Fold5 12GB/256GB - Ch&#237;nh h&#227;ng"></a>
                                </div>
                                <div class="info">
                                    <a class="title" href="/dien-thoai-di-dong/samsung-galaxy-z-fold5-256gb-12gb-chinh-hang">Samsung Galaxy Z Fold5 12GB/256GB - Ch&#237;nh h&#227;ng</a>
                                    <span class="price">
                                        <strong>35,760,000 ₫</strong>
                                        <strike>40,990,000 ₫</strike>
                                    </span>

                                </div>
                            </div>
                            <div class="item">
                                <div class="img">
                                    <a href="/dien-thoai-di-dong/samsung-galaxy-z-flip5-256gb-chinh-hang" title="Samsung Galaxy Z Flip5 8GB/256GB - Ch&#237;nh h&#227;ng"><img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/11/29/galaxy-z-flip5.png" alt="Samsung Galaxy Z Flip5 8GB/256GB - Ch&#237;nh h&#227;ng"></a>
                                </div>
                                <div class="info">
                                    <a class="title" href="/dien-thoai-di-dong/samsung-galaxy-z-flip5-256gb-chinh-hang">Samsung Galaxy Z Flip5 8GB/256GB - Ch&#237;nh h&#227;ng</a>
                                    <span class="price">
                                        <strong>21,210,000 ₫</strong>
                                        <strike>25,990,000 ₫</strike>
                                    </span>

                                </div>
                            </div>
                            <div class="item">
                                <div class="img">
                                    <a href="/may-tinh-bang/may-tinh-bang-yuho-tab-8-TC8091-3gb-32gb-chinh-hang" title="M&#225;y t&#237;nh bảng  Yuho Tab 8 (TC8091) 3GB/32GB - Ch&#237;nh h&#227;ng"><img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/03/02/yuho.png" alt="M&#225;y t&#237;nh bảng  Yuho Tab 8 (TC8091) 3GB/32GB - Ch&#237;nh h&#227;ng"></a>
                                </div>
                                <div class="info">
                                    <a class="title" href="/may-tinh-bang/may-tinh-bang-yuho-tab-8-TC8091-3gb-32gb-chinh-hang">M&#225;y t&#237;nh bảng  Yuho Tab 8 (TC8091) 3GB/32GB - Ch&#237;nh h&#227;ng</a>
                                    <span class="price">
                                        <strong>1,090,000 ₫</strong>
                                        <strike>3,990,000 ₫</strike>
                                    </span>

                                </div>
                            </div>
                            <div class="item">
                                <div class="img">
                                    <a href="/dien-thoai-di-dong/nokia-c32-4gb-128gb-chinh-hang" title="Nokia C32 (4GB/128GB) - Ch&#237;nh h&#227;ng"><img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/06/28/nokia-c32-0.png" alt="Nokia C32 (4GB/128GB) - Ch&#237;nh h&#227;ng"></a>
                                </div>
                                <div class="info">
                                    <a class="title" href="/dien-thoai-di-dong/nokia-c32-4gb-128gb-chinh-hang">Nokia C32 (4GB/128GB) - Ch&#237;nh h&#227;ng</a>
                                    <span class="price">
                                        <strong>2,790,000 ₫</strong>
                                        <strike>3,290,000 ₫</strike>
                                    </span>

                                </div>
                            </div>
                            <div class="item">
                                <div class="img">
                                    <a href="/dien-thoai-di-dong/redmi-note-12-8gb-128gb-chinh-hang" title="Redmi Note 12 (8GB/128GB) - Ch&#237;nh h&#227;ng"><img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/03/24/redminote12-0.png" alt="Redmi Note 12 (8GB/128GB) - Ch&#237;nh h&#227;ng"></a>
                                </div>
                                <div class="info">
                                    <a class="title" href="/dien-thoai-di-dong/redmi-note-12-8gb-128gb-chinh-hang">Redmi Note 12 (8GB/128GB) - Ch&#237;nh h&#227;ng</a>
                                    <span class="price">
                                        <strong>4,790,000 ₫</strong>
                                        <strike>5,790,000 ₫</strike>
                                    </span>

                                </div>
                            </div>
                            <div class="item">
                                <div class="img">
                                    <a href="/dien-thoai-di-dong/redmi-note-12s-8gb-256gb-chinh-hang" title="Redmi Note 12S (8GB/256GB) - Ch&#237;nh h&#227;ng"><img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/05/11/note12s.png" alt="Redmi Note 12S (8GB/256GB) - Ch&#237;nh h&#227;ng"></a>
                                </div>
                                <div class="info">
                                    <a class="title" href="/dien-thoai-di-dong/redmi-note-12s-8gb-256gb-chinh-hang">Redmi Note 12S (8GB/256GB) - Ch&#237;nh h&#227;ng</a>
                                    <span class="price">
                                        <strong>5,490,000 ₫</strong>
                                        <strike>6,690,000 ₫</strike>
                                    </span>

                                </div>
                            </div>
                            <div class="item">
                                <div class="img">
                                    <a href="/may-tinh-bang/samsung-galaxy-tab-s9-fe-wifi-6gb-128gb" title="Samsung Galaxy Tab S9 FE Wifi 6GB/128GB"><img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/10/11/tab-s9-fe-1.png" alt="Samsung Galaxy Tab S9 FE Wifi 6GB/128GB"></a>
                                </div>
                                <div class="info">
                                    <a class="title" href="/may-tinh-bang/samsung-galaxy-tab-s9-fe-wifi-6gb-128gb">Samsung Galaxy Tab S9 FE Wifi 6GB/128GB</a>
                                    <span class="price">
                                        <strong>8,990,000 ₫</strong>
                                        <strike>9,990,000 ₫</strike>
                                    </span>

                                </div>
                            </div>
                            <div class="item">
                                <div class="img">
                                    <a href="/may-tinh-bang/samsung-galaxy-tab-a9-wifi-4gb-64gb-chinh-hang" title="Samsung Galaxy Tab A9 Wifi 4GB/64GB - Ch&#237;nh h&#227;ng"><img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/10/30/galaxy-tab-a9-8.png" alt="Samsung Galaxy Tab A9 Wifi 4GB/64GB - Ch&#237;nh h&#227;ng"></a>
                                </div>
                                <div class="info">
                                    <a class="title" href="/may-tinh-bang/samsung-galaxy-tab-a9-wifi-4gb-64gb-chinh-hang">Samsung Galaxy Tab A9 Wifi 4GB/64GB - Ch&#237;nh h&#227;ng</a>
                                    <span class="price">
                                        <strong>3,650,000 ₫</strong>
                                        <strike>3,990,000 ₫</strike>
                                    </span>

                                </div>
                            </div>
                            <div class="item">
                                <div class="img">
                                    <a href="/dien-thoai-di-dong/redmi-12c-4gb-64gb-chinh-hang" title="Redmi 12C (4GB/64GB) - Ch&#237;nh h&#227;ng"><img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/03/21/redmi12c.png" alt="Redmi 12C (4GB/64GB) - Ch&#237;nh h&#227;ng"></a>
                                </div>
                                <div class="info">
                                    <a class="title" href="/dien-thoai-di-dong/redmi-12c-4gb-64gb-chinh-hang">Redmi 12C (4GB/64GB) - Ch&#237;nh h&#227;ng</a>
                                    <span class="price">
                                        <strong>2,490,000 ₫</strong>
                                        <strike>3,590,000 ₫</strike>
                                    </span>

                                </div>
                            </div>
                            <div class="item">
                                <div class="img">
                                    <a href="/dien-thoai-di-dong/xiaomi-13-Lite-8gb-256gb-chinh-hang" title="Xiaomi 13 Lite (8GB/256GB) - Ch&#237;nh h&#227;ng"><img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/02/27/thumb-xiaomi-13-lite.png" alt="Xiaomi 13 Lite (8GB/256GB) - Ch&#237;nh h&#227;ng"></a>
                                </div>
                                <div class="info">
                                    <a class="title" href="/dien-thoai-di-dong/xiaomi-13-Lite-8gb-256gb-chinh-hang">Xiaomi 13 Lite (8GB/256GB) - Ch&#237;nh h&#227;ng</a>
                                    <span class="price">
                                        <strong>9,490,000 ₫</strong>
                                        <strike>11,490,000 ₫</strike>
                                    </span>

                                </div>
                            </div>
                            <div class="item">
                                <div class="img">
                                    <a href="/dien-thoai-di-dong/tecno-spark-10-pro-8gb-128gb-chinh-hang" title="TECNO SPARK 10 Pro (8GB/128GB) - Ch&#237;nh h&#227;ng"><img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/11/22/tecno-spark-10-pro.png" alt="TECNO SPARK 10 Pro (8GB/128GB) - Ch&#237;nh h&#227;ng"></a>
                                </div>
                                <div class="info">
                                    <a class="title" href="/dien-thoai-di-dong/tecno-spark-10-pro-8gb-128gb-chinh-hang">TECNO SPARK 10 Pro (8GB/128GB) - Ch&#237;nh h&#227;ng</a>
                                    <span class="price">
                                        <strong>3,150,000 ₫</strong>
                                        <strike>3,990,000 ₫</strike>
                                    </span>

                                </div>
                            </div>
                            <div class="item">
                                <div class="img">
                                    <a href="/dien-thoai-di-dong/realme-c55-6gb-128gb-chinh-hang" title="realme C55 - 6GB/128GB - Ch&#237;nh h&#227;ng"><img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/03/13/c55-1-den.png" alt="realme C55 - 6GB/128GB - Ch&#237;nh h&#227;ng"></a>
                                </div>
                                <div class="info">
                                    <a class="title" href="/dien-thoai-di-dong/realme-c55-6gb-128gb-chinh-hang">realme C55 - 6GB/128GB - Ch&#237;nh h&#227;ng</a>
                                    <span class="price">
                                        <strong>3,690,000 ₫</strong>
                                        <strike>4,990,000 ₫</strike>
                                    </span>

                                </div>
                            </div>
                            <div class="item">
                                <div class="img">
                                    <a href="/dien-thoai-di-dong/realme-10-4g-8gb-256gb-chinh-hang" title="realme 10 4G 8GB/256GB - Ch&#237;nh h&#227;ng"><img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/01/11/image-removebg-preview-8.png" alt="realme 10 4G 8GB/256GB - Ch&#237;nh h&#227;ng"></a>
                                </div>
                                <div class="info">
                                    <a class="title" href="/dien-thoai-di-dong/realme-10-4g-8gb-256gb-chinh-hang">realme 10 4G 8GB/256GB - Ch&#237;nh h&#227;ng</a>
                                    <span class="price">
                                        <strong>6,090,000 ₫</strong>
                                        <strike>7,190,000 ₫</strike>
                                    </span>

                                </div>
                            </div>
                            <div class="item">
                                <div class="img">
                                    <a href="/dien-thoai-di-dong/reno8-t-5g-chinh-hang" title="OPPO Reno8 T 5G (8GB/128GB) - Ch&#237;nh h&#227;ng "><img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/01/12/image-removebg-preview-16.png" alt="OPPO Reno8 T 5G (8GB/128GB) - Ch&#237;nh h&#227;ng "></a>
                                </div>
                                <div class="info">
                                    <a class="title" href="/dien-thoai-di-dong/reno8-t-5g-chinh-hang">OPPO Reno8 T 5G (8GB/128GB) - Ch&#237;nh h&#227;ng </a>
                                    <span class="price">
                                        <strong>7,990,000 ₫</strong>
                                        <strike>9,990,000 ₫</strike>
                                    </span>

                                </div>
                            </div>
                            <div class="item">
                                <div class="img">
                                    <a href="/dien-thoai-di-dong/nokia-c21-plus-2gb-64gb-chinh-hang" title="Nokia C21 Plus (2GB/64GB) - Ch&#237;nh h&#227;ng"><img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2022/05/07/image-removebg-preview_637875529202208799.png" alt="Nokia C21 Plus (2GB/64GB) - Ch&#237;nh h&#227;ng"></a>
                                </div>
                                <div class="info">
                                    <a class="title" href="/dien-thoai-di-dong/nokia-c21-plus-2gb-64gb-chinh-hang">Nokia C21 Plus (2GB/64GB) - Ch&#237;nh h&#227;ng</a>
                                    <span class="price">
                                        <strong>1,780,000 ₫</strong>
                                        <strike>2,890,000 ₫</strike>
                                    </span>

                                </div>
                            </div>
                            <div class="item">
                                <div class="img">
                                    <a href="/may-tinh-bang/may-tinh-bang-huawei-matepad-se-lte-chinh-hang" title="M&#225;y t&#237;nh bảng Huawei MatePad SE (LTE) - Ch&#237;nh h&#227;ng"><img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2022/12/13/image-removebg-preview-2022-12-13t084823-161.png" alt="M&#225;y t&#237;nh bảng Huawei MatePad SE (LTE) - Ch&#237;nh h&#227;ng"></a>
                                </div>
                                <div class="info">
                                    <a class="title" href="/may-tinh-bang/may-tinh-bang-huawei-matepad-se-lte-chinh-hang">M&#225;y t&#237;nh bảng Huawei MatePad SE (LTE) - Ch&#237;nh h&#227;ng</a>
                                    <span class="price">
                                        <strong>4,990,000 ₫</strong>
                                        <strike>4,990,000 ₫</strike>
                                    </span>

                                </div>
                            </div>
                            <div class="item">
                                <div class="img">
                                    <a href="/may-tinh-bang/lenovo-tab-m10-gen-3-3gb-32gb-chinh-hang" title="Lenovo Tab M10 Gen 3 (3GB/32GB) - Ch&#237;nh h&#227;ng"><img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/03/28/lenovotabm10gen3-2.png" alt="Lenovo Tab M10 Gen 3 (3GB/32GB) - Ch&#237;nh h&#227;ng"></a>
                                </div>
                                <div class="info">
                                    <a class="title" href="/may-tinh-bang/lenovo-tab-m10-gen-3-3gb-32gb-chinh-hang">Lenovo Tab M10 Gen 3 (3GB/32GB) - Ch&#237;nh h&#227;ng</a>
                                    <span class="price">
                                        <strong>4,290,000 ₫</strong>
                                        <strike>5,990,000 ₫</strike>
                                    </span>

                                </div>
                            </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- flash sales -->
    <section class="fls" id="fls_8" style="display:none">
        <div class="container">
            <div class="flash-sales">
                <div class="header">
                    <h3>F<i class="icon-flash"></i>ASH SALE ONLINE</h3>
                    <ul class="flash-sale-nav">
                            <li>
                                <a class="" href="javascript:showFLS('fls_6');">Điện thoại/Tablet</a>
                            </li>
                            <li>
                                <a class="actived" href="javascript:showFLS('fls_8');">Laptop/M&#224;n h&#236;nh/Tivi</a>
                            </li>
                            <li>
                                <a class="" href="javascript:showFLS('fls_9');">Đồng hồ/Phụ kiện/kh&#225;c</a>
                            </li>
                    </ul>
                        <div class="timer" id="timer_8" data-start="December 06, 2023 11:33:31" data-end="December 11, 2023 00:00:00"></div>
                </div>

                <div class="content">
                    

                    <div class="owl-carousel lr-slider">
                            <div class="item">
                                <div class="img">
                                    <a href="/laptop/laptop-hp-15s-fq5159tu-7c0s0pa-chinh-hang" title="Laptop HP 15s-fq5159TU (7C0S0PA) - Ch&#237;nh h&#227;ng"><img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/09/05/7c0s0pa-0.jpg" alt="Laptop HP 15s-fq5159TU (7C0S0PA) - Ch&#237;nh h&#227;ng"></a>
                                </div>
                                <div class="info">
                                    <a class="title" href="/laptop/laptop-hp-15s-fq5159tu-7c0s0pa-chinh-hang">Laptop HP 15s-fq5159TU (7C0S0PA) - Ch&#237;nh h&#227;ng</a>
                                    <span class="price">
                                        <strong>15,790,000 ₫</strong>
                                        <strike>20,590,000 ₫</strike>
                                    </span>

                                </div>
                            </div>
                            <div class="item">
                                <div class="img">
                                    <a href="/laptop/laptop-lenovo-v14-g3-iap-82tsa071vn-chinh-hang" title="Laptop Lenovo V14 G3 IAP 82TSA071VN - Ch&#237;nh h&#227;ng"><img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/10/16/82tsa071vn_638330646964781206.jpg" alt="Laptop Lenovo V14 G3 IAP 82TSA071VN - Ch&#237;nh h&#227;ng"></a>
                                </div>
                                <div class="info">
                                    <a class="title" href="/laptop/laptop-lenovo-v14-g3-iap-82tsa071vn-chinh-hang">Laptop Lenovo V14 G3 IAP 82TSA071VN - Ch&#237;nh h&#227;ng</a>
                                    <span class="price">
                                        <strong>7,490,000 ₫</strong>
                                        <strike>10,990,000 ₫</strike>
                                    </span>

                                </div>
                            </div>
                            <div class="item">
                                <div class="img">
                                    <a href="/laptop/laptop-lenovo-thinkpad-e14-gen-4-21e300e4vn-chinh-hang" title="Laptop Lenovo ThinkPad E14 Gen 4 - 21E300E4VN - Ch&#237;nh h&#227;ng"><img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/10/12/21e300e4vn-0.jpg" alt="Laptop Lenovo ThinkPad E14 Gen 4 - 21E300E4VN - Ch&#237;nh h&#227;ng"></a>
                                </div>
                                <div class="info">
                                    <a class="title" href="/laptop/laptop-lenovo-thinkpad-e14-gen-4-21e300e4vn-chinh-hang">Laptop Lenovo ThinkPad E14 Gen 4 - 21E300E4VN - Ch&#237;nh h&#227;ng</a>
                                    <span class="price">
                                        <strong>17,990,000 ₫</strong>
                                        <strike>24,990,000 ₫</strike>
                                    </span>

                                </div>
                            </div>
                            <div class="item">
                                <div class="img">
                                    <a href="/laptop/laptop-asus-zenbook-14-oled-ux3402va-km085w-chinh-hang" title="Laptop ASUS Zenbook 14 OLED UX3402VA-KM085W - Ch&#237;nh h&#227;ng"><img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/10/16/ux3402va-km085w.jpg" alt="Laptop ASUS Zenbook 14 OLED UX3402VA-KM085W - Ch&#237;nh h&#227;ng"></a>
                                </div>
                                <div class="info">
                                    <a class="title" href="/laptop/laptop-asus-zenbook-14-oled-ux3402va-km085w-chinh-hang">Laptop ASUS Zenbook 14 OLED UX3402VA-KM085W - Ch&#237;nh h&#227;ng</a>
                                    <span class="price">
                                        <strong>22,790,000 ₫</strong>
                                        <strike>27,990,000 ₫</strike>
                                    </span>

                                </div>
                            </div>
                            <div class="item">
                                <div class="img">
                                    <a href="/laptop/laptop-hp-envy-16-h0034tx-6k7g0pa-i7-12700h-16gb-512gb-rtx-3060-6gb-16-inch" title="Laptop HP Envy 16 h0034TX-6K7G0PA - Ch&#237;nh h&#227;ng"><img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/03/15/laptop-hp-envy-16-h0034tx-6k7g0pa-01.jpg" alt="Laptop HP Envy 16 h0034TX-6K7G0PA - Ch&#237;nh h&#227;ng"></a>
                                </div>
                                <div class="info">
                                    <a class="title" href="/laptop/laptop-hp-envy-16-h0034tx-6k7g0pa-i7-12700h-16gb-512gb-rtx-3060-6gb-16-inch">Laptop HP Envy 16 h0034TX-6K7G0PA - Ch&#237;nh h&#227;ng</a>
                                    <span class="price">
                                        <strong>36,990,000 ₫</strong>
                                        <strike>48,990,000 ₫</strike>
                                    </span>

                                </div>
                            </div>
                            <div class="item">
                                <div class="img">
                                    <a href="/laptop/laptop-hp-pavilion-15-eg3093tu-8c5l4pa-chinh-hang" title="Laptop HP Pavilion 15-eg3093TU (8C5L4PA) - Ch&#237;nh h&#227;ng"><img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/10/13/8c5l4pa.jpg" alt="Laptop HP Pavilion 15-eg3093TU (8C5L4PA) - Ch&#237;nh h&#227;ng"></a>
                                </div>
                                <div class="info">
                                    <a class="title" href="/laptop/laptop-hp-pavilion-15-eg3093tu-8c5l4pa-chinh-hang">Laptop HP Pavilion 15-eg3093TU (8C5L4PA) - Ch&#237;nh h&#227;ng</a>
                                    <span class="price">
                                        <strong>18,790,000 ₫</strong>
                                        <strike>21,299,000 ₫</strike>
                                    </span>

                                </div>
                            </div>
                            <div class="item">
                                <div class="img">
                                    <a href="/laptop/laptop-asus-tuf-gaming-f15-fx507zc4-hn074w-chinh-hang" title="Laptop ASUS TUF Gaming F15 FX507ZC4-HN074W - Ch&#237;nh h&#227;ng"><img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/08/25/hn074w-0.jpg" alt="Laptop ASUS TUF Gaming F15 FX507ZC4-HN074W - Ch&#237;nh h&#227;ng"></a>
                                </div>
                                <div class="info">
                                    <a class="title" href="/laptop/laptop-asus-tuf-gaming-f15-fx507zc4-hn074w-chinh-hang">Laptop ASUS TUF Gaming F15 FX507ZC4-HN074W - Ch&#237;nh h&#227;ng</a>
                                    <span class="price">
                                        <strong>19,490,000 ₫</strong>
                                        <strike>25,990,000 ₫</strike>
                                    </span>

                                </div>
                            </div>
                            <div class="item">
                                <div class="img">
                                    <a href="/laptop/laptop-asus-gaming-tuf-fx506lhb-hn188w-chinh-hang" title="Laptop ASUS TUF Gaming FX506LHB-HN188W - Ch&#237;nh h&#227;ng"><img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/03/08/laptop-asus-gaming-tuf-fx506lhb-hn188w-01.jpg" alt="Laptop ASUS TUF Gaming FX506LHB-HN188W - Ch&#237;nh h&#227;ng"></a>
                                </div>
                                <div class="info">
                                    <a class="title" href="/laptop/laptop-asus-gaming-tuf-fx506lhb-hn188w-chinh-hang">Laptop ASUS TUF Gaming FX506LHB-HN188W - Ch&#237;nh h&#227;ng</a>
                                    <span class="price">
                                        <strong>14,490,000 ₫</strong>
                                        <strike>21,990,000 ₫</strike>
                                    </span>

                                </div>
                            </div>
                            <div class="item">
                                <div class="img">
                                    <a href="/laptop/laptop-asus-tuf-gaming-f15-fx507zu4-lp040w-chinh-hang" title="Laptop ASUS TUF Gaming F15 FX507ZU4-LP040W - Ch&#237;nh h&#227;ng"><img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/10/31/lp040w.jpg" alt="Laptop ASUS TUF Gaming F15 FX507ZU4-LP040W - Ch&#237;nh h&#227;ng"></a>
                                </div>
                                <div class="info">
                                    <a class="title" href="/laptop/laptop-asus-tuf-gaming-f15-fx507zu4-lp040w-chinh-hang">Laptop ASUS TUF Gaming F15 FX507ZU4-LP040W - Ch&#237;nh h&#227;ng</a>
                                    <span class="price">
                                        <strong>26,990,000 ₫</strong>
                                        <strike>31,990,000 ₫</strike>
                                    </span>

                                </div>
                            </div>
                            <div class="item">
                                <div class="img">
                                    <a href="/laptop/laptop-gaming-msi-thin-gf63-12uc-887vn-chinh-hang" title="Laptop Gaming MSI Thin GF63 12UC-887VN - Ch&#237;nh h&#227;ng"><img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/10/23/12uc-887vn.jpg" alt="Laptop Gaming MSI Thin GF63 12UC-887VN - Ch&#237;nh h&#227;ng"></a>
                                </div>
                                <div class="info">
                                    <a class="title" href="/laptop/laptop-gaming-msi-thin-gf63-12uc-887vn-chinh-hang">Laptop Gaming MSI Thin GF63 12UC-887VN - Ch&#237;nh h&#227;ng</a>
                                    <span class="price">
                                        <strong>20,390,000 ₫</strong>
                                        <strike>20,990,000 ₫</strike>
                                    </span>

                                </div>
                            </div>
                            <div class="item">
                                <div class="img">
                                    <a href="/laptop/laptop-msi-summit-e14-evo-a12m-211vn-chinh-hang" title="Laptop MSI Summit E14 Evo A12M-211VN - Ch&#237;nh h&#227;ng"><img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/08/15/211vn.jpg" alt="Laptop MSI Summit E14 Evo A12M-211VN - Ch&#237;nh h&#227;ng"></a>
                                </div>
                                <div class="info">
                                    <a class="title" href="/laptop/laptop-msi-summit-e14-evo-a12m-211vn-chinh-hang">Laptop MSI Summit E14 Evo A12M-211VN - Ch&#237;nh h&#227;ng</a>
                                    <span class="price">
                                        <strong>21,990,000 ₫</strong>
                                        <strike>25,990,000 ₫</strike>
                                    </span>

                                </div>
                            </div>
                            <div class="item">
                                <div class="img">
                                    <a href="/laptop/laptop-acer-swift-x-sfx16-51g-50gs-i5-11320h-16gb-512gb-rtx3050ti-16-1fhd" title="Laptop Acer Swift X SFX16-51G-50GS - Ch&#237;nh h&#227;ng"><img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/03/06/laptop-acer-swift-x-sfx16-51g-50gs-01.jpg" alt="Laptop Acer Swift X SFX16-51G-50GS - Ch&#237;nh h&#227;ng"></a>
                                </div>
                                <div class="info">
                                    <a class="title" href="/laptop/laptop-acer-swift-x-sfx16-51g-50gs-i5-11320h-16gb-512gb-rtx3050ti-16-1fhd">Laptop Acer Swift X SFX16-51G-50GS - Ch&#237;nh h&#227;ng</a>
                                    <span class="price">
                                        <strong>20,990,000 ₫</strong>
                                        <strike>27,990,000 ₫</strike>
                                    </span>

                                </div>
                            </div>
                            <div class="item">
                                <div class="img">
                                    <a href="/lap-top/laptop-huawei-matebook-14-R5-5500U" title="Laptop HUAWEI MateBook 14 AMD 2021 - Ch&#237;nh h&#227;ng"><img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/03/06/laptop-huawei-matebook-14-01.jpg" alt="Laptop HUAWEI MateBook 14 AMD 2021 - Ch&#237;nh h&#227;ng"></a>
                                </div>
                                <div class="info">
                                    <a class="title" href="/lap-top/laptop-huawei-matebook-14-R5-5500U">Laptop HUAWEI MateBook 14 AMD 2021 - Ch&#237;nh h&#227;ng</a>
                                    <span class="price">
                                        <strong>16,890,000 ₫</strong>
                                        <strike>20,990,000 ₫</strike>
                                    </span>

                                </div>
                            </div>
                            <div class="item">
                                <div class="img">
                                    <a href="/laptop/laptop-dell-inspiron-15-3530-71014840-chinh-hang" title="Laptop Dell Inspiron 15 3530-71014840 - Ch&#237;nh h&#227;ng"><img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/10/26/71014840.jpg" alt="Laptop Dell Inspiron 15 3530-71014840 - Ch&#237;nh h&#227;ng"></a>
                                </div>
                                <div class="info">
                                    <a class="title" href="/laptop/laptop-dell-inspiron-15-3530-71014840-chinh-hang">Laptop Dell Inspiron 15 3530-71014840 - Ch&#237;nh h&#227;ng</a>
                                    <span class="price">
                                        <strong>18,490,000 ₫</strong>
                                        <strike>20,490,000 ₫</strike>
                                    </span>

                                </div>
                            </div>
                            <div class="item">
                                <div class="img">
                                    <a href="/man-hinh/man-hinh-msi-pro-mp223-chinh-hang" title="M&#224;n h&#236;nh MSI PRO MP223 - Ch&#237;nh h&#227;ng"><img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/05/26/mp223-1.png" alt="M&#224;n h&#236;nh MSI PRO MP223 - Ch&#237;nh h&#227;ng"></a>
                                </div>
                                <div class="info">
                                    <a class="title" href="/man-hinh/man-hinh-msi-pro-mp223-chinh-hang">M&#224;n h&#236;nh MSI PRO MP223 - Ch&#237;nh h&#227;ng</a>
                                    <span class="price">
                                        <strong>1,690,000 ₫</strong>
                                        <strike>2,599,000 ₫</strike>
                                    </span>

                                </div>
                            </div>
                            <div class="item">
                                <div class="img">
                                    <a href="/man-hinh-may-tinh/man-hinh-asus-va24ehf-chinh-hang" title="M&#224;n h&#236;nh Asus VA24EHF - Ch&#237;nh h&#227;ng"><img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/06/29/va24ehf-01.jpg" alt="M&#224;n h&#236;nh Asus VA24EHF - Ch&#237;nh h&#227;ng"></a>
                                </div>
                                <div class="info">
                                    <a class="title" href="/man-hinh-may-tinh/man-hinh-asus-va24ehf-chinh-hang">M&#224;n h&#236;nh Asus VA24EHF - Ch&#237;nh h&#227;ng</a>
                                    <span class="price">
                                        <strong>2,380,000 ₫</strong>
                                        <strike>3,490,000 ₫</strike>
                                    </span>

                                </div>
                            </div>
                            <div class="item">
                                <div class="img">
                                    <a href="/tivi/tv-xiaomi-a-hd-32-inch-chinh-hang" title="Xiaomi Google Tivi HD 32 inch 32A - Ch&#237;nh h&#227;ng"><img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/07/27/a-32-front.png" alt="Xiaomi Google Tivi HD 32 inch 32A - Ch&#237;nh h&#227;ng"></a>
                                </div>
                                <div class="info">
                                    <a class="title" href="/tivi/tv-xiaomi-a-hd-32-inch-chinh-hang">Xiaomi Google Tivi HD 32 inch 32A - Ch&#237;nh h&#227;ng</a>
                                    <span class="price">
                                        <strong>3,790,000 ₫</strong>
                                        <strike>4,490,000 ₫</strike>
                                    </span>

                                </div>
                            </div>
                            <div class="item">
                                <div class="img">
                                    <a href="/tivi/tv-xiaomi-a-pro-4k-55-inch-chinh-hang" title="Xiaomi Google Tivi 4K 55 inch 55A Pro - Ch&#237;nh h&#227;ng"><img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/12/06/xiaomi-google-tivi-4k-55-inch-55a-pro.png" alt="Xiaomi Google Tivi 4K 55 inch 55A Pro - Ch&#237;nh h&#227;ng"></a>
                                </div>
                                <div class="info">
                                    <a class="title" href="/tivi/tv-xiaomi-a-pro-4k-55-inch-chinh-hang">Xiaomi Google Tivi 4K 55 inch 55A Pro - Ch&#237;nh h&#227;ng</a>
                                    <span class="price">
                                        <strong>8,790,000 ₫</strong>
                                        <strike>11,490,000 ₫</strike>
                                    </span>

                                </div>
                            </div>
                            <div class="item">
                                <div class="img">
                                    <a href="/laptop/laptop-acer-swift-x-sfx16-51g-516q-i5-11320h-16gb-512gb-rtx3050-16-1-fhd" title="Laptop Acer Swift X SFX16-51G-516Q - Ch&#237;nh h&#227;ng"><img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/03/07/laptop-acer-swift-x-sfx16-51g-516q-01.jpg" alt="Laptop Acer Swift X SFX16-51G-516Q - Ch&#237;nh h&#227;ng"></a>
                                </div>
                                <div class="info">
                                    <a class="title" href="/laptop/laptop-acer-swift-x-sfx16-51g-516q-i5-11320h-16gb-512gb-rtx3050-16-1-fhd">Laptop Acer Swift X SFX16-51G-516Q - Ch&#237;nh h&#227;ng</a>
                                    <span class="price">
                                        <strong>19,990,000 ₫</strong>
                                        <strike>28,990,000 ₫</strike>
                                    </span>

                                </div>
                            </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- flash sales -->
    <section class="fls" id="fls_9" style="display:none">
        <div class="container">
            <div class="flash-sales">
                <div class="header">
                    <h3>F<i class="icon-flash"></i>ASH SALE ONLINE</h3>
                    <ul class="flash-sale-nav">
                            <li>
                                <a class="" href="javascript:showFLS('fls_6');">Điện thoại/Tablet</a>
                            </li>
                            <li>
                                <a class="" href="javascript:showFLS('fls_8');">Laptop/M&#224;n h&#236;nh/Tivi</a>
                            </li>
                            <li>
                                <a class="actived" href="javascript:showFLS('fls_9');">Đồng hồ/Phụ kiện/kh&#225;c</a>
                            </li>
                    </ul>
                        <div class="timer" id="timer_9" data-start="December 06, 2023 11:33:31" data-end="December 11, 2023 00:00:00"></div>
                </div>

                <div class="content">
                    

                    <div class="owl-carousel lr-slider">
                            <div class="item">
                                <div class="img">
                                    <a href="/may-loc-khong-khi/may-loc-khong-khi-xiaomi-air-purifier-4-lite-chinh-hang" title="M&#225;y lọc kh&#244;ng kh&#237; Xiaomi Air Purifier 4 Lite - Ch&#237;nh h&#227;ng"><img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2022/02/12/xiaomi-smart-air-purifier-lite-7.png" alt="M&#225;y lọc kh&#244;ng kh&#237; Xiaomi Air Purifier 4 Lite - Ch&#237;nh h&#227;ng"></a>
                                </div>
                                <div class="info">
                                    <a class="title" href="/may-loc-khong-khi/may-loc-khong-khi-xiaomi-air-purifier-4-lite-chinh-hang">M&#225;y lọc kh&#244;ng kh&#237; Xiaomi Air Purifier 4 Lite - Ch&#237;nh h&#227;ng</a>
                                    <span class="price">
                                        <strong>1,990,000 ₫</strong>
                                        <strike>3,990,000 ₫</strike>
                                    </span>

                                </div>
                            </div>
                            <div class="item">
                                <div class="img">
                                    <a href="/dong-ho-thong-minh/xiaomi-redmi-band-2" title="Xiaomi Redmi Smart Band 2 - Ch&#237;nh h&#227;ng"><img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/02/06/redmi-band-20.png" alt="Xiaomi Redmi Smart Band 2 - Ch&#237;nh h&#227;ng"></a>
                                </div>
                                <div class="info">
                                    <a class="title" href="/dong-ho-thong-minh/xiaomi-redmi-band-2">Xiaomi Redmi Smart Band 2 - Ch&#237;nh h&#227;ng</a>
                                    <span class="price">
                                        <strong>490,000 ₫</strong>
                                        <strike>990,000 ₫</strike>
                                    </span>

                                </div>
                            </div>
                            <div class="item">
                                <div class="img">
                                    <a href="/tai-nghe/tai-nghe-khong-day-xiaomi-redmi-buds-4-chinh-hang" title="Tai nghe kh&#244;ng d&#226;y Xiaomi Redmi Buds 4 - Ch&#237;nh h&#227;ng "><img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2022/09/22/image-removebg-preview-8.png" alt="Tai nghe kh&#244;ng d&#226;y Xiaomi Redmi Buds 4 - Ch&#237;nh h&#227;ng "></a>
                                </div>
                                <div class="info">
                                    <a class="title" href="/tai-nghe/tai-nghe-khong-day-xiaomi-redmi-buds-4-chinh-hang">Tai nghe kh&#244;ng d&#226;y Xiaomi Redmi Buds 4 - Ch&#237;nh h&#227;ng </a>
                                    <span class="price">
                                        <strong>650,000 ₫</strong>
                                        <strike>1,590,000 ₫</strike>
                                    </span>

                                </div>
                            </div>
                            <div class="item">
                                <div class="img">
                                    <a href="/dong-ho-thong-minh/vong-deo-thay-thong-minh-xiaomi-band-8-chinh-hang" title="V&#242;ng đeo tay th&#244;ng minh Xiaomi Band 8 - Ch&#237;nh h&#227;ng"><img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/09/14/xiaomi-band-8-1.png" alt="V&#242;ng đeo tay th&#244;ng minh Xiaomi Band 8 - Ch&#237;nh h&#227;ng"></a>
                                </div>
                                <div class="info">
                                    <a class="title" href="/dong-ho-thong-minh/vong-deo-thay-thong-minh-xiaomi-band-8-chinh-hang">V&#242;ng đeo tay th&#244;ng minh Xiaomi Band 8 - Ch&#237;nh h&#227;ng</a>
                                    <span class="price">
                                        <strong>890,000 ₫</strong>
                                        <strike>990,000 ₫</strike>
                                    </span>

                                </div>
                            </div>
                            <div class="item">
                                <div class="img">
                                    <a href="/dong-ho-thong-minh/xiaomi-redmi-watch-3-active-chinh-hang" title="Xiaomi Redmi Watch 3 Active - Ch&#237;nh h&#227;ng"><img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/07/21/xiaomi-redmi-watch-3-activea-1.png" alt="Xiaomi Redmi Watch 3 Active - Ch&#237;nh h&#227;ng"></a>
                                </div>
                                <div class="info">
                                    <a class="title" href="/dong-ho-thong-minh/xiaomi-redmi-watch-3-active-chinh-hang">Xiaomi Redmi Watch 3 Active - Ch&#237;nh h&#227;ng</a>
                                    <span class="price">
                                        <strong>1,090,000 ₫</strong>
                                        <strike>1,490,000 ₫</strike>
                                    </span>

                                </div>
                            </div>
                            <div class="item">
                                <div class="img">
                                    <a href="/robot-hut-bui/robot-hut-bui-xiaomi-vacuum-s10-chinh-hang" title="Robot h&#250;t bụi Xiaomi Vacuum S10 - Ch&#237;nh h&#227;ng"><img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/03/10/vacuum-s10-2.png" alt="Robot h&#250;t bụi Xiaomi Vacuum S10 - Ch&#237;nh h&#227;ng"></a>
                                </div>
                                <div class="info">
                                    <a class="title" href="/robot-hut-bui/robot-hut-bui-xiaomi-vacuum-s10-chinh-hang">Robot h&#250;t bụi Xiaomi Vacuum S10 - Ch&#237;nh h&#227;ng</a>
                                    <span class="price">
                                        <strong>4,990,000 ₫</strong>
                                        <strike>8,490,000 ₫</strike>
                                    </span>

                                </div>
                            </div>
                            <div class="item">
                                <div class="img">
                                    <a href="/do-gia-dung/noi-chien-khong-dau-xiaomi-smart-air-fryer-pro-4l-bhr6943eu" title="Nồi chi&#234;n kh&#244;ng dầu Xiaomi Smart Air Fryer Pro 4L - BHR6943EU"><img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/05/24/xiaomi-smart-air-fryer-pro-4l-bhr-3.png" alt="Nồi chi&#234;n kh&#244;ng dầu Xiaomi Smart Air Fryer Pro 4L - BHR6943EU"></a>
                                </div>
                                <div class="info">
                                    <a class="title" href="/do-gia-dung/noi-chien-khong-dau-xiaomi-smart-air-fryer-pro-4l-bhr6943eu">Nồi chi&#234;n kh&#244;ng dầu Xiaomi Smart Air Fryer Pro 4L - BHR6943EU</a>
                                    <span class="price">
                                        <strong>1,490,000 ₫</strong>
                                        <strike>2,990,000 ₫</strike>
                                    </span>

                                </div>
                            </div>
                            <div class="item">
                                <div class="img">
                                    <a href="/camera/camera-xiaomi-mi-home-security-c200-bhr6766gl" title="Camera Xiaomi MI Home Security C200 (BHR6766GL)"><img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/03/15/xiaomi-mi-home-security-c200.png" alt="Camera Xiaomi MI Home Security C200 (BHR6766GL)"></a>
                                </div>
                                <div class="info">
                                    <a class="title" href="/camera/camera-xiaomi-mi-home-security-c200-bhr6766gl">Camera Xiaomi MI Home Security C200 (BHR6766GL)</a>
                                    <span class="price">
                                        <strong>590,000 ₫</strong>
                                        <strike>949,000 ₫</strike>
                                    </span>

                                </div>
                            </div>
                            <div class="item">
                                <div class="img">
                                    <a href="/camera/camera-ip-wifi-ezviz-c6n-1080-chinh-hang" title="Camera IP Wifi Ezviz C6N 1080 - Ch&#237;nh h&#227;ng"><img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/06/29/camera-ip-wifi-ezviz-c6n-1080-1.png" alt="Camera IP Wifi Ezviz C6N 1080 - Ch&#237;nh h&#227;ng"></a>
                                </div>
                                <div class="info">
                                    <a class="title" href="/camera/camera-ip-wifi-ezviz-c6n-1080-chinh-hang">Camera IP Wifi Ezviz C6N 1080 - Ch&#237;nh h&#227;ng</a>
                                    <span class="price">
                                        <strong>470,000 ₫</strong>
                                        <strike>790,000 ₫</strike>
                                    </span>

                                </div>
                            </div>
                            <div class="item">
                                <div class="img">
                                    <a href="/sac-du-phong/pin-sac-du-phong-innostyle-powermag-slim-15w-wireless-pd-qc3-0-20w-10000m" title="Pin sạc dự ph&#242;ng Innostyle PowerMag Slim 15W (WIRELESS) PD/QC3.0 20W 10000m"><img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2022/08/16/image-removebg-preview-42.png" alt="Pin sạc dự ph&#242;ng Innostyle PowerMag Slim 15W (WIRELESS) PD/QC3.0 20W 10000m"></a>
                                </div>
                                <div class="info">
                                    <a class="title" href="/sac-du-phong/pin-sac-du-phong-innostyle-powermag-slim-15w-wireless-pd-qc3-0-20w-10000m">Pin sạc dự ph&#242;ng Innostyle PowerMag Slim 15W (WIRELESS) PD/QC3.0 20W 10000m</a>
                                    <span class="price">
                                        <strong>730,000 ₫</strong>
                                        <strike>1,150,000 ₫</strike>
                                    </span>

                                </div>
                            </div>
                            <div class="item">
                                <div class="img">
                                    <a href="/sac-du-phong/sac-du-phong-innostyle-powermax-10000mah-pd-qc3-0-20w-ip20pd" title="Sạc dự ph&#242;ng Innostyle Powermax 10000mAh PD/QC3.0 20W IP20PD "><img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2022/10/18/image-removebg-preview-69.png" alt="Sạc dự ph&#242;ng Innostyle Powermax 10000mAh PD/QC3.0 20W IP20PD "></a>
                                </div>
                                <div class="info">
                                    <a class="title" href="/sac-du-phong/sac-du-phong-innostyle-powermax-10000mah-pd-qc3-0-20w-ip20pd">Sạc dự ph&#242;ng Innostyle Powermax 10000mAh PD/QC3.0 20W IP20PD </a>
                                    <span class="price">
                                        <strong>390,000 ₫</strong>
                                        <strike>650,000 ₫</strike>
                                    </span>

                                </div>
                            </div>
                            <div class="item">
                                <div class="img">
                                    <a href="/tai-nghe/tai-nghe-galaxy-buds-fe-chinh-hang" title="Tai nghe Samsung Galaxy Buds FE - Ch&#237;nh h&#227;ng"><img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/10/26/tai-nghe-galaxy-buds-fe-12.png" alt="Tai nghe Samsung Galaxy Buds FE - Ch&#237;nh h&#227;ng"></a>
                                </div>
                                <div class="info">
                                    <a class="title" href="/tai-nghe/tai-nghe-galaxy-buds-fe-chinh-hang">Tai nghe Samsung Galaxy Buds FE - Ch&#237;nh h&#227;ng</a>
                                    <span class="price">
                                        <strong>1,590,000 ₫</strong>
                                        <strike>1,990,000 ₫</strike>
                                    </span>

                                </div>
                            </div>
                            <div class="item">
                                <div class="img">
                                    <a href="/robot-hut-bui/robot-hut-bui-xiaomi-vacuum-e10-chinh-hang" title="Robot h&#250;t bụi Xiaomi Vacuum E10 - Ch&#237;nh h&#227;ng"><img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/03/10/e10-3.png" alt="Robot h&#250;t bụi Xiaomi Vacuum E10 - Ch&#237;nh h&#227;ng"></a>
                                </div>
                                <div class="info">
                                    <a class="title" href="/robot-hut-bui/robot-hut-bui-xiaomi-vacuum-e10-chinh-hang">Robot h&#250;t bụi Xiaomi Vacuum E10 - Ch&#237;nh h&#227;ng</a>
                                    <span class="price">
                                        <strong>3,990,000 ₫</strong>
                                        <strike>6,490,000 ₫</strike>
                                    </span>

                                </div>
                            </div>
                            <div class="item">
                                <div class="img">
                                    <a href="/phu-kien/pin-du-phong-innostyle-powergo-smart-ai-10000mah-chinh-hang" title="Pin dự ph&#242;ng Innostyle Powergo Smart AI 10000mAh - Ch&#237;nh H&#227;ng"><img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/04/06/powergo-smart-ai-5.png" alt="Pin dự ph&#242;ng Innostyle Powergo Smart AI 10000mAh - Ch&#237;nh H&#227;ng"></a>
                                </div>
                                <div class="info">
                                    <a class="title" href="/phu-kien/pin-du-phong-innostyle-powergo-smart-ai-10000mah-chinh-hang">Pin dự ph&#242;ng Innostyle Powergo Smart AI 10000mAh - Ch&#237;nh H&#227;ng</a>
                                    <span class="price">
                                        <strong>250,000 ₫</strong>
                                        <strike>350,000 ₫</strike>
                                    </span>

                                </div>
                            </div>
                            <div class="item">
                                <div class="img">
                                    <a href="/robot-hut-bui/may-hut-bui-mi-handheld-vacuum-cleaner-light-chinh-hang" title="M&#225;y h&#250;t bụi Mi Handheld Vacuum Cleaner Light - Ch&#237;nh h&#227;ng"><img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2021/06/09/image-removebg-preview.png" alt="M&#225;y h&#250;t bụi Mi Handheld Vacuum Cleaner Light - Ch&#237;nh h&#227;ng"></a>
                                </div>
                                <div class="info">
                                    <a class="title" href="/robot-hut-bui/may-hut-bui-mi-handheld-vacuum-cleaner-light-chinh-hang">M&#225;y h&#250;t bụi Mi Handheld Vacuum Cleaner Light - Ch&#237;nh h&#227;ng</a>
                                    <span class="price">
                                        <strong>1,590,000 ₫</strong>
                                        <strike>3,490,000 ₫</strike>
                                    </span>

                                </div>
                            </div>
                            <div class="item">
                                <div class="img">
                                    <a href="/camera/camera-wifi-trong-nha-imou-ipc-a22ep-d-v3-chinh-hang" title="Camera WIFI trong nh&#224; IMOU IPC - A22EP 1080 - Ch&#237;nh h&#227;ng"><img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2022/05/14/image-removebg-preview-15.png" alt="Camera WIFI trong nh&#224; IMOU IPC - A22EP 1080 - Ch&#237;nh h&#227;ng"></a>
                                </div>
                                <div class="info">
                                    <a class="title" href="/camera/camera-wifi-trong-nha-imou-ipc-a22ep-d-v3-chinh-hang">Camera WIFI trong nh&#224; IMOU IPC - A22EP 1080 - Ch&#237;nh h&#227;ng</a>
                                    <span class="price">
                                        <strong>470,000 ₫</strong>
                                        <strike>1,350,000 ₫</strike>
                                    </span>

                                </div>
                            </div>
                            <div class="item">
                                <div class="img">
                                    <a href="/dong-ho-thong-minh/samsung-galaxy-watch-5-pro-45-mm-r920-chinh-hang" title="Samsung Galaxy Watch 5 Pro 45 mm (R920) - Ch&#237;nh h&#227;ng"><img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2022/08/10/image-removebg-preview-2_637957697663574921.png" alt="Samsung Galaxy Watch 5 Pro 45 mm (R920) - Ch&#237;nh h&#227;ng"></a>
                                </div>
                                <div class="info">
                                    <a class="title" href="/dong-ho-thong-minh/samsung-galaxy-watch-5-pro-45-mm-r920-chinh-hang">Samsung Galaxy Watch 5 Pro 45 mm (R920) - Ch&#237;nh h&#227;ng</a>
                                    <span class="price">
                                        <strong>5,990,000 ₫</strong>
                                        <strike>11,990,000 ₫</strike>
                                    </span>

                                </div>
                            </div>
                            <div class="item">
                                <div class="img">
                                    <a href="/phu-kien/de-sac-khong-day-mazer-4-in-1" title="Đế Sạc Kh&#244;ng D&#226;y Mazer infinite Boost Mag DESK Quad 4-in-1 - Ch&#237;nh h&#227;ng"><img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2021/06/09/image-removebg-preview-3.png" alt="Đế Sạc Kh&#244;ng D&#226;y Mazer infinite Boost Mag DESK Quad 4-in-1 - Ch&#237;nh h&#227;ng"></a>
                                </div>
                                <div class="info">
                                    <a class="title" href="/phu-kien/de-sac-khong-day-mazer-4-in-1">Đế Sạc Kh&#244;ng D&#226;y Mazer infinite Boost Mag DESK Quad 4-in-1 - Ch&#237;nh h&#227;ng</a>
                                    <span class="price">
                                        <strong>790,000 ₫</strong>
                                        <strike>2,000,000 ₫</strike>
                                    </span>

                                </div>
                            </div>
                    </div>
                </div>

            </div>
        </div>
    </section>




    <section>
        <div class="container">
            <div class="box-product-home box-home">
                <div class="header-container">
                    <div class="header">
                        <h4><a href="san-pham.php?idCat=1&idBrand=1">Apple authorised Reseller</a></h4>
                    </div>
                </div>
                <div class="col-content lts-product">
                    <?php
                        $queryApple = mysqli_query($conn,getProduct($conn,1));
                        while($itemApple = mysqli_fetch_assoc($queryApple)){
                            ?>
                                <div class="item">
                                    <div class="img">
                                        <a href="chi-tiet-san-pham.php?idsanpham=<?=$itemApple['idVersion']?>" title="<?=$itemApple['versionName']?>">
                                            <?php
                                                if($itemApple['idCategory'] == 1){
                                                    ?><img src="uploads/product/smartphone/<?=$itemApple['versionImage']?>" alt="<?=$itemApple['versionName']?>" title="<?=$itemApple['versionName']?>"><?php
                                                }
                                            ?>
                                        </a>
                                    </div>

                                    <div class="sticker sticker-left">
                                        <span><img src="assets/images/icon/apple.png" title="Chính Hãng Apple" /></span>
                                    </div>

                                    <div class="info">
                                        <a href="chi-tiet-san-pham.php?idsanpham=<?=$itemApple['idVersion']?>" class="title"
                                            title="<?=$itemApple['productName']?>"><?=$itemApple['versionName']?>-<?=$itemApple['versionVersion']?></a>
                                        <span class="price">
                                            <strong><?=number_format($itemApple['versionPromotionalPrice'],0,"",".")?> ₫</strong>
                                            <strike><?=number_format($itemApple['versionPrice'],0,"",".")?> ₫</strike>
                                        </span>

                                    </div>

                                    <div class="note">
                                        <span class="bag">KM</span> <label title="Giảm 100.000đ khi khách mua kèm Bộ dán MacBook Air 13' 2020 3M INNOSTYLE DIAMOND GUARD 6 IN 1">Giảm
                                            100.000đ khi khách mua kèm Bộ ...</label>
                                        <strong class="text-orange">VÀ 9 KM KHÁC</strong>
                                    </div>
                                    <div class="promote">
                                        <a href="chi-tiet-san-pham.php?idsanpham=<?=$itemApple['idVersion']?>">
                                            <ul>
                                                <li><span class="bag">KM</span> Giảm 100.000đ khi khách mua kèm Bộ dán MacBook Air
                                                    13' 2020 3M INNOSTYLE DIAMOND GUARD 6 IN 1</li>
                                                <li><span class="bag">KM</span> VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.</li>
                                                <li><span class="bag">KM</span> ZaloPay - Ưu đãi tới 300.000đ khi thanh toán qua ZaloPay.</li>
                                            </ul>
                                        </a>
                                    </div>
                                </div>
                            <?php
                        }
                    ?>
                </div>
            </div>
        </div>           
    </section>


<section>
    <div class="container">
        <div class="ads">
                <a href="https://hoanghamobile.com/dien-thoai-di-dong/redmi-note-12-4gb-128gb-chinh-hang?source=BoxHomeProduct" target="_top"><img src="https://cdn.hoanghamobile.com/i/home/Uploads/2023/12/01/redmi-note12-04.jpg" style="width: 100%;"></a>
        </div>
    </div>
</section>

        <section>
            <div class="container">
                <div class="box-product-home box-home">
                    <div class="header-container">
                        <div class="header">
                            <h4><a href="/dien-thoai-di-dong">ĐIỆN THOẠI NỔI BẬT</a></h4>
                        </div>
                            <div class="other-link">
                                    <a href="/dien-thoai-di-dong/iphone/iphone-15-series">iPhone 15</a>
                                    <a href="/dien-thoai-di-dong/tecno-pova-5-8gb-128gb-chinh-hang">TECNO POVA 5</a>
                                    <a href="/dien-thoai-di-dong/xiaomi/redmi-note-12-series">Redmi Note 12</a>
                                    <a href="/dien-thoai-di-dong/samsung/samsung-galaxy-s23">Samsung Galaxy S23</a>
                                <a class="actived" href="/dien-thoai-di-dong">Xem tất cả</a>
                            </div>
                    </div>
                    <div class="col-content lts-product">


<div class="item">

    <div class="img">
        <a href="/dien-thoai-di-dong/samsung-galaxy-s23-plus-8gb-256gb-chinh-hang" title="Samsung Galaxy S23 Plus - 8GB/256GB - Ch&#237;nh h&#227;ng">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/12/05/s23-xang.png" alt="Samsung Galaxy S23 Plus - 8GB/256GB - Ch&#237;nh h&#227;ng" title="Samsung Galaxy S23 Plus - 8GB/256GB - Ch&#237;nh h&#227;ng">
        </a>
    </div>


    


    <div class="info">
        <a href="/dien-thoai-di-dong/samsung-galaxy-s23-plus-8gb-256gb-chinh-hang" class="title" title="Samsung Galaxy S23 Plus - 8GB/256GB - Ch&#237;nh h&#227;ng">Samsung Galaxy S23 Plus - 8GB/256GB - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>16,890,000 ₫</strong>
                            <strike>26,990,000 ₫</strike>
        </span>
        
        
        
    </div>




            <div class="note">
                <span class="bag">KM</span> <label title="Trả g&#243;p tới 12 th&#225;ng kh&#244;ng l&#227;i, trả trước 0 đồng với Samsung Finance+">Trả g&#243;p tới 12 th&#225;ng kh&#244;ng l&#227;i, trả...</label>
                    <strong class="text-orange">VÀ 10 KM KHÁC</strong>
            </div>
        <div class="promote">
            <a href="/dien-thoai-di-dong/samsung-galaxy-s23-plus-8gb-256gb-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> Trả g&#243;p tới 12 th&#225;ng kh&#244;ng l&#227;i, trả trước 0 đồng với Samsung Finance+</li>
                        <li><span class="bag">KM</span> Ưu đ&#227;i Youtube Premium d&#224;nh cho chủ sở hữu Samsung Galaxy (&#193;p dụng một số sản phẩm)</li>
                        <li><span class="bag">KM</span> Giảm ngay 150.000đ khi mua k&#232;m SIM số đẹp Vinaphone Happy - Ưu đ&#227;i 2GB Data/ng&#224;y - Miễn ph&#237; 1000 ph&#250;t nội mạng.</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">

    <div class="img">
        <a href="/dien-thoai-di-dong/infinix-hot-30-8gb-256gb-chinh-hang" title="Infinix HOT 30 (8GB/256GB) - Ch&#237;nh h&#227;ng">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/05/26/hot-30-0.png" alt="Infinix HOT 30 (8GB/256GB) - Ch&#237;nh h&#227;ng" title="Infinix HOT 30 (8GB/256GB) - Ch&#237;nh h&#227;ng">
        </a>
    </div>


    

        <span class="sales">
            <i class="icon-flash2"></i> Giảm 900,000 ₫
        </span>

    <div class="info">
        <a href="/dien-thoai-di-dong/infinix-hot-30-8gb-256gb-chinh-hang" class="title" title="Infinix HOT 30 (8GB/256GB) - Ch&#237;nh h&#227;ng">Infinix HOT 30 (8GB/256GB) - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>3,090,000 ₫</strong>
                            <strike>3,990,000 ₫</strike>
        </span>
        
        
        
    </div>




            <div class="note">
                <span class="bag">KM</span> <label title="Giảm ngay 150.000đ khi mua k&#232;m SIM số đẹp Vinaphone Happy - Ưu đ&#227;i 2GB Data/ng&#224;y - Miễn ph&#237; 1000 ph&#250;t nội mạng.">Giảm ngay 150.000đ khi mua k&#232;m SIM ...</label>
                    <strong class="text-orange">VÀ 8 KM KHÁC</strong>
            </div>
        <div class="promote">
            <a href="/dien-thoai-di-dong/infinix-hot-30-8gb-256gb-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> Giảm ngay 150.000đ khi mua k&#232;m SIM số đẹp Vinaphone Happy - Ưu đ&#227;i 2GB Data/ng&#224;y - Miễn ph&#237; 1000 ph&#250;t nội mạng.</li>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">

    <div class="img">
        <a href="/dien-thoai-di-dong/nubia-neo-5g-8gb-256gb-chinh-hang" title="Nubia Neo 5G 8GB/256GB - Ch&#237;nh h&#227;ng ">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/11/03/nubia-neo-5g-5.png" alt="Nubia Neo 5G 8GB/256GB - Ch&#237;nh h&#227;ng " title="Nubia Neo 5G 8GB/256GB - Ch&#237;nh h&#227;ng ">
        </a>
    </div>


    

        <div class="cover">
            <div style="
    color: yellow;
    background: #00483D;
    margin: -95px 5px 0 52px;
    padding: 3px;
    border-radius: 6px;
    font-size: 11px;
    font-weight: 600;
    ">
<span style="color:white">HÀNG MỚI VỀ</span><br>
<span style="color:yellow"></span>
</div>

        </div>

    <div class="info">
        <a href="/dien-thoai-di-dong/nubia-neo-5g-8gb-256gb-chinh-hang" class="title" title="Nubia Neo 5G 8GB/256GB - Ch&#237;nh h&#227;ng ">Nubia Neo 5G 8GB/256GB - Ch&#237;nh h&#227;ng </a>
        <span class="price">
                <strong>4,690,000 ₫</strong>
                            <strike>4,990,000 ₫</strike>
        </span>
        
        
        
    </div>




            <div class="note">
                <span class="bag">KM</span> <label title="Giảm ngay 150.000đ khi mua k&#232;m SIM số đẹp Vinaphone Happy - Ưu đ&#227;i 2GB Data/ng&#224;y - Miễn ph&#237; 1000 ph&#250;t nội mạng.">Giảm ngay 150.000đ khi mua k&#232;m SIM ...</label>
                    <strong class="text-orange">VÀ 8 KM KHÁC</strong>
            </div>
        <div class="promote">
            <a href="/dien-thoai-di-dong/nubia-neo-5g-8gb-256gb-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> Giảm ngay 150.000đ khi mua k&#232;m SIM số đẹp Vinaphone Happy - Ưu đ&#227;i 2GB Data/ng&#224;y - Miễn ph&#237; 1000 ph&#250;t nội mạng.</li>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">

    <div class="img">
        <a href="/dien-thoai-di-dong/xiaomi-redmi-13c-6gb-128gb-chinh-hang" title="Redmi 13C 6GB/128GB - Ch&#237;nh h&#227;ng">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/11/08/xiaomi-redmi-13c-18.png" alt="Redmi 13C 6GB/128GB - Ch&#237;nh h&#227;ng" title="Redmi 13C 6GB/128GB - Ch&#237;nh h&#227;ng">
        </a>
    </div>


    


    <div class="info">
        <a href="/dien-thoai-di-dong/xiaomi-redmi-13c-6gb-128gb-chinh-hang" class="title" title="Redmi 13C 6GB/128GB - Ch&#237;nh h&#227;ng">Redmi 13C 6GB/128GB - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>3,290,000 ₫</strong>
                    </span>
        
        
        
    </div>




            <div class="note">
                <span class="bag">KM</span> <label title="Tặng phiếu mua h&#224;ng 200.000đ">Tặng phiếu mua h&#224;ng 200.000đ</label>
                    <strong class="text-orange">VÀ 5 KM KHÁC</strong>
            </div>
        <div class="promote">
            <a href="/dien-thoai-di-dong/xiaomi-redmi-13c-6gb-128gb-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> Tặng phiếu mua h&#224;ng 200.000đ</li>
                        <li><span class="bag">KM</span> Giảm ngay 150.000đ khi mua k&#232;m SIM số đẹp Vinaphone Happy - Ưu đ&#227;i 2GB Data/ng&#224;y - Miễn ph&#237; 1000 ph&#250;t nội mạng.</li>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">

    <div class="img">
        <a href="/dien-thoai-di-dong/htc-wildfire-e3-lite-4gb-64gb-chinh-hang" title="HTC Wildfire E3 lite (4GB/64GB) - Ch&#237;nh h&#227;ng">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/10/12/htc-wildfire-e3-lite-grey.png" alt="HTC Wildfire E3 lite (4GB/64GB) - Ch&#237;nh h&#227;ng" title="HTC Wildfire E3 lite (4GB/64GB) - Ch&#237;nh h&#227;ng">
        </a>
    </div>


    

        <div class="cover">
            <div style="
    color: yellow;
    background: #00483D;
    margin: -95px 5px 0 52px;
    padding: 3px;
    border-radius: 6px;
    font-size: 11px;
    font-weight: 600;
    ">
<span style="color:white">Tặng PMH 200.000đ</span><br>
<span style="color:yellow">Khi mua kèm MTB HTC A103</span>
</div>

        </div>

    <div class="info">
        <a href="/dien-thoai-di-dong/htc-wildfire-e3-lite-4gb-64gb-chinh-hang" class="title" title="HTC Wildfire E3 lite (4GB/64GB) - Ch&#237;nh h&#227;ng">HTC Wildfire E3 lite (4GB/64GB) - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>1,790,000 ₫</strong>
                            <strike>2,990,000 ₫</strike>
        </span>
        
        
        
    </div>




            <div class="note">
                <span class="bag">KM</span> <label title="Giảm ngay 150.000đ khi mua k&#232;m SIM số đẹp Vinaphone Happy - Ưu đ&#227;i 2GB Data/ng&#224;y - Miễn ph&#237; 1000 ph&#250;t nội mạng.">Giảm ngay 150.000đ khi mua k&#232;m SIM ...</label>
                    <strong class="text-orange">VÀ 10 KM KHÁC</strong>
            </div>
        <div class="promote">
            <a href="/dien-thoai-di-dong/htc-wildfire-e3-lite-4gb-64gb-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> Giảm ngay 150.000đ khi mua k&#232;m SIM số đẹp Vinaphone Happy - Ưu đ&#227;i 2GB Data/ng&#224;y - Miễn ph&#237; 1000 ph&#250;t nội mạng.</li>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">

    <div class="img">
        <a href="/dien-thoai-di-dong/oppo-find-n3-16gb-512gb-chinh-hang" title="OPPO Find N3 (16GB/512GB) - Ch&#237;nh h&#227;ng">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/10/27/oppo-find-n3-ad.png" alt="OPPO Find N3 (16GB/512GB) - Ch&#237;nh h&#227;ng" title="OPPO Find N3 (16GB/512GB) - Ch&#237;nh h&#227;ng">
        </a>
    </div>


    


    <div class="info">
        <a href="/dien-thoai-di-dong/oppo-find-n3-16gb-512gb-chinh-hang" class="title" title="OPPO Find N3 (16GB/512GB) - Ch&#237;nh h&#227;ng">OPPO Find N3 (16GB/512GB) - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>44,990,000 ₫</strong>
                    </span>
        
        
        
    </div>




            <div class="note">
                <span class="bag">KM</span> <label title="Giảm ngay 150.000đ khi mua k&#232;m SIM số đẹp Vinaphone Happy - Ưu đ&#227;i 2GB Data/ng&#224;y - Miễn ph&#237; 1000 ph&#250;t nội mạng.">Giảm ngay 150.000đ khi mua k&#232;m SIM ...</label>
                    <strong class="text-orange">VÀ 6 KM KHÁC</strong>
            </div>
        <div class="promote">
            <a href="/dien-thoai-di-dong/oppo-find-n3-16gb-512gb-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> Giảm ngay 150.000đ khi mua k&#232;m SIM số đẹp Vinaphone Happy - Ưu đ&#227;i 2GB Data/ng&#224;y - Miễn ph&#237; 1000 ph&#250;t nội mạng.</li>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">

    <div class="img">
        <a href="/dien-thoai-di-dong/samsung-galaxy-z-fold5-256gb-12gb-chinh-hang" title="Samsung Galaxy Z Fold5 12GB/256GB - Ch&#237;nh h&#227;ng">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/12/05/fold-5-chinh-thuc.png" alt="Samsung Galaxy Z Fold5 12GB/256GB - Ch&#237;nh h&#227;ng" title="Samsung Galaxy Z Fold5 12GB/256GB - Ch&#237;nh h&#227;ng">
        </a>
    </div>


    


    <div class="info">
        <a href="/dien-thoai-di-dong/samsung-galaxy-z-fold5-256gb-12gb-chinh-hang" class="title" title="Samsung Galaxy Z Fold5 12GB/256GB - Ch&#237;nh h&#227;ng">Samsung Galaxy Z Fold5 12GB/256GB - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>35,760,000 ₫</strong>
                            <strike>40,990,000 ₫</strike>
        </span>
        
        
        
    </div>




            <div class="note">
                <span class="bag">KM</span> <label title="Trả g&#243;p tới 12 th&#225;ng kh&#244;ng l&#227;i, trả trước 0 đồng với Samsung Finance+">Trả g&#243;p tới 12 th&#225;ng kh&#244;ng l&#227;i, trả...</label>
                    <strong class="text-orange">VÀ 8 KM KHÁC</strong>
            </div>
        <div class="promote">
            <a href="/dien-thoai-di-dong/samsung-galaxy-z-fold5-256gb-12gb-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> Trả g&#243;p tới 12 th&#225;ng kh&#244;ng l&#227;i, trả trước 0 đồng với Samsung Finance+</li>
                        <li><span class="bag">KM</span> Giảm ngay 150.000đ khi mua k&#232;m SIM số đẹp Vinaphone Happy - Ưu đ&#227;i 2GB Data/ng&#224;y - Miễn ph&#237; 1000 ph&#250;t nội mạng.</li>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">

    <div class="img">
        <a href="/dien-thoai-di-dong/samsung-galaxy-z-flip5-256gb-chinh-hang" title="Samsung Galaxy Z Flip5 8GB/256GB - Ch&#237;nh h&#227;ng">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/11/29/galaxy-z-flip5.png" alt="Samsung Galaxy Z Flip5 8GB/256GB - Ch&#237;nh h&#227;ng" title="Samsung Galaxy Z Flip5 8GB/256GB - Ch&#237;nh h&#227;ng">
        </a>
    </div>


    


    <div class="info">
        <a href="/dien-thoai-di-dong/samsung-galaxy-z-flip5-256gb-chinh-hang" class="title" title="Samsung Galaxy Z Flip5 8GB/256GB - Ch&#237;nh h&#227;ng">Samsung Galaxy Z Flip5 8GB/256GB - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>21,210,000 ₫</strong>
                            <strike>25,990,000 ₫</strike>
        </span>
        
        
        
    </div>




            <div class="note">
                <span class="bag">KM</span> <label title="Trả g&#243;p tới 12 th&#225;ng kh&#244;ng l&#227;i, trả trước 0 đồng với Samsung Finance+">Trả g&#243;p tới 12 th&#225;ng kh&#244;ng l&#227;i, trả...</label>
                    <strong class="text-orange">VÀ 9 KM KHÁC</strong>
            </div>
        <div class="promote">
            <a href="/dien-thoai-di-dong/samsung-galaxy-z-flip5-256gb-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> Trả g&#243;p tới 12 th&#225;ng kh&#244;ng l&#227;i, trả trước 0 đồng với Samsung Finance+</li>
                        <li><span class="bag">KM</span> Giảm ngay 150.000đ khi mua k&#232;m SIM số đẹp Vinaphone Happy - Ưu đ&#227;i 2GB Data/ng&#224;y - Miễn ph&#237; 1000 ph&#250;t nội mạng.</li>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">

    <div class="img">
        <a href="/dien-thoai-di-dong/honor-x5-plus-4-64gb-chinh-hang" title="HONOR X5 Plus 4GB/64GB- Ch&#237;nh h&#227;ng">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/10/13/honor-x5-plus-3.png" alt="HONOR X5 Plus 4GB/64GB- Ch&#237;nh h&#227;ng" title="HONOR X5 Plus 4GB/64GB- Ch&#237;nh h&#227;ng">
        </a>
    </div>


    

        <span class="sales">
            <i class="icon-flash2"></i> Giảm 800,000 ₫
        </span>

    <div class="info">
        <a href="/dien-thoai-di-dong/honor-x5-plus-4-64gb-chinh-hang" class="title" title="HONOR X5 Plus 4GB/64GB- Ch&#237;nh h&#227;ng">HONOR X5 Plus 4GB/64GB- Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>1,990,000 ₫</strong>
                            <strike>2,790,000 ₫</strike>
        </span>
        
        
        
    </div>




            <div class="note">
                <span class="bag">KM</span> <label title="Giảm ngay 150.000đ khi mua k&#232;m SIM số đẹp Vinaphone Happy - Ưu đ&#227;i 2GB Data/ng&#224;y - Miễn ph&#237; 1000 ph&#250;t nội mạng.">Giảm ngay 150.000đ khi mua k&#232;m SIM ...</label>
                    <strong class="text-orange">VÀ 7 KM KHÁC</strong>
            </div>
        <div class="promote">
            <a href="/dien-thoai-di-dong/honor-x5-plus-4-64gb-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> Giảm ngay 150.000đ khi mua k&#232;m SIM số đẹp Vinaphone Happy - Ưu đ&#227;i 2GB Data/ng&#224;y - Miễn ph&#237; 1000 ph&#250;t nội mạng.</li>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">

    <div class="img">
        <a href="/dien-thoai-di-dong/infinix-note-30-5g-8gb-256gb-chinh-hang" title="Infinix NOTE 30 5G (8GB/256GB) - Ch&#237;nh h&#227;ng">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/10/24/infinix-note-30-5g.png" alt="Infinix NOTE 30 5G (8GB/256GB) - Ch&#237;nh h&#227;ng" title="Infinix NOTE 30 5G (8GB/256GB) - Ch&#237;nh h&#227;ng">
        </a>
    </div>


    

        <span class="sales">
            <i class="icon-flash2"></i> Giảm 700,000 ₫
        </span>

    <div class="info">
        <a href="/dien-thoai-di-dong/infinix-note-30-5g-8gb-256gb-chinh-hang" class="title" title="Infinix NOTE 30 5G (8GB/256GB) - Ch&#237;nh h&#227;ng">Infinix NOTE 30 5G (8GB/256GB) - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>4,590,000 ₫</strong>
                            <strike>5,290,000 ₫</strike>
        </span>
        
        
        
    </div>




            <div class="note">
                <span class="bag">KM</span> <label title="Giảm ngay 150.000đ khi mua k&#232;m SIM số đẹp Vinaphone Happy - Ưu đ&#227;i 2GB Data/ng&#224;y - Miễn ph&#237; 1000 ph&#250;t nội mạng.">Giảm ngay 150.000đ khi mua k&#232;m SIM ...</label>
                    <strong class="text-orange">VÀ 8 KM KHÁC</strong>
            </div>
        <div class="promote">
            <a href="/dien-thoai-di-dong/infinix-note-30-5g-8gb-256gb-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> Giảm ngay 150.000đ khi mua k&#232;m SIM số đẹp Vinaphone Happy - Ưu đ&#227;i 2GB Data/ng&#224;y - Miễn ph&#237; 1000 ph&#250;t nội mạng.</li>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">

    <div class="img">
        <a href="/dien-thoai-di-dong/samsung-galaxy-a05-chinh-hang" title="Samsung Galaxy A05 - 4GB/128GB - Ch&#237;nh h&#227;ng">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/12/05/a05.png" alt="Samsung Galaxy A05 - 4GB/128GB - Ch&#237;nh h&#227;ng" title="Samsung Galaxy A05 - 4GB/128GB - Ch&#237;nh h&#227;ng">
        </a>
    </div>


    


    <div class="info">
        <a href="/dien-thoai-di-dong/samsung-galaxy-a05-chinh-hang" class="title" title="Samsung Galaxy A05 - 4GB/128GB - Ch&#237;nh h&#227;ng">Samsung Galaxy A05 - 4GB/128GB - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>2,790,000 ₫</strong>
                            <strike>3,090,000 ₫</strike>
        </span>
        
        
        
    </div>




            <div class="note">
                <span class="bag">KM</span> <label title="Trả g&#243;p tới 12 th&#225;ng kh&#244;ng l&#227;i, trả trước 0 đồng với Samsung Finance+">Trả g&#243;p tới 12 th&#225;ng kh&#244;ng l&#227;i, trả...</label>
                    <strong class="text-orange">VÀ 7 KM KHÁC</strong>
            </div>
        <div class="promote">
            <a href="/dien-thoai-di-dong/samsung-galaxy-a05-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> Trả g&#243;p tới 12 th&#225;ng kh&#244;ng l&#227;i, trả trước 0 đồng với Samsung Finance+</li>
                        <li><span class="bag">KM</span> Giảm ngay 150.000đ khi mua k&#232;m SIM số đẹp Vinaphone Happy - Ưu đ&#227;i 2GB Data/ng&#224;y - Miễn ph&#237; 1000 ph&#250;t nội mạng.</li>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">

    <div class="img">
        <a href="/dien-thoai-di-dong/samsung-galaxy-m34-5G-chinh-hang" title="Samsung Galaxy M34 5G 8GB/128GB - Ch&#237;nh h&#227;ng">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/12/05/m34.png" alt="Samsung Galaxy M34 5G 8GB/128GB - Ch&#237;nh h&#227;ng" title="Samsung Galaxy M34 5G 8GB/128GB - Ch&#237;nh h&#227;ng">
        </a>
    </div>


    


    <div class="info">
        <a href="/dien-thoai-di-dong/samsung-galaxy-m34-5G-chinh-hang" class="title" title="Samsung Galaxy M34 5G 8GB/128GB - Ch&#237;nh h&#227;ng">Samsung Galaxy M34 5G 8GB/128GB - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>6,790,000 ₫</strong>
                            <strike>7,990,000 ₫</strike>
        </span>
        
        
        
    </div>




            <div class="note">
                <span class="bag">KM</span> <label title="Trả g&#243;p tới 12 th&#225;ng kh&#244;ng l&#227;i, trả trước 0 đồng với Samsung Finance+">Trả g&#243;p tới 12 th&#225;ng kh&#244;ng l&#227;i, trả...</label>
                    <strong class="text-orange">VÀ 5 KM KHÁC</strong>
            </div>
        <div class="promote">
            <a href="/dien-thoai-di-dong/samsung-galaxy-m34-5G-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> Trả g&#243;p tới 12 th&#225;ng kh&#244;ng l&#227;i, trả trước 0 đồng với Samsung Finance+</li>
                        <li><span class="bag">KM</span> Giảm ngay 150.000đ khi mua k&#232;m SIM số đẹp Vinaphone Happy - Ưu đ&#227;i 2GB Data/ng&#224;y - Miễn ph&#237; 1000 ph&#250;t nội mạng.</li>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">

    <div class="img">
        <a href="/dien-thoai-di-dong/redmi-note-12-4gb-128gb-chinh-hang" title="Redmi Note 12 (4GB/128GB) - Ch&#237;nh h&#227;ng">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/03/24/redminote12-0.png" alt="Redmi Note 12 (4GB/128GB) - Ch&#237;nh h&#227;ng" title="Redmi Note 12 (4GB/128GB) - Ch&#237;nh h&#227;ng">
        </a>
    </div>


    

        <span class="sales">
            <i class="icon-flash2"></i> Giảm 1,000,000 ₫
        </span>

    <div class="info">
        <a href="/dien-thoai-di-dong/redmi-note-12-4gb-128gb-chinh-hang" class="title" title="Redmi Note 12 (4GB/128GB) - Ch&#237;nh h&#227;ng">Redmi Note 12 (4GB/128GB) - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>3,990,000 ₫</strong>
                            <strike>4,990,000 ₫</strike>
        </span>
        
        
        
            <div style="padding-top:8px; font-style:italic; text-align:left;">
                <label>Giá lên đời từ: <strong class="text-red">3,690,000 ₫</strong></label>
            </div>
    </div>




            <div class="note">
                <span class="bag">KM</span> <label title="Giảm ngay 150.000đ khi mua k&#232;m SIM số đẹp Vinaphone Happy - Ưu đ&#227;i 2GB Data/ng&#224;y - Miễn ph&#237; 1000 ph&#250;t nội mạng.">Giảm ngay 150.000đ khi mua k&#232;m SIM ...</label>
                    <strong class="text-orange">VÀ 11 KM KHÁC</strong>
            </div>
        <div class="promote">
            <a href="/dien-thoai-di-dong/redmi-note-12-4gb-128gb-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> Giảm ngay 150.000đ khi mua k&#232;m SIM số đẹp Vinaphone Happy - Ưu đ&#227;i 2GB Data/ng&#224;y - Miễn ph&#237; 1000 ph&#250;t nội mạng.</li>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">

    <div class="img">
        <a href="/dien-thoai-di-dong/redmi-note-12-8gb-128gb-chinh-hang" title="Redmi Note 12 (8GB/128GB) - Ch&#237;nh h&#227;ng">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/03/24/redminote12-0.png" alt="Redmi Note 12 (8GB/128GB) - Ch&#237;nh h&#227;ng" title="Redmi Note 12 (8GB/128GB) - Ch&#237;nh h&#227;ng">
        </a>
    </div>


    

        <span class="sales">
            <i class="icon-flash2"></i> Giảm 1,000,000 ₫
        </span>

    <div class="info">
        <a href="/dien-thoai-di-dong/redmi-note-12-8gb-128gb-chinh-hang" class="title" title="Redmi Note 12 (8GB/128GB) - Ch&#237;nh h&#227;ng">Redmi Note 12 (8GB/128GB) - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>4,790,000 ₫</strong>
                            <strike>5,790,000 ₫</strike>
        </span>
        
        
        
            <div style="padding-top:8px; font-style:italic; text-align:left;">
                <label>Giá lên đời từ: <strong class="text-red">4,490,000 ₫</strong></label>
            </div>
    </div>




            <div class="note">
                <span class="bag">KM</span> <label title="Giảm ngay 150.000đ khi mua k&#232;m SIM số đẹp Vinaphone Happy - Ưu đ&#227;i 2GB Data/ng&#224;y - Miễn ph&#237; 1000 ph&#250;t nội mạng.">Giảm ngay 150.000đ khi mua k&#232;m SIM ...</label>
                    <strong class="text-orange">VÀ 11 KM KHÁC</strong>
            </div>
        <div class="promote">
            <a href="/dien-thoai-di-dong/redmi-note-12-8gb-128gb-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> Giảm ngay 150.000đ khi mua k&#232;m SIM số đẹp Vinaphone Happy - Ưu đ&#227;i 2GB Data/ng&#224;y - Miễn ph&#237; 1000 ph&#250;t nội mạng.</li>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">

    <div class="img">
        <a href="/dien-thoai-di-dong/oppo-reno10-5g-8gb-128gb-chinh-hang" title="OPPO Reno10 5G (8GB/128GB) - Ch&#237;nh h&#227;ng">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/07/21/image-removebg-preview.png" alt="OPPO Reno10 5G (8GB/128GB) - Ch&#237;nh h&#227;ng" title="OPPO Reno10 5G (8GB/128GB) - Ch&#237;nh h&#227;ng">
        </a>
    </div>


    

        <span class="sales">
            <i class="icon-flash2"></i> Giảm 500,000 ₫
        </span>

    <div class="info">
        <a href="/dien-thoai-di-dong/oppo-reno10-5g-8gb-128gb-chinh-hang" class="title" title="OPPO Reno10 5G (8GB/128GB) - Ch&#237;nh h&#227;ng">OPPO Reno10 5G (8GB/128GB) - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>9,490,000 ₫</strong>
                            <strike>9,990,000 ₫</strike>
        </span>
        
        
        
    </div>




            <div class="note">
                <span class="bag">KM</span> <label title="Giảm ngay 150.000đ khi mua k&#232;m SIM số đẹp Vinaphone Happy - Ưu đ&#227;i 2GB Data/ng&#224;y - Miễn ph&#237; 1000 ph&#250;t nội mạng.">Giảm ngay 150.000đ khi mua k&#232;m SIM ...</label>
                    <strong class="text-orange">VÀ 8 KM KHÁC</strong>
            </div>
        <div class="promote">
            <a href="/dien-thoai-di-dong/oppo-reno10-5g-8gb-128gb-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> Giảm ngay 150.000đ khi mua k&#232;m SIM số đẹp Vinaphone Happy - Ưu đ&#227;i 2GB Data/ng&#224;y - Miễn ph&#237; 1000 ph&#250;t nội mạng.</li>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">

    <div class="img">
        <a href="/dien-thoai-di-dong/tecno-pova-5-8gb-128gb-chinh-hang" title="TECNO POVA 5 (8GB/128GB) - Ch&#237;nh h&#227;ng">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/12/05/tecno-pova-5.png" alt="TECNO POVA 5 (8GB/128GB) - Ch&#237;nh h&#227;ng" title="TECNO POVA 5 (8GB/128GB) - Ch&#237;nh h&#227;ng">
        </a>
    </div>


    


    <div class="info">
        <a href="/dien-thoai-di-dong/tecno-pova-5-8gb-128gb-chinh-hang" class="title" title="TECNO POVA 5 (8GB/128GB) - Ch&#237;nh h&#227;ng">TECNO POVA 5 (8GB/128GB) - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>3,990,000 ₫</strong>
                            <strike>4,490,000 ₫</strike>
        </span>
        
        
        
    </div>




            <div class="note">
                <span class="bag">KM</span> <label title="Giảm ngay 150.000đ khi mua k&#232;m SIM số đẹp Vinaphone Happy - Ưu đ&#227;i 2GB Data/ng&#224;y - Miễn ph&#237; 1000 ph&#250;t nội mạng.">Giảm ngay 150.000đ khi mua k&#232;m SIM ...</label>
                    <strong class="text-orange">VÀ 9 KM KHÁC</strong>
            </div>
        <div class="promote">
            <a href="/dien-thoai-di-dong/tecno-pova-5-8gb-128gb-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> Giảm ngay 150.000đ khi mua k&#232;m SIM số đẹp Vinaphone Happy - Ưu đ&#227;i 2GB Data/ng&#224;y - Miễn ph&#237; 1000 ph&#250;t nội mạng.</li>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">

    <div class="img">
        <a href="/dien-thoai-di-dong/nokia-c32-4gb-128gb-chinh-hang" title="Nokia C32 (4GB/128GB) - Ch&#237;nh h&#227;ng">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/06/28/nokia-c32-0.png" alt="Nokia C32 (4GB/128GB) - Ch&#237;nh h&#227;ng" title="Nokia C32 (4GB/128GB) - Ch&#237;nh h&#227;ng">
        </a>
    </div>


    

        <span class="sales">
            <i class="icon-flash2"></i> Giảm 500,000 ₫
        </span>

    <div class="info">
        <a href="/dien-thoai-di-dong/nokia-c32-4gb-128gb-chinh-hang" class="title" title="Nokia C32 (4GB/128GB) - Ch&#237;nh h&#227;ng">Nokia C32 (4GB/128GB) - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>2,790,000 ₫</strong>
                            <strike>3,290,000 ₫</strike>
        </span>
        
        
        
    </div>




            <div class="note">
                <span class="bag">KM</span> <label title="Giảm ngay 150.000đ khi mua k&#232;m SIM số đẹp Vinaphone Happy - Ưu đ&#227;i 2GB Data/ng&#224;y - Miễn ph&#237; 1000 ph&#250;t nội mạng.">Giảm ngay 150.000đ khi mua k&#232;m SIM ...</label>
                    <strong class="text-orange">VÀ 8 KM KHÁC</strong>
            </div>
        <div class="promote">
            <a href="/dien-thoai-di-dong/nokia-c32-4gb-128gb-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> Giảm ngay 150.000đ khi mua k&#232;m SIM số đẹp Vinaphone Happy - Ưu đ&#227;i 2GB Data/ng&#224;y - Miễn ph&#237; 1000 ph&#250;t nội mạng.</li>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">

    <div class="img">
        <a href="/dien-thoai-di-dong/oppo-a58-6gb-128gb-chinh-hang" title="OPPO A58 (6GB/128GB) - Ch&#237;nh h&#227;ng">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/08/24/a58-5.png" alt="OPPO A58 (6GB/128GB) - Ch&#237;nh h&#227;ng" title="OPPO A58 (6GB/128GB) - Ch&#237;nh h&#227;ng">
        </a>
    </div>


    

        <span class="sales">
            <i class="icon-flash2"></i> Giảm 00 ₫
        </span>

    <div class="info">
        <a href="/dien-thoai-di-dong/oppo-a58-6gb-128gb-chinh-hang" class="title" title="OPPO A58 (6GB/128GB) - Ch&#237;nh h&#227;ng">OPPO A58 (6GB/128GB) - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>4,990,000 ₫</strong>
                            <strike>4,990,000 ₫</strike>
        </span>
        
        
        
    </div>




            <div class="note">
                <span class="bag">KM</span> <label title="Giảm ngay 150.000đ khi mua k&#232;m SIM số đẹp Vinaphone Happy - Ưu đ&#227;i 2GB Data/ng&#224;y - Miễn ph&#237; 1000 ph&#250;t nội mạng.">Giảm ngay 150.000đ khi mua k&#232;m SIM ...</label>
                    <strong class="text-orange">VÀ 5 KM KHÁC</strong>
            </div>
        <div class="promote">
            <a href="/dien-thoai-di-dong/oppo-a58-6gb-128gb-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> Giảm ngay 150.000đ khi mua k&#232;m SIM số đẹp Vinaphone Happy - Ưu đ&#227;i 2GB Data/ng&#224;y - Miễn ph&#237; 1000 ph&#250;t nội mạng.</li>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">

    <div class="img">
        <a href="/dien-thoai-di-dong/tcl-408-4gb-64gb-chinh-hang" title="TCL 408 (4GB/64GB) - Ch&#237;nh h&#227;ng">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/08/24/tcl-408-blue-0.png" alt="TCL 408 (4GB/64GB) - Ch&#237;nh h&#227;ng" title="TCL 408 (4GB/64GB) - Ch&#237;nh h&#227;ng">
        </a>
    </div>


    


    <div class="info">
        <a href="/dien-thoai-di-dong/tcl-408-4gb-64gb-chinh-hang" class="title" title="TCL 408 (4GB/64GB) - Ch&#237;nh h&#227;ng">TCL 408 (4GB/64GB) - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>2,390,000 ₫</strong>
                            <strike>2,790,000 ₫</strike>
        </span>
        
        
        
    </div>




            <div class="note">
                <span class="bag">KM</span> <label title="Giảm ngay 150.000đ khi mua k&#232;m SIM số đẹp Vinaphone Happy - Ưu đ&#227;i 2GB Data/ng&#224;y - Miễn ph&#237; 1000 ph&#250;t nội mạng.">Giảm ngay 150.000đ khi mua k&#232;m SIM ...</label>
                    <strong class="text-orange">VÀ 9 KM KHÁC</strong>
            </div>
        <div class="promote">
            <a href="/dien-thoai-di-dong/tcl-408-4gb-64gb-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> Giảm ngay 150.000đ khi mua k&#232;m SIM số đẹp Vinaphone Happy - Ưu đ&#227;i 2GB Data/ng&#224;y - Miễn ph&#237; 1000 ph&#250;t nội mạng.</li>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">

    <div class="img">
        <a href="/dien-thoai-di-dong/samsung-galaxy-s20-fe-256gb-chinh-hang" title="Samsung Galaxy S20 FE 256GB - Ch&#237;nh h&#227;ng ">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/12/05/s20-fe-mint-1.png" alt="Samsung Galaxy S20 FE 256GB - Ch&#237;nh h&#227;ng " title="Samsung Galaxy S20 FE 256GB - Ch&#237;nh h&#227;ng ">
        </a>
    </div>


    


    <div class="info">
        <a href="/dien-thoai-di-dong/samsung-galaxy-s20-fe-256gb-chinh-hang" class="title" title="Samsung Galaxy S20 FE 256GB - Ch&#237;nh h&#227;ng ">Samsung Galaxy S20 FE 256GB - Ch&#237;nh h&#227;ng </a>
        <span class="price">
                <strong>6,790,000 ₫</strong>
                            <strike>15,490,000 ₫</strike>
        </span>
        
        
        
    </div>




            <div class="note">
                <span class="bag">KM</span> <label title="Trả g&#243;p tới 12 th&#225;ng kh&#244;ng l&#227;i, trả trước 0 đồng với Samsung Finance+">Trả g&#243;p tới 12 th&#225;ng kh&#244;ng l&#227;i, trả...</label>
                    <strong class="text-orange">VÀ 10 KM KHÁC</strong>
            </div>
        <div class="promote">
            <a href="/dien-thoai-di-dong/samsung-galaxy-s20-fe-256gb-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> Trả g&#243;p tới 12 th&#225;ng kh&#244;ng l&#227;i, trả trước 0 đồng với Samsung Finance+</li>
                        <li><span class="bag">KM</span> Giảm ngay 150.000đ khi mua k&#232;m SIM số đẹp Vinaphone Happy - Ưu đ&#227;i 2GB Data/ng&#224;y - Miễn ph&#237; 1000 ph&#250;t nội mạng.</li>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">

    <div class="img">
        <a href="/dien-thoai-di-dong/tecno-camon-20-8gb-256gb-chinh-hang" title="TECNO CAMON 20 (8GB/256GB) - Ch&#237;nh h&#227;ng">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/12/05/tecno-camon-20.png" alt="TECNO CAMON 20 (8GB/256GB) - Ch&#237;nh h&#227;ng" title="TECNO CAMON 20 (8GB/256GB) - Ch&#237;nh h&#227;ng">
        </a>
    </div>


    


    <div class="info">
        <a href="/dien-thoai-di-dong/tecno-camon-20-8gb-256gb-chinh-hang" class="title" title="TECNO CAMON 20 (8GB/256GB) - Ch&#237;nh h&#227;ng">TECNO CAMON 20 (8GB/256GB) - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>4,090,000 ₫</strong>
                            <strike>4,990,000 ₫</strike>
        </span>
        
        
        
    </div>




            <div class="note">
                <span class="bag">KM</span> <label title="Giảm ngay 150.000đ khi mua k&#232;m SIM số đẹp Vinaphone Happy - Ưu đ&#227;i 2GB Data/ng&#224;y - Miễn ph&#237; 1000 ph&#250;t nội mạng.">Giảm ngay 150.000đ khi mua k&#232;m SIM ...</label>
                    <strong class="text-orange">VÀ 9 KM KHÁC</strong>
            </div>
        <div class="promote">
            <a href="/dien-thoai-di-dong/tecno-camon-20-8gb-256gb-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> Giảm ngay 150.000đ khi mua k&#232;m SIM số đẹp Vinaphone Happy - Ưu đ&#227;i 2GB Data/ng&#224;y - Miễn ph&#237; 1000 ph&#250;t nội mạng.</li>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">

    <div class="img">
        <a href="/dien-thoai-di-dong/realme-c55-6gb-128gb-chinh-hang" title="realme C55 - 6GB/128GB - Ch&#237;nh h&#227;ng">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/03/13/c55-1-den.png" alt="realme C55 - 6GB/128GB - Ch&#237;nh h&#227;ng" title="realme C55 - 6GB/128GB - Ch&#237;nh h&#227;ng">
        </a>
    </div>


    

        <span class="sales">
            <i class="icon-flash2"></i> Giảm 1,300,000 ₫
        </span>

    <div class="info">
        <a href="/dien-thoai-di-dong/realme-c55-6gb-128gb-chinh-hang" class="title" title="realme C55 - 6GB/128GB - Ch&#237;nh h&#227;ng">realme C55 - 6GB/128GB - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>3,690,000 ₫</strong>
                            <strike>4,990,000 ₫</strike>
        </span>
        
        
        
    </div>




            <div class="note">
                <span class="bag">KM</span> <label title="Giảm ngay 150.000đ khi mua k&#232;m SIM số đẹp Vinaphone Happy - Ưu đ&#227;i 2GB Data/ng&#224;y - Miễn ph&#237; 1000 ph&#250;t nội mạng.">Giảm ngay 150.000đ khi mua k&#232;m SIM ...</label>
                    <strong class="text-orange">VÀ 8 KM KHÁC</strong>
            </div>
        <div class="promote">
            <a href="/dien-thoai-di-dong/realme-c55-6gb-128gb-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> Giảm ngay 150.000đ khi mua k&#232;m SIM số đẹp Vinaphone Happy - Ưu đ&#227;i 2GB Data/ng&#224;y - Miễn ph&#237; 1000 ph&#250;t nội mạng.</li>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">

    <div class="img">
        <a href="/dien-thoai-di-dong/redmi-note-12-pro-8gb-256gb-chinh-hang" title="Redmi Note 12 Pro (8GB/256GB) - Ch&#237;nh h&#227;ng">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/05/11/note12pro.png" alt="Redmi Note 12 Pro (8GB/256GB) - Ch&#237;nh h&#227;ng" title="Redmi Note 12 Pro (8GB/256GB) - Ch&#237;nh h&#227;ng">
        </a>
    </div>


    

        <span class="sales">
            <i class="icon-flash2"></i> Giảm 800,000 ₫
        </span>

    <div class="info">
        <a href="/dien-thoai-di-dong/redmi-note-12-pro-8gb-256gb-chinh-hang" class="title" title="Redmi Note 12 Pro (8GB/256GB) - Ch&#237;nh h&#227;ng">Redmi Note 12 Pro (8GB/256GB) - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>7,190,000 ₫</strong>
                            <strike>7,990,000 ₫</strike>
        </span>
        
        
        
            <div style="padding-top:8px; font-style:italic; text-align:left;">
                <label>Giá lên đời từ: <strong class="text-red">6,890,000 ₫</strong></label>
            </div>
    </div>




            <div class="note">
                <span class="bag">KM</span> <label title="Nhận khuyến mại giảm gi&#225; hoặc Tai nghe kh&#244;ng d&#226;y Redmi Buds 3 ch&#237;nh h&#227;ng (Chi tiết LH 1900.2091).">Nhận khuyến mại giảm gi&#225; hoặc Tai n...</label>
                    <strong class="text-orange">VÀ 10 KM KHÁC</strong>
            </div>
        <div class="promote">
            <a href="/dien-thoai-di-dong/redmi-note-12-pro-8gb-256gb-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> Nhận khuyến mại giảm gi&#225; hoặc Tai nghe kh&#244;ng d&#226;y Redmi Buds 3 ch&#237;nh h&#227;ng (Chi tiết LH 1900.2091).</li>
                        <li><span class="bag">KM</span> Giảm ngay 150.000đ khi mua k&#232;m SIM số đẹp Vinaphone Happy - Ưu đ&#227;i 2GB Data/ng&#224;y - Miễn ph&#237; 1000 ph&#250;t nội mạng.</li>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">

    <div class="img">
        <a href="/dien-thoai-di-dong/samsung-galaxy-s23-ultra-8gb-256gb-chinh-hang" title="Samsung Galaxy S23 Ultra 8GB/256GB - Ch&#237;nh h&#227;ng">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/11/27/samsung-galaxy-s23-ultra.png" alt="Samsung Galaxy S23 Ultra 8GB/256GB - Ch&#237;nh h&#227;ng" title="Samsung Galaxy S23 Ultra 8GB/256GB - Ch&#237;nh h&#227;ng">
        </a>
    </div>


    


    <div class="info">
        <a href="/dien-thoai-di-dong/samsung-galaxy-s23-ultra-8gb-256gb-chinh-hang" class="title" title="Samsung Galaxy S23 Ultra 8GB/256GB - Ch&#237;nh h&#227;ng">Samsung Galaxy S23 Ultra 8GB/256GB - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>22,690,000 ₫</strong>
                            <strike>31,990,000 ₫</strike>
        </span>
        
        
        
    </div>




            <div class="note">
                <span class="bag">KM</span> <label title="Trả g&#243;p tới 12 th&#225;ng kh&#244;ng l&#227;i, trả trước 0 đồng với Samsung Finance+">Trả g&#243;p tới 12 th&#225;ng kh&#244;ng l&#227;i, trả...</label>
                    <strong class="text-orange">VÀ 10 KM KHÁC</strong>
            </div>
        <div class="promote">
            <a href="/dien-thoai-di-dong/samsung-galaxy-s23-ultra-8gb-256gb-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> Trả g&#243;p tới 12 th&#225;ng kh&#244;ng l&#227;i, trả trước 0 đồng với Samsung Finance+</li>
                        <li><span class="bag">KM</span> Ưu đ&#227;i Youtube Premium d&#224;nh cho chủ sở hữu Samsung Galaxy (&#193;p dụng một số sản phẩm)</li>
                        <li><span class="bag">KM</span> Giảm ngay 150.000đ khi mua k&#232;m SIM số đẹp Vinaphone Happy - Ưu đ&#227;i 2GB Data/ng&#224;y - Miễn ph&#237; 1000 ph&#250;t nội mạng.</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">

    <div class="img">
        <a href="/dien-thoai-di-dong/samsung-galaxy-a54-5g-8gb-128gb-chinh-hang" title="Samsung Galaxy A54 5G 8GB/128GB - Ch&#237;nh h&#227;ng">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/12/05/anh-chup-man-hinh-2023-05-27-luc-21-06-44-removebg-preview.png" alt="Samsung Galaxy A54 5G 8GB/128GB - Ch&#237;nh h&#227;ng" title="Samsung Galaxy A54 5G 8GB/128GB - Ch&#237;nh h&#227;ng">
        </a>
    </div>


    


    <div class="info">
        <a href="/dien-thoai-di-dong/samsung-galaxy-a54-5g-8gb-128gb-chinh-hang" class="title" title="Samsung Galaxy A54 5G 8GB/128GB - Ch&#237;nh h&#227;ng">Samsung Galaxy A54 5G 8GB/128GB - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>8,590,000 ₫</strong>
                            <strike>10,490,000 ₫</strike>
        </span>
        
        
        
    </div>




            <div class="note">
                <span class="bag">KM</span> <label title="Trả g&#243;p tới 12 th&#225;ng kh&#244;ng l&#227;i, trả trước 0 đồng với Samsung Finance+">Trả g&#243;p tới 12 th&#225;ng kh&#244;ng l&#227;i, trả...</label>
                    <strong class="text-orange">VÀ 11 KM KHÁC</strong>
            </div>
        <div class="promote">
            <a href="/dien-thoai-di-dong/samsung-galaxy-a54-5g-8gb-128gb-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> Trả g&#243;p tới 12 th&#225;ng kh&#244;ng l&#227;i, trả trước 0 đồng với Samsung Finance+</li>
                        <li><span class="bag">KM</span> Ưu đ&#227;i Youtube Premium d&#224;nh cho chủ sở hữu Samsung Galaxy (&#193;p dụng một số sản phẩm)</li>
                        <li><span class="bag">KM</span> Giảm ngay 150.000đ khi mua k&#232;m SIM số đẹp Vinaphone Happy - Ưu đ&#227;i 2GB Data/ng&#224;y - Miễn ph&#237; 1000 ph&#250;t nội mạng.</li>
                </ul>
            </a>
        </div>
</div>                    </div>
                </div>
            </div>
        </section>


<section>
    <div class="container">
        <div class="ads">
                <a href="https://hoanghamobile.com/dien-thoai-di-dong/tecno/tecno-spark-10?source=BannerSlider" target="_top"><img src="https://cdn.hoanghamobile.com/i/home/Uploads/2023/10/24/tecno-spark-10.png" style="width: 100%;"></a>
        </div>
    </div>
</section>

    <section>
        <div class="container">
            <div class="flash-sales box-home">
                <div class="header-container">
                    <div class="header">
                        <h4><a href="/dong-ho">ĐỒNG HỒ TH&#212;NG MINH</a></h4>
                    </div>

                </div>

                <div class="content">
                    <div class="owl-carousel lr-slider equaHeight" data-obj=".info a.title">

<div class="item">
    <div class="img">
        <a href="/dong-ho-thong-minh/samsung-galaxy-watch-6-40mm-bt-r930-chinh-hang">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/07/26/glaxy-watch-6-classic-47mm-bt-r960-3.png" alt="Samsung Galaxy Watch6 40mm BT (R930) - Ch&#237;nh h&#227;ng" title="Samsung Galaxy Watch6 40mm BT (R930) - Ch&#237;nh h&#227;ng">
        </a>
    </div>

    

    <div class="info">
        <a href="/dong-ho-thong-minh/samsung-galaxy-watch-6-40mm-bt-r930-chinh-hang" class="title">Samsung Galaxy Watch6 40mm BT (R930) - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>6,290,000 ₫</strong>
                            <strike>6,990,000 ₫</strike>
        </span>
    </div>


        <div class="note">
            <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                <strong class="text-orange">VÀ 6 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/dong-ho-thong-minh/samsung-galaxy-watch-6-40mm-bt-r930-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">
    <div class="img">
        <a href="/dong-ho-thong-minh/samsung-galaxy-watch-6-44mm-bt-r940-chinh-hang">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/07/26/glaxy-watch-6-classic-47mm-bt-r960-3.png" alt="Samsung Galaxy Watch6 44mm BT (R940) - Ch&#237;nh h&#227;ng" title="Samsung Galaxy Watch6 44mm BT (R940) - Ch&#237;nh h&#227;ng">
        </a>
    </div>

    

    <div class="info">
        <a href="/dong-ho-thong-minh/samsung-galaxy-watch-6-44mm-bt-r940-chinh-hang" class="title">Samsung Galaxy Watch6 44mm BT (R940) - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>6,790,000 ₫</strong>
                            <strike>7,490,000 ₫</strike>
        </span>
    </div>


        <div class="note">
            <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                <strong class="text-orange">VÀ 6 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/dong-ho-thong-minh/samsung-galaxy-watch-6-44mm-bt-r940-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">
    <div class="img">
        <a href="/dong-ho-thong-minh/samsung-galaxy-watch-6-classic-43mm-bt-R950-chinh-hang">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/07/26/classic-den.png" alt="Samsung Galaxy Watch6 Classic 43mm BT (R950) - Ch&#237;nh h&#227;ng" title="Samsung Galaxy Watch6 Classic 43mm BT (R950) - Ch&#237;nh h&#227;ng">
        </a>
    </div>

    

    <div class="info">
        <a href="/dong-ho-thong-minh/samsung-galaxy-watch-6-classic-43mm-bt-R950-chinh-hang" class="title">Samsung Galaxy Watch6 Classic 43mm BT (R950) - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>8,290,000 ₫</strong>
                            <strike>8,990,000 ₫</strike>
        </span>
    </div>


        <div class="note">
            <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                <strong class="text-orange">VÀ 6 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/dong-ho-thong-minh/samsung-galaxy-watch-6-classic-43mm-bt-R950-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">
    <div class="img">
        <a href="/dong-ho-thong-minh/samsung-galaxy-watch-6-classic-47mm-bt-R960-chinh-hang">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/07/26/classic-bac.png" alt="Samsung Galaxy Watch6 Classic 47mm BT (R960) - Ch&#237;nh h&#227;ng" title="Samsung Galaxy Watch6 Classic 47mm BT (R960) - Ch&#237;nh h&#227;ng">
        </a>
    </div>

    

    <div class="info">
        <a href="/dong-ho-thong-minh/samsung-galaxy-watch-6-classic-47mm-bt-R960-chinh-hang" class="title">Samsung Galaxy Watch6 Classic 47mm BT (R960) - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>8,690,000 ₫</strong>
                    </span>
    </div>


        <div class="note">
            <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                <strong class="text-orange">VÀ 6 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/dong-ho-thong-minh/samsung-galaxy-watch-6-classic-47mm-bt-R960-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">
    <div class="img">
        <a href="/dong-ho-thong-minh/dong-ho-thong-minh-redmi-watch-2-lite-chinh-hang">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2021/11/29/image-removebg-preview-1.png" alt="Đồng hồ th&#244;ng minh Redmi Watch 2 Lite - Ch&#237;nh h&#227;ng" title="Đồng hồ th&#244;ng minh Redmi Watch 2 Lite - Ch&#237;nh h&#227;ng">
        </a>
    </div>

    

    <div class="info">
        <a href="/dong-ho-thong-minh/dong-ho-thong-minh-redmi-watch-2-lite-chinh-hang" class="title">Đồng hồ th&#244;ng minh Redmi Watch 2 Lite - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>899,000 ₫</strong>
                            <strike>1,490,000 ₫</strike>
        </span>
    </div>


        <div class="note">
            <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                <strong class="text-orange">VÀ 5 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/dong-ho-thong-minh/dong-ho-thong-minh-redmi-watch-2-lite-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">
    <div class="img">
        <a href="/dong-ho-thong-minh/dong-ho-thong-minh-xiaomi-watch-s1-active-chinh-hang">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2022/03/31/image-removebg-preview.png" alt="Đồng hồ th&#244;ng minh Xiaomi Watch S1 Active - Ch&#237;nh h&#227;ng" title="Đồng hồ th&#244;ng minh Xiaomi Watch S1 Active - Ch&#237;nh h&#227;ng">
        </a>
    </div>

    

    <div class="info">
        <a href="/dong-ho-thong-minh/dong-ho-thong-minh-xiaomi-watch-s1-active-chinh-hang" class="title">Đồng hồ th&#244;ng minh Xiaomi Watch S1 Active - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>2,290,000 ₫</strong>
                            <strike>4,490,000 ₫</strike>
        </span>
    </div>


        <div class="note">
            <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                <strong class="text-orange">VÀ 5 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/dong-ho-thong-minh/dong-ho-thong-minh-xiaomi-watch-s1-active-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">
    <div class="img">
        <a href="/vong-deo-tay-thong-minh-xiaomi-mi-band-7-chinh-hang">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2022/06/13/xi.png" alt="V&#242;ng đeo tay th&#244;ng minh Xiaomi Mi Band 7 - Ch&#237;nh h&#227;ng" title="V&#242;ng đeo tay th&#244;ng minh Xiaomi Mi Band 7 - Ch&#237;nh h&#227;ng">
        </a>
    </div>

    

    <div class="info">
        <a href="/vong-deo-tay-thong-minh-xiaomi-mi-band-7-chinh-hang" class="title">V&#242;ng đeo tay th&#244;ng minh Xiaomi Mi Band 7 - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>750,000 ₫</strong>
                            <strike>1,290,000 ₫</strike>
        </span>
    </div>


        <div class="note">
            <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                <strong class="text-orange">VÀ 5 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/vong-deo-tay-thong-minh-xiaomi-mi-band-7-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">
    <div class="img">
        <a href="/dong-ho-thong-minh/apple-watch-series-8-gps-41mm-vien-nhom-day-cao-su-vn-a">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/07/18/s8-41.png" alt="Apple Watch Series 8 GPS 41mm - Viền nh&#244;m d&#226;y cao su - VN/A" title="Apple Watch Series 8 GPS 41mm - Viền nh&#244;m d&#226;y cao su - VN/A">
        </a>
    </div>

            <div class="sticker sticker-left">
                <span><img src="/Content/web/sticker/apple.png
" title="Chính Hãng Apple" /></span>
        </div>


    <div class="info">
        <a href="/dong-ho-thong-minh/apple-watch-series-8-gps-41mm-vien-nhom-day-cao-su-vn-a" class="title">Apple Watch Series 8 GPS 41mm - Viền nh&#244;m d&#226;y cao su - VN/A</a>
        <span class="price">
                <strong>8,550,000 ₫</strong>
                    </span>
    </div>


        <div class="note">
            <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                <strong class="text-orange">VÀ 7 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/dong-ho-thong-minh/apple-watch-series-8-gps-41mm-vien-nhom-day-cao-su-vn-a">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">
    <div class="img">
        <a href="/dong-ho-thong-minh/apple-watch-se-gps-lte-40mm-vo-nhom-day-cao-su-chinh-hang-vn-a">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/09/20/apple-watch-se-2022-silver-40.png" alt="Apple Watch SE 2022 - GPS + LTE, 40mm - Vỏ Nh&#244;m D&#226;y Cao Su - VN/A" title="Apple Watch SE 2022 - GPS + LTE, 40mm - Vỏ Nh&#244;m D&#226;y Cao Su - VN/A">
        </a>
    </div>

            <div class="sticker sticker-left">
                <span><img src="/Content/web/sticker/apple.png
" title="Chính Hãng Apple" /></span>
        </div>


    <div class="info">
        <a href="/dong-ho-thong-minh/apple-watch-se-gps-lte-40mm-vo-nhom-day-cao-su-chinh-hang-vn-a" class="title">Apple Watch SE 2022 - GPS + LTE, 40mm - Vỏ Nh&#244;m D&#226;y Cao Su - VN/A</a>
        <span class="price">
                <strong>7,190,000 ₫</strong>
                    </span>
    </div>


        <div class="note">
            <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                <strong class="text-orange">VÀ 7 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/dong-ho-thong-minh/apple-watch-se-gps-lte-40mm-vo-nhom-day-cao-su-chinh-hang-vn-a">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">
    <div class="img">
        <a href="/dong-ho-thong-minh/apple-watch-se-gps-40mm-vo-nhom-day-cao-su-chinh-hang-vn-a">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/09/20/apple-watch-se-2022-silver-40.png" alt="Apple Watch SE 2022 - GPS, 40mm - Vỏ Nh&#244;m D&#226;y Cao Su - VN/A" title="Apple Watch SE 2022 - GPS, 40mm - Vỏ Nh&#244;m D&#226;y Cao Su - VN/A">
        </a>
    </div>

            <div class="sticker sticker-left">
                <span><img src="/Content/web/sticker/apple.png
" title="Chính Hãng Apple" /></span>
        </div>


    <div class="info">
        <a href="/dong-ho-thong-minh/apple-watch-se-gps-40mm-vo-nhom-day-cao-su-chinh-hang-vn-a" class="title">Apple Watch SE 2022 - GPS, 40mm - Vỏ Nh&#244;m D&#226;y Cao Su - VN/A</a>
        <span class="price">
                <strong>5,890,000 ₫</strong>
                    </span>
    </div>


        <div class="note">
            <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                <strong class="text-orange">VÀ 7 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/dong-ho-thong-minh/apple-watch-se-gps-40mm-vo-nhom-day-cao-su-chinh-hang-vn-a">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">
    <div class="img">
        <a href="/vong-deo-tay-thong-minh-huawei-band-7-chinh-hang">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2022/06/13/vong-deo-tay-thong-minh-huawei-band-7-chinh-hang-12.png" alt="Huawei Band 7 - Ch&#237;nh h&#227;ng" title="Huawei Band 7 - Ch&#237;nh h&#227;ng">
        </a>
    </div>

    

    <div class="info">
        <a href="/vong-deo-tay-thong-minh-huawei-band-7-chinh-hang" class="title">Huawei Band 7 - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>749,000 ₫</strong>
                            <strike>1,090,000 ₫</strike>
        </span>
    </div>


        <div class="note">
            <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                <strong class="text-orange">VÀ 5 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/vong-deo-tay-thong-minh-huawei-band-7-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">
    <div class="img">
        <a href="/dong-ho-thong-minh/dong-ho-thong-minh-huawei-watch-gt3-leather-chinh-hang">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2021/11/25/image-removebg-preview-3.png" alt="Huawei Watch GT3 Leather - Ch&#237;nh h&#227;ng" title="Huawei Watch GT3 Leather - Ch&#237;nh h&#227;ng">
        </a>
    </div>

    

    <div class="info">
        <a href="/dong-ho-thong-minh/dong-ho-thong-minh-huawei-watch-gt3-leather-chinh-hang" class="title">Huawei Watch GT3 Leather - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>4,390,000 ₫</strong>
                            <strike>5,990,000 ₫</strike>
        </span>
    </div>


        <div class="note">
            <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                <strong class="text-orange">VÀ 7 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/dong-ho-thong-minh/dong-ho-thong-minh-huawei-watch-gt3-leather-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">
    <div class="img">
        <a href="/dong-ho-thong-minh/dong-ho-thong-minh-huawei-watch-gt3-pro-active-day-siicon-chinh-hang">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2022/05/18/mkt-odin-product-lmage-fluoroelastomer-front-30-right-en-hq-png-800x800-20220403.png" alt="Huawei Watch GT3 Pro Active - Ch&#237;nh h&#227;ng" title="Huawei Watch GT3 Pro Active - Ch&#237;nh h&#227;ng">
        </a>
    </div>

    

    <div class="info">
        <a href="/dong-ho-thong-minh/dong-ho-thong-minh-huawei-watch-gt3-pro-active-day-siicon-chinh-hang" class="title">Huawei Watch GT3 Pro Active - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>6,990,000 ₫</strong>
                            <strike>8,490,000 ₫</strike>
        </span>
    </div>


        <div class="note">
            <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                <strong class="text-orange">VÀ 6 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/dong-ho-thong-minh/dong-ho-thong-minh-huawei-watch-gt3-pro-active-day-siicon-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">
    <div class="img">
        <a href="/smartwatch/dong-ho-garmin-venu-sq-chinh-hang-fpt">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2020/11/04/venu-sq.png" alt="Garmin Venu SQ - Ch&#237;nh h&#227;ng FPT" title="Garmin Venu SQ - Ch&#237;nh h&#227;ng FPT">
        </a>
    </div>

    

    <div class="info">
        <a href="/smartwatch/dong-ho-garmin-venu-sq-chinh-hang-fpt" class="title">Garmin Venu SQ - Ch&#237;nh h&#227;ng FPT</a>
        <span class="price">
                <strong>3,390,000 ₫</strong>
                            <strike>4,990,000 ₫</strike>
        </span>
    </div>


        <div class="note">
            <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                <strong class="text-orange">VÀ 6 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/smartwatch/dong-ho-garmin-venu-sq-chinh-hang-fpt">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">
    <div class="img">
        <a href="/dong-ho-thong-minh/apple-watch-series-7-gps-41mm-–-vien-nhom-day-cao-su-chinh-hang-vn-a">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2021/09/15/image-removebg-preview-28.png" alt="Apple Watch Series 7 GPS, 41mm – Viền nh&#244;m d&#226;y cao su - Ch&#237;nh h&#227;ng VN/A" title="Apple Watch Series 7 GPS, 41mm – Viền nh&#244;m d&#226;y cao su - Ch&#237;nh h&#227;ng VN/A">
        </a>
    </div>

            <div class="sticker sticker-left">
                <span><img src="/Content/web/sticker/apple.png
" title="Chính Hãng Apple" /></span>
        </div>


    <div class="info">
        <a href="/dong-ho-thong-minh/apple-watch-series-7-gps-41mm-–-vien-nhom-day-cao-su-chinh-hang-vn-a" class="title">Apple Watch Series 7 GPS, 41mm – Viền nh&#244;m d&#226;y cao su - Ch&#237;nh h&#227;ng VN/A</a>
        <span class="price">
                <strong>7,990,000 ₫</strong>
                    </span>
    </div>


        <div class="note">
            <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                <strong class="text-orange">VÀ 7 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/dong-ho-thong-minh/apple-watch-series-7-gps-41mm-–-vien-nhom-day-cao-su-chinh-hang-vn-a">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">
    <div class="img">
        <a href="/dong-ho-thong-minh/dong-ho-thong-minh-myalo-k84w-4g-chinh-hang">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2021/03/09/image-removebg-preview-1.png" alt="Đồng hồ th&#244;ng minh myAlo K84W- 4G - Ch&#237;nh h&#227;ng" title="Đồng hồ th&#244;ng minh myAlo K84W- 4G - Ch&#237;nh h&#227;ng">
        </a>
    </div>

    

    <div class="info">
        <a href="/dong-ho-thong-minh/dong-ho-thong-minh-myalo-k84w-4g-chinh-hang" class="title">Đồng hồ th&#244;ng minh myAlo K84W- 4G - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>2,750,000 ₫</strong>
                            <strike>2,990,000 ₫</strike>
        </span>
    </div>


        <div class="note">
            <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                <strong class="text-orange">VÀ 5 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/dong-ho-thong-minh/dong-ho-thong-minh-myalo-k84w-4g-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">
    <div class="img">
        <a href="/smartwatch/dong-ho-dinh-vi-tre-em-myalo-ks72c-chinh-hang">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/02/15/ks72c.png" alt="myAlo KS72C - Ch&#237;nh h&#227;ng" title="myAlo KS72C - Ch&#237;nh h&#227;ng">
        </a>
    </div>

    

    <div class="info">
        <a href="/smartwatch/dong-ho-dinh-vi-tre-em-myalo-ks72c-chinh-hang" class="title">myAlo KS72C - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>1,490,000 ₫</strong>
                            <strike>1,690,000 ₫</strike>
        </span>
    </div>


        <div class="note">
            <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                <strong class="text-orange">VÀ 5 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/smartwatch/dong-ho-dinh-vi-tre-em-myalo-ks72c-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">
    <div class="img">
        <a href="/smartwatch/dong-ho-dinh-vi-tre-em-myalo-ks62w-chinh-hang">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/02/15/ks62w.png" alt="myAlo KS62W - Ch&#237;nh h&#227;ng" title="myAlo KS62W - Ch&#237;nh h&#227;ng">
        </a>
    </div>

    

    <div class="info">
        <a href="/smartwatch/dong-ho-dinh-vi-tre-em-myalo-ks62w-chinh-hang" class="title">myAlo KS62W - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>1,150,000 ₫</strong>
                            <strike>1,390,000 ₫</strike>
        </span>
    </div>


        <div class="note">
            <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                <strong class="text-orange">VÀ 5 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/smartwatch/dong-ho-dinh-vi-tre-em-myalo-ks62w-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>                    </div>
                </div>

            </div>
        </div>
    </section>


<section>
    <div class="container">
        <div class="ads">
                <a href="https://hoanghamobile.com/laptop/msi/msi-gaming?source=BoxHomeProduct" target="_top"><img src="https://cdn.hoanghamobile.com/i/home/Uploads/2023/12/04/banner-1200x200-01.png" style="width: 100%;"></a>
        </div>
    </div>
</section>

        <section>
            <div class="container">
                <div class="box-product-home box-home">
                    <div class="header-container">
                        <div class="header">
                            <h4><a href="/laptop">Laptop nổi bật</a></h4>
                        </div>
                            <div class="other-link">
                                    <a href="https://hoanghamobile.com/laptop/laptop-asus-tuf-gaming-f15-fx507zc4-hn074w-chinh-hang">ASUS TUF Gaming F15</a>
                                    <a href="https://hoanghamobile.com/laptop/laptop-msi-modern-14-c7m-221vn-chinh-hang">MSI Modern 14</a>
                                    <a href="https://hoanghamobile.com/laptop/laptop-gaming-msi-bravo-15-b7ed-010vn-chinh-hang">MSI Bravo 15</a>
                                    <a href="https://hoanghamobile.com/laptop/laptop-lenovo-ideapad-3-15aba7-82sg007kvn-chinh-hang">Lenovo IdeaPad 5</a>
                                    <a href="https://hoanghamobile.com/laptop/laptop-hp-15s-fq5159tu-7c0s0pa-chinh-hang">HP 15s</a>
                                <a class="actived" href="/laptop">Xem tất cả</a>
                            </div>
                    </div>
                    <div class="col-content lts-product">


<div class="item">

    <div class="img">
        <a href="/laptop/laptop-asus-expertbook-p2451fa-ek3299t-i3-10110u-4gb-256gb-ssd-14-0fhd-w10" title="Laptop Asus ExpertBook P2451FA-EK3299T - Ch&#237;nh h&#227;ng">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/03/08/laptop-asus-expertbook-p2451fa-ek3299t-01.jpg" alt="Laptop Asus ExpertBook P2451FA-EK3299T - Ch&#237;nh h&#227;ng" title="Laptop Asus ExpertBook P2451FA-EK3299T - Ch&#237;nh h&#227;ng">
        </a>
    </div>


    


    <div class="info">
        <a href="/laptop/laptop-asus-expertbook-p2451fa-ek3299t-i3-10110u-4gb-256gb-ssd-14-0fhd-w10" class="title" title="Laptop Asus ExpertBook P2451FA-EK3299T - Ch&#237;nh h&#227;ng">Laptop Asus ExpertBook P2451FA-EK3299T - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>6,790,000 ₫</strong>
                            <strike>9,990,000 ₫</strike>
        </span>
        
        
            <div style="padding-top:8px; font-style:italic; text-align:left;">
                <label>Gi&#225; HSSV: <strong class="text-red">6,450,500 ₫</strong></label>
            </div>
        
    </div>




            <div class="note">
                <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                    <strong class="text-orange">VÀ 9 KM KHÁC</strong>
            </div>
        <div class="promote">
            <a href="/laptop/laptop-asus-expertbook-p2451fa-ek3299t-i3-10110u-4gb-256gb-ssd-14-0fhd-w10">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">

    <div class="img">
        <a href="/laptop/laptop-lenovo-ideapad-gaming-3-15arh7-82sb00bbvn-chinh-hang" title="Laptop Lenovo IdeaPad Gaming 3 15ARH7-82SB00BBVN - Ch&#237;nh h&#227;ng">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/10/13/82sb00bbvn.jpg" alt="Laptop Lenovo IdeaPad Gaming 3 15ARH7-82SB00BBVN - Ch&#237;nh h&#227;ng" title="Laptop Lenovo IdeaPad Gaming 3 15ARH7-82SB00BBVN - Ch&#237;nh h&#227;ng">
        </a>
    </div>

        <div class="last-price">
            <div class="bg">
                <strong>GIÁ CUỐI:</strong>
                <label class="text-red">17,790,000 ₫</label>
            </div>
        </div>

    


    <div class="info">
        <a href="/laptop/laptop-lenovo-ideapad-gaming-3-15arh7-82sb00bbvn-chinh-hang" class="title" title="Laptop Lenovo IdeaPad Gaming 3 15ARH7-82SB00BBVN - Ch&#237;nh h&#227;ng">Laptop Lenovo IdeaPad Gaming 3 15ARH7-82SB00BBVN - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>17,990,000 ₫</strong>
                            <strike>19,990,000 ₫</strike>
        </span>
        
        
            <div style="padding-top:8px; font-style:italic; text-align:left;">
                <label>Gi&#225; HSSV: <strong class="text-red">17,440,000 ₫</strong></label>
            </div>
        
    </div>




            <div class="note">
                <span class="bag">KM</span> <label title="Tặng phiếu mua h&#224;ng 200.000đ">Tặng phiếu mua h&#224;ng 200.000đ</label>
                    <strong class="text-orange">VÀ 12 KM KHÁC</strong>
            </div>
        <div class="promote">
            <a href="/laptop/laptop-lenovo-ideapad-gaming-3-15arh7-82sb00bbvn-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> Tặng phiếu mua h&#224;ng 200.000đ</li>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">

    <div class="img">
        <a href="/laptop/laptop-acer-gaming-aspire-7-a715-43g-r8ga-r5-5625u-8gb-512gb-15-6fhd144hz" title="Laptop Gaming Acer Aspire 7 A715-43G-R8GA - Ch&#237;nh h&#227;ng">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/03/06/laptop-acer-gaming-aspire-7-a715-43g-r8ga-01.jpg" alt="Laptop Gaming Acer Aspire 7 A715-43G-R8GA - Ch&#237;nh h&#227;ng" title="Laptop Gaming Acer Aspire 7 A715-43G-R8GA - Ch&#237;nh h&#227;ng">
        </a>
    </div>

        <div class="last-price">
            <div class="bg">
                <strong>GIÁ CUỐI:</strong>
                <label class="text-red">15,990,000 ₫</label>
            </div>
        </div>

    


    <div class="info">
        <a href="/laptop/laptop-acer-gaming-aspire-7-a715-43g-r8ga-r5-5625u-8gb-512gb-15-6fhd144hz" class="title" title="Laptop Gaming Acer Aspire 7 A715-43G-R8GA - Ch&#237;nh h&#227;ng">Laptop Gaming Acer Aspire 7 A715-43G-R8GA - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>16,490,000 ₫</strong>
                            <strike>21,990,000 ₫</strike>
        </span>
        
        
            <div style="padding-top:8px; font-style:italic; text-align:left;">
                <label>Gi&#225; HSSV: <strong class="text-red">15,640,000 ₫</strong></label>
            </div>
        
    </div>




            <div class="note">
                <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                    <strong class="text-orange">VÀ 10 KM KHÁC</strong>
            </div>
        <div class="promote">
            <a href="/laptop/laptop-acer-gaming-aspire-7-a715-43g-r8ga-r5-5625u-8gb-512gb-15-6fhd144hz">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">

    <div class="img">
        <a href="/laptop/laptop-lenovo-thinkbook-15-gen-4-21dj00cwvn-chinh-hang" title="Laptop Lenovo ThinkBook 15 Gen 4 - 21DJ00CWVN - Ch&#237;nh h&#227;ng">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/09/26/21dj00cwvn-0.jpg" alt="Laptop Lenovo ThinkBook 15 Gen 4 - 21DJ00CWVN - Ch&#237;nh h&#227;ng" title="Laptop Lenovo ThinkBook 15 Gen 4 - 21DJ00CWVN - Ch&#237;nh h&#227;ng">
        </a>
    </div>

        <div class="last-price">
            <div class="bg">
                <strong>GIÁ CUỐI:</strong>
                <label class="text-red">17,990,000 ₫</label>
            </div>
        </div>

    


    <div class="info">
        <a href="/laptop/laptop-lenovo-thinkbook-15-gen-4-21dj00cwvn-chinh-hang" class="title" title="Laptop Lenovo ThinkBook 15 Gen 4 - 21DJ00CWVN - Ch&#237;nh h&#227;ng">Laptop Lenovo ThinkBook 15 Gen 4 - 21DJ00CWVN - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>17,990,000 ₫</strong>
                            <strike>23,990,000 ₫</strike>
        </span>
        
        
            <div style="padding-top:8px; font-style:italic; text-align:left;">
                <label>Gi&#225; HSSV: <strong class="text-red">17,640,000 ₫</strong></label>
            </div>
        
    </div>




            <div class="note">
                <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                    <strong class="text-orange">VÀ 9 KM KHÁC</strong>
            </div>
        <div class="promote">
            <a href="/laptop/laptop-lenovo-thinkbook-15-gen-4-21dj00cwvn-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">

    <div class="img">
        <a href="/lap-top/laptop-huawei-matebook-d-15-amd-2021-8gb-512gb-chinh-hang" title="Laptop HUAWEI MateBook D 15 AMD (8GB/512GB) - Ch&#237;nh h&#227;ng">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/07/21/d-15-amd.jpg" alt="Laptop HUAWEI MateBook D 15 AMD (8GB/512GB) - Ch&#237;nh h&#227;ng" title="Laptop HUAWEI MateBook D 15 AMD (8GB/512GB) - Ch&#237;nh h&#227;ng">
        </a>
    </div>

        <div class="last-price">
            <div class="bg">
                <strong>GIÁ CUỐI:</strong>
                <label class="text-red">11,790,000 ₫</label>
            </div>
        </div>

    


    <div class="info">
        <a href="/lap-top/laptop-huawei-matebook-d-15-amd-2021-8gb-512gb-chinh-hang" class="title" title="Laptop HUAWEI MateBook D 15 AMD (8GB/512GB) - Ch&#237;nh h&#227;ng">Laptop HUAWEI MateBook D 15 AMD (8GB/512GB) - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>11,790,000 ₫</strong>
                            <strike>13,990,000 ₫</strike>
        </span>
        
        
            <div style="padding-top:8px; font-style:italic; text-align:left;">
                <label>Gi&#225; HSSV: <strong class="text-red">11,440,000 ₫</strong></label>
            </div>
        
    </div>




            <div class="note">
                <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                    <strong class="text-orange">VÀ 11 KM KHÁC</strong>
            </div>
        <div class="promote">
            <a href="/lap-top/laptop-huawei-matebook-d-15-amd-2021-8gb-512gb-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">

    <div class="img">
        <a href="/laptop/laptop-lenovo-v14-g3-iap-82tsa071vn-chinh-hang" title="Laptop Lenovo V14 G3 IAP 82TSA071VN - Ch&#237;nh h&#227;ng">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/10/16/82tsa071vn_638330646964781206.jpg" alt="Laptop Lenovo V14 G3 IAP 82TSA071VN - Ch&#237;nh h&#227;ng" title="Laptop Lenovo V14 G3 IAP 82TSA071VN - Ch&#237;nh h&#227;ng">
        </a>
    </div>

        <div class="last-price">
            <div class="bg">
                <strong>GIÁ CUỐI:</strong>
                <label class="text-red">7,490,000 ₫</label>
            </div>
        </div>

    


    <div class="info">
        <a href="/laptop/laptop-lenovo-v14-g3-iap-82tsa071vn-chinh-hang" class="title" title="Laptop Lenovo V14 G3 IAP 82TSA071VN - Ch&#237;nh h&#227;ng">Laptop Lenovo V14 G3 IAP 82TSA071VN - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>7,490,000 ₫</strong>
                            <strike>10,990,000 ₫</strike>
        </span>
        
        
            <div style="padding-top:8px; font-style:italic; text-align:left;">
                <label>Gi&#225; HSSV: <strong class="text-red">7,140,000 ₫</strong></label>
            </div>
        
    </div>




            <div class="note">
                <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                    <strong class="text-orange">VÀ 10 KM KHÁC</strong>
            </div>
        <div class="promote">
            <a href="/laptop/laptop-lenovo-v14-g3-iap-82tsa071vn-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">

    <div class="img">
        <a href="/laptop/laptop-lenovo-ideapad-3-14iau7-82rj009mvn-chinh-hang" title="Laptop Lenovo IdeaPad 3 14IAU7-82RJ009MVN - Ch&#237;nh h&#227;ng">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/04/04/82rj009mvn-0.jpg" alt="Laptop Lenovo IdeaPad 3 14IAU7-82RJ009MVN - Ch&#237;nh h&#227;ng" title="Laptop Lenovo IdeaPad 3 14IAU7-82RJ009MVN - Ch&#237;nh h&#227;ng">
        </a>
    </div>

        <div class="last-price">
            <div class="bg">
                <strong>GIÁ CUỐI:</strong>
                <label class="text-red">8,490,000 ₫</label>
            </div>
        </div>

    


    <div class="info">
        <a href="/laptop/laptop-lenovo-ideapad-3-14iau7-82rj009mvn-chinh-hang" class="title" title="Laptop Lenovo IdeaPad 3 14IAU7-82RJ009MVN - Ch&#237;nh h&#227;ng">Laptop Lenovo IdeaPad 3 14IAU7-82RJ009MVN - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>8,490,000 ₫</strong>
                            <strike>13,990,000 ₫</strike>
        </span>
        
        
            <div style="padding-top:8px; font-style:italic; text-align:left;">
                <label>Gi&#225; HSSV: <strong class="text-red">8,140,000 ₫</strong></label>
            </div>
        
    </div>




            <div class="note">
                <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                    <strong class="text-orange">VÀ 9 KM KHÁC</strong>
            </div>
        <div class="promote">
            <a href="/laptop/laptop-lenovo-ideapad-3-14iau7-82rj009mvn-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">

    <div class="img">
        <a href="/laptop/laptop-dell-vostro-3520-v5i3614w1-chinh-hang" title="Laptop Dell Vostro 3520-V5I3614W1 - Ch&#237;nh h&#227;ng">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/04/25/v513614w1-0.jpg" alt="Laptop Dell Vostro 3520-V5I3614W1 - Ch&#237;nh h&#227;ng" title="Laptop Dell Vostro 3520-V5I3614W1 - Ch&#237;nh h&#227;ng">
        </a>
    </div>

        <div class="last-price">
            <div class="bg">
                <strong>GIÁ CUỐI:</strong>
                <label class="text-red">10,490,000 ₫</label>
            </div>
        </div>

    


    <div class="info">
        <a href="/laptop/laptop-dell-vostro-3520-v5i3614w1-chinh-hang" class="title" title="Laptop Dell Vostro 3520-V5I3614W1 - Ch&#237;nh h&#227;ng">Laptop Dell Vostro 3520-V5I3614W1 - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>10,490,000 ₫</strong>
                            <strike>13,990,000 ₫</strike>
        </span>
        
        
            <div style="padding-top:8px; font-style:italic; text-align:left;">
                <label>Gi&#225; HSSV: <strong class="text-red">10,140,000 ₫</strong></label>
            </div>
        
    </div>




            <div class="note">
                <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                    <strong class="text-orange">VÀ 8 KM KHÁC</strong>
            </div>
        <div class="promote">
            <a href="/laptop/laptop-dell-vostro-3520-v5i3614w1-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">

    <div class="img">
        <a href="/laptop/laptop-lg-gram-2022-14zd90q-g-ax32a5-chinh-hang" title="Laptop LG gram 2022 14ZD90Q-G.AX32A5 - Ch&#237;nh h&#227;ng">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/03/06/14zd90q-g-ax32a5-1.png" alt="Laptop LG gram 2022 14ZD90Q-G.AX32A5 - Ch&#237;nh h&#227;ng" title="Laptop LG gram 2022 14ZD90Q-G.AX32A5 - Ch&#237;nh h&#227;ng">
        </a>
    </div>

        <div class="last-price">
            <div class="bg">
                <strong>GIÁ CUỐI:</strong>
                <label class="text-red">15,490,000 ₫</label>
            </div>
        </div>

    

        <span class="sales">
            <i class="icon-flash2"></i> Giảm 7,800,000 ₫
        </span>

    <div class="info">
        <a href="/laptop/laptop-lg-gram-2022-14zd90q-g-ax32a5-chinh-hang" class="title" title="Laptop LG gram 2022 14ZD90Q-G.AX32A5 - Ch&#237;nh h&#227;ng">Laptop LG gram 2022 14ZD90Q-G.AX32A5 - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>15,490,000 ₫</strong>
                            <strike>23,290,000 ₫</strike>
        </span>
        
        
            <div style="padding-top:8px; font-style:italic; text-align:left;">
                <label>Gi&#225; HSSV: <strong class="text-red">15,140,000 ₫</strong></label>
            </div>
        
    </div>




            <div class="note">
                <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                    <strong class="text-orange">VÀ 10 KM KHÁC</strong>
            </div>
        <div class="promote">
            <a href="/laptop/laptop-lg-gram-2022-14zd90q-g-ax32a5-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">

    <div class="img">
        <a href="/laptop/laptop-asus-vivobook-15-x1504va-nj070w-chinh-hang" title="Laptop ASUS VivoBook 15 X1504VA-NJ070W - Ch&#237;nh h&#227;ng">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/07/31/x1504va-nj070w_638264189418692393.jpg" alt="Laptop ASUS VivoBook 15 X1504VA-NJ070W - Ch&#237;nh h&#227;ng" title="Laptop ASUS VivoBook 15 X1504VA-NJ070W - Ch&#237;nh h&#227;ng">
        </a>
    </div>


    


    <div class="info">
        <a href="/laptop/laptop-asus-vivobook-15-x1504va-nj070w-chinh-hang" class="title" title="Laptop ASUS VivoBook 15 X1504VA-NJ070W - Ch&#237;nh h&#227;ng">Laptop ASUS VivoBook 15 X1504VA-NJ070W - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>14,890,000 ₫</strong>
                            <strike>18,490,000 ₫</strike>
        </span>
        
        
            <div style="padding-top:8px; font-style:italic; text-align:left;">
                <label>Gi&#225; HSSV: <strong class="text-red">14,340,000 ₫</strong></label>
            </div>
        
    </div>




            <div class="note">
                <span class="bag">KM</span> <label title="Tặng phiếu mua h&#224;ng 200.000đ">Tặng phiếu mua h&#224;ng 200.000đ</label>
                    <strong class="text-orange">VÀ 10 KM KHÁC</strong>
            </div>
        <div class="promote">
            <a href="/laptop/laptop-asus-vivobook-15-x1504va-nj070w-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> Tặng phiếu mua h&#224;ng 200.000đ</li>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">

    <div class="img">
        <a href="/laptop/laptop-asus-gaming-tuf-fx506lhb-hn188w-chinh-hang" title="Laptop ASUS TUF Gaming FX506LHB-HN188W - Ch&#237;nh h&#227;ng">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/03/08/laptop-asus-gaming-tuf-fx506lhb-hn188w-01.jpg" alt="Laptop ASUS TUF Gaming FX506LHB-HN188W - Ch&#237;nh h&#227;ng" title="Laptop ASUS TUF Gaming FX506LHB-HN188W - Ch&#237;nh h&#227;ng">
        </a>
    </div>


    


    <div class="info">
        <a href="/laptop/laptop-asus-gaming-tuf-fx506lhb-hn188w-chinh-hang" class="title" title="Laptop ASUS TUF Gaming FX506LHB-HN188W - Ch&#237;nh h&#227;ng">Laptop ASUS TUF Gaming FX506LHB-HN188W - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>14,490,000 ₫</strong>
                            <strike>21,990,000 ₫</strike>
        </span>
        
        
            <div style="padding-top:8px; font-style:italic; text-align:left;">
                <label>Gi&#225; HSSV: <strong class="text-red">14,140,000 ₫</strong></label>
            </div>
        
    </div>




            <div class="note">
                <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                    <strong class="text-orange">VÀ 10 KM KHÁC</strong>
            </div>
        <div class="promote">
            <a href="/laptop/laptop-asus-gaming-tuf-fx506lhb-hn188w-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">

    <div class="img">
        <a href="/laptop/laptop-asus-vivobook-go-e1404fa-nk113w-chinh-hang" title="Laptop ASUS VivoBook Go 14 E1404FA-NK113W - Ch&#237;nh h&#227;ng">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/07/31/nk113w.jpg" alt="Laptop ASUS VivoBook Go 14 E1404FA-NK113W - Ch&#237;nh h&#227;ng" title="Laptop ASUS VivoBook Go 14 E1404FA-NK113W - Ch&#237;nh h&#227;ng">
        </a>
    </div>


    


    <div class="info">
        <a href="/laptop/laptop-asus-vivobook-go-e1404fa-nk113w-chinh-hang" class="title" title="Laptop ASUS VivoBook Go 14 E1404FA-NK113W - Ch&#237;nh h&#227;ng">Laptop ASUS VivoBook Go 14 E1404FA-NK113W - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>8,990,000 ₫</strong>
                            <strike>11,490,000 ₫</strike>
        </span>
        
        
            <div style="padding-top:8px; font-style:italic; text-align:left;">
                <label>Gi&#225; HSSV: <strong class="text-red">8,240,000 ₫</strong></label>
            </div>
        
    </div>




            <div class="note">
                <span class="bag">KM</span> <label title="Tặng phiếu mua h&#224;ng 400.000đ.">Tặng phiếu mua h&#224;ng 400.000đ.</label>
                    <strong class="text-orange">VÀ 10 KM KHÁC</strong>
            </div>
        <div class="promote">
            <a href="/laptop/laptop-asus-vivobook-go-e1404fa-nk113w-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> Tặng phiếu mua h&#224;ng 400.000đ.</li>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">

    <div class="img">
        <a href="/laptop/laptop-gaming-acer-nitro-5-an515-57-5669-chinh-hang" title="Laptop Gaming Acer Nitro 5 AN515-57-5669 - Ch&#237;nh h&#227;ng">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/03/06/laptop-acer-nitro-gaming-an515-57-5669-01-01.jpg" alt="Laptop Gaming Acer Nitro 5 AN515-57-5669 - Ch&#237;nh h&#227;ng" title="Laptop Gaming Acer Nitro 5 AN515-57-5669 - Ch&#237;nh h&#227;ng">
        </a>
    </div>

        <div class="last-price">
            <div class="bg">
                <strong>GIÁ CUỐI:</strong>
                <label class="text-red">15,990,000 ₫</label>
            </div>
        </div>

    


    <div class="info">
        <a href="/laptop/laptop-gaming-acer-nitro-5-an515-57-5669-chinh-hang" class="title" title="Laptop Gaming Acer Nitro 5 AN515-57-5669 - Ch&#237;nh h&#227;ng">Laptop Gaming Acer Nitro 5 AN515-57-5669 - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>16,990,000 ₫</strong>
                            <strike>22,990,000 ₫</strike>
        </span>
        
        
            <div style="padding-top:8px; font-style:italic; text-align:left;">
                <label>Gi&#225; HSSV: <strong class="text-red">15,640,000 ₫</strong></label>
            </div>
        
    </div>




            <div class="note">
                <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                    <strong class="text-orange">VÀ 11 KM KHÁC</strong>
            </div>
        <div class="promote">
            <a href="/laptop/laptop-gaming-acer-nitro-5-an515-57-5669-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">

    <div class="img">
        <a href="/lap-top/xiaomi-redmibook-15-jyu4506ap-i5-11300h-8gb-512gb-ssd-15-6fhd" title="Xiaomi Redmibook 15 - JYU4506AP-  i5-11300H /8GB/512GB-SSD/15.6FHD">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2022/06/14/redmibook-1.png" alt="Xiaomi Redmibook 15 - JYU4506AP-  i5-11300H /8GB/512GB-SSD/15.6FHD" title="Xiaomi Redmibook 15 - JYU4506AP-  i5-11300H /8GB/512GB-SSD/15.6FHD">
        </a>
    </div>

        <div class="last-price">
            <div class="bg">
                <strong>GIÁ CUỐI:</strong>
                <label class="text-red">10,490,000 ₫</label>
            </div>
        </div>

    


    <div class="info">
        <a href="/lap-top/xiaomi-redmibook-15-jyu4506ap-i5-11300h-8gb-512gb-ssd-15-6fhd" class="title" title="Xiaomi Redmibook 15 - JYU4506AP-  i5-11300H /8GB/512GB-SSD/15.6FHD">Xiaomi Redmibook 15 - JYU4506AP-  i5-11300H /8GB/512GB-SSD/15.6FHD</a>
        <span class="price">
                <strong>10,490,000 ₫</strong>
                            <strike>15,990,000 ₫</strike>
        </span>
        
        
            <div style="padding-top:8px; font-style:italic; text-align:left;">
                <label>Gi&#225; HSSV: <strong class="text-red">10,140,000 ₫</strong></label>
            </div>
        
    </div>




            <div class="note">
                <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                    <strong class="text-orange">VÀ 9 KM KHÁC</strong>
            </div>
        <div class="promote">
            <a href="/lap-top/xiaomi-redmibook-15-jyu4506ap-i5-11300h-8gb-512gb-ssd-15-6fhd">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">

    <div class="img">
        <a href="/laptop/laptop-gaming-msi-gf63-thin-12ve-460vn-chinh-hang" title="Laptop Gaming MSI GF63 Thin 12VE-460VN - Ch&#237;nh h&#227;ng">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/06/22/12ve-460vn-0.jpg" alt="Laptop Gaming MSI GF63 Thin 12VE-460VN - Ch&#237;nh h&#227;ng" title="Laptop Gaming MSI GF63 Thin 12VE-460VN - Ch&#237;nh h&#227;ng">
        </a>
    </div>


    


    <div class="info">
        <a href="/laptop/laptop-gaming-msi-gf63-thin-12ve-460vn-chinh-hang" class="title" title="Laptop Gaming MSI GF63 Thin 12VE-460VN - Ch&#237;nh h&#227;ng">Laptop Gaming MSI GF63 Thin 12VE-460VN - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>20,990,000 ₫</strong>
                            <strike>22,490,000 ₫</strike>
        </span>
        
        
            <div style="padding-top:8px; font-style:italic; text-align:left;">
                <label>Gi&#225; HSSV: <strong class="text-red">19,640,000 ₫</strong></label>
            </div>
        
    </div>




            <div class="note">
                <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                    <strong class="text-orange">VÀ 10 KM KHÁC</strong>
            </div>
        <div class="promote">
            <a href="/laptop/laptop-gaming-msi-gf63-thin-12ve-460vn-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>                    </div>
                </div>
            </div>
        </section>


<section>
    <div class="container">
        <div class="ads">
                <a href="https://hoanghamobile.com/man-hinh/man-hinh-msi-pro-mp243x-chinh-hang?source=BoxHomeProduct" target="_top"><img src="https://cdn.hoanghamobile.com/i/home/Uploads/2023/11/14/1200x200-msi-1-01.png" style="width: 100%;"></a>
        </div>
    </div>
</section>

    <section>
        <div class="container">
            <div class="flash-sales box-home">
                <div class="header-container">
                    <div class="header">
                        <h4><a href="/man-hinh">M&#224;n h&#236;nh nổi bật</a></h4>
                    </div>

                </div>

                <div class="content">
                    <div class="owl-carousel lr-slider equaHeight" data-obj=".info a.title">

<div class="item">
    <div class="img">
        <a href="/man-hinh-may-tinh/man-hinh-gigabyte-g24f-2-eu-23-8-inch-fhd-ips-180hz-1ms-300nits-hdmi-dp">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/02/13/gf24-0.png" alt="M&#224;n h&#236;nh Gigabyte G24F 2-EU - Ch&#237;nh h&#227;ng" title="M&#224;n h&#236;nh Gigabyte G24F 2-EU - Ch&#237;nh h&#227;ng">
        </a>
    </div>

    

    <div class="info">
        <a href="/man-hinh-may-tinh/man-hinh-gigabyte-g24f-2-eu-23-8-inch-fhd-ips-180hz-1ms-300nits-hdmi-dp" class="title">M&#224;n h&#236;nh Gigabyte G24F 2-EU - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>3,250,000 ₫</strong>
                            <strike>6,019,000 ₫</strike>
        </span>
    </div>


        <div class="note">
            <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                <strong class="text-orange">VÀ 8 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/man-hinh-may-tinh/man-hinh-gigabyte-g24f-2-eu-23-8-inch-fhd-ips-180hz-1ms-300nits-hdmi-dp">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">
    <div class="img">
        <a href="/man-hinh/man-hinh-lg-27gp850-b-27inch-qhd-nanoips-165hz-1ms-320nits">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/02/28/lg-27gp850-b-1.png" alt="M&#224;n h&#236;nh LG 27GP850-B 27inch/QHD/NanoIPS/165Hz/1ms/320nits" title="M&#224;n h&#236;nh LG 27GP850-B 27inch/QHD/NanoIPS/165Hz/1ms/320nits">
        </a>
    </div>

    

    <div class="info">
        <a href="/man-hinh/man-hinh-lg-27gp850-b-27inch-qhd-nanoips-165hz-1ms-320nits" class="title">M&#224;n h&#236;nh LG 27GP850-B 27inch/QHD/NanoIPS/165Hz/1ms/320nits</a>
        <span class="price">
                <strong>8,000,000 ₫</strong>
                            <strike>12,429,000 ₫</strike>
        </span>
    </div>


        <div class="note">
            <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                <strong class="text-orange">VÀ 8 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/man-hinh/man-hinh-lg-27gp850-b-27inch-qhd-nanoips-165hz-1ms-320nits">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">
    <div class="img">
        <a href="/man-hinh-may-tinh/man-hinh-asus-va24ehf-chinh-hang">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/06/29/va24ehf-01.jpg" alt="M&#224;n h&#236;nh Asus VA24EHF - Ch&#237;nh h&#227;ng" title="M&#224;n h&#236;nh Asus VA24EHF - Ch&#237;nh h&#227;ng">
        </a>
    </div>

    

    <div class="info">
        <a href="/man-hinh-may-tinh/man-hinh-asus-va24ehf-chinh-hang" class="title">M&#224;n h&#236;nh Asus VA24EHF - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>2,380,000 ₫</strong>
                            <strike>3,490,000 ₫</strike>
        </span>
    </div>


        <div class="note">
            <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                <strong class="text-orange">VÀ 8 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/man-hinh-may-tinh/man-hinh-asus-va24ehf-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">
    <div class="img">
        <a href="/man-hinh/man-hinh-msi-pro-mp243-24inch-fhd-ips-75hz-7ms-dp-hdmi-chinh-hang">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/02/06/mp243-1.png" alt="M&#224;n h&#236;nh MSI PRO MP243 - Ch&#237;nh h&#227;ng" title="M&#224;n h&#236;nh MSI PRO MP243 - Ch&#237;nh h&#227;ng">
        </a>
    </div>

    

    <div class="info">
        <a href="/man-hinh/man-hinh-msi-pro-mp243-24inch-fhd-ips-75hz-7ms-dp-hdmi-chinh-hang" class="title">M&#224;n h&#236;nh MSI PRO MP243 - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>1,990,000 ₫</strong>
                            <strike>3,929,000 ₫</strike>
        </span>
    </div>


        <div class="note">
            <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                <strong class="text-orange">VÀ 7 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/man-hinh/man-hinh-msi-pro-mp243-24inch-fhd-ips-75hz-7ms-dp-hdmi-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">
    <div class="img">
        <a href="/man-hinh/man-hinh-msi-pro-mp223-chinh-hang">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/05/26/mp223-1.png" alt="M&#224;n h&#236;nh MSI PRO MP223 - Ch&#237;nh h&#227;ng" title="M&#224;n h&#236;nh MSI PRO MP223 - Ch&#237;nh h&#227;ng">
        </a>
    </div>

    

    <div class="info">
        <a href="/man-hinh/man-hinh-msi-pro-mp223-chinh-hang" class="title">M&#224;n h&#236;nh MSI PRO MP223 - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>1,690,000 ₫</strong>
                            <strike>2,599,000 ₫</strike>
        </span>
    </div>


        <div class="note">
            <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                <strong class="text-orange">VÀ 7 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/man-hinh/man-hinh-msi-pro-mp223-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">
    <div class="img">
        <a href="/man-hinh-may-tinh/man-hinh-msi-g2412-chinh-hang">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/03/09/msi-g2412-1.png" alt="M&#224;n h&#236;nh MSI G2412 - Ch&#237;nh h&#227;ng" title="M&#224;n h&#236;nh MSI G2412 - Ch&#237;nh h&#227;ng">
        </a>
    </div>

    

    <div class="info">
        <a href="/man-hinh-may-tinh/man-hinh-msi-g2412-chinh-hang" class="title">M&#224;n h&#236;nh MSI G2412 - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>2,990,000 ₫</strong>
                            <strike>4,599,000 ₫</strike>
        </span>
    </div>


        <div class="note">
            <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                <strong class="text-orange">VÀ 8 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/man-hinh-may-tinh/man-hinh-msi-g2412-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">
    <div class="img">
        <a href="/man-hinh-may-tinh/man-hinh-acer-vg240ys-23-8inch-fhd-ips-165hz-2ms-250nits-dp-audio-freesync">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/02/01/image-removebg-preview-27.png" alt="M&#224;n h&#236;nh Acer VG240YS 23.8inch/FHD/IPS/165Hz/2ms/ 250nits/DP+Audio" title="M&#224;n h&#236;nh Acer VG240YS 23.8inch/FHD/IPS/165Hz/2ms/ 250nits/DP+Audio">
        </a>
    </div>

    

    <div class="info">
        <a href="/man-hinh-may-tinh/man-hinh-acer-vg240ys-23-8inch-fhd-ips-165hz-2ms-250nits-dp-audio-freesync" class="title">M&#224;n h&#236;nh Acer VG240YS 23.8inch/FHD/IPS/165Hz/2ms/ 250nits/DP+Audio</a>
        <span class="price">
                <strong>3,590,000 ₫</strong>
                            <strike>6,259,000 ₫</strike>
        </span>
    </div>


        <div class="note">
            <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                <strong class="text-orange">VÀ 8 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/man-hinh-may-tinh/man-hinh-acer-vg240ys-23-8inch-fhd-ips-165hz-2ms-250nits-dp-audio-freesync">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">
    <div class="img">
        <a href="/man-hinh/man-hinh-viewsonic-va1903a-chinh-hang">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/08/24/va1903h-2-1.png" alt="M&#224;n h&#236;nh ViewSonic VA1903a - Ch&#237;nh h&#227;ng" title="M&#224;n h&#236;nh ViewSonic VA1903a - Ch&#237;nh h&#227;ng">
        </a>
    </div>

    

    <div class="info">
        <a href="/man-hinh/man-hinh-viewsonic-va1903a-chinh-hang" class="title">M&#224;n h&#236;nh ViewSonic VA1903a - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>1,550,000 ₫</strong>
                            <strike>2,599,000 ₫</strike>
        </span>
    </div>


        <div class="note">
            <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                <strong class="text-orange">VÀ 8 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/man-hinh/man-hinh-viewsonic-va1903a-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">
    <div class="img">
        <a href="/laptop/man-hinh-dell-ultrasharp-23-8-inch-u2422h-fhd-chinh-hang">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2022/08/15/image-removebg-preview-19.png" alt="M&#224;n h&#236;nh Dell UltraSharp 23.8 inch U2422H FHD - Ch&#237;nh h&#227;ng" title="M&#224;n h&#236;nh Dell UltraSharp 23.8 inch U2422H FHD - Ch&#237;nh h&#227;ng">
        </a>
    </div>

    

    <div class="info">
        <a href="/laptop/man-hinh-dell-ultrasharp-23-8-inch-u2422h-fhd-chinh-hang" class="title">M&#224;n h&#236;nh Dell UltraSharp 23.8 inch U2422H FHD - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>5,600,000 ₫</strong>
                            <strike>7,999,000 ₫</strike>
        </span>
    </div>


        <div class="note">
            <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                <strong class="text-orange">VÀ 8 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/laptop/man-hinh-dell-ultrasharp-23-8-inch-u2422h-fhd-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">
    <div class="img">
        <a href="/man-hinh-may-tinh/man-hinh-viewsonic-vx2428-chinh-hang">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/06/07/vx2428-1.png" alt="M&#224;n h&#236;nh ViewSonic VX2428 - Ch&#237;nh h&#227;ng" title="M&#224;n h&#236;nh ViewSonic VX2428 - Ch&#237;nh h&#227;ng">
        </a>
    </div>

    

    <div class="info">
        <a href="/man-hinh-may-tinh/man-hinh-viewsonic-vx2428-chinh-hang" class="title">M&#224;n h&#236;nh ViewSonic VX2428 - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>3,290,000 ₫</strong>
                            <strike>4,299,000 ₫</strike>
        </span>
    </div>


        <div class="note">
            <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                <strong class="text-orange">VÀ 8 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/man-hinh-may-tinh/man-hinh-viewsonic-vx2428-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">
    <div class="img">
        <a href="/man-hinh-may-tinh/man-hinh-huawei-mateview-se-chinh-hang">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/06/02/specs-img.png" alt="M&#224;n h&#236;nh HUAWEI MateView SE - Ch&#237;nh h&#227;ng" title="M&#224;n h&#236;nh HUAWEI MateView SE - Ch&#237;nh h&#227;ng">
        </a>
    </div>

    

    <div class="info">
        <a href="/man-hinh-may-tinh/man-hinh-huawei-mateview-se-chinh-hang" class="title">M&#224;n h&#236;nh HUAWEI MateView SE - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>3,490,000 ₫</strong>
                            <strike>4,990,000 ₫</strike>
        </span>
    </div>


        <div class="note">
            <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                <strong class="text-orange">VÀ 8 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/man-hinh-may-tinh/man-hinh-huawei-mateview-se-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>                    </div>
                </div>

            </div>
        </div>
    </section>


<section>
    <div class="container">
        <div class="ads">
                <a href="https://hoanghamobile.com/smart-tv/tv-xiaomi?source=BoxHomeProduct" target="_top"><img src="https://cdn.hoanghamobile.com/i/home/Uploads/2023/12/04/tv-xiaomi-t12-1200x200.jpg" style="width: 100%;"></a>
        </div>
    </div>
</section>

    <section>
        <div class="container">
            <div class="flash-sales box-home">
                <div class="header-container">
                    <div class="header">
                        <h4><a href="https://hoanghamobile.com/smart-tv">Smart TV nổi bật</a></h4>
                    </div>

                </div>

                <div class="content">
                    <div class="owl-carousel lr-slider equaHeight" data-obj=".info a.title">

<div class="item">
    <div class="img">
        <a href="/tivi/tv-xiaomi-a-fhd-43-inch-chinh-hang">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/12/06/xiaomi-google-tivi-fhd-43-inch-43a.png" alt="Xiaomi Google Tivi FHD 43 inch 43A - Ch&#237;nh h&#227;ng" title="Xiaomi Google Tivi FHD 43 inch 43A - Ch&#237;nh h&#227;ng">
        </a>
    </div>

    

    <div class="info">
        <a href="/tivi/tv-xiaomi-a-fhd-43-inch-chinh-hang" class="title">Xiaomi Google Tivi FHD 43 inch 43A - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>5,490,000 ₫</strong>
                            <strike>6,490,000 ₫</strike>
        </span>
    </div>

        <div class="cover">
            <div style="
    color: yellow;
    background: #00483D;
    margin: -95px 5px 0 52px;
    padding: 3px;
    border-radius: 6px;
    font-size: 11px;
    font-weight: 600;
    ">
<span style="color:white">Giảm 20% khung giá treo</span><br>
<span style="color:yellow">Giá tốt LH 1900.2091</span>
</div>
        </div>

        <div class="note">
            <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                <strong class="text-orange">VÀ 8 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/tivi/tv-xiaomi-a-fhd-43-inch-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">
    <div class="img">
        <a href="/tivi/tv-xiaomi-a-pro-4k-55-inch-chinh-hang">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/12/06/xiaomi-google-tivi-4k-55-inch-55a-pro.png" alt="Xiaomi Google Tivi 4K 55 inch 55A Pro - Ch&#237;nh h&#227;ng" title="Xiaomi Google Tivi 4K 55 inch 55A Pro - Ch&#237;nh h&#227;ng">
        </a>
    </div>

    

    <div class="info">
        <a href="/tivi/tv-xiaomi-a-pro-4k-55-inch-chinh-hang" class="title">Xiaomi Google Tivi 4K 55 inch 55A Pro - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>8,790,000 ₫</strong>
                            <strike>11,490,000 ₫</strike>
        </span>
    </div>

        <div class="cover">
            <div style="
    color: yellow;
    background: #00483D;
    margin: -95px 5px 0 52px;
    padding: 3px;
    border-radius: 6px;
    font-size: 11px;
    font-weight: 600;
    ">
<span style="color:white">Giảm 20% khung giá treo</span><br>
<span style="color:yellow">Giá tốt LH 1900.2091</span>
</div>
        </div>

        <div class="note">
            <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                <strong class="text-orange">VÀ 8 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/tivi/tv-xiaomi-a-pro-4k-55-inch-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">
    <div class="img">
        <a href="/tivi/smart-google-tv-4k-coocaa-55-inch-55y72-chinh-hang">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/12/06/55y72.png" alt="TV Coocaa 55Y72 (4K/55-inch) - Ch&#237;nh h&#227;ng" title="TV Coocaa 55Y72 (4K/55-inch) - Ch&#237;nh h&#227;ng">
        </a>
    </div>

    

    <div class="info">
        <a href="/tivi/smart-google-tv-4k-coocaa-55-inch-55y72-chinh-hang" class="title">TV Coocaa 55Y72 (4K/55-inch) - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>6,460,000 ₫</strong>
                            <strike>12,990,000 ₫</strike>
        </span>
    </div>

        <div class="cover">
            <div style="
    color: yellow;
    background: #00483D;
    margin: -95px 5px 0 52px;
    padding: 3px;
    border-radius: 6px;
    font-size: 11px;
    font-weight: 600;
    ">
<span style="color:white">Giảm 20% khung giá treo</span><br>
<span style="color:yellow"></span>
</div>

        </div>

        <div class="note">
            <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                <strong class="text-orange">VÀ 8 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/tivi/smart-google-tv-4k-coocaa-55-inch-55y72-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">
    <div class="img">
        <a href="/tivi/smart-google-tv-4k-coocaa-65-inch-65v8-chinh-hang">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/12/06/65v8.png" alt="TV Coocaa 65V8 (4K/65-inch) - Ch&#237;nh h&#227;ng" title="TV Coocaa 65V8 (4K/65-inch) - Ch&#237;nh h&#227;ng">
        </a>
    </div>

    

    <div class="info">
        <a href="/tivi/smart-google-tv-4k-coocaa-65-inch-65v8-chinh-hang" class="title">TV Coocaa 65V8 (4K/65-inch) - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>9,290,000 ₫</strong>
                            <strike>18,990,000 ₫</strike>
        </span>
    </div>

        <div class="cover">
            <div style="
    color: yellow;
    background: #00483D;
    margin: -95px 5px 0 52px;
    padding: 3px;
    border-radius: 6px;
    font-size: 11px;
    font-weight: 600;
    ">
<span style="color:white">Giảm 20% khung giá treo</span><br>
<span style="color:yellow"></span>
</div>

        </div>

        <div class="note">
            <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                <strong class="text-orange">VÀ 9 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/tivi/smart-google-tv-4k-coocaa-65-inch-65v8-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">
    <div class="img">
        <a href="/tivi/smart-tivi-samsung-crystal-uhd-4k-50-inch-ua50au8000kxxv-chinh-hang">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/12/06/ua50au8000kxxv.png" alt="TV Samsung Crystal UHD UA50AU8000KXXV (4K/50-inch) - Ch&#237;nh h&#227;ng" title="TV Samsung Crystal UHD UA50AU8000KXXV (4K/50-inch) - Ch&#237;nh h&#227;ng">
        </a>
    </div>

    

    <div class="info">
        <a href="/tivi/smart-tivi-samsung-crystal-uhd-4k-50-inch-ua50au8000kxxv-chinh-hang" class="title">TV Samsung Crystal UHD UA50AU8000KXXV (4K/50-inch) - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>8,990,000 ₫</strong>
                            <strike>22,990,000 ₫</strike>
        </span>
    </div>

        <div class="cover">
            <div style="
    color: yellow;
    background: #00483D;
    margin: -95px 5px 0 52px;
    padding: 3px;
    border-radius: 6px;
    font-size: 11px;
    font-weight: 600;
    ">
<span style="color:white">Giảm 20% khung giá treo</span><br>
<span style="color:yellow"></span>
</div>

        </div>

        <div class="note">
            <span class="bag">KM</span> <label title="Ưu đ&#227;i Youtube Premium d&#224;nh cho chủ sở hữu Samsung Galaxy (&#193;p dụng một số sản phẩm)">Ưu đ&#227;i Youtube Premium d&#224;nh cho chủ...</label>
                <strong class="text-orange">VÀ 9 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/tivi/smart-tivi-samsung-crystal-uhd-4k-50-inch-ua50au8000kxxv-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> Ưu đ&#227;i Youtube Premium d&#224;nh cho chủ sở hữu Samsung Galaxy (&#193;p dụng một số sản phẩm)</li>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">
    <div class="img">
        <a href="/tivi/smart-tv-skyworth-hd-32-inch-32std4000-chinh-hang">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/12/06/32std4000.png" alt="TV SKYWORTH 32STD4000 (HD/32-inch) - Ch&#237;nh h&#227;ng" title="TV SKYWORTH 32STD4000 (HD/32-inch) - Ch&#237;nh h&#227;ng">
        </a>
    </div>

    

    <div class="info">
        <a href="/tivi/smart-tv-skyworth-hd-32-inch-32std4000-chinh-hang" class="title">TV SKYWORTH 32STD4000 (HD/32-inch) - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>2,990,000 ₫</strong>
                            <strike>5,890,000 ₫</strike>
        </span>
    </div>

        <div class="cover">
            <div style="
    color: yellow;
    background: #00483D;
    margin: -95px 5px 0 52px;
    padding: 3px;
    border-radius: 6px;
    font-size: 11px;
    font-weight: 600;
    ">
<span style="color:white">Giảm 20% khung giá treo</span><br>
<span style="color:yellow"></span>
</div>

        </div>

        <div class="note">
            <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                <strong class="text-orange">VÀ 7 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/tivi/smart-tv-skyworth-hd-32-inch-32std4000-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">
    <div class="img">
        <a href="/tivi/smart-tv-skyworth-4k-55-inch-55suc7550-chinh-hang">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/12/06/55suc7550.png" alt="TV SKYWORTH 55SUC7550 (4K/55-inch) - Ch&#237;nh h&#227;ng" title="TV SKYWORTH 55SUC7550 (4K/55-inch) - Ch&#237;nh h&#227;ng">
        </a>
    </div>

    

    <div class="info">
        <a href="/tivi/smart-tv-skyworth-4k-55-inch-55suc7550-chinh-hang" class="title">TV SKYWORTH 55SUC7550 (4K/55-inch) - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>6,790,000 ₫</strong>
                            <strike>15,990,000 ₫</strike>
        </span>
    </div>

        <div class="cover">
            <div style="
    color: yellow;
    background: #00483D;
    margin: -95px 5px 0 52px;
    padding: 3px;
    border-radius: 6px;
    font-size: 11px;
    font-weight: 600;
    ">
<span style="color:white">Giảm 20% khung giá treo</span><br>
<span style="color:yellow"></span>
</div>

        </div>

        <div class="note">
            <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                <strong class="text-orange">VÀ 9 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/tivi/smart-tv-skyworth-4k-55-inch-55suc7550-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">
    <div class="img">
        <a href="/tivi/smart-tivi-itel-4k-50-g5057-chinh-hang">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/12/06/g5057.png" alt="TV Itel G5057 (4K/50-inch) - Ch&#237;nh h&#227;ng" title="TV Itel G5057 (4K/50-inch) - Ch&#237;nh h&#227;ng">
        </a>
    </div>

    

    <div class="info">
        <a href="/tivi/smart-tivi-itel-4k-50-g5057-chinh-hang" class="title">TV Itel G5057 (4K/50-inch) - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>5,290,000 ₫</strong>
                            <strike>8,990,000 ₫</strike>
        </span>
    </div>

        <div class="cover">
            <div style="
    color: yellow;
    background: #00483D;
    margin: -95px 5px 0 52px;
    padding: 3px;
    border-radius: 6px;
    font-size: 11px;
    font-weight: 600;
    ">
<span style="color:white">Giảm 20% khung giá treo</span><br>
<span style="color:yellow"></span>
</div>

        </div>

        <div class="note">
            <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                <strong class="text-orange">VÀ 8 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/tivi/smart-tivi-itel-4k-50-g5057-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">
    <div class="img">
        <a href="/tivi/tivi-toshiba-led-4k-google-tv-55c350lp-chinh-hang-clone">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/12/06/55c350lp.png" alt="TV TOSHIBA 55C350LP (4K/55-inch) - Ch&#237;nh h&#227;ng" title="TV TOSHIBA 55C350LP (4K/55-inch) - Ch&#237;nh h&#227;ng">
        </a>
    </div>

    

    <div class="info">
        <a href="/tivi/tivi-toshiba-led-4k-google-tv-55c350lp-chinh-hang-clone" class="title">TV TOSHIBA 55C350LP (4K/55-inch) - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>9,990,000 ₫</strong>
                            <strike>15,690,000 ₫</strike>
        </span>
    </div>

        <div class="cover">
            <div style="
    color: yellow;
    background: #00483D;
    margin: -95px 5px 0 52px;
    padding: 3px;
    border-radius: 6px;
    font-size: 11px;
    font-weight: 600;
    ">
<span style="color:white">Giảm 20% khung giá treo</span><br>
<span style="color:yellow"></span>
</div>

        </div>

        <div class="note">
            <span class="bag">KM</span> <label title="Tặng phiếu mua h&#224;ng 800.000đ.">Tặng phiếu mua h&#224;ng 800.000đ.</label>
                <strong class="text-orange">VÀ 9 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/tivi/tivi-toshiba-led-4k-google-tv-55c350lp-chinh-hang-clone">
                <ul>
                        <li><span class="bag">KM</span> Tặng phiếu mua h&#224;ng 800.000đ.</li>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">
    <div class="img">
        <a href="/tivi/smart-tivi-casper-qled-4k-55qg8000-chinh-hang">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/12/06/55qg8000.png" alt="TV Casper 55QG8000 (QLED 4K/55-inch) - Ch&#237;nh h&#227;ng" title="TV Casper 55QG8000 (QLED 4K/55-inch) - Ch&#237;nh h&#227;ng">
        </a>
    </div>

    

    <div class="info">
        <a href="/tivi/smart-tivi-casper-qled-4k-55qg8000-chinh-hang" class="title">TV Casper 55QG8000 (QLED 4K/55-inch) - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>7,790,000 ₫</strong>
                            <strike>15,990,000 ₫</strike>
        </span>
    </div>

        <div class="cover">
            <div style="
    color: yellow;
    background: #00483D;
    margin: -95px 5px 0 52px;
    padding: 3px;
    border-radius: 6px;
    font-size: 11px;
    font-weight: 600;
    ">
<span style="color:white">Giảm 20% khung giá treo</span><br>
<span style="color:yellow"></span>
</div>

        </div>

        <div class="note">
            <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                <strong class="text-orange">VÀ 8 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/tivi/smart-tivi-casper-qled-4k-55qg8000-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">
    <div class="img">
        <a href="/tivi/smart-tivi-casper-4k-43ugs611-chinh-hang">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/12/06/43ugs611.png" alt="TV Casper 43UGS611 (4K/43-inch) - Ch&#237;nh h&#227;ng" title="TV Casper 43UGS611 (4K/43-inch) - Ch&#237;nh h&#227;ng">
        </a>
    </div>

    

    <div class="info">
        <a href="/tivi/smart-tivi-casper-4k-43ugs611-chinh-hang" class="title">TV Casper 43UGS611 (4K/43-inch) - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>6,290,000 ₫</strong>
                            <strike>8,990,000 ₫</strike>
        </span>
    </div>

        <div class="cover">
            <div style="
    color: yellow;
    background: #00483D;
    margin: -95px 5px 0 52px;
    padding: 3px;
    border-radius: 6px;
    font-size: 11px;
    font-weight: 600;
    ">
<span style="color:white">Giảm 20% khung giá treo</span><br>
<span style="color:yellow"></span>
</div>

        </div>

        <div class="note">
            <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                <strong class="text-orange">VÀ 8 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/tivi/smart-tivi-casper-4k-43ugs611-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>                    </div>
                </div>

            </div>
        </div>
    </section>



    <section>
        <div class="container">
            <div class="flash-sales box-home">
                <div class="header-container">
                    <div class="header">
                        <h4><a href="/tablet">Tablet</a></h4>
                    </div>

                </div>

                <div class="content">
                    <div class="owl-carousel lr-slider equaHeight" data-obj=".info a.title">

<div class="item">
    <div class="img">
        <a href="/may-tinh-bang/samsung-galaxy-tab-s9-fe-wifi-6gb-128gb">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/10/11/tab-s9-fe-1.png" alt="Samsung Galaxy Tab S9 FE Wifi 6GB/128GB" title="Samsung Galaxy Tab S9 FE Wifi 6GB/128GB">
        </a>
    </div>

    

    <div class="info">
        <a href="/may-tinh-bang/samsung-galaxy-tab-s9-fe-wifi-6gb-128gb" class="title">Samsung Galaxy Tab S9 FE Wifi 6GB/128GB</a>
        <span class="price">
                <strong>8,990,000 ₫</strong>
                            <strike>9,990,000 ₫</strike>
        </span>
    </div>


        <div class="note">
            <span class="bag">KM</span> <label title="Giảm ngay 150.000đ khi mua k&#232;m SIM số đẹp Vinaphone Happy - Ưu đ&#227;i 2GB Data/ng&#224;y - Miễn ph&#237; 1000 ph&#250;t nội mạng.">Giảm ngay 150.000đ khi mua k&#232;m SIM ...</label>
                <strong class="text-orange">VÀ 4 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/may-tinh-bang/samsung-galaxy-tab-s9-fe-wifi-6gb-128gb">
                <ul>
                        <li><span class="bag">KM</span> Giảm ngay 150.000đ khi mua k&#232;m SIM số đẹp Vinaphone Happy - Ưu đ&#227;i 2GB Data/ng&#224;y - Miễn ph&#237; 1000 ph&#250;t nội mạng.</li>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">
    <div class="img">
        <a href="/may-tinh-bang/samsung-galaxy-tab-s9-fe-plus-wifi-6gb-128gb">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/10/11/tab-s9-fe-2.png" alt="Samsung Galaxy Tab S9 FE Plus Wifi 8GB/128GB" title="Samsung Galaxy Tab S9 FE Plus Wifi 8GB/128GB">
        </a>
    </div>

    

    <div class="info">
        <a href="/may-tinh-bang/samsung-galaxy-tab-s9-fe-plus-wifi-6gb-128gb" class="title">Samsung Galaxy Tab S9 FE Plus Wifi 8GB/128GB</a>
        <span class="price">
                <strong>12,690,000 ₫</strong>
                            <strike>13,990,000 ₫</strike>
        </span>
    </div>


        <div class="note">
            <span class="bag">KM</span> <label title="Giảm ngay 150.000đ khi mua k&#232;m SIM số đẹp Vinaphone Happy - Ưu đ&#227;i 2GB Data/ng&#224;y - Miễn ph&#237; 1000 ph&#250;t nội mạng.">Giảm ngay 150.000đ khi mua k&#232;m SIM ...</label>
                <strong class="text-orange">VÀ 5 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/may-tinh-bang/samsung-galaxy-tab-s9-fe-plus-wifi-6gb-128gb">
                <ul>
                        <li><span class="bag">KM</span> Giảm ngay 150.000đ khi mua k&#232;m SIM số đẹp Vinaphone Happy - Ưu đ&#227;i 2GB Data/ng&#224;y - Miễn ph&#237; 1000 ph&#250;t nội mạng.</li>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">
    <div class="img">
        <a href="/may-tinh-bang/samsung-galaxy-tab-a9-wifi-4gb-64gb-chinh-hang">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/10/30/galaxy-tab-a9-8.png" alt="Samsung Galaxy Tab A9 Wifi 4GB/64GB - Ch&#237;nh h&#227;ng" title="Samsung Galaxy Tab A9 Wifi 4GB/64GB - Ch&#237;nh h&#227;ng">
        </a>
    </div>

    

    <div class="info">
        <a href="/may-tinh-bang/samsung-galaxy-tab-a9-wifi-4gb-64gb-chinh-hang" class="title">Samsung Galaxy Tab A9 Wifi 4GB/64GB - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>3,650,000 ₫</strong>
                            <strike>3,990,000 ₫</strike>
        </span>
    </div>


        <div class="note">
            <span class="bag">KM</span> <label title="Giảm ngay 150.000đ khi mua k&#232;m SIM số đẹp Vinaphone Happy - Ưu đ&#227;i 2GB Data/ng&#224;y - Miễn ph&#237; 1000 ph&#250;t nội mạng.">Giảm ngay 150.000đ khi mua k&#232;m SIM ...</label>
                <strong class="text-orange">VÀ 4 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/may-tinh-bang/samsung-galaxy-tab-a9-wifi-4gb-64gb-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> Giảm ngay 150.000đ khi mua k&#232;m SIM số đẹp Vinaphone Happy - Ưu đ&#227;i 2GB Data/ng&#224;y - Miễn ph&#237; 1000 ph&#250;t nội mạng.</li>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">
    <div class="img">
        <a href="/may-tinh-bang/samsung-galaxy-tab-a9-plus-wifi-4gb-64gb-chinh-hang">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/10/30/galaxy-tab-a9-8.png" alt="Samsung Galaxy Tab A9 Plus Wifi 4GB/64GB - Ch&#237;nh h&#227;ng" title="Samsung Galaxy Tab A9 Plus Wifi 4GB/64GB - Ch&#237;nh h&#227;ng">
        </a>
    </div>

    

    <div class="info">
        <a href="/may-tinh-bang/samsung-galaxy-tab-a9-plus-wifi-4gb-64gb-chinh-hang" class="title">Samsung Galaxy Tab A9 Plus Wifi 4GB/64GB - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>5,490,000 ₫</strong>
                            <strike>5,990,000 ₫</strike>
        </span>
    </div>


        <div class="note">
            <span class="bag">KM</span> <label title="Giảm ngay 150.000đ khi mua k&#232;m SIM số đẹp Vinaphone Happy - Ưu đ&#227;i 2GB Data/ng&#224;y - Miễn ph&#237; 1000 ph&#250;t nội mạng.">Giảm ngay 150.000đ khi mua k&#232;m SIM ...</label>
                <strong class="text-orange">VÀ 4 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/may-tinh-bang/samsung-galaxy-tab-a9-plus-wifi-4gb-64gb-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> Giảm ngay 150.000đ khi mua k&#232;m SIM số đẹp Vinaphone Happy - Ưu đ&#227;i 2GB Data/ng&#224;y - Miễn ph&#237; 1000 ph&#250;t nội mạng.</li>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">
    <div class="img">
        <a href="/may-tinh-bang/may-tinh-bang-htc-a103-4gb-64gb-chinh-hang">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/08/24/htc-a103-6.png" alt="HTC A103 - 10 - 4G LTE - (4GB/64GB) - Ch&#237;nh h&#227;ng" title="HTC A103 - 10 - 4G LTE - (4GB/64GB) - Ch&#237;nh h&#227;ng">
        </a>
    </div>

    

    <div class="info">
        <a href="/may-tinh-bang/may-tinh-bang-htc-a103-4gb-64gb-chinh-hang" class="title">HTC A103 - 10 - 4G LTE - (4GB/64GB) - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>1,990,000 ₫</strong>
                            <strike>3,990,000 ₫</strike>
        </span>
    </div>

        <div class="cover">
            <div style="
    color: yellow;
    background: #00483D;
    margin: -95px 5px 0 52px;
    padding: 3px;
    border-radius: 6px;
    font-size: 11px;
    font-weight: 600;
    ">
<span style="color:white">Hotsale giá sốc </span><br>
<span style="color:yellow"></span>
</div>

        </div>

        <div class="note">
            <span class="bag">KM</span> <label title="Giảm ngay 150.000đ khi mua k&#232;m SIM số đẹp Vinaphone Happy - Ưu đ&#227;i 2GB Data/ng&#224;y - Miễn ph&#237; 1000 ph&#250;t nội mạng.">Giảm ngay 150.000đ khi mua k&#232;m SIM ...</label>
                <strong class="text-orange">VÀ 8 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/may-tinh-bang/may-tinh-bang-htc-a103-4gb-64gb-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> Giảm ngay 150.000đ khi mua k&#232;m SIM số đẹp Vinaphone Happy - Ưu đ&#227;i 2GB Data/ng&#224;y - Miễn ph&#237; 1000 ph&#250;t nội mạng.</li>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">
    <div class="img">
        <a href="/may-tinh-bang/samsung-galaxy-tab-s9-wifi-12gb-256gb-chinh-hang">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/07/26/samsung-galaxy-tab-s9-5g-13.png" alt="Samsung Galaxy Tab S9 Wifi 12GB/256GB - Ch&#237;nh h&#227;ng" title="Samsung Galaxy Tab S9 Wifi 12GB/256GB - Ch&#237;nh h&#227;ng">
        </a>
    </div>

    

    <div class="info">
        <a href="/may-tinh-bang/samsung-galaxy-tab-s9-wifi-12gb-256gb-chinh-hang" class="title">Samsung Galaxy Tab S9 Wifi 12GB/256GB - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>17,290,000 ₫</strong>
                            <strike>21,990,000 ₫</strike>
        </span>
    </div>


        <div class="note">
            <span class="bag">KM</span> <label title="Giảm ngay 150.000đ khi mua k&#232;m SIM số đẹp Vinaphone Happy - Ưu đ&#227;i 2GB Data/ng&#224;y - Miễn ph&#237; 1000 ph&#250;t nội mạng.">Giảm ngay 150.000đ khi mua k&#232;m SIM ...</label>
                <strong class="text-orange">VÀ 6 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/may-tinh-bang/samsung-galaxy-tab-s9-wifi-12gb-256gb-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> Giảm ngay 150.000đ khi mua k&#232;m SIM số đẹp Vinaphone Happy - Ưu đ&#227;i 2GB Data/ng&#224;y - Miễn ph&#237; 1000 ph&#250;t nội mạng.</li>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">
    <div class="img">
        <a href="/may-tinh-bang/samsung-galaxy-tab-s9-plus-wifi-12gb-512gb-chinh-hang">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/07/26/galaxy-tab-s9-plus-wifi-12gb512gb-1.png" alt="Samsung Galaxy Tab S9 Plus Wifi 12GB/512GB - Ch&#237;nh h&#227;ng" title="Samsung Galaxy Tab S9 Plus Wifi 12GB/512GB - Ch&#237;nh h&#227;ng">
        </a>
    </div>

    

    <div class="info">
        <a href="/may-tinh-bang/samsung-galaxy-tab-s9-plus-wifi-12gb-512gb-chinh-hang" class="title">Samsung Galaxy Tab S9 Plus Wifi 12GB/512GB - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>22,790,000 ₫</strong>
                            <strike>27,990,000 ₫</strike>
        </span>
    </div>


        <div class="note">
            <span class="bag">KM</span> <label title="Giảm ngay 150.000đ khi mua k&#232;m SIM số đẹp Vinaphone Happy - Ưu đ&#227;i 2GB Data/ng&#224;y - Miễn ph&#237; 1000 ph&#250;t nội mạng.">Giảm ngay 150.000đ khi mua k&#232;m SIM ...</label>
                <strong class="text-orange">VÀ 6 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/may-tinh-bang/samsung-galaxy-tab-s9-plus-wifi-12gb-512gb-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> Giảm ngay 150.000đ khi mua k&#232;m SIM số đẹp Vinaphone Happy - Ưu đ&#227;i 2GB Data/ng&#224;y - Miễn ph&#237; 1000 ph&#250;t nội mạng.</li>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">
    <div class="img">
        <a href="/may-tinh-bang/samsung-galaxy-tab-s9-ultra-5G-12gb-512gb-chinh-hang">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/07/26/samsung-galaxy-tab-s9-ultra-5g-1.png" alt="Samsung Galaxy Tab S9 Ultra 5G 12GB/512GB - Ch&#237;nh h&#227;ng" title="Samsung Galaxy Tab S9 Ultra 5G 12GB/512GB - Ch&#237;nh h&#227;ng">
        </a>
    </div>

    

    <div class="info">
        <a href="/may-tinh-bang/samsung-galaxy-tab-s9-ultra-5G-12gb-512gb-chinh-hang" class="title">Samsung Galaxy Tab S9 Ultra 5G 12GB/512GB - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>25,990,000 ₫</strong>
                            <strike>34,990,000 ₫</strike>
        </span>
    </div>


        <div class="note">
            <span class="bag">KM</span> <label title="Giảm ngay 150.000đ khi mua k&#232;m SIM số đẹp Vinaphone Happy - Ưu đ&#227;i 2GB Data/ng&#224;y - Miễn ph&#237; 1000 ph&#250;t nội mạng.">Giảm ngay 150.000đ khi mua k&#232;m SIM ...</label>
                <strong class="text-orange">VÀ 6 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/may-tinh-bang/samsung-galaxy-tab-s9-ultra-5G-12gb-512gb-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> Giảm ngay 150.000đ khi mua k&#232;m SIM số đẹp Vinaphone Happy - Ưu đ&#227;i 2GB Data/ng&#224;y - Miễn ph&#237; 1000 ph&#250;t nội mạng.</li>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">
    <div class="img">
        <a href="/may-tinh-bang/may-tinh-bang-tcl-tab-10l-gen-2-3gb-32gb-chinh-hang">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/09/05/freyr-tcl-tab10l-gen-2-black-front-back.png" alt="TCL TAB 10L Gen 2 (3GB/32GB) - Ch&#237;nh h&#227;ng" title="TCL TAB 10L Gen 2 (3GB/32GB) - Ch&#237;nh h&#227;ng">
        </a>
    </div>

    

    <div class="info">
        <a href="/may-tinh-bang/may-tinh-bang-tcl-tab-10l-gen-2-3gb-32gb-chinh-hang" class="title">TCL TAB 10L Gen 2 (3GB/32GB) - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>2,290,000 ₫</strong>
                            <strike>2,490,000 ₫</strike>
        </span>
    </div>


        <div class="note">
            <span class="bag">KM</span> <label title="Giảm ngay 150.000đ khi mua k&#232;m SIM số đẹp Vinaphone Happy - Ưu đ&#227;i 2GB Data/ng&#224;y - Miễn ph&#237; 1000 ph&#250;t nội mạng.">Giảm ngay 150.000đ khi mua k&#232;m SIM ...</label>
                <strong class="text-orange">VÀ 7 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/may-tinh-bang/may-tinh-bang-tcl-tab-10l-gen-2-3gb-32gb-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> Giảm ngay 150.000đ khi mua k&#232;m SIM số đẹp Vinaphone Happy - Ưu đ&#227;i 2GB Data/ng&#224;y - Miễn ph&#237; 1000 ph&#250;t nội mạng.</li>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">
    <div class="img">
        <a href="/may-tinh-bang/may-tinh-bang-tcl-tab-11-wi-fi-4gb-128gb-chinh-hang">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/08/23/tcl-tab-11-purple-0.png" alt="TCL TAB 11 Wi-Fi (4GB/128GB) - Ch&#237;nh h&#227;ng" title="TCL TAB 11 Wi-Fi (4GB/128GB) - Ch&#237;nh h&#227;ng">
        </a>
    </div>

    

    <div class="info">
        <a href="/may-tinh-bang/may-tinh-bang-tcl-tab-11-wi-fi-4gb-128gb-chinh-hang" class="title">TCL TAB 11 Wi-Fi (4GB/128GB) - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>4,490,000 ₫</strong>
                            <strike>4,990,000 ₫</strike>
        </span>
    </div>


        <div class="note">
            <span class="bag">KM</span> <label title="Giảm ngay 150.000đ khi mua k&#232;m SIM số đẹp Vinaphone Happy - Ưu đ&#227;i 2GB Data/ng&#224;y - Miễn ph&#237; 1000 ph&#250;t nội mạng.">Giảm ngay 150.000đ khi mua k&#232;m SIM ...</label>
                <strong class="text-orange">VÀ 7 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/may-tinh-bang/may-tinh-bang-tcl-tab-11-wi-fi-4gb-128gb-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> Giảm ngay 150.000đ khi mua k&#232;m SIM số đẹp Vinaphone Happy - Ưu đ&#227;i 2GB Data/ng&#224;y - Miễn ph&#237; 1000 ph&#250;t nội mạng.</li>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">
    <div class="img">
        <a href="/may-tinh-bang/may-tinh-bang-tcl-tab-10-lte-gen-2-4gb-64gb-chinh-hang">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/09/05/tcl-tab-10-gen-2-glacier-blue-front-back.png" alt="TCL TAB 10 LTE Gen 2 (4GB/64GB) - Ch&#237;nh h&#227;ng" title="TCL TAB 10 LTE Gen 2 (4GB/64GB) - Ch&#237;nh h&#227;ng">
        </a>
    </div>

    

    <div class="info">
        <a href="/may-tinh-bang/may-tinh-bang-tcl-tab-10-lte-gen-2-4gb-64gb-chinh-hang" class="title">TCL TAB 10 LTE Gen 2 (4GB/64GB) - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>3,990,000 ₫</strong>
                            <strike>4,490,000 ₫</strike>
        </span>
    </div>


        <div class="note">
            <span class="bag">KM</span> <label title="Giảm ngay 150.000đ khi mua k&#232;m SIM số đẹp Vinaphone Happy - Ưu đ&#227;i 2GB Data/ng&#224;y - Miễn ph&#237; 1000 ph&#250;t nội mạng.">Giảm ngay 150.000đ khi mua k&#232;m SIM ...</label>
                <strong class="text-orange">VÀ 7 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/may-tinh-bang/may-tinh-bang-tcl-tab-10-lte-gen-2-4gb-64gb-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> Giảm ngay 150.000đ khi mua k&#232;m SIM số đẹp Vinaphone Happy - Ưu đ&#227;i 2GB Data/ng&#224;y - Miễn ph&#237; 1000 ph&#250;t nội mạng.</li>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">
    <div class="img">
        <a href="/may-tinh-bang/xiaomi-pad-6-8gb-256gb-chinh-hang">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/08/10/xiaomi-pad-6.png" alt="Xiaomi Pad 6 (8GB/256GB) - Ch&#237;nh h&#227;ng" title="Xiaomi Pad 6 (8GB/256GB) - Ch&#237;nh h&#227;ng">
        </a>
    </div>

    

    <div class="info">
        <a href="/may-tinh-bang/xiaomi-pad-6-8gb-256gb-chinh-hang" class="title">Xiaomi Pad 6 (8GB/256GB) - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>8,990,000 ₫</strong>
                            <strike>10,490,000 ₫</strike>
        </span>
    </div>


        <div class="note">
            <span class="bag">KM</span> <label title="Giảm ngay 150.000đ khi mua k&#232;m SIM số đẹp Vinaphone Happy - Ưu đ&#227;i 2GB Data/ng&#224;y - Miễn ph&#237; 1000 ph&#250;t nội mạng.">Giảm ngay 150.000đ khi mua k&#232;m SIM ...</label>
                <strong class="text-orange">VÀ 9 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/may-tinh-bang/xiaomi-pad-6-8gb-256gb-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> Giảm ngay 150.000đ khi mua k&#232;m SIM số đẹp Vinaphone Happy - Ưu đ&#227;i 2GB Data/ng&#224;y - Miễn ph&#237; 1000 ph&#250;t nội mạng.</li>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">
    <div class="img">
        <a href="/may-tinh-bang/lenovo-tab-m10-gen-3-3gb-32gb-chinh-hang">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/03/28/lenovotabm10gen3-2.png" alt="Lenovo Tab M10 Gen 3 (3GB/32GB) - Ch&#237;nh h&#227;ng" title="Lenovo Tab M10 Gen 3 (3GB/32GB) - Ch&#237;nh h&#227;ng">
        </a>
    </div>

    

    <div class="info">
        <a href="/may-tinh-bang/lenovo-tab-m10-gen-3-3gb-32gb-chinh-hang" class="title">Lenovo Tab M10 Gen 3 (3GB/32GB) - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>4,290,000 ₫</strong>
                            <strike>5,990,000 ₫</strike>
        </span>
    </div>


        <div class="note">
            <span class="bag">KM</span> <label title="Giảm ngay 150.000đ khi mua k&#232;m SIM số đẹp Vinaphone Happy - Ưu đ&#227;i 2GB Data/ng&#224;y - Miễn ph&#237; 1000 ph&#250;t nội mạng.">Giảm ngay 150.000đ khi mua k&#232;m SIM ...</label>
                <strong class="text-orange">VÀ 8 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/may-tinh-bang/lenovo-tab-m10-gen-3-3gb-32gb-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> Giảm ngay 150.000đ khi mua k&#232;m SIM số đẹp Vinaphone Happy - Ưu đ&#227;i 2GB Data/ng&#224;y - Miễn ph&#237; 1000 ph&#250;t nội mạng.</li>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">
    <div class="img">
        <a href="/may-tinh-bang/lenovo-tab-p11-plus-4gb-64gb-chinh-hang">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/02/21/image-removebg-preview-3.png" alt="Lenovo Tab P11 Plus (4GB/64GB) - Ch&#237;nh h&#227;ng" title="Lenovo Tab P11 Plus (4GB/64GB) - Ch&#237;nh h&#227;ng">
        </a>
    </div>

    

    <div class="info">
        <a href="/may-tinh-bang/lenovo-tab-p11-plus-4gb-64gb-chinh-hang" class="title">Lenovo Tab P11 Plus (4GB/64GB) - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>4,790,000 ₫</strong>
                            <strike>8,190,000 ₫</strike>
        </span>
    </div>


        <div class="note">
            <span class="bag">KM</span> <label title="Giảm ngay 150.000đ khi mua k&#232;m SIM số đẹp Vinaphone Happy - Ưu đ&#227;i 2GB Data/ng&#224;y - Miễn ph&#237; 1000 ph&#250;t nội mạng.">Giảm ngay 150.000đ khi mua k&#232;m SIM ...</label>
                <strong class="text-orange">VÀ 8 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/may-tinh-bang/lenovo-tab-p11-plus-4gb-64gb-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> Giảm ngay 150.000đ khi mua k&#232;m SIM số đẹp Vinaphone Happy - Ưu đ&#227;i 2GB Data/ng&#224;y - Miễn ph&#237; 1000 ph&#250;t nội mạng.</li>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">
    <div class="img">
        <a href="/may-tinh-bang/may-tinh-bang-huawei-matepad-chinh-hang">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2022/07/27/image-removebg-preview-4_637945394047578938.png" alt="M&#225;y t&#237;nh bảng Huawei Matepad LTE - Ch&#237;nh h&#227;ng" title="M&#225;y t&#237;nh bảng Huawei Matepad LTE - Ch&#237;nh h&#227;ng">
        </a>
    </div>

    

    <div class="info">
        <a href="/may-tinh-bang/may-tinh-bang-huawei-matepad-chinh-hang" class="title">M&#225;y t&#237;nh bảng Huawei Matepad LTE - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>5,490,000 ₫</strong>
                            <strike>7,490,000 ₫</strike>
        </span>
    </div>


        <div class="note">
            <span class="bag">KM</span> <label title="Giảm ngay 150.000đ khi mua k&#232;m SIM số đẹp Vinaphone Happy - Ưu đ&#227;i 2GB Data/ng&#224;y - Miễn ph&#237; 1000 ph&#250;t nội mạng.">Giảm ngay 150.000đ khi mua k&#232;m SIM ...</label>
                <strong class="text-orange">VÀ 8 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/may-tinh-bang/may-tinh-bang-huawei-matepad-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> Giảm ngay 150.000đ khi mua k&#232;m SIM số đẹp Vinaphone Happy - Ưu đ&#227;i 2GB Data/ng&#224;y - Miễn ph&#237; 1000 ph&#250;t nội mạng.</li>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">
    <div class="img">
        <a href="/may-tinh-bang/oppo-pad-air-chinh-hang">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2022/08/03/image-removebg-preview-18.png" alt="OPPO Pad Air - Ch&#237;nh h&#227;ng" title="OPPO Pad Air - Ch&#237;nh h&#227;ng">
        </a>
    </div>

    

    <div class="info">
        <a href="/may-tinh-bang/oppo-pad-air-chinh-hang" class="title">OPPO Pad Air - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>5,990,000 ₫</strong>
                    </span>
    </div>


        <div class="note">
            <span class="bag">KM</span> <label title="Giảm ngay 150.000đ khi mua k&#232;m SIM số đẹp Vinaphone Happy - Ưu đ&#227;i 2GB Data/ng&#224;y - Miễn ph&#237; 1000 ph&#250;t nội mạng.">Giảm ngay 150.000đ khi mua k&#232;m SIM ...</label>
                <strong class="text-orange">VÀ 8 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/may-tinh-bang/oppo-pad-air-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> Giảm ngay 150.000đ khi mua k&#232;m SIM số đẹp Vinaphone Happy - Ưu đ&#227;i 2GB Data/ng&#224;y - Miễn ph&#237; 1000 ph&#250;t nội mạng.</li>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">
    <div class="img">
        <a href="/may-tinh-bang/apple-ipad-gen-9-10-2-2021-wifi-64gb-chinh-hang-apple-viet-nam">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2021/09/15/image-removebg-preview-26.png" alt="iPad Gen 9 10.2 Wi-Fi (64GB) - Chính Hãng Apple Việt Nam" title="iPad Gen 9 10.2 Wi-Fi (64GB) - Chính Hãng Apple Việt Nam">
        </a>
    </div>

            <div class="sticker sticker-left">
                <span><img src="/Content/web/sticker/apple.png
" title="Chính Hãng Apple" /></span>
        </div>


    <div class="info">
        <a href="/may-tinh-bang/apple-ipad-gen-9-10-2-2021-wifi-64gb-chinh-hang-apple-viet-nam" class="title">iPad Gen 9 10.2 Wi-Fi (64GB) - Chính Hãng Apple Việt Nam</a>
        <span class="price">
                <strong>7,290,000 ₫</strong>
                    </span>
    </div>


        <div class="note">
            <span class="bag">KM</span> <label title="Giảm ngay 150.000đ khi mua k&#232;m SIM số đẹp Vinaphone Happy - Ưu đ&#227;i 2GB Data/ng&#224;y - Miễn ph&#237; 1000 ph&#250;t nội mạng.">Giảm ngay 150.000đ khi mua k&#232;m SIM ...</label>
                <strong class="text-orange">VÀ 8 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/may-tinh-bang/apple-ipad-gen-9-10-2-2021-wifi-64gb-chinh-hang-apple-viet-nam">
                <ul>
                        <li><span class="bag">KM</span> Giảm ngay 150.000đ khi mua k&#232;m SIM số đẹp Vinaphone Happy - Ưu đ&#227;i 2GB Data/ng&#224;y - Miễn ph&#237; 1000 ph&#250;t nội mạng.</li>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                </ul>
            </a>
        </div>
</div>                    </div>
                </div>

            </div>
        </div>
    </section>

<section>
    <div class="container">
        <div class="ads">
                <a href="https://hoanghamobile.com/dien-thoai-di-dong/htc-wildfire-e3-lite-4gb-64gb-chinh-hang?source=BannerSlider" target="_top"><img src="https://cdn.hoanghamobile.com/i/home/Uploads/2023/11/18/web-htc-wildfire-e3-lite-01.jpg" style="width: 100%;"></a>
        </div>
    </div>
</section>


    <section>
        <div class="container">
            <div class="flash-sales box-home">
                <div class="header-container">
                    <div class="header">
                        <h4><a href="/loa-tai-nghe">Loa - Tai nghe nổi bật</a></h4>
                    </div>

                </div>

                <div class="content">
                    <div class="owl-carousel lr-slider equaHeight" data-obj=".info a.title">

<div class="item">
    <div class="img">
        <a href="/tai-nghe/tai-nghe-khong-day-xiaomi-redmi-buds-4-chinh-hang">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2022/09/22/image-removebg-preview-8.png" alt="Tai nghe kh&#244;ng d&#226;y Xiaomi Redmi Buds 4 - Ch&#237;nh h&#227;ng " title="Tai nghe kh&#244;ng d&#226;y Xiaomi Redmi Buds 4 - Ch&#237;nh h&#227;ng ">
        </a>
    </div>

    

    <div class="info">
        <a href="/tai-nghe/tai-nghe-khong-day-xiaomi-redmi-buds-4-chinh-hang" class="title">Tai nghe kh&#244;ng d&#226;y Xiaomi Redmi Buds 4 - Ch&#237;nh h&#227;ng </a>
        <span class="price">
                <strong>650,000 ₫</strong>
                            <strike>1,590,000 ₫</strike>
        </span>
    </div>


        <div class="note">
            <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                <strong class="text-orange">VÀ 5 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/tai-nghe/tai-nghe-khong-day-xiaomi-redmi-buds-4-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">
    <div class="img">
        <a href="/tai-nghe/tai-nghe-khong-day-redmi-buds-4-lite">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/03/29/redmi-buds-4-lite-1.png" alt="Tai nghe kh&#244;ng d&#226;y Redmi Buds 4 Lite - Ch&#237;nh h&#227;ng" title="Tai nghe kh&#244;ng d&#226;y Redmi Buds 4 Lite - Ch&#237;nh h&#227;ng">
        </a>
    </div>

    

    <div class="info">
        <a href="/tai-nghe/tai-nghe-khong-day-redmi-buds-4-lite" class="title">Tai nghe kh&#244;ng d&#226;y Redmi Buds 4 Lite - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>540,000 ₫</strong>
                            <strike>790,000 ₫</strike>
        </span>
    </div>


        <div class="note">
            <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                <strong class="text-orange">VÀ 6 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/tai-nghe/tai-nghe-khong-day-redmi-buds-4-lite">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">
    <div class="img">
        <a href="/tai-nghe/tai-nghe-galaxy-buds-fe-chinh-hang">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/10/26/tai-nghe-galaxy-buds-fe-12.png" alt="Tai nghe Samsung Galaxy Buds FE - Ch&#237;nh h&#227;ng" title="Tai nghe Samsung Galaxy Buds FE - Ch&#237;nh h&#227;ng">
        </a>
    </div>

    

    <div class="info">
        <a href="/tai-nghe/tai-nghe-galaxy-buds-fe-chinh-hang" class="title">Tai nghe Samsung Galaxy Buds FE - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>1,590,000 ₫</strong>
                            <strike>1,990,000 ₫</strike>
        </span>
    </div>


        <div class="note">
            <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                <strong class="text-orange">VÀ 1 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/tai-nghe/tai-nghe-galaxy-buds-fe-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">
    <div class="img">
        <a href="/tai-nghe/samsung-galaxy-buds-2-pro-chinh-hang">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2022/08/10/image-removebg-preview_637957687304481353.png" alt="Samsung Galaxy Buds 2 Pro - Ch&#237;nh h&#227;ng" title="Samsung Galaxy Buds 2 Pro - Ch&#237;nh h&#227;ng">
        </a>
    </div>

    

    <div class="info">
        <a href="/tai-nghe/samsung-galaxy-buds-2-pro-chinh-hang" class="title">Samsung Galaxy Buds 2 Pro - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>3,390,000 ₫</strong>
                            <strike>4,990,000 ₫</strike>
        </span>
    </div>


        <div class="note">
            <span class="bag">KM</span> <label title="Ưu đ&#227;i Youtube Premium d&#224;nh cho chủ sở hữu Samsung Galaxy (&#193;p dụng một số sản phẩm)">Ưu đ&#227;i Youtube Premium d&#224;nh cho chủ...</label>
                <strong class="text-orange">VÀ 7 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/tai-nghe/samsung-galaxy-buds-2-pro-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> Ưu đ&#227;i Youtube Premium d&#224;nh cho chủ sở hữu Samsung Galaxy (&#193;p dụng một số sản phẩm)</li>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">
    <div class="img">
        <a href="/tai-nghe/tai-nghe-khong-day-jbl-live-pro-2-tws-chinh-hang">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2022/08/15/image-removebg-preview-34.png" alt="Tai Nghe Kh&#244;ng D&#226;y JBL Live Pro 2 TWS- Ch&#237;nh H&#227;ng" title="Tai Nghe Kh&#244;ng D&#226;y JBL Live Pro 2 TWS- Ch&#237;nh H&#227;ng">
        </a>
    </div>

    

    <div class="info">
        <a href="/tai-nghe/tai-nghe-khong-day-jbl-live-pro-2-tws-chinh-hang" class="title">Tai Nghe Kh&#244;ng D&#226;y JBL Live Pro 2 TWS- Ch&#237;nh H&#227;ng</a>
        <span class="price">
                <strong>2,790,000 ₫</strong>
                            <strike>3,990,000 ₫</strike>
        </span>
    </div>


        <div class="note">
            <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                <strong class="text-orange">VÀ 5 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/tai-nghe/tai-nghe-khong-day-jbl-live-pro-2-tws-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">
    <div class="img">
        <a href="/tai-nghe/samsung-galaxy-buds-2-chinh-hang">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2022/02/13/image-removebg-preview.png" alt="Samsung Galaxy Buds 2 - Ch&#237;nh h&#227;ng" title="Samsung Galaxy Buds 2 - Ch&#237;nh h&#227;ng">
        </a>
    </div>

    

    <div class="info">
        <a href="/tai-nghe/samsung-galaxy-buds-2-chinh-hang" class="title">Samsung Galaxy Buds 2 - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>1,990,000 ₫</strong>
                            <strike>2,990,000 ₫</strike>
        </span>
    </div>


        <div class="note">
            <span class="bag">KM</span> <label title="Ưu đ&#227;i Youtube Premium d&#224;nh cho chủ sở hữu Samsung Galaxy (&#193;p dụng một số sản phẩm)">Ưu đ&#227;i Youtube Premium d&#224;nh cho chủ...</label>
                <strong class="text-orange">VÀ 6 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/tai-nghe/samsung-galaxy-buds-2-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> Ưu đ&#227;i Youtube Premium d&#224;nh cho chủ sở hữu Samsung Galaxy (&#193;p dụng một số sản phẩm)</li>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">
    <div class="img">
        <a href="/tai-nghe/tai-nghe-bluetooth-tws-oppo-enco-air-2-chinh-hang">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2022/03/09/enco-air-2-2.png" alt="Tai  nghe Bluetooth TWS OPPO ENCO Air 2- ch&#237;nh h&#227;ng" title="Tai  nghe Bluetooth TWS OPPO ENCO Air 2- ch&#237;nh h&#227;ng">
        </a>
    </div>

    

    <div class="info">
        <a href="/tai-nghe/tai-nghe-bluetooth-tws-oppo-enco-air-2-chinh-hang" class="title">Tai  nghe Bluetooth TWS OPPO ENCO Air 2- ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>890,000 ₫</strong>
                            <strike>1,590,000 ₫</strike>
        </span>
    </div>


        <div class="note">
            <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                <strong class="text-orange">VÀ 5 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/tai-nghe/tai-nghe-bluetooth-tws-oppo-enco-air-2-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">
    <div class="img">
        <a href="/tai-nghe/tai-nghe-xiaomi-buds-3t-pro-chinh-hang">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2022/03/18/xiaomi-buds-3t-pro-3.png" alt="Tai nghe Xiaomi Buds 3T Pro - Ch&#237;nh h&#227;ng" title="Tai nghe Xiaomi Buds 3T Pro - Ch&#237;nh h&#227;ng">
        </a>
    </div>

    

    <div class="info">
        <a href="/tai-nghe/tai-nghe-xiaomi-buds-3t-pro-chinh-hang" class="title">Tai nghe Xiaomi Buds 3T Pro - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>1,750,000 ₫</strong>
                            <strike>3,690,000 ₫</strike>
        </span>
    </div>


        <div class="note">
            <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                <strong class="text-orange">VÀ 5 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/tai-nghe/tai-nghe-xiaomi-buds-3t-pro-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">
    <div class="img">
        <a href="/tai-nghe/tai-nghe-xiaomi-buds-3-chinh-hang">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2022/03/18/tai-nghe-khong-day-xiaomi-buds-3-6.png" alt="Tai nghe Xiaomi Buds 3 - Ch&#237;nh h&#227;ng" title="Tai nghe Xiaomi Buds 3 - Ch&#237;nh h&#227;ng">
        </a>
    </div>

    

    <div class="info">
        <a href="/tai-nghe/tai-nghe-xiaomi-buds-3-chinh-hang" class="title">Tai nghe Xiaomi Buds 3 - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>1,090,000 ₫</strong>
                            <strike>2,690,000 ₫</strike>
        </span>
    </div>


        <div class="note">
            <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                <strong class="text-orange">VÀ 5 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/tai-nghe/tai-nghe-xiaomi-buds-3-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">
    <div class="img">
        <a href="/tai-nghe/tai-nghe-apple-airpods-pro-chinh-hang-apple">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2020/09/22/Tai nghe Apple AirPods Pro.png" alt="AirPods Pro với Hộp Sạc MagSafe - Chính Hãng Apple Việt Nam" title="AirPods Pro với Hộp Sạc MagSafe - Chính Hãng Apple Việt Nam">
        </a>
    </div>

            <div class="sticker sticker-left">
                <span><img src="/Content/web/sticker/apple.png
" title="Chính Hãng Apple" /></span>
        </div>


    <div class="info">
        <a href="/tai-nghe/tai-nghe-apple-airpods-pro-chinh-hang-apple" class="title">AirPods Pro với Hộp Sạc MagSafe - Chính Hãng Apple Việt Nam</a>
        <span class="price">
                <strong>4,650,000 ₫</strong>
                            <strike>7,990,000 ₫</strike>
        </span>
    </div>


        <div class="note">
            <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                <strong class="text-orange">VÀ 7 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/tai-nghe/tai-nghe-apple-airpods-pro-chinh-hang-apple">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">
    <div class="img">
        <a href="/tai-nghe/tai-nghe-apple-airpods-2-case-sac-thuong-mv7n2vn-a">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2020/12/15/image-removebg-preview.png" alt="AirPods 2 với Hộp Sạc Lightning - Chính Hãng Apple Việt Nam" title="AirPods 2 với Hộp Sạc Lightning - Chính Hãng Apple Việt Nam">
        </a>
    </div>

            <div class="sticker sticker-left">
                <span><img src="/Content/web/sticker/apple.png
" title="Chính Hãng Apple" /></span>
        </div>


    <div class="info">
        <a href="/tai-nghe/tai-nghe-apple-airpods-2-case-sac-thuong-mv7n2vn-a" class="title">AirPods 2 với Hộp Sạc Lightning - Chính Hãng Apple Việt Nam</a>
        <span class="price">
                <strong>2,690,000 ₫</strong>
                            <strike>4,990,000 ₫</strike>
        </span>
    </div>


        <div class="note">
            <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                <strong class="text-orange">VÀ 6 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/tai-nghe/tai-nghe-apple-airpods-2-case-sac-thuong-mv7n2vn-a">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>                    </div>
                </div>

            </div>
        </div>
    </section>



        <section>
            <div class="container">
                <div class="box-product-home box-home">
                    <div class="header-container">
                        <div class="header">
                            <h4><a href="/phu-kien/pin-man-hinh/pin">Thay pin iphone ch&#237;nh h&#227;ng v&#224; sửa chữa</a></h4>
                        </div>
                    </div>
                    <div class="col-content lts-product">


<div class="item">

    <div class="img">
        <a href="/thay-pin/thay-pin-iphone-11-pro-max-chinh-hang-pisen-dung-luong-chuan-3969mah" title="Pin iPhone 11 Pro Max Ch&#237;nh H&#227;ng PISEN (Dung lượng chuẩn 3969mAh)">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2022/05/07/i11pro-5960.jpg" alt="Pin iPhone 11 Pro Max Ch&#237;nh H&#227;ng PISEN (Dung lượng chuẩn 3969mAh)" title="Pin iPhone 11 Pro Max Ch&#237;nh H&#227;ng PISEN (Dung lượng chuẩn 3969mAh)">
        </a>
    </div>


    

        <span class="sales">
            <i class="icon-flash2"></i> Giảm 300,000 ₫
        </span>

    <div class="info">
        <a href="/thay-pin/thay-pin-iphone-11-pro-max-chinh-hang-pisen-dung-luong-chuan-3969mah" class="title" title="Pin iPhone 11 Pro Max Ch&#237;nh H&#227;ng PISEN (Dung lượng chuẩn 3969mAh)">Pin iPhone 11 Pro Max Ch&#237;nh H&#227;ng PISEN (Dung lượng chuẩn 3969mAh)</a>
        <span class="price">
                <strong>1,290,000 ₫</strong>
                            <strike>1,590,000 ₫</strike>
        </span>
        
        
        
    </div>




            <div class="note">
                <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                    <strong class="text-orange">VÀ 5 KM KHÁC</strong>
            </div>
        <div class="promote">
            <a href="/thay-pin/thay-pin-iphone-11-pro-max-chinh-hang-pisen-dung-luong-chuan-3969mah">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">

    <div class="img">
        <a href="/phu-kien/thay-man-hinh-daison-soft-oled-cho-iphone-11-pro-max-chinh-hang" title="Thay m&#224;n h&#236;nh Daison (Soft Oled) cho iPhone 11 Pro Max - Ch&#237;nh h&#227;ng">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2022/08/03/image.png" alt="Thay m&#224;n h&#236;nh Daison (Soft Oled) cho iPhone 11 Pro Max - Ch&#237;nh h&#227;ng" title="Thay m&#224;n h&#236;nh Daison (Soft Oled) cho iPhone 11 Pro Max - Ch&#237;nh h&#227;ng">
        </a>
    </div>


    

        <span class="sales">
            <i class="icon-flash2"></i> Giảm 625,000 ₫
        </span>

    <div class="info">
        <a href="/phu-kien/thay-man-hinh-daison-soft-oled-cho-iphone-11-pro-max-chinh-hang" class="title" title="Thay m&#224;n h&#236;nh Daison (Soft Oled) cho iPhone 11 Pro Max - Ch&#237;nh h&#227;ng">Thay m&#224;n h&#236;nh Daison (Soft Oled) cho iPhone 11 Pro Max - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>3,690,000 ₫</strong>
                            <strike>4,315,000 ₫</strike>
        </span>
        
        
        
    </div>




            <div class="note">
                <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                    <strong class="text-orange">VÀ 6 KM KHÁC</strong>
            </div>
        <div class="promote">
            <a href="/phu-kien/thay-man-hinh-daison-soft-oled-cho-iphone-11-pro-max-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">

    <div class="img">
        <a href="/phu-kien/thay-man-hinh-daison-soft-oled-cho-iphone-xs-max-chinh-hang" title="Thay m&#224;n h&#236;nh Daison (Soft Oled) cho iPhone Xs Max - Ch&#237;nh h&#227;ng">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2022/08/03/soft-600x600.jpg" alt="Thay m&#224;n h&#236;nh Daison (Soft Oled) cho iPhone Xs Max - Ch&#237;nh h&#227;ng" title="Thay m&#224;n h&#236;nh Daison (Soft Oled) cho iPhone Xs Max - Ch&#237;nh h&#227;ng">
        </a>
    </div>


    

        <span class="sales">
            <i class="icon-flash2"></i> Giảm 360,000 ₫
        </span>

    <div class="info">
        <a href="/phu-kien/thay-man-hinh-daison-soft-oled-cho-iphone-xs-max-chinh-hang" class="title" title="Thay m&#224;n h&#236;nh Daison (Soft Oled) cho iPhone Xs Max - Ch&#237;nh h&#227;ng">Thay m&#224;n h&#236;nh Daison (Soft Oled) cho iPhone Xs Max - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>2,790,000 ₫</strong>
                            <strike>3,150,000 ₫</strike>
        </span>
        
        
        
    </div>




            <div class="note">
                <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                    <strong class="text-orange">VÀ 5 KM KHÁC</strong>
            </div>
        <div class="promote">
            <a href="/phu-kien/thay-man-hinh-daison-soft-oled-cho-iphone-xs-max-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">

    <div class="img">
        <a href="/phu-kien/thay-pin-daison-iphone-11-dung-luong-chuan-3110mah" title="Pin Daison iPhone 11 Dung lượng chuẩn 3110mAh">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2022/10/06/image-removebg-preview-29.png" alt="Pin Daison iPhone 11 Dung lượng chuẩn 3110mAh" title="Pin Daison iPhone 11 Dung lượng chuẩn 3110mAh">
        </a>
    </div>


    

        <span class="sales">
            <i class="icon-flash2"></i> Giảm 370,000 ₫
        </span>

    <div class="info">
        <a href="/phu-kien/thay-pin-daison-iphone-11-dung-luong-chuan-3110mah" class="title" title="Pin Daison iPhone 11 Dung lượng chuẩn 3110mAh">Pin Daison iPhone 11 Dung lượng chuẩn 3110mAh</a>
        <span class="price">
                <strong>790,000 ₫</strong>
                            <strike>1,160,000 ₫</strike>
        </span>
        
        
        
    </div>




            <div class="note">
                <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                    <strong class="text-orange">VÀ 5 KM KHÁC</strong>
            </div>
        <div class="promote">
            <a href="/phu-kien/thay-pin-daison-iphone-11-dung-luong-chuan-3110mah">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">

    <div class="img">
        <a href="/phu-kien/thay-pin-daison-iphone-xs-max-dung-luong-chuan-3174mah" title="Pin Daison iPhone Xs max Dung lượng chuẩn 3174mAh ">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2022/10/06/image-removebg-preview-29.png" alt="Pin Daison iPhone Xs max Dung lượng chuẩn 3174mAh " title="Pin Daison iPhone Xs max Dung lượng chuẩn 3174mAh ">
        </a>
    </div>


    

        <span class="sales">
            <i class="icon-flash2"></i> Giảm 200,000 ₫
        </span>

    <div class="info">
        <a href="/phu-kien/thay-pin-daison-iphone-xs-max-dung-luong-chuan-3174mah" class="title" title="Pin Daison iPhone Xs max Dung lượng chuẩn 3174mAh ">Pin Daison iPhone Xs max Dung lượng chuẩn 3174mAh </a>
        <span class="price">
                <strong>690,000 ₫</strong>
                            <strike>890,000 ₫</strike>
        </span>
        
        
        
    </div>




            <div class="note">
                <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                    <strong class="text-orange">VÀ 5 KM KHÁC</strong>
            </div>
        <div class="promote">
            <a href="/phu-kien/thay-pin-daison-iphone-xs-max-dung-luong-chuan-3174mah">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">

    <div class="img">
        <a href="/phu-kien/thay-pin-iphone-5-chinh-hang-pisen-dung-luong-chuan-ip5-1440mah" title="Pin iPhone 5 Ch&#237;nh H&#227;ng PISEN (Dung lượng chuẩn IP5:1440mAh)">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2020/11/27/ip-5c-2x-100.jpg" alt="Pin iPhone 5 Ch&#237;nh H&#227;ng PISEN (Dung lượng chuẩn IP5:1440mAh)" title="Pin iPhone 5 Ch&#237;nh H&#227;ng PISEN (Dung lượng chuẩn IP5:1440mAh)">
        </a>
    </div>


    

        <span class="sales">
            <i class="icon-flash2"></i> Giảm 113,000 ₫
        </span>

    <div class="info">
        <a href="/phu-kien/thay-pin-iphone-5-chinh-hang-pisen-dung-luong-chuan-ip5-1440mah" class="title" title="Pin iPhone 5 Ch&#237;nh H&#227;ng PISEN (Dung lượng chuẩn IP5:1440mAh)">Pin iPhone 5 Ch&#237;nh H&#227;ng PISEN (Dung lượng chuẩn IP5:1440mAh)</a>
        <span class="price">
                <strong>149,000 ₫</strong>
                            <strike>262,000 ₫</strike>
        </span>
        
        
        
    </div>




            <div class="note">
                <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                    <strong class="text-orange">VÀ 5 KM KHÁC</strong>
            </div>
        <div class="promote">
            <a href="/phu-kien/thay-pin-iphone-5-chinh-hang-pisen-dung-luong-chuan-ip5-1440mah">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">

    <div class="img">
        <a href="/phu-kien/pin-energizer-iphone-7-plus-eca7p2900p-chinh-hang" title="Pin Energizer iPhone 7 Plus - ECA7P2900P - Ch&#237;nh h&#227;ng">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2021/04/05/ip7-637449430788149335.png" alt="Pin Energizer iPhone 7 Plus - ECA7P2900P - Ch&#237;nh h&#227;ng" title="Pin Energizer iPhone 7 Plus - ECA7P2900P - Ch&#237;nh h&#227;ng">
        </a>
    </div>


    

        <span class="sales">
            <i class="icon-flash2"></i> Giảm 260,000 ₫
        </span>

    <div class="info">
        <a href="/phu-kien/pin-energizer-iphone-7-plus-eca7p2900p-chinh-hang" class="title" title="Pin Energizer iPhone 7 Plus - ECA7P2900P - Ch&#237;nh h&#227;ng">Pin Energizer iPhone 7 Plus - ECA7P2900P - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>490,000 ₫</strong>
                            <strike>750,000 ₫</strike>
        </span>
        
        
        
    </div>




            <div class="note">
                <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                    <strong class="text-orange">VÀ 5 KM KHÁC</strong>
            </div>
        <div class="promote">
            <a href="/phu-kien/pin-energizer-iphone-7-plus-eca7p2900p-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">

    <div class="img">
        <a href="/phu-kien/pin-energizer-iphone-6s-plus-eca6sp2750p-chinh-hang" title="Pin Energizer iPhone 6S Plus - ECA6SP2750P - Ch&#237;nh h&#227;ng">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2021/04/05/ip6s.png" alt="Pin Energizer iPhone 6S Plus - ECA6SP2750P - Ch&#237;nh h&#227;ng" title="Pin Energizer iPhone 6S Plus - ECA6SP2750P - Ch&#237;nh h&#227;ng">
        </a>
    </div>


    

        <span class="sales">
            <i class="icon-flash2"></i> Giảm 171,000 ₫
        </span>

    <div class="info">
        <a href="/phu-kien/pin-energizer-iphone-6s-plus-eca6sp2750p-chinh-hang" class="title" title="Pin Energizer iPhone 6S Plus - ECA6SP2750P - Ch&#237;nh h&#227;ng">Pin Energizer iPhone 6S Plus - ECA6SP2750P - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>399,000 ₫</strong>
                            <strike>570,000 ₫</strike>
        </span>
        
        
        
    </div>




            <div class="note">
                <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                    <strong class="text-orange">VÀ 5 KM KHÁC</strong>
            </div>
        <div class="promote">
            <a href="/phu-kien/pin-energizer-iphone-6s-plus-eca6sp2750p-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">

    <div class="img">
        <a href="/phu-kien/thay-pin-iphone-8-chinh-hang-pisen-dung-luong-chuan-1821mah" title="Pin iPhone 8 Ch&#237;nh H&#227;ng PISEN (Dung lượng chuẩn 1821mAh)">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2020/11/27/ip-8-2x-100.jpg" alt="Pin iPhone 8 Ch&#237;nh H&#227;ng PISEN (Dung lượng chuẩn 1821mAh)" title="Pin iPhone 8 Ch&#237;nh H&#227;ng PISEN (Dung lượng chuẩn 1821mAh)">
        </a>
    </div>


    

        <span class="sales">
            <i class="icon-flash2"></i> Giảm 260,000 ₫
        </span>

    <div class="info">
        <a href="/phu-kien/thay-pin-iphone-8-chinh-hang-pisen-dung-luong-chuan-1821mah" class="title" title="Pin iPhone 8 Ch&#237;nh H&#227;ng PISEN (Dung lượng chuẩn 1821mAh)">Pin iPhone 8 Ch&#237;nh H&#227;ng PISEN (Dung lượng chuẩn 1821mAh)</a>
        <span class="price">
                <strong>490,000 ₫</strong>
                            <strike>750,000 ₫</strike>
        </span>
        
        
        
    </div>




            <div class="note">
                <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                    <strong class="text-orange">VÀ 5 KM KHÁC</strong>
            </div>
        <div class="promote">
            <a href="/phu-kien/thay-pin-iphone-8-chinh-hang-pisen-dung-luong-chuan-1821mah">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">

    <div class="img">
        <a href="/phu-kien/thay-pin-iphone-x-chinh-hang-pisen-dung-luong-chuan-2716mah" title="Pin iPhone X Ch&#237;nh H&#227;ng PISEN (Dung lượng chuẩn 2716mAh)">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2020/11/27/ip-x-2x-100.jpg" alt="Pin iPhone X Ch&#237;nh H&#227;ng PISEN (Dung lượng chuẩn 2716mAh)" title="Pin iPhone X Ch&#237;nh H&#227;ng PISEN (Dung lượng chuẩn 2716mAh)">
        </a>
    </div>


    

        <span class="sales">
            <i class="icon-flash2"></i> Giảm 790,000 ₫
        </span>

    <div class="info">
        <a href="/phu-kien/thay-pin-iphone-x-chinh-hang-pisen-dung-luong-chuan-2716mah" class="title" title="Pin iPhone X Ch&#237;nh H&#227;ng PISEN (Dung lượng chuẩn 2716mAh)">Pin iPhone X Ch&#237;nh H&#227;ng PISEN (Dung lượng chuẩn 2716mAh)</a>
        <span class="price">
                <strong>690,000 ₫</strong>
                            <strike>1,480,000 ₫</strike>
        </span>
        
        
        
    </div>




            <div class="note">
                <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                    <strong class="text-orange">VÀ 5 KM KHÁC</strong>
            </div>
        <div class="promote">
            <a href="/phu-kien/thay-pin-iphone-x-chinh-hang-pisen-dung-luong-chuan-2716mah">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>                    </div>
                </div>
            </div>
        </section>


<section>
    <div class="container">
        <div class="ads">
                <a href="https://hoanghamobile.com/robot-hut-bui/robot-hut-bui-dreame-bot-w10-chinh-hang" target="_top"><img src="https://cdn.hoanghamobile.com/i/home/Uploads/2023/11/20/robot-hut-bui-dreame-bot-w10-01.jpg" style="width: 100%;"></a>
        </div>
    </div>
</section>

    <section>
        <div class="container">
            <div class="flash-sales box-home">
                <div class="header-container">
                    <div class="header">
                        <h4><a href="https://hoanghamobile.com/smart-home">Smart Home</a></h4>
                    </div>

                </div>

                <div class="content">
                    <div class="owl-carousel lr-slider equaHeight" data-obj=".info a.title">

<div class="item">
    <div class="img">
        <a href="/camera/camera-ip-wifi-tp-link-tapo-c200-360&#176;-1080p-chinh-hang">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/08/04/whatsapp-image-2023-08-04-at-16-55-35.jpeg" alt="Camera IP Wifi TP-Link Tapo C200 360&#176; 1080P - Ch&#237;nh h&#227;ng" title="Camera IP Wifi TP-Link Tapo C200 360&#176; 1080P - Ch&#237;nh h&#227;ng">
        </a>
    </div>

    

    <div class="info">
        <a href="/camera/camera-ip-wifi-tp-link-tapo-c200-360&#176;-1080p-chinh-hang" class="title">Camera IP Wifi TP-Link Tapo C200 360&#176; 1080P - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>460,000 ₫</strong>
                            <strike>799,000 ₫</strike>
        </span>
    </div>


        <div class="note">
            <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                <strong class="text-orange">VÀ 5 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/camera/camera-ip-wifi-tp-link-tapo-c200-360&#176;-1080p-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">
    <div class="img">
        <a href="/robot-hut-bui/may-hut-bui-mi-handheld-vacuum-cleaner-light-chinh-hang">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2021/06/09/image-removebg-preview.png" alt="M&#225;y h&#250;t bụi Mi Handheld Vacuum Cleaner Light - Ch&#237;nh h&#227;ng" title="M&#225;y h&#250;t bụi Mi Handheld Vacuum Cleaner Light - Ch&#237;nh h&#227;ng">
        </a>
    </div>

    

    <div class="info">
        <a href="/robot-hut-bui/may-hut-bui-mi-handheld-vacuum-cleaner-light-chinh-hang" class="title">M&#225;y h&#250;t bụi Mi Handheld Vacuum Cleaner Light - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>1,590,000 ₫</strong>
                            <strike>3,490,000 ₫</strike>
        </span>
    </div>


        <div class="note">
            <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                <strong class="text-orange">VÀ 5 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/robot-hut-bui/may-hut-bui-mi-handheld-vacuum-cleaner-light-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">
    <div class="img">
        <a href="/robot-hut-bui/robot-hut-bui-dreame-bot-w10-chinh-hang">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2022/01/08/image-removebg-preview-23.png" alt="Robot h&#250;t bụi Dreame Bot W10 - Ch&#237;nh h&#227;ng" title="Robot h&#250;t bụi Dreame Bot W10 - Ch&#237;nh h&#227;ng">
        </a>
    </div>

    

    <div class="info">
        <a href="/robot-hut-bui/robot-hut-bui-dreame-bot-w10-chinh-hang" class="title">Robot h&#250;t bụi Dreame Bot W10 - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>11,990,000 ₫</strong>
                            <strike>21,990,000 ₫</strike>
        </span>
    </div>


        <div class="note">
            <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                <strong class="text-orange">VÀ 7 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/robot-hut-bui/robot-hut-bui-dreame-bot-w10-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">
    <div class="img">
        <a href="/may-loc-khong-khi/may-loc-khong-khi-clair-k2m24-chinh-hang">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2022/01/25/1233334.png" alt="M&#225;y lọc kh&#244;ng kh&#237; Clair K2M24 - Ch&#237;nh h&#227;ng" title="M&#225;y lọc kh&#244;ng kh&#237; Clair K2M24 - Ch&#237;nh h&#227;ng">
        </a>
    </div>

    

    <div class="info">
        <a href="/may-loc-khong-khi/may-loc-khong-khi-clair-k2m24-chinh-hang" class="title">M&#225;y lọc kh&#244;ng kh&#237; Clair K2M24 - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>899,000 ₫</strong>
                            <strike>4,890,000 ₫</strike>
        </span>
    </div>


        <div class="note">
            <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                <strong class="text-orange">VÀ 5 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/may-loc-khong-khi/may-loc-khong-khi-clair-k2m24-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">
    <div class="img">
        <a href="/may-loc-khong-khi/may-loc-khong-khi-clair-tower-plus-air-purifier-t1c24-chinh-hang">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2022/01/25/t-removebg-preview.png" alt="M&#225;y lọc kh&#244;ng kh&#237; Clair Tower Plus Air Purifier (T1C24) - Ch&#237;nh h&#227;ng" title="M&#225;y lọc kh&#244;ng kh&#237; Clair Tower Plus Air Purifier (T1C24) - Ch&#237;nh h&#227;ng">
        </a>
    </div>

    

    <div class="info">
        <a href="/may-loc-khong-khi/may-loc-khong-khi-clair-tower-plus-air-purifier-t1c24-chinh-hang" class="title">M&#225;y lọc kh&#244;ng kh&#237; Clair Tower Plus Air Purifier (T1C24) - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>1,990,000 ₫</strong>
                            <strike>7,290,000 ₫</strike>
        </span>
    </div>


        <div class="note">
            <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                <strong class="text-orange">VÀ 5 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/may-loc-khong-khi/may-loc-khong-khi-clair-tower-plus-air-purifier-t1c24-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">
    <div class="img">
        <a href="/may-loc-khong-khi/may-loc-khong-khi-xiaomi-air-purifier-4-lite-chinh-hang">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2022/02/12/xiaomi-smart-air-purifier-lite-7.png" alt="M&#225;y lọc kh&#244;ng kh&#237; Xiaomi Air Purifier 4 Lite - Ch&#237;nh h&#227;ng" title="M&#225;y lọc kh&#244;ng kh&#237; Xiaomi Air Purifier 4 Lite - Ch&#237;nh h&#227;ng">
        </a>
    </div>

    

    <div class="info">
        <a href="/may-loc-khong-khi/may-loc-khong-khi-xiaomi-air-purifier-4-lite-chinh-hang" class="title">M&#225;y lọc kh&#244;ng kh&#237; Xiaomi Air Purifier 4 Lite - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>1,990,000 ₫</strong>
                            <strike>3,990,000 ₫</strike>
        </span>
    </div>


        <div class="note">
            <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                <strong class="text-orange">VÀ 5 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/may-loc-khong-khi/may-loc-khong-khi-xiaomi-air-purifier-4-lite-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">
    <div class="img">
        <a href="/phu-kien/o-cam-dien-thong-minh-chong-giat-vconex-smart-plug">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2022/07/11/vconex-smart-plug-7.png" alt="Ổ cắm điện th&#244;ng minh chống giật Vconnex Smart Plug - Ch&#237;nh h&#227;ng" title="Ổ cắm điện th&#244;ng minh chống giật Vconnex Smart Plug - Ch&#237;nh h&#227;ng">
        </a>
    </div>

    

    <div class="info">
        <a href="/phu-kien/o-cam-dien-thong-minh-chong-giat-vconex-smart-plug" class="title">Ổ cắm điện th&#244;ng minh chống giật Vconnex Smart Plug - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>299,000 ₫</strong>
                            <strike>490,000 ₫</strike>
        </span>
    </div>


        <div class="note">
            <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                <strong class="text-orange">VÀ 5 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/phu-kien/o-cam-dien-thong-minh-chong-giat-vconex-smart-plug">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">
    <div class="img">
        <a href="/may-loc-khong-khi/may-loc-khong-khi-xiaomi-air-purifier-4-compact-chinh-hang">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2022/09/22/image-removebg-preview-18.png" alt="M&#225;y lọc kh&#244;ng kh&#237; Xiaomi Air Purifier 4 Compact - Ch&#237;nh h&#227;ng" title="M&#225;y lọc kh&#244;ng kh&#237; Xiaomi Air Purifier 4 Compact - Ch&#237;nh h&#227;ng">
        </a>
    </div>

    

    <div class="info">
        <a href="/may-loc-khong-khi/may-loc-khong-khi-xiaomi-air-purifier-4-compact-chinh-hang" class="title">M&#225;y lọc kh&#244;ng kh&#237; Xiaomi Air Purifier 4 Compact - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>1,590,000 ₫</strong>
                            <strike>2,590,000 ₫</strike>
        </span>
    </div>


        <div class="note">
            <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                <strong class="text-orange">VÀ 5 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/may-loc-khong-khi/may-loc-khong-khi-xiaomi-air-purifier-4-compact-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">
    <div class="img">
        <a href="/do-gia-dung/may-tam-nuoc-h2ofloss-hf-6-trang-chinh-hang">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2022/10/31/image-removebg-preview-6.png" alt="M&#225;y tăm nước H2OFLOSS HF-6 Trắng - Ch&#237;nh h&#227;ng " title="M&#225;y tăm nước H2OFLOSS HF-6 Trắng - Ch&#237;nh h&#227;ng ">
        </a>
    </div>

    

    <div class="info">
        <a href="/do-gia-dung/may-tam-nuoc-h2ofloss-hf-6-trang-chinh-hang" class="title">M&#225;y tăm nước H2OFLOSS HF-6 Trắng - Ch&#237;nh h&#227;ng </a>
        <span class="price">
                <strong>590,000 ₫</strong>
                    </span>
    </div>


        <div class="note">
            <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                <strong class="text-orange">VÀ 5 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/do-gia-dung/may-tam-nuoc-h2ofloss-hf-6-trang-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">
    <div class="img">
        <a href="/robot-hut-bui/may-hut-dem-diet-khuan-thong-minh-smarock-s10-pro">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/03/08/smarock-s10-pro-3.png" alt="M&#225;y h&#250;t đệm diệt khuẩn th&#244;ng minh Smarock S10 Pro - Ch&#237;nh h&#227;ng" title="M&#225;y h&#250;t đệm diệt khuẩn th&#244;ng minh Smarock S10 Pro - Ch&#237;nh h&#227;ng">
        </a>
    </div>

    

    <div class="info">
        <a href="/robot-hut-bui/may-hut-dem-diet-khuan-thong-minh-smarock-s10-pro" class="title">M&#225;y h&#250;t đệm diệt khuẩn th&#244;ng minh Smarock S10 Pro - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>1,990,000 ₫</strong>
                            <strike>3,290,000 ₫</strike>
        </span>
    </div>


        <div class="note">
            <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                <strong class="text-orange">VÀ 5 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/robot-hut-bui/may-hut-dem-diet-khuan-thong-minh-smarock-s10-pro">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">
    <div class="img">
        <a href="/robot-hut-bui/robot-hut-bui-xiaomi-vacuum-e10-chinh-hang">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/03/10/e10-3.png" alt="Robot h&#250;t bụi Xiaomi Vacuum E10 - Ch&#237;nh h&#227;ng" title="Robot h&#250;t bụi Xiaomi Vacuum E10 - Ch&#237;nh h&#227;ng">
        </a>
    </div>

    

    <div class="info">
        <a href="/robot-hut-bui/robot-hut-bui-xiaomi-vacuum-e10-chinh-hang" class="title">Robot h&#250;t bụi Xiaomi Vacuum E10 - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>3,990,000 ₫</strong>
                            <strike>6,490,000 ₫</strike>
        </span>
    </div>


        <div class="note">
            <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                <strong class="text-orange">VÀ 6 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/robot-hut-bui/robot-hut-bui-xiaomi-vacuum-e10-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">
    <div class="img">
        <a href="/robot-hut-bui/robot-hut-bui-xiaomi-vacuum-x10-plus-chinh-hang">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/03/10/x10-plus-6-33.png" alt="Robot h&#250;t bụi Xiaomi Vacuum X10 Plus - Ch&#237;nh h&#227;ng" title="Robot h&#250;t bụi Xiaomi Vacuum X10 Plus - Ch&#237;nh h&#227;ng">
        </a>
    </div>

    

    <div class="info">
        <a href="/robot-hut-bui/robot-hut-bui-xiaomi-vacuum-x10-plus-chinh-hang" class="title">Robot h&#250;t bụi Xiaomi Vacuum X10 Plus - Ch&#237;nh h&#227;ng</a>
        <span class="price">
                <strong>12,490,000 ₫</strong>
                            <strike>29,990,000 ₫</strike>
        </span>
    </div>


        <div class="note">
            <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                <strong class="text-orange">VÀ 6 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/robot-hut-bui/robot-hut-bui-xiaomi-vacuum-x10-plus-chinh-hang">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">
    <div class="img">
        <a href="/camera/camera-xiaomi-mi-home-security-c200-bhr6766gl">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/03/15/xiaomi-mi-home-security-c200.png" alt="Camera Xiaomi MI Home Security C200 (BHR6766GL)" title="Camera Xiaomi MI Home Security C200 (BHR6766GL)">
        </a>
    </div>

    

    <div class="info">
        <a href="/camera/camera-xiaomi-mi-home-security-c200-bhr6766gl" class="title">Camera Xiaomi MI Home Security C200 (BHR6766GL)</a>
        <span class="price">
                <strong>590,000 ₫</strong>
                            <strike>949,000 ₫</strike>
        </span>
    </div>


        <div class="note">
            <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                <strong class="text-orange">VÀ 5 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/camera/camera-xiaomi-mi-home-security-c200-bhr6766gl">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>
<div class="item">
    <div class="img">
        <a href="/do-gia-dung/noi-chien-khong-dau-xiaomi-smart-air-fryer-pro-4l-bhr6943eu">
            <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/05/24/xiaomi-smart-air-fryer-pro-4l-bhr-3.png" alt="Nồi chi&#234;n kh&#244;ng dầu Xiaomi Smart Air Fryer Pro 4L - BHR6943EU" title="Nồi chi&#234;n kh&#244;ng dầu Xiaomi Smart Air Fryer Pro 4L - BHR6943EU">
        </a>
    </div>

    

    <div class="info">
        <a href="/do-gia-dung/noi-chien-khong-dau-xiaomi-smart-air-fryer-pro-4l-bhr6943eu" class="title">Nồi chi&#234;n kh&#244;ng dầu Xiaomi Smart Air Fryer Pro 4L - BHR6943EU</a>
        <span class="price">
                <strong>1,490,000 ₫</strong>
                            <strike>2,990,000 ₫</strike>
        </span>
    </div>


        <div class="note">
            <span class="bag">KM</span> <label title="VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.">VNPAY - Giảm th&#234;m tới 200.000đ khi ...</label>
                <strong class="text-orange">VÀ 5 KM KHÁC</strong>
        </div>
        <div class="promote">
            <a href="/do-gia-dung/noi-chien-khong-dau-xiaomi-smart-air-fryer-pro-4l-bhr6943eu">
                <ul>
                        <li><span class="bag">KM</span> VNPAY - Giảm th&#234;m tới 200.000đ khi thanh to&#225;n qua VNPAY.</li>
                        <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                        <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                </ul>
            </a>
        </div>
</div>                    </div>
                </div>

            </div>
        </div>
    </section>








    <section>
        <div class="container">
            <div class="box-icon box-home">
                <div class="header">
                    <h4><a href="https://hoanghamobile.com/phu-kien">Phụ Kiện</a></h4>
                </div>

                <div class="content">
                    <ul>
                            <li>
                                <a href="/the-nho-usb">
                                    <span><img src="https://cdn.hoanghamobile.com/i/cat/Uploads/2021/11/18/icon-moi-2.png" /></span>
                                    <label>Thẻ nhớ - USB</label>
                                </a>
                            </li>
                            <li>
                                <a href="/tai-nghe">
                                    <span><img src="https://cdn.hoanghamobile.com/i/cat/Uploads/2021/11/18/icon-moi-15.png" /></span>
                                    <label>Tai nghe</label>
                                </a>
                            </li>
                            <li>
                                <a href="/sac-du-phong">
                                    <span><img src="https://cdn.hoanghamobile.com/i/cat/Uploads/2021/11/18/icon-moi-10.png" /></span>
                                    <label>Sạc dự ph&#242;ng</label>
                                </a>
                            </li>
                            <li>
                                <a href="/do-choi-cong-nghe/quat-de-ban">
                                    <span><img src="https://cdn.hoanghamobile.com/i/cat/Uploads/2021/11/18/icon-moi-1.png" /></span>
                                    <label>Quạt Mini</label>
                                </a>
                            </li>
                            <li>
                                <a href="/loa">
                                    <span><img src="https://cdn.hoanghamobile.com/i/cat/Uploads/2021/11/18/icon-moi-14.png" /></span>
                                    <label>Loa</label>
                                </a>
                            </li>
                            <li>
                                <a href="/phu-kien/day-deo-dong-ho">
                                    <span><img src="https://cdn.hoanghamobile.com/i/cat/Uploads/2021/11/18/icon-xanh-2.png" /></span>
                                    <label>D&#226;y đeo đồng hồ, Airtag</label>
                                </a>
                            </li>
                            <li>
                                <a href="/cu-sac-day-cap">
                                    <span><img src="https://cdn.hoanghamobile.com/i/cat/Uploads/2021/11/18/icon-moi-9.png" /></span>
                                    <label>Củ sạc - D&#226;y c&#225;p</label>
                                </a>
                            </li>
                            <li>
                                <a href="/camera-an-ninh">
                                    <span><img src="https://cdn.hoanghamobile.com/i/cat/Uploads/2021/11/18/icon-moi-12.png" /></span>
                                    <label>Camera an ninh</label>
                                </a>
                            </li>
                            <li>
                                <a href="/phu-kien/bo-phat-wifi">
                                    <span><img src="https://cdn.hoanghamobile.com/i/cat/Uploads/2021/11/18/icon-moi-11.png" /></span>
                                    <label>Thiết bị mạng</label>
                                </a>
                            </li>
                            <li>
                                <a href="/phu-kien/phu-kien-apple">
                                    <span><img src="https://cdn.hoanghamobile.com/i/cat/Uploads/2021/11/18/icon-moi-3.png" /></span>
                                    <label>Apple</label>
                                </a>
                            </li>
                            <li>
                                <a href="/op-lung-dien-thoai">
                                    <span><img src="https://cdn.hoanghamobile.com/i/cat/Uploads/2021/11/18/icon-moi-6.png" /></span>
                                    <label>Bao da - ốp lưng</label>
                                </a>
                            </li>
                            <li>
                                <a href="https://hoanghamobile.com/phu-kien/mieng-dan-man-hinh">
                                    <span><img src="https://cdn.hoanghamobile.com/i/cat/Uploads/2021/11/18/icon-xanh-5.png" /></span>
                                    <label>D&#225;n m&#224;n h&#236;nh</label>
                                </a>
                            </li>
                            <li>
                                <a>
                                    <span><img src="https://cdn.hoanghamobile.com/i/cat/Uploads/2021/11/18/icon-xanh-3.png" /></span>
                                    <label>Phụ kiện Laptop</label>
                                </a>
                            </li>
                            <li>
                                <a href="https://hoanghamobile.com/do-choi-cong-nghe/gopro">
                                    <span><img src="https://cdn.hoanghamobile.com/i/cat/Uploads/2021/11/18/icon-xanh-4.png" /></span>
                                    <label>Camera h&#224;nh tr&#236;nh</label>
                                </a>
                            </li>
                            <li>
                                <a href="https://hoanghamobile.com/smart-home/can-thong-minh">
                                    <span><img src="https://cdn.hoanghamobile.com/i/cat/Uploads/2021/11/18/icon-xanh-6.png" /></span>
                                    <label>C&#226;n th&#244;ng minh</label>
                                </a>
                            </li>
                            <li>
                                <a href="https://hoanghamobile.com/do-choi-cong-nghe/tay-cam-chong-rung">
                                    <span><img src="https://cdn.hoanghamobile.com/i/cat/Uploads/2021/11/18/icon-xanh-1.png" /></span>
                                    <label>Tay cầm chống rung</label>
                                </a>
                            </li>
                            <li>
                                <a href="https://hoanghamobile.com/phu-kien/chuot">
                                    <span><img src="https://cdn.hoanghamobile.com/i/cat/Uploads/2021/11/18/icon-moi-7.png" /></span>
                                    <label>Chuột</label>
                                </a>
                            </li>
                            <li>
                                <a href="https://hoanghamobile.com/phu-kien/ban-phim">
                                    <span><img src="https://cdn.hoanghamobile.com/i/cat/Uploads/2021/11/18/icon-moi-8.png" /></span>
                                    <label>B&#224;n Ph&#237;m </label>
                                </a>
                            </li>
                            <li>
                                <a href="/do-gia-dung/may-loc-khong-khi">
                                    <span><img src="https://cdn.hoanghamobile.com/i/cat/Uploads/2021/11/18/roboot.png" /></span>
                                    <label>M&#225;y lọc kh&#244;ng kh&#237;</label>
                                </a>
                            </li>
                            <li>
                                <a href="/do-gia-dung/robot-hut-bui">
                                    <span><img src="https://cdn.hoanghamobile.com/i/cat/Uploads/2021/11/18/icon-web-may-loc.png" /></span>
                                    <label>Robot h&#250;t bụi</label>
                                </a>
                            </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>




<!-- news -->
<section>
    <div class="container">
        <div class="news-home box-home">
            <div class="header">
                <h4><a href="/tin-tuc">TIN CÔNG NGHỆ</a></h4>
            </div>

            <div class="col-content">
            </div>
        </div>
    </div>
</section>




<section>
    <div class="container">
        <div class="news-home box-home">
            <div class="header">
                <h4><a href="javascript:;">KHÁCH HÀNG CỦA HOÀNG HÀ</a></h4>
            </div>
        </div>


        <div class="testimonial">
            <div class="owl-carousel equaHeight testimonial-slider" data-obj=".item a.title">
                    <div class="item">
                        <div class="img">
                            <img src="https://cdn.hoanghamobile.com/i/idol/Uploads/2022/01/18/hhm00784ii.png" />
                        </div>

                        <div class="info">
                            <h3>DV Huyền Lizzie</h3>
                            <h4>Diễn vi&#234;n truyền h&#236;nh</h4>
                            <div class="note">
                                Huyền rất hay ghé Hoàng Hà Mobile mua các sản phẩm iPhone dù không hẳn là một tín đồ công nghệ. Về giá cả, chất lượng và độ uy tín thì Hoàng Hà đều mang lại cho mình sự hài lòng.
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="img">
                            <img src="https://cdn.hoanghamobile.com/i/idol/Uploads/2023/01/28/4dc00612-3f21-4061-963a-fb9bb982f6a6.jpeg" />
                        </div>

                        <div class="info">
                            <h3>Gia Đ&#236;nh Chuyện Nh&#224; Đậu</h3>
                            <h4>Hot family</h4>
                            <div class="note">
                                Gia đình Chuyện nhà Đậu rất tin dùng các sản phẩm công nghệ chính hãng mua tại Hoàng Hà Mobile. Phải công nhận rằng cũng nhờ vào những thiết bị này mà chúng mình mới có thể quay thêm nhiều vlog thú vị cho khán giả xem. Hãy đến các chi nhánh của Hoàng Hà Mobile trên toàn quốc để mua sắm và trải nghiệm nhé!
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="img">
                            <img src="https://cdn.hoanghamobile.com/i/idol/Uploads/2023/01/28/f14a39b8-29ea-487d-969a-ec0e82d4df96.jpeg" />
                        </div>

                        <div class="info">
                            <h3>Ng&#244; Lan Hương</h3>
                            <h4>Ca Sĩ</h4>
                            <div class="note">
                                Với lịch trình ca hát bận rộn, Ngô Lan Hương luôn cần chiếc smartphone đồng hành bên mình. Địa chỉ mua điện thoại chính hãng uy tín mà Hương lựa chọn luôn là Hoàng Hà Mobile. Khi đến đây, từ giá cả, chất lượng và thái độ phục vụ luôn khiến mình hài lòng.
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="img">
                            <img src="https://cdn.hoanghamobile.com/i/idol/Uploads/2022/03/29/whatsapp-image-2022-03-28-at-5-36-16-pm.jpeg" />
                        </div>

                        <div class="info">
                            <h3>Jun Vũ</h3>
                            <h4>Diễn vi&#234;n</h4>
                            <div class="note">
                                Các sản phẩm đến từ thương hiệu Apple luôn chiếm trọn niềm yêu thích của mình từ cái nhìn đầu tiên. Và Hoàng Hà Mobile là nơi Jun Vũ tin tưởng nhất để mua sắm, với hơn 100 chi nhánh trên toàn quốc. 
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="img">
                            <img src="https://cdn.hoanghamobile.com/i/idol/Uploads/2022/10/25/a9524b6593cf54910dde.jpg" />
                        </div>

                        <div class="info">
                            <h3>DV Thanh Sơn</h3>
                            <h4>Diễn vi&#234;n truyền h&#236;nh</h4>
                            <div class="note">
                                Sơn biết tới Hoàng Hà Mobile từ thời có mỗi chi nhánh ở Lê Duẩn, Hà Nội và vẫn tin tưởng mua các sản phẩm công nghệ ở đây cho đến tận bây giờ. Các bạn nhân viên rất nhiệt tình, thủ tục thanh toán nhanh gọn lại còn nhiều ưu đãi vào cuối tuần. Chắc chắn Sơn sẽ quay lại mua những lần sau.
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="img">
                            <img src="https://cdn.hoanghamobile.com/i/idol/Uploads/2022/06/14/15ac62ec-72dc-4c45-875d-8521c8b31867.jpg" />
                        </div>

                        <div class="info">
                            <h3>B&#249;i Lan Hương</h3>
                            <h4>Ca sĩ / Diễn vi&#234;n Phim Em v&#224; Trịnh</h4>
                            <div class="note">
                                Hương không phải là người hiểu nhiều về công nghệ nên mỗi khi mua đồ mới Hương hay tham khảo người quen hoặc đến những shop đã có tên tuổi. Đợt này sắm điện thoại mới, Hương được bạn giới thiệu tới Hoàng Hà Mobile Quận 6 ngay gần nhà. Shop có nhiều máy trải nghiệm với nhân viên tư vấn nhiệt tình giúp Hương dễ dàng đưa ra lựa chọn sản phẩm phù hợp.
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="img">
                            <img src="https://cdn.hoanghamobile.com/i/idol/Uploads/2022/03/15/whatsapp-image-2022-03-15-at-9-51-46-am.jpeg" />
                        </div>

                        <div class="info">
                            <h3>B&#249;i Phương Nga </h3>
                            <h4>&#193; hậu </h4>
                            <div class="note">
                                Cảm ơn Hoàng Hà Mobile đã cho “Mợ” cơ hội là một trong những khách hàng đầu tiên sở hữu cực phẩm S22 Ultra của Samsung. “Cậu” Bình An ở nhà chắc cũng đang mê lắm đấy!
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="img">
                            <img src="https://cdn.hoanghamobile.com/i/idol/Uploads/2022/06/28/whatsapp-image-2022-06-20-at-10-35-17-am-1.jpeg" />
                        </div>

                        <div class="info">
                            <h3>Nguyễn Thị Oanh</h3>
                            <h4>VĐV điền kinh đội tuyển quốc gia Việt Nam</h4>
                            <div class="note">
                                Giành Huy chương Vàng SEA Games tại quê hương thực sự là một điều hạnh phúc. Để đánh dấu cột mốc này, Oanh quyết định tự thưởng cho mình một chiếc iPhone 13 Pro max sau chặng đường vừa qua.Và Hoàng Hà Mobile - địa chỉ bán lẻ ủy quyền của Apple uy tín hàng đầu, với mức giá cực kỳ ưu đãi đã thu hút được Oanh ngay từ cái nhìn đầu tiên.
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="img">
                            <img src="https://cdn.hoanghamobile.com/i/idol/Uploads/2022/06/14/ace1d739-a8fe-47c3-a5bf-a6683dda42d7.jpg" />
                        </div>

                        <div class="info">
                            <h3>Team Flash</h3>
                            <h4>Đội tuyển huy chương v&#224;ng Sea Game 31 bộ m&#244;n Li&#234;n Minh Huyền Thoại Tốc Chiến</h4>
                            <div class="note">
                                "Bí quyết giành Huy chương Vàng SEA Games 31 sao?
Nó đã nằm ngay ở cái tên của chúng tôi rồi!
Tốc độ' và sự chính xác sẽ là mấu chốt của chiến thắng! Team Flash tin tưởng Hoàng Hà Mobile là nơi mua sắm các sản phẩm công nghệ chính hãng, giá tốt hàng đầu, với cấu hình siêu khủng để cân mọi kèo thi đấu. "
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="img">
                            <img src="https://cdn.hoanghamobile.com/i/idol/Uploads/2022/03/15/whatsapp-image-2022-03-15-at-9-51-47-am.jpeg" />
                        </div>

                        <div class="info">
                            <h3>Tăng Vũ Minh Ph&#250;c </h3>
                            <h4>Ca sĩ </h4>
                            <div class="note">
                                Là một Samfan chân chính, Tăng Phúc không thể bỏ qua chương trình trả hàng sản phẩm S22 series tại Hoàng Hà Mobile được! Đặt hàng thuận lợi, ra nhận hàng thì nhanh chóng, nhân viên lại nhiệt tình. Từ nay về sau Tăng Phúc chỉ tin tưởng Hoàng Hà Mobile thôi!
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="img">
                            <img src="https://cdn.hoanghamobile.com/i/idol/Uploads/2022/06/28/whatsapp-image-2022-06-20-at-10-35-17-am-2.jpeg" />
                        </div>

                        <div class="info">
                            <h3>Qu&#225;ch Thị Lan </h3>
                            <h4>VĐV điền kinh đội tuyển quốc gia Việt Nam</h4>
                            <div class="note">
                                Là một vận động viên, Lan luôn muốn mình đạt hiệu quả tập luyện tối đa bằng những phương pháp hiện đại.  Chính vì thế, Lan đã quyết định trang bị cho mình vòng đeo tay 𝗛𝘂𝗮𝘄𝗲𝗶 𝗙𝗶𝘁 𝟮 chính hãng tại Hoàng Hà Mobile. Với sự trợ giúp của chiếc vòng tay thông minh này, Lan tự tin hướng đến việc chinh phục những cột mốc mới trong sự nghiệp
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="img">
                            <img src="https://cdn.hoanghamobile.com/i/idol/Uploads/2022/03/15/whatsapp-image-2022-03-15-at-9-34-21-am.jpeg" />
                        </div>

                        <div class="info">
                            <h3>DV Trung Ruồi</h3>
                            <h4>Diễn vi&#234;n</h4>
                            <div class="note">
                                Tháng củ mật, lớ ngớ thế nào lại để bị mất điện thoại, may mắn nhờ đại ca Quang Thắng giới thiệu qua Hoàng Hà Mobile, vừa sắm được máy mới sang sịn mịn mà còn với giá cả phải chăng. Từ nay chỉ tin tưởng mua đồ công nghệ ở Hoàng Hà thôi!!
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="img">
                            <img src="https://cdn.hoanghamobile.com/i/idol/Uploads/2022/06/28/whatsapp-image-2022-06-20-at-10-35-17-am.jpeg" />
                        </div>

                        <div class="info">
                            <h3>Qu&#225;ch C&#244;ng Lịch</h3>
                            <h4>VĐV điền kinh đội tuyển quốc gia Việt Nam</h4>
                            <div class="note">
                                Để đạt được thành công, đồng nghĩa với việc mình phải cố gắng không ngừng. Hướng đến việc chinh phục những đỉnh cao mới, Công Lịch đã lựa chọn đồng hồ 𝗛𝘂𝗮𝘄𝗲𝗶 𝗪𝗮𝘁𝗰𝗵 𝗚𝗧𝟯 tại Hoàng Hà Mobile làm bạn đồng hành!
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="img">
                            <img src="https://cdn.hoanghamobile.com/i/idol/Uploads/2022/06/14/a4c5c140-0c5f-4b20-ab31-213997f2b113.jpg" />
                        </div>

                        <div class="info">
                            <h3>VĐV Trần Văn Đảng </h3>
                            <h4>HCV nội dung chạy 1.500m tại Giải điền kinh v&#244; địch quốc gia 2021.</h4>
                            <div class="note">
                                Văn Đảng đã lựa chọn Samsung Galaxy Watch 4 là người bạn đồng hành cùng mình trong các buổi luyện tập. Còn nhắc đến việc mua sắm sản phẩm công nghệ thì không thể nào bỏ qua các chương trình khuyến mãi tại Hoàng Hà Mobile được rồi!
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="img">
                            <img src="https://cdn.hoanghamobile.com/i/idol/Uploads/2022/01/18/hhm00784.png" />
                        </div>

                        <div class="info">
                            <h3>NSƯT Quang Thắng</h3>
                            <h4>Nghệ sĩ, Diễn vi&#234;n h&#224;i</h4>
                            <div class="note">
                                Từ sau cơ hội hợp tác với Hoàng Hà Mobile là Quang Thắng có thêm địa chỉ để mua sắm đồ công nghệ rất hợp lý ở cả Hà Nội và Hải Phòng quê mình.
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="img">
                            <img src="https://cdn.hoanghamobile.com/i/idol/Uploads/2022/01/06/phuong-oanh-1.jpg" />
                        </div>

                        <div class="info">
                            <h3>Diễn vi&#234;n Phương Oanh</h3>
                            <h4>Diễn vi&#234;n truyền h&#236;nh/ Người mẫu </h4>
                            <div class="note">
                                Hoàng Hà Mobile là thương hiệu yêu thích của mình, luôn tin tưởng ghé qua mua hàng mỗi dịp iPhone ra sản phẩm mới.
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="img">
                            <img src="https://cdn.hoanghamobile.com/i/idol/Uploads/2021/12/24/anh-1.jpg" />
                        </div>

                        <div class="info">
                            <h3>Diễn vi&#234;n Quang Trung</h3>
                            <h4>Diễn vi&#234;n/Ca sĩ/ Nghệ sĩ được y&#234;u mến</h4>
                            <div class="note">
                                Không chỉ giá hời mà các bạn nhân viên ở Hoàng Hà vừa nhiệt tình, vừa dễ thương quá trời nên Trung đã "hốt" khá nhiều sản phẩm ở đây.
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="img">
                            <img src="https://cdn.hoanghamobile.com/i/idol/Uploads/2022/03/01/liz-kim-cuong.jpg" />
                        </div>

                        <div class="info">
                            <h3>Liz Kim Cương</h3>
                            <h4>Ca sĩ </h4>
                            <div class="note">
                                Là một Samfan Liz không thể bỏ lỡ cơ hội sở hữu sản phẩm S22 Ultra mới. Mình tin tưởng lựa chọn Hoàng Hà Mobile một trong những đại lý uỷ quyền chính hãng của Samsung để đặt hàng và nhận sản phẩm trong thời gian sớm nhất. 
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="img">
                            <img src="https://cdn.hoanghamobile.com/i/idol/Uploads/2021/12/24/anh-2-linh.jpg" />
                        </div>

                        <div class="info">
                            <h3>NSND Trung Anh</h3>
                            <h4>Diễn vi&#234;n truyền h&#236;nh</h4>
                            <div class="note">
                                Tôi biết Hoàng Hà qua 1 lần hợp tác quảng cáo, từ đó về sau là biết tới 1 thương hiệu giá cạnh tranh mà ngày càng phát triển, ngày càng nhiều chi nhánh.
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="img">
                            <img src="https://cdn.hoanghamobile.com/i/idol/Uploads/2021/11/26/canh-soai-ca.jpg" />
                        </div>

                        <div class="info">
                            <h3>Diễn vi&#234;n Do&#227;n Quốc Đam</h3>
                            <h4>Diễn vi&#234;n truyền h&#236;nh </h4>
                            <div class="note">
                                Mình biết tới Hoàng Hà nhờ 1 vài anh em trong nghề giới thiệu, từ đó là tốn kha khá "máu" đầu tư cho đồ công nghệ mới.
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="img">
                            <img src="https://cdn.hoanghamobile.com/i/idol/Uploads/2021/11/26/mc-mu-tat.jpg" />
                        </div>

                        <div class="info">
                            <h3>MC M&#249; Tạt </h3>
                            <h4>BTV/MC VTV, Diễn vi&#234;n</h4>
                            <div class="note">
                                Lần đầu tới mua iPhone 13 Pro Max thấy các bạn nhân viên Hoàng Hà rất thân thiện, giá thì quá tốt rồi. Chắc chắn mình sẽ quay lại mua những lần sau.
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="img">
                            <img src="https://cdn.hoanghamobile.com/i/idol/Uploads/2021/11/26/manh-hung.jpg" />
                        </div>

                        <div class="info">
                            <h3>Diễn vi&#234;n Mạnh Hưng </h3>
                            <h4>Diễn vi&#234;n truyền h&#236;nh </h4>
                            <div class="note">
                                Một địa chỉ đáng tin cậy cho nhu cầu mua các sản phẩm điện thoại, phụ kiện giá tốt của mình.
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="img">
                            <img src="https://cdn.hoanghamobile.com/i/idol/Uploads/2021/11/26/mc-huu-chi.jpg" />
                        </div>

                        <div class="info">
                            <h3>MC Hữu Tr&#237;</h3>
                            <h4>BTV/MC Trung t&#226;m tin tức VTV24</h4>
                            <div class="note">
                                Mình rất vui khi tìm được Hoàng Hà Mobile, chỗ vừa có hàng chính hãng, giá lại siêu hạt dẻ, bảo hành hậu mãi chăm sóc kỹ lưỡng, xứng đáng là một nơi cho các bạn cân nhắc.
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="img">
                            <img src="https://cdn.hoanghamobile.com/i/idol/Uploads/2021/11/26/vdv-anh-vie-n.jpg" />
                        </div>

                        <div class="info">
                            <h3>VĐV Nguyễn Thị &#193;nh Vi&#234;n</h3>
                            <h4>K&#236;nh ngư đội tuyển Bơi lội Việt Nam</h4>
                            <div class="note">
                                Trước giờ mình hay tới Hoàng Hà quận 11 mua, đợt rồi Hoàng Hà mới mở thêm quận 9 gần chỗ mình tập nên dễ đến ủng hộ hơn rồi.
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="img">
                            <img src="https://cdn.hoanghamobile.com/i/idol/Uploads/2022/01/06/a-qua-n-the-voice-1.jpg" />
                        </div>

                        <div class="info">
                            <h3>Ca sĩ L&#226;m Bảo Ngọc</h3>
                            <h4>Ca sĩ, &#225; Qu&#226;n The Voice 2019</h4>
                            <div class="note">
                                Tui nhắm chiếc Samsung Galaxy Z Fold 3 lâu rồi. Để tự thưởng cho bản thân sau một năm biến động đầy cố gắng, tui đã quyết định ghé qua Hoàng Hà Mobile trải nghiệm và mua sắm cho mình một em điện thoại mới.
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="img">
                            <img src="https://cdn.hoanghamobile.com/i/idol/Uploads/2022/03/01/vdv-nguyen-huy-hoang.jpg" />
                        </div>

                        <div class="info">
                            <h3>Nguyễn Huy Ho&#224;ng </h3>
                            <h4>Vận động vi&#234;n bơi lội</h4>
                            <div class="note">
                                Với một vận động viên thể thao, Hoàng luôn ưu tiên việc chăm sóc sức khoẻ bản thân. Lịch thi đấu dày đặc, nay Hoàng mới có dịp quay trở lại cửa hàng công nghệ yêu thích - Hoàng Hà Mobile chi nhánh quận 1, Tp.HCM để rinh về chiếc đồng hồ Garmin Fenix 7 phục vụ cho quá trình tập luyện và thi đấu thể thao.
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="img">
                            <img src="https://cdn.hoanghamobile.com/i/idol/Uploads/2021/12/16/anh-cua-linh.jpg" />
                        </div>

                        <div class="info">
                            <h3>VĐV Ch&#226;u Tuyết V&#226;n</h3>
                            <h4>VĐV Đội tuyển Teakwondo Việt Nam</h4>
                            <div class="note">
                                Vân thấy giá bán ở Hoàng Hà Mobile tốt hơn các bên khác khá nhiều, các sản phẩm cũng phong phú và đa dạng. Vân thường qua shop để mua đồng hồ thông minh luyện tập thể thao hoặc tablet.
                            </div>
                        </div>
                    </div>
            </div>
        </div>

    </div>
</section>






<section>
    <div class="container">
        <div class="corevalue">
                <div class="item">
                    <span class="icon">
                        <i class="icon-chinhhang"></i>
                    </span>
                    <div class="text">
                        <span>Sản phẩm</span>
                        <strong>CH&#205;NH H&#195;NG</strong>
                    </div>
                </div>
                <div class="item">
                    <span class="icon">
                        <i class="icon-freeship"></i>
                    </span>
                    <div class="text">
                        <span>Miễn ph&#237; vận chuyển</span>
                        <strong>TO&#192;N QUỐC</strong>
                    </div>
                </div>
                <div class="item">
                    <span class="icon">
                        <i class="icon-hotline"></i>
                    </span>
                    <div class="text">
                        <span>Hotline hỗ trợ</span>
                        <strong>1900.2091</strong>
                    </div>
                </div>
                <div class="item">
                    <span class="icon">
                        <i class="icon-doitra"></i>
                    </span>
                    <div class="text">
                        <span>Thủ tục đổi trả</span>
                        <strong>DỄ D&#192;NG</strong>
                    </div>
                </div>
        </div>
    </div>
</section>



<section>
    <div class="container">
        <div class="subscript">
            <div class="icon-text">
                <img src="/Content/web/img/sub-logo.png" />
                <div class="text">
                    <h4>Đăng ký nhận tin</h4>
                    <p>Đăng ký để nhận những chương trình khuyến mại hot nhất của Hoàng Hà Mobile</p>
                </div>
            </div>
            <div class="form">
                <form onsubmit="return submitSubscription(this);">
                    <input name="__RequestVerificationToken" type="hidden" value="PHT8p9Hl9WWJX1cR_AjXjrs0SbIcQ-ReINfscSpn5KMj1wkpJ68b4GuQokgrOnEB9KFXeL_avFTb_-E75oDVfZ2p5Pc1" />
                    <div class="input">
                        <input type="email" id="email" name="email" placeholder="Nhập E-mail của bạn" />
                    </div>
                    <button type="submit"><i class="icon-fly"></i></button>
                </form>
            </div>
        </div>
    </div>
</section>
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
    <!-- analytics -->
    <script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r; i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date(); a = s.createElement(o),
                m = s.getElementsByTagName(o)[0]; a.async = 1; a.src = g; m.parentNode.insertBefore(a, m)
        })(window, document, 'script', 'assets/js/analytics.js', 'ga');

        ga('create', 'UA-1415779-10', 'auto');
        ga('require', 'GTM-KXZQBMD');
        ga('require', 'GTM-WPLRWHK');
        ga('send', 'pageview');

    </script>
    <!-- analytics -->
    <!-- Google Tag Manager -->
    <script>
        (function (w, d, s, l, i) {
            w[l] = w[l] || []; w[l].push({
                'gtm.start':
                    new Date().getTime(), event: 'gtm.js'
            }); var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : ''; j.async = true; j.src =
                    'https://www.googletagmanager.com/gtm.js?id=' + i + dl; f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-5QM3X2');
    </script>
    <!-- End Google Tag Manager -->
    <!-- subiz -->
    <script>!function (s, u, b, i, z) { var o, t, r, y; s[i] || (s._sbzaccid = z, s[i] = function () { s[i].q.push(arguments) }, s[i].q = [], s[i]("setAccount", z), r = ["widget.subiz.net", "storage.googleapis" + (t = ".com"), "app.sbz.workers.dev", i + "a" + (o = function (k, t) { var n = t <= 6 ? 5 : o(k, t - 1) + o(k, t - 3); return k !== t ? n : n.toString(32) })(20, 20) + t, i + "b" + o(30, 30) + t, i + "c" + o(40, 40) + t], (y = function (k) { var t, n; s._subiz_init_2094850928430 || r[k] && (t = u.createElement(b), n = u.getElementsByTagName(b)[0], t.async = 1, t.src = "https://" + r[k] + "/sbz/app.js?accid=" + z, n.parentNode.insertBefore(t, n), setTimeout(y, 2e3, k + 1)) })(0)) }(window, document, "script", "subiz", "acqqrmpwwuqeianonpxt")</script>
    <!-- subiz -->
    <!-- accesstrade-->
    <script src="assets/js/tracking.min.js"></script>
    <script type="text/javascript">
        AT.init({ "campaign_id": 626, "is_reoccur": 1, "is_lastclick": 1 });
        AT.track();
    </script>
    <!-- accesstrade-->



        <script src="assets/js/main.js"></script>
    
    

    <script type="text/javascript">
        hh_home();
    </script>
        <script type="text/javascript">
        $(document).ready(function () {
            showSticker(82);
        });
    </script>


    <script type="text/javascript">
        function removeStick() {
            sessionStorage.setItem('stickRemove', 1);
            $('.footer-stick-right').hide();
        }

        $(document).ready(function () {
            if (sessionStorage.getItem('stickRemove')) {
                $('.footer-stick-right').hide();
            }
            else {
                $('.footer-stick-right').show();
            }
        });

    </script>

</body>
</html>