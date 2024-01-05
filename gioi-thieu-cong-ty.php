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
    <title>Giới Thiệu Về Công Ty</title>
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
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- Slick Slide -->
    <link rel="stylesheet" type="text/css" href="assets/slick/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="assets/slick/slick/slick-theme.css" />
    <!-- Bootstrap -->
    <!-- <link href="assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="assets/bootstrap/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="assets/bootstrap/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script> -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/fontawesome/css/all.min.css">

    <meta name="twitter:title" content="Giới Thiệu Về Hệ Thống Showroom TPMS" />
    <meta property="og:title" content="Giới Thiệu Về Hệ Thống Showroom TPMS" />
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
                        <a href="/dien-thoai-di-dong" target="_self">
                            <i class="icon icon-phone"></i>
                            <span>Điện thoại</span>
                        </a>
                        <div class="sub-container">
                            <div class="sub">

                                <div class="menu g1">
                                    <h4><a href="/dien-thoai-di-dong">H&#227;ng sản xuất</a></h4>
                                    <ul class="display-column format_3">
                                        <li><a href="/dien-thoai-di-dong/iphone">Apple</a></li>
                                        <li><a href="/dien-thoai-di-dong/samsung">Samsung</a></li>
                                        <li><a href="/dien-thoai-di-dong/xiaomi">Xiaomi</a></li>
                                        <li><a href="/dien-thoai-di-dong/oppo">OPPO</a></li>
                                        <li><a href="/dien-thoai-di-dong/tecno">TECNO</a></li>
                                        <li><a href="/dien-thoai-di-dong/honor">HONOR</a></li>
                                        <li><a href="/dien-thoai-di-dong/realme">realme</a></li>
                                        <li><a href="/dien-thoai-di-dong/vivo">Vivo</a></li>
                                        <li><a href="/dien-thoai-di-dong/nokia">Nokia</a></li>
                                        <li><a href="/dien-thoai-di-dong/htc">HTC</a></li>
                                        <li><a href="/dien-thoai-di-dong/infinix">Infinix</a></li>
                                        <li><a href="/dien-thoai-di-dong/asus-rog-phone">ROG</a></li>
                                        <li><a href="/dien-thoai-di-dong/nubia">Nubia</a></li>
                                        <li><a href="/dien-thoai-di-dong/xor">XOR</a></li>
                                        <li><a href="/dien-thoai-di-dong/masstel">Masstel</a></li>
                                        <li><a href="/dien-thoai-di-dong/tcl">TCL</a></li>
                                        <li><a href="/dien-thoai-di-dong/itel">Itel</a></li>
                                        <li><a href="/san-pham-sap-ra-mat-tin-don/dien-thoai">Mới - tin đồn</a></li>
                                    </ul>
                                    <h4><a href="/dien-thoai-cao-cap">Điện thoại cao cấp</a></h4>
                                    <ul class="display-row format_1">
                                    </ul>
                                    <h4><a href="/dien-thoai-gap">Điện Thoại Gập</a></h4>
                                    <ul class="display-row format_1">
                                    </ul>
                                </div>
                                <div class="menu g2">
                                    <h4><a href="/dien-thoai-duoi-1-trieu">Mức Giá</a></h4>
                                    <ul class="display-row format_2">
                                        <li><a href="/dien-thoai-di-dong?filters={%22price%22:%22T100t%22}&amp;search=true">Tr&#234;n 100 triệu</a></li>
                                                <li><a href="/dien-thoai-di-dong?=&amp;filters={&quot;sort&quot;:&quot;10&quot;,&quot;price&quot;:&quot;1t&quot;}">Dưới 1 triệu</a></li>
                                                <li><a href="/dien-thoai-di-dong?=&amp;filters={&quot;sort&quot;:&quot;10&quot;,&quot;price&quot;:&quot;2t-3t&quot;}">Từ 2 đến 3 triệu</a></li>
                                                <li><a href="/dien-thoai-di-dong?=&amp;filters={&quot;sort&quot;:&quot;10&quot;,&quot;price&quot;:&quot;3t-4t&quot;}">Từ 3 đến 4 triệu</a></li>
                                                <li><a href="/dien-thoai-di-dong?=&amp;filters={&quot;price&quot;:&quot;6t-8t&quot;}">Từ 6 đến 8 triệu</a></li>
                                                <li><a href="/dien-thoai-di-dong?=&amp;filters={&quot;price&quot;:&quot;15t-20t&quot;}">Từ 15 đến 20 triệu</a></li>
                                                <li><a href="/dien-thoai-di-dong?search=true&amp;filters={%22price%22:%2220t-100tr%22}&amp;search=true">Từ 20 đến 100 triệu</a></li>
                                        </ul>
                                </div>
                                    <div class="menu g3">
                                        <h4><a>Quan t&#226;m nhất</a></h4>
                                        <ul class="display-row format_2">
                                                <li><a href="/dien-thoai-di-dong?filters={&quot;sort&quot;:&quot;6&quot;}">H&#244;m nay</a></li>
                                                <li><a href="/dien-thoai-di-dong?filters={&quot;sort&quot;:&quot;7&quot;}">Tuần n&#224;y</a></li>
                                                <li><a href="/dien-thoai-di-dong?filters={&quot;sort&quot;:&quot;8&quot;}">Th&#225;ng n&#224;y</a></li>
                                                <li><a href="/dien-thoai-di-dong?filters={&quot;sort&quot;:&quot;10&quot;}">Năm nay</a></li>
                                        </ul>
                                </div>


                                    <div class="menu ads" style="width:600px">
                                    </div>
                            </div>
                        </div>
                    </li>
                    <li id="apple">
                        <a href="/apple" target="_self">
                            <i class="icon iconv2 iconv2-iphone"></i>
                            <span>Apple</span>
                        </a>
                    </li>
                    <li id="laptop">
                        <a href="/laptop" target="_self">
                            <i class="icon icon-laptop"></i>
                            <span>Laptop</span>
                        </a>
                            <div class="sub-container">
                                <div class="sub">

                                        <div class="menu g1">
                                            <h4><a href="/laptop">H&#227;ng sản xuất</a></h4>
                                            <ul class="display-column format_3">
                                                    <li><a href="/laptop/macbook">Apple</a></li>
                                                    <li><a href="/laptop/asus">ASUS</a></li>
                                                    <li><a href="/laptop/dell">Dell</a></li>
                                                    <li><a href="/laptop/hang-san-xuat/acer">Acer</a></li>
                                                    <li><a href="/laptop/msi">MSI</a></li>
                                                    <li><a href="/laptop/hang-san-xuat/lg">LG</a></li>
                                                    <li><a href="/laptop/huawei">HUAWEI</a></li>
                                                    <li><a href="/laptop/lenovo">Lenovo</a></li>
                                                    <li><a href="/laptop/hp">HP</a></li>
                                                    <li><a href="/laptop/gigabyte">GIGABYTE</a></li>
                                                    <li><a href="/laptop/itel">Itel</a></li>
                                                    <li><a href="/laptop/hang-san-xuat/xiaomi">Xiaomi</a></li>
                                                    <li><a href="/laptop/masstel">Masstel</a></li>
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
                                                    <li><a href="https://hoanghamobile.com/laptop?filters={%22price%22:%2220t-100tr%22}&amp;search=true">Tr&#234;n 20 triệu</a></li>
                                                    <li><a href="https://hoanghamobile.com/laptop?filters={%22price%22:%2212t-15t%22}&amp;search=true">Từ 12 đến 15 Triệu</a></li>
                                                    <li><a href="https://hoanghamobile.com/laptop?search=true&amp;filters={%22price%22:%2215t-20t%22}&amp;search=true">Từ 15 đến 20 triệu</a></li>
                                            </ul>
                                    </div>


                                        <div class="menu ads" style="width:600px">
                                                <a href="https://hoanghamobile.comhttps://hoanghamobile.com/Uploads/2023/11/15/580x266-z-01.png" target="_blank"><img style="width:600px" src="https://hoanghamobile.com/Uploads/2023/11/15/580x266-z-01.png" alt="Laptop HP 15S" /></a>
                                        </div>
                                </div>
                            </div>
                    </li>
                    <li id="tablet">
                        <a href="/tablet" target="_self">
                            <i class="icon icon-tablet"></i>
                            <span>Tablet</span>
                        </a>
                            <div class="sub-container">
                                <div class="sub">

                                        <div class="menu g2">
                                            <h4><a href="/tablet">H&#227;ng sản xuất</a></h4>
                                            <ul class="display-column format_3">
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
                                            <h4><a href="/man-hinh">H&#227;ng sản xuất</a></h4>
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
                                            <h4><a href="/smart-tv">H&#227;ng sản xuất</a></h4>
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
                                            <h4><a href="/phu-kien/ban-phim-chuot-gaming-gear">B&#224;n ph&#237;m, Chuột &amp; Gaming Gear</a></h4>
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
                                                    <li><a href="/kho-san-pham-cu?=&amp;filters={&quot;type&quot;:&quot;1&quot;}">Điện thoại di động</a></li>
                                                    <li><a href="/kho-san-pham-cu?filters={&quot;type&quot;:&quot;5&quot;}">Đồng hồ th&#244;ng minh</a></li>
                                                    <li><a href="/kho-san-pham-cu?&amp;filters={&quot;type&quot;:&quot;2&quot;}">M&#225;y t&#237;nh bảng</a></li>
                                                    <li><a href="/kho-san-pham-cu?=&amp;filters={&quot;type&quot;:&quot;3&quot;}">Laptop</a></li>
                                                    <li><a href="/kho-san-pham-cu?=&amp;filters={&quot;type&quot;:&quot;7&quot;}">Loa</a></li>
                                                    <li><a href="/kho-san-pham-cu?=&amp;filters={&quot;type&quot;:&quot;13&quot;}">Tai nghe</a></li>
                                                    <li><a href="/kho-san-pham-cu?=&amp;filters={&quot;type&quot;:&quot;26&quot;}">Camera</a></li>
                                                    <li><a href="/kho-san-pham-cu?=&amp;filters={&quot;type&quot;:&quot;10&quot;}">Củ sạc</a></li>
                                                    <li><a href="/kho-san-pham-cu?=&amp;filters={&quot;type&quot;:&quot;11&quot;}">D&#226;y c&#225;p</a></li>
                                                    <li><a href="/kho-san-pham-cu?=&amp;filters={&quot;type&quot;:&quot;28&quot;}">M&#225;y lọc kh&#244;ng kh&#237;</a></li>
                                                    <li><a href="/kho-san-pham-cu?=&amp;filters={&quot;type&quot;:&quot;18&quot;}">Phụ kiện</a></li>
                                                    <li><a href="/kho-san-pham-cu?=&amp;filters={&quot;type&quot;:&quot;25&quot;}">Sạc dự ph&#242;ng</a></li>
                                                    <li><a href="/kho-san-pham-cu?=&amp;filters={&quot;type&quot;:&quot;30&quot;}">Tay cầm chống rung</a></li>
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
                                                    <li><a href="/tin-khuyen-mai/uu-dai-hot/khuyen-mai-jbl-harman-kardon">&#226;m thanh - JBL &amp; Harman</a></li>
                                                    <li><a href="/tin-khuyen-mai/uu-dai-hot/combo-uu-dai">Combo ưu đ&#227;i</a></li>
                                                    <li><a href="/tin-khuyen-mai/uu-dai-hot/combo-uu-dai-samsung">Combo ưu đ&#227;i samsung</a></li>
                                                    <li><a href="/tin-khuyen-mai/uu-dai-hot/tcl">Hot Sale TCL</a></li>
                                                    <li><a href="/tin-khuyen-mai/uu-dai-hot/khuyen-mai-Apple">Khuyến mại Apple</a></li>
                                                    <li><a href="/tin-khuyen-mai/uu-dai-hot/samsung-xiaomi-hot">KM Samsung  + Xiaomi</a></li>
                                                    <li><a href="/tin-khuyen-mai/uu-dai-hot/laptop-man-hinh-hp">Laptop &amp; M&#224;n h&#236;nh HP</a></li>
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

    <section>
        <div class="container">
            <ol class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <a itemprop="item" href="index.php"><span itemprop="name" content="Trang chủ"><i class="icon-home" title="Trang chủ"></i> Trang chủ</span></a>
                    <meta itemprop="position" content="1" />
                </li>
                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <a itemprop="item" href="gioi-thieu-cong-ty.php" title="Giới Thiệu Về Hệ Thống Showroom TPMS" class="actived"><span itemprop="name" content="Giới thiệu c&#244;ng ty">Giới Thiệu Công Ty</span></a>
                    <meta itemprop="position" content="2" />
                </li>
            </ol>
        </div>
    </section>

    <section>
        <div class="container page-text">
            <div class="container">
                <p dir="ltr" class="gt-p2"><span class="gt-span3">Giới Thiệu Hệ Thống Show Room</span></p>
                <p dir="ltr" class="gt-p"><span class="gt-span">Giới thiệu chung</span></p>
                <p dir="ltr" class="gt-p">
                    <span class="gt-span1">Công ty Cổ phần Xây dựng và Đầu tư thương mại Huy Dậu sở hữu chuỗi cửa hàng TPMS - là nhà bán lẻ hàng đầu, chuyên cung cấp các sản phẩm công nghệ chính hãng tại thị trường Việt Nam. Năm 2019, TPMS được thành lập, từng bước trở thành địa chỉ đáng tin cậy của người tiêu dùng Việt. Với khẩu hiệu “</span>
                    <span class="gt-span1" class="gt-span4">Nếu những gì chúng tôi không có, nghĩa là bạn không cần</span>
                    <span class="gt-span1">”, chúng tôi đã, đang và sẽ tiếp tục nỗ lực đem đến các sản phẩm công nghệ chính hãng đa dạng, phong phú đi kèm mức giá tốt nhất phục vụ nhu cầu của quý khách hàng.</span>
                </p>
                <p dir="ltr" class="gt-p">
                    <span class="gt-span1">Sau hơn 4 năm phát triển, TPMS đã trở thành cái tên không còn xa lạ với người tiêu dùng trong nước. Hiện nay chúng tôi đang sở hữu mạng lưới hơn 3 chi nhánh phủ trên khắp cả nước, trong đó bao gồm hai trung tâm bảo hành tại Hà Nội và một trung tâm bảo hành tại thành phố Hồ Chí Minh. Đến với chuỗi cửa hàng của TPMS, quý khách có thể hoàn toàn yên tâm về uy tín, chất lượng sản phẩm với mức giá rẻ hơn khoảng 15-20% so với giá bán trên thị trường. Song song với đó, chúng tôi cũng luôn nỗ lực phục vụ đem đến trải nghiệm dịch vụ tốt nhất cho khách hàng.
                    </span>
                </p>
                <p dir="ltr" class="gt-p">
                    <span class="gt-span">Những dấu mốc quan trọng
                    </span>
                </p>
                <ul style="margin-top:0;margin-bottom:0;">
                    <li dir="ltr" class="gt-li"><p dir="ltr" class="gt-p1" role="presentation"><span class="gt-span2">Năm 2019</span><span class="gt-span1">: Thành lập cửa hàng TPMS đầu tiên tọa lạc trên con phố sầm uất của Thủ đô Hà Nội.</span></p></li>
                    <li dir="ltr" class="gt-li1"><p dir="ltr" class="gt-p1" role="presentation"><span class="gt-span2">Năm 2020</span><span class="gt-span1">: TPMS chính thức trở thành nhà phân phối ĐTDĐ chính hãng hợp tác với nhiều nhãn hàng lớn hàng đầu như Samsung, OPPO, Nokia, Huawei,...</span></p></li>
                    <li dir="ltr" class="gt-li"><p dir="ltr" class="gt-p1" role="presentation"><span class="gt-span2">Năm 2021</span><span class="gt-span1">: Với kinh nghiệm hơn 4 năm trong lĩnh vực bán lẻ, TPMS phát triển mạnh mẽ và liên tục mở thêm nhiều chi nhánh mới.</span></p></li>
                    <li dir="ltr" class="gt-li"><p dir="ltr" class="gt-p1" role="presentation"><span class="gt-span2">Năm 2022</span><span class="gt-span1">: Kỉ niệm 3 năm hoạt động trong lĩnh vực bán lẻ các sản phẩm công nghệ, TPMS đã khẳng định được chỗ đứng vững chắc trên thị trường cũng như trong tiềm thức người tiêu dùng.</span></p></li>
                    <li dir="ltr" class="gt-li1"><p dir="ltr" class="gt-p1" role="presentation"><span class="gt-span2">Năm 2022</span><span class="gt-span1">: TPMS chính thức hợp tác với ông lớn ngành viễn thông MobiFone Việt Nam mở chuỗi chi nhánh bán hàng liên kết, nâng tổng số chi nhánh tới hơn 60, đồng thời phủ khắp 30 tỉnh thành trên cả nước. Kể từ đó, TPMS liên tục đồng hành cùng MobiFone tổ chức các sự kiện lớn nhỏ.</span></p></li>
                    <li dir="ltr" class="gt-li1"><p dir="ltr" class="gt-p" role="presentation"><span class="gt-span2">Năm 2023</span><span class="gt-span1">: TPMS tự hào trở thành nhà bán lẻ ủy quyền chính thức của Apple tại Việt Nam. Các sản phẩm Apple chính hãng VN/A do Apple Việt Nam phân phối được bán tại hệ thống TPMS với mức giá tốt nhất thị trường cùng chế độ bảo hành uy tín.</span></p></li>
                </ul>
                <p dir="ltr" class="gt-p">
                    <span class="gt-span">Tôn chỉ hoạt động</span></p><p dir="ltr" class="gt-p">
                    <span class="gt-span1">TPMS luôn hoạt động dựa trên tôn chỉ đặt khách hàng là trung tâm, mọi nỗ lực để đạt được mục tiêu cao nhất là làm hài lòng người dùng thông qua các sản phẩm được cung cấp và dịch vụ khách hàng. TPMS đang từng bước xây dựng dịch vụ khách hàng vượt trội, xứng đáng là đơn vị bán lẻ hàng đầu tại Việt Nam. Sự tin tưởng và ủng hộ nhiệt tình của quý khách hàng tại chuỗi chi nhánh đã phần nào khẳng định hiệu quả hoạt động của đội ngũ nhân viên TPMS.</span></p><p dir="ltr" class="gt-p">
                    <span class="gt-span1">Đối với quý khách hàng, chúng tôi luôn đặt cái tâm làm gốc, làm việc với tinh thần nghiêm túc, trung thực và có trách nhiệm, để mang tới trải nghiệm dịch vụ tốt nhất.</span></p><p dir="ltr" class="gt-p">
                    <span class="gt-span1">Đối với đồng nghiệp, chúng tôi đề cao văn hóa học hỏi, đoàn kết, tương trợ lẫn nhau tạo nên môi trường làm việc tôn trọng - công bằng - văn minh cho nhân viên trong công ty.</span>
                </p>
                <p dir="ltr" class="gt-p">
                    <span class="gt-span1">Đối với các đối tác, TPMS luôn làm việc dựa trên nguyên tắc tôn trọng, cùng tạo ra giá trị cho cộng đồng và cùng phát triển bền vững.</span>
                </p>
                <p dir="ltr" class="gt-p">
                    <span class="gt-span">Tầm nhìn và sứ mệnh</span>
                </p>
                <p dir="ltr" class="gt-p">
                    <span class="gt-span1">Những năm qua, chúng tôi không ngừng cải thiện dịch vụ tại các chi nhánh và hỗ trợ khách hàng qua các kênh online. TPMS cam kết mang đến những sản phẩm chất lượng và chế độ bảo hành uy tín, sẵn sàng hỗ trợ khách hàng trong thời gian nhanh nhất.</span>
                </p>
                <p dir="ltr" class="gt-p">
                    <span class="gt-span1">Trong tương lai, TPMS sẽ tiếp tục mở rộng hệ thống chi nhánh, hướng tới mục tiêu có mặt tại 63 tỉnh thành trên toàn quốc. Đồng thời, nâng cao chất lượng dịch vụ, hạn chế những rủi ro, lắng nghe và tiếp thu góp ý của quý khách hàng nhằm đem đến trải nghiệm tốt nhất khi mua sắm tại TPMS.</span>
                </p>
                <p dir="ltr" class="gt-p">
                    <span style="background-color: transparent; color: rgb(0, 0, 0); font-family: Arial; font-size: 10pt; white-space: pre-wrap;">Cuối cùng, TPMS hy vọng sẽ trở thành nhà tiên phong đưa những sản phẩm công nghệ mới nhất đến tay người dùng sớm nhất, tạo ra cuộc sống hiện đại nơi công nghệ kết nối con người, công nghệ phục vụ con người</span><br>
                </p>
            </div>
                    
        </div>
    </section>
    <footer>
        <div class="container">
            <div class="bg">
                <div class="col-content">
                        <div class="link-content">
                        <h4><a>Hỗ Trợ - Dịch Vụ</a></h4>
                        <ul>
                            <li><a href="mua-tra-gop.php">Chính Sách Và Hướng Dẫn Mua Hàng Trả Góp</a></li>
                            <li><a href="huong-dan-dat-hang.php">Hướng Dẫn Mua Hàng Và Chính Sách Vận Chuyển</a></li>
                            <li><a href="/order/check">Tra Cứu Đơn Hàng</a></li>
                            <li><a href="chinh-sach-bao-hanh.php">Chính Sách Đổi Mới Và Bảo Hành</a></li>
                            <li><a href="/dat-hang/bao-hanh-mo-rong">Dịch Vụ Bảo Hành Mở Rộng</a></li>
                            <li><a href="chinh-sach-bao-mat.php">Chính Sách Bảo Mật</a></li>
                            <li><a href="chinh-sach-giai-quyet-khieu-nai.php">Chính Sách Giải Quyết Khiếu Nại</a></li>
                            <li><a href="dieu-khoan-mua-ban-hang-hoa.php">Quy Chế Hoạt Động</a></li>
                        </ul>
                    </div>
                        <div class="link-content">
                        <h4><a>Th&#244;ng Tin Li&#234;n Hệ</a></h4>
                        <ul>
                            <li><a href="mua-hang-online.php">Thông Tin Các Trang TMDT</a></li>
                            <li><a href="/tin-tuc/hoang-ha-care-dich-vu-sua-chua-dien-thoai-may-tinh-bang-voi-gia-tot-nhat-thi-truong">Dịch Vụ Sửa Chữa TPMS Care</a></li>
                            <li><a href="hop-tac-kinh-doanh.php">Khách Hàng Doanh Nghiệp B2B</a></li>
                            <li><a href="/trung-tam-bao-hanh">Tra Cứu Bảo Hành</a></li>
                        </ul>
                    </div>
                        <div class="link-content">
                        <h4><a href="/he-thong-cua-hang">Hệ Thống Showroom Toàn Quốc</a></h4>
                        <ul>
                            <li><a href="/he-thong-cua-hang">Danh Sách Showroom</a></li>
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
        })(window, document, 'script', 'dataLayer', 'GTM-5QM3X2');</script>
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