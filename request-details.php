
<?php 
require_once('.\tools\function.php'); 
$id = $_GET['id'];
$viewticket = $Ticketing->view_ticket($id);
$uploadfiles = $Ticketing->get_uploadfiles($id);
$support_group = $Ticketing->get_supportgroup(); //
$acknowledgementformat = $Ticketing->acknowledgement_format(); //
$Ticketing->acknowledge_ticket($_POST);
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
                    <?php require_once('.\tools\topbar.html'); ?>
                            <div class="container-fluid">
                        <h1 class="h4 mb-4 text-gray-800">Request Details</h1>
                        </div>
                       <div class="container-fluid">
                    <form method="post">
                <!-- ticket number -->
            <?php foreach($viewticket as $view1){?>
        <h3>Ticket No. <strong><?= $view1['ticketno']. '</strong> ' . $view1['subject_request'] . ' | ' . $view1['type_request'];?> <span class="badge bg-success"><font color="white"> <?= $stat= $view1['status_update']; ?> </font></h3>                  
    <?php } ?> <hr>
 <?php foreach($viewticket as $view2){?>
<dl>
<?php
$datecreated=$view2['datetime_created'];
$originalDateTimeString = "datetime";
$dateTime = new DateTime($datecreated);
$created = $dateTime->format('F j, Y h:i A');
?> 
<dt><h5><small><strong><span class="text-primary"><?= $view2['created_by'] . '</span></strong> | ' . $view2['department'] . '(' . $view2['subsidiary'] . ') | ' . $view2['contact_no'] . ' | ' . $created . ' '; ?></small></h5></dt>
<dd>
<!-- ticket details textarea -->
    <div class="row">
        <div class="col-sm-9">
            <!-- textarea -->
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"><?= htmlspecialchars($view2["desc_request"]);?></textarea>
                <div id="displayDiv" class="formatted-text">
            </div>
            <?php 
            if($view1['upload_file']!=0)
            {
            foreach($uploadfiles as $view_upload){ 
            $file_name=$view_upload['file_name'];
            $name=$view_upload['file_desc'];
            echo '<a href=".\tools\download.php?filename='.$file_name.'&f='.$name.'">'; echo $name; echo'</a>';
            }
        }
        else
            {echo '';}
            ?>
        <!-- ./textarea -->
    </div>
</div>
<!-- ./ticket details textarea -->
</dd><br>
    </dl>
        <hr>
        <!-- 1-->
            <div class="row">
                <div class="col-sm-3">
                    <!-- Support Group-->
                    <label>Support Group</label>
                        <div class="form-group">
                            <select name="support" id="support" class="custom-select mb-2" required>
                            <option selected> </option>
                            <?php foreach($support_group as $support) {
                            echo "<option value='" . $support['sg_id'] . "'>" . $support['group_remark'] . "</option>";
                         } ?>
                    </select>
                </div>
            <!-- ./Support Group -->
        </div>
    <div class="col-sm-1"></div> 
<div class="col-sm-3">
<!-- Assign Tech Support -->
<label>Assign Technical Support</label>
    <div class="form-group">
        <select name="techsupport" id="techsupport" class="custom-select mb-2" required>
            <option selected> </option>
                    </select>
                </div>
            <!-- ./Assign Tech Support -->
        </div>
    </div>
<!--./1 --> 
<!-- 2-->
<div class="row">
    <div class="col-sm-9">
        <!-- Acknowledgement Receipt -->
            <label>Acknowledgement Receipt </label>
                <?php foreach($acknowledgementformat as $viewformat){?>
                    <div class="form-group">
                        <!-- acknowldedge format -->
                            <textarea class="form-control" id="desc" rows="5" name="desc" required><?= htmlspecialchars($viewformat['format_remarks']); ?>
                            </textarea>
                            <div id="displayDiv" class="formatted-text">
                            </div>
                        <?php }?>
                    <!-- ./Acknowledgement Receipt -->
                </div>
            </div>
        <div class="col-sm-1"></div>
    </div>
<!--./2 -->   
<!-- 3-->
<div class="row">
<div class="col-sm-3">
    <?php if(($stat=="Acknowledge"))
        { echo '<button type="button" id="acknowledge_next" data-toggle="modal" class="btn btn-primary" data-target="#myModal">Click to proceed</button>';}
            else
                { echo '<button type="submit" id="acknowledge_ticket" name="acknowledge_ticket" class="btn btn-primary">Acknowledge Ticket</button>';}
                ?>
                <?php } ?>
                </div>
            <div class="col-sm-1"></div>
        </div>
    <!--./3 -->   
<input type="hidden" name="ticketno" id="ticketno" value="<?= $view1['ticketno']; ?>">
<input type="hidden" name="reptype" id="reptype" value="2">
<input type="hidden" name="attendedby" id="attendedby" value="Jayson Alquiza">
<br> 
<!-- action links -->
<?php require_once('action.php'); ?>
<!-- ./action links -->
</div>
<!-- The Modal -->
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
<i class="fas fa-exclamation-triangle"></i> Ticket is already Acknowledge
</div>
    <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>   
        </div>
    </div>
</div>
<!-- modal -->
</form>
</div><br>
<?php require_once('.\tools\footer.html'); ?></div>
</div>
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i></a>
<?php require_once('.\tools\logout.php'); ?>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="js/sb-admin-2.min.js"></script>
<script>
$(document).ready(function(){
    $('#support').on('change', function(){
        var sg_id = $(this).val();
            if(sg_id){
                $.ajax({
                    type:'POST',
                        url:'./tools/get_userlist.php',
                        data:{sg_id:sg_id},
                        success:function(html){
                        $('#techsupport').html(html);
                        }
                    });
                }else{
            $('#techsupport').html('<option value=""> </option>');
            }
        });
    });
</script>
</body>
</html>