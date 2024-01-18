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
                                <?php
                                    $sql = getBrand($conn, $_GET['idCat']);
                                    $queryBrand = mysqli_query($conn,$sql);
                                    while($item = mysqli_fetch_assoc($queryBrand)){
                                        ?>
                                            <li><a href="san-pham.php?idCat=<?=$_GET['idCat']?>&idBrand=<?=$item['id']?>"><?=$item['brandName']?></a></li>
                                        <?php
                                    }

                                ?>
                            </ul>
                        </div>
                    </div>
                    <div class="facet">
                        <label>
                            <a href="javascript:;">Giá<i class="icon-rightar"></i></a>
                        </label>
                        <div class="sub">
                            <ul>
                                <li><a href="san-pham.php?idCat=<?php if(isset($_GET['idCat'])){echo $_GET['idCat'];}?><?php if(isset($_GET['idBrand'])){?>&idBrand=<?=$_GET['idBrand']?><?php }?>&min=0&max=1000000">Dưới 1 triệu</a></li>
                                <li><a href="san-pham.php?idCat=<?php if(isset($_GET['idCat'])){echo $_GET['idCat'];}?><?php if(isset($_GET['idBrand'])){?>&idBrand=<?=$_GET['idBrand']?><?php }?>&min=1000000&max=10000000">1 đến 10 triệu</a></li>
                                <li><a href="san-pham.php?idCat=<?php if(isset($_GET['idCat'])){echo $_GET['idCat'];}?><?php if(isset($_GET['idBrand'])){?>&idBrand=<?=$_GET['idBrand']?><?php }?>&min=10000000&max=50000000">10 đến 50 triệu</a></li>
                                <li><a href="san-pham.php?idCat=<?php if(isset($_GET['idCat'])){echo $_GET['idCat'];}?><?php if(isset($_GET['idBrand'])){?>&idBrand=<?=$_GET['idBrand']?><?php }?>&min=50000000&max=100000000">Trên 50 triệu</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="right">
                    <div class="facet">
                        <label>Sắp xếp <i class="icon-rightar"></i></label>
                        <div class="sub">
                            <ul>
                                <li><a href="san-pham.php<?php if(isset($_GET['idCat'])){?>?idCat=<?= $_GET['idCat']?><?php }?><?php if(isset($_GET['idBrand'])){?>&idBrand=<?=$_GET['idBrand']?><?php }?><?php if(isset($_GET['min'])){?>&min=<?=$_GET['min']?><?php }?><?php if(isset($_GET['max'])){?>&max=<?=$_GET['max']?><?php }?>"><span class="fa fa-angle-right"></span> Mặc định</a></li>
                                <li><a href="san-pham.php<?php if(isset($_GET['idCat'])){?>?idCat=<?= $_GET['idCat']?><?php }?><?php if(isset($_GET['idBrand'])){?>&idBrand=<?=$_GET['idBrand']?><?php }?><?php if(isset($_GET['min'])){?>&min=<?=$_GET['min']?><?php }?><?php if(isset($_GET['max'])){?>&max=<?=$_GET['max']?><?php }?>&sort=asc"><span class="fa fa-angle-right"></span> Giá thấp đến cao</a></li>
                                <li><a href="san-pham.php<?php if(isset($_GET['idCat'])){?>?idCat=<?= $_GET['idCat']?><?php }?><?php if(isset($_GET['idBrand'])){?>&idBrand=<?=$_GET['idBrand']?><?php }?><?php if(isset($_GET['min'])){?>&min=<?=$_GET['min']?><?php }?><?php if(isset($_GET['max'])){?>&max=<?=$_GET['max']?><?php }?>&sort=desc"><span class="fa fa-angle-right"></span> Giá cao đến thấp</a></li>
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
                        
                        if(isset($_POST['searchData']) && !empty($_POST['dataSearch'])){
                            $dataSearch = $_POST['dataSearch'];
                            $query = mysqli_query($conn,"SELECT * FROM `tbl_versions` INNER JOIN tbl_products ON tbl_versions.productId = tbl_products.id WHERE tbl_products.isActive = 2 AND versionName LIKE '%$dataSearch%'");
                        }else if(isset($_GET['min']) && isset($_GET['max'])){
                            $query = getListProductPrice($conn,$_GET['idCat'],$_GET['idBrand'],$_GET['min'],$_GET['max']);
                        }else if(isset($_GET['sort'])){
                            if($_GET['sort'] == 'asc'){
                                $query = mysqli_query($conn,"SELECT * FROM `tbl_versions` INNER JOIN tbl_products ON tbl_versions.productId = tbl_products.id ORDER BY versionPromotionalPrice ASC");
                            }else{
                                $query = mysqli_query($conn,"SELECT * FROM `tbl_versions` INNER JOIN tbl_products ON tbl_versions.productId = tbl_products.id ORDER BY versionPromotionalPrice DESC");
                            }
                        }
                        else{
                            if(isset($_GET['idBrand'])){
                                $query = getListProduct($conn,$_GET['idCat'],$_GET['idBrand']);
                            }else{
                                $query = getListProduct($conn,$_GET['idCat'],0);
                            }
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