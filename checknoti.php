<?php

session_start();
?>

<!DOCTYPE html>
<html lang="eng">
<head>
	<title>View Driver</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="fyp">
    <link href="mycss.css" rel="stylesheet" type="text/css">
</head>
<header>
	<?php include'navigation.php'?>
</header>
<body>



<?php
if(isset($_SESSION['username'])){


include_once 'connection.php';
$tututu = false;
$extract = mysqli_query($conn,"SELECT DISTINCT serialNo FROM roroservice WHERE returndate IS NULL");
if($extract->num_rows>0){
	echo '<table><thead><th>SerialNo</th><th>Ship Date</th><th>Days At Customer</th></thead>';
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
						echo '<tr><td>'.$row['serialNo'].'</td><td>'.$roww['shipdate'].'</td><td>'.$daysatcus.'</td></tr>';
					}
				
				}
				
			}
			echo '</table>';
}

?>

<?php }
	else{
			echo 'Please <a href="login.php">Login</a>';
		}?>
		
		

</body>
</html>


<?php
$conn->close();
?>