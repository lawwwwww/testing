<?php
include_once 'connection.php';

$in="INSERT INTO tripdonetable(cust_name,areaID,collection_time,collection_type,ship_date,invoice_date,driverID,container_placed,container_retrieve,tripID,image,instruction,truckID,salesOrderNo,address,p_receive)(SELECT cust_name,areaID,collection_time,collection_type,ship_date,return_date,driverID,container_placed,container_retrieve,tripID,image,instruction,truckID,salesOrderNo,address,p_receive FROM triptable where tripID=13)";

if($conn->query($in))
{
	echo "su";

}

else
{
	 echo "Error: " . $in . "<br>" . $conn->error;
}
?>