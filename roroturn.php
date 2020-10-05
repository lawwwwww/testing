<?php
	include_once 'connection.php';
	
?>

<!DOCTYPE html>
<html>
	<head>
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="css/mycss.css">
		<title>Monthly report</title>
	</head>
	<header><?php include'navigation.php'?></header>
	
	<body>
	
	<table>
	<tr>
	<?php
	if(isset($_POST['sdate']) and isset($_POST['sdate'])){
		echo "<thead><tr><td>Turns for Period</td><td>Serial Number</td><td>Product Code</td><td>Customer</td><td>Ship Date</td><td>Return Date</td><td>Days at Customer</td></tr></thead>";
		$sdate = date('Y-m-d', strtotime($_POST['sdate']));
		$fdate = date('Y-m-d', strtotime($_POST['fdate']));
		$fff = date('Y-m-d', strtotime($fdate . ' +1 day'));
		$extract = mysqli_query($conn,"SELECT DISTINCT serialNo FROM roroservice");
		if($extract->num_rows>0){
			while($row = $extract-> fetch_assoc()){
				$for_repeating  = 0;
				$xx = mysqli_query($conn,"SELECT * FROM roroservice WHERE serialno = '$row[serialNo]' AND shipdate BETWEEN '$sdate' AND '$fff'") or die($conn->error);
				while($roww = $xx->fetch_assoc()){
					$daysatcus = 0;
					$xyz = mysqli_query($conn,"SELECT COUNT(serialNo) as total FROM roroservice WHERE serialNo = '$row[serialNo]' AND shipdate BETWEEN '$sdate' AND '$fff'");
					$theship = date($roww['shipdate']);
					
					$total = mysqli_fetch_assoc($xyz);
					$reForProd = mysqli_query($conn,"SELECT productID FROM rorotable WHERE serialNo = '$row[serialNo]'")or die($conn->error);
					$productid = mysqli_fetch_assoc($reForProd);
					if($for_repeating==0){
						echo "<td>".$total['total']."</td>";
					}else{
						echo "<td></td>";
					}
					$for_repeating = 1;
					$x = 0;
					$shipdatee = date("Y-m-d",strtotime($roww['shipdate']));
					if($roww['returndate']!=null){
						$returndatee = date("Y-m-d",strtotime($roww['returndate']));
					}else{
						$returndatee = date("Y-m-d",strtotime('+1 day'));
					}
					echo "<td>".$roww['serialNo']."</td>";
					echo "<td>".$productid['productID']."</td>";
					echo "<td>".$roww['customername']."</td>";
					echo "<td>".$shipdatee."</td>";
					echo "<td>".$returndatee."</td>";
					while($shipdatee!=$returndatee){
						$checkifholi = mysqli_query($conn,"SELECT * FROM holidaytable WHERE holidaydate = '$shipdatee'")or die($conn->error);
						
						if($checkifholi->num_rows>0)
						{
							$daysatcus+=0;
						}else if(date('w', strtotime($shipdatee)) === '0'){
							$daysatcus += 0;
						}else{
							$daysatcus += 1;
						}
						$x += 1;
						$shipdatee = date('Y-m-d', strtotime($shipdatee . ' +1 day'));
					}
					echo "<td>".$daysatcus."</td>";
					echo "</tr>";
					
				}
				}
			
			echo "</table>";
		}else{
			echo "no result.";
		}
	}else{
		echo "All days Report";
		$extract = mysqli_query($conn,"SELECT DISTINCT serialNo FROM roroservice");
		if($extract->num_rows>0){
			while($row = $extract-> fetch_assoc()){
				$for_repeating  = 0;
				$xx = mysqli_query($conn,"SELECT * FROM roroservice WHERE serialno = '$row[serialNo]'") or die($conn->error);
				while($roww = $xx->fetch_assoc()){
					$xyz = mysqli_query($conn,"SELECT COUNT(serialNo) as total FROM roroservice WHERE serialNo = '$row[serialNo]'");
					$total = mysqli_fetch_assoc($xyz);
					$reForProd = mysqli_query($conn,"SELECT productID FROM rorotable WHERE serialNo = '$row[serialNo]'")or die($conn->error);
					$productid = mysqli_fetch_assoc($reForProd);
					if($for_repeating==0){
						echo "<td>".$total['total']."</td>";
					}else{
						echo "<td></td>";
					}
					$for_repeating = 1;
					echo "<td>".$roww['serialNo']."</td>";
					echo "<td>".$productid['productID']."</td>";
					echo "<td>".$roww['customername']."</td>";
					echo "<td>".$roww['shipdate']."</td>";
					echo "<td>".date("D",$roww['returndate'])."</td>";
					echo "</tr>";
					}
				}
			
			echo "</table>";
		}else{
			echo "no result.";
		}
	}
	$conn->close()
	
	
	?>
	
	</body>
</html>