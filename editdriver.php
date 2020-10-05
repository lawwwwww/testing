<?php
	session_start();

	include_once 'connection.php';
	
	if(isset($_GET["action"]))
	{
		if($_GET["action"]=="edit")
		{
			$_SESSION['editdriver']=$_GET["id"];
			$editdriver=$_SESSION['editdriver'];
		}
	}
	
	$editdriver=$_SESSION['editdriver'];

	if(isset($_POST["submit"]))
	{
		if($_POST["uname"]!="" &&$_POST["pw"]!="" )
		{
			
		if(isset($_POST["uname"]) && isset($_POST["pw"])) 
	{
			
			$aa="UPDATE drivertable set username='".$_POST['pw']."',driverID='".$_POST['uname']."' where driverID='".$editdriver."'";
			mysqli_query($conn,$aa);
	}
	
		if(mysqli_query($conn,$aa))
	{
		
		echo '<script>if(confirm("Data is recorded.")){document.location.href="driver.php"};</script>';
		
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
	<title>Edit Driver</title>
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
<?php include'driver_navi.php'?><br/><br/><br/>


	
<form method="post" action="editdriver.php?action=e"><!--add action and link to trip.php-->

	<h2>Edit Driver</h2>
	

<?php
	$sel="SELECT * FROM drivertable WHERE driverID='$editdriver'";
	$sell=mysqli_query($conn,$sel);
	
	if(mysqli_num_rows($sell)>0)
	{
		while($row=mysqli_fetch_array($sell))
		{
		?>
		<br/>
		<div class="row">
		<div class="col-md-2">
		<label>Driver ID: </label></div>
		<div class="col-md-10">
		<input type="text" name="uname" value="<?php echo $row["driverID"];?>">
		</div></div>
		
		<br/>
		
		<div class="row">
		<div class="col-md-2">
		<label>Driver Name: </label></div>
		<div class="col-md-10">
		<input type="text" name="pw" value="<?php echo $row["username"];?>">
		</div>
		</div>
		<br/><br/>
	
	<div class="row">
	<div class="col-md-6">
	<button><a href="driver.php">Back</a></button>
	</div>
	<div class="col-md-6">
	<input type="submit" name="submit" value="Submit"/>
	</div>
	
		<?php
	}
	}
?>
</form>

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
<?php $conn->close();?>
