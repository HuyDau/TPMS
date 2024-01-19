<?php
require_once("config/config.php");
include 'handle.php';

$queryProduct1 = mysqli_query($conn,getDetailProduct($_GET['sp1']));
$infoProduct1 = mysqli_fetch_assoc($queryProduct1) ;

$queryProduct2 = mysqli_query($conn,getDetailProduct($_GET['sp2']));
$infoProduct2 = mysqli_fetch_assoc($queryProduct2) ;

$prod1 = getSpecifications($conn,$_GET['sp1']);
$ipsp1 = $_GET['sp1'];
$prod1 = mysqli_query($conn,"SELECT * FROM tbl_specifications WHERE versionId = $ipsp1");
$infoProd1 = mysqli_fetch_assoc($prod1);
$ipsp2 = $_GET['sp2'];
$prod2 = mysqli_query($conn,"SELECT * FROM tbl_specifications WHERE versionId = $ipsp2");
$infoProd2 = mysqli_fetch_assoc($prod2);
?>
<!doctype html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="author" content="hoanghamobile.com">
    <meta property='og:site_name' content='hoanghamobile.com' />
    <meta name="google-site-verification" content="JOFGGI7j9vWfBf-xpElM5Tec0UJ1k_CfdNjpaHm5z10" />
    <meta name="msvalidate.01" content="5C8CDF0992489498A30F9E5F6668A4D5" />
    <meta name="geo.placename" content="Hanoi, Hoàn Kiếm, Hanoi, Vietnam" />
    <meta name="geo.position" content="21.017249242314964;105.84134504199028" />
    <meta name="geo.region" content="VN-Hanoi" />
    <meta name="ICBM" content="21.017249242314964, 105.84134504199028" />

    <title>TPMS - SO SÁNH SẢN PHẨM</title>
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
            <ol class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <a itemprop="item" href="index.php"><span itemprop="name" content="Trang chủ"><i class="icon-home" title="Trang chủ"></i></span></a>
                    <meta itemprop="position" content="1" />
                </li>
            
                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <a itemprop="item" href=""><span itemprop="name" content="So sánh sản phẩm">So sánh sản phẩm</span></a>
                    <meta itemprop="position" content="2" />
                </li>
            
                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <a class="actived" itemprop="item" href=""><span itemprop="name" content="So sánh sản phẩm "> So sánh iPhone 12 (64GB) - Chính hãng VN/A và OPPO Find N2 Flip - Chính hãng</span></a>
                    <meta itemprop="position" content="3" />
                </li>
            </ol>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="compare">
                <table class="table tab-content table-bordered table-striped table-compare">
                    <tr class="specs-group">
                        <th colspan="4">Thông tin chung</th>
                    </tr>
                    <tr class="specs equaHeight" data-obj="h3">
                        <td class="text " style="width:17.5%;">Hình ảnh, Giá</td>
                            <td class="item image" style="width:27.5%">
                                <p style="text-align:right;"><a href="" class="remove" title="So sánh sản phẩm"><i class="icon-minutes"></i></a></p>
                                <div class="image">
                                    <a href="chi-tiet-san-pham.php?idsanpham=<?=$infoProduct1['idVersion']?>">
                                        <?php
                                            if ($infoProduct1['idCategory'] == 1) {
                                                ?>
                                                    <img style="width: 180px;" src="uploads/product/smartphone/<?=$infoProduct1['versionImage']?>" />
                                                <?php
                                            }else if ($infoProduct1['idCategory'] == 2) {
                                                ?>
                                                    <img style="width: 180px;" src="uploads/product/laptop/<?= $infoProduct1['versionImage'] ?>" >
                                                <?php
                                            }else if ($infoProduct1['idCategory'] == 3) {
                                                ?>
                                                    <img style="width: 180px;" src="uploads/product/tablet/<?= $infoProduct1['versionImage'] ?>" >
                                                <?php
                                            }else if ($infoProduct1['idCategory'] == 4) {
                                                ?>
                                                    <img style="width: 180px;" src="uploads/product/monitor/<?= $infoProduct1['versionImage'] ?>" >
                                                <?php
                                            }else if ($infoProduct1['idCategory'] == 5) {
                                                ?>
                                                    <img style="width: 180px;" src="uploads/product/smarttv/<?= $infoProduct1['versionImage'] ?>" >
                                                <?php
                                            }else if ($infoProduct1['idCategory'] == 6) {
                                                ?>
                                                    <img style="width: 180px;" src="uploads/product/watch/<?= $infoProduct1['versionImage'] ?>" >
                                                <?php
                                            }
                                        ?>
                                    </a>
                                </div>
                                <h3><a href="chi-tiet-san-pham.php?idsanpham=<?=$infoProduct1['idVersion']?>"><?=$infoProduct1['versionName']?></a></h3>
                                <div class="price-note">
                                    <p class="price">
                                        <strong><?=number_format($infoProduct1['versionPromotionalPrice'],0,"",".")?> ₫ </strong>
                                        <i> <strike><?=number_format($infoProduct1['versionPrice'],0,"",".")?> ₫</strike></i>
                                        <i> | Giá đã bao gồm 10% VAT</i>
                                    </p>
                                    <p class="note"></p>
                                </div>
                            </td>
                            <td class="item image" style="width:27.5%">
                                <p style="text-align:right;"><a href="/so-sanh/apple-iphone-12-64gb-chinh-hang-vn-a-ss.794" class="remove" title="So sánh sản phẩm: iPhone 12 (64GB) - Chính hãng VN/A"><i class="icon-minutes"></i></a></p>
                                <div class="image">
                                    <a href="chi-tiet-san-pham.php?idsanpham=<?=$infoProduct2['idVersion']?>">
                                      
                                        <?php
                                            if ($infoProduct2['idCategory'] == 1) {
                                                ?>
                                                    <img style="width: 180px;" src="uploads/product/smartphone/<?=$infoProduct2['versionImage']?>" />
                                                <?php
                                            }else if ($infoProduct2['idCategory'] == 2) {
                                                ?>
                                                    <img style="width: 180px;" src="uploads/product/laptop/<?= $infoProduct2['versionImage'] ?>" >
                                                <?php
                                            }else if ($infoProduct2['idCategory'] == 3) {
                                                ?>
                                                    <img style="width: 180px;" src="uploads/product/tablet/<?= $infoProduct2['versionImage'] ?>" >
                                                <?php
                                            }else if ($infoProduct2['idCategory'] == 4) {
                                                ?>
                                                    <img  style="width: 180px;" src="uploads/product/monitor/<?= $infoProduct2['versionImage'] ?>" >
                                                <?php
                                            }else if ($infoProduct2['idCategory'] == 5) {
                                                ?>
                                                    <img style="width: 180px;" src="uploads/product/smarttv/<?= $infoProduct2['versionImage'] ?>" >
                                                <?php
                                            }else if ($infoProduct2['idCategory'] == 6) {
                                                ?>
                                                    <img style="width: 180px;" src="uploads/product/watch/<?= $infoProduct2['versionImage'] ?>" >
                                                <?php
                                            }
                                        ?>
                                    </a>
                                </div>
                                <h3><a href="chi-tiet-san-pham.php?idsanpham=<?=$infoProduct2['idVersion']?>"><?=$infoProduct2['versionName']?></a></h3>
                                <div class="price-note">
                                    <p class="price">
                                        <strong><?=number_format($infoProduct2['versionPromotionalPrice'],0,"",".")?> ₫ </strong>
                                        <i> <strike><?=number_format($infoProduct2['versionPrice'],0,"",".")?> ₫</strike></i>
                                        <i> | Giá đã bao gồm 10% VAT</i>
                                    </p>
                                    <p class="note"></p>
                                </div>
                            </td>
                                <td class="item" style="width:27.5%">
                                <div class="add-product">
                                    <h3>Bạn muốn so sánh thêm sản phẩm?</h3>
                                    <div class="input">
                                        <input id="kwdCompare" type="text" placeholder="Tìm kiếm sản phẩm" />
                                    </div>
                                </div>
                            </td>
                    </tr>

                    <tr class="specs">
                        <th class="text">Bộ sản phẩm tiêu chuẩn</th>
                            <td class="data">
                                
                            </td>
                            <td class="data">
                                
                            </td>
                            <td></td>
                    </tr>
                    
                    <tr class="specs">
                        <td class="text">Bảo hành</td>
                            <td class="data">Bảo hành 12 tháng chính hãng.</td>
                            <td class="data">Bảo hành 18 tháng chính hãng</td>
                                                <td></td>
                    </tr>
                    <?php
                        if(isset($infoProd1['screen']) || isset($infoProd2['screen'])){
                            ?>
                                <tr class="specs-group">
                                    <th class="text" colspan="4">Màn hình</th>
                                </tr>
                                <tr class="specs">
                                    <th class="text">Màn hình</th>
                                        <td class="data">
                                            <span><?php if(isset($infoProd1['screen'])){echo $infoProd1['screen'];}?></span>
                                        </td>
                                        <td class="data">
                                            <span><?php if(isset($infoProd2['screen'])){echo $infoProd2['screen'];}?></span>
                                        </td>
                                                                        
                                </tr>
                            <?php
                        }
                    ?>
                    <?php
                        if(isset($infoProd1['rearCamera']) || isset($infoProd2['rearCamera'])){
                            ?>
                                <tr class="specs-group">
                                    <th class="text" colspan="4">Camera Sau</th>
                                </tr>
                                <tr class="specs">
                                    <th class="text">Camera Sau</th>
                                        <td class="data">
                                            <span><?php if(isset($infoProd1['rearCamera'])){echo $infoProd1['rearCamera'];}?></span>
                                        </td>
                                        <td class="data">
                                            <span><?php if(isset($infoProd2['rearCamera'])){echo $infoProd2['rearCamera'];}?></span>
                                        </td>
                                                                        
                                </tr>
                            <?php
                        }
                    ?>
                    <?php
                        if(isset($infoProd1['frontCamera']) || isset($infoProd2['frontCamera'])){
                            ?>
                                <tr class="specs-group">
                                    <th class="text" colspan="4">Camera Trước</th>
                                </tr>
                                <tr class="specs">
                                    <th class="text">Camera Trước</th>
                                        <td class="data">
                                            <span><?php if(isset($infoProd1['frontCamera'])){echo $infoProd1['frontCamera'];}?></span>
                                        </td>
                                        <td class="data">
                                            <span><?php if(isset($infoProd2['frontCamera'])){echo $infoProd2['frontCamera'];}?></span>
                                        </td>
                                                                        
                                </tr>
                            <?php
                        }
                    ?>
                    <?php
                        if(isset($infoProd1['CPU']) || isset($infoProd2['CPU'])){
                            ?>
                                <tr class="specs-group">
                                    <th class="text" colspan="4">Hệ điều hành & CPU</th>
                                </tr>
                                <tr class="specs">
                                    <th class="text">Hệ điều hành & CPU</th>
                                        <td class="data">
                                            <span><?php if(isset($infoProd1['CPU'])){echo $infoProd1['CPU'];}?></span>
                                        </td>
                                        <td class="data">
                                            <span><?php if(isset($infoProd2['CPU'])){echo $infoProd2['CPU'];}?></span>
                                        </td>
                                                                        
                                </tr>
                            <?php
                        }
                    ?>
                    <?php
                        if(isset($infoProd1['MemoryStorage']) || isset($infoProd2['MemoryStorage'])){
                            ?>
                                <tr class="specs-group">
                                    <th class="text" colspan="4">Bộ nhớ & Lưu trữ</th>
                                </tr>
                                <tr class="specs">
                                    <th class="text">Bộ nhớ & Lưu trữ</th>
                                        <td class="data">
                                            <span><?php if(isset($infoProd1['MemoryStorage'])){echo $infoProd1['MemoryStorage'];}?></span>
                                        </td>
                                        <td class="data">
                                            <span><?php if(isset($infoProd2['MemoryStorage'])){echo $infoProd2['MemoryStorage'];}?></span>
                                        </td>
                                                                        
                                </tr>
                            <?php
                        }
                    ?>
                    <?php
                        if(isset($infoProd1['Connect']) || isset($infoProd2['Connect'])){
                            ?>
                                <tr class="specs-group">
                                    <th class="text" colspan="4">Kết nối</th>
                                </tr>
                                <tr class="specs">
                                    <th class="text">Kết nối</th>
                                        <td class="data">
                                            <span><?php if(isset($infoProd1['Connect'])){echo $infoProd1['Connect'];}?></span>
                                        </td>
                                        <td class="data">
                                            <span><?php if(isset($infoProd2['Connect'])){echo $infoProd2['Connect'];}?></span>
                                        </td>
                                                                        
                                </tr>
                            <?php
                        }
                    ?>
                    <?php
                        if(isset($infoProd1['BatteryandCharger']) || isset($infoProd2['BatteryandCharger'])){
                            ?>
                                <tr class="specs-group">
                                    <th class="text" colspan="4">Pin & Sạc</th>
                                </tr>
                                <tr class="specs">
                                    <th class="text">Pin & Sạc</th>
                                        <td class="data">
                                            <span><?php if(isset($infoProd1['BatteryandCharger'])){echo $infoProd1['BatteryandCharger'];}?></span>
                                        </td>
                                        <td class="data">
                                            <span><?php if(isset($infoProd2['BatteryandCharger'])){echo $infoProd2['BatteryandCharger'];}?></span>
                                        </td>
                                                                        
                                </tr>
                            <?php
                        }
                    ?>
                    <?php
                        if(isset($infoProd1['Utilities']) || isset($infoProd2['Utilities'])){
                            ?>
                                <tr class="specs-group">
                                    <th class="text" colspan="4">Tiện ích</th>
                                </tr>
                                <tr class="specs">
                                    <th class="text">Tiện ích</th>
                                        <td class="data">
                                            <span><?php if(isset($infoProd1['Utilities'])){echo $infoProd1['Utilities'];}?></span>
                                        </td>
                                        <td class="data">
                                            <span><?php if(isset($infoProd2['Utilities'])){echo $infoProd2['Utilities'];}?></span>
                                        </td>
                                                                        
                                </tr>
                            <?php
                        }
                    ?>
                    <?php
                        if(isset($infoProd1['generalInformation']) || isset($infoProd2['generalInformation'])){
                            ?>
                                <tr class="specs-group">
                                    <th class="text" colspan="4">Thông tin chung</th>
                                </tr>
                                <tr class="specs">
                                    <th class="text">Thông tin chung</th>
                                        <td class="data">
                                            <span><?php if(isset($infoProd1['generalInformation'])){echo $infoProd1['generalInformation'];}?></span>
                                        </td>
                                        <td class="data">
                                            <span><?php if(isset($infoProd2['generalInformation'])){echo $infoProd2['generalInformation'];}?></span>
                                        </td>
                                                                        
                                </tr>
                            <?php
                        }
                    ?>
                </table>
            </div>
        </div>
    </section>
    <?php include 'footer.php' ?>
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
            showPopup(342);
        });
    </script>
        <script type="text/javascript">
        $(document).ready(function () {
            showSticker(83);
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

