<?php
	session_start();
?>

<?php
	include_once 'connection.php';
	
?>

<!DOCTYPE html>
<html>
	<head>
		
		
	<meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" /> 
       <meta name="keywords" content="fyp">
    <link href="css/bootstrap.min.css" rel="stylesheet" />  
	<link rel="stylesheet" type="text/css" href="css/mycss.css">
		<title>Driver performance</title>
	</head>
	
	<header><?php include'navigation.php'?></header>
	
	<body>
	
	<div class="container">
	<?php if(isset($_SESSION['username'])){?>
	
	<?php include'driver_navi.php'?>
	
	<br/><br/><br/>
	
	<form action="driverperf.php" method="POST">
	<h2>Driver Performance</h2><br/>
	<label for="dridate">
	Enter year for Monthly Performances of Drivers:
		<br/><input type="text" name="dridate" placeholder="Year"/>
	</label>
	<br/><br/>
	<input type='submit' id="submit_drip" value='Generate'>
	</form>
	<?php }
	else{
			echo 'Please <a href="login.php">Login</a>';
		}?>
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