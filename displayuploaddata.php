<?php
include_once 'connection.php';


$output=array();
$select="SELECT * FROM uploadedtable";

$result=mysqli_query($conn,$select);

    while($row=mysqli_fetch_assoc($result))
    {
        $output[]=array(
        "cust_name"=>$row['cust_name'],
        "areaID"=>$row['areaID'],
        "container_retrieve"=>$row['container_retrieve'],
        "container_placed"=>$row['container_placed'],
        "collection_type"=>$row['collection_type'],
        "ship_date"=>$row['ship_date'],
        "driverID"=>$row['driverID'],
        "truckID"=>$row['truckID'],
        "adminID"=>$row['adminID'],
        "salesOrderNo"=>$row['salesOrderNo'],
        "address"=>$row['address'],
        "container_size"=>$row['container_size']
    );
    }
echo json_encode($output,JSON_NUMERIC_CHECK);
exit;
?>