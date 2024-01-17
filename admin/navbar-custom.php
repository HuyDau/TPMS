<div class="navbar-custom">
    <ul class="list-unstyled topnav-menu float-right mb-0">
        <li class="d-none d-sm-block">
            <form class="app-search">
                <div class="app-search-box">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search...">
                        <div class="input-group-append">
                            <button class="btn" type="submit">
                                <i class="fe-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </li>
        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle waves-light waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <i class="fe-bell noti-icon"></i>
                <span class="badge badge-danger rounded-circle noti-icon-badge">5</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-lg">

                <div class="dropdown-item noti-title">
                    <h5 class="m-0 text-white">
                        <span class="float-right">
                            <a href="" class="text-white">
                                <small>Delete All</small>
                            </a>
                        </span>Notification
                    </h5>
                </div>

                <div class="slimscroll noti-scroll">

                    <a href="javascript:void(0);" class="dropdown-item notify-item active">
                        <div class="notify-icon">
                            <img src="assets\images\users\user-1.jpg" class="img-fluid rounded-circle" alt="">
                        </div>
                        <p class="notify-details">Cristina Pride</p>
                        <p class="text-muted mb-0 user-msg">
                            <small>Hi, How are you? What about our next meeting</small>
                        </p>
                    </a>

                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <div class="notify-icon bg-primary">
                            <i class="mdi mdi-comment-account-outline"></i>
                        </div>
                        <p class="notify-details">Caleb Flakelar commented on Admin
                            <small class="text-muted">1 min ago</small>
                        </p>
                    </a>

                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <div class="notify-icon">
                            <img src="assets\images\users\user-4.jpg" class="img-fluid rounded-circle" alt="">
                        </div>
                        <p class="notify-details">Karen Robinson</p>
                        <p class="text-muted mb-0 user-msg">
                            <small>Wow ! this admin looks good and awesome design</small>
                        </p>
                    </a>

                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <div class="notify-icon bg-warning">
                            <i class="mdi mdi-account-plus"></i>
                        </div>
                        <p class="notify-details">New user registered.
                            <small class="text-muted">5 hours ago</small>
                        </p>
                    </a>

                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <div class="notify-icon bg-info">
                            <i class="mdi mdi-comment-account-outline"></i>
                        </div>
                        <p class="notify-details">Caleb Flakelar commented on Admin
                            <small class="text-muted">4 days ago</small>
                        </p>
                    </a>

                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <div class="notify-icon bg-secondary">
                            <i class="mdi mdi-heart text-danger"></i>
                        </div>
                        <p class="notify-details">Carlos Crouch liked
                            <b>Admin</b>
                            <small class="text-dark">13 days ago</small>
                        </p>
                    </a>
                </div>


                <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                    View All
                    <i class="fi-arrow-right"></i>
                </a>

            </div>
        </li>
        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <img src="http://localhost/TPMS/admin/assets/images/users/user-1.jpg" alt="user-image" class="rounded-circle">
                <span class="pro-user-name ml-1">
                    <?php if (isset($_SESSION['admin_name'])) {
                        echo $_SESSION['admin_name'];
                    } ?> <i class="mdi mdi-chevron-down"></i>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                <div class="dropdown-item noti-title">
                    <h5 class="m-0 text-white">
                        Welcome !
                    </h5>
                </div>
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="fe-user"></i>
                    <span>Account</span>
                </a>
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="fe-settings"></i>
                    <span>Setting</span>
                </a>
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="fe-lock"></i>
                    <span>Screen Block</span>
                </a>
                <div class="dropdown-divider"></div>

                <a href="http://localhost/TPMS/admin/logout.php" class="dropdown-item notify-item">
                    <i class="fe-log-out"></i>
                    <span>Logout</span>
                </a>
            </div>
        </li>
    </ul>
    <div class="logo-box">
        <a href="http://localhost/TPMS/admin/index.php" class="logo text-center">
            <span class="logo-lg">
                <img src="http://localhost/TPMS/assets/images/logo/logo-dark.png" alt="" height="24">
            </span>
            <span class="logo-sm">
                <img src="http://localhost/TPMS/admin/assets/images/logo/favicon.png" alt="" height="28">
            </span>
        </a>
    </div>
    <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
        <li>
            <button class="button-menu-mobile waves-effect waves-light">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </li>

        <li class="dropdown d-none d-lg-block">
            <a class="nav-link dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                Report
                <i class="mdi mdi-chevron-down"></i>
            </a>
            <div class="dropdown-menu">

                <a href="javascript:void(0);" class="dropdown-item">
                    Support
                </a>
            </div>
        </li>
    </ul>
</div>