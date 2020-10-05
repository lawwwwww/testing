<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="style.css">
		<title>Homepage</title>
	</head>
	<header><?php include'navigation.php'?></header>
	
	<body style="margin-left:100px;margin-top:20px;">
		<?php 
		if(isset($_SESSION['username'])){
			echo '<h1>HomePage</h1>';
		}else{
			echo 'Please <a href="login.php">Login</a>';
		}
			?>
			
	</body>
</html>