<?php
include_once 'connection.php';


$output=array();
$select="SELECT * FROM rorotable";

$result=mysqli_query($conn,$select);

    while($row=mysqli_fetch_assoc($result))
    {
        $output[]=array(
        "rorogroup"=>$row['rorogroup'],
        "size"=>$row['size'],
        "serialNo"=>$row['serialNo'],
        "productID"=>$row['productID'],
        "qrcode"=>$row['qrcode'],
        "in_house"=>$row['in_house'],
        "with_customer"=>$row['with_customer'],
        "lost"=>$row['lost'],
        "longitude"=>$row['longitude'],
        "latitude"=>$row['latitude'],
        "status"=>$row['status'],
        "day_held"=>$row['day_held']
    );
    }
echo json_encode($output,JSON_NUMERIC_CHECK);
exit;
?>