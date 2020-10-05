<?php

	include_once 'connection.php';
	if(isset($_POST['dridate'])){
		$yearofd = $_POST['dridate'];
		$startdate = date("Y-m-d",strtotime("$_POST[dridate]-01-01"));
		$enddate = date('Y-m-d', strtotime($startdate . ' +1 year'));
		$theyear = date("Y",strtotime($startdate));
		$counting = 0;
		$countingg = 0;
		$smallstartdate = date("Y-m-d",strtotime($startdate));
		$smallenddate = date("Y-m-d",strtotime($startdate . '+1 month'));
		
		while($countingg<1){
			$extract = mysqli_query($conn,"SELECT DISTINCT driverID FROM tripdonetable WHERE invoice_date BETWEEN '$smallstartdate' AND '$enddate'");
			if($extract->num_rows>0){
				$array_month_result = [];
				$driver_array = [];
				$send_array = [];
				$pull_array = [];
				$exchange_array = [];
				while($row = $extract-> fetch_assoc()){
					$xyzz = mysqli_query($conn,"SELECT username FROM drivertable WHERE driverID = '$row[driverID]'");
					$xyz = mysqli_query($conn,"SELECT COUNT(driverID) as total FROM tripdonetable WHERE driverID = '$row[driverID]'  AND invoice_date BETWEEN '$startdate' AND '$enddate'");
					$xyzpull = mysqli_query($conn,"SELECT COUNT(driverID) as total FROM tripdonetable WHERE driverID = '$row[driverID]'  AND collection_type = 'pull' AND invoice_date BETWEEN '$startdate' AND '$enddate'");
					$xyzsend = mysqli_query($conn,"SELECT COUNT(driverID) as total FROM tripdonetable WHERE driverID = '$row[driverID]'  AND collection_type = 'send' AND invoice_date BETWEEN '$startdate' AND '$enddate'");
					$xyzexchange = mysqli_query($conn,"SELECT COUNT(driverID) as total FROM tripdonetable WHERE driverID = '$row[driverID]'  AND collection_type = 'exchange' AND invoice_date BETWEEN '$startdate' AND '$enddate'");
					
					$total = mysqli_fetch_assoc($xyz);
					$send = mysqli_fetch_assoc($xyzsend);
					$pull = mysqli_fetch_assoc($xyzpull);
					$exchange = mysqli_fetch_assoc($xyzexchange);
					$name = mysqli_fetch_assoc($xyzz);
					array_push($send_array,$send['total']);
					array_push($pull_array,$pull['total']);
					array_push($exchange_array,$exchange['total']);
					array_push($array_month_result,$total['total']);
					array_push($driver_array,$name['username']);
					
					
				}
				echo '<table><tr><th colspan=5>Total</th></tr><tr><td>Driver</td><td>Send</td><td>Pull</td><td>Exchange</td><td>Total</td></tr>';
					for($x = 0; $x < count($array_month_result); $x++){
						echo '<tr>';
						echo '<td>'.$driver_array[$x].'</td><td>'.$send_array[$x].'</td><td>'.$pull_array[$x].'</td><td>'.$exchange_array[$x].'</td><td>'.$array_month_result[$x].'</td>';
						echo '</tr>';
				}
					echo '</table>';
					
					
				echo '<p class="hiding" id="tdata'.$countingg.'">';
				for($x = 0; $x < count($array_month_result); $x++){
					echo $array_month_result[$x].',';
				}
				echo '</p>';
				
				echo '<p class="hiding" id="tdatasend'.$countingg.'">';
				for($x = 0; $x < count($send_array); $x++){
					echo $send_array[$x].',';
				}
				echo '</p>';
				echo '<p class="hiding" id="tdatapull'.$countingg.'">';
				for($x = 0; $x < count($pull_array); $x++){
					echo $pull_array[$x].',';
				}
				echo '</p>';
				echo '<p class="hiding" id="tdataexchange'.$countingg.'">';
				for($x = 0; $x < count($exchange_array); $x++){
					echo $exchange_array[$x].',';
				}
				echo '</p>';
				
				echo '<p class="hiding" id="tdriver'.$countingg.'">';
				for($x = 0; $x < count($driver_array); $x++){
					echo $driver_array[$x].',';
				}
				echo '</p>';
			}else{
				echo '<p class="hiding" id="data'.$countingg.'"></p>';
				echo '<p class="hiding" id="driver'.$countingg.'"></p>';
				echo '<p class="hiding" id="datasend'.$countingg.'"></p>';
				echo '<p class="hiding" id="datapull'.$countingg.'"></p>';
				echo '<p class="hiding" id="dataexchange'.$countingg.'"></p>';
			}
			$countingg += 1;
		}
		
		
		
		
		while($counting<12){
			$extract = mysqli_query($conn,"SELECT DISTINCT driverID FROM tripdonetable WHERE invoice_date BETWEEN '$smallstartdate' AND '$smallenddate'");
			if($extract->num_rows>0){
				$array_month_result = [];
				$driver_array = [];
				$send_array = [];
				$pull_array = [];
				$exchange_array = [];
				while($row = $extract-> fetch_assoc()){
					$xyzz = mysqli_query($conn,"SELECT username FROM drivertable WHERE driverID = '$row[driverID]'");
					$xyz = mysqli_query($conn,"SELECT COUNT(driverID) as total FROM tripdonetable WHERE driverID = '$row[driverID]'  AND invoice_date BETWEEN '$startdate' AND '$smallenddate'");
					$xyzpull = mysqli_query($conn,"SELECT COUNT(driverID) as total FROM tripdonetable WHERE driverID = '$row[driverID]'  AND collection_type = 'pull' AND invoice_date BETWEEN '$startdate' AND '$smallenddate'");
					$xyzsend = mysqli_query($conn,"SELECT COUNT(driverID) as total FROM tripdonetable WHERE driverID = '$row[driverID]'  AND collection_type = 'send' AND invoice_date BETWEEN '$startdate' AND '$smallenddate'");
					$xyzexchange = mysqli_query($conn,"SELECT COUNT(driverID) as total FROM tripdonetable WHERE driverID = '$row[driverID]'  AND collection_type = 'exchange' AND invoice_date BETWEEN '$startdate' AND '$smallenddate'");
					
					$total = mysqli_fetch_assoc($xyz);
					$send = mysqli_fetch_assoc($xyzsend);
					$pull = mysqli_fetch_assoc($xyzpull);
					$exchange = mysqli_fetch_assoc($xyzexchange);
					$name = mysqli_fetch_assoc($xyzz);
					array_push($send_array,$send['total']);
					array_push($pull_array,$pull['total']);
					array_push($exchange_array,$exchange['total']);
					array_push($array_month_result,$total['total']);
					array_push($driver_array,$name['username']);
					
				}
				$monthhhh = ['January','February','March','April','May','June','July','August','September','October','November','December'];
				$cc = $monthhhh[$counting] ;
				echo '<table><tr><th colspan=5>'.$cc.'</th></tr><tr><td>Driver</td><td>Send</td><td>Pull</td><td>Exchange</td><td>Total</td></tr>';
					for($x = 0; $x < count($array_month_result); $x++){
						echo '<tr>';
						echo '<td>'.$driver_array[$x].'</td><td>'.$send_array[$x].'</td><td>'.$pull_array[$x].'</td><td>'.$exchange_array[$x].'</td><td>'.$array_month_result[$x].'</td>';
						echo '</tr>';
				}
					echo '</table>';
					
					
				echo '<p class="hiding" id="data'.$counting.'">';
				for($x = 0; $x < count($array_month_result); $x++){
					echo $array_month_result[$x].',';
				}
				echo '</p>';
				
				echo '<p class="hiding" id="datasend'.$counting.'">';
				for($x = 0; $x < count($send_array); $x++){
					echo $send_array[$x].',';
				}
				echo '</p>';
				echo '<p class="hiding" id="datapull'.$counting.'">';
				for($x = 0; $x < count($pull_array); $x++){
					echo $pull_array[$x].',';
				}
				echo '</p>';
				echo '<p class="hiding" id="dataexchange'.$counting.'">';
				for($x = 0; $x < count($exchange_array); $x++){
					echo $exchange_array[$x].',';
				}
				echo '</p>';
				
				echo '<p class="hiding" id="driver'.$counting.'">';
				for($x = 0; $x < count($driver_array); $x++){
					echo $driver_array[$x].',';
				}
				echo '</p>';
			}else{
				echo '<p class="hiding" id="data'.$counting.'"></p>';
				echo '<p class="hiding" id="driver'.$counting.'"></p>';
				echo '<p class="hiding" id="datasend'.$counting.'"></p>';
				echo '<p class="hiding" id="datapull'.$counting.'"></p>';
				echo '<p class="hiding" id="dataexchange'.$counting.'"></p>';
			}
			$smallstartdate = date("Y-m-d",strtotime($smallstartdate.'+1 month'));
			$smallenddate = date("Y-m-d",strtotime($smallenddate . '+1 month'));
			$counting += 1;
		}
		echo '<p class="hiding" id="year">'.$theyear.'</p>';
		
	}else{
		header("Location:driverperform.php");
	}
