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
    
    
    <title>TPMS - Điều Khoản Mua Hàng</title>
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
    <header>
        <div class="top-navigation">
            <div class="container">
                <ul>
                    <li><a href="gioi-thieu-cong-ty.php">Giới Thiệu</a></li>
                    <li><a href="trung-tam-bao-hanh.php">Trung Tâm Bảo Hành</a></li>
                    <li><a href="he-thong-cua-hang.php">Hệ Thống Showroom</a></li>
                    <li><a href="bang-dieu-khien.php?page=order">Tra Cứu Đơn Hàng</a></li>
                    <?php
                        if (isset($_SESSION['userId'])) {
                            $infoUser = getInfoUser($conn,$_SESSION['userId']);
                            ?>
                                <li class="member">
                                    <i class="icon-account"></i> <a class="account" href="/Account"><strong><?=$infoUser['name']?></strong></a>
                                    <div class="sub">
                                        <ul>
                                            <li><a href="bang-dieu-khien.php?page=index"><i class="icon-controls"></i><span>Bảng điều khiển</span></a></li>
                                            <li><a href="bang-dieu-khien.php?page=info"><i class="icon-account"></i><span>Thông tin tài khoản</span></a></li>
                                            <li><a href="bang-dieu-khien.php?page=order"><i class="icon-order-mgr"></i><span>Đơn hàng của bạn</span></a></li>
                                            <li><a href="bang-dieu-khien.php?page=wishlist"><i class="icon-love"></i><span>Sản phẩm yêu thích</span></a></li>
                                            <li><a href="bang-dieu-khien.php?page=comment"><i class="icon-comment"></i><span>Quản lý bình luận</span></a></li>
                                            <li><a href="dang-xuat.php"><i class="icon-logout"></i><span>Đăng xuất</span></a></li>
                                        </ul>
                                    </div>
                                </li>
                            <?php
                        }else{ ?><li><a id="login-modal" href="dang-nhap.php">Đăng nhập</a></li><?php } ?>
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
                    <a itemprop="item" href="index.php">
                        <span itemprop="name" content="Trang chủ">
                            <i class="icon-home" title="Trang chủ"></i>
                            Trang chủ
                        </span>
                    </a>
                    <meta itemprop="position" content="1"/>
                </li>
                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <a itemprop="item" href="dieu-khoan-mua-ban-hang-hoa.php" title="Điều Khoản Mua Bán Hàng Hóa tại" class="actived">
                        <span itemprop="name" content="Điều Khoản Mua Bán Hàng Hóa">Điều Khoản Mua Bán Hàng Hóa</span>
                    </a>
                    <meta itemprop="position" content="2"/>
                </li>
            </ol>
        </div>
    </section>
        
    <section>
        <div class="container page-text">
            <h2 style="text-align: center; margin-bottom: 10px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-weight: 300; font-stretch: inherit; font-size: 24px; line-height: 1.4; font-family: Roboto Condensed, Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0);">
                <br>
            </h2>
            <h2 style="margin-bottom: 10px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-weight: 300; font-stretch: inherit; font-size: 24px; line-height: 1.4; font-family: Roboto Condensed, Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0); text-align: justify;">1. Hướng dẫn sử dụng Nền Tảng</h2>
            <p style="margin-bottom: 8px; padding: 0px 0px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.4; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0); text-align: justify;">- Khi truy cập website của chúng tôi, khách hàng phải đảm bảo đủ 18 tuổi, hoặc truy cập dưới sự giám sát của cha mẹ hay người giám hộ hợp pháp. Khách hàng đảm bảo có đầy đủ hành vi dân sự để thực hiện các hành vi đặt hàng theo quy định hiện hành của pháp luật Việt Nam.</p>
            <p style="margin-bottom: 8px; padding: 0px 0px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.4; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0); text-align: justify;">- Chúng tôi cấp quyền sử dụng và truy cập Nền Tảng để bạn có thể đặt hàng trên Nền Tảng theo các điều khoản và điều kiện quy định tại Nền Tảng.</p>
            <p style="margin-bottom: 8px; padding: 0px 0px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.4; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0); text-align: justify;">- Nghiêm cấm sử dụng bất kỳ phần nào của Nền Tảng với mục đích thương mại hoặc nhân danh bất kỳ đối tác thứ ba nào nếu không được TPMS cho phép bằng văn bản. Nếu vi phạm bất cứ điều nào trong đây, chúng tôi có quyền ngay lập tức thu hồi quyền sử dụng và/hoặc khóa quyền truy cập website của khách hàng bằng bất kỳ hình thức hợp pháp nào mà không cần thông báo trước.</p>
            <p style="margin-bottom: 8px; padding: 0px 0px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.4; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0); text-align: justify;">- Khách hàng không cần đăng ký tài khoản với thông tin xác thực về bản thân để đặt được hàng.</p>
            <h2 style="margin-bottom: 10px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-weight: 300; font-stretch: inherit; font-size: 24px; line-height: 1.4; font-family: Roboto Condensed, Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0); text-align: justify;">2. Ý kiến khách hàng</h2>
            <p style="margin-bottom: 8px; padding: 0px 0px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.4; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0); text-align: justify;">- Tất cả nội dung hiển thị và đăng tải trên Nền Tảng, bao gồm cả ý kiến, nhận xét đóng góp của khách hàng, đều là tài sản của TPMS.com. Nếu chúng tôi phát hiện bất kỳ thông tin giả mạo, vu khống nào, chúng tôi có quyền ngay lập tức xóa phần bình luận của khách hàng và/ hoặc áp dụng các biện pháp khác theo quy định của pháp luật Việt Nam</p>
            <h2 style="margin-bottom: 10px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-weight: 300; font-stretch: inherit; font-size: 24px; line-height: 1.4; font-family: Roboto Condensed, Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0); text-align: justify;">3. Đặt hàng và xác nhận đơn hàng</h2>
            <h3 style="margin-bottom: 10px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-weight: 300; font-stretch: inherit; font-size: 20px; line-height: 1.4; font-family: Roboto Condensed, Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0); text-align: justify;">Bước 1: Đặt hàng online bằng một trong các hình thức sau:</h3>
            <p style="margin-bottom: 8px; padding: 0px 0px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.4; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0); text-align: justify;">
                Đặt trực tiếp tại nút “Đặt Hàng Online” hoặc Chat trực tuyến trên website: <a href="https://tpms.com/" style="margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; outline: none; color: rgb(0, 72, 62);">https://tpms.com</a>
                .
            </p>
            <p style="margin-bottom: 8px; padding: 0px 0px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.4; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0); text-align: justify;">Gọi điện đến tổng đài: 0386131716</p>
            <p style="margin-bottom: 8px; padding: 0px 0px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.4; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0); text-align: justify;">
                Bình luận thông tin hoặc chat trực tuyến trên Facebook: <a href="https://www.facebook.com/lehuydau2312/" style="margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; outline: none; color: rgb(0, 72, 62);">https://www.facebook.com/lehuydau2312/</a>
                .
            </p>
            <p style="margin-bottom: 8px; padding: 0px 0px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.4; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0); text-align: justify;">Gửi thông tin đặt hàng qua email: online@tpms.com</p>
            <p style="text-align: center; margin-bottom: 8px; padding: 0px 0px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.4; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0);">
                <img src="assets/images/img/capture.png" style="width: 756.778px; height: 596.543px;">
            </p>
            <p style="text-align: center; margin-bottom: 8px; padding: 0px 0px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.4; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0);">
                Ảnh: <i>Giao diện đặt hàng</i>
            </p>
            <p style="text-align: center; margin-bottom: 8px; padding: 0px 0px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.4; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0);">
                <img src="assets/images/img/ok-ok.png">
                <i>
                    <br>
                </i>
            </p>
            <p style="text-align: center; margin-bottom: 8px; padding: 0px 0px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.4; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0);">
                <i>Ảnh: Thông báo đơn hàng đã đặt.</i>
            </p>
            <p style="text-align: center; margin-bottom: 8px; padding: 0px 0px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.4; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0);">
                <img src="assets/images/img/1111.png" >
            </p>
            <p style="text-align: center; margin-bottom: 8px; padding: 0px 0px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.4; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0);">
                Ảnh: <i>Thông báo SMS cho khách hàng</i>
            </p>
            <p style="text-align: center; margin-bottom: 8px; padding: 0px 0px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.4; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0);">
                <i>
                    <br>
                </i>
            </p>
            <p style="margin-bottom: 8px; padding: 0px 0px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.4; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0); text-align: justify;"></p>
            <h3 style="margin-bottom: 10px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-weight: 300; font-stretch: inherit; font-size: 20px; line-height: 1.4; font-family: Roboto Condensed, Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0); text-align: justify;">Bước 2: TPMS gọi điện và xác nhận đơn hàng của quý khách (Đơn hàng của quý khách được tính là thành công khi có nhân viên bộ phân telesale gọi điện xác nhận và hỗ trợ).</h3>
            <p style="margin-bottom: 8px; padding: 0px 0px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.4; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0); text-align: justify;">+ Đối với các đơn hàng đặt hàng từ 8h30 đến 16h59 sẽ được xác nhận đơn hàng trong ngày.</p>
            <p style="margin-bottom: 8px; padding: 0px 0px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.4; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0); text-align: justify;">+ Đối với các đơn đặt hàng từ 17h trở đi sẽ được xác nhận trong ngày hôm sau.</p>
            <p style="margin-bottom: 8px; padding: 0px 0px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.4; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0); text-align: justify;">Lưu ý:</p>
            <p style="margin-bottom: 8px; padding: 0px 0px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.4; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0); text-align: justify;">- Toàn bộ đơn hàng online đều được miễn phí giao hàng trên toàn quốc.</p>
            <p style="margin-bottom: 8px; padding: 0px 0px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.4; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0); text-align: justify;">- Địa chỉ giao hàng mà quý khách cung cấp trong quá trình đặt hàng có thể được thay đổi sau khi yêu cầu đặt hàng đã được TPMS tiếp nhận. Để thay đổi (các) thông tin này, quý khách cần liên hệ sớm nhất với TPMS với thông tin được cập nhật chính xác.</p>
            <h2 style="margin-bottom: 10px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-weight: 300; font-stretch: inherit; font-size: 24px; line-height: 1.4; font-family: Roboto Condensed, Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0); text-align: justify;">4. Hình thức thanh toán</h2>
            <p style="margin-bottom: 8px; padding: 0px 0px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.4; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0); text-align: justify;">TPMS chưa có hình thức thanh toán trực tuyến qua website. Hiện tại chỉ thanh toán theo 2 hình thức sau:</p>
            <p style="margin-bottom: 8px; padding: 0px 0px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.4; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0); text-align: justify;">A/ Thanh toán tại cửa hàng (Tiền mặt, bằng thẻ tín dụng, thẻ ghi nợ hoặc thẻ ATM nội địa)</p>
            <p style="margin-bottom: 8px; padding: 0px 0px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.4; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0); text-align: justify;">B/ Đối với đơn hàng Online, thoanh toán bằng 2 cách sau:</p>
            <p style="margin-bottom: 8px; padding: 0px 0px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.4; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0); text-align: justify;">- Cách 1: Nhận hàng tại nhà và thanh toán bằng hình thức COD (thanh toán trực tiếp cho nhân viên bưu tá).</p>
            <p style="margin-bottom: 8px; padding: 0px 0px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.4; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0); text-align: justify;">- Cách 2: Chuyển khoản trước cho TPMS.</p>
            <p style="margin-bottom: 8px; padding: 0px 0px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.4; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0); text-align: justify;">- Khuyến khích quý khách thanh toán theo hình thức COD.</p>
            <h2 style="margin-bottom: 10px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-weight: 300; font-stretch: inherit; font-size: 24px; line-height: 1.4; font-family: Roboto Condensed, Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0); text-align: justify;">5. Thời gian vận chuyển và giao hàng</h2>
            <p style="margin-bottom: 8px; padding: 0px 0px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.4; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0); text-align: justify;">- Đối với khu vực nội thành Hà Nội và Hồ Chí Minh: Giao trong ngày với đơn hàng xác nhận trước 14h30. Sau 14h30 đơn hàng sẽ được hỗ trợ chuyển sang giao vào ngày kế tiếp.</p>
            <p style="margin-bottom: 8px; padding: 0px 0px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.4; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0); text-align: justify;">- Các quận, huyện ngoại thành Hà Nội và Hồ Chí Minh: Thời gian giao hàng mất từ 1-2 ngày làm việc (trước 18h) hàng ngày.</p>
            <p style="margin-bottom: 8px; padding: 0px 0px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.4; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0); text-align: justify;">- Các tỉnh có cửa hàng trực thuộc cửa hàng TPMS: Thời gian giao hàng trong ngày hoặc 2-3 ngày làm việc tùy thuộc vào khu vực và địa chỉ của quý khách.</p>
            <p style="margin-bottom: 8px; padding: 0px 0px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.4; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0); text-align: justify;">- Các tỉnh không có cửa hàng trực thuộc cửa hàng TPMS: Thời gian giao hàng dao động từ 3-4 ngày làm việc tùy thuộc vào khu vực và địa chỉ của quý khách.</p>
            <p style="margin-bottom: 8px; padding: 0px 0px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.4; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0); text-align: justify;">- TPMS/ Đơn vị vận chuyển sẽ luôn cố gắng giao sản phẩm tận nhà cho khách hàng bất cứ khi nào có thể. Tuy nhiên, tùy thuộc vào địa điểm giao nhận mà TPMS/ Đơn vị vận chuyển có thể hoặc không thể giao sản phẩm tận nhà cho khách hàng do sự khác biệt trong chính sách quản lý của mỗi địa điểm (ví dụ như căn hộ/ chung cư hay tòa nhà văn phòng). Trong những trường hợp này, khách hàng vui lòng hỗ trợ TPMS/ Đơn vị vận chuyển bằng cách nhận hàng tại tầng trệt/sảnh.</p>
            <p style="margin-bottom: 8px; padding: 0px 0px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.4; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0); text-align: justify;">
                <span style="margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; color: rgb(0, 0, 255);">Lưu ý: Thời gian giao hàng không tính ngày Chủ nhật và ngày Lễ, Tết.</span>
            </p>
            <h2 style="margin-bottom: 10px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-weight: 300; font-stretch: inherit; font-size: 24px; line-height: 1.4; font-family: Roboto Condensed, Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0); text-align: justify;">6. Nhận hàng và kiểm tra</h2>
            <p style="margin-bottom: 8px; padding: 0px 0px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.4; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0); text-align: justify;">- TPMS áp dụng chính sách "Không hỗ trợ đồng kiểm khi nhận hàng". Theo đó, người mua khi nhận hàng sẽ không được mở kiện hàng ra xem mà chỉ được kiểm tra các yếu tố bên ngoài của kiện hàng. Người mua chỉ có quyền mở kiện hàng sau khi đã thanh toán đầy đủ cho nhân viên vận chuyển.</p>
            <p style="margin-bottom: 8px; padding: 0px 0px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.4; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0); text-align: justify;">- Quý khách hàng mở bưu phẩm vui lòng quay lại video trong quá trình mở hộp sản phẩm. Nếu có phát sinh lỗi, không đúng quy cách sản phẩm, TPMS sẽ làm việc trực tiếp với khách hàng để đổi trả và hoàn tiền.</p>
            <p style="margin-bottom: 8px; padding: 0px 0px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.4; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0); text-align: justify;">- Sản phẩm của quý khách sẽ được đóng gói niêm phong theo tiêu chuẩn của bên chuyển phát nhanh (quấn bọt khí trước khi bỏ vào hộp carton, được ghi hình trong quá trình đóng gói và được đóng niêm phong bằng băng keo logo của TPMS).</p>
            <p style="margin-bottom: 8px; padding: 0px 0px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.4; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0); text-align: justify;">- Trường hợp khi giao đến hộp hàng không còn nguyên vẹn, ẩm ướt, móp, méo hoặc mất tem băng keo, khách hàng vui lòng từ chối nhận và liên hệ tổng đài của TPMS 0386131716 để được hỗ trợ.</p>
            <p style="margin-bottom: 8px; padding: 0px 0px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.4; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0); text-align: justify;">
                - Nếu người mua không hài lòng hoặc sản phẩm có vấn đề sau khi đã nhận hàng và thanh toán, người mua có thể khiếu nại đến TPMS. Khoản thanh toán mà người mua đã thanh toán cho kiện hàng sẽ được hoàn trả sau khi có kết quả giải quyết khiếu nại của TPMS đối với khiếu nại của người mua. Mọi thông tin và hướng dẫn cách khiếu nại lên TPMS, vui lòng tham khảo thêm tại 
                <font color="#00483e" face="inherit">
                    <span style="border-style: initial; border-color: initial; border-image: initial; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; outline-color: initial; outline-width: initial;">đây</span>
                </font>
                .
            </p>
            <h2 style="margin-bottom: 10px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-weight: 300; font-stretch: inherit; font-size: 24px; line-height: 1.4; font-family: Roboto Condensed, Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0); text-align: justify;">7. Giá cả</h2>
            <p style="margin-bottom: 8px; padding: 0px 0px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.4; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0); text-align: justify;">- Giá cả sản phẩm được niêm yết tại Nền Tảng là giá bán cuối cùng đã bao gồm thuế Giá trị gia tăng (VAT). Giá của sản phẩm có thể thay đổi tùy thời điểm và chương trình khuyến mãi kèm theo. Phí vận chuyển và/hoặc phí thực hiện đơn hàng được miễn phí trên toàn quốc.</p>
            <h2 style="margin-bottom: 10px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-weight: 300; font-stretch: inherit; font-size: 24px; line-height: 1.4; font-family: Roboto Condensed, Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0); text-align: justify;">8. Chính sách đổi trả </h2>
            <p style="margin-bottom: 8px; padding: 0px 0px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.4; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0); text-align: justify;">TPMS hỗ trợ khách hàng chi phí vận chuyển với tất cả các trường hợp sản phẩm phát sinh lỗi trong 15 ngày, gửi máy bảo hành, đổi trả (lưu ý khi gửi về cho TPMS vui lòng không khai giá trị sản phẩm, không chuyển hỏa tốc) ngoài ra khi máy gửi về thì phải thoát hết tài khoản (nếu có).</p>
            <p style="margin-bottom: 8px; padding: 0px 0px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.4; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0); text-align: justify;">Thời gian đổi mới tính từ ngày khách hàng nhận máy và theo chính sách bảo hành của TPMS.</p>
            <p style="margin-bottom: 8px; padding: 0px 0px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.4; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0); text-align: justify;">Khách hàng gửi máy đổi mới vui lòng gọi tổng đài 0386131716 để được hướng dẫn chi tiết.</p>
            <p style="margin-bottom: 8px; padding: 0px 0px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.4; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0); text-align: justify;">Nhận được sản phẩm TPMS sẽ có bộ phận tiếp nhận và sẽ liên hệ trực tiếp với quý khách hàng trong thời gian sớm nhất.</p>
            <p style="margin-bottom: 8px; padding: 0px 0px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.4; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0); text-align: justify;">Lưu ý:</p>
            <p style="margin-bottom: 8px; padding: 0px 0px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.4; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0); text-align: justify;">- Chúng tôi chỉ chấp nhận những đơn đặt hàng khi cung cấp đủ thông tin chính xác về địa chỉ, số điện thoại. Sau khi quý khách đặt hàng, chúng tôi sẽ liên lạc lại để kiểm tra thông tin và thỏa thuận thêm những điều có liên quan.</p>
            <p style="margin-bottom: 8px; padding: 0px 0px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.4; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0); text-align: justify;">- Một số trường hợp nhạy cảm: giá trị đơn hàng quá lớn &amp;thời gian giao hàng vào buổi tối địa chỉ giao hàng trong ngõ hoặc có thể dẫn đến nguy hiểm. Chúng tôi sẽ chủ động liên lạc với quý khách để thống nhất lại thời gian giao hàng cụ thể.</p>
            <p style="margin-bottom: 8px; padding: 0px 0px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.4; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0); text-align: justify;">- Trong trường hợp giao hàng chậm trễ mà không báo trước, quý khách có thể không nhận hàng và chúng tôi sẽ hoàn trả toàn bộ số tiền mà quý khách trả trước (nếu có) trong vòng 7 ngày.</p>
            <p style="margin-bottom: 8px; padding: 0px 0px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.4; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0); text-align: justify;">- TPMS cam kết tất cả hàng hóa gởi đến quý khách đều là đúng như thông tin đăng tải trên webssite (có đầy đủ hóa đơn, được bảo hành chính thức). Những rủi ro phát sinh trong quá trình vận chuyển (va đập, ẩm ướt, tai nạn..) có thể ảnh hưởng đến hàng hóa, vì thế xin Quý Khách vui lòng kiểm tra hàng hóa thật kỹ trước khi ký nhận và quay lại video trong quá trình mở hộp sản phẩm. TPMS sẽ không chịu trách nhiệm với những sai lệch hình thức của hàng hoá sau khi Quý khách đã ký nhận hàng và không có video mở hộp làm bằng chứng.</p>
            <h2 style="margin-bottom: 10px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-weight: 300; font-stretch: inherit; font-size: 24px; line-height: 1.4; font-family: Roboto Condensed, Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0); text-align: justify;">9. Quy định về bảo mật</h2>
            <p style="margin-bottom: 8px; padding: 0px 0px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.4; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0); text-align: justify;">- Nền Tảng có các biện pháp và công cụ để thực hiện việc bảo mật để có thể bảo vệ thông tin cá nhân của khách hàng một cách toàn diện nhất. Thông tin của khách hàng trong quá trình đặt hàng sẽ được mã hóa để đảm bảo an toàn tối đa. Mọi thông tin giao dịch sẽ được bảo mật nhưng trong trường hợp cơ quan pháp luật yêu cầu bằng văn bản, chúng tôi sẽ phải cung cấp những thông tin này cho các cơ quan pháp luật theo đúng quy định.</p>
            <p style="margin-bottom: 8px; padding: 0px 0px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.4; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0); text-align: justify;">
                - Khách hàng không được sử dụng bất kỳ chương trình, công cụ hay hình thức nào khác để can thiệp vào hệ thống hay làm thay đổi cấu trúc dữ liệu. TPMS nghiêm cấm việc phát tán, truyền bá hay cổ vũ cho bất kỳ hoạt động nào nhằm can thiệp, phá hoại hay xâm nhập vào dữ liệu của hệ thống. Cá nhân hay tổ chức vi phạm sẽ bị tước bỏ mọi quyền lợi cũng như sẽ bị truy tố trước pháp luật nếu cần thiết, vui lòng tham khảo thêm tại <a href="https://www.lazada.vn/helpcenter/la%CC%80m-the%CC%81-na%CC%80o-de%CC%89-tra%CC%89-ha%CC%80ng-tren-lazada.html" target="_self" style="margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; outline: none; color: rgb(0, 72, 62);">đây</a>
                .
            </p>
            <h2 style="margin-bottom: 10px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-weight: 300; font-stretch: inherit; font-size: 24px; line-height: 1.4; font-family: Roboto Condensed, Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0); text-align: justify;">10. Giải quyết tranh chấp</h2>
            <p style="margin-bottom: 8px; padding: 0px 0px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.4; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0); text-align: justify;">
                - Bất kỳ tranh cãi, khiếu nại hoặc tranh chấp phát sinh từ hoặc liên quan đến giao dịch tại Nền Tảng sẽ được giải quyết phù hợp với quy định của pháp luật Việt Nam, vui lòng tham khảo thêm tại <a href="https://hoanghamobile.com/co-che-giai-quyet-tranh-chap-phat-sinh" target="_self" style="margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; outline: none; color: rgb(0, 72, 62);">đây</a>
                .
            </p>
            <p style="margin-bottom: 8px; padding: 0px 0px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.4; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; color: rgb(0, 0, 0); text-align: justify;">
                <span style="margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">
                    <strong>Toàn bộ các điều khoản trên được áp dụng từ ngày 01/01/2012</strong>
                </span>
                
            </p>
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