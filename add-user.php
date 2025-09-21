
<?php 
require_once('.\tools\function.php'); 
require_once('.\tools\connect.php');
require_once('.\tools\user-details.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<?php require_once('.\tools\title.html'); ?>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body id="page-top">
    <div id="wrapper">
        <?php require_once ('.\tools\sidebar.html'); ?>
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                        <?php require_once('.\tools\topbar-admin.php'); ?>
                            <div class="container-fluid">
                                <!-- Page Heading -->
                                <h1 class="h4 mb-4 text-gray-800">Add user</h1>
                                </div>
                            <div class="container-fluid">
                            <form enctype="multipart/form-data" method="post">
                        <!-- 1-->
                    <div class="col-lg-6">
                <!-- panel -->
            <div class="card shadow mb-5">
        <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">User Details</h6>
</div>
<?php foreach($userinfo as $view){?>
<div class="card-body">
<!-- form details -->
<div class="row">
    <div class="col-sm-6"><label>Email address </label>
        <input type="text" name="user_login" id="user_login" class="form-control form-control-sm" required>
    </div>
</div><p>
<div class="row">
    <div class="col-sm-6"><label>Firstname </label>
        <input type="text" name="firstname" id="firstname" class="form-control form-control-sm" required>
    </div>
</div><p>
<div class="row">
    <div class="col-sm-6"><label>Lastname </label>
        <input type="text" name="lastname" id="lastname" class="form-control form-control-sm" required>
    </div>
</div><p>
<div class="row">
    <div class="col-sm-6"><label>Middlename </label>
        <input type="text" name="middlename" id="middelname" class="form-control form-control-sm" required>
    </div>
</div><p>
<div class="row">
    <div class="col-sm-6"><label>Subsidiary </label>
        <select name="subsidiary" id="subsidiary" class="custom-select mb-2" required>
            <option selected>
            </option>
                <?php $sql= "SELECT * FROM subsidiary";
                $result=mysqli_query($conn, $sql) or die(mysql_error());
                while($row=mysqli_fetch_assoc($result))
                { echo "<option value='" . $row['subdsidiary_id'] . "'>" . $row['subsidiary_name'] . "</option>";}
                ?>
            </select>
    </div>
</div><p>
<div class="row">
    <div class="col-sm-6"><label>Department </label>
        <select name="department" id="department" class="custom-select mb-2" required>
            <option selected>
            </option>
                <?php $sql= "SELECT * FROM department";
                $result=mysqli_query($conn, $sql) or die(mysql_error());
                while($row=mysqli_fetch_assoc($result))
                { echo "<option value='" . $row['dept_id'] . "'>" . $row['department_name'] . "</option>";}
                ?>
            </select>
    </div>
</div><p>
<div class="row">
    <div class="col-sm-6"><label>Contact No. </label>
        <input type="text" name="contactno" id="contactno" class="form-control form-control-sm" required>
    </div>
</div>
<?php } ?>
<br><button type="submit" id="add_user" name="add_user" class="btn btn-primary">Submit</button>
<!-- ./form details -->
</form>
<br><p>
</div>
    </div>
        </div>
                </div>
            
                        </div>
                        <br>
                    <!-- End of Main Content -->
                <?php require_once('.\tools\footer.html'); ?>
            </div>
        </div>
    <a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i></a>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>
</html>