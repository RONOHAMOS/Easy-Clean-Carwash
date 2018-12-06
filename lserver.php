<?php
 
$servername = "localhost";
 
$username = "root";
 
$password = "";
 
$dbname = "carwashmgt";
 
// Create connection
 
$conn = new mysqli($servername, $username, $password, $dbname);
 
if (isset($_POST['reg_p'])) {
 
// receive all input values from the form
 
$sname = mysqli_real_escape_string($conn,$_POST['sname']);
 
$pnumber = mysqli_real_escape_string($conn,$_POST['pnumber']);
 
$ltype = mysqli_real_escape_string($conn,$_POST['ltype']);
 
$sdate = mysqli_real_escape_string($conn,$_POST['sdate']);
$rdate = mysqli_real_escape_string($conn,$_POST['rdate']);
$duration = mysqli_real_escape_string($conn,$_POST['duration']);
 
// Check connection
 
if ($conn->connect_error) {
 
die("Connection failed: " . $conn->connect_error);
 
}
 
$sql = "INSERT INTO leaveapp (staff_name,phone_number,leave_type,start_date,report_date,duration)
 
VALUES ('$sname', '$pnumber', '$ltype','$sdate', '$rdate','$duration')";
 
if ($conn->query($sql) === TRUE) {
 
echo "alert('New record created successfully')";
 
} else {
 
echo "Error: " . $sql . "<br>" . $conn->error;
 
}
 
}
 
$conn->close();
 
?>
 