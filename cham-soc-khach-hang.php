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
    <title>TPMS - Chăm Sóc Khách Hàng</title>
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
        <p><strong>Cơ hội sở hữu Samsung S20 FE 256GB chỉ với 6.990.000đ - SL c&#243; hạn</strong> <a href="https://hoanghamobile.com/dien-thoai-di-dong/samsung-galaxy-s20-fe-256gb-chinh-hang" target="_top">Xem chi tiết</a></p>
    </div> -->
    <?php  include 'header.php';  ?>

    <section>
        <div class="container">
            <ol class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <a itemprop="item" href="index.php"><span itemprop="name" content="Trang chủ"><i class="icon-home" title="Trang chủ"></i> Trang chủ</span></a>
                    <meta itemprop="position" content="1" />
                </li>
                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <a itemprop="item" href="cham-soc-khach-hang.php" title="Chăm Sóc Khác Hàng" class="actived"><span itemprop="name" content="Chăm Sóc Khác Hàng">Chăm Sóc Khác Hàng</span></a>
                    <meta itemprop="position" content="2" />
                </li>
            </ol>
        </div>
    </section>



    <section>
        <div class="container page-text">
            <p>Bộ phận Chăm sóc khách hàng là bộ phận chuyên tiếp nhận góp ý, thắc mắc  phản hồi của khách hàng
                trước, đang và sau khi mua hàng.&nbsp;</p>
            <p>Với đội ngũ nhân viên năng động  sẵn sàng lắng nghe, mọi thắc mắc về dịch vụ, chất lượng sản
                phẩm,... đều sẽ được tiếp nhận và tư vấn rõ ràng, cụ thể, nhằm mang lại cho khách hàng trải nghiệm mua
                hàng trọn vẹn nhất tại TPMS.</p>
            <p>Quý khách cần thông tin về sản phẩm, chính sách bán hàng hoặc các vấn đề liên quan tới TPMS,
                xin vui lòng liên hệ bộ phận Chăm sóc khách hàng qua hình thức:</p>
            <p>- Email: <font color="#3984c6">cskh@tpms.com</font>
            </p>
            <p>- Hotline: <b>03.86.13.17.16</b></p>
            <p style="line-height: 1;">- Số đăng ký tên thương hiệu "Hoang Ha"</p>
            <ul>
                <li style="line-height: 1.4;"> SĐT 1: <b>0386131716</b></li>
                <li style="line-height: 1;">SĐT 2: <b>0348884058</b></li>
            </ul>
            <p>Hoặc để lại tin nhắn qua fanpage TPMS. Chúng tôi sẽ cố gắng phản hồi sớm nhất có thể.</p>
            <p>Zalo: <a
                    href="https://zalo.me/0386131716"
                    target="_blank"><b>/ZaloTPMS</b></a></p>
            <p>Facebook: <b>
                    <font color="#085294">/</font>
                </b><a href="https://www.facebook.com/lehuydau2312/" target="_blank"><b>Huy Dậu</b></a></p>
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
            showSticker(81);
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