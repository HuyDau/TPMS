<div class="left-side-menu">
    <div class="slimscroll-menu">

        <div id="sidebar-menu">
            <ul class="metismenu" id="side-menu">
                <!-- Home -->
                <li>
                    <a href="javascript: void(0);">
                        <i class="la la-dashboard"></i>
                        <span class="badge badge-info badge-pill float-right">2</span>
                        <span> HOME </span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="http://localhost/TPMS/admin/index.php">Statistical</a>
                        </li>
                        <?php
                            if (isset($_SESSION['permission']) && $_SESSION['permission'] ==  1) {
                                ?>
                                    <li>
                                        <a href="http://localhost/TPMS/admin/index1.php">Details Statistical</a>
                                    </li>
                                <?php
                            }
                        ?>
                        
                    </ul>
                </li>
                <!-- WEB -->
                <?php
                if (isset($_SESSION['permission']) && $_SESSION['permission'] ==  1) {
                ?>
                    <li>
                        <a href="javascript: void(0);">
                            <i class="la la-connectdevelop"></i>
                            <span> WEB </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li>
                                <a href="http://localhost/TPMS/admin/web/banner/banner.php">BANNER</a>
                            </li>
                        </ul>
                    </li>
                <?php
                }
                ?>
                <!-- AGENT -->
                <?php
                if (isset($_SESSION['permission']) && $_SESSION['permission'] ==  1) {
                ?>
                    <li>
                        <a href="javascript: void(0);">
                            <i class="la la-home"></i>
                            <span> AGENT </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li>
                                <a href="http://localhost/TPMS/admin/agent/list-agent/list-agent.php">LIST AGENT</a>
                            </li>
                            <li>
                                <a href="http://localhost/TPMS/admin/agent/list-staff/list-staff.php">LIST STAFF</a>
                            </li>
                        </ul>
                    </li>
                <?php
                }
                ?>
                <!-- PRODUCT -->
                <?php
                if (isset($_SESSION['permission']) && $_SESSION['permission'] ==  1 || $_SESSION['permission'] ==  2) {
                ?>
                    <li>
                    <a href="javascript: void(0);">
                        <i class="la la-cube"></i>
                        <span> PRODUCTS </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="http://localhost/TPMS/admin/categories/categories.php">CATEGORIES</a>
                        </li>
                        <li>
                            <a href="http://localhost/TPMS/admin/brands/brands.php">BRANDS</a>
                        </li>
                        <li>
                            <a href="http://localhost/TPMS/admin/products/products.php">PRODUCTS</a>
                        </li>
                        <li>
                            <a href="http://localhost/TPMS/admin/version/version.php">VERSIONS</a>
                        </li>
                    </ul>
                </li>
                <?php
                }
                ?>
                <!-- CUSTOMER -->
                <?php
                if (isset($_SESSION['permission']) && $_SESSION['permission'] ==  1) {
                ?>
                    <li>
                        <a href="javascript: void(0);">
                            <i class="la la-user"></i>
                            <span> Customer </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li>
                                <a href="http://localhost/TPMS/admin/customer/customer.php">Customer</a>
                            </li>
                        </ul>
                    </li>
                <?php
                }
                ?>
                <!-- USER -->
                <?php
                if (isset($_SESSION['permission']) && $_SESSION['permission'] ==  1) {
                ?>
                    <li>
                        <a href="javascript: void(0);">
                            <i class="la la-user"></i>
                            <span> User </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li>
                                <a href="http://localhost/TPMS/admin/user/user.php">User</a>
                            </li>
                        </ul>
                    </li>
                <?php
                }
                ?>
                <!-- COMMENT -->
                <?php
                if (isset($_SESSION['permission']) && $_SESSION['permission'] ==  1 || $_SESSION['permission'] ==  3) {
                ?>
                    <li>
                        <a href="javascript: void(0);">
                            <i class="la la-envelope"></i>
                            <span> Comment </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li>
                                <a href="http://localhost/TPMS/admin/comment/list-comment.php">List Comment</a>
                            </li>
                        </ul>
                    </li>
                <?php
                }
                ?>
                <!-- ORDER -->
                <?php
                if (isset($_SESSION['permission']) && $_SESSION['permission'] ==  1 || $_SESSION['permission'] ==  2) {
                ?>
                    <li>
                    <a href="javascript: void(0);">
                        <i class=" fab fa-opencart"></i>
                        <span> Order </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <?php
                            if(isset($_SESSION['permission']) && $_SESSION['permission'] ==  2){?><li><a href="http://localhost/TPMS/admin/order/create-new-order.php">Create New Order</a></li><?php }
                        ?>
                        <li>
                            <a href="http://localhost/TPMS/admin/order/list-order.php">List Order</a>
                        </li>
                    </ul>
                </li>
                <?php
                }
                ?>
                
                <?php
                if (isset($_SESSION['permission']) && $_SESSION['permission'] ==  1) {
                ?>
                    <li>
                        <a href="javascript: void(0);">
                            <i class=" fab fa-opencart"></i>
                            <span>Online Order </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li>
                                <a href="http://localhost/TPMS/admin/orderonline/orderonline.php">List Online Order</a>
                            </li>

                        </ul>
                    </li>
                <?php
                }
                ?>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div>