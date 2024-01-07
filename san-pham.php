<?php
require_once("config/config.php");
include 'handle.php';

?>
<!doctype html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="author" content="hoanghamobile.com">
    <meta property='og:site_name' content='hoanghamobile.com' />
    <title>TPMS - SẢN PHẨM</title>
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
    <script async src="assets/js/ins.js"></script>
</head>

<body>

    <header>
        <div class="top-navigation">
            <div class="container">
                <ul>
                    <li><a href="gioi-thieu-cong-ty.php">Giới Thiệu</a></li>
                    <li><a href="trung-tam-bao-hanh.php">Trung Tâm Bảo Hành</a></li>
                    <li><a href="he-thong-cua-hang.php">Hệ Thống Showroom</a></li>
                    <li><a href="bang-dieu-khien.php?page=order">Tra Cứu Đơn Hàng</a></li>
                    <?php
                        if (isset($_SESSION['userId'])) {
                            $infoUser = getInfoUser($conn,$_SESSION['userId']);
                            ?>
                                <li class="member">
                                    <i class="icon-account"></i> <a class="account" href="/Account"><strong><?=$infoUser['name']?></strong></a>
                                    <div class="sub">
                                        <ul>
                                            <li><a href="bang-dieu-khien.php?page=index"><i class="icon-controls"></i><span>Bảng điều khiển</span></a></li>
                                            <li><a href="bang-dieu-khien.php?page=info"><i class="icon-account"></i><span>Thông tin tài khoản</span></a></li>
                                            <li><a href="bang-dieu-khien.php?page=order"><i class="icon-order-mgr"></i><span>Đơn hàng của bạn</span></a></li>
                                            <li><a href="bang-dieu-khien.php?page=wishlist"><i class="icon-love"></i><span>Sản phẩm yêu thích</span></a></li>
                                            <li><a href="bang-dieu-khien.php?page=comment"><i class="icon-comment"></i><span>Quản lý bình luận</span></a></li>
                                            <li><a href="dang-xuat.php"><i class="icon-logout"></i><span>Đăng xuất</span></a></li>
                                        </ul>
                                    </div>
                                </li>
                            <?php
                        }else{ ?><li><a id="login-modal" href="dang-nhap.php">Đăng nhập</a></li><?php } ?>
                </ul>
            </div>
        </div>


        <!-- logo and search box -->
        <div class="heading">
            <div class="container">
                <div class="logo">
                    <a href="/" title="C&#212;NG TY CỔ PHẦN X&#194;Y DỰNG VÀ ĐẦU TƯ THƯƠNG MẠI HOÀNG HÀ">
                        <img src="/Content/web/img/logo-text.png" alt="C&#212;NG TY CỔ PHẦN X&#194;Y DỰNG VÀ ĐẦU TƯ THƯƠNG MẠI HOÀNG HÀ">
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
                        <a href="gio-hang.php">
                            <i class="icon-cart"></i>
                            <label><i class="icon-left">
                                </i><span id="cart-total">
                                    <?php
                                        $quantity = 0;
                                        if (!empty($_SESSION["cart"])) {
                                            $sqlProd = mysqli_query($conn, "SELECT * FROM tbl_versions WHERE idVersion IN (" . implode(",", array_keys($_SESSION['cart'])) . ") ");
                                            while(mysqli_fetch_array($sqlProd)){
                                                $quantity ++;
                                            }
                                            echo "$quantity";
                                        }else{
                                            echo $quantity;
                                        }
                                    ?>
                                </span>
                            </label>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- nav -->
        <nav>
            <div class="container">
                <ul class="root">
                    <li id="dien-thoai-di-dong">
                        <a href="san-pham.php?idCat=1" target="_self"><i class="icon icon-phone"></i><span>Điện thoại</span></a>
                        <div class="sub-container">
                            <div class="sub">
                                <div class="menu g1">
                                    <h4><a href="san-pham.php?idCat=1">Hãng Sảnn Xuất</a></h4>
                                    <ul class="display-column format_3">
                                        <?php
                                        while ($itemBrand1 = mysqli_fetch_assoc($sqlBrand1)) {
                                        ?>
                                            <li><a href="san-pham.php?idCat=1&idBrand=<?= $itemBrand1['id'] ?>"><?= str_replace(' - ĐIỆN THOẠI', "", $itemBrand1['brandName']) ?></a></li>
                                        <?php
                                        }
                                        ?>
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
                                <div class="menu ads" style="width:600px">
                                    <?php if (getImageCategory($conn, 1) != "") {
                                        echo "";
                                    } else { ?><a href="" target="_blank"><img style="width:600px" src="admin/assets/images/category/<?= getImageCategory($conn, 1) ?>" alt=""></a><?php } ?>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li id="apple"> <a href="san-pham.php?idCat=1&idBrand=1" target="_self"> <i class="icon iconv2 iconv2-iphone"></i><span>Apple</span></a></li>
                    <li id="laptop">
                        <a href="san-pham.php?idCat=2" target="_self"><i class="icon icon-laptop"></i><span>Laptop</span></a>
                        <div class="sub-container">
                            <div class="sub">
                                <div class="menu g1">
                                    <h4><a href="san-pham.php?idCat=2">Hãng Sản Xuất</a></h4>
                                    <ul class="display-column format_3">
                                        <?php
                                        $sqlBran = mysqli_query($conn, getBrand($conn, 2));
                                        while ($itemBrand = mysqli_fetch_assoc($sqlBran)) {
                                        ?>
                                            <li><a href="san-pham.php?idCat=2&idBrand=<?= $itemBrand['id'] ?>"><?= str_replace(" - LAPTOP", "", $itemBrand['brandName']) ?></a></li>
                                        <?php
                                        }
                                        ?>
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
                                <div class="menu ads" style="width:600px"> <?php if (getImageCategory($conn, 2) == '') { ?> <?php } else { ?><a href="" target="_blank"><img style="width:600px" src="admin/assets/images/category/<?= getImageCategory($conn, 2) ?>"></a><?php } ?> </div>
                            </div>
                        </div>
                    </li>
                    <li id="tablet">
                        <a href="san-pham.php?idCat=3" target="_self"><i class="icon icon-tablet"></i><span>Tablet</span></a>
                        <div class="sub-container">
                            <div class="sub">
                                <div class="menu g2">
                                    <h4><a href="san-pham.php?idCat=3">Hãng Sản Xuất</a></h4>
                                    <ul class="display-column format_3">
                                        <?php
                                        $sqlBrand = mysqli_query($conn, getBrand($conn, 3));
                                        while ($itemBrand = mysqli_fetch_assoc($sqlBrand)) {
                                        ?>
                                            <li><a href="san-pham.php?idCat=3&idBrand=<?= $itemBrand['id'] ?>"><?= str_replace(" - TABLET", "", $itemBrand['brandName']) ?></a></li>
                                        <?php
                                        }
                                        ?>
                                    </ul>
                                </div>
                                <div class="menu ads" style="width:600px"> <?php if (getImageCategory($conn, 3) == '') { ?> <?php } else { ?><a href="" target="_blank"><img style="width:600px" src="admin/assets/images/category/<?= getImageCategory($conn, 3) ?>"></a><?php } ?> </div>
                            </div>
                        </div>
                    </li>
                    <li id="man-hinh">
                        <a href="san-pham.php?idCat=4" target="_self"><i class="icon icon-monitor"></i><span>Màn hình</span></a>
                        <div class="sub-container">
                            <div class="sub">
                                <div class="menu g0">
                                    <h4><a href="san-pham.php?idCat=4">Hãng Sản Xuất</a></h4>
                                    <ul class="display-column format_2">
                                        <?php
                                        $sqlBrand = mysqli_query($conn, getBrand($conn, 4));
                                        while ($itemBrand = mysqli_fetch_assoc($sqlBrand)) {
                                        ?>
                                            <li><a href="san-pham.php?idCat=4&idBrand=<?= $itemBrand['id'] ?>"><?= str_replace(" - MÀN HÌNH", "", $itemBrand['brandName']) ?></a></li>
                                        <?php
                                        }
                                        ?>
                                    </ul>
                                </div>
                                <div class="menu g3">
                                    <h4><a href="">Phụ kiện màn hình</a></h4>
                                    <ul class="display-row format_1">
                                    </ul>
                                </div>
                                <div class="menu ads" style="width:600px"> <?php if (getImageCategory($conn, 4) == '') { ?> <?php } else { ?><a href="" target="_blank"><img style="width:600px" src="admin/assets/images/category/<?= getImageCategory($conn, 4) ?>"></a><?php } ?> </div>
                            </div>
                        </div>
                    </li>
                    <li id="smart-tv">
                        <a href="san-pham.php?idCat=5" target="_self"><i class="icon icon-tivi"></i><span>Smart TV</span> </a>
                        <div class="sub-container">
                            <div class="sub">
                                <div class="menu g1">
                                    <h4><a href="san-pham.php?idCat=5">Hãng Sản Xuất</a></h4>
                                    <ul class="display-column format_1">
                                        <?php
                                        $sqlBrand = mysqli_query($conn, getBrand($conn, 5));
                                        while ($itemBrand = mysqli_fetch_assoc($sqlBrand)) {
                                        ?>
                                            <li><a href="san-pham.php?idCat=5&idBrand=<?= $itemBrand['id'] ?>"><?= $itemBrand['brandName'] ?></a></li>
                                        <?php
                                        }
                                        ?>
                                    </ul>
                                    <h4><a href="/phu-kien/phu-kien-smart-tv">Phụ kiện TV</a></h4>
                                    <ul class="display-column format_1">
                                    </ul>
                                </div>
                                <div class="menu ads" style="width:600px"> <?php if (getImageCategory($conn, 5) == '') { ?> <?php } else { ?><a href="" target="_blank"><img style="width:600px" src="admin/assets/images/category/<?= getImageCategory($conn, 5) ?>"></a><?php } ?> </div>
                            </div>
                        </div>
                    </li>
                    <li id="dong-ho">
                        <a href="san-pham.php?idCat=6" target="_self"><i class="icon icon-watch"></i><span>Đồng hồ</span> </a>
                        <div class="sub-container">
                            <div class="sub">
                                <div class="menu g0">
                                    <h4><a>Đồng hồ</a></h4>
                                    <ul class="display-column format_4">
                                        <?php
                                        $sqlBrand = mysqli_query($conn, getBrand($conn, 6));
                                        while ($itemBrand = mysqli_fetch_assoc($sqlBrand)) {
                                        ?>
                                            <li><a href="san-pham.php?idCat=6&idBrand=<?= $itemBrand['id'] ?>"><?= str_replace("- ĐỒNG HỒ", "", $itemBrand['brandName']) ?></a></li>
                                        <?php
                                        }
                                        ?>
                                    </ul>
                                </div>
                                <div class="menu ads" style="width:600px"> <?php if (getImageCategory($conn, 6) == '') { ?> <?php } else { ?><a href="" target="_blank"><img style="width:600px" src="admin/assets/images/category/<?= getImageCategory($conn, 6) ?>"></a><?php } ?> </div>
                            </div>
                        </div>
                    </li>
                    <li id="loa-tai-nghe">
                        <a href="san-pham.php?idCat=7" target="_self"><i class="icon icon-headphone"></i><span>Âm thanh</span></a>
                        <div class="sub-container">
                            <div class="sub">
                                <div class="menu g0">
                                    <h4><a href="san-pham.php?idCat=7">THƯƠNG HIỆU</a></h4>
                                    <ul class="display-column format_2">
                                        <?php
                                        $sqlBrand = mysqli_query($conn, getBrand($conn, 7));
                                        while ($itemBrand = mysqli_fetch_assoc($sqlBrand)) {
                                        ?>
                                            <li><a href="san-pham.php?idCat=7&idBrand=<?= $itemBrand['id'] ?>"><?= str_replace("- ÂM THANH", "", $itemBrand['brandName']) ?></a></li>
                                        <?php
                                        }
                                        ?>
                                    </ul>
                                </div>
                                <div class="menu ads" style="width:600px"> <?php if (getImageCategory($conn, 7) == '') { ?> <?php } else { ?><a href="" target="_blank"><img style="width:600px" src="admin/assets/images/category/<?= getImageCategory($conn, 7) ?>"></a><?php } ?> </div>
                            </div>
                        </div>
                    </li>
                    <li id="smart-home">
                        <a href="san-pham.php?idCat=8" target="_self"><i class="icon icon-home"></i><span>Smart Home</span></a>
                        <div class="sub-container">
                            <div class="sub">
                                <div class="menu g4">
                                    <h4><a href="san-pham.php?idCat=8">Gia dụng thông minh</a></h4>
                                    <ul class="display-row format_2">
                                        <?php
                                        $sqlBrand = mysqli_query($conn, getBrand($conn, 8));
                                        while ($itemBrand = mysqli_fetch_assoc($sqlBrand)) {
                                        ?>
                                            <li><a href="san-pham.php?idCat=8&idBrand=<?= $itemBrand['id'] ?>"><?= $itemBrand['brandName'] ?></a></li>
                                        <?php
                                        }
                                        ?>
                                    </ul>
                                </div>
                                <div class="menu ads" style="width:600px"> <?php if (getImageCategory($conn, 8) == '') { ?> <?php } else { ?><a href="" target="_blank"><img style="width:600px" src="admin/assets/images/category/<?= getImageCategory($conn, 8) ?>"></a><?php } ?> </div>
                            </div>
                        </div>
                    </li>
                    <li id="phu-kien">
                        <a href="san-pham.php?idCat=16" target="_self"><i class="icon icon-sac"></i><span>Phụ kiện</span></a>
                        <div class="sub-container">
                            <div class="sub">
                                <div class="menu g0">
                                    <h4><a href="san-pham.php?idCat=16">Phụ kiện</a></h4>
                                    <ul class="display-column format_1">
                                        <?php
                                        $sqlBrand = mysqli_query($conn, getBrand($conn, 16));
                                        while ($itemBrand = mysqli_fetch_assoc($sqlBrand)) {
                                        ?>
                                            <li><a href="san-pham.php?idCat=16&idBrand=<?= $itemBrand['id'] ?>"><?= $itemBrand['brandName'] ?></a></li>
                                        <?php
                                        }
                                        ?>
                                    </ul>
                                </div>
                                <div class="menu ads" style="width:600px"> <?php if (getImageCategory($conn, 16) == '') { ?> <?php } else { ?><a href="" target="_blank"><img style="width:600px" src="admin/assets/images/category/<?= getImageCategory($conn, 16) ?>"></a><?php } ?> </div>
                            </div>
                        </div>
                    </li>
                    <li id="do-choi-cong-nghe">
                        <a href="san-pham.php?idCat=17" target="_self"><i class="icon icon-game"></i><span>Đồ chơi CN</span></a>
                        <div class="sub-container">
                            <div class="sub">
                                <div class="menu g0">
                                    <h4><a>Đồ chơi công nghệ</a></h4>
                                    <ul class="display-row format_1">
                                        <?php
                                        $sqlBrand = mysqli_query($conn, getBrand($conn, 17));
                                        while ($itemBrand = mysqli_fetch_assoc($sqlBrand)) {
                                        ?>
                                            <li><a href="san-pham.php?idCat=17&idBrand=<?= $itemBrand['id'] ?>"><?= $itemBrand['brandName'] ?></a></li>
                                        <?php
                                        }
                                        ?>
                                    </ul>
                                </div>
                                <div class="menu ads" style="width:600px"> <?php if (getImageCategory($conn, 17) == '') { ?> <?php } else { ?><a href="" target="_blank"><img style="width:600px" src="admin/assets/images/category/<?= getImageCategory($conn, 17) ?>"></a><?php } ?> </div>
                            </div>
                        </div>
                    </li>
                    <li id="kho-san-pham-cu">
                        <a href="san-pham.php?idCat=18" target="_self"><i class="icon icon-maycu"></i><span>Máy trôi</span></a>
                        <div class="sub-container">
                            <div class="sub">
                                <div class="menu g0">
                                    <h4><a>Hàng cũ giá rẻ</a></h4>
                                    <ul class="display-column format_3">
                                        <?php
                                        $sqlBrand = mysqli_query($conn, getBrand($conn, 18));
                                        while ($itemBrand = mysqli_fetch_assoc($sqlBrand)) {
                                        ?>
                                            <li><a href="san-pham.php?idCat=18&idBrand=<?= $itemBrand['id'] ?>"><?= str_replace(" - MÁY TRÔI", "", $itemBrand['brandName']) ?></a></li>
                                        <?php
                                        }
                                        ?>
                                    </ul>
                                </div>
                                <div class="menu ads" style="width:600px"> <?php if (getImageCategory($conn, 18) == '') { ?> <?php } else { ?><a href="" target="_blank"><img style="width:600px" src="admin/assets/images/category/<?= getImageCategory($conn, 18) ?>"></a><?php } ?> </div>
                            </div>
                        </div>
                    </li>
                    <li id="dich-vu-sua-chua">
                        <a href="san-pham.php?idCat=19" target="_self"><i class="icon icon-suachua"></i><span>Sửa chữa</span></a>
                        <div class="sub-container">
                            <div class="sub">
                                <div class="menu g0">
                                    <h4><a>Dịch vụ sửa chữa</a></h4>
                                    <ul>
                                        <?php
                                        $sqlBrand = mysqli_query($conn, getBrand($conn, 19));
                                        while ($itemBrand = mysqli_fetch_assoc($sqlBrand)) {
                                        ?>
                                            <li><a href="san-pham.php?idCat=19&idBrand=<?= $itemBrand['id'] ?>"><?= $itemBrand['brandName'] ?></a></li>
                                        <?php
                                        }
                                        ?>
                                    </ul>
                                </div>
                                <div class="menu ads" style="width:600px"> <?php if (getImageCategory($conn, 19) == '') { ?> <?php } else { ?><a href="" target="_blank"><img style="width:600px" src="admin/assets/images/category/<?= getImageCategory($conn, 19) ?>"></a><?php } ?> </div>
                            </div>
                        </div>
                    </li>
                    <li id="dich-vu">
                        <a href="san-pham.php?idCat=20" target="_self"><i class="icon icon-simthe"></i><span>Dịch Vụ</span></a>
                        <div class="sub-container">
                            <div class="sub">
                                <?php
                                $sqlBrand = mysqli_query($conn, getBrand($conn, 20));
                                while ($itemBrand = mysqli_fetch_assoc($sqlBrand)) {
                                ?>
                                    <div class="menu g1">
                                        <h4><a href="san-pham.php?idCat=20&idBrand=<?= $itemBrand['id'] ?>"><?= $itemBrand['brandName'] ?></a></h4>
                                        <ul class="display-row format_1">
                                        </ul>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </li>
                    <li id="tin-tuc"> <a href="tin-tuc.php" target="_self"><i class="icon icon-news"></i><span>Tin hot</span></a></li>
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
                                        <li><a href="/tin-khuyen-mai/uu-dai-hot/laptop-man-hinh-hp">Laptop Màn hình HP</a></li>
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











    <!-- slider -->
    <section>
        <div class="container">
            <div class="top-slider">
                <div id="jssor_1" class="jssor-1200" style="width:1200px; height:200px; padding-bottom:10px;">
                    <!-- Loading Screen -->
                    <div data-u="loading" class="jssor-spin">
                        <img src="/Content/web/img/spin.svg" />
                    </div>
                    <div data-u="slides" class="jssor-1200-container" style="width:1200px; height:200px;">
                        <div>
                            <a target="_blank" href="https://hoanghamobile.com/dien-thoai-di-dong/infinix-hot-30-8gb-256gb-chinh-hang?source=Chuyenmuc" title="Infinix HOT 30"><img data-u="image" data-src2="https://cdn.hoanghamobile.com/i/home/Uploads/2023/12/13/1200x200-hot30-131223.jpg" title="Infinix HOT 30" /></a>
                            <div u="thumb">
                                Infinix HOT 30
                            </div>
                        </div>
                        <div>
                            <a target="_blank" href="https://hoanghamobile.com/dien-thoai-di-dong/honor/honor-90?source=chuyenmuc" title="Mở b&#225;n Honor 90 "><img data-u="image" data-src2="https://cdn.hoanghamobile.com/i/home/Uploads/2023/12/04/web-90-chuyen-mu.jpg" title="Mở b&#225;n Honor 90 " /></a>
                            <div u="thumb">
                                Mở b&#225;n Honor 90
                            </div>
                        </div>
                        <div>
                            <a target="_blank" href="https://hoanghamobile.com/dien-thoai-di-dong/redmi-note-12-4gb-128gb-chinh-hang" title="Redmi Note 12 4GB/128GB"><img data-u="image" data-src2="https://cdn.hoanghamobile.com/i/home/Uploads/2023/12/01/redmi-note12-04.jpg" title="Redmi Note 12 4GB/128GB" /></a>
                            <div u="thumb">
                                Redmi Note 12 4GB/128GB
                            </div>
                        </div>
                        <div>
                            <a target="_blank" href="https://hoanghamobile.com/dien-thoai-di-dong/tecno-pova-5-8gb-128gb-chinh-hang?source=Chuyenmuc" title="TECNO POVA 5 ưu đ&#227;i m&#249;a lễ hội"><img data-u="image" data-src2="https://cdn.hoanghamobile.com/i/home/Uploads/2023/12/08/1200x200-tecno-pova-5.png" title="TECNO POVA 5 ưu đ&#227;i m&#249;a lễ hội" /></a>
                            <div u="thumb">
                                TECNO POVA 5 ưu đ&#227;i m&#249;a lễ hội
                            </div>
                        </div>
                        <div>
                            <a target="_blank" href="https://hoanghamobile.com/dien-thoai-di-dong/vivo-v29e-chinh-hang?source=BannerSlider" title="vivo V29e"><img data-u="image" data-src2="https://cdn.hoanghamobile.com/i/home/Uploads/2023/11/20/1200x200-vivo-201123.jpg" title="vivo V29e" /></a>
                            <div u="thumb">
                                vivo V29e
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
            <div class="category-list" style="padding:10px 40px; margin:0;">
                <ul class="category_type_2 owl-carousel lrs-slider">
                    <li>
                        <a class="" href="/dien-thoai-di-dong/iphone" title="Apple">
                            <img src="https://cdn.hoanghamobile.com/i/cat/Uploads/2022/09/07/logoooooooooooooooo.png" />
                            <label>Apple</label>
                        </a>
                    </li>
                    <li>
                        <a class="" href="/dien-thoai-di-dong/samsung" title="Samsung">
                            <img src="https://cdn.hoanghamobile.com/i/cat/Uploads/2020/11/30/samsung-logo-transparent.png" />
                            <label>Samsung</label>
                        </a>
                    </li>
                    <li>
                        <a class="" href="/dien-thoai-di-dong/xiaomi" title="Xiaomi">
                            <img src="https://cdn.hoanghamobile.com/i/cat/Uploads/2023/07/18/xiaomi-logo.png" />
                            <label>Xiaomi</label>
                        </a>
                    </li>
                    <li>
                        <a class="" href="/dien-thoai-di-dong/oppo" title="OPPO">
                            <img src="https://cdn.hoanghamobile.com/i/cat/Uploads/2020/09/14/brand (3).png" />
                            <label>OPPO</label>
                        </a>
                    </li>
                    <li>
                        <a class="" href="/dien-thoai-di-dong/tecno" title="TECNO">
                            <img src="https://cdn.hoanghamobile.com/i/cat/Uploads/2023/06/02/tecno.png" />
                            <label>TECNO</label>
                        </a>
                    </li>
                    <li>
                        <a class="" href="/dien-thoai-di-dong/honor" title="HONOR">
                            <img src="https://cdn.hoanghamobile.com/i/cat/Uploads/2023/06/19/honor-logo-2022-svg.png" />
                            <label>HONOR</label>
                        </a>
                    </li>
                    <li>
                        <a class="" href="/dien-thoai-di-dong/realme" title="realme">
                            <img src="https://cdn.hoanghamobile.com/i/cat/Uploads/2020/09/14/brand (6).png" />
                            <label>realme</label>
                        </a>
                    </li>
                    <li>
                        <a class="" href="/dien-thoai-di-dong/vivo" title="Vivo">
                            <img src="https://cdn.hoanghamobile.com/i/cat/Uploads/2020/11/30/vivo-logo.png" />
                            <label>Vivo</label>
                        </a>
                    </li>
                    <li>
                        <a class="" href="/dien-thoai-di-dong/nokia" title="Nokia">
                            <img src="https://cdn.hoanghamobile.com/i/cat/Uploads/2020/09/14/brand (4).png" />
                            <label>Nokia</label>
                        </a>
                    </li>
                    <li>
                        <a class="" href="/dien-thoai-di-dong/htc" title="HTC">
                            <img src="https://cdn.hoanghamobile.com/i/cat/Uploads/2023/08/22/htc-new-logo-svg.png" />
                            <label>HTC</label>
                        </a>
                    </li>
                    <li>
                        <a class="" href="/dien-thoai-di-dong/infinix" title="Infinix">
                            <img src="https://cdn.hoanghamobile.com/i/cat/Uploads/2023/05/26/infinix-logo-svg.png" />
                            <label>Infinix</label>
                        </a>
                    </li>
                    <li>
                        <a class="" href="/dien-thoai-di-dong/asus-rog-phone" title="ROG">
                            <img src="https://cdn.hoanghamobile.com/i/cat/Uploads/2023/06/12/rog.png" />
                            <label>ROG</label>
                        </a>
                    </li>
                    <li>
                        <a class="" href="/dien-thoai-di-dong/xor" title="XOR">
                            <img src="https://cdn.hoanghamobile.com/i/cat/Uploads/2021/12/24/xorr.png" />
                            <label>XOR</label>
                        </a>
                    </li>
                    <li>
                        <a class="" href="/dien-thoai-di-dong/masstel" title="Masstel">
                            <img src="https://cdn.hoanghamobile.com/i/cat/Uploads/2020/10/30/logo-masstel-4.png" />
                            <label>Masstel</label>
                        </a>
                    </li>
                    <li>
                        <a class="" href="/dien-thoai-di-dong/tcl" title="TCL">
                            <img src="https://cdn.hoanghamobile.com/i/cat/Uploads/2023/06/02/tcl.png" />
                            <label>TCL</label>
                        </a>
                    </li>
                    <li>
                        <a class="" href="/dien-thoai-di-dong/itel" title="Itel">
                            <img src="https://cdn.hoanghamobile.com/i/cat/Uploads/2023/03/10/itel-logo.png" />
                            <label>Itel</label>
                        </a>
                    </li>
                    <li>
                        <a class="" href="/dien-thoai-di-dong/zte" title="ZTE">
                            <img src="https://cdn.hoanghamobile.com/i/cat/Uploads/2023/12/08/zte-logo-svg-1.png" />
                            <label>ZTE</label>
                        </a>
                    </li>
                    <li>
                        <a class="" href="/san-pham-sap-ra-mat-tin-don/dien-thoai" title="Mới - tin đồn">
                            <img src="https://cdn.hoanghamobile.com/i/cat/Uploads/2023/08/02/logo-moi-ra-2.png" />
                            <label>Mới - tin đồn</label>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </section>


    <section>
        <div class="container">
            <ol class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <a itemprop="item" href="/"><span itemprop="name" content="Trang chủ"><i class="icon-home" title="Trang chủ"></i> Trang chủ</span></a>
                    <meta itemprop="position" content="1" />
                </li>

                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <i class="fa fa-angle-right"></i> <a itemprop="item" href="/dien-thoai-di-dong" title="Điện thoại di động gi&#225; tốt, chính h&#227;ng - Ho&#224;ng H&#224; Mobile" class="actived"><span itemprop="name" content="Điện thoại">Điện thoại</span></a>
                    <meta itemprop="position" content="2" />
                </li>
            </ol>
        </div>
    </section>



    <section>
        <div class="container">
            <div class="product-filters2">
                <div class="left">
                    <strong class="label">Lọc danh sách:</strong>


                    <div class="facet">
                        <label><a href="javascript:;">Danh mục <i class="icon-rightar"></i></a></label>
                        <div class="sub">
                            <ul>
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
                                <li><a href="/dien-thoai-di-dong/zte">ZTE</a></li>
                                <li><a href="/san-pham-sap-ra-mat-tin-don/dien-thoai">Mới - tin đồn</a></li>
                            </ul>
                        </div>
                    </div>


                    <div class="facet">
                        <label>
                            <a href="javascript:;">Thương hiệu <i class="icon-rightar"></i></a>
                        </label>
                        <div class="sub">
                            <ul>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22brand%22%3a%224%22%7d&amp;search=true">Samsung <i class="total">(25)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22brand%22%3a%221%22%7d&amp;search=true">Apple <i class="total">(28)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22brand%22%3a%223%22%7d&amp;search=true">Xiaomi <i class="total">(19)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22brand%22%3a%227%22%7d&amp;search=true">OPPO <i class="total">(16)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22brand%22%3a%22214%22%7d&amp;search=true">TECNO <i class="total">(11)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22brand%22%3a%2212%22%7d&amp;search=true">Vivo <i class="total">(17)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22brand%22%3a%2282%22%7d&amp;search=true">realme <i class="total">(14)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22brand%22%3a%2220%22%7d&amp;search=true">Nokia <i class="total">(13)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22brand%22%3a%22165%22%7d&amp;search=true">TCL <i class="total">(8)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22brand%22%3a%2296%22%7d&amp;search=true">HONOR <i class="total">(5)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22brand%22%3a%22301%22%7d&amp;search=true">Infinix <i class="total">(5)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22brand%22%3a%22114%22%7d&amp;search=true">Itel <i class="total">(4)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22brand%22%3a%22240%22%7d&amp;search=true">Nubia <i class="total">(4)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22brand%22%3a%22216%22%7d&amp;search=true">XOR <i class="total">(3)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22brand%22%3a%226%22%7d&amp;search=true">ZTE <i class="total">(2)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22brand%22%3a%2210%22%7d&amp;search=true">HTC <i class="total">(1)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22brand%22%3a%2224%22%7d&amp;search=true">Philips <i class="total">(1)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22brand%22%3a%228%22%7d&amp;search=true">ASUS <i class="total">(1)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22brand%22%3a%2211%22%7d&amp;search=true">HUAWEI <i class="total">(1)</i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="facet">
                        <label>
                            <a href="javascript:;">Gi&#225; <i class="icon-rightar"></i></a>
                        </label>
                        <div class="sub">
                            <ul>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22price%22%3a%221t%22%7d&amp;search=true">Dưới 1 triệu <i class="total">(13)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22price%22%3a%221t-2t%22%7d&amp;search=true">1 đến 2 triệu <i class="total">(13)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22price%22%3a%222t-3t%22%7d&amp;search=true">2 đến 3 triệu <i class="total">(29)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22price%22%3a%223t-4t%22%7d&amp;search=true">3 đến 4 triệu <i class="total">(18)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22price%22%3a%224t-5t%22%7d&amp;search=true">4 đến 5 triệu <i class="total">(15)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22price%22%3a%225t-6t%22%7d&amp;search=true">5 đến 6 triệu <i class="total">(7)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22price%22%3a%226t-8t%22%7d&amp;search=true">6 đến 8 triệu <i class="total">(17)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22price%22%3a%228t-10t%22%7d&amp;search=true">8 đến 10 triệu <i class="total">(8)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22price%22%3a%2210t-12t%22%7d&amp;search=true">10 đến 12 triệu <i class="total">(6)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22price%22%3a%2212t-15t%22%7d&amp;search=true">12 đến 15 triệu <i class="total">(3)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22price%22%3a%2215t-20t%22%7d&amp;search=true">15 đến 20 triệu <i class="total">(11)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22price%22%3a%2220t-100tr%22%7d&amp;search=true">20 đến 100 triệu <i class="total">(31)</i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="facet">
                        <label>
                            <a href="javascript:;">Bluetooth <i class="icon-rightar"></i></a>
                        </label>
                        <div class="sub">
                            <ul>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22bluetooth%22%3a%22v5.0%22%7d&amp;search=true">v5.0 <i class="total">(22)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22bluetooth%22%3a%22Bluetooth+5.3%22%7d&amp;search=true">Bluetooth 5.3 <i class="total">(17)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22bluetooth%22%3a%22v5.3%22%7d&amp;search=true">v5.3 <i class="total">(14)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22bluetooth%22%3a%22A2DP%22%7d&amp;search=true">A2DP <i class="total">(13)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22bluetooth%22%3a%22Bluetooth+5.0%22%7d&amp;search=true">Bluetooth 5.0 <i class="total">(11)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22bluetooth%22%3a%22C%c3%b3%22%7d&amp;search=true">C&#243; <i class="total">(11)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22bluetooth%22%3a%22LE%22%7d&amp;search=true">LE <i class="total">(10)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22bluetooth%22%3a%22v5.1%22%7d&amp;search=true">v5.1 <i class="total">(10)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22bluetooth%22%3a%22Bluetooth+5.2%22%7d&amp;search=true">Bluetooth 5.2 <i class="total">(7)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22bluetooth%22%3a%22v4.2%22%7d&amp;search=true">v4.2 <i class="total">(7)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22bluetooth%22%3a%22v5.2%22%7d&amp;search=true">v5.2 <i class="total">(6)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22bluetooth%22%3a%22Bluetooth+v5.3%22%7d&amp;search=true">Bluetooth v5.3 <i class="total">(3)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22bluetooth%22%3a%22C%c3%b3+h%e1%bb%97+tr%e1%bb%a3%22%7d&amp;search=true">C&#243; hỗ trợ <i class="total">(3)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22bluetooth%22%3a%225.0%22%7d&amp;search=true">5.0 <i class="total">(2)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22bluetooth%22%3a%225.3%22%7d&amp;search=true">5.3 <i class="total">(2)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22bluetooth%22%3a%22Bluetooth+4.2%22%7d&amp;search=true">Bluetooth 4.2 <i class="total">(2)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22bluetooth%22%3a%22Bluetooth+5.1%22%7d&amp;search=true">Bluetooth 5.1 <i class="total">(2)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22bluetooth%22%3a%22Bluetooth+v5.3%2c+Bluetooth+Low+Energy%22%7d&amp;search=true">Bluetooth v5.3, Bluetooth Low Energy <i class="total">(2)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22bluetooth%22%3a%225%2c2%22%7d&amp;search=true">5,2 <i class="total">(1)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22bluetooth%22%3a%225.1%22%7d&amp;search=true">5.1 <i class="total">(1)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22bluetooth%22%3a%225.2%22%7d&amp;search=true">5.2 <i class="total">(1)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22bluetooth%22%3a%225.2%2c+A2DP%2c+LE%2c+aptX+HD%2c+aptX+th%c3%adch+%e1%bb%a9ng%22%7d&amp;search=true">5.2, A2DP, LE, aptX HD, aptX thích ứng <i class="total">(1)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22bluetooth%22%3a%225.3%2c+A2DP%2c+LE%22%7d&amp;search=true">5.3, A2DP, LE <i class="total">(1)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22bluetooth%22%3a%22BT5.1%2c+h%e1%bb%97+tr%e1%bb%a3+BLE%e3%80%81SBC%e3%80%81AAC%e3%80%81LDAC%e3%80%81APTX%e3%80%81APTX+HD%22%7d&amp;search=true">BT5.1, hỗ trợ BLE、SBC、AAC、LDAC、APTX、APTX HD <i class="total">(1)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22bluetooth%22%3a%22Bluetooth%5ctv5.2%22%7d&amp;search=true">Bluetooth v5.2 <i class="total">(1)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22bluetooth%22%3a%22Bluetooth+5.2%2c+Support+Bluetooth+Low+Energy%2c+SBC%2c+AAC%2c+LDAC%2c+aptX%2c+aptX+HD+are+supported.%22%7d&amp;search=true">Bluetooth 5.2, Support Bluetooth Low Energy, SBC, AAC, LDAC, aptX, aptX HD are supported. <i class="total">(1)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22bluetooth%22%3a%22Bluetooth+5.4%22%7d&amp;search=true">Bluetooth 5.4 <i class="total">(1)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22bluetooth%22%3a%22Bluetooth+v5.0%22%7d&amp;search=true">Bluetooth v5.0 <i class="total">(1)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22bluetooth%22%3a%22Bluetooth+v5.1%22%7d&amp;search=true">Bluetooth v5.1 <i class="total">(1)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22bluetooth%22%3a%22Bluetooth+v5.2%22%7d&amp;search=true">Bluetooth v5.2 <i class="total">(1)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22bluetooth%22%3a%22Bluetooth%c2%ae+5.3+(HFP+%2b+A2DP+%2b+AVRCP+%2b+HID+%2b+PAN+%2b+OPP)%2c+h%e1%bb%97+tr%e1%bb%a3+Qualcomm%c2%ae+aptX%e2%84%a2+Adaptive+v%c3%a0+aptX%e2%84%a2+Lossless%22%7d&amp;search=true">Bluetooth&#174; 5.3 (HFP + A2DP + AVRCP + HID + PAN + OPP), hỗ trợ Qualcomm&#174; aptX™ Adaptive v&#224; aptX™ Lossless <i class="total">(1)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22bluetooth%22%3a%22Bluetooth%e2%84%a2+4.2%22%7d&amp;search=true">Bluetooth™ 4.2 <i class="total">(1)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22bluetooth%22%3a%22C%c3%b3%2c+V5.1%22%7d&amp;search=true">C&#243;, V5.1 <i class="total">(1)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22bluetooth%22%3a%22H%e1%bb%97+tr%e1%bb%a3+Bluetooth+5.3%22%7d&amp;search=true">Hỗ trợ Bluetooth 5.3 <i class="total">(1)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22bluetooth%22%3a%22v4.3%22%7d&amp;search=true">v4.3 <i class="total">(1)</i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="facet">
                        <label>
                            <a href="javascript:;">Độ ph&#226;n giải <i class="icon-rightar"></i></a>
                        </label>
                        <div class="sub">
                            <ul>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%228+MP%22%7d&amp;search=true">8 MP <i class="total">(15)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%228MP%22%7d&amp;search=true">8MP <i class="total">(14)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%2212+MP%22%7d&amp;search=true">12 MP <i class="total">(13)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%22Camera+tr%c6%b0%e1%bb%9bc+TrueDepth+12MP%2c+kh%e1%ba%a9u+%c4%91%e1%bb%99+%c6%92%2f1.9%22%7d&amp;search=true">Camera trước TrueDepth 12MP, khẩu độ ƒ/1.9 <i class="total">(13)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%225+MP%22%7d&amp;search=true">5 MP <i class="total">(12)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%22HD%2b+(720+x+1600+Pixels)%22%7d&amp;search=true">HD+ (720 x 1600 Pixels) <i class="total">(12)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%222+camera+12+MP%22%7d&amp;search=true">2 camera 12 MP <i class="total">(11)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%2212MP%22%7d&amp;search=true">12MP <i class="total">(9)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%221179+x+2556%22%7d&amp;search=true">1179 x 2556 <i class="total">(7)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%22Ch%c3%adnh%3a+48MP%2c+kh%e1%ba%a9u+%c4%91%e1%bb%99+%c6%92%2f1.78%22%7d&amp;search=true">Chính: 48MP, khẩu độ ƒ/1.78 <i class="total">(7)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%22Telephoto%3a+12MP%2c+kh%e1%ba%a9u+%c4%91%e1%bb%99+%c6%92%2f2.8%22%7d&amp;search=true">Telephoto: 12MP, khẩu độ ƒ/2.8 <i class="total">(7)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%22Ultra+Wide%3a+12MP%2c+kh%e1%ba%a9u+%c4%91%e1%bb%99+%c6%92%2f2.2%22%7d&amp;search=true">Ultra Wide: 12MP, khẩu độ ƒ/2.2 <i class="total">(7)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%221290+x+2796%22%7d&amp;search=true">1290 x 2796 <i class="total">(6)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%22Ch%c3%adnh%3a+48MP%2c+kh%e1%ba%a9u+%c4%91%e1%bb%99+%c6%92%2f1.6%22%7d&amp;search=true">Chính: 48MP, khẩu độ ƒ/1.6 <i class="total">(6)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%22C%e1%ba%a3m+bi%e1%ba%bfn+ch%c3%adnh+50MP%22%7d&amp;search=true">Cảm biến chính 50MP <i class="total">(6)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%22Ultra+Wide%3a+12MP%2c+kh%e1%ba%a9u+%c4%91%e1%bb%99+%c6%92%2f2.4%22%7d&amp;search=true">Ultra Wide: 12MP, khẩu độ ƒ/2.4 <i class="total">(6)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%2216+MP%22%7d&amp;search=true">16 MP <i class="total">(5)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%2232MP%22%7d&amp;search=true">32MP <i class="total">(5)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%225MP%22%7d&amp;search=true">5MP <i class="total">(5)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%22Full+HD%2b+(1080+x+2400+Pixels)%22%7d&amp;search=true">Full HD+ (1080 x 2400 Pixels) <i class="total">(5)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%22HD%2b+(720+x+1612)%22%7d&amp;search=true">HD+ (720 x 1612) <i class="total">(5)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%221170+x+2532+Pixels%22%7d&amp;search=true">1170 x 2532 Pixels <i class="total">(4)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%222340+x+1080+(M%c3%a0n+h%c3%acnh+ph%e1%ba%b3ng+FHD%2b)%22%7d&amp;search=true">2340 x 1080 (M&#224;n h&#236;nh phẳng FHD+) <i class="total">(4)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%2232+MP%22%7d&amp;search=true">32 MP <i class="total">(4)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%228MP+f%2f2.0%22%7d&amp;search=true">8MP f/2.0 <i class="total">(4)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%22Camera+chi%e1%bb%81u+s%c3%a2u+2MP+f%2f2.4%22%7d&amp;search=true">Camera chiều s&#226;u 2MP f/2.4 <i class="total">(4)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%22Camera+ch%c3%adnh+50MP+f%2f1.8%22%7d&amp;search=true">Camera chính 50MP f/1.8 <i class="total">(4)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%22Ch%c3%adnh+13+MP+%26+Ph%e1%bb%a5+2+MP%22%7d&amp;search=true">Chính 13 MP &amp; Phụ 2 MP <i class="total">(4)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%22FHD%2b+(1080+x+2460)%22%7d&amp;search=true">FHD+ (1080 x 2460) <i class="total">(4)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%2210+MP%22%7d&amp;search=true">10 MP <i class="total">(3)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%221080x2400%22%7d&amp;search=true">1080x2400 <i class="total">(3)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%22128*160%22%7d&amp;search=true">128*160 <i class="total">(3)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%221600+%c3%97+720+(HD%2b)%22%7d&amp;search=true">1600 &#215; 720 (HD+) <i class="total">(3)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%2216MP%22%7d&amp;search=true">16MP <i class="total">(3)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%22200MP+x+12MP+x+10MP+x+10MP%22%7d&amp;search=true">200MP x 12MP x 10MP x 10MP <i class="total">(3)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%222MP+(F2.4)%22%7d&amp;search=true">2MP (F2.4) <i class="total">(3)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%223088+x+1440+(Edge+Quad+HD%2b)%22%7d&amp;search=true">3088 x 1440 (Edge Quad HD+) <i class="total">(3)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%225MP+F2.4+(C%e1%ba%adn+c%e1%ba%a3nh)%22%7d&amp;search=true">5MP F2.4 (Cận cảnh) <i class="total">(3)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%22Camera+chi%e1%bb%81u+s%c3%a2u+0.08+MP%22%7d&amp;search=true">Camera chiều s&#226;u 0.08 MP <i class="total">(3)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%22Ch%c3%adnh+48+MP+%26+Ph%e1%bb%a5+12+MP%2c+12+MP%22%7d&amp;search=true">Chính 48 MP &amp; Phụ 12 MP, 12 MP <i class="total">(3)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%22Ch%c3%adnh+50+MP+%26+Ph%e1%bb%a5+2+MP%22%7d&amp;search=true">Chính 50 MP &amp; Phụ 2 MP <i class="total">(3)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%22Ch%c3%adnh+50+MP+%26+Ph%e1%bb%a5+2+MP%2c+2+MP%22%7d&amp;search=true">Chính 50 MP &amp; Phụ 2 MP, 2 MP <i class="total">(3)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%22C%e1%ba%a3m+bi%e1%ba%bfn+chi%e1%bb%81u+s%c3%a2u%22%7d&amp;search=true">Cảm biến chiều s&#226;u <i class="total">(3)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%22C%e1%ba%a3m+bi%e1%ba%bfn+macro+2MP+f%2f2.4%22%7d&amp;search=true">Cảm biến macro 2MP f/2.4 <i class="total">(3)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%22FHD%2b+(1080+x+2400)%22%7d&amp;search=true">FHD+ (1080 x 2400) <i class="total">(3)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%22HD%2b+(720+x+1600)%22%7d&amp;search=true">HD+ (720 x 1600) <i class="total">(3)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%22HD%2b+(720+x+1612+Pixels)%22%7d&amp;search=true">HD+ (720 x 1612 Pixels) <i class="total">(3)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%22QVGA+(240+x+320+Pixels)%22%7d&amp;search=true">QVGA (240 x 320 Pixels) <i class="total">(3)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%220.3+MP%22%7d&amp;search=true">0.3 MP <i class="total">(2)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%221080+x+2040+Pixel%22%7d&amp;search=true">1080 x 2040 Pixel <i class="total">(2)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%221080+x+2400+(FHD%2b)%22%7d&amp;search=true">1080 x 2400 (FHD+) <i class="total">(2)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%221080x2460%22%7d&amp;search=true">1080x2460 <i class="total">(2)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%2212+MP+(2Camera)%22%7d&amp;search=true">12 MP (2Camera) <i class="total">(2)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%2212MP+F2.2+(Si%c3%aau+R%e1%bb%99ng)%22%7d&amp;search=true">12MP F2.2 (Si&#234;u Rộng) <i class="total">(2)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%2213+MP%22%7d&amp;search=true">13 MP <i class="total">(2)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%2213MP+f%2f2.45%22%7d&amp;search=true">13MP f/2.45 <i class="total">(2)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%2216MP+f%2f2.4%22%7d&amp;search=true">16MP f/2.4 <i class="total">(2)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%2216MP%2c+f%2f2.0%22%7d&amp;search=true">16MP, f/2.0 <i class="total">(2)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%222796+x+1290+Pixels%22%7d&amp;search=true">2796 x 1290 Pixels <i class="total">(2)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%2232+MP+f%2f2.5%22%7d&amp;search=true">32 MP f/2.5 <i class="total">(2)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%2232MP+F2.2%22%7d&amp;search=true">32MP F2.2 <i class="total">(2)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%2232MP%3b+f%2f2.4%3b+FOV+89%c2%b0%3b+%e1%bb%91ng+k%c3%adnh+5P+lens%2c+kh%c3%b4ng+h%e1%bb%97+tr%e1%bb%a3+AF+hay+OIS%22%7d&amp;search=true">32MP; f/2.4; FOV 89&#176;; ống kính 5P lens, kh&#244;ng hỗ trợ AF hay OIS <i class="total">(2)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%2250+MP+%2b+12+MP+%2b+10+MP%22%7d&amp;search=true">50 MP + 12 MP + 10 MP <i class="total">(2)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%2250M%2bQVGA%22%7d&amp;search=true">50M+QVGA <i class="total">(2)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%2250MP+(F1.8)+AF%22%7d&amp;search=true">50MP (F1.8) AF <i class="total">(2)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%2250MP+F1.8+OIS+(R%e1%bb%99ng)%22%7d&amp;search=true">50MP F1.8 OIS (Rộng) <i class="total">(2)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%2250MP+x+12MP+x+10+MP%22%7d&amp;search=true">50MP x 12MP x 10 MP <i class="total">(2)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%2250MP+x+12MP+x10MP%22%7d&amp;search=true">50MP x 12MP x10MP <i class="total">(2)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%2250MP+x+2MP+x+2MP%22%7d&amp;search=true">50MP x 2MP x 2MP <i class="total">(2)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%225MP+f%2f2.2%22%7d&amp;search=true">5MP f/2.2 <i class="total">(2)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%2264MP+x+8MP+x+2MP%22%7d&amp;search=true">64MP x 8MP x 2MP <i class="total">(2)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%22720+x+1612+(HD%2b)%22%7d&amp;search=true">720 x 1612 (HD+) <i class="total">(2)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%22720+%c3%97+1612%22%7d&amp;search=true">720 &#215; 1612 <i class="total">(2)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%228+MP%2c+f%2f2.0%22%7d&amp;search=true">8 MP, f/2.0 <i class="total">(2)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%228.0+MP%22%7d&amp;search=true">8.0 MP <i class="total">(2)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%22828+x+1792+Pixels%22%7d&amp;search=true">828 x 1792 Pixels <i class="total">(2)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%228MP+(F2.2)%22%7d&amp;search=true">8MP (F2.2) <i class="total">(2)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%22Camera+50+MP+(f%2f1.8)%22%7d&amp;search=true">Camera 50 MP (f/1.8) <i class="total">(2)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%22Camera+Ch%c3%adnh+50MP+f%2f1.8%22%7d&amp;search=true">Camera Chính 50MP f/1.8 <i class="total">(2)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%22Camera+C%e1%ba%adn+c%e1%ba%a3nh+2MP+f%2f2.4%22%7d&amp;search=true">Camera Cận cảnh 2MP f/2.4 <i class="total">(2)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%22Camera+G%c3%b3c+si%c3%aau+r%e1%bb%99ng+8MP+f%2f2.2%2c+G%c3%b3c+R%e1%bb%99ng+120%c2%b0%22%7d&amp;search=true">Camera G&#243;c si&#234;u rộng 8MP f/2.2, G&#243;c Rộng 120&#176; <i class="total">(2)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%22Camera+Macro+2MP%22%7d&amp;search=true">Camera Macro 2MP <i class="total">(2)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%22Camera+chi%e1%bb%81u+s%c3%a2u+2MP%22%7d&amp;search=true">Camera chiều s&#226;u 2MP <i class="total">(2)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%22Camera+ch%c3%a2n+dung+2MP+(f%2f2.4)%22%7d&amp;search=true">Camera ch&#226;n dung 2MP (f/2.4) <i class="total">(2)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%22Camera+ch%c3%adnh+50+MP+f%2f1.6+AF%22%7d&amp;search=true">Camera chính 50 MP f/1.6 AF <i class="total">(2)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%22Camera+ch%c3%adnh+50MP%22%7d&amp;search=true">Camera chính 50MP <i class="total">(2)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%22Camera+ch%c3%adnh%3a+64MP%3b+f%2f1.7%3b+FOV+81%c2%b0%3b+%e1%bb%91ng+kinh+6P%3b+h%e1%bb%97+tr%e1%bb%a3+AF%3b+s%e1%bb%ad+d%e1%bb%a5ng+%c4%91%e1%bb%99ng+c%c6%a1+v%c3%b2ng+l%e1%ba%b7p+m%e1%bb%9f.%22%7d&amp;search=true">Camera chính: 64MP; f/1.7; FOV 81&#176;; ống kinh 6P; hỗ trợ AF; sử dụng động cơ v&#242;ng lặp mở. <i class="total">(2)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%22Camera+g%c3%b3c+r%e1%bb%99ng+13+MP+f%2f1.9+AF%22%7d&amp;search=true">Camera g&#243;c rộng 13 MP f/1.9 AF <i class="total">(2)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%22Camera+macro+2MP+f%2f2.4%22%7d&amp;search=true">Camera macro 2MP f/2.4 <i class="total">(2)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%22Camera+ph%e1%bb%a5+0.08+MP%22%7d&amp;search=true">Camera phụ 0.08 MP <i class="total">(2)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%22Camera+tr%c6%b0%e1%bb%9bc+%e1%bb%9f+m%c3%a0n+h%c3%acnh+ph%e1%bb%a5%3a+10+MP%22%7d&amp;search=true">Camera trước ở m&#224;n h&#236;nh phụ: 10 MP <i class="total">(2)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%22Camera+%e1%ba%a9n+d%c6%b0%e1%bb%9bi+m%c3%a0n+h%c3%acnh%3a+4+MP%22%7d&amp;search=true">Camera ẩn dưới m&#224;n h&#236;nh: 4 MP <i class="total">(2)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%22Ch%c3%adnh+50+MP+%26+Ph%e1%bb%a5+2+MP%2c+0.3+MP%22%7d&amp;search=true">Chính 50 MP &amp; Phụ 2 MP, 0.3 MP <i class="total">(2)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%22Ch%c3%adnh+64MP+%2b+B%26W+2MP%22%7d&amp;search=true">Chính 64MP + B&amp;W 2MP <i class="total">(2)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%22C%e1%ba%a3m+bi%e1%ba%bfn+QVGA%22%7d&amp;search=true">Cảm biến QVGA <i class="total">(2)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%22C%e1%ba%a3m+bi%e1%ba%bfn+chi%e1%bb%81u+s%c3%a2u+2+MP+f%2f2.4%22%7d&amp;search=true">Cảm biến chiều s&#226;u 2 MP f/2.4 <i class="total">(2)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%22C%e1%ba%a3m+bi%e1%ba%bfn+chi%e1%bb%81u+s%c3%a2u+QVGA%22%7d&amp;search=true">Cảm biến chiều s&#226;u QVGA <i class="total">(2)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%22C%e1%ba%a3m+bi%e1%ba%bfn+ch%c3%adnh+64+MP+f%2f1.7+PDAF%22%7d&amp;search=true">Cảm biến chính 64 MP f/1.7 PDAF <i class="total">(2)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%22C%e1%ba%a3m+bi%e1%ba%bfn+g%c3%b3c+r%e1%bb%99ng+108MP+f%2f1.9%22%7d&amp;search=true">Cảm biến g&#243;c rộng 108MP f/1.9 <i class="total">(2)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22do-phan-giai%22%3a%22C%e1%ba%a3m+bi%e1%ba%bfn+g%c3%b3c+si%c3%aau+r%e1%bb%99ng+8MP+f%2f2.2%22%7d&amp;search=true">Cảm biến g&#243;c si&#234;u rộng 8MP f/2.2 <i class="total">(2)</i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="facet">
                        <label>
                            <a href="javascript:;">Kích thước m&#224;n h&#236;nh <i class="icon-rightar"></i></a>
                        </label>
                        <div class="sub">
                            <ul>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22kich-thuoc-man-hinh%22%3a%226.7%5c%22%22%7d&amp;search=true">6.7&quot; <i class="total">(14)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22kich-thuoc-man-hinh%22%3a%226.1%5c%22%22%7d&amp;search=true">6.1&quot; <i class="total">(13)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22kich-thuoc-man-hinh%22%3a%226.67%5c%22%22%7d&amp;search=true">6.67&quot; <i class="total">(6)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22kich-thuoc-man-hinh%22%3a%226.56%5c%22%22%7d&amp;search=true">6.56&quot; <i class="total">(5)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22kich-thuoc-man-hinh%22%3a%226.5%5c%22%22%7d&amp;search=true">6.5&quot; <i class="total">(4)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22kich-thuoc-man-hinh%22%3a%226.56+inch%22%7d&amp;search=true">6.56 inch <i class="total">(4)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22kich-thuoc-man-hinh%22%3a%226.6%5c%22%22%7d&amp;search=true">6.6&quot; <i class="total">(4)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22kich-thuoc-man-hinh%22%3a%226.78%5c%22%22%7d&amp;search=true">6.78&quot; <i class="total">(4)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22kich-thuoc-man-hinh%22%3a%222.4%5c%22%22%7d&amp;search=true">2.4&quot; <i class="total">(3)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22kich-thuoc-man-hinh%22%3a%226.67-inch%22%7d&amp;search=true">6.67-inch <i class="total">(3)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22kich-thuoc-man-hinh%22%3a%226.7+inches%22%7d&amp;search=true">6.7 inches <i class="total">(3)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22kich-thuoc-man-hinh%22%3a%226.72+inch%ef%bc%8817.07cm%ef%bc%89%22%7d&amp;search=true">6.72 inch（17.07cm） <i class="total">(3)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22kich-thuoc-man-hinh%22%3a%226.8+inch%22%7d&amp;search=true">6.8 inch <i class="total">(3)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22kich-thuoc-man-hinh%22%3a%221.77%5c%22%22%7d&amp;search=true">1.77&quot; <i class="total">(2)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22kich-thuoc-man-hinh%22%3a%221.77%e2%80%9d%22%7d&amp;search=true">1.77” <i class="total">(2)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22kich-thuoc-man-hinh%22%3a%226%2c8%5c%22%22%7d&amp;search=true">6,8&quot; <i class="total">(2)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22kich-thuoc-man-hinh%22%3a%226.1+inch%22%7d&amp;search=true">6.1 inch <i class="total">(2)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22kich-thuoc-man-hinh%22%3a%226.44+inch%22%7d&amp;search=true">6.44 inch <i class="total">(2)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22kich-thuoc-man-hinh%22%3a%226.4%e2%80%9d+Infinity-O%22%7d&amp;search=true">6.4” Infinity-O <i class="total">(2)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22kich-thuoc-man-hinh%22%3a%226.52%5c%22%22%7d&amp;search=true">6.52&quot; <i class="total">(2)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22kich-thuoc-man-hinh%22%3a%226.6+inch%22%7d&amp;search=true">6.6 inch <i class="total">(2)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22kich-thuoc-man-hinh%22%3a%226.74%5c%22%22%7d&amp;search=true">6.74&quot; <i class="total">(2)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22kich-thuoc-man-hinh%22%3a%226.75%5c%22%22%7d&amp;search=true">6.75&quot; <i class="total">(2)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22kich-thuoc-man-hinh%22%3a%226.78%e2%80%9d%22%7d&amp;search=true">6.78” <i class="total">(2)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22kich-thuoc-man-hinh%22%3a%226.8+inches%22%7d&amp;search=true">6.8 inches <i class="total">(2)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22kich-thuoc-man-hinh%22%3a%22Ch%c3%adnh+6.7%5c%22%22%7d&amp;search=true">Chính 6.7&quot; <i class="total">(2)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22kich-thuoc-man-hinh%22%3a%22M%c3%a0n+h%c3%acnh+ch%c3%adnh%3a+7.6%5c%22%22%7d&amp;search=true">M&#224;n h&#236;nh chính: 7.6&quot; <i class="total">(2)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22kich-thuoc-man-hinh%22%3a%22M%c3%a0n+h%c3%acnh+ph%e1%bb%a5%3a+6.2%5c%22%22%7d&amp;search=true">M&#224;n h&#236;nh phụ: 6.2&quot; <i class="total">(2)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22kich-thuoc-man-hinh%22%3a%22Ph%e1%bb%a5+3.4%5c%22%22%7d&amp;search=true">Phụ 3.4&quot; <i class="total">(2)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22kich-thuoc-man-hinh%22%3a%221.77+inch%22%7d&amp;search=true">1.77 inch <i class="total">(1)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22kich-thuoc-man-hinh%22%3a%2216.7+million+colors%22%7d&amp;search=true">16.7 million colors <i class="total">(1)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22kich-thuoc-man-hinh%22%3a%222.4+inch%22%7d&amp;search=true">2.4 inch <i class="total">(1)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22kich-thuoc-man-hinh%22%3a%226%2c6%5c%22%22%7d&amp;search=true">6,6&quot; <i class="total">(1)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22kich-thuoc-man-hinh%22%3a%226%2c82%e2%80%9d%22%7d&amp;search=true">6,82” <i class="total">(1)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22kich-thuoc-man-hinh%22%3a%226.1%e2%80%91inch%22%7d&amp;search=true">6.1‑inch <i class="total">(1)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22kich-thuoc-man-hinh%22%3a%226.3%e2%80%b3+%26+7.8%e2%80%b3%22%7d&amp;search=true">6.3″ &amp; 7.8″ <i class="total">(1)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22kich-thuoc-man-hinh%22%3a%226.4+inch%22%7d&amp;search=true">6.4 inch <i class="total">(1)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22kich-thuoc-man-hinh%22%3a%226.4+inch%2c+m%c3%a0n+h%c3%acnh+%c4%91%e1%bb%a5c+l%e1%bb%97%22%7d&amp;search=true">6.4 inch, m&#224;n h&#236;nh đục lỗ <i class="total">(1)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22kich-thuoc-man-hinh%22%3a%226.4+inch%ef%bc%8816.03cm%ef%bc%89%22%7d&amp;search=true">6.4 inch（16.03cm） <i class="total">(1)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22kich-thuoc-man-hinh%22%3a%226.4%5c%22%22%7d&amp;search=true">6.4&quot; <i class="total">(1)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22kich-thuoc-man-hinh%22%3a%226.43%5c%22%22%7d&amp;search=true">6.43&quot; <i class="total">(1)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22kich-thuoc-man-hinh%22%3a%226.43%27%27%22%7d&amp;search=true">6.43&#39;&#39; <i class="total">(1)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22kich-thuoc-man-hinh%22%3a%226.5+inch%22%7d&amp;search=true">6.5 inch <i class="total">(1)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22kich-thuoc-man-hinh%22%3a%226.5%5c%22+-+T%e1%ba%a7n+s%e1%bb%91+qu%c3%a9t+120+Hz%22%7d&amp;search=true">6.5&quot; - Tần số qu&#233;t 120 Hz <i class="total">(1)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22kich-thuoc-man-hinh%22%3a%226.5%27%27%22%7d&amp;search=true">6.5&#39;&#39; <i class="total">(1)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22kich-thuoc-man-hinh%22%3a%226.51%22%7d&amp;search=true">6.51 <i class="total">(1)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22kich-thuoc-man-hinh%22%3a%226.51+inches%22%7d&amp;search=true">6.51 inches <i class="total">(1)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22kich-thuoc-man-hinh%22%3a%226.51%5c%22%22%7d&amp;search=true">6.51&quot; <i class="total">(1)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22kich-thuoc-man-hinh%22%3a%226.517%5c%22%22%7d&amp;search=true">6.517&quot; <i class="total">(1)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22kich-thuoc-man-hinh%22%3a%226.52+inch%22%7d&amp;search=true">6.52 inch <i class="total">(1)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22kich-thuoc-man-hinh%22%3a%226.52%e2%80%9d%22%7d&amp;search=true">6.52” <i class="total">(1)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22kich-thuoc-man-hinh%22%3a%226.55%5c%22%22%7d&amp;search=true">6.55&quot; <i class="total">(1)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22kich-thuoc-man-hinh%22%3a%226.55%e2%80%9d%22%7d&amp;search=true">6.55” <i class="total">(1)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22kich-thuoc-man-hinh%22%3a%226.56%5c%22+-+T%e1%ba%a7n+s%e1%bb%91+qu%c3%a9t+90+Hz%22%7d&amp;search=true">6.56&quot; - Tần số qu&#233;t 90 Hz <i class="total">(1)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22kich-thuoc-man-hinh%22%3a%226.58%5c%22+-+T%e1%ba%a7n+s%e1%bb%91+qu%c3%a9t+90+Hz%22%7d&amp;search=true">6.58&quot; - Tần số qu&#233;t 90 Hz <i class="total">(1)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22kich-thuoc-man-hinh%22%3a%226.6+inches%22%7d&amp;search=true">6.6 inches <i class="total">(1)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22kich-thuoc-man-hinh%22%3a%226.6%5c%22+-+T%e1%ba%a7n+s%e1%bb%91+qu%c3%a9t+60+Hz%22%7d&amp;search=true">6.6&quot; - Tần số qu&#233;t 60 Hz <i class="total">(1)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22kich-thuoc-man-hinh%22%3a%226.6%5c%22+-+t%e1%ba%a7n+s%e1%bb%91+qu%c3%a9t+120Hz%22%7d&amp;search=true">6.6&quot; - tần số qu&#233;t 120Hz <i class="total">(1)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22kich-thuoc-man-hinh%22%3a%226.62%e2%80%99%e2%80%99%22%7d&amp;search=true">6.62’’ <i class="total">(1)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22kich-thuoc-man-hinh%22%3a%226.64%5c%22+-+T%e1%ba%a7n+s%e1%bb%91+qu%c3%a9t+90+Hz%22%7d&amp;search=true">6.64&quot; - Tần số qu&#233;t 90 Hz <i class="total">(1)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22kich-thuoc-man-hinh%22%3a%226.6%e2%80%9d+Infinity-U%22%7d&amp;search=true">6.6” Infinity-U <i class="total">(1)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22kich-thuoc-man-hinh%22%3a%226.7++inches%22%7d&amp;search=true">6.7 inches <i class="total">(1)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22kich-thuoc-man-hinh%22%3a%226.7%5c%22+-+T%e1%ba%a7n+s%e1%bb%91+qu%c3%a9t+120+Hz%22%7d&amp;search=true">6.7&quot; - Tần số qu&#233;t 120 Hz <i class="total">(1)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22kich-thuoc-man-hinh%22%3a%226.7%5c%22+-+T%e1%ba%a7n+s%e1%bb%91+qu%c3%a9t+60+Hz%22%7d&amp;search=true">6.7&quot; - Tần số qu&#233;t 60 Hz <i class="total">(1)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22kich-thuoc-man-hinh%22%3a%226.71+inch%22%7d&amp;search=true">6.71 inch <i class="total">(1)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22kich-thuoc-man-hinh%22%3a%226.72+inch%22%7d&amp;search=true">6.72 inch <i class="total">(1)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22kich-thuoc-man-hinh%22%3a%226.73+inches%22%7d&amp;search=true">6.73 inches <i class="total">(1)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22kich-thuoc-man-hinh%22%3a%226.74%5c%22+-+T%e1%ba%a7n+s%e1%bb%91+qu%c3%a9t+90+Hz%22%7d&amp;search=true">6.74&quot; - Tần số qu&#233;t 90 Hz <i class="total">(1)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22kich-thuoc-man-hinh%22%3a%226.78+inches%22%7d&amp;search=true">6.78 inches <i class="total">(1)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22kich-thuoc-man-hinh%22%3a%226.7%e2%80%9d%22%7d&amp;search=true">6.7” <i class="total">(1)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22kich-thuoc-man-hinh%22%3a%226.8%5c%22%22%7d&amp;search=true">6.8&quot; <i class="total">(1)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22kich-thuoc-man-hinh%22%3a%22Chi%cc%81nh+6.7%5c%22+%26+Phu%cc%a3+1.9%5c%22+-+T%e1%ba%a7n+s%e1%bb%91+qu%c3%a9t+120+Hz%22%7d&amp;search=true">Chính 6.7&quot; &amp; Phụ 1.9&quot; - Tần số qu&#233;t 120 Hz <i class="total">(1)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22kich-thuoc-man-hinh%22%3a%22Infinity-U+6.5%e2%80%9d%22%7d&amp;search=true">Infinity-U 6.5” <i class="total">(1)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22kich-thuoc-man-hinh%22%3a%22M%c3%a0n+h%c3%acnh+cong+3D+6.73%5c%22%22%7d&amp;search=true">M&#224;n h&#236;nh cong 3D 6.73&quot; <i class="total">(1)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22kich-thuoc-man-hinh%22%3a%22M%c3%a0n+h%c3%acnh+ngo%c3%a0i%3a+3.26%5c%22%22%7d&amp;search=true">M&#224;n h&#236;nh ngo&#224;i: 3.26&quot; <i class="total">(1)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22kich-thuoc-man-hinh%22%3a%22M%c3%a0n+h%c3%acnh+tai+th%e1%bb%8f+6%2c6%e2%80%9d%22%7d&amp;search=true">M&#224;n h&#236;nh tai thỏ 6,6” <i class="total">(1)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22kich-thuoc-man-hinh%22%3a%22M%c3%a0n+h%c3%acnh+trong%3a+6.80%5c%22%22%7d&amp;search=true">M&#224;n h&#236;nh trong: 6.80&quot; <i class="total">(1)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22kich-thuoc-man-hinh%22%3a%22OLED+6.1%e2%80%91inch%22%7d&amp;search=true">OLED 6.1‑inch <i class="total">(1)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22kich-thuoc-man-hinh%22%3a%22T%e1%ba%a7n+s%e1%bb%91+qu%c3%a9t%3a+1+-+120+Hz%22%7d&amp;search=true">Tần số qu&#233;t: 1 - 120 Hz <i class="total">(1)</i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="facet">
                        <label>
                            <a href="javascript:;">RAM <i class="icon-rightar"></i></a>
                        </label>
                        <div class="sub">
                            <ul>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22ram%22%3a%228GB%22%7d&amp;search=true">8GB <i class="total">(53)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22ram%22%3a%224GB%22%7d&amp;search=true">4GB <i class="total">(19)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22ram%22%3a%224+GB%22%7d&amp;search=true">4 GB <i class="total">(16)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22ram%22%3a%228+GB%22%7d&amp;search=true">8 GB <i class="total">(13)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22ram%22%3a%226GB%22%7d&amp;search=true">6GB <i class="total">(11)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22ram%22%3a%226+GB%22%7d&amp;search=true">6 GB <i class="total">(8)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22ram%22%3a%2212GB%22%7d&amp;search=true">12GB <i class="total">(7)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22ram%22%3a%222+GB%22%7d&amp;search=true">2 GB <i class="total">(7)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22ram%22%3a%223+GB%22%7d&amp;search=true">3 GB <i class="total">(5)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22ram%22%3a%223GB%22%7d&amp;search=true">3GB <i class="total">(3)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22ram%22%3a%2248MB%22%7d&amp;search=true">48MB <i class="total">(3)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22ram%22%3a%2212+GB%22%7d&amp;search=true">12 GB <i class="total">(2)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22ram%22%3a%2216GB%22%7d&amp;search=true">16GB <i class="total">(2)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22ram%22%3a%2248+MB%22%7d&amp;search=true">48 MB <i class="total">(2)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22ram%22%3a%228(%2b4GB)%22%7d&amp;search=true">8(+4GB) <i class="total">(2)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22ram%22%3a%228GB+%2b+8GB%22%7d&amp;search=true">8GB + 8GB <i class="total">(2)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22ram%22%3a%22%2b8GB+m%e1%bb%9f+r%e1%bb%99ng%22%7d&amp;search=true">+8GB mở rộng <i class="total">(1)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22ram%22%3a%2212G%22%7d&amp;search=true">12G <i class="total">(1)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22ram%22%3a%2216+MB%22%7d&amp;search=true">16 MB <i class="total">(1)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22ram%22%3a%2216MB%22%7d&amp;search=true">16MB <i class="total">(1)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22ram%22%3a%222GB%22%7d&amp;search=true">2GB <i class="total">(1)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22ram%22%3a%224GB(%2b1GB)%22%7d&amp;search=true">4GB(+1GB) <i class="total">(1)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22ram%22%3a%2264+MB%22%7d&amp;search=true">64 MB <i class="total">(1)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22ram%22%3a%228GB+(%2b10GB+RAM+%e1%ba%a3o)%2c+LPDDR4X%22%7d&amp;search=true">8GB (+10GB RAM ảo), LPDDR4X <i class="total">(1)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22ram%22%3a%228GB+%2b+M%e1%bb%9f+r%e1%bb%99ng+8GB%22%7d&amp;search=true">8GB + Mở rộng 8GB <i class="total">(1)</i></a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22ram%22%3a%22Kh%c3%b4ng%22%7d&amp;search=true">Kh&#244;ng <i class="total">(1)</i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="right">
                    <div class="facet">
                        <label>Sắp xếp <i class="icon-rightar"></i></label>
                        <div class="sub">
                            <ul>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22sort%22%3a%2212%22%7d&amp;search=true"><span class="fa fa-angle-right"></span> Mặc định</a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22sort%22%3a%221%22%7d&amp;search=true"><span class="fa fa-angle-right"></span> Sản phẩm mới - cũ</a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22sort%22%3a%222%22%7d&amp;search=true"><span class="fa fa-angle-right"></span> Gi&#225; thấp đến cao</a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22sort%22%3a%223%22%7d&amp;search=true"><span class="fa fa-angle-right"></span> Gi&#225; cao đến thấp</a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22sort%22%3a%224%22%7d&amp;search=true"><span class="fa fa-angle-right"></span> Mới cập nhật</a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22sort%22%3a%225%22%7d&amp;search=true"><span class="fa fa-angle-right"></span> Sản phẩm cũ</a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22sort%22%3a%226%22%7d&amp;search=true"><span class="fa fa-angle-right"></span> Xem nhiều h&#244;m nay</a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22sort%22%3a%227%22%7d&amp;search=true"><span class="fa fa-angle-right"></span> Xem nhiều tuần n&#224;y</a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22sort%22%3a%228%22%7d&amp;search=true"><span class="fa fa-angle-right"></span> Xem nhiều th&#225;ng n&#224;y</a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22sort%22%3a%2210%22%7d&amp;search=true"><span class="fa fa-angle-right"></span> Xem nhiều năm nay</a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22sort%22%3a%229%22%7d&amp;search=true"><span class="fa fa-angle-right"></span> Xem nhiều nhất</a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22sort%22%3a%2211%22%7d&amp;search=true"><span class="fa fa-angle-right"></span> Kết quả t&#236;m kiếm</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section>
        <div class="container">

            <a name="page_1"></a>
            <div class="list-product">
                <h1>Điện thoại</h1>
                <div class="col-content lts-product">

                    <div class="item">

                        <div class="img">
                            <a href="/dien-thoai-di-dong/oppo-find-n3-16gb-512gb-chinh-hang" title="OPPO Find N3 (16GB/512GB) - Chính h&#227;ng">
                                <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/10/27/oppo-find-n3-ad.png" alt="OPPO Find N3 (16GB/512GB) - Chính h&#227;ng" title="OPPO Find N3 (16GB/512GB) - Chính h&#227;ng">
                            </a>
                        </div>





                        <div class="info">
                            <a href="/dien-thoai-di-dong/oppo-find-n3-16gb-512gb-chinh-hang" class="title" title="OPPO Find N3 (16GB/512GB) - Chính h&#227;ng">OPPO Find N3 (16GB/512GB) - Chính h&#227;ng</a>
                            <span class="price">
                                <strong>44,990,000 ₫</strong>
                            </span>



                        </div>




                        <div class="note">
                            <span class="bag">KM</span> <label title="Qu&#224; tặng Ho&#224;ng H&#224;: Tặng g&#243;i bảo h&#224;nh Vipcare 1+1">Qu&#224; tặng Ho&#224;ng H&#224;: Tặng g&#243;i bảo h&#224;n...</label>
                            <strong class="text-orange">VÀ 6 KM KHÁC</strong>
                        </div>
                        <div class="promote">
                            <a href="/dien-thoai-di-dong/oppo-find-n3-16gb-512gb-chinh-hang">
                                <ul>
                                    <li><span class="bag">KM</span> Qu&#224; tặng Ho&#224;ng H&#224;: Tặng g&#243;i bảo h&#224;nh Vipcare 1+1</li>
                                    <li><span class="bag">KM</span> Tặng G&#243;i bảo h&#224;nh Premium Service OPPO Find N3 trị gi&#225; 2.500.000đ. </li>
                                    <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                                </ul>
                            </a>
                        </div>
                    </div>
                    <div class="item">

                        <div class="img">
                            <a href="/dien-thoai-di-dong/oppo-find-n3-flip-12gb-256gb-chinh-hang" title="OPPO Find N3 Flip (12GB/256GB) - Chính h&#227;ng">
                                <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/10/27/oppo-find-n3-flip.png" alt="OPPO Find N3 Flip (12GB/256GB) - Chính h&#227;ng" title="OPPO Find N3 Flip (12GB/256GB) - Chính h&#227;ng">
                            </a>
                        </div>





                        <div class="info">
                            <a href="/dien-thoai-di-dong/oppo-find-n3-flip-12gb-256gb-chinh-hang" class="title" title="OPPO Find N3 Flip (12GB/256GB) - Chính h&#227;ng">OPPO Find N3 Flip (12GB/256GB) - Chính h&#227;ng</a>
                            <span class="price">
                                <strong>22,990,000 ₫</strong>
                            </span>



                        </div>




                        <div class="note">
                            <span class="bag">KM</span> <label title="Qu&#224; tặng Ho&#224;ng H&#224;: Tặng g&#243;i bảo h&#224;nh Vipcare 1+1">Qu&#224; tặng Ho&#224;ng H&#224;: Tặng g&#243;i bảo h&#224;n...</label>
                            <strong class="text-orange">VÀ 6 KM KHÁC</strong>
                        </div>
                        <div class="promote">
                            <a href="/dien-thoai-di-dong/oppo-find-n3-flip-12gb-256gb-chinh-hang">
                                <ul>
                                    <li><span class="bag">KM</span> Qu&#224; tặng Ho&#224;ng H&#224;: Tặng g&#243;i bảo h&#224;nh Vipcare 1+1</li>
                                    <li><span class="bag">KM</span> Tặng G&#243;i bảo h&#224;nh Premium Service OPPO Find N3 Flip trị gi&#225; 1.200.000đ.</li>
                                    <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                                </ul>
                            </a>
                        </div>
                    </div>
                    <div class="item">

                        <div class="img">
                            <a href="/dien-thoai-di-dong/apple-iphone-15-pro-max-1tb-chinh-hang-vn-a" title="iPhone 15 Pro Max (1TB) - Chính h&#227;ng VN/A">
                                <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/09/13/iphone-15-pro-max-natural-titanium-pure-back-iphone-15-pro-max-natural-titanium-pure-front-2up-screen-usen-1.png" alt="iPhone 15 Pro Max (1TB) - Chính h&#227;ng VN/A" title="iPhone 15 Pro Max (1TB) - Chính h&#227;ng VN/A">
                            </a>
                        </div>


                        <div class="sticker sticker-left">
                            <span><img src="/Content/web/sticker/apple.png
" title="Chính h&#227;ng Apple" /></span>
                        </div>



                        <div class="info">
                            <a href="/dien-thoai-di-dong/apple-iphone-15-pro-max-1tb-chinh-hang-vn-a" class="title" title="iPhone 15 Pro Max (1TB) - Chính h&#227;ng VN/A">iPhone 15 Pro Max (1TB) - Chính h&#227;ng VN/A</a>
                            <span class="price">
                                <strong>44,490,000 ₫</strong>
                            </span>



                            <div style="padding-top:8px; font-style:italic; text-align:left;">
                                <label>Giá lên đời từ: <strong class="text-red">42,490,000 ₫</strong></label>
                            </div>
                        </div>




                        <div class="note">
                            <span class="bag">KM</span> <label title="ZaloPay - Giảm th&#234;m 550.000đ cho đơn h&#224;ng mua iPhone 15 series (&#193;p dụng với ho&#225; đơn tr&#234;n 20 Triệu).">ZaloPay - Giảm th&#234;m 550.000đ cho đơ...</label>
                            <strong class="text-orange">VÀ 7 KM KHÁC</strong>
                        </div>
                        <div class="promote">
                            <a href="/dien-thoai-di-dong/apple-iphone-15-pro-max-1tb-chinh-hang-vn-a">
                                <ul>
                                    <li><span class="bag">KM</span> ZaloPay - Giảm th&#234;m 550.000đ cho đơn h&#224;ng mua iPhone 15 series (&#193;p dụng với ho&#225; đơn tr&#234;n 20 Triệu).</li>
                                    <li><span class="bag">KM</span> Giảm th&#234;m 30% gi&#225; trị m&#225;y cũ, tối đa 2.000.000đ khi tham gia thu cũ, đổi mới iPhone 15 Series.</li>
                                    <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                                </ul>
                            </a>
                        </div>
                    </div>
                    <div class="item">

                        <div class="img">
                            <a href="/dien-thoai-di-dong/apple-iphone-15-pro-max-512gb-chinh-hang-vn-a" title="iPhone 15 Pro Max (512GB) - Chính h&#227;ng VN/A">
                                <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/09/13/iphone-15-pro-max-natural-titanium-pure-back-iphone-15-pro-max-natural-titanium-pure-front-2up-screen-usen-1.png" alt="iPhone 15 Pro Max (512GB) - Chính h&#227;ng VN/A" title="iPhone 15 Pro Max (512GB) - Chính h&#227;ng VN/A">
                            </a>
                        </div>


                        <div class="sticker sticker-left">
                            <span><img src="/Content/web/sticker/apple.png
" title="Chính h&#227;ng Apple" /></span>
                        </div>



                        <div class="info">
                            <a href="/dien-thoai-di-dong/apple-iphone-15-pro-max-512gb-chinh-hang-vn-a" class="title" title="iPhone 15 Pro Max (512GB) - Chính h&#227;ng VN/A">iPhone 15 Pro Max (512GB) - Chính h&#227;ng VN/A</a>
                            <span class="price">
                                <strong>38,990,000 ₫</strong>
                            </span>



                            <div style="padding-top:8px; font-style:italic; text-align:left;">
                                <label>Giá lên đời từ: <strong class="text-red">36,990,000 ₫</strong></label>
                            </div>
                        </div>




                        <div class="note">
                            <span class="bag">KM</span> <label title="ZaloPay - Giảm th&#234;m 550.000đ cho đơn h&#224;ng mua iPhone 15 series (&#193;p dụng với ho&#225; đơn tr&#234;n 20 Triệu).">ZaloPay - Giảm th&#234;m 550.000đ cho đơ...</label>
                            <strong class="text-orange">VÀ 7 KM KHÁC</strong>
                        </div>
                        <div class="promote">
                            <a href="/dien-thoai-di-dong/apple-iphone-15-pro-max-512gb-chinh-hang-vn-a">
                                <ul>
                                    <li><span class="bag">KM</span> ZaloPay - Giảm th&#234;m 550.000đ cho đơn h&#224;ng mua iPhone 15 series (&#193;p dụng với ho&#225; đơn tr&#234;n 20 Triệu).</li>
                                    <li><span class="bag">KM</span> Giảm th&#234;m 30% gi&#225; trị m&#225;y cũ, tối đa 2.000.000đ khi tham gia thu cũ, đổi mới iPhone 15 Series.</li>
                                    <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                                </ul>
                            </a>
                        </div>
                    </div>
                    <div class="item">

                        <div class="img">
                            <a href="/dien-thoai-di-dong/apple-iphone-15-pro-max-256gb-chinh-hang-vn-a" title="iPhone 15 Pro Max (256GB) - Chính h&#227;ng VN/A">
                                <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/09/13/iphone-15-pro-max-natural-titanium-pure-back-iphone-15-pro-max-natural-titanium-pure-front-2up-screen-usen-1.png" alt="iPhone 15 Pro Max (256GB) - Chính h&#227;ng VN/A" title="iPhone 15 Pro Max (256GB) - Chính h&#227;ng VN/A">
                            </a>
                        </div>


                        <div class="sticker sticker-left">
                            <span><img src="/Content/web/sticker/apple.png
" title="Chính h&#227;ng Apple" /></span>
                        </div>



                        <div class="info">
                            <a href="/dien-thoai-di-dong/apple-iphone-15-pro-max-256gb-chinh-hang-vn-a" class="title" title="iPhone 15 Pro Max (256GB) - Chính h&#227;ng VN/A">iPhone 15 Pro Max (256GB) - Chính h&#227;ng VN/A</a>
                            <span class="price">
                                <strong>32,490,000 ₫</strong>
                            </span>



                            <div style="padding-top:8px; font-style:italic; text-align:left;">
                                <label>Giá lên đời từ: <strong class="text-red">30,490,000 ₫</strong></label>
                            </div>
                        </div>




                        <div class="note">
                            <span class="bag">KM</span> <label title="ZaloPay - Giảm th&#234;m 550.000đ cho đơn h&#224;ng mua iPhone 15 series (&#193;p dụng với ho&#225; đơn tr&#234;n 20 Triệu).">ZaloPay - Giảm th&#234;m 550.000đ cho đơ...</label>
                            <strong class="text-orange">VÀ 7 KM KHÁC</strong>
                        </div>
                        <div class="promote">
                            <a href="/dien-thoai-di-dong/apple-iphone-15-pro-max-256gb-chinh-hang-vn-a">
                                <ul>
                                    <li><span class="bag">KM</span> ZaloPay - Giảm th&#234;m 550.000đ cho đơn h&#224;ng mua iPhone 15 series (&#193;p dụng với ho&#225; đơn tr&#234;n 20 Triệu).</li>
                                    <li><span class="bag">KM</span> Giảm th&#234;m 30% gi&#225; trị m&#225;y cũ, tối đa 2.000.000đ khi tham gia thu cũ, đổi mới iPhone 15 Series.</li>
                                    <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                                </ul>
                            </a>
                        </div>
                    </div>
                    <div class="item">

                        <div class="img">
                            <a href="/dien-thoai-di-dong/apple-iphone-15-pro-512gb-chinh-hang-vn-a" title="iPhone 15 Pro (512GB) - Chính h&#227;ng VN/A">
                                <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/09/13/iphone-15-pro-finish-select-202309-6-7inch-naturaltitanium-removebg-preview-1.png" alt="iPhone 15 Pro (512GB) - Chính h&#227;ng VN/A" title="iPhone 15 Pro (512GB) - Chính h&#227;ng VN/A">
                            </a>
                        </div>


                        <div class="sticker sticker-left">
                            <span><img src="/Content/web/sticker/apple.png
" title="Chính h&#227;ng Apple" /></span>
                        </div>



                        <div class="info">
                            <a href="/dien-thoai-di-dong/apple-iphone-15-pro-512gb-chinh-hang-vn-a" class="title" title="iPhone 15 Pro (512GB) - Chính h&#227;ng VN/A">iPhone 15 Pro (512GB) - Chính h&#227;ng VN/A</a>
                            <span class="price">
                                <strong>36,490,000 ₫</strong>
                            </span>



                            <div style="padding-top:8px; font-style:italic; text-align:left;">
                                <label>Giá lên đời từ: <strong class="text-red">34,490,000 ₫</strong></label>
                            </div>
                        </div>




                        <div class="note">
                            <span class="bag">KM</span> <label title="ZaloPay - Giảm th&#234;m 550.000đ cho đơn h&#224;ng mua iPhone 15 series (&#193;p dụng với ho&#225; đơn tr&#234;n 20 Triệu).">ZaloPay - Giảm th&#234;m 550.000đ cho đơ...</label>
                            <strong class="text-orange">VÀ 7 KM KHÁC</strong>
                        </div>
                        <div class="promote">
                            <a href="/dien-thoai-di-dong/apple-iphone-15-pro-512gb-chinh-hang-vn-a">
                                <ul>
                                    <li><span class="bag">KM</span> ZaloPay - Giảm th&#234;m 550.000đ cho đơn h&#224;ng mua iPhone 15 series (&#193;p dụng với ho&#225; đơn tr&#234;n 20 Triệu).</li>
                                    <li><span class="bag">KM</span> Giảm th&#234;m 30% gi&#225; trị m&#225;y cũ, tối đa 2.000.000đ khi tham gia thu cũ, đổi mới iPhone 15 Series.</li>
                                    <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                                </ul>
                            </a>
                        </div>
                    </div>
                    <div class="item">

                        <div class="img">
                            <a href="/dien-thoai-di-dong/apple-iphone-15-pro-1tb-chinh-hang-vn-a" title="iPhone 15 Pro (1TB) - Chính h&#227;ng VN/A">
                                <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/09/13/iphone-15-pro-finish-select-202309-6-7inch-naturaltitanium-removebg-preview-1.png" alt="iPhone 15 Pro (1TB) - Chính h&#227;ng VN/A" title="iPhone 15 Pro (1TB) - Chính h&#227;ng VN/A">
                            </a>
                        </div>


                        <div class="sticker sticker-left">
                            <span><img src="/Content/web/sticker/apple.png
" title="Chính h&#227;ng Apple" /></span>
                        </div>



                        <div class="info">
                            <a href="/dien-thoai-di-dong/apple-iphone-15-pro-1tb-chinh-hang-vn-a" class="title" title="iPhone 15 Pro (1TB) - Chính h&#227;ng VN/A">iPhone 15 Pro (1TB) - Chính h&#227;ng VN/A</a>
                            <span class="price">
                                <strong>41,500,000 ₫</strong>
                            </span>



                            <div style="padding-top:8px; font-style:italic; text-align:left;">
                                <label>Giá lên đời từ: <strong class="text-red">39,500,000 ₫</strong></label>
                            </div>
                        </div>




                        <div class="note">
                            <span class="bag">KM</span> <label title="ZaloPay - Giảm th&#234;m 550.000đ cho đơn h&#224;ng mua iPhone 15 series (&#193;p dụng với ho&#225; đơn tr&#234;n 20 Triệu).">ZaloPay - Giảm th&#234;m 550.000đ cho đơ...</label>
                            <strong class="text-orange">VÀ 7 KM KHÁC</strong>
                        </div>
                        <div class="promote">
                            <a href="/dien-thoai-di-dong/apple-iphone-15-pro-1tb-chinh-hang-vn-a">
                                <ul>
                                    <li><span class="bag">KM</span> ZaloPay - Giảm th&#234;m 550.000đ cho đơn h&#224;ng mua iPhone 15 series (&#193;p dụng với ho&#225; đơn tr&#234;n 20 Triệu).</li>
                                    <li><span class="bag">KM</span> Giảm th&#234;m 30% gi&#225; trị m&#225;y cũ, tối đa 2.000.000đ khi tham gia thu cũ, đổi mới iPhone 15 Series.</li>
                                    <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                                </ul>
                            </a>
                        </div>
                    </div>
                    <div class="item">

                        <div class="img">
                            <a href="/dien-thoai-di-dong/apple-iphone-15-pro-256gb-chinh-hang-vn-a" title="iPhone 15 Pro (256GB) - Chính h&#227;ng VN/A">
                                <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/09/13/iphone-15-pro-finish-select-202309-6-7inch-naturaltitanium-removebg-preview-1.png" alt="iPhone 15 Pro (256GB) - Chính h&#227;ng VN/A" title="iPhone 15 Pro (256GB) - Chính h&#227;ng VN/A">
                            </a>
                        </div>


                        <div class="sticker sticker-left">
                            <span><img src="/Content/web/sticker/apple.png
" title="Chính h&#227;ng Apple" /></span>
                        </div>



                        <div class="info">
                            <a href="/dien-thoai-di-dong/apple-iphone-15-pro-256gb-chinh-hang-vn-a" class="title" title="iPhone 15 Pro (256GB) - Chính h&#227;ng VN/A">iPhone 15 Pro (256GB) - Chính h&#227;ng VN/A</a>
                            <span class="price">
                                <strong>29,990,000 ₫</strong>
                            </span>



                            <div style="padding-top:8px; font-style:italic; text-align:left;">
                                <label>Giá lên đời từ: <strong class="text-red">27,990,000 ₫</strong></label>
                            </div>
                        </div>




                        <div class="note">
                            <span class="bag">KM</span> <label title="ZaloPay - Giảm th&#234;m 550.000đ cho đơn h&#224;ng mua iPhone 15 series (&#193;p dụng với ho&#225; đơn tr&#234;n 20 Triệu).">ZaloPay - Giảm th&#234;m 550.000đ cho đơ...</label>
                            <strong class="text-orange">VÀ 7 KM KHÁC</strong>
                        </div>
                        <div class="promote">
                            <a href="/dien-thoai-di-dong/apple-iphone-15-pro-256gb-chinh-hang-vn-a">
                                <ul>
                                    <li><span class="bag">KM</span> ZaloPay - Giảm th&#234;m 550.000đ cho đơn h&#224;ng mua iPhone 15 series (&#193;p dụng với ho&#225; đơn tr&#234;n 20 Triệu).</li>
                                    <li><span class="bag">KM</span> Giảm th&#234;m 30% gi&#225; trị m&#225;y cũ, tối đa 2.000.000đ khi tham gia thu cũ, đổi mới iPhone 15 Series.</li>
                                    <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                                </ul>
                            </a>
                        </div>
                    </div>
                    <div class="item">

                        <div class="img">
                            <a href="/dien-thoai-di-dong/apple-iphone-15-pro-128gb-chinh-hang-vn-a" title="iPhone 15 Pro (128GB) - Chính h&#227;ng VN/A">
                                <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/09/13/iphone-15-pro-finish-select-202309-6-7inch-naturaltitanium-removebg-preview-1.png" alt="iPhone 15 Pro (128GB) - Chính h&#227;ng VN/A" title="iPhone 15 Pro (128GB) - Chính h&#227;ng VN/A">
                            </a>
                        </div>


                        <div class="sticker sticker-left">
                            <span><img src="/Content/web/sticker/apple.png
" title="Chính h&#227;ng Apple" /></span>
                        </div>



                        <div class="info">
                            <a href="/dien-thoai-di-dong/apple-iphone-15-pro-128gb-chinh-hang-vn-a" class="title" title="iPhone 15 Pro (128GB) - Chính h&#227;ng VN/A">iPhone 15 Pro (128GB) - Chính h&#227;ng VN/A</a>
                            <span class="price">
                                <strong>27,450,000 ₫</strong>
                            </span>



                            <div style="padding-top:8px; font-style:italic; text-align:left;">
                                <label>Giá lên đời từ: <strong class="text-red">25,450,000 ₫</strong></label>
                            </div>
                        </div>




                        <div class="note">
                            <span class="bag">KM</span> <label title="ZaloPay - Giảm th&#234;m 550.000đ cho đơn h&#224;ng mua iPhone 15 series (&#193;p dụng với ho&#225; đơn tr&#234;n 20 Triệu).">ZaloPay - Giảm th&#234;m 550.000đ cho đơ...</label>
                            <strong class="text-orange">VÀ 7 KM KHÁC</strong>
                        </div>
                        <div class="promote">
                            <a href="/dien-thoai-di-dong/apple-iphone-15-pro-128gb-chinh-hang-vn-a">
                                <ul>
                                    <li><span class="bag">KM</span> ZaloPay - Giảm th&#234;m 550.000đ cho đơn h&#224;ng mua iPhone 15 series (&#193;p dụng với ho&#225; đơn tr&#234;n 20 Triệu).</li>
                                    <li><span class="bag">KM</span> Giảm th&#234;m 30% gi&#225; trị m&#225;y cũ, tối đa 2.000.000đ khi tham gia thu cũ, đổi mới iPhone 15 Series.</li>
                                    <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                                </ul>
                            </a>
                        </div>
                    </div>
                    <div class="item">

                        <div class="img">
                            <a href="/dien-thoai-di-dong/apple-iphone-15-plus-256gb-chinh-hang-vn-a" title="iPhone 15 Plus (256GB) - Chính h&#227;ng VN/A">
                                <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/09/13/iphone-15-plus-blue-pure-back-iphone-15-plus-blue-pure-front-2up-screen-usen.png" alt="iPhone 15 Plus (256GB) - Chính h&#227;ng VN/A" title="iPhone 15 Plus (256GB) - Chính h&#227;ng VN/A">
                            </a>
                        </div>


                        <div class="sticker sticker-left">
                            <span><img src="/Content/web/sticker/apple.png
" title="Chính h&#227;ng Apple" /></span>
                        </div>



                        <div class="info">
                            <a href="/dien-thoai-di-dong/apple-iphone-15-plus-256gb-chinh-hang-vn-a" class="title" title="iPhone 15 Plus (256GB) - Chính h&#227;ng VN/A">iPhone 15 Plus (256GB) - Chính h&#227;ng VN/A</a>
                            <span class="price">
                                <strong>27,690,000 ₫</strong>
                            </span>



                            <div style="padding-top:8px; font-style:italic; text-align:left;">
                                <label>Giá lên đời từ: <strong class="text-red">25,690,000 ₫</strong></label>
                            </div>
                        </div>




                        <div class="note">
                            <span class="bag">KM</span> <label title="ZaloPay - Giảm th&#234;m 550.000đ cho đơn h&#224;ng mua iPhone 15 series (&#193;p dụng với ho&#225; đơn tr&#234;n 20 Triệu).">ZaloPay - Giảm th&#234;m 550.000đ cho đơ...</label>
                            <strong class="text-orange">VÀ 7 KM KHÁC</strong>
                        </div>
                        <div class="promote">
                            <a href="/dien-thoai-di-dong/apple-iphone-15-plus-256gb-chinh-hang-vn-a">
                                <ul>
                                    <li><span class="bag">KM</span> ZaloPay - Giảm th&#234;m 550.000đ cho đơn h&#224;ng mua iPhone 15 series (&#193;p dụng với ho&#225; đơn tr&#234;n 20 Triệu).</li>
                                    <li><span class="bag">KM</span> Giảm th&#234;m 30% gi&#225; trị m&#225;y cũ, tối đa 2.000.000đ khi tham gia thu cũ, đổi mới iPhone 15 Series.</li>
                                    <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                                </ul>
                            </a>
                        </div>
                    </div>
                    <div class="item">

                        <div class="img">
                            <a href="/dien-thoai-di-dong/apple-iphone-15-plus-512gb-chinh-hang-vn-a" title="iPhone 15 Plus (512GB) - Chính h&#227;ng VN/A">
                                <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/09/13/iphone-15-plus-blue-pure-back-iphone-15-plus-blue-pure-front-2up-screen-usen.png" alt="iPhone 15 Plus (512GB) - Chính h&#227;ng VN/A" title="iPhone 15 Plus (512GB) - Chính h&#227;ng VN/A">
                            </a>
                        </div>


                        <div class="sticker sticker-left">
                            <span><img src="/Content/web/sticker/apple.png
" title="Chính h&#227;ng Apple" /></span>
                        </div>



                        <div class="info">
                            <a href="/dien-thoai-di-dong/apple-iphone-15-plus-512gb-chinh-hang-vn-a" class="title" title="iPhone 15 Plus (512GB) - Chính h&#227;ng VN/A">iPhone 15 Plus (512GB) - Chính h&#227;ng VN/A</a>
                            <span class="price">
                                <strong>33,490,000 ₫</strong>
                            </span>



                            <div style="padding-top:8px; font-style:italic; text-align:left;">
                                <label>Giá lên đời từ: <strong class="text-red">31,490,000 ₫</strong></label>
                            </div>
                        </div>




                        <div class="note">
                            <span class="bag">KM</span> <label title="ZaloPay - Giảm th&#234;m 550.000đ cho đơn h&#224;ng mua iPhone 15 series (&#193;p dụng với ho&#225; đơn tr&#234;n 20 Triệu).">ZaloPay - Giảm th&#234;m 550.000đ cho đơ...</label>
                            <strong class="text-orange">VÀ 7 KM KHÁC</strong>
                        </div>
                        <div class="promote">
                            <a href="/dien-thoai-di-dong/apple-iphone-15-plus-512gb-chinh-hang-vn-a">
                                <ul>
                                    <li><span class="bag">KM</span> ZaloPay - Giảm th&#234;m 550.000đ cho đơn h&#224;ng mua iPhone 15 series (&#193;p dụng với ho&#225; đơn tr&#234;n 20 Triệu).</li>
                                    <li><span class="bag">KM</span> Giảm th&#234;m 30% gi&#225; trị m&#225;y cũ, tối đa 2.000.000đ khi tham gia thu cũ, đổi mới iPhone 15 Series.</li>
                                    <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                                </ul>
                            </a>
                        </div>
                    </div>
                    <div class="item">

                        <div class="img">
                            <a href="/dien-thoai-di-dong/apple-iphone-15-plus-128gb-chinh-hang-vn-a" title="iPhone 15 Plus (128GB) - Chính h&#227;ng VN/A">
                                <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/09/13/iphone-15-plus-blue-pure-back-iphone-15-plus-blue-pure-front-2up-screen-usen.png" alt="iPhone 15 Plus (128GB) - Chính h&#227;ng VN/A" title="iPhone 15 Plus (128GB) - Chính h&#227;ng VN/A">
                            </a>
                        </div>


                        <div class="sticker sticker-left">
                            <span><img src="/Content/web/sticker/apple.png
" title="Chính h&#227;ng Apple" /></span>
                        </div>



                        <div class="info">
                            <a href="/dien-thoai-di-dong/apple-iphone-15-plus-128gb-chinh-hang-vn-a" class="title" title="iPhone 15 Plus (128GB) - Chính h&#227;ng VN/A">iPhone 15 Plus (128GB) - Chính h&#227;ng VN/A</a>
                            <span class="price">
                                <strong>24,990,000 ₫</strong>
                            </span>



                            <div style="padding-top:8px; font-style:italic; text-align:left;">
                                <label>Giá lên đời từ: <strong class="text-red">22,990,000 ₫</strong></label>
                            </div>
                        </div>




                        <div class="note">
                            <span class="bag">KM</span> <label title="ZaloPay - Giảm th&#234;m 550.000đ cho đơn h&#224;ng mua iPhone 15 series (&#193;p dụng với ho&#225; đơn tr&#234;n 20 Triệu).">ZaloPay - Giảm th&#234;m 550.000đ cho đơ...</label>
                            <strong class="text-orange">VÀ 7 KM KHÁC</strong>
                        </div>
                        <div class="promote">
                            <a href="/dien-thoai-di-dong/apple-iphone-15-plus-128gb-chinh-hang-vn-a">
                                <ul>
                                    <li><span class="bag">KM</span> ZaloPay - Giảm th&#234;m 550.000đ cho đơn h&#224;ng mua iPhone 15 series (&#193;p dụng với ho&#225; đơn tr&#234;n 20 Triệu).</li>
                                    <li><span class="bag">KM</span> Giảm th&#234;m 30% gi&#225; trị m&#225;y cũ, tối đa 2.000.000đ khi tham gia thu cũ, đổi mới iPhone 15 Series.</li>
                                    <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                                </ul>
                            </a>
                        </div>
                    </div>
                    <div class="item">

                        <div class="img">
                            <a href="/dien-thoai-di-dong/apple-iphone-15-512gb-chinh-hang-vn-a" title="iPhone 15 (512GB) - Chính h&#227;ng VN/A">
                                <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/09/13/iphone-15-pink-pure-back-iphone-15-pink-pure-front-2up-screen-usen.png" alt="iPhone 15 (512GB) - Chính h&#227;ng VN/A" title="iPhone 15 (512GB) - Chính h&#227;ng VN/A">
                            </a>
                        </div>


                        <div class="sticker sticker-left">
                            <span><img src="/Content/web/sticker/apple.png
" title="Chính h&#227;ng Apple" /></span>
                        </div>



                        <div class="info">
                            <a href="/dien-thoai-di-dong/apple-iphone-15-512gb-chinh-hang-vn-a" class="title" title="iPhone 15 (512GB) - Chính h&#227;ng VN/A">iPhone 15 (512GB) - Chính h&#227;ng VN/A</a>
                            <span class="price">
                                <strong>30,490,000 ₫</strong>
                            </span>



                            <div style="padding-top:8px; font-style:italic; text-align:left;">
                                <label>Giá lên đời từ: <strong class="text-red">28,490,000 ₫</strong></label>
                            </div>
                        </div>




                        <div class="note">
                            <span class="bag">KM</span> <label title="ZaloPay - Giảm th&#234;m 550.000đ cho đơn h&#224;ng mua iPhone 15 series (&#193;p dụng với ho&#225; đơn tr&#234;n 20 Triệu).">ZaloPay - Giảm th&#234;m 550.000đ cho đơ...</label>
                            <strong class="text-orange">VÀ 7 KM KHÁC</strong>
                        </div>
                        <div class="promote">
                            <a href="/dien-thoai-di-dong/apple-iphone-15-512gb-chinh-hang-vn-a">
                                <ul>
                                    <li><span class="bag">KM</span> ZaloPay - Giảm th&#234;m 550.000đ cho đơn h&#224;ng mua iPhone 15 series (&#193;p dụng với ho&#225; đơn tr&#234;n 20 Triệu).</li>
                                    <li><span class="bag">KM</span> Giảm th&#234;m 30% gi&#225; trị m&#225;y cũ, tối đa 2.000.000đ khi tham gia thu cũ, đổi mới iPhone 15 Series.</li>
                                    <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                                </ul>
                            </a>
                        </div>
                    </div>
                    <div class="item">

                        <div class="img">
                            <a href="/dien-thoai-di-dong/apple-iphone-15-128gb-chinh-hang-vn-a" title="iPhone 15 (128GB) - Chính h&#227;ng VN/A">
                                <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/09/13/iphone-15-pink-pure-back-iphone-15-pink-pure-front-2up-screen-usen.png" alt="iPhone 15 (128GB) - Chính h&#227;ng VN/A" title="iPhone 15 (128GB) - Chính h&#227;ng VN/A">
                            </a>
                        </div>


                        <div class="sticker sticker-left">
                            <span><img src="/Content/web/sticker/apple.png
" title="Chính h&#227;ng Apple" /></span>
                        </div>



                        <div class="info">
                            <a href="/dien-thoai-di-dong/apple-iphone-15-128gb-chinh-hang-vn-a" class="title" title="iPhone 15 (128GB) - Chính h&#227;ng VN/A">iPhone 15 (128GB) - Chính h&#227;ng VN/A</a>
                            <span class="price">
                                <strong>21,590,000 ₫</strong>
                            </span>



                            <div style="padding-top:8px; font-style:italic; text-align:left;">
                                <label>Giá lên đời từ: <strong class="text-red">19,590,000 ₫</strong></label>
                            </div>
                        </div>




                        <div class="note">
                            <span class="bag">KM</span> <label title="ZaloPay - Giảm th&#234;m 550.000đ cho đơn h&#224;ng mua iPhone 15 series (&#193;p dụng với ho&#225; đơn tr&#234;n 20 Triệu).">ZaloPay - Giảm th&#234;m 550.000đ cho đơ...</label>
                            <strong class="text-orange">VÀ 7 KM KHÁC</strong>
                        </div>
                        <div class="promote">
                            <a href="/dien-thoai-di-dong/apple-iphone-15-128gb-chinh-hang-vn-a">
                                <ul>
                                    <li><span class="bag">KM</span> ZaloPay - Giảm th&#234;m 550.000đ cho đơn h&#224;ng mua iPhone 15 series (&#193;p dụng với ho&#225; đơn tr&#234;n 20 Triệu).</li>
                                    <li><span class="bag">KM</span> Giảm th&#234;m 30% gi&#225; trị m&#225;y cũ, tối đa 2.000.000đ khi tham gia thu cũ, đổi mới iPhone 15 Series.</li>
                                    <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                                </ul>
                            </a>
                        </div>
                    </div>
                    <div class="item">

                        <div class="img">
                            <a href="/dien-thoai-di-dong/apple-iphone-15-256gb-chinh-hang-vn-a" title="iPhone 15 (256GB) - Chính h&#227;ng VN/A">
                                <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/09/13/iphone-15-pink-pure-back-iphone-15-pink-pure-front-2up-screen-usen.png" alt="iPhone 15 (256GB) - Chính h&#227;ng VN/A" title="iPhone 15 (256GB) - Chính h&#227;ng VN/A">
                            </a>
                        </div>


                        <div class="sticker sticker-left">
                            <span><img src="/Content/web/sticker/apple.png
" title="Chính h&#227;ng Apple" /></span>
                        </div>



                        <div class="info">
                            <a href="/dien-thoai-di-dong/apple-iphone-15-256gb-chinh-hang-vn-a" class="title" title="iPhone 15 (256GB) - Chính h&#227;ng VN/A">iPhone 15 (256GB) - Chính h&#227;ng VN/A</a>
                            <span class="price">
                                <strong>24,390,000 ₫</strong>
                            </span>



                            <div style="padding-top:8px; font-style:italic; text-align:left;">
                                <label>Giá lên đời từ: <strong class="text-red">22,390,000 ₫</strong></label>
                            </div>
                        </div>




                        <div class="note">
                            <span class="bag">KM</span> <label title="ZaloPay - Giảm th&#234;m 550.000đ cho đơn h&#224;ng mua iPhone 15 series (&#193;p dụng với ho&#225; đơn tr&#234;n 20 Triệu).">ZaloPay - Giảm th&#234;m 550.000đ cho đơ...</label>
                            <strong class="text-orange">VÀ 7 KM KHÁC</strong>
                        </div>
                        <div class="promote">
                            <a href="/dien-thoai-di-dong/apple-iphone-15-256gb-chinh-hang-vn-a">
                                <ul>
                                    <li><span class="bag">KM</span> ZaloPay - Giảm th&#234;m 550.000đ cho đơn h&#224;ng mua iPhone 15 series (&#193;p dụng với ho&#225; đơn tr&#234;n 20 Triệu).</li>
                                    <li><span class="bag">KM</span> Giảm th&#234;m 30% gi&#225; trị m&#225;y cũ, tối đa 2.000.000đ khi tham gia thu cũ, đổi mới iPhone 15 Series.</li>
                                    <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                                </ul>
                            </a>
                        </div>
                    </div>
                    <div class="item">

                        <div class="img">
                            <a href="/dien-thoai-di-dong/nokia-c21-plus-2gb-32gb-chinh-hang" title="Nokia C21 Plus (2GB/32GB) - Chính h&#227;ng">
                                <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2022/05/07/image-removebg-preview_637875529202208799.png" alt="Nokia C21 Plus (2GB/32GB) - Chính h&#227;ng" title="Nokia C21 Plus (2GB/32GB) - Chính h&#227;ng">
                            </a>
                        </div>




                        <span class="sales">
                            <i class="icon-flash2"></i> Giảm 240,000 ₫
                        </span>

                        <div class="info">
                            <a href="/dien-thoai-di-dong/nokia-c21-plus-2gb-32gb-chinh-hang" class="title" title="Nokia C21 Plus (2GB/32GB) - Chính h&#227;ng">Nokia C21 Plus (2GB/32GB) - Chính h&#227;ng</a>
                            <span class="price">
                                <strong>1,650,000 ₫</strong>
                                <strike>1,890,000 ₫</strike>
                            </span>



                        </div>




                        <div class="note">
                            <span class="bag">KM</span> <label title="Nhận th&#234;m 12 th&#225;ng bảo h&#224;nh chính h&#227;ng chỉ với 90.000đ">Nhận th&#234;m 12 th&#225;ng bảo h&#224;nh chính h...</label>
                            <strong class="text-orange">VÀ 9 KM KHÁC</strong>
                        </div>
                        <div class="promote">
                            <a href="/dien-thoai-di-dong/nokia-c21-plus-2gb-32gb-chinh-hang">
                                <ul>
                                    <li><span class="bag">KM</span> Nhận th&#234;m 12 th&#225;ng bảo h&#224;nh chính h&#227;ng chỉ với 90.000đ</li>
                                    <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                                    <li><span class="bag">KM</span> VPBank - Mở thẻ VPBank, Ưu đ&#227;i tới 250.000đ.</li>
                                </ul>
                            </a>
                        </div>
                    </div>
                    <div class="item">

                        <div class="img">
                            <a href="/dien-thoai-di-dong/nokia-c21-plus-2gb-64gb-chinh-hang" title="Nokia C21 Plus (2GB/64GB) - Chính h&#227;ng">
                                <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2022/05/07/image-removebg-preview_637875529202208799.png" alt="Nokia C21 Plus (2GB/64GB) - Chính h&#227;ng" title="Nokia C21 Plus (2GB/64GB) - Chính h&#227;ng">
                            </a>
                        </div>




                        <span class="sales">
                            <i class="icon-flash2"></i> Giảm 1,110,000 ₫
                        </span>

                        <div class="info">
                            <a href="/dien-thoai-di-dong/nokia-c21-plus-2gb-64gb-chinh-hang" class="title" title="Nokia C21 Plus (2GB/64GB) - Chính h&#227;ng">Nokia C21 Plus (2GB/64GB) - Chính h&#227;ng</a>
                            <span class="price">
                                <strong>1,780,000 ₫</strong>
                                <strike>2,890,000 ₫</strike>
                            </span>



                        </div>




                        <div class="note">
                            <span class="bag">KM</span> <label title="Nhận th&#234;m 12 th&#225;ng bảo h&#224;nh chính h&#227;ng chỉ với 90.000đ">Nhận th&#234;m 12 th&#225;ng bảo h&#224;nh chính h...</label>
                            <strong class="text-orange">VÀ 9 KM KHÁC</strong>
                        </div>
                        <div class="promote">
                            <a href="/dien-thoai-di-dong/nokia-c21-plus-2gb-64gb-chinh-hang">
                                <ul>
                                    <li><span class="bag">KM</span> Nhận th&#234;m 12 th&#225;ng bảo h&#224;nh chính h&#227;ng chỉ với 90.000đ</li>
                                    <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                                    <li><span class="bag">KM</span> VPBank - Mở thẻ VPBank, Ưu đ&#227;i tới 250.000đ.</li>
                                </ul>
                            </a>
                        </div>
                    </div>
                    <div class="item">

                        <div class="img">
                            <a href="/dien-thoai-di-dong/samsung-galaxy-s23-8gb-128gb-chinh-hang" title="Samsung Galaxy S23 - 8GB/128GB - Chính h&#227;ng">
                                <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/02/02/image-removebg-preview-2.png" alt="Samsung Galaxy S23 - 8GB/128GB - Chính h&#227;ng" title="Samsung Galaxy S23 - 8GB/128GB - Chính h&#227;ng">
                            </a>
                        </div>




                        <span class="sales">
                            <i class="icon-flash2"></i> Giảm 7,000,000 ₫
                        </span>

                        <div class="info">
                            <a href="/dien-thoai-di-dong/samsung-galaxy-s23-8gb-128gb-chinh-hang" class="title" title="Samsung Galaxy S23 - 8GB/128GB - Chính h&#227;ng">Samsung Galaxy S23 - 8GB/128GB - Chính h&#227;ng</a>
                            <span class="price">
                                <strong>15,990,000 ₫</strong>
                                <strike>22,990,000 ₫</strike>
                            </span>



                        </div>




                        <div class="note">
                            <span class="bag">KM</span> <label title="Trả g&#243;p tới 12 th&#225;ng kh&#244;ng l&#227;i, trả trước 0 đồng với Samsung Finance+">Trả g&#243;p tới 12 th&#225;ng kh&#244;ng l&#227;i, trả...</label>
                            <strong class="text-orange">VÀ 10 KM KHÁC</strong>
                        </div>
                        <div class="promote">
                            <a href="/dien-thoai-di-dong/samsung-galaxy-s23-8gb-128gb-chinh-hang">
                                <ul>
                                    <li><span class="bag">KM</span> Trả g&#243;p tới 12 th&#225;ng kh&#244;ng l&#227;i, trả trước 0 đồng với Samsung Finance+</li>
                                    <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                                    <li><span class="bag">KM</span> VPBank - Mở thẻ VPBank, Ưu đ&#227;i tới 250.000đ.</li>
                                </ul>
                            </a>
                        </div>
                    </div>
                    <div class="item">

                        <div class="img">
                            <a href="/dien-thoai-di-dong/samsung-galaxy-s23-ultra-12gb-1tb-chinh-hang" title="Samsung Galaxy S23 Ultra 12GB/1TB - Chính h&#227;ng">
                                <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/06/01/samsung-galaxy-s23-ultra.png" alt="Samsung Galaxy S23 Ultra 12GB/1TB - Chính h&#227;ng" title="Samsung Galaxy S23 Ultra 12GB/1TB - Chính h&#227;ng">
                            </a>
                        </div>





                        <div class="info">
                            <a href="/dien-thoai-di-dong/samsung-galaxy-s23-ultra-12gb-1tb-chinh-hang" class="title" title="Samsung Galaxy S23 Ultra 12GB/1TB - Chính h&#227;ng">Samsung Galaxy S23 Ultra 12GB/1TB - Chính h&#227;ng</a>
                            <span class="price">
                                <strong>44,990,000 ₫</strong>
                                <strike>44,990,000 ₫</strike>
                            </span>



                        </div>




                        <div class="note">
                            <span class="bag">KM</span> <label title="Trả g&#243;p tới 12 th&#225;ng kh&#244;ng l&#227;i, trả trước 0 đồng với Samsung Finance+">Trả g&#243;p tới 12 th&#225;ng kh&#244;ng l&#227;i, trả...</label>
                            <strong class="text-orange">VÀ 11 KM KHÁC</strong>
                        </div>
                        <div class="promote">
                            <a href="/dien-thoai-di-dong/samsung-galaxy-s23-ultra-12gb-1tb-chinh-hang">
                                <ul>
                                    <li><span class="bag">KM</span> Trả g&#243;p tới 12 th&#225;ng kh&#244;ng l&#227;i, trả trước 0 đồng với Samsung Finance+</li>
                                    <li><span class="bag">KM</span> Giảm th&#234;m 9.000.000đ v&#224; Tặng th&#234;m PMH 4.000.000đ</li>
                                    <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                                </ul>
                            </a>
                        </div>
                    </div>
                    <div class="item">

                        <div class="img">
                            <a href="/dien-thoai-di-dong/samsung-galaxy-z-fold-6-chinh-hang" title="Samsung Galaxy Z Fold6 ">
                                <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/07/27/z-fold5.png" alt="Samsung Galaxy Z Fold6 " title="Samsung Galaxy Z Fold6 ">
                            </a>
                        </div>





                        <div class="info">
                            <a href="/dien-thoai-di-dong/samsung-galaxy-z-fold-6-chinh-hang" class="title" title="Samsung Galaxy Z Fold6 ">Samsung Galaxy Z Fold6 </a>
                            <span class="price">
                                <strong>Liên hệ</strong>
                            </span>



                        </div>




                        <div class="note">
                            <span class="bag">KM</span> <label title="Trả g&#243;p tới 12 th&#225;ng kh&#244;ng l&#227;i, trả trước 0 đồng với Samsung Finance+">Trả g&#243;p tới 12 th&#225;ng kh&#244;ng l&#227;i, trả...</label>
                            <strong class="text-orange">VÀ 5 KM KHÁC</strong>
                        </div>
                        <div class="promote">
                            <a href="/dien-thoai-di-dong/samsung-galaxy-z-fold-6-chinh-hang">
                                <ul>
                                    <li><span class="bag">KM</span> Trả g&#243;p tới 12 th&#225;ng kh&#244;ng l&#227;i, trả trước 0 đồng với Samsung Finance+</li>
                                    <li><span class="bag">KM</span> Home PayLater - Trả g&#243;p qua Home PayLater giảm tới 1.000.000đ</li>
                                    <li><span class="bag">KM</span> ZaloPay - Ưu đ&#227;i tới 300.000đ khi thanh to&#225;n qua ZaloPay.</li>
                                </ul>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div id="page-holder"></div>

            <div class="more-product" id="page-pager">
                <a href="javascript:getPage(2)">Xem thêm 165 sản phẩm</a>
            </div>


        </div>
    </section>
    <section>
        <div class="container">
            <div class="page-content page-content-img">
                <p><br></p>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>
                                <p style="margin: 0in 0in 6pt; text-align: justify; line-height: 150%; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><span style="font-size: 12pt; line-height: 150%; font-family: Arial, sans-serif;">Smartphone
                                        hay còn được biết tới là một loại điện thoại di động với hệ điều hành được tích
                                        hợp khiến cho 1 chiếc điện thoại trở nên đa công dụng hơn rất nhiều. Điện thoại
                                        di động từ trước đến nay phát triển theo 2 xu hướng. 1 là rất nhỏ, tiên lợi
                                        mang đi mọi nơi. 2 là to như chiếc tablet kết hợp giữa điện thoại và máy tính.
                                        Những chiếc điện thoại di động thường bỏ túi, thường được kết hợp các tính năng
                                        của một chiếc điện thoại thông thường như nghe và thực hiện các cuộc gọi thông
                                        thường, nhận tin nhắc văn bản và các tính năng phổ biến khác như là máy nghe
                                        nhạc, lịch, máy tính, trò chơi, máy ảnh và cả quáy quay video nữa, Hầu hết
                                        những chiếc điện thoại di động hiện nay đều có thể truy cập internet và cài đặt
                                        được nhiều ứng dụng từ bên thứ 3 trong CH play hay Appstore.&nbsp;</span>
                                    <o:p></o:p>
                                </p>
                                <p style="margin: 0in 0in 6pt; text-align: justify; line-height: 150%; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><span style="font-size: 12pt; line-height: 150%; font-family: Arial, sans-serif;">Điện thoại di động chính thức ra mắt và được chấp nhận từ năm
                                        1999 và được sử dụng phổ biến từ năm 2000. Hầu hết những chiếc điện thoại di
                                        động sản xuất từ năm 2012 trở đi đều có thể sử dụng 3G và 4G. Tính cho tới quý
                                        thứ 3 của năm 2012 thì đã có 1 tỷ chiếc điện thoại được bán ra trên toàn thế
                                        giới. TÍnh đến năm đã có 65% người sử dụng điện thoại di động là smartphone.
                                        Đến năm 2016, con số này đã chiếm tới 79% trong thị trường di động. Và hiện
                                        nay, điện thoại di động đa phần chạy hệ điều hành IOS và Android.</span>
                                    <o:p></o:p>
                                </p>
                                <p style="margin: 0in 0in 6pt; text-align: justify; line-height: 150%; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><span style="font-size: 12pt; line-height: 150%; font-family: Arial, sans-serif;">Vào đầu năm 2007, Apple giới thiệu iPhone và đây là 1 trong
                                        những chiếc điện thoại di động smartphone đầu tiên có sử dụng cảm ứng đa giao
                                        diện. và iOS là hệ điều hành độc quyèn được phát hành bởi Apple và chỉ dành cho
                                        những chiếc iPhone mà hãng sản xuất ra. Những fan nhà Táo cũng đã thoát ra khỏi
                                        sự bó buộc vào máy tính khi hãng này đã cung cấp chương trình đồng bộ hóa dữ
                                        liệu người dùng thông qua iCloud. Tuy nhiên, iPhone hay iOS vẫn chỉ đứng thứ 2
                                        khi điện thoại di động sử dụng nhiều nhất vẫn là Android.</span></p>
                            </td>
                            <td>
                                <p><br></p>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <p style="margin-top:0in;margin-right:0in;margin-bottom:6.0pt;margin-left:0in;text-align:justify;line-height:150%"><span style="font-size: 12pt; line-height: 150%; font-family: Arial, sans-serif;">Android là hệ điều hành điện
                        thoại di động giá rẻ và phổ biến hơn cả do Tập đoàn Google phát triển. Cho đến
                        năm 2015 thì đã có tới 325 triệu chiếc điện thoại di động giá rẻ sử dụng hệ
                        điều hành Android, dẫn đầu trong số các nền tảng hệ điều hành. Và hãng <a href="https://hoanghamobile.com/dien-thoai-di-dong/samsung" target="_blank"><b>
                                <font color="#397b21">Samsung</font>
                            </b></a>
                        cũng là một trong những nhà sản xuất các thiết bị điện thoại di động giá rẻ
                        hàng đầu hiện nay. HIện nay ngành công nghệ điện thoại di động ngày càng phát
                        triển, trong một năm có tới hàng chục chiếc điện thoại di động mới được nghiên cứu
                        và phát hành ra ngoài thị trường. Ngoài ra, khi lựa chọn một chiếc điện thoại
                        di động chúng ta còn quá nhiều vấn đề cần phải xem xét tới. Ví như thời lượng
                        pin, chiếc điện thoại di động gí rẻ đó sử dụng loại chip gì, hay đơn giản là
                        loại điện thoại di động đó có những màu nào và loại điện thoại đó có nhiều phụ
                        kiện đi kèm hay không. Chọn được một chiếc điện thoại di động giá rẻ chất lượng
                        tốt cho bạn hay những người thân trong gia đình là một quyết định quan trọng.
                        Trước đó, Hoàng Hà Mobile đưa ra khẩu hiệu “Những gì chúng tôi không có, tức là
                        bạn không cần”. Hoàng Hà đưa ra rất nhiều sự lựa chọn cho bạn. một chiếc điện
                        thoại di động bền, đẹp, hay điện thoại di động giá rẻ lại có khả năng chống
                        nước chống bụi, có thẻ nhớ mở rộng và pin rất khỏe.</span>
                    <o:p></o:p>
                </p>
                <p style="text-align: justify; ">

                </p>
                <p style="margin: 0in 0in 6pt; text-align: justify; line-height: 150%;"><span style="font-size: 12pt; line-height: 150%; font-family: Arial, sans-serif;">Đưa ra
                        quyết định mua một chiếc điện thoại di động giá rẻ không hề dễ dàng. Nhưng hãy
                        để Hoàng Hà Mobile giúp bạn. Chúng tôi cung cấp mọi mặt hàng thiết bị di động
                        đủ loại hãng và phân khúc. Với sự lựa chọn là 1 chiếc điện thoại di động giá rẻ
                        smartphone bền và tốt thì bạn có thể lựa chọn Xiaomi hoặc Samsung cũng có rất
                        nhiều mẫu điện thoại thuộc phân khúc tầm trung chất lượng tốt. Hay nếu bạn tìm
                        kiếm những chiếc điện thoại di động chính hãng và giá rẻ thì Hoàng Hà cũng có
                        rất nhiều sự lựa chọn cho bạn. Đặc biệt là khi bạn có thể mua điện thoại với
                        mức giá vô cùng phải chăng khi tham gia gói mua hàng trả góp tại Hoàng Hà.
                        Hoàng Hà Mobile – Siêu thị điện thoại di động giá rẻ nhất, miễn phí vận chuyển
                        toàn quốc, bảo hành 12 tháng, trả góp 0%.</span>
                    <o:p></o:p>
                </p>
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
                        <strong>CHÍNH HÃNG</strong>
                    </div>
                </div>
                <div class="item">
                    <span class="icon">
                        <i class="icon-freeship"></i>
                    </span>
                    <div class="text">
                        <span>Miễn phí vận chuyển</span>
                        <strong>TOÀN QUỐC</strong>
                    </div>
                </div>
                <div class="item">
                    <span class="icon">
                        <i class="icon-hotline"></i>
                    </span>
                    <div class="text">
                        <span>Hotline hỗ trợ</span>
                        <strong>03.86.13.17.16</strong>
                    </div>
                </div>
                <div class="item">
                    <span class="icon">
                        <i class="icon-doitra"></i>
                    </span>
                    <div class="text">
                        <span>Thủ tục đổi trả</span>
                        <strong>DỄ DÀNG</strong>
                    </div>
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
        (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', 'assets/js/analytics.js', 'ga');

        ga('create', 'UA-1415779-10', 'auto');
        ga('require', 'GTM-KXZQBMD');
        ga('require', 'GTM-WPLRWHK');
        ga('send', 'pageview');
    </script>
    <!-- analytics -->
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-5QM3X2');
    </script>
    <!-- End Google Tag Manager -->
    <!-- subiz -->
    <script>
        ! function(s, u, b, i, z) {
            var o, t, r, y;
            s[i] || (s._sbzaccid = z, s[i] = function() {
                s[i].q.push(arguments)
            }, s[i].q = [], s[i]("setAccount", z), r = ["widget.subiz.net", "storage.googleapis" + (t = ".com"), "app.sbz.workers.dev", i + "a" + (o = function(k, t) {
                var n = t <= 6 ? 5 : o(k, t - 1) + o(k, t - 3);
                return k !== t ? n : n.toString(32)
            })(20, 20) + t, i + "b" + o(30, 30) + t, i + "c" + o(40, 40) + t], (y = function(k) {
                var t, n;
                s._subiz_init_2094850928430 || r[k] && (t = u.createElement(b), n = u.getElementsByTagName(b)[0], t.async = 1, t.src = "https://" + r[k] + "/sbz/app.js?accid=" + z, n.parentNode.insertBefore(t, n), setTimeout(y, 2e3, k + 1))
            })(0))
        }(window, document, "script", "subiz", "acqqrmpwwuqeianonpxt")
    </script>
    <!-- subiz -->
    <!-- accesstrade-->
    <script src="assets/js/tracking.min.js"></script>
    <script type="text/javascript">
        AT.init({
            "campaign_id": 626,
            "is_reoccur": 1,
            "is_lastclick": 1
        });
        AT.track();
    </script>
    <!-- accesstrade-->
    <script src="assets/js/main.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {


            $('#dien-thoai-di-dong').addClass('actived');

            hh_category();
        });

        function getPage(p) {
            var urlReq = '/dien-thoai-di-dong?p=' + p;
            $.get(urlReq, function(data) {
                $("#page-holder").append(data).hide().fadeIn(500);
            });

        }
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            showPopup(341);
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            showSticker(82);
        });
    </script>
    <script type="text/javascript">
        function removeStick() {
            sessionStorage.setItem('stickRemove', 1);
            $('.footer-stick-right').hide();
        }

        $(document).ready(function() {
            if (sessionStorage.getItem('stickRemove')) {
                $('.footer-stick-right').hide();
            } else {
                $('.footer-stick-right').show();
            }
        });
    </script>
</body>

</html>