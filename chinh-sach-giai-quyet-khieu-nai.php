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
    
    
    <title>TPMS - Chính Sách Giải Quyết Khiếu Nại</title>
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
    <header>
        <div class="top-navigation">
            <div class="container">
                <ul>
                    <li><a href="/mobileswitch?mobile=true">Bản mobile</a></li>
                    <li><a href="gioi-thieu-cong-ty.php">Giới Thiệu</a></li>
                    <li><a href="/san-pham-da-xem">Sản Phẩm Đã Xem</a></li>
                    <li><a href="/trung-tam-bao-hanh">Trung Tâm Bảo Hành</a></li>
                    <li><a href="/he-thong-cua-hang">Hệ Thống Showroom</a></li>
                    <li><a href="https://tuyendung.hoanghamobile.com/">Tuyển dụng</a></li>
                    <li><a href="/order/check">Tra Cứu Đơn Hàng</a></li>
                    <li><a id="login-modal" href="dang-nhap.php">Đăng nhập</a></li>
                </ul>
            </div>
        </div>
        <!-- logo and search box -->
        <div class="heading">
            <div class="container">
                <div class="logo">
                    <a href="index.php" title="TPMS - Hệ Thống Bán Lẻ Sản Phẩm Thiết Bị Công Nghệ">
                        <img src="assets/images/logo/logo.png" alt="TPMS - Hệ Thống Bán Lẻ Sản Phẩm Thiết Bị Công Nghệ">
                    </a>
                </div>

                <div class="search-box">
                    <form method="get" action="/tim-kiem" onsubmit="return submitSearch(this);" enctype="application/x-www-form-urlencoded">
                        <div class="border">
                            <input type="text" id="kwd" name="kwd" placeholder="Hôm nay bạn cần tìm gì?" />
                            <button type="submit" class="search"><i class="icon-search"></i></button>
                        </div>
                    </form>
                </div>

                <div class="order-tools">
                    <div class="item check-order">
                        <a id="btnCheckOrder" href="/order/check">
                            <span class="icon"><i class="icon-truck"></i></span>
                            <span class="text">Kiểm tra đơn hàng</span>
                        </a>
                    </div>
                    <div class="item cart">
                        <a href="gio-hang.php">
                            <i class="icon-cart"></i>
                            <label><i class="icon-left">
                                </i><span id="cart-total">
                                    <?php
                                        $quantity = 0;
                                        if (!empty($_SESSION["cart"])) {
                                            $sqlProd = mysqli_query($conn, "SELECT * FROM tbl_versions WHERE idVersion IN (" . implode(",", array_keys($_SESSION['cart'])) . ") ");
                                            while(mysqli_fetch_array($sqlProd)){
                                                $quantity ++;
                                            }
                                            echo "$quantity";
                                        }else{
                                            echo $quantity;
                                        }
                                    ?>
                                </span>
                            </label>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- nav -->
        <nav>
            <div class="container">
                <ul class="root">
                    <li id="dien-thoai-di-dong">
                        <a href="san-pham.php?idCat=1" target="_self"><i class="icon icon-phone"></i><span>Điện thoại</span></a>
                        <div class="sub-container">
                            <div class="sub">
                                <div class="menu g1">
                                    <h4><a href="san-pham.php?idCat=1">Hãng Sảnn Xuất</a></h4>
                                    <ul class="display-column format_3">
                                        <?php
                                        while ($itemBrand1 = mysqli_fetch_assoc($sqlBrand1)) {
                                        ?>
                                            <li><a href="san-pham.php?idCat=1&idBrand=<?= $itemBrand1['id'] ?>"><?= str_replace(' - ĐIỆN THOẠI',"",$itemBrand1['brandName']) ?></a></li>
                                        <?php
                                        }
                                        ?>
                                    </ul>
                                </div>
                                <div class="menu g2">
                                    <h4><a href="san-pham.php?idCat=1&priceMax=1000000">Mức Giá</a></h4>
                                    <ul class="display-row format_2">
                                        <li><a href="san-pham.php?idCat=1&priceMin=100000000">Trên 100 Triệu</a></li>
                                        <li><a href="san-pham.php?idCat=1&priceMax=1000000">Dưới 1 triệu</a></li>
                                        <li><a href="san-pham.php?idCat=1&priceMax=3000000&priceMin=2000000">Từ 2 đến 3 triệu</a></li>
                                        <li><a href="san-pham.php?idCat=1&priceMax=4000000&priceMin=3000000">Từ 3 đến 4 triệu</a></li>
                                        <li><a href="san-pham.php?idCat=1&priceMax=8000000&priceMin=6000000">Từ 6 đến 8 triệu</a></li>
                                        <li><a href="san-pham.php?idCat=1&priceMax=20000000&priceMin=15000000">Từ 15 đến 20 triệu</a></li>
                                        <li><a href="san-pham.php?idCat=1&priceMax=100000000&priceMin=20000000">Từ 20 đến 100 triệu</a></li>
                                    </ul>
                                </div>
                                <div class="menu ads" style="width:600px">
                                    <?php if(getImageCategory($conn,1) != ""){echo "";}else{?><a href="" target="_blank"><img style="width:600px" src="admin/assets/images/category/<?= getImageCategory($conn, 1) ?>" alt=""></a><?php } ?>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li id="apple"> <a href="san-pham.php?idCat=1&idBrand=1" target="_self"> <i class="icon iconv2 iconv2-iphone"></i><span>Apple</span></a></li>
                    <li id="laptop">
                        <a href="san-pham.php?idCat=2" target="_self"><i class="icon icon-laptop"></i><span>Laptop</span></a>
                        <div class="sub-container">
                            <div class="sub">
                                <div class="menu g1">
                                    <h4><a href="san-pham.php?idCat=2">Hãng Sản Xuất</a></h4>
                                    <ul class="display-column format_3">
                                        <?php
                                            $sqlBran = mysqli_query($conn, getBrand($conn, 2));
                                            while ($itemBrand = mysqli_fetch_assoc($sqlBran)) {
                                            ?>
                                                <li><a href="san-pham.php?idCat=2&idBrand=<?= $itemBrand['id'] ?>"><?= str_replace(" - LAPTOP","",$itemBrand['brandName']) ?></a></li>
                                            <?php
                                            }
                                        ?>
                                    </ul>
                                </div>
                                <div class="menu g3">
                                    <h4><a>Mức Giá</a></h4>
                                    <ul class="display-row format_2">
                                        <li><a href="san-pham.php?idCat=2&priceMin=20000000">Trên 20 Triệu</a></li>
                                        <li><a href="san-pham.php?idCat=1&priceMax=15000000&priceMin=12000000">Từ 12 đến 15 Triệu</a></li>
                                        <li><a href="san-pham.php?idCat=1&priceMax=20000000&priceMin=15000000">Từ 15 đến 20 triệu</a></li>
                                    </ul>
                                </div>
                                <div class="menu ads" style="width:600px">  <?php if(getImageCategory($conn,2) == ''){?> <?php }else{ ?><a href="" target="_blank"><img style="width:600px" src="admin/assets/images/category/<?= getImageCategory($conn, 2) ?>" ></a><?php }?>  </div>
                            </div>
                        </div>
                    </li>
                    <li id="tablet">
                        <a href="san-pham.php?idCat=3" target="_self"><i class="icon icon-tablet"></i><span>Tablet</span></a>
                        <div class="sub-container">
                            <div class="sub">
                                <div class="menu g2">
                                    <h4><a href="san-pham.php?idCat=3">Hãng Sản Xuất</a></h4>
                                    <ul class="display-column format_3">
                                        <?php
                                        $sqlBrand = mysqli_query($conn, getBrand($conn,3));
                                        while ($itemBrand = mysqli_fetch_assoc($sqlBrand)) {
                                        ?>
                                            <li><a href="san-pham.php?idCat=3&idBrand=<?= $itemBrand['id'] ?>"><?= str_replace(" - TABLET","",$itemBrand['brandName']) ?></a></li>
                                        <?php
                                        }
                                        ?>
                                    </ul>
                                </div>
                                <div class="menu ads" style="width:600px">  <?php if(getImageCategory($conn,3) == ''){?> <?php }else{ ?><a href="" target="_blank"><img style="width:600px" src="admin/assets/images/category/<?= getImageCategory($conn, 3) ?>" ></a><?php }?>  </div>
                            </div>
                        </div>
                    </li>
                    <li id="man-hinh">
                        <a href="san-pham.php?idCat=4" target="_self"><i class="icon icon-monitor"></i><span>Màn hình</span></a>
                        <div class="sub-container">
                            <div class="sub">
                                <div class="menu g0">
                                    <h4><a href="san-pham.php?idCat=4">Hãng Sản Xuất</a></h4>
                                    <ul class="display-column format_2">
                                        <?php
                                            $sqlBrand = mysqli_query($conn, getBrand($conn,4));
                                            while ($itemBrand = mysqli_fetch_assoc($sqlBrand)) {
                                            ?>
                                                <li><a href="san-pham.php?idCat=4&idBrand=<?= $itemBrand['id'] ?>"><?= str_replace(" - MÀN HÌNH","",$itemBrand['brandName']) ?></a></li>
                                            <?php
                                            }
                                        ?>
                                    </ul>
                                </div>
                                <div class="menu g3">
                                    <h4><a href="">Phụ kiện màn hình</a></h4>
                                    <ul class="display-row format_1">
                                    </ul>
                                </div>
                                <div class="menu ads" style="width:600px">  <?php if(getImageCategory($conn,4) == ''){?> <?php }else{ ?><a href="" target="_blank"><img style="width:600px" src="admin/assets/images/category/<?= getImageCategory($conn, 4) ?>" ></a><?php }?>  </div>
                            </div>
                        </div>
                    </li>
                    <li id="smart-tv">
                        <a href="san-pham.php?idCat=5" target="_self"><i class="icon icon-tivi"></i><span>Smart TV</span> </a>
                        <div class="sub-container">
                            <div class="sub">
                                <div class="menu g1">
                                    <h4><a href="san-pham.php?idCat=5">Hãng Sản Xuất</a></h4>
                                    <ul class="display-column format_1">
                                        <?php
                                            $sqlBrand = mysqli_query($conn, getBrand($conn,5));
                                            while ($itemBrand = mysqli_fetch_assoc($sqlBrand)) {
                                            ?>
                                                <li><a href="san-pham.php?idCat=5&idBrand=<?= $itemBrand['id'] ?>"><?= $itemBrand['brandName'] ?></a></li>
                                            <?php
                                            }
                                        ?>
                                    </ul>
                                    <h4><a href="/phu-kien/phu-kien-smart-tv">Phụ kiện TV</a></h4>
                                    <ul class="display-column format_1">
                                    </ul>
                                </div>
                                <div class="menu ads" style="width:600px">  <?php if(getImageCategory($conn,5) == ''){?> <?php }else{ ?><a href="" target="_blank"><img style="width:600px" src="admin/assets/images/category/<?= getImageCategory($conn, 5) ?>" ></a><?php }?>  </div>
                            </div>
                        </div>
                    </li>
                    <li id="dong-ho">
                        <a href="san-pham.php?idCat=6" target="_self"><i class="icon icon-watch"></i><span>Đồng hồ</span> </a>
                        <div class="sub-container">
                            <div class="sub">
                                <div class="menu g0">
                                    <h4><a>Đồng hồ</a></h4>
                                    <ul class="display-column format_4">
                                        <?php
                                            $sqlBrand = mysqli_query($conn, getBrand($conn,6));
                                            while ($itemBrand = mysqli_fetch_assoc($sqlBrand)) {
                                            ?>
                                                <li><a href="san-pham.php?idCat=6&idBrand=<?= $itemBrand['id'] ?>"><?= str_replace("- ĐỒNG HỒ","",$itemBrand['brandName']) ?></a></li>
                                            <?php
                                            }
                                        ?>
                                    </ul>
                                </div>
                                <div class="menu ads" style="width:600px">  <?php if(getImageCategory($conn,6) == ''){?> <?php }else{ ?><a href="" target="_blank"><img style="width:600px" src="admin/assets/images/category/<?= getImageCategory($conn, 6) ?>" ></a><?php }?>  </div>
                            </div>
                        </div>
                    </li>
                    <li id="loa-tai-nghe">
                        <a href="san-pham.php?idCat=7" target="_self"><i class="icon icon-headphone"></i><span>Âm thanh</span></a>
                        <div class="sub-container">
                            <div class="sub">
                                <div class="menu g0">
                                    <h4><a href="san-pham.php?idCat=7">THƯƠNG HIỆU</a></h4>
                                    <ul class="display-column format_2">
                                        <?php
                                            $sqlBrand = mysqli_query($conn, getBrand($conn,7));
                                            while ($itemBrand = mysqli_fetch_assoc($sqlBrand)) {
                                            ?>
                                                <li><a href="san-pham.php?idCat=7&idBrand=<?= $itemBrand['id'] ?>"><?= str_replace("- ÂM THANH","",$itemBrand['brandName']) ?></a></li>
                                            <?php
                                            }
                                        ?>
                                    </ul>
                                </div>
                                <div class="menu ads" style="width:600px">  <?php if(getImageCategory($conn,7) == ''){?> <?php }else{ ?><a href="" target="_blank"><img style="width:600px" src="admin/assets/images/category/<?= getImageCategory($conn, 7) ?>" ></a><?php }?>  </div>
                            </div>
                        </div>
                    </li>
                    <li id="smart-home">
                        <a href="san-pham.php?idCat=8" target="_self"><i class="icon icon-home"></i><span>Smart Home</span></a>
                        <div class="sub-container">
                            <div class="sub">
                                <div class="menu g4">
                                    <h4><a href="san-pham.php?idCat=8">Gia dụng thông minh</a></h4>
                                    <ul class="display-row format_2">
                                        <?php
                                            $sqlBrand = mysqli_query($conn, getBrand($conn,8));
                                            while ($itemBrand = mysqli_fetch_assoc($sqlBrand)) {
                                            ?>
                                                <li><a href="san-pham.php?idCat=8&idBrand=<?= $itemBrand['id'] ?>"><?= $itemBrand['brandName'] ?></a></li>
                                            <?php
                                            }
                                        ?>
                                    </ul>
                                </div>
                                <div class="menu ads" style="width:600px">  <?php if(getImageCategory($conn,8) == ''){?> <?php }else{ ?><a href="" target="_blank"><img style="width:600px" src="admin/assets/images/category/<?= getImageCategory($conn, 8) ?>" ></a><?php }?>  </div>
                            </div>
                        </div>
                    </li>
                    <li id="phu-kien">
                        <a href="san-pham.php?idCat=16" target="_self"><i class="icon icon-sac"></i><span>Phụ kiện</span></a>
                        <div class="sub-container">
                            <div class="sub">
                                <div class="menu g0">
                                    <h4><a href="san-pham.php?idCat=16">Phụ kiện</a></h4>
                                    <ul class="display-column format_1">
                                        <?php
                                            $sqlBrand = mysqli_query($conn, getBrand($conn,16));
                                            while ($itemBrand = mysqli_fetch_assoc($sqlBrand)) {
                                            ?>
                                                <li><a href="san-pham.php?idCat=16&idBrand=<?= $itemBrand['id'] ?>"><?= $itemBrand['brandName'] ?></a></li>
                                            <?php
                                            }
                                        ?>
                                    </ul>
                                </div>
                                <div class="menu ads" style="width:600px">  <?php if(getImageCategory($conn,16) == ''){?> <?php }else{ ?><a href="" target="_blank"><img style="width:600px" src="admin/assets/images/category/<?= getImageCategory($conn, 16) ?>" ></a><?php }?>  </div>
                            </div>
                        </div>
                    </li>
                    <li id="do-choi-cong-nghe">
                        <a href="san-pham.php?idCat=17" target="_self"><i class="icon icon-game"></i><span>Đồ chơi CN</span></a>
                        <div class="sub-container">
                            <div class="sub">
                                <div class="menu g0">
                                    <h4><a>Đồ chơi công nghệ</a></h4>
                                    <ul class="display-row format_1">
                                        <?php
                                            $sqlBrand = mysqli_query($conn, getBrand($conn,17));
                                            while ($itemBrand = mysqli_fetch_assoc($sqlBrand)) {
                                            ?>
                                                <li><a href="san-pham.php?idCat=17&idBrand=<?= $itemBrand['id'] ?>"><?= $itemBrand['brandName'] ?></a></li>
                                            <?php
                                            }
                                        ?>
                                    </ul>
                                </div>
                                <div class="menu ads" style="width:600px">  <?php if(getImageCategory($conn,17) == ''){?> <?php }else{ ?><a href="" target="_blank"><img style="width:600px" src="admin/assets/images/category/<?= getImageCategory($conn, 17) ?>" ></a><?php }?>  </div>
                            </div>
                        </div>
                    </li>
                    <li id="kho-san-pham-cu">
                        <a href="san-pham.php?idCat=18" target="_self"><i class="icon icon-maycu"></i><span>Máy trôi</span></a>
                        <div class="sub-container">
                            <div class="sub">
                                <div class="menu g0">
                                    <h4><a>Hàng cũ giá rẻ</a></h4>
                                    <ul class="display-column format_3">
                                        <?php
                                            $sqlBrand = mysqli_query($conn, getBrand($conn,18));
                                            while ($itemBrand = mysqli_fetch_assoc($sqlBrand)) {
                                            ?>
                                                <li><a href="san-pham.php?idCat=18&idBrand=<?= $itemBrand['id'] ?>"><?= str_replace(" - MÁY TRÔI","",$itemBrand['brandName']) ?></a></li>
                                            <?php
                                            }
                                        ?>
                                    </ul>
                                </div>
                                <div class="menu ads" style="width:600px">  <?php if(getImageCategory($conn,18) == ''){?> <?php }else{ ?><a href="" target="_blank"><img style="width:600px" src="admin/assets/images/category/<?= getImageCategory($conn, 18) ?>" ></a><?php }?>  </div>
                            </div>
                        </div>
                    </li>
                    <li id="dich-vu-sua-chua">
                        <a href="san-pham.php?idCat=19" target="_self"><i class="icon icon-suachua"></i><span>Sửa chữa</span></a>
                        <div class="sub-container">
                            <div class="sub">
                                <div class="menu g0">
                                    <h4><a>Dịch vụ sửa chữa</a></h4>
                                    <ul>
                                        <?php
                                            $sqlBrand = mysqli_query($conn, getBrand($conn,19));
                                            while ($itemBrand = mysqli_fetch_assoc($sqlBrand)) {
                                            ?>
                                                <li><a href="san-pham.php?idCat=19&idBrand=<?= $itemBrand['id'] ?>"><?= $itemBrand['brandName'] ?></a></li>
                                            <?php
                                            }
                                        ?>
                                    </ul>
                                </div>
                                <div class="menu ads" style="width:600px">  <?php if(getImageCategory($conn,19) == ''){?> <?php }else{ ?><a href="" target="_blank"><img style="width:600px" src="admin/assets/images/category/<?= getImageCategory($conn, 19) ?>" ></a><?php }?>  </div>
                            </div>
                        </div>
                    </li>
                    <li id="dich-vu">
                        <a href="san-pham.php?idCat=20" target="_self"><i class="icon icon-simthe"></i><span>Dịch Vụ</span></a>
                        <div class="sub-container">
                            <div class="sub">
                                <?php
                                    $sqlBrand = mysqli_query($conn, getBrand($conn,20));
                                    while ($itemBrand = mysqli_fetch_assoc($sqlBrand)) {
                                    ?>
                                        <div class="menu g1">
                                            <h4><a href="san-pham.php?idCat=20&idBrand=<?= $itemBrand['id'] ?>"><?= $itemBrand['brandName'] ?></a></h4>
                                            <ul class="display-row format_1">
                                            </ul>
                                        </div>
                                    <?php
                                    }
                                ?>
                            </div>
                        </div>
                    </li>
                    <li id="tin-tuc"> <a href="tin-tuc.php" target="_self"><i class="icon icon-news"></i><span>Tin hot</span></a></li>
                    <li id="tin-khuyen-maiuu-dai-hot">
                        <a href="/tin-khuyen-mai/uu-dai-hot" target="_blank">
                            <i class="icon icon-flash"></i>
                            <span>Ưu đãi</span>
                        </a>
                        <div class="sub-container">
                            <div class="sub">

                                <div class="menu g0">
                                    <h4><a href="/tin-khuyen-mai/uu-dai-hot">Ưu đãi Hot</a></h4>
                                    <ul class="display-row format_1">
                                        <li><a href="/tin-khuyen-mai/uu-dai-hot/khuyen-mai-jbl-harman-kardon">&#226;m thanh - JBL Harman</a></li>
                                        <li><a href="/tin-khuyen-mai/uu-dai-hot/combo-uu-dai">Combo ưu đãi</a></li>
                                        <li><a href="/tin-khuyen-mai/uu-dai-hot/combo-uu-dai-samsung">Combo ưu đãi samsung</a></li>
                                        <li><a href="/tin-khuyen-mai/uu-dai-hot/tcl">Hot Sale TCL</a></li>
                                        <li><a href="/tin-khuyen-mai/uu-dai-hot/khuyen-mai-Apple">Khuyến mại Apple</a></li>
                                        <li><a href="/tin-khuyen-mai/uu-dai-hot/samsung-xiaomi-hot">KM Samsung + Xiaomi</a></li>
                                        <li><a href="/tin-khuyen-mai/uu-dai-hot/laptop-man-hinh-hp">Laptop Màn hình HP</a></li>
                                        <li><a href="/tin-khuyen-mai/uu-dai-hot/mo-ban-phu-kien-9fit">Mở bán Phụ kiện 9Fit</a></li>
                                        <li><a href="/tin-khuyen-mai/san-pham-doc-quyen">Sản phẩm độc quyền</a></li>
                                        <li><a href="/uu-dai-hot/uu-dai-mophie-zagg">Ưu đãi Mophie + ZAGG</a></li>
                                    </ul>
                                </div>


                                <div class="menu ads" style="width:600px">
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- nav -->
    </header>
    <section>
        <div class="container">
            <ol class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <a itemprop="item" href="index.php"><span itemprop="name" content="Trang chủ"><i class="icon-home" title="Trang chủ"></i> Trang chủ</span></a>
                    <meta itemprop="position" content="1" />
                </li>
                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <a itemprop="item" href="chinh-sach-giai-quyet-khieu-nai.php" title="Chính Sách Giải Quyết Khiếu Nại" class="actived"><span itemprop="name" content="Chính Sách Giải Quyết Khiếu Nại">Chính Sách Giải Quyết Khiếu Nại</span></a>
                    <meta itemprop="position" content="2" />
                </li>
            </ol>
        </div>
    </section>

    <section>
        <div class="container page-text">
            <h2
                style="margin-bottom: 10px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-weight: 300; font-stretch: inherit; font-size: 24px; line-height: 1.4; font-family: Roboto Condensed, Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0); text-align: justify;">
                Quy trình giải quyết tranh chấp, khiếu nại</h2>
            <p
                style="margin-bottom: 8px; padding: 0px 0px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.4; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0); text-align: justify;">
                <font color="#00483e" face="inherit"><span
                        style="border-style: initial; border-color: initial; border-image: initial; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; outline-color: initial; outline-width: initial;">Hoàng</span>
                </font><a href="https://hoanghamobile.com/"
                    style="margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; outline: none; color: rgb(0, 72, 62);">Hà
                    Mobile</a>có trách nhiệm tiếp nhận và xử lý khiếu nại của khách hàng liên quan đến giao dịch
                tại website<a href="https://hoanghamobile.com/"
                    style="margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; outline: none; color: rgb(0, 72, 62);">https://hoanghamobile.com</a>.
            </p>
            <p
                style="margin-bottom: 8px; padding: 0px 0px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.4; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0); text-align: justify;">
                - Khách hàng có quyền gửi khiếu nại về việc chất lượng, dịch vụ, giá cả sản phẩmkhông đúng với mô
                tả, thông tin thanh toán bị tiết lộ gây thiệt hại cho mình đến Ban quản trị của  TPMS. Khi
                tiếp nhận những phản hồi này,  TPMS sẽ xác nhận lại thông tin, trường hợp đúng như phản ánh
                của khách hàng tùy theo mức độ,  TPMS sẽ có những biện pháp xử lý kịp thời.</p>
            <p
                style="margin-bottom: 8px; padding: 0px 0px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.4; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0); text-align: justify;">
                Khách hàng gửi khiếu nại tại địa chỉ :</p>
            <p
                style="margin-bottom: 8px; padding: 0px 0px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.4; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0); text-align: justify;">
                Tên tổ chức:<span
                    style="margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; color: rgb(178, 34, 34);"><strong>CÔNG TY CỔ PHẦN XÂY DỰNG VÀ ĐẦU TƯ THƯƠNG MẠI HUY DẬU </strong></span></p>
            <p
                style="margin-bottom: 8px; padding: 0px 0px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.4; vertical-align: baseline;">
                <font color="#000000" face="Arial, Helvetica, sans-serif">Trụ sở chính:</font><span
                    style="text-align: center;"></span><span style="text-align: center;">
                    <font color="#000000">234 Hoàng Quốc Việt - Hà Nội
                        Nam</font>
                </span>
            </p>
            <p
                style="margin-bottom: 8px; padding: 0px 0px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.4; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0); text-align: justify;">
                Văn phòng đại diện khu vực Miền Nam: 1060 đường 3/2, Phường 12, Quận 11, TP. Hồ Chí Minh.</p>
            <p
                style="margin-bottom: 8px; padding: 0px 0px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.4; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0); text-align: justify;">
                Email:<a href="mailto:cskh@tpms.com"
                    style="margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; outline: none; color: rgb(0, 72, 62);"> cskh@tpms.com</a>
            </p>
            <p
                style="margin-bottom: 8px; padding: 0px 0px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.4; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0); text-align: justify;">
                Điện thoại:</p>
            <ul
                style="margin-right: 0px; margin-bottom: 0px; margin-left: 40px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; list-style: none; color: rgb(0, 0, 0); text-align: justify;">
                <li style="margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline;">Tổng đài hỗ
                    trợ:<a href="tel:0386131716"
                        style="margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; outline: none; color: rgb(0, 72, 62);">03.86.13.17.16</a>
                </li>
                <li style="margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline;">Hà
                    Nội:<a href="tel:0386131716"
                        style="margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; outline: none; color: rgb(0, 72, 62);">03.86.13.17.16</a>
                </li>
                <li style="margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline;">
                    TP.HCM:<a href="tel:0386131716"
                        style="margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; outline: none; color: rgb(0, 72, 62);">03.86.13.17.16</a>
                </li>
            </ul>
            <h2
                style="margin-bottom: 10px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-weight: 300; font-stretch: inherit; font-size: 24px; line-height: 1.4; font-family: Roboto Condensed, Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0); text-align: justify;">
                Các bước giải quyết tranh chấp, khiếu nại:</h2>
            <ul
                style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; list-style: none; color: rgb(0, 0, 0); text-align: justify;">
                <li
                    style="margin: 0px 0px 0px 40px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline;">
                    <strong>Bước 1</strong>: Bộ phận Chăm Sóc Khách Hàng của Công ty sẽ tiếp nhận các khiếu nại của
                    khách hàng. Bộ phận này chủ động giải quyết nhanh chóng và trả lời ngay kết quả giải quyết các khiếu
                    nại trên cơ sở các Chính sách mà Công ty đã công bố.</li>
                <li
                    style="margin: 0px 0px 0px 40px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline;">
                    <strong>Bước 2</strong>: Liên hệ với người phản ánh để xác minh lại thông tin phản ánh.</li>
                <li
                    style="margin: 0px 0px 0px 40px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline;">
                    <strong>Bước 3</strong>: Liên hệ với bộ phận có trách nhiệm yêu cầu giải trình về sự việc gây tranh
                    chấp.</li>
                <li
                    style="margin: 0px 0px 0px 40px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline;">
                    <strong>Bước 4</strong>: Chuyển kết quả giải quyết khiếu nại cho các bộ phận có liên quan để thực
                    hiện (Bộ phận Kế toán – Tài chính…) và gọi điện xác nhận với khách hàng về kết quả khiếu nại đã được
                    giải quyết.</li>
            </ul>
            <p
                style="margin-bottom: 8px; padding: 0px 0px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.4; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0); text-align: justify;">
                -  TPMS tôn trọng và nghiêm túc thực hiện các quy định của pháp luật về bảo vệ quyền lợi của
                người tiêu dùng.</p>
            <p
                style="margin-bottom: 8px; padding: 0px 0px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.4; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0); text-align: justify;">
                - Chúng tôi công khai cơ chế giải quyết các tranh chấp phát sinh trong quá trình đặt hàng trên
                website<a href=""
                    style="margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; outline: none; color: rgb(0, 72, 62);"> https://tpms.com</a>.
            </p>
            <p
                style="margin-bottom: 8px; padding: 0px 0px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.4; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0); text-align: justify;">
                - Cơ chế và quy trình giải quyết tranh chấp đối với khách hàng là: giải quyết tranh chấp theo cơ chế
                trao đổi thỏa thuận thống nhất, các bên liên quan sẽ thực hiện theo quy trình trao đổi gián tiếp qua
                điện thoại, xác nhận văn bằng email, nếu vẫn chưa thỏa thuận được thì sẽ giải quyết thông qua gặp trực
                tiếp để cụ thể hóa vấn đề, giải quyết triệt để vấn đề mâu thuẫn giữa các bên sao cho có lợi nhất.</p>
            <p
                style="margin-bottom: 8px; padding: 0px 0px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.4; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0); text-align: justify;">
                - Các bên bao gồm: khách hàng và  TPMS sẽ phải có vai trò trách nhiệm trong việc tích cực giải
                quyết vấn đề. Đối với  TPMS cần có trách nhiệm cung cấp văn bản giấy tờ chứng thực (nếu có)
                thông tin liên quan đến sự việc đang gây mâu thuẫn cho khách hàng, lắng nghe và tiếp nhận thông tin từ
                khách hàng (trong trường hợp cụ thể chúng tôi sẽ: yêu cầu khách hàng cần có trách nhiệm cung cấp chính
                xác các thông tin vô hình và hữu hình về vấn đề mâu thuẫn đang phát sinh cần giải quyết mà khách hàng đã
                tự thấy mình bị thiệt hại), sau đó tiến hành xem xét và nêu rõ, phân tích lỗi thuộc về bên nào. Lấy ý
                kiến về sự thỏa thuận mức độ bồi hoàn của 2 bên và kết thúc giải quyết tranh chấp một cách thỏa đáng
                nhất.</p>
            <p
                style="margin-bottom: 8px; padding: 0px 0px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.4; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0); text-align: justify;">
                - Trong trường hợp chứng minh được lỗi thuộc về  TPMS sẽ có biện pháp bồi hoàn cho khách hàng.
            </p>
            <p
                style="margin-bottom: 8px; padding: 0px 0px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.4; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0); text-align: justify;">
                - Khi có tranh chấp xảy ra, khách hàng có thể liên hệ ngay với TPMS theo email:<a
                    href="mailto:cskh@tpms.com"
                    style="margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; outline: none; color: rgb(0, 72, 62);"> cskh@tpms.com</a>hoặcgọitrực 
                tiếp về tổng đài 03.86.13.17.16, TPMS sẽ cử người giải quyết vấn đề của khách hàng ngay trong
                vòng 24 giờ để tìm hiểu vấn đề phát sinh.</p>
            <h2
                style="margin-bottom: 10px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-weight: 300; font-stretch: inherit; font-size: 24px; line-height: 1.4; font-family: Roboto Condensed, Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0); text-align: justify;">
                Cơ chế giải quyết tranh chấp</h2>
            <p
                style="margin-bottom: 8px; padding: 0px 0px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.4; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0); text-align: justify;">
                - Mọi tranh chấp phát sinh giữa  TPMS và khách hàng sẽ được giải quyết trên cơ sở thương
                lượng. Trường hợp không đạt được thỏa thuận như mong muốn, một trong hai bên có quyền đưa vụ việc ra Tòa
                án kinh tế để giải quyết.</p>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="bg">
                <div class="col-content">
                    <div class="link-content">
                        <h4>
                            <a>Hỗ Trợ - Dịch Vụ</a>
                        </h4>
                        <ul>
                            <li>
                                <a href="mua-tra-gop.php">Chính Sách Và Hướng Dẫn Mua Hàng Trả Góp</a>
                            </li>
                            <li>
                                <a href="huong-dan-dat-hang.php">Hướng Dẫn Đặt Hàng Và Thanh Toán</a>
                            </li>
                            <li>
                                <a href="/order/check">Tra Cứu Đơn Hàng</a>
                            </li>
                            <li>
                                <a href="chinh-sach-bao-hanh.php">Chính Sách Bảo Hành</a>
                            </li>
                            <li>
                                <a href="/dat-hang/bao-hanh-mo-rong">Phạm Vi, Điều Khoản Gói Bảo Hành Mở Rộng</a>
                            </li>
                            <li>
                                <a href="chinh-sach-bao-mat.php">Chính Sách Bảo Mật</a>
                            </li>
                            <li>
                                <a href="chinh-sach-giai-quyet-khieu-nai.php">Chính Sách Giải Quyết Khiếu Nại</a>
                            </li>
                            <li>
                                <a href="dieu-khoan-mua-ban-hang-hoa.php">Điều Khoản Mua Bán Hàng Hóa</a>
                            </li>
                            <li>
                                <a href="cau-hoi-thuong-gap.php">Câu Hỏi Thường Gặp</a>
                            </li>
                        </ul>
                    </div>
                    <div class="link-content">
                        <h4>
                            <a>Thông Tin Liên Hệ</a>
                        </h4>
                        <ul>
                            <li>
                                <a href="mua-hang-online.php">Bán Hàng Online</a>
                            </li>
                            <li>
                                <a href="cham-soc-khach-hang.php">Chăm Sóc Khách Hàng</a>
                            </li>
                            <li>
                                <a href="/tin-tuc/hoang-ha-care-dich-vu-sua-chua-dien-thoai-may-tinh-bang-voi-gia-tot-nhat-thi-truong">Dịch Vụ Sửa Chữa TPMS Care</a>
                            </li>
                            <li>
                                <a href="hop-tac-kinh-doanh.php">Hợp Tác Kinh Doanh</a>
                            </li>
                            <li>
                                <a href="/trung-tam-bao-hanh">Tra Cứu Bảo Hành</a>
                            </li>
                        </ul>
                    </div>
                    <div class="link-content">
                        <h4>
                            <a href="/he-thong-cua-hang">Hệ Thống Showroom</a>
                        </h4>
                        <ul>
                            <li>
                                <a href="/he-thong-cua-hang">Danh Sách Showroom</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h4>Tổng đài</h4>
                    <a class="hotline" href="tel:0386131716">03.86.13.17.16</a>
                    </div>
                    <div>
                        <h4>Thanh toán miễn phí</h4>
                        <ul class="list-logo">
                        <li>
                            <img src="assets/images/logo/logo-visa.png">
                            <img src="assets/images/logo/logo-master.png">
                        </li>
                        <li>
                            <img src="assets/images/logo/logo-jcb.png">
                            <img src="assets/images/logo/logo-samsungpay.png">
                        </li>
                        <li>
                            <img src="assets/images/logo/logo-atm.png">
                            <img src="assets/images/logo/logo-vnpay.png">
                        </li>
                    </ul>
                    </div>
                    <div>
                    <h4>Hình thức vận chuyển</h4>
                    <ul class="list-logo">
                        <li>
                            <img src="assets/images/logo/nhattin.jpg">
                            <img src="assets/images/logo/vnpost.jpg">
                        </li>
                    </ul>
                    <div class="mg-top20">
                        <a href="http://online.gov.vn/Home/WebDetails/28738" target="_blank"><img src="assets/images/logo/logo-bct.png"></a>
                    </div>
                </div>
                </div>
                
            </div>
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