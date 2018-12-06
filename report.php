
<!DOCTYPE html>
 
<html lang="en">
 
<head>
 
<meta charset="utf-8">
 
<meta http-equiv="X-UA-Compatible" content="IE=edge">
 
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
<meta name="description" content="">
 
<meta name="author" content="">
 
<title>Easy Clean Carwash Report</title>
 
<!-- Bootstrap core CSS-->
 
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
 
<!-- Custom fonts for this template-->
 
<link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
 
<!-- Page level plugin CSS-->
 
<link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
 
<!-- Custom styles for this template-->
 
<link href="css/sb-admin.css" rel="stylesheet">
 
</head>
 
<body class="fixed-nav sticky-footer bg-dark" id="page-top">

<?php
include 'db.php'; //connect the connection page

if(empty($_SESSION)) // if the session not yet started 
   session_start();

if(!isset($_SESSION['username'])) { //if not yet logged in
   header("Location: login.php");// send to login page
   exit;
} 
?>

<?php
 
include('iserver.php');
 
?>

 
<!-- Navigation-->
 
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
 
<a class="navbar-brand" href="index.php">Easy Clean CarWash <strong>Report</strong></a>
 
<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
 
<span class="navbar-toggler-icon"></span>
 
</button>
 
</ul>
 
<ul class="navbar-nav sidenav-toggler">
 
<li class="nav-item">
 
<a class="nav-link text-center" id="sidenavToggler">
 
<i class="fa fa-fw fa-angle-left"></i>
 
</a>
 
</li>
 
</ul>
 
<ul class="navbar-nav ml-auto">
 
<li class="nav-item dropdown">
 
<a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
 
<i class="fa fa-fw fa-envelope"></i>
 
<span class="d-lg-none">Messages
 
<span class="badge badge-pill badge-primary">12 New</span>
 
</span>
 
<span class="indicator text-primary d-none d-lg-block">
 
<i class="fa fa-fw fa-circle"></i>
 
</span>
 
</a>
 
<div class="dropdown-menu" aria-labelledby="messagesDropdown">
 
<h6 class="dropdown-header">New Messages:</h6>
 
<div class="dropdown-divider"></div>
 
<a class="dropdown-item" href="#">
 
<strong>David Miller</strong>
 
<span class="small float-right text-muted">11:21 AM</span>
 
<div class="dropdown-message small">Hey there! This new version of SB Admin is pretty awesome! These messages clip off when they reach the end of the box so they don't overflow over to the sides!</div>
 
</a>
 
<div class="dropdown-divider"></div>
 
<a class="dropdown-item" href="#">
 
<strong>Jane Smith</strong>
 
<span class="small float-right text-muted">11:21 AM</span>
 
<div class="dropdown-message small">I was wondering if you could meet for an appointment at 3:00 instead of 4:00. Thanks!</div>
 
</a>
 
<div class="dropdown-divider"></div>
 
<a class="dropdown-item" href="#">
 
<strong>John Doe</strong>
 
<span class="small float-right text-muted">11:21 AM</span>
 
<div class="dropdown-message small">I've sent the final files over to you for review. When you're able to sign off of them let me know and we can discuss distribution.</div>
 
</a>
 
<div class="dropdown-divider"></div>
 
<a class="dropdown-item small" href="#">View all messages</a>
 
</div>
 
</li>
 
<li class="nav-item dropdown">
 
<a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
 
<i class="fa fa-fw fa-bell"></i>
 
<span class="d-lg-none">Alerts
 
<span class="badge badge-pill badge-warning">6 New</span>
 
</span>
 
<span class="indicator text-warning d-none d-lg-block">
 
<i class="fa fa-fw fa-circle"></i>
 
</span>
 
</a>
 
<div class="dropdown-menu" aria-labelledby="alertsDropdown">
 
<h6 class="dropdown-header">New Alerts:</h6>
 
<div class="dropdown-divider"></div>
 
<a class="dropdown-item" href="#">
 
<span class="text-success">
 
<strong>
 
<i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
 
