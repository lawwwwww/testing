<?php
	include_once 'connection.php';
	if(isset($_POST['holidayss'])){
		$abc = $_POST['holidayss'];
		$holitoadd = explode(",",$abc);
		$x = 0;
		while($x<count($holitoadd)-1){
			$year = substr($holitoadd[$x],0,4);
			$month = substr($holitoadd[$x],4,2);
			$day =  substr($holitoadd[$x],6,2);
			$toadd = $year."-".$month."-".$day;
			$sss = "DELETE FROM holidaytable WHERE holidaydate='$toadd'";
			if ($conn->query($sss) === TRUE) {
				 $del=1;
				} else {
				 $del=0;
				}
			$x += 1;
		}
		if($del==1)
		{
			echo '<script>if(confirm("Recorded deleted successfully")){document.location.href="holiform.php"};</script>';
		}
		else
		{
			echo '<script>if(confirm("Error")){document.location.href="holiform.php"};</script>';

		}
	}else{
		header("Location:holiform.php");
	}
	
?>