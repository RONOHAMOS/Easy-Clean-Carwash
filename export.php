<?php
//include database configuration file
include 'pserver.php';
// Database connecten voor alle services
mysql_connect ($hostname, $user, $password)
or die ( 'Could not connect: ' . mysql_error ());
mysql_select_db ($database)
or die ( 'Could not select database ' . mysql_error ());

//get records from database
$sql = $dbname->msqli_query('SELECT * FROM client');

if($sql->num_rows > 0){
    $delimiter = ",";
    $filename = "proj" . date('Y-m-d') . ".csv";
    
    //create a file pointer
    $f = fopen('php://memory', 'w');
    
    //set column headers
    $fields = array('Id', 'Client Name','Phone Number', 'Vehicle Type', 'Service Requested', 'Cost of Service', 'Officer Incharge');
    fputcsv($f, $fields, $delimiter);
    
    //output each row of the data, format line as csv and write to file pointer
    while($row = $sql->fetch_assoc()){
        $status = ($row['status'] == '1')?'Active':'Inactive';
        $lineData = array($row['id'], $row['Client Name'], $row['Phone Number'], $row['Vehicle Type'], $row['Service Requested'],$row['Cost of Service'], $row['Officer Incharge']);
        fputcsv($f, $lineData, $delimiter);
    }
    
    //move back to beginning of file
    fseek($f, 0);
    
    //set headers to download file rather than displayed
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="proj' . $filename . '";');
    
    //output all remaining data on a file pointer
    fpassthru($f);
}
exit;

?>
