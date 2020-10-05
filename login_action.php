<?php
	if(isset($_POST['loginbutton'])){
		$conn=mysqli_connect("localhost","root","","trienekendb");
		
		/* $pwd = "12345";
		$hashed = password_hash($pwd, PASSWORD_DEFAULT);
		 $inserr = "INSERT INTO admintable (username,password,adminID) VALUES ('usertrie22','$hashed',NULL)";
		if ($conn->query($inserr) === TRUE) {
		  echo "New record created successfully";
		} else {
		  echo "Error: " . $inserr . "<br>" . $conn->error;
		} */
				
		
		$username = $_POST['uname'];
		$password = $_POST['passw'];
		//send back username??in url? to be added
		if(empty($username)|| empty($password)){
			header('Location: login.php?error=emptyinputs');
			exit();
		}else{
			$sql = 'SELECT * FROM admintable WHERE username=?;';
			$stmt = mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($stmt,$sql)){
				header('Location: login.php?error=sqlerror');
				exit();	
			}else{
				mysqli_stmt_bind_param($stmt,'s',$username);
				mysqli_stmt_execute($stmt);
				$result = mysqli_stmt_get_result($stmt);
				if($row = mysqli_fetch_assoc($result)){
					//need edit for hash
					$passwordcheck = password_verify($password, $row['password']);
					echo $passwordcheck;
					$converted_res = $passwordcheck ? 'true' : 'false';
					echo $converted_res;
					echo gettype($row['password']);
					echo gettype($password);
					echo $row['password'];
					echo $password;
					if($passwordcheck == false){
						header("Location: login.php?error=wrongpasswd");
						exit();
					}else if($passwordcheck == true){
						session_start();
						$_SESSION['username']= $row['username'];
						$_SESSION['adminid']=$row['adminID'];
						
						header("Location: adminid.php?login=success");
						exit();
					}else{
						header("Location: login.php?error=wwrongpasswd");
						exit();	
					}
				}else{
					header("Location: login.php?error=nomatchingdata");
					exit();	
				}
			}
		}
		
	}else{
		header("Location: login.php");
		exit();
	}


?>