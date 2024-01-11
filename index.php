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
    <title>TPMS - Hệ thống bán lẻ thiết bị di động và công nghệ chính hãng giá tốt</title>
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
    <!-- Slick Slide -->
    <link rel="stylesheet" type="text/css" href="assets/slick/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="assets/slick/slick/slick-theme.css" />
    <!-- Bootstrap -->
    <!-- <link href="assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="assets/bootstrap/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="assets/bootstrap/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="assets/fontawesome/css/all.min.css">
    <meta property="og:image" content="assets/images/logo/logo.png" />
    <script async src="assets/js/ins.js"></script>
</head>

<body class="body-home">
    <!-- <div class="top-link">
        <span class="pulse"></span>
        <p><strong>Cơ hội sở hữu Samsung S20 FE 256GB chỉ với 6.990.000đ - SL có hạn</strong> <a href="https://hoanghamobile.com/dien-thoai-di-dong/samsung-galaxy-s20-fe-256gb-chinh-hang" target="_top">Xem chi tiết</a></p>
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
                        <a id="btnCheckOrder" href="bang-dieu-khien.php?page=order">
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
    <section class="xmas-2023">
        <!-- <div class="container">
        <div class="bg">
            <div class="img">
                <img src="assets/images/bg/logo.png">
            </div>
			
            <div class="btn">
                <a href="/giang-sinh-gia-xinh?utm_source=web&amp;utm_medium=Homebanner&amp;utm_content=xmas2023&amp;utm_campaign=xmas2023">
                    Xem ngay
                </a>
            </div>
			
        </div>
        
    </div> -->
    </section>
    
    <section>
        <div class="container">
            <div class="top-slider">
                <div id="jssor_1" class="jssor-1200">
                    <!-- Loading Screen -->
                    <div data-u="loading" class="jssor-spin">
                        <img src="/Content/web/img/spin.svg" />
                    </div>
                    <div data-u="slides" class="jssor-1200-container">
                        <?php
                        $queryBanner = mysqli_query($conn, getSlide($conn));
                        while ($itemBanner = mysqli_fetch_assoc($queryBanner)) {
                        ?>
                            <div>
                                <a target="_blank" href="" title="<?= $itemBanner['bannerTitle'] ?>"><img data-u="image" data-src2="admin/assets/images/banner/<?= $itemBanner['bannerImage'] ?>" title="<?= $itemBanner['bannerTitle'] ?>" /></a>
                                <div u="thumb">
                                    <?= $itemBanner['bannerTitle'] ?>
                                    <br /><small><?= $itemBanner['bannerContent'] ?></small>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>


                    <div data-u="thumbnavigator" class="jssor-1200-thumbs">
                        <div data-u="slides" style="cursor: pointer">
                            <div data-u="prototype" class="p">
                                <div class=w>
                                    <div data-u="thumbnailtemplate"></div>
                                </div>
                                <div class=c></div>
                            </div>
                        </div>
                    </div>

                    <div data-u="arrowleft" class="slider-arr slider-arr-l" data-autocenter="2">
                        <i class="icon-left"></i>
                    </div>
                    <div data-u="arrowright" class="slider-arr slider-arr-r" data-autocenter="2">
                        <i class="icon-right"></i>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="quick-sales">
                <div class="item">
                    <a href="https://hoanghamobile.com/dien-thoai-di-dong/samsung-galaxy-s20-fe-256gb-chinh-hang?source=Sanphamhot" target="_blank">
                        <img src="https://cdn.hoanghamobile.com/i/home/Uploads/2023/12/05/galaxy-s20-fe.png" title="Samsung Galaxy S20 FE" alt="Samsung Galaxy S20 FE" />
                    </a>
                </div>
                <div class="item">
                    <a href="https://hoanghamobile.comchi-tiet-san-pham.php?idsanpham=<?= $itemApple['productId'] ?>?source=Sanphamhot" target="_blank">
                        <img src="https://cdn.hoanghamobile.com/i/home/Uploads/2023/11/27/macbook-air.png" title="MacBook Air M1 8GB/256GB" alt="MacBook Air M1 8GB/256GB" />
                    </a>
                </div>
                <div class="item">
                    <a href="https://hoanghamobile.com/dien-thoai-di-dong/xiaomi-redmi-13c-6gb-128gb-chinh-hang?source=Sanphamhot" target="_blank">
                        <img src="https://cdn.hoanghamobile.com/i/home/Uploads/2023/11/17/redmi-13c_638358386471916868.png" title="Redmi 13C (6GB/128GB)" alt="Redmi 13C (6GB/128GB)" />
                    </a>
                </div>
                <div class="item">
                    <a href="https://hoanghamobile.com/laptop/laptop-asus-vivobook-14-x1404va-nk125w-chinh-hang?source=Sanphamhot" target="_blank">
                        <img src="https://cdn.hoanghamobile.com/i/home/Uploads/2023/11/22/vivobook-14.png" title="Laptop ASUS Vivobook 14 X1404VA-NK125W" alt="Laptop ASUS Vivobook 14 X1404VA-NK125W" />
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- flash sales -->
    <section class="fls" id="fls_6" style="display:block">
        <div class="container">
            <div class="flash-sales">
                <div class="header">
                    <h3>F<i class="icon-flash"></i>ASH SALE ONLINE</h3>
                    <div class="timer" id="timer_6" data-start="December 06, 2023 11:33:31" data-end="December 11, 2023 00:00:00"></div>
                </div>
                <div class="content">
                    <div class="owl-carousel lr-slider">
                        <?php
                            $sqlTopSale = getTopSale($conn);
                            while($itemTopSale = mysqli_fetch_assoc($sqlTopSale)){
                                ?>
                                    <div class="item">
                                        <div class="img">
                                            <a href="chi-tiet-san-pham.php?idsanpham=<?=$itemTopSale['versionId']?>" title="<?=$itemTopSale['versionName']?>">
                                                <?php
                                                    if ($itemTopSale['idCategory'] == 1) {
                                                        ?><img style="width: 180px; height: auto;" src="uploads/product/smartphone/<?= $itemTopSale['versionImage'] ?>" alt="<?= $itemTopSale['versionName'] ?>"><?php
                                                    } else if ($itemTopSale['idCategory'] == 2) {
                                                        ?><img style="width: 180px; height: auto;" src="uploads/product/laptop/<?= $itemTopSale['versionImage'] ?>" alt="<?= $itemTopSale['versionName'] ?>"><?php
                                                    } else if ($itemTopSale['idCategory'] == 3) {
                                                        ?><img style="width: 180px; height: auto;" src="uploads/product/tablet/<?= $itemTopSale['versionImage'] ?>" alt="<?= $itemTopSale['versionName'] ?>"><?php
                                                    } else if ($itemTopSale['idCategory'] == 4) {
                                                        ?><img style="width: 180px; height: auto;" src="uploads/product/monitor/<?= $itemTopSale['versionImage'] ?>" alt="<?= $itemTopSale['versionName'] ?>"><?php
                                                    } else if ($itemTopSale['idCategory'] == 5) {
                                                        ?><img style="width: 180px; height: auto;" src="uploads/product/smarttv/<?= $itemTopSale['versionImage'] ?>" alt="<?= $itemTopSale['versionName'] ?>"><?php
                                                    } else if ($itemTopSale['idCategory'] == 6) {
                                                        ?><img style="width: 180px; height: auto;" src="uploads/product/watch/<?= $itemTopSale['versionImage'] ?>" alt="<?= $itemTopSale['versionName'] ?>"><?php
                                                    } else if ($itemTopSale['idCategory'] == 7) {
                                                        ?><img style="width: 180px; height: auto;" src="uploads/product/voice/<?= $itemTopSale['versionImage'] ?>" alt="<?= $itemTopSale['versionName'] ?>"><?php
                                                    } else if ($itemTopSale['idCategory'] == 8) {
                                                        ?><img style="width: 180px; height: auto;" src="uploads/product/smarthome/<?= $itemTopSale['versionImage'] ?>" alt="<?= $itemTopSale['versionName'] ?>"><?php
                                                    } else if ($itemTopSale['idCategory'] == 16) {
                                                        ?><img style="width: 180px; height: auto;" src="uploads/product/accessory/<?= $itemTopSale['versionImage'] ?>" alt="<?= $itemTopSale['versionName'] ?>"><?php
                                                    } else if ($itemTopSale['idCategory'] == 17) {
                                                        ?><img style="width: 180px; height: auto;" src="uploads/product/toys/<?= $itemTopSale['versionImage'] ?>" alt="<?= $itemTopSale['versionName'] ?>"><?php
                                                    } else if ($itemTopSale['idCategory'] == 18) {
                                                        ?><img style="width: 180px; height: auto;" src="uploads/product/driftingmachine/<?= $itemTopSale['versionImage'] ?>" alt="<?= $itemTopSale['versionName'] ?>"><?php
                                                    } else if ($itemTopSale['idCategory'] == 19) {
                                                        ?><img style="width: 180px; height: auto;" src="uploads/product/repair/<?= $itemTopSale['versionImage'] ?>" alt="<?= $itemTopSale['versionName'] ?>"><?php
                                                    } else if ($itemTopSale['idCategory'] == 20) {
                                                        ?><img style="width: 180px; height: auto;" src="uploads/product/service/<?= $itemTopSale['versionImage'] ?>" alt="<?= $itemTopSale['versionName'] ?>"><?php
                                                    }
                                                ?>
                                            </a>
                                        </div>
                                        <div class="info">
                                            <a class="title" href="chi-tiet-san-pham.php?idsanpham=<?=$itemTopSale['versionId']?>"><?=$itemTopSale['versionName']?></a>
                                            <span class="price">
                                                <strong><?=number_format($itemTopSale['versionPromotionalPrice'],0,"",".")?> ₫</strong>
                                                <strike><?=number_format($itemTopSale['versionPrice'],0,"",".")?> ₫</strike>
                                            </span>

                                        </div>
                                    </div>
                                <?php
                            }
                        ?>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="box-product-home box-home">
                <div class="header-container">
                    <div class="header">
                        <h4><a href="san-pham.php?idCat=1&idBrand=1">Apple authorised Reseller</a></h4>
                    </div>
                </div>
                <div class="col-content lts-product">
                    <?php
                    $queryApple = mysqli_query($conn, getProduct(1));
                    while ($itemApple = mysqli_fetch_assoc($queryApple)) {
                    ?>
                        <div class="item">
                            <div class="img">
                                <a href="chi-tiet-san-pham.php?idsanpham=<?= $itemApple['idVersion'] ?>" title="<?= $itemApple['versionName'] ?>">
                                    <?php
                                    if ($itemApple['idCategory'] == 1) {
                                    ?><img src="uploads/product/smartphone/<?= $itemApple['versionImage'] ?>" alt="<?= $itemApple['versionName'] ?>" title="<?= $itemApple['versionName'] ?>"><?php
                                                                                                                                                                                            } else if ($itemApple['idCategory'] == 2) {
                                                                                                                                                                                                ?><img src="uploads/product/laptop/<?= $itemApple['versionImage'] ?>" alt="<?= $itemApple['versionName'] ?>" title="<?= $itemApple['versionName'] ?>"><?php
                                                                                                                                                                                                                                                                                                                                                            } else if ($itemApple['idCategory'] == 3) {
                                                                                                                                                                                                                                                                                                                                                                ?><img src="uploads/product/tablet/<?= $itemApple['versionImage'] ?>" alt="<?= $itemApple['versionName'] ?>" title="<?= $itemApple['versionName'] ?>"><?php
                                                                                                                                                                                                                                                                                                                                                            }
                                                                                                                                                                                                                                                                                                                                                            ?>
                                </a>
                            </div>

                            <div class="sticker sticker-left">
                                <span><img src="assets/images/icon/apple.png" title="Chính Hãng Apple" /></span>
                            </div>

                            <div class="info">
                                <a href="chi-tiet-san-pham.php?idsanpham=<?= $itemApple['idVersion'] ?>" class="title" title="<?= $itemApple['productName'] ?>"><?= $itemApple['versionName'] ?>-<?= $itemApple['versionVersion'] ?></a>
                                <span class="price">
                                    <strong><?= number_format($itemApple['versionPromotionalPrice'], 0, "", ".") ?> ₫</strong>
                                    <strike><?= number_format($itemApple['versionPrice'], 0, "", ".") ?> ₫</strike>
                                </span>

                            </div>

                            <div class="note">
                                <span class="bag">KM</span> <label title="Giảm 100.000đ khi khách mua kèm Bộ dán MacBook Air 13' 2020 3M INNOSTYLE DIAMOND GUARD 6 IN 1">Giảm
                                    100.000đ khi khách mua kèm Bộ ...</label>
                                <strong class="text-orange">VÀ 9 KM KHÁC</strong>
                            </div>
                            <div class="promote">
                                <a href="chi-tiet-san-pham.php?idsanpham=<?= $itemApple['idVersion'] ?>">
                                    <ul>
                                        <li><span class="bag">KM</span> Giảm 100.000đ khi khách mua kèm Bộ dán MacBook Air
                                            13' 2020 3M INNOSTYLE DIAMOND GUARD 6 IN 1</li>
                                        <li><span class="bag">KM</span> VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.</li>
                                        <li><span class="bag">KM</span> ZaloPay - Ưu đãi tới 300.000đ khi thanh toán qua ZaloPay.</li>
                                    </ul>
                                </a>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="ads">
                <a href="https://hoanghamobile.com/dien-thoai-di-dong/redmi-note-12-4gb-128gb-chinh-hang?source=BoxHomeProduct" target="_top"><img src="https://cdn.hoanghamobile.com/i/home/Uploads/2023/12/01/redmi-note12-04.jpg" style="width: 100%;"></a>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="box-product-home box-home">
                <div class="header-container">
                    <div class="header">
                        <h4><a href="/dien-thoai-di-dong">ĐIỆN THOẠI NỔI BẬT</a></h4>
                    </div>
                    <div class="other-link">
                        <a class="actived" href="/dien-thoai-di-dong">Xem tất cả</a>
                        <a href="/dien-thoai-di-dong/iphone/iphone-15-series">iPhone 15</a>
                        <a href="/dien-thoai-di-dong/tecno-pova-5-8gb-128gb-chinh-hang">TECNO POVA 5</a>
                        <a href="/dien-thoai-di-dong/xiaomi/redmi-note-12-series">Redmi Note 12</a>
                        <a href="/dien-thoai-di-dong/samsung/samsung-galaxy-s23">Samsung Galaxy S23</a>
                        <a class="actived" href="/dien-thoai-di-dong">Xem tất cả</a>
                    </div>
                </div>
                <div class="col-content lts-product">
                    <?php
                    $querySmartPhone = mysqli_query($conn, getProduct(3));
                    while ($itemSmartPhone = mysqli_fetch_assoc($querySmartPhone)) {
                    ?>
                        <div class="item">
                            <div class="img">
                                <a href="chi-tiet-san-pham.php?idsanpham=<?= $itemSmartPhone['idVersion'] ?>" title="<?= $itemSmartPhone['versionName'] ?> - <?= $itemSmartPhone['versionVersion'] ?>">
                                    <img src="uploads/product/smartphone/<?= $itemSmartPhone['versionImage'] ?>" alt="<?= $itemSmartPhone['versionName'] ?> - <?= $itemSmartPhone['versionVersion'] ?>" title="<?= $itemSmartPhone['versionName'] ?> - <?= $itemSmartPhone['versionVersion'] ?>">
                                </a>
                            </div>
                            <div class="cover">
                                <div style=" color: yellow;background: #00483D;margin: -95px 5px 0 52px;padding: 3px;border-radius: 6px; font-size: 11px;font-weight: 600; ">
                                    <span style="color:white">HÀNG MỚI VỀ</span><br>
                                    <span style="color:yellow"></span>
                                </div>
                            </div>

                            <div class="info">
                                <a href="chi-tiet-san-pham.php?idsanpham=<?= $itemSmartPhone['idVersion'] ?>" class="title" title="<?= $itemSmartPhone['versionName'] ?> - <?= $itemSmartPhone['versionVersion'] ?>"><?= $itemSmartPhone['versionName'] ?> - <?= $itemSmartPhone['versionVersion'] ?></a>
                                <span class="price">
                                    <strong><?= number_format($itemSmartPhone['versionPromotionalPrice'], 0, "", ".") ?> ₫</strong>
                                    <strike><?= number_format($itemSmartPhone['versionPrice'], 0, "", ".") ?> ₫</strike>
                                </span>

                            </div>

                            <div class="note">
                                <span class="bag">KM</span> <label title="Giảm ngay 150.000đ khi mua k&#232;m SIM số đẹp Vinaphone Happy - Ưu đãi 2GB Data/ngày - Miễn ph&#237; 1000 ph&#250;t nội mạng.">Giảm
                                    ngay 150.000đ khi mua k&#232;m SIM ...</label>
                                <strong class="text-orange">VÀ 8 KM KHÁC</strong>
                            </div>
                            <div class="promote">
                                <a href="chi-tiet-san-pham.php?idsanpham=<?= $itemSmartPhone['idVersion'] ?>">
                                    <ul>
                                        <li><span class="bag">KM</span> Giảm ngay 150.000đ khi mua k&#232;m SIM số đẹp
                                            Vinaphone Happy - Ưu đãi 2GB Data/ngày - Miễn ph&#237; 1000 ph&#250;t nội
                                            mạng.</li>
                                        <li><span class="bag">KM</span> VNPAY - Giảm thêm tới 200.000đ khi thanh toán
                                            qua VNPAY.</li>
                                        <li><span class="bag">KM</span> ZaloPay - Ưu đãi tới 300.000đ khi thanh toán
                                            qua ZaloPay.</li>
                                    </ul>
                                </a>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="ads">
                <a href="https://hoanghamobile.com/dien-thoai-di-dong/tecno/tecno-spark-10?source=BannerSlider" target="_top"><img src="https://cdn.hoanghamobile.com/i/home/Uploads/2023/10/24/tecno-spark-10.png" style="width: 100%;"></a>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="flash-sales box-home">
                <div class="header-container">
                    <div class="header">
                        <h4><a href="/dong-ho">ĐỒNG HỒ THÔNG MINH</a></h4>
                    </div>

                </div>

                <div class="content">
                    <div class="owl-carousel lr-slider equaHeight" data-obj=".info a.title">
                        <?php
                        $queryWatch = mysqli_query($conn, getProduct(7));
                        while ($itemWatch = mysqli_fetch_assoc($queryWatch)) {
                        ?>
                            <div class="item">
                                <div class="img">
                                    <a href="chi-tiet-san-pham.php?idsanpham=<?= $itemWatch['idVersion'] ?>">
                                        <img style="width: 150px;" src="uploads/product/watch/<?= $itemWatch['versionImage'] ?>" alt="<?= $itemWatch['versionName'] ?>" title="<?= $itemWatch['versionName'] ?>">
                                    </a>
                                </div>

                                <?php
                                if ($itemWatch['idBrand'] == 69) {
                                ?>
                                    <div class="sticker sticker-left">
                                        <span><img src="assets/images/icon/apple.png" title="Chính Hãng Apple" /></span>
                                    </div>
                                <?php
                                }
                                ?>


                                <div class="info">
                                    <a href="chi-tiet-san-pham.php?idsanpham=<?= $itemWatch['idVersion'] ?>" class="title"><?= $itemWatch['versionName'] ?></a>
                                    <span class="price">
                                        <strong><?= number_format($itemWatch['versionPromotionalPrice'], 0, "", ".") ?> ₫</strong><strike><?= number_format($itemWatch['versionPrice'], 0, "", ".") ?> ₫</strike></span>
                                </div>


                                <div class="note">
                                    <span class="bag">KM</span> <label title="VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.">VNPAY - Giảm thêm tới 200.000đ khi ...</label>
                                    <strong class="text-orange">VÀ 7 KM KHÁC</strong>
                                </div>
                                <div class="promote">
                                    <a href="chi-tiet-san-pham.php?idsanpham=<?= $itemWatch['idVersion'] ?>">
                                        <ul>
                                            <li><span class="bag">KM</span> VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.</li>
                                            <li><span class="bag">KM</span> ZaloPay - Ưu đãi tới 300.000đ khi thanh toán qua ZaloPay.</li>
                                            <li><span class="bag">KM</span> Home PayLater - Trả góp qua Home PayLater giảm tới 1.000.000đ</li>
                                        </ul>
                                    </a>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section>
        <div class="container">
            <div class="ads">
                <a href="https://hoanghamobile.com/laptop/msi/msi-gaming?source=BoxHomeProduct" target="_top"><img src="https://cdn.hoanghamobile.com/i/home/Uploads/2023/12/04/banner-1200x200-01.png" style="width: 100%;"></a>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="box-product-home box-home">
                <div class="header-container">
                    <div class="header">
                        <h4><a href="/laptop">Laptop nổi bật</a></h4>
                    </div>
                    <div class="other-link">
                        <a href="https://hoanghamobile.com/laptop/laptop-asus-tuf-gaming-f15-fx507zc4-hn074w-chinh-hang">ASUS TUF Gaming F15</a>
                        <a href="https://hoanghamobile.com/laptop/laptop-msi-modern-14-c7m-221vn-chinh-hang">MSI Modern 14</a>
                        <a href="https://hoanghamobile.com/laptop/laptop-gaming-msi-bravo-15-b7ed-010vn-chinh-hang">MSI Bravo 15</a>
                        <a href="https://hoanghamobile.com/laptop/laptop-lenovo-ideapad-3-15aba7-82sg007kvn-chinh-hang">Lenovo IdeaPad 5</a>
                        <a href="https://hoanghamobile.com/laptop/laptop-hp-15s-fq5159tu-7c0s0pa-chinh-hang">HP 15s</a>
                        <a class="actived" href="/laptop">Xem tất cả</a>
                    </div>
                </div>
                <div class="col-content lts-product">
                    <?php
                    $queryLaptop = mysqli_query($conn, getProduct(2));
                    while ($itemLaptop = mysqli_fetch_assoc($queryLaptop)) {
                    ?>
                        <div class="item">
                            <div class="img">
                                <a href="chi-tiet-san-pham.php?idsanpham=<?= $itemLaptop['idVersion'] ?>" title="<?= $itemLaptop['versionName'] ?>">
                                    <img src="uploads/product/laptop/<?= $itemLaptop['versionImage'] ?>" alt="<?= $itemLaptop['versionName'] ?>" title="<?= $itemLaptop['versionName'] ?>">
                                </a>
                            </div>
                            <div class="info">
                                <a href="chi-tiet-san-pham.php?idsanpham=<?= $itemLaptop['idVersion'] ?>" class="title" title="<?= $itemLaptop['versionName'] ?>"><?= $itemLaptop['versionName'] ?></a>
                                <span class="price">
                                    <strong><?= number_format($itemLaptop['versionPromotionalPrice'], 0, "", ".") ?> ₫</strong> <strike><?= number_format($itemLaptop['versionPrice'], 0, "", ".") ?> ₫</strike>
                                </span>
                                <div style="padding-top:8px; font-style:italic; text-align:left;">
                                    <label>Giá HSSV: <strong class="text-red"><?= number_format($itemLaptop['versionPromotionalPrice'], 0, "", ".") ?> ₫</strong></label>
                                </div>
                            </div>
                            <div class="note">
                                <span class="bag">KM</span> <label title="VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.">VNPAY - Giảm thêm tới 200.000đ khi ...</label>
                                <strong class="text-orange">VÀ 9 KM KHÁC</strong>
                            </div>
                            <div class="promote">
                                <a href="chi-tiet-san-pham.php?idsanpham=<?= $itemLaptop['idVersion'] ?>">
                                    <ul>
                                        <li><span class="bag">KM</span> VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.</li>
                                        <li><span class="bag">KM</span> ZaloPay - Ưu đãi tới 300.000đ khi thanh toán qua ZaloPay.</li>
                                        <li><span class="bag">KM</span> Home PayLater - Trả góp qua Home PayLater giảm tới 1.000.000đ</li>
                                    </ul>
                                </a>
                            </div>
                        </div>
                    <?php
                    }

                    ?>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="ads">
                <a href="https://hoanghamobile.com/man-hinh/man-hinh-msi-pro-mp243x-chinh-hang?source=BoxHomeProduct" target="_top"><img src="https://cdn.hoanghamobile.com/i/home/Uploads/2023/11/14/1200x200-msi-1-01.png" style="width: 100%;"></a>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="flash-sales box-home">
                <div class="header-container">
                    <div class="header">
                        <h4><a href="/man-hinh">MÀN HÌNH NỔI BẬT</a></h4>
                    </div>

                </div>

                <div class="content">
                    <div class="owl-carousel lr-slider equaHeight" data-obj=".info a.title">
                        <?php
                        $queryMonitor = mysqli_query($conn, getProduct(5));
                        while ($itemMonitor = mysqli_fetch_assoc($queryMonitor)) {
                        ?>
                            <div class="item">
                                <div class="img">
                                    <a href="chi-tiet-san-pham.php?idsanpham=<?= $itemMonitor['idVersion'] ?>">
                                        <img style="width: 150px;" src="uploads/product/monitor/<?= $itemMonitor['versionImage'] ?>" alt="<?= $itemMonitor['versionName'] ?>">
                                    </a>
                                </div>
                                <div class="info">
                                    <a href="chi-tiet-san-pham.php?idsanpham=<?= $itemMonitor['idVersion'] ?>" class="title"><?= $itemMonitor['versionName'] ?></a>
                                    <span class="price">
                                        <strong><?= number_format($itemMonitor['versionPromotionalPrice'], 0, "", ".") ?> ₫</strong> <strike><?= number_format($itemMonitor['versionPrice'], 0, "", ".") ?> ₫</strike>
                                    </span>
                                </div>
                                <div class="note">
                                    <span class="bag">KM</span> <label title="VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.">VNPAY - Giảm thêm tới 200.000đ khi ...</label>
                                    <strong class="text-orange">VÀ 8 KM KHÁC</strong>
                                </div>
                                <div class="promote">
                                    <a href="chi-tiet-san-pham.php?idsanpham=<?= $itemMonitor['idVersion'] ?>">
                                        <ul>
                                            <li><span class="bag">KM</span> VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.</li>
                                            <li><span class="bag">KM</span> ZaloPay - Ưu đãi tới 300.000đ khi thanh toán qua ZaloPay.</li>
                                            <li><span class="bag">KM</span> Home PayLater - Trả góp qua Home PayLater giảm tới 1.000.000đ</li>
                                        </ul>
                                    </a>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section>
        <div class="container">
            <div class="ads">
                <a href="https://hoanghamobile.com/smart-tv/tv-xiaomi?source=BoxHomeProduct" target="_top"><img src="https://cdn.hoanghamobile.com/i/home/Uploads/2023/12/04/tv-xiaomi-t12-1200x200.jpg" style="width: 100%;"></a>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="flash-sales box-home">
                <div class="header-container">
                    <div class="header">
                        <h4><a href="https://hoanghamobile.com/smart-tv">SMART TV NỔI BẬT</a></h4>
                    </div>

                </div>

                <div class="content">
                    <div class="owl-carousel lr-slider equaHeight" data-obj=".info a.title">
                        <?php
                        $querySmartTV = mysqli_query($conn, getProduct(6));
                        while ($itemSmartTv = mysqli_fetch_assoc($querySmartTV)) {
                        ?>
                            <div class="item">
                                <div class="img">
                                    <a href="chi-tiet-san-pham.php?idsanpham=<?= $itemSmartTv['idVersion'] ?>">
                                        <img style="width: 150px;" src="uploads/product/smarttv/<?= $itemSmartTv['versionImage'] ?>" alt="<?= $itemSmartTv['versionName'] ?>">
                                    </a>
                                </div>
                                <div class="info">
                                    <a href="chi-tiet-san-pham.php?idsanpham=<?= $itemSmartTv['idVersion'] ?>" class="title"><?= $itemSmartTv['versionName'] ?></a>
                                    <span class="price">
                                        <strong><?= number_format($itemSmartTv['versionPromotionalPrice'], 0, "", ".") ?> ₫</strong> <strike><?= number_format($itemSmartTv['versionPrice'], 0, "", ".") ?> ₫</strike>
                                    </span>
                                </div>
                                <div class="cover">
                                    <div style="color: yellow;background: #00483D; margin: -95px 5px 0 52px; padding: 3px;border-radius: 6px; font-size: 11px; font-weight: 600;  ">
                                        <span style="color:white">Giảm 20% khung giá treo</span><br>
                                        <span style="color:yellow">Giá tốt LH 03.86.13.17.16</span>
                                    </div>
                                </div>

                                <div class="note">
                                    <span class="bag">KM</span> <label title="VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.">VNPAY - Giảm thêm tới 200.000đ khi ...</label>
                                    <strong class="text-orange">VÀ 8 KM KHÁC</strong>
                                </div>
                                <div class="promote">
                                    <a href="chi-tiet-san-pham.php?idsanpham=<?= $itemSmartTv['idVersion'] ?>">
                                        <ul>
                                            <li><span class="bag">KM</span> VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.</li>
                                            <li><span class="bag">KM</span> ZaloPay - Ưu đãi tới 300.000đ khi thanh toán qua ZaloPay.</li>
                                            <li><span class="bag">KM</span> Home PayLater - Trả góp qua Home PayLater giảm tới 1.000.000đ</li>
                                        </ul>
                                    </a>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section>
        <div class="container">
            <div class="flash-sales box-home">
                <div class="header-container">
                    <div class="header">
                        <h4><a href="/tablet">TABLET</a></h4>
                    </div>

                </div>

                <div class="content">
                    <div class="owl-carousel lr-slider equaHeight" data-obj=".info a.title">
                        <?php
                        $queryTablet = mysqli_query($conn, getProduct(4));
                        while ($itemTablet = mysqli_fetch_assoc($queryTablet)) {
                        ?>
                            <div class="item">
                                <div class="img">
                                    <a href="chi-tiet-san-pham.php?idsanpham=<?= $itemTablet['idVersion'] ?>">
                                        <img style="width: 220px;" src="uploads/product/tablet/<?= $itemTablet['versionImage'] ?>" alt="<?= $itemTablet['versionName'] ?> - <?= $itemTablet['versionVersion'] ?>">
                                    </a>
                                </div>
                                <div class="info">
                                    <a href="chi-tiet-san-pham.php?idsanpham=<?= $itemTablet['idVersion'] ?>" class="title"><?= $itemTablet['versionName'] ?> - <?= $itemTablet['versionVersion'] ?></a>
                                    <span class="price">
                                        <strong><?= number_format($itemTablet['versionPromotionalPrice'], 0, "", ".") ?> ₫</strong> <strike><?= number_format($itemTablet['versionPrice'], 0, "", ".") ?> ₫</strike>
                                    </span>
                                </div>
                                <div class="cover">
                                    <div style="color: yellow; background: #00483D;margin: -95px 5px 0 52px;padding: 3px; border-radius: 6px; font-size: 11px; font-weight: 600;">
                                        <span style="color:white">Hotsale giá sốc </span><br>
                                        <span style="color:yellow"></span>
                                    </div>
                                </div>
                                <div class="note">
                                    <span class="bag">KM</span> <label title="Giảm ngay 150.000đ khi mua kèm SIM số đẹp Vinaphone Happy - Ưu đãi 2GB Data/ngày - Miễn phí 1000 phút nội mạng.">Giảm ngay 150.000đ khi mua kèm SIM ...</label>
                                    <strong class="text-orange">VÀ 8 KM KHÁC</strong>
                                </div>
                                <div class="promote">
                                    <a href="chi-tiet-san-pham.php?idsanpham=<?= $itemTablet['idVersion'] ?>">
                                        <ul>
                                            <li><span class="bag">KM</span> Giảm ngay 150.000đ khi mua kèm SIM số đẹp Vinaphone Happy - Ưu đãi 2GB Data/ngày - Miễn phí 1000 phút nội mạng.</li>
                                            <li><span class="bag">KM</span> VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.</li>
                                            <li><span class="bag">KM</span> ZaloPay - Ưu đãi tới 300.000đ khi thanh toán qua ZaloPay.</li>
                                        </ul>
                                    </a>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="ads">
                <a href="https://hoanghamobile.com/dien-thoai-di-dong/htc-wildfire-e3-lite-4gb-64gb-chinh-hang?source=BannerSlider" target="_top"><img src="https://cdn.hoanghamobile.com/i/home/Uploads/2023/11/18/web-htc-wildfire-e3-lite-01.jpg" style="width: 100%;"></a>
            </div>
        </div>
    </section>


    <section>
        <div class="container">
            <div class="flash-sales box-home">
                <div class="header-container">
                    <div class="header">
                        <h4><a href="/loa-tai-nghe">Loa - Tai nghe nổi bật</a></h4>
                    </div>

                </div>

                <div class="content">
                    <div class="owl-carousel lr-slider equaHeight" data-obj=".info a.title">

                        <div class="item">
                            <div class="img">
                                <a href="/tai-nghe/tai-nghe-khong-day-xiaomi-redmi-buds-4-chinh-hang">
                                    <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2022/09/22/image-removebg-preview-8.png" alt="Tai nghe không d&#226;y Xiaomi Redmi Buds 4 - Ch&#237;nh hãng " title="Tai nghe không d&#226;y Xiaomi Redmi Buds 4 - Ch&#237;nh hãng ">
                                </a>
                            </div>



                            <div class="info">
                                <a href="/tai-nghe/tai-nghe-khong-day-xiaomi-redmi-buds-4-chinh-hang" class="title">Tai nghe không d&#226;y Xiaomi Redmi Buds 4 - Ch&#237;nh hãng </a>
                                <span class="price">
                                    <strong>650,000 ₫</strong>
                                    <strike>1,590,000 ₫</strike>
                                </span>
                            </div>


                            <div class="note">
                                <span class="bag">KM</span> <label title="VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.">VNPAY - Giảm thêm tới 200.000đ khi ...</label>
                                <strong class="text-orange">VÀ 5 KM KHÁC</strong>
                            </div>
                            <div class="promote">
                                <a href="/tai-nghe/tai-nghe-khong-day-xiaomi-redmi-buds-4-chinh-hang">
                                    <ul>
                                        <li><span class="bag">KM</span> VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.</li>
                                        <li><span class="bag">KM</span> ZaloPay - Ưu đãi tới 300.000đ khi thanh toán qua ZaloPay.</li>
                                        <li><span class="bag">KM</span> Home PayLater - Trả góp qua Home PayLater giảm tới 1.000.000đ</li>
                                    </ul>
                                </a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="img">
                                <a href="/tai-nghe/tai-nghe-khong-day-redmi-buds-4-lite">
                                    <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/03/29/redmi-buds-4-lite-1.png" alt="Tai nghe không d&#226;y Redmi Buds 4 Lite - Ch&#237;nh hãng" title="Tai nghe không d&#226;y Redmi Buds 4 Lite - Ch&#237;nh hãng">
                                </a>
                            </div>



                            <div class="info">
                                <a href="/tai-nghe/tai-nghe-khong-day-redmi-buds-4-lite" class="title">Tai nghe không d&#226;y Redmi Buds 4 Lite - Ch&#237;nh hãng</a>
                                <span class="price">
                                    <strong>540,000 ₫</strong>
                                    <strike>790,000 ₫</strike>
                                </span>
                            </div>


                            <div class="note">
                                <span class="bag">KM</span> <label title="VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.">VNPAY - Giảm thêm tới 200.000đ khi ...</label>
                                <strong class="text-orange">VÀ 6 KM KHÁC</strong>
                            </div>
                            <div class="promote">
                                <a href="/tai-nghe/tai-nghe-khong-day-redmi-buds-4-lite">
                                    <ul>
                                        <li><span class="bag">KM</span> VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.</li>
                                        <li><span class="bag">KM</span> ZaloPay - Ưu đãi tới 300.000đ khi thanh toán qua ZaloPay.</li>
                                        <li><span class="bag">KM</span> Home PayLater - Trả góp qua Home PayLater giảm tới 1.000.000đ</li>
                                    </ul>
                                </a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="img">
                                <a href="/tai-nghe/tai-nghe-galaxy-buds-fe-chinh-hang">
                                    <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/10/26/tai-nghe-galaxy-buds-fe-12.png" alt="Tai nghe Samsung Galaxy Buds FE - Ch&#237;nh hãng" title="Tai nghe Samsung Galaxy Buds FE - Ch&#237;nh hãng">
                                </a>
                            </div>



                            <div class="info">
                                <a href="/tai-nghe/tai-nghe-galaxy-buds-fe-chinh-hang" class="title">Tai nghe Samsung Galaxy Buds FE - Ch&#237;nh hãng</a>
                                <span class="price">
                                    <strong>1,590,000 ₫</strong>
                                    <strike>1,990,000 ₫</strike>
                                </span>
                            </div>


                            <div class="note">
                                <span class="bag">KM</span> <label title="VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.">VNPAY - Giảm thêm tới 200.000đ khi ...</label>
                                <strong class="text-orange">VÀ 1 KM KHÁC</strong>
                            </div>
                            <div class="promote">
                                <a href="/tai-nghe/tai-nghe-galaxy-buds-fe-chinh-hang">
                                    <ul>
                                        <li><span class="bag">KM</span> VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.</li>
                                        <li><span class="bag">KM</span> ZaloPay - Ưu đãi tới 300.000đ khi thanh toán qua ZaloPay.</li>
                                    </ul>
                                </a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="img">
                                <a href="/tai-nghe/samsung-galaxy-buds-2-pro-chinh-hang">
                                    <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2022/08/10/image-removebg-preview_637957687304481353.png" alt="Samsung Galaxy Buds 2 Pro - Ch&#237;nh hãng" title="Samsung Galaxy Buds 2 Pro - Ch&#237;nh hãng">
                                </a>
                            </div>



                            <div class="info">
                                <a href="/tai-nghe/samsung-galaxy-buds-2-pro-chinh-hang" class="title">Samsung Galaxy Buds 2 Pro - Ch&#237;nh hãng</a>
                                <span class="price">
                                    <strong>3,390,000 ₫</strong>
                                    <strike>4,990,000 ₫</strike>
                                </span>
                            </div>


                            <div class="note">
                                <span class="bag">KM</span> <label title="Ưu đãi Youtube Premium dành cho chủ sở hữu Samsung Galaxy (&#193;p dụng một số sản phẩm)">Ưu đãi Youtube Premium dành cho chủ...</label>
                                <strong class="text-orange">VÀ 7 KM KHÁC</strong>
                            </div>
                            <div class="promote">
                                <a href="/tai-nghe/samsung-galaxy-buds-2-pro-chinh-hang">
                                    <ul>
                                        <li><span class="bag">KM</span> Ưu đãi Youtube Premium dành cho chủ sở hữu Samsung Galaxy (&#193;p dụng một số sản phẩm)</li>
                                        <li><span class="bag">KM</span> VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.</li>
                                        <li><span class="bag">KM</span> ZaloPay - Ưu đãi tới 300.000đ khi thanh toán qua ZaloPay.</li>
                                    </ul>
                                </a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="img">
                                <a href="/tai-nghe/tai-nghe-khong-day-jbl-live-pro-2-tws-chinh-hang">
                                    <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2022/08/15/image-removebg-preview-34.png" alt="Tai Nghe Không D&#226;y JBL Live Pro 2 TWS- Ch&#237;nh Hãng" title="Tai Nghe Không D&#226;y JBL Live Pro 2 TWS- Ch&#237;nh Hãng">
                                </a>
                            </div>



                            <div class="info">
                                <a href="/tai-nghe/tai-nghe-khong-day-jbl-live-pro-2-tws-chinh-hang" class="title">Tai Nghe Không D&#226;y JBL Live Pro 2 TWS- Ch&#237;nh Hãng</a>
                                <span class="price">
                                    <strong>2,790,000 ₫</strong>
                                    <strike>3,990,000 ₫</strike>
                                </span>
                            </div>


                            <div class="note">
                                <span class="bag">KM</span> <label title="VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.">VNPAY - Giảm thêm tới 200.000đ khi ...</label>
                                <strong class="text-orange">VÀ 5 KM KHÁC</strong>
                            </div>
                            <div class="promote">
                                <a href="/tai-nghe/tai-nghe-khong-day-jbl-live-pro-2-tws-chinh-hang">
                                    <ul>
                                        <li><span class="bag">KM</span> VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.</li>
                                        <li><span class="bag">KM</span> ZaloPay - Ưu đãi tới 300.000đ khi thanh toán qua ZaloPay.</li>
                                        <li><span class="bag">KM</span> Home PayLater - Trả góp qua Home PayLater giảm tới 1.000.000đ</li>
                                    </ul>
                                </a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="img">
                                <a href="/tai-nghe/samsung-galaxy-buds-2-chinh-hang">
                                    <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2022/02/13/image-removebg-preview.png" alt="Samsung Galaxy Buds 2 - Ch&#237;nh hãng" title="Samsung Galaxy Buds 2 - Ch&#237;nh hãng">
                                </a>
                            </div>



                            <div class="info">
                                <a href="/tai-nghe/samsung-galaxy-buds-2-chinh-hang" class="title">Samsung Galaxy Buds 2 - Ch&#237;nh hãng</a>
                                <span class="price">
                                    <strong>1,990,000 ₫</strong>
                                    <strike>2,990,000 ₫</strike>
                                </span>
                            </div>


                            <div class="note">
                                <span class="bag">KM</span> <label title="Ưu đãi Youtube Premium dành cho chủ sở hữu Samsung Galaxy (&#193;p dụng một số sản phẩm)">Ưu đãi Youtube Premium dành cho chủ...</label>
                                <strong class="text-orange">VÀ 6 KM KHÁC</strong>
                            </div>
                            <div class="promote">
                                <a href="/tai-nghe/samsung-galaxy-buds-2-chinh-hang">
                                    <ul>
                                        <li><span class="bag">KM</span> Ưu đãi Youtube Premium dành cho chủ sở hữu Samsung Galaxy (&#193;p dụng một số sản phẩm)</li>
                                        <li><span class="bag">KM</span> VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.</li>
                                        <li><span class="bag">KM</span> ZaloPay - Ưu đãi tới 300.000đ khi thanh toán qua ZaloPay.</li>
                                    </ul>
                                </a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="img">
                                <a href="/tai-nghe/tai-nghe-bluetooth-tws-oppo-enco-air-2-chinh-hang">
                                    <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2022/03/09/enco-air-2-2.png" alt="Tai  nghe Bluetooth TWS OPPO ENCO Air 2- ch&#237;nh hãng" title="Tai  nghe Bluetooth TWS OPPO ENCO Air 2- ch&#237;nh hãng">
                                </a>
                            </div>



                            <div class="info">
                                <a href="/tai-nghe/tai-nghe-bluetooth-tws-oppo-enco-air-2-chinh-hang" class="title">Tai nghe Bluetooth TWS OPPO ENCO Air 2- ch&#237;nh hãng</a>
                                <span class="price">
                                    <strong>890,000 ₫</strong>
                                    <strike>1,590,000 ₫</strike>
                                </span>
                            </div>


                            <div class="note">
                                <span class="bag">KM</span> <label title="VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.">VNPAY - Giảm thêm tới 200.000đ khi ...</label>
                                <strong class="text-orange">VÀ 5 KM KHÁC</strong>
                            </div>
                            <div class="promote">
                                <a href="/tai-nghe/tai-nghe-bluetooth-tws-oppo-enco-air-2-chinh-hang">
                                    <ul>
                                        <li><span class="bag">KM</span> VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.</li>
                                        <li><span class="bag">KM</span> ZaloPay - Ưu đãi tới 300.000đ khi thanh toán qua ZaloPay.</li>
                                        <li><span class="bag">KM</span> Home PayLater - Trả góp qua Home PayLater giảm tới 1.000.000đ</li>
                                    </ul>
                                </a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="img">
                                <a href="/tai-nghe/tai-nghe-xiaomi-buds-3t-pro-chinh-hang">
                                    <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2022/03/18/xiaomi-buds-3t-pro-3.png" alt="Tai nghe Xiaomi Buds 3T Pro - Ch&#237;nh hãng" title="Tai nghe Xiaomi Buds 3T Pro - Ch&#237;nh hãng">
                                </a>
                            </div>



                            <div class="info">
                                <a href="/tai-nghe/tai-nghe-xiaomi-buds-3t-pro-chinh-hang" class="title">Tai nghe Xiaomi Buds 3T Pro - Ch&#237;nh hãng</a>
                                <span class="price">
                                    <strong>1,750,000 ₫</strong>
                                    <strike>3,690,000 ₫</strike>
                                </span>
                            </div>


                            <div class="note">
                                <span class="bag">KM</span> <label title="VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.">VNPAY - Giảm thêm tới 200.000đ khi ...</label>
                                <strong class="text-orange">VÀ 5 KM KHÁC</strong>
                            </div>
                            <div class="promote">
                                <a href="/tai-nghe/tai-nghe-xiaomi-buds-3t-pro-chinh-hang">
                                    <ul>
                                        <li><span class="bag">KM</span> VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.</li>
                                        <li><span class="bag">KM</span> ZaloPay - Ưu đãi tới 300.000đ khi thanh toán qua ZaloPay.</li>
                                        <li><span class="bag">KM</span> Home PayLater - Trả góp qua Home PayLater giảm tới 1.000.000đ</li>
                                    </ul>
                                </a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="img">
                                <a href="/tai-nghe/tai-nghe-xiaomi-buds-3-chinh-hang">
                                    <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2022/03/18/tai-nghe-khong-day-xiaomi-buds-3-6.png" alt="Tai nghe Xiaomi Buds 3 - Ch&#237;nh hãng" title="Tai nghe Xiaomi Buds 3 - Ch&#237;nh hãng">
                                </a>
                            </div>



                            <div class="info">
                                <a href="/tai-nghe/tai-nghe-xiaomi-buds-3-chinh-hang" class="title">Tai nghe Xiaomi Buds 3 - Ch&#237;nh hãng</a>
                                <span class="price">
                                    <strong>1,090,000 ₫</strong>
                                    <strike>2,690,000 ₫</strike>
                                </span>
                            </div>


                            <div class="note">
                                <span class="bag">KM</span> <label title="VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.">VNPAY - Giảm thêm tới 200.000đ khi ...</label>
                                <strong class="text-orange">VÀ 5 KM KHÁC</strong>
                            </div>
                            <div class="promote">
                                <a href="/tai-nghe/tai-nghe-xiaomi-buds-3-chinh-hang">
                                    <ul>
                                        <li><span class="bag">KM</span> VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.</li>
                                        <li><span class="bag">KM</span> ZaloPay - Ưu đãi tới 300.000đ khi thanh toán qua ZaloPay.</li>
                                        <li><span class="bag">KM</span> Home PayLater - Trả góp qua Home PayLater giảm tới 1.000.000đ</li>
                                    </ul>
                                </a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="img">
                                <a href="/tai-nghe/tai-nghe-apple-airpods-pro-chinh-hang-apple">
                                    <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2020/09/22/Tai nghe Apple AirPods Pro.png" alt="AirPods Pro với Hộp Sạc MagSafe - Chính Hãng Apple Việt Nam" title="AirPods Pro với Hộp Sạc MagSafe - Chính Hãng Apple Việt Nam">
                                </a>
                            </div>

                            <div class="sticker sticker-left">
                                <span><img src="/Content/web/sticker/apple.png
" title="Chính Hãng Apple" /></span>
                            </div>


                            <div class="info">
                                <a href="/tai-nghe/tai-nghe-apple-airpods-pro-chinh-hang-apple" class="title">AirPods Pro với Hộp Sạc MagSafe - Chính Hãng Apple Việt Nam</a>
                                <span class="price">
                                    <strong>4,650,000 ₫</strong>
                                    <strike>7,990,000 ₫</strike>
                                </span>
                            </div>


                            <div class="note">
                                <span class="bag">KM</span> <label title="VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.">VNPAY - Giảm thêm tới 200.000đ khi ...</label>
                                <strong class="text-orange">VÀ 7 KM KHÁC</strong>
                            </div>
                            <div class="promote">
                                <a href="/tai-nghe/tai-nghe-apple-airpods-pro-chinh-hang-apple">
                                    <ul>
                                        <li><span class="bag">KM</span> VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.</li>
                                        <li><span class="bag">KM</span> ZaloPay - Ưu đãi tới 300.000đ khi thanh toán qua ZaloPay.</li>
                                        <li><span class="bag">KM</span> Home PayLater - Trả góp qua Home PayLater giảm tới 1.000.000đ</li>
                                    </ul>
                                </a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="img">
                                <a href="/tai-nghe/tai-nghe-apple-airpods-2-case-sac-thuong-mv7n2vn-a">
                                    <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2020/12/15/image-removebg-preview.png" alt="AirPods 2 với Hộp Sạc Lightning - Chính Hãng Apple Việt Nam" title="AirPods 2 với Hộp Sạc Lightning - Chính Hãng Apple Việt Nam">
                                </a>
                            </div>

                            <div class="sticker sticker-left">
                                <span><img src="/Content/web/sticker/apple.png
" title="Chính Hãng Apple" /></span>
                            </div>


                            <div class="info">
                                <a href="/tai-nghe/tai-nghe-apple-airpods-2-case-sac-thuong-mv7n2vn-a" class="title">AirPods 2 với Hộp Sạc Lightning - Chính Hãng Apple Việt Nam</a>
                                <span class="price">
                                    <strong>2,690,000 ₫</strong>
                                    <strike>4,990,000 ₫</strike>
                                </span>
                            </div>


                            <div class="note">
                                <span class="bag">KM</span> <label title="VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.">VNPAY - Giảm thêm tới 200.000đ khi ...</label>
                                <strong class="text-orange">VÀ 6 KM KHÁC</strong>
                            </div>
                            <div class="promote">
                                <a href="/tai-nghe/tai-nghe-apple-airpods-2-case-sac-thuong-mv7n2vn-a">
                                    <ul>
                                        <li><span class="bag">KM</span> VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.</li>
                                        <li><span class="bag">KM</span> ZaloPay - Ưu đãi tới 300.000đ khi thanh toán qua ZaloPay.</li>
                                        <li><span class="bag">KM</span> Home PayLater - Trả góp qua Home PayLater giảm tới 1.000.000đ</li>
                                    </ul>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>



    <section>
        <div class="container">
            <div class="box-product-home box-home">
                <div class="header-container">
                    <div class="header">
                        <h4><a href="/phu-kien/pin-man-hinh/pin">Thay pin iphone ch&#237;nh hãng và sửa chữa</a></h4>
                    </div>
                </div>
                <div class="col-content lts-product">


                    <div class="item">

                        <div class="img">
                            <a href="/thay-pin/thay-pin-iphone-11-pro-max-chinh-hang-pisen-dung-luong-chuan-3969mah" title="Pin iPhone 11 Pro Max Ch&#237;nh Hãng PISEN (Dung lượng chuẩn 3969mAh)">
                                <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2022/05/07/i11pro-5960.jpg" alt="Pin iPhone 11 Pro Max Ch&#237;nh Hãng PISEN (Dung lượng chuẩn 3969mAh)" title="Pin iPhone 11 Pro Max Ch&#237;nh Hãng PISEN (Dung lượng chuẩn 3969mAh)">
                            </a>
                        </div>




                        <span class="sales">
                            <i class="icon-flash2"></i> Giảm 300,000 ₫
                        </span>

                        <div class="info">
                            <a href="/thay-pin/thay-pin-iphone-11-pro-max-chinh-hang-pisen-dung-luong-chuan-3969mah" class="title" title="Pin iPhone 11 Pro Max Ch&#237;nh Hãng PISEN (Dung lượng chuẩn 3969mAh)">Pin iPhone 11 Pro Max Ch&#237;nh Hãng PISEN (Dung lượng chuẩn 3969mAh)</a>
                            <span class="price">
                                <strong>1,290,000 ₫</strong>
                                <strike>1,590,000 ₫</strike>
                            </span>



                        </div>




                        <div class="note">
                            <span class="bag">KM</span> <label title="VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.">VNPAY - Giảm thêm tới 200.000đ khi ...</label>
                            <strong class="text-orange">VÀ 5 KM KHÁC</strong>
                        </div>
                        <div class="promote">
                            <a href="/thay-pin/thay-pin-iphone-11-pro-max-chinh-hang-pisen-dung-luong-chuan-3969mah">
                                <ul>
                                    <li><span class="bag">KM</span> VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.</li>
                                    <li><span class="bag">KM</span> ZaloPay - Ưu đãi tới 300.000đ khi thanh toán qua ZaloPay.</li>
                                    <li><span class="bag">KM</span> Home PayLater - Trả góp qua Home PayLater giảm tới 1.000.000đ</li>
                                </ul>
                            </a>
                        </div>
                    </div>
                    <div class="item">

                        <div class="img">
                            <a href="/phu-kien/thay-man-hinh-daison-soft-oled-cho-iphone-11-pro-max-chinh-hang" title="Thay màn hình Daison (Soft Oled) cho iPhone 11 Pro Max - Ch&#237;nh hãng">
                                <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2022/08/03/image.png" alt="Thay màn hình Daison (Soft Oled) cho iPhone 11 Pro Max - Ch&#237;nh hãng" title="Thay màn hình Daison (Soft Oled) cho iPhone 11 Pro Max - Ch&#237;nh hãng">
                            </a>
                        </div>




                        <span class="sales">
                            <i class="icon-flash2"></i> Giảm 625,000 ₫
                        </span>

                        <div class="info">
                            <a href="/phu-kien/thay-man-hinh-daison-soft-oled-cho-iphone-11-pro-max-chinh-hang" class="title" title="Thay màn hình Daison (Soft Oled) cho iPhone 11 Pro Max - Ch&#237;nh hãng">Thay màn hình Daison (Soft Oled) cho iPhone 11 Pro Max - Ch&#237;nh hãng</a>
                            <span class="price">
                                <strong>3,690,000 ₫</strong>
                                <strike>4,315,000 ₫</strike>
                            </span>



                        </div>




                        <div class="note">
                            <span class="bag">KM</span> <label title="VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.">VNPAY - Giảm thêm tới 200.000đ khi ...</label>
                            <strong class="text-orange">VÀ 6 KM KHÁC</strong>
                        </div>
                        <div class="promote">
                            <a href="/phu-kien/thay-man-hinh-daison-soft-oled-cho-iphone-11-pro-max-chinh-hang">
                                <ul>
                                    <li><span class="bag">KM</span> VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.</li>
                                    <li><span class="bag">KM</span> ZaloPay - Ưu đãi tới 300.000đ khi thanh toán qua ZaloPay.</li>
                                    <li><span class="bag">KM</span> Home PayLater - Trả góp qua Home PayLater giảm tới 1.000.000đ</li>
                                </ul>
                            </a>
                        </div>
                    </div>
                    <div class="item">

                        <div class="img">
                            <a href="/phu-kien/thay-man-hinh-daison-soft-oled-cho-iphone-xs-max-chinh-hang" title="Thay màn hình Daison (Soft Oled) cho iPhone Xs Max - Ch&#237;nh hãng">
                                <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2022/08/03/soft-600x600.jpg" alt="Thay màn hình Daison (Soft Oled) cho iPhone Xs Max - Ch&#237;nh hãng" title="Thay màn hình Daison (Soft Oled) cho iPhone Xs Max - Ch&#237;nh hãng">
                            </a>
                        </div>




                        <span class="sales">
                            <i class="icon-flash2"></i> Giảm 360,000 ₫
                        </span>

                        <div class="info">
                            <a href="/phu-kien/thay-man-hinh-daison-soft-oled-cho-iphone-xs-max-chinh-hang" class="title" title="Thay màn hình Daison (Soft Oled) cho iPhone Xs Max - Ch&#237;nh hãng">Thay màn hình Daison (Soft Oled) cho iPhone Xs Max - Ch&#237;nh hãng</a>
                            <span class="price">
                                <strong>2,790,000 ₫</strong>
                                <strike>3,150,000 ₫</strike>
                            </span>



                        </div>




                        <div class="note">
                            <span class="bag">KM</span> <label title="VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.">VNPAY - Giảm thêm tới 200.000đ khi ...</label>
                            <strong class="text-orange">VÀ 5 KM KHÁC</strong>
                        </div>
                        <div class="promote">
                            <a href="/phu-kien/thay-man-hinh-daison-soft-oled-cho-iphone-xs-max-chinh-hang">
                                <ul>
                                    <li><span class="bag">KM</span> VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.</li>
                                    <li><span class="bag">KM</span> ZaloPay - Ưu đãi tới 300.000đ khi thanh toán qua ZaloPay.</li>
                                    <li><span class="bag">KM</span> Home PayLater - Trả góp qua Home PayLater giảm tới 1.000.000đ</li>
                                </ul>
                            </a>
                        </div>
                    </div>
                    <div class="item">

                        <div class="img">
                            <a href="/phu-kien/thay-pin-daison-iphone-11-dung-luong-chuan-3110mah" title="Pin Daison iPhone 11 Dung lượng chuẩn 3110mAh">
                                <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2022/10/06/image-removebg-preview-29.png" alt="Pin Daison iPhone 11 Dung lượng chuẩn 3110mAh" title="Pin Daison iPhone 11 Dung lượng chuẩn 3110mAh">
                            </a>
                        </div>




                        <span class="sales">
                            <i class="icon-flash2"></i> Giảm 370,000 ₫
                        </span>

                        <div class="info">
                            <a href="/phu-kien/thay-pin-daison-iphone-11-dung-luong-chuan-3110mah" class="title" title="Pin Daison iPhone 11 Dung lượng chuẩn 3110mAh">Pin Daison iPhone 11 Dung lượng chuẩn 3110mAh</a>
                            <span class="price">
                                <strong>790,000 ₫</strong>
                                <strike>1,160,000 ₫</strike>
                            </span>



                        </div>




                        <div class="note">
                            <span class="bag">KM</span> <label title="VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.">VNPAY - Giảm thêm tới 200.000đ khi ...</label>
                            <strong class="text-orange">VÀ 5 KM KHÁC</strong>
                        </div>
                        <div class="promote">
                            <a href="/phu-kien/thay-pin-daison-iphone-11-dung-luong-chuan-3110mah">
                                <ul>
                                    <li><span class="bag">KM</span> VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.</li>
                                    <li><span class="bag">KM</span> ZaloPay - Ưu đãi tới 300.000đ khi thanh toán qua ZaloPay.</li>
                                    <li><span class="bag">KM</span> Home PayLater - Trả góp qua Home PayLater giảm tới 1.000.000đ</li>
                                </ul>
                            </a>
                        </div>
                    </div>
                    <div class="item">

                        <div class="img">
                            <a href="/phu-kien/thay-pin-daison-iphone-xs-max-dung-luong-chuan-3174mah" title="Pin Daison iPhone Xs max Dung lượng chuẩn 3174mAh ">
                                <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2022/10/06/image-removebg-preview-29.png" alt="Pin Daison iPhone Xs max Dung lượng chuẩn 3174mAh " title="Pin Daison iPhone Xs max Dung lượng chuẩn 3174mAh ">
                            </a>
                        </div>




                        <span class="sales">
                            <i class="icon-flash2"></i> Giảm 200,000 ₫
                        </span>

                        <div class="info">
                            <a href="/phu-kien/thay-pin-daison-iphone-xs-max-dung-luong-chuan-3174mah" class="title" title="Pin Daison iPhone Xs max Dung lượng chuẩn 3174mAh ">Pin Daison iPhone Xs max Dung lượng chuẩn 3174mAh </a>
                            <span class="price">
                                <strong>690,000 ₫</strong>
                                <strike>890,000 ₫</strike>
                            </span>



                        </div>




                        <div class="note">
                            <span class="bag">KM</span> <label title="VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.">VNPAY - Giảm thêm tới 200.000đ khi ...</label>
                            <strong class="text-orange">VÀ 5 KM KHÁC</strong>
                        </div>
                        <div class="promote">
                            <a href="/phu-kien/thay-pin-daison-iphone-xs-max-dung-luong-chuan-3174mah">
                                <ul>
                                    <li><span class="bag">KM</span> VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.</li>
                                    <li><span class="bag">KM</span> ZaloPay - Ưu đãi tới 300.000đ khi thanh toán qua ZaloPay.</li>
                                    <li><span class="bag">KM</span> Home PayLater - Trả góp qua Home PayLater giảm tới 1.000.000đ</li>
                                </ul>
                            </a>
                        </div>
                    </div>
                    <div class="item">

                        <div class="img">
                            <a href="/phu-kien/thay-pin-iphone-5-chinh-hang-pisen-dung-luong-chuan-ip5-1440mah" title="Pin iPhone 5 Ch&#237;nh Hãng PISEN (Dung lượng chuẩn IP5:1440mAh)">
                                <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2020/11/27/ip-5c-2x-100.jpg" alt="Pin iPhone 5 Ch&#237;nh Hãng PISEN (Dung lượng chuẩn IP5:1440mAh)" title="Pin iPhone 5 Ch&#237;nh Hãng PISEN (Dung lượng chuẩn IP5:1440mAh)">
                            </a>
                        </div>




                        <span class="sales">
                            <i class="icon-flash2"></i> Giảm 113,000 ₫
                        </span>

                        <div class="info">
                            <a href="/phu-kien/thay-pin-iphone-5-chinh-hang-pisen-dung-luong-chuan-ip5-1440mah" class="title" title="Pin iPhone 5 Ch&#237;nh Hãng PISEN (Dung lượng chuẩn IP5:1440mAh)">Pin iPhone 5 Ch&#237;nh Hãng PISEN (Dung lượng chuẩn IP5:1440mAh)</a>
                            <span class="price">
                                <strong>149,000 ₫</strong>
                                <strike>262,000 ₫</strike>
                            </span>



                        </div>




                        <div class="note">
                            <span class="bag">KM</span> <label title="VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.">VNPAY - Giảm thêm tới 200.000đ khi ...</label>
                            <strong class="text-orange">VÀ 5 KM KHÁC</strong>
                        </div>
                        <div class="promote">
                            <a href="/phu-kien/thay-pin-iphone-5-chinh-hang-pisen-dung-luong-chuan-ip5-1440mah">
                                <ul>
                                    <li><span class="bag">KM</span> VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.</li>
                                    <li><span class="bag">KM</span> ZaloPay - Ưu đãi tới 300.000đ khi thanh toán qua ZaloPay.</li>
                                    <li><span class="bag">KM</span> Home PayLater - Trả góp qua Home PayLater giảm tới 1.000.000đ</li>
                                </ul>
                            </a>
                        </div>
                    </div>
                    <div class="item">

                        <div class="img">
                            <a href="/phu-kien/pin-energizer-iphone-7-plus-eca7p2900p-chinh-hang" title="Pin Energizer iPhone 7 Plus - ECA7P2900P - Ch&#237;nh hãng">
                                <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2021/04/05/ip7-637449430788149335.png" alt="Pin Energizer iPhone 7 Plus - ECA7P2900P - Ch&#237;nh hãng" title="Pin Energizer iPhone 7 Plus - ECA7P2900P - Ch&#237;nh hãng">
                            </a>
                        </div>




                        <span class="sales">
                            <i class="icon-flash2"></i> Giảm 260,000 ₫
                        </span>

                        <div class="info">
                            <a href="/phu-kien/pin-energizer-iphone-7-plus-eca7p2900p-chinh-hang" class="title" title="Pin Energizer iPhone 7 Plus - ECA7P2900P - Ch&#237;nh hãng">Pin Energizer iPhone 7 Plus - ECA7P2900P - Ch&#237;nh hãng</a>
                            <span class="price">
                                <strong>490,000 ₫</strong>
                                <strike>750,000 ₫</strike>
                            </span>



                        </div>




                        <div class="note">
                            <span class="bag">KM</span> <label title="VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.">VNPAY - Giảm thêm tới 200.000đ khi ...</label>
                            <strong class="text-orange">VÀ 5 KM KHÁC</strong>
                        </div>
                        <div class="promote">
                            <a href="/phu-kien/pin-energizer-iphone-7-plus-eca7p2900p-chinh-hang">
                                <ul>
                                    <li><span class="bag">KM</span> VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.</li>
                                    <li><span class="bag">KM</span> ZaloPay - Ưu đãi tới 300.000đ khi thanh toán qua ZaloPay.</li>
                                    <li><span class="bag">KM</span> Home PayLater - Trả góp qua Home PayLater giảm tới 1.000.000đ</li>
                                </ul>
                            </a>
                        </div>
                    </div>
                    <div class="item">

                        <div class="img">
                            <a href="/phu-kien/pin-energizer-iphone-6s-plus-eca6sp2750p-chinh-hang" title="Pin Energizer iPhone 6S Plus - ECA6SP2750P - Ch&#237;nh hãng">
                                <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2021/04/05/ip6s.png" alt="Pin Energizer iPhone 6S Plus - ECA6SP2750P - Ch&#237;nh hãng" title="Pin Energizer iPhone 6S Plus - ECA6SP2750P - Ch&#237;nh hãng">
                            </a>
                        </div>




                        <span class="sales">
                            <i class="icon-flash2"></i> Giảm 171,000 ₫
                        </span>

                        <div class="info">
                            <a href="/phu-kien/pin-energizer-iphone-6s-plus-eca6sp2750p-chinh-hang" class="title" title="Pin Energizer iPhone 6S Plus - ECA6SP2750P - Ch&#237;nh hãng">Pin Energizer iPhone 6S Plus - ECA6SP2750P - Ch&#237;nh hãng</a>
                            <span class="price">
                                <strong>399,000 ₫</strong>
                                <strike>570,000 ₫</strike>
                            </span>



                        </div>




                        <div class="note">
                            <span class="bag">KM</span> <label title="VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.">VNPAY - Giảm thêm tới 200.000đ khi ...</label>
                            <strong class="text-orange">VÀ 5 KM KHÁC</strong>
                        </div>
                        <div class="promote">
                            <a href="/phu-kien/pin-energizer-iphone-6s-plus-eca6sp2750p-chinh-hang">
                                <ul>
                                    <li><span class="bag">KM</span> VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.</li>
                                    <li><span class="bag">KM</span> ZaloPay - Ưu đãi tới 300.000đ khi thanh toán qua ZaloPay.</li>
                                    <li><span class="bag">KM</span> Home PayLater - Trả góp qua Home PayLater giảm tới 1.000.000đ</li>
                                </ul>
                            </a>
                        </div>
                    </div>
                    <div class="item">

                        <div class="img">
                            <a href="/phu-kien/thay-pin-iphone-8-chinh-hang-pisen-dung-luong-chuan-1821mah" title="Pin iPhone 8 Ch&#237;nh Hãng PISEN (Dung lượng chuẩn 1821mAh)">
                                <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2020/11/27/ip-8-2x-100.jpg" alt="Pin iPhone 8 Ch&#237;nh Hãng PISEN (Dung lượng chuẩn 1821mAh)" title="Pin iPhone 8 Ch&#237;nh Hãng PISEN (Dung lượng chuẩn 1821mAh)">
                            </a>
                        </div>




                        <span class="sales">
                            <i class="icon-flash2"></i> Giảm 260,000 ₫
                        </span>

                        <div class="info">
                            <a href="/phu-kien/thay-pin-iphone-8-chinh-hang-pisen-dung-luong-chuan-1821mah" class="title" title="Pin iPhone 8 Ch&#237;nh Hãng PISEN (Dung lượng chuẩn 1821mAh)">Pin iPhone 8 Ch&#237;nh Hãng PISEN (Dung lượng chuẩn 1821mAh)</a>
                            <span class="price">
                                <strong>490,000 ₫</strong>
                                <strike>750,000 ₫</strike>
                            </span>



                        </div>




                        <div class="note">
                            <span class="bag">KM</span> <label title="VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.">VNPAY - Giảm thêm tới 200.000đ khi ...</label>
                            <strong class="text-orange">VÀ 5 KM KHÁC</strong>
                        </div>
                        <div class="promote">
                            <a href="/phu-kien/thay-pin-iphone-8-chinh-hang-pisen-dung-luong-chuan-1821mah">
                                <ul>
                                    <li><span class="bag">KM</span> VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.</li>
                                    <li><span class="bag">KM</span> ZaloPay - Ưu đãi tới 300.000đ khi thanh toán qua ZaloPay.</li>
                                    <li><span class="bag">KM</span> Home PayLater - Trả góp qua Home PayLater giảm tới 1.000.000đ</li>
                                </ul>
                            </a>
                        </div>
                    </div>
                    <div class="item">

                        <div class="img">
                            <a href="/phu-kien/thay-pin-iphone-x-chinh-hang-pisen-dung-luong-chuan-2716mah" title="Pin iPhone X Ch&#237;nh Hãng PISEN (Dung lượng chuẩn 2716mAh)">
                                <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2020/11/27/ip-x-2x-100.jpg" alt="Pin iPhone X Ch&#237;nh Hãng PISEN (Dung lượng chuẩn 2716mAh)" title="Pin iPhone X Ch&#237;nh Hãng PISEN (Dung lượng chuẩn 2716mAh)">
                            </a>
                        </div>




                        <span class="sales">
                            <i class="icon-flash2"></i> Giảm 790,000 ₫
                        </span>

                        <div class="info">
                            <a href="/phu-kien/thay-pin-iphone-x-chinh-hang-pisen-dung-luong-chuan-2716mah" class="title" title="Pin iPhone X Ch&#237;nh Hãng PISEN (Dung lượng chuẩn 2716mAh)">Pin iPhone X Ch&#237;nh Hãng PISEN (Dung lượng chuẩn 2716mAh)</a>
                            <span class="price">
                                <strong>690,000 ₫</strong>
                                <strike>1,480,000 ₫</strike>
                            </span>



                        </div>




                        <div class="note">
                            <span class="bag">KM</span> <label title="VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.">VNPAY - Giảm thêm tới 200.000đ khi ...</label>
                            <strong class="text-orange">VÀ 5 KM KHÁC</strong>
                        </div>
                        <div class="promote">
                            <a href="/phu-kien/thay-pin-iphone-x-chinh-hang-pisen-dung-luong-chuan-2716mah">
                                <ul>
                                    <li><span class="bag">KM</span> VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.</li>
                                    <li><span class="bag">KM</span> ZaloPay - Ưu đãi tới 300.000đ khi thanh toán qua ZaloPay.</li>
                                    <li><span class="bag">KM</span> Home PayLater - Trả góp qua Home PayLater giảm tới 1.000.000đ</li>
                                </ul>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section>
        <div class="container">
            <div class="ads">
                <a href="https://hoanghamobile.com/robot-hut-bui/robot-hut-bui-dreame-bot-w10-chinh-hang" target="_top"><img src="https://cdn.hoanghamobile.com/i/home/Uploads/2023/11/20/robot-hut-bui-dreame-bot-w10-01.jpg" style="width: 100%;"></a>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="flash-sales box-home">
                <div class="header-container">
                    <div class="header">
                        <h4><a href="https://hoanghamobile.com/smart-home">Smart Home</a></h4>
                    </div>

                </div>

                <div class="content">
                    <div class="owl-carousel lr-slider equaHeight" data-obj=".info a.title">

                        <div class="item">
                            <div class="img">
                                <a href="/camera/camera-ip-wifi-tp-link-tapo-c200-360&#176;-1080p-chinh-hang">
                                    <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/08/04/whatsapp-image-2023-08-04-at-16-55-35.jpeg" alt="Camera IP Wifi TP-Link Tapo C200 360&#176; 1080P - Ch&#237;nh hãng" title="Camera IP Wifi TP-Link Tapo C200 360&#176; 1080P - Ch&#237;nh hãng">
                                </a>
                            </div>



                            <div class="info">
                                <a href="/camera/camera-ip-wifi-tp-link-tapo-c200-360&#176;-1080p-chinh-hang" class="title">Camera IP Wifi TP-Link Tapo C200 360&#176; 1080P - Ch&#237;nh hãng</a>
                                <span class="price">
                                    <strong>460,000 ₫</strong>
                                    <strike>799,000 ₫</strike>
                                </span>
                            </div>


                            <div class="note">
                                <span class="bag">KM</span> <label title="VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.">VNPAY - Giảm thêm tới 200.000đ khi ...</label>
                                <strong class="text-orange">VÀ 5 KM KHÁC</strong>
                            </div>
                            <div class="promote">
                                <a href="/camera/camera-ip-wifi-tp-link-tapo-c200-360&#176;-1080p-chinh-hang">
                                    <ul>
                                        <li><span class="bag">KM</span> VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.</li>
                                        <li><span class="bag">KM</span> ZaloPay - Ưu đãi tới 300.000đ khi thanh toán qua ZaloPay.</li>
                                        <li><span class="bag">KM</span> Home PayLater - Trả góp qua Home PayLater giảm tới 1.000.000đ</li>
                                    </ul>
                                </a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="img">
                                <a href="/robot-hut-bui/may-hut-bui-mi-handheld-vacuum-cleaner-light-chinh-hang">
                                    <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2021/06/09/image-removebg-preview.png" alt="Máy h&#250;t bụi Mi Handheld Vacuum Cleaner Light - Ch&#237;nh hãng" title="Máy h&#250;t bụi Mi Handheld Vacuum Cleaner Light - Ch&#237;nh hãng">
                                </a>
                            </div>



                            <div class="info">
                                <a href="/robot-hut-bui/may-hut-bui-mi-handheld-vacuum-cleaner-light-chinh-hang" class="title">Máy h&#250;t bụi Mi Handheld Vacuum Cleaner Light - Ch&#237;nh hãng</a>
                                <span class="price">
                                    <strong>1,590,000 ₫</strong>
                                    <strike>3,490,000 ₫</strike>
                                </span>
                            </div>


                            <div class="note">
                                <span class="bag">KM</span> <label title="VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.">VNPAY - Giảm thêm tới 200.000đ khi ...</label>
                                <strong class="text-orange">VÀ 5 KM KHÁC</strong>
                            </div>
                            <div class="promote">
                                <a href="/robot-hut-bui/may-hut-bui-mi-handheld-vacuum-cleaner-light-chinh-hang">
                                    <ul>
                                        <li><span class="bag">KM</span> VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.</li>
                                        <li><span class="bag">KM</span> ZaloPay - Ưu đãi tới 300.000đ khi thanh toán qua ZaloPay.</li>
                                        <li><span class="bag">KM</span> Home PayLater - Trả góp qua Home PayLater giảm tới 1.000.000đ</li>
                                    </ul>
                                </a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="img">
                                <a href="/robot-hut-bui/robot-hut-bui-dreame-bot-w10-chinh-hang">
                                    <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2022/01/08/image-removebg-preview-23.png" alt="Robot h&#250;t bụi Dreame Bot W10 - Ch&#237;nh hãng" title="Robot h&#250;t bụi Dreame Bot W10 - Ch&#237;nh hãng">
                                </a>
                            </div>



                            <div class="info">
                                <a href="/robot-hut-bui/robot-hut-bui-dreame-bot-w10-chinh-hang" class="title">Robot h&#250;t bụi Dreame Bot W10 - Ch&#237;nh hãng</a>
                                <span class="price">
                                    <strong>11,990,000 ₫</strong>
                                    <strike>21,990,000 ₫</strike>
                                </span>
                            </div>


                            <div class="note">
                                <span class="bag">KM</span> <label title="VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.">VNPAY - Giảm thêm tới 200.000đ khi ...</label>
                                <strong class="text-orange">VÀ 7 KM KHÁC</strong>
                            </div>
                            <div class="promote">
                                <a href="/robot-hut-bui/robot-hut-bui-dreame-bot-w10-chinh-hang">
                                    <ul>
                                        <li><span class="bag">KM</span> VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.</li>
                                        <li><span class="bag">KM</span> ZaloPay - Ưu đãi tới 300.000đ khi thanh toán qua ZaloPay.</li>
                                        <li><span class="bag">KM</span> Home PayLater - Trả góp qua Home PayLater giảm tới 1.000.000đ</li>
                                    </ul>
                                </a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="img">
                                <a href="/may-loc-khong-khi/may-loc-khong-khi-clair-k2m24-chinh-hang">
                                    <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2022/01/25/1233334.png" alt="Máy lọc không kh&#237; Clair K2M24 - Ch&#237;nh hãng" title="Máy lọc không kh&#237; Clair K2M24 - Ch&#237;nh hãng">
                                </a>
                            </div>



                            <div class="info">
                                <a href="/may-loc-khong-khi/may-loc-khong-khi-clair-k2m24-chinh-hang" class="title">Máy lọc không kh&#237; Clair K2M24 - Ch&#237;nh hãng</a>
                                <span class="price">
                                    <strong>899,000 ₫</strong>
                                    <strike>4,890,000 ₫</strike>
                                </span>
                            </div>


                            <div class="note">
                                <span class="bag">KM</span> <label title="VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.">VNPAY - Giảm thêm tới 200.000đ khi ...</label>
                                <strong class="text-orange">VÀ 5 KM KHÁC</strong>
                            </div>
                            <div class="promote">
                                <a href="/may-loc-khong-khi/may-loc-khong-khi-clair-k2m24-chinh-hang">
                                    <ul>
                                        <li><span class="bag">KM</span> VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.</li>
                                        <li><span class="bag">KM</span> ZaloPay - Ưu đãi tới 300.000đ khi thanh toán qua ZaloPay.</li>
                                        <li><span class="bag">KM</span> Home PayLater - Trả góp qua Home PayLater giảm tới 1.000.000đ</li>
                                    </ul>
                                </a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="img">
                                <a href="/may-loc-khong-khi/may-loc-khong-khi-clair-tower-plus-air-purifier-t1c24-chinh-hang">
                                    <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2022/01/25/t-removebg-preview.png" alt="Máy lọc không kh&#237; Clair Tower Plus Air Purifier (T1C24) - Ch&#237;nh hãng" title="Máy lọc không kh&#237; Clair Tower Plus Air Purifier (T1C24) - Ch&#237;nh hãng">
                                </a>
                            </div>



                            <div class="info">
                                <a href="/may-loc-khong-khi/may-loc-khong-khi-clair-tower-plus-air-purifier-t1c24-chinh-hang" class="title">Máy lọc không kh&#237; Clair Tower Plus Air Purifier (T1C24) - Ch&#237;nh hãng</a>
                                <span class="price">
                                    <strong>1,990,000 ₫</strong>
                                    <strike>7,290,000 ₫</strike>
                                </span>
                            </div>


                            <div class="note">
                                <span class="bag">KM</span> <label title="VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.">VNPAY - Giảm thêm tới 200.000đ khi ...</label>
                                <strong class="text-orange">VÀ 5 KM KHÁC</strong>
                            </div>
                            <div class="promote">
                                <a href="/may-loc-khong-khi/may-loc-khong-khi-clair-tower-plus-air-purifier-t1c24-chinh-hang">
                                    <ul>
                                        <li><span class="bag">KM</span> VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.</li>
                                        <li><span class="bag">KM</span> ZaloPay - Ưu đãi tới 300.000đ khi thanh toán qua ZaloPay.</li>
                                        <li><span class="bag">KM</span> Home PayLater - Trả góp qua Home PayLater giảm tới 1.000.000đ</li>
                                    </ul>
                                </a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="img">
                                <a href="/may-loc-khong-khi/may-loc-khong-khi-xiaomi-air-purifier-4-lite-chinh-hang">
                                    <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2022/02/12/xiaomi-smart-air-purifier-lite-7.png" alt="Máy lọc không kh&#237; Xiaomi Air Purifier 4 Lite - Ch&#237;nh hãng" title="Máy lọc không kh&#237; Xiaomi Air Purifier 4 Lite - Ch&#237;nh hãng">
                                </a>
                            </div>



                            <div class="info">
                                <a href="/may-loc-khong-khi/may-loc-khong-khi-xiaomi-air-purifier-4-lite-chinh-hang" class="title">Máy lọc không kh&#237; Xiaomi Air Purifier 4 Lite - Ch&#237;nh hãng</a>
                                <span class="price">
                                    <strong>1,990,000 ₫</strong>
                                    <strike>3,990,000 ₫</strike>
                                </span>
                            </div>


                            <div class="note">
                                <span class="bag">KM</span> <label title="VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.">VNPAY - Giảm thêm tới 200.000đ khi ...</label>
                                <strong class="text-orange">VÀ 5 KM KHÁC</strong>
                            </div>
                            <div class="promote">
                                <a href="/may-loc-khong-khi/may-loc-khong-khi-xiaomi-air-purifier-4-lite-chinh-hang">
                                    <ul>
                                        <li><span class="bag">KM</span> VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.</li>
                                        <li><span class="bag">KM</span> ZaloPay - Ưu đãi tới 300.000đ khi thanh toán qua ZaloPay.</li>
                                        <li><span class="bag">KM</span> Home PayLater - Trả góp qua Home PayLater giảm tới 1.000.000đ</li>
                                    </ul>
                                </a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="img">
                                <a href="/phu-kien/o-cam-dien-thong-minh-chong-giat-vconex-smart-plug">
                                    <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2022/07/11/vconex-smart-plug-7.png" alt="Ổ cắm điện thông minh chống giật Vconnex Smart Plug - Ch&#237;nh hãng" title="Ổ cắm điện thông minh chống giật Vconnex Smart Plug - Ch&#237;nh hãng">
                                </a>
                            </div>



                            <div class="info">
                                <a href="/phu-kien/o-cam-dien-thong-minh-chong-giat-vconex-smart-plug" class="title">Ổ cắm điện thông minh chống giật Vconnex Smart Plug - Ch&#237;nh hãng</a>
                                <span class="price">
                                    <strong>299,000 ₫</strong>
                                    <strike>490,000 ₫</strike>
                                </span>
                            </div>


                            <div class="note">
                                <span class="bag">KM</span> <label title="VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.">VNPAY - Giảm thêm tới 200.000đ khi ...</label>
                                <strong class="text-orange">VÀ 5 KM KHÁC</strong>
                            </div>
                            <div class="promote">
                                <a href="/phu-kien/o-cam-dien-thong-minh-chong-giat-vconex-smart-plug">
                                    <ul>
                                        <li><span class="bag">KM</span> VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.</li>
                                        <li><span class="bag">KM</span> ZaloPay - Ưu đãi tới 300.000đ khi thanh toán qua ZaloPay.</li>
                                        <li><span class="bag">KM</span> Home PayLater - Trả góp qua Home PayLater giảm tới 1.000.000đ</li>
                                    </ul>
                                </a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="img">
                                <a href="/may-loc-khong-khi/may-loc-khong-khi-xiaomi-air-purifier-4-compact-chinh-hang">
                                    <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2022/09/22/image-removebg-preview-18.png" alt="Máy lọc không kh&#237; Xiaomi Air Purifier 4 Compact - Ch&#237;nh hãng" title="Máy lọc không kh&#237; Xiaomi Air Purifier 4 Compact - Ch&#237;nh hãng">
                                </a>
                            </div>



                            <div class="info">
                                <a href="/may-loc-khong-khi/may-loc-khong-khi-xiaomi-air-purifier-4-compact-chinh-hang" class="title">Máy lọc không kh&#237; Xiaomi Air Purifier 4 Compact - Ch&#237;nh hãng</a>
                                <span class="price">
                                    <strong>1,590,000 ₫</strong>
                                    <strike>2,590,000 ₫</strike>
                                </span>
                            </div>


                            <div class="note">
                                <span class="bag">KM</span> <label title="VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.">VNPAY - Giảm thêm tới 200.000đ khi ...</label>
                                <strong class="text-orange">VÀ 5 KM KHÁC</strong>
                            </div>
                            <div class="promote">
                                <a href="/may-loc-khong-khi/may-loc-khong-khi-xiaomi-air-purifier-4-compact-chinh-hang">
                                    <ul>
                                        <li><span class="bag">KM</span> VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.</li>
                                        <li><span class="bag">KM</span> ZaloPay - Ưu đãi tới 300.000đ khi thanh toán qua ZaloPay.</li>
                                        <li><span class="bag">KM</span> Home PayLater - Trả góp qua Home PayLater giảm tới 1.000.000đ</li>
                                    </ul>
                                </a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="img">
                                <a href="/do-gia-dung/may-tam-nuoc-h2ofloss-hf-6-trang-chinh-hang">
                                    <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2022/10/31/image-removebg-preview-6.png" alt="Máy tăm nước H2OFLOSS HF-6 Trắng - Ch&#237;nh hãng " title="Máy tăm nước H2OFLOSS HF-6 Trắng - Ch&#237;nh hãng ">
                                </a>
                            </div>



                            <div class="info">
                                <a href="/do-gia-dung/may-tam-nuoc-h2ofloss-hf-6-trang-chinh-hang" class="title">Máy tăm nước H2OFLOSS HF-6 Trắng - Ch&#237;nh hãng </a>
                                <span class="price">
                                    <strong>590,000 ₫</strong>
                                </span>
                            </div>


                            <div class="note">
                                <span class="bag">KM</span> <label title="VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.">VNPAY - Giảm thêm tới 200.000đ khi ...</label>
                                <strong class="text-orange">VÀ 5 KM KHÁC</strong>
                            </div>
                            <div class="promote">
                                <a href="/do-gia-dung/may-tam-nuoc-h2ofloss-hf-6-trang-chinh-hang">
                                    <ul>
                                        <li><span class="bag">KM</span> VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.</li>
                                        <li><span class="bag">KM</span> ZaloPay - Ưu đãi tới 300.000đ khi thanh toán qua ZaloPay.</li>
                                        <li><span class="bag">KM</span> Home PayLater - Trả góp qua Home PayLater giảm tới 1.000.000đ</li>
                                    </ul>
                                </a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="img">
                                <a href="/robot-hut-bui/may-hut-dem-diet-khuan-thong-minh-smarock-s10-pro">
                                    <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/03/08/smarock-s10-pro-3.png" alt="Máy h&#250;t đệm diệt khuẩn thông minh Smarock S10 Pro - Ch&#237;nh hãng" title="Máy h&#250;t đệm diệt khuẩn thông minh Smarock S10 Pro - Ch&#237;nh hãng">
                                </a>
                            </div>



                            <div class="info">
                                <a href="/robot-hut-bui/may-hut-dem-diet-khuan-thong-minh-smarock-s10-pro" class="title">Máy h&#250;t đệm diệt khuẩn thông minh Smarock S10 Pro - Ch&#237;nh hãng</a>
                                <span class="price">
                                    <strong>1,990,000 ₫</strong>
                                    <strike>3,290,000 ₫</strike>
                                </span>
                            </div>


                            <div class="note">
                                <span class="bag">KM</span> <label title="VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.">VNPAY - Giảm thêm tới 200.000đ khi ...</label>
                                <strong class="text-orange">VÀ 5 KM KHÁC</strong>
                            </div>
                            <div class="promote">
                                <a href="/robot-hut-bui/may-hut-dem-diet-khuan-thong-minh-smarock-s10-pro">
                                    <ul>
                                        <li><span class="bag">KM</span> VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.</li>
                                        <li><span class="bag">KM</span> ZaloPay - Ưu đãi tới 300.000đ khi thanh toán qua ZaloPay.</li>
                                        <li><span class="bag">KM</span> Home PayLater - Trả góp qua Home PayLater giảm tới 1.000.000đ</li>
                                    </ul>
                                </a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="img">
                                <a href="/robot-hut-bui/robot-hut-bui-xiaomi-vacuum-e10-chinh-hang">
                                    <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/03/10/e10-3.png" alt="Robot h&#250;t bụi Xiaomi Vacuum E10 - Ch&#237;nh hãng" title="Robot h&#250;t bụi Xiaomi Vacuum E10 - Ch&#237;nh hãng">
                                </a>
                            </div>



                            <div class="info">
                                <a href="/robot-hut-bui/robot-hut-bui-xiaomi-vacuum-e10-chinh-hang" class="title">Robot h&#250;t bụi Xiaomi Vacuum E10 - Ch&#237;nh hãng</a>
                                <span class="price">
                                    <strong>3,990,000 ₫</strong>
                                    <strike>6,490,000 ₫</strike>
                                </span>
                            </div>


                            <div class="note">
                                <span class="bag">KM</span> <label title="VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.">VNPAY - Giảm thêm tới 200.000đ khi ...</label>
                                <strong class="text-orange">VÀ 6 KM KHÁC</strong>
                            </div>
                            <div class="promote">
                                <a href="/robot-hut-bui/robot-hut-bui-xiaomi-vacuum-e10-chinh-hang">
                                    <ul>
                                        <li><span class="bag">KM</span> VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.</li>
                                        <li><span class="bag">KM</span> ZaloPay - Ưu đãi tới 300.000đ khi thanh toán qua ZaloPay.</li>
                                        <li><span class="bag">KM</span> Home PayLater - Trả góp qua Home PayLater giảm tới 1.000.000đ</li>
                                    </ul>
                                </a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="img">
                                <a href="/robot-hut-bui/robot-hut-bui-xiaomi-vacuum-x10-plus-chinh-hang">
                                    <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/03/10/x10-plus-6-33.png" alt="Robot h&#250;t bụi Xiaomi Vacuum X10 Plus - Ch&#237;nh hãng" title="Robot h&#250;t bụi Xiaomi Vacuum X10 Plus - Ch&#237;nh hãng">
                                </a>
                            </div>



                            <div class="info">
                                <a href="/robot-hut-bui/robot-hut-bui-xiaomi-vacuum-x10-plus-chinh-hang" class="title">Robot h&#250;t bụi Xiaomi Vacuum X10 Plus - Ch&#237;nh hãng</a>
                                <span class="price">
                                    <strong>12,490,000 ₫</strong>
                                    <strike>29,990,000 ₫</strike>
                                </span>
                            </div>


                            <div class="note">
                                <span class="bag">KM</span> <label title="VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.">VNPAY - Giảm thêm tới 200.000đ khi ...</label>
                                <strong class="text-orange">VÀ 6 KM KHÁC</strong>
                            </div>
                            <div class="promote">
                                <a href="/robot-hut-bui/robot-hut-bui-xiaomi-vacuum-x10-plus-chinh-hang">
                                    <ul>
                                        <li><span class="bag">KM</span> VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.</li>
                                        <li><span class="bag">KM</span> ZaloPay - Ưu đãi tới 300.000đ khi thanh toán qua ZaloPay.</li>
                                        <li><span class="bag">KM</span> Home PayLater - Trả góp qua Home PayLater giảm tới 1.000.000đ</li>
                                    </ul>
                                </a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="img">
                                <a href="/camera/camera-xiaomi-mi-home-security-c200-bhr6766gl">
                                    <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/03/15/xiaomi-mi-home-security-c200.png" alt="Camera Xiaomi MI Home Security C200 (BHR6766GL)" title="Camera Xiaomi MI Home Security C200 (BHR6766GL)">
                                </a>
                            </div>



                            <div class="info">
                                <a href="/camera/camera-xiaomi-mi-home-security-c200-bhr6766gl" class="title">Camera Xiaomi MI Home Security C200 (BHR6766GL)</a>
                                <span class="price">
                                    <strong>590,000 ₫</strong>
                                    <strike>949,000 ₫</strike>
                                </span>
                            </div>


                            <div class="note">
                                <span class="bag">KM</span> <label title="VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.">VNPAY - Giảm thêm tới 200.000đ khi ...</label>
                                <strong class="text-orange">VÀ 5 KM KHÁC</strong>
                            </div>
                            <div class="promote">
                                <a href="/camera/camera-xiaomi-mi-home-security-c200-bhr6766gl">
                                    <ul>
                                        <li><span class="bag">KM</span> VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.</li>
                                        <li><span class="bag">KM</span> ZaloPay - Ưu đãi tới 300.000đ khi thanh toán qua ZaloPay.</li>
                                        <li><span class="bag">KM</span> Home PayLater - Trả góp qua Home PayLater giảm tới 1.000.000đ</li>
                                    </ul>
                                </a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="img">
                                <a href="/do-gia-dung/noi-chien-khong-dau-xiaomi-smart-air-fryer-pro-4l-bhr6943eu">
                                    <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/05/24/xiaomi-smart-air-fryer-pro-4l-bhr-3.png" alt="Nồi chiên không dầu Xiaomi Smart Air Fryer Pro 4L - BHR6943EU" title="Nồi chiên không dầu Xiaomi Smart Air Fryer Pro 4L - BHR6943EU">
                                </a>
                            </div>



                            <div class="info">
                                <a href="/do-gia-dung/noi-chien-khong-dau-xiaomi-smart-air-fryer-pro-4l-bhr6943eu" class="title">Nồi chiên không dầu Xiaomi Smart Air Fryer Pro 4L - BHR6943EU</a>
                                <span class="price">
                                    <strong>1,490,000 ₫</strong>
                                    <strike>2,990,000 ₫</strike>
                                </span>
                            </div>


                            <div class="note">
                                <span class="bag">KM</span> <label title="VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.">VNPAY - Giảm thêm tới 200.000đ khi ...</label>
                                <strong class="text-orange">VÀ 5 KM KHÁC</strong>
                            </div>
                            <div class="promote">
                                <a href="/do-gia-dung/noi-chien-khong-dau-xiaomi-smart-air-fryer-pro-4l-bhr6943eu">
                                    <ul>
                                        <li><span class="bag">KM</span> VNPAY - Giảm thêm tới 200.000đ khi thanh toán qua VNPAY.</li>
                                        <li><span class="bag">KM</span> ZaloPay - Ưu đãi tới 300.000đ khi thanh toán qua ZaloPay.</li>
                                        <li><span class="bag">KM</span> Home PayLater - Trả góp qua Home PayLater giảm tới 1.000.000đ</li>
                                    </ul>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>








    <section>
        <div class="container">
            <div class="box-icon box-home">
                <div class="header">
                    <h4><a href="https://hoanghamobile.com/phu-kien">Phụ Kiện</a></h4>
                </div>

                <div class="content">
                    <ul>
                        <li>
                            <a href="/the-nho-usb">
                                <span><img src="https://cdn.hoanghamobile.com/i/cat/Uploads/2021/11/18/icon-moi-2.png" /></span>
                                <label>Thẻ nhớ - USB</label>
                            </a>
                        </li>
                        <li>
                            <a href="/tai-nghe">
                                <span><img src="https://cdn.hoanghamobile.com/i/cat/Uploads/2021/11/18/icon-moi-15.png" /></span>
                                <label>Tai nghe</label>
                            </a>
                        </li>
                        <li>
                            <a href="/sac-du-phong">
                                <span><img src="https://cdn.hoanghamobile.com/i/cat/Uploads/2021/11/18/icon-moi-10.png" /></span>
                                <label>Sạc dự ph&#242;ng</label>
                            </a>
                        </li>
                        <li>
                            <a href="/do-choi-cong-nghe/quat-de-ban">
                                <span><img src="https://cdn.hoanghamobile.com/i/cat/Uploads/2021/11/18/icon-moi-1.png" /></span>
                                <label>Quạt Mini</label>
                            </a>
                        </li>
                        <li>
                            <a href="/loa">
                                <span><img src="https://cdn.hoanghamobile.com/i/cat/Uploads/2021/11/18/icon-moi-14.png" /></span>
                                <label>Loa</label>
                            </a>
                        </li>
                        <li>
                            <a href="/phu-kien/day-deo-dong-ho">
                                <span><img src="https://cdn.hoanghamobile.com/i/cat/Uploads/2021/11/18/icon-xanh-2.png" /></span>
                                <label>D&#226;y đeo đồng hồ, Airtag</label>
                            </a>
                        </li>
                        <li>
                            <a href="/cu-sac-day-cap">
                                <span><img src="https://cdn.hoanghamobile.com/i/cat/Uploads/2021/11/18/icon-moi-9.png" /></span>
                                <label>Củ sạc - D&#226;y cáp</label>
                            </a>
                        </li>
                        <li>
                            <a href="/camera-an-ninh">
                                <span><img src="https://cdn.hoanghamobile.com/i/cat/Uploads/2021/11/18/icon-moi-12.png" /></span>
                                <label>Camera an ninh</label>
                            </a>
                        </li>
                        <li>
                            <a href="/phu-kien/bo-phat-wifi">
                                <span><img src="https://cdn.hoanghamobile.com/i/cat/Uploads/2021/11/18/icon-moi-11.png" /></span>
                                <label>Thiết bị mạng</label>
                            </a>
                        </li>
                        <li>
                            <a href="/phu-kien/phu-kien-apple">
                                <span><img src="https://cdn.hoanghamobile.com/i/cat/Uploads/2021/11/18/icon-moi-3.png" /></span>
                                <label>Apple</label>
                            </a>
                        </li>
                        <li>
                            <a href="/op-lung-dien-thoai">
                                <span><img src="https://cdn.hoanghamobile.com/i/cat/Uploads/2021/11/18/icon-moi-6.png" /></span>
                                <label>Bao da - ốp lưng</label>
                            </a>
                        </li>
                        <li>
                            <a href="https://hoanghamobile.com/phu-kien/mieng-dan-man-hinh">
                                <span><img src="https://cdn.hoanghamobile.com/i/cat/Uploads/2021/11/18/icon-xanh-5.png" /></span>
                                <label>Dán màn hình</label>
                            </a>
                        </li>
                        <li>
                            <a>
                                <span><img src="https://cdn.hoanghamobile.com/i/cat/Uploads/2021/11/18/icon-xanh-3.png" /></span>
                                <label>Phụ kiện Laptop</label>
                            </a>
                        </li>
                        <li>
                            <a href="https://hoanghamobile.com/do-choi-cong-nghe/gopro">
                                <span><img src="https://cdn.hoanghamobile.com/i/cat/Uploads/2021/11/18/icon-xanh-4.png" /></span>
                                <label>Camera hành trình</label>
                            </a>
                        </li>
                        <li>
                            <a href="https://hoanghamobile.com/smart-home/can-thong-minh">
                                <span><img src="https://cdn.hoanghamobile.com/i/cat/Uploads/2021/11/18/icon-xanh-6.png" /></span>
                                <label>C&#226;n thông minh</label>
                            </a>
                        </li>
                        <li>
                            <a href="https://hoanghamobile.com/do-choi-cong-nghe/tay-cam-chong-rung">
                                <span><img src="https://cdn.hoanghamobile.com/i/cat/Uploads/2021/11/18/icon-xanh-1.png" /></span>
                                <label>Tay cầm chống rung</label>
                            </a>
                        </li>
                        <li>
                            <a href="https://hoanghamobile.com/phu-kien/chuot">
                                <span><img src="https://cdn.hoanghamobile.com/i/cat/Uploads/2021/11/18/icon-moi-7.png" /></span>
                                <label>Chuột</label>
                            </a>
                        </li>
                        <li>
                            <a href="https://hoanghamobile.com/phu-kien/ban-phim">
                                <span><img src="https://cdn.hoanghamobile.com/i/cat/Uploads/2021/11/18/icon-moi-8.png" /></span>
                                <label>Bàn Ph&#237;m </label>
                            </a>
                        </li>
                        <li>
                            <a href="/do-gia-dung/may-loc-khong-khi">
                                <span><img src="https://cdn.hoanghamobile.com/i/cat/Uploads/2021/11/18/roboot.png" /></span>
                                <label>Máy lọc không kh&#237;</label>
                            </a>
                        </li>
                        <li>
                            <a href="/do-gia-dung/robot-hut-bui">
                                <span><img src="https://cdn.hoanghamobile.com/i/cat/Uploads/2021/11/18/icon-web-may-loc.png" /></span>
                                <label>Robot h&#250;t bụi</label>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>




    <!-- news -->
    <section>
        <div class="container">
            <div class="news-home box-home">
                <div class="header">
                    <h4><a href="/tin-tuc">TIN CÔNG NGHỆ</a></h4>
                </div>

                <div class="col-content">
                </div>
            </div>
        </div>
    </section>




    <section>
        <div class="container">
            <div class="news-home box-home">
                <div class="header">
                    <h4><a href="javascript:;">KHÁCH HÀNG CỦA HOÀNG HÀ</a></h4>
                </div>
            </div>


            <div class="testimonial">
                <div class="owl-carousel equaHeight testimonial-slider" data-obj=".item a.title">
                    <div class="item">
                        <div class="img">
                            <img src="https://cdn.hoanghamobile.com/i/idol/Uploads/2022/01/18/hhm00784ii.png" />
                        </div>

                        <div class="info">
                            <h3>DV Huyền Lizzie</h3>
                            <h4>Diễn viên truyền hình</h4>
                            <div class="note">
                                Huyền rất hay ghé Hoàng Hà Mobile mua các sản phẩm iPhone dù không hẳn là một tín đồ công nghệ. Về giá cả, chất lượng và độ uy tín thì Hoàng Hà đều mang lại cho mình sự hài lòng.
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="img">
                            <img src="https://cdn.hoanghamobile.com/i/idol/Uploads/2023/01/28/4dc00612-3f21-4061-963a-fb9bb982f6a6.jpeg" />
                        </div>

                        <div class="info">
                            <h3>Gia Đình Chuyện Nhà Đậu</h3>
                            <h4>Hot family</h4>
                            <div class="note">
                                Gia đình Chuyện nhà Đậu rất tin dùng các sản phẩm công nghệ chính hãng mua tại Hoàng Hà Mobile. Phải công nhận rằng cũng nhờ vào những thiết bị này mà chúng mình mới có thể quay thêm nhiều vlog thú vị cho khán giả xem. Hãy đến các chi nhánh của Hoàng Hà Mobile trên toàn quốc để mua sắm và trải nghiệm nhé!
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="img">
                            <img src="https://cdn.hoanghamobile.com/i/idol/Uploads/2023/01/28/f14a39b8-29ea-487d-969a-ec0e82d4df96.jpeg" />
                        </div>

                        <div class="info">
                            <h3>Ngô Lan Hương</h3>
                            <h4>Ca Sĩ</h4>
                            <div class="note">
                                Với lịch trình ca hát bận rộn, Ngô Lan Hương luôn cần chiếc smartphone đồng hành bên mình. Địa chỉ mua điện thoại chính hãng uy tín mà Hương lựa chọn luôn là Hoàng Hà Mobile. Khi đến đây, từ giá cả, chất lượng và thái độ phục vụ luôn khiến mình hài lòng.
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="img">
                            <img src="https://cdn.hoanghamobile.com/i/idol/Uploads/2022/03/29/whatsapp-image-2022-03-28-at-5-36-16-pm.jpeg" />
                        </div>

                        <div class="info">
                            <h3>Jun Vũ</h3>
                            <h4>Diễn viên</h4>
                            <div class="note">
                                Các sản phẩm đến từ thương hiệu Apple luôn chiếm trọn niềm yêu thích của mình từ cái nhìn đầu tiên. Và Hoàng Hà Mobile là nơi Jun Vũ tin tưởng nhất để mua sắm, với hơn 100 chi nhánh trên toàn quốc.
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="img">
                            <img src="https://cdn.hoanghamobile.com/i/idol/Uploads/2022/10/25/a9524b6593cf54910dde.jpg" />
                        </div>

                        <div class="info">
                            <h3>DV Thanh Sơn</h3>
                            <h4>Diễn viên truyền hình</h4>
                            <div class="note">
                                Sơn biết tới Hoàng Hà Mobile từ thời có mỗi chi nhánh ở Lê Duẩn, Hà Nội và vẫn tin tưởng mua các sản phẩm công nghệ ở đây cho đến tận bây giờ. Các bạn nhân viên rất nhiệt tình, thủ tục thanh toán nhanh gọn lại còn nhiều ưu đãi vào cuối tuần. Chắc chắn Sơn sẽ quay lại mua những lần sau.
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="img">
                            <img src="https://cdn.hoanghamobile.com/i/idol/Uploads/2022/06/14/15ac62ec-72dc-4c45-875d-8521c8b31867.jpg" />
                        </div>

                        <div class="info">
                            <h3>B&#249;i Lan Hương</h3>
                            <h4>Ca sĩ / Diễn viên Phim Em và Trịnh</h4>
                            <div class="note">
                                Hương không phải là người hiểu nhiều về công nghệ nên mỗi khi mua đồ mới Hương hay tham khảo người quen hoặc đến những shop đã có tên tuổi. Đợt này sắm điện thoại mới, Hương được bạn giới thiệu tới Hoàng Hà Mobile Quận 6 ngay gần nhà. Shop có nhiều máy trải nghiệm với nhân viên tư vấn nhiệt tình giúp Hương dễ dàng đưa ra lựa chọn sản phẩm phù hợp.
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="img">
                            <img src="https://cdn.hoanghamobile.com/i/idol/Uploads/2022/03/15/whatsapp-image-2022-03-15-at-9-51-46-am.jpeg" />
                        </div>

                        <div class="info">
                            <h3>B&#249;i Phương Nga </h3>
                            <h4>&#193; hậu </h4>
                            <div class="note">
                                Cảm ơn Hoàng Hà Mobile đã cho “Mợ” cơ hội là một trong những khách hàng đầu tiên sở hữu cực phẩm S22 Ultra của Samsung. “Cậu” Bình An ở nhà chắc cũng đang mê lắm đấy!
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="img">
                            <img src="https://cdn.hoanghamobile.com/i/idol/Uploads/2022/06/28/whatsapp-image-2022-06-20-at-10-35-17-am-1.jpeg" />
                        </div>

                        <div class="info">
                            <h3>Nguyễn Thị Oanh</h3>
                            <h4>VĐV điền kinh đội tuyển quốc gia Việt Nam</h4>
                            <div class="note">
                                Giành Huy chương Vàng SEA Games tại quê hương thực sự là một điều hạnh phúc. Để đánh dấu cột mốc này, Oanh quyết định tự thưởng cho mình một chiếc iPhone 13 Pro max sau chặng đường vừa qua.Và Hoàng Hà Mobile - địa chỉ bán lẻ ủy quyền của Apple uy tín hàng đầu, với mức giá cực kỳ ưu đãi đã thu hút được Oanh ngay từ cái nhìn đầu tiên.
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="img">
                            <img src="https://cdn.hoanghamobile.com/i/idol/Uploads/2022/06/14/ace1d739-a8fe-47c3-a5bf-a6683dda42d7.jpg" />
                        </div>

                        <div class="info">
                            <h3>Team Flash</h3>
                            <h4>Đội tuyển huy chương vàng Sea Game 31 bộ môn Liên Minh Huyền Thoại Tốc Chiến</h4>
                            <div class="note">
                                "Bí quyết giành Huy chương Vàng SEA Games 31 sao?
                                Nó đã nằm ngay ở cái tên của chúng tôi rồi!
                                Tốc độ' và sự chính xác sẽ là mấu chốt của chiến thắng! Team Flash tin tưởng Hoàng Hà Mobile là nơi mua sắm các sản phẩm công nghệ chính hãng, giá tốt hàng đầu, với cấu hình siêu khủng để cân mọi kèo thi đấu. "
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="img">
                            <img src="https://cdn.hoanghamobile.com/i/idol/Uploads/2022/03/15/whatsapp-image-2022-03-15-at-9-51-47-am.jpeg" />
                        </div>

                        <div class="info">
                            <h3>Tăng Vũ Minh Ph&#250;c </h3>
                            <h4>Ca sĩ </h4>
                            <div class="note">
                                Là một Samfan chân chính, Tăng Phúc không thể bỏ qua chương trình trả hàng sản phẩm S22 series tại Hoàng Hà Mobile được! Đặt hàng thuận lợi, ra nhận hàng thì nhanh chóng, nhân viên lại nhiệt tình. Từ nay về sau Tăng Phúc chỉ tin tưởng Hoàng Hà Mobile thôi!
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="img">
                            <img src="https://cdn.hoanghamobile.com/i/idol/Uploads/2022/06/28/whatsapp-image-2022-06-20-at-10-35-17-am-2.jpeg" />
                        </div>

                        <div class="info">
                            <h3>Quách Thị Lan </h3>
                            <h4>VĐV điền kinh đội tuyển quốc gia Việt Nam</h4>
                            <div class="note">
                                Là một vận động viên, Lan luôn muốn mình đạt hiệu quả tập luyện tối đa bằng những phương pháp hiện đại. Chính vì thế, Lan đã quyết định trang bị cho mình vòng đeo tay 𝗛𝘂𝗮𝘄𝗲𝗶 𝗙𝗶𝘁 𝟮 chính hãng tại Hoàng Hà Mobile. Với sự trợ giúp của chiếc vòng tay thông minh này, Lan tự tin hướng đến việc chinh phục những cột mốc mới trong sự nghiệp
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="img">
                            <img src="https://cdn.hoanghamobile.com/i/idol/Uploads/2022/03/15/whatsapp-image-2022-03-15-at-9-34-21-am.jpeg" />
                        </div>

                        <div class="info">
                            <h3>DV Trung Ruồi</h3>
                            <h4>Diễn viên</h4>
                            <div class="note">
                                Tháng củ mật, lớ ngớ thế nào lại để bị mất điện thoại, may mắn nhờ đại ca Quang Thắng giới thiệu qua Hoàng Hà Mobile, vừa sắm được máy mới sang sịn mịn mà còn với giá cả phải chăng. Từ nay chỉ tin tưởng mua đồ công nghệ ở Hoàng Hà thôi!!
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="img">
                            <img src="https://cdn.hoanghamobile.com/i/idol/Uploads/2022/06/28/whatsapp-image-2022-06-20-at-10-35-17-am.jpeg" />
                        </div>

                        <div class="info">
                            <h3>Quách Công Lịch</h3>
                            <h4>VĐV điền kinh đội tuyển quốc gia Việt Nam</h4>
                            <div class="note">
                                Để đạt được thành công, đồng nghĩa với việc mình phải cố gắng không ngừng. Hướng đến việc chinh phục những đỉnh cao mới, Công Lịch đã lựa chọn đồng hồ 𝗛𝘂𝗮𝘄𝗲𝗶 𝗪𝗮𝘁𝗰𝗵 𝗚𝗧𝟯 tại Hoàng Hà Mobile làm bạn đồng hành!
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="img">
                            <img src="https://cdn.hoanghamobile.com/i/idol/Uploads/2022/06/14/a4c5c140-0c5f-4b20-ab31-213997f2b113.jpg" />
                        </div>

                        <div class="info">
                            <h3>VĐV Trần Văn Đảng </h3>
                            <h4>HCV nội dung chạy 1.500m tại Giải điền kinh vô địch quốc gia 2021.</h4>
                            <div class="note">
                                Văn Đảng đã lựa chọn Samsung Galaxy Watch 4 là người bạn đồng hành cùng mình trong các buổi luyện tập. Còn nhắc đến việc mua sắm sản phẩm công nghệ thì không thể nào bỏ qua các chương trình khuyến mãi tại Hoàng Hà Mobile được rồi!
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="img">
                            <img src="https://cdn.hoanghamobile.com/i/idol/Uploads/2022/01/18/hhm00784.png" />
                        </div>

                        <div class="info">
                            <h3>NSƯT Quang Thắng</h3>
                            <h4>Nghệ sĩ, Diễn viên hài</h4>
                            <div class="note">
                                Từ sau cơ hội hợp tác với Hoàng Hà Mobile là Quang Thắng có thêm địa chỉ để mua sắm đồ công nghệ rất hợp lý ở cả Hà Nội và Hải Phòng quê mình.
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="img">
                            <img src="https://cdn.hoanghamobile.com/i/idol/Uploads/2022/01/06/phuong-oanh-1.jpg" />
                        </div>

                        <div class="info">
                            <h3>Diễn viên Phương Oanh</h3>
                            <h4>Diễn viên truyền hình/ Người mẫu </h4>
                            <div class="note">
                                Hoàng Hà Mobile là thương hiệu yêu thích của mình, luôn tin tưởng ghé qua mua hàng mỗi dịp iPhone ra sản phẩm mới.
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="img">
                            <img src="https://cdn.hoanghamobile.com/i/idol/Uploads/2021/12/24/anh-1.jpg" />
                        </div>

                        <div class="info">
                            <h3>Diễn viên Quang Trung</h3>
                            <h4>Diễn viên/Ca sĩ/ Nghệ sĩ được yêu mến</h4>
                            <div class="note">
                                Không chỉ giá hời mà các bạn nhân viên ở Hoàng Hà vừa nhiệt tình, vừa dễ thương quá trời nên Trung đã "hốt" khá nhiều sản phẩm ở đây.
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="img">
                            <img src="https://cdn.hoanghamobile.com/i/idol/Uploads/2022/03/01/liz-kim-cuong.jpg" />
                        </div>

                        <div class="info">
                            <h3>Liz Kim Cương</h3>
                            <h4>Ca sĩ </h4>
                            <div class="note">
                                Là một Samfan Liz không thể bỏ lỡ cơ hội sở hữu sản phẩm S22 Ultra mới. Mình tin tưởng lựa chọn Hoàng Hà Mobile một trong những đại lý uỷ quyền chính hãng của Samsung để đặt hàng và nhận sản phẩm trong thời gian sớm nhất.
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="img">
                            <img src="https://cdn.hoanghamobile.com/i/idol/Uploads/2021/12/24/anh-2-linh.jpg" />
                        </div>

                        <div class="info">
                            <h3>NSND Trung Anh</h3>
                            <h4>Diễn viên truyền hình</h4>
                            <div class="note">
                                Tôi biết Hoàng Hà qua 1 lần hợp tác quảng cáo, từ đó về sau là biết tới 1 thương hiệu giá cạnh tranh mà ngày càng phát triển, ngày càng nhiều chi nhánh.
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="img">
                            <img src="https://cdn.hoanghamobile.com/i/idol/Uploads/2021/11/26/canh-soai-ca.jpg" />
                        </div>

                        <div class="info">
                            <h3>Diễn viên Doãn Quốc Đam</h3>
                            <h4>Diễn viên truyền hình </h4>
                            <div class="note">
                                Mình biết tới Hoàng Hà nhờ 1 vài anh em trong nghề giới thiệu, từ đó là tốn kha khá "máu" đầu tư cho đồ công nghệ mới.
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="img">
                            <img src="https://cdn.hoanghamobile.com/i/idol/Uploads/2021/11/26/mc-mu-tat.jpg" />
                        </div>

                        <div class="info">
                            <h3>MC M&#249; Tạt </h3>
                            <h4>BTV/MC VTV, Diễn viên</h4>
                            <div class="note">
                                Lần đầu tới mua iPhone 13 Pro Max thấy các bạn nhân viên Hoàng Hà rất thân thiện, giá thì quá tốt rồi. Chắc chắn mình sẽ quay lại mua những lần sau.
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="img">
                            <img src="https://cdn.hoanghamobile.com/i/idol/Uploads/2021/11/26/manh-hung.jpg" />
                        </div>

                        <div class="info">
                            <h3>Diễn viên Mạnh Hưng </h3>
                            <h4>Diễn viên truyền hình </h4>
                            <div class="note">
                                Một địa chỉ đáng tin cậy cho nhu cầu mua các sản phẩm điện thoại, phụ kiện giá tốt của mình.
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="img">
                            <img src="https://cdn.hoanghamobile.com/i/idol/Uploads/2021/11/26/mc-huu-chi.jpg" />
                        </div>

                        <div class="info">
                            <h3>MC Hữu Tr&#237;</h3>
                            <h4>BTV/MC Trung t&#226;m tin tức VTV24</h4>
                            <div class="note">
                                Mình rất vui khi tìm được Hoàng Hà Mobile, chỗ vừa có hàng chính hãng, giá lại siêu hạt dẻ, bảo hành hậu mãi chăm sóc kỹ lưỡng, xứng đáng là một nơi cho các bạn cân nhắc.
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="img">
                            <img src="https://cdn.hoanghamobile.com/i/idol/Uploads/2021/11/26/vdv-anh-vie-n.jpg" />
                        </div>

                        <div class="info">
                            <h3>VĐV Nguyễn Thị &#193;nh Viên</h3>
                            <h4>Kình ngư đội tuyển Bơi lội Việt Nam</h4>
                            <div class="note">
                                Trước giờ mình hay tới Hoàng Hà quận 11 mua, đợt rồi Hoàng Hà mới mở thêm quận 9 gần chỗ mình tập nên dễ đến ủng hộ hơn rồi.
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="img">
                            <img src="https://cdn.hoanghamobile.com/i/idol/Uploads/2022/01/06/a-qua-n-the-voice-1.jpg" />
                        </div>

                        <div class="info">
                            <h3>Ca sĩ L&#226;m Bảo Ngọc</h3>
                            <h4>Ca sĩ, á Qu&#226;n The Voice 2019</h4>
                            <div class="note">
                                Tui nhắm chiếc Samsung Galaxy Z Fold 3 lâu rồi. Để tự thưởng cho bản thân sau một năm biến động đầy cố gắng, tui đã quyết định ghé qua Hoàng Hà Mobile trải nghiệm và mua sắm cho mình một em điện thoại mới.
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="img">
                            <img src="https://cdn.hoanghamobile.com/i/idol/Uploads/2022/03/01/vdv-nguyen-huy-hoang.jpg" />
                        </div>

                        <div class="info">
                            <h3>Nguyễn Huy Hoàng </h3>
                            <h4>Vận động viên bơi lội</h4>
                            <div class="note">
                                Với một vận động viên thể thao, Hoàng luôn ưu tiên việc chăm sóc sức khoẻ bản thân. Lịch thi đấu dày đặc, nay Hoàng mới có dịp quay trở lại cửa hàng công nghệ yêu thích - Hoàng Hà Mobile chi nhánh quận 1, Tp.HCM để rinh về chiếc đồng hồ Garmin Fenix 7 phục vụ cho quá trình tập luyện và thi đấu thể thao.
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="img">
                            <img src="https://cdn.hoanghamobile.com/i/idol/Uploads/2021/12/16/anh-cua-linh.jpg" />
                        </div>

                        <div class="info">
                            <h3>VĐV Ch&#226;u Tuyết V&#226;n</h3>
                            <h4>VĐV Đội tuyển Teakwondo Việt Nam</h4>
                            <div class="note">
                                Vân thấy giá bán ở Hoàng Hà Mobile tốt hơn các bên khác khá nhiều, các sản phẩm cũng phong phú và đa dạng. Vân thường qua shop để mua đồng hồ thông minh luyện tập thể thao hoặc tablet.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>






    <section>
        <div class="container">
            <div class="corevalue">
                <div class="item">
                    <span class="icon">
                        <i class="icon-chinhhang"></i>
                    </span>
                    <div class="text">
                        <span>Sản phẩm</span>
                        <strong>CH&#205;NH H&#195;NG</strong>
                    </div>
                </div>
                <div class="item">
                    <span class="icon">
                        <i class="icon-freeship"></i>
                    </span>
                    <div class="text">
                        <span>Miễn ph&#237; vận chuyển</span>
                        <strong>TO&#192;N QUỐC</strong>
                    </div>
                </div>
                <div class="item">
                    <span class="icon">
                        <i class="icon-hotline"></i>
                    </span>
                    <div class="text">
                        <span>Hotline hỗ trợ</span>
                        <strong>03.86.13.17.16</strong>
                    </div>
                </div>
                <div class="item">
                    <span class="icon">
                        <i class="icon-doitra"></i>
                    </span>
                    <div class="text">
                        <span>Thủ tục đổi trả</span>
                        <strong>DỄ D&#192;NG</strong>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section>
        <div class="container">
            <div class="subscript">
                <div class="icon-text">
                    <img src="assets/images/icon/sub-logo.png" />
                    <div class="text">
                        <h4>Đăng ký nhận tin</h4>
                        <p>Đăng ký để nhận những chương trình khuyến mại hot nhất của Hoàng Hà Mobile</p>
                    </div>
                </div>
                <div class="form">
                    <form onsubmit="return submitSubscription(this);">
                        <input name="__RequestVerificationToken" type="hidden" value="PHT8p9Hl9WWJX1cR_AjXjrs0SbIcQ-ReINfscSpn5KMj1wkpJ68b4GuQokgrOnEB9KFXeL_avFTb_-E75oDVfZ2p5Pc1" />
                        <div class="input">
                            <input type="email" id="email" name="email" placeholder="Nhập E-mail của bạn" />
                        </div>
                        <button type="submit"><i class="icon-fly"></i></button>
                    </form>
                </div>
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



    <script type="text/javascript">
        hh_home();
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            showSticker(82);
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