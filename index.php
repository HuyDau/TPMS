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
    <link rel="stylesheet" type="text/css" href="assets/slick/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="assets/slick/slick/slick-theme.css" />
    <!-- Bootstrap -->
    <!-- <link href="assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="assets/bootstrap/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="assets/bootstrap/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="assets/fontawesome/css/all.min.css">
    <meta property="og:image" content="assets/images/logo/logo.png" />
    <script async src="assets/js/ins.js"></script>
</head>

<body class="body-home">
    <!-- <div class="top-link">
        <span class="pulse"></span>
        <p><strong>Cơ hội sở hữu Samsung S20 FE 256GB chỉ với 6.990.000đ - SL có hạn</strong> <a href="https://hoanghamobile.com/dien-thoai-di-dong/samsung-galaxy-s20-fe-256gb-chinh-hang" target="_top">Xem chi tiết</a></p>
    </div> -->
    
    <?php  include 'header.php';  ?>

    <section class="xmas-2023">
    <!-- <div class="container">
        <div class="bg">
            <div class="img">
                <img src="assets/images/bg/logo.png">
            </div>
			
            <div class="btn">
                <a href="/giang-sinh-gia-xinh?utm_source=web&amp;utm_medium=Homebanner&amp;utm_content=xmas2023&amp;utm_campaign=xmas2023">
                    Xem ngay
                </a>
            </div>
			
        </div>
        
    </div> -->
    </section>
    
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
                        $queryBanner = mysqli_query($conn, getSlide($conn));
                        while ($itemBanner = mysqli_fetch_assoc($queryBanner)) {
                        ?>
                            <div>
                                <a target="_blank" href="" title="<?= $itemBanner['bannerTitle'] ?>"><img data-u="image" data-src2="admin/assets/images/banner/<?= $itemBanner['bannerImage'] ?>" title="<?= $itemBanner['bannerTitle'] ?>" /></a>
                                <div u="thumb">
                                    <?= $itemBanner['bannerTitle'] ?>
                                    <br /><small><?= $itemBanner['bannerContent'] ?></small>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>


                    <div data-u="thumbnavigator" class="jssor-1200-thumbs">
                        <div data-u="slides" style="cursor: pointer">
                            <div data-u="prototype" class="p">
                                <div class=w>
                                    <div data-u="thumbnailtemplate"></div>
                                </div>
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
                    <a href="" target="_blank">
                        <img src="assets/images/img/galaxy-s20-fe.png" title="Samsung Galaxy S20 FE" alt="Samsung Galaxy S20 FE" />
                    </a>
                </div>
                <div class="item">
                    <a href="" target="_blank">
                        <img src="assets/images/img/macbook-air.png" title="MacBook Air M1 8GB/256GB" alt="MacBook Air M1 8GB/256GB" />
                    </a>
                </div>
                <div class="item">
                    <a href="" target="_blank">
                        <img src="assets/images/img/redmi-13c_638358386471916868.png" title="Redmi 13C (6GB/128GB)" alt="Redmi 13C (6GB/128GB)" />
                    </a>
                </div>
                <div class="item">
                    <a href="" target="_blank">
                        <img src="assets/images/img/vivobook-14.png" title="Laptop ASUS Vivobook 14 X1404VA-NK125W" alt="Laptop ASUS Vivobook 14 X1404VA-NK125W" />
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
                    <h3>TOP SẢN PHẨM BÁN CHẠY</h3>
                    <div class="timer" id="timer_6" data-start="December 06, 2023 11:33:31" data-end="December 11, 2023 00:00:00"></div>
                </div>
                <div class="content">
                    <div class="owl-carousel lr-slider">
                        <?php
                            $sqlTopSale = getTopSale($conn);
                            while($itemTopSale = mysqli_fetch_assoc($sqlTopSale)){
                                ?>
                                    <div class="item">
                                        <div class="img">
                                            <a href="chi-tiet-san-pham.php?idsanpham=<?=$itemTopSale['versionId']?>" title="<?=$itemTopSale['versionName']?>">
                                                <?php
                                                    if ($itemTopSale['idCategory'] == 1) {
                                                        ?><img style="width: 180px; height: auto;" src="uploads/product/smartphone/<?= $itemTopSale['versionImage'] ?>" alt="<?= $itemTopSale['versionName'] ?>"><?php
                                                    } else if ($itemTopSale['idCategory'] == 2) {
                                                        ?><img style="width: 180px; height: auto;" src="uploads/product/laptop/<?= $itemTopSale['versionImage'] ?>" alt="<?= $itemTopSale['versionName'] ?>"><?php
                                                    } else if ($itemTopSale['idCategory'] == 3) {
                                                        ?><img style="width: 180px; height: auto;" src="uploads/product/tablet/<?= $itemTopSale['versionImage'] ?>" alt="<?= $itemTopSale['versionName'] ?>"><?php
                                                    } else if ($itemTopSale['idCategory'] == 4) {
                                                        ?><img style="width: 180px; height: auto;" src="uploads/product/monitor/<?= $itemTopSale['versionImage'] ?>" alt="<?= $itemTopSale['versionName'] ?>"><?php
                                                    } else if ($itemTopSale['idCategory'] == 5) {
                                                        ?><img style="width: 180px; height: auto;" src="uploads/product/smarttv/<?= $itemTopSale['versionImage'] ?>" alt="<?= $itemTopSale['versionName'] ?>"><?php
                                                    } else if ($itemTopSale['idCategory'] == 6) {
                                                        ?><img style="width: 180px; height: auto;" src="uploads/product/watch/<?= $itemTopSale['versionImage'] ?>" alt="<?= $itemTopSale['versionName'] ?>"><?php
                                                    } else if ($itemTopSale['idCategory'] == 7) {
                                                        ?><img style="width: 180px; height: auto;" src="uploads/product/voice/<?= $itemTopSale['versionImage'] ?>" alt="<?= $itemTopSale['versionName'] ?>"><?php
                                                    } else if ($itemTopSale['idCategory'] == 8) {
                                                        ?><img style="width: 180px; height: auto;" src="uploads/product/smarthome/<?= $itemTopSale['versionImage'] ?>" alt="<?= $itemTopSale['versionName'] ?>"><?php
                                                    } else if ($itemTopSale['idCategory'] == 16) {
                                                        ?><img style="width: 180px; height: auto;" src="uploads/product/accessory/<?= $itemTopSale['versionImage'] ?>" alt="<?= $itemTopSale['versionName'] ?>"><?php
                                                    } else if ($itemTopSale['idCategory'] == 17) {
                                                        ?><img style="width: 180px; height: auto;" src="uploads/product/toys/<?= $itemTopSale['versionImage'] ?>" alt="<?= $itemTopSale['versionName'] ?>"><?php
                                                    } else if ($itemTopSale['idCategory'] == 18) {
                                                        ?><img style="width: 180px; height: auto;" src="uploads/product/driftingmachine/<?= $itemTopSale['versionImage'] ?>" alt="<?= $itemTopSale['versionName'] ?>"><?php
                                                    } else if ($itemTopSale['idCategory'] == 19) {
                                                        ?><img style="width: 180px; height: auto;" src="uploads/product/repair/<?= $itemTopSale['versionImage'] ?>" alt="<?= $itemTopSale['versionName'] ?>"><?php
                                                    } else if ($itemTopSale['idCategory'] == 20) {
                                                        ?><img style="width: 180px; height: auto;" src="uploads/product/service/<?= $itemTopSale['versionImage'] ?>" alt="<?= $itemTopSale['versionName'] ?>"><?php
                                                    }
                                                ?>
                                            </a>
                                        </div>
                                        <div class="info">
                                            <a class="title" href="chi-tiet-san-pham.php?idsanpham=<?=$itemTopSale['versionId']?>"><?=$itemTopSale['versionName']?></a>
                                            <span class="price">
                                                <strong><?=number_format($itemTopSale['versionPromotionalPrice'],0,"",".")?> ₫</strong>
                                                <strike><?=number_format($itemTopSale['versionPrice'],0,"",".")?> ₫</strike>
                                            </span>

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
                    $queryApple = mysqli_query($conn, getProduct(1));
                    while ($itemApple = mysqli_fetch_assoc($queryApple)) {
                    ?>
                        <div class="item">
                            <div class="img">
                                <a href="chi-tiet-san-pham.php?idsanpham=<?= $itemApple['idVersion'] ?>" title="<?= $itemApple['versionName'] ?>">
                                    <?php
                                    if ($itemApple['idCategory'] == 1) {
                                    ?><img src="uploads/product/smartphone/<?= $itemApple['versionImage'] ?>" alt="<?= $itemApple['versionName'] ?>" title="<?= $itemApple['versionName'] ?>"><?php
                                                                                                                                                                                            } else if ($itemApple['idCategory'] == 2) {
                                                                                                                                                                                                ?><img src="uploads/product/laptop/<?= $itemApple['versionImage'] ?>" alt="<?= $itemApple['versionName'] ?>" title="<?= $itemApple['versionName'] ?>"><?php
                                                                                                                                                                                                                                                                                                                                                            } else if ($itemApple['idCategory'] == 3) {
                                                                                                                                                                                                                                                                                                                                                                ?><img src="uploads/product/tablet/<?= $itemApple['versionImage'] ?>" alt="<?= $itemApple['versionName'] ?>" title="<?= $itemApple['versionName'] ?>"><?php
                                                                                                                                                                                                                                                                                                                                                            }
                                                                                                                                                                                                                                                                                                                                                            ?>
                                </a>
                            </div>

                            <div class="sticker sticker-left">
                                <span><img src="assets/images/icon/apple.png" title="Chính Hãng Apple" /></span>
                            </div>

                            <div class="info">
                                <a href="chi-tiet-san-pham.php?idsanpham=<?= $itemApple['idVersion'] ?>" class="title" title="<?= $itemApple['productName'] ?>"><?= $itemApple['versionName'] ?>-<?= $itemApple['versionVersion'] ?></a>
                                <span class="price">
                                    <strong><?= number_format($itemApple['versionPromotionalPrice'], 0, "", ".") ?> ₫</strong>
                                    <strike><?= number_format($itemApple['versionPrice'], 0, "", ".") ?> ₫</strike>
                                </span>

                            </div>

                            <div class="note">
                                <span class="bag">KM</span> <label title="Giảm 100.000đ khi khách mua kèm Bộ dán MacBook Air 13' 2020 3M INNOSTYLE DIAMOND GUARD 6 IN 1">Giảm
                                    100.000đ khi khách mua kèm Bộ ...</label>
                                <strong class="text-orange">VÀ 9 KM KHÁC</strong>
                            </div>
                            <div class="promote">
                                <a href="chi-tiet-san-pham.php?idsanpham=<?= $itemApple['idVersion'] ?>">
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
                <a href="" target="_top"><img src="assets/images/img/redmi-note12-04.jpg" style="width: 100%;"></a>
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
                        <a class="actived" href="/dien-thoai-di-dong">Xem tất cả</a>
                        <a href="/dien-thoai-di-dong/iphone/iphone-15-series">iPhone 15</a>
                        <a href="/dien-thoai-di-dong/tecno-pova-5-8gb-128gb-chinh-hang">TECNO POVA 5</a>
                        <a href="/dien-thoai-di-dong/xiaomi/redmi-note-12-series">Redmi Note 12</a>
                        <a href="/dien-thoai-di-dong/samsung/samsung-galaxy-s23">Samsung Galaxy S23</a>
                        <a class="actived" href="/dien-thoai-di-dong">Xem tất cả</a>
                    </div>
                </div>
                <div class="col-content lts-product">
                    <?php
                    $querySmartPhone = mysqli_query($conn, getProduct(3));
                    while ($itemSmartPhone = mysqli_fetch_assoc($querySmartPhone)) {
                    ?>
                        <div class="item">
                            <div class="img">
                                <a href="chi-tiet-san-pham.php?idsanpham=<?= $itemSmartPhone['idVersion'] ?>" title="<?= $itemSmartPhone['versionName'] ?> - <?= $itemSmartPhone['versionVersion'] ?>">
                                    <img src="uploads/product/smartphone/<?= $itemSmartPhone['versionImage'] ?>" alt="<?= $itemSmartPhone['versionName'] ?> - <?= $itemSmartPhone['versionVersion'] ?>" title="<?= $itemSmartPhone['versionName'] ?> - <?= $itemSmartPhone['versionVersion'] ?>">
                                </a>
                            </div>
                            <div class="cover">
                                <div style=" color: yellow;background: #00483D;margin: -95px 5px 0 52px;padding: 3px;border-radius: 6px; font-size: 11px;font-weight: 600; ">
                                    <span style="color:white">HÀNG MỚI VỀ</span><br>
                                    <span style="color:yellow"></span>
                                </div>
                            </div>

                            <div class="info">
                                <a href="chi-tiet-san-pham.php?idsanpham=<?= $itemSmartPhone['idVersion'] ?>" class="title" title="<?= $itemSmartPhone['versionName'] ?> - <?= $itemSmartPhone['versionVersion'] ?>"><?= $itemSmartPhone['versionName'] ?> - <?= $itemSmartPhone['versionVersion'] ?></a>
                                <span class="price">
                                    <strong><?= number_format($itemSmartPhone['versionPromotionalPrice'], 0, "", ".") ?> ₫</strong>
                                    <strike><?= number_format($itemSmartPhone['versionPrice'], 0, "", ".") ?> ₫</strike>
                                </span>

                            </div>

                            <div class="note">
                                <span class="bag">KM</span> <label title="Giảm ngay 150.000đ khi mua k&#232;m SIM số đẹp Vinaphone Happy - Ưu đãi 2GB Data/ngày - Miễn ph&#237; 1000 ph&#250;t nội mạng.">Giảm
                                    ngay 150.000đ khi mua k&#232;m SIM ...</label>
                                <strong class="text-orange">VÀ 8 KM KHÁC</strong>
                            </div>
                            <div class="promote">
                                <a href="chi-tiet-san-pham.php?idsanpham=<?= $itemSmartPhone['idVersion'] ?>">
                                    <ul>
                                        <li><span class="bag">KM</span> Giảm ngay 150.000đ khi mua k&#232;m SIM số đẹp
                                            Vinaphone Happy - Ưu đãi 2GB Data/ngày - Miễn ph&#237; 1000 ph&#250;t nội
                                            mạng.</li>
                                        <li><span class="bag">KM</span> VNPAY - Giảm thêm tới 200.000đ khi thanh toán
                                            qua VNPAY.</li>
                                        <li><span class="bag">KM</span> ZaloPay - Ưu đãi tới 300.000đ khi thanh toán
                                            qua ZaloPay.</li>
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
                <a href="" target="_top"><img src="assets/images/img/tecno-spark-10.png" style="width: 100%;"></a>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="flash-sales box-home">
                <div class="header-container">
                    <div class="header">
                        <h4><a href="/dong-ho">ĐỒNG HỒ THÔNG MINH</a></h4>
                    </div>

                </div>

                <div class="content">
                    <div class="owl-carousel lr-slider equaHeight" data-obj=".info a.title">
                        <?php
                        $queryWatch = mysqli_query($conn, getProduct(7));
                        while ($itemWatch = mysqli_fetch_assoc($queryWatch)) {
                        ?>
                            <div class="item">
                                <div class="img">
                                    <a href="chi-tiet-san-pham.php?idsanpham=<?= $itemWatch['idVersion'] ?>">
                                        <img style="width: 150px;" src="uploads/product/watch/<?= $itemWatch['versionImage'] ?>" alt="<?= $itemWatch['versionName'] ?>" title="<?= $itemWatch['versionName'] ?>">
                                    </a>
                                </div>

                                <?php
                                if ($itemWatch['idBrand'] == 69) {
                                ?>
                                    <div class="sticker sticker-left">
                                        <span><img src="assets/images/icon/apple.png" title="Chính Hãng Apple" /></span>
                                    </div>
                                <?php
                                }
                                ?>


                                <div class="info">
                                    <a href="chi-tiet-san-pham.php?idsanpham=<?= $itemWatch['idVersion'] ?>" class="title"><?= $itemWatch['versionName'] ?></a>
                                    <span class="price">
                                        <strong><?= number_format($itemWatch['versionPromotionalPrice'], 0, "", ".") ?> ₫</strong><strike><?= number_format($itemWatch['versionPrice'], 0, "", ".") ?> ₫</strike></span>
                                </div>


                                <div class="note">
                                    <span class="bag">KM</span> <label title="VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.">VNPAY - Giảm thêm tới 200.000đ khi ...</label>
                                    <strong class="text-orange">VÀ 7 KM KHÁC</strong>
                                </div>
                                <div class="promote">
                                    <a href="chi-tiet-san-pham.php?idsanpham=<?= $itemWatch['idVersion'] ?>">
                                        <ul>
                                            <li><span class="bag">KM</span> VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.</li>
                                            <li><span class="bag">KM</span> ZaloPay - Ưu đãi tới 300.000đ khi thanh toán qua ZaloPay.</li>
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
            </div>
        </div>
    </section>


    <section>
        <div class="container">
            <div class="ads">
                <a href="" target="_top"><img src="assets/images/img/banner-1200x200-01.png" style="width: 100%;"></a>
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
                    <?php
                    $queryLaptop = mysqli_query($conn, getProduct(2));
                    while ($itemLaptop = mysqli_fetch_assoc($queryLaptop)) {
                    ?>
                        <div class="item">
                            <div class="img">
                                <a href="chi-tiet-san-pham.php?idsanpham=<?= $itemLaptop['idVersion'] ?>" title="<?= $itemLaptop['versionName'] ?>">
                                    <img src="uploads/product/laptop/<?= $itemLaptop['versionImage'] ?>" alt="<?= $itemLaptop['versionName'] ?>" title="<?= $itemLaptop['versionName'] ?>">
                                </a>
                            </div>
                            <div class="info">
                                <a href="chi-tiet-san-pham.php?idsanpham=<?= $itemLaptop['idVersion'] ?>" class="title" title="<?= $itemLaptop['versionName'] ?>"><?= $itemLaptop['versionName'] ?></a>
                                <span class="price">
                                    <strong><?= number_format($itemLaptop['versionPromotionalPrice'], 0, "", ".") ?> ₫</strong> <strike><?= number_format($itemLaptop['versionPrice'], 0, "", ".") ?> ₫</strike>
                                </span>
                                <div style="padding-top:8px; font-style:italic; text-align:left;">
                                    <label>Giá HSSV: <strong class="text-red"><?= number_format($itemLaptop['versionPromotionalPrice'], 0, "", ".") ?> ₫</strong></label>
                                </div>
                            </div>
                            <div class="note">
                                <span class="bag">KM</span> <label title="VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.">VNPAY - Giảm thêm tới 200.000đ khi ...</label>
                                <strong class="text-orange">VÀ 9 KM KHÁC</strong>
                            </div>
                            <div class="promote">
                                <a href="chi-tiet-san-pham.php?idsanpham=<?= $itemLaptop['idVersion'] ?>">
                                    <ul>
                                        <li><span class="bag">KM</span> VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.</li>
                                        <li><span class="bag">KM</span> ZaloPay - Ưu đãi tới 300.000đ khi thanh toán qua ZaloPay.</li>
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
        </div>
    </section>

    <section>
        <div class="container">
            <div class="ads">
                <a href="" target="_top"><img src="assets/images/img/1200x200-msi-1-01.png" style="width: 100%;"></a>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="flash-sales box-home">
                <div class="header-container">
                    <div class="header">
                        <h4><a href="/man-hinh">MÀN HÌNH NỔI BẬT</a></h4>
                    </div>

                </div>

                <div class="content">
                    <div class="owl-carousel lr-slider equaHeight" data-obj=".info a.title">
                        <?php
                        $queryMonitor = mysqli_query($conn, getProduct(5));
                        while ($itemMonitor = mysqli_fetch_assoc($queryMonitor)) {
                        ?>
                            <div class="item">
                                <div class="img">
                                    <a href="chi-tiet-san-pham.php?idsanpham=<?= $itemMonitor['idVersion'] ?>">
                                        <img style="width: 150px;" src="uploads/product/monitor/<?= $itemMonitor['versionImage'] ?>" alt="<?= $itemMonitor['versionName'] ?>">
                                    </a>
                                </div>
                                <div class="info">
                                    <a href="chi-tiet-san-pham.php?idsanpham=<?= $itemMonitor['idVersion'] ?>" class="title"><?= $itemMonitor['versionName'] ?></a>
                                    <span class="price">
                                        <strong><?= number_format($itemMonitor['versionPromotionalPrice'], 0, "", ".") ?> ₫</strong> <strike><?= number_format($itemMonitor['versionPrice'], 0, "", ".") ?> ₫</strike>
                                    </span>
                                </div>
                                <div class="note">
                                    <span class="bag">KM</span> <label title="VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.">VNPAY - Giảm thêm tới 200.000đ khi ...</label>
                                    <strong class="text-orange">VÀ 8 KM KHÁC</strong>
                                </div>
                                <div class="promote">
                                    <a href="chi-tiet-san-pham.php?idsanpham=<?= $itemMonitor['idVersion'] ?>">
                                        <ul>
                                            <li><span class="bag">KM</span> VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.</li>
                                            <li><span class="bag">KM</span> ZaloPay - Ưu đãi tới 300.000đ khi thanh toán qua ZaloPay.</li>
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
            </div>
        </div>
    </section>


    <section>
        <div class="container">
            <div class="ads">
                <a href="" target="_top"><img src="assets/images/img/tv-xiaomi-t12-1200x200.jpg" style="width: 100%;"></a>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="flash-sales box-home">
                <div class="header-container">
                    <div class="header">
                        <h4><a href="https://hoanghamobile.com/smart-tv">SMART TV NỔI BẬT</a></h4>
                    </div>

                </div>

                <div class="content">
                    <div class="owl-carousel lr-slider equaHeight" data-obj=".info a.title">
                        <?php
                        $querySmartTV = mysqli_query($conn, getProduct(6));
                        while ($itemSmartTv = mysqli_fetch_assoc($querySmartTV)) {
                        ?>
                            <div class="item">
                                <div class="img">
                                    <a href="chi-tiet-san-pham.php?idsanpham=<?= $itemSmartTv['idVersion'] ?>">
                                        <img style="width: 150px;" src="uploads/product/smarttv/<?= $itemSmartTv['versionImage'] ?>" alt="<?= $itemSmartTv['versionName'] ?>">
                                    </a>
                                </div>
                                <div class="info">
                                    <a href="chi-tiet-san-pham.php?idsanpham=<?= $itemSmartTv['idVersion'] ?>" class="title"><?= $itemSmartTv['versionName'] ?></a>
                                    <span class="price">
                                        <strong><?= number_format($itemSmartTv['versionPromotionalPrice'], 0, "", ".") ?> ₫</strong> <strike><?= number_format($itemSmartTv['versionPrice'], 0, "", ".") ?> ₫</strike>
                                    </span>
                                </div>
                                <div class="cover">
                                    <div style="color: yellow;background: #00483D; margin: -95px 5px 0 52px; padding: 3px;border-radius: 6px; font-size: 11px; font-weight: 600;  ">
                                        <span style="color:white">Giảm 20% khung giá treo</span><br>
                                        <span style="color:yellow">Giá tốt LH 03.86.13.17.16</span>
                                    </div>
                                </div>

                                <div class="note">
                                    <span class="bag">KM</span> <label title="VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.">VNPAY - Giảm thêm tới 200.000đ khi ...</label>
                                    <strong class="text-orange">VÀ 8 KM KHÁC</strong>
                                </div>
                                <div class="promote">
                                    <a href="chi-tiet-san-pham.php?idsanpham=<?= $itemSmartTv['idVersion'] ?>">
                                        <ul>
                                            <li><span class="bag">KM</span> VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.</li>
                                            <li><span class="bag">KM</span> ZaloPay - Ưu đãi tới 300.000đ khi thanh toán qua ZaloPay.</li>
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
            </div>
        </div>
    </section>



    <section>
        <div class="container">
            <div class="flash-sales box-home">
                <div class="header-container">
                    <div class="header">
                        <h4><a href="/tablet">TABLET</a></h4>
                    </div>

                </div>

                <div class="content">
                    <div class="owl-carousel lr-slider equaHeight" data-obj=".info a.title">
                        <?php
                        $queryTablet = mysqli_query($conn, getProduct(4));
                        while ($itemTablet = mysqli_fetch_assoc($queryTablet)) {
                        ?>
                            <div class="item">
                                <div class="img">
                                    <a href="chi-tiet-san-pham.php?idsanpham=<?= $itemTablet['idVersion'] ?>">
                                        <img style="width: 220px;" src="uploads/product/tablet/<?= $itemTablet['versionImage'] ?>" alt="<?= $itemTablet['versionName'] ?> - <?= $itemTablet['versionVersion'] ?>">
                                    </a>
                                </div>
                                <div class="info">
                                    <a href="chi-tiet-san-pham.php?idsanpham=<?= $itemTablet['idVersion'] ?>" class="title"><?= $itemTablet['versionName'] ?> - <?= $itemTablet['versionVersion'] ?></a>
                                    <span class="price">
                                        <strong><?= number_format($itemTablet['versionPromotionalPrice'], 0, "", ".") ?> ₫</strong> <strike><?= number_format($itemTablet['versionPrice'], 0, "", ".") ?> ₫</strike>
                                    </span>
                                </div>
                                <div class="cover">
                                    <div style="color: yellow; background: #00483D;margin: -95px 5px 0 52px;padding: 3px; border-radius: 6px; font-size: 11px; font-weight: 600;">
                                        <span style="color:white">Hotsale giá sốc </span><br>
                                        <span style="color:yellow"></span>
                                    </div>
                                </div>
                                <div class="note">
                                    <span class="bag">KM</span> <label title="Giảm ngay 150.000đ khi mua kèm SIM số đẹp Vinaphone Happy - Ưu đãi 2GB Data/ngày - Miễn phí 1000 phút nội mạng.">Giảm ngay 150.000đ khi mua kèm SIM ...</label>
                                    <strong class="text-orange">VÀ 8 KM KHÁC</strong>
                                </div>
                                <div class="promote">
                                    <a href="chi-tiet-san-pham.php?idsanpham=<?= $itemTablet['idVersion'] ?>">
                                        <ul>
                                            <li><span class="bag">KM</span> Giảm ngay 150.000đ khi mua kèm SIM số đẹp Vinaphone Happy - Ưu đãi 2GB Data/ngày - Miễn phí 1000 phút nội mạng.</li>
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
        </div>
    </section>

    <section>
        <div class="container">
            <div class="ads">
                <a href="" target="_top"><img src="assets/images/img/web-htc-wildfire-e3-lite-01.jpg" style="width: 100%;"></a>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="ads">
                <a href="" target="_top"><img src="assets/images/img/robot-hut-bui-dreame-bot-w10-01.jpg" style="width: 100%;"></a>
            </div>
        </div>
    </section>
    <!-- news -->
    <section>
        <div class="container">
            <div class="news-home box-home">
                <div class="header">
                    <h4><a href="">TIN CÔNG NGHỆ</a></h4>
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
                            <h4>Diễn viên truyền hình</h4>
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
                            <h3>Gia Đình Chuyện Nhà Đậu</h3>
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
                            <h3>Ngô Lan Hương</h3>
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
                            <h4>Diễn viên</h4>
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
                            <h4>Diễn viên truyền hình</h4>
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
                            <h4>Ca sĩ / Diễn viên Phim Em và Trịnh</h4>
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
                            <h4>Đội tuyển huy chương vàng Sea Game 31 bộ môn Liên Minh Huyền Thoại Tốc Chiến</h4>
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
                            <h3>Quách Thị Lan </h3>
                            <h4>VĐV điền kinh đội tuyển quốc gia Việt Nam</h4>
                            <div class="note">
                                Là một vận động viên, Lan luôn muốn mình đạt hiệu quả tập luyện tối đa bằng những phương pháp hiện đại. Chính vì thế, Lan đã quyết định trang bị cho mình vòng đeo tay 𝗛𝘂𝗮𝘄𝗲𝗶 𝗙𝗶𝘁 𝟮 chính hãng tại Hoàng Hà Mobile. Với sự trợ giúp của chiếc vòng tay thông minh này, Lan tự tin hướng đến việc chinh phục những cột mốc mới trong sự nghiệp
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="img">
                            <img src="https://cdn.hoanghamobile.com/i/idol/Uploads/2022/03/15/whatsapp-image-2022-03-15-at-9-34-21-am.jpeg" />
                        </div>

                        <div class="info">
                            <h3>DV Trung Ruồi</h3>
                            <h4>Diễn viên</h4>
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
                            <h3>Quách Công Lịch</h3>
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
                            <h4>HCV nội dung chạy 1.500m tại Giải điền kinh vô địch quốc gia 2021.</h4>
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
                            <h4>Nghệ sĩ, Diễn viên hài</h4>
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
                            <h3>Diễn viên Phương Oanh</h3>
                            <h4>Diễn viên truyền hình/ Người mẫu </h4>
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
                            <h3>Diễn viên Quang Trung</h3>
                            <h4>Diễn viên/Ca sĩ/ Nghệ sĩ được yêu mến</h4>
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
                            <h4>Diễn viên truyền hình</h4>
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
                            <h3>Diễn viên Doãn Quốc Đam</h3>
                            <h4>Diễn viên truyền hình </h4>
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
                            <h4>BTV/MC VTV, Diễn viên</h4>
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
                            <h3>Diễn viên Mạnh Hưng </h3>
                            <h4>Diễn viên truyền hình </h4>
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
                            <h3>VĐV Nguyễn Thị &#193;nh Viên</h3>
                            <h4>Kình ngư đội tuyển Bơi lội Việt Nam</h4>
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
                            <h4>Ca sĩ, á Qu&#226;n The Voice 2019</h4>
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
                            <h3>Nguyễn Huy Hoàng </h3>
                            <h4>Vận động viên bơi lội</h4>
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



    <section>
        <div class="container">
            <div class="subscript">
                <div class="icon-text">
                    <img src="assets/images/icon/sub-logo.png" />
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
        hh_home();
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