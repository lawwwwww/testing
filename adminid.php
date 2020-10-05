<?php
	session_start();
	$aidd=$_SESSION['adminid'];
	setcookie("adminidd",$aidd);
	
	header('Location: index.php');

?>