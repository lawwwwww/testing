<?php
include_once 'connection.php';


$output=array();
$select="SELECT * FROM trucktable";

$result=mysqli_query($conn,$select);

    while($row=mysqli_fetch_assoc($result))
    {
        $output[]=array(
        "truckID"=>$row['truckID'],
        "status"=>$row['status']
    );
    }
echo json_encode($output,JSON_NUMERIC_CHECK);
exit;
?>