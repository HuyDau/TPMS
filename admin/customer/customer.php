<?php
session_start();
if (!isset($_SESSION['admin_user'])) {
    header("location: ../login.php");
}

require_once("../../config/config.php");

if (isset($_POST['sbm']) && !empty($_POST['search'])) {
    $search = $_POST['search'];
    $sqlCustomer = mysqli_query($conn, "SELECT * FROM tbl_customer WHERE userName  LIKE '%$search%' OR name LIKE '%$search%' OR email LIKE '%$search%'");
    
} else {
    $sqlCustomer = mysqli_query($conn, "SELECT * FROM tbl_customer ");
}
if (isset($_POST['all_prd'])) {
    unset($_POST['sbm']);
}

if(isset($_GET['idCustomer'])){

    $idCustomer = $_GET['idCustomer'];

    $sqlCustomer = mysqli_query($conn, "SELECT * FROM tbl_customer WHERE id = $idCustomer");
    $infoCustomer = mysqli_fetch_assoc($sqlCustomer);

    if (isset($_POST['editStaff'])) {
        $old = $_POST['old'];
        $new = $_POST['new'];
        $renew = $_POST['renew'];
        $username = $_GET['userName'];
        $idCustomer = $_GET['idCustomer'];
        $old1 = md5($old);
        $sqlCheck = mysqli_query($conn,"SELECT * FROM tbl_customer WHERE username = '$username' AND password = '$old1'");
        if(mysqli_num_rows($sqlCheck)){
           if($new == $renew){
                $newpassword = md5($new);
                $updatePass = mysqli_query($conn,"UPDATE tbl_customer SET password = '$newpassword' WHERE id  = '$idCustomer'");
                if($updatePass){
                    echo "<script>window.alert('Success!');window.location = 'customer.php'</script>";
                }else{
                    echo "<script>window.alert('Error!');window.location = 'customer.php'</script>";
                }
           }else{
            echo "<script>window.alert('New password does not match!');</script>";
           }
        }else{
            echo "<script>window.alert('The old password is incorrect!');</script>";
        }
        
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>TECHNOLOGY PRODUCTS MANAGER SYSTEM - CUSTOMER</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="Coderthemes" name="author">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   
    <link rel="shortcut icon" href="../../assets/images/logo/favicon.ico">
    <link href="..\assets\libs\datatables\dataTables.bootstrap4.css" rel="stylesheet" type="text/css">
    <link href="..\assets\libs\datatables\responsive.bootstrap4.css" rel="stylesheet" type="text/css">
    <link href="..\assets\libs\datatables\buttons.bootstrap4.css" rel="stylesheet" type="text/css">
    <link href="..\assets\libs\datatables\select.bootstrap4.css" rel="stylesheet" type="text/css">
    <link href="..\assets\css\bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="..\assets\css\icons.min.css" rel="stylesheet" type="text/css">
    <link href="..\assets\css\app.min.css" rel="stylesheet" type="text/css">
    <link href="..\assets\css\style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
     <link rel="stylesheet" href="../assets/scss/admin.css">
    <link rel="stylesheet" href="banner.css">
    <link rel="stylesheet" href="../assets/fontawesome/css/all.min.css">
    <script src="../assets/fontawesome/js/all.min.js"></script>
    <link rel="stylesheet" href="../assets/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <!-- CK Editor -->
    <script src="../assets/ckeditor/ckeditor.js"></script>
</head>

<body>
    
    <div class="form-edit form" id="form-edit"  class="modal fade" tabindex="-1">
        <form method="POST" class="" enctype="multipart/form-data">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Change Password</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" ><a href="customer.php">×</a></button>
                    </div>
                    <div class="modal-body p-3">
                        <div>
                            <div class="form-group">
                                <label class="control-label">Old Password: </label>
                                <input class="form-control form-white" placeholder="Enter Old Password..." type="text" name="old" value="" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">New Password: </label>
                                <input class="form-control form-white" placeholder="Enter New Password..." type="text" name="new" value="" >
                            </div>
                            <div class="form-group">
                                <label class="control-label">Renew Password: </label>
                                <input class="form-control form-white" placeholder="Enter Renew Password..." type="text" name="renew" value="" >
                            </div>
                            <div class="text-right pt-2">
                                <button name="editStaff" class="btn btn-primary ml-1">Save</button>
                                <button class="btn btn-light close-form"><a href="customer.php">Close</a></button>
                            </div>
                        </div>
                    </div> 
                </div> 
            </div> 
        </form>
    </div>
    
    <div id="wrapper" class="">
        <?php 
            include '../navbar-custom.php';
            include '../left-menu.php';
        ?>
        
        <div class="content-page">
            <div class="content">

                
                <div class="container-fluid title">
                   
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">TECHNOLOGY PRODUCTS MANAGER SYSTEM</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">TPMS</a></li>
                                        <li class="breadcrumb-item active">LIST CUSTOMER</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">LIST CUSTOMER</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <table id="basic-datatable" class="table dt-responsive nowrap">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>NAME</th>
                                                <th>EMAIL</th>
                                                <th>PHONE</th>
                                                <th>CITY</th>
                                                <th>DISTRICT</th>
                                                <th>WARD</th>
                                                <th>ADDRESS</th>
                                                <th>USERNAME</th>
                                                <th>PASSWORD</th>
                                                <th>CHANGE PASSWORD</th>
                                                <th></th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $i = 1;
                                            while ($row = mysqli_fetch_assoc($sqlCustomer)) {
                                            ?>
                                                <tr>
                                                    <td><?= $i++ ?> </td>
                                                    <td><?=$row['name']?></td>
                                                    <td><?=$row['email']?></td>
                                                    <td>0<?= $row['phone'] ?></td>
                                                    <td><?=$row['city']?></td>
                                                    <td><?=$row['district']?></td>
                                                    <td><?=$row['ward']?></td>
                                                    <td><?=$row['address']?></td>
                                                    <td><?= $row['username'] ?></td>
                                                    <td><?= $row['password'] ?></td>
                                                    <td><a href="customer.php?idCustomer=<?=$row['id'] ?>&userName=<?=$row['username'] ?>" name="edit" class="edit"><i class="icon-edit la la-edit"></i></a></td>
                                                    <td><a onclick="return Del1('<?php echo $row['name']; ?>')" class="delete" href="delete_customer.php?id=<?=$row['id']?>"><i class="icon-delete la la-trash-o"></i></a></td>
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

           
            <footer class="footer">
                <div class="row">
                    <div class="col-lg-2">
                        <a href="#" data-toggle="modal" data-target="#addBanner" class="btn btn-lg font-13  btn-success btn-block  ">
                            <i class="mdi mdi-plus-circle-outline"></i> Add
                        </a>
                    </div>
                </div>
            </footer>
            

        </div>

        


    </div>
    

    
    <div class="rightbar-overlay"></div>

    
    <script src="..\assets\js\vendor.min.js"></script>
    
    <script>
        function Del1(name) {
            return confirm("Do you want to delete: " + name + " ?");
        }
    </script>
    <script src="..\assets\libs\datatables\jquery.dataTables.min.js"></script>
    <script src="..\assets\libs\datatables\dataTables.bootstrap4.js"></script>
    <script src="..\assets\libs\datatables\dataTables.responsive.min.js"></script>
    <script src="..\assets\libs\datatables\responsive.bootstrap4.min.js"></script>
    <script src="..\assets\libs\datatables\dataTables.buttons.min.js"></script>
    <script src="..\assets\libs\datatables\buttons.bootstrap4.min.js"></script>
    <script src="..\assets\libs\datatables\buttons.html5.min.js"></script>
    <script src="..\assets\libs\datatables\buttons.flash.min.js"></script>
    <script src="..\assets\libs\datatables\buttons.print.min.js"></script>
    <script src="..\assets\libs\datatables\dataTables.keyTable.min.js"></script>
    <script src="..\assets\libs\datatables\dataTables.select.min.js"></script>
    <script src="..\assets\libs\pdfmake\pdfmake.min.js"></script>
    <script src="..\assets\libs\pdfmake\vfs_fonts.js"></script>
    

    
    <script src="..\assets\js\pages\datatables.init.js"></script>

    
    <script src="..\assets\js\app.min.js"></script>
    
    <?php
        if(isset($_GET['idCustomer'])){
            echo '<script> document.getElementById("form-edit").classList.add("show")</script>';

        }
    ?>
    <script src="categories.js"></script>
    
</body>

</html>