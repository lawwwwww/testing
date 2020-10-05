<?php

include_once 'connection.php';

$json = file_get_contents("php://input");
$obj = json_decode($json,true);

$weight=$obj['weight'];
//get data
//$name = $obj['name'];
//$serialNo='blublu';
$test = $obj['test'];

date_default_timezone_set("Asia/Kuala_Lumpur");
$date=date("Y-m-d");



$tid=$obj['tid'];




$seltrip="SELECT * FROM triptable where tripID='".$tid."'";
$resulttttt=mysqli_query($conn,$seltrip);

if(mysqli_num_rows($resulttttt)>0)
{
	while($row=mysqli_fetch_array($resulttttt))
	{
		$rere=$row["cust_name"];
		//insert data
		
		$sql = "INSERT INTO dumptable(serialNo,tonnage,cust_name,date) values ('$test','$weight','$rere','$date')";
		mysqli_query($conn,$sql);

	}
}

$tri="UPDATE triptable set return_date='".$date."',trip_status='Done' where tripID='".$tid."'";
mysqli_query($conn,$tri);


$in="INSERT INTO tripdonetable(cust_name,areaID,collection_time,collection_type,ship_date,invoice_date,driverID,container_placed,container_retrieve,tripID,image,instruction,truckID,salesOrderNo,address,p_receive,return_date)(SELECT cust_name,areaID,collection_time,collection_type,ship_date,return_date,driverID,container_placed,container_retrieve,tripID,image,instruction,truckID,salesOrderNo,address,p_receive,return_date FROM triptable where tripID='".$tid."')";

if(mysqli_query($conn,$in))
	{
		$de="DELETE FROM triptable where tripID='".$tid."'";
		
		if($conn->query($de)===TRUE)
		{
			echo "successful";
		}
		else{
			echo "error";
		}
	}
	



/*
//check connection
if ($conn->query($sql) === TRUE) {
  echo "Update successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
*/


?>