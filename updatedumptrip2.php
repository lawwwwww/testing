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
$today=date("Y-m-d H:i:s");


$tid=$obj['tid'];


$extracting = mysqli_query($conn,"SELECT serialNo FROM roroservice WHERE serialNo='$test' AND returndate IS NULL");
	
	
		{
			if($extracting->num_rows>0){
				//$today = date("Y-m-d H:i:s");
				$query = mysqli_query($conn,"UPDATE roroservice set returndate='".$today."',status='done' where serialNo='$test' AND returndate IS NULL");
			}
			
			//else can delete!!!!!!!
			else{
				//Message No data
				//$today = date("Y-m-d H:i:s");
				
				$qqq="Insert into roroservice (serialNo,customername,returndate,longtitude,latitude) values ('$test','testing','$today','$longitude','$latitude')";
				mysqli_query($conn,$qqq);
				
			}
		}
		

$seltrip="SELECT * FROM incompletetrip where tripID='".$tid."'";
$resulttttt=mysqli_query($conn,$seltrip);

if(mysqli_num_rows($resulttttt)>0)
{
	while($row=mysqli_fetch_array($resulttttt))
	{
		$rere=$row["cust_name"];
		//insert data
$sql = "INSERT INTO dumptable(serialNo,tonnage,cust_name,date) values ('$test','$weight','$rere','$date')";
if ($conn->query($sql) === TRUE) {
  echo "Update successfully";
} else {
  echo "Error";
}
	}
}


 


$tri="UPDATE incompletetrip set return_date='".$date."' where tripID='".$tid."'";
mysqli_query($conn,$tri);


$in="INSERT INTO tripdonetable(invoice_date,driverID,tripID,cust_name,areaID,container_retrieve,container_placed,collection_time,collection_type,customer_sign,ship_date,return_date,image,instruction,truckID,salesOrderNo,address,p_receive,dump_driver)(SELECT invoice_date,driverID,tripID,cust_name,areaID,container_retrieve,container_placed,collection_time,collection_type,customer_sign,ship_date,return_date,image,instruction,truckID,salesOrderNo,address,p_receive,dump_driver FROM incompletetrip where tripID='".$tid."')";

if(mysqli_query($conn,$in))
	{
		$de="DELETE FROM incompletetrip where tripID='".$tid."'";
		mysqli_query($conn,$de);
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