<?php
	session_start();

	include_once 'connection.php';
	
	
	if(isset($_GET["action"]))
	{
		if($_GET["action"]=="edit")
		{
			$_SESSION['editroro']=$_GET["id"];
			$editroro=$_SESSION['editroro'];
		}
	}
	
	$editroro=$_SESSION['editroro'];
	if(isset($_POST["submit"]))
	{
		if($_POST["serser"]!="" &&$_POST["grp2"]!="" && $_POST["size2"]!="" && $_POST["pid"]!="" && $_POST["qrcode2"]!="" && $_POST["inhouse2"]!="" && $_POST["withcustomer2"]!="" && $_POST["lost2"]!="" ){
			
			$cc="UPDATE rorotable set serialNo='".$_POST['serser']."',rorogroup='".$_POST['grp2']."',size='".$_POST['size2']."',productID='".$_POST['pid']."',qrcode='".$_POST['qrcode2']."',in_house='".$_POST['inhouse2']."',with_customer='".$_POST['withcustomer2']."',lost='".$_POST['lost2']."',longitude='".$_POST['longitude2']."',latitude='".$_POST['latitude2']."',status='".$_POST['status2']."',day_held='".$_POST['dayheld2']."' where serialNo='".$editroro."'";
			mysqli_query($conn,$cc);
	
	

		if(mysqli_query($conn,$cc))
	{
		
		echo '<script>if(confirm("Data is recorded.")){document.location.href="roro.php"};</script>';
		
	}
		else
	{
		echo '<script>alert("Data is not inserted")</script>';
			
	}
	
	}
	else
	{
			echo '<script>alert("Invalid input!")</script>';
	
	}
	}

?>


<!DOCTYPE html>
<html data-ng-app="myapp" lang="eng">
<head>
	<title>Edit Trip</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Trieneken">
 <link href="css/bootstrap.min.css" rel="stylesheet" />  
   
    <link href="css/mycss.css" rel="stylesheet" type="text/css">   
</head>



<header>
	<?php include'navigation.php'?>
</header>
<body data-ng-controller="myctrl">
<div class="container">
<?php include 'roro_navi.php'?>

<br/><br/><br/>

<form method="post" action="editroro.php?action=e"><!--add action and link to trip.php-->

	<h2>Edit Roro</h2>
	

<?php
	$sel="SELECT * FROM rorotable WHERE serialNo='$editroro'";
	$sell=mysqli_query($conn,$sel);
	
	if(mysqli_num_rows($sell)>0)
	{
		while($row=mysqli_fetch_array($sell))
		{
		?>
		<br/>
		
		<div class="row">
		<div class="col-md-2">
		<label>Roro Group: </label></div>
		<div class="col-md-10">
		<input type="text" name="grp2" value="<?php echo $row["rorogroup"];?>">
		</div>
		</div>
		<br/>
		
		<div class="row">
		<div class="col-md-2">
		<label>Size </label></div>
		<div class="col-md-10">
		<input type="text" name="size2" value="<?php echo $row["size"];?>">
		</div>
		</div>
		<br/>
		
		<div class="row">
		<div class="col-md-2">
		<label>Serial No.:</label>
		</div>
		<div class="col-md-10">
		<input type="text" name="serser" value="<?php echo $row["serialNo"];?>">
		</div>
		</div>
		<br/>
		
		<div class="row">
		<div class="col-md-2">
		<label>Product ID:</label>
		</div>
		<div class="col-md-10">
		<input type="text" name="pid" value="<?php echo $row["productID"];?>">
		</div>
		</div>
		<br/>
		
		<div class="row">
		<div class="col-md-2">
		<label>QR code:</label></div>
		<div class="col-md-10">
		<input type="text" name="qrcode2" value="<?php echo $row["qrcode"];?>">
		</div>
		</div>
		<br/>
		
		<div class="row">
		<div class="col-md-2">
		<label>In House:</label>
		</div>
		<div class="col-md-10">
		<select name="inhouse2">
			<option value="Yes" 
			<?php if($row["in_house"]=='Yes')
				echo 'selected="selected"';?>>Yes
			</option>
			<option value="No" 
			<?php if($row["in_house"]=='No')
				echo 'selected="selected"';?>>No
			</option>
		
		</select>
		</div>
		</div>
		<br/>
		
		<div class="row">
		<div class="col-md-2">
		<label>With Customer:</label>
		</div>
		<div class="col-md-10">
			<select name="withcustomer2">
			<option value="Yes" 
			<?php if($row["with_customer"]=='Yes')
				echo 'selected="selected"';?>>Yes
			</option>
			<option value="No" 
			<?php if($row["with_customer"]=='No')
				echo 'selected="selected"';?>>No
			</option>
	
		</select>
		</div>
		</div>
		<br/>
		
		<div class="row">
		<div class="col-md-2">
		<label>Lost:</label></div>
		<div class="col-md-10">
			<select name="lost2">
			<option value="Yes" 
			<?php if($row["lost"]=='Yes')
				echo 'selected="selected"';?>>Yes
			</option>
			<option value="No" 
			<?php if($row["lost"]=='No')
				echo 'selected="selected"';?>>No
			</option>
	
		</select>
		</div>
		</div>
		<br/>
		
		<div class="row">
		<div class="col-md-2">
		<label>Longitude:</label></div>
		<div class="col-md-10">
		<input type="text" name="longitude2" value="<?php echo $row["longitude"];?>">
		</div>
		</div>
		<br/>
		
		<div class="row">
		<div class="col-md-2">
		<label>Latitude:</label>
		</div>
		<div class="col-md-10">
		<input type="text" name="latitude2" value="<?php echo $row["latitude"];?>">
		</div>
		</div>
		<br/>
		
		<div class="row">
		<div class="col-md-2">
		<label>Status:</label></div>
		<div class="col-md-10">
			<select name="status2">
			<option value="" 
			<?php if($row["status"]=='')
				echo 'selected="selected"';?>>
			</option>
			<option value="Repair" 
			<?php if($row["status"]=='Repair')
				echo 'selected="selected"';?>>Repair
			</option>
	
		</select>
		</div>
		</div>
		<br/>
		
		<div class="row">
		<div class="col-md-2">
		<label>Day held</label>
		</div>
		<div class="col-md-10">
		<input type="text" name="dayheld2" value="<?php echo $row["day_held"];?>">
		</div>
		</div>
		<br/><br/>
	
	<div class="row">
	
	<div class="col-md-6">
	<button><a href="trip.php">Back</a></button></div>
	<div class="col-md-6">
	<input type="submit" name="submit" value="Submit"/>
	</div>
	</form>
		<?php
	}
	}
?>

<br/><br/>

<br/><br/><br/>

</div>
		<script src="js/jquery.min.js"></script> 
        
        <noscript>Alternate content for script</noscript>
        
        <!-- All Bootstrap  plug-ins  file --> 
        <script src="js/bootstrap.min.js"></script> 
        
        <noscript>Alternate content for script</noscript>
       
        <!-- Basic AngularJS --> 
        <script src="js/angular.min.js"></script> 
        
        <noscript>Alternate content for script</noscript>
        
        <!-- AngularJS - Routing --> 
        <script src="js/angular-route.min.js"></script>
        
        <noscript>Alternate content for script</noscript>
        
            <!-- AngularJS - Routing --> 
        <script src="js/javajava.js"></script>
        
        <noscript>Alternate content for script</noscript>	

</body>
</html>
