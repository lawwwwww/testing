<?php
	session_start();
?>

<!DOCTYPE html>
<html>

<head>
	<title>Upload File</title>
	 <link href="css/bootstrap.min.css" rel="stylesheet" />  
   
	<link href="css/mycss.css" rel="stylesheet" type="text/css">
</head>


<header>
	<?php include'navigation.php'?>
</header>

<body class="upload">
<div class="container">
<?php if(isset($_SESSION['username'])){?>

<?php include 'trip_navi.php'?>
<br/><br/><br/>
	
<form method="post" enctype="multipart/form-data">

	<h2>Upload file in pdf form</h2><br/>
	<input type="File" id="lulul" name="file" accept="application/pdf"/><br/><br/>
	<input type="submit" name="submit"/>

	</form>

	<br/><br/><br/>

<?php
include_once 'connection.php';
	
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
				//exec("C:\\xampp\\htdocs\\trie\\trie\\fakedata.py");
				exec("fakedata.py");
			}
			$lolo=$_COOKIE['adminidd'];
			//exec("C:\\xampp\\htdocs\\trie\\trie\\uploadfile.py $upload_file $lolo");  
			shell_exec("uploadfile.py $upload_file $lolo");  
		}else{
			echo'<script>alert("The file is already inserted.")</script>';
		}
		
		
		$ssqql="SELECT * FROM uploadedtable";
		$resultt=mysqli_query($conn,$ssqql);
	
		if(mysqli_num_rows($resultt)>0)
		{
			?>
			
			<div style="overflow-x:auto;" class="row">
			<div class="col-md-12">
				<table id="myTable2" class="table table-responsive table-bordered table-striped table-hover"> 
                                <caption class="text-primary">Uploaded data</caption>
         <!--table head-->      <thead class="thead-dark">
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
		</thead>
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
<?php }
	else{
			echo 'Please <a href="login.php">Login</a>';
		}?>
		</div>
</body>
</html>