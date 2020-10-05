<?php
	session_start();
	
	include_once 'connection.php';
	
	date_default_timezone_set("Asia/Kuala_Lumpur");
	$date=date("Y-m-d");
	
	
	
	//use after client provide us more data
	//$sql="SELECT * FROM triptable where driverID='".$_SESSION['driverid']."' AND ship_date='".$date."'";
	
	
	$sql="SELECT * FROM incompletetrip where dump_driver='".$_SESSION['driverid']."'";
	
	
	$lu=$conn->query($sql);
	
	if($lu->num_rows>0)
	{
		while($row[]=$lu->fetch_assoc())
		{
			$item=$row;
			$json=json_encode($item);
		}
	}
	else
	{
		$item=null;
		$json=json_encode($item);
	}
	echo $json;
	


?>