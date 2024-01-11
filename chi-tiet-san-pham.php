<?php
require_once("config/config.php");
include 'handle.php';
if (isset($_GET['idsanpham'])) {
    $queryDetailProduct = mysqli_query($conn, getDetailProduct($_GET['idsanpham']));
    $itemDetailProduct = mysqli_fetch_assoc($queryDetailProduct);
}


// POST COMMENT
if (isset($_POST['submitComment'])) {
    $idsanpham = $_POST['idsanpham'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $content = $_POST['content'];
    $star = $_POST['star'];
    $date = date("Y-m-d H:i:s");
    if (isset($_SESSION['userId'])) {
        $userId = $_SESSION['userId'];
        $addComment = mysqli_query($conn, "INSERT INTO `tbl_comments`(`id`, `versionId`, `userId`, `name`, `phone`, `email`, `content`,`star`,`datetime`) VALUES (NULL,'$idsanpham', '$userId','$name','$phone','$email','$content','$star','$date')");
    } else {
        echo "<script>window.alert('Bạn cần đăng nhập để bình luận!');window.location.href = 'dang-nhap.php'</script>";
    }
}

// POST REP COMMENT
if (isset($_POST['btnRepComment'])) {
    $versionId = $_POST['versionId'];
    $commentId = $_POST['commentId'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $content = $_POST['content'];
    $date = date("Y-m-d H:i:s");
    $addRepComment = mysqli_query($conn, "INSERT INTO `tbl_repcomments`(`id`, `versionId`, `commentId`, `name`, `phone`, `email`, `content`, `time`, `permission`) VALUES (NULL,'$versionId','$commentId','$name','$phone','$email','$content','$date',2)");
    // echo "INSERT INTO `tbl_repcomments`(`id`, `versionId`, `commentId`, `name`, `phone`, `email`, `content`) VALUES (NULL,'$versionId','$commentId','$name','$phone','$email','$content')";
}

// LIKE
if (isset($_GET['like'])) {
    $prodId = $_GET['idsanpham'];
    $userId = $_SESSION['userId'];
    $sqlFavourite = mysqli_query($conn, "SELECT * FROM  tbl_favorite WHERE  productId = $prodId AND userId = $userId");
    if (mysqli_num_rows($sqlFavourite) == 0 && $_GET['like'] == "add") {
        $addLike = mysqli_query($conn, "INSERT INTO `tbl_favorite`(`id`, `productId`, `userId`, `status`) VALUES (NULL,'$prodId','$userId','2')");
    } else if ($_GET['like'] == "dislike") {
        $idLike = $_GET['idlike'];
        $dislike = mysqli_query($conn, "UPDATE `tbl_favorite` SET `status`= 1 WHERE id = '$idLike'");
    } else if ($_GET['like'] == "like") {
        $idLike = $_GET['idlike'];
        $like = mysqli_query($conn, "UPDATE `tbl_favorite` SET `status`= 2 WHERE id = '$idLike'");
    }
}

?>
<!doctype html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="author" content="hoanghamobile.com">
    <meta property='og:site_name' content='hoanghamobile.com' />

    <title><?= $itemDetailProduct['versionName'] ?> - <?= $itemDetailProduct['versionVersion'] ?></title>
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
    <script src="assets/bootstrap/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/fontawesome/css/all.min.css">
    <meta property="og:image" content="assets/images/logo/logo.png" />
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
                        $infoUser = getInfoUser($conn, $_SESSION['userId']);
                    ?>
                        <li class="member">
                            <i class="icon-account"></i> <a class="account" href="/Account"><strong><?= $infoUser['name'] ?></strong></a>
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
                    } else { ?><li><a id="login-modal" href="dang-nhap.php">Đăng nhập</a></li><?php } ?>
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
                                        while (mysqli_fetch_array($sqlProd)) {
                                            $quantity++;
                                        }
                                        echo "$quantity";
                                    } else {
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
                                        <li><a href="/tin-khuyen-mai/uu-dai-hot/khuyen-mai-jbl-harman-kardon">âm thanh - JBL Harman</a></li>
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
            <ol class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <a itemprop="item" href="index.php"><span itemprop="name" content="Trang chủ"><i class="icon-home" title="Trang chủ"></i> Trang chủ</span></a>
                    <meta itemprop="position" content="1" />
                </li>
                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <a itemprop="item" href="san-pham.php?idCat=<?= $itemDetailProduct['idCategory'] ?>"><span itemprop="name" content="Điện thoại"><?php getNameCategory($conn, $itemDetailProduct['productId']) ?></span></a>
                    <meta itemprop="position" content="2" />
                </li>
                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <a itemprop="item" href="san-pham.php?idCat=<?= $itemDetailProduct['idCategory'] ?>&idBrand=<?= $itemDetailProduct['idBrand'] ?>"><span itemprop="name" content="Apple"><?php getNameBrand($conn, $itemDetailProduct['productId']) ?></span></a>
                    <meta itemprop="position" content="3" />
                </li>
                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <a itemprop="item" href="chi-tiet-san-pham.php?idsanpham=<?= $_GET['idsanpham'] ?>" title="<?= $itemDetailProduct['versionName'] ?> - <?= $itemDetailProduct['versionVersion'] ?>"><?= $itemDetailProduct['versionName'] ?> - <?= $itemDetailProduct['versionVersion'] ?></span></a>
                    <meta itemprop="position" content="6" />
                </li>
            </ol>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="product-details">
                <div class="top-product">
                    <h1><?= $itemDetailProduct['versionName'] ?> - <?= $itemDetailProduct['versionVersion'] ?></h1>

                </div>
                <div class="product-details-container">
                    <div class="product-image">
                        <?php
                        if (isset($_SESSION['userId'])) {
                            $prodId = $_GET['idsanpham'];
                            $userId = $_SESSION['userId'];
                            $sqlFavorite = mysqli_query($conn, "SELECT * FROM tbl_favorite WHERE productId = $prodId AND userId = $userId ");
                            $favourite = mysqli_fetch_assoc($sqlFavorite);

                            if (mysqli_num_rows($sqlFavorite) == 0) {
                        ?><div class="love-this-button"> <a title="Thêm vào sản phẩm yêu thích" href="chi-tiet-san-pham.php?idsanpham=<?= $prodId ?>&like=add"><i class="icon-love-1"></i><i class="icon-love-2"></i> </div><?php } else {  if ($favourite['status'] == 2) {  ?> <div class="love-this-button"> <a title="Thêm vào sản phẩm yêu thích" href="chi-tiet-san-pham.php?idsanpham=<?= $prodId ?>&idlike=<?= $favourite['id']; ?>&like=dislike" class="inlist"><i class="icon-love-1"></i> <i class="icon-love-2"></i> </a></div> <?php  } else {  ?><div class="love-this-button"> <a title="Thêm vào sản phẩm yêu thích" href="chi-tiet-san-pham.php?idsanpham=<?= $prodId ?>&idlike=<?= $favourite['id']; ?>&like=like"><i class="icon-love-1"></i><i class="icon-love-2"></i> </div><?php  }  }?>
                        <?php
                        }

                        ?>

                        <div id="imagePreview">
                            <!-- Loading Screen -->
                            <div data-u="loading" class="loading">
                                <div class="filter"></div>
                                <div class="load-bg"></div>
                            </div>
                            <div data-u="slides" class="viewer">
                                <?php
                                if ($itemDetailProduct['idCategory'] == 1) {
                                ?>
                                    <div>
                                        <a data-fancybox="gallery" rel="group" href="uploads/product/smartphone/<?= $itemDetailProduct['versionImage'] ?>"><img data-u="image" src="uploads/product/smartphone/<?= $itemDetailProduct['versionImage'] ?>" title="" /></a>
                                        <div data-u="thumb">
                                            <img class="i" src="uploads/product/smartphone/<?= $itemDetailProduct['versionImage'] ?>" />
                                        </div>
                                    </div>
                                <?php
                                } else if ($itemDetailProduct['idCategory'] == 2) {
                                ?>
                                    <div>
                                        <a data-fancybox="gallery" rel="group" href="uploads/product/laptop/<?= $itemDetailProduct['versionImage'] ?>"><img data-u="image" src="uploads/product/laptop/<?= $itemDetailProduct['versionImage'] ?>" title="" /></a>
                                        <div data-u="thumb">
                                            <img class="i" src="uploads/product/laptop/<?= $itemDetailProduct['versionImage'] ?>" />
                                        </div>
                                    </div>
                                <?php
                                } else if ($itemDetailProduct['idCategory'] == 3) {
                                ?>
                                    <div>
                                        <a data-fancybox="gallery" rel="group" href="uploads/product/tablet/<?= $itemDetailProduct['versionImage'] ?>"><img data-u="image" src="uploads/product/tablet/<?= $itemDetailProduct['versionImage'] ?>" title="" /></a>
                                        <div data-u="thumb">
                                            <img class="i" src="uploads/product/tablet/<?= $itemDetailProduct['versionImage'] ?>" />
                                        </div>
                                    </div>
                                <?php
                                } else if ($itemDetailProduct['idCategory'] == 4) {
                                ?>
                                    <div>
                                        <a data-fancybox="gallery" rel="group" href="uploads/product/monitor/<?= $itemDetailProduct['versionImage'] ?>"><img data-u="image" src="uploads/product/monitor/<?= $itemDetailProduct['versionImage'] ?>" title="" /></a>
                                        <div data-u="thumb">
                                            <img class="i" src="uploads/product/monitor/<?= $itemDetailProduct['versionImage'] ?>" />
                                        </div>
                                    </div>
                                <?php
                                } else if ($itemDetailProduct['idCategory'] == 5) {
                                ?>
                                    <div>
                                        <a data-fancybox="gallery" rel="group" href="uploads/product/smarttv/<?= $itemDetailProduct['versionImage'] ?>"><img data-u="image" src="uploads/product/smarttv/<?= $itemDetailProduct['versionImage'] ?>" title="" /></a>
                                        <div data-u="thumb">
                                            <img class="i" src="uploads/product/smarttv/<?= $itemDetailProduct['versionImage'] ?>" />
                                        </div>
                                    </div>
                                <?php
                                } else if ($itemDetailProduct['idCategory'] == 6) {
                                ?>
                                    <div>
                                        <a data-fancybox="gallery" rel="group" href="uploads/product/watch/<?= $itemDetailProduct['versionImage'] ?>"><img data-u="image" src="uploads/product/watch/<?= $itemDetailProduct['versionImage'] ?>" title="" /></a>
                                        <div data-u="thumb">
                                            <img class="i" src="uploads/product/watch/<?= $itemDetailProduct['versionImage'] ?>" />
                                        </div>
                                    </div>
                                <?php
                                } else if ($itemDetailProduct['idCategory'] == 7) {
                                ?>
                                    <div>
                                        <a data-fancybox="gallery" rel="group" href="uploads/product/voice/<?= $itemDetailProduct['versionImage'] ?>"><img data-u="image" src="uploads/product/voice/<?= $itemDetailProduct['versionImage'] ?>" title="" /></a>
                                        <div data-u="thumb">
                                            <img class="i" src="uploads/product/voice/<?= $itemDetailProduct['versionImage'] ?>" />
                                        </div>
                                    </div>
                                <?php
                                } else if ($itemDetailProduct['idCategory'] == 8) {
                                ?>
                                    <div>
                                        <a data-fancybox="gallery" rel="group" href="uploads/product/smarthome/<?= $itemDetailProduct['versionImage'] ?>"><img data-u="image" src="uploads/product/smarthome/<?= $itemDetailProduct['versionImage'] ?>" title="" /></a>
                                        <div data-u="thumb">
                                            <img class="i" src="uploads/product/smarthome/<?= $itemDetailProduct['versionImage'] ?>" />
                                        </div>
                                    </div>
                                <?php
                                } else if ($itemDetailProduct['idCategory'] == 16) {
                                ?>
                                    <div>
                                        <a data-fancybox="gallery" rel="group" href="uploads/product/accessory/<?= $itemDetailProduct['versionImage'] ?>"><img data-u="image" src="uploads/product/accessory/<?= $itemDetailProduct['versionImage'] ?>" title="" /></a>
                                        <div data-u="thumb">
                                            <img class="i" src="uploads/product/accessory/<?= $itemDetailProduct['versionImage'] ?>" />
                                        </div>
                                    </div>
                                <?php
                                } else if ($itemDetailProduct['idCategory'] == 17) {
                                ?>
                                    <div>
                                        <a data-fancybox="gallery" rel="group" href="uploads/product/toys/<?= $itemDetailProduct['versionImage'] ?>"><img data-u="image" src="uploads/product/toys/<?= $itemDetailProduct['versionImage'] ?>" title="" /></a>
                                        <div data-u="thumb">
                                            <img class="i" src="uploads/product/toys/<?= $itemDetailProduct['versionImage'] ?>" />
                                        </div>
                                    </div>
                                <?php
                                } else if ($itemDetailProduct['idCategory'] == 18) {
                                ?>
                                    <div>
                                        <a data-fancybox="gallery" rel="group" href="uploads/product/driftingmachine/<?= $itemDetailProduct['versionImage'] ?>"><img data-u="image" src="uploads/product/driftingmachine/<?= $itemDetailProduct['versionImage'] ?>" title="" /></a>
                                        <div data-u="thumb">
                                            <img class="i" src="uploads/product/driftingmachine/<?= $itemDetailProduct['versionImage'] ?>" />
                                        </div>
                                    </div>
                                <?php
                                } else if ($itemDetailProduct['idCategory'] == 19) {
                                ?>
                                    <div>
                                        <a data-fancybox="gallery" rel="group" href="uploads/product/repair/<?= $itemDetailProduct['versionImage'] ?>"><img data-u="image" src="uploads/product/repair/<?= $itemDetailProduct['versionImage'] ?>" title="" /></a>
                                        <div data-u="thumb">
                                            <img class="i" src="uploads/product/repair/<?= $itemDetailProduct['versionImage'] ?>" />
                                        </div>
                                    </div>
                                <?php
                                } else if ($itemDetailProduct['idCategory'] == 20) {
                                ?>
                                    <div>
                                        <a data-fancybox="gallery" rel="group" href="uploads/product/service/<?= $itemDetailProduct['versionImage'] ?>"><img data-u="image" src="uploads/product/service/<?= $itemDetailProduct['versionImage'] ?>" title="" /></a>
                                        <div data-u="thumb">
                                            <img class="i" src="uploads/product/service/<?= $itemDetailProduct['versionImage'] ?>" />
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                                <?php
                                $queryImageProduct = mysqli_query($conn, getImageProduct($itemDetailProduct['productId']));
                                while ($itemImageProduct = mysqli_fetch_assoc($queryImageProduct)) {
                                    if ($itemDetailProduct['idCategory'] == 1) {
                                ?>
                                        <div>
                                            <a data-fancybox="gallery" rel="group" href="uploads/product/smartphone/<?= $itemImageProduct['versionImage'] ?>"><img data-u="image" src="uploads/product/smartphone/<?= $itemImageProduct['versionImage'] ?>" title="" /></a>
                                            <div data-u="thumb">
                                                <img class="i" src="uploads/product/smartphone/<?= $itemImageProduct['versionImage'] ?>" />
                                            </div>
                                        </div>
                                    <?php
                                    } else if ($itemDetailProduct['idCategory'] == 2) {
                                    ?>
                                        <div>
                                            <a data-fancybox="gallery" rel="group" href="uploads/product/laptop/<?= $itemImageProduct['versionImage'] ?>"><img data-u="image" src="uploads/product/laptop/<?= $itemImageProduct['versionImage'] ?>" title="" /></a>
                                            <div data-u="thumb">
                                                <img class="i" src="uploads/product/laptop/<?= $itemImageProduct['versionImage'] ?>" />
                                            </div>
                                        </div>
                                    <?php
                                    } else if ($itemDetailProduct['idCategory'] == 3) {
                                    ?>
                                        <div>
                                            <a data-fancybox="gallery" rel="group" href="uploads/product/tablet/<?= $itemImageProduct['versionImage'] ?>"><img data-u="image" src="uploads/product/tablet/<?= $itemImageProduct['versionImage'] ?>" title="" /></a>
                                            <div data-u="thumb">
                                                <img class="i" src="uploads/product/tablet/<?= $itemImageProduct['versionImage'] ?>" />
                                            </div>
                                        </div>
                                    <?php
                                    } else if ($itemDetailProduct['idCategory'] == 4) {
                                    ?>
                                        <div>
                                            <a data-fancybox="gallery" rel="group" href="uploads/product/monitor/<?= $itemImageProduct['versionImage'] ?>"><img data-u="image" src="uploads/product/monitor/<?= $itemImageProduct['versionImage'] ?>" title="" /></a>
                                            <div data-u="thumb">
                                                <img class="i" src="uploads/product/monitor/<?= $itemImageProduct['versionImage'] ?>" />
                                            </div>
                                        </div>
                                    <?php
                                    } else if ($itemDetailProduct['idCategory'] == 5) {
                                    ?>
                                        <div>
                                            <a data-fancybox="gallery" rel="group" href="uploads/product/monitor/<?= $itemImageProduct['versionImage'] ?>"><img data-u="image" src="uploads/product/monitor/<?= $itemImageProduct['versionImage'] ?>" title="" /></a>
                                            <div data-u="thumb">
                                                <img class="i" src="uploads/product/smarttv/<?= $itemImageProduct['versionImage'] ?>" />
                                            </div>
                                        </div>
                                    <?php
                                    } else if ($itemDetailProduct['idCategory'] == 6) {
                                    ?>
                                        <div>
                                            <a data-fancybox="gallery" rel="group" href="uploads/product/watch/<?= $itemImageProduct['versionImage'] ?>"><img data-u="image" src="uploads/product/watch/<?= $itemImageProduct['versionImage'] ?>" title="" /></a>
                                            <div data-u="thumb">
                                                <img class="i" src="uploads/product/watch/<?= $itemImageProduct['versionImage'] ?>" />
                                            </div>
                                        </div>
                                    <?php
                                    } else if ($itemDetailProduct['idCategory'] == 7) {
                                    ?>
                                        <div>
                                            <a data-fancybox="gallery" rel="group" href="uploads/product/voice/<?= $itemImageProduct['versionImage'] ?>"><img data-u="image" src="uploads/product/voice/<?= $itemImageProduct['versionImage'] ?>" title="" /></a>
                                            <div data-u="thumb">
                                                <img class="i" src="uploads/product/voice/<?= $itemImageProduct['versionImage'] ?>" />
                                            </div>
                                        </div>
                                    <?php
                                    } else if ($itemDetailProduct['idCategory'] == 8) {
                                    ?>
                                        <div>
                                            <a data-fancybox="gallery" rel="group" href="uploads/product/smarthome/<?= $itemImageProduct['versionImage'] ?>"><img data-u="image" src="uploads/product/smarthome/<?= $itemImageProduct['versionImage'] ?>" title="" /></a>
                                            <div data-u="thumb">
                                                <img class="i" src="uploads/product/smarthome/<?= $itemImageProduct['versionImage'] ?>" />
                                            </div>
                                        </div>
                                    <?php
                                    } else if ($itemDetailProduct['idCategory'] == 16) {
                                    ?>
                                        <div>
                                            <a data-fancybox="gallery" rel="group" href="uploads/product/accessory/<?= $itemImageProduct['versionImage'] ?>"><img data-u="image" src="uploads/product/accessory/<?= $itemImageProduct['versionImage'] ?>" title="" /></a>
                                            <div data-u="thumb">
                                                <img class="i" src="uploads/product/accessory/<?= $itemImageProduct['versionImage'] ?>" />
                                            </div>
                                        </div>
                                    <?php
                                    } else if ($itemDetailProduct['idCategory'] == 17) {
                                    ?>
                                        <div>
                                            <a data-fancybox="gallery" rel="group" href="uploads/product/toys/<?= $itemImageProduct['versionImage'] ?>"><img data-u="image" src="uploads/product/toys/<?= $itemImageProduct['versionImage'] ?>" title="" /></a>
                                            <div data-u="thumb">
                                                <img class="i" src="uploads/product/toys/<?= $itemImageProduct['versionImage'] ?>" />
                                            </div>
                                        </div>
                                    <?php
                                    } else if ($itemDetailProduct['idCategory'] == 18) {
                                    ?>
                                        <div>
                                            <a data-fancybox="gallery" rel="group" href="uploads/product/driftingmachine/<?= $itemImageProduct['versionImage'] ?>"><img data-u="image" src="uploads/product/driftingmachine/<?= $itemImageProduct['versionImage'] ?>" title="" /></a>
                                            <div data-u="thumb">
                                                <img class="i" src="uploads/product/driftingmachine/<?= $itemImageProduct['versionImage'] ?>" />
                                            </div>
                                        </div>
                                    <?php
                                    } else if ($itemDetailProduct['idCategory'] == 19) {
                                    ?>
                                        <div>
                                            <a data-fancybox="gallery" rel="group" href="uploads/product/repair/<?= $itemImageProduct['versionImage'] ?>"><img data-u="image" src="uploads/product/repair/<?= $itemImageProduct['versionImage'] ?>" title="" /></a>
                                            <div data-u="thumb">
                                                <img class="i" src="uploads/product/repair/<?= $itemImageProduct['versionImage'] ?>" />
                                            </div>
                                        </div>
                                    <?php
                                    } else if ($itemDetailProduct['idCategory'] == 20) {
                                    ?>
                                        <div>
                                            <a data-fancybox="gallery" rel="group" href="uploads/product/service/<?= $itemImageProduct['versionImage'] ?>"><img data-u="image" src="uploads/product/service/<?= $itemImageProduct['versionImage'] ?>" title="" /></a>
                                            <div data-u="thumb">
                                                <img class="i" src="uploads/product/service/<?= $itemImageProduct['versionImage'] ?>" />
                                            </div>
                                        </div>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                            <div data-u="thumbnavigator" class="jssort11" data-autocenter="1" data-scale-bottom="0.75">
                                <div class="bg-shadow" style="top: 0;left: -30px;width: 370px;height: 80px;position: absolute;box-shadow: 0px 4px 6px #00000029; border-radius: 8px;"></div>
                                <div data-u="slides" style="cursor:pointer;">
                                    <div data-u="prototype" class="p">
                                        <div data-u="thumbnailtemplate" class="tp"></div>
                                    </div>
                                </div>

                                <span class="slider-t-l">
                                    <i class="icon-right"></i>
                                </span>
                                <span class="slider-t-r">
                                    <i class="icon-right"></i>
                                </span>
                            </div>
                            <span data-u="arrowleft" class="slider-l" data-autocenter="2">
                                <i class="icon-left"></i>
                            </span>
                            <span data-u="arrowright" class="slider-r" data-autocenter="2">
                                <i class="icon-right"></i>
                            </span>

                        </div>
                    </div>

                    <div class="product-center" style="position:relative;">
                        <p class="price current-product-price">
                            <strong><?= number_format($itemDetailProduct['versionPromotionalPrice'], 0, "", ".") ?>₫ </strong><i> | Giá đã bao gồm VAT</i>
                        </p>
                        <p class="freeship"><i class="icon-freeship-truck"></i><span> Miễn phí vận chuyển toàn quốc </span> </p>

                        <div class="product-option version">
                            <strong class="label">Lựa chọn phiên bản</strong>
                            <div class="options" id="versionOption" data-id="5">
                                <?php
                                $queryGetListVersion = mysqli_query($conn, getListVersion($itemDetailProduct['productId']));
                                while ($itemGetListVersion = mysqli_fetch_assoc($queryGetListVersion)) {
                                ?>
                                    <div data-sku="MU7A3VN" class="item <?php if ($itemDetailProduct['idVersion'] == $itemGetListVersion['idVersion']) {
                                                                            echo 'selected';
                                                                        } ?>">
                                        <a href="chi-tiet-san-pham.php?idsanpham=<?= $itemGetListVersion['idVersion'] ?>">
                                            <span><label><strong><?= $itemGetListVersion['versionVersion'] ?></strong></label></span>
                                            <strong><?= number_format($itemGetListVersion['versionPromotionalPrice'], 0, "", ".") ?>₫</strong>
                                        </a>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="product-promotion">
                            <strong class="label text-green">KHUYẾN MÃI</strong>
                            <ul>

                                <li><span class="bag">KM 1</span></li>
                                <li>
                                    <a href="https://hoanghamobile.com/tin-tuc/nhan-ma-giam-gia-toi-300-000d-qua-zalopay/" style="font-weight:normal">ZaloPay - Giảm thêm 550.000đ cho đơn hàng mua iPhone 15 series (Áp dụng với hoá đơn trên 20 Triệu).</a>
                                </li>
                                <li><span class="bag">KM 2</span></li>
                                <li>
                                    <a href="https://hoanghamobile.com/tin-tuc/chuong-trinh-thu-cu-len-doi-iphone-vn-a-tai-hoang-ha-mobile/" style="font-weight:normal">Giảm thêm 30% giá trị máy cũ, tối đa 2.000.000đ khi tham gia thu cũ, đổi mới iPhone 15 Series.</a>
                                </li>

                            </ul>
                        </div>

                        <form action="gio-hang.php?action=add" method="POST" class="product-action">
                            <input hidden type="number" name="quantity[<?= $itemDetailProduct['idVersion'] ?>]" id="" step="1" min="1" value="1" title="SL" size="4">
                            <a title="Mua ngay" data-sku="MU7A3VN" href="javascript:;" class="btn-red btnQuickOrder btnbuy" onclick="showBuy()"><strong>MUA NGAY</strong><span> Giao tận nhà (COD) <br />Hoặc Nhận tại cửa hàng</span></a>
                            <a title="Mua trả góp" href="/tra-gop/dien-thoai-di-dong/apple-iphone-15-pro-max-256gb-chinh-hang-vn-a" class="btnInstallment btn-green btnbuy"><strong>TRẢ GÓP</strong><span>Công ty Tài chính <br /> Hoặc 0% qua thẻ tín dụng</span></a>
                            <button type="submit" name="addCart" style="width:43px; display:flex; flex-direction:column; max-width:80px; padding:5px;border: none;" title="Thêm vào giỏ hàng" class="add-cart btn-orange btnbuy btn-icon"><i class="icon-cart" style="padding-left: 20px;"></i><span class="cart-plus" style="right:21px;"><i class="icon-plus"></i></span><label style="font-size:11px;">Thêm giỏ hàng</label></button>
                        </form>




                        <div class="product-promotion" style="padding:8px; border-radius:6px; background:#fff; margin-top:15px;">
                            <div>
                                <strong class="label">ƯU ĐÃI THANH TOÁN</strong>
                                <ul>

                                    <li>
                                        <i class="icon-checked text-green"></i>
                                        <a href="https://hoanghamobile.com/tin-tuc/mua-sam-do-cong-nghe-tha-ga-nhap-ma-vnpay-giam-them-toi-300k/" style="font-weight:normal">VNPAY - Giảm thêm 300.000đ khi thanh toán qua VNPAY (Áp dụng cho đơn hàng trên 20 Triệu có mua 1 sản phẩm thuộc dòng iPhone 15).</a>
                                    </li>
                                    <li>
                                        <i class="icon-checked text-green"></i>
                                        <a href="https://www.vib.com.vn/vn/the-tin-dung/dang-ky/buoc-1?card_type=vib-onlineplus-2in1&amp;utm_source=Public_Website&amp;utm_medium=PNS_HoangHaMobile&amp;utm_content=HoangHaMobileVIBQRCode&amp;product=card" style="font-weight:normal">VIB - Nhận Voucher 250.000đ khi mở thẻ tín dụng VIB thành công.</a>
                                    </li>
                                    <li>
                                        <i class="icon-checked text-green"></i>
                                        <a href="https://hoanghamobile.com/tin-tuc/uu-dai-tra-gop-voi-homepaylater-tai-hoang-ha-mobile" style="font-weight:normal">Home PayLater - Trả góp qua Home PayLater giảm tới 1.000.000đ</a>
                                    </li>
                                    <li>
                                        <i class="icon-checked text-green"></i>
                                        <a href="https://hoanghamobile.com/tin-tuc/mo-the-vpbank-nhan-uu-dai-toi-15-trieu-dong-tai-hoang-ha-mobile" style="font-weight:normal">VPBank - Mở thẻ VPBank, ưu đãi tới 1.250.000đ.</a>
                                    </li>
                                </ul>
                            </div>

                            <div>
                                <strong class="label">ƯU ĐÃI ĐI KÈM</strong>
                                <ul>

                                    <li><i class="icon-checked text-green"></i>Ưu đãi giảm ngay 300.000đ khi mua Ốp Lưng Trong Suốt / Silicon MagSafe cho dòng iPhone 15 kèm theo máy.</li>
                                    <li><i class="icon-checked text-green"></i>Giảm ngay 150.000đ khi mua kèm SIM số đẹp Vinaphone Happy - Ưu đãi 2GB Data/ngày - Miễn phí 1000 phút nội mạng. </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-promotion">
                            <div class="mg-top15">
                                <ul>
                                </ul>
                            </div>
                        </div>



                    </div>
                    <div class="product-shop">
                        <div class="warranty">
                            <h4>THÔNG TIN BẢO HÀNH</h4>
                            <p><i class="icon-shield"></i> <span><strong>Bảo hành 12 tháng chính hãng tại các chi nhánh TPMS.</strong></span></p>
                            <p><a href="/chinh-sach-bao-hanh"><i class="icon-shield"></i><strong><span>1 đổi 1 trong 30 ngày đầu nếu có lỗi phần cứng do nhà sản xuất.</span></strong></a></p>
                        </div>

                        <div class="check-stock" id="marketFilter">
                            <div class="city">
                                <p>Chọn màu và xem địa chỉ còn hàng</p>
                                <span href="javascript:;" class="button"><i class="icon-localtion"></i> <label>Toàn bộ chi nhánh</label></span>
                                <div class="list">
                                    <ul>
                                        <?php
                                            $sqlCity = mysqli_query($conn,"SELECT * FROM tbl_city");
                                            while($itemCity = mysqli_fetch_assoc($sqlCity)){
                                                ?>
                                                    <li data-id="<?=$itemCity['id']?>" id="<?=$itemCity['cityId']?>"><a href="javascript:marketFilters(<?=$itemCity['id']?>);"><?=$itemCity['cityName']?></a></li>
                                                <?php
                                            }
                                        ?>
                                    </ul>
                                </div>
                            </div>

                            <div class="stock-sum" id="stock-sum"></div>
                            <div class="store">
                                <ul>
                                    <?php
                                        $sqlAgent = mysqli_query($conn,"SELECT * FROM tbl_agents INNER JOIN tbl_city ON tbl_agents.cityId = tbl_city.id");
                                        while($itemAgent = mysqli_fetch_assoc($sqlAgent)){
                                            ?>
                                                <li class="instock <?=$itemAgent['cityId']?>" >
                                                    <span>
                                                        <label><?=$itemAgent['agentName']?> - <?=$itemAgent['agentAddress']?></label>
                                                        <label class="data">
                                                            <strong><i class="icon-hotline"></i> <a href="tel:0<?=$itemAgent['agentPhone']?>">0<?=$itemAgent['agentPhone']?></a></strong>
                                                            - <i class="icon-localtion"></i> <a title="<?=$itemAgent['agentName']?>" href="https://www.google.com/maps/place/<?=$itemAgent['agentAddress']?>">Chỉ đường</a>
                                                        </label>
                                                    </span>
                                                </li>
                                            <?php
                                        }
                                    ?>
                                </ul>
                                <p class="out-stock hide"><strong><?= $itemDetailProduct['versionName'] ?> - <?= $itemDetailProduct['versionVersion'] ?> <span class="colorName"></span></strong> chưa có sẵn tại khu vực này. Quý khách vui lòng chọn khu vực khác hoặc gọi đến số Hotline để biết thêm chi tiết.</p>
                                <p class="out-noonline hide"><strong><?= $itemDetailProduct['versionName'] ?> - <?= $itemDetailProduct['versionVersion'] ?> <span class="colorName"></span></strong> tạm thời dừng nhận đơn online. Quý khách vui lòng liên hệ , đến các cửa hàng đang có sẵn hàng để mua trực tiếp.</p>
                            </div>
                        </div>
                        <div class="out-date">
                            <div class="note">
                                <p><i>Giá chỉ từ:</i> <strong class="text-red"><?=number_format($itemDetailProduct['versionPromotionalPrice'],0,"",".") ?> ₫</strong></p>
                                <p><i>Tiết kiệm:</i> <strong class="text-red"><?=number_format($itemDetailProduct['versionPrice'] - $itemDetailProduct['versionPromotionalPrice'],0,"",".") ?> ₫</strong></p>
                                Bảo hành chính hãng đến 12 tháng , Bao xài đổi trả trong 30 ngày đầu
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <section>
        <div class="container">
            <div class="product-layout product-layout-grid">
                <div class="product-left">
                    <div class="product-text" id="productContent">
                        <?= $itemDetailProduct['versionDescription'] ?>
                    </div>
                    <div class="view-more-container">
                        <a href="javascript:;" id="viewMoreContent">Xem thêm</a>
                    </div>
                </div>

                <div class="product-right">
                    <div class="product-specs">
                        <h3>Thông số kỹ thuật <?= $itemDetailProduct['productName'] ?> - <?= $itemDetailProduct['versionVersion'] ?> </h3>
                        <div class="product-spect-img">
                            <?php
                            if ($itemDetailProduct['idCategory'] == 1) {
                            ?><img class="i" src="uploads/product/smartphone/<?= $itemDetailProduct['versionImage'] ?>" /><?php } else if ($itemDetailProduct['idCategory'] == 2) { ?><img class="i" src="uploads/product/laptop/<?= $itemDetailProduct['versionImage'] ?>" /><?php  }?>
                            <img src="uploads/product//" />
                            <a data-padding="0px" data-width="600px" class="ajax-modal product-specs-button" href="/Ajax/fullspecs/3694"><span class="icon-config"></span> <strong>Cấu hình chi tiết</strong></a>
                        </div>

                        <div class="specs-special">
                            <?= $itemDetailProduct['versionSpecifications'] ?>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="full-width-content">
                <div class="product-quick-compare">
                    <div class="header">
                        <h3>So sánh sản phẩm tương tự</h3>
                        <div class="search-box">
                            <div class="border">
                                <input id="kwdCompare" type="text" placeholder="Nhập tên sản phẩm cần so sánh" />
                                <button type="button" class="search"><i class="icon-search"></i></button>
                            </div>
                        </div>
                    </div>

                    <div class="lts-product lts-product-bgwhite equaHeight" data-obj="a.title">
                        <?php
                        $querySimilarProduct = mysqli_query($conn, getSimilarProduct($conn, $_GET['idsanpham']));
                        while ($itemSimilarProduct = mysqli_fetch_assoc($querySimilarProduct)) {
                        ?>
                            <div class="item">
                                <div class="img">
                                    <a href="chi-tiet-san-pham.php?idsanpham=<?= $itemSimilarProduct['idVersion'] ?>" title="<?= $itemSimilarProduct['versionName'] ?> - <?= $itemSimilarProduct['versionVersion'] ?>">
                                        <?php
                                        if ($itemSimilarProduct['idCategory'] == 1) {
                                        ?>
                                            <img src="uploads/product/smartphone/<?= $itemSimilarProduct['versionImage'] ?>" alt="<?= $itemSimilarProduct['versionName'] ?> - <?= $itemSimilarProduct['versionVersion'] ?>" title="<?= $itemSimilarProduct['versionName'] ?> - <?= $itemSimilarProduct['versionVersion'] ?>">
                                        <?php
                                        }
                                        if ($itemSimilarProduct['idCategory'] == 2) {
                                        ?>
                                            <img src="uploads/product/laptop/<?= $itemSimilarProduct['versionImage'] ?>" alt="<?= $itemSimilarProduct['versionName'] ?> - <?= $itemSimilarProduct['versionVersion'] ?>" title="<?= $itemSimilarProduct['versionName'] ?> - <?= $itemSimilarProduct['versionVersion'] ?>">
                                        <?php
                                        }
                                        ?>
                                    </a>
                                </div>
                                <?php
                                if ($itemSimilarProduct['idBrand'] == 1 || $itemSimilarProduct['idBrand'] == 21) {
                                ?>
                                    <div class="sticker sticker-left">
                                        <span><img src="assets/images/icon/apple.png" title="Chính Hãng Apple" /></span>
                                    </div>
                                <?php
                                }
                                ?>
                                <div class="info">
                                    <a href="chi-tiet-san-pham.php?idsanpham=<?= $itemSimilarProduct['idVersion'] ?>" class="title" title="<?= $itemSimilarProduct['versionName'] ?> - <?= $itemSimilarProduct['versionVersion'] ?>"><?= $itemSimilarProduct['versionName'] ?> - <?= $itemSimilarProduct['versionVersion'] ?></a>
                                    <span class="price">
                                        <strong><?= number_format($itemSimilarProduct['versionPromotionalPrice'], 0, "", ".") ?> ₫ </strong>
                                    </span>
                                </div>

                                <div class="info-compare">
                                    <a href="so-sanh.php?sp1=<?= $_GET['idsanpham'] ?>&sp2=<?= $itemSimilarProduct['idVersion'] ?>" title="So sánh Điện thoại với <?= $itemSimilarProduct['versionName'] ?> - <?= $itemSimilarProduct['versionVersion'] ?>"><i class="icon-controls"></i> <span>So sánh</span></a>
                                </div>

                                <div class="promote">
                                    <a href="chi-tiet-san-pham.php?idsanpham=<?= $itemSimilarProduct['idVersion'] ?>">
                                        <ul>
                                            <li><span class="bag">KM</span> Home PayLater - Trả góp qua Home PayLater giảm tới 1.000.000đ</li>
                                            <li><span class="bag">KM</span> VPBank - Mở thẻ VPBank, ưu đãi tới 1.250.000đ. </li>
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
        </div>
    </section>
    <!-- news -->
    <section class="product-review product-comment" id="comments">
        <div class="container">
            <div class="full-width-content">
                <form method="POST" action="">
                    <input type="hidden" name="idsanpham" value="<?= $_GET['idsanpham'] ?>" />
                    <div class="heading">
                        <h3>Bình luận về <?= $itemDetailProduct['versionName'] ?> - <?= $itemDetailProduct['versionVersion'] ?></h3>
                    </div>
                    <div class="rc-form review-form">
                        <div class="rc-form comment-form">
                            <div class="row">

                                <div class="col">
                                    <div class="control">
                                        <input type="text" name="name" value="<?php if(isset($_SESSION['userId'])){echo getInfoUser($conn,$_SESSION['userId'])['name'];} ?>" placeholder="Họ tên *" data-required="1" required />
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="control">
                                        <input type="tel" name="phone" value="0<?php if(isset($_SESSION['userId'])){echo getInfoUser($conn,$_SESSION['userId'])['phone'];} ?>" placeholder="Điện thoại" required />
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="control">
                                        <input type="email" name="email" value="<?php if(isset($_SESSION['userId'])){echo getInfoUser($conn,$_SESSION['userId'])['email'];} ?>" placeholder="Email" required />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="control">
                                        <textarea title="Nội dung" placeholder="Nội dung. Tối thiểu 15 ký tự *" name="content" spellcheck="false" data-required="1" data-minlength="15" required></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col list-star">
                                    <strong class="col-6">Đánh giá của bạn: </strong>
                                    <div class="rating col-6">
                                        <input type="radio" name="star" value="5" id="rating-5" checked>
                                        <label for="rating-5"></label>
                                        <input type="radio" name="star" value="4" id="rating-4">
                                        <label for="rating-4"></label>
                                        <input type="radio" name="star" value="3" id="rating-3">
                                        <label for="rating-3"></label>
                                        <input type="radio" name="star" value="2" id="rating-2">
                                        <label for="rating-2"></label>
                                        <input type="radio" name="star" value="1" id="rating-1">
                                        <label for="rating-1"></label>
                                    </div>
                                </div>
                                <div class="col col-end">
                                    <button name="submitComment" type="submit"><i class="icon-sending"></i> Gửi bình luận</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="review-content comment-content" id="commentContent">

                <?php
                $queryListComment = mysqli_query($conn, getListComment($_GET['idsanpham']));
                while ($itemCommnet = mysqli_fetch_assoc($queryListComment)) {
                ?>
                    <div class="item">
                        <div class="avt">
                            <img src="assets/images/icon/no-avt.png">
                        </div>
                        <div class="info">
                            <p>
                                <strong style="margin-right: 30px;" class="name"><?= $itemCommnet['name'] ?></strong> <?php if ($itemCommnet['star'] == 5) { ?><i style="color: #fcd93a;" class="icon-star"></i><i style="color: #fcd93a;" class="icon-star"></i><i style="color: #fcd93a;" class="icon-star"></i><i style="color: #fcd93a;" class="icon-star"></i><i style="color: #fcd93a;" class="icon-star"></i><?php } else if ($itemCommnet['star'] == 4) { ?><i style="color: #fcd93a;" class="icon-star"></i><i style="color: #fcd93a;" class="icon-star"></i><i style="color: #fcd93a;" class="icon-star"></i><i style="color: #fcd93a;" class="icon-star"></i><?php } else if ($itemCommnet['star'] == 3) { ?><i style="color: #fcd93a;" class="icon-star"></i><i style="color: #fcd93a;" class="icon-star"></i><i style="color: #fcd93a;" class="icon-star"></i><?php } else if ($itemCommnet['star'] == 2) { ?><i style="color: #fcd93a;" class="icon-star"></i><i style="color: #fcd93a;" class="icon-star"></i><?php } else if ($itemCommnet['star'] == 1) { ?><i style="color: #fcd93a;" class="icon-star"></i><?php } ?>
                            </p>
                            <p>
                                <label>
                                    <i>
                                        <?php
                                        $diff = abs(strtotime(date("Y-m-d H:i:s")) - strtotime($itemCommnet['datetime']));
                                        $years = floor($diff / (365 * 60 * 60 * 24));
                                        $months = floor(($diff) / (30 * 60 * 60 * 24));
                                        $days = floor(($diff) / (60 * 60 * 24));
                                        $hours = floor(($diff) / (60 * 60));
                                        $minutes = floor(($diff) / 60);
                                        $seconds = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24 - $hours * 60 * 60 - $minutes * 60));
                                        if ($hours > 24) {
                                            echo "$days ngày trước";
                                        } else {
                                            if ($minutes > 60) {
                                                echo "$hours giờ trước";
                                            } else {
                                                echo "$minutes phút trước";
                                            }
                                        }
                                        ?></i>
                                </label>
                            </p>
                            <div class="content">
                                <?= $itemCommnet['content'] ?>
                            </div>
                            <div class="childs">
                                <div class="comment-list">
                                    <?php
                                    $commnetId = $itemCommnet['id'];
                                    $queryListRepComment = mysqli_query($conn, getListRepComment($commnetId));
                                    while ($itemRepComment = mysqli_fetch_assoc($queryListRepComment)) {
                                    ?>
                                        <div class="item">
                                            <div class="avt">
                                               <?php
                                                    if($itemRepComment['permission']==2){
                                                        ?><img src="assets/images/icon/no-avt.png"><?php
                                                    }else{
                                                        ?><img src="assets/images/icon/icon-member.png"><?php
                                                    }
                                               ?>
                                            </div>
                                            <div class="info">
                                                <p>
                                                    <strong class="name"><?= $itemRepComment['name'] ?></strong>
                                                    <i class="icon-checked"></i> <span>QTV TPMS</span>
                                                </p>
                                                <p><label><i>1 giờ trước</i></label></p>
                                                <div class="content">
                                                    <?= $itemRepComment['content'] ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>

                                </div>

                                <div class="replyHolder replyCommentHolder btn-rep-<?= $itemCommnet['id'] ?>">
                                    <input type="text" placeholder="Nhập bình luận của bạn" data-id="<?= $itemCommnet['id'] ?>" onclick="viewformrepcomment(<?= $itemCommnet['id'] ?>)">
                                    <button><i class="icon-sending"></i></button>
                                </div>
                                <div class="form-container form-container-<?= $itemCommnet['id'] ?>">
                                    <form method="POST" action="">
                                        <input type="hidden" name="commentId" value="<?= $itemCommnet['id'] ?>">
                                        <input type="hidden" name="versionId" value="<?= $_GET['idsanpham'] ?>">
                                        <div class="rc-form comment-form">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="control">
                                                        <input type="text" name="name" value="<?php if(isset($_SESSION['userId'])){echo getInfoUser($conn,$_SESSION['userId'])['name'];} ?>" placeholder="Họ tên *" data-required="1" required>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="control">
                                                        <input type="tel" name="phone" value="0<?php if(isset($_SESSION['userId'])){echo getInfoUser($conn,$_SESSION['userId'])['phone'];} ?>" placeholder="Điện thoại" required>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="control">
                                                        <input type="email" name="email" value="<?php if(isset($_SESSION['userId'])){echo getInfoUser($conn,$_SESSION['userId'])['email'];} ?>" placeholder="Email" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="control">
                                                        <textarea title="Nội dung" placeholder="Nội dung. Tối thiểu 15 ký tự *" name="content" spellcheck="false" data-required="1" data-minlength="15" required></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col col-end">
                                                    <button name="btnRepComment" type="submit"><i class="icon-sending"></i> Gửi bình luận</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }

                ?>
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
                        <strong>CH&#205;NH HÃNG</strong>
                    </div>
                </div>
                <div class="item">
                    <span class="icon">
                        <i class="icon-freeship"></i>
                    </span>
                    <div class="text">
                        <span>Miễn phí vận chuyển</span>
                        <strong>TO&#192;N QUỐC</strong>
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
                        <strong>DỄ D&#192;NG</strong>
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
    <div class="jquery-modal blockerbuy current">
        <div id="popup-modal" class="modal" style="display: inline-block;">
            <div class="quick-order">
                <div class="quick-order-ctn">
                    <div class="left">
                        <div class="img">
                            <img src="https://cdn.hoanghamobile.com/i/productlist/dsp/Uploads/2020/11/06/apple-iphone-12-mini-5.png" alt="iPhone 12 (64GB) - Chính hãng VN/A">
                        </div>
                        <div class="info">
                            <p class="title">
                                iPhone 12 (64GB) - Chính hãng VN/A <br>
                                <span class="text-gray">64GB - Green (<label>SKU:</label> <strong id="dfSKU">IPH1264N</strong>)</span>
                            </p>


                            <p class="price">
                                <strong id="quickOrderPrice" data-value="12190000">12,190,000 ₫</strong>

                                <strike id="quickOrderPriceLast" data-value="24990000">24,990,000 ₫</strike>
                            </p>
                        </div>

                        <div>
                            <div class="hot-line">
                                <a href="tel:19002091"><i class="icon-hotline"></i> <strong>1900.2091</strong></a>
                                <p>
                                    <i>Phím 1 - Hotline bán hàng online</i><br>

                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="right">

                        <h3>Đặt hàng sản phẩm</h3>


                        <form id="quickForm" onsubmit="return validFormQuickOrder_v3(this);">

                            <input type="hidden" id="ValidType" name="ValidType" value="2">

                            <input type="hidden" id="hdnGoogleRecaptcha" name="hdnGoogleRecaptcha">

                            <input type="hidden" name="ProductID" value="794">

                            <input name="__RequestVerificationToken" type="hidden" value="wFPBhlePgatu2oGe3VblbAuxHgmjUUOJY9N0q4dOd0GqJLtELrsomBDmlj7FVWavt9Qo-gi2kQgXLulvkzdk9LPrOFw5BCqNjJI-ne8ezI1U08-W451gpYkQ8SBFTSQSnQKWdg2">
                            <input type="hidden" name="SKU" value="IPH1264N">
                            <input type="hidden" name="COLOR" value="16">
                            <input type="hidden" id="Promote" name="Promote" value="">

                            <input type="hidden" name="IsPreOrder" id="IsPreOrder" value="False">

                            <div class="grid-options">
                                <label><strong>Chọn màu sắc</strong></label>
                                <div class="options">
                                    <div class="option">
                                        <a class="changeOption" href="javascript:;" data-sku="IPH1264B" data-id="1" style="width: 78.8715px;">
                                            <label>
                                                <i class="icon-border" style="background-color:#000000"></i>
                                                <span>Black</span>
                                            </label>
                                            <strong class="text-red">12,190,000 ₫</strong>
                                        </a>
                                    </div>
                                    <div class="option">
                                        <a class="selectedOption" href="javascript:;" style="width: 78.8715px;">
                                            <label>
                                                <i class="icon-checked" style="background-color:#4aa02c"></i>
                                                <span>Green</span>
                                            </label>
                                            <strong class="text-red">12,190,000 ₫</strong>
                                        </a>
                                    </div>
                                    <div class="option">
                                        <a class="changeOption" href="javascript:;" data-sku="IPH1264P" data-id="62" style="width: 78.8715px;">
                                            <label>
                                                <i class="icon-border" style="background-color:#c402dd"></i>
                                                <span>Purple</span>
                                            </label>
                                            <strong class="text-red">12,190,000 ₫</strong>
                                        </a>
                                    </div>
                                </div>

                                <label><strong>Chọn phiên bản</strong></label>
                                <div class="options">
                                    <div class="option">
                                        <a class="selectedOption" href="javascript:;" data-sku="IPH1264B" style="width: 78.8715px;">
                                            <label>
                                                <i class="icon-checked"></i>
                                                <span>64GB</span>
                                            </label>
                                            <strong class="text-red">12,190,000 ₫</strong>
                                        </a>
                                    </div>
                                    <div class="option">
                                        <a class="changeOption" href="javascript:;" data-sku="IPH12128B" style="width: 78.8715px;">
                                            <label>
                                                <i class="icon-border"></i>
                                                <span>128GB</span>
                                            </label>
                                            <strong class="text-red">13,990,000 ₫</strong>
                                        </a>
                                    </div>
                                </div>

                            </div>

                            <div class="number">
                                <label>Số lượng</label>
                                <div class="control">
                                    <button type="button" id="btnMinutes">-</button>
                                    <input id="Number" name="Number" type="text" value="1">
                                    <button type="button" id="btnPlus">+</button>
                                </div>
                            </div>

                            <div class="cart-form quick-order-form">

                                <label>Họ tên</label>
                                <div class="row">
                                    <div class="col">
                                        <div class="control">
                                            <input value="Test" name="Title" type="text" placeholder="Họ và tên *" data-required="1">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <label>Điện thoại</label>
                                        <div class="control">
                                            <input value="0987654321" name="Phone" type="tel" placeholder="Số điện thoại *" data-required="1">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label>Email</label>
                                        <div class="control">
                                            <input class="rqVAT" value="test121312@gmail.com" name="Email" type="email" placeholder="Email *">
                                        </div>
                                    </div>
                                </div>


                                <label>Hình thức nhận hàng</label>
                                <div class="row">
                                    <div class="col">
                                        <div id="payType_1" class="payment-opt">
                                            <label class="radio-ctn">
                                                <span>Nhận hàng tại nhà</span>
                                                <input name="ReceiveTypeID" type="radio" value="1" class="cart-paymentTypeId">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div id="payType_5" class="payment-opt payment-selected">
                                            <label class="radio-ctn">
                                                <span>Nhận hàng tại cửa hàng</span>
                                                <input name="ReceiveTypeID" type="radio" value="5" class="cart-paymentTypeId" checked="">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>

                                </div>



                                <div id="f_payType_1" style="display:none">
                                    <label>Địa chỉ</label>
                                    <div class="row">
                                        <div class="col">
                                            <div class="control">
                                                <select id="SystemCityID" name="SystemCityID" placeholder="Tỉnh/Thành phố *">
                                                    <option value="">Tỉnh/Thành phố *</option>
                                                    <option value="1" selected="">Hà Nội</option>
                                                    <option value="50">TP HCM</option>
                                                    <option value="57">An Giang</option>
                                                    <option value="49">Bà Rịa - Vũng Tàu</option>
                                                    <option value="15">Bắc Giang</option>
                                                    <option value="4">Bắc Kạn</option>
                                                    <option value="62">Bạc Liêu</option>
                                                    <option value="18">Bắc Ninh</option>
                                                    <option value="53">Bến Tre</option>
                                                    <option value="35">Bình Định</option>
                                                    <option value="47">Bình Dương</option>
                                                    <option value="45">Bình Phước</option>
                                                    <option value="39">Bình Thuận</option>
                                                    <option value="63">Cà Mau</option>
                                                    <option value="59">Cần Thơ</option>
                                                    <option value="3">Cao Bằng</option>
                                                    <option value="32">Đà Nẵng</option>
                                                    <option value="42">Đắk Lắk</option>
                                                    <option value="43">Đắk Nông</option>
                                                    <option value="7">Điện Biên</option>
                                                    <option value="48">Đồng Nai</option>
                                                    <option value="56">Đồng Tháp</option>
                                                    <option value="41">Gia Lai</option>
                                                    <option value="2">Hà Giang</option>
                                                    <option value="23">Hà Nam</option>
                                                    <option value="28">Hà Tĩnh</option>
                                                    <option value="19">Hải Dương</option>
                                                    <option value="20">Hải Phòng</option>
                                                    <option value="60">Hậu Giang</option>
                                                    <option value="11">Hoà Bình</option>
                                                    <option value="21">Hưng Yên</option>
                                                    <option value="37">Khánh Hòa</option>
                                                    <option value="58">Kiên Giang</option>
                                                    <option value="40">Kon Tum</option>
                                                    <option value="8">Lai Châu</option>
                                                    <option value="44">Lâm Đồng</option>
                                                    <option value="13">Lạng Sơn</option>
                                                    <option value="6">Lào Cai</option>
                                                    <option value="51">Long An</option>
                                                    <option value="24">Nam Định</option>
                                                    <option value="27">Nghệ An</option>
                                                    <option value="25">Ninh Bình</option>
                                                    <option value="38">Ninh Thuận</option>
                                                    <option value="16">Phú Thọ</option>
                                                    <option value="36">Phú Yên</option>
                                                    <option value="29">Quảng Bình</option>
                                                    <option value="33">Quảng Nam</option>
                                                    <option value="34">Quảng Ngãi</option>
                                                    <option value="14">Quảng Ninh</option>
                                                    <option value="30">Quảng Trị</option>
                                                    <option value="61">Sóc Trăng</option>
                                                    <option value="9">Sơn La</option>
                                                    <option value="46">Tây Ninh</option>
                                                    <option value="22">Thái Bình</option>
                                                    <option value="12">Thái Nguyên</option>
                                                    <option value="26">Thanh Hóa</option>
                                                    <option value="31">Thừa Thiên Huế</option>
                                                    <option value="52">Tiền Giang</option>
                                                    <option value="54">Trà Vinh</option>
                                                    <option value="5">Tuyên Quang</option>
                                                    <option value="55">Vĩnh Long</option>
                                                    <option value="17">Vĩnh Phúc</option>
                                                    <option value="10">Yên Bái</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="control">
                                                <select id="SystemDistrictID" name="SystemDistrictID" placeholder="Quận/Huyện *">

                                                    <option value="">Quận/Huyện</option>
                                                    <option value="1">Quận Ba Đình</option>
                                                    <option value="2">Quận Hoàn Kiếm</option>
                                                    <option value="3">Quận Tây Hồ</option>
                                                    <option value="4">Quận Long Biên</option>
                                                    <option value="5">Quận Cầu Giấy</option>
                                                    <option value="6">Quận Đống Đa</option>
                                                    <option value="7">Quận Hai Bà Trưng</option>
                                                    <option value="8">Quận Hoàng Mai</option>
                                                    <option value="9">Quận Thanh Xuân</option>
                                                    <option value="10">Huyện Sóc Sơn</option>
                                                    <option value="11">Huyện Đông Anh</option>
                                                    <option value="12">Huyện Gia Lâm</option>
                                                    <option value="13">Quận Nam Từ Liêm</option>
                                                    <option value="14">Huyện Thanh Trì</option>
                                                    <option value="15">Quận Bắc Từ Liêm</option>
                                                    <option value="16">Huyện Mê Linh</option>
                                                    <option value="17">Quận Hà Đông</option>
                                                    <option value="18" selected="">Thị xã Sơn Tây</option>
                                                    <option value="19">Huyện Ba Vì</option>
                                                    <option value="20">Huyện Phúc Thọ</option>
                                                    <option value="21">Huyện Đan Phượng</option>
                                                    <option value="22">Huyện Hoài Đức</option>
                                                    <option value="23">Huyện Quốc Oai</option>
                                                    <option value="24">Huyện Thạch Thất</option>
                                                    <option value="25">Huyện Chương Mỹ</option>
                                                    <option value="26">Huyện Thanh Oai</option>
                                                    <option value="27">Huyện Thường Tín</option>
                                                    <option value="28">Huyện Phú Xuyên</option>
                                                    <option value="29">Huyện Ứng Hòa</option>
                                                    <option value="30">Huyện Mỹ Đức</option>
                                                    <script type="text/javascript">
                                                        var currentIsDelivery = 1;
                                                        var isCOD = $("input[name='OrderPayTypeID']:checked").val();
                                                        isCOD = (isCOD) ? isCOD : 1;

                                                        if (isInCheckDelivery) {
                                                            if (!currentIsDelivery && isCOD == 1) {
                                                                $("#IsDelivery").show();
                                                                $(".shInfo").hide();
                                                            } else {
                                                                $("#IsDelivery").hide();
                                                                $(".shInfo").show();
                                                            }
                                                        }
                                                    </script>
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row shInfo">
                                        <div class="col">
                                            <div class="control">
                                                <input value="320 Khương Đình" id="Address" name="Address" type="text" placeholder="Địa chỉ nhận hàng *">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row" id="IsDelivery" style="display:none">
                                        <p class="text-red"><i class="icon-news"></i> Do tình hình dịch bệnh phức tạp, khu vực quý khách chọn tạm ngưng giao hàng. Hoàng Hà sẽ giao hàng trở lại khi được cho phép. Mong quý khách hàng thông cảm. Hoàng Hà thành thật xin lỗi vì sự bất tiện này.</p>
                                    </div>

                                </div>


                                <div id="f_payType_5">
                                    <label>Nơi nhận hàng</label>
                                    <div class="row">
                                        <div class="col">
                                            <div class="control">
                                                <select id="MKSystemCityID" name="MKSystemCityID" placeholder="Tỉnh/Thành phố">
                                                    <option value="">Tỉnh/Thành phố *</option>
                                                    <option value="1" selected="">Hà Nội</option>
                                                    <option value="50">TP HCM</option>
                                                    <option value="57">An Giang</option>
                                                    <option value="49">Bà Rịa - Vũng Tàu</option>
                                                    <option value="15">Bắc Giang</option>
                                                    <option value="62">Bạc Liêu</option>
                                                    <option value="18">Bắc Ninh</option>
                                                    <option value="35">Bình Định</option>
                                                    <option value="47">Bình Dương</option>
                                                    <option value="45">Bình Phước</option>
                                                    <option value="39">Bình Thuận</option>
                                                    <option value="63">Cà Mau</option>
                                                    <option value="59">Cần Thơ</option>
                                                    <option value="32">Đà Nẵng</option>
                                                    <option value="42">Đắk Lắk</option>
                                                    <option value="43">Đắk Nông</option>
                                                    <option value="7">Điện Biên</option>
                                                    <option value="48">Đồng Nai</option>
                                                    <option value="56">Đồng Tháp</option>
                                                    <option value="41">Gia Lai</option>
                                                    <option value="23">Hà Nam</option>
                                                    <option value="28">Hà Tĩnh</option>
                                                    <option value="19">Hải Dương</option>
                                                    <option value="20">Hải Phòng</option>
                                                    <option value="11">Hoà Bình</option>
                                                    <option value="21">Hưng Yên</option>
                                                    <option value="37">Khánh Hòa</option>
                                                    <option value="58">Kiên Giang</option>
                                                    <option value="44">Lâm Đồng</option>
                                                    <option value="6">Lào Cai</option>
                                                    <option value="51">Long An</option>
                                                    <option value="24">Nam Định</option>
                                                    <option value="27">Nghệ An</option>
                                                    <option value="25">Ninh Bình</option>
                                                    <option value="38">Ninh Thuận</option>
                                                    <option value="16">Phú Thọ</option>
                                                    <option value="36">Phú Yên</option>
                                                    <option value="29">Quảng Bình</option>
                                                    <option value="33">Quảng Nam</option>
                                                    <option value="34">Quảng Ngãi</option>
                                                    <option value="14">Quảng Ninh</option>
                                                    <option value="30">Quảng Trị</option>
                                                    <option value="61">Sóc Trăng</option>
                                                    <option value="9">Sơn La</option>
                                                    <option value="46">Tây Ninh</option>
                                                    <option value="22">Thái Bình</option>
                                                    <option value="12">Thái Nguyên</option>
                                                    <option value="26">Thanh Hóa</option>
                                                    <option value="31">Thừa Thiên Huế</option>
                                                    <option value="52">Tiền Giang</option>
                                                    <option value="5">Tuyên Quang</option>
                                                    <option value="55">Vĩnh Long</option>
                                                    <option value="17">Vĩnh Phúc</option>
                                                    <option value="10">Yên Bái</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="control">
                                                <select id="SystemMarketID" name="SystemMarketID" placeholder="Chọn cửa hàng nhận sản phẩm *" data-required="1">

                                                    <option value="">Cửa hàng *</option>
                                                    <optgroup label="Đang có sẵn hàng">
                                                        <option data-id="1" value="1">194 Lê Duẩn, Hà Nội</option>
                                                        <option data-id="1" value="2">382 Nguyễn Văn Cừ, Hà Nội</option>
                                                        <option data-id="1" value="3">122 Thái Hà, Hà Nội</option>
                                                        <option data-id="1" value="4">126 Phố Huế, Hà Nội</option>
                                                        <option data-id="1" value="6"> 392 Cầu Giấy, Hà Nội</option>
                                                        <option data-id="1" value="8">28 Trần Phú, Hà Đông, Hà Nội</option>
                                                        <option data-id="1" value="11">348 Hồ Tùng Mậu, Cầu Diễn, Từ Liêm, Hà Nội</option>
                                                        <option data-id="1" value="12"> 102 Phố Xốm, Phú Lãm, Hà Đông, Hà Nội</option>
                                                        <option data-id="1" value="14">392 Trương Định, Hoàng Mai, Hà Nội</option>
                                                        <option data-id="1" value="16">330 Nguyễn Trãi, Thanh Xuân, Hà Nội</option>
                                                        <option data-id="1" value="17">Số 15 Trần Phú, Ba Đình, Hà Nội (Shop cũ 12 Điện Biên Phủ)</option>
                                                        <option data-id="1" value="56">Số 82 Khu 7, Thị trấn Trạm Trôi, Huyện Hoài Đức, Hà Nội.</option>
                                                        <option data-id="1" value="61">176 Chùa Thông, P. Sơn Lộc, TX Sơn Tây, Hà Nội</option>
                                                        <option data-id="1" value="66">205 Xã Đàn, P.Nam Đồng, Hà Nội</option>
                                                        <option data-id="1" value="67">749 Giải Phóng, P.Giáp Bát, Q.Hoàng Mai, Hà Nội (Shop cũ 797 - 799 Giải Phóng)</option>
                                                        <option data-id="1" value="71">101 Kim Mã - Phường Kim Mã - Quận Ba ĐÌnh - Hà Nội</option>
                                                        <option data-id="1" value="77">336 Phạm Văn Đồng, Quận Bắc Từ Liêm, Hà Nội</option>
                                                        <option data-id="1" value="79">259 Lạc Long Quân, Phường Nghĩa Đô, Quận Cầu Giấy, Hà Nội</option>
                                                        <option data-id="1" value="80">182 Cao Lỗ, H. Đông Anh, Hà Nội</option>
                                                        <option data-id="1" value="93">208 Trần Lư. Thường Tín, Hà Nội</option>
                                                        <option data-id="1" value="101">196 Quang Trung, Hà Đông, Hà Nội</option>
                                                        <option data-id="1" value="104">258 Ngô Gia Tự, Long Biên, Hà Nội</option>
                                                        <option data-id="1" value="105">651 Nguyễn Văn Linh, Long Biên, Hà Nội</option>
                                                        <option data-id="1" value="107">89 Tam Trinh, Hoàng Mai, Hà Nội</option>
                                                        <option data-id="1" value="108">109 Trần Duy Hưng, Cầu Giấy, Hà Nội</option>
                                                        <option data-id="1" value="122">Số 110 Cầu Bươu, Tân Triều, Thanh Trì, Hà Nội</option>
                                                        <option data-id="1" value="125">Số 372 Hà Huy Tập, TT Yên Viên, Gia Lâm, Hà Nội</option>
                                                        <option data-id="1" value="131">Số 52 Hàng Đậu - Đồng Xuân - Hoàn Kiếm - Hà Nội</option>
                                                    </optgroup>
                                                    <optgroup label="Tạm hết - Nhận hàng sau 1 đến 5 ngày">
                                                        <option data-id="0" value="116">Số 59 Quang Trung, TT Vân Đình, Ứng Hòa, Hà Nội</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="row shInfo">
                                    <div class="col">
                                        <div class="control">
                                            <textarea name="Note" placeholder="Ghi chú" spellcheck="false" data-minlength="15"></textarea>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col">
                                        <div class="control control-cbx">
                                            <label>
                                                <input type="checkbox" id="GetVAT" name="GetVAT" value="True">
                                                <span>Yêu cầu xuất hoát đơn công ty (Vui lòng điền email để nhận hóa đơn VAT)</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="shVAT">
                                    <div class="row ">
                                        <div class="col">
                                            <label>Tên Công ty</label>
                                            <div class="control">
                                                <input class="rqVAT" id="CompanyName" name="CompanyName" type="text" placeholder="Tên công ty *">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <label>Mã số thuế</label>
                                            <div class="control">
                                                <input class="rqVAT" name="CompanyTaxID" id="CompanyTaxID" type="text" placeholder="Mã số thuế *">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <label>Địa chỉ công ty</label>
                                            <div class="control">
                                                <input class="rqVAT" id="CompanyAddress" name="CompanyAddress" type="text" placeholder="Địa chỉ công ty *">
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row shInfo">
                                    <div class="col-center">
                                        <div class="control">
                                            <input id="PromoteCode" name="PromoteCode" type="text" placeholder="Mã giảm giá (Nếu có)">
                                            <a onclick="javascript:applyVoucher();" class="voucher-button">Sử dụng</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="row shInfo" id="voucher">

                                </div>

                                <div class="row shInfo">
                                    <p>Bằng cách đặt hàng bạn đã đồng ý với điều khoản sử dụng và chính sách đổi trả</p>
                                </div>





                                <div class="row shInfo">

                                    <div class="control-button">
                                        <p>Quý khách có thể lựa chọn hình thức thanh toán sau khi đặt hàng.</p>

                                        <button type="submit">TIẾN HÀNH ĐẶT HÀNG</button>
                                    </div>
                                </div>

                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <a href="#close-modal" rel="modal:close" class="close-modal icon-minutes"> </a>
            <iframe src="https://asia.creativecdn.com/tags?id=pr_n4X0y6ApZyJaHX1dNxQd_basketstatus_794" width="1" height="1" scrolling="no" frameborder="0" style="display: none;"></iframe>
            <input type="hidden" name="quickOrder_productId" id="quickOrder_productId" value="794">
            <input type="hidden" name="quickOrder_SKU" id="quickOrder_SKU" value="IPH1264N">
            <style>
                #popup-modal {
                    max-width: 1200px !important;
                    border-radius: 8px;
                }
            </style>
            <script src="https://www.google.com/recaptcha/api.js?render=6Lc8ieoiAAAAAOHeth4LTNkrthxFlRLJaduX7OYM"></script>

            <script>
                dataLayer.push({
                    'dr_event_type': 'add_to_cart',
                    'dr_value': 1, // cart total
                    'dr_items': [{
                        "id": "794",
                        "google_business_vertical": "retail"
                    }],
                    'event': 'dynamic_remarketing'
                });
            </script>
            <script>
                dataLayer.push({
                    'dr_event_type': 'purchase',
                    'dr_value': 1, // purchase  total
                    'dr_items': [{
                        "id": "794",
                        "google_business_vertical": "retail"
                    }],
                    'event': 'dynamic_remarketing'
                });
            </script>
            <script>
                window.insider_object.product = {
                    "id": "794",
                    "name": "iPhone 12 (64GB) - Chính hãng VN/A",
                    "taxonomy": ["iPhone 12 series", "iPhone 12"],
                    "currency": "VND",
                    "unit_price": 2.499E+07,
                    "unit_sale_price": 1.219E+07,
                    "url": "https://hoanghamobile.com/dien-thoai-di-dong/apple-iphone-12-64gb-chinh-hang-vn-a",
                    "stock": 320,
                    "color": "Green",
                    "size": "",
                    "product_image_url": "https://hoanghamobile.com/Uploads/2020/11/06/apple-iphone-12-mini-5.png",
                    "custom": {
                        "merchandiser": "hoanghamobile"
                    }
                };
            </script>
            <a href="#close-modal" rel="modal:close" class="close-modal icon-minutes"> </a>
        </div>
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
        var isInCheckDelivery = 1;

        $(document).ready(function() {

            $('#dien-thoai-di-dong, #dien-thoai-di-dongiphone, #dien-thoai-di-dongiphoneiphone-15-series, #dien-thoai-di-dongiphoneiphone-15-seriesiphone-15-pro-max').addClass('actived');

            imagePreview_init();
            setProductContentHeighWithSpecs();

            compareAutocomplete({
                template: '/so-sanh/apple-iphone-15-pro-max-256gb-chinh-hang-vn-a-ss.3694',
                ptype: 1,
                ignore: 3694

            });
            updateViewProduct(3694);
            productDetails();
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
    <script>
        function postComentSuccess() {
            $.toast({
                heading: 'Bạn đã để lại nhận xét thành công !',
                showHideTransition: 'fade',
                icon: 'success',
                hideAfter: 3e3
            });

        }
    </script>
    <?php
    if (isset($addComment)) {
        echo "<script>postComentSuccess();</script>";
        echo "<script>
                const sleep = (ms) => {
                    return new Promise(resolve => setTimeout(resolve, ms));
                    }
                    (async () => {
                    await sleep(3000)
                    window.location.href = 'chi-tiet-san-pham.php?idsanpham=" . $_GET['idsanpham'] . "';
                    })()
            </script>";
    }
    ?>
    <?php
    if (isset($addRepComment)) {
        echo "<script>postComentSuccess();</script>";
        echo "<script>
                const sleep = (ms) => {
                    return new Promise(resolve => setTimeout(resolve, ms));
                    }
                    (async () => {
                    await sleep(3000)
                    window.location.href = 'chi-tiet-san-pham.php?idsanpham=" . $_GET['idsanpham'] . "';
                    })()
            </script>";
    }
    ?>

    <script>
        function viewformrepcomment(a) {
            b = '.btn-rep-' + a;
            var iclass = document.querySelector(b);

            iclass.classList.add("none");

            c = '.form-container-' + a;
            var cclass = document.querySelector(c);
            cclass.classList.add("show");
        }
    </script>

    <?php
    if (isset($addLike)) {
    ?>
        <script>
            $.toast({
                heading: 'Bạn đã thêm vào sản phẩm yêu thích !',
                showHideTransition: 'fade',
                icon: 'success',
                hideAfter: 3e3
            });
        </script>
    <?php
    } else if (isset($like)) {
    ?>
        <script>
            $.toast({
                heading: 'Bạn đã thêm vào sản phẩm yêu thích !',
                showHideTransition: 'fade',
                icon: 'success',
                hideAfter: 3e3
            });
        </script>
    <?php
    } else if (isset($dislike)) {
    ?>
        <script>
            $.toast({
                heading: 'Bạn đã bỏ khỏi sản phẩm yêu thích !',
                showHideTransition: 'fade',
                icon: 'error',
                hideAfter: 3e3
            });
        </script>
    <?php
    }
    ?>
    <script>
        function showBuy() {
            console.log("a");
        }
    </script>
    <!-- API Provice -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
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