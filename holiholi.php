<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="table.css">
		<title>View and Add holiday</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
	</head>
	<header>
	<?php include'navigation.php'?>
</header>
	<body>
	<div class="container">
	<?php include 'holi_navi.php'?><br/><br/><br/>
	
<?php
	include_once 'connection.php';
	if(isset($_POST['holiyear'])){
		
		echo "<h2>Year ";
		echo $_POST['holiyear'];
		echo "</h2>";
		//first day
		$firstdate = date("Y-m-d",strtotime("$_POST[holiyear]-01-01"));
		//next year 01 - 01
		$enddate = date('Y-m-d', strtotime($firstdate . ' +1 year'));
		//next month of start
		$nextmonth = date('Y-m-d', strtotime($firstdate . ' +1 month'));
		$isfirstday = 1;
		$endtrigger = 0;
		$monthcount=0;
		$nextline = 1;
		$runfirsttime=0;
		$checkspace = 0;
		$month = array('JANUARY','FEBRUARY','MARCH','APRIL','MAY','JUNE','JULY','AUGUST','SEPTEMBER','OCTOBER','NOVEMBER','DECEMBER');
		echo "<table id='holiday'>";
		$dayarray = array('Sun','Mon','Tue','Wed','Thu','Fri','Sat');
		
		
		while($endtrigger ==0 ){
			if($isfirstday==1){
				echo "<tr><td class='emp'></td></tr><tr><th colspan='7'>".$month[$monthcount]."</th></tr>";
				$dayprintcount=0;
				$nextline = 1;
				// check for spacing on calendar
				if(date('w', strtotime($firstdate)) === '1'){
					$checkspace = 1;
					$nextline += 1;
				}else if(date('w', strtotime($firstdate)) === '2'){
					$checkspace = 2;
					$nextline += 2;
				}else if(date('w', strtotime($firstdate)) === '3'){
					$checkspace = 3;
					$nextline += 3;
				}else if(date('w', strtotime($firstdate)) === '4'){
					$checkspace = 4;
					$nextline += 4;
				}else if(date('w', strtotime($firstdate)) === '5'){
					$checkspace = 5;
					$nextline += 5;
				}else if(date('w', strtotime($firstdate)) === '6'){
					$checkspace = 6;
					$nextline += 6;
				}else if(date('w', strtotime($firstdate)) === '0'){
					$checkspace = 0;
				}
				echo "<tr>";
				while($dayprintcount<count($dayarray)){
					echo "<td class='days'>".$dayarray[$dayprintcount]."</td>";
					$dayprintcount += 1;
				}
				echo "</tr>";
				$monthcount += 1;
			}
			
			$isfirstday = 0;
			if($runfirsttime==0){
				echo "<tr>";
				$runfirsttime = 1;
			}
			$xxx = 0;
			while($xxx<$checkspace){
				echo "<td></td>";
				$xxx += 1;
			}
			$checkspace = 0;
			$day = date("d",strtotime($firstdate));
			$para = date("Y-m-d",strtotime($firstdate));
			//find from holiday
			$ggg = mysqli_query($conn,"SELECT * FROM holidaytable WHERE holidaydate = '$firstdate'")or die($conn->error);
			
			$krr    = explode('-', $para);
			$ddd = implode("", $krr);
			if($nextline==7){
				if($ggg->num_rows>0){
					echo "<td class='redtd'>".$day."</td></tr>";
				}else{
					echo "<td class='bluetd'>".$day."<button id='$ddd' onclick='daded($ddd);'>+</button></td></tr>";
				}
				$nextline = 0;
			}else{
				if($ggg->num_rows>0){
					echo "<td class='redtd'>".$day."</td>";
				}else{
					echo "<td class='bluetd'>".$day."<button id='$ddd' onclick='daded($ddd);'>+</button></td>";
				}
			}
			
			$nextline += 1;
			$firstdate = date('Y-m-d', strtotime($firstdate . ' +1 day'));
			if($firstdate==$nextmonth){
				$isfirstday = 1;
				$nextmonth = date('Y-m-d', strtotime($firstdate . ' +1 month'));
			}
			
			
			
			
			//match to next year and end
			if($firstdate==$enddate){
				$endtrigger +=1;
			}
			
		}
		echo '</table>';
	}else{
		//header("Location:holiform.php");
	}
	
?>
<p id = 'aaa'></p>
<form action="savetoholi.php" method="POST">
<!-- class="ng-hide" -->
<div class="ng-hide"><input type="text" name="holidayss" id="holid"></div>
<input type='submit' class="bth btn-primary" value='Add Holiday'>
</form>
</div>
</body>
</html>
<script>

function daded(a){
	var g = document.getElementById("holid").value;
	var s = g  + a +',';
    document.getElementById("holid").value = s;
	var myButt = document.getElementById(a);
	myButt.style.display = "none";
	
	
};
</script>