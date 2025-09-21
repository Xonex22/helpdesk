<?php 
require_once('.\tools\function.php'); 
require_once('.\tools\encrypt.php');  
require_once('.\tools\connect.php'); 
require_once('.\tools\user-details.php');
require_once('.\tools\decrypt.php');
$viewticket = $Ticketing->view_ticket($id);
$uploadfiles = $Ticketing->get_uploadfiles($id);
$support_group = $Ticketing->get_supportgroup(); 
$getimpact = $Ticketing->get_severity_matrix();
$getseverity = $Ticketing->get_severity();
$acknowledgementformat = $Ticketing->acknowledgement_format(); 
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
<style> 
.custom-textarea[readonly] {
    background-color: white; /* Ensures the background stays white when readonly */
    color: #212123;
}
/* alert box shadow*/
    .custom-shadow {
        box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.1);
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
                                <h1 class="h4 mb-4 text-gray-800">Acknowledge</h1>
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
</div></div>
</dd>
<?php 
$status_update = $action['status_update'];
if(($status_update<>'Open' AND $status_update<>'Resolved'))
{?>
<div class="col-sm-9">
    <div class="alert alert-warning custom-shadow">
        <strong>Note:</strong> This ticket was already acknowledged and assigned to: 
            <?= $action['resolved_by']. ' ('. $action['group_type'] . ') '; 
            $date=$action['datetime_response'];
            $originalDateTimeString = "datetime";
            $dateTime = new DateTime($date);
            echo $date = $dateTime->format('F j, Y h:i A');
         ?>
    </div>
</div>
<?php }
 elseif(($status_update=='Resolved'))
{?>
    <div class="col-sm-9">
        <div class="alert alert-success custom-shadow">
            <strong>Success:</strong> This ticket was resolved by:
            <?= $action['resolved_by']. ' ('. $action['group_type'] . ') ';
            $date=$action['datetime_response'];
            $originalDateTimeString = "datetime";
            $dateTime = new DateTime($date);
            echo $date = $dateTime->format('F j, Y h:i A');
            ?>
        </div>
    </div>
<?php }
else{ echo '<br>';}
    ?>
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
    <div class="col-sm-2"></div> 
<div class="col-sm-3">
<!-- Assign Tech Support -->
<label>Assign Technician</label>
    <div class="form-group">
        <select name="techsupport" id="techsupport" class="custom-select mb-2" required>
            <option selected> </option>
                    </select>
                </div>
            <!-- ./Assign Tech Support -->
        </div>
    </div>
<!--./1 --> 
<!-- -->
<div class="row">
<div class="col-sm-3">
<!-- impact -->
<label>Impact</label>
    <div class="form-group">
        <select name="impact" id="impact" class="custom-select mb-2" required>
            <option selected> </option>
                <?php foreach($getimpact as $impact) {
                    echo "<option value='" . $impact['impact'] . "'>" . $impact['impact'] . "</option>";
                    } ?>
                </select>
            </div>   
        <!-- ./impact -->
    </div>
<div class="col-sm-2">
<!-- urgency -->
<label>Urgency</label>
    <div class="form-group">
        <select name="urgency" id="urgency" class="custom-select mb-2" required>
            <option selected> </option>
                <?php foreach($getseverity as $severity) {
                    echo "<option value='" . $severity['severity_type'] . "'>" . $severity['severity_type'] . "</option>";
                    }?>
                </select>
            </div>
        <!-- ./urgency -->
    </div>
<div class="col-sm-3">
<!-- priority -->
<label>Priority</label>
    <div class="form-group">
        <select name="priority" id="priority" class="custom-select mb-2" required>
            <option selected></option>
                </select>
            </div>
        <!-- priority -->
    </div>
</div>
<hr>
<!-- -->
<!-- 2-->
<div class="row">
    <div class="col-sm-9">
        <!-- Acknowledgement Receipt -->
            <label><span class="text-gray-900 p-2 m-0">Acknowledgement Receipt</span></label>
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
<?php
$sql= "SELECT * FROM request_details WHERE ticketno=$id AND status_update<>'Open'";
$result=mysqli_query($conn, $sql) or die(mysql_error());
$row = mysqli_fetch_row($result);		
if (mysqli_num_rows($result)>0)
	{ echo  '<button type="button" id="acknowledge_next" data-toggle="modal" class="btn btn-primary" data-target="#myModal" disabled>Acknowledge Ticket</button>';}
    else
     {echo '<button type="submit" id="acknowledge_ticket" name="acknowledge_ticket" class="btn btn-primary">Acknowledge Ticket</button>'; }?>
                <?php } ?>
                    </div>
                <div class="col-sm-1">
            </div>
        </div>
        <br>
    </div>
</div>
<!--./3 -->   
<input type="hidden" name="ticketno" id="ticketno" value="<?= $view1['ticketno']; ?>">
<input type="hidden" name="datetime_created" id="datetime_created" value="<?= $view1['datetime_created']; ?>">
<input type="hidden" name="reptype" id="reptype" value="2">
<input type="hidden" name="attendedby" id="attendedby" value="<?= $userdetails['fullname']; ?>">
<br> 
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
<br><br></div>
<?php require_once('.\tools\footer.html'); ?></div>
</div>
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i></a>
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
<script>
$(document).ready(function(){
    $('#impact').on('change', function(){
        var impact = $(this).val();
            if(impact){
                $.ajax({
                    type:'POST',
                    url:'./tools/get_priority.php',
                    data:{impact:impact},
                    success:function(html){
                    $('#priority').html(html);
                    }
                });
            }else{
            $('#priority').html('<option value="">Select</option>');
        }
    });
});
</script>
<script>
$(document).ready(function(){
    $('#impact, #urgency').on('change', function(){
        var impact = $('#impact').val();
        var urgency = $('#urgency').val();
        if (impact && urgency) {
            $.ajax({
                type: 'POST',
                url: './tools/get_severity.php',
                data: { impact: impact, urgency: urgency }, // Pass multiple data values
                success: function(html){
                    $('#priority').html(html);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        } else {
        $('#priority').html('<option value=""></option>');
        }
    });
});
</script>
</body>
</html>