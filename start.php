<?php
	
	include_once 'connection.php';
	
	
	
	
	$tid=$_POST['tid'];
	
	//time
	date_default_timezone_set("Asia/Kuala_Lumpur");
	
	//date
	$date=date("Y-m-d");
	
	$time=date('H:i');

	
	
	//start
		$sql="UPDATE triptable set trip_status='On going' where tripID='".$tid."'";
	
		mysqli_query($conn,$sql);

	



	
?>