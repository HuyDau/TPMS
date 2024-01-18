<?php
require_once("config/config.php");
include 'handle.php';

$infoCart = mysqli_fetch_assoc(getCart($conn,$_SESSION['userId']));
?>
<!doctype html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="author" content="hoanghamobile.com">
    <meta property='og:site_name' content='hoanghamobile.com' />
    
    

    <title>Kiểm tra và hoàn tất đơn hàng của bạn</title>
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

<body class="account">

    <header>
        <div class="top-navigation">
            <div class="container">
                <ul>
                    <li><a href="/mobileswitch?mobile=true">Bản mobile</a></li>
                    <li><a href="/gioi-thieu-cong-ty">Giới thiệu</a></li>
                    <li><a href="/san-pham-da-xem">Sản phẩm đ&#227; xem</a></li>
                    <li><a href="/trung-tam-bao-hanh">Trung t&#226;m bảo hành</a></li>
                    <li><a href="/he-thong-cua-hang">Hệ thống 128 si&#234;u thị</a></li>
                    <li><a href="https://tuyendung.hoanghamobile.com/">Tuyển dụng</a></li>
                    <li><a href="/order/check">Tra cứu đơn hàng</a></li>
                    <li class="member">
                        <i class="icon-account"></i> <a class="account" href="/Account"><strong>test@gmail.com</strong></a>
                        <div class="sub">
                            <ul>
                                <li><a href="/account/index"><i class="icon-controls"></i><span>Bảng điều khiển</span></a></li>
                                <li><a href="/account/info"><i class="icon-account"></i><span>Thông tin tài khoản</span></a></li>
                                <li><a href="/account/order"><i class="icon-order-mgr"></i><span>Đơn hàng của bạn</span></a></li>
                                <li><a href="/account/wishlist"><i class="icon-love"></i><span>Sản phẩm yêu thích</span></a></li>
                                <li><a href="/account/comment"><i class="icon-comment"></i><span>Quản lý bình luận</span></a></li>
                                <li><a href="/account/review"><i class="icon-edit-squad"></i><span>Quản lý đánh giá</span></a></li>
                                <li>
                                    <form action="/Account/LogOff" id="logoutForm" method="post">
                                        <input type="hidden" name="ReturnUrl" id="ReturnUrl" value="/order/submit/714360GIVRM" />
                                        <input name="__RequestVerificationToken" type="hidden" value="XRHP_rkzUez8eIAZjv4NPX2aDH14DUkqQVEtQF7mWcvxdZ0rbEB6ayFxcPXvtToCggVh7TYvrzkKtZQ1oK7yOtHaZdrIV7ysUphigHgDn0moD_R_3lelZzhGawEvTys4ua1eXA2" />
                                        <a href="javascript:document.getElementById('logoutForm').submit()"><i class="icon-logout"></i><span>Đăng xuất</span></a>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

    </header>




    <form action="/Account/LogOff" id="logoutForm" method="post">
        <input type="hidden" name="ReturnUrl" id="ReturnUrl" value="/order/submit/714360GIVRM" />
        <input name="__RequestVerificationToken" type="hidden" value="6RxSfT-U2l2tyaMyknuf3pU8qiG1HO5rTBRb8D9iledXQslhkUovWuWLwWnlbKQDkL3Mh1gScEfmXRHWKmfh3iCj3CZqO16AtBlXJvH_WirfhXIvtmjRXU6AqxUnGQ91ZXn-8Q2" />
    </form>

    <section class="account">
        <div class="body-content">

            <body>

                <section class="order-top">
                    <div class="container">
                        <img src="assets/images/img/payment-success.jpg" />
                        <h2>ĐẶT HÀNG THÀNH CÔNG</h2>
                    </div>
                </section>
                <section>
                    <div class="container">
                        <div class="cart cart-checkout">

                            <div class="just-center">
                                <div class="cart-icon">
                                    <i class="icon-cart-index"></i>
                                    <label>THÔNG TIN ĐƠN HÀNG SỐ <span class="text-orange"><?=strtotime($infoCart['time'])?><?=$infoCart['id']?></span></label>

                                </div>
                            </div>

                            <div class="order-infomation">
                                <h3>1. Thông tin người đặt hàng</h3>

                                <table class="table talbe-order">
                                    <tbody>
                                        <tr>
                                            <td class="label" style="width:110px;">Họ tên</td> <td class="content" style="width:320px;"><?=$infoCart['name']?></td>
                                            <td class="label" style="width:95px;">Điện thoại</td> <td class="content">0<?=$infoCart['phone']?></td>
                                            <td class="label" style="width:75px;">Email</td> <td class="content"><?=$infoCart['email']?></td>
                                        </tr>
                                        <tr>
                                            <td class="label">Phương thức</td> <td class="content"><?php echo getPayment($conn,$infoCart['idpayment']); ?></td>
                                            <td class="label">Trạng thái</td><td class="content" colspan="3"><strong style="color:Green"><?=getStatus($conn,$infoCart['idstatus'])?></strong></td>
                                        </tr>
                                        <tr>
                                            <td class="label">Địa chỉ</td><td class="content" colspan="5"><?=$infoCart['address']?> - <?=$infoCart['ward']?> - <?=$infoCart['district']?> - <?=$infoCart['city']?></td>
                                        </tr>
                                        <tr>
                                            <td class="label">Ghi chú</td> <td colspan="5"><?=$infoCart['note']?></td>
                                        </tr>
                                        <tr>
                                            <td class="label">Mốc thời gian</td> <td colspan="5"><?= date("H:i:s d-m-Y", strtotime($infoCart['time']))?></td>
                                        </tr>


                                    </tbody>
                                </table>
                            </div>

                            <div class="order-infomation">
                                <h3>2. Danh sách sản phẩm đặt hàng</h3>

                                <table class="table table-border talbe-order table-product">
                                    <tbody>
                                        <tr>
                                            <th>#</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Phiên bản</th>
                                            <th>SL</th>
                                            <th>Giá tiền</th>
                                            <th>Tổng (SLxG)</th>
                                        </tr>
                                        <?php 
                                            $cartId = $infoCart['cartId'];
                                            $sqlDetailCart = mysqli_query($conn,"SELECT * FROM  tbl_detailcart WHERE cartId = $cartId");
                                            $i = 1;
                                            while($item = mysqli_fetch_assoc($sqlDetailCart)){
                                                $idProd = $item['versionId'];
                                                $itemProd = mysqli_fetch_assoc(getDetailProd($conn,$idProd));
                                                ?>
                                                    <tr>
                                                        <td align="center" valign="middle" ><?=$i++?></td>
                                                        <td><strong><?=$itemProd['versionName']?></td>
                                                        <td align="center"><?=$itemProd['versionVersion']?></td>
                                                        <td align="center"><?=$infoCart['quantity']?></td>
                                                        <td align="center"><?=number_format($itemProd['versionPromotionalPrice'],0,"",".")?> ₫</td>
                                                        <td align="center"><?=number_format($itemProd['versionPromotionalPrice']*$infoCart['quantity'],0,"",".")?> ₫</td>
                                                    </tr>
                                                <?php
                                            }
                                        ?>
                                        <tr class="no-border">
                                            <td colspan="5" align="right">Tổng tiền:</td>
                                            <td><?=number_format($infoCart['total'],0,"",".")?> ₫</td>
                                        </tr>

                                        <tr class="no-border">
                                            <td colspan="5" align="right">Giảm giá:</td>
                                            <td>-00 ₫</td>
                                        </tr>
                                        <tr class="no-border">
                                            <td colspan="5" align="right">Tổng tiền thanh toán:</td>
                                            <td><strong class="text-red"><?=number_format($infoCart['total'],0,"",".")?> ₫</strong></td>
                                        </tr>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="order-bottom">
                    <a class="back-home" href="index.php">Về Trang chủ</a>
                </section>
            </body>


        </div>
    </section>
    <footer>
        <div class="container">
            
                <div id="navSocial">
                    <div class="social">
                        <ul>
                                <li><a href="https://www.facebook.com/hoanghamobilecom" title="Facebook Hoàng Hà Mobile" target="_blank" class="blue"><span><i class="icon-facebook"></i></span></a></li>
                                <li><a href="https://www.youtube.com/channel/UCJm_GdFJzT8h1odq1oMu_7Q?sub_confirmation=1" title="Youtube Hoàng Hà Mobile Channel" target="_blank" class="red"><span><i class="icon-youtube"></i></span></a></li>
                                <li><a href="https://www.instagram.com/hoanghamobile/?hl=vi" title="Hoàng Hà Mobile Instagram" target="_blank" class="rainbow"><span><i class="icon-instagram"></i></span></a></li>
                                <li><a href="https://www.tiktok.com/@hoanghaangels?" title="Tiktok" target="_blank" class="black"><span><i class="icon-tiktok"></i></span></a></li>
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
            <a href="">
                <img src="assets/images/icon/maycugiatot.png" />
            </a>
        </div>
        <div>
            <a href="">
                <img src="assets/images/icon/thucugiacao.png" />
            </a>
        </div>
    </div>


    <div class="footer-zalo" style="position: fixed; bottom: 110px; right: 33px;">
        <a href="https://oa.zalo.me/262829019064124420" target="_blank"><img src="assets/images/icon/zalo.svg" /></a>
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


    <script src="assets/js/app.users.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var reqPath = '/account' + location.pathname.toLowerCase();
            var hasActived = false;
            $('nav ul li a').each(function(idx, value) {
                var href = $(this).attr('href').toLowerCase();
                if (href && reqPath.indexOf(href) >= 0) {
                    $(this).addClass('actived');
                    hasActived = true;
                }
            });

            if (!hasActived) {
                $('nav ul li:eq(0) a').addClass('actived');
            }
        });
    </script>

    <script type="text/javascript">

    </script>


    <script type="text/javascript">
        $(document).ready(function() {
            showSticker(83);
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