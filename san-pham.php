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
    <?php  include 'header.php';  ?>
    
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