<?php

include_once 'connection.php';

$json = file_get_contents("php://input");
$obj = json_decode($json,true);

$test=$obj['test'];
//get data
$serialNo = $obj['serialNo'];
//$serialNo='blublu';
$longitude = $obj['longitude'];
$latitude = $obj['latitude'];
$tid=$obj['tid'];
$pos=$obj['pos'];



$seltrip="SELECT * FROM triptable where tripID='".$tid."'";
$resulttttt=mysqli_query($conn,$seltrip);

if(mysqli_num_rows($resulttttt)>0)
{
	while($row=mysqli_fetch_array($resulttttt))
	{
		$rere=$row["cust_name"];
	}
}


$seldate="SELECT * FROM triptable where tripID='".$tid."'";
$ret=mysqli_query($conn,$seldate);

if(mysqli_num_rows($ret)>0)
{
	while($row=mysqli_fetch_array($ret))
	{
		$renew=$row["ship_date"];
		$r=$row["collection_time"];
	}
}

date_default_timezone_set("Asia/Kuala_Lumpur");
$today=date("Y-m-d H:i:s");
$date=date("Y-m-d");	
$time=date('H:i:s');



	//$ru=$renew.' '.$r;

	
	
	//used to check if the scanned data is exist in db or not
	
$sqlcheckscan="SELECT * FROM rorotable where serialNo='".$serialNo."'";
$resultscan=mysqli_query($conn,$sqlcheckscan);

if($resultscan->num_rows>0)
{
	echo "successful";
	
	
	//only proceed these action when the data is already in db
	
if($pos==1){
	$sql = "UPDATE rorotable set longitude='".$longitude."', latitude='".$latitude."' WHERE serialNo='".$serialNo."'";
	mysqli_query($conn,$sql);

	$yy="UPDATE triptable set return_date='".$date."',collection_time='".$time."',container_retrieve='".$test."' where tripID='".$tid."'";
	mysqli_query($conn,$yy);
	
	
	
}

else if($pos==2)  //send
{
	$sql = "UPDATE rorotable set longitude='".$longitude."', latitude='".$latitude."' WHERE serialNo='".$serialNo."'";
	mysqli_query($conn,$sql);

	$yy="UPDATE triptable set ship_date='".$date."',container_placed='".$test."' where tripID='".$tid."'";
	mysqli_query($conn,$yy);
	

	
	$ins="INSERT INTO roroservice (serialNo,customername,shipdate,longtitude,latitude)values('$serialNo','$rere','$today','$longitude','$latitude')";
	mysqli_query($conn,$ins);
	
	
}



else if($pos==0)  //buang homepage
{
	$sql = "UPDATE rorotable set longitude='".$longitude."', latitude='".$latitude."' WHERE serialNo='".$serialNo."'";
	mysqli_query($conn,$sql);
	
	//$yy="UPDATE triptable set container_retrieve='".$test."',container_placed='".$test."' where tripID='".$tid."'";
	//mysqli_query($conn,$yy);
}

else if($pos==3)  //buang trip
{
	$sql = "UPDATE rorotable set longitude='".$longitude."', latitude='".$latitude."' WHERE serialNo='".$serialNo."'";
	mysqli_query($conn,$sql);
	
	$yy="UPDATE triptable set container_retrieve='".$test."',container_placed='".$test."' where tripID='".$tid."'";
	mysqli_query($conn,$yy);
	
	
}
}
	
	
	
	
else
{
	echo "error";
}



	
	
	
	
	//insert data

/*
//check connection
if ($conn->query($sql) === TRUE) {
  echo "Update successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
*/


?>