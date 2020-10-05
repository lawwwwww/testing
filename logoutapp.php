<?php
		//$_SESSION['driverid']=3;
	session_start();
	session_unset();
	session_destroy();

	//echo $_SESSION['driverid'];
	//include_once 'connection.php';

	//$uu="INSERT INTO roroservice(serialNo,customername,shipdate,longtitude,latitude,status) values('blublu','fe','2020-06-05 05:09:00','10.00','12.1','done')";
	//mysqli_query($conn,$uu);
?>