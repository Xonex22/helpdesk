
<?php 
require_once('.\tools\function.php');
require_once('.\tools\encrypt.php');  
require_once('.\tools\user-details.php');
$view_list = $Ticketing->ticket_list();
$resolved_count = $Ticketing->count_resolved(); 
$open_count = $Ticketing->count_open(); 
$onhold_count = $Ticketing->count_onhold(); 
$closed_count = $Ticketing->count_closed(); 
$acknowledge_count = $Ticketing->count_acknowledge();
$reassigned_count = $Ticketing->count_reassigned();  
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
<style>
div.scrollmenu {
  overflow: auto;
  white-space: nowrap;
}
</style>
    <!-- ./scroll -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<body id="page-top" class="sidebar-toggled">
    <div id="wrapper">
        <?php require_once ('.\tools\sidebar.html'); ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <?php require_once('.\tools\topbar-admin.php'); ?>
                    <div class="container-fluid">
                    <!-- <h1 class="h4 mb-4 text-gray-800">Ticket List</h1> -->
                    </div>
                    <div class="container-fluid">
                    <!-- Content Row -->
                  <?php include_once('.\tools\content.php'); ?>
                <!-- ./Content Row -->
            <div class="card shadow mb-">
        <div class="card-header py-3">
      <div class="scrollmenu">
    <h6 class="m-0 font-weight-bold text-primary"></h6>
    <!-- ticket list -->
    <?php require_once('.\tools\data-list.php'); ?>
    <!-- ./ ticket list -->
        </div>
            </div>
              </div>
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
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
    <!--
        <script>
        document.body.style.transform = "scale(0.8)";
        document.body.style.transformOrigin = "top left";
        document.body.style.width = "125%";
        document.body.style.height = "125%";
    </script>-->
</body>
</html>