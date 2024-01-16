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
                <?php
                    if (isset($_SESSION['permission']) && $_SESSION['permission'] ==  1) {
                        ?>
                            <div class="col-xl-3 col-md-6">
                                <div class="card-box">
                                    <div class="dropdown float-right">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-horizontal"></i>
                                        </a>
                                    </div>

                                    <h4 class="header-title mt-0 mb-2">Customers</h4>

                                    <div class="mt-1">
                                        <div class="float-left" dir="ltr">
                                            <input data-plugin="knob" data-width="64" data-height="64" data-fgcolor="#f05050 " data-bgcolor="#48525e" value="<?= $count_customer ?>" data-skin="tron" data-angleoffset="180" data-readonly="true" data-thickness=".15">
                                        </div>
                                        <div class="text-right">
                                            <h2 class="mt-3 pt-1 mb-1"> <?= $count_customer ?> </h2>
                                            <p class="text-muted mb-0">ALL</p>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        <?php
                    }
                ?>
                <div class="<?php if (isset($_SESSION['permission']) && $_SESSION['permission'] !=1){echo 'col-xl-4';}else{echo 'col-xl-3';} ?> col-md-6">
                    <div class="card-box">
                        <div class="dropdown float-right">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-dots-horizontal"></i>
                            </a>
                        </div>

                        <h4 class="header-title mt-0 mb-3">Products</h4>

                        <div class="mt-1">
                            <div class="float-left" dir="ltr">
                                <input data-plugin="knob" data-width="64" data-height="64" data-fgcolor="#675db7" data-bgcolor="#48525e" value="<?=getProdAgent($conn,$_SESSION['admin_id'])?>" data-skin="tron" data-angleoffset="180" data-readonly="true" data-thickness=".15">
                            </div>
                            <div class="text-right">
                                <h2 class="mt-3 pt-1 mb-1"><?=getProdAgent($conn,$_SESSION['admin_id'])?></h2>
                                <p class="text-muted mb-0">All products</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <div class="<?php if (isset($_SESSION['permission']) && $_SESSION['permission'] !=1){echo 'col-xl-4';}else{echo 'col-xl-3';} ?> col-md-6">
                    <div class="card-box">
                        <div class="dropdown float-right">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-dots-horizontal"></i>
                            </a>
                        </div>

                        <h4 class="header-title mt-0 mb-3">Online Orders</h4>

                        <div class="mt-1">
                            <div class="float-left" dir="ltr">
                                <input data-plugin="knob" data-width="64" data-height="64" data-fgcolor="#23b397" data-bgcolor="#48525e" value="<?=countListInvoice($conn,$_SESSION['admin_id'])?>" data-skin="tron" data-angleoffset="180" data-readonly="true" data-thickness=".15">
                            </div>
                            <div class="text-right">
                                <h2 class="mt-3 pt-1 mb-1">  <?=countListInvoice($conn,$_SESSION['admin_id']) ?></h2>
                                <p class="text-muted mb-0">All Orders</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <div class="<?php if (isset($_SESSION['permission']) && $_SESSION['permission'] !=1){echo 'col-xl-4';}else{echo 'col-xl-3';} ?> col-md-6">
                    <div class="card-box">
                        <div class="dropdown float-right">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-dots-horizontal"></i>
                            </a>

                        </div>

                        <h4 class="header-title mt-0 mb-3">Revenue</h4>

                        <div class="mt-1">
                            <div class="float-left" dir="ltr">
                                <input data-plugin="knob" data-width="64" data-height="64" data-fgcolor="#ffbd4a" data-bgcolor="#48525e" value="35" data-skin="tron" data-angleoffset="180" data-readonly="true" data-thickness=".15">
                            </div>
                            <div class="text-right">
                                <h2 class="mt-3 pt-1 mb-1"> <?=number_format(getTotalAgent($conn,$_SESSION['admin_id']),0,"",".")?>  đ</h2>
                                <p class="text-muted mb-0">Revenue</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="container">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4">
                    <div class="card-box">
                        
                        <h4 class="header-title">Earning Reports</h4>
                        <p class="text-muted"></p><?=date("M-Y")?> - Showing Data</p>
                        <h2 class="mb-4"><i class="mdi mdi-currency-usd text-primary"></i><?=number_format(getTotal($conn, 0,$_SESSION['admin_id']),0,"",".")?>đ</h2>

                        <div class="row mb-4">
                            <div class="col-6">
                                <p class="text-muted mb-1">This Month</p>
                                <h3 class="mt-0 font-20"><?=number_format(getTotal($conn, 1,$_SESSION['admin_id']),0,"",".")?>đ<?php if ((getTotal($conn, 1,$_SESSION['admin_id']) / 10  - 100) < 0) {
                                                                                            echo '<small class="badge badge-light-danger font-13">' . (getTotal($conn, 1,$_SESSION['admin_id']) / 10  - 100) . "%" . '</small>';
                                                                                        } else {
                                                                                            echo '<small class="badge badge-light-success font-13">' . (getTotal($conn, 1,$_SESSION['admin_id']) / 10  - 100) . "%" . '</small>';
                                                                                        } ?></h3>
                            </div>

                            <div class="col-6">
                                <p class="text-muted mb-1">Last Month</p>
                                <h3 class="mt-0 font-20"><?=number_format(getTotal($conn, 2,$_SESSION['admin_id']),0,"",".")?>đ<?php if ((getTotal($conn, 2,$_SESSION['admin_id']) / 10  - 100) < 0) {
                                                                                                echo '<small class="badge badge-light-danger font-13">' . (getTotal($conn, 2,$_SESSION['admin_id'])/ 10  - 100) . "%" . '</small>';
                                                                                            } else {
                                                                                                echo '<small class="badge badge-light-success font-13">' . (getTotal($conn, 2,$_SESSION['admin_id'])/ 10  - 100) . "%" . '</small>';
                                                                                            } ?></h3>
                            </div>
                        </div>
                        <div class="mt-5">
                            <span data-plugin="peity-bar" data-colors="#f7b84b,#ebeff2" data-width="100%" data-height="80">5,3,9,6,5,9,7,3,5,2,9,7,2,1,3,5,2,9,7,2,5,3,9,6,5,9,7</span>
                        </div>

                    </div>
                </div> 
                <div class="col-xl-8">
                    <div class="card-box">
                        <div class="dropdown float-right">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-dots-horizontal"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                
                                <a href="javascript:void(0);" class="dropdown-item">Settings</a>
                                
                                <a href="javascript:void(0);" class="dropdown-item">Download</a>
                                
                                <a href="javascript:void(0);" class="dropdown-item">Upload</a>
                                
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                            </div>
                        </div>
                        <h4 class="header-title mb-3">Transaction History</h4>

                        <div class="table-responsive">
                            <table class="table table-centered table-borderless table-hover table-nowrap mb-0" id="datatable">
                                <thead class="thead-light">
                                    <tr>
                                        <th>STT</th>
                                        <th class="border-top-0">Name</th>
                                        <th class="border-top-0">Address</th>
                                        <th class="border-top-0">Date</th>
                                        <th class="border-top-0">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    $agentId =  $_SESSION['admin_id'];
                                    $sqlInvoice = mysqli_query($conn,"SELECT * FROM tbl_cart WHERE agentId = $agentId LIMIT 10");
                                    while ($row = mysqli_fetch_array($sqlInvoice)) {
                                    ?>
                                        <tr>
                                            <td><?=$i++?></td>
                                            <td>
                                                <span class="ml-2"><?= $row['name'] ?></span>
                                            </td>
                                            <td>
                                                <span><?=$row['address']?> - <?=$row['ward']?> - <?=$row['district']?> - <?=$row['city']?></span>
                                            </td>
                                            <td><?= date('d-m-Y', strtotime($row['time'])) ?></td>
                                            <td><?=number_format($row['total'] ,0,"",".")?>đ</td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div> 
                    </div>
                </div> 
            </div>
        </div> 

    </div> 
</div>