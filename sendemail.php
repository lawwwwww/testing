<?php
//https://docs.microsoft.com/en-us/previous-versions/aspnet/8b83ac7t(v=vs.100)?redirectedfrom=MSDN


include_once 'connection.php';

//$json = file_get_contents("php://input");
//$obj = json_decode($json,true);

//$tid=$_POST['tid'];
//get data
//$email = $_POST['email'];
$tid=1;
$email='lawqiue@gmail.com';

/*
//insert data
$sql = "Select * from triptable where tripID='".$tid."'";
$wholetrip=mysqli_query($conn,$sql);

while($row=mysqli_fetch_array($wholetrip)){
	$cust_name=$row['cust_name'];
	$areaid=$row['areaID'];
	$cr=$row['container_retrieve'];
	$cp=$row['container_placed'];
	$ct=$row['collection_time'];
	$ctype=$row['collection_type'];
	$wt=$row['waste_type'];
	$shipdate=$row['ship_date'];
	$returndate=$row['return_date'];
	$did=$row['driverID'];
	$aid=$row['adminID'];
	$tripstatus=$row['trip_status'];
	$truckid=$row['truckID'];
	$sos=$row['salesOrderNo'];
	$addr=$row['address'];
	$container_size=$row['container_size'];
}
*/


$to = $email;
$subject = "Trip Done";
$txt="Trip Done";
//$txt = "Customer Name:"+$cust_name+"\nArea ID:"+$areaid+"\nContainer Retrieve:"+$cr+"\nContainer Placed:"+$cp+"\nCollection Time:"+$ct+"\nCollection Type:"+$ctype+"\nWaste Type:"+$wt+"\nShip Date:"+$shipdate+"\nReturn Date:"+$returndate+"\nDriver ID:"+$did+"\nAdmin ID:"+$aid+"\nTrip Status:"+"Done"+"\nTruck ID:"+$truckid+"\nSales Order No:"+$sos+"\nAddress:"+$addr+"\nContainer Size:"+$container_size;

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: 101213388@students.swinburne.edu.my' . "\r\n";
$headers .= 'Cc: myboss@example.com' . "\r\n";

ini_set('SMTP', "smtp.gmail.com");
ini_set('username',"lqe1218@gmail.com");
ini_set('password',"991218015564");
ini_set('smtp_port', "587");
ini_set('tls','yes');
//ini_set('from', "101213388@students.swinburne.edu.my");

mail($to,$subject,$txt,$headers);



/*
//check connection
if ($conn->query($sql) === TRUE) {
  echo "Update successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
*/


?>