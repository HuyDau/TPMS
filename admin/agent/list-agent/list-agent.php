<?php
session_start();
if (!isset($_SESSION['admin_user'])) {
    header("location: ../../login.php");
}

require_once("../../../config/config.php");

if (isset($_POST['sbm']) && !empty($_POST['search'])) {
    $search = $_POST['search'];
    $sqlAgents = mysqli_query($conn, "SELECT * FROM tbl_agents WHERE agentName LIKE'%$search%' "); 
} else {
    $sqlAgents = mysqli_query($conn, "SELECT * FROM tbl_agents");
}
if (isset($_POST['all_prd'])) {
    unset($_POST['sbm']);
}


if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $gmail = $_POST['gmail'];
    $password =  $_POST['password'];
    $city = $_POST['city'];
    $newPassword = md5($password);

    $queryAgent = mysqli_query($conn, "INSERT INTO `tbl_agents` (`id`, `cityId`, `agentName`, `agentAddress`, `agentPhone`, `agentGmail`) VALUES (NULL,' $city', '$name', '$address', '$phone', '$gmail')");
    $queryAccount = mysqli_query($conn, "INSERT INTO `tbl_users`(`Id`, `username`, `password`, `fullname`, `gmail`, `phone`, `permission`) VALUES (NULL,'$gmail','$newPassword','$name','$gmail','$phone','2')");
    if ($queryAgent && $queryAccount) {
        echo "<script>window.alert('Successful!');window.location.href = 'list-agent.php'</script>";
    }
}

