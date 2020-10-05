<?php
	session_start();

	include_once 'connection.php';
	
	
	if(isset($_POST["submit"]))
	{
		if($_POST["tru"]!="" && $_POST["sta"]!=""){
		$ins="INSERT INTO trucktable (truckID,status)VALUES('$_POST[tru]','$_POST[sta]')";
		
		
		if(mysqli_query($conn,$ins))
			{
				echo '<script>if(confirm("Data is inserted")){document.location.href="truck.php"};</script>';
			}
			else
			{
				echo '<script>alert("Error")</script>';
			}
		//header('Location: truck.php');
	}
		else{
			echo '<script>alert("Invalid input!")</script>';
		}
	}
	
	
	
?>


<!DOCTYPE html>
<html data-ng-app="myapp" lang="eng">
<head>
	<title>Create Truck</title>
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

<form method="post" action="newtruck.php?action=add"><!--add action and link to trip.php-->

	<h2>Create Truck</h2>
	
	<br/>
		<div class="row">
		<div class="col-md-2">
		<label>Truck ID </label></div>
		<div class="col-md-10">
		<input type="text" name="tru">
		</div>
		</div>
		<br/>
		
		<div class="row">
		<div class="col-md-2">
		<label>Status:</label></div>
		<div class="col-md-10">
		<select name="sta">
		<option value="Yes">Yes</option>
		<option value="No">No</option>
		</select>
		</div>
		</div>
		<br/><br/>
	
	<div class="row">
	<div class="col-md-6">
	<input type="submit" name="submit" value="Submit"/>
	</div>
	<div class="col-md-6">
	<button><a href="truck.php">Back</a></button>
	</div>
	</div>
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
