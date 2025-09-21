<?php 
require_once('.\tools\function.php'); 
require_once('.\tools\encrypt.php');  
require_once('.\tools\connect.php'); 
require_once('.\tools\user-details.php');
require_once('.\tools\decrypt.php');
$viewticket = $Ticketing->view_ticket($id);
$uploadfiles = $Ticketing->get_uploadfiles($id);
$support_group = $Ticketing->get_supportgroup();
$getKRA = $Ticketing->get_kra();
$getimpact = $Ticketing->get_severity_matrix();
$getseverity = $Ticketing->get_severity();
$servicecategory = $Ticketing->get_servicecategory();
$Ticketing->resolved_ticket($_POST);
$resolvedformat = $Ticketing->resolved_format();
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
                        <h1 class="h4 mb-4 text-gray-800">Resolve</h1>
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
</dd>
<?php 
$status_update = $action['status_update'];
if(($status_update=='Closed' OR $status_update=='Resolved'))
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
            <div class="row">
                <div class="col-sm-3"><h6><small>Support Group: <span class="text-gray-900 p-2 m-0"><strong>
                    <?= $view1['group_type']; ?></strong></span></small></h6>
                        </div>
                            <div class="col-sm-4"><h6><small>Technician: <strong><span class="text-gray-900 p-2 m-0">
                            <?= $view1['resolved_by']; ?></strong><span></h6></small>
                        </div> 
                    <div class="col-sm-5"><h6><small>Date Acknowledge: <strong><span class="text-gray-900 p-2 m-0">
                <?php $dateresponse=$view1['datetime_response'];
                $originalDateTimeString = "datetime";
                $dateTime = new DateTime($dateresponse);
                echo $dateresponse = $dateTime->format('F j, Y h:i A'); ?>
            </strong></span></small></h6>
        </div>
    </div><p><hr>
<div class="row">
<div class="col-sm-3"><h6><small>Impact: <span class="text-gray-900 p-2 m-0"><strong>
<?= $view1['impact']; ?></strong></span></small></h6>
    </div>
        <div class="col-sm-4"><h6><small>Urgency: <strong><span class="text-gray-900 p-2 m-0">
            <?= $view1['urgency']; ?></strong><span></h6></small>
            </div> 
                <div class="col-sm-5"><h6><small>Priority: <strong><span class="text-gray-900 p-2 m-0">
                   <?= $view1['priority']; ?><input type="hidden" name="priority" id="priority" value="<?= $view1['priority']; ?>"></strong></span></small></h6>
            </div>
        </div>
    <p><hr>
<div class="row">
<div class="col-sm-3">
<!--Support Group -->
<label>Support Group</label>
    <div class="form-group">
        <select name="request_type" id="request_type" class="custom-select mb-2" required>
            <option selected><?= $request= $view1['type_request']; ?> </option>
                <?php $sql= "SELECT * FROM request_type WHERE request_type!='$request'";
                    $result=mysqli_query($conn, $sql) or die(mysql_error());
                    while($row=mysqli_fetch_assoc($result))
                    { echo "<option value='" . $row['request_type'] . "'>" . $row['request_type'] . "</option>";}
                    ?>
                </select>
            </div>
        <!-- ./Support Group -->
    </div>
<div class="col-sm-3">
<!--KRA -->
<label>KRA (Key Results Area)</label>
    <div class="form-group">
        <select name="KRA" id="KRA" class="custom-select mb-2" required>
            <option selected></option>
                <?php foreach($getKRA as $KRA) {
                    echo "<option value='" . $KRA['kra_type'] . "'>" . $KRA['kra_type'] . "</option>";
                    } ?>
                </select>
            </div>
         <!-- ./KRA -->
    </div>
</div>
<br>
<div class="row">
<div class="col-sm-3">
<!-- category -->
<label>Category</label>
    <div class="form-group">
        <select name="category" id="category" class="custom-select mb-2" required>
            <option selected></option>
                <?php foreach($servicecategory as $category) {
                    echo "<option value='" . $category['catid'] . "'>" . $category['category_type'] . "</option>";
                    }?>
                </select>
                <input type="hidden" id="category_value" name="category_value" readonly>
            </div>
        <!-- ./category -->
    </div>
