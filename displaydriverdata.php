<?php
include_once 'connection.php';


$output=array();
$select="SELECT * FROM drivertable";

$result=mysqli_query($conn,$select);

    while($row=mysqli_fetch_assoc($result))
    {
        $output[]=array(
        "driverID"=>$row['driverID'],
        "username"=>$row['username']
    );
    }
echo json_encode($output,JSON_NUMERIC_CHECK);
exit;
?>