<?php
	session_start();

	include_once 'connection.php';
	
	
	if(isset($_POST["submit"]))
	{
		if($_POST["grp2"]!="" && $_POST["size2"]!="" && $_POST["sno"]!="" && $_POST["pid"]!="" && $_POST["qrcode"]!="" && $_POST["inhouse2"]!="" && $_POST["withcustomer2"]!="" && $_POST["lost2"]!="")
		{
		$ins="INSERT INTO rorotable (rorogroup,size,serialNo,productID,qrcode,in_house,with_customer,lost,status)VALUES('$_POST[grp2]','$_POST[size2]','$_POST[sno]','$_POST[pid]','$_POST[qrcode]','$_POST[inhouse2]','$_POST[withcustomer2]','$_POST[lost2]','')";
		
		
		
		if(mysqli_query($conn,$ins))
			{
				echo '<script>if(confirm("Data is inserted")){document.location.href="roro.php"};</script>';
		
	}
			else
			{
				echo '<script>alert("Error")</script>';
			}
	
	}
	else echo '<script>alert("Invalid input!")</script>';
	}
	
	
	
?>


<!DOCTYPE html>
<html data-ng-app="myapp" lang="eng">
<head>
	<title>Create Roro</title>
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

<form method="post" action="newroro.php?action=add"><!--add action and link to trip.php-->

	<h2>Create Roro</h2>
	
	<br/>
	<div class="row">
	<div class="col-md-2">
		<label>Roro Group: </label>
		</div>
		<div class="col-md-10">
		<input type="text" name="grp2">
		</div></div>
		<br/>
		
		<div class="row">
		<div class="col-md-2">
		<label>Size </label></div>
		<div class="col-md-10">
		<input type="text" name="size2">
		</div>
		</div>
		<br/>
		
		<div class="row">
		<div class="col-md-2">
		<label>Serial No.:</label></div>
		<div class="col-md-10">
		<input type="text" name="sno" >
		</div>
		</div>
		<br/>
		
		<div class="row">
		<div class="col-md-2">
		<label>Product ID:</label>
		</div>
		<div class="col-md-10">
		<input type="text" name="pid" >
		</div>
		</div>
		<br/>
		
		<div class="row">
		<div class="col-md-2">
		<label>QR code:</label>
		</div>
		<div class="col-md-10">
		<input type="text" name="qrcode" >
		</div>
		</div>
		<br/>
		
		<div class="row">
		<div class="col-md-2">
		<label>In House:</label></div>
		<div class="col-md-10">
			<select name="inhouse2">
			<option value="Yes" 
			
			>Yes
			</option>
			<option value="No" 
			>No
			</option>
	
		</select>
		</div>
		</div>
		<br/>
		
		
		<div class="row">
		<div class="col-md-2">
		<label>With Customer:</label></div>
		<div class="col-md-10">
		<select name="withcustomer2">
			<option value="Yes" 
			
			>Yes
			</option>
			<option value="No" 
			>No
			</option>
	
		</select></div></div>
		<br/>
		
		
		<div class="row">
		<div class="col-md-2">
		<label>Lost:</label></div>
		<div class="col-md-10">
		<select name="lost2">
			<option value="Yes" 
			
			>Yes
			</option>
			<option value="No" 
			>No
			</option>
	
		</select></div></div>
		<br/>

	<div class="row">
	<div class="col-md-6">
	<input type="submit" name="submit" value="Submit"/>
	</div>
	<div class="col-md-6">
	<button><a href="roro.php">Back</a></button>
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
