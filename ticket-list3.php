
<?php 
require_once('.\tools\function.php'); 
$view_list = $Ticketing->ticket_list();
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
<body id="page-top">
    <div id="wrapper">
        <?php require_once ('.\tools\sidebar1.html'); ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <?php require_once('.\tools\topbar-admin.php'); ?>
                    <div class="container-fluid">
                    <h1 class="h4 mb-4 text-gray-800">Ticket Lists</h1>
                </div>
              <div class="container-fluid">
            <div class="card shadow mb-4">
        <div class="card-header py-3">
      <div class="scrollmenu">
    <h6 class="m-0 font-weight-bold text-primary"></h6>
    <table class="table datatable table-hover" id="dataTable" width="100%" cellspacing="0">
    <thead>
      <tr>
        <th><span class="text-primary">ID</span></th>
        <th><span class="text-primary">Subjects</span></th>
        <th><span class="text-primary">Type Request</span></th>
        <th><span class="text-primary">Requestor Name</span></th>
        <th><span class="text-primary"><center>Tech Support</center></span></th>
        <th><span class="text-primary"><center>Urgency</center></span></th>
        <th><span class="text-primary"><center>Group</center></span></th>
        <th><span class="text-primary"><center>Status</center></span></th>
        <th><span class="text-primary">Due by Date</span></th>
        <th><span class="text-primary"><center>Created Date</center></span></th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($view_list as $view){?>
      <tr>
        <td>
          <a href="ticket-details.php?id=<?= $view['ticketno'];?>"><strong><?= $view['ticketno'];?></strong></a></td>
        <td>
          <a href="#" data-toggle="tooltip" title="<?= $view['subject_request'];?>" data-placement="bottom"><span class="text-success"><strong><?= substr($view['subject_request'],0,80);?></strong></span></a>
        </span></td>
        <td><span class="text-gray-900 p-3 m-0"><?= $view['type_request'];?></span></td>
        <td><span class="text-gray-900 p-3 m-0"><?= $view['created_by'];?></span></td>
        <td><span class="text-gray-900 p-3 m-0"><strong><?php $resolve=$view['resolved_by'];
          if($resolve<>"")
            { echo $resolve; }
          else { echo '-'; }
          ?></strong></span></td>
        <td><span class="text-gray-900 p-3 m-0"><?php $sla=$view['priority'];
          if($sla<>"")
            { echo $sla; }
          else { echo '-'; }
        ?></span></td>
        <td><span class="text-gray-900 p-3 m-0"><?php $group_type=$view['group_type'];
          if($group_type<>"")
            { echo $group_type; }
          else { echo '-'; }
          ?></span></td>
        <td><span class="text-gray-900 p-3 m-0"><?= $view['status_update'];?></span></td>
        <td><span class="text-gray-900 p-3 m-0"><?php $duedate=$view['due_datetime'];
              $originalDateTimeString = "datetime";
              $dateTime = new DateTime($duedate);
              $duedate = $dateTime->format('F j, Y h:i A');
                  ?>
          <?php if($duedate=" ")
            { echo '-'; }
          else { echo $duedate; }
        ?></span></td>
        <td><span class="text-gray-900 p-3 m-0">
          <?php $datetimecreated=$view['datetime_created'];
          $originalDateTimeString = "datetime";
          $dateTime = new DateTime($datetimecreated);
          echo $created = $dateTime->format('F j, Y h:i A');
          ?></td></span>
      </tr>
    <?php } ?>
      </tbody>
        </table>
        <br>
          <!-- -->
        </div>
            </div>
              </div>
              <br>
              </div>
          </div>
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