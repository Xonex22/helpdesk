<?php 
require_once('.\tools\function.php'); 
require_once('.\tools\connect.php');
require_once('.\tools\user-details.php');
$matrix_list = $Ticketing->get_severity_matrix();
$impact_list = $Ticketing->get_impact();
$severity_list = $Ticketing->get_severity();
$Ticketing->add_requesttype($_POST);
if (isset($_SESSION['success_message'])) {
    $success_message = $_SESSION['success_message'];
    unset($_SESSION['success_message']);
}
if (isset($_SESSION['error_message'])) {
    $error_message = $_SESSION['error_message'];
    unset($_SESSION['error_message']);
}
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
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<link href="css/sb-admin-2.min.css" rel="stylesheet">
<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- alert css -->
    <style>
        /* Optional: Add a custom fade-in/out timing */
        .fade {
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
        }

        .fade.show {
            opacity: 1;
        }
        .alert {
        padding: 15px;
        margin: 15px 0;
        border: 1px solid transparent;
        border-radius: 4px;
        display: block; /* Ensure it's displayed by default */
    }

    /* Style for success messages */
    .alert-success {
        color: #3c763d;
        background-color: #dff0d8;
        border-color: #d6e9c6;
    }

    /* Style for error messages */
    .alert-error {
        color: #a94442;
        background-color: #f2dede;
        border-color: #ebccd1;
    }

    /* Optional: margin top */
    .mt-4 {
        margin-top: 1.5rem;
    }
    /*  modal view */
    /* Modal Styles */
.modal {
  display: none; /* Hidden by default */
  position: fixed;
  left: 50%;
  top: 40%;
  transform: translate(-50%, -50%);
  background-color: white;
  padding: 20px;
  z-index: 1001;
  width: 380px;
  height: 38%;
  border-radius: 8px;
  box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.3);
}

.modal-content {
  margin-bottom: 20px;
}

.modal-footer {
  display: flex;
  justify-content: flex-end;
  gap: 10px;
}

.modal-overlay {
  display: none; /* Hidden by default */
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  z-index: 1000;
}

.btn {
  padding: 10px 15px;
  background-color: #007bff;
  color: white;
  border: none;
  cursor: pointer;
  border-radius: 5px;
}

