<?php
require_once("config/config.php");
include 'handle.php';

$queryProduct1 = mysqli_query($conn,getDetailProduct($_GET['sp1']));
$infoProduct1 = mysqli_fetch_assoc($queryProduct1) ;

$queryProduct2 = mysqli_query($conn,getDetailProduct($_GET['sp2']));
$infoProduct2 = mysqli_fetch_assoc($queryProduct2) ;
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
                                        <img style="width: 180px;" src="uploads/product/smartphone/<?=$infoProduct1['versionImage']?>" />
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
                                        <img style="width: 180px;" src="uploads/product/smartphone/<?=$infoProduct2['versionImage']?>" />
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

                            <tr class="specs-group">
                                <th class="text" colspan="4">Màn h&#236;nh</th>
                            </tr>
                                <tr class="specs">
                                    <th class="text">C&#244;ng nghệ màn h&#236;nh</th>
                                        <td class="data">
                                            <span>OLED</span>
                                        </td>
                                        <td class="data">
                                            <span>AMOLED</span>
                                        </td>
                                                                        <td></td>
                                </tr>
                                <tr class="specs">
                                    <th class="text">Độ ph&#226;n giải</th>
                                        <td class="data">
                                            <ol class="ol-specs">
                                                    <li>1170 x 2532 Pixels</li>
                                                    <li>2 camera 12 MP</li>
                                                    <li>12 MP</li>
                                            </ol>
                                        </td>
                                        <td class="data">
                                            <ol class="ol-specs">
                                                    <li>Chính: FHD+ (2520 x 1080 Pixels) &amp; Phụ: (720 x 382 Pixels)</li>
                                                    <li>Chính 50 MP &amp; Phụ 2 MP</li>
                                                    <li>32 MP</li>
                                            </ol>
                                        </td>
                                                                        <td></td>
                                </tr>
                                <tr class="specs">
                                    <th class="text">Kích thước màn h&#236;nh</th>
                                        <td class="data">
                                            <span>6.1&quot;</span>
                                        </td>
                                        <td class="data">
                                            <span>6.8 inches</span>
                                        </td>
                                                                        <td></td>
                                </tr>
                                <tr class="specs">
                                    <th class="text">Độ sáng màn h&#236;nh</th>
                                        <td class="data">
                                            <span></span>
                                        </td>
                                        <td class="data">
                                            <span></span>
                                        </td>
                                                                        <td></td>
                                </tr>
                                <tr class="specs">
                                    <th class="text">Mặt kính cảm ứng</th>
                                        <td class="data">
                                            <span>Kính cường lực Ceramic Shield</span>
                                        </td>
                                        <td class="data">
                                            <span></span>
                                        </td>
                                                                        <td></td>
                                </tr>
                            <tr class="specs-group">
                                <th class="text" colspan="4">Camera sau</th>
                            </tr>
                                <tr class="specs">
                                    <th class="text">Độ ph&#226;n giải</th>
                                        <td class="data">
                                            <ol class="ol-specs">
                                                    <li>1170 x 2532 Pixels</li>
                                                    <li>2 camera 12 MP</li>
                                                    <li>12 MP</li>
                                            </ol>
                                        </td>
                                        <td class="data">
                                            <ol class="ol-specs">
                                                    <li>Chính: FHD+ (2520 x 1080 Pixels) &amp; Phụ: (720 x 382 Pixels)</li>
                                                    <li>Chính 50 MP &amp; Phụ 2 MP</li>
                                                    <li>32 MP</li>
                                            </ol>
                                        </td>
                                                                        <td></td>
                                </tr>
                                <tr class="specs">
                                    <th class="text">Tính năng</th>
                                        <td class="data">
                                            <ol class="ol-specs">
                                                    <li>Ban đ&#234;m (Night Mode)</li>
                                                    <li>G&#243;c rộng (Wide)</li>
                                                    <li>G&#243;c si&#234;u rộng (Ultrawide)</li>
                                                    <li>HDR</li>
                                                    <li>Nhận diện khu&#244;n mặt</li>
                                                    <li>Quay chậm (Slow Motion)</li>
                                                    <li>Toàn cảnh (Panorama)</li>
                                                    <li>Tr&#244;i nhanh thời gian (Time Lapse)</li>
                                                    <li>Tự động lấy n&#233;t (AF)</li>
                                                    <li>X&#243;a ph&#244;ng</li>
                                                    <li>Zoom kỹ thuật số</li>
                                                    <li>Zoom quang học</li>
                                                    <li>HDR</li>
                                                    <li>Nhãn dán (AR Stickers)</li>
                                                    <li>Nhận diện khu&#244;n mặt</li>
                                                    <li>Quay chậm (Slow Motion)</li>
                                                    <li>Quay phim 4K</li>
                                                    <li>Quay video Full HD</li>
                                                    <li>Quay video HD</li>
                                                    <li>Retina Flash</li>
                                                    <li>Tự động lấy n&#233;t (AF)</li>
                                                    <li>X&#243;a ph&#244;ng</li>
                                            </ol>
                                        </td>
                                        <td class="data">
                                            <span>4K 2160p@30fps</span>
                                        </td>
                                                                        <td></td>
                                </tr>
                                <tr class="specs">
                                    <th class="text">Quay phim</th>
                                        <td class="data">
                                            <ol class="ol-specs">
                                                    <li>4K 2160p@24fps</li>
                                                    <li>4K 2160p@30fps</li>
                                                    <li>4K 2160p@60fps</li>
                                                    <li>FullHD 1080p@120fps</li>
                                                    <li>FullHD 1080p@240fps</li>
                                                    <li>FullHD 1080p@30fps</li>
                                                    <li>FullHD 1080p@60fps</li>
                                                    <li>HD 720p@30fps</li>
                                            </ol>
                                        </td>
                                        <td class="data">
                                            <span></span>
                                        </td>
                                                                        <td></td>
                                </tr>
                                <tr class="specs">
                                    <th class="text">Đ&#232;n Flash</th>
                                        <td class="data">
                                            <span></span>
                                        </td>
                                        <td class="data">
                                            <span></span>
                                        </td>
                                                                        <td></td>
                                </tr>
                            <tr class="specs-group">
                                <th class="text" colspan="4">Camera trước</th>
                            </tr>
                                <tr class="specs">
                                    <th class="text">Độ ph&#226;n giải</th>
                                        <td class="data">
                                            <ol class="ol-specs">
                                                    <li>1170 x 2532 Pixels</li>
                                                    <li>2 camera 12 MP</li>
                                                    <li>12 MP</li>
                                            </ol>
                                        </td>
                                        <td class="data">
                                            <ol class="ol-specs">
                                                    <li>Chính: FHD+ (2520 x 1080 Pixels) &amp; Phụ: (720 x 382 Pixels)</li>
                                                    <li>Chính 50 MP &amp; Phụ 2 MP</li>
                                                    <li>32 MP</li>
                                            </ol>
                                        </td>
                                                                        <td></td>
                                </tr>
                                <tr class="specs">
                                    <th class="text">Tính năng</th>
                                        <td class="data">
                                            <ol class="ol-specs">
                                                    <li>Ban đ&#234;m (Night Mode)</li>
                                                    <li>G&#243;c rộng (Wide)</li>
                                                    <li>G&#243;c si&#234;u rộng (Ultrawide)</li>
                                                    <li>HDR</li>
                                                    <li>Nhận diện khu&#244;n mặt</li>
                                                    <li>Quay chậm (Slow Motion)</li>
                                                    <li>Toàn cảnh (Panorama)</li>
                                                    <li>Tr&#244;i nhanh thời gian (Time Lapse)</li>
                                                    <li>Tự động lấy n&#233;t (AF)</li>
                                                    <li>X&#243;a ph&#244;ng</li>
                                                    <li>Zoom kỹ thuật số</li>
                                                    <li>Zoom quang học</li>
                                                    <li>HDR</li>
                                                    <li>Nhãn dán (AR Stickers)</li>
                                                    <li>Nhận diện khu&#244;n mặt</li>
                                                    <li>Quay chậm (Slow Motion)</li>
                                                    <li>Quay phim 4K</li>
                                                    <li>Quay video Full HD</li>
                                                    <li>Quay video HD</li>
                                                    <li>Retina Flash</li>
                                                    <li>Tự động lấy n&#233;t (AF)</li>
                                                    <li>X&#243;a ph&#244;ng</li>
                                            </ol>
                                        </td>
                                        <td class="data">
                                            <span>4K 2160p@30fps</span>
                                        </td>
                                                                        <td></td>
                                </tr>
                                <tr class="specs">
                                    <th class="text">Quay phim</th>
                                        <td class="data">
                                            <ol class="ol-specs">
                                                    <li>4K 2160p@24fps</li>
                                                    <li>4K 2160p@30fps</li>
                                                    <li>4K 2160p@60fps</li>
                                                    <li>FullHD 1080p@120fps</li>
                                                    <li>FullHD 1080p@240fps</li>
                                                    <li>FullHD 1080p@30fps</li>
                                                    <li>FullHD 1080p@60fps</li>
                                                    <li>HD 720p@30fps</li>
                                            </ol>
                                        </td>
                                        <td class="data">
                                            <span></span>
                                        </td>
                                                                        <td></td>
                                </tr>
                            <tr class="specs-group">
                                <th class="text" colspan="4">Hệ điều hành &amp; CPU</th>
                            </tr>
                                <tr class="specs">
                                    <th class="text">Vi xử l&#253;</th>
                                        <td class="data">
                                            <span>Apple A14 Bionic 6 nh&#226;n</span>
                                        </td>
                                        <td class="data">
                                            <span>MediaTek Dimensity 9000 8 nh&#226;n</span>
                                        </td>
                                                                        <td></td>
                                </tr>
                                <tr class="specs">
                                    <th class="text">Hệ điều hành</th>
                                        <td class="data">
                                            <span>iOS 14</span>
                                        </td>
                                        <td class="data">
                                            <span>Android 13</span>
                                        </td>
                                                                        <td></td>
                                </tr>
                                <tr class="specs">
                                    <th class="text">Tốc độ CPU</th>
                                        <td class="data">
                                            <span>2 nh&#226;n 3.1 GHz &amp; 4 nh&#226;n 1.8 GHz</span>
                                        </td>
                                        <td class="data">
                                            <span>3.2 GHz</span>
                                        </td>
                                                                        <td></td>
                                </tr>
                                <tr class="specs">
                                    <th class="text">Vi xử l&#253; đồ họa (GPU)</th>
                                        <td class="data">
                                            <span>Apple GPU 6 nh&#226;n</span>
                                        </td>
                                        <td class="data">
                                            <span>Mali-G710 MC10</span>
                                        </td>
                                                                        <td></td>
                                </tr>
                            <tr class="specs-group">
                                <th class="text" colspan="4"> Bộ nhớ &amp; Lưu trữ</th>
                            </tr>
                                <tr class="specs">
                                    <th class="text">RAM</th>
                                        <td class="data">
                                            <span>4 GB</span>
                                        </td>
                                        <td class="data">
                                            <span>8 GB</span>
                                        </td>
                                                                        <td></td>
                                </tr>
                                <tr class="specs">
                                    <th class="text">Bộ nhớ trong</th>
                                        <td class="data">
                                            <span>64 GB</span>
                                        </td>
                                        <td class="data">
                                            <span>256GB</span>
                                        </td>
                                                                        <td></td>
                                </tr>
                                <tr class="specs">
                                    <th class="text">Bộ nhớ c&#242;n lại (khả dụng)</th>
                                        <td class="data">
                                            <span>Khoảng 49 GB</span>
                                        </td>
                                        <td class="data">
                                            <span></span>
                                        </td>
                                                                        <td></td>
                                </tr>
                                <tr class="specs">
                                    <th class="text">Thẻ nhớ ngoài</th>
                                        <td class="data">
                                            <span>Kh&#244;ng</span>
                                        </td>
                                        <td class="data">
                                            <span></span>
                                        </td>
                                                                        <td></td>
                                </tr>
                            <tr class="specs-group">
                                <th class="text" colspan="4">Kết nối</th>
                            </tr>
                                <tr class="specs">
                                    <th class="text">Cảm biến</th>
                                        <td class="data">
                                            <span></span>
                                        </td>
                                        <td class="data">
                                            <span></span>
                                        </td>
                                                                        <td></td>
                                </tr>
                                <tr class="specs">
                                    <th class="text">Mạng di động</th>
                                        <td class="data">
                                            <span>Hỗ trợ 5G</span>
                                        </td>
                                        <td class="data">
                                            <span>Hỗ trợ 5G</span>
                                        </td>
                                                                        <td></td>
                                </tr>
                                <tr class="specs">
                                    <th class="text">Số khe SIM</th>
                                        <td class="data">
                                            <span>1 Nano SIM &amp; 1 eSIM</span>
                                        </td>
                                        <td class="data">
                                            <span>2 SIM (Nano-SIM)</span>
                                        </td>
                                                                        <td></td>
                                </tr>
                                <tr class="specs">
                                    <th class="text">Wi-Fi</th>
                                        <td class="data">
                                            <ol class="ol-specs">
                                                    <li>Dual-band (2.4 GHz/5 GHz)</li>
                                                    <li>Wi-Fi 802.11 a/b/g/n/ac/ax</li>
                                                    <li>Wi-Fi hotspot</li>
                                                    <li>Wi-Fi MIMO</li>
                                            </ol>
                                        </td>
                                        <td class="data">
                                            <span>802.11 a/b/g/n/ac/6</span>
                                        </td>
                                                                        <td></td>
                                </tr>
                                <tr class="specs">
                                    <th class="text">Định vị</th>
                                        <td class="data">
                                            <ol class="ol-specs">
                                                    <li>A-GPS</li>
                                                    <li>BDS</li>
                                                    <li>GALILEO</li>
                                                    <li>GLONASS</li>
                                                    <li>iBeacon</li>
                                                    <li>QZSS</li>
                                            </ol>
                                        </td>
                                        <td class="data">
                                            <span>GPS (L1+L5), GLONASS (G1), BDS (B1I+B1c+B2a), GALILEO (E1+E5a), QZSS (L1+L5)</span>
                                        </td>
                                                                        <td></td>
                                </tr>
                                <tr class="specs">
                                    <th class="text">Bluetooth</th>
                                        <td class="data">
                                            <ol class="ol-specs">
                                                    <li>A2DP</li>
                                                    <li>v5.0</li>
                                            </ol>
                                        </td>
                                        <td class="data">
                                            <span>v5.3</span>
                                        </td>
                                                                        <td></td>
                                </tr>
                                <tr class="specs">
                                    <th class="text">Cổng kết nối/sạc</th>
                                        <td class="data">
                                            <span>Lightning</span>
                                        </td>
                                        <td class="data">
                                            <span>USB Type-C</span>
                                        </td>
                                                                        <td></td>
                                </tr>
                                <tr class="specs">
                                    <th class="text">Jack tai nghe</th>
                                        <td class="data">
                                            <span>Lightning</span>
                                        </td>
                                        <td class="data">
                                            <span>Kh&#244;ng</span>
                                        </td>
                                                                        <td></td>
                                </tr>
                                <tr class="specs">
                                    <th class="text">Kết nối khác</th>
                                        <td class="data">
                                            <span></span>
                                        </td>
                                        <td class="data">
                                            <span></span>
                                        </td>
                                                                        <td></td>
                                </tr>
                            <tr class="specs-group">
                                <th class="text" colspan="4">Pin &amp; Sạc</th>
                            </tr>
                                <tr class="specs">
                                    <th class="text">Dung lượng pin</th>
                                        <td class="data">
                                            <span>2815 mAh</span>
                                        </td>
                                        <td class="data">
                                            <span>4300 mAh</span>
                                        </td>
                                                                        <td></td>
                                </tr>
                                <tr class="specs">
                                    <th class="text">Hỗ trợ sạc tối đa:</th>
                                        <td class="data">
                                            <span></span>
                                        </td>
                                        <td class="data">
                                            <span>44 W</span>
                                        </td>
                                                                        <td></td>
                                </tr>
                                <tr class="specs">
                                    <th class="text">C&#244;ng nghệ pin:</th>
                                        <td class="data">
                                            <span></span>
                                        </td>
                                        <td class="data">
                                            <span>Sạc pin nhanh</span>
                                        </td>
                                                                        <td></td>
                                </tr>
                                <tr class="specs">
                                    <th class="text">Loại pin</th>
                                        <td class="data">
                                            <span>Li-Ion</span>
                                        </td>
                                        <td class="data">
                                            <span>Li-Po</span>
                                        </td>
                                                                        <td></td>
                                </tr>
                            <tr class="specs-group">
                                <th class="text" colspan="4">Tiện ích</th>
                            </tr>
                                <tr class="specs">
                                    <th class="text">Tính năng đặc biệt</th>
                                        <td class="data">
                                            <span>Kháng nước, kháng bụi</span>
                                        </td>
                                        <td class="data">
                                            <span></span>
                                        </td>
                                                                        <td></td>
                                </tr>
                                <tr class="specs">
                                    <th class="text">Bảo mật sinh trắc học	</th>
                                        <td class="data">
                                            <span>Mở khoá khu&#244;n mặt Face ID</span>
                                        </td>
                                        <td class="data">
                                            <span></span>
                                        </td>
                                                                        <td></td>
                                </tr>
                                <tr class="specs">
                                    <th class="text">Kháng nước, kháng bụi</th>
                                        <td class="data">
                                            <span></span>
                                        </td>
                                        <td class="data">
                                            <span></span>
                                        </td>
                                                                        <td></td>
                                </tr>
                            <tr class="specs-group">
                                <th class="text" colspan="4">Th&#244;ng tin chung</th>
                            </tr>
                                <tr class="specs">
                                    <th class="text">Sản phẩm bao gồm</th>
                                        <td class="data">
                                            <span></span>
                                        </td>
                                        <td class="data">
                                            <span></span>
                                        </td>
                                                                        <td></td>
                                </tr>
                                <tr class="specs">
                                    <th class="text">Trọng lượng</th>
                                        <td class="data">
                                            <span></span>
                                        </td>
                                        <td class="data">
                                            <span></span>
                                        </td>
                                                                        <td></td>
                                </tr>
                                <tr class="specs">
                                    <th class="text">Thiết kế</th>
                                        <td class="data">
                                            <span></span>
                                        </td>
                                        <td class="data">
                                            <span>Điện thoại gập</span>
                                        </td>
                                                                        <td></td>
                                </tr>
                                <tr class="specs">
                                    <th class="text">Chất liệu</th>
                                        <td class="data">
                                            <span></span>
                                        </td>
                                        <td class="data">
                                            <span></span>
                                        </td>
                                                                        <td></td>
                                </tr>
                                <tr class="specs">
                                    <th class="text">Kích thước</th>
                                        <td class="data">
                                            <span></span>
                                        </td>
                                        <td class="data">
                                            <span>Dài 166.2 mm - Ngang 75.2 mm - Dày 7.5 mm - Nặng 191 g</span>
                                        </td>
                                                                        <td></td>
                                </tr>
                                <tr class="specs">
                                    <th class="text">Thời điểm ra mắt</th>
                                        <td class="data">
                                            <span></span>
                                        </td>
                                        <td class="data">
                                            <span>Tháng 03/2023</span>
                                        </td>
                                                                        <td></td>
                                </tr>
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