if(isset($_GET['id'])){

    $id = $_GET['id'];

    $sqlEditAgent = mysqli_query($conn, "SELECT * FROM tbl_agents WHERE id = $id");
    $infoAgent = mysqli_fetch_assoc($sqlEditAgent);
    $userName = $infoAgent['agentGmail'];
    $sqlUser = mysqli_query($conn,"SELECT * FROM tbl_users WHERE username =  '$userName'");
    $infoUser = mysqli_fetch_assoc( $sqlUser); 
    $idUser = $infoUser['Id'];
    if (isset($_POST['edit'])) {
        $name1 = $_POST['name1'];
        $address1 = $_POST['address1'];
        $phone1 = $_POST['phone1'];
        $gmail1 = $_POST['gmail1'];
        $password1 = $_POST['password1'];
        $newPassword1 = md5($password1);
        $city1 = $_POST['city1'];
        $edit = mysqli_query($conn, "UPDATE `tbl_agents` SET `cityId`='$city1',`agentName`='$name1',`agentAddress`='$address1',`agentPhone`='$phone1',`agentGmail`='$gmail1' WHERE id = $id");
        $editAccount = mysqli_query($conn, "UPDATE `tbl_users` SET`username`='$gmail1',`password`='$newPassword1',`fullname`='$name1',`gmail`='$gmail1',`phone`='$phone1' WHERE Id = $idUser");
        if($edit){
            header("Location: list-agent.php");
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>TECHNOLOGY PRODUCTS MANAGER SYSTEM - AGENT</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="Coderthemes" name="author">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   
    <link rel="shortcut icon" href="../../../assets/images/logo/favicon.ico">
    <link href="..\..\assets\libs\datatables\dataTables.bootstrap4.css" rel="stylesheet" type="text/css">
    <link href="..\..\assets\libs\datatables\responsive.bootstrap4.css" rel="stylesheet" type="text/css">
    <link href="..\..\assets\libs\datatables\buttons.bootstrap4.css" rel="stylesheet" type="text/css">
    <link href="..\..\assets\libs\datatables\select.bootstrap4.css" rel="stylesheet" type="text/css">
    <link href="..\..\assets\css\bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="..\..\assets\css\icons.min.css" rel="stylesheet" type="text/css">
    <link href="..\..\assets\css\app.min.css" rel="stylesheet" type="text/css">
    <link href="..\..\assets\css\style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
     <link rel="stylesheet" href="../../assets/scss/admin.css">
    <link rel="stylesheet" href="banner.css">
    <link rel="stylesheet" href="../../assets/fontawesome/css/all.min.css">
    <script src="../../assets/fontawesome/js/all.min.js"></script>
    <link rel="stylesheet" href="../../assets/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <!-- CK Editor -->
    <script src="../../assets/ckeditor/ckeditor.js"></script>
</head>

<body>
    
    <div class="form-edit form" id="form-edit"  class="modal fade" tabindex="-1">
        <form method="POST" class="" enctype="multipart/form-data">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">EDIT AGENT</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" ><a href="list-agent.php">×</a></button>
                    </div>
                    <div class="modal-body p-3">
                        <div>
                                <div class="form-group">
                                    <label class="control-label">AGENT NAME: </label>
                                    <input class="form-control form-white" placeholder="Enter Agent Name ..." type="text" name="name1" value="<?=$infoAgent['agentName']?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">City: </label>
                                    <select name="city1" id="" class="selected form-control form-white">
                                        <?php
                                        $sqlCity= mysqli_query($conn, "SELECT * FROM `tbl_city`");
                                        while ($itemCity = mysqli_fetch_assoc($sqlCity)) { ?>
                                            <option value="<?php echo $itemCity['id']; ?>" <?php if (isset($itemCity['id'])) {if ($itemCity['id'] == $infoAgent['cityId']) {echo "SELECTED";} } ?>><?php echo $itemCity['cityName']; ?></option>
                                        <?php }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">AGENT ADDRESS: </label>
                                    <input class="form-control form-white" placeholder="Enter Agent Address ..." type="text" name="address1" value="<?=$infoAgent['agentAddress']?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">AGENT PHONE: </label>
                                    <input class="form-control form-white" placeholder="Enter Agent Phone ..." type="text" name="phone1" value="0<?=$infoAgent['agentPhone']?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">AGENT GMAIL: </label>
                                    <input class="form-control form-white" placeholder="Enter Agent Gmail ..." type="gmail" name="gmail1" value="<?=$infoAgent['agentGmail']?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">PASSWORD: </label>
                                    <input class="form-control form-white" placeholder="Enter Agent Gmail ..." type="password" name="password1" value="<?=$infoUser['password']?>" required>
                                </div>
                            <div class="text-right pt-2">
                                <button name="edit" class="btn btn-primary ml-1">Save</button>
                                <button class="btn btn-light close-form"><a href="list-agent.php">Close</a></button>
                            </div>
                        </div>
                    </div> 
                </div> 
            </div> 
        </form>
    </div>
    
    <div id="wrapper" class="">
        
        <?php 
            include '../../navbar-custom.php' ;
            include '../../left-menu.php' ;
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
                                        <li class="breadcrumb-item active">LIST AGENT</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">LIST AGENT</h4>
                            </div>
                        </div>
                    </div>
                    <form method="POST" class="modal fade" id="addAgent" tabindex="-1" enctype="multipart/form-data">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">ADD AGENT</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body p-3">
                                    <div>
                                        <div class="form-group">
                                            <label class="control-label">AGENT NAME: </label>
                                            <input class="form-control form-white" placeholder="Enter Agent Name ..." type="text" name="name" value="" required>
                                        </div>
                                        <div class="form-group">
                                            <label>City: </label>
                                            <select class="form-control" name="city">
                                                <?php
                                                $sqlCity = mysqli_query($conn, "SELECT * FROM tbl_city");
                                                while ($rowCity = mysqli_fetch_assoc($sqlCity)) { ?>
                                                    <option value="<?php echo $rowCity['id']; ?>"><?php echo $rowCity['cityName']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">AGENT ADDRESS: </label>
                                            <input class="form-control form-white" placeholder="Enter Agent Address ..." type="text" name="address" value="" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">AGENT PHONE: </label>
                                            <input class="form-control form-white" placeholder="Enter Agent Phone ..." type="text" name="phone" value="" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">AGENT GMAIL: </label>
                                            <input class="form-control form-white" placeholder="Enter Agent Gmail ..." type="gmail" name="gmail" value="" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">PASSWORD: </label>
                                            <input class="form-control form-white" placeholder="Enter Agent Password ..." type="password" name="password" value="" required>
                                        </div>
                                        <div class="text-right pt-2">
                                            <button name="add" class="btn btn-primary ml-1">Save</button>
                                            <button type="button" class="btn btn-light " data-dismiss="modal" name="close">Close</button>
                                        </div>
                                    </div>
                                </div> 
                            </div> 
                        </div> 
                    </form>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <table id="basic-datatable" class="table dt-responsive nowrap">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>CITY</th>
                                                <th>AGENT NAME</th>
                                                <th>AGENT ADDRESS</th>
                                                <th>AGENT PHONE</th>
                                                <th>AGENT GMAIL</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $i = 1;
                                            while ($row = mysqli_fetch_assoc($sqlAgents)) {
                                            ?>
                                                <tr>
                                                    <td>
                                                        <?= $i++ ?>
                                                    </td>
                                                    <td><?php $cityId = $row['cityId'];$sqlCity = mysqli_query($conn,"SELECT * FROM tbl_city WHERE id = $cityId");$infoCity = mysqli_fetch_assoc($sqlCity);echo $infoCity['cityName'] ?></td>
                                                    <td><?= $row['agentName'] ?></td>
                                                    <td><?= $row['agentAddress'] ?></td>
                                                    <td>0<?= $row['agentPhone'] ?></td>
                                                    <td><?= $row['agentGmail'] ?></td>
                                                    <td><a href="list-agent.php?id=<?php echo $row['id']; ?>" name="edit" class="edit"><i class="icon-edit la la-edit"></i></a></td>
                                                    <td><a onclick="return Del1('<?php echo $row['agentName']; ?>')" class="delete" href="delete_agent.php?id=<?php echo $row['id']; ?>"><i class="icon-delete la la-trash-o"></i></a></td>
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
                        <a href="#" data-toggle="modal" data-target="#addAgent" class="btn btn-lg font-13  btn-success btn-block  ">
                            <i class="mdi mdi-plus-circle-outline"></i> Add
                        </a>
                    </div>
                    
                </div>
            </footer>
            

        </div>

        


    </div>
    

    
    <div class="rightbar-overlay"></div>

    
    <script src="..\..\assets\js\vendor.min.js"></script>
    
    <script>
        function Del1(name) {
            return confirm("Do you want to delete: " + name + " ?");
        }
    </script>
    <script src="..\..\assets\libs\datatables\jquery.dataTables.min.js"></script>
    <script src="..\..\assets\libs\datatables\dataTables.bootstrap4.js"></script>
    <script src="..\..\assets\libs\datatables\dataTables.responsive.min.js"></script>
    <script src="..\..\assets\libs\datatables\responsive.bootstrap4.min.js"></script>
    <script src="..\..\assets\libs\datatables\dataTables.buttons.min.js"></script>
    <script src="..\..\assets\libs\datatables\buttons.bootstrap4.min.js"></script>
    <script src="..\..\assets\libs\datatables\buttons.html5.min.js"></script>
    <script src="..\..\assets\libs\datatables\buttons.flash.min.js"></script>
    <script src="..\..\assets\libs\datatables\buttons.print.min.js"></script>
    <script src="..\..\assets\libs\datatables\dataTables.keyTable.min.js"></script>
    <script src="..\..\assets\libs\datatables\dataTables.select.min.js"></script>
    <script src="..\..\assets\libs\pdfmake\pdfmake.min.js"></script>
    <script src="..\..\assets\libs\pdfmake\vfs_fonts.js"></script>
    

    
    <script src="..\..\assets\js\pages\datatables.init.js"></script>

    
    <script src="..\..\assets\js\app.min.js"></script>
    
    <?php
        if(isset($_GET['id'])){
            echo '<script> document.getElementById("form-edit").classList.add("show")</script>';

            $id = $_GET['id'];

            $sqlEditCategory = mysqli_query($conn, "SELECT * FROM tbl_categories WHERE Id = $id");
            $infoCategory = mysqli_fetch_assoc($sqlEditCategory);
        }
    ?>
    <script src="categories.js"></script>
    
</body>

</html>