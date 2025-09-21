
<?php 
require_once('.\tools\function.php'); 
// require_once('.\tools\connect.php');
require_once('.\tools\user-details.php');
//print_r($resolve_ticket); //display array
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
  <!-- Flot CSS for styling charts -->
  <style>
    #pieChart {
      height: 310px;
    }
  </style>
  <!-- ./Flot CSS for styling charts -->
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
                    <?php require_once('.\tools\topbar-admin.php'); ?>
                    <div class="container-fluid">
                        </div>
                            <div class="container-fluid">
                            <!-- Content Row -->
                            <h1 class="h3 mb-0 text-gray-800">Chart</h1><br>
                            <!-- ./Content Row -->
                            <!-- data here --->
                        <div class="col-xl-4 col-lg-5">
                    <div class="card shadow mb-4">
                <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Donut Chart</h6>
        </div>
    <div class="card-body">
<div class="pieChart pt-4">
<!-- <div id="donut-chart"></div> -->
    <div id="pieChart">
        </div>
            </div>
              <hr>
                </div>
                    </div>
                 </div>
            </div>
<!-- 
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Donut Chart</h6>
                                </div>
                                <div class="card-body">
                                    <div class="chart-pie pt-4">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                        </div>
              
 -->
                <!--./data here -->
        </div>
            <div>
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
    <!-- chart js -->
     <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2.0/dist/js/adminlte.min.js"></script>
    <!-- Flot Charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flot/0.8.3/jquery.flot.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flot/0.8.3/jquery.flot.pie.min.js"></script>
    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <script src="js/demo/chart-bar-demo.js"></script>
  <!-- Page specific script -->
<script>
$(function () {
  var colors = ['#FF5733', '#33FF57', '#3357FF', '#FF33A1', '#FFC300']; // Define your colors

  function fetchChartData() {
    $.ajax({
      url: 'chart_data.php', // Path to the PHP script that fetches data
      method: 'GET',
      dataType: 'json',
      success: function(data) {
        var donutData = [];
        
        // Process data received from PHP
        $.each(data, function(index, item) {
          donutData.push({
            label: item.category,
            data: parseFloat(item.sub_category),
            color: colors[index % colors.length] // Use predefined colors
          });
        });

        $.plot('#pieChart', donutData, {
          series: {
            pie: {
              show: true,
              radius: 1,
              innerRadius: 0.5,
              label: {
                show: true,
                radius: 2 / 3,
                formatter: labelFormatter,
                threshold: 0.1
              }
            }
          },
          legend: {
            show: false
          }
        });
      },
      error: function() {
        console.error('Failed to fetch chart data.');
      }
    });
  }
  fetchChartData();
  function labelFormatter(label, series) {
    return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
      + label
      + '<br>'
      + Math.round(series.percent) + '%</div>';
  }
});
</script>
<!--./chart js-->   
</body>
</html>