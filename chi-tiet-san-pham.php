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
    <?php  include 'header.php';  ?>
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
                                                    <?php if($itemRepComment['permission'] == 1){?><i class="icon-checked"></i> <span>QTV TPMS</span><?php }?>
                                                    
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

    <?php include 'footer.php' ?>
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