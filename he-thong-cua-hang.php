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
    <title>Hệ Thống Showroom</title>
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
            <div class="cart">
                <div class="header">
                    <div class="back">
                        <a href="index.php">
                            <i class="icon-leftar"></i>
                            <strong>Về trang chủ</strong>
                        </a>
                    </div>
                </div>
                <div class="list-shops">

                    <div class="header">
                        <div class="just-center">
                            <img src="assets/images/img/icon-store.png" style="width:900px; max-width:90%;" />
                        </div>
                        <h1>Hệ thống  <?php $sqlAgent = mysqli_query($conn,"SELECT * FROM tbl_agents INNER JOIN tbl_city ON tbl_agents.cityId = tbl_city.id");echo mysqli_num_rows($sqlAgent); ?> siêu thị trên toàn quốc</h1>


                        <div class="selector">
                            <label><i class="icon-localtion"></i> <span>LỰA CHỌN TỈNH/THÀNH PHỐ</span> </label>
                            <div class="ctn">
                                
                                <ul>
                                    <?php
                                        $sqlCity = mysqli_query($conn,"SELECT * FROM tbl_city");
                                        while($itemCity = mysqli_fetch_assoc($sqlCity)){
                                            ?>
                                                <li><a data-id="<?=$itemCity['id']?>" href="javascript:;"><?=$itemCity['cityName']?></a></li>
                                            <?php
                                        }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>


                    <div class="lists">
                        <?php
                            $sqlAgent = mysqli_query($conn,"SELECT * FROM tbl_agents INNER JOIN tbl_city ON tbl_agents.cityId = tbl_city.id");
                            while($itemAgent = mysqli_fetch_assoc($sqlAgent)){
                                ?>
                                    <div class="item" data-id="<?=$itemAgent['cityId']?>">
                                        <i class="icon-right"></i>
                                        <div class="info">
                                            <p><?=$itemAgent['agentName']?> - <?=$itemAgent['agentAddress']?></p>
                                            <p>ĐT: <a href="tel:0<?=$itemAgent['agentPhone']?>"><?=$itemAgent['agentPhone']?></a> <span>|</span> <a href="https://chat.zalo.me/0386131716"><img style="width:14px;" src="assets/images/icon/zalo.svg" /> Chat Zalo</a></p>
                                            <p>HĐ: 8h00 - 21h30 </p>
                                            <p><a href="https://www.google.com/maps/place/<?=$itemAgent['agentAddress']?>">Bản đồ đường đi</a></p>

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
            $('.selector a').click(function() {
                var text = $(this).text();
                var cityId = $(this).attr('data-id');
                if (cityId == '0') {
                    $('.list-shops .lists .item').show();
                } else {
                    $('.list-shops .lists .item').hide();
                    $('.list-shops .lists .item[data-id=' + cityId + ']').show();
                }
                $('.selector label span').text(text);

                $('.selector a.selected').removeClass('selected');
                $(this).addClass('selected');

                $('.selector .ctn').css('display', 'none');
                setTimeout(function() {
                    $('.selector .ctn').css('display', '');
                }, 200);
            });
        });
    </script>

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