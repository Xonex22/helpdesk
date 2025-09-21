
<?php 
require_once('.\tools\function.php'); 
require_once('.\tools\connect.php');
require_once('.\tools\user-details.php');
$view_list = $Ticketing->users_list();
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
                                <h1 class="h4 mb-4 text-gray-800">User list</h1>
                                </div>
                            <div class="container-fluid">
                            <form enctype="multipart/form-data" method="post">
                        <!-- 1-->
                    <div class="col-lg-15">
                <!-- panel -->
            <div class="card shadow mb-10">
        <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">User Details</h6>
</div>
<div class="card-body">
<table class="table datatable table-hover">
      <!--<table class="table">-->
    <thead>
      <tr>
        <th>Email</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Middle Name</th>
        <th>Contact No.</th>
        <th>Subsidiary</th>
        <th>Department</th>
        <th>User Type</th>
        <th>Status</th>
        <th>Created Date</th>
      </tr>
    </thead>
    <tbody>
      <!--?php sleep(1); -->
    <?php foreach($view_list as $view){?>
      <tr>
        <td><a href="#id=<?= $view['userid'];?>"><strong><?= $view['user_login'];?></strong></a></td>
        <td><?= $view['first_name'];?></td>
        <td><?= $view['last_name'];?></td>
        <td><?= $view['middle_name'];?></td>
        <td><?= $view['contact_no'];?></td>
        <td>
           <?php
            $subid = $view['subsidiary_id']; 
                $sql="SELECT * FROM subsidiary WHERE subsidiary_id=$subid";
                $result=mysqli_query($conn, $sql) or die(mysql_error());
                while($view1=mysqli_fetch_assoc($result))
                { echo $view1['short_name'];}
            ?>
        </td>
        <td>
            <?php
            $dept_id = $view['dept_id']; 
            $sql="SELECT * FROM department WHERE dept_id=$dept_id";
            $result=mysqli_query($conn, $sql) or die(mysql_error());
            while($view2=mysqli_fetch_assoc($result))
            { echo $view2['short_depname'];}
            ?>
        </td>
        <td>
            <?php
            $sg_id = $view['sg_id']; 
            $sql="SELECT * FROM support_group WHERE sg_id=$sg_id";
            $result=mysqli_query($conn, $sql) or die(mysql_error());
            while($view2=mysqli_fetch_assoc($result))
            { echo $view2['group_remark'];}
            ?>
        </td>
        <td><?= $view['user_status'];?></td>
        <td><?= $view['date_register'];?></td>
      </tr>
    <?php } ?>
      </tbody>
         </table>
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