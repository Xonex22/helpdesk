
<?php 
require_once('.\tools\function.php'); 
require_once('.\tools\user-details.php');
require_once('.\tools\connect.php');
$view_list = $Ticketing->get_servicecategory();
$view_subcat = $Ticketing->get_subcat();
$Ticketing->add_subcategory($_POST);
// Check if there's a success message in the session
// Check for success and error messages in the session
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
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
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
                    </div>
                    <div class="container-fluid">
                    <!-- Content Row -->
                    <h1 class="h3 mb-0 text-gray-800">Sub Category</h1><br><hr>
                    <!-- ./Content Row -->
                <!-- card here --->
            <div class="row">
        <div class="col-sm-4">
    <!-- create form ---->
<div class="row">
<div class="col-lg-10">
    <div class="card mb-4">
        <div class="card-header"><h6 class="m-0 font-weight-bold text-primary">Create Sub Category</h6></div>
            <div class="card-body">
                <form enctype="multipart/form-data" method="post">
                    <label>Category</label>
                    <div class="form-group">
                        <select name="catid" id="catid" class="custom-select mb-2" placeholder="Category" required>
                        <option selected></option>
                        <?php foreach($view_list as $view) {
                        echo "<option value='" . $view['catid'] . "'>" . $view['category_type'] . "</option>";
                        }?>
                        </select>
                    </div>
                </p><input type="text" name="sub_category" id="sub_category" class="form-control form-control-mb-2" placeholder="Sub Category" required><p></p>
                <button type="submit" id="add_subcategory" name="add_subcategory" class="btn btn-primary">Submit</button>
                </form>
                    <?php if (!empty($success_message)): ?>
                        <div class="alert alert-success mt-4" id='success_message'>
                        <i class="fas fa-check" style="font-size:20px"></i>&nbsp;<?php echo $success_message; ?>
                        </div>
                    <?php endif; ?>
                        <?php if (!empty($error_message)): ?>
                        <div class="alert alert-error mt-4" id="error_message">
                            <i class="fas fa-times" style="font-size:20px"></i>&nbsp;<?php echo $error_message; ?>
                        </div>
                    <?php endif; ?>    
            </div>
        </div>
    </div>
</div>
<!-- ./create form -->
</div>
    <div class="col-sm-6">
        <!-- list --->
        <div class="row">
            <div class="col-sm-12">
            <div class="row">
            <div class="col-lg-12">
            <div class="card mb-4">
            <div class="card-header"><h6 class="m-0 font-weight-bold text-primary">Sub Category List</h6></div>
          <table class="table datatable table-hover">
          <thead>
        <tr>
        <th><i class="fas fa-trash"></i></th>
        <th>Category</th>
        <th>Sub Category</th>
    </tr>
</thead>
    <tbody>
    <?php foreach($view_subcat as $view_sub){?>
      <tr>
        <td><a href="#" onclick="openModal(<?= $view_sub['subcat_id']; ?>); return false;"><i class="fas fa-times"></i></a></td>
        <td><span class="text-gray-900 p-3 m-0">
            <?php $catid=$view_sub['catid'];?>
            <?php $sql= "SELECT * FROM service_category WHERE catid=$catid";
            $result=mysqli_query($conn, $sql) or die(mysql_error());
            while($row=mysqli_fetch_assoc($result))
            { echo $row['category_type'];}
            ?>
        </span></td>
        <td><span class="text-gray-900 p-3 m-0"><?= $view_sub['sub_category'];?></span></td>
      </tr>
    <?php } ?>
</tbody>
</table>
    </div>
            <!-- display error --->
            <div class="container mt-5">
                <?php if (isset($_GET['record_exists']) && $_GET['record_exists'] == 1): ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <i class="fa fa-exclamation" style="font-size:20px"></i> <strong>Denied!</strong> This sub category contains record. Deletion is not allowed.
                </div>
            <?php endif; ?>
        </div>
    <!--./display error -->
        </div>    
            </div>
                </div>
                <!--./list -->
            </div>
        </div>
    </div>
<!--./card here -->
</div>
    <div>
        </div>
            </div>
            <!-- modal ---->
                <div id="confirmationModal" class="modal">
                <div class="modal-content">
                <h4>Confirmation</h4>
                <p>Are you sure do you want to delete?</p>
            </div>
            <div class="modal-footer">
            <button class="btn" id="modalYes">Yes</button>
            <button class="btn" onclick="closeModal()">No</button>
        </div>
    </div>
    <div id="modalOverlay" class="modal-overlay"></div>
        <!-- ./modal -->
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
let subcatId = null;

function openModal(id) {
    // Store the sub category ID
    subcatId = id;
    // Show the modal and overlay
    document.getElementById('confirmationModal').style.display = 'block';
    document.getElementById('modalOverlay').style.display = 'block';
}

function closeModal() {
    // Hide the modal and overlay
    document.getElementById('confirmationModal').style.display = 'none';
    document.getElementById('modalOverlay').style.display = 'none';
}

// Corrected event listener
document.getElementById('modalYes').addEventListener('click', function() {
    if (subcatId !== null) {
        window.location.href = './tools/delete-subcategory.php?id=' + subcatId; // Fixed variable name
    }
    closeModal();
});
</script>
<!-- ./modal js -->
    <script>
        // Refresh the page every 30 seconds (30,000 milliseconds)
        setInterval(function(){
            // window.location.reload();
            window.location.replace("http://localhost/ticket/sub-category");
        }, 30000); // 30,000 milliseconds = 30 seconds
    </script>   
</body>
</html>