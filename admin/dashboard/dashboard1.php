<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">TPMS</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">DASHBOARD</a></li>
                                <li class="breadcrumb-item active">DASHBOARD</li>
                            </ol>
                        </div>
                        <h4 class="page-title">DASHBOARD</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3">
                    <div class="card-box" style="height: 470px;">
                        <i class="fa fa-info-circle text-muted float-right" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="More Info"></i>
                        <h4 class="mt-0 font-16">Revenue</h4>
                        <h2 class="text-primary my-4 text-center"><span style="font-size: 23px;"><?= number_format(getTotal($conn, 0), 0, "", ".") ?> đ</span></h2>
                        <div class="row mb-4">
                            <div class="col-12">
                                <p class="text-muted mb-1">This Month</p>
                                <h3 class="mt-0 font-20"><?= number_format(getTotal($conn, 1), 0, "", ".") ?> đ<?php if ((getTotal($conn, 1) / 10 - 100) < 0) {
                                                                                                                echo '<small class="badge badge-light-danger font-13">' . (getTotal($conn, 1) / 10  - 100) . "%" . '</small>';
                                                                                                            } else {
                                                                                                                echo '<small class="badge badge-light-success font-13">' . (getTotal($conn, 1) / 10  - 100) . "%" . '</small>';
                                                                                                            } ?></h3>
                            </div>

                            <div class="col-12">
                                <p class="text-muted mb-1">Last Month</p>
                                <h3 class="mt-0 font-20"><?= number_format(getTotal($conn, 2), 0, "", ".") ?> đ<?php if ((getTotal($conn, 2) / 10  - 100) < 0) {
                                                                                                                echo '<small class="badge badge-light-danger font-13">' . (getTotal($conn, 2) / 10  - 100) . "%" . '</small>';
                                                                                                            } else {
                                                                                                                echo '<small class="badge badge-light-success font-13">' . (getTotal($conn, 2) / 10  - 100) . "%" . '</small>';
                                                                                                            } ?></h3>
                            </div>
                        </div>
                        <div class="mt-5">
                            <span data-plugin="peity-line" data-fill="#56c2d6" data-stroke="#4297a6" data-width="100%" data-height="50">3,5,2,9,7,2,5,3,9,6,5,9,7</span>
                        </div>

                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card-box" dir="ltr">
                        <div class="float-right d-none d-md-inline-block">
                            <div class="btn-group mb-2">
                                <button type="button" class="btn btn-xs btn-light">Today</button>
                                <button type="button" class="btn btn-xs btn-light">Weekly</button>
                                <button type="button" class="btn btn-xs btn-light active">Monthly</button>
                            </div>
                        </div>
                        <h4 class="header-title mb-1">Revenue by month</h4>
                        <div id="rotate-labels-column" class="apex-charts"></div>
                    </div>
                </div>
                <div class="col-xl-3" style="display: flex;flex-direction: column;justify-content: space-between;">
                    <div class="card-box">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-sm bg-light rounded">
                                    <i class="fe-shopping-cart avatar-title font-22 text-success"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-right">
                                    <h3 class="text-dark my-1"><span><?= getCountOrderOnline($conn, 0) ?></span></h3>
                                    <p class="text-muted mb-1 text-truncate">Total Orders</p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <h6 class="text-uppercase">Target (100) <span class="float-right"><?= getCountOrderOnline($conn, 0) ?>%</span></h6>
                            <div class="progress progress-sm m-0">
                                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="<?= getCountOrderOnline($conn, 0) ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= getCountOrderOnline($conn, 0) ?>%">
                                    <span class="sr-only"><?= getCountOrderOnline($conn, 0) ?>% Complete</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-box">
                        <div class="row">
                            <div class="col-3">
                                <div class="avatar-sm bg-light rounded">
                                    <i class="fe-aperture avatar-title font-22 text-purple"></i>
                                </div>
                            </div>
                            <div class="col-9">
                                <div class="text-center">
                                    <h3 class="text-dark my-1"><span style="font-size: 20px;"><?= number_format(getTotal($conn, 1), 0, "", ".") ?> đ</span></h3>
                                    <p class="text-muted mb-1 text-truncate">Income status</p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <h6 class="text-uppercase">Target (1.000.000.000) <span class="float-right"><?= getTotal($conn, 1) / 1000000000 * 100 ?>%</span></h6>
                            <div class="progress progress-sm m-0">
                                <div class="progress-bar bg-purple" role="progressbar" aria-valuenow="<?= getTotal($conn, 1) / 1000000000 * 100 ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= getTotal($conn, 1) / 1000000000 * 100 ?>%">
                                    <span class="sr-only"><?= getTotal($conn, 1) / 1000000000 * 100 ?>% Complete</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body" dir="ltr">
                            <div class="card-widgets">
                                <a href="javascript: void(0);" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                                <a data-toggle="collapse" href="#cardCollpase1" role="button" aria-expanded="false" aria-controls="cardCollpase1"><i class="mdi mdi-minus"></i></a>
                                <a href="javascript: void(0);" data-toggle="remove"><i class="mdi mdi-close"></i></a>
                            </div>
                            <h4 class="header-title mb-0">Revenue</h4>

                            <div id="cardCollpase1" class="collapse pt-3 show">
                                <div class="bg-soft-light">
                                    <div class="row text-center">
                                        <div class="col-md-4">
                                            <p class="text-muted mb-0 mt-3">Today's Earning</p>
                                            <h2 class="font-weight-normal mb-3">
                                                <span style="font-size: 20px;"><?= number_format(getTotal($conn, 4), 0, "", ".") ?>đ</span>
                                            </h2>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="text-muted mb-0 mt-3">Current Week</p>
                                            <h2 class="font-weight-normal mb-3">
                                                <span style="font-size: 20px;"><?= number_format(getTWeek($conn, 1), 0, "", ".") ?>đ</span>
                                            </h2>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="text-muted mb-0 mt-3">Previous Week</p>
                                            <h2 class="font-weight-normal mb-3">
                                                <span style="font-size: 20px;"><?= number_format(getTWeek($conn, 2), 0, "", ".") ?>đ</span>
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                                <div id="apex-line-1" class="apex-charts" style="min-height: 480px !important;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-widgets">
                                <a href="javascript: void(0);" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                                <a data-toggle="collapse" href="#cardCollpase4" role="button" aria-expanded="false" aria-controls="cardCollpase4"><i class="mdi mdi-minus"></i></a>
                                <a href="javascript: void(0);" data-toggle="remove"><i class="mdi mdi-close"></i></a>
                            </div>
                            <h4 class="header-title mb-0">Revenue by Location</h4>

                            <div id="cardCollpase4" class="collapse pt-3 show">
                                <div class="row">
                                    <div class="col-md-12 align-self-center">
                                        <div id="usa-map" style="height: 350px" class="dash-usa-map"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>


    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    2023 &copy; Design by <a href="">Le Huy Dau</a>
                </div>
                <div class="col-md-6">
                    <div class="text-md-right footer-links d-none d-sm-block">
                        <a href="javascript:void(0);">About Us</a>
                        <a href="javascript:void(0);">Help</a>
                        <a href="javascript:void(0);">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>