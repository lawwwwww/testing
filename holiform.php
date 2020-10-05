<?php

	session_start();
	include_once 'connection.php';
	
?>

<!DOCTYPE html>
<html>
	<head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" /> 
       <meta name="keywords" content="fyp">
    <link href="css/bootstrap.min.css" rel="stylesheet" />  
     
    <link href="css/mycss.css" rel="stylesheet" type="text/css">
		<title>Holiday</title>
	</head>
	<header><?php include'navigation.php'?></header>
	
	<!--<style>
	#submit_drip{
		margin-left:-116px;
	}
	</style>-->
	
	<body>
	<div class="container">

	<?php if(isset($_SESSION['username'])){?>
	<?php include 'holi_navi.php'?><br/><br/><br/>
	<form action="holiholi.php" method="POST">
	<h2>View and add holiday</h2><br/>
	<label for="holiyear">
	Enter year for view and add holiday:<br/>
		<input type="text" name="holiyear"/><br/><br/>
	</label>
	<br/>
	<input type='submit' id="submit_drip" value='Generate'>
	</form>
	<br/>
	<form action="holiholiminus.php" method="POST">
	<h2>View and remove holiday</h2><br/>
	<label for="holiyear">
	Enter year for view and remove holiday:<br/>
		<input type="text" name="holiyear"/><br/><br/>
	</label>
	<br/>
	<input type='submit' id="submit_drip" value='Generate'>
	</form>
	<?php }
else{
			echo 'Please <a href="login.php">Login</a>';
		}?>
		</div>
	</body>
</html>