</span>
 
<span class="small float-right text-muted">11:21 AM</span>
 
<div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
 
</a>
 
<div class="dropdown-divider"></div>
 
<a class="dropdown-item" href="#">
 
<span class="text-danger">
 
<strong>
 
<i class="fa fa-long-arrow-down fa-fw"></i>Status Update</strong>
 
</span>
 
<span class="small float-right text-muted">11:21 AM</span>
 
<div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
 
</a>
 
<div class="dropdown-divider"></div>
 
<a class="dropdown-item" href="#">
 
<span class="text-success">
 
<strong>
 
<i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
 
</span>
 
<span class="small float-right text-muted">09:23 PM</span>
 
<div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
 
</a>
 
<div class="dropdown-divider"></div>
 
<a class="dropdown-item small" href="#">View all alerts</a>
 
</div>
 
</li>
 
<li class="nav-item">
 
<form class="form-inline my-2 my-lg-0 mr-lg-2">
 
<div class="input-group">
 
<input class="form-control" type="text" placeholder="Search for...">
 
<span class="input-group-append">
 
<button class="btn btn-primary" type="button">
 
<i class="fa fa-search"></i>
 
</button>
 
</span>
 
</div>
 
</form>
 
</li>
 
<li class="nav-item">
 
<a class="nav-link" data-toggle="modal" data-target="#exampleModal">
 
<i class="fa fa-fw fa-sign-out"></i>Logout</a>
 
</li>
 
</ul>
 
</div>
 
</nav>
 
<div class="content-wrapper">
 
<div class="container-fluid">
 
<!-- Breadcrumbs-->
 
<ol class="breadcrumb">
 
<li class="breadcrumb-item">
 
<a href="#">Dashboard</a>
 
</li>
 
<li class="breadcrumb-item active">My Dashboard</li>
 
</ol>
 
<!-- Icon Cards-->
 
<?php
 
$servername = "localhost";
 
$username = "root";
 
$password = "";
 
$dbname = "carwashmgt";
 
// Create connection
 
$conn = new mysqli($servername, $username, $password, $dbname);
 
$sqll = "SELECT  * from sales_stats WHERE month='december' ";
 
if (mysqli_query($conn, $sqll))
 
{
 
echo "";
 
}
 
else
 
{
 
echo "Error: " . $sqll . "<br>" . mysqli_error($conn);
 
}
 
$result = mysqli_query($conn, $sqll);
 
if (mysqli_num_rows($result) > 0)
 
{
 
// output data of each row
 
while($row = mysqli_fetch_assoc($result))
 
{
 
?>
 
 

 
<?php
 
}
 
}
 
else
 
{
 
echo '0 results';
 
}
 
?>
 
 
<?php
 
$servername = "localhost";
 
$username = "root";
 
$password = "";
 
$dbname = "carwashmgt";
 
// Create connection
 
$conn = new mysqli($servername, $username, $password, $dbname);
 
$sqlll = "SELECT sales from sales_stats";
 
if (mysqli_query($conn, $sqlll))
 
{
 
echo "";
 
}
 
else
 
{
 
echo "Error: " . $sqlll . "<br>" . mysqli_error($conn);
 
}
 
$result = mysqli_query($conn, $sqlll);
 
$number=array();
 
if (mysqli_num_rows($result) > 0)
 
{
 
// output data of each row
 
while($row = mysqli_fetch_assoc($result))
 
{
 
$number[]=$row['sales'];
 
}
 
}
 
else
 
{
 
echo "0 results";
 
}
 
$number_formated= "[".implode(",",$number)."]";
 
?>
 
<script type="text/javascript">
 
window.dataf= <?php echo $number_formated; ?>
 
</script>
 
<!-- Area Chart Example-->
 
<!--<div class="card mb-3">
 
<div class="card-header">
 
<i class="fa fa-area-chart"></i> Sales Chart</div>
 
<div class="card-body">
 
<canvas id="myAreaChart" width="100%" height="30"></canvas>
 
</div>
 
