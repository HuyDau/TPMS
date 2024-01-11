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

