<?php
include_once 'connection.php';


$output=array();
$select="SELECT * FROM tripdonetable";

$result=mysqli_query($conn,$select);

    while($row=mysqli_fetch_assoc($result))
    {
        $output[]=array(
        "cust_name"=>$row['cust_name'],
        "areaID"=>$row['areaID'],
        "container_retrieve"=>$row['container_retrieve'],
        "container_placed"=>$row['container_placed'],
        "collection_time"=>$row['collection_time'],
        "collection_type"=>$row['collection_type'],
        "waste_type"=>$row['waste_type'],
        "tripID"=>$row['tripID'],
        "customer_sign"=>$row['customer_sign'],
        "ship_date"=>$row['ship_date'],
        "return_date"=>$row['return_date'],
        "driverID"=>$row['driverID'],
        "image"=>$row['image'],
        "instruction"=>$row['instruction'],
        "truckID"=>$row['truckID'],
        "salesOrderNo"=>$row['salesOrderNo'],
        "address"=>$row['address'],
        "p_receive"=>$row['p_receive'],
		 "dump_driver"=>$row['dump_driver']
    );
    }
echo json_encode($output,JSON_NUMERIC_CHECK);
exit;
?>