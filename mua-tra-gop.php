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
    
    
    <title>TPMS - Mua Hàng Trả Góp</title>
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
                    <a itemprop="item" href="mua-tra-gop.php" title="Mua Hàng Gía Rẻ Tại TPMS" class="actived">
                        <span itemprop="name" content="Mua Hàng Trả Góp">Mua Hàng Trả Góp</span>
                    </a>
                    <meta itemprop="position" content="2"/>
                </li>
            </ol>
        </div>
    </section>
        
    <section>
        <div class="container page-text">
            <p dir="ltr" class="tg-p">Để thuận tiện cho việc mua sắm của quý khách, Hoàng Hà Mobile triển khai 2 hình thức hỗ trợ mua trả góp lãi suất 0% với thủ tục đơn giản, thời gian xét duyệt nhanh chóng, chi tiết xem dưới đây:<br></p>
            <h3 class="tg-p">
                <font color="#000000" class="tg-font">
                    <span class="tg-span">I. Trả Góp Qua Công ty tài chính (</span>Home credit, FE Credit ,Shinhan Finance)
                </font>
            </h3>
            <p dir="ltr" class="tg-p1">
                <span class="tg-span">Mua hàng trả góp qua các Công ty tài chính là hình thức mua hàng mà khách hàng vay tiền để mua sản phẩm mà không cần thiết phải thế chấp tài sản nhà đất hoặc xe cộ; không cần công chứng giấy tờ.</span>
            </p>
            <p dir="ltr" class="tg-p1">
                <span class="tg-span">Một số sản phẩm nằm trong danh sách mua trả góp 0% của nhà sản xuất sẽ được Hoàng Hà Mobile hỗ trợ khách hàng mua trả góp qua các công ty tài chính như Home Credit hoặc FE Credit.</span>
            </p>
            <div dir="ltr" style="margin-left:-6pt;" align="left">
                <table style="border:none;border-collapse:collapse;">
                    <colgroup>
                        <col width="314">
                        <col width="314">
                    </colgroup>
                    <tbody>
                        <tr style="height:5.65pt">
                            <td class="tg-td">
                                <p dir="ltr" class="tg-p2">
                                    <span class="tg-span">ƯU ĐIỂM</span>
                                </p>
                            </td>
                            <td class="tg-td">
                                <p dir="ltr" class="tg-p2">
                                    <span class="tg-span">NHƯỢC ĐIỂM</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:48.4pt">
                            <td class="tg-td1">
                                <ul style="margin-top:0;margin-bottom:0;">
                                    <li dir="ltr" class="tg-li">
                                        <p dir="ltr" class="tg-p3" role="presentation">-Giá bán trả góp bằng giá bán trả thẳng</p>
                                        <p dir="ltr" class="tg-p3" role="presentation">
                                            <span class="tg-span1">- Tiết kiệm thời gian</span>
                                        </p>
                                        <p dir="ltr" class="tg-p3" role="presentation">
                                            <span class="tg-span1">
                                                -<span class="tg-span1">Không mất nhiều công sức</span>
                                            </span>
                                        </p>
                                        <p dir="ltr" class="tg-p3" role="presentation">
                                            <span class="tg-span1">
                                                <span class="tg-span1">
                                                    -<span class="tg-span1">Lãi suất cạnh tranh, trả trước cực thấp</span>
                                                </span>
                                            </span>
                                        </p>
                                        <p dir="ltr" class="tg-p3" role="presentation">
                                            <span class="tg-span1">
                                                <span class="tg-span1">
                                                    <span class="tg-span1">
                                                        -<span class="tg-span1">Thủ tục đơn giản</span>
                                                    </span>
                                                </span>
                                            </span>
                                        </p>
                                        <p dir="ltr" class="tg-p3" role="presentation">
                                            <span class="tg-span1">
                                                <span class="tg-span1">
                                                    <span class="tg-span1">
                                                        <span class="tg-span1">
                                                            -<span class="tg-span1">Mở rộng đối tượng từ 19-60 tuổi</span>
                                                        </span>
                                                    </span>
                                                </span>
                                            </span>
                                        </p>
                                        <p dir="ltr" class="tg-p3" role="presentation">
                                            <span class="tg-span1">
                                                <span class="tg-span1">
                                                    <span class="tg-span1">
                                                        <span class="tg-span1">
                                                            <span class="tg-span1">
                                                                -<span class="tg-span1">Tỷ lệ duyệt hồ sơ cao</span>
                                                                <br>
                                                            </span>
                                                        </span>
                                                    </span>
                                                </span>
                                                <br>
                                            </span>
                                            <br>
                                        </p>
                                    </li>
                                </ul>
                            </td>
                            <td class="tg-td1">
                                <ul style="margin-top:0;margin-bottom:0;">
                                    <li dir="ltr" class="tg-li">
                                        <p dir="ltr" class="tg-p3" role="presentation">
                                            <span class="tg-span">- Yêu cầu giấy tờ như Sổ hộ khẩu, GPLX, Bảng lương, Giấy xác nhận địa phương, giấy công tác.... Tùy theo khoản vay và gói sản phẩm của khách.</span>
                                        </p>
                                    </li>
                                    <li dir="ltr" class="tg-li">
                                        <p dir="ltr" class="tg-p3" role="presentation">
                                            <span class="tg-span">- Phải cung cấp số điện thoại người thân.</span>
                                        </p>
                                    </li>
                                    <li dir="ltr" class="tg-li">
                                        <p dir="ltr" class="tg-p3" role="presentation">
                                            <span class="tg-span">- Người mua phải đợi duyệt hồ sơ từ 15-40 phút (Tùy hồ sơ)</span>
                                        </p>
                                    </li>
                                    <li dir="ltr" class="tg-li">
                                        <p dir="ltr" class="tg-p3" role="presentation">
                                            <span class="tg-span">- Có lãi suất (không tính chương trình 0%)</span>
                                        </p>
                                    </li>
                                    <li dir="ltr" class="tg-li">
                                        <p dir="ltr" class="tg-p3" role="presentation">
                                            <span class="tg-span">- Có phí thu hộ hàng tháng</span>
                                        </p>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <p class="MsoNormal"><b>1. Home Credit và FE credit</b></p>
            <p class="MsoNormal"><o:p></o:p></p>
            <p class="MsoNormal">-Hỗ trợ trả góp 0% cho 1 số dòng sản phẩm chọn lọc trong thời gian khuyến mãi với số lượng có hạn<o:p></o:p></p>
            <p class="MsoNormal">-Lãi suất3.5%-4.5%/tháng<o:p></o:p></p>
            <p class="MsoNormal">Thời gian vay linh hoạt<o:p></o:p></p>
            <p class="MsoNormal">-Thời gian thẩm định nhanh<o:p></o:p></p>
            <p class="MsoNormal">-Thủ tục đơn giản ( CCCD/CMT, GPLX)<o:p></o:p></p>
            <p class="MsoNormal">-Hỗ trợ nhiều đối tượng<o:p></o:p></p>
            <p class="MsoNormal"><b>2. Shinhan Finance</b></p>
            <p class="tg-p4">
                <span class="tg-span2"><font color="#ff0000">2.1</font></span>
                <span class="tg-span2">. Chương trình trả góp cho các sản phẩm từ 3 triệu</span>
            </p>
            <p class="tg-p4">-Chương trình trả góp 0% qua Shinhan được áp dụng cho các sản phẩm<span class="Apple-converted-space" class="tg-span4"></span><span class="tg-span3"><span class="tg-span5">iPhone + Laptop + Các sản phẩm giá từ 3 triệu</span></span></p>
            <p class="tg-p4">(Thời gian áp dụng: 6 tháng)</p>
            <table class="tg-table">
                <tbody class="tg-tbody">
                    <tr class="tg-tr">
                        <td class="tg-td2">
                            <span class="tg-span5">Lãi suất ưu đãi/tháng</span>
                        </td>
                        <td class="tg-td2">0%</td>
                        <td class="tg-td2">0%</td>
                        <td class="tg-td2">0,99%</td>
                    </tr>
                    <tr class="tg-tr">
                        <td class="tg-td2">
                            <span class="tg-span5">Gía bán</span>
                        </td>
                        <td class="tg-td2">Trên 25tr</td>
                        <td class="tg-td2">Từ 10-25tr</td>
                        <td class="tg-td2">Từ 3-10tr</td>
                    </tr>
                    <tr class="tg-tr">
                        <td class="tg-td2">
                            <span class="tg-span5">Trả trước bắt buộc</span>
                        </td>
                        <td class="tg-td2">&gt;=55%</td>
                        <td class="tg-td2">30%-50%</td>
                        <td class="tg-td2">10%-30%</td>
                    </tr>
                    <tr class="tg-tr">
                        <td class="tg-td2">
                            <span class="tg-span5">%Phí khoản vay</span>
                        </td>
                        <td class="tg-td2">6%</td>
                        <td class="tg-td2">7%</td>
                        <td class="tg-td2">2%</td>
                    </tr>
                </tbody>
            </table>
            <p class="tg-p4">-Bước 1: Khách hàng mang theo các giấy tờ tùy thân như CCCD/CMT, giấy phép lái xe/sổ hộ khẩu đến các cửa hàng Hoàng Hà Moblie Gần nhất để làm hồ sơ .</p>
            <p class="tg-p4">-Bước 2:Nhân viên tư vẫn trả góp của công ty tài chính sẽ tư vấn cho khách hàng các gói vay phù hợp với điều kiện kinh tế của khách hàng .</p>
            <p class="tg-p4">-Bước 3: Công ty tài chính sẽ thẩm định hồ sơ cho khách hàng và ký hợp đồng ngay tại cửa hàng ( lưu ý : khách cần mang theo giấy tờ gốc để đối chiếu )</p>
            <p class="tg-p4">-Bước 4: Khách hàng ký hợp đồng và làm thủ tục thanh toán , lấy máy tại cửa hàng</p>
            <p class="tg-p4"><b>Điều kiện và giấy tờ gốc cần có</b></p>
            <p class="tg-p4">-Các cá nhân trong độ tuổi từ 19- 70 tuổi ( tính theo ngày tháng năm sinh trên CCCD/CMT)</p>
            <p class="tg-p4">-CCCD/CMT còn hạn sử dụng ( 15 năm kể từ ngày cấp)</p>
            <p class="tg-p4">-Khách hàng đáp ứng đủ điều kện vay và mang đủ giấy tờ</p>
            <p class="tg-p4">-Với khoản vay trên 20 triệu khách cần thêm sổ hộ khẩu/giấy phép lái xe + chứng minh thu nhập</p>
            <p class="tg-p4">2.2.<span class="tg-span6">Chương trình trả góp dành cho các sản phẩm OPPO</span></p>
            <p class="tg-p4"> ​<br class="tg-tbody"></p>
            <p class="tg-p5">
                <span class="tg-span5"><span lang="EN-US" class="tg-span7">1.<span class="tg-span8"></span></span></span>
                <span class="tg-span5"><span lang="EN-US" class="tg-span7">Thời gian áp dụng:<span class="tg-span9">từ 01/09/2023 – 30/09/2023</span></span> </span>
            </p>
            <p class="tg-p5">
                <span class="tg-span5">
                    <span lang="EN-US" class="tg-span7">
                        2.<span class="tg-span8"></span>
                    </span>
                </span>
                <span class="tg-span5">
                    <span lang="EN-US" class="tg-span7">Đối tượng áp dụng:</span>
                </span>
            </p>
            <p class="tg-p6">
                <span lang="EN-US" class="tg-span10">
                    -<span class="tg-span11"></span>
                </span>
                <span lang="EN-US" class="tg-span7">Khách hàng có nhu cầu vay mua sản phẩm OPPO có trong danh mục sản phẩm áp dụng tại hệ thống HOÀNG HÀ MOBILE; và</span>
            </p>
            <p class="tg-p6">
                <span lang="EN-US" class="tg-span10">
                    -<span class="tg-span11"></span>
                </span>
                <span lang="EN-US" class="tg-span7">Thỏa các điều kiện cho vay trả góp của SVFC</span>
            </p>
            <p class="tg-p7">
                <span class="tg-span5">
                    <span lang="EN-US" class="tg-span7">
                        3.<span class="tg-span8"></span>
                    </span>
                </span>
                <span class="tg-span5">
                    <span lang="EN-US" class="tg-span7">Điều khoản và điều kiện</span>
                </span>
            </p>
            <p class="tg-p8">
                <span class="tg-span5">
                    <span lang="EN-US" class="tg-span7">
                        3.1.<span class="tg-span8"></span>
                    </span>
                </span>
                <span class="tg-span5">
                    <span lang="EN-US" class="tg-span7">Danh mục sản phẩm ưu đãi</span>
                </span>
            </p>
            <table border="1" cellspacing="0" cellpadding="0" width="731" class="tg-table1">
                <tbody class="tg-tbody">
                    <tr class="tg-tr">
                        <td width="60" nowrap="" class="tg-td3">
                            <p align="center" class="tg-p9">
                                <span class="tg-span5">
                                    <span lang="EN-US" class="tg-span12">Cửa hàng</span>
                                </span>
                            </p>
                        </td>
                        <td width="145" nowrap="" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: 1pt solid rgb(191, 191, 191); border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background: rgb(217, 226, 243); width: 108.5pt; height: 23.8pt;">
                            <p align="center" class="tg-p9">
                                <span class="tg-span5">
                                    <span lang="EN-US" class="tg-span12">Model</span>
                                </span>
                            </p>
                        </td>
                        <td width="125" nowrap="" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: 1pt solid rgb(191, 191, 191); border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background: rgb(217, 226, 243); width: 94pt; height: 23.8pt;">
                            <p align="center" class="tg-p9">
                                <span class="tg-span5">
                                    <span lang="EN-US" class="tg-span12">Product code</span>
                                </span>
                            </p>
                        </td>
                        <td width="72" nowrap="" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: 1pt solid rgb(191, 191, 191); border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background: rgb(217, 226, 243); width: 54pt; height: 23.8pt;">
                            <p align="center" class="tg-p9">
                                <span class="tg-span5">
                                    <span lang="EN-US" class="tg-span12">Giá thấp nhất</span>
                                </span>
                            </p>
                        </td>
                        <td width="84" nowrap="" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: 1pt solid rgb(191, 191, 191); border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background: rgb(217, 226, 243); width: 63.05pt; height: 23.8pt;">
                            <p align="center" class="tg-p9">
                                <span class="tg-span5">
                                    <span lang="EN-US" class="tg-span12">Giá cao nhất</span>
                                </span>
                                <span class="tg-span5"></span>
                            </p>
                        </td>
                        <td width="73" nowrap="" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: 1pt solid rgb(191, 191, 191); border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background: rgb(217, 226, 243); width: 54.45pt; height: 23.8pt;">
                            <p align="center" class="tg-p9">
                                <span class="tg-span5">
                                    <span lang="EN-US" class="tg-span12">Trả trước</span>
                                </span>
                                <span class="tg-span5"></span>
                            </p>
                        </td>
                        <td width="82" nowrap="" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: 1pt solid rgb(191, 191, 191); border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background: rgb(217, 226, 243); width: 61.85pt; height: 23.8pt;">
                            <p align="center" class="tg-p9">
                                <span class="tg-span5">
                                    <span lang="EN-US" class="tg-span12">Kỳ hạn vay</span>
                                </span>
                                <span class="tg-span5"></span>
                            </p>
                        </td>
                        <td width="89" nowrap="" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: 1pt solid rgb(191, 191, 191); border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background: rgb(217, 226, 243); width: 67.05pt; height: 23.8pt;">
                            <p align="center" class="tg-p9">
                                <span class="tg-span5">
                                    <span lang="EN-US" class="tg-span12">Lãi suất</span>
                                </span>
                                <span class="tg-span5"></span>
                            </p>
                        </td>
                    </tr>
                    <tr style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; border: 1px solid rgb(239, 239, 239); height: 14.5pt;">
                        <td width="60" nowrap="" rowspan="23" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: 1pt solid rgb(191, 191, 191); border-image: initial; background-clip: padding-box; width: 45pt; height: 14.5pt;">
                            <p align="center" class="tg-p9">
                                <span class="tg-span5">
                                    <span lang="EN-US" class="tg-span12">Hoàng Hà Mobile</span>
                                </span>
                            </p>
                        </td>
                        <td width="145" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background: rgb(237, 237, 237); width: 108.5pt; height: 14.5pt;">
                            <p style="margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; line-height: normal;">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: black; display: inline; vertical-align: baseline;">A17K</span>
                            </p>
                        </td>
                        <td width="125" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background: rgb(237, 237, 237); width: 94pt; height: 14.5pt;">
                            <p style="margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; line-height: normal;">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: black; display: inline; vertical-align: baseline;">CPH2471</span>
                            </p>
                        </td>
                        <td width="72" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background: rgb(237, 237, 237); width: 54pt; height: 14.5pt;">
                            <p align="center" style="margin-top: 0cm; margin-right: -5pt; margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; text-align: center; line-height: normal;">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: black; display: inline; vertical-align: baseline;">2,990,000</span>
                            </p>
                        </td>
                        <td width="84" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background: rgb(237, 237, 237); width: 63.05pt; height: 14.5pt;">
                            <p align="center" style="margin-top: 0cm; margin-right: -5pt; margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; text-align: center; line-height: normal;">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: black; display: inline; vertical-align: baseline;">3,290,000</span>
                            </p>
                        </td>
                        <td width="73" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background: rgb(237, 237, 237); width: 54.45pt; height: 14.5pt;">
                            <p align="center" class="tg-p9">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: black; display: inline; vertical-align: baseline;">20%</span>
                            </p>
                        </td>
                        <td width="82" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background: rgb(237, 237, 237); width: 61.85pt; height: 14.5pt;">
                            <p align="center" class="tg-p9">
                                <span lang="EN-US" class="tg-span12">6</span>
                            </p>
                        </td>
                        <td width="89" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background: rgb(237, 237, 237); width: 67.05pt; height: 14.5pt;">
                            <p align="center" class="tg-p9">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: black; display: inline; vertical-align: baseline;">0.99%</span>
                            </p>
                        </td>
                    </tr>
                    <tr style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; border: 1px solid rgb(239, 239, 239); height: 14.5pt;">
                        <td width="145" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background: rgb(237, 237, 237); width: 108.5pt; height: 14.5pt;">
                            <p style="margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; line-height: normal;">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: black; display: inline; vertical-align: baseline;">A17K</span>
                            </p>
                        </td>
                        <td width="125" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background: rgb(237, 237, 237); width: 94pt; height: 14.5pt;">
                            <p style="margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; line-height: normal;">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: black; display: inline; vertical-align: baseline;">CPH2471</span>
                            </p>
                        </td>
                        <td width="72" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background: rgb(237, 237, 237); width: 54pt; height: 14.5pt;">
                            <p align="center" style="margin-top: 0cm; margin-right: -5pt; margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; text-align: center; line-height: normal;">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: black; display: inline; vertical-align: baseline;">2,990,000</span>
                            </p>
                        </td>
                        <td width="84" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background: rgb(237, 237, 237); width: 63.05pt; height: 14.5pt;">
                            <p align="center" style="margin-top: 0cm; margin-right: -5pt; margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; text-align: center; line-height: normal;">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: black; display: inline; vertical-align: baseline;">3,290,000</span>
                            </p>
                        </td>
                        <td width="73" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background: rgb(237, 237, 237); width: 54.45pt; height: 14.5pt;">
                            <p align="center" class="tg-p9">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: black; display: inline; vertical-align: baseline;">30%</span>
                            </p>
                        </td>
                        <td width="82" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background: rgb(237, 237, 237); width: 61.85pt; height: 14.5pt;">
                            <p align="center" class="tg-p9">
                                <span lang="EN-US" class="tg-span12">6</span>
                            </p>
                        </td>
                        <td width="89" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background: rgb(237, 237, 237); width: 67.05pt; height: 14.5pt;">
                            <p align="center" class="tg-p9">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: black; display: inline; vertical-align: baseline;">0.99%</span>
                            </p>
                        </td>
                    </tr>
                    <tr style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; border: 1px solid rgb(239, 239, 239); height: 14.5pt;">
                        <td width="145" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background: rgb(237, 237, 237); width: 108.5pt; height: 14.5pt;">
                            <p style="margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; line-height: normal;">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: black; display: inline; vertical-align: baseline;">A17</span>
                            </p>
                        </td>
                        <td width="125" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background: rgb(237, 237, 237); width: 94pt; height: 14.5pt;">
                            <p style="margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; line-height: normal;">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: black; display: inline; vertical-align: baseline;">CPH2477</span>
                            </p>
                        </td>
                        <td width="72" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background: rgb(237, 237, 237); width: 54pt; height: 14.5pt;">
                            <p align="center" style="margin-top: 0cm; margin-right: -5pt; margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; text-align: center; line-height: normal;">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: black; display: inline; vertical-align: baseline;">3,690,000</span>
                            </p>
                        </td>
                        <td width="84" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background: rgb(237, 237, 237); width: 63.05pt; height: 14.5pt;">
                            <p align="center" style="margin-top: 0cm; margin-right: -5pt; margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; text-align: center; line-height: normal;">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: black; display: inline; vertical-align: baseline;">3,990,000</span>
                            </p>
                        </td>
                        <td width="73" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background: rgb(237, 237, 237); width: 54.45pt; height: 14.5pt;">
                            <p align="center" class="tg-p9">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: black; display: inline; vertical-align: baseline;">20%</span>
                            </p>
                        </td>
                        <td width="82" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background: rgb(237, 237, 237); width: 61.85pt; height: 14.5pt;">
                            <p align="center" class="tg-p9">
                                <span lang="EN-US" class="tg-span12">6</span>
                            </p>
                        </td>
                        <td width="89" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background: rgb(237, 237, 237); width: 67.05pt; height: 14.5pt;">
                            <p align="center" class="tg-p9">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: black; display: inline; vertical-align: baseline;">0.99%</span>
                            </p>
                        </td>
                    </tr>
                    <tr style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; border: 1px solid rgb(239, 239, 239); height: 14.5pt;">
                        <td width="145" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background: rgb(237, 237, 237); width: 108.5pt; height: 14.5pt;">
                            <p style="margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; line-height: normal;">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: black; display: inline; vertical-align: baseline;">A17</span>
                            </p>
                        </td>
                        <td width="125" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background: rgb(237, 237, 237); width: 94pt; height: 14.5pt;">
                            <p style="margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; line-height: normal;">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: black; display: inline; vertical-align: baseline;">CPH2477</span>
                            </p>
                        </td>
                        <td width="72" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background: rgb(237, 237, 237); width: 54pt; height: 14.5pt;">
                            <p align="center" style="margin-top: 0cm; margin-right: -5pt; margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; text-align: center; line-height: normal;">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: black; display: inline; vertical-align: baseline;">3,690,000</span>
                            </p>
                        </td>
                        <td width="84" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background: rgb(237, 237, 237); width: 63.05pt; height: 14.5pt;">
                            <p align="center" style="margin-top: 0cm; margin-right: -5pt; margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; text-align: center; line-height: normal;">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: black; display: inline; vertical-align: baseline;">3,990,000</span>
                            </p>
                        </td>
                        <td width="73" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background: rgb(237, 237, 237); width: 54.45pt; height: 14.5pt;">
                            <p align="center" class="tg-p9">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: black; display: inline; vertical-align: baseline;">30%</span>
                            </p>
                        </td>
                        <td width="82" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background: rgb(237, 237, 237); width: 61.85pt; height: 14.5pt;">
                            <p align="center" class="tg-p9">
                                <span lang="EN-US" class="tg-span12">6</span>
                            </p>
                        </td>
                        <td width="89" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background: rgb(237, 237, 237); width: 67.05pt; height: 14.5pt;">
                            <p align="center" class="tg-p9">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: black; display: inline; vertical-align: baseline;">0.99%</span>
                            </p>
                        </td>
                    </tr>
                    <tr style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; border: 1px solid rgb(239, 239, 239); height: 14.5pt;">
                        <td width="145" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background: rgb(237, 237, 237); width: 108.5pt; height: 14.5pt;">
                            <p style="margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; line-height: normal;">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: black; display: inline; vertical-align: baseline;">A57 128GB</span>
                            </p>
                        </td>
                        <td width="125" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background: rgb(237, 237, 237); width: 94pt; height: 14.5pt;">
                            <p style="margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; line-height: normal;">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: black; display: inline; vertical-align: baseline;">CPH2407</span>
                            </p>
                        </td>
                        <td width="72" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background: rgb(237, 237, 237); width: 54pt; height: 14.5pt;">
                            <p align="center" style="margin-top: 0cm; margin-right: -5pt; margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; text-align: center; line-height: normal;">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: black; display: inline; vertical-align: baseline;">4,190,000</span>
                            </p>
                        </td>
                        <td width="84" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background: rgb(237, 237, 237); width: 63.05pt; height: 14.5pt;">
                            <p align="center" style="margin-top: 0cm; margin-right: -5pt; margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; text-align: center; line-height: normal;">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: black; display: inline; vertical-align: baseline;">4,990,000</span>
                            </p>
                        </td>
                        <td width="73" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background: rgb(237, 237, 237); width: 54.45pt; height: 14.5pt;">
                            <p align="center" class="tg-p9">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: black; display: inline; vertical-align: baseline;">20%</span>
                            </p>
                        </td>
                        <td width="82" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background: rgb(237, 237, 237); width: 61.85pt; height: 14.5pt;">
                            <p align="center" class="tg-p9">
                                <span lang="EN-US" class="tg-span12">6</span>
                            </p>
                        </td>
                        <td width="89" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background: rgb(237, 237, 237); width: 67.05pt; height: 14.5pt;">
                            <p align="center" class="tg-p9">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: black; display: inline; vertical-align: baseline;">0.99%</span>
                            </p>
                        </td>
                    </tr>
                    <tr style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; border: 1px solid rgb(239, 239, 239); height: 14.5pt;">
                        <td width="145" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background: rgb(237, 237, 237); width: 108.5pt; height: 14.5pt;">
                            <p style="margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; line-height: normal;">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: black; display: inline; vertical-align: baseline;">A57 128GB</span>
                            </p>
                        </td>
                        <td width="125" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background: rgb(237, 237, 237); width: 94pt; height: 14.5pt;">
                            <p style="margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; line-height: normal;">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: black; display: inline; vertical-align: baseline;">CPH2407</span>
                            </p>
                        </td>
                        <td width="72" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background: rgb(237, 237, 237); width: 54pt; height: 14.5pt;">
                            <p align="center" style="margin-top: 0cm; margin-right: -5pt; margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; text-align: center; line-height: normal;">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: black; display: inline; vertical-align: baseline;">4,190,000</span>
                            </p>
                        </td>
                        <td width="84" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background: rgb(237, 237, 237); width: 63.05pt; height: 14.5pt;">
                            <p align="center" style="margin-top: 0cm; margin-right: -5pt; margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; text-align: center; line-height: normal;">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: black; display: inline; vertical-align: baseline;">4,990,000</span>
                            </p>
                        </td>
                        <td width="73" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background: rgb(237, 237, 237); width: 54.45pt; height: 14.5pt;">
                            <p align="center" class="tg-p9">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: black; display: inline; vertical-align: baseline;">30%</span>
                            </p>
                        </td>
                        <td width="82" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background: rgb(237, 237, 237); width: 61.85pt; height: 14.5pt;">
                            <p align="center" class="tg-p9">
                                <span lang="EN-US" class="tg-span12">6</span>
                            </p>
                        </td>
                        <td width="89" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background: rgb(237, 237, 237); width: 67.05pt; height: 14.5pt;">
                            <p align="center" class="tg-p9">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: black; display: inline; vertical-align: baseline;">0.99%</span>
                            </p>
                        </td>
                    </tr>
                    <tr style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; border: 1px solid rgb(239, 239, 239); height: 14.5pt;">
                        <td width="145" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background: rgb(237, 237, 237); width: 108.5pt; height: 14.5pt;">
                            <p style="margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; line-height: normal;">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: black; display: inline; vertical-align: baseline;">A58 6GB</span>
                            </p>
                        </td>
                        <td width="125" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background: rgb(237, 237, 237); width: 94pt; height: 14.5pt;">
                            <p style="margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; line-height: normal;">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: black; display: inline; vertical-align: baseline;">CPH2577-6GB</span>
                            </p>
                        </td>
                        <td width="72" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background: rgb(237, 237, 237); width: 54pt; height: 14.5pt;">
                            <p align="center" style="margin-top: 0cm; margin-right: -5pt; margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; text-align: center; line-height: normal;">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: black; display: inline; vertical-align: baseline;">4,690,000</span>
                            </p>
                        </td>
                        <td width="84" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background: rgb(237, 237, 237); width: 63.05pt; height: 14.5pt;">
                            <p align="center" style="margin-top: 0cm; margin-right: -5pt; margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; text-align: center; line-height: normal;">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: black; display: inline; vertical-align: baseline;">4,990,000</span>
                            </p>
                        </td>
                        <td width="73" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background: rgb(237, 237, 237); width: 54.45pt; height: 14.5pt;">
                            <p align="center" class="tg-p9">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: black; display: inline; vertical-align: baseline;">20%</span>
                            </p>
                        </td>
                        <td width="82" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background: rgb(237, 237, 237); width: 61.85pt; height: 14.5pt;">
                            <p align="center" class="tg-p9">
                                <span lang="EN-US" class="tg-span12">6</span>
                            </p>
                        </td>
                        <td width="89" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background: rgb(237, 237, 237); width: 67.05pt; height: 14.5pt;">
                            <p align="center" class="tg-p9">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: black; display: inline; vertical-align: baseline;">0.99%</span>
                            </p>
                        </td>
                    </tr>
                    <tr style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; border: 1px solid rgb(239, 239, 239); height: 14.5pt;">
                        <td width="145" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background: rgb(237, 237, 237); width: 108.5pt; height: 14.5pt;">
                            <p style="margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; line-height: normal;">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: black; display: inline; vertical-align: baseline;">A58 6GB</span>
                            </p>
                        </td>
                        <td width="125" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background: rgb(237, 237, 237); width: 94pt; height: 14.5pt;">
                            <p style="margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; line-height: normal;">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: black; display: inline; vertical-align: baseline;">CPH2577-6GB</span>
                            </p>
                        </td>
                        <td width="72" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background: rgb(237, 237, 237); width: 54pt; height: 14.5pt;">
                            <p align="center" style="margin-top: 0cm; margin-right: -5pt; margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; text-align: center; line-height: normal;">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: black; display: inline; vertical-align: baseline;">4,690,000</span>
                            </p>
                        </td>
                        <td width="84" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background: rgb(237, 237, 237); width: 63.05pt; height: 14.5pt;">
                            <p align="center" style="margin-top: 0cm; margin-right: -5pt; margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; text-align: center; line-height: normal;">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: black; display: inline; vertical-align: baseline;">4,990,000</span>
                            </p>
                        </td>
                        <td width="73" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background: rgb(237, 237, 237); width: 54.45pt; height: 14.5pt;">
                            <p align="center" class="tg-p9">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: black; display: inline; vertical-align: baseline;">30%</span>
                            </p>
                        </td>
                        <td width="82" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background: rgb(237, 237, 237); width: 61.85pt; height: 14.5pt;">
                            <p align="center" class="tg-p9">
                                <span lang="EN-US" class="tg-span12">6</span>
                            </p>
                        </td>
                        <td width="89" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background: rgb(237, 237, 237); width: 67.05pt; height: 14.5pt;">
                            <p align="center" class="tg-p9">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: black; display: inline; vertical-align: baseline;">0.99%</span>
                            </p>
                        </td>
                    </tr>
                    <tr style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; border: 1px solid rgb(239, 239, 239); height: 14.5pt;">
                        <td width="145" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 108.5pt; height: 14.5pt;">
                            <p style="margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; line-height: normal;">
                                <span lang="EN-US" class="tg-span12">OPPO Pad Air</span>
                            </p>
                        </td>
                        <td width="125" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 94pt; height: 14.5pt;">
                            <p style="margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; line-height: normal;">
                                <span lang="EN-US" class="tg-span12">OPD2102A</span>
                            </p>
                        </td>
                        <td width="72" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 54pt; height: 14.5pt;">
                            <p align="center" style="margin-top: 0cm; margin-right: -5pt; margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; text-align: center; line-height: normal;">
                                <span lang="EN-US" class="tg-span12">5,690,000</span>
                            </p>
                        </td>
                        <td width="84" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 63.05pt; height: 14.5pt;">
                            <p align="center" style="margin-top: 0cm; margin-right: -5pt; margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; text-align: center; line-height: normal;">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: Segoe UI, sans-serif; font-size: 10pt; color: inherit; display: inline; vertical-align: baseline;">6,690,000</span>
                            </p>
                        </td>
                        <td width="73" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 54.45pt; height: 14.5pt;">
                            <p align="center" class="tg-p9">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: Segoe UI, sans-serif; font-size: 10pt; color: inherit; display: inline; vertical-align: baseline;">30%</span>
                            </p>
                        </td>
                        <td width="82" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 61.85pt; height: 14.5pt;">
                            <p align="center" class="tg-p9">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: Segoe UI, sans-serif; font-size: 10pt; color: inherit; display: inline; vertical-align: baseline;">6</span>
                            </p>
                        </td>
                        <td width="89" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 67.05pt; height: 14.5pt;">
                            <p align="center" class="tg-p9">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: Segoe UI, sans-serif; font-size: 10pt; color: inherit; display: inline; vertical-align: baseline;">0.00%</span>
                            </p>
                        </td>
                    </tr>
                    <tr style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; border: 1px solid rgb(239, 239, 239); height: 14.5pt;">
                        <td width="145" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 108.5pt; height: 14.5pt;">
                            <p style="margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; line-height: normal;">
                                <span lang="EN-US" class="tg-span12">OPPO Pad Air 128GB</span>
                            </p>
                        </td>
                        <td width="125" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 94pt; height: 14.5pt;">
                            <p style="margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; line-height: normal;">
                                <span lang="EN-US" class="tg-span12">OPD2102A-128GB</span>
                            </p>
                        </td>
                        <td width="72" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 54pt; height: 14.5pt;">
                            <p align="center" style="margin-top: 0cm; margin-right: -5pt; margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; text-align: center; line-height: normal;">
                                <span lang="EN-US" class="tg-span12">6,990,000</span>
                            </p>
                        </td>
                        <td width="84" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 63.05pt; height: 14.5pt;">
                            <p align="center" style="margin-top: 0cm; margin-right: -5pt; margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; text-align: center; line-height: normal;">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: Segoe UI, sans-serif; font-size: 10pt; color: inherit; display: inline; vertical-align: baseline;">7,990,000</span>
                            </p>
                        </td>
                        <td width="73" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 54.45pt; height: 14.5pt;">
                            <p align="center" class="tg-p9">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: Segoe UI, sans-serif; font-size: 10pt; color: inherit; display: inline; vertical-align: baseline;">30%</span>
                            </p>
                        </td>
                        <td width="82" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 61.85pt; height: 14.5pt;">
                            <p align="center" class="tg-p9">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: Segoe UI, sans-serif; font-size: 10pt; color: inherit; display: inline; vertical-align: baseline;">6</span>
                            </p>
                        </td>
                        <td width="89" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 67.05pt; height: 14.5pt;">
                            <p align="center" class="tg-p9">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: Segoe UI, sans-serif; font-size: 10pt; color: inherit; display: inline; vertical-align: baseline;">0.00%</span>
                            </p>
                        </td>
                    </tr>
                    <tr style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; border: 1px solid rgb(239, 239, 239); height: 14.5pt;">
                        <td width="145" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 108.5pt; height: 14.5pt;">
                            <p style="margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; line-height: normal;">
                                <span lang="EN-US" class="tg-span12">A77s</span>
                            </p>
                        </td>
                        <td width="125" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 94pt; height: 14.5pt;">
                            <p style="margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; line-height: normal;">
                                <span lang="EN-US" class="tg-span12">CPH2473</span>
                            </p>
                        </td>
                        <td width="72" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 54pt; height: 14.5pt;">
                            <p align="center" style="margin-top: 0cm; margin-right: -5pt; margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; text-align: center; line-height: normal;">
                                <span lang="EN-US" class="tg-span12">5,000,000</span>
                            </p>
                        </td>
                        <td width="84" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 63.05pt; height: 14.5pt;">
                            <p align="center" style="margin-top: 0cm; margin-right: -5pt; margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; text-align: center; line-height: normal;">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: Segoe UI, sans-serif; font-size: 10pt; color: inherit; display: inline; vertical-align: baseline;">6,290,000</span>
                            </p>
                        </td>
                        <td width="73" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 54.45pt; height: 14.5pt;">
                            <p align="center" class="tg-p9">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: Segoe UI, sans-serif; font-size: 10pt; color: inherit; display: inline; vertical-align: baseline;">30%</span>
                            </p>
                        </td>
                        <td width="82" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 61.85pt; height: 14.5pt;">
                            <p align="center" class="tg-p9">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: Segoe UI, sans-serif; font-size: 10pt; color: inherit; display: inline; vertical-align: baseline;">6</span>
                            </p>
                        </td>
                        <td width="89" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 67.05pt; height: 14.5pt;">
                            <p align="center" class="tg-p9">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: Segoe UI, sans-serif; font-size: 10pt; color: inherit; display: inline; vertical-align: baseline;">0.00%</span>
                            </p>
                        </td>
                    </tr>
                    <tr style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; border: 1px solid rgb(239, 239, 239); height: 14.5pt;">
                        <td width="145" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 108.5pt; height: 14.5pt;">
                            <p style="margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; line-height: normal;">
                                <span lang="EN-US" class="tg-span12">A78</span>
                            </p>
                        </td>
                        <td width="125" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 94pt; height: 14.5pt;">
                            <p style="margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; line-height: normal;">
                                <span lang="EN-US" class="tg-span12">CPH2565</span>
                            </p>
                        </td>
                        <td width="72" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 54pt; height: 14.5pt;">
                            <p align="center" style="margin-top: 0cm; margin-right: -5pt; margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; text-align: center; line-height: normal;">
                                <span lang="EN-US" class="tg-span12">6,190,000</span>
                            </p>
                        </td>
                        <td width="84" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 63.05pt; height: 14.5pt;">
                            <p align="center" style="margin-top: 0cm; margin-right: -5pt; margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; text-align: center; line-height: normal;">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: Segoe UI, sans-serif; font-size: 10pt; color: inherit; display: inline; vertical-align: baseline;">6,990,000</span>
                            </p>
                        </td>
                        <td width="73" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 54.45pt; height: 14.5pt;">
                            <p align="center" class="tg-p9">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: Segoe UI, sans-serif; font-size: 10pt; color: inherit; display: inline; vertical-align: baseline;">30%</span>
                            </p>
                        </td>
                        <td width="82" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 61.85pt; height: 14.5pt;">
                            <p align="center" class="tg-p9">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: Segoe UI, sans-serif; font-size: 10pt; color: inherit; display: inline; vertical-align: baseline;">6</span>
                            </p>
                        </td>
                        <td width="89" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 67.05pt; height: 14.5pt;">
                            <p align="center" class="tg-p9">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: Segoe UI, sans-serif; font-size: 10pt; color: inherit; display: inline; vertical-align: baseline;">0.00%</span>
                            </p>
                        </td>
                    </tr>
                    <tr style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; border: 1px solid rgb(239, 239, 239); height: 14.5pt;">
                        <td width="145" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 108.5pt; height: 14.5pt;">
                            <p style="margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; line-height: normal;">
                                <span lang="EN-US" class="tg-span12">A96</span>
                            </p>
                        </td>
                        <td width="125" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 94pt; height: 14.5pt;">
                            <p style="margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; line-height: normal;">
                                <span lang="EN-US" class="tg-span12">CPH2333</span>
                            </p>
                        </td>
                        <td width="72" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 54pt; height: 14.5pt;">
                            <p align="center" style="margin-top: 0cm; margin-right: -5pt; margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; text-align: center; line-height: normal;">
                                <span lang="EN-US" class="tg-span12">5,000,000</span>
                            </p>
                        </td>
                        <td width="84" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 63.05pt; height: 14.5pt;">
                            <p align="center" style="margin-top: 0cm; margin-right: -5pt; margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; text-align: center; line-height: normal;">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: Segoe UI, sans-serif; font-size: 10pt; color: inherit; display: inline; vertical-align: baseline;">6,990,000</span>
                            </p>
                        </td>
                        <td width="73" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 54.45pt; height: 14.5pt;">
                            <p align="center" class="tg-p9">
                                <span lang="EN-US" class="tg-span12">30%</span>
                            </p>
                        </td>
                        <td width="82" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 61.85pt; height: 14.5pt;">
                            <p align="center" class="tg-p9">
                                <span lang="EN-US" class="tg-span12">6</span>
                            </p>
                        </td>
                        <td width="89" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 67.05pt; height: 14.5pt;">
                            <p align="center" class="tg-p9">
                                <span lang="EN-US" class="tg-span12">0.00%</span>
                            </p>
                        </td>
                    </tr>
                    <tr style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; border: 1px solid rgb(239, 239, 239); height: 14.5pt;">
                        <td width="145" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 108.5pt; height: 14.5pt;">
                            <p style="margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; line-height: normal;">
                                <span lang="EN-US" class="tg-span12">Reno8 T</span>
                            </p>
                        </td>
                        <td width="125" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 94pt; height: 14.5pt;">
                            <p style="margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; line-height: normal;">
                                <span lang="EN-US" class="tg-span12">CPH2481</span>
                            </p>
                        </td>
                        <td width="72" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 54pt; height: 14.5pt;">
                            <p align="center" style="margin-top: 0cm; margin-right: -5pt; margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; text-align: center; line-height: normal;">
                                <span lang="EN-US" class="tg-span12">7,490,000</span>
                            </p>
                        </td>
                        <td width="84" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 63.05pt; height: 14.5pt;">
                            <p align="center" style="margin-top: 0cm; margin-right: -5pt; margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; text-align: center; line-height: normal;">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: Segoe UI, sans-serif; font-size: 10pt; color: inherit; display: inline; vertical-align: baseline;">8,490,000</span>
                            </p>
                        </td>
                        <td width="73" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 54.45pt; height: 14.5pt;">
                            <p align="center" class="tg-p9">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: Segoe UI, sans-serif; font-size: 10pt; color: inherit; display: inline; vertical-align: baseline;">30%</span>
                            </p>
                        </td>
                        <td width="82" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 61.85pt; height: 14.5pt;">
                            <p align="center" class="tg-p9">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: Segoe UI, sans-serif; font-size: 10pt; color: inherit; display: inline; vertical-align: baseline;">6</span>
                            </p>
                        </td>
                        <td width="89" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 67.05pt; height: 14.5pt;">
                            <p align="center" class="tg-p9">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: Segoe UI, sans-serif; font-size: 10pt; color: inherit; display: inline; vertical-align: baseline;">0.00%</span>
                            </p>
                        </td>
                    </tr>
                    <tr style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; border: 1px solid rgb(239, 239, 239); height: 14.5pt;">
                        <td width="145" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 108.5pt; height: 14.5pt;">
                            <p style="margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; line-height: normal;">
                                <span lang="EN-US" class="tg-span12">Reno7 Z</span>
                            </p>
                        </td>
                        <td width="125" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 94pt; height: 14.5pt;">
                            <p style="margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; line-height: normal;">
                                <span lang="EN-US" class="tg-span12">CPH2343</span>
                            </p>
                        </td>
                        <td width="72" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 54pt; height: 14.5pt;">
                            <p align="center" style="margin-top: 0cm; margin-right: -5pt; margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; text-align: center; line-height: normal;">
                                <span lang="EN-US" class="tg-span12">5,000,000</span>
                            </p>
                        </td>
                        <td width="84" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 63.05pt; height: 14.5pt;">
                            <p align="center" style="margin-top: 0cm; margin-right: -5pt; margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; text-align: center; line-height: normal;">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: Segoe UI, sans-serif; font-size: 10pt; color: inherit; display: inline; vertical-align: baseline;">9,990,000</span>
                            </p>
                        </td>
                        <td width="73" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 54.45pt; height: 14.5pt;">
                            <p align="center" class="tg-p9">
                                <span lang="EN-US" class="tg-span12">30%</span>
                            </p>
                        </td>
                        <td width="82" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 61.85pt; height: 14.5pt;">
                            <p align="center" class="tg-p9">
                                <span lang="EN-US" class="tg-span12">6</span>
                            </p>
                        </td>
                        <td width="89" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 67.05pt; height: 14.5pt;">
                            <p align="center" class="tg-p9">
                                <span lang="EN-US" class="tg-span12">0.00%</span>
                            </p>
                        </td>
                    </tr>
                    <tr style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; border: 1px solid rgb(239, 239, 239); height: 14.5pt;">
                        <td width="145" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 108.5pt; height: 14.5pt;">
                            <p style="margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; line-height: normal;">
                                <span lang="EN-US" class="tg-span12">Reno8 T 5G 128GB</span>
                            </p>
                        </td>
                        <td width="125" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 94pt; height: 14.5pt;">
                            <p style="margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; line-height: normal;">
                                <span lang="EN-US" class="tg-span12">CPH2505-128GB</span>
                            </p>
                        </td>
                        <td width="72" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 54pt; height: 14.5pt;">
                            <p align="center" style="margin-top: 0cm; margin-right: -5pt; margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; text-align: center; line-height: normal;">
                                <span lang="EN-US" class="tg-span12">8,290,000</span>
                            </p>
                        </td>
                        <td width="84" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 63.05pt; height: 14.5pt;">
                            <p align="center" style="margin-top: 0cm; margin-right: -5pt; margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; text-align: center; line-height: normal;">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: Segoe UI, sans-serif; font-size: 10pt; color: inherit; display: inline; vertical-align: baseline;">9,990,000</span>
                            </p>
                        </td>
                        <td width="73" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 54.45pt; height: 14.5pt;">
                            <p align="center" class="tg-p9">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: Segoe UI, sans-serif; font-size: 10pt; color: inherit; display: inline; vertical-align: baseline;">30%</span>
                            </p>
                        </td>
                        <td width="82" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 61.85pt; height: 14.5pt;">
                            <p align="center" class="tg-p9">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: Segoe UI, sans-serif; font-size: 10pt; color: inherit; display: inline; vertical-align: baseline;">6</span>
                            </p>
                        </td>
                        <td width="89" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 67.05pt; height: 14.5pt;">
                            <p align="center" class="tg-p9">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: Segoe UI, sans-serif; font-size: 10pt; color: inherit; display: inline; vertical-align: baseline;">0.00%</span>
                            </p>
                        </td>
                    </tr>
                    <tr style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; border: 1px solid rgb(239, 239, 239); height: 14.5pt;">
                        <td width="145" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 108.5pt; height: 14.5pt;">
                            <p style="margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; line-height: normal;">
                                <span lang="EN-US" class="tg-span12">Reno7 5G</span>
                            </p>
                        </td>
                        <td width="125" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 94pt; height: 14.5pt;">
                            <p style="margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; line-height: normal;">
                                <span lang="EN-US" class="tg-span12">CPH2371</span>
                            </p>
                        </td>
                        <td width="72" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 54pt; height: 14.5pt;">
                            <p align="center" style="margin-top: 0cm; margin-right: -5pt; margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; text-align: center; line-height: normal;">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: Segoe UI, sans-serif; font-size: 10pt; color: inherit; display: inline; vertical-align: baseline;">5,000,000</span>
                            </p>
                        </td>
                        <td width="84" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 63.05pt; height: 14.5pt;">
                            <p align="center" style="margin-top: 0cm; margin-right: -5pt; margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; text-align: center; line-height: normal;">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: Segoe UI, sans-serif; font-size: 10pt; color: inherit; display: inline; vertical-align: baseline;">9,990,000</span>
                            </p>
                        </td>
                        <td width="73" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 54.45pt; height: 14.5pt;">
                            <p align="center" class="tg-p9">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: Segoe UI, sans-serif; font-size: 10pt; color: inherit; display: inline; vertical-align: baseline;">30%</span>
                            </p>
                        </td>
                        <td width="82" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 61.85pt; height: 14.5pt;">
                            <p align="center" class="tg-p9">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: Segoe UI, sans-serif; font-size: 10pt; color: inherit; display: inline; vertical-align: baseline;">6</span>
                            </p>
                        </td>
                        <td width="89" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 67.05pt; height: 14.5pt;">
                            <p align="center" class="tg-p9">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: Segoe UI, sans-serif; font-size: 10pt; color: inherit; display: inline; vertical-align: baseline;">0.00%</span>
                            </p>
                        </td>
                    </tr>
                    <tr style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; border: 1px solid rgb(239, 239, 239); height: 14.5pt;">
                        <td width="145" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 108.5pt; height: 14.5pt;">
                            <p style="margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; line-height: normal;">
                                <span class="tg-span5">
                                    <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: Segoe UI, sans-serif; font-size: 10pt; color: rgb(156, 0, 6); display: inline; vertical-align: baseline;">Reno10 5G 256GB</span>
                                </span>
                            </p>
                        </td>
                        <td width="125" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 94pt; height: 14.5pt;">
                            <p style="margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; line-height: normal;">
                                <span lang="EN-US" class="tg-span12">CPH2531-256GB</span>
                            </p>
                        </td>
                        <td width="72" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 54pt; height: 14.5pt;">
                            <p align="center" style="margin-top: 0cm; margin-right: -5pt; margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; text-align: center; line-height: normal;">
                                <span lang="EN-US" class="tg-span12">9,790,000</span>
                            </p>
                        </td>
                        <td width="84" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 63.05pt; height: 14.5pt;">
                            <p align="center" style="margin-top: 0cm; margin-right: -5pt; margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; text-align: center; line-height: normal;">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: Segoe UI, sans-serif; font-size: 10pt; color: inherit; display: inline; vertical-align: baseline;">10,000,000</span>
                            </p>
                        </td>
                        <td width="73" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 54.45pt; height: 14.5pt;">
                            <p align="center" class="tg-p9">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: Segoe UI, sans-serif; font-size: 10pt; color: inherit; display: inline; vertical-align: baseline;">30%</span>
                            </p>
                        </td>
                        <td width="82" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 61.85pt; height: 14.5pt;">
                            <p align="center" class="tg-p9">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: Segoe UI, sans-serif; font-size: 10pt; color: inherit; display: inline; vertical-align: baseline;">6</span>
                            </p>
                        </td>
                        <td width="89" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 67.05pt; height: 14.5pt;">
                            <p align="center" class="tg-p9">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: Segoe UI, sans-serif; font-size: 10pt; color: inherit; display: inline; vertical-align: baseline;">0.00%</span>
                            </p>
                        </td>
                    </tr>
                    <tr style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; border: 1px solid rgb(239, 239, 239); height: 14.5pt;">
                        <td width="145" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 108.5pt; height: 14.5pt;">
                            <p style="margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; line-height: normal;">
                                <span class="tg-span5">
                                    <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: Segoe UI, sans-serif; font-size: 10pt; color: rgb(156, 0, 6); display: inline; vertical-align: baseline;">Reno10 5G 256GB</span>
                                </span>
                            </p>
                        </td>
                        <td width="125" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 94pt; height: 14.5pt;">
                            <p style="margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; line-height: normal;">
                                <span lang="EN-US" class="tg-span12">CPH2531-256GB</span>
                            </p>
                        </td>
                        <td width="72" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 54pt; height: 14.5pt;">
                            <p align="center" style="margin-top: 0cm; margin-right: -5pt; margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; text-align: center; line-height: normal;">
                                <span lang="EN-US" class="tg-span12">10,000,001</span>
                            </p>
                        </td>
                        <td width="84" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 63.05pt; height: 14.5pt;">
                            <p align="center" style="margin-top: 0cm; margin-right: -5pt; margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; text-align: center; line-height: normal;">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: Segoe UI, sans-serif; font-size: 10pt; color: inherit; display: inline; vertical-align: baseline;">10,990,000</span>
                            </p>
                        </td>
                        <td width="73" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 54.45pt; height: 14.5pt;">
                            <p align="center" class="tg-p9">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: Segoe UI, sans-serif; font-size: 10pt; color: inherit; display: inline; vertical-align: baseline;">30%</span>
                            </p>
                        </td>
                        <td width="82" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 61.85pt; height: 14.5pt;">
                            <p align="center" class="tg-p9">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: Segoe UI, sans-serif; font-size: 10pt; color: inherit; display: inline; vertical-align: baseline;">6</span>
                            </p>
                        </td>
                        <td width="89" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 67.05pt; height: 14.5pt;">
                            <p align="center" class="tg-p9">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: Segoe UI, sans-serif; font-size: 10pt; color: inherit; display: inline; vertical-align: baseline;">0.00%</span>
                            </p>
                        </td>
                    </tr>
                    <tr style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; border: 1px solid rgb(239, 239, 239); height: 14.5pt;">
                        <td width="145" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 108.5pt; height: 14.5pt;">
                            <p style="margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; line-height: normal;">
                                <span lang="EN-US" class="tg-span12">Reno8 5G</span>
                            </p>
                        </td>
                        <td width="125" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 94pt; height: 14.5pt;">
                            <p style="margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; line-height: normal;">
                                <span lang="EN-US" class="tg-span12">CPH2359</span>
                            </p>
                        </td>
                        <td width="72" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 54pt; height: 14.5pt;">
                            <p align="center" style="margin-top: 0cm; margin-right: -5pt; margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; text-align: center; line-height: normal;">
                                <span lang="EN-US" class="tg-span12">11,490,000</span>
                            </p>
                        </td>
                        <td width="84" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 63.05pt; height: 14.5pt;">
                            <p align="center" style="margin-top: 0cm; margin-right: -5pt; margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; text-align: center; line-height: normal;">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: Segoe UI, sans-serif; font-size: 10pt; color: inherit; display: inline; vertical-align: baseline;">13,990,000</span>
                            </p>
                        </td>
                        <td width="73" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 54.45pt; height: 14.5pt;">
                            <p align="center" class="tg-p9">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: Segoe UI, sans-serif; font-size: 10pt; color: inherit; display: inline; vertical-align: baseline;">30%</span>
                            </p>
                        </td>
                        <td width="82" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 61.85pt; height: 14.5pt;">
                            <p align="center" class="tg-p9">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: Segoe UI, sans-serif; font-size: 10pt; color: inherit; display: inline; vertical-align: baseline;">6</span>
                            </p>
                        </td>
                        <td width="89" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 67.05pt; height: 14.5pt;">
                            <p align="center" class="tg-p9">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: Segoe UI, sans-serif; font-size: 10pt; color: inherit; display: inline; vertical-align: baseline;">0.00%</span>
                            </p>
                        </td>
                    </tr>
                    <tr style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; border: 1px solid rgb(239, 239, 239); height: 14.5pt;">
                        <td width="145" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 108.5pt; height: 14.5pt;">
                            <p style="margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; line-height: normal;">
                                <span lang="EN-US" class="tg-span12">Reno8 Pro</span>
                            </p>
                        </td>
                        <td width="125" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 94pt; height: 14.5pt;">
                            <p style="margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; line-height: normal;">
                                <span lang="EN-US" class="tg-span12">CPH2357</span>
                            </p>
                        </td>
                        <td width="72" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 54pt; height: 14.5pt;">
                            <p align="center" style="margin-top: 0cm; margin-right: -5pt; margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; text-align: center; line-height: normal;">
                                <span lang="EN-US" class="tg-span12">16,490,000</span>
                            </p>
                        </td>
                        <td width="84" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 63.05pt; height: 14.5pt;">
                            <p align="center" style="margin-top: 0cm; margin-right: -5pt; margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; text-align: center; line-height: normal;">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: Segoe UI, sans-serif; font-size: 10pt; color: inherit; display: inline; vertical-align: baseline;">18,990,000</span>
                            </p>
                        </td>
                        <td width="73" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 54.45pt; height: 14.5pt;">
                            <p align="center" class="tg-p9">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: Segoe UI, sans-serif; font-size: 10pt; color: inherit; display: inline; vertical-align: baseline;">30%</span>
                            </p>
                        </td>
                        <td width="82" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 61.85pt; height: 14.5pt;">
                            <p align="center" class="tg-p9">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: Segoe UI, sans-serif; font-size: 10pt; color: inherit; display: inline; vertical-align: baseline;">6</span>
                            </p>
                        </td>
                        <td width="89" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 67.05pt; height: 14.5pt;">
                            <p align="center" class="tg-p9">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: Segoe UI, sans-serif; font-size: 10pt; color: inherit; display: inline; vertical-align: baseline;">0.00%</span>
                            </p>
                        </td>
                    </tr>
                    <tr style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; border: 1px solid rgb(239, 239, 239); height: 14.5pt;">
                        <td width="145" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 108.5pt; height: 14.5pt;">
                            <p style="margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; line-height: normal;">
                                <span lang="EN-US" class="tg-span12">Find N2 Flip</span>
                            </p>
                        </td>
                        <td width="125" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 94pt; height: 14.5pt;">
                            <p style="margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; line-height: normal;">
                                <span lang="EN-US" class="tg-span12">CPH2437</span>
                            </p>
                        </td>
                        <td width="72" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 54pt; height: 14.5pt;">
                            <p align="center" style="margin-top: 0cm; margin-right: -5pt; margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; text-align: center; line-height: normal;">
                                <span lang="EN-US" class="tg-span12">18,990,000</span>
                            </p>
                        </td>
                        <td width="84" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 63.05pt; height: 14.5pt;">
                            <p align="center" style="margin-top: 0cm; margin-right: -5pt; margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; text-align: center; line-height: normal;">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: Segoe UI, sans-serif; font-size: 10pt; color: inherit; display: inline; vertical-align: baseline;">19,990,000</span>
                            </p>
                        </td>
                        <td width="73" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 54.45pt; height: 14.5pt;">
                            <p align="center" class="tg-p9">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: Segoe UI, sans-serif; font-size: 10pt; color: inherit; display: inline; vertical-align: baseline;">30%</span>
                            </p>
                        </td>
                        <td width="82" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 61.85pt; height: 14.5pt;">
                            <p align="center" class="tg-p9">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: Segoe UI, sans-serif; font-size: 10pt; color: inherit; display: inline; vertical-align: baseline;">6</span>
                            </p>
                        </td>
                        <td width="89" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 67.05pt; height: 14.5pt;">
                            <p align="center" class="tg-p9">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: Segoe UI, sans-serif; font-size: 10pt; color: inherit; display: inline; vertical-align: baseline;">0.00%</span>
                            </p>
                        </td>
                    </tr>
                    <tr style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; border: 1px solid rgb(239, 239, 239); height: 14.5pt;">
                        <td width="145" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 108.5pt; height: 14.5pt;">
                            <p style="margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; line-height: normal;">
                                <span lang="EN-US" class="tg-span12">Find X5 Pro</span>
                            </p>
                        </td>
                        <td width="125" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 94pt; height: 14.5pt;">
                            <p style="margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; line-height: normal;">
                                <span lang="EN-US" class="tg-span12">CPH2305</span>
                            </p>
                        </td>
                        <td width="72" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 54pt; height: 14.5pt;">
                            <p align="center" style="margin-top: 0cm; margin-right: -5pt; margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; text-align: center; line-height: normal;">
                                <span lang="EN-US" class="tg-span12">19,990,000</span>
                            </p>
                        </td>
                        <td width="84" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 63.05pt; height: 14.5pt;">
                            <p align="center" style="margin-top: 0cm; margin-right: -5pt; margin-bottom: 0cm; padding: 0px; text-wrap: wrap; font-family: inherit; font-size: inherit; color: inherit; text-align: center; line-height: normal;">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: Segoe UI, sans-serif; font-size: 10pt; color: inherit; display: inline; vertical-align: baseline;">32,990,000</span>
                            </p>
                        </td>
                        <td width="73" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 54.45pt; height: 14.5pt;">
                            <p align="center" class="tg-p9">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: Segoe UI, sans-serif; font-size: 10pt; color: inherit; display: inline; vertical-align: baseline;">30%</span>
                            </p>
                        </td>
                        <td width="82" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 61.85pt; height: 14.5pt;">
                            <p align="center" class="tg-p9">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: Segoe UI, sans-serif; font-size: 10pt; color: inherit; display: inline; vertical-align: baseline;">6</span>
                            </p>
                        </td>
                        <td width="89" nowrap="" valign="top" style="margin: 0px; padding: 0cm 5.4pt; font-family: inherit; font-size: inherit; color: inherit; position: relative; border-top: none; border-right: 1pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); border-left: none; border-image: initial; background-clip: padding-box; width: 67.05pt; height: 14.5pt;">
                            <p align="center" class="tg-p9">
                                <span lang="EN-US" style="margin: 0px; padding: 0px; font-family: Segoe UI, sans-serif; font-size: 10pt; color: inherit; display: inline; vertical-align: baseline;">0.00%</span>
                            </p>
                            <div>
                                <br>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <h3 style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;">
                <span style="font-family: Open Sans;">II. Chính sách trả góp 0% qua cổng thanh toán Payoo</span>
            </h3>
            <p class="MsoNormal">
                <o:p></o:p>
            </p>
            <p class="MsoNormal">
                <b>
                    <span style="line-height: 107%; font-size: 18px;">1. Cổng thanh toán payoo là gì ?</span>
                </b>
            </p>
            <p class="MsoNormal">
                <span class="tg-span1">Cổng thanh toán PayoodoCông ty Cổ phần Dịch vụ TT Cộng đồng Việt(VietUnion) phát triển.Ví Payoođóng vai trò trung gian cho các giao dịch thương mại điện tử, hỗ trợ người dùng thực hiện các giao dịch thanh toán hóa đơn, dịch vụ nhanh chóng quađiện thoại.<o:p></o:p>
                </span>
            </p>
            <h3>
                <span style="line-height: 107%; font-size: 18px;">2. Quy định trả góp 0% qua thẻ tín dụng với cổng thanh toán Payoo.</span>
            </h3>
            <p class="MsoNormal">
                <span class="tg-span1">
                    Số lượng ngân hàng chấp nhận thanh toán:27 ngân hàng<o:p></o:p>
                </span>
            </p>
            <p class="MsoNormal">
                <span class="tg-span1">Kỳ hạn trả góp 06 tháng</span>
            </p>
            <p class="MsoNormal">
                <img src="assets/images/img/11.jpg" style="width: 812.725px; height: 507.953px;">
            </p>
            <p class="MsoNormal">
                <span class="tg-span1">
                </span>
                <span class="tg-span1">
                    <o:p></o:p>
                </span>
            </p>
            <p class="MsoNormal">
                <span class="tg-span1">
                    Trả góp qua thẻ tín dụng, khách hàng sẽ được hưởnglãi suất 0% hàng tháng. Khách hàng được mua hàng với giá ưu đãi + phí chuyển đổi trả góp (khoản phí duy nhất khách phải trả)<o:p></o:p>
                </span>
            </p>
            <p class="MsoNormal">
                <span class="tg-span1">
                    Phí chuyển đổi trả góp là khoản phí được thu trên số tiền mà khách hàng trả góp.<o:p></o:p>
                </span>
            </p>
            <p class="MsoNormal">
                <b>
                    <span style="line-height: 107%; font-size: 18px;">3. Một số lưu ý quan trọng</span>
                </b>
            </p>
            <p class="MsoNormal">
                <img src="assets/images/img/12.png">
                <span class="tg-span1">
                    <o:p>
                        <br>
                    </o:p>
                </span>
            </p>
            <p class="MsoNormal">
                <span class="tg-span1">
                    <o:p>
                        <br>
                    </o:p>
                </span>
            </p>
            <p class="MsoNormal">
                <span class="tg-span1">
                </span>
                <span class="tg-span1">
                    <o:p></o:p>
                </span>
            </p>
            <p class="MsoNormal">
                <span class="tg-span1">
                    Khách hàngchỉ cần thao tác trả góp trên máy Payoo. Máy sẽ in ra đầy đủ các liên cho khách hàng ký là đã hoàn thành trả góp cho khách.<o:p></o:p>
                </span>
            </p>
            <p class="MsoNormal">
                <span class="tg-span1">
                    Khách hàngkhông phải điền thông tin vào bất cứ đường link nào khác. Một số ngân hàng khi khách quẹt thẻ xong sẽ gửi tin nhắn để mời điền thông tin theo link để trả góp, làm theo link này thì sẽ bị mất phí theo quy định của ngân hàng.<o:p></o:p>
                </span>
            </p>
            <p class="MsoNormal">
                <span class="tg-span1">Hiện khách hàng sẽ chỉ tham gia trả góp kỳ hạn 06 tháng của 26 ngân hàng (FE Credit không trả góp được vì ngân hàng này không hỗ trợ trả góp 06 tháng)<o:p></o:p>
                </span>
            </p>
            <p class="MsoNormal">
                <span class="tg-span1">
                    Ngân hàng Techcombankkhi tham gia trả góp, khách hàng sẽ mất thêm phí 1.1% – tối đa 150.000đ. Khoản nàyngân hàng sẽ thutrực tiếp trên thẻ khách hàng. Hoàng Hà Mobilekhông thu thêm của khách.<o:p></o:p>
                </span>
            </p>
            <p class="MsoNormal">
                <span class="tg-span1">Ngoài trả góp 0%, khách hàng sử dụng thẻ tín dụng củaVIBđược lựa chọn thêm một phương án trả góp lãi suất 1%/tháng. Kì hạn 3/6/9/12 tháng, với phí chuyển đổi trả góp 0 đồng (ngân hàng thu của khách)</span>
            </p>
            <p class="tg-p4">
                <span style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: rgb(255, 0, 0); vertical-align: baseline;">
                    <span class="tg-span5">III. TRẢ GÓP QUA HOMEPAYLATER</span>
                </span>
                <br class="tg-tbody">
            </p>
            <p class="tg-p4">
                <span class="tg-span5">1. Hình thức:</span>
                Mua trước trả sau (vay trả góp)
            </p>
            <p class="tg-p4">
                <span class="tg-span5">2. Đơn vị:</span>
                HomePaylater (là đơn vị trực thuộc Homecredit) - với cổng thanh toán Bảo Kim
            </p>
            <p class="tg-p4">
                <span class="tg-span5">3. Nội dung dịch vụ:</span>
                Dịch vụ hỗ trợ Mua trước trả sau quaHome Creditcho phép người dùng mua sắm ngay lập tức mà không cần trả trước, đồng thời có thể chọn phương án thanh toán sau1tháng– 3tháng - 6 tháng - 12 tháng
            </p>
            <p class="tg-p4">
                <span class="tg-span3">
                    <em class="tg-tbody">
                        <span class="tg-span5">4. Nội dung Chương trình khuyến mãi:</span>
                    </em>
                </span>
            </p>
            <table class="tg-table">
                <tbody class="tg-tbody">
                    <tr class="tg-tr">
                        <td style="margin: 0px; padding: 0.4em; font-family: inherit; font-size: inherit; color: inherit; position: relative; border: 1px solid rgb(225, 225, 225); background-clip: padding-box; width: 450px;">
                            <p style="margin-bottom: 10px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; text-align: right;"></p>
                            <span class="tg-span5">Nội dung ưu đãi</span>
                            <div class="sun-editor_resizer" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; position: absolute; top: 0px; right: 0px; width: 5px; cursor: col-resize; user-select: none; caret-color: transparent; height: 30.88px; text-align: right;"></div>
                        </td>
                        <td style="margin: 0px; padding: 0.4em; font-family: inherit; font-size: inherit; color: inherit; position: relative; border: 1px solid rgb(225, 225, 225); background-clip: padding-box; width: 275px;">
                            <div style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; text-align: center;">
                                <span class="tg-span5">Với người dùng mới</span>
                            </div>
                            <div class="sun-editor_resizer" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; position: absolute; top: 0px; right: 0px; width: 5px; cursor: col-resize; user-select: none; caret-color: transparent; height: 30.88px; text-align: center;"></div>
                        </td>
                        <td class="tg-td2">
                            <div style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; text-align: center;">
                                <span class="tg-span5">Với người dùng hiện hữu</span>
                            </div>
                            <div class="sun-editor_resizer" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; position: absolute; top: 0px; right: 0px; width: 5px; cursor: col-resize; user-select: none; caret-color: transparent; height: 30.88px; text-align: center;"></div>
                        </td>
                    </tr>
                    <tr class="tg-tr">
                        <td class="tg-td2">
                            <div class="tg-tbody">
                                Giảm 50% tối đa 100k (Áp dụng khoản vay từ 200k)<br class="tg-tbody">
                            </div>
                            <div class="sun-editor_resizer" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; position: absolute; top: 0px; right: 0px; width: 5px; cursor: col-resize; user-select: none; caret-color: transparent; height: 30.88px;"></div>
                        </td>
                        <td class="tg-td2">
                            <div style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; text-align: center;">x</div>
                            <div class="sun-editor_resizer" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; position: absolute; top: 0px; right: 0px; width: 5px; cursor: col-resize; user-select: none; caret-color: transparent; height: 30.88px;"></div>
                        </td>
                        <td class="tg-td2">
                            <div class="tg-tbody">
                                <br class="tg-tbody">
                            </div>
                            <div class="sun-editor_resizer" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; position: absolute; top: 0px; right: 0px; width: 5px; cursor: col-resize; user-select: none; caret-color: transparent; height: 30.88px;"></div>
                        </td>
                    </tr>
                    <tr class="tg-tr">
                        <td class="tg-td2">
                            <div class="tg-tbody">
                                Giảm 5% tối đa 500k<span style="margin: 0px; padding: 0px; font-size: 13px; vertical-align: baseline;">(Áp dụng khoản vay từ 200k)</span>
                                ​<br class="tg-tbody">
                            </div>
                            <div class="sun-editor_resizer" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; position: absolute; top: 0px; right: 0px; width: 5px; cursor: col-resize; user-select: none; caret-color: transparent; height: 30.88px;"></div>
                        </td>
                        <td class="tg-td2">
                            <div style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; text-align: center;">x</div>
                            <div class="sun-editor_resizer" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; position: absolute; top: 0px; right: 0px; width: 5px; cursor: col-resize; user-select: none; caret-color: transparent; height: 30.88px;"></div>
                        </td>
                        <td class="tg-td2">
                            <div style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; text-align: center;">x</div>
                            <div class="sun-editor_resizer" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; position: absolute; top: 0px; right: 0px; width: 5px; cursor: col-resize; user-select: none; caret-color: transparent; height: 30.88px; text-align: center;"></div>
                        </td>
                    </tr>
                    <tr class="tg-tr">
                        <td class="tg-td2">
                            <div class="tg-tbody">
                                Giảm 7% tối đa 700k (Áp dụng khoản vay từ 6tr)<br class="tg-tbody">
                            </div>
                            <div class="sun-editor_resizer" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; position: absolute; top: 0px; right: 0px; width: 5px; cursor: col-resize; user-select: none; caret-color: transparent; height: 30.88px;"></div>
                        </td>
                        <td class="tg-td2">
                            <div style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; text-align: center;">x</div>
                            <div class="sun-editor_resizer" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; position: absolute; top: 0px; right: 0px; width: 5px; cursor: col-resize; user-select: none; caret-color: transparent; height: 30.88px;"></div>
                        </td>
                        <td class="tg-td2">
                            <div style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; text-align: center;">x</div>
                            <div class="sun-editor_resizer" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; position: absolute; top: 0px; right: 0px; width: 5px; cursor: col-resize; user-select: none; caret-color: transparent; height: 30.88px;"></div>
                        </td>
                    </tr>
                    <tr class="tg-tr">
                        <td class="tg-td2">
                            <div class="tg-tbody">
                                <span style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: rgb(0, 85, 255); vertical-align: baseline;">
                                    <span class="tg-span5">Ưu đãi ngày 09/09:</span>
                                </span>
                            </div>
                            <div class="tg-tbody">
                                - Giảm 10% tối đa 1tr vào ngày 9/9<br class="tg-tbody">
                            </div>
                            <div class="tg-tbody">- Giảm 7% tối đa 500k trong thời gian từ 06/09-09/09</div>
                            <div class="sun-editor_resizer" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; position: absolute; top: 0px; right: 0px; width: 5px; cursor: col-resize; user-select: none; caret-color: transparent; height: 30.88px;"></div>
                        </td>
                        <td class="tg-td2">
                            <div style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; text-align: center;">x</div>
                            <div class="sun-editor_resizer" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; position: absolute; top: 0px; right: 0px; width: 5px; cursor: col-resize; user-select: none; caret-color: transparent; height: 30.88px;"></div>
                        </td>
                        <td class="tg-td2">
                            <div style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; text-align: center;">x</div>
                            <div class="sun-editor_resizer" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; position: absolute; top: 0px; right: 0px; width: 5px; cursor: col-resize; user-select: none; caret-color: transparent; height: 30.88px;"></div>
                        </td>
                    </tr>
                    <tr class="tg-tr">
                        <td class="tg-td2">
                            <div class="tg-tbody">
                                <span style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: rgb(0, 85, 255); vertical-align: baseline;">
                                    <span class="tg-span5">Ưu đãi HomePayLater Day</span>
                                </span>
                                <br class="tg-tbody">
                            </div>
                            <div class="tg-tbody">
                                - Giảm 10% tối đa 1tr các ngày<span class="tg-span5">thứ Ba</span>
                                trong tháng 9
                            </div>
                            <div class="tg-tbody">
                                - Giảm 7% tối đa 500k c<span style="margin: 0px; padding: 0px; font-size: 13px; vertical-align: baseline;">ác ngày</span>
                                <span style="margin: 0px; padding: 0px; font-weight: 700; font-size: 13px; -webkit-user-drag: none; overflow: visible;">thứ Ba</span>
                                <span style="margin: 0px; padding: 0px; font-size: 13px; vertical-align: baseline;">trong tháng 9</span>
                                ​
                            </div>
                            <div class="sun-editor_resizer" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; position: absolute; top: 0px; right: 0px; width: 5px; cursor: col-resize; user-select: none; caret-color: transparent; height: 30.88px;"></div>
                        </td>
                        <td class="tg-td2">
                            <div style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; text-align: center;">x</div>
                            <div class="sun-editor_resizer" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; position: absolute; top: 0px; right: 0px; width: 5px; cursor: col-resize; user-select: none; caret-color: transparent; height: 30.88px;"></div>
                        </td>
                        <td class="tg-td2">
                            <div style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; text-align: center;">x</div>
                            <div class="sun-editor_resizer" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; position: absolute; top: 0px; right: 0px; width: 5px; cursor: col-resize; user-select: none; caret-color: transparent; height: 30.88px;"></div>
                        </td>
                    </tr>
                    <tr class="tg-tr">
                        <td class="tg-td2">
                            <div class="tg-tbody">
                                <span style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: rgb(0, 85, 255); vertical-align: baseline;">
                                    <span class="tg-span5">Ưu đãi sinh nhật HomePayLater:</span>
                                </span>
                            </div>
                            <div class="tg-tbody">
                                -Giảm 10% tối đa 1M<span class="tg-span5">trong ngày 19/09</span>
                                <br class="tg-tbody">
                                - Giảm 7% tối đa 500K trong thời gian từ<span class="tg-span5">15-20/09</span>
                            </div>
                            <div class="sun-editor_resizer" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; position: absolute; top: 0px; right: 0px; width: 5px; cursor: col-resize; user-select: none; caret-color: transparent; height: 30.88px;"></div>
                        </td>
                        <td class="tg-td2">
                            <div style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; text-align: center;">x</div>
                            <div class="sun-editor_resizer" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; position: absolute; top: 0px; right: 0px; width: 5px; cursor: col-resize; user-select: none; caret-color: transparent; height: 30.88px;"></div>
                        </td>
                        <td class="tg-td2">
                            <div style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; text-align: center;">x</div>
                            <div class="sun-editor_resizer" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; position: absolute; top: 0px; right: 0px; width: 5px; cursor: col-resize; user-select: none; caret-color: transparent; height: 30.88px;"></div>
                        </td>
                    </tr>
                    <tr class="tg-tr">
                        <td class="tg-td2">
                            <div class="tg-tbody">
                                <br class="tg-tbody">
                            </div>
                            <div class="sun-editor_resizer" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; position: absolute; top: 0px; right: 0px; width: 5px; cursor: col-resize; user-select: none; caret-color: transparent; height: 30.88px;"></div>
                        </td>
                        <td class="tg-td2">
                            <div style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; text-align: center;">
                                <br class="tg-tbody">
                            </div>
                            <div class="sun-editor_resizer" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; position: absolute; top: 0px; right: 0px; width: 5px; cursor: col-resize; user-select: none; caret-color: transparent; height: 30.88px; text-align: center;"></div>
                        </td>
                        <td style="margin: 0px; padding: 0.4em; font-family: inherit; font-size: inherit; color: inherit; position: relative; border: 1px solid rgb(225, 225, 225); background-clip: padding-box; text-align: center;">
                            <div class="tg-tbody">
                                <br class="tg-tbody">
                            </div>
                            <div class="sun-editor_resizer" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; position: absolute; top: 0px; right: 0px; width: 5px; cursor: col-resize; user-select: none; caret-color: transparent; height: 30.88px;"></div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <p class="tg-p4">
                <br class="tg-tbody">
            </p>
            <p class="tg-p4">- Quá trình xét duyệt hồ sơ nhanh gọn: chỉ 30 giây - 3 phút.</p>
            <p class="tg-p4">- Hồ sơ xét duyệt đơn giản: Chỉ cần có chứng minh thư hoặc căn cước công dân và số điện thoại chính chủ đang sử dụng</p>
            <p class="tg-p4">- Quá trình xét duyệt Online thông qua App hoặc thông qua trang website (không cần tải app)</p>
            <p class="tg-p4">
                <span class="tg-span5">- Mức phí:</span>
            </p>
            <table class="tg-table">
                <tbody class="tg-tbody">
                    <tr class="tg-tr">
                        <td class="tg-td2">
                            <span class="tg-span5">Gói 1 tháng</span>
                        </td>
                        <td class="tg-td2">
                            <span class="tg-span5">Khách hàng mất phí 0%</span>
                        </td>
                    </tr>
                    <tr class="tg-tr">
                        <td class="tg-td2">
                            <span class="tg-span5">Gói 3 tháng</span>
                        </td>
                        <td class="tg-td2">
                            <span class="tg-span5">Khách hàng mất phí 3%/tháng x số tháng ( theo dư nợ giảm dần)</span>
                        </td>
                    </tr>
                    <tr class="tg-tr">
                        <td class="tg-td2">
                            <span class="tg-span5">Gói 6 tháng</span>
                        </td>
                        <td class="tg-td2">
                            <span class="tg-span5">Khách hàng mất phí 3,55%/tháng x số tháng (theo dư nợ giảm dần)</span>
                        </td>
                    </tr>
                    <tr class="tg-tr">
                        <td class="tg-td2">
                            <span class="tg-span5">Gói 12 tháng</span>
                        </td>
                        <td class="tg-td2">
                            <span class="tg-span5">Khách hàng mất phí 3,75%/tháng x số tháng (theo dư nợ giảm dần)</span>
                        </td>
                    </tr>
                </tbody>
            </table>
            <p class="tg-p4">
                <span class="tg-span5">- Giá trị khoản vay</span>
            </p>
            <p dir="ltr" style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt; padding: 0pt 0pt 19.5pt;">
                <span class="tg-span"></span>
            </p>
            <table class="tg-table">
                <tbody class="tg-tbody">
                    <tr class="tg-tr">
                        <td class="tg-td2">Gói 1 tháng</td>
                        <td class="tg-td2">Giá trị khoản vay từ 200K - 1.5M</td>
                    </tr>
                    <tr class="tg-tr">
                        <td class="tg-td2">Gói 3 tháng</td>
                        <td class="tg-td2">Giá trị khoản vay từ 400K - 5M</td>
                    </tr>
                    <tr class="tg-tr">
                        <td class="tg-td2">Gói 6 tháng</td>
                        <td class="tg-td2">Giá trị khoản vay từ 3M - 10M</td>
                    </tr>
                    <tr class="tg-tr">
                        <td class="tg-td2">Gói 12 tháng</td>
                        <td class="tg-td2">Giá trị khoản vay từ3M - 10M</td>
                    </tr>
                </tbody>
            </table>
            <p dir="ltr" style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt; padding: 0pt 0pt 19.5pt;">
                <span class="tg-span">
                    <br>
                </span>
            </p>
            <p class="tg-p4">
                <span style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: rgb(255, 0, 0); vertical-align: baseline;">
                    <span class="tg-span5">
                        <em class="tg-tbody">IV. Samsung Finance</em>
                    </span>
                </span>
            </p>
            <p class="tg-p4">
                <span class="tg-span5">1. Samsung Finance+ là gì?</span>
            </p>
            <p class="tg-p4">Samsung Finance+ là giải pháp tài chính, sử dụng nền tảng công nghệ của Samsung và khoản vay được cung cấp bởi đối tác của Kredivo là VietCredit, hỗ trợ khách hàng mua trả góp các sản phẩm của Samsung với 0% lãi suất và khách hàng thanh toán hàng tháng cho công ty tài chính qua ứng dụng Samsung Finance+.</p>
            <p class="tg-p4">
                <span class="tg-span5">2. Samsung Finance+ có điểm gì khác biệt so với các sản phẩm tài chính tiêu dùng khác?</span>
            </p>
            <p class="tg-p4">Với Samsung Finance+, khách hàng không cần sở hữu thẻ tín dụng vẫn có thể trả góp với lãi suất 0% cho tất cả các sản phẩm Samsung Galaxy. Khách hàng sẽ được duyệt vay nhanh chóng trong vòng 7 phút và quy trình tham gia hoàn toàn trực tuyến, chỉ yêu cầu cung cấp CCCD. Samsung Finance+ là giải pháp phù hợp với mọi nhu cầu tài chính với tỷ lệ duyệt vay lên đến 80%, tỷ lệ trả trước thấp chỉ từ 0% và đặc biệt không đính kèm các sản phẩm bảo hiểm khác.</p>
            <p class="tg-p4">
                <span class="tg-span5">3. Điều kiện tham gia Samsung Finance+ ?</span>
            </p>
            <ul style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: Inter, sans-serif; color: rgb(51, 51, 51); list-style-position: outside; margin-block-start: 1em;">
                <li style="margin: 0px 0px 5px; padding: 0px; list-style-type: unset; font-family: inherit; font-size: inherit; color: inherit;">Là công dân đang sinh sống ở Việt Nam từ 18 – 60 tuổi</li>
                <li style="margin: 0px 0px 5px; padding: 0px; list-style-type: unset; font-family: inherit; font-size: inherit; color: inherit;">Có CCCD còn hiệu lực</li>
                <li style="margin: 0px 0px 5px; padding: 0px; list-style-type: unset; font-family: inherit; font-size: inherit; color: inherit;">Thu nhập từ 4.000.000VNĐ</li>
                <li style="margin: 0px 0px 5px; padding: 0px; list-style-type: unset; font-family: inherit; font-size: inherit; color: inherit;">Có SIM vật lý với số điện thoại chính chủ</li>
                <li style="margin: 0px 0px 5px; padding: 0px; list-style-type: unset; font-family: inherit; font-size: inherit; color: inherit;">Có hộp thư điện tử (email)</li>
            </ul>
            <p class="tg-p4">Có mặt tại cửa hàng và dùng chính số điện thoại để nhận mã xác thực</p>
            <p class="tg-p4">
                <span class="tg-span5">4. THÔNG TIN VỀ CHƯƠNG TRÌNH</span>
            </p>
            <p class="tg-p4">
                <span class="tg-span5">4.1. Sản phẩm áp dụng:</span>
                Điện thoại Samsung Galaxy (Danh sách model và giá bán lẻ có thể thay đổi theo thời gian)
            </p>
            <p class="tg-p4">
                o Galaxy Z Fold4, Z Flip4 tất cả các phiên bản<br class="tg-tbody">
                o Galaxy S23 Series tất cả các phiên bản<br class="tg-tbody">
                o Galaxy S22 Series tất cả các phiên bản<br class="tg-tbody">
                o Galaxy S21FE, S20 FE tất cả các phiên bản<br class="tg-tbody">o Galaxy A54 5G, A34 5G, A14 5G, A14, A04, A04s, A04e, M14 tất cả các phiên bản o Galaxy A73 5G, A53 5G, A33 5G, A23 5G, A23, A13 tất cả các phiên bản
            </p>
            <p class="tg-p4">
                <span class="tg-span5">4.2. Thời gian áp dụng:</span>
                15/05/2023 – vô thời hạn
            </p>
            <p class="tg-p4">
                <span class="tg-span5">4.3. Số tiền đăng ký trả góp tối đa:</span>
                Bằng với số tiền thanh toán khi mua điện thoại Samsung Galaxy thuộc danh sách sản phẩm áp dụng và không được vượt quá giá bán lẻ đã bao gồm VAT của sản phẩm đó.
            </p>
            <p class="tg-p4">
                <span class="tg-span5">Q &amp;A:</span>
            </p>
            <p class="tg-p4">
                <span class="tg-span5">- Tôi cần trả trước bao nhiêu % khi tham gia chương trình trả góp qua Samsung Finance+?</span>
            </p>
            <p class="tg-p4">
                <em class="tg-tbody">Tùy vào lịch sử tín dụng, Khách hàng sẽ được đề xuất các khoản trả trước phù hợp từ 0 đến 50%</em>
            </p>
            <p class="tg-p4">
                <em class="tg-tbody">-</em>
                <span class="tg-span5">Hạn mức tối đa cho gói vay qua Samsung Finance+ là bao nhiêu?</span>
            </p>
            <p class="tg-p4">Hạn mức tối đa bạn có thể nhận được là 25.000.000đ</p>
            <p class="tg-p4">
                <span class="tg-span5">4.4. Thời hạn trả góp:</span>
                <em class="tg-tbody">
                    <span class="tg-span5">từ ngày 15/06/2023 chỉ áp dụng 12 tháng đến khi có thông báo mới</span>
                </em>
            </p>
            <p class="tg-p4">
                <span class="tg-span5">Q &amp;A:Tôi có thể thanh toán khoản vay bằng các phương thức nào?</span>
            </p>
            <p class="tg-p4">Khách hàng có thể thanh toán qua chuyển khoản ngân hàng, thẻ ATM NAPAS, hay thẻ ghi nợ (debit card). Ngoài ra, Khách hàng có thể thanh toán tại các cửa hàng có hỗ trợ thanh toán cho Kredivo (Vinmart+, Circle K, GS25, Thế Giới Di Động, Điện Máy Chợ Lớn, v.v…)</p>
            <p class="tg-p4">
                <span class="tg-span5">4.5. Địa điểm áp dụng:</span>
                Xem 57 chi nhánh áp dụng:<a target="_blank" href="https://docs.google.com/spreadsheets/d/1eDB_52nO6_ZsTVfCDyBXttCr2ItDHf6vXoK9uggTmSA/edit" style="margin: 0px; padding: 0px; color: rgb(41, 121, 255); font-family: inherit; font-size: inherit;">BẤM VÀO ĐÂY</a>
            </p>
            <p class="tg-p4">
                <span class="tg-span5">4.6. Thông tin ưu đãi</span>
            </p>
            <table class="tg-table">
                <tbody class="tg-tbody">
                    <tr class="tg-tr">
                        <td class="tg-td2">
                            <p style="margin-bottom: 10px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit;">
                                <span class="tg-span5">Số</span>
                                <span class="tg-span5">tiền trả trước trên giá sản phẩm</span>
                            </p>
                        </td>
                        <td class="tg-td2">
                            <span class="tg-span5">Kỳ hạn trả góp</span>
                        </td>
                        <td class="tg-td2">
                            <span class="tg-span5">Phí trả góp Khách hàng phải trả hàng tháng</span>
                        </td>
                        <td class="tg-td2">
                            <span class="tg-span5">Phí tham gia chương trình**</span>
                        </td>
                    </tr>
                    <tr class="tg-tr">
                        <td class="tg-td2">
                            <span class="tg-span5">Trả trước từ 0đ</span>
                        </td>
                        <td class="tg-td2">
                            <span class="tg-span5">12 tháng 06 tháng*</span>
                        </td>
                        <td class="tg-td2">
                            <span class="tg-span5">Phí lãi suất: 0% mỗi tháng</span>
                        </td>
                        <td class="tg-td2">
                            <span class="tg-span5">99,000đ trên mỗi đơn hàng</span>
                        </td>
                    </tr>
                </tbody>
            </table>
            <p class="tg-p4">
                <em class="tg-tbody">*Kỳ hạn 12 tháng được áp dụng từ ngày 15/06/2023</em>
                <br class="tg-tbody">
                <em class="tg-tbody">**Phí tham gia chương trình: phí khách hàng phải đóng để tham gia trả góp qua SF+, phí được chia theo kỳ hạn trả góp và thanh toán theo tháng cùng với khoản vay.</em>
            </p>
            <p class="tg-p4">
                <span style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: rgb(0, 85, 255); vertical-align: baseline;">
                    <span class="tg-span5">
                        <em class="tg-tbody">Tháng 9, khách hàng vẫn được miễn khoản phí này!</em>
                    </span>
                </span>
            </p>
            <p class="tg-p4">
                <span class="tg-span5">4.6.1. Lợi ích của Samsung Finance</span>
            </p>
            <p class="tg-p4">
                <em class="tg-tbody">
                    <span class="tg-span5">- Giải pháp tài chính cho mọi người</span>
                </em>
            </p>
            <ul style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: Inter, sans-serif; color: rgb(51, 51, 51); list-style-position: outside; margin-block-start: 1em;">
                <li style="margin: 0px 0px 5px; padding: 0px; list-style-type: unset; font-family: inherit; font-size: inherit; color: inherit;">
                    <span class="tg-span5">Tỷ lệ duyệt lên tới 90%</span>
                </li>
                <li style="margin: 0px 0px 5px; padding: 0px; list-style-type: unset; font-family: inherit; font-size: inherit; color: inherit;">
                    <p style="margin-bottom: 10px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit;">
                        <span class="tg-span5">Tỷ lệ trả trước thấp và linh hoạt</span>
                    </p>
                </li>
                <li style="margin: 0px 0px 5px; padding: 0px; list-style-type: unset; font-family: inherit; font-size: inherit; color: inherit;">
                    <p style="margin-bottom: 10px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit;">
                        <span class="tg-span5">Không đính kèm các sản phẩm bảo hiểm</span>
                    </p>
                </li>
                <li style="margin: 0px 0px 5px; padding: 0px; list-style-type: unset; font-family: inherit; font-size: inherit; color: inherit;">
                    <p style="margin-bottom: 10px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit;">
                        <span class="tg-span5">Lãi suất 0%</span>
                    </p>
                </li>
            </ul>
            <p class="tg-p4">
                <em class="tg-tbody">
                    <span class="tg-span5">- Duyệt vay nhanh</span>
                </em>
            </p>
            <ul style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: Inter, sans-serif; color: rgb(51, 51, 51); list-style-position: outside; margin-block-start: 1em;">
                <li style="margin: 0px 0px 5px; padding: 0px; list-style-type: unset; font-family: inherit; font-size: inherit; color: inherit;">
                    <span class="tg-span5">Duyệt vay trong 7phút</span>
                </li>
                <li style="margin: 0px 0px 5px; padding: 0px; list-style-type: unset; font-family: inherit; font-size: inherit; color: inherit;">
                    <span class="tg-span5">Ký hợp đồng trong 20phút</span>
                </li>
            </ul>
            <p class="tg-p4">
                <em class="tg-tbody">
                    <span class="tg-span5">- Quy trình không giấy tờ</span>
                </em>
            </p>
            <ul style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: Inter, sans-serif; color: rgb(51, 51, 51); list-style-position: outside; margin-block-start: 1em;">
                <li style="margin: 0px 0px 5px; padding: 0px; list-style-type: unset; font-family: inherit; font-size: inherit; color: inherit;">
                    <span class="tg-span5">Chỉ yêu cầu CMT/CCCD</span>
                </li>
                <li style="margin: 0px 0px 5px; padding: 0px; list-style-type: unset; font-family: inherit; font-size: inherit; color: inherit;">
                    <span class="tg-span5">Đăng ký hoàn toàn trực tuyến thông qua máy tính bảng tại cửa hàng</span>
                </li>
            </ul>
            <p class="tg-p4">
                <em class="tg-tbody">
                    <span class="tg-span5">-</span>
                    <span class="tg-span5">Nhắc</span>
                    <span class="tg-span5">nhở</span>
                    <span class="tg-span5">thanh</span>
                    <span class="tg-span5">toán</span>
                    <span class="tg-span5">bằng Knox Guard</span>
                </em>
            </p>
            <ul style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: Inter, sans-serif; color: rgb(51, 51, 51); list-style-position: outside; margin-block-start: 1em;">
                <li style="margin: 0px 0px 5px; padding: 0px; list-style-type: unset; font-family: inherit; font-size: inherit; color: inherit;">
                    <p style="margin-bottom: 10px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit;">
                        <span class="tg-span5">An toàn và bảo mật hơn nhờ phần mềm Knox Guard</span>
                    </p>
                </li>
                <li style="margin: 0px 0px 5px; padding: 0px; list-style-type: unset; font-family: inherit; font-size: inherit; color: inherit;">
                    <p style="margin-bottom: 10px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit;">
                        <span class="tg-span5">Công cụ nhắc nhở giúp khách hàng thanh toán đúng hạn</span>
                    </p>
                </li>
            </ul>
            <p dir="ltr" style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt; padding: 0pt 0pt 19.5pt;">
                <span class="tg-span"></span>
            </p>
            <p class="tg-p4">
                <span class="tg-span5">4.6. Cách thức tham gia:</span>
            </p>
            <ul style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; list-style-position: outside; margin-block-start: 1em;">
                <li style="margin: 0px 0px 5px; padding: 0px; list-style-type: unset; font-family: inherit; font-size: inherit; color: inherit;">
                    <p style="margin-bottom: 10px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit;">Khách hàng có nhu cầu mua điện thoại Galaxy vay trả góp, liên hệ nhân viên cửa hàng</p>
                </li>
                <li style="margin: 0px 0px 5px; padding: 0px; list-style-type: unset; font-family: inherit; font-size: inherit; color: inherit;">
                    <p style="margin-bottom: 10px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit;">Nhân viên cửa hàng thu thập thông tin khách hàng và hỗ trợ lên hồ sơ trả góp</p>
                </li>
                <li style="margin: 0px 0px 5px; padding: 0px; list-style-type: unset; font-family: inherit; font-size: inherit; color: inherit;">
                    <p style="margin-bottom: 10px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit;">Hồ sơ sẽ được đơn vị tài chính tiến hành thẩm định và trả kết quả trong vòng 05 - 10 phút</p>
                </li>
                <li style="margin: 0px 0px 5px; padding: 0px; list-style-type: unset; font-family: inherit; font-size: inherit; color: inherit;">
                    <p style="margin-bottom: 10px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit;">Nếu hồ sơ được duyệt, khách hàng sẽ tiến hành ký hợp đồng vay (điện tử) với Nhà tài chính, thanh toán khoản trả trước cho cửa hàng (nếu có) và khoản tiền trả góp hàng tháng cho Nhà tài chính.</p>
                </li>
            </ul>
            <p style="margin-bottom: 10px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit;">
                <span class="tg-span5">4.7. Điều kiện để khách hàng tham gia chương trình:</span>
            </p>
            <ul style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; list-style-position: outside; margin-block-start: 1em;">
                <li style="margin: 0px 0px 5px; padding: 0px; list-style-type: unset; font-family: inherit; font-size: inherit; color: inherit;">
                    <p style="margin-bottom: 10px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit;">Là công dân Việt Nam, đang sinh sống tại Việt Nam</p>
                </li>
                <li style="margin: 0px 0px 5px; padding: 0px; list-style-type: unset; font-family: inherit; font-size: inherit; color: inherit;">
                    <p style="margin-bottom: 10px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit;">Có Chứng Minh Thư hoặc Căn Cước Công Dân còn hiệu lực</p>
                </li>
                <li style="margin: 0px 0px 5px; padding: 0px; list-style-type: unset; font-family: inherit; font-size: inherit; color: inherit;">
                    <p style="margin-bottom: 10px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit;">Từ đủ 18 – 60 tuổi</p>
                </li>
                <li style="margin: 0px 0px 5px; padding: 0px; list-style-type: unset; font-family: inherit; font-size: inherit; color: inherit;">
                    <p style="margin-bottom: 10px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit;">Dùng SIM vật lý với số điện thoại chính chủ</p>
                </li>
                <li style="margin: 0px 0px 5px; padding: 0px; list-style-type: unset; font-family: inherit; font-size: inherit; color: inherit;">
                    <p style="margin-bottom: 10px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit;">Có hộp thư điện tử (email)</p>
                </li>
                <li style="margin: 0px 0px 5px; padding: 0px; list-style-type: unset; font-family: inherit; font-size: inherit; color: inherit;">
                    <p style="margin-bottom: 10px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit;">Thu nhập hàng tháng từ 4.000.000VNĐ</p>
                </li>
                <li style="margin: 0px 0px 5px; padding: 0px; list-style-type: unset; font-family: inherit; font-size: inherit; color: inherit;">
                    <p style="margin-bottom: 10px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit;">Có mặt tại cửa hàng và sử dụng số điện thoại để nhận mã xác thực</p>
                </li>
            </ul>
            <p style="margin-bottom: 10px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit;">
                <span class="tg-span5">5. Một số lưu ý sau khi khách hoàn thành mua điện thoại trả góp qua SF+</span>
            </p>
            <ul style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; list-style-position: outside; margin-block-start: 1em;">
                <li style="margin: 0px 0px 5px; padding: 0px; list-style-type: unset; font-family: inherit; font-size: inherit; color: inherit;">
                    <p style="margin-bottom: 10px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit;">Hạn mức trả góp căn cứ vào điểm tín dụng của Khách hàng (được xác định bởi nhà tài chính)</p>
                </li>
                <li style="margin: 0px 0px 5px; padding: 0px; list-style-type: unset; font-family: inherit; font-size: inherit; color: inherit;">
                    <p style="margin-bottom: 10px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit;">Khách hàng có thể tất toán trước kỳ hạn bất cứ khi nào và không phát sinh chi phí</p>
                </li>
                <li style="margin: 0px 0px 5px; padding: 0px; list-style-type: unset; font-family: inherit; font-size: inherit; color: inherit;">
                    <p style="margin-bottom: 10px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit;">Ứng dụng Samsung Finance+ sẽ được tự động cài đặt trên thiết bị để Khách hàng thao tác và kiểm tra thông tin khoản vay</p>
                </li>
                <li style="margin: 0px 0px 5px; padding: 0px; list-style-type: unset; font-family: inherit; font-size: inherit; color: inherit;">
                    <p style="margin-bottom: 10px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit;">Hàng tháng Khách hàng sẽ nhận được thông báo đến hạn thanh toán trên điện thoại</p>
                </li>
                <li style="margin: 0px 0px 5px; padding: 0px; list-style-type: unset; font-family: inherit; font-size: inherit; color: inherit;">
                    <p style="margin-bottom: 10px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit;">Trường hợp quá hạn từ 1-6 ngày sẽ hiển thị thông báo nhắc nhở liên tục trên điện thoại và tính lãi suất quá hạn</p>
                </li>
                <li style="margin: 0px 0px 5px; padding: 0px; list-style-type: unset; font-family: inherit; font-size: inherit; color: inherit;">
                    <p style="margin-bottom: 10px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit;">Lãi chậm nộp là 0.1726%/ngày kể từ ngày đến hạn thanh toán</p>
                </li>
                <li style="margin: 0px 0px 5px; padding: 0px; list-style-type: unset; font-family: inherit; font-size: inherit; color: inherit;">
                    <p style="margin-bottom: 10px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit;">Knox Guard sẽ được kích hoạt để khóa tạm thời thiết bị sau 7 ngày chậm thanh toán</p>
                </li>
                <li style="margin: 0px 0px 5px; padding: 0px; list-style-type: unset; font-family: inherit; font-size: inherit; color: inherit;">
                    <p style="margin-bottom: 10px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit;">Thiết bị sẽ được mở lại sau khi Khách hàng thanh toán khoản vay đến hạn</p>
                </li>
                <li style="margin: 0px 0px 5px; padding: 0px; list-style-type: unset; font-family: inherit; font-size: inherit; color: inherit;">
                    <p style="margin-bottom: 10px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit;">Ứng dụng chỉ được gỡ cài đặt sau khi Khách hàng tất toán khoản vay</p>
                </li>
                <li style="margin: 0px 0px 5px; padding: 0px; list-style-type: unset; font-family: inherit; font-size: inherit; color: inherit;">
                    <p style="margin-bottom: 10px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit;">Số điện thoại đăng ký bắt buộc phải lắp trên điện thoại Galaxy đang trả góp qua SF+</p>
                </li>
                <li style="margin: 0px 0px 5px; padding: 0px; list-style-type: unset; font-family: inherit; font-size: inherit; color: inherit;">
                    <p style="margin-bottom: 10px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit;">Mỗi khách hàng chỉ được tham gia trả góp qua Samsung Finance+ (SF+) một lần tại một thời điểm. Muốn tham gia lại, khách hàng cần tất toán khoản vay hiện tại trước.</p>
                </li>
            </ul>
            <p class="tg-p4">
                <span class="tg-span5"></span>
            </p>
            <p class="tg-p4">
                <span style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: rgb(255, 0, 0); vertical-align: baseline;">
                    <span class="tg-span5">V. Trả góp qua Kredivo</span>
                </span>
            </p>
            <p class="tg-p4">
                <span class="tg-span5">1. Tên chương trình: Ưu đãi trả góp qua Kredivo</span>
            </p>
            <p class="tg-p4">
                <span class="tg-span5">- Nội dung ưu đãi</span>
            </p>
            <table class="tg-table">
                <tbody class="tg-tbody">
                    <tr class="tg-tr">
                        <td style="margin: 0px; padding: 0.4em; font-family: inherit; font-size: inherit; color: inherit; position: relative; border: 1px solid rgb(225, 225, 225); background-clip: padding-box; width: 396px; text-align: center;">
                            <span class="tg-span5">Nội dung ưu đãi</span>
                            <div class="sun-editor_resizer" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; position: absolute; top: 0px; right: 0px; width: 5px; cursor: col-resize; user-select: none; caret-color: transparent; height: 30.88px;"></div>
                            <span class="tg-span5"></span>
                        </td>
                        <td style="margin: 0px; padding: 0.4em; font-family: inherit; font-size: inherit; color: inherit; position: relative; border: 1px solid rgb(225, 225, 225); background-clip: padding-box; width: 318px;">
                            <div style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; text-align: center;">
                                <span class="tg-span5">Đối tượng áp dụng: Người dùng mới</span>
                            </div>
                            <div class="sun-editor_resizer" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; position: absolute; top: 0px; right: 0px; width: 5px; cursor: col-resize; user-select: none; caret-color: transparent; height: 30.88px;"></div>
                        </td>
                        <td class="tg-td2">
                            <div style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; text-align: center;">
                                <span class="tg-span5">Đối tượng áp dụng: Người dùng hiện hữu</span>
                            </div>
                            <div class="sun-editor_resizer" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; position: absolute; top: 0px; right: 0px; width: 5px; cursor: col-resize; user-select: none; caret-color: transparent; height: 30.88px; text-align: center;"></div>
                        </td>
                    </tr>
                    <tr class="tg-tr">
                        <td class="tg-td2">
                            <div class="tg-tbody">Giảm 50% tối đa 100k</div>
                            <div class="sun-editor_resizer" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; position: absolute; top: 0px; right: 0px; width: 5px; cursor: col-resize; user-select: none; caret-color: transparent; height: 30.88px;"></div>
                        </td>
                        <td class="tg-td2">
                            <div class="tg-tbody">x</div>
                            <div class="sun-editor_resizer" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; position: absolute; top: 0px; right: 0px; width: 5px; cursor: col-resize; user-select: none; caret-color: transparent; height: 30.88px;"></div>
                        </td>
                        <td class="tg-td2">
                            <div class="tg-tbody">
                                <br class="tg-tbody">
                            </div>
                            <div class="sun-editor_resizer" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; position: absolute; top: 0px; right: 0px; width: 5px; cursor: col-resize; user-select: none; caret-color: transparent; height: 30.88px;"></div>
                        </td>
                    </tr>
                    <tr class="tg-tr">
                        <td class="tg-td2">
                            <div class="tg-tbody">Giảm 5% tối đa 200k</div>
                            <div class="sun-editor_resizer" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; position: absolute; top: 0px; right: 0px; width: 5px; cursor: col-resize; user-select: none; caret-color: transparent; height: 30.88px;"></div>
                        </td>
                        <td class="tg-td2">
                            <div class="tg-tbody">
                                <br class="tg-tbody">
                            </div>
                            <div class="sun-editor_resizer" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; position: absolute; top: 0px; right: 0px; width: 5px; cursor: col-resize; user-select: none; caret-color: transparent; height: 30.88px;"></div>
                        </td>
                        <td class="tg-td2">
                            <div class="tg-tbody">x</div>
                            <div class="sun-editor_resizer" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; position: absolute; top: 0px; right: 0px; width: 5px; cursor: col-resize; user-select: none; caret-color: transparent; height: 30.88px;"></div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <p class="tg-p4">
                <span style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: rgb(102, 0, 255); vertical-align: baseline;">
                    <span class="tg-span5">Lưu ý:</span>
                </span>
            </p>
            <p class="tg-p4">
                <span style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: rgb(0, 85, 255); vertical-align: baseline;">1. Với voucher giảm 5% tối đa 200k chỉ áp dụng cho KH thoả mãn các điều kiện sau:</span>
            </p>
            <p class="tg-p4">
                <span style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: rgb(0, 85, 255); vertical-align: baseline;">- Thực hiện giao dịch từ lần thứ 2 qua Kredivo</span>
            </p>
            <p class="tg-p4">
                <span style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: rgb(0, 85, 255); vertical-align: baseline;">- Kì hạn trả góp: 6/12 tháng</span>
            </p>
            <p class="tg-p4">
                <span style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: rgb(0, 85, 255); vertical-align: baseline;">- Giá trị đơn hàng tối thiểu: 700.000đ</span>
            </p>
            <p class="tg-p4">2. Voucher chỉ được áp dụng 1 lần/người trong thời gian diễn ra khuyến mãi</p>
            <p class="tg-p4">3.Voucher sẽ không được sử dụng lại nếu đơn hàng bị hủy</p>
            <p class="tg-p4">
                <span class="tg-span5">c. Thông tin chi tiết về các gói trả góp Kredivo</span>
            </p>
            <table class="tg-table">
                <tbody class="tg-tbody">
                    <tr class="tg-tr">
                        <td class="tg-td2">
                            <div class="tg-tbody">
                                <br class="tg-tbody">
                            </div>
                            <div class="sun-editor_resizer" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; position: absolute; top: 0px; right: 0px; width: 5px; cursor: col-resize; user-select: none; caret-color: transparent; height: 30.88px;"></div>
                        </td>
                        <td class="tg-td2">
                            <div class="tg-tbody">
                                <span class="tg-span5">Thanh toán sau 30 ngày</span>
                            </div>
                            <div class="sun-editor_resizer" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; position: absolute; top: 0px; right: 0px; width: 5px; cursor: col-resize; user-select: none; caret-color: transparent; height: 30.88px;"></div>
                        </td>
                        <td class="tg-td2">
                            <div class="tg-tbody">
                                <span class="tg-span5">Thanh toán sau 3 tháng</span>
                            </div>
                            <div class="sun-editor_resizer" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; position: absolute; top: 0px; right: 0px; width: 5px; cursor: col-resize; user-select: none; caret-color: transparent; height: 30.88px;"></div>
                        </td>
                        <td class="tg-td2">
                            <div class="tg-tbody">
                                <span class="tg-span5">Trả góp 6-12 tháng</span>
                            </div>
                            <div class="sun-editor_resizer" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; position: absolute; top: 0px; right: 0px; width: 5px; cursor: col-resize; user-select: none; caret-color: transparent; height: 30.88px;"></div>
                        </td>
                    </tr>
                    <tr class="tg-tr">
                        <td class="tg-td2">
                            <div class="tg-tbody">
                                <span class="tg-span5">Sản phẩm áp dụng</span>
                            </div>
                            <div class="sun-editor_resizer" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; position: absolute; top: 0px; right: 0px; width: 5px; cursor: col-resize; user-select: none; caret-color: transparent; height: 30.88px;"></div>
                        </td>
                        <td class="tg-td2">
                            <div class="tg-tbody">Tất cả sản phẩm</div>
                            <div class="sun-editor_resizer" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; position: absolute; top: 0px; right: 0px; width: 5px; cursor: col-resize; user-select: none; caret-color: transparent; height: 30.88px;"></div>
                        </td>
                        <td class="tg-td2">
                            <div class="tg-tbody">Tất cả sản phẩm</div>
                            <div class="sun-editor_resizer" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; position: absolute; top: 0px; right: 0px; width: 5px; cursor: col-resize; user-select: none; caret-color: transparent; height: 30.88px;"></div>
                        </td>
                        <td class="tg-td2">
                            <div class="tg-tbody">Tất cả sản phẩm</div>
                            <div class="sun-editor_resizer" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; position: absolute; top: 0px; right: 0px; width: 5px; cursor: col-resize; user-select: none; caret-color: transparent; height: 30.88px;"></div>
                        </td>
                    </tr>
                    <tr class="tg-tr">
                        <td class="tg-td2">
                            <div class="tg-tbody">
                                <span class="tg-span5">Mức giao dịch</span>
                            </div>
                            <div class="sun-editor_resizer" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; position: absolute; top: 0px; right: 0px; width: 5px; cursor: col-resize; user-select: none; caret-color: transparent; height: 30.88px;"></div>
                        </td>
                        <td class="tg-td2">
                            <div class="tg-tbody">
                                Min: 0đ<br class="tg-tbody">Max: 5.000.000đ
                            </div>
                            <div class="sun-editor_resizer" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; position: absolute; top: 0px; right: 0px; width: 5px; cursor: col-resize; user-select: none; caret-color: transparent; height: 30.88px;"></div>
                        </td>
                        <td class="tg-td2">
                            <div class="tg-tbody">
                                Min: 800.000đ<br class="tg-tbody">
                                Max: 5.000.000đ (với người dùng cơ bản)<br class="tg-tbody">Max: 50.000.000đ (Với người dùng cao cấp)
                            </div>
                            <div class="sun-editor_resizer" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; position: absolute; top: 0px; right: 0px; width: 5px; cursor: col-resize; user-select: none; caret-color: transparent; height: 30.88px;"></div>
                        </td>
                        <td class="tg-td2">
                            <div class="tg-tbody">
                                Min: 750.000đ<br class="tg-tbody">Max: 50.000.000đ
                            </div>
                            <div class="sun-editor_resizer" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; position: absolute; top: 0px; right: 0px; width: 5px; cursor: col-resize; user-select: none; caret-color: transparent; height: 30.88px;"></div>
                        </td>
                    </tr>
                    <tr class="tg-tr">
                        <td class="tg-td2">
                            <div class="tg-tbody">
                                <span class="tg-span5">Áp dụng cho</span>
                            </div>
                            <div class="sun-editor_resizer" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; position: absolute; top: 0px; right: 0px; width: 5px; cursor: col-resize; user-select: none; caret-color: transparent; height: 30.88px;"></div>
                        </td>
                        <td class="tg-td2">
                            <div class="tg-tbody">Người dùng cơ bản, Người dùng cao cấp</div>
                            <div class="sun-editor_resizer" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; position: absolute; top: 0px; right: 0px; width: 5px; cursor: col-resize; user-select: none; caret-color: transparent; height: 30.88px;"></div>
                        </td>
                        <td class="tg-td2">
                            <div class="tg-tbody">Người dùng cơ bản, Người dùng cao cấp</div>
                            <div class="sun-editor_resizer" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; position: absolute; top: 0px; right: 0px; width: 5px; cursor: col-resize; user-select: none; caret-color: transparent; height: 30.88px;"></div>
                        </td>
                        <td class="tg-td2">
                            <div class="tg-tbody">Người dùng cao cấp</div>
                            <div class="sun-editor_resizer" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; position: absolute; top: 0px; right: 0px; width: 5px; cursor: col-resize; user-select: none; caret-color: transparent; height: 30.88px;"></div>
                        </td>
                    </tr>
                    <tr class="tg-tr">
                        <td class="tg-td2">
                            <div class="tg-tbody">
                                <span class="tg-span5">Lãi suất</span>
                            </div>
                            <div class="sun-editor_resizer" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; position: absolute; top: 0px; right: 0px; width: 5px; cursor: col-resize; user-select: none; caret-color: transparent; height: 30.88px;"></div>
                        </td>
                        <td class="tg-td2">
                            <div class="tg-tbody">0%</div>
                            <div class="sun-editor_resizer" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; position: absolute; top: 0px; right: 0px; width: 5px; cursor: col-resize; user-select: none; caret-color: transparent; height: 30.88px;"></div>
                        </td>
                        <td class="tg-td2">
                            <div class="tg-tbody">0%</div>
                            <div class="sun-editor_resizer" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; position: absolute; top: 0px; right: 0px; width: 5px; cursor: col-resize; user-select: none; caret-color: transparent; height: 30.88px;"></div>
                        </td>
                        <td class="tg-td2">
                            <div class="tg-tbody">Cố định 2.5%/tháng</div>
                            <div class="sun-editor_resizer" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; position: absolute; top: 0px; right: 0px; width: 5px; cursor: col-resize; user-select: none; caret-color: transparent; height: 30.88px;"></div>
                        </td>
                    </tr>
                    <tr class="tg-tr">
                        <td class="tg-td2">
                            <div class="tg-tbody">
                                <span class="tg-span5">Phí dịch vụ</span>
                            </div>
                            <div class="sun-editor_resizer" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; position: absolute; top: 0px; right: 0px; width: 5px; cursor: col-resize; user-select: none; caret-color: transparent; height: 30.88px;"></div>
                        </td>
                        <td class="tg-td2">
                            <div class="tg-tbody">1%</div>
                            <div class="sun-editor_resizer" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; position: absolute; top: 0px; right: 0px; width: 5px; cursor: col-resize; user-select: none; caret-color: transparent; height: 30.88px;"></div>
                        </td>
                        <td class="tg-td2">
                            <div class="tg-tbody">
                                - Với người dùng cao cấp: 1%/tháng<br class="tg-tbody">- Với người dùng cơ bản: 2%/tháng
                            </div>
                            <div class="sun-editor_resizer" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; position: absolute; top: 0px; right: 0px; width: 5px; cursor: col-resize; user-select: none; caret-color: transparent; height: 30.88px;"></div>
                        </td>
                        <td class="tg-td2">
                            <div class="tg-tbody">0%</div>
                            <div class="sun-editor_resizer" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; position: absolute; top: 0px; right: 0px; width: 5px; cursor: col-resize; user-select: none; caret-color: transparent; height: 30.88px;"></div>
                        </td>
                    </tr>
                    <tr class="tg-tr">
                        <td class="tg-td2">
                            <div class="tg-tbody">
                                <span class="tg-span5">Phí lãi chậm trả cho KH</span>
                            </div>
                            <div class="sun-editor_resizer" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; position: absolute; top: 0px; right: 0px; width: 5px; cursor: col-resize; user-select: none; caret-color: transparent; height: 30.88px;"></div>
                        </td>
                        <td class="tg-td2">
                            <div class="tg-tbody">5.25%</div>
                            <div class="sun-editor_resizer" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; position: absolute; top: 0px; right: 0px; width: 5px; cursor: col-resize; user-select: none; caret-color: transparent; height: 30.88px;"></div>
                        </td>
                        <td class="tg-td2">
                            <div class="tg-tbody">5.25%/tháng</div>
                            <div class="sun-editor_resizer" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; position: absolute; top: 0px; right: 0px; width: 5px; cursor: col-resize; user-select: none; caret-color: transparent; height: 30.88px;"></div>
                        </td>
                        <td class="tg-td2">
                            <div class="tg-tbody">5.25%/tháng</div>
                            <div class="sun-editor_resizer" style="margin: 0px; padding: 0px; font-family: inherit; font-size: inherit; color: inherit; position: absolute; top: 0px; right: 0px; width: 5px; cursor: col-resize; user-select: none; caret-color: transparent; height: 30.88px;"></div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <p class="tg-p4">
                <span class="tg-span5">Lưu ý:</span>
            </p>
            <p class="tg-p4">
                <span class="tg-span5">- Người dùng cơ bản: được cấp hạn mức tối đa 6 triệu, có 2 kỳ hạn 30 ngày và 3 tháng.</span>
            </p>
            <p class="tg-p4">
                <span class="tg-span5">- Người dùng cao cấp: được cấp hạn mức lên tới 50triệu, có thêm 2 kỳ hạn 6 và 12 tháng</span>
            </p>
            <p class="tg-p4">
                <span class="tg-span5">d. Quy trình đăng kí người dùng mới Kredivo</span>
            </p>
            <p class="tg-p4">- Bước 1:Người dùng BẮT BUỘC tải xuống Kredivo theo link của Hoàng Hà:https://kredivo-vn.onelink.me/vxb0/hoanghamobile</p>
            <p class="tg-p4">Hoặc theo mã QR tại file đính kèm</p>
            <p class="tg-p4">- Bước 2:Sau khi ứng dụng Kredivo Việt Nam tải về hoàn tất, bạn mở ứng dụng và đăng ký tài khoản theo như hướng dẫn, bao gồm bước chụp giấy tờ tùy thân và chân dung kèm chứng minh địa chỉ.</p>
            <p class="tg-p4">Lưu ý: Tài khoản cần phải chờ duyệt từ đội ngũ Kredivo tối đa 24 giờ trước khi có thể sử dụng. Nếu tài khoản đáp ứng đủ các điều kiện, bạn đã có thể sử dụng app Kredivo Việt Nam. (từ 22h đến 8h sáng hôm sau, Kredivo sẽ duyệt chậm hơn)</p>
            <p class="tg-p4">- Bước 3:Người dùng có thể nhận được kết quả của họ trong vòng 5 phút và nếu được chấp thuận, sẽ có giới hạn tín dụng ngay lập tức để sử dụng trên Nhấp vào một bức ảnh của quốc gia của mình Hoàng Hà Mobile</p>
            <p class="tg-p4">
                <span class="tg-span5">e. Quy trình thanh toán:</span>
            </p>
            <p class="tg-p4">- Bước 1:Truy cập Website Hoàng Hà Mobile, sau đó thêm sản phẩm muốn mua vào giỏ hàng</p>
            <p class="tg-p4">- Bước 2: Tiến hành nhập đầy đủ thông tin đặt hàng tại Hoàng Hà Mobile, sau đó hoàn tất đặt hàng =&gt;Hệ thống sẽ chuyển sang giao diện thanh toán, khách hàng chọn hình thức thanh toán bằng Kredivo</p>
            <p class="tg-p4">- Bước 3: KH được chuyển sang giao diện thanh toán của Kredivo</p>
            <p class="tg-p4">- Bước 4: KH hoàn tất thanh toán bằng Kredivo bằng cách nhập mã PIN nhận được qua SMS.</p>
            <p class="tg-p4">
                <br>
            </p>
            <p class="tg-p4">
                <br>
            </p>
            <p style="box-sizing: border-box; margin: 0px 0px 10px; padding: 0px; white-space: normal; font-family: inherit; font-size: inherit; color: inherit; display: block;"></p>
            <p style="box-sizing: border-box; margin: 0px 0px 10px; padding: 0px; white-space: normal; font-family: inherit; font-size: inherit; color: inherit; display: block;"></p>
            <p dir="ltr" style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt; padding: 0pt 0pt 19.5pt;">
                <span class="tg-span">Hoàng Hà Mobile xin trân trọng cảm ơn các quý khách hàng!</span>
            </p>
            <p>
                <br>
            </p>
        </div>
    </section>
    <iframe src="https://asia.creativecdn.com/tags?id=pr_n4X0y6ApZyJaHX1dNxQd&amp;ncm=1" width="1" height="1" scrolling="no" frameBorder="0" style="display: none;"></iframe>
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