.btn:hover {
  background-color: #0056b3;
}   
/* justify text */
.justified {
    text-align: justify;
    display: inline-block; /* Needed for text-align to work in spans */
    width: 100%; /* Adjust as needed */
} 
</style>
<!-- ./alert css -->
</head>
<body id="page-top">
    <div id="wrapper">
        <?php require_once ('.\tools\sidebar.html'); ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <?php require_once('.\tools\topbar-admin.php'); ?>
                    <div class="container-fluid">
                    <!-- Content Row -->
                    <h1 class="h3 mb-0 text-gray-800">Severity</h1><br><hr>
                    <!-- ./Content Row -->
                    <!-- 1card here --->     
                    <div class="col-lg-8">
                        <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Severity Details</h6></div>
                        <!--- data --->
                        <table class="table datatable">
                          <thead>
                        <tr>
                        <th><span class="justified">Type</span></th>
                        <th>Description</th>
                        <th><span class="justified">Response Hours</span></th>
                        <th><span class="justified">Resolution Hours</span></th>
                    </tr>
                </thead>
                    <tbody>
                    <?php foreach($severity_list as $view){?>
                      <tr>
                        <td><span class="text-gray-900 p-3 m-0"><span class="justified"><?= $view['priority_type'];?></strong></span></span></td>
                        <td><span class="text-gray-900 p-3 m-0"><span class="justified"><?= $view['severity_type_desc'];?></span></span></td>
                        <td><span class="text-gray-900 p-3 m-0"><span class="justified"><?= $view['response_hrs'];?></span></span></td>
                        <td><span class="text-gray-900 p-3 m-0"><span class="justified"><?= $view['resolution_hrs'];?></span></span></td>
                      </tr>
                    <?php } ?>
                </tbody>
                </table>
                        <!-- ./data --></div>
                    </div><p>          
                        <!--./1card here -->
                        <!-- grid -->
                    <div class="row">
                        <div class="col-sm-4" style="background-color:lavender;">
                        <!-- 1 -->
                        <!-- 2card here --->     
                        <div class="col-lg-16">
                        <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Impact</h6></div>
                        <!--- data --->
                        <table class="table datatable">
                          <thead>
                        <tr>
                        <th>Impact</th>
                        <th><center>Description</center></th>
                    </tr>
                </thead>
                    <tbody>
                    <?php foreach($impact_list as $view){?>
                      <tr>
                        <td><span class="text-gray-900 p-3 m-0"><span class="justified"><?= $view['impact'];?></span></span></td>
                        <td><span class="text-gray-900 p-3 m-0"><span class="justified"><?= $view['description'];?></span></span></td>
                      </tr>
                    <?php } ?>
                </tbody>
                </table>
                        <!-- ./data --></div>
                    </div>          
                        <!--./2card here -->
                        <!-- ./1 -->   
                    </div>
                        <!-- space -->
                        <div class="col-sm-1" style="background-color:lavenderblush;"></div>
                        <!-- ./space -->
                        <div class="col-sm-7" style="background-color:lavender;">
                        <!-- 2 -->
                        <!-- 3card here --->     
                        <div class="col-lg-16">
                        <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Priority Matrix</h6></div>
                        <!--- data --->
                        <table class="table datatable">
                          <thead>
                        <tr>
                        <th><span class="justified">Impact</span></th>
                        <th><span class="justified">High</span></th>
                        <th><span class="justified">Low</span></th>
                        <th><span class="justified">Normal</span></th>
                        <th><span class="justified">Urgent</span></th>
                    </tr>
                </thead>
                    <tbody>
                    <?php foreach($matrix_list as $view){?>
                      <tr>
                        <td><span class="text-gray-900 p-3 m-0"><span class="justified"><strong><?= $view['impact'];?></strong></span></td></td>
                        <td><span class="text-gray-900 p-3 m-0"><span class="justified"><?= $view['urgency_high'];?></span></span></td>
                        <td><span class="text-gray-900 p-3 m-0"><span class="justified"><?= $view['urgency_low'];?></span></span></td>
                        <td><span class="text-gray-900 p-3 m-0"><span class="justified"><?= $view['urgency_normal'];?></span></span></td>
                        <td><span class="text-gray-900 p-3 m-0"><span class="justified"><?= $view['urgency_urgent'];?></span></span></td>
                      </tr>
                    <?php } ?>
                </tbody>
                </table>
                        <!-- ./data -->
                        </div>
                        </div>          
                        <!--./3card here -->
                        <!-- ./2 -->  
                        </div>
                        </div>
                        <!-- ./grid -->
        </div>
            <div>
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
    <!-- alert js -->
     <script>
    $(document).ready(function() {
        setTimeout(function() {
            $('#success_message').fadeOut('slow');
        }, 1000); // 1 seconds delay before fading out
    });
    </script>
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $('#error_message').fadeOut('slow');
            }, 2000); // 2 seconds delay before fading out
        });
    </script>
    <!-- ./alert js -->
    <!-- modal js -->
    <script>
    let requestId = null;
    function openModal(id) {
      // Store the request ID
      requestId = id;
      // Show the modal and overlay
      document.getElementById('confirmationModal').style.display = 'block';
      document.getElementById('modalOverlay').style.display = 'block';
    }
    function closeModal() {
      // Hide the modal and overlay
      document.getElementById('confirmationModal').style.display = 'none';
      document.getElementById('modalOverlay').style.display = 'none';
    }
    document.getElementById('modalYes').addEventListener('click', function() {
      // Redirect to the link with the saved subsidiary ID when Yes is clicked
      if (requestId !== null) {
        window.location.href = './tools/delete-request-type.php?id=' + requestId;
      }
      closeModal();
    });
</script>
<!-- ./modal js -->
</body>
</html>