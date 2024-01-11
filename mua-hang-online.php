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