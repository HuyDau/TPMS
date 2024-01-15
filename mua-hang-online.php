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
    <title>TPMS - Hướng Dẫn Mua Hàng Online</title>
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
    <meta property="og:image" content="assets/images/logo/favicon.ico" />
    <script async src="assets/js/ins.js"></script>
</head>

<body>
    <!-- <div class="top-link">
        <span class="pulse"></span>
        <p>
            <strong>Cơ hội sở hữu Samsung S20 FE 256GB chỉ với 6.990.000đ - SL c &#243;hạn</strong>
            <a href="https://hoanghamobile.com/dien-thoai-di-dong/samsung-galaxy-s20-fe-256gb-chinh-hang" target="_top">Xem chi tiết</a>
        </p>
    </div> -->
    <?php  include 'header.php';  ?>
    <section>
        <div class="container">
            <ol class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <a itemprop="item" href="index.php">
                        <span itemprop="name" content="Trang chủ">
                            <i class="icon-home" title="Trang chủ"></i>
                            Trang chủ
                        </span>
                    </a>
                    <meta itemprop="position" content="1"/>
                </li>
                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <a itemprop="item" href="mua-hang-online.php" title="Mua Hàng Online Chính Hãng Giá Rẻ" class="actived">
                        <span itemprop="name" content="Mua Hàng Online">Mua Hàng Online</span>
                    </a>
                    <meta itemprop="position" content="2"/>
                </li>
            </ol>
        </div>
    </section>
        
    <section>
        <div class="container page-text">
            <ul
                style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 15px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline; list-style: none;">
                <li
                    style="font-family: Arial, Helvetica, sans-serif; font-size: 13px; margin: 0px; padding: 0px 0px 5px; border: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal; vertical-align: baseline;">
                    <strong>
                        <font color="#000000">Tư vấn Mua hàng trực tuyến:</font>
                    </strong>
                </li>
                <li class="padding"
                    style="font-family: Arial, Helvetica, sans-serif; font-size: 13px; margin: 0px; padding: 0px 0px 5px 10px; border: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal; vertical-align: baseline;">
                    <font color="#000000">
                        <b style="font-size: 18px;">
                            <a href="tel:0386131716"
                                style="margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; outline: none;">03.86.13.17.16</a>
                        </b>
                        <i>(08:00 - 12:00; 13:30 - 21:30)</i>
                    </font>
                </li>
                <li class="padding"
                    style="font-family: Arial, Helvetica, sans-serif; font-size: 13px; margin: 0px; padding: 0px 0px 5px 10px; border: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal; vertical-align: baseline;">
                    <br>
                </li>
                <li class="padding"
                    style="font-size: 13px; margin: 0px; padding: 0px 0px 5px 10px; border: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal; vertical-align: baseline;">
                    <font color="#000000" face="Arial, Helvetica, sans-serif">Số điện thoại liên hệ:</font>
                </li>
                <li class="padding"
                    style="font-size: 13px; margin: 0px; padding: 0px 0px 5px 10px; border: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal; vertical-align: baseline;">
                    <font color="#000000" face="Arial, Helvetica, sans-serif">Hà Nội: 086131716</font>
                </li>
                <li class="padding"
                    style="font-size: 13px; margin: 0px; padding: 0px 0px 5px 10px; border: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal; vertical-align: baseline;">
                    <font color="#000000" face="Arial, Helvetica, sans-serif">TP.HCM: 086131716</font>
                </li>
                <li class="padding"
                    style="font-size: 13px; margin: 0px; padding: 0px 0px 5px 10px; border: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal; vertical-align: baseline;">
                    <font color="#000000" face="Arial, Helvetica, sans-serif">
                        <br>
                    </font>
                </li>
                <li class="padding"
                    style="margin: 0px; padding: 0px 0px 5px 10px; border: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal; vertical-align: baseline;">
                </li>
                <li class="padding"
                    style="margin: 0px; padding: 0px 0px 5px 10px; border: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal; vertical-align: baseline;">
                    <font color="#000000" face="Arial, Helvetica, sans-serif">
                        <span style="font-size: 13px;">Email hỗ trợ bán hàng Online, doanh nghiệp:
                            online@TPMS.com</span>
                    </font>
                </li>
                <li class="padding"
                    style="margin: 0px; padding: 0px 0px 5px 10px; border: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal; vertical-align: baseline;">
                    <font color="#000000" face="Arial, Helvetica, sans-serif">
                        <span style="font-size: 13px;">Email hỗ trợ chung: contact@TPMS.com </span>
                    </font>
                </li>
            </ul>
            <p
                style="margin: 0px; padding: 0px 0px 5px 10px; border: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal; vertical-align: baseline;">
                <font color="#000000" face="Arial, Helvetica, sans-serif">
                    <span style="font-size: 13px;">
                        <br>
                    </span>
                </font>
            </p>
            <ul
                style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 15px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline; list-style: none;">
                <li class="padding"
                    style="margin: 0px; padding: 0px 0px 5px 10px; border: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: normal; vertical-align: baseline;">
                    <font color="#000000" face="Arial, Helvetica, sans-serif">
                        <span style="font-size: 13px;">
                            <p
                                style="text-align: justify; margin-bottom: 1.5em; color: rgb(46, 46, 46); font-family: Open Sans, sans-serif; font-size: 15px; background-color: rgb(244, 244, 244);">
                                Để phục vụ khách hàng mua sắm một cách tốt nhất, TPMS đã tổng hợp toàn bộ các
                                hình thức mua hàng online trên tất cả các nền tảng. Hiện tại, khách hàng có thể mua các sản
                                phẩm công nghệ ngay trên website, Fanpage hoặc thông qua các sàn thương mại điện tử như
                                Shopee, Lazada.</p>
                            <span id="elementor-toc__heading-anchor-0" class="elementor-menu-anchor "
                                style="color: rgb(46, 46, 46); font-family: Open Sans, sans-serif; font-size: 15px; background-color: rgb(244, 244, 244);"></span>
                            <h2
                                style="text-align: justify; margin-top: 0.5rem; margin-bottom: 1rem; font-family: Open Sans, sans-serif; font-weight: 500; color: rgb(46, 46, 46); font-size: 32px; background-color: rgb(244, 244, 244);">
                                Mua sắm ngay trên website</h2>
                            <p
                                style="text-align: justify; margin-bottom: 1.5em; color: rgb(46, 46, 46); font-family: Open Sans, sans-serif; font-size: 15px; background-color: rgb(244, 244, 244);">
                                Website 
                                <span style="font-weight: bolder;">
                                    <a href="https://tpms.com/"
                                        style="color: var(--e-global-color-primary); box-shadow: none;">tpms.com</a>
                                </span>
                                luôn cập nhật đầy đủ thông tin về thông số sản phẩm, giá bán, chương trình khuyến mãi.
                                Vậy nên khi cần mua sắm bất kỳ sản phẩm công nghệ nào khách hàng có thể tham khao ngay. Việc
                                đặt hàng trên website cũng rất đơn giản, quý khách chỉ cần nhấn vào nút “Mua ngay” màu đỏ
                                ngay bên cạnh sản phẩm hoặc nhấn Chat trực tuyến để được nhân viên tư vấn kỹ hơn.
                            </p>
                            <p
                                style="text-align: center; margin-bottom: 1.5em; color: rgb(46, 46, 46); font-family: Open Sans, sans-serif; font-size: 15px; background-color: rgb(244, 244, 244);">
                                <picture>
                                    <img data-lazyloaded="1"
                                        src="assets/images/img/hh-website.png"
                                        class="alignnone size-large wp-image-268107 webpexpress-processed entered litespeed-loaded"
                                        alt="" width="800" height="528"
                                        style="height: auto; max-width: 100%; border-width: initial; border-style: none; border-radius: 0px; box-shadow: none;">
                                </picture>
                            </p>
                            <p
                                style="text-align: justify; margin-bottom: 1.5em; color: rgb(46, 46, 46); font-family: Open Sans, sans-serif; font-size: 15px; background-color: rgb(244, 244, 244);">
                                Tham khảo hướng dẫn đặt hàng 
                                <span style="font-weight: bolder;">
                                    <a href="huong-dan-dat-hang.php"
                                        style="color: var(--e-global-color-primary); box-shadow: none;">tại đây</a>
                                </span>
                                .
                            </p>
                            <span id="elementor-toc__heading-anchor-1" class="elementor-menu-anchor "
                                style="color: rgb(46, 46, 46); font-family: Open Sans, sans-serif; font-size: 15px; background-color: rgb(244, 244, 244);"></span>
                            <h2
                                style="text-align: justify; margin-top: 0.5rem; margin-bottom: 1rem; font-family: Open Sans, sans-serif; font-weight: 500; color: rgb(46, 46, 46); font-size: 32px; background-color: rgb(244, 244, 244);">
                                Mua sắm trên FanPage Facebook</h2>
                            <p
                                style="text-align: justify; margin-bottom: 1.5em; color: rgb(46, 46, 46); font-family: Open Sans, sans-serif; font-size: 15px; background-color: rgb(244, 244, 244);">
                                <span style="font-weight: bolder;">
                                    <a href="https://www.facebook.com/lehuydau2312/" style="color: var(--e-global-color-primary); box-shadow: none;">FanPage TPMS</a>
                                </span>
                                với hơn 1 triệu lượt theo dõi cũng là một trong những kênh mua sắm chính của khách
                                hàng. Tại đây, khách hàng có thể cập nhật nhanh chóng các ưu đãi về giá và các chương trình
                                khuyến mãi hấp dẫn. Đội ngũ chăm sóc khách hàng của TPMS luôn sẵn lòng giải đáp
                                mọi thắc mắc và hỗ trợ đặt hàng nhanh nhất.
                            </p>
                            <p
                                style="text-align: center; margin-bottom: 1.5em; color: rgb(46, 46, 46); font-family: Open Sans, sans-serif; font-size: 15px; background-color: rgb(244, 244, 244);">
                                <picture>
                                    <img data-lazyloaded="1"
                                        src="assets/images/img/hh-fb.png"
                                        class="alignnone size-large wp-image-268106 webpexpress-processed entered litespeed-loaded"
                                        width="800" height="517"
                                        style="height: auto; max-width: 100%; border-width: initial; border-style: none; border-radius: 0px; box-shadow: none;">
                                </picture>
                            </p>
                            <span id="elementor-toc__heading-anchor-2" class="elementor-menu-anchor "
                                style="color: rgb(46, 46, 46); font-family: Open Sans, sans-serif; font-size: 15px; background-color: rgb(244, 244, 244);"></span>
                            <h2
                                style="text-align: justify; margin-top: 0.5rem; margin-bottom: 1rem; font-family: Open Sans, sans-serif; font-weight: 500; color: rgb(46, 46, 46); font-size: 32px; background-color: rgb(244, 244, 244);">
                                Mua sắm trên Shopee Mall</h2>
                            <p
                                style="text-align: justify; margin-bottom: 1.5em; color: rgb(46, 46, 46); font-family: Open Sans, sans-serif; font-size: 15px; background-color: rgb(244, 244, 244);">
                                TPMS đã chính thức có gian hàng trên 
                                <span style="font-weight: bolder;">
                                    <a href="https://shopee.vn/hoangha_mobile_official"
                                        style="color: var(--e-global-color-primary); box-shadow: none;">Shopee Mall</a>
                                </span>
                                nhằm giúp khách hàng mua sắm thuận tiện nhất. Trên sàn thương mại điện tử này thường
                                có rất nhiều ưu đãi hấp dẫn vào các ngày sale lớn như 10/10, 11/11 hoặc sale giữa tháng. Vậy
                                nên khách hàng có thể dễ dàng sở hữu sản phẩm công nghệ chính hãng giá tốt nhất.
                            </p>
                            <p
                                style="text-align: center; margin-bottom: 1.5em; color: rgb(46, 46, 46); font-family: Open Sans, sans-serif; font-size: 15px; background-color: rgb(244, 244, 244);">
                                <picture>
                                    <img data-lazyloaded="1"
                                        src="assets/images/img/hh-shopee.PNG"
                                        class="alignnone size-large wp-image-268102 webpexpress-processed entered litespeed-loaded"
                                        width="800" height="524"
                                        style="height: auto; max-width: 100%; border-width: initial; border-style: none; border-radius: 0px; box-shadow: none;">
                                </picture>
                            </p>
                            <span id="elementor-toc__heading-anchor-3" class="elementor-menu-anchor "
                                style="color: rgb(46, 46, 46); font-family: Open Sans, sans-serif; font-size: 15px; background-color: rgb(244, 244, 244);"></span>
                            <h2
                                style="text-align: justify; margin-top: 0.5rem; margin-bottom: 1rem; font-family: Open Sans, sans-serif; font-weight: 500; color: rgb(46, 46, 46); font-size: 32px; background-color: rgb(244, 244, 244);">
                                Mua sắm trên Lazada</h2>
                            <p
                                style="text-align: justify; margin-bottom: 1.5em; color: rgb(46, 46, 46); font-family: Open Sans, sans-serif; font-size: 15px; background-color: rgb(244, 244, 244);">
                                Đầu năm nay, TPMS cũng đã mở thêm gian hàng chính hãng trên sàn thương mại điện
                                tử 
                                <span style="font-weight: bolder;">
                                    <a href="https://www.lazada.vn/shop/hoang-ha-mobile/"
                                        style="color: var(--e-global-color-primary); box-shadow: none;">Lazada</a>
                                </span>
                                . Vì vậy, khách hàng có thể yên tâm mua hàng chính hãng, không lo hàng giả, hàng nhái, hàng
                                kém chất lượng. Tại đây cũng có rất nhiều voucher giảm giá hấp dẫn dành cho khách hàng.
                            </p>
                            <p
                                style="text-align: center; margin-bottom: 1.5em; color: rgb(46, 46, 46); font-family: Open Sans, sans-serif; font-size: 15px; background-color: rgb(244, 244, 244);">
                                <picture>
                                    <img data-lazyloaded="1"
                                        src="assets/images/img/hh-lazada.png"
                                        class="alignnone size-large wp-image-268101 webpexpress-processed entered litespeed-loaded"
                                        width="800" height="415"
                                        style="height: auto; max-width: 100%; border-width: initial; border-style: none; border-radius: 0px; box-shadow: none;">
                                </picture>
                            </p>
                            <span id="elementor-toc__heading-anchor-4" class="elementor-menu-anchor "
                                style="color: rgb(46, 46, 46); font-family: Open Sans, sans-serif; font-size: 15px; background-color: rgb(244, 244, 244);"></span>
                            <h2
                                style="text-align: justify; margin-top: 0.5rem; margin-bottom: 1rem; font-family: Open Sans, sans-serif; font-weight: 500; color: rgb(46, 46, 46); font-size: 32px; background-color: rgb(244, 244, 244);">
                                Mua sắm trên TikTok Shop</h2>
                            <p
                                style="text-align: justify; margin-bottom: 1.5em; color: rgb(46, 46, 46); font-family: Open Sans, sans-serif; font-size: 15px; background-color: rgb(244, 244, 244);">
                                <span style="font-weight: bolder;">
                                    <a href="https://www.tiktok.com/@hoanghatiktok"
                                        style="color: var(--e-global-color-primary); box-shadow: none;">TikTok Shop</a>
                                    
                                </span>
                                là một trong những kênh bán hàng online mới của TPMS. Hiện tại trên TikTok Shop
                                đang có rất nhiều chương trình giảm giá và đặc biệt hàng tuần TPMS đều tổ chức
                                livestream nhằm mang đến những deal tốt nhất cho khách hàng.
                            </p>
                            <p
                                style="text-align: center; margin-bottom: 1.5em; color: rgb(46, 46, 46); font-family: Open Sans, sans-serif; font-size: 15px; background-color: rgb(244, 244, 244);">
                                <picture>
                                    <img data-lazyloaded="1"
                                        src="assets/images/img/hh-tiktok.png"
                                        class="alignnone size-large wp-image-268105 webpexpress-processed entered litespeed-loaded"
                                        width="800" height="974"
                                        style="height: auto; max-width: 100%; border-width: initial; border-style: none; border-radius: 0px; box-shadow: none;">
                                </picture>
                            </p>
                            <span id="elementor-toc__heading-anchor-5" class="elementor-menu-anchor "
                                style="color: rgb(46, 46, 46); font-family: Open Sans, sans-serif; font-size: 15px; background-color: rgb(244, 244, 244);"></span>
                            <h2
                                style="text-align: justify; margin-top: 0.5rem; margin-bottom: 1rem; font-family: Open Sans, sans-serif; font-weight: 500; color: rgb(46, 46, 46); font-size: 32px; background-color: rgb(244, 244, 244);">
                                Các đặc quyền dành cho khách hàng của TPMS</h2>
                            <ul
                                style="border: 0px; outline: 0px; font-size: 15px; vertical-align: baseline; background: 0px 0px rgb(244, 244, 244); color: rgb(46, 46, 46); font-family: Open Sans, sans-serif;">
                                <li
                                    style="text-align: justify; margin-top: 0px; margin-bottom: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: 0px 0px;">
                                    Miễn phí vận chuyển trên toàn quốc</li>
                                <li
                                    style="text-align: justify; margin-top: 0px; margin-bottom: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: 0px 0px;">
                                    Bảo hành chính hãng theo đúng thời gian quy định</li>
                                <li
                                    style="text-align: justify; margin-top: 0px; margin-bottom: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: 0px 0px;">
                                    Bao xài đổi lỗi trong tối đa 30 ngày</li>
                                <li
                                    style="text-align: justify; margin-top: 0px; margin-bottom: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: 0px 0px;">
                                    Thanh toán bằng nhiều hình thức khác nhau như COD, chuyển khoản, thẻ ATM, thẻ tín dụng,
                                    ví điện tử VNPAY, ZaloPay…</li>
                            </ul>
                            <p
                                style="text-align: justify; margin-bottom: 1.5em; color: rgb(46, 46, 46); font-family: Open Sans, sans-serif; font-size: 15px; background-color: rgb(244, 244, 244);">
                                TPMS xin trân trọng cảm ơn sự ủng hộ và chờ đợi của Quý khách! Mọi thắc mắc về
                                thông tin sản phẩm cùng các chương trình khuyến mãi, vui lòng liên hệ HOTLINE 03.86.13.17.16.</p>
                            <p
                                style="text-align: justify; margin-bottom: 1.5em; color: rgb(46, 46, 46); font-family: Open Sans, sans-serif; font-size: 15px; background-color: rgb(244, 244, 244);">
                                Khách hàng cũng có thể truy cập những địa chỉ này để tham khảo thêm:</p>
                            <ul
                                style="border: 0px; outline: 0px; font-size: 15px; vertical-align: baseline; background: 0px 0px rgb(244, 244, 244); color: rgb(46, 46, 46); font-family: Open Sans, sans-serif;">
                                <li
                                    style="margin-top: 0px; margin-bottom: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: 0px 0px;">
                                    Website:<a href="https://tpms.com/"
                                        style="color: var(--e-global-color-primary); box-shadow: none;"> https://tpms.com/</a>
                                </li>
                                <li
                                    style="margin-top: 0px; margin-bottom: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: 0px 0px;">
                                    Fanpage Facebook:<a href="https://www.facebook.com/lehuydau2312//"
                                        style="color: var(--e-global-color-primary); box-shadow: none;"> https://www.facebook.com/lehuydau2312//</a>
                                </li>
                                <li
                                    style="margin-top: 0px; margin-bottom: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: 0px 0px;">
                                    Youtube Channel:<a href="https://www.youtube.com/user/hoanghamobilecom"
                                        style="color: var(--e-global-color-primary); box-shadow: none;"> https://www.youtube.com/user/hoanghamobilecom</a>
                                </li>
                                <li
                                    style="margin-top: 0px; margin-bottom: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: 0px 0px;">
                                    Instagram:<a href="https://www.instagram.com/lehuydau2312?fbclid=IwAR37NMIskkkDEjeCGX9BdRb8njYkAiMOEurf6y9ok0HP1b2Dx8BPMbNMBVQ"
                                        style="color: var(--e-global-color-primary); box-shadow: none;"> https://www.instagram.com/lehuydau2312?fbclid=IwAR37NMIskkkDEjeCGX9BdRb8njYkAiMOEurf6y9ok0HP1b2Dx8BPMbNMBVQ</a>
                                </li>
                            </ul>
                        </span>
                    </font>
                </li>
            </ul>
        </div>
    </section>
    <?php include 'footer.php' ?>
    <!-- analytics -->
    <script>
        (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }
            ,
            i[r].l = 1 * new Date();
            a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        }
        )(window, document, 'script', 'assets/js/analytics.js', 'ga');

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
            var f = d.getElementsByTagName(s)[0]
                , j = d.createElement(s)
                , dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        }
        )(window, document, 'script', 'dataLayer', 'GTM-5QM3X2');
    </script>
    <!-- End Google Tag Manager -->
    <!-- subiz -->
    <script>
        !function(s, u, b, i, z) {
            var o, t, r, y;
            s[i] || (s._sbzaccid = z,
            s[i] = function() {
                s[i].q.push(arguments)
            }
            ,
            s[i].q = [],
            s[i]("setAccount", z),
            r = ["widget.subiz.net", "storage.googleapis" + (t = ".com"), "app.sbz.workers.dev", i + "a" + (o = function(k, t) {
                var n = t <= 6 ? 5 : o(k, t - 1) + o(k, t - 3);
                return k !== t ? n : n.toString(32)
            }
            )(20, 20) + t, i + "b" + o(30, 30) + t, i + "c" + o(40, 40) + t],
            (y = function(k) {
                var t, n;
                s._subiz_init_2094850928430 || r[k] && (t = u.createElement(b),
                n = u.getElementsByTagName(b)[0],
                t.async = 1,
                t.src = "https://" + r[k] + "/sbz/app.js?accid=" + z,
                n.parentNode.insertBefore(t, n),
                setTimeout(y, 2e3, k + 1))
            }
            )(0))
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
            showSticker(81);
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