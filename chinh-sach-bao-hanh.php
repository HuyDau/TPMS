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
    
    
    <title>TPMS  - Chính Sách Bảo Hành</title>
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
                    <a href="index.php" title="TPMS  - Hệ Thống Bán Lẻ Sản Phẩm Thiết Bị Công Nghệ">
                        <img src="assets/images/logo/logo.png" alt="TPMS  - Hệ Thống Bán Lẻ Sản Phẩm Thiết Bị Công Nghệ">
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
                    <a itemprop="item" href="index.php"><span itemprop="name" content="Trang chủ"><i class="icon-home" title="Trang chủ"></i> Trang Chủ</span></a>
                    <meta itemprop="position" content="1" />
                </li>
                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <a itemprop="item" href="chinh-sach-bao-hanh.php" title="Chính Sách Bảo Hành" class="actived"><span itemprop="name" content="Chính Sách Bảo Hành">Chính Sách Bảo Hành</span></a>
                    <meta itemprop="position" content="2" />
                </li>
            </ol>
        </div>
    </section>
    <section>
        <div class="container page-text">
            <p class="MsoNormal"><span lang="vi">
                    <font color="#000000"><b>Áp dụng từ ngày 08/06/2022:</b>
                        <o:p></o:p>
                    </font>
                </span>
            </p>

            <p class="MsoNormal"><span lang="vi">
                    <font color="#000000"><b>TPMS chân
                            thành cảm ơn Quý khách hàng, dưới đây là chi tiết chính sách bảo hành của Hoàng
                            Hà Mobile áp dụng với tất cả các sản phẩm, TPMS luôn nỗ lực để có được
                            chất lượng dịch vụ tốt nhất dành cho Quý khách hàng.</b>
                        <o:p></o:p>
                    </font>
                </span>
            </p>

            <p class="MsoNormal"><span lang="vi">
                    <font color="#000000"><b><span style="font-size: 18px;">1. Chính sách đổi mới miễn
                                phí và quy định nhập lại, trả lại</span></b>
                        <o:p></o:p>
                    </font>
                </span>
            </p>

            <table class="MsoNormalTable" border="1" cellspacing="0" cellpadding="0" width="930" style="border: none;">
                <tbody>
                    <tr>
                        <td width="312" valign="top" style="width:234.2pt;border:solid black 1.0pt;padding:5.0pt 5.0pt 5.0pt 5.0pt">
                            <p class="MsoNormal"><span lang="vi">
                                    <font color="#000000"><b>Loại sản phẩm</b>
                                        <o:p></o:p>
                                    </font>
                                </span></p>
                        </td>
                        <td width="171" valign="top" style="width:128.25pt;border:solid black 1.0pt;border-left:none;padding:5.0pt 5.0pt 5.0pt 5.0pt">
                            <p class="MsoNormal"><span lang="vi">
                                    <font color="#000000"><b>Đổi mới miễn phí*</b>
                                        <o:p></o:p>
                                    </font>
                                </span></p>
                        </td>
                        <td width="447" valign="top" style="width:335.25pt;border:solid black 1.0pt;border-left:none;padding:5.0pt 5.0pt 5.0pt 5.0pt">
                            <p class="MsoNormal"><span lang="vi">
                                    <font color="#000000"><b>Quy định nhập lại, trả
                                            lại</b>
                                        <o:p></o:p>
                                    </font>
                                </span></p>
                        </td>
                    </tr>
                    <tr style="height:20.0pt">
                        <td width="312" valign="top" style="width:234.2pt;border:solid black 1.0pt;border-top:none;padding:5.0pt 5.0pt 5.0pt 5.0pt;height:20.0pt">
                            <p class="MsoNormal"><span lang="vi">
                                    <font color="#000000">Laptop, Màn hình<o:p></o:p>
                                    </font>
                                </span></p>
                        </td>
                        <td width="171" rowspan="4" valign="top" style="width:128.25pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:5.0pt 5.0pt 5.0pt 5.0pt;height:20.0pt">
                            <p class="MsoNormal"><span lang="vi">
                                    <font color="#000000">30 ngày<o:p></o:p>
                                    </font>
                                </span></p>
                        </td>
                        <td width="447" rowspan="4" valign="top" style="width:335.25pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:5.0pt 5.0pt 5.0pt 5.0pt;height:20.0pt">
                            <p class="MsoNormal"><span lang="vi">
                                    <font color="#000000">Trong vòng 30 ngày đầu nhập lại máy, trừ phí 20% trên giá hiện tại
                                        (hoặc trên giá tại thời điểm mua hàng nếu giá mua này thấp hơn giá hiện tại), Các
                                        sản phẩm màn hình không hỗ trợ nhập lại<o:p></o:p>
                                    </font>
                                </span></p>
                            <p class="MsoNormal"><span lang="vi">
                                    <font color="#000000">Sau 30 ngày, nhập lại
                                        theo giá thoả thuận<i><b> </b>(Riêng đối với dòng điện thoại cao cấp XOR: Không hỗ
                                            trợ nhập lại, trả lại! )</i></font>
                                </span></p>
                            <p class="MsoNormal"><span lang="vi">
                                    <font color="#000000">
                                        <o:p></o:p>
                                    </font>
                                </span></p>
                        </td>
                    </tr>
                    <tr style="height:20.0pt">
                        <td width="312" valign="top" style="width:234.2pt;border:solid black 1.0pt;border-top:none;padding:5.0pt 5.0pt 5.0pt 5.0pt;height:20.0pt">
                            <p class="MsoNormal"><span lang="vi">
                                    <font color="#000000">Điện thoại/Máy tính bảng<o:p></o:p>
                                    </font>
                                </span>
                            </p>
                        </td>
                    </tr>
                    <tr style="height:20.0pt">
                        <td width="312" valign="top" style="width:234.2pt;border:solid black 1.0pt;border-top:none;padding:5.0pt 5.0pt 5.0pt 5.0pt;height:20.0pt">
                            <p class="MsoNormal"><span lang="vi">
                                    <font color="#000000">iPhone <o:p></o:p>
                                    </font>
                                </span></p>
                        </td>
                    </tr>
                    <tr style="height:20.0pt">
                        <td width="312" valign="top" style="width:234.2pt;border:solid black 1.0pt;border-top:none;padding:5.0pt 5.0pt 5.0pt 5.0pt;height:20.0pt">
                            <p class="MsoNormal"><span lang="vi">
                                    <font color="#000000">Macbook/iPad/iMac/Apple
                                        Watch<o:p></o:p>
                                    </font>
                                </span></p>
                        </td>
                    </tr>
                    <tr style="height:20.0pt">
                        <td width="312" valign="top" style="width:234.2pt;border:solid black 1.0pt;border-top:none;padding:5.0pt 5.0pt 5.0pt 5.0pt;height:20.0pt">
                            <p class="MsoNormal"><span lang="vi">
                                    <font color="#000000">Samsung Watch<o:p></o:p>
                                    </font>
                                </span></p>
                        </td>
                        <td width="171" valign="top" style="width:128.25pt;border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:5.0pt 5.0pt 5.0pt 5.0pt;height:20.0pt">
                            <p class="MsoNormal"><span lang="vi">
                                    <font color="#000000">30 ngày<o:p></o:p>
                                    </font>
                                </span>
                            </p>
                        </td>
                        <td width="447" valign="top" style="width:335.25pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:5.0pt 5.0pt 5.0pt 5.0pt;height:20.0pt">
                            <p class="MsoNormal"><span lang="vi">
                                    <font color="#000000">Trong vòng 30 ngày đầu nhập lại máy, trừ phí 30% trên giá hiện tại
                                        (hoặc trên giá tại thời điểm mua hàng nếu giá mua này thấp hơn giá hiện tại)<o:p>
                                        </o:p>
                                    </font>
                                </span></p>
                            <p class="MsoNormal"><span lang="vi">
                                    <font color="#000000">Sau 30 ngày, nhập lại
                                        theo giá thoả thuận<o:p></o:p>
                                    </font>
                                </span></p>
                        </td>
                    </tr>
                    <tr style="height:20.0pt">
                        <td width="312" valign="top" style="width:234.2pt;border:solid black 1.0pt;border-top:none;padding:5.0pt 5.0pt 5.0pt 5.0pt;height:20.0pt">
                            <p class="MsoNormal"><span lang="vi">
                                    <font color="#000000">Smart Watch<o:p></o:p>
                                    </font>
                                </span></p>
                        </td>
                        <td width="171" rowspan="2" valign="top" style="width:128.25pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:5.0pt 5.0pt 5.0pt 5.0pt;height:20.0pt">
                            <p class="MsoNormal"><span lang="vi">
                                    <font color="#000000">15 ngày&nbsp;(Riêng Máy lọc không khí: 30 ngày)&nbsp;<o:p></o:p>
                                    </font>
                                </span></p>
                        </td>
                        <td width="447" rowspan="2" valign="top" style="width:335.25pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:5.0pt 5.0pt 5.0pt 5.0pt;height:20.0pt">
                            <p class="MsoNormal"><span lang="vi">
                                    <font color="#000000">Không hỗ trợ nhập lại<o:p></o:p>
                                    </font>
                                </span></p>
                        </td>
                    </tr>
                    <tr style="height:20.0pt">
                        <td width="312" valign="top" style="width:234.2pt;border:solid black 1.0pt;border-top:none;padding:5.0pt 5.0pt 5.0pt 5.0pt;height:20.0pt">
                            <p class="MsoNormal"><span lang="vi">
                                    <font color="#000000">Smart Home<o:p></o:p>
                                    </font>
                                </span></p>
                        </td>
                    </tr>
                    <tr style="height:20.0pt">
                        <td width="312" valign="top" style="width:234.2pt;border:solid black 1.0pt;border-top:none;padding:5.0pt 5.0pt 5.0pt 5.0pt;height:20.0pt">
                            <p class="MsoNormal"><span lang="vi">
                                    <font color="#000000">Phụ Kiện &lt; 1 triệu<o:p></o:p>
                                    </font>
                                </span></p>
                        </td>
                        <td width="171" rowspan="2" valign="top" style="width:128.25pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:5.0pt 5.0pt 5.0pt 5.0pt;height:20.0pt">
                            <p class="MsoNormal"><span lang="vi">
                                    <font color="#000000">15 ngày<o:p></o:p>
                                    </font>
                                </span></p>
                        </td>
                        <td width="447" valign="top" style="width:335.25pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:5.0pt 5.0pt 5.0pt 5.0pt;height:20.0pt">
                            <p class="MsoNormal"><span lang="vi">
                                    <font color="#000000">Không hỗ trợ nhập lại<o:p></o:p>
                                    </font>
                                </span></p>
                        </td>
                    </tr>
                    <tr style="height:20.0pt">
                        <td width="312" valign="top" style="width:234.2pt;border:solid black 1.0pt;border-top:none;padding:5.0pt 5.0pt 5.0pt 5.0pt;height:20.0pt">
                            <p class="MsoNormal"><span lang="vi">
                                    <font color="#000000">Phụ kiện &gt; 1 triệu<o:p></o:p>
                                    </font>
                                </span></p>
                        </td>
                        <td width="447" valign="top" style="width:335.25pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:5.0pt 5.0pt 5.0pt 5.0pt;height:20.0pt">
                            <p class="MsoNormal"><span lang="vi">
                                    <font color="#000000">Không hỗ trợ nhập lại<o:p></o:p>
                                    </font>
                                </span></p>
                        </td>
                    </tr>
                    <tr style="height:20.0pt">
                        <td width="312" valign="top" style="width:234.2pt;border:solid black 1.0pt;border-top:none;padding:5.0pt 5.0pt 5.0pt 5.0pt;height:20.0pt">
                            <p class="MsoNormal"><span lang="vi">
                                    <font color="#000000">Riêng Tai nghe Airpods<o:p></o:p>
                                    </font>
                                </span></p>
                        </td>
                        <td width="171" valign="top" style="width:128.25pt;border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:5.0pt 5.0pt 5.0pt 5.0pt;height:20.0ptt">
                            <p class="MsoNormal"><span lang="vi">
                                    <font color="#000000">15 ngày<o:p></o:p>
                                    </font>
                                </span></p>
                        </td>
                        <td width="447" valign="top" style="width:335.25pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:5.0pt 5.0pt 5.0pt 5.0pt;height:20.0pt">
                            <p class="MsoNormal"><span lang="vi"
                                    style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">
                                    <font color="#000000">Trong vòng 15 ngày đầu nhập lại máy, trừ phí 15% trên giá hiện tại
                                        (hoặc trên giá tại thời điểm mua hàng nếu giá mua này thấp hơn giá hiện tại)<o:p>
                                        </o:p>
                                    </font>
                                </span></p>
                            <p class="MsoNormal"><span lang="vi"
                                    style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">
                                    <font color="#000000">Sau 15 ngày nhập lại máy theo giá thoả thuận<o:p></o:p>
                                    </font>
                                </span></p>
                        </td>
                    </tr>
                    <tr style="height:20.0pt">
                        <td width="312" valign="top" style="width:234.2pt;border:solid black 1.0pt;border-top:none;padding:5.0pt 5.0pt 5.0pt 5.0pt;height:20.0pt">
                            <p class="MsoNormal"><span lang="vi">
                                    <font color="#000000">Tivi <o:p></o:p>
                                    </font>
                                </span></p>
                        </td>
                        <td width="171" valign="top" style="width:128.25pt;border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:5.0pt 5.0pt 5.0pt 5.0pt;height:20.0ptt">
                            <p class="MsoNormal"><span lang="vi">
                                    <font color="#000000">30 ngày<o:p></o:p>
                                    </font>
                                </span></p>
                        </td>
                        <td width="447" valign="top" style="width:335.25pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:5.0pt 5.0pt 5.0pt 5.0pt;height:20.0pt">
                            <p class="MsoNormal"><span lang="vi">
                                    <font color="#000000">Không hỗ trợ nhập lại <o:p></o:p>
                                    </font>
                                </span></p>
                        </td>
                    </tr>
                </tbody>
            </table>

            <p class="MsoNormal"><span lang="vi">
                    <font color="#000000">*Đổi mới miễn phí: <o:p></o:p>
                    </font>
                </span>
            </p>

            <p class="MsoNormal"><span lang="vi">
                    <font color="#000000">Áp dụng với sản phẩm có
                        lỗi phần cứng do nhà sản xuất, với một số trường hợp nhất định, Hoàng Hà Mobile
                        sẽ gửi sản phẩm thẩm định lỗi tại trung tâm bảo hành của hãng, thời gian thẩm định
                        tuỳ thuộc vào TTBH của hãng. TPMS cam kết sẽ luôn vì quyền lợi của
                        quý khách hàng!<o:p></o:p>
                    </font>
                </span>
            </p>

            <p class="MsoNormal"><span lang="vi">
                    <font color="#000000">Lỗi phần mềm không được
                        áp dụng trong Trường hợp này mà chỉ khắc phục lỗi phần mềm.<o:p></o:p>
                    </font>
                </span>
            </p>

            <p class="MsoNormal"><span lang="vi">
                    <font color="#000000"><b>Điều kiện đổi mới và trả
                            lại:</b>
                        <o:p></o:p>
                    </font>
                </span>
            </p>

            <p class="MsoNormal"><span lang="vi">
                    <font color="#000000">Hình thức máy và hộp máy
                        như mới<o:p></o:p>
                    </font>
                </span>
            </p>

            <p class="MsoNormal"><span lang="vi">
                    <font color="#000000">Phụ kiện và các loại quà
                        tặng đi kèm: còn đầy đủ, nguyên vẹn, không có dấu hiệu móp mép, cong vênh<o:p></o:p>
                    </font>
                </span>
            </p>

            <p class="MsoNormal"><span lang="vi">
                    <font color="#000000">Máy không có dấu hiệu
                        tác động từ bên ngoài: Rơi, vỡ, móp méo, cong vênh, trầy xước, bị dung dịch hoá
                        chất và chất lỏng xâm nhập vào.<o:p></o:p>
                    </font>
                </span>
            </p>

            <p class="MsoNormal"><span lang="vi">
                    <font color="#000000">Máy đã được gỡ các loại
                        tài khoản cá nhân như iCloud, Gmail, Mi account … <o:p></o:p>
                    </font>
                </span>
            </p>

            <p class="MsoNormal"><span lang="vi"
                    style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">
                    <font color="#000000">Lỗi điểm chết màn hình : màn hình có từ 3 điểm chết trở
                        lên hoặc 1 điểm chết có kích thước lớn hơn 1mm đối với điện thoại và từ 5 điểm
                        chết trở lên đối với laptop.</font>
                </span>
            </p>

            <p class="MsoNormal"><span lang="vi">
                    <font color="#000000"><b><span style="font-size: 18px;">2. Chính sách về bảo hành</span></b></font>
                </span>
            </p>
            <p class="MsoNormal"><span lang="VI">Hoàng Hà Mobile
                    cam kết tất cả các sản phẩm bán ra tại TPMS đều là sản phẩm chính
                    hãng, và nhận được các chế độ bảo hành chính hãng.<o:p></o:p></span>
                </p>
            <p class="MsoNormal"><span lang="VI">Quý khách hàng có
                    thể tới trực tiếp các Trung tâm bảo hành chính hãng hoặc tới các cửa hàng Hoàng
                    Hà Mobile gần nhất để được tiếp nhận bảo hành chính hãng.<o:p></o:p></span>
                </p>
            <p class="MsoNormal"><span lang="VI">Quý khách xem địa
                    chỉ trung tâm bảo hành chính hãng tại đây:
                    https://hoanghamobile.com/trung-tam-bao-hanh<o:p></o:p></span>
                </p>
            <p class="MsoNormal"><span lang="VI">Thời gian bảo
                    hành áp dụng cho máy mới: 12 tháng hoặc theo quy định của hãng.<o:p></o:p></span>
                </p>
            <p class="MsoNormal"><span lang="vi">
                <span lang="VI" style="font-size:12.0pt;font-family:Calibri,sans-serif;">Thời gian bảo hành áp dụng cho
                    máy cũ: 6 tháng hoặc
                    theo quy định của Hoàng Hà.</span></span>
            </p>
            <table class="MsoNormalTable" border="0" cellspacing="0" cellpadding="0" width="936"
                style="width: 701.7pt; margin-left: -0.25pt;">
                <tbody>
                    <tr style="height:15.0pt">
                        <td width="225" nowrap="" style="width:168.75pt;border:solid windowtext 1.0pt;background:#BDD7EE;padding:0in 5.4pt 0in 5.4pt;height:15.0pt">
                            <p class="MsoNormal"><b><span style="font-size:11.0pt;color:black">Nguyên tắc bảo hành<o:p></o:p></span></b></p>
                        </td>
                        <td width="463" nowrap="" valign="top" style="width:347.3pt;border:solid windowtext 1.0pt;border-left:none;padding:0in 5.4pt 0in 5.4pt;height:15.0pt">
                            <p class="MsoNormal"><b><span style="font-size:11.0pt;color:black">Điều kiện bảo hành<o:p></o:p></span></b></p>
                        </td>
                        <td width="248" nowrap="" valign="top" style="width:185.65pt;border:solid windowtext 1.0pt;border-left:none;background:#BDD7EE;padding:0in 5.4pt 0in 5.4pt;height:15.0pt">
                            <p class="MsoNormal"><b><span style="font-size:11.0pt;color:black">Lưu ý<o:p></o:p></span></b></p>
                        </td>
                    </tr>
                    <tr style="height:68.5pt">
                        <td width="225" valign="top" style="width:168.75pt;border:solid windowtext 1.0pt;border-top:none;padding: 0in 5.4pt 0in 5.4pt;height:68.5pt">
                            <p class="MsoNormal"><span style="font-size:11.0pt;color:black">•&nbsp;
                                    Sản phẩm được bảo hành miễn phí nếu sản phẩm đó còn thời hạn bảo hành
                                    được tính từ ngày quý khách mua hàng.<o:p></o:p></span></p>
                            <p class="MsoNormal"><span style="font-size:11.0pt;color:black">•&nbsp;
                                    Khi đổi sản phẩm, thời hạn bảo hành còn lại của sản phẩm cũ được
                                    chuyển sang sản phẩm tương đương<o:p></o:p></span></p>
                            <p class="MsoNormal"><span style="font-size:11.0pt;color:black">•&nbsp;
                                    Chính sách bảo hành của TPMS chỉ áp dụng cho các sản phẩm
                                    do TPMS cung cấp.<o:p></o:p></span></p>
                        </td>
                        <td width="463" valign="top" style="width:347.3pt;border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:68.5pt">
                            <p class="MsoNormal"><span style="font-size:11.0pt;color:black">•&nbsp;
                                    Bảo hành do lỗi vật liệu và gia công trên sản phẩm trong điều kiện sử
                                    dụng bình thường. Những lỗi xảy ra do sử dụng không đúng với quy cách của nhà
                                    sản xuất (chập, cháy, nổ) đều không được bảo hành.<o:p></o:p></span></p>
                            <p class="MsoNormal"><span style="font-size:11.0pt;color:black">Điều kiện bảo hành không áp dụng
                                    cho:<o:p></o:p></span></p>
                            <p class="MsoNormal"><span style="font-size:11.0pt;color:black">• Hỏng hóc do gặp sơ xuất, lạm
                                    dụng, dùng sai cách, lũ lụt, hoả hoạn, động đất hoặc những nguyên nhân bên
                                    ngoài khác.<o:p></o:p></span></p>
                            <p class="MsoNormal"><span style="font-size:11.0pt;color:black">•&nbsp;
                                    Hỏng hóc do tự ý can thiệp vào phần cứng của máy, tự ý tháo mở máy,
                                    tác động vào máy (trong đó có nâng cấp và mở rộng) bởi bất cứ cá nhân, đơn vị
                                    nào bên ngoài mà không thuộc uỷ quyền bảo hành của Hoàng Hà Mobile.<o:p></o:p></span>
                            </p>
                            <p class="MsoNormal"><span style="font-size:11.0pt;color:black">•&nbsp;
                                    Hỏng hóc do máy bị rơi vỡ va đập, cong vênh, móp, méo, trầy, lõm và bị
                                    vỡ ở các cổng, số serial đã bị xoá mờ hoặc mất.<o:p></o:p></span></p>
                            <p class="MsoNormal"><span style="font-size:11.0pt;color:black">•&nbsp;
                                    Máy bị ẩm mốc, cháy chập, bị dung dịch, hoá chất và các loại chất lỏng
                                    xâm nhập vào.<o:p></o:p></span></p>
                            <p class="MsoNormal"><span style="font-size:11.0pt;color:black">•&nbsp;
                                    Số IMEl trên máy và phiếu bảo hành không trùng khớp với nhau.<o:p></o:p></span></p>
                            <p class="MsoNormal"><span style="font-size:11.0pt;color:black">•&nbsp;
                                    Mất phiếu bảo hành của sản phẩm. Sản phẩm không thể xác định được
                                    nguồn gốc mua tại TPMS một cách hợp lệ.<o:p></o:p></span></p>
                            <p class="MsoNormal"><span style="font-size:11.0pt;color:black">•&nbsp;
                                    Phiếu bảo hành tự ý sửa đổi hoặc gạch xoá, rách nát không nhìn rõ được
                                    số IMEl, không ghi rõ ngày mua hàng<o:p></o:p></span></p>
                            <p class="MsoNormal"><span style="font-size:11.0pt;color:black">&nbsp;</span></p>
                            <p class="MsoNormal"><span style="font-size:11.0pt;color:black">•&nbsp;
                                    Tem niêm phong bảo hành bị rách, vỡ, bị dán đè hoặc bị sửa đổi<o:p></o:p></span></p>
                            <p class="MsoNormal"><span style="font-size:11.0pt;color:black">&nbsp;</span></p>
                            <p class="MsoNormal"><span style="font-size:11.0pt;color:black">•&nbsp;
                                    Tiến hành những sửa đổi không được phép đối với phần mềm của nhà cung
                                    cấp như trường hợp sản phẩm bị can thiệp phần mềm hệ thống: Root, Unlock
                                    Bootloader, Jailbreak máy.<o:p></o:p></span></p>
                            <p class="MsoNormal"><span style="font-size:11.0pt;color:black">&nbsp;</span></p>
                            <p class="MsoNormal"><span style="font-size:11.0pt;color:black">•&nbsp;
                                    Tình trạng sóng, mạng kém không ổn định do chất lượng mạng điện thoại
                                    theo khu vực<o:p></o:p></span></p>
                            <p class="MsoNormal"><span style="font-size:11.0pt;color:black">&nbsp;</span></p>
                            <p class="MsoNormal"><span style="font-size:11.0pt;color:black">•&nbsp;
                                    Không áp dụng bảo hành đối với cảm ứng và màn hình của máy vì nguyên
                                    nhân thường do bị tác động không mong muốn bởi các yếu tố bên ngoài như:
                                    nhiệt độ, độ ẩm nguồn điện và cách sử dụng.<o:p></o:p></span></p>
                        </td>
                        <td width="248" valign="top" style="width:185.65pt;border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:68.5pt">
                            <p class="MsoNormal"><span style="font-size:11.0pt;color:black">•&nbsp;
                                    Quý khách nên sử dụng sạc theo đúng quy chuẩn của nhà sản xuất (nếu
                                    không sẽ dễ gây lỗi nguồn sản phẩm)<o:p></o:p></span></p>
                            <p class="MsoNormal"><span style="font-size:11.0pt;color:black">• Quý khách vui lòng tự sao lưu tất
                                    cả các dữ liệu cá nhân trước khi mang sản phẩm tới trung tâm bảo hành, trong
                                    quá trình bảo hành TPMS không chịu trách nhiệm về mọi mất mát dữ liệu
                                    cá nhân và các ứng dụng cài đặt thêm được lưu trữ trong máy.<o:p></o:p></span></p>
                            <p class="MsoNormal"><span style="font-size:11.0pt;color:black">• Hoàng Hà không chịu trách nhiệm
                                    về phụ kiện không phải của máy khi gửi bảo hạnh như : cường lực, ốp lưng, thẻ
                                    nhớ, sim, PPF, ốp camera….<o:p></o:p></span></p>
                            <p class="MsoNormal"><span style="font-size:11.0pt;color:black">•&nbsp;
                                    Đối với các sản phẩm có đăng nhập tài khoản bảo mật như: iPhone, iPad,
                                    Samsung, Xiaomi, có đăng nhập tài khoản iCloud, MiCloud, Samsung Account, khi
                                    đến bảo hành quý khách chịu trách nhiệm đăng xuất tài khoản.<o:p></o:p></span></p>
                            <p class="MsoNormal"><span style="font-size:11.0pt;color:black">•&nbsp;
                                    Các trường hợp tự ý up ROM và chạy phần mềm khác ở ngoài Hoàng Hà
                                    Mobile, Root máy, can thiệp phần mềm ngoài Hệ thống Hoàng Hà sẽ không được
                                    bảo hành. Khách hàng khi đi bảo hành yêu cầu mang theo phiếu bảo hành.<o:p></o:p></span>
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <p class="MsoNormal"><span lang="VI">&nbsp;</span></p>

            <p class="MsoNormal"><span lang="vi">
                    <font color="#000000"><b>Thời gian tiếp nhận bảo
                            hành:</b>
                        <o:p></o:p>
                    </font>
                </span>
            </p>

            <p class="MsoNormal"><span lang="vi">
                    <font color="#000000">Tại cửa hàng Hoàng Hà
                        Mobile: Theo giờ làm việc của các cửa hàng TPMS trên cả nước<o:p></o:p>
                    </font>
                </span>
            </p>

            <p class="MsoNormal"><span lang="vi">
                    <font color="#000000">Tại TTBH Hãng: Theo giờ
                        làm việc của TTBH hãng.<o:p></o:p>
                    </font>
                </span>
            </p>

            <p class="MsoNormal"><span lang="vi">
                    <font color="#000000">&nbsp;</font>
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
                                <a href="/tin-tuc/hoang-ha-care-dich-vu-sua-chua-dien-thoai-may-tinh-bang-voi-gia-tot-nhat-thi-truong">Dịch Vụ Sửa Chữa TPMS  Care</a>
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