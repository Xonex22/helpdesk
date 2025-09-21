
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
<!-- text-area white bg-->
<style> 
.custom-textarea[readonly] {
    background-color: white; /* Ensures the background stays white when readonly */
    color: #212123; /* Font Color black */
/* not appearing scrollbar on embed */
     .embed-responsive {
            position: relative;
            overflow: hidden;
            padding-top: 56.25%; /* 16:9 Aspect Ratio */
        }
        .embed-responsive iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: 0;
}
</style>
</head>
<body id="page-top">
    <div id="wrapper">
        <?php require_once ('.\tools\sidebar.html'); ?>
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                        <?php require_once('.\tools\topbar-admin.php'); ?>
                            <div class="container-fluid">
                                <h1 class="h4 mb-4 text-gray-800">Conversation</h1>
                                </div>
                                <div class="container-fluid">
                                <?php foreach($viewticket as $action){?>
                                    <p><?php require_once('.\tools\action.php'); ?></p>
                                <?php } ?>
                            <form method="post">
                        <div class="card shadow mb-4">
                    <div class="card-header py-3">    
                <!-- ticket number -->
            <?php include('.\tools\ticket-number.php');?>
        <!--./ticket number -->
    <?php foreach($viewticket as $view2){?>
<!-- ticket created -->       
<?php include('.\tools\ticket-created.php');?>
<hr>
<!-- ./ticket created -->
    <div class="row">
        <div class="col-sm-9">
            <!-- embed -->
             <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="http://localhost/ticket/convo.php"></iframe>
            </div>
        <!--./embed-->
    <!-- reply ---->
<div class="row">
<div class="col">
    <div class="form-group">
        <textarea class="form-control" id="reply" rows="1" name="reply" placeholder="Reply..." required></textarea>
            </div>
                </div>
                    <div class="col"><button type="submit" name="submit" id="submit" class="btn btn-primary">Send</button>
                    </div>
                </div>
            <!-- ./reply -->
        </div>
    </div>
</dd><br></dl>
<div class="row">
</div><p>
    <div class="row">
        <div class="col-sm-1">
            </div>
                </div>
                    <br>
                     </div>
                        </div>
                        <input type="hidden" name="reptype" id="reptype" value="2">
                        <input type="hidden" name="ticketno" id="ticketno" value="<?= $view1['ticketno']; ?>">
                    <?php } ?>     
                </div>
            </form>
        <br><br>
    </div>
<?php require_once('.\tools\footer.html'); ?>
</div>
</div>
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i></a>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="js/sb-admin-2.min.js"></script>
</body>
</html>