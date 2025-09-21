<?php 
require_once('.\tools\function.php'); 
require_once('.\tools\encrypt.php');
require_once('.\tools\user-details.php');
require_once('.\tools\decrypt.php');
$viewticket = $Ticketing->view_ticket($id);
$uploadfiles = $Ticketing->get_uploadfiles($id);
$acknowledgementformat = $Ticketing->acknowledgement_format();
$closeticket = $Ticketing->closed_ticket_format();
$Ticketing->closed_ticket($_POST);
//print_r($viewticket);
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
}
</style>
</head>
<!-- <body id="page-top"> -->
    <body id="page-top" class="sidebar-toggled">
    <div id="wrapper">
        <?php require_once ('.\tools\sidebar.html'); ?>
            <div id="content-wrapper" class="d-flex flex-column">
             <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <?php require_once('.\tools\topbar-admin.php'); ?>
                        <div class="container-fluid">
                        <h1 class="h4 mb-4 text-gray-800">Ticket Details</h1>
                            </div>
                            <div class="container-fluid">
                                <?php foreach($viewticket as $action){?>
                                    <p><?php require_once('.\tools\action.php'); ?></p>
                                <?php } ?>
                            <form method="post">
                        <div class="card shadow mb-4">
                    <div class="card-header py-3">
            <?php include('.\tools\ticket-number.php');?>
    <?php foreach($viewticket as $view2){?>    
<?php include('.\tools\ticket-created.php');?>
<?php include('.\tools\textarea-concern.php');?>
<?php include('.\tools\upload-files.php');?>
</div>
</div>
<!-- ./ticket details textarea -->
</dd><br>    </dl>
        <hr>
            <div class="row">
            <div class="col-sm-3"><h6><small>Request Type: <strong><span class="text-gray-900 p-1 m-0"><?= $view1['type_request']; ?>
            </span></strong></h6></small>
            </div>
            <div class="col-sm-3"><h6><small>KRA: <strong><span class="text-gray-900 p-1 m-0"><?= $view1['kra_type']; ?>
            </span></strong></h6></small></div> 
            </div><p>
            <div class="row">
            <div class="col-sm-3"><h6><small>Support Group: <strong><span class="text-gray-900 p-1 m-0"><?= $view1['group_type']; ?>
            </span></strong></h6></small></div>
            <div class="col-sm-6"><h6><small>Technician: <strong><span class="text-gray-900 p-1 m-0"><?= $view1['resolved_by']; ?>
            </span></strong></h6></small>
            </div> 
            </div><p>
            <div class="row">
            <div class="col-sm-3"><h6><small>Category: <strong><span class="text-gray-900 p-1 m-0"><?= $view1['category_type']; ?>
            </span></strong></h6></small>
            </div>
            <div class="col-sm-4"><h6><small>Sub Category: <strong><span class="text-gray-900 p-1 m-0"><?= $view1['subcategory']; ?>
            </span></strong></h6></small></div> 
            <div class="col-sm-4"><h6><small>Item: <strong><span class="text-gray-900 p-1 m-0"><?= $view1['action_type']; ?>
            </span></strong></h6></small></div> 
            </div><p>
            <div class="row">
            <div class="col-sm-3"><h6><small>Impact: <strong><span class="text-gray-900 p-1 m-0"><?= $view1['impact']; ?>
            </span></strong></h6></small></div>
            <div class="col-sm-4"><h6><small>Urgency: <strong><span class="text-gray-900 p-1 m-0"><?= $view1['urgency']; ?>
            </span></strong></h6></small></div> 
            <div class="col-sm-5"><h6><small>Priority: <strong><span class="text-gray-900 p-1 m-0"><?= $view1['priority']; ?>
            </span></strong></h6></small></div> 
            </div><p>
            <div class="row">
                <div class="col-sm-3"><h6><small>Date Created: <strong><span class="text-gray-900 p-1 m-0">
                <?php $datecreated=$view1['datetime_created'];
                $originalDateTimeString1 = "datetime";
                $dateTime1 = new DateTime($datecreated);
                echo $datecreated = $dateTime1->format('F j, Y h:i A'); ?>
                </span></strong></h6></small></div>
                <div class="col-sm-4"><h6><small>Date Acknowledge: <strong><span class="text-gray-900 p-1 m-0">
                <?php $dateresponse=$view1['datetime_response'];
                if(($dateresponse<>''))
                 {   
                    $originalDateTimeString2 = "datetime";
                    $dateTime2 = new DateTime($dateresponse);
                    echo $dateresponse = $dateTime2->format('F j, Y h:i A'); 
                    }else{
                        echo '--';
                } ?>
                </span></strong></h6></small></div> 
                <div class="col-sm-4"><h6><small>Date Resolve: <strong><span class="text-gray-900 p-1 m-0">
                <?php $dateresolve=$view1['datetime_resolve'];
                if(($dateresolve<>''))
                {
                    $originalDateTimeString = "datetime";
                    $dateTime = new DateTime($dateresolve);
                    echo $dateresolve = $dateTime->format('F j, Y h:i A'); 
                    }else{
                    echo '--';
                } ?>
                </span></strong></h6></small>
            </div> 
        </div>
        <!-- -->
                <div class="row">
                <div class="col-sm-3"><h6><small>Due Date: <strong><span class="text-gray-900 p-1 m-0">
                <?php $duedate=$view1['due_datetime'];
                $originalDateTimeString3 = "datetime";
                $dateTime3 = new DateTime($duedate);
                echo $duedate = $dateTime3->format('F j, Y h:i A'); ?>
                </span></strong></h6></small>
            </div> 
        </div>
        <!-- -->
    <p><hr>
<div class="row">
    <div class="col-sm-9">
        <label><strong><span class="text-gray-900 p-1 m-0">Ticket Resolution</span></strong></label>
                <div class="form-group">
                    <textarea class="form-control custom-textarea" id="remark" rows="5" name="remark" readonly><?= htmlspecialchars($view2['resolution']); ?>
                        </textarea>
                        <div id="displayDiv" class="formatted-text">
                        </div>
                    </div>
                </div>
            <div class="col-sm-1"></div>
        </div><hr>
    <div class="row">
<div class="col-sm-9">
    <label><strong><span class="text-gray-900 p-1 m-0">Close Note</span></strong></label>
        <?php foreach($closeticket as $format){?>
            <div class="form-group">
                <textarea class="form-control custom-textarea" id="desc" rows="3" name="desc" readonly><?= htmlspecialchars($format['format_remarks']); ?>
                        </textarea>
                    <?php }?>
                </div>
            </div>
        <div class="col-sm-1"></div>
    </div>
<div class="row">
<div class="col-sm-3">
    </div>
        <div class="col-sm-1"></div>
            </div>
                <br>
                    </div>
                        </div>
                            <?php } ?>  
                        <br> 
                        <?php require_once('.\tools\action.php'); ?>
                    </div>
                <!-- modal -->
            <div class="modal fade" id="myModal">
        <div class="modal-dialog">
    <div class="modal-content">   
<!-- Modal Header -->
    <div class="modal-header">
        <h4 class="modal-title">Alert!</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                    <!-- Modal body -->
                <div class="modal-body">
            Ticket is already closed
        </div>
    <!-- Modal footer -->
<div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>   
        </div>
    </div>
</div>
<!-- ./modal -->
</form>
<br><br></div>
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