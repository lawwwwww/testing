<?php 
session_start();
	
include 'connection.php';
 
 // Getting the received JSON into $json variable.
 $json = file_get_contents('php://input');
 
 // decoding the received JSON and store into $obj variable.
 $obj = json_decode($json,true);
 
// Populate driverID from JSON $obj array and store into $driverid.
$driverID = $obj['driverID'];

//Applying User Login query with driverID match.
$Sql_Query = "select * from drivertable where driverID = '$driverID'";

// Executing SQL Query.
$check = mysqli_fetch_array(mysqli_query($conn,$Sql_Query));

if(isset($check)){
    $SuccessLoginMsg = 'ok';
 
     // Converting the message into JSON format.
    $SuccessLoginJson = json_encode($SuccessLoginMsg);

    // Echo the message.
     echo $SuccessLoginJson ; 
	 	
	$_SESSION['driverid']=$driverID;
}
else{
     // If the record inserted successfully then show the message.
    $InvalidMSG = 'Salah ID, cuba lagi!' ;

    // Converting the message into JSON format.
    $InvalidMSGJSon = json_encode($InvalidMSG);

    // Echo the message.
     echo $InvalidMSGJSon ;
}

?>