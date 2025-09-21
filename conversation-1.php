
<?php 
require_once('.\tools\function.php'); 
$id = $_GET['id'];
$viewticket = $Ticketing->view_ticket($id);
$viewticket_details = $Ticketing->view_ticket_details($id);
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
                        <h1 class="h3 mb-4 text-gray-800">Ticket Details</h1>
                        </div>
                    <div class="container-fluid">
                <!-- ticket number -->
            <?php foreach($viewticket as $view1){?>
        <h3>Ticket No. <strong><?= $view1['ticketno']. '</strong> ' . $view1['subject_request'] . ' | ' . $view1['type_request'];?> <span class="badge bg-success"><font color="white"> <?= $view1['status_update']; ?></font></h3>                  
    <?php } ?><hr><br>
<!-- ticket status in box -->
<!-- IT support replies -->
<div class="col-lg-11">
<?php if($viewticket_details==0) { echo '';}
    else{ foreach($viewticket_details as $view3){
     {?>
        <div class="card mb-4 py-3 border-left-primary">
            <div class="card-body">
              <!-- row -->
                <div class="row">
                    <div class="col-sm-9">
                    <?php
                    $dateattended=$view3['datetimeonly'];
                    $originalDateTimeString = "datetime";
                    $dateTime = new DateTime($dateattended);
                    $formattedDateattended = $dateTime->format('F j, Y h:i A');
                    ?>
                    <?php if(($view3['reptype']==1)){
                    echo 'Follow up ' . $view3['dateupdate']. ' - ' . ' ' . $view3['attendedby'];?>
                    <?= $view3['work_progress'];}
                 elseif(($view3['reptype']==2))
                { echo '<h6><small><strong>' . $view3['attendedby']. '</strong> - ' . $formattedDateattended . ' - Status: <strong>'. $view3['status_update'] . '</strong></h6></small>'; ?>
            </div>
        <!-- column2 -->
    <div class="col-sm-1"></div>
<!-- ./column2 -->
<!-- .column3 -->
<div class="col-sm-2">
    <p align="right">
        <a href="#" data-toggle="collapse" data-target="#demo1">Show</a></p>
            </div>
             <!-- ./column3 -->
                </div>
                 <!-- ./row -->
                    <!--IT support replies description -->
                    <div id="demo1" class="collapse show">
                    <h5><small><?= $view3['work_progress']; ?></small></h5>
                    </div>
                <!-- ./IT support replies description -->
            </div>
        </div>
    <?php }}} ?>  
<!-- ./IT Support replies -->
<!-- client user replies -->
<?php foreach($viewticket as $view2)
$datecreated=$view2['datetime_created'];
$originalDateTimeString = "datetime";
$dateTime = new DateTime($datecreated);
$formattedDatecreated = $dateTime->format('F j, Y h:i A');
{?>
    <div class="card mb-4 py-3 border-left-secondary">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-9"><h6><small>
                <?= '<strong>' . $view2['created_by']. '</strong>' . ' - ' . $formattedDatecreated . '';?></small></h6>
            </div>
        <div class="col-sm-1"></div>
    <div class="col-sm-2">
<p align="right">
<a href="#" data-toggle="collapse" data-target="#demo">Show</a></p>
    </div>
        </div>
            <!-- collapse -->
                <div id="demo" class="collapse show">
                   <h5><small> <?= $view2['desc_request'];?></small></h5>
                    </div>
                    <!-- collapse -->
                </div>
            </div>
        <?php } ?>  
<!-- ./client user replies -->
</div>
    <!-- ./ticket status in box -->
        <?php } ?>  
        <?php require_once('.\tools\action.php'); ?>
            </div>
        <br><br></div>
    <?php require_once('.\tools\footer.html'); ?>
</div>
</div>
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="js/sb-admin-2.min.js"></script>
</body>
</html>