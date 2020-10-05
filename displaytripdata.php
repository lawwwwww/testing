<?php
include_once 'connection.php';


$output=array();
$select="SELECT t.cust_name,t.areaID,t.container_retrieve,t.container_placed,t.collection_time,t.collection_type,t.waste_type,t.tripID,t.customer_sign,t.ship_date,t.return_date,t.driverID,t.adminID,t.assign_status,t.trip_status,t.image,t.instruction,t.truckID,t.salesOrderNo,t.address,t.container_size,t.p_receive,d.username FROM triptable t inner join drivertable d on t.driverID=d.driverID";

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
        "adminID"=>$row['adminID'],
        "assign_status"=>$row['assign_status'],
        "trip_status"=>$row['trip_status'],
        "image"=>$row['image'],
        "instruction"=>$row['instruction'],
        "truckID"=>$row['truckID'],
        "salesOrderNo"=>$row['salesOrderNo'],
        "address"=>$row['address'],
        "container_size"=>$row['container_size'],
		"p_receive"=>$row['p_receive'],
		"username"=>$row['username']
    );
    }
echo json_encode($output,JSON_NUMERIC_CHECK);
exit;
?>