</div> -->
 
<!-- Example DataTables Card-->
 
<div class="card mb-3">
 
<div class="card-header">
 
<i class="fa fa-table"></i> Clients Report</div>
 
<div class="card-body">
 
<div class="table-responsive">
 
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
 
<thead>
 
<tr>
 
<th>ID</th>
<th>Client Name</th>
    <th>Phone Number</th>
    <th>Vehicle Type</th>
    <th>Service Requested</th>
    <th>Cost of Service</th>
    <th>Officer Incharge</th>
</tr>
 
</thead>
 
<tfoot>
 
<tr>
 
<th>ID</th>
 
<th>Client Name</th>
    <th>Phone Number</th>
    <th>Vehicle Type</th>
    <th>Service Requested</th>
    <th>Cost of Service</th>
    <th>Officer Incharge</th>
</tr>
 
</tfoot>
 
<?php
 
$servername = "localhost";
 
$username = "root";
 
$password = "";
 
$dbname = "carwashmgt";
 
// Create connection
 
$conn = new mysqli($servername, $username, $password, $dbname);
 
$sql = 'SELECT * from client';
 
if (mysqli_query($conn, $sql)) {
 
echo "";
 
} else {
 
echo "Error: " . $sql . "<br>" . mysqli_error($conn);
 
}
 
$count=1;
 
$result = mysqli_query($conn, $sql);
 
if (mysqli_num_rows($result) > 0) {
 
// output data of each row
 
while($row = mysqli_fetch_assoc($result)) { ?>
 
<tbody>
 
<tr>
 
<th>
 
<?php echo $row['id']; ?>
 
</th>
 
<td>
 
<?php echo $row['client_name']; ?>
 
</td>
 
<td>
 
<?php echo $row['phone_number']; ?>
 
</td>
 
<td>
 
<?php echo $row['vehicle_type']; ?>
 
</td>
 
<td>
 
<?php echo $row['service_type']; ?>
 
</td>

<td>
 
<?php echo $row['service_cost']; ?>
 
</td>

<td>
 
<?php echo $row['officer_incharge']; ?>
 
</td>
 
</tr>
 
</tbody>
 
<?php
 
$count++;
 
}
 
} else {
 
echo '0 results';
 
}
 
?>
 
</table>
 
</div>
 
</div>
 
<div class="panel-heading">
     
  <a href="export.php" class="btn btn-success pull-right">Download</a>
</div>
 
</div>
 
</div>

<!-- Example DataTables Card-->
 
<!-- /.container-fluid-->
 
<!-- /.content-wrapper-->
 
<!-- Scroll to Top Button-->
 
<a class="scroll-to-top rounded" href="#page-top">
 
<i class="fa fa-angle-up"></i>
 
</a>
 
<!-- Logout Modal-->
 
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 
<div class="modal-dialog" role="document">
 
<div class="modal-content">
 
<div class="modal-header">
 
<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
 
<button class="close" type="button" data-dismiss="modal" aria-label="Close">
 
<span aria-hidden="true">×</span>
 
</button>
 
</div>
 
<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
 
<div class="modal-footer">
 
<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
 
<a class="btn btn-primary" href="login.php">Logout</a>
 
</div>
 
</div>
 
</div>
 
</div>
 
<!-- Bootstrap core JavaScript-->
 
<script src="vendor/jquery/jquery.min.js"></script>
 
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 
<!-- Core plugin JavaScript-->
 
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
 
<!-- Page level plugin JavaScript-->
 
<script src="vendor/chart.js/Chart.min.js"></script>
 
<script src="vendor/datatables/jquery.dataTables.js"></script>
 
<script src="vendor/datatables/dataTables.bootstrap4.js"></script>
 
<!-- Custom scripts for all pages-->
 
<script src="js/sb-admin.min.js"></script>
 
<!-- Custom scripts for this page-->
 
<script src="js/sb-admin-datatables.min.js"></script>
 
<script src="js/sb-admin-charts.min.js"></script>
 
</div>
 
</body>
 
</html>
