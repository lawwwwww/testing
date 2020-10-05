<?php
session_start();
	include_once 'connection.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Monthly Report</title>
<!--<link rel="stylesheet" href="style.css?vn={random number/string}">-->
	<meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" /> 
       <meta name="keywords" content="fyp">
    <link href="css/bootstrap.min.css" rel="stylesheet" />  
    <link href="css/mycss.css" rel="stylesheet" type="text/css">
</head>

<header>
	<?php include'navigation.php'?>
</header>
<body>
<div class="container">
<?php if(isset($_SESSION['username'])){?>
<?php include 'roro_navi.php'?>

<form style="margin-top:40px" action = 'roroturn.php' method="POST">
<fieldset>

<h2> Daily Report</h2>
 <div style="margin-bottom:20px;margin-top:20px">Enter Date To Generate Turns By Asset Form </div>

Start Date:<input type="date" name="sdate" value="<?php echo date('Y-m-d'); ?>" />
<br/>
 Finish Date: <input type="date" name="fdate" value="<?php echo date('Y-m-d'); ?>" />

<div class="row">
<div class="col-md-12">
<input type='submit' value='Generate'></div></div>
</fieldset>
</form></div>
<?php }
else{
			echo 'Please <a href="login.php">Login</a>';
		}?> 

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