?>
<!DOCTYPE html>
<html>
	<head>
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="table2.css">
		<title>Driver performance</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
	</head>
	<header>
	<?php include'navigation.php'?>
</header>
	<body>
	
	

	<div class="container-fluid">
	<h2>Driver performance</h2>
	<div class="row">
	<div class="col-md-5">
	<canvas id="myChart1"></canvas>
	</div>
	<div class="col-md-5">
	<canvas id="myChart2"></canvas>
	</div>
	</div>
	
	<div class="row">
	<div class="col-md-5">
	<canvas id="myChart3"></canvas>
	</div>
	<div class="col-md-5">
	<canvas id="myChart4"></canvas>
	</div>
	</div>
	
	<div class="row">
	<div class="col-md-5">
	<canvas id="myChart5"></canvas>
	</div>
	<div class="col-md-5">
	<canvas id="myChart6"></canvas>
	</div>
	</div>
	
	<div class="row">
	<div class="col-md-5">
	<canvas id="myChart7"></canvas>
	</div>
	<div class="col-md-5">
	<canvas id="myChart8"></canvas>
	</div>
	</div>
	
	<div class="row">
	<div class="col-md-5">
	<canvas id="myChart9"></canvas>
	</div>
	<div class="col-md-5">
	<canvas id="myChart10"></canvas>
	</div>
	</div>
	
	<div class="row">
	<div class="col-md-5">
	<canvas id="myChart11"></canvas>
	</div>
	<div class="col-md-5">
	<canvas id="myChart12"></canvas>
	</div>
	</div>
	
	<div class="row">
	<div class="col-md-10">
	<canvas id="myChart13"></canvas>
	</div>
	</div>
	<form action="extract3.php" method="post">
	
		<input type="submit" name="export" value="Export Monthly Report to Excel">
	</form>
	<form action="extract4.php" method="post">
	
		<input type="submit" name="export" value="Export Total to Excel">
	</form>
