<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="style.css">
		<title></title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</head>
	<div class="container-fluid">
	
	<body>
	
	<form action ="login_action.php" method="post">
	<div class = "form-group">
		<label for="uname"><b>Username:</b></label>
		<input id="uid" type="text" class="form-control" placeholder="Enter Username" name="uname" required>
	</div>
	<div class = "form-group">
		<label for="passw"><b>Password:</b></label>
		<input id="upw" type="password" class="form-control" placeholder="Enter Password" name="passw" required>
	</div>
	<div class = "form-group">
		<button type="submit" name="loginbutton" class="btn btn-primary">Login</button>
	</div>
	</form>
	</div>
	
	
	</body>
</html>