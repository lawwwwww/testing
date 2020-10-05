<?php

	include_once 'connection.php';
	
	$target_dir="upload/feedback";
	
	if(!file_exists($target_dir)){
		mkdir($target_dir,0777,true);
	}
	
	
	$target_dire=$target_dir."/img"."_".rand().'_'.time().'.jpg';
	$target_vir=$target_dir."/video"."_".rand().'_'.time().'.mp4';	
		
	$al=$_POST['al'];
	
	$did=$_POST['did'];
	
	$tid=$_POST['tripname'];
	//$tname=$_POST['tripname'];
	
	date_default_timezone_set("Asia/Kuala_Lumpur");
	$date=date("Y-m-d");
	
	/*if($tname=='Other')
	{
		$tid=404;
	}
	else
	{
	
	//$see="SELECT * FROM triptable where driverID='".$did."' AND cust_name='".$tname."' AND ship_date='".$date."'";
	
	$see="SELECT * FROM triptable where driverID='".$did."' AND cust_name='".$tname."'";
	
	
	$rrrrr=mysqli_query($conn,$see);
	
	if(mysqli_num_rows($rrrrr)>0)
	{
		while($row=mysqli_fetch_array($rrrrr))
		{
			$tid=$row["tripID"];
		}
	}
	
	
	}*/
	
	//$to="INSERT INTO feedback(tripID,driverID,image,description) values('2','ABC1','J','P')";
	//mysqli_query($conn,$to);
	
	
	if($_FILES['im']['tmp_name']!="" && $_FILES['vi']['tmp_name']!="")
	
	{	
	move_uploaded_file($_FILES['im']['tmp_name'],$target_dire);
	move_uploaded_file($_FILES['vi']['tmp_name'],$target_vir);
	$teto="INSERT INTO feedbacktable (tripID,driverID,image,description,video) values('$tid','$did','$target_dire','$al','$target_vir')";
		mysqli_query($conn,$teto);
		
		echo json_encode([
			"Message"=>"The feedback has been submitted.",
			"Status"=>"OK"
		]);
		
	}
	
	else if($_FILES['im']['tmp_name']!="" && $_FILES['vi']['tmp_name']=="")
	{
		move_uploaded_file($_FILES['im']['tmp_name'],$target_dire);
		$titi="INSERT INTO feedbacktable (tripID,driverID,image,description) values ('$tid','$did','$target_dire','$al')";
		mysqli_query($conn,$titi);
	}
	else if($_FILES['im']['tmp_name']=="" && $_FILES['vi']['tmp_name']!="")
	{
		move_uploaded_file($_FILES['vi']['tmp_name'],$target_vir);
		$tikti="INSERT INTO feedbacktable (tripID,driverID,description,video) values ('$tid','$did','$al','$target_vir')";
		mysqli_query($conn,$tikti);
	}
	
	else{
		$tt="INSERT INTO feedbacktable (tripID,driverID,description) values('$tid','$did','$al')";
		mysqli_query($conn,$tt);
		
		echo json_encode([
			"Message"=>"The feedback has been submitted.",
			"Status"=>"OK"
		]);
		
}	
	header('Access-Control-Allow-Origin: *');
	header('Content-type:application/json');

	
	echo json_encode([
				"Message"=>"testing.",
				"Status"=>"OK"
			]);
	
	?>