<script>
	let myChart0 = document.getElementById('myChart1').getContext('2d');
	Chart.defaults.global.defaultFontFamily='Calibri';
	Chart.defaults.global.defaultFontSize=15;
	Chart.defaults.global.defaultFontColor='green';
	var yearr = document.getElementById('year').innerHTML;
	var x1 = document.getElementById('data0').innerHTML;
	var y1 = document.getElementById('driver0').innerHTML;
	
	var send1 = document.getElementById('datasend0').innerHTML;
	var pull1 = document.getElementById('datapull0').innerHTML;
	var exchange1 = document.getElementById('dataexchange0').innerHTML;
	var send1 = send1.slice(0,-1);
	var pull1 = pull1.slice(0,-1);
	var exchange1 = exchange1.slice(0,-1);
	var ssend1 = send1.split(",");
	var ppull1 = pull1.split(",");
	var eexchange1 = exchange1.split(",");
	
	console.log(x1);
	var x1 = x1.slice(0,-1);
	var y1 = y1.slice(0,-1);
	var xx1 = x1.split(",");
	var yy1 = y1.split(",");
	console.log(x1);
	console.log(y1);
	console.log(xx1);
	console.log(yy1);
	let driverChart0 = new Chart(myChart0,{
		type:'bar',// bar, horizontalBar, pie, line, doughnut, radar, polarArea
		data:{
			labels:yy1,
			datasets:[{
				label:'Total',
				data:xx1,
				backgroundColor:['#2E66B2','#2E66B2','#2E66B2','#2E66B2','#2E66B2','#2E66B2','#2E66B2','#2E66B2'],
				borderWidth:2,
				borderColor: 'black',
				hoverBorderWidth:2,
				hoverBorderColor: 'black',
			},{
				label:'send',
				data:ssend1,
				backgroundColor:['#D75F1E','#D75F1E','#D75F1E','#D75F1E','#D75F1E','#D75F1E','#D75F1E','#D75F1E'],
				borderWidth:2,
				borderColor: 'black',
				hoverBorderWidth:3,
				hoverBorderColor: 'black',
			},{
				label:'pull',
				data:ppull1,
				backgroundColor:['#54AE20','#54AE20','#54AE20','#54AE20','#54AE20','#54AE20','#54AE20','#54AE20'],
				borderWidth:2,
				borderColor: 'black',
				hoverBorderWidth:3,
				hoverBorderColor: 'black',
			},{
				label:'exchange',
				data:eexchange1,
				backgroundColor:['#7443C5','#7443C5','#7443C5','#7443C5','#7443C5','#7443C5','#7443C5','#7443C5'],
				borderWidth:2,
				borderColor: 'black',
				hoverBorderWidth:3,
				hoverBorderColor: 'black',
			}]
		},
		options:{
			title:{
				display:true,
				text:'  ' + ' January ' + yearr,
				fontSize:20
			},
			legend:{
				position:'right', // top bottom left right
				labels:{
					fontColor:'#000'
				}
			},
			layout:{
				padding:{
					left:20,
					right:20,
					bottom:0,
					top:10
				}
			},
			tooltips:{
				enabled:true
			}
		}
	});
	</script>
	<script>
	let myChart = document.getElementById('myChart2').getContext('2d');
	Chart.defaults.global.defaultFontFamily='Calibri';
	Chart.defaults.global.defaultFontSize=15;
	Chart.defaults.global.defaultFontColor='green';
	var x1 = document.getElementById('data1').innerHTML;
	var y1 = document.getElementById('driver1').innerHTML;
	console.log(x1);
	var x1 = x1.slice(0,-1);
	var y1 = y1.slice(0,-1);
	var xx1 = x1.split(",");
	var yy1 = y1.split(",");
	console.log(x1);
	console.log(y1);
	console.log(xx1);
	console.log(yy1);
	
	var send2 = document.getElementById('datasend1').innerHTML;
	var pull2 = document.getElementById('datapull1').innerHTML;
	var exchange2 = document.getElementById('dataexchange1').innerHTML;
	var send2 = send2.slice(0,-1);
	var pull2 = pull2.slice(0,-1);
	var exchange2 = exchange2.slice(0,-1);
	var ssend2 = send2.split(",");
	var ppull2 = pull2.split(",");
	var eexchange2 = exchange2.split(",");
	
	let driverChart = new Chart(myChart,{
		type:'bar',// bar, horizontalBar, pie, line, doughnut, radar, polarArea
		data:{
			labels:yy1,
			datasets:[{
				label:'Total',
				data:xx1,
				backgroundColor:['#2E66B2','#2E66B2','#2E66B2','#2E66B2','#2E66B2','#2E66B2','#2E66B2','#2E66B2'],
				borderWidth:2,
				borderColor: 'black',
				hoverBorderWidth:2,
				hoverBorderColor: 'black',
			},{
				label:'send',
				data:ssend2,
				backgroundColor:['#D75F1E','#D75F1E','#D75F1E','#D75F1E','#D75F1E','#D75F1E','#D75F1E','#D75F1E'],
				borderWidth:2,
				borderColor: 'black',
				hoverBorderWidth:3,
				hoverBorderColor: 'black',
			},{
				label:'pull',
				data:ppull2,
				backgroundColor:['#54AE20','#54AE20','#54AE20','#54AE20','#54AE20','#54AE20','#54AE20','#54AE20'],
				borderWidth:2,
				borderColor: 'black',
				hoverBorderWidth:3,
				hoverBorderColor: 'black',
			},{
				label:'exchange',
				data:eexchange2,
				backgroundColor:['#7443C5','#7443C5','#7443C5','#7443C5','#7443C5','#7443C5','#7443C5','#7443C5'],
				borderWidth:2,
				borderColor: 'black',
				hoverBorderWidth:3,
				hoverBorderColor: 'black',
			}]
		},
		options:{
			title:{
				display:true,
				text:'  February ' + yearr,
				fontSize:20
			},
			legend:{
				position:'right', // top bottom left right
				labels:{
					fontColor:'#000'
				}
			},
			layout:{
				padding:{
					left:20,
					right:20,
					bottom:0,
					top:10
				}
			},
			tooltips:{
				enabled:true
			}
		}
	});
	</script>
	<script>
	let myChart2 = document.getElementById('myChart3').getContext('2d');
	Chart.defaults.global.defaultFontFamily='Calibri';
	Chart.defaults.global.defaultFontSize=15;
	Chart.defaults.global.defaultFontColor='green';
	
	var x1 = document.getElementById('data2').innerHTML;
	var y1 = document.getElementById('driver2').innerHTML;
	console.log(x1);
	var x1 = x1.slice(0,-1);
	var y1 = y1.slice(0,-1);
	var xx1 = x1.split(",");
	var yy1 = y1.split(",");
	console.log(x1);
	console.log(y1);
	console.log(xx1);
	console.log(yy1);
	
	var send3 = document.getElementById('datasend2').innerHTML;
	var pull3 = document.getElementById('datapull2').innerHTML;
	var exchange3 = document.getElementById('dataexchange2').innerHTML;
	var send3 = send3.slice(0,-1);
	var pull3 = pull3.slice(0,-1);
	var exchange3 = exchange3.slice(0,-1);
	var ssend3 = send3.split(",");
	var ppull3 = pull3.split(",");
	var eexchange3 = exchange3.split(",");
	
	let driverChart2 = new Chart(myChart2,{
		type:'bar',// bar, horizontalBar, pie, line, doughnut, radar, polarArea
		data:{
			labels:yy1,
			datasets:[{
				label:'Total',
				data:xx1,
				backgroundColor:['#2E66B2','#2E66B2','#2E66B2','#2E66B2','#2E66B2','#2E66B2','#2E66B2','#2E66B2'],
				borderWidth:2,
				borderColor: 'black',
				hoverBorderWidth:2,
				hoverBorderColor: 'black',
			},{
				label:'send',
				data:ssend3,
				backgroundColor:['#D75F1E','#D75F1E','#D75F1E','#D75F1E','#D75F1E','#D75F1E','#D75F1E','#D75F1E'],
				borderWidth:2,
				borderColor: 'black',
				hoverBorderWidth:3,
				hoverBorderColor: 'black',
			},{
				label:'pull',
				data:ppull3,
				backgroundColor:['#54AE20','#54AE20','#54AE20','#54AE20','#54AE20','#54AE20','#54AE20','#54AE20'],
				borderWidth:2,
				borderColor: 'black',
				hoverBorderWidth:3,
				hoverBorderColor: 'black',
			},{
				label:'exchange',
				data:eexchange3,
				backgroundColor:['#7443C5','#7443C5','#7443C5','#7443C5','#7443C5','#7443C5','#7443C5','#7443C5'],
				borderWidth:2,
				borderColor: 'black',
				hoverBorderWidth:3,
				hoverBorderColor: 'black',
			}]
		},
		options:{
			title:{
				display:true,
				text:'  March ' + yearr,
				fontSize:20
			},
			legend:{
				position:'right', // top bottom left right
				labels:{
					fontColor:'#000'
				}
			},
			layout:{
				padding:{
					left:20,
					right:20,
					bottom:0,
					top:10
				}
			},
			tooltips:{
				enabled:true
			}
		}
	});
	</script>
	<script>
	let myChart3 = document.getElementById('myChart4').getContext('2d');
	Chart.defaults.global.defaultFontFamily='Calibri';
	Chart.defaults.global.defaultFontSize=15;
	Chart.defaults.global.defaultFontColor='green';
	
	var x1 = document.getElementById('data3').innerHTML;
	var y1 = document.getElementById('driver3').innerHTML;
	console.log(x1);
	var x1 = x1.slice(0,-1);
	var y1 = y1.slice(0,-1);
	var xx1 = x1.split(",");
	var yy1 = y1.split(",");
	console.log(x1);
	console.log(y1);
	console.log(xx1);
	console.log(yy1);
	
	var send4 = document.getElementById('datasend3').innerHTML;
	var pull4 = document.getElementById('datapull3').innerHTML;
	var exchange4 = document.getElementById('dataexchange3').innerHTML;
	var send4 = send4.slice(0,-1);
	var pull4 = pull4.slice(0,-1);
	var exchange4 = exchange4.slice(0,-1);
	var ssend4 = send4.split(",");
	var ppull4 = pull4.split(",");
	var eexchange4 = exchange4.split(",");
	
	
	let driverChart3 = new Chart(myChart3,{
		type:'bar',// bar, horizontalBar, pie, line, doughnut, radar, polarArea
		data:{
			labels:yy1,
			datasets:[{
				label:'Total',
				data:xx1,
				backgroundColor:['#2E66B2','#2E66B2','#2E66B2','#2E66B2','#2E66B2','#2E66B2','#2E66B2','#2E66B2'],
				borderWidth:2,
				borderColor: 'black',
				hoverBorderWidth:2,
				hoverBorderColor: 'black',
			},{
				label:'send',
				data:ssend4,
				backgroundColor:['#D75F1E','#D75F1E','#D75F1E','#D75F1E','#D75F1E','#D75F1E','#D75F1E','#D75F1E'],
				borderWidth:2,
				borderColor: 'black',
				hoverBorderWidth:3,
				hoverBorderColor: 'black',
			},{
				label:'pull',
				data:ppull4,
				backgroundColor:['#54AE20','#54AE20','#54AE20','#54AE20','#54AE20','#54AE20','#54AE20','#54AE20'],
				borderWidth:2,
				borderColor: 'black',
				hoverBorderWidth:3,
				hoverBorderColor: 'black',
			},{
				label:'exchange',
				data:eexchange4,
				backgroundColor:['#7443C5','#7443C5','#7443C5','#7443C5','#7443C5','#7443C5','#7443C5','#7443C5'],
				borderWidth:2,
				borderColor: 'black',
				hoverBorderWidth:3,
				hoverBorderColor: 'black',
			}]
		},
		options:{
			title:{
				display:true,
				text:'April ' + yearr,
				fontSize:20
			},
			legend:{
				position:'right', // top bottom left right
				labels:{
					fontColor:'#000'
				}
			},
			layout:{
				padding:{
					left:20,
					right:20,
					bottom:0,
					top:10
				}
			},
			tooltips:{
				enabled:true
			}
		}
	});
	</script>
	<script>
	let myChart4 = document.getElementById('myChart5').getContext('2d');
	Chart.defaults.global.defaultFontFamily='Calibri';
	Chart.defaults.global.defaultFontSize=15;
	Chart.defaults.global.defaultFontColor='green';
	
	var x1 = document.getElementById('data4').innerHTML;
	var y1 = document.getElementById('driver4').innerHTML;
	console.log(x1);
	var x1 = x1.slice(0,-1);
	var y1 = y1.slice(0,-1);
	var xx1 = x1.split(",");
	var yy1 = y1.split(",");
	console.log(x1);
	console.log(y1);
	console.log(xx1);
	console.log(yy1);
	
	var send5 = document.getElementById('datasend4').innerHTML;
	var pull5 = document.getElementById('datapull4').innerHTML;
	var exchange5 = document.getElementById('dataexchange4').innerHTML;
	var send5 = send5.slice(0,-1);
	var pull5 = pull5.slice(0,-1);
	var exchange5 = exchange5.slice(0,-1);
	var ssend5 = send5.split(",");
	var ppull5 = pull5.split(",");
	var eexchange5 = exchange5.split(",");
	
	
	let driverChart4 = new Chart(myChart4,{
		type:'bar',// bar, horizontalBar, pie, line, doughnut, radar, polarArea
		data:{
			labels:yy1,
			datasets:[{
				label:'Total',
				data:xx1,
				backgroundColor:['#2E66B2','#2E66B2','#2E66B2','#2E66B2','#2E66B2','#2E66B2','#2E66B2','#2E66B2'],
				borderWidth:2,
				borderColor: 'black',
				hoverBorderWidth:2,
				hoverBorderColor: 'black',
			},{
				label:'send',
				data:ssend5,
				backgroundColor:['#D75F1E','#D75F1E','#D75F1E','#D75F1E','#D75F1E','#D75F1E','#D75F1E','#D75F1E'],
				borderWidth:2,
				borderColor: 'black',
				hoverBorderWidth:3,
				hoverBorderColor: 'black',
			},{
				label:'pull',
				data:ppull5,
				backgroundColor:['#54AE20','#54AE20','#54AE20','#54AE20','#54AE20','#54AE20','#54AE20','#54AE20'],
				borderWidth:2,
				borderColor: 'black',
				hoverBorderWidth:3,
				hoverBorderColor: 'black',
			},{
				label:'exchange',
				data:eexchange5,
				backgroundColor:['#7443C5','#7443C5','#7443C5','#7443C5','#7443C5','#7443C5','#7443C5','#7443C5'],
				borderWidth:2,
				borderColor: 'black',
				hoverBorderWidth:3,
				hoverBorderColor: 'black',
			}]
		},
		options:{
			title:{
				display:true,
				text:'May ' + yearr,
				fontSize:20
			},
			legend:{
				position:'right', // top bottom left right
				labels:{
					fontColor:'#000'
				}
			},
			layout:{
				padding:{
					left:20,
					right:20,
					bottom:0,
					top:10
				}
			},
			tooltips:{
				enabled:true
			}
		}
	});
	</script>
	<script>
	let myChart5 = document.getElementById('myChart6').getContext('2d');
	Chart.defaults.global.defaultFontFamily='Calibri';
	Chart.defaults.global.defaultFontSize=15;
	Chart.defaults.global.defaultFontColor='green';
	
	var x1 = document.getElementById('data5').innerHTML;
	var y1 = document.getElementById('driver5').innerHTML;
	console.log(x1);
	var x1 = x1.slice(0,-1);
	var y1 = y1.slice(0,-1);
	var xx1 = x1.split(",");
	var yy1 = y1.split(",");
	console.log(x1);
	console.log(y1);
	console.log(xx1);
	console.log(yy1);
	
	var send6 = document.getElementById('datasend5').innerHTML;
	var pull6 = document.getElementById('datapull5').innerHTML;
	var exchange6 = document.getElementById('dataexchange5').innerHTML;
	var send6 = send6.slice(0,-1);
	var pull6 = pull6.slice(0,-1);
	var exchange6 = exchange6.slice(0,-1);
	var ssend6 = send6.split(",");
	var ppull6 = pull6.split(",");
	var eexchange6 = exchange6.split(",");
	
	let driverChart5 = new Chart(myChart5,{
		type:'bar',// bar, horizontalBar, pie, line, doughnut, radar, polarArea
		data:{
			labels:yy1,
			datasets:[{
				label:'Total',
				data:xx1,
				backgroundColor:['#2E66B2','#2E66B2','#2E66B2','#2E66B2','#2E66B2','#2E66B2','#2E66B2','#2E66B2'],
				borderWidth:2,
				borderColor: 'black',
				hoverBorderWidth:2,
				hoverBorderColor: 'black',
			},{
				label:'send',
				data:ssend6,
				backgroundColor:['#D75F1E','#D75F1E','#D75F1E','#D75F1E','#D75F1E','#D75F1E','#D75F1E','#D75F1E'],
				borderWidth:2,
				borderColor: 'black',
				hoverBorderWidth:3,
				hoverBorderColor: 'black',
			},{
				label:'pull',
				data:ppull6,
				backgroundColor:['#54AE20','#54AE20','#54AE20','#54AE20','#54AE20','#54AE20','#54AE20','#54AE20'],
				borderWidth:2,
				borderColor: 'black',
				hoverBorderWidth:3,
				hoverBorderColor: 'black',
			},{
				label:'exchange',
				data:eexchange6,
				backgroundColor:['#7443C5','#7443C5','#7443C5','#7443C5','#7443C5','#7443C5','#7443C5','#7443C5'],
				borderWidth:2,
				borderColor: 'black',
				hoverBorderWidth:3,
				hoverBorderColor: 'black',
			}]
		},
		options:{
			title:{
				display:true,
				text:'June ' + yearr,
				fontSize:20
			},
			legend:{
				position:'right', // top bottom left right
				labels:{
					fontColor:'#000'
				}
			},
			layout:{
				padding:{
					left:20,
					right:20,
					bottom:0,
					top:10
				}
			},
			tooltips:{
				enabled:true
			}
		}
	});
	</script>
	<script>
	let myChart6 = document.getElementById('myChart7').getContext('2d');
	Chart.defaults.global.defaultFontFamily='Calibri';
	Chart.defaults.global.defaultFontSize=15;
	Chart.defaults.global.defaultFontColor='green';
	
	var x1 = document.getElementById('data6').innerHTML;
	var y1 = document.getElementById('driver6').innerHTML;
	console.log(x1);
	var x1 = x1.slice(0,-1);
	var y1 = y1.slice(0,-1);
	var xx1 = x1.split(",");
	var yy1 = y1.split(",");
	console.log(x1);
	console.log(y1);
	console.log(xx1);
	console.log(yy1);
	
	var send7 = document.getElementById('datasend6').innerHTML;
	var pull7 = document.getElementById('datapull6').innerHTML;
	var exchange7 = document.getElementById('dataexchange6').innerHTML;
	var send7 = send7.slice(0,-1);
	var pull7 = pull7.slice(0,-1);
	var exchange7 = exchange7.slice(0,-1);
	var ssend7 = send7.split(",");
	var ppull7 = pull7.split(",");
	var eexchange7 = exchange7.split(",");
	
	let driverChart6 = new Chart(myChart6,{
		type:'bar',// bar, horizontalBar, pie, line, doughnut, radar, polarArea
		data:{
			labels:yy1,
			datasets:[{
				label:'Total',
				data:xx1,
				backgroundColor:['#2E66B2','#2E66B2','#2E66B2','#2E66B2','#2E66B2','#2E66B2','#2E66B2','#2E66B2'],
				borderWidth:2,
				borderColor: 'black',
				hoverBorderWidth:2,
				hoverBorderColor: 'black',
			},{
				label:'send',
				data:ssend7,
				backgroundColor:['#D75F1E','#D75F1E','#D75F1E','#D75F1E','#D75F1E','#D75F1E','#D75F1E','#D75F1E'],
				borderWidth:2,
				borderColor: 'black',
				hoverBorderWidth:3,
				hoverBorderColor: 'black',
			},{
				label:'pull',
				data:ppull7,
				backgroundColor:['#54AE20','#54AE20','#54AE20','#54AE20','#54AE20','#54AE20','#54AE20','#54AE20'],
				borderWidth:2,
				borderColor: 'black',
				hoverBorderWidth:3,
				hoverBorderColor: 'black',
			},{
				label:'exchange',
				data:eexchange7,
				backgroundColor:['#7443C5','#7443C5','#7443C5','#7443C5','#7443C5','#7443C5','#7443C5','#7443C5'],
				borderWidth:2,
				borderColor: 'black',
				hoverBorderWidth:3,
				hoverBorderColor: 'black',
			}]
		},
		options:{
			title:{
				display:true,
				text:'   July ' + yearr,
				fontSize:20
			},
			legend:{
				position:'right', // top bottom left right
				labels:{
					fontColor:'#000'
				}
			},
			layout:{
				padding:{
					left:20,
					right:20,
					bottom:0,
					top:10
				}
			},
			tooltips:{
				enabled:true
			}
		}
	});
	</script>
	<script>
	let myChart7 = document.getElementById('myChart8').getContext('2d');
	Chart.defaults.global.defaultFontFamily='Calibri';
	Chart.defaults.global.defaultFontSize=15;
	Chart.defaults.global.defaultFontColor='green';
	
	var x1 = document.getElementById('data7').innerHTML;
	var y1 = document.getElementById('driver7').innerHTML;
	console.log(x1);
	var x1 = x1.slice(0,-1);
	var y1 = y1.slice(0,-1);
	var xx1 = x1.split(",");
	var yy1 = y1.split(",");
	console.log(x1);
	console.log(y1);
	console.log(xx1);
	console.log(yy1);
	
	var send8 = document.getElementById('datasend7').innerHTML;
	var pull8 = document.getElementById('datapull7').innerHTML;
	var exchange8 = document.getElementById('dataexchange7').innerHTML;
	var send8 = send8.slice(0,-1);
	var pull8 = pull8.slice(0,-1);
	var exchange8 = exchange8.slice(0,-1);
	var ssend8 = send8.split(",");
	var ppull8 = pull8.split(",");
	var eexchange8 = exchange8.split(",");
	
	let driverChart7 = new Chart(myChart7,{
		type:'bar',// bar, horizontalBar, pie, line, doughnut, radar, polarArea
		data:{
			labels:yy1,
			datasets:[{
				label:'Total',
				data:xx1,
				backgroundColor:['#2E66B2','#2E66B2','#2E66B2','#2E66B2','#2E66B2','#2E66B2','#2E66B2','#2E66B2'],
				borderWidth:2,
				borderColor: 'black',
				hoverBorderWidth:2,
				hoverBorderColor: 'black',
			},{
				label:'send',
				data:ssend8,
				backgroundColor:['#D75F1E','#D75F1E','#D75F1E','#D75F1E','#D75F1E','#D75F1E','#D75F1E','#D75F1E'],
				borderWidth:2,
				borderColor: 'black',
				hoverBorderWidth:3,
				hoverBorderColor: 'black',
			},{
				label:'pull',
				data:ppull8,
				backgroundColor:['#54AE20','#54AE20','#54AE20','#54AE20','#54AE20','#54AE20','#54AE20','#54AE20'],
				borderWidth:2,
				borderColor: 'black',
				hoverBorderWidth:3,
				hoverBorderColor: 'black',
			},{
				label:'exchange',
				data:eexchange8,
				backgroundColor:['#7443C5','#7443C5','#7443C5','#7443C5','#7443C5','#7443C5','#7443C5','#7443C5'],
				borderWidth:2,
				borderColor: 'black',
				hoverBorderWidth:3,
				hoverBorderColor: 'black',
			}]
		},
		options:{
			title:{
				display:true,
				text:'   August ' + yearr,
				fontSize:20
			},
			legend:{
				position:'right', // top bottom left right
				labels:{
					fontColor:'#000'
				}
			},
			layout:{
				padding:{
					left:20,
					right:20,
					bottom:0,
					top:10
				}
			},
			tooltips:{
				enabled:true
			}
		}
	});
	</script>
	<script>
	let myChart8 = document.getElementById('myChart9').getContext('2d');
	Chart.defaults.global.defaultFontFamily='Calibri';
	Chart.defaults.global.defaultFontSize=15;
	Chart.defaults.global.defaultFontColor='green';
	
	var x1 = document.getElementById('data8').innerHTML;
	var y1 = document.getElementById('driver8').innerHTML;
	console.log(x1);
	var x1 = x1.slice(0,-1);
	var y1 = y1.slice(0,-1);
	var xx1 = x1.split(",");
	var yy1 = y1.split(",");
	console.log(x1);
	console.log(y1);
	console.log(xx1);
	console.log(yy1);
	
	var send9 = document.getElementById('datasend8').innerHTML;
	var pull9 = document.getElementById('datapull8').innerHTML;
	var exchange9 = document.getElementById('dataexchange8').innerHTML;
	var send9 = send9.slice(0,-1);
	var pull9 = pull9.slice(0,-1);
	var exchange9 = exchange9.slice(0,-1);
	var ssend9 = send9.split(",");
	var ppull9 = pull9.split(",");
	var eexchange9 = exchange9.split(",");
	
	let driverChart8 = new Chart(myChart8,{
		type:'bar',// bar, horizontalBar, pie, line, doughnut, radar, polarArea
		data:{
			labels:yy1,
			datasets:[{
				label:'Total',
				data:xx1,
				backgroundColor:['#2E66B2','#2E66B2','#2E66B2','#2E66B2','#2E66B2','#2E66B2','#2E66B2','#2E66B2'],
				borderWidth:2,
				borderColor: 'black',
				hoverBorderWidth:2,
				hoverBorderColor: 'black',
			},{
				label:'send',
				data:ssend9,
				backgroundColor:['#D75F1E','#D75F1E','#D75F1E','#D75F1E','#D75F1E','#D75F1E','#D75F1E','#D75F1E'],
				borderWidth:2,
				borderColor: 'black',
				hoverBorderWidth:3,
				hoverBorderColor: 'black',
			},{
				label:'pull',
				data:ppull9,
				backgroundColor:['#54AE20','#54AE20','#54AE20','#54AE20','#54AE20','#54AE20','#54AE20','#54AE20'],
				borderWidth:2,
				borderColor: 'black',
				hoverBorderWidth:3,
				hoverBorderColor: 'black',
			},{
				label:'exchange',
				data:eexchange9,
				backgroundColor:['#7443C5','#7443C5','#7443C5','#7443C5','#7443C5','#7443C5','#7443C5','#7443C5'],
				borderWidth:2,
				borderColor: 'black',
				hoverBorderWidth:3,
				hoverBorderColor: 'black',
			}]
		},
		options:{
			title:{
				display:true,
				text:'   September ' + yearr,
				fontSize:20
			},
			legend:{
				position:'right', // top bottom left right
				labels:{
					fontColor:'#000'
				}
			},
			layout:{
				padding:{
					left:20,
					right:20,
					bottom:0,
					top:10
				}
			},
			tooltips:{
				enabled:true
			}
		}
	});
	</script>
	<script>
	let myChart9 = document.getElementById('myChart10').getContext('2d');
	Chart.defaults.global.defaultFontFamily='Calibri';
	Chart.defaults.global.defaultFontSize=15;
	Chart.defaults.global.defaultFontColor='green';
	
	var x1 = document.getElementById('data9').innerHTML;
	var y1 = document.getElementById('driver9').innerHTML;
	console.log(x1);
	var x1 = x1.slice(0,-1);
	var y1 = y1.slice(0,-1);
	var xx1 = x1.split(",");
	var yy1 = y1.split(",");
	console.log(x1);
	console.log(y1);
	console.log(xx1);
	console.log(yy1);
	
	var send10 = document.getElementById('datasend9').innerHTML;
	var pull10 = document.getElementById('datapull9').innerHTML;
	var exchange10 = document.getElementById('dataexchange9').innerHTML;
	var send10 = send10.slice(0,-1);
	var pull10 = pull10.slice(0,-1);
	var exchange10 = exchange10.slice(0,-1);
	var ssend10 = send10.split(",");
	var ppull10 = pull10.split(",");
	var eexchange10 = exchange10.split(",");
	
	let driverChart9 = new Chart(myChart9,{
		type:'bar',// bar, horizontalBar, pie, line, doughnut, radar, polarArea
		data:{
			labels:yy1,
			datasets:[{
				label:'Total',
				data:xx1,
				backgroundColor:['#2E66B2','#2E66B2','#2E66B2','#2E66B2','#2E66B2','#2E66B2','#2E66B2','#2E66B2'],
				borderWidth:2,
				borderColor: 'black',
				hoverBorderWidth:2,
				hoverBorderColor: 'black',
			},{
				label:'send',
				data:ssend10,
				backgroundColor:['#D75F1E','#D75F1E','#D75F1E','#D75F1E','#D75F1E','#D75F1E','#D75F1E','#D75F1E'],
				borderWidth:2,
				borderColor: 'black',
				hoverBorderWidth:3,
				hoverBorderColor: 'black',
			},{
				label:'pull',
				data:ppull10,
				backgroundColor:['#54AE20','#54AE20','#54AE20','#54AE20','#54AE20','#54AE20','#54AE20','#54AE20'],
				borderWidth:2,
				borderColor: 'black',
				hoverBorderWidth:3,
				hoverBorderColor: 'black',
			},{
				label:'exchange',
				data:eexchange10,
				backgroundColor:['#7443C5','#7443C5','#7443C5','#7443C5','#7443C5','#7443C5','#7443C5','#7443C5'],
				borderWidth:2,
				borderColor: 'black',
				hoverBorderWidth:3,
				hoverBorderColor: 'black',
			}]
		},
		options:{
			title:{
				display:true,
				text:'   October ' + yearr,
				fontSize:20
			},
			legend:{
				position:'right', // top bottom left right
				labels:{
					fontColor:'#000'
				}
			},
			layout:{
				padding:{
					left:20,
					right:20,
					bottom:0,
					top:10
				}
			},
			tooltips:{
				enabled:true
			}
		}
	});
	</script>
	<script>
	let myChart10 = document.getElementById('myChart11').getContext('2d');
	Chart.defaults.global.defaultFontFamily='Calibri';
	Chart.defaults.global.defaultFontSize=15;
	Chart.defaults.global.defaultFontColor='green';
	
	var x1 = document.getElementById('data10').innerHTML;
	var y1 = document.getElementById('driver10').innerHTML;
	console.log(x1);
	var x1 = x1.slice(0,-1);
	var y1 = y1.slice(0,-1);
	var xx1 = x1.split(",");
	var yy1 = y1.split(",");
	console.log(x1);
	console.log(y1);
	console.log(xx1);
	console.log(yy1);
	
	var send11 = document.getElementById('datasend10').innerHTML;
	var pull11 = document.getElementById('datapull10').innerHTML;
	var exchange11 = document.getElementById('dataexchange10').innerHTML;
	var send11 = send11.slice(0,-1);
	var pull11 = pull11.slice(0,-1);
	var exchange11 = exchange11.slice(0,-1);
	var ssend11 = send11.split(",");
	var ppull11 = pull11.split(",");
	var eexchange11 = exchange11.split(",");
	
	let driverChart10 = new Chart(myChart10,{
		type:'bar',// bar, horizontalBar, pie, line, doughnut, radar, polarArea
		data:{
			labels:yy1,
			datasets:[{
				label:'Total',
				data:xx1,
				backgroundColor:['#2E66B2','#2E66B2','#2E66B2','#2E66B2','#2E66B2','#2E66B2','#2E66B2','#2E66B2'],
				borderWidth:2,
				borderColor: 'black',
				hoverBorderWidth:2,
				hoverBorderColor: 'black',
			},{
				label:'send',
				data:ssend11,
				backgroundColor:['#D75F1E','#D75F1E','#D75F1E','#D75F1E','#D75F1E','#D75F1E','#D75F1E','#D75F1E'],
				borderWidth:2,
				borderColor: 'black',
				hoverBorderWidth:3,
				hoverBorderColor: 'black',
			},{
				label:'pull',
				data:ppull11,
				backgroundColor:['#54AE20','#54AE20','#54AE20','#54AE20','#54AE20','#54AE20','#54AE20','#54AE20'],
				borderWidth:2,
				borderColor: 'black',
				hoverBorderWidth:3,
				hoverBorderColor: 'black',
			},{
				label:'exchange',
				data:eexchange11,
				backgroundColor:['#7443C5','#7443C5','#7443C5','#7443C5','#7443C5','#7443C5','#7443C5','#7443C5'],
				borderWidth:2,
				borderColor: 'black',
				hoverBorderWidth:3,
				hoverBorderColor: 'black',
			}]
		},
		options:{
			title:{
				display:true,
				text:'   November ' + yearr,
				fontSize:20
			},
			legend:{
				position:'right', // top bottom left right
				labels:{
					fontColor:'#000'
				}
			},
			layout:{
				padding:{
					left:20,
					right:20,
					bottom:0,
					top:10
				}
			},
			tooltips:{
				enabled:true
			}
		}
	});
	</script>
	<script>
	let myChart11 = document.getElementById('myChart12').getContext('2d');
	Chart.defaults.global.defaultFontFamily='Calibri';
	Chart.defaults.global.defaultFontSize=15;
	Chart.defaults.global.defaultFontColor='green';
	
	var x1 = document.getElementById('data11').innerHTML;
	var y1 = document.getElementById('driver11').innerHTML;
	console.log(x1);
	var x1 = x1.slice(0,-1);
	var y1 = y1.slice(0,-1);
	var xx1 = x1.split(",");
	var yy1 = y1.split(",");
	console.log(x1);
	console.log(y1);
	console.log(xx1);
	console.log(yy1);
	
	var send12 = document.getElementById('datasend11').innerHTML;
	var pull12 = document.getElementById('datapull11').innerHTML;
	var exchange12 = document.getElementById('dataexchange11').innerHTML;
	var send12 = send12.slice(0,-1);
	var pull12 = pull12.slice(0,-1);
	var exchange12 = exchange12.slice(0,-1);
	var ssend12 = send12.split(",");
	var ppull12 = pull12.split(",");
	var eexchange12 = exchange12.split(",");
	
	let driverChart11 = new Chart(myChart11,{
		type:'bar',// bar, horizontalBar, pie, line, doughnut, radar, polarArea
		data:{
			labels:yy1,
			datasets:[{
				label:'Total',
				data:xx1,
				backgroundColor:['#2E66B2','#2E66B2','#2E66B2','#2E66B2','#2E66B2','#2E66B2','#2E66B2','#2E66B2'],
				borderWidth:2,
				borderColor: 'black',
				hoverBorderWidth:2,
				hoverBorderColor: 'black',
			},{
				label:'send',
				data:ssend12,
				backgroundColor:['#D75F1E','#D75F1E','#D75F1E','#D75F1E','#D75F1E','#D75F1E','#D75F1E','#D75F1E'],
				borderWidth:2,
				borderColor: 'black',
				hoverBorderWidth:3,
				hoverBorderColor: 'black',
			},{
				label:'pull',
				data:ppull12,
				backgroundColor:['#54AE20','#54AE20','#54AE20','#54AE20','#54AE20','#54AE20','#54AE20','#54AE20'],
				borderWidth:2,
				borderColor: 'black',
				hoverBorderWidth:3,
				hoverBorderColor: 'black',
			},{
				label:'exchange',
				data:eexchange12,
				backgroundColor:['#7443C5','#7443C5','#7443C5','#7443C5','#7443C5','#7443C5','#7443C5','#7443C5'],
				borderWidth:2,
				borderColor: 'black',
				hoverBorderWidth:3,
				hoverBorderColor: 'black',
			}]
		},
		options:{
			title:{
				display:true,
				text:'   December ' + yearr,
				fontSize:20
			},
			legend:{
				position:'right', // top bottom left right
				labels:{
					fontColor:'#000'
				}
			},
			layout:{
				padding:{
					left:20,
					right:20,
					bottom:0,
					top:10
				}
			},
			tooltips:{
				enabled:true
			}
		}
	});
	</script>
	<script>
	let myChart12 = document.getElementById('myChart13').getContext('2d');
	Chart.defaults.global.defaultFontFamily='Calibri';
	Chart.defaults.global.defaultFontSize=15;
	Chart.defaults.global.defaultFontColor='green';
	
	var x1 = document.getElementById('tdata0').innerHTML;
	var y1 = document.getElementById('tdriver0').innerHTML;
	console.log(x1);
	var x1 = x1.slice(0,-1);
	var y1 = y1.slice(0,-1);
	var xx1 = x1.split(",");
	var yy1 = y1.split(",");
	console.log(x1);
	console.log(y1);
	console.log(xx1);
	console.log(yy1);
	
	var send13 = document.getElementById('tdatasend0').innerHTML;
	var pull13 = document.getElementById('tdatapull0').innerHTML;
	var exchange13 = document.getElementById('tdataexchange0').innerHTML;
	var send13 = send13.slice(0,-1);
	var pull13 = pull13.slice(0,-1);
	var exchange13 = exchange13.slice(0,-1);
	var ssend13 = send13.split(",");
	var ppull13 = pull13.split(",");
	var eexchange13 = exchange13.split(",");
	
	let driverChart12 = new Chart(myChart12,{
		type:'bar',// bar, horizontalBar, pie, line, doughnut, radar, polarArea
		data:{
			labels:yy1,
			datasets:[{
				label:'Total',
				data:xx1,
				backgroundColor:['#2E66B2','#2E66B2','#2E66B2','#2E66B2','#2E66B2','#2E66B2','#2E66B2','#2E66B2'],
				borderWidth:2,
				borderColor: 'black',
				hoverBorderWidth:2,
				hoverBorderColor: 'black',
			},{
				label:'send',
				data:ssend13,
				backgroundColor:['#D75F1E','#D75F1E','#D75F1E','#D75F1E','#D75F1E','#D75F1E','#D75F1E','#D75F1E'],
				borderWidth:2,
				borderColor: 'black',
				hoverBorderWidth:3,
				hoverBorderColor: 'black',
			},{
				label:'pull',
				data:ppull13,
				backgroundColor:['#54AE20','#54AE20','#54AE20','#54AE20','#54AE20','#54AE20','#54AE20','#54AE20'],
				borderWidth:2,
				borderColor: 'black',
				hoverBorderWidth:3,
				hoverBorderColor: 'black',
			},{
				label:'exchange',
				data:eexchange13,
				backgroundColor:['#7443C5','#7443C5','#7443C5','#7443C5','#7443C5','#7443C5','#7443C5','#7443C5'],
				borderWidth:2,
				borderColor: 'black',
				hoverBorderWidth:3,
				hoverBorderColor: 'black',
			}]
		},
		options:{
			title:{
				display:true,
				text:'   Total ' + yearr,
				fontSize:20
			},
			legend:{
				position:'right', // top bottom left right
				labels:{
					fontColor:'#000'
				}
			},
			layout:{
				padding:{
					left:20,
					right:20,
					bottom:0,
					top:10
				}
			},
			tooltips:{
				enabled:true
			}
		}
	});
	</script>
	</div>
	</body>
</html>