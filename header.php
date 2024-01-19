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
                                <i class="icon-account"></i> <a class="account" href="bang-dieu-khien.php?page=index"><strong><?=$infoUser['name']?></strong></a>
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
                <form method="POST" action="san-pham.php" onsubmit="return submitSearch(this);" enctype="application/x-www-form-urlencoded">
                    <div class="border">
                        <input type="text" id="kwd" name="dataSearch" placeholder="Hôm nay bạn cần tìm gì?" />
                        <button type="submit" name="searchData" class="search"><i class="icon-search"></i></button>
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
                <li id="">
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