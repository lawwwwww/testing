<?php

include_once 'connection.php';

$json = file_get_contents("php://input");
$obj = json_decode($json,true);



$weight=$obj['weight'];
//get data
$name = $obj['name'];
//$serialNo='blublu';
$test = $obj['test'];

//$date=$obj['date'];

date_default_timezone_set("Asia/Kuala_Lumpur");
	
	//date
$date=date("Y-m-d");

//insert data
$sql = "INSERT INTO dumptable(serialNo,tonnage,cust_name,date) values ('$test','$weight','$name','$date')";
//mysqli_query($conn,$sql);


//check connection
if ($conn->query($sql) === TRUE) {
  echo "Update successfully";
} else {
  echo "Error";
}



?>