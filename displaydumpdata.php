<?php
include_once 'connection.php';


$output=array();
$select="SELECT * FROM dumptable";

$result=mysqli_query($conn,$select);

    while($row=mysqli_fetch_assoc($result))
    {
        $output[]=array(
        "serialNo"=>$row['serialNo'],
        "tonnage"=>$row['tonnage'],
        "cust_name"=>$row['cust_name'],
        "date"=>$row['date']
    );
    }
echo json_encode($output,JSON_NUMERIC_CHECK);
exit;
?>