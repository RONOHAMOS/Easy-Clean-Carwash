<?php
 
$servername = "localhost";
 
$username = "root";
 
$password = "";
 
$dbname = "carwashmgt";
 
// Create connection
 
$conn = new mysqli($servername, $username, $password, $dbname);
 
if (isset($_POST['reg_p'])) {
 
// receive all input values from the form
 
$ename = mysqli_real_escape_string($conn,$_POST['ename']);
$pnumber = mysqli_real_escape_string($conn,$_POST['pnumber']);
$ltype = mysqli_real_escape_string($conn,$_POST['ltype']);
$lapproval = mysqli_real_escape_string($conn,$_POST['lapproval']);
$sdate = mysqli_real_escape_string($conn,$_POST['sdate']);
$rdate = mysqli_real_escape_string($conn,$_POST['rdate']);
$duration = mysqli_real_escape_string($conn,$_POST['duration']);
 
// Check connection
 
if ($conn->connect_error) {
 
die("Connection failed: " . $conn->connect_error);
 
}
 
$sql = "INSERT INTO leaveapproval (employee_name,phone_number,leave_type,leave_approval,starting_date,reporting_date,duration)
 
VALUES ('$ename', '$pnumber','$ltype','$lapproval','$sdate', '$rdate','$duration',)";
 
if ($conn->query($sql) === TRUE) {
 
echo "alert('New record created successfully')";
 
} else {
 
echo "Error: " . $sql . "<br>" . $conn->error;
 
}
 
}
 
$conn->close();
 
?>
 