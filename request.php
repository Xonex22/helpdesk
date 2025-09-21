
<?php 
require_once('.\tools\function.php'); 
$request_type = $Ticketing->request_type();
$Ticketing->create_ticket($_POST);
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
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
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
                                <!-- Page Heading -->
                                <h1 class="h4 mb-4 text-gray-800">Request / Create ticket</h1>
                                </div>
                            <div class="container-fluid">
                            <form enctype="multipart/form-data" action="" name="form" method="post">
                        <!-- 1-->
                    <div class="col-lg-8">
                <!-- panel -->
            <div class="card shadow mb-4">
        <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Ticket Details</h6>
</div>
<div class="card-body">
<!-- form details -->
<!--. Subsidiary/Department --> 
    <div class="row">
            <div class="col-sm-5">
             <!-- subsidiary -->
                <label>Subsidiary </label>
                    <div class="form-group">
                        <input type="text" name="subsidiary" id="subsidiary" class="form-control form-control-sm" value="Velox" readonly>
                            </div>
                                 <!-- ./subsidiary -->
                                    </div>
                                    <!-- space1 -->
                                    <div class="col-sm-1"></div>
                                    <!-- ./space1 -->
                                    <!-- department -->
                                    <div class="col-sm-5">
                                <label>Department </label>
                            <div class="form-group">
                        <input type="text" name="department" id="department" class="form-control form-control-sm" value="Accounting" readonly>
                    </div>           
                <!-- department -->
            </div>
        </div>
<!--./Subsidiary/Department --> 
<!-- Request Type/Contact No. -->
<div class="row">
<!-- Request Type -->
    <div class="col-sm-5">
            <label>Type of Request </label>
                <div class="form-group">
                <select name="request_type" id="request_type" class="custom-select mb-2" required>
            <option selected> </option>
                <?php foreach($request_type as $request) {
                   // echo "<option value='" . $request['request_type'] . "'></option>";
                    //   <option value="Low">Low</option>
                    echo "<option value='" . $request['request_type'] . "'>" . $request['request_type'] . "</option>";
                    }?>
                    </select>
                        </div>           
                            <!-- Request Type -->
                                </div>
                                    <!-- space2 -->
                                    <div class="col-sm-1"></div>
                                     <!-- ./space2 -->
                                <!-- Contact No. -->
                            <div class="col-sm-5">
                        <label>Contact No. </label>
                    <div class="form-group">
                <input type="text" name="contactno" id="contactno" class="form-control form-control-sm" required>
            </div>   
        </div>
    <!-- ./Contact No. -->
</div>
<!-- ./Request Type/Contact No. ,-->
<!-- Subject-->
    <div class="row">
        <div class="col-sm-7">
            <label>Subject </label>
                <div class="form-group">
                    <input type="text" name="subject" id="subject" class="form-control form-control-sm" maxlength="50" required>
                        </div>       
                            </div>
                              </div>
                            <!-- ./Subject-->
                        <!-- file attatchment-->
                    <div class="row">
                <div class="col-sm-11"><!-- file attatched here --></div>
            </div>
    <!--./file attatchment -->   
<!-- Request Desc-->
<div class="row">
<div class="col-sm-11">
<label>Request/issue description</label>
    <div class="form-group">
        <textarea class="form-control" rows="5" name="desc" id="desc" required></textarea>
        <!--<input type="hidden" name="userid" id="userd" value="<= $view['userid']; ?>"> -->
            <input type="hidden" name="userid" id="userid" value="13">
                <input type="hidden" name="created_by" id="created_by" value="Loui Agsoy">
                    </div>      
                        </div>
                            </div>
                            <!-- ./Request Desc-->
                             <!-- file attatchment-->
                                <div class="row">
                                <div class="col-sm-11">Attached file<input type="file" name="file" id="file" /><!-- file attatched here --></div>
                                </div>
                                <!--./file attatchment -->  
                                <p>
                            <!-- Submit-->
                            <div class="row">
                        <div class="col-sm-6">
                    <button type="submit" name="create_ticket" id="create_ticket" class="btn btn-primary">Submit</button>    
                </div>
            </div>
        <!-- ./Submit-->
    <!-- ./form details -->
<br>
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
<i class="fas fa-angle-up"></i>
</a>
<?php require_once('.\tools\logout.php'); ?>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="js/sb-admin-2.min.js"></script>
</body>
</html>