<?php
	$conn=mysqli_connect("localhost","root","","trienekendb");
	
	if($conn->connect_error)
	{
		die("Connection failed:".$conn->connect_error);
	}
?>

<!DOCTYPE html>
<html lang="eng">
<head>
	<title>Trieneken</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Cafe">
</head>

<body>
	<h2>Trip</h2>
	<table>
	<tr>
		<td>Customer name</td>
		<td>Area ID</td>
		<td>Container retrieve</td>
		<td>Container placed</td>
		<td>Collection time</td>
		<td>Collection type</td>
		<td>Waste type</td>
		<td>Trip ID</td>
		<td>Customer signature</td>
		<td>Ship date</td>
		<td>Return date</td>
		<td>Driver ID</td>
		<td>Admin ID</td>
		<td>Assign status</td>
		<td>Trip status</td>
		<td>Image</td>
		<td>Instruction</td>
		<td>Truck ID</td>
		<td>Sales order no.</td>
		<td>Address</td>
		<td>Container size</td>
	</tr>	
	<?php
		$sql="SELECT * FROM triptable";
		$result=mysqli_query($conn,$sql);
		
		if(mysqli_num_rows($result)>0)
		{
			while($row=mysqli_fetch_array($result))
			{
		?>
		<tr>
		<td><?php echo $row["cust_name"]?></td>
		<td><?php echo $row["areaID"]?></td>
		<td><?php echo $row["container_retrieve"]?></td>
		<td><?php echo $row["container_placed"]?></td>
		<td><?php echo $row["collection_time"]?></td>
		<td><?php echo $row["collection_type"]?></td>
		<td><?php echo $row["waste_type"]?></td>
		<td><?php echo $row["tripID"]?></td>
		<td><?php echo $row["customer_sign"]?></td>
		<td><?php echo $row["ship_date"]?></td>
		<td><?php echo $row["return_date"]?></td>
		<td><?php echo $row["driverID"]?></td>
		<td><?php echo $row["adminID"]?></td>
		<td><?php echo $row["assign_status"]?></td>
		<td><?php echo $row["trip_status"]?></td>
		<td><?php echo $row["image"]?></td>
		<td><?php echo $row["instruction"]?></td>
		<td><?php echo $row["truckID"]?></td>
		<td><?php echo $row["salesOrderNo"]?></td>
		<td><?php echo $row["address"]?></td>
		<td><?php echo $row["container_size"]?></td>
		</tr>
	<?php		
			}
		}
	?>	
		</table>

	
</body>
</html>


<?php
$conn->close();
?>