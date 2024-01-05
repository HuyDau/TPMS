<?php
require_once("config/config.php");
include 'handle.php';
if (isset($_SESSION['userId'])) {
    $infoUser = getInfoUser($conn,$_SESSION['userId']);
}else{
    header("Location: index.php");
}
if(isset($_SESSION['success'])){unset($_SESSION['success']);}

if(!isset($_SESSION['success']) && isset($_POST['submit'])){
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $city= $_POST['city'];
    $district = $_POST['district'];
    $ward = $_POST['ward'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
    $newpassword = md5($password);
    $userId = $_SESSION['userId'];

    if($password == "" && $password == "" ){
        $update1 = mysqli_query($conn,"UPDATE `tbl_customer` SET `name`='$name',`email`='$email',`phone`='$phone',`city`='$city',`district`='$district',`ward`='$ward',`address`='$address' WHERE `id`='$userId'");
        $_SESSION['success'] = $update1;
    }else{
        if($password == $repassword){
            $update1 = mysqli_query($conn,"UPDATE `tbl_customer` SET `password`='$newpassword',`name`='$name',`email`='$email',`phone`='$phone',`city`='$city',`district`='$district',`ward`='$ward',`address`='$address' WHERE `id`='$userId'");
            $_SESSION['success'] = $update1;
        }else{
            $error = "Mật khẩu không trùng khớp";
        }
    }


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
            <div class="account-layout ">
                <div class="row equaHeight" data-obj=".col .box-bg-white">
                    <div class="col col-lg">
                        <h3>Cập nhật thông tin cá nhân</h3> 
                        <div class="box-bg-white" style="height: 807.066px;">
                            <div class="account-form">
                                <form method="POST" action="thong-tin-tai-khoan.php">
                                    <div class="form-controls">
                                        <label>Họ tên:</label>
                                        <div class="controls">
                                            <input type="text" value="<?php if(isset($_SESSION['userId'])){echo $infoUser['name'];} ?>" name="name" id="Title" placeholder="Họ tên *"  required>
                                        </div>
                                    </div>
                                    <div class="form-controls">
                                        <label>Điện thoại:</label>
                                        <div class="controls">
                                            <input type="tel" value="0<?php if(isset($_SESSION['userId'])){echo $infoUser['phone'];} ?>" name="phone" id="PhoneNumber" placeholder="Điện thoại *"  required>
                                        </div>
                                    </div>
                                    <div class="form-controls">
                                        <label>Email:</label>
                                        <div class="controls">
                                            <input type="text" value="<?php if(isset($_SESSION['userId'])){echo $infoUser['email'];} ?>" name="email" id="Email" placeholder="Email *" >
                                        </div>
                                    </div>
                                    <div class="form-controls">
                                        <label>Tỉnh/Thành phố:</label>
                                        <div class="controls">
                                            <select id="city" name="city" placeholder="Tỉnh/Thành phố" required>
                                                <option value="<?php if(isset($_SESSION['userId'])){echo $infoUser['city'];} ?>" selected><?php if(isset($_SESSION['userId'])){echo $infoUser['city'];} ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-controls">
                                        <label>Quận/Huyện:</label>
                                        <div class="controls">
                                            <select id="district" name="district" placeholder="Quận/ Huyện" required>
                                                <option value="" selected><?php if(isset($_SESSION['userId'])){echo $infoUser['district'];} ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-controls">
                                        <label>Phường/ Xã:</label>
                                        <div class="controls">
                                            <select id="ward" name="ward" placeholder="Phường/ Xã" required>
                                                <option value="" selected><?php if(isset($_SESSION['userId'])){echo $infoUser['ward'];} ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-controls">
                                        <label>Địa chỉ:</label>
                                        <div class="controls">
                                            <input type="text" value="Ngõ 89 Phạm Văn Đồng - Mai Dịch - Cầu Giấy - Hà Nội" name="address" id="Address" placeholder="Địa chỉ *"  required>
                                        </div>
                                    </div>

                                    <div class="form-controls">
                                        <div class="controls submit-controls">
                                            <p style="text-align:center;">Để trống nếu không muốn thay đổi mật khẩu.</p>
                                        </div>
                                    </div>
                                    <div class="form-controls">
                                        <label>Mật khẩu mới: </label>
                                        <div class="controls">
                                            <input type="password" value="" name="password" id="PasswordHash" placeholder="Mật khẩu mới">
                                        </div>
                                    </div>
                                    <div class="form-controls">
                                        <label>Nhập lại mật khẩu mới: </label>
                                        <div class="controls">
                                            <input type="password" value="" name="repassword" id="SecurityStamp" placeholder="Nhập lại mật khẩu mới">
                                        </div>
                                    </div>
                                    <div class="form-controls">
                                        <div class="controls submit-controls">
                                            <button type="submit" name="submit">XÁC NHẬN</button>
                                        </div>
                                    </div>
                                </form>
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
    <!-- API Provice -->
    
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
    <script type="text/javascript">
        $(document).ready(function () {
            showSticker(82);
        });
    </script>
    <script>
        function postComentSuccess(){
            $.toast({ 
                heading: 'Bạn đã để lại nhận xét thành công !',  
                showHideTransition: 'fade',
                icon: 'success',
                hideAfter: 3e3
            });
            
        }
    </script>
    <?php
        if(isset($update1 )){
           ?>
                <script>
                    $.toast({ 
                        heading: 'Cập nhật thông tin thành công !',  
                        showHideTransition: 'fade',
                        icon: 'success',
                        hideAfter: 3e3
                    });
                </script>
           <?php
        }
    ?>
    <?php
        if(isset($error)){
       ?>
            <script>
                $.toast({ 
                    heading: 'Cập nhật thông thất bại !',  
                    showHideTransition: 'fade',
                    icon: 'error',
                    hideAfter: 3e3
                });
            </script>
       <?php
    }
?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        referrerpolicy="no-referrer"></script>
</body>
</html>

