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
                        <a id="btnCheckOrder" href="bang-dieu-khien.php?page=order">
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
    </header>
    
    <section>
        <div class="container">
            <div class="top-slider">
                <div id="jssor_1" class="jssor-1200" style="width:1200px; height:200px; padding-bottom:10px;">
                    <!-- Loading Screen -->
                    <div data-u="loading" class="jssor-spin">
                        <img src="/Content/web/img/spin.svg" />
                    </div>
                    <div data-u="slides" class="jssor-1200-container" style="width:1200px; height:200px;">
                        <?php
                            $sqlSlide = mysqli_query($conn,getSlide($conn));
                            while($itemSlide = mysqli_fetch_assoc($sqlSlide)){
                                ?>
                                    <div>
                                        <a target="_blank" href="" title="Infinix HOT 30"><img data-u="image" data-src2="admin/assets/images/banner/<?= $itemSlide['bannerImage'] ?>" title="<?= $itemSlide['bannerTitle'] ?>" /></a>
                                        <div u="thumb">
                                            <?= $itemSlide['bannerTitle'] ?>
                                        </div>
                                    </div>
                                <?php
                            }

                        ?>
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
                    <a itemprop="item" href="index.php"><span itemprop="name" content="Trang chủ"><i class="icon-home" title="Trang chủ"></i> Trang chủ</span></a>
                    <meta itemprop="position" content="1" />
                </li>

                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <i class="fa fa-angle-right"></i> <a itemprop="item" href="" title="" class="actived"><span itemprop="name" content=""><?php
                        if(isset($_GET['idCat']) ){
                            if($_GET['idCat']==1){echo "Điện Thoại";}
                            else if($_GET['idCat']==2){echo "Laptop";}
                            else if($_GET['idCat']==3){echo "Tablet";}
                            else if($_GET['idCat']==4){echo "Màn Hình";}
                            else if($_GET['idCat']==5){echo "Smart Tv";}
                            else if($_GET['idCat']==6){echo "Đồng Hồ";}
                            else if($_GET['idCat']==7){echo "Âm Thanh";}
                            else if($_GET['idCat']==8){echo "Samrt Home";}
                            else if($_GET['idCat']==16){echo "Phụ Kiện";}
                            else if($_GET['idCat']==17){echo "Đồ Chơi Công Nghệ";}
                            else if($_GET['idCat']==18){echo "Máy Trôi";}
                            else if($_GET['idCat']==19){echo "Sửa Chữa";}
                            else if($_GET['idCat']==20){echo "Dịch Vụ";}
                        }
                        
                    ?></span></a>
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
                            <a href="javascript:;">Giá<i class="icon-rightar"></i></a>
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
                </div>

                <div class="right">
                    <div class="facet">
                        <label>Sắp xếp <i class="icon-rightar"></i></label>
                        <div class="sub">
                            <ul>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22sort%22%3a%2212%22%7d&amp;search=true"><span class="fa fa-angle-right"></span> Mặc định</a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22sort%22%3a%221%22%7d&amp;search=true"><span class="fa fa-angle-right"></span> Sản phẩm mới - cũ</a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22sort%22%3a%222%22%7d&amp;search=true"><span class="fa fa-angle-right"></span> Giáthấp đến cao</a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22sort%22%3a%223%22%7d&amp;search=true"><span class="fa fa-angle-right"></span> Giácao đến thấp</a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22sort%22%3a%224%22%7d&amp;search=true"><span class="fa fa-angle-right"></span> Mới cập nhật</a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22sort%22%3a%225%22%7d&amp;search=true"><span class="fa fa-angle-right"></span> Sản phẩm cũ</a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22sort%22%3a%226%22%7d&amp;search=true"><span class="fa fa-angle-right"></span> Xem nhiều h&#244;m nay</a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22sort%22%3a%227%22%7d&amp;search=true"><span class="fa fa-angle-right"></span> Xem nhiều tuần này</a></li>
                                <li><a href="/dien-thoai-di-dong?filters=%7b%22sort%22%3a%228%22%7d&amp;search=true"><span class="fa fa-angle-right"></span> Xem nhiều th&#225;ng này</a></li>
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
                <h1>
                    <?php
                        if(isset($_GET['idCat']) ){
                            if($_GET['idCat']==1){echo "Điện Thoại";}
                            else if($_GET['idCat']==2){echo "Laptop";}
                            else if($_GET['idCat']==3){echo "Tablet";}
                            else if($_GET['idCat']==4){echo "Màn Hình";}
                            else if($_GET['idCat']==5){echo "Smart Tv";}
                            else if($_GET['idCat']==6){echo "Đồng Hồ";}
                            else if($_GET['idCat']==7){echo "Âm Thanh";}
                            else if($_GET['idCat']==8){echo "Samrt Home";}
                            else if($_GET['idCat']==16){echo "Phụ Kiện";}
                            else if($_GET['idCat']==17){echo "Đồ Chơi Công Nghệ";}
                            else if($_GET['idCat']==18){echo "Máy Trôi";}
                            else if($_GET['idCat']==19){echo "Sửa Chữa";}
                            else if($_GET['idCat']==20){echo "Dịch Vụ";}
                        }
                        
                    ?>
                </h1>
                <div class="col-content lts-product">
                    <?php
                        if(isset($_GET['idBrand'])){
                            $query = getListProduct($conn,$_GET['idCat'],$_GET['idBrand']);
                        }else{
                            $query = getListProduct($conn,$_GET['idCat'],0);
                        }
                        
                        while($itemProduct = mysqli_fetch_assoc($query) ){
                            ?>
                                <div class="item">
                                    <div class="img">
                                        <a href="chi-tiet-san-pham.php?idsanpham=<?=$itemProduct['idVersion']?>" title="<?=$itemProduct['versionName']?>">
                                            <?php
                                                if($itemProduct['idCategory']==1){
                                                    ?><img src="uploads/product/smartphone/<?=$itemProduct['versionImage']?>" alt="<?=$itemProduct['versionName']?>"><?php
                                                }else if($itemProduct['idCategory']==2){
                                                    ?><img src="uploads/product/laptop/<?=$itemProduct['versionImage']?>" alt="<?=$itemProduct['versionName']?>"><?php
                                                }else if($itemProduct['idCategory']==3){
                                                    ?><img src="uploads/product/tablet/<?=$itemProduct['versionImage']?>" alt="<?=$itemProduct['versionName']?>"><?php
                                                }else if($itemProduct['idCategory']==4){
                                                    ?><img src="uploads/product/monitor/<?=$itemProduct['versionImage']?>" alt="<?=$itemProduct['versionName']?>"><?php
                                                }else if($itemProduct['idCategory']==5){
                                                    ?><img src="uploads/product/smarttv/<?=$itemProduct['versionImage']?>" alt="<?=$itemProduct['versionName']?>"><?php
                                                }else if($itemProduct['idCategory']==6){
                                                    ?><img src="uploads/product/watch/<?=$itemProduct['versionImage']?>" alt="<?=$itemProduct['versionName']?>"><?php
                                                }else if($itemProduct['idCategory']==7){
                                                    ?><img src="uploads/product/voice/<?=$itemProduct['versionImage']?>" alt="<?=$itemProduct['versionName']?>"><?php
                                                }else if($itemProduct['idCategory']==8){
                                                    ?><img src="uploads/product/smarthome/<?=$itemProduct['versionImage']?>" alt="<?=$itemProduct['versionName']?>"><?php
                                                }else if($itemProduct['idCategory']==16){
                                                    ?><img src="uploads/product/accessory/?=$itemProduct['versionImage']?>" alt="<?=$itemProduct['versionName']?>"><?php
                                                }else if($itemProduct['idCategory']==17){
                                                    ?><img src="uploads/product/toys/<?=$itemProduct['versionImage']?>" alt="<?=$itemProduct['versionName']?>"><?php
                                                }else if($itemProduct['idCategory']==18){
                                                    ?><img src="uploads/product/driftingmachine/<?=$itemProduct['versionImage']?>" alt="<?=$itemProduct['versionName']?>"><?php
                                                }else if($itemProduct['idCategory']==19){
                                                    ?><img src="uploads/product/repair/<?=$itemProduct['versionImage']?>" alt="<?=$itemProduct['versionName']?>"><?php
                                                }else if($itemProduct['idCategory']==20){
                                                    ?><img src="uploads/product/service/<?=$itemProduct['versionImage']?>" alt="<?=$itemProduct['versionName']?>"><?php
                                                }
                                            ?>
                                        </a>
                                    </div>
                                    <div class="info">
                                        <a href="chi-tiet-san-pham.php?idsanpham=<?=$itemProduct['idVersion']?>" class="title" title="<?=$itemProduct['versionName']?>"><?=$itemProduct['versionName']?></a>
                                        <span class="price">
                                            <strong><?=number_format($itemProduct['versionPromotionalPrice'],0,"",".")?> ₫</strong>
                                        </span>

                                    </div>
                                    <div class="note">
                                        <span class="bag">KM</span> <label title="Quà tặng Hoàng Hà: Tặng gói bảo hành Vipcare 1+1">Quà tặng Hoàng Hà: Tặng gói bảo hàn...</label>
                                        <strong class="text-orange">VÀ 6 KM KHÁC</strong>
                                    </div>
                                    <div class="promote">
                                        <a href="chi-tiet-san-pham.php?idsanpham=<?=$itemProduct['idVersion']?>">
                                            <ul>
                                                <li><span class="bag">KM</span> Quà tặng Hoàng Hà: Tặng gói bảo hành Vipcare 1+1</li>
                                                <li><span class="bag">KM</span> Tặng Gói bảo hành Premium Service OPPO Find N3 trị giá2.500.000đ. </li>
                                                <li><span class="bag">KM</span> Home PayLater - Trả góp qua Home PayLater giảm tới 1.000.000đ</li>
                                            </ul>
                                        </a>
                                    </div>
                                </div>
                            <?php
                        }
                    ?>
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