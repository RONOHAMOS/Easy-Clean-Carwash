
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
 
$servername = "localhost";
 
$username = "root";
 
$password = "";
 
$dbname = "carwashmgt";
 
// Create connection
 
$conn = new mysqli($servername, $username, $password, $dbname);
 
if (isset($_POST['reg_p'])) {
 
// receive all input values from the form
 
$cname = mysqli_real_escape_string($conn,$_POST['cname']);
 
$pnumber = mysqli_real_escape_string($conn,$_POST['pnumber']);
 
$vtype = mysqli_real_escape_string($conn,$_POST['vtype']);
 
$stype = mysqli_real_escape_string($conn,$_POST['stype']);
$scost = mysqli_real_escape_string($conn,$_POST['scost']);
$oincharge = mysqli_real_escape_string($conn,$_POST['oincharge']);
 
// Check connection
 
if ($conn->connect_error) {
 
die("Connection failed: " . $conn->connect_error);
 
}
 
$sql = "INSERT INTO client (client_name,phone_number,vehicle_type,service_type,service_cost,officer_incharge)
 
VALUES ('$cname', '$pnumber', '$vtype','$stype', '$scost','$oincharge')";
 
if ($conn->query($sql) === TRUE) {
 
echo "alert('New record created successfully')";
 
} else {
 
echo "Error: " . $sql . "<br>" . $conn->error;
 
}
 
}
 
$conn->close();
 
?>
 