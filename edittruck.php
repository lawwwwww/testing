<?php
	session_start();

	include_once 'connection.php';
	
	if(isset($_GET["action"]))
	{
		if($_GET["action"]=="edit")
		{
			$_SESSION['edittruck']=$_GET["id"];
			$edittruck=$_SESSION['edittruck'];
			
		}
	}
	
	$edittruck=$_SESSION['edittruck'];

	if(isset($_POST["submit"]))
	{
		if($_POST["tru"]!="" &&$_POST["sta"]!="" )
		{
			if(isset($_POST["tru"]) && isset($_POST["sta"]))
	{
			$cc="UPDATE trucktable set truckID='".$_POST['tru']."',status='".$_POST['sta']."' where truckID='".$edittruck."'";
			mysqli_query($conn,$cc);
			
	
	}
	
	
		if(mysqli_query($conn,$cc))
	{
		
		echo '<script>if(confirm("Data is recorded.")){document.location.href="truck.php"};</script>';
		
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
	<title>Edit Truck</title>
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
<?php include'truck_navi.php'?><br/><br/><br/>

<form method="post" action="edittruck.php?action=e"><!--add action and link to trip.php-->

	<h2>Edit Truck</h2>
	

<?php
	$sel="SELECT * FROM trucktable WHERE truckID='$edittruck'";
	$sell=mysqli_query($conn,$sel);
	
	if(mysqli_num_rows($sell)>0)
	{
		while($row=mysqli_fetch_array($sell))
		{
		?>
		<br/>
		<div class="row">
		<div class="col-md-2">
		<label>Truck ID: </label></div>
		<div class="col-md-10">
		<input type="text" name="tru" value="<?php echo $row["truckID"];?>">
		</div>
		</div>
		
		<br/>
		
		<div class="row">
		<div class="col-md-2">
		<label>Status: </label></div>
		<div class="col-md-10">
		<select name="sta">
		<option value="Yes" <?php if($row["status"]=='Yes') echo 'selected="selected"';?>>Yes</option>
		<option value="No" <?php if($row["status"]=='No') echo 'selected="selected"';?>>No</option>
		</select>		</div></div>
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
