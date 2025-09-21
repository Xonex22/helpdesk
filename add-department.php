
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
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
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
                                <h1 class="h4 mb-4 text-gray-800">Add Department</h1>
                                </div>
                            <div class="container-fluid">
                            <form enctype="multipart/form-data" method="post">
                        <!-- 1-->
                    <div class="col-lg-6">
                <!-- panel -->
            <div class="card shadow mb-5">
        <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Details</h6>
</div>
<?php foreach($userinfo as $view){?>
<div class="card-body">
<!-- form details -->

<div class="row">
    <div class="col-sm-6"><label>Department Name </label>
        <input type="text" name="department_name" id="department_name" class="form-control form-control-sm" required>
    </div>
</div><p>
<div class="row">
    <div class="col-sm-6"><label>Short Name </label>
        <input type="text" name="shortname" id="shortname" class="form-control form-control-sm" required>
    </div>
</div><p>
<?php } ?>
<br><button type="submit" id="add_subsidiary" name="add_subsidiary" class="btn btn-primary">Submit</button>
<!-- ./form details -->
<br><p>
</div>
</div>
    <!-- ./panel -->
        </div>
            <!-- ./1-->   
                </div>
                    </form>
           <!-- ./form -->
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