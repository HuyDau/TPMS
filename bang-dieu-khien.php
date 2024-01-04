<?php
require_once("config/config.php");
include 'handle.php';
if (isset($_SESSION['userId'])) {
    $infoUser = getInfoUser($conn,$_SESSION['userId']);
}else{
    header("Location: index.php");
}
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
    <title>Bảng điều khiển</title>
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
    <style>
        .product-center .current-product-price label.text-green {
            display: none
        }
    </style>
    <script>
        window.insider_object = {};
    </script>
    <link href="assets/css/styles.users.css" rel="stylesheet" />
    <script>
        window.insider_object.user = null;
    </script>
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
                        <li><a href="/trung-tam-bao-hanh">Trung t&#226;m bảo h&#224;nh</a></li>
                        <li><a href="/he-thong-cua-hang">Hệ thống 128 si&#234;u thị</a></li>
                        <li><a href="https://tuyendung.hoanghamobile.com/">Tuyển dụng</a></li>
                        <li><a href="/order/check">Tra cứu đơn h&#224;ng</a></li>
                        <?php
                            if (isset($_SESSION['userId'])) {
                                $infoUser = getInfoUser($conn,$_SESSION['userId']);
                                ?>
                                    <li class="member">
                                        <i class="icon-account"></i> <a class="account" href="/Account"><strong><?=$infoUser['name']?></strong></a>
                                        <div class="sub">
                                            <ul>
                                                <li><a href="bang-dieu-khien.php"><i class="icon-controls"></i><span>Bảng điều khiển</span></a></li>
                                                <li><a href="/account/info"><i class="icon-account"></i><span>Thông tin tài khoản</span></a></li>
                                                <li><a href="/account/order"><i class="icon-order-mgr"></i><span>Đơn hàng của bạn</span></a></li>
                                                <li><a href="/account/wishlist"><i class="icon-love"></i><span>Sản phẩm yêu thích</span></a></li>
                                                <li><a href="/account/comment"><i class="icon-comment"></i><span>Quản lý bình luận</span></a></li>
                                                <li><a href="/account/review"><i class="icon-edit-squad"></i><span>Quản lý đánh giá</span></a></li>
                                                <li>
                                                    <form action="/Account/LogOff" id="logoutForm" method="post">
                                                        <input type="hidden" name="ReturnUrl" id="ReturnUrl" value="/">
                                                        <input name="__RequestVerificationToken" type="hidden" value="GCBt6unvKmAoP-qQJihj4UXrdv3SVsw5rDcngofGMjs5DrFnQrqDXgs5qtW9xbdbUs0AYLW22TLu1AJudVa_mWI6s6Ce19qnGoaMwT5bdU7Hgz8qjrQwTHyL3GsyL_U86Nsk2w2">
                                                        <a href="dang-xuat.php"><i class="icon-logout"></i><span>Đăng xuất</span></a>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                <?php
                            }else{
                                ?><li><a id="login-modal" href="dang-nhap.php">Đăng nhập</a></li><?php
                            }
                        ?>
                </ul>
            </div>
        </div>
        
    </header>

    <section class="account">
        <div class="sidebar">
            <div class="ctn">
                <div class="header">
                    <div class="logo">
                        <a href="index.php"><img src="assets/images/logo/logo.png" alt="TPMS" /></a>
                    </div>
                    <div class="info">
                        <div class="avt" id="myAvatar">
                            <strong>T</strong>
                        </div>
                
                        <div class="summer">
                            <p><strong><?php if(isset($_SESSION['userId'])){echo $infoUser['name'];} ?></strong></p>
                            <p class="change-avatar"><a href="javascript:;" onclick="$('#avtImage').trigger('click'); return false;"><i class="icon-change-avatar"></i> Thay đổi ảnh đại diện</a></p>
                            <input type="file" name="upfile" id="avtImage" accept="image/*" style="display: none;" />
                        </div>
                    </div>
                </div>
                <nav>
                    <ul>
                        <li><a href="bang-dieu-khien.php"><i class="icon-controls"></i><span>Bảng điều khiển</span></a></li>
                        <li><a href="thong-tin-tai-khoan.php"><i class="icon-account"></i><span>Thông tin tài khoản</span></a></li>
                        <li><a href="/account/order"><i class="icon-order-mgr"></i><span>Đơn hàng của bạn</span></a></li>
                        <li><a href="/account/wishlist"><i class="icon-love"></i><span>Sản phẩm yêu thích</span></a></li>
                        <li><a href="/account/comment"><i class="icon-comment"></i><span>Quản lý bình luận</span></a></li>
                        <li><a href="/account/review"><i class="icon-edit-squad"></i><span>Quản lý đánh giá</span></a></li>
                        <li><a href="dang-xuat.php"><i class="icon-logout"></i><span>Đăng xuất</span></a></li>
                    </ul>
                </nav>
                <div class="hotline">
                    <div>
                        <strong>Bạn cần hỗ trợ?</strong>
                        <a href="tel:19002091"><i class="icon-calling"></i> <strong>1900.2091</strong></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="body-content">
            <h1>Bảng điều khiển</h1>
            <div class="header">
                <div class="bg">
                    <div class="text">
                        <h2>CHÀO MỪNG QUAY TRỞ LẠI, <?php if(isset($_SESSION['userId'])){echo $infoUser['name'];} ?></h2>
                        <p><i>Tổng quát các hoạt động của bạn tại đây</i></p>
                    </div>
                </div>
                <div class="icon">
                    <img src="assets/images/img/icon-account-home.png" />
                </div>
            </div>
            <div class="account-layout">
                <div class="row equaHeight" data-obj=".col .box-bg-white">
                    <div class="col">
                        <h3>Thông tin cá nhân</h3>
                        <div class="box-bg-white">
                            <div class="account-info">
                                <div class="tools">
                                    <a href="/account/info" title="Thay đổi thông tin cá nhân"><i class="icon-edit-squad"></i></a>
                                </div>

                                <p><strong>Họ tên:</strong> <i><?php if(isset($_SESSION['userId'])){echo $infoUser['name'];} ?></i></p>
                                <p><strong>Tài khoản:</strong> <i><?php if(isset($_SESSION['userId'])){echo $infoUser['username'];} ?></i></p>
                                <p><strong>Email:</strong> <i><?php if(isset($_SESSION['userId'])){echo $infoUser['email'];} ?></i></p>
                                <p><strong>Địa chỉ:</strong> <i><?php if(isset($_SESSION['userId'])){ echo  $infoUser['address'].' - '.$infoUser['ward'].' - '.$infoUser['district'].' - '.$infoUser['city'] ;} ?></i></p>
                                <p><strong>Số điện thoại:</strong>  <i>0987897890</i></p>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <h3>Đơn hàng đã đặt</h3>
                        <div class="box-bg-white">
                            <div style="padding:25px;">
                                <table class="table table-border table-lgpading">
                                    <tr>
                                        <th>#</th>
                                        <th>Mã đơn hàng</th>
                                        <th>Ngày đặt</th>
                                        <th>Tổng tiền</th>
                                        <th>Giảm giá</th>
                                        <th>Sản phẩm đặt hàng</th>
                                    </tr>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col" style="max-width:100%;">
                        <h3>Sản phẩm yêu thích</h3>
                        <div class="box-bg-white" style="padding:25px;">
                            
                            <div class="tools">
                                <a href="/account/wishlist" title="Chỉnh sửa danh sách sản phẩm yêu thích"><i class="icon-edit-squad"></i></a>
                            </div>

                            <div style="max-width:100%; padding:0 30px;">
                                <div class="owl-carousel owl-reponsive lr-slider">
                                        <p>Chưa có sản phẩm nào trong danh sách yêu thích của bạn.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>       
                <div class="row">
                    <div class="col">
                        <h3>Quản lý đánh giá</h3>

                        <div class="box-bg-white" style="padding:25px;">
                            
                            <div class="tools">
                                <a href="/account/review" title="Xem tất cả các đánh giá bạn đã gửi"><i class="icon-eye"></i></a>
                            </div>

                            <div class="review-content comment-content" style="max-width:100%; padding:0 30px;">
                                    <p>Bạn chưa gửi đánh giá nào cả.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h3>Quản lý bình luận</h3>

                        <div class="box-bg-white" style="padding:25px;">
                            
                            <div class="tools">
                                <a href="/account/comment" title="Xem tất cả các bình luận bạn đã gửi"><i class="icon-eye"></i></a>
                            </div>

                            <div class="review-content comment-content" style="max-width:100%; padding:0 30px;">
                                    <p>Bạn chưa gửi bình luận nào cả.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <iframe src="https://asia.creativecdn.com/tags?id=pr_n4X0y6ApZyJaHX1dNxQd&amp;ncm=1" width="1" height="1" scrolling="no" frameBorder="0" style="display: none;"></iframe>

    <footer>
        <div class="container">
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
    <script src="assets/js/app.users.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            var reqPath = '/account' + location.pathname.toLowerCase();
            var hasActived = false;
            $('nav ul li a').each(function (idx, value) {
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
        $('.lr-slider').owlCarousel({
            nav: true,
            itemClass: 'lr-item',
            loop: false,
            autoplay: true,
            autoplayHoverPause: true,
            responsiveClass: true,
            margin: 10,
            responsive: {
                0: {
                    items: 1,
                    nav: true
                },
                320: {
                    items: 1,
                    nav: true
                },
                540: {
                    items: 1,
                    nav: true
                },
                760: {
                    items: 2,
                    nav: true
                },
                980: {
                    items: 3,
                    nav: true
                },
                1420: {
                    items: 4,
                    nav: true
                },
                1640: {
                    items: 5,
                    nav: true
                },
                1920: {
                    items: 8,
                    nav: true
                }
            }
        });

        displayRate($(".display-rating"));
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