<div class="col-sm-2">
<!-- sub category -->
<label>Sub Category</label>
    <div class="form-group">
        <select name="subcat" id="subcat" class="custom-select mb-2" required>
            <option selected> </option>
                </select>
                <input type="hidden" id="subcat_value" name="subcat_value" readonly>
            </div>
        <!-- ./sub category -->
    </div>
<div class="col-sm-3">
<!--item -->
<label>Item</label>
    <div class="form-group">
        <select name="item" id="item" class="custom-select mb-2" required>
            <option selected> </option>
                </select>
                <input type="hidden" id="item_value" name="item_value" readonly>
            </div>
        <!-- item -->
    </div>
</div>
<!-- ./***** -->
<p><hr>
<div class="row">
    <div class="col-sm-9">
        <!-- Resolution -->
            <label><span class="text-gray-900 p-2 m-0">Resolution</span></label>
            <?php foreach($resolvedformat as $viewformat){?>
                <div class="form-group">
                    <textarea class="form-control" rows="5" id="desc" name="desc" required><?= htmlspecialchars($viewformat['format_remarks']); ?>
                        </textarea>
                        <?php }?>
                    <!-- ./Resolution -->
                </div>
            </div>
        <div class="col-sm-1">
    </div>
</div>
<div class="row">
<div class="col-sm-3">
<?php
$sql= "SELECT * FROM request_details WHERE ticketno=$id AND status_update='Resolved' OR 'Closed'";
$result=mysqli_query($conn, $sql) or die(mysql_error());
$row = mysqli_fetch_row($result);		
if (mysqli_num_rows($result)>0)
	{ echo  '<button type="button" id="resolve_next" data-toggle="modal" class="btn btn-primary" data-target="#myModal" disabled>Resolved Ticket</button>';}
        else
            {echo '<button type="submit" id="resolved_ticket" name="resolved_ticket" class="btn btn-primary">Resolved Ticket</button>'; }?>
            </div>
                <div class="col-sm-1">        
                </div>
            </div><br>
        </div>
    </div>   
<input type="hidden" name="ticketno" id="ticketno" value="<?= $view1['ticketno']; ?>">
<input type="hidden" name="datetime_response" id="datetime_response" value="<?= $view1['datetime_response']; ?>">
<input type="hidden" name="reptype" id="reptype" value="2">
<?php } ?>
<input type="hidden" name="attendedby" id="attendedby" value="<?= $userdetails['fullname']; ?>">
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
Ticket is already resolved or closed
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
            <br>
        </div>
    <?php require_once('.\tools\footer.html'); ?>
</div>
</div>
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i></a>
<!--php require_once('.\tools\logout.php'); ?>-->
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
    $('#category').on('change', function(){
        var catid = $(this).val();
            if(catid){
                $.ajax({
                    type:'POST',
                    url:'./tools/get_subcategory.php',
                    data:{catid:catid},
                    success:function(html){
                    $('#subcat').html(html);
                    }
                });
            }else{
            $('#subcat').html('<option value="">Select</option>');
        }
    });
});
</script>
<script>
$(document).ready(function(){
    $('#subcat').on('change', function(){
        var subcat_id = $(this).val();
            if(subcat_id){
                $.ajax({
                    type:'POST',
                    url:'./tools/get_actionlist.php',
                    data:{subcat_id:subcat_id},
                    success:function(html){
                    $('#item').html(html);
                    }
                });
            }else{
            $('#item').html('<option value="">Select</option>');
            }
        });
    });
</script>
<script>
document.getElementById("category").addEventListener("change", function() {
  var selectedOption = this.options[this.selectedIndex].text;
  document.getElementById("category_value").value = selectedOption;
});
</script>
<script>
document.getElementById("subcat").addEventListener("change", function() {
  var selectedOption = this.options[this.selectedIndex].text;
  document.getElementById("subcat_value").value = selectedOption;
});
</script>
<script>
document.getElementById("item").addEventListener("change", function() {
  var selectedOption = this.options[this.selectedIndex].text;
  document.getElementById("item_value").value = selectedOption;
});
</script>
</body>
</html>