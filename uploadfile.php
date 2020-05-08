<!DOCTYPE html>
<html>
<head>
	<title>File Upload</title>
</head>

<style>
body{
	 margin-left: 100px;
margin-top:20px;}

form{
	border-style:ridge;
	padding:20px;
	margin-right:90px;
	
a { color: #000000; }
a:visited { #FF0000; }
a:hover,a:active,a:focus{#0F4CC8;}
	}
li{list-style-type:none;}

	
	
</style>
<header>
	<?php include'navigation.php'?>
</header>

<body class="upload">
<ul>
<li><a style="margin-right:10px;" href="uploadfile.php">Upload DHLS</a></li>
<li><a href="trip.php">View Trip</a></li>
</ul>

<br/><br/><br/>

<form method="post" enctype="multipart/form-data"><!--add action and link to trip.php-->

	<label for="fileupload">Upload file in pdf form</label><br/><br/>
	<input type="File" name="file" accept="application/pdf"/><br/><br/>
	<input type="submit" name="submit"/>

	</form>
<br/><br/><br/>
<?php
	$conn=mysqli_connect("localhost","root","","trienekendb");

	//upload pdf
	if(isset($_POST["submit"]))
	{
		$allow=array('pdf');
		$temp=explode(".",$_FILES['file']['name']);
		$extension=end($temp);
		
		$tmpfile=$_FILES["file"]["tmp_name"];
		$upload_file=$_FILES['file']['name'];
		
		if(!file_exists("pdf/".$_FILES['file']['name']))
		{	move_uploaded_file($tmpfile,"pdf/".$_FILES['file']['name']);
			echo'<script>alert("The file is submitted successfully.")</script>';
			$ssqqll="SELECT * FROM triptable";
			$resulttt=mysqli_query($conn,$ssqqll);
			
			if(mysqli_num_rows($resulttt)==0)
			{
				exec("C:\\xampp\\htdocs\\FYP\\fakedata.py");
			}
			exec("C:\\xampp\\htdocs\\FYP\\uploadfile.py $upload_file");  
		}else{
			echo'<script>alert("The file is already inserted.")</script>';
		}
		
		
		$ssqql="SELECT * FROM uploadedtable";
		$resultt=mysqli_query($conn,$ssqql);
	
		if(mysqli_num_rows($resultt)>0)
		{
			?>
			<table>
				<tr>
					<th>Customer Name</th>
					<th>Area ID</th>
					<th>Container Retrieve</th>
					<th>Container Placed</th>
					<th>Collection Type</th>
					<th>Ship Date</th>
					<th>Driver ID</th>
					<th>Truck ID</th>
					<th>Admin ID</th>
					<th>Sales Order No</th>
					<th>Address</th>
					<th>Container Size</th>
				</tr>
		<?php	while($row=mysqli_fetch_array($resultt))
			{
		?>
			<tr>
				<td><?php echo $row["cust_name"];?></td>
				<td><?php echo $row["areaID"];?></td>
				<td><?php echo $row["container_retrieve"];?></td>
				<td><?php echo $row["container_placed"];?></td>
				<td><?php echo $row["collection_type"];?></td>
				<td><?php echo $row["ship_date"];?></td>
				<td><?php echo $row["driverID"];?></td>
				<td><?php echo $row["truckID"];?></td>
				<td><?php echo $row["adminID"];?></td>
				<td><?php echo $row["salesOrderNo"]?></td>
				<td><?php echo $row["address"];?></td>
				<td><?php echo $row["container_size"];?></td>
			</tr>	
		
		<?php
			}
		?>
</table>		


<?php
	}}
	
	
	$ssql="SELECT * FROM uploadedtable";
	$result=mysqli_query($conn,$ssql);
	
	if(mysqli_num_rows($result)>0)
	{
		mysqli_query($conn,"DELETE FROM uploadedtable");
	}
	
	$conn->close();
?>

</body>
</html>