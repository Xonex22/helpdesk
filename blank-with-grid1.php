
<?php 
require_once('.\tools\function.php'); 
require_once('.\tools\connect.php');
require_once('.\tools\user-details.php');
//print_r($resolve_ticket); //display array
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
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<body id="page-top">
    <div id="wrapper">
        <?php require_once ('.\tools\sidebar.html'); ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <?php require_once('.\tools\topbar-admin.php'); ?>
                    <div class="container-fluid">
                    </div>
                    <div class="container-fluid">
                    <!-- Content Row -->
                    <h1 class="h3 mb-0 text-gray-800">Department</h1><br>
                    <!-- ./Content Row -->
                    <!-- card here --->
<!--                                  <div class="row">
                        <div class="col-lg-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    Default Card Example
                                </div>
                                <div class="card-body">
                                    This card uses Bootstrap's default styling with no utility classes added. Global
                                    styles are the only things modifying the look and feel of this default card example.
                                </div>
                            </div>
                        </div>
                    </div> -->

                      <div class="row">
    <div class="col-sm-4" style="background-color:lavender;">.col-sm-4</div>
    <div class="col-sm-1" style="background-color:lavenderblush;">.col-sm-4</div>
    <div class="col-sm-7" style="background-color:lavender;">.col-sm-4</div>
  </div>

                    <!--./card here -->
                    </div>
                    <div>
                </div>
            </div>
          <br><br>
        <?php require_once('.\tools\footer.html'); ?>
      </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
    </a>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/simple-datatables/simple-datatables.js"></script>
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
    <script src="js/sb-admin-2.min.js"></script>   
</body>
</html>