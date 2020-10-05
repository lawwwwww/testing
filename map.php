<?php
	/* Database connection settings */
$host = 'localhost';
	$user = 'root';
	$pass = '';
	$db = 'trienekendb';
	$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
	define('SCRIPT_DEBUG', true);
 	$coordinates = array();
 	$latitudes = array();
 	$longitudes = array();

	
	// Select all the rows in the markers table
	$query = "SELECT * FROM `rorotable` ";
	$result = $mysqli->query($query) or die('data selection for google map failed: ' . $mysqli->error);
	$customername=[];
	$input=[];
 	while ($row = mysqli_fetch_array($result)) {
		
		$query2 = "SELECT customername FROM roroservice WHERE serialNo='$row[serialNo]' AND returndate IS NULL";
		$resultt = $mysqli->query($query2)  or die('customer name not get' . $mysqli->error);
		if($resultt->num_rows>0){
			while($roww = mysqli_fetch_array($resultt)){
				 array_push($customername,'Customer Name:'.$roww['customername']);
				 $cuss = $roww['customername'];
			}
		}else{
			array_push($customername,' ');
			$cuss = " "; 
		}
		
		
		
		
		$xx = mysqli_query($mysqli,"SELECT * FROM roroservice WHERE serialno = '$row[serialNo]' AND returndate IS NULL") or die($mysqli->error);
		if($xx->num_rows>0){
				while($roww = $xx->fetch_assoc()){
					$daysatcus = 0;
					
					
					$shipdatee = date("Y-m-d",strtotime($roww['shipdate']));
					
					$returndatee = date("Y-m-d",strtotime('+1 day'));
					
					while($shipdatee!=$returndatee){
						$checkifholi = mysqli_query($mysqli,"SELECT * FROM holidaytable WHERE holidaydate = '$shipdatee'")or die($mysqli->error);
						if(date('w', strtotime($shipdatee)) === '0'){
							$daysatcus += 0;
						}else{
							$daysatcus += 1;
						}
				
						$shipdatee = date('Y-m-d', strtotime($shipdatee . ' +1 day'));
					}
			}
		}else{
			$daysatcus= 0;
		}
		
		
		
		
		
		$truckid[] = $row['serialNo'];
		$latitudes[] = $row['latitude'];
		$longitudes[] = $row['longitude'];
		$coordinates[] = 'new google.maps.LatLng(' . $row['latitude'] .','. $row['longitude'] .'),';
		array_push($input,$cuss.' SerialNo:'.$row['serialNo'].' Days:'.$daysatcus);
		
	}

	//remove the comaa ',' from last coordinate
	$lastcount = count($coordinates)-1;
	$coordinates[$lastcount] = trim($coordinates[$lastcount], ",");	
?>
<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="style.css">
		<title>Map | View</title>
	</head>
	<header><?php include'navigation.php'?></header>
	
	<body>
		
			<div class="outer-scontainer">
	        <div class="row">
			<?php include 'roro_navi.php'?>
			<br/><br/><br/>
	            <form  style="margin-left:100px;margin-top:20px;" class="form-horizontal" action="" method="post" name="frmCSVImport" id="frmCSVImport" enctype="multipart/form-data">
	            	<div class="form-area">	      
    					<button type="submit" id="submit" name="import" class="btn-submit">Refresh</button><br />
					</div>
	            </form>
	        </div>

		<div id="map" style="width: 100%; height: 80vh;"></div>;
	

		<script>
			function initMap() {
			  var mapOptions = {
			    zoom: 10,
			    center: {<?php echo'lat:'. $latitudes[0] .', lng:'. $longitudes[0] ;?>}, //{lat: --- , lng: ....}
			    mapTypeId: google.maps.MapTypeId.ROADMAP
			  };

			  var map = new google.maps.Map(document.getElementById('map'),mapOptions);
			var counting = 0;
			mark = 'mark6.png';
				<?php
			  		$bb = 0;
					while ($bb < count($coordinates)) {
						$ccc=0
						?>
	
						var ss = String(counting);
						newPoint = {<?php echo'lat:'.$latitudes[$bb] .', lng:'. $longitudes[$bb] ;?>};
						var infowindow = new google.maps.InfoWindow({
							content: ss,
							position:newPoint
							});
						var marker = new google.maps.Marker({
							  position: newPoint,
							   map: map,
							   icon: mark,
							   title:<?php echo json_encode($truckid[$bb]); ?>,
							   animation: google.maps.Animation.DROP
							});
						
						
						 google.maps.event.addListener(marker, 'click', (function(marker) {
						return function() {
							infowindow.setContent(<?php echo json_encode($input[$bb]); ?>);
							infowindow.open(map, marker);
						}
					})(marker));
					<?php
					$bb++;
					}
			  	?>
			  
			}
			
			google.maps.event.addDomListener(window, 'load', initialize);
    	</script>

	    
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCt9xTys5UKzWlEhzcBOHSf79WioZDcVM8&callback=initMap"></script>
	
		 
	</body>
</html>