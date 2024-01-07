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
    
    
    <title>Giới Thiệu Về Công Ty</title>
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

    <!-- Slick Slide -->
    <link rel="stylesheet" type="text/css" href="assets/slick/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="assets/slick/slick/slick-theme.css" />
    <!-- Bootstrap -->
    <!-- <link href="assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="assets/bootstrap/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="assets/bootstrap/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script> -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/fontawesome/css/all.min.css">

    <meta name="twitter:title" content="Giới Thiệu Về Hệ Thống Showroom TPMS" />
    <meta property="og:title" content="Giới Thiệu Về Hệ Thống Showroom TPMS" />
    <meta property="og:image" content="assets/images/logo/logo.png" />
    <script async src="assets/js/ins.js"></script>
</head>

<body>

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
                    <a itemprop="item" href="gioi-thieu-cong-ty.php" title="Giới Thiệu Về Hệ Thống Showroom TPMS" class="actived"><span itemprop="name" content="Giới thiệu c&#244;ng ty">Giới Thiệu Công Ty</span></a>
                    <meta itemprop="position" content="2" />
                </li>
            </ol>
        </div>
    </section>

    <section>
        <div class="container page-text">
            <div class="container">
                <p dir="ltr" class="gt-p2"><span class="gt-span3">Giới Thiệu Hệ Thống Show Room</span></p>
                <p dir="ltr" class="gt-p"><span class="gt-span">Giới thiệu chung</span></p>
                <p dir="ltr" class="gt-p">
                    <span class="gt-span1">Công ty Cổ phần Xây dựng và Đầu tư thương mại Huy Dậu sở hữu chuỗi cửa hàng TPMS - là nhà bán lẻ hàng đầu, chuyên cung cấp các sản phẩm công nghệ chính hãng tại thị trường Việt Nam. Năm 2019, TPMS được thành lập, từng bước trở thành địa chỉ đáng tin cậy của người tiêu dùng Việt. Với khẩu hiệu “</span>
                    <span class="gt-span1" class="gt-span4">Nếu những gì chúng tôi không có, nghĩa là bạn không cần</span>
                    <span class="gt-span1">”, chúng tôi đã, đang và sẽ tiếp tục nỗ lực đem đến các sản phẩm công nghệ chính hãng đa dạng, phong phú đi kèm mức giá tốt nhất phục vụ nhu cầu của quý khách hàng.</span>
                </p>
                <p dir="ltr" class="gt-p">
                    <span class="gt-span1">Sau hơn 4 năm phát triển, TPMS đã trở thành cái tên không còn xa lạ với người tiêu dùng trong nước. Hiện nay chúng tôi đang sở hữu mạng lưới hơn 3 chi nhánh phủ trên khắp cả nước, trong đó bao gồm hai trung tâm bảo hành tại Hà Nội và một trung tâm bảo hành tại thành phố Hồ Chí Minh. Đến với chuỗi cửa hàng của TPMS, quý khách có thể hoàn toàn yên tâm về uy tín, chất lượng sản phẩm với mức giá rẻ hơn khoảng 15-20% so với giá bán trên thị trường. Song song với đó, chúng tôi cũng luôn nỗ lực phục vụ đem đến trải nghiệm dịch vụ tốt nhất cho khách hàng.
                    </span>
                </p>
                <p dir="ltr" class="gt-p">
                    <span class="gt-span">Những dấu mốc quan trọng
                    </span>
                </p>
                <ul style="margin-top:0;margin-bottom:0;">
                    <li dir="ltr" class="gt-li"><p dir="ltr" class="gt-p1" role="presentation"><span class="gt-span2">Năm 2019</span><span class="gt-span1">: Thành lập cửa hàng TPMS đầu tiên tọa lạc trên con phố sầm uất của Thủ đô Hà Nội.</span></p></li>
                    <li dir="ltr" class="gt-li1"><p dir="ltr" class="gt-p1" role="presentation"><span class="gt-span2">Năm 2020</span><span class="gt-span1">: TPMS chính thức trở thành nhà phân phối ĐTDĐ chính hãng hợp tác với nhiều nhãn hàng lớn hàng đầu như Samsung, OPPO, Nokia, Huawei,...</span></p></li>
                    <li dir="ltr" class="gt-li"><p dir="ltr" class="gt-p1" role="presentation"><span class="gt-span2">Năm 2021</span><span class="gt-span1">: Với kinh nghiệm hơn 4 năm trong lĩnh vực bán lẻ, TPMS phát triển mạnh mẽ và liên tục mở thêm nhiều chi nhánh mới.</span></p></li>
                    <li dir="ltr" class="gt-li"><p dir="ltr" class="gt-p1" role="presentation"><span class="gt-span2">Năm 2022</span><span class="gt-span1">: Kỉ niệm 3 năm hoạt động trong lĩnh vực bán lẻ các sản phẩm công nghệ, TPMS đã khẳng định được chỗ đứng vững chắc trên thị trường cũng như trong tiềm thức người tiêu dùng.</span></p></li>
                    <li dir="ltr" class="gt-li1"><p dir="ltr" class="gt-p1" role="presentation"><span class="gt-span2">Năm 2022</span><span class="gt-span1">: TPMS chính thức hợp tác với ông lớn ngành viễn thông MobiFone Việt Nam mở chuỗi chi nhánh bán hàng liên kết, nâng tổng số chi nhánh tới hơn 60, đồng thời phủ khắp 30 tỉnh thành trên cả nước. Kể từ đó, TPMS liên tục đồng hành cùng MobiFone tổ chức các sự kiện lớn nhỏ.</span></p></li>
                    <li dir="ltr" class="gt-li1"><p dir="ltr" class="gt-p" role="presentation"><span class="gt-span2">Năm 2023</span><span class="gt-span1">: TPMS tự hào trở thành nhà bán lẻ ủy quyền chính thức của Apple tại Việt Nam. Các sản phẩm Apple chính hãng VN/A do Apple Việt Nam phân phối được bán tại hệ thống TPMS với mức giá tốt nhất thị trường cùng chế độ bảo hành uy tín.</span></p></li>
                </ul>
                <p dir="ltr" class="gt-p">
                    <span class="gt-span">Tôn chỉ hoạt động</span></p><p dir="ltr" class="gt-p">
                    <span class="gt-span1">TPMS luôn hoạt động dựa trên tôn chỉ đặt khách hàng là trung tâm, mọi nỗ lực để đạt được mục tiêu cao nhất là làm hài lòng người dùng thông qua các sản phẩm được cung cấp và dịch vụ khách hàng. TPMS đang từng bước xây dựng dịch vụ khách hàng vượt trội, xứng đáng là đơn vị bán lẻ hàng đầu tại Việt Nam. Sự tin tưởng và ủng hộ nhiệt tình của quý khách hàng tại chuỗi chi nhánh đã phần nào khẳng định hiệu quả hoạt động của đội ngũ nhân viên TPMS.</span></p><p dir="ltr" class="gt-p">
                    <span class="gt-span1">Đối với quý khách hàng, chúng tôi luôn đặt cái tâm làm gốc, làm việc với tinh thần nghiêm túc, trung thực và có trách nhiệm, để mang tới trải nghiệm dịch vụ tốt nhất.</span></p><p dir="ltr" class="gt-p">
                    <span class="gt-span1">Đối với đồng nghiệp, chúng tôi đề cao văn hóa học hỏi, đoàn kết, tương trợ lẫn nhau tạo nên môi trường làm việc tôn trọng - công bằng - văn minh cho nhân viên trong công ty.</span>
                </p>
                <p dir="ltr" class="gt-p">
                    <span class="gt-span1">Đối với các đối tác, TPMS luôn làm việc dựa trên nguyên tắc tôn trọng, cùng tạo ra giá trị cho cộng đồng và cùng phát triển bền vững.</span>
                </p>
                <p dir="ltr" class="gt-p">
                    <span class="gt-span">Tầm nhìn và sứ mệnh</span>
                </p>
                <p dir="ltr" class="gt-p">
                    <span class="gt-span1">Những năm qua, chúng tôi không ngừng cải thiện dịch vụ tại các chi nhánh và hỗ trợ khách hàng qua các kênh online. TPMS cam kết mang đến những sản phẩm chất lượng và chế độ bảo hành uy tín, sẵn sàng hỗ trợ khách hàng trong thời gian nhanh nhất.</span>
                </p>
                <p dir="ltr" class="gt-p">
                    <span class="gt-span1">Trong tương lai, TPMS sẽ tiếp tục mở rộng hệ thống chi nhánh, hướng tới mục tiêu có mặt tại 63 tỉnh thành trên toàn quốc. Đồng thời, nâng cao chất lượng dịch vụ, hạn chế những rủi ro, lắng nghe và tiếp thu góp ý của quý khách hàng nhằm đem đến trải nghiệm tốt nhất khi mua sắm tại TPMS.</span>
                </p>
                <p dir="ltr" class="gt-p">
                    <span style="background-color: transparent; color: rgb(0, 0, 0); font-family: Arial; font-size: 10pt; white-space: pre-wrap;">Cuối cùng, TPMS hy vọng sẽ trở thành nhà tiên phong đưa những sản phẩm công nghệ mới nhất đến tay người dùng sớm nhất, tạo ra cuộc sống hiện đại nơi công nghệ kết nối con người, công nghệ phục vụ con người</span><br>
                </p>
            </div>
                    
        </div>
    </section>
    <footer>
        <div class="container">
            <div class="bg">
                <div class="col-content">
                        <div class="link-content">
                        <h4><a>Hỗ Trợ - Dịch Vụ</a></h4>
                        <ul>
                            <li><a href="mua-tra-gop.php">Chính Sách Và Hướng Dẫn Mua Hàng Trả Góp</a></li>
                            <li><a href="huong-dan-dat-hang.php">Hướng Dẫn Mua Hàng Và Chính Sách Vận Chuyển</a></li>
                            <li><a href="/order/check">Tra Cứu Đơn Hàng</a></li>
                            <li><a href="chinh-sach-bao-hanh.php">Chính Sách Đổi Mới Và Bảo Hành</a></li>
                            <li><a href="/dat-hang/bao-hanh-mo-rong">Dịch Vụ Bảo Hành Mở Rộng</a></li>
                            <li><a href="chinh-sach-bao-mat.php">Chính Sách Bảo Mật</a></li>
                            <li><a href="chinh-sach-giai-quyet-khieu-nai.php">Chính Sách Giải Quyết Khiếu Nại</a></li>
                            <li><a href="dieu-khoan-mua-ban-hang-hoa.php">Quy Chế Hoạt Động</a></li>
                        </ul>
                    </div>
                        <div class="link-content">
                        <h4><a>Th&#244;ng Tin Li&#234;n Hệ</a></h4>
                        <ul>
                            <li><a href="mua-hang-online.php">Thông Tin Các Trang TMDT</a></li>
                            <li><a href="/tin-tuc/hoang-ha-care-dich-vu-sua-chua-dien-thoai-may-tinh-bang-voi-gia-tot-nhat-thi-truong">Dịch Vụ Sửa Chữa TPMS Care</a></li>
                            <li><a href="hop-tac-kinh-doanh.php">Khách Hàng Doanh Nghiệp B2B</a></li>
                            <li><a href="/trung-tam-bao-hanh">Tra Cứu Bảo Hành</a></li>
                        </ul>
                    </div>
                        <div class="link-content">
                        <h4><a href="/he-thong-cua-hang">Hệ Thống Showroom Toàn Quốc</a></h4>
                        <ul>
                            <li><a href="/he-thong-cua-hang">Danh Sách Showroom</a></li>
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
            showSticker(82);
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