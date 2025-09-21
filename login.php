<?php
require_once('.\tools\function.php'); 
$Ticketing->login();
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
<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                    <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Enter your account to login</h1><br>
                                <form class="user">
                            <div class="form-group">
                        <input type="email" class="form-control form-control-user" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                    </div>
                <div class="form-group">
            <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password"><br>
        </div>
    <button type="submit" name="submit" id="submit" class="btn btn-primary btn-user btn-block">Sign In</button>
<hr><br><br>
<?php if(isset($_SESSION["error_message"])): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error</strong> <?php echo $_SESSION["error_message"]; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                    <?php
                        // Clear the error message
                        unset($_SESSION["error_message"]);
                        endif;
                        ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<center><span class="text-white">Copyright &copy; Helpdesk Ticketing Portal. All rights reserved 2024</span></center>
<!-- footer here -->
</div>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="js/sb-admin-2.min.js"></script>
</html>