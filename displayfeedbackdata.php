<?php
include_once 'connection.php';


$output=array();
$select="SELECT f.tripID,f.driverID,f.image,f.description,f.video,f.no, d.username FROM feedbacktable f inner join drivertable d on f.driverID=d.driverID";

$result=mysqli_query($conn,$select);

    while($row=mysqli_fetch_assoc($result))
    {
        $output[]=array(
        "tripID"=>$row['tripID'],
        "username"=>$row['username'],
        "image"=>$row['image'],
        "description"=>$row['description'],
        "video"=>$row['video'],
		"no"=>$row['no']
    );
    }
echo json_encode($output,JSON_NUMERIC_CHECK);
exit;
?>