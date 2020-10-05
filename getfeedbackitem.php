<?php
	session_start();

	include_once 'connection.php';


	//put condition 
	//where driverid=....
	//$t=$_SESSION['driverid'];
	
	date_default_timezone_set("Asia/Kuala_Lumpur");
	$date=date("Y-m-d");

	
	
	//$sql="SELECT * FROM triptable where driverID='".$_SESSION['driverid']."' AND ship_date='".$date."'  ";
	
	$sql="SELECT * FROM triptable where driverID='".$_SESSION['driverid']."'";
	
	$rere=$conn->query($sql);
	
	if($rere->num_rows>0)
	{
		while($row[]=$rere->fetch_assoc())
		{
			
			$item=$row;
			$json=json_encode($item);
		}
	}
	else
	{
		
		$item=[];
		$json=json_encode($item);
	}
	echo $json;
	$conn->close();
	
?>