<!DOCTYPE html>
<html>
<head>
<title>Order Details</title>
<link rel="stylesheet" href="navigation.css?am={random number/string}">

</head>
<header>
<div class="navvv">
	<p id="imageee"><img  src='navi.png' alt='navigation_icon' height='50px' width='50px'></p>
	<ul id="navv">
	  <li class="vava"><a href="trip.php">Manage Trip</a></li>
	  <li class="vava"><a href="roro.php">Manage Container</a></li>
	  <li class="vava"><a href="driver.php">Manage Driver</a></li>
	  <li class="vava"><a href="holiform.php">Manage Holiday</a></li>
	  <li class="vava"><a href="truck.php">Manage Truck</a></li>
<?php
include_once 'connection.php';
$tututu = false;
$extract = mysqli_query($conn,"SELECT DISTINCT serialNo FROM roroservice WHERE returndate IS NULL");
if($extract->num_rows>0){
			while($row = $extract-> fetch_assoc()){
				
				$xx = mysqli_query($conn,"SELECT shipdate FROM roroservice WHERE serialNo='$row[serialNo]' AND returndate IS NULL") or die($conn->error);
				while($roww = $xx->fetch_assoc()){
				
				$shipdatee = date("Y-m-d",strtotime($roww['shipdate']));
				$today = date("Y-m-d",strtotime('+1 day'));
				$daysatcus = 0;
			
				$abc = true;
				if($shipdatee>$today){
					$abc = false;
				}
				
				while(($shipdatee!=$today) and $abc ){
					
						$checkifholi = mysqli_query($conn,"SELECT * FROM holidaytable WHERE holidaydate = '$shipdatee'")or die($conn->error);
						if($checkifholi->num_rows>0){
							$daysatcus += 0;
						}else if(date('w', strtotime($shipdatee)) === '0'){
							$daysatcus += 0;
						}else{
							$daysatcus += 1;
						}
					
						$shipdatee = date('Y-m-d', strtotime($shipdatee . ' +1 day'));
					}
					
					if($daysatcus>3){
						$tututu = true;
						//edit here and attach to home to put noti icon
					}
				
				}
				
			}
			
}

if($tututu==true){
	echo '<li class="noti"><a href="checknoti.php"><img src="img/bell.jpg" height="20px" width="20px" alt="bell"> Notification</a></li>';
}

?>
	  <li class="tata"><a href="logout_action.php">Log Out?</a></li>
	  
	  
	</ul>
	</div>
</header>
<body>

</body>